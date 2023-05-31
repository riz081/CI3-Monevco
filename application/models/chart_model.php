<?php

class Chart_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function chart_database()
    {
        $user = $this->session->userdata('nama');
        $data = $this->db->query("SELECT * FROM hasil_terapi ht, user u WHERE ht.nama_pasien = u.nama AND u.nama = '$user'");
        return $data->result();
    }
}
