<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function login_action()
    {
        // API endpoint URL
        $api_url = 'http://localhost:3000/api/users/login';

        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);

        // User credentials
        $data = array(
            'user_email' => $email,
            'user_password' => $password
        );

        // Convert the data to JSON format
        $json_data = json_encode($data);

        // Initialize cURL session
        $ch = curl_init($api_url);

        // Set cURL options for the POST request
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

        // Set the "Content-Type" header to indicate JSON
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        // Execute the cURL request
        $response = curl_exec($ch);

        // Check for cURL errors
        if ($response === false) {
            echo "cURL Error: " . curl_error($ch);
            $this->session->set_flashdata('fail', curl_error($ch));
            redirect('Auth');
            // Handle the error accordingly
        } else {
            // Handle the API response (e.g., JSON decoding)
            $api_data = json_decode($response);

            // Check for JSON decoding errors

            // Process the API response data
            if ($api_data->error === false) {
                // Login successful, handle the token or user data
                $token = $api_data->token;
                $role = $api_data->data->role;
                $username = $api_data->data->username;
                $batch = $api_data->data->batch;
                $token = $api_data->token;
                $id = $api_data->data->id;

                $userdata = [
                    "token" => $token,
                    "email" => $email,
                    "username" => $username,
                    "role" => $role,
                    "batch_id" => $batch,
                    "user_id" => $id
                ];
                $this->session->set_userdata($userdata);

                switch ($role) {
                    case 1:
                        break;
                    case 2:
                        redirect('mentor');
                        break;
                    case 3:
                        redirect('dashboard/student');
                        break;
                }
            } else {
                // Login failed, handle the error message
                $this->session->set_flashdata('fail', $api_data->message);
                redirect('auth');
                
            }
        }

        // Close cURL session
        curl_close($ch);
    }

    public function logout(){
        session_destroy();
        redirect('Auth');
    }
}
