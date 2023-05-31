<?php

class Jadwal_terapi extends CI_Controller
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
        $data['title'] = "Jadwal Terapis";

        // $data['jadwal'] = $this->jadwal_model->get_data('jadwal')->result();
        // $data['user'] = $this->jadwal_model->get_data('user')->result();


        $user = $this->session->userdata('nama');
        $data['jadwal'] = $this->db->query("SELECT * FROM jadwal WHERE nama_pasien = '$user'")->result();

        $this->load->view('templates_pasien/header', $data);
        $this->load->view('templates_pasien/sidebar');
        $this->load->view('pasien/jadwal_terapi', $data);
        $this->load->view('templates_pasien/footer');
    }
}
