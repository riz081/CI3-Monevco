<?php

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('monevco_model');
        if ($this->session->userdata('id_tipeUser') != 1) {
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
        $data['title'] = "Dashboard";
        $admin = $this->db->query("SELECT * FROM user where id_tipeUser = 1");
        $terapis = $this->db->query("SELECT * FROM user where id_tipeUser = 2");
        $pasien = $this->db->query("SELECT * FROM user where id_tipeUser = 3");
        $data['admin'] = $admin->num_rows();
        $data['terapis'] = $terapis->num_rows();
        $data['pasien'] = $pasien->num_rows();
        $this->load->view('templates_admin/Header', $data);
        $this->load->view('templates_admin/Sidebar');
        $this->load->view('admin/Dashboard', $data);
        $this->load->view('templates_admin/Footer');
    }
}
