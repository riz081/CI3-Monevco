<?php

class Data_jadwal extends CI_Controller
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
        $data['title'] = "Data Jadwal";

        $data['jadwal'] = $this->jadwal_model->get_data('jadwal')->result();
        $data['user'] = $this->jadwal_model->get_data('user')->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_jadwal', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_data()
    {
        $data['title'] = "Tambah Data Jadwal";
        $data['user'] = $this->db->query("SELECT nama FROM user WHERE id_tipeUser = 2")->result();
        $data['userP'] = $this->db->query("SELECT nama FROM user WHERE id_tipeUser = 3")->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambah_data_jadwal', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_data_aksi()
    {

        $this->form_validation->set_rules('hari', 'Hari', 'required', ['required' => 'Hari Harus Diisi']);
        $this->form_validation->set_rules('jam', 'Jam', 'required', ['required' => 'Jam Harus Diisi']);
        $this->form_validation->set_rules('nama', 'Nama Terapis', 'required', ['required' => 'Nama Terapis Harus Diisi']);
        $this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'required', ['required' => 'Nama Pasien Harus Diisi']);

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_data();
        } else {

            $hari   = $this->input->post('hari');
            $jam           = $this->input->post('jam');
            $nama  = $this->input->post('nama');
            $nama_pasien  = $this->input->post('nama_pasien');

            $data = array(
                'hari'  => $hari,
                'jam'          => $jam,
                'nama' => $nama,
                'nama_pasien' => $nama_pasien
            );

            $this->jadwal_model->insert_data($data, 'jadwal');
            $this->session->set_flashdata('pesan', '<div class ="alert alert-success alert-dismissible">
                <strong>Data berhasil ditambahkan!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>');
            redirect('admin/data_jadwal');
        }
    }

    public function update_data($id)
    {
        $data['title'] = 'Update Data Jadwal';

        $where = array('id_jadwal' => $id);
        $data['jadwal'] = $this->db->query("select * from jadwal 
        where id_jadwal = '$id'")->result();
        $data['user'] = $this->db->query("SELECT nama FROM user WHERE id_tipeUser = 2")->result();
        $data['userP'] = $this->db->query("SELECT nama FROM user WHERE id_tipeUser = 3")->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/update_data_jadwal', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update_data_aksi()
    {
        $this->form_validation->set_rules('hari', 'Hari', 'required', ['required' => 'Hari Harus Diisi']);
        $this->form_validation->set_rules('jam', 'Jam', 'required', ['required' => 'Jam Harus Diisi']);
        $this->form_validation->set_rules('nama', 'Nama Terapis', 'required', ['required' => 'Nama Terapis Harus Diisi']);
        $this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'required', ['required' => 'Nama Pasien Harus Diisi']);

        if ($this->form_validation->run() == FALSE) {
            $this->update_data();
        } else {
            $id         = $this->input->post('id_jadwal');
            $hari           = $this->input->post('hari');
            $jam   = $this->input->post('jam');
            $nama  = $this->input->post('nama');
            $nama_pasien    = $this->input->post('nama_pasien');

            $data = array(
                'hari'          => $hari,
                'jam'  => $jam,
                'nama' => $nama,
                'nama_pasien' => $nama_pasien
            );

            $where = array('id_jadwal' => $id);

            $this->jadwal_model->update_data('jadwal', $data, $where);
            $this->session->set_flashdata('pesan', '<div class ="alert alert-warning alert-dismissible">
                <strong>Data berhasil diupdate!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>');
            redirect('admin/data_jadwal');
        }
    }

    public function delete_data($id)
    {
        $where = array('id_jadwal' => $id);
        $this->jadwal_model->delete_data('jadwal', $where);

        $this->session->set_flashdata('pesan', '<div class ="alert alert-danger alert-dismissible">
                <strong>Data berhasil dihapus!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>');
        redirect('admin/data_jadwal');
    }
}
