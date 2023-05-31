<?php

class Data_User extends CI_Controller
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
        $data['title'] = 'Data User';
        $data['user'] = $this->user_model->get_data('user')->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_user', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_data()
    {
        $data['title'] = 'Tambah Data User';
        $data['tipe_user'] = $this->user_model->get_data('tipe_user')->result();
        $data['user'] = $this->user_model->get_data('user')->result();
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambah_data_user', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_data_aksi()
    {

        $this->form_validation->set_rules('nama', 'Nama User', 'required', ['required' => 'Nama User Harus Diisi']);
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required', ['required' => 'Tempat Lahir Harus Diisi']);
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required', ['required' => 'Tanggal Lahir Harus Diisi']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', ['required' => 'Alamat Harus Diisi']);
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required', ['required' => 'Nomor Telepon Harus Diisi']);
        $this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username Harus Diisi']);
        $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password Harus Diisi']);
        $this->form_validation->set_rules('id_tipeUser', 'ID Tipe User', 'required', ['required' => 'ID TIpe User Harus Diisi']);

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_data();
        } else {
            $nama           = $this->input->post('nama');
            $tempat_lahir   = $this->input->post('tempat_lahir');
            $tanggal_lahir  = $this->input->post('tanggal_lahir');
            $alamat         = $this->input->post('alamat');
            $no_telp        = $this->input->post('no_telp');
            $username       = $this->input->post('username');
            $password       = $this->input->post('password');
            $photo          = $_FILES['photo']['name'];
            if ($photo = '') {
            } else {
                $config['upload_path'] = './assets/photo/';
                $config['allowed_types'] = 'jpg|png|gif';
                $config['file_name'] = 'user_' . substr(md5(rand()), 0, 10);
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('photo')) {
                    echo $this->upload->display_errors();
                } else {
                    $photo = $this->upload->data('file_name');
                }
            }

            $id_tipeUser    = $this->input->post('id_tipeUser');

            $data = array(
                'nama'          => $nama,
                'tempat_lahir'  => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'alamat'        => $alamat,
                'no_telp'       => $no_telp,
                'username'      => $username,
                'password'      => $password,
                'photo'         => $photo,
                'id_tipeUser'   => $id_tipeUser
            );

            $this->user_model->insert_data($data, 'user');
            $this->session->set_flashdata('pesan', '<div class ="alert alert-success alert-dismissible">
                <strong>Data berhasil ditambahkan!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>');
            redirect('admin/data_user');
        }
    }


    public function update_data($id)
    {
        $data['title'] = 'Update Data User';

        $where = array('id_user' => $id);
        $data['user'] = $this->db->query("select * from user 
        where id_user = '$id'")->result();
        $data['tipe_user'] = $this->user_model->get_data('tipe_user')->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/update_data_user', $data);
        $this->load->view('templates_admin/footer');
    }

    public function update_data_aksi()
    {
        $this->form_validation->set_rules('nama', 'Nama User', 'required', ['required' => 'Nama User Harus Diisi']);
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required', ['required' => 'Tempat Lahir Harus Diisi']);
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required', ['required' => 'Tanggal Lahir Harus Diisi']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', ['required' => 'Alamat Harus Diisi']);
        $this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required', ['required' => 'Nomor Telepon Harus Diisi']);
        $this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username Harus Diisi']);
        $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password Harus Diisi']);
        $this->form_validation->set_rules('id_tipeUser', 'ID Tipe User', 'required', ['required' => 'ID TIpe User Harus Diisi']);

        if ($this->form_validation->run() == FALSE) {
            $this->update_data();
        } else {
            $id         = $this->input->post('id_user');
            $nama           = $this->input->post('nama');
            $tempat_lahir   = $this->input->post('tempat_lahir');
            $tanggal_lahir  = $this->input->post('tanggal_lahir');
            $alamat         = $this->input->post('alamat');
            $no_telp        = $this->input->post('no_telp');
            $username       = $this->input->post('username');
            $password       = $this->input->post('password');
            $photo          = $_FILES['photo']['name'];
            if ($photo = '') {
            } else {
                $config['upload_path'] = './assets/photo/';
                $config['allowed_types'] = 'jpg|png|gif';
                $config['file_name'] = 'user_' . substr(md5(rand()), 0, 10);
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('photo')) {
                    echo $this->upload->display_errors();
                } else {
                    $photo = $this->upload->data('file_name');
                }
            }

            $id_tipeUser       = $this->input->post('id_tipeUser');

            $data = array(
                'nama'          => $nama,
                'tempat_lahir'  => $tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'alamat'        => $alamat,
                'no_telp'       => $no_telp,
                'username'      => $username,
                'password'      => $password,
                'photo'         => $photo,
                'id_tipeUser'   => $id_tipeUser
            );

            $where = array('id_user' => $id);

            $this->tipe_user_model->update_data('user', $data, $where);
            $this->session->set_flashdata('pesan', '<div class ="alert alert-warning alert-dismissible">
                <strong>Data berhasil diupdate!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>');
            redirect('admin/data_user');
        }
    }

    public function delete_data($id)
    {
        $where = array('id_user' => $id);
        $this->tipe_user_model->delete_data('user', $where);

        $this->session->set_flashdata('pesan', '<div class ="alert alert-danger alert-dismissible">
                <strong>Data berhasil dihapus!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>');
        redirect('admin/data_user');
    }
}
