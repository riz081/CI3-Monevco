<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('monevco_model');
        if ($this->session->userdata('id_tipeUser') != 2) {
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
        $data['title'] = "Dashboard Terapis";
        // echo " INI adalah Halaman Terapis";


        $pasien = $this->db->query("SELECT * FROM user where id_tipeUser = 3");

        $userJadwal = $this->session->userdata('nama');
        $jadwal = $this->db->query("SELECT * FROM jadwal j, user u WHERE j.nama = u.nama AND u.nama = '$userJadwal'");

        $userHasil = $this->session->userdata('nama');
        $hasil_terapi = $this->db->query("SELECT * FROM hasil_terapi ht, user u WHERE ht.nama_terapis = u.nama AND u.nama = '$userHasil'");

        $userRiwayat = $this->session->userdata('nama');
        $riwayat_terapi = $this->db->query("SELECT * FROM riwayat_terapi rt, user u WHERE rt.nama_terapis = u.nama AND u.nama = '$userRiwayat'");

        $data['pasien'] = $pasien->num_rows();
        $data['jadwal'] = $jadwal->num_rows();
        $data['hasil_terapi'] = $hasil_terapi->num_rows();
        $data['riwayat_terapi'] = $riwayat_terapi->num_rows();

        $this->load->view('templates_terapis/Header', $data);
        $this->load->view('templates_terapis/Sidebar');
        $this->load->view('terapis/Dashboard', $data);
        $this->load->view('templates_terapis/Footer');
    }
}
