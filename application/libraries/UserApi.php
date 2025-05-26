<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserApi {

    protected $ci;
    protected $api_base_url = 'http://localhost:3000/api/users/';
    protected $api_token;

    public function __construct() {
        $this->ci =& get_instance();

        // Load the session library if it's not autoloaded.
        // It's generally good practice to autoload session in application/config/autoload.php
        // $autoload['libraries'] = array('session');
        // If not autoloaded, ensure it's loaded in the controller that uses this library.
        // Or, you can load it directly here if strictly necessary, but be mindful of performance.
        // $this->ci->load->library('session');

        // Retrieve the token from the session.
        // Make sure the session item 'api_bearer_token' is set during login.
        $this->api_token = $this->ci->session->userdata('token');

        // Optional: Check if token exists
        if (empty($this->api_token)) {
            // Log an error or handle the case where the token is missing (e.g., user not logged in or session expired)
            log_message('error', 'API Bearer Token is missing from session.');
            // You might even throw an exception or return a specific error code
            // if an API call without a token is a critical error.
        }
    }

    /**
     * Fetches all users from the external API.
     * Includes Authorization Bearer Token (from user session) in the request headers.
     * @return array|null An array of user data, or null on failure.
     */
    public function get_all_users() {
        if (empty($this->api_token)) {
            // No token available, cannot make API call
            log_message('error', 'Attempted to fetch users without an API token.');
            return null; // Or throw an exception
        }

        $endpoint = $this->api_base_url . 'getAllUsers';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);

        $headers = [
            'Authorization: Bearer ' . $this->api_token,
            'Content-Type: application/json',
            'Accept: application/json'
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
            log_message('error', 'cURL Error when fetching users from API: ' . $error_msg . ' Endpoint: ' . $endpoint);
            curl_close($ch);
            return null;
        }

        curl_close($ch);

        if ($http_code !== 200) {
            log_message('error', 'API returned non-200 status code (' . $http_code . ') when fetching users. Response: ' . $response . ' Endpoint: ' . $endpoint);
            // Specifically handle 401 Unauthorized here if needed
            if ($http_code === 401 || $http_code === 403) {
                 log_message('warning', 'API Authentication failed for user token. Status: ' . $http_code);
                 // You might trigger a logout or re-authentication flow here in a real application.
                 // $this->ci->session->sess_destroy();
                 // redirect('login');
            }
            return null;
        }

        $data = json_decode($response, false);

        if (json_last_error() !== JSON_ERROR_NONE) {
            log_message('error', 'Failed to decode API response JSON: ' . json_last_error_msg() . ' Raw Response: ' . $response . ' Endpoint: ' . $endpoint);
            return null;
        }

        return $data;
    }
}