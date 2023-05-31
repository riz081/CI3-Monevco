<?php

class Riwayat_terapi extends CI_Controller
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
        $data['title'] = 'Riwayat Terapi';
        // $data['riwayat_terapi'] = $this->riwayat_terapi_model->get_data('riwayat_terapi')->result();
        // $data['user'] = $this->riwayat_terapi_model->get_data('user')->result();
        // $data['jadwal'] = $this->riwayat_terapi_model->get_data('jadwal')->result();
        // $data['hasil_terapi'] = $this->riwayat_terapi_model->get_data('hasil_terapi')->result();

        $user = $this->session->userdata('nama');
        $data['riwayat_terapi'] = $this->db->query("SELECT * FROM riwayat_terapi rt, user u WHERE rt.nama_pasien = u.nama AND u.nama = '$user'")->result();

        $this->load->view('templates_pasien/header', $data);
        $this->load->view('templates_pasien/sidebar');
        $this->load->view('pasien/riwayat_terapi', $data);
        $this->load->view('templates_pasien/footer');
    }
}
