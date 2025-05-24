<?php

class BatchModel extends CI_Model{
    

    public function getStudentBatch($batch_id){
        $query = "SELECT * FROM batch WHERE batch_id = $batch_id";
        $execute = $this->db->query($query);
        $data = $execute->result();

        if(!empty($data)){
            return $data;
        }else{
            return 0;
        }
    }

}