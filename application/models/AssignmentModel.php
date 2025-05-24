<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AssignmentModel extends CI_Model {

    private $table = 'assignments'; // ganti dengan nama tabel kamu

    public function __construct() {
        parent::__construct();
    }

    /**
     * Generate next integer ID (contoh: 21 jika terakhir 20)
     */
    public function generateNextId() {
        $this->db->select_max('assignment_id');
        $query = $this->db->get($this->table);
        $row = $query->row();
    
        // ambil nilai maximum dari kolom assignment_id
        $nextId = isset($row->assignment_id) ? ((int) $row->assignment_id + 1) : 1;
    
        // Optional: validasi agar tidak duplikat (safety check)
        while ($this->checkIdExists($nextId)) {
            $nextId++;
        }
    
        return $nextId;
    }

    /**
     * Check apakah ID sudah ada di tabel
     */
    public function checkIdExists($id) {
        return $this->db->where('assignment_id', $id)
                        ->get($this->table)
                        ->num_rows() > 0;
    }

    /**
     * Insert user dengan ID urut otomatis
     */
    public function insertUser($data) {
        $data['id'] = $this->generateNextId();
        return $this->db->insert($this->table, $data);
    }
}
