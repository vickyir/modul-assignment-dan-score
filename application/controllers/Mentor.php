<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mentor extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email') || $this->session->userdata('role') != "2") {
            redirect('Auth');
        }
        $this->load->model('BatchModel');
        $this->load->model('ModulModel');
        $this->load->helper(['form', 'url']);
        $this->load->library('upload');
        $this->load->model('AssignmentModel');
        date_default_timezone_set('Asia/Jakarta');
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

    public function index()
    {
        $mentorBatchID = $this->session->userdata('batch_id');
        $data['title'] = "Dashboard Mentor";
        $data['batch'] = $this->BatchModel->getStudentBatch($mentorBatchID);
        $data['modul'] = $this->ModulModel->getAllModul($mentorBatchID);
        $this->template->load('components/template_mentor', 'mentor/index', $data);
    }

    public function modul_detail($id)
    {
        $data['title'] = "Dashboard Details Moduls";
        $data['modul'] = $this->db->get_where("moduls", ["id" => $id])->row_object();
        $data['modul_child'] = $this->db->get_where('moduls', ["parent_id" => $id])->result();
        $this->template->load('components/template_mentor', 'mentor/modul', $data);
    }

    public function assignment($id)
    {
        $data['title'] = "Dashboard Assignment";
        $token = $this->session->userdata('token');

        // GET Mentor Data
        $mentorData = $this->getDataWithAuth("http://localhost:3000/api/users/getUserByID", $this->session->userdata('user_id'), $token);

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
        $this->template->load('components/template_mentor', 'mentor/assignment', $data);
    }

    public function assignment_collection($modul, $title, $submodul)
    {
        $data['title'] = "Dashboard Assignment Collection";
        $data['modul'] = $modul;
        $data['assignment_title'] = $title;

        $userData = $this->userapi->get_all_users();
        $submissions = $this->db->get_where('assignment_submissions', array('assignment_id' => $submodul))->result();

        $this->db->where('assignment_id', $submodul);
        $scores_data = $this->db->get('scores')->result();

        $score_map = [];
        foreach ($scores_data as $score_entry) {
            $score_map[$score_entry->student_id] = [
                'score_id'    => $score_entry->score_id,    
                'score_value' => $score_entry->score_value 
            ];
        }

        $user_map = [];
        foreach ($userData->data as $user) {
            // Assuming your API user data has a 'user_id' or 'id' field
            $user_map[$user->id] = $user; // Use the actual user ID field from API
        }

        // 3. Combine/Merge the data
        $combined_submissions = [];
        foreach ($submissions as $submission) {
            $user_id = $submission->student_id; // Assuming 'user_id' is the column in your submission table

            if (isset($user_map[$user_id])) {
                $user_data = $user_map[$user_id];
                // Merge user data into the submission object
                // You can add properties directly or create a new array/object structure
                $submission->user_details = $user_data; // Add all user details
                $submission->user_name = $user_data->user_first_name . ' ' . $user_data->user_last_name; // Example for display
            } else {
                // Handle cases where a user_id from submission is not found in API response
                $submission->user_details = null;
                $submission->user_name = 'User Not Found';
                log_message('warning', 'User ID ' . $user_id . ' from submission not found in API response.');
            }

            if (isset($score_map[$user_id])) {
                $submission->score_value = $score_map[$user_id]['score_value']; 
                $submission->score_id= $score_map[$user_id]['score_id'];
            } else {
                $submission->score_details = [
                    'score_id'    => null, // Or some default like 0 or an empty string
                    'score_value' => 0
                ];
                $submission->score_value = 0;
            }            
            $combined_submissions[] = $submission;
        }

        // 4. Prepare for View
        $data['combined_submissions'] = $combined_submissions;
        // var_dump($data['combined_submissions']);
        // die;
        $this->template->load('components/template_mentor', 'mentor/assignment_collection', $data);
    }

    public function submit_score($score, $studentID, $assignmentID, $uri3, $uri4, $uri5) {
        // var_dump($score);
        // var_dump($studentID);
        // die;
        $scoreInput = $this->input->post('score');

        if($score != 0) {
            $dataScore = [
                'score_value' => $scoreInput
            ];

            $this->db->where('score_id', $score);
            $this->db->update('scores', $dataScore);
        } else {
            $dataScore = [
                'score_value' => $scoreInput,
                'assignment_id' => $assignmentID,
                'mentor_id' => $this->session->userdata('user_id'),
                'student_id' => $studentID,
            ];

            $this->db->insert('scores', $dataScore);
        }

        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('success', 'Tugas berhasil dibuat');
            redirect('mentor/assignment_collection/' . $uri3.'/'.$uri4.'/'.$uri5);
        } else {
            $this->session->set_flashdata('fail', 'Tugas gagal dibuat');
            redirect('mentor/assignment_collection/' . $uri3.'/'.$uri4.'/'.$uri5);
        }

        
    }

    public function create_assignment($id_subject)
    {

        $id = $this->AssignmentModel->generateNextId();
        $title = $this->input->post('title');
        $startDate = $this->input->post('start-date');
        $endDate = $this->input->post('end-date');
        // var_dump($startDate);
        // var_dump($endDate);
        // die;
        $description = $this->input->post('desc');
        $type = $this->input->post('type');

        $config['upload_path'] = './assets/upload/assignment_questions/';
        $config['allowed_types'] = 'png|jpg|jpeg|txt|pdf|doc|xls|ppt|docx|xlsx|pptx|zip|rar';
        $config['max_size'] = 2048; // 2MB
        $config['encrypt_name'] = TRUE; // nama file akan diacak

        $this->upload->initialize($config);

        if ($this->upload->do_upload('dokumen')) {
            // Upload succeeded, get the file path
            $uploadData = $this->upload->data();
            $dokumenName = $uploadData['file_name'];
        } else {
            // Upload failed, load the form again with upload error
            $this->session->set_flashdata('fail', "Gagal upload foto");
            redirect('mentor/assignment/' . $id_subject);
        }

        $dataUploadAssignment = [
            "assignment_id" => $id,
            "assignment_name" => $title,
            "assignment_start_date" => $startDate,
            "assignment_end_date" =>  $endDate,
            "assignment_desc" => $description,
            "assignment_type" => $type,
            "subject_id" => $id_subject,
            "mentor_id" => $this->session->userdata('user_id')
        ];

        $dataUploadQuestion = [
            "question_filename" => $dokumenName,
            "question_upload_date" => date('Y-m-d h:i:s'),
            "assignment_id" => $id
        ];

        $this->db->insert('assignments', $dataUploadAssignment);
        $this->db->insert('assignment_questions', $dataUploadQuestion);

        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('success', 'Tugas berhasil dibuat');
            redirect('mentor/assignment/' . $id_subject);
        } else {
            $this->session->set_flashdata('fail', 'Tugas gagal dibuat');
            redirect('mentor/assignment/' . $id_subject);
        }
    }

    public function delete_task($id, $id_subject)
    {
        $this->db->where('assignment_id', $id);
        $this->db->delete('assignments');

        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('success', 'Tugas berhasil dihapus');
            redirect('mentor/assignment/' . $id_subject);
        } else {
            $this->session->set_flashdata('fail', 'Tugas gagal dihapus');
            redirect('mentor/assignment/' . $id_subject);
        }
    }

    public function edit_task($id, $id_subject)
    {

        $title = $this->input->post('title');
        $startDate = $this->input->post('start-date');
        $endDate = $this->input->post('end-date');
        $description = $this->input->post('desc');
        $type = $this->input->post('type');

        $config['upload_path'] = './assets/upload/assignment_questions/';
        $config['allowed_types'] = 'png|jpg|jpeg|txt|pdf|doc|xls|ppt|docx|xlsx|pptx|zip|rar';
        $config['max_size'] = 2048; // 2MB
        $config['encrypt_name'] = TRUE; // nama file akan diacak

        if (!empty($_FILES['dokumen']['name'])) {

            $this->upload->initialize($config);

            if ($this->upload->do_upload('dokumen')) {
                $uploadData = $this->upload->data();
                $dokumenName = $uploadData['file_name'];
            } else {
                $this->session->set_flashdata('fail', "Gagal upload file: " . $this->upload->display_errors());
                redirect('mentor/assignment/' . $id_subject);
            }
        } else {
            $dokumenName = '';
        }

        $dataUploadAssignment = [
            "assignment_id" => $id,
            "assignment_name" => $title,
            "assignment_start_date" => $startDate,
            "assignment_end_date" =>  $endDate,
            "assignment_desc" => $description,
            "assignment_type" => $type,
            "mentor_id" => $this->session->userdata('user_id')
        ];

        $this->db->where('assignment_id', $id);
        $this->db->update('assignments', $dataUploadAssignment);

        if ($dokumenName != "") {
            $dataUploadQuestion = [
                "question_filename" => $dokumenName,
                "question_upload_date" => date('Y-m-d h:i:s'),
                "assignment_id" => $id
            ];

            $this->db->where('assignment_id', $id);
            $this->db->update('assignment_questions', $dataUploadQuestion);
        }


        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('success', 'Tugas berhasil diubah');
            redirect('mentor/assignment/' . $id_subject);
        } else {
            $this->session->set_flashdata('fail', 'Tugas gagal diubah');
            redirect('mentor/assignment/' . $id_subject);
        }
    }
}
