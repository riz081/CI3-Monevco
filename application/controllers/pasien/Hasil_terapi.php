<?php

class Hasil_terapi extends CI_Controller
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
        $data['title'] = 'Hasil Terapi';

        $user = $this->session->userdata('nama');
        $data['hasil_terapi'] = $this->db->query("SELECT * FROM hasil_terapi ht, user u WHERE ht.nama_pasien = u.nama AND u.nama = '$user'")->result();

        $this->load->view('templates_pasien/header', $data);
        $this->load->view('templates_pasien/sidebar');
        $this->load->view('pasien/hasil_terapi', $data);
        $this->load->view('templates_pasien/footer');
    }
}
