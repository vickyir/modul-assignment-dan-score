<?php

class ModulModel extends CI_Model {
    

    public function getAllModul($batch_id){
        // Using query binding for safer queries
        $query = $this->db->query("SELECT * FROM moduls WHERE batch_id = ? AND parent_id IS NULL ORDER BY modul_name ASC" , array($batch_id));
    
        // Check if the query executed successfully
        if ($query) {
            $data = $query->result(); // Use result() for multiple rows
    
            if(!empty($data)){
                return $data;
            } else {
                return []; // Return an empty array if no data is found
            }
        } else {
            // Handle query error
            log_message('error', 'Query failed: ' . $this->db->_error_message());
            return null; // or handle the error as per your application's requirement
        }
    }

}