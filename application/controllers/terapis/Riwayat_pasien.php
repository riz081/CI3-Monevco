<?php

class Riwayat_pasien extends CI_Controller
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
        $data['title'] = 'Riwayat Terapi Pasien';
        // $data['riwayat_terapi'] = $this->riwayat_terapi_model->get_data('riwayat_terapi')->result();

        $user = $this->session->userdata('nama');
        $data['riwayat_terapi'] = $this->db->query("SELECT * FROM riwayat_terapi rt, user u WHERE rt.nama_terapis = u.nama AND u.nama = '$user'")->result();

        $this->load->view('templates_terapis/header', $data);
        $this->load->view('templates_terapis/sidebar');
        $this->load->view('terapis/riwayat_pasien', $data);
        $this->load->view('templates_terapis/footer');
    }

    public function tambah_data()
    {
        $data['title'] = 'Input Riwayat Terapi Pasien';

        $data['userT'] = $this->db->query("SELECT nama FROM user WHERE id_tipeUser = 2")->result();
        $data['userP'] = $this->db->query("SELECT nama FROM user WHERE id_tipeUser = 3")->result();
        // $data['hasil_terapi'] = $this->riwayat_terapi_model->get_data('hasil_terapi')->result();

        $this->load->view('templates_terapis/header', $data);
        $this->load->view('templates_terapis/sidebar');
        $this->load->view('terapis/input_riwayat_pasien', $data);
        $this->load->view('templates_terapis/footer');
    }


    public function tambah_data_aksi()
    {
        $this->form_validation->set_rules('catatan', 'Catatan', 'required', ['required' => 'Catatan Harus Diisi']);
        $this->form_validation->set_rules('nama_terapis', 'Nama Terapis', 'required', ['required' => 'Nama Terapis Harus Diisi']);
        $this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'required', ['required' => 'Nama Pasien Harus Diisi']);
        $this->form_validation->set_rules('status', 'Status', 'required', ['required' => 'Status Harus Diisi']);
        $this->form_validation->set_rules('hari', 'Hari', 'required', ['required' => 'Hari Harus Diisi']);

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_data();
        } else {
            $catatan = $this->input->post('catatan');
            $nama_terapis = $this->input->post('nama_terapis');
            $nama_pasien = $this->input->post('nama_pasien');
            $status = $this->input->post('status');
            $hari = $this->input->post('hari');

            $data = array(
                'catatan' => $catatan,
                'nama_terapis' => $nama_terapis,
                'nama_pasien' => $nama_pasien,
                'status' => $status,
                'hari' => $hari
            );

            $this->riwayat_terapi_model->insert_data($data, 'riwayat_terapi');
            $this->session->set_flashdata('pesan', '<div class ="alert alert-success alert-dismissible">
                <strong>Data berhasil ditambahkan!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>');
            redirect('terapis/riwayat_pasien');
        }
    }


    public function update_data($id)
    {
        $data['title'] = 'Update Riwayat Terapi';

        $where = array('id_riwayatTerapi' => $id);
        $data['riwayat_terapi'] = $this->db->query("select * from riwayat_terapi 
        where id_riwayatTerapi = '$id'")->result();
        $data['userT'] = $this->db->query("SELECT nama FROM user WHERE id_tipeUser = 2")->result();
        $data['userP'] = $this->db->query("SELECT nama FROM user WHERE id_tipeUser = 3")->result();

        $this->load->view('templates_terapis/header', $data);
        $this->load->view('templates_terapis/sidebar');
        $this->load->view('terapis/update_riwayat_pasien', $data);
        $this->load->view('templates_terapis/footer');
    }


    public function update_data_aksi()
    {
        $this->form_validation->set_rules('catatan', 'Catatan', 'required', ['required' => 'Catatan Harus Diisi']);
        $this->form_validation->set_rules('nama_terapis', 'Nama Terapis', 'required', ['required' => 'Nama Terapis Harus Diisi']);
        $this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'required', ['required' => 'Nama Pasien Harus Diisi']);
        $this->form_validation->set_rules('status', 'Status', 'required', ['required' => 'Status Harus Diisi']);
        $this->form_validation->set_rules('hari', 'Hari', 'required', ['required' => 'Hari Harus Diisi']);

        $id = $this->input->post('id_riwayatTerapi');
        $catatan = $this->input->post('catatan');
        $nama_terapis = $this->input->post('nama_terapis');
        $nama_pasien = $this->input->post('nama_pasien');
        $status = $this->input->post('status');
        $hari = $this->input->post('hari');

        $data = array(
            'catatan' => $catatan,
            'nama_terapis' => $nama_terapis,
            'nama_pasien' => $nama_pasien,
            'status' => $status,
            'hari' => $hari
        );

        $where = array(
            'id_riwayatTerapi' => $id
        );

        $this->riwayat_terapi_model->update_data($where, $data, 'riwayat_terapi');
        $this->session->set_flashdata('pesan', '<div class ="alert alert-warning alert-dismissible">
                <strong>Data berhasil diupdate!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>');
        redirect('terapis/riwayat_pasien');
    }

    public function delete_data($id)
    {
        $where = array('id_riwayatTerapi' => $id);
        $this->riwayat_terapi_model->delete_data('riwayat_terapi', $where);

        $this->session->set_flashdata('pesan', '<div class ="alert alert-danger alert-dismissible">
                <strong>Data berhasil dihapus!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>');
        redirect('terapis/riwayat_pasien');
    }
}
