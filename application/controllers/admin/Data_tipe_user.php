<?php

class Data_tipe_user extends CI_Controller
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
        $data['title'] = 'Data Tipe User';
        $data['tipe_user'] = $this->tipe_user_model->get_data('tipe_user')->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tipe_user', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_data()
    {
        $data['title'] = 'Tambah Data Tipe User';

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambah_tipe_user', $data);
        $this->load->view('templates_admin/footer');
    }


    public function tambah_data_aksi()
    {
        $this->form_validation->set_rules('kode_user', 'Kode User', 'required', ['required' => 'Kode User Harus Diisi']);
        $this->form_validation->set_rules('tipe_user', 'Tipe User', 'required', ['required' => 'Tipe User Harus Diisi']);

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_data();
        } else {
            $kode_user = $this->input->post('kode_user');
            $tipe_user = $this->input->post('tipe_user');

            $data = array(
                'kode_user' => $kode_user,
                'tipe_user' => $tipe_user
            );

            $this->tipe_user_model->insert_data($data, 'tipe_user');
            $this->session->set_flashdata('pesan', '<div class ="alert alert-success alert-dismissible">
                <strong>Data berhasil ditambahkan!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>');
            redirect('admin/data_tipe_user');
        }
    }


    public function update_data($id)
    {
        $data['title'] = 'Update Data Tipe User';

        $where = array('id_tipeUser' => $id);
        $data['tipe_user'] = $this->db->query("select * from tipe_user 
        where id_tipeUser = '$id'")->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/update_tipe_user', $data);
        $this->load->view('templates_admin/footer');
    }


    public function update_data_aksi()
    {
        $this->form_validation->set_rules('kode_user', 'Kode User', 'required', ['required' => 'Kode User Harus Diisi']);
        $this->form_validation->set_rules('tipe_user', 'Tipe User', 'required', ['required' => 'Tipe User Harus Diisi']);

        if ($this->form_validation->run() == FALSE) {
            $this->update_data();
        } else {
            $id         = $this->input->post('id_tipeUser');
            $kode_user  = $this->input->post('kode_user');
            $tipe_user  = $this->input->post('tipe_user');

            $data = array(
                'kode_user' => $kode_user,
                'tipe_user' => $tipe_user
            );

            $where = array('id_tipeUser' => $id);

            $this->tipe_user_model->update_data('tipe_user', $data, $where);
            $this->session->set_flashdata('pesan', '<div class ="alert alert-warning alert-dismissible">
                <strong>Data berhasil diupdate!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>');
            redirect('admin/data_tipe_user');
        }
    }

    public function delete_data($id)
    {
        $where = array('id_tipeUser' => $id);
        $this->tipe_user_model->delete_data('tipe_user', $where);

        $this->session->set_flashdata('pesan', '<div class ="alert alert-danger alert-dismissible">
                <strong>Data berhasil dihapus!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>');
        redirect('admin/data_tipe_user');
    }
}
