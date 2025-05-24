<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('Auth');
        }
        $this->load->model('BatchModel');
        $this->load->model('ModulModel');
        $this->load->helper(['form', 'url']);
        $this->load->library('upload');
        date_default_timezone_set('Asia/Jakarta');
    }

    private function checkIsMentor()
    {
        if ($this->session->userdata("role") != 2) {
            redirect('Auth');
        }
    }

    private function getDataWithAuth($url, $id = 0, $token)
    {
        // Validate token
        if (empty($token)) {
            log_message('error', 'Token is required for authorization.');
            return false;
        }

        // Prepare the request payload
        $postData = array('id' => $id);

        // Initialize cURL
        $ch = curl_init();
        $auth = "Authorization: Bearer " . $token;

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            $auth
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET'); // Force GET method
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData)); // Include request body
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        // Execute cURL and handle response
        $response = curl_exec($ch);

        // Check for errors
        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
            log_message('error', 'cURL Error: ' . $error_msg);
            curl_close($ch);
            return false;
        }

        // Close cURL
        curl_close($ch);

        // Decode the response
        $decodedResponse = json_decode($response, false);

        // Validate JSON response
        if (json_last_error() !== JSON_ERROR_NONE) {
            log_message('error', 'Invalid JSON response: ' . json_last_error_msg());
            return false;
        }

        return $decodedResponse;
    }

    public function student()
    {
        $studentBatchId = $this->session->userdata('batch_id');
        $data['title'] = "Dashboard Students";
        $data['batch'] = $this->BatchModel->getStudentBatch($studentBatchId);
        $data['modul'] = $this->ModulModel->getAllModul($studentBatchId);
        $this->template->load('components/template_dashboard', 'student/index', $data);
    }

    public function modul_detail($id)
    {
        $data['title'] = "Dashboard Details Moduls";
        $data['modul'] = $this->db->get_where("moduls", ["id" => $id])->row_object();
        $data['modul_child'] = $this->db->get_where('moduls', ["parent_id" => $id])->result();
        $this->template->load('components/template_dashboard', 'student/modul', $data);
    }

    public function assignment($id)
    {
        $data['title'] = "Dashboard Assignment";
        $token = $this->session->userdata('token');

        // GET Mentor Data
        $mentorData = $this->getDataWithAuth("http://localhost:3000/api/users/getUserByID", "296", $token);

        // JOIN Assignment and Moduls
        $sql = "SELECT a.*, m.*, q.* FROM assignments a 
        INNER JOIN moduls m ON a.subject_id = m.id 
        INNER JOIN assignment_questions q ON a.assignment_id = q.assignment_id 
        WHERE a.subject_id=$id 
        ORDER BY a.assignment_end_date DESC";

        $data['assignment'] = $this->db->query($sql)->result();
        $data['modul'] = $this->db->get_where('moduls', ['id' => $id])->row_object();
        $data['assignment_submission'] = $this->db->get('assignment_submissions')->result();
        $data['mentor'] = $mentorData->data;
        $this->template->load('components/template_dashboard', 'student/assignment', $data);
    }

    public function upload_assignment($id)
    {
        $taskToken = md5(uniqid(rand(), true));
        $taskStatus = "aktif";
        $taskIsFinish = 1;
        $assignmentId = $this->input->post('assignment_id');
        $studentId = $this->session->userdata('user_id');
        $taskDate = date('Y-m-d H:i:s');

        $config['upload_path'] = './assets/upload/assignment_submissions/';
        $config['allowed_types'] = 'png|jpg|jpeg|txt|pdf|doc|xls|ppt|docx|xlsx|pptx|zip|rar';
        $config['max_size'] = 2048; // 2MB
        $config['encrypt_name'] = TRUE; // nama file akan diacak

        $this->upload->initialize($config);

        if ($this->upload->do_upload('file_tugas')) {
            // Upload succeeded, get the file path
            $uploadData = $this->upload->data();
            $taskFileName= $uploadData['file_name'];
        } else {
            // Upload failed, load the form again with upload error
            $this->session->set_flashdata('fail', "Gagal upload foto");
            redirect('dashboard/assignment/'.$id);
        }

        $dataUpload = [
            "submission_filename" => $taskFileName,
            "submitted_date" => $taskDate,
            "submission_token" => $taskToken,
            "submission_status" => $taskStatus,
            "is_finish" => $taskIsFinish,
            "assignment_id" => $assignmentId,
            "student_id" => $studentId
        ];

        $checkAssignmentData = $this->db->get_where('assignment_submissions', ['assignment_id' => $assignmentId])->row_object();

        if(empty($checkAssignmentData)) {
            $this->db->insert('assignment_submissions', $dataUpload);
        } else {
            $this->session->set_flashdata('fail', 'Anda sudah mengupload tugas');
            redirect('dashboard/assignment/'.$id); // adjust the redirect path as needed
        } 

        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('success', 'Tugas berhasil diupload');
            redirect('dashboard/assignment/'.$id); // adjust the redirect path as needed
        } else {
            $this->session->set_flashdata('fail', 'Tugas gagal diupload');
            redirect('dashboard/assignment/'.$id); // adjust the view name as needed
        }

    }

    public function score()
    {
        $studentID = $this->session->userdata('user_id');
        $studentBatchId = $this->session->userdata('batch_id');
        $sql = "SELECT s.*, a.* FROM scores s INNER JOIN assignments a ON s.assignment_id = a.assignment_id WHERE student_id = $studentID";
        $token = $this->session->userdata('token');

        $mentorData = $this->getDataWithAuth("http://localhost:3000/api/users/getUserByID", "296", $token);

        $data['title'] = "Dashboard Score";
        $data['score'] = $this->db->query($sql)->result();
        $data['mentor'] = $mentorData->data;
        $data['batch'] = $this->BatchModel->getStudentBatch($studentBatchId);
        // var_dump($data['mentor']);
        // var_dump($data['score']);
        // die;
        $this->template->load('components/template_dashboard', 'student/score', $data);
    }

    public function mentor()
    {
        $this->checkIsMentor();
        $mentorBatchId = $this->session->userdata('batch_id');
        $data['title'] = "Dashboard Mentor";
        $data['batch'] = $this->BatchModel->getStudentBatch($mentorBatchId);
        $data['modul'] = $this->ModulModel->getAllModul($mentorBatchId);
        $this->template->load('components/template_dashboard', 'mentor/index', $data);
    }
}
