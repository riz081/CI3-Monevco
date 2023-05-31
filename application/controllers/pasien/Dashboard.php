<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('monevco_model');
        if ($this->session->userdata('id_tipeUser') != 3) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"><Strong>Harap Login Dahulu!</Strong>
            <button type = "button" class ="close" data-dismiss="alert"
            aria-label="Close"
            <span aria-hidden = "true">&times;</span>
            </button>
            </div>');
            redirect('welcome');
        }
    }

    public function index()
    {
        $data['title'] = "Dashboard Pasien";
        // echo " INI adalah Halaman Terapis";




        $user = $this->session->userdata('nama');
        $jadwal = $this->db->query("SELECT * FROM jadwal WHERE nama_pasien = '$user'");

        $userHasil = $this->session->userdata('nama');
        $hasil_terapi = $this->db->query("SELECT * FROM hasil_terapi rt, user u WHERE rt.nama_pasien = u.nama AND u.nama = '$userHasil'");

        $userRiwayat = $this->session->userdata('nama');
        $riwayat_terapi = $this->db->query("SELECT * FROM riwayat_terapi rt, user u WHERE rt.nama_pasien = u.nama AND u.nama = '$userRiwayat'");

        $data['jadwal'] = $jadwal->num_rows();
        $data['hasil_terapi'] = $hasil_terapi->num_rows();
        $data['riwayat_terapi'] = $riwayat_terapi->num_rows();

        $data['graph'] = $this->chart_model->chart_database();

        $this->load->view('templates_pasien/Header', $data);
        $this->load->view('templates_pasien/Sidebar');
        $this->load->view('pasien/Dashboard', $data);
        $this->load->view('templates_pasien/Footer');
    }
}
