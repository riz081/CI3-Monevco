<?php

class Hasil_terapi extends CI_Controller
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
        $data['title'] = 'Hasil Terapi';
        $data['hasil_terapi'] = $this->hasil_terapi_model->get_data('hasil_terapi')->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/hasil_terapi', $data);
        $this->load->view('templates_admin/footer');
    }

    public function tambah_data()
    {
        $data['title'] = 'Input Hasil Terapi';

        $data['userT'] = $this->db->query("SELECT nama FROM user WHERE id_tipeUser = 2")->result();
        $data['userP'] = $this->db->query("SELECT nama FROM user WHERE id_tipeUser = 3")->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambah_hasil_terapi', $data);
        $this->load->view('templates_admin/footer');
    }


    public function tambah_data_aksi()
    {
        $this->form_validation->set_rules('rom', 'ROM', 'required', ['required' => 'ROM Harus Diisi']);
        $this->form_validation->set_rules('dorsifleksi', 'Dorsifleksi', 'required', ['required' => 'Dorsifleksi Harus Diisi']);
        $this->form_validation->set_rules('plantarfleksi', 'Plantarfleksi', 'required', ['required' => 'Plantarfleksi Harus Diisi']);
        $this->form_validation->set_rules('durasi_langkah', 'Durasi Langkah', 'required', ['required' => 'Durasi Langkah Harus Diisi']);
        $this->form_validation->set_rules('jumlah_langkah', 'Jumlah Langkah', 'required', ['required' => 'Jumlah Langkah Harus Diisi']);
        $this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'required', ['required' => 'Nama Pasien Harus Diisi']);
        $this->form_validation->set_rules('nama_terapis', 'Nama Terapis', 'required', ['required' => 'Nama Terapis Harus Diisi']);
        $this->form_validation->set_rules('status', 'Status', 'required', ['required' => 'Status Harus Diisi']);

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_data();
        } else {
            $rom = $this->input->post('rom');
            $dorsifleksi = $this->input->post('dorsifleksi');
            $plantarfleksi = $this->input->post('plantarfleksi');
            $durasi_langkah = $this->input->post('durasi_langkah');
            $jumlah_langkah = $this->input->post('jumlah_langkah');
            $nama_pasien = $this->input->post('nama_pasien');
            $nama_terapis = $this->input->post('nama_terapis');
            $status = $this->input->post('status');

            $data = array(
                'rom' => $rom,
                'dorsifleksi' => $dorsifleksi,
                'plantarfleksi' => $plantarfleksi,
                'durasi_langkah' => $durasi_langkah,
                'jumlah_langkah' => $jumlah_langkah,
                'nama_pasien' => $nama_pasien,
                'nama_terapis' => $nama_terapis,
                'status' => $status
            );

            $this->hasil_terapi_model->insert_data($data, 'hasil_terapi');
            $this->session->set_flashdata('pesan', '<div class ="alert alert-success alert-dismissible">
                <strong>Data berhasil ditambahkan!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>');
            redirect('admin/hasil_terapi');
        }
    }


    public function update_data($id)
    {
        $data['title'] = 'Update Hasil Terapi';

        $data['userT'] = $this->db->query("SELECT nama FROM user WHERE id_tipeUser = 2")->result();
        $data['userP'] = $this->db->query("SELECT nama FROM user WHERE id_tipeUser = 3")->result();

        $where = array('id_hasil_terapi' => $id);
        $data['hasil_terapi'] = $this->db->query("select * from hasil_terapi 
        where id_hasil_terapi = '$id'")->result();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/update_hasil_terapi', $data);
        $this->load->view('templates_admin/footer');
    }


    public function update_data_aksi()
    {
        $this->form_validation->set_rules('rom', 'ROM', 'required', ['required' => 'ROM Harus Diisi']);
        $this->form_validation->set_rules('dorsifleksi', 'Dorsifleksi', 'required', ['required' => 'Dorsifleksi Harus Diisi']);
        $this->form_validation->set_rules('plantarfleksi', 'Plantarfleksi', 'required', ['required' => 'Plantarfleksi Harus Diisi']);
        $this->form_validation->set_rules('durasi_langkah', 'Durasi Langkah', 'required', ['required' => 'Durasi Langkah Harus Diisi']);
        $this->form_validation->set_rules('jumlah_langkah', 'Jumlah Langkah', 'required', ['required' => 'Jumlah Langkah Harus Diisi']);
        $this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'required', ['required' => 'Nama Pasien Harus Diisi']);
        $this->form_validation->set_rules('nama_terapis', 'Nama Terapis', 'required', ['required' => 'Nama Terapis Harus Diisi']);
        $this->form_validation->set_rules('status', 'Status', 'required', ['required' => 'Status Harus Diisi']);


        $id         = $this->input->post('id_hasil_terapi');
        $rom = $this->input->post('rom');
        $dorsifleksi = $this->input->post('dorsifleksi');
        $plantarfleksi = $this->input->post('plantarfleksi');
        $durasi_langkah = $this->input->post('durasi_langkah');
        $jumlah_langkah = $this->input->post('jumlah_langkah');
        $nama_pasien = $this->input->post('nama_pasien');
        $nama_terapis = $this->input->post('nama_terapis');
        $status = $this->input->post('status');

        $data = array(
            'rom' => $rom,
            'dorsifleksi' => $dorsifleksi,
            'plantarfleksi' => $plantarfleksi,
            'durasi_langkah' => $durasi_langkah,
            'jumlah_langkah' => $jumlah_langkah,
            'nama_pasien' => $nama_pasien,
            'nama_terapis' => $nama_terapis,
            'status' => $status
        );

        $where = array('id_hasil_terapi' => $id);

        $this->hasil_terapi_model->update_data('hasil_terapi', $data, $where);
        $this->session->set_flashdata('pesan', '<div class ="alert alert-warning alert-dismissible">
                <strong>Data berhasil diupdate!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>');
        redirect('admin/hasil_terapi');
    }

    public function delete_data($id)
    {
        $where = array('id_hasil_terapi' => $id);
        $this->hasil_terapi_model->delete_data('hasil_terapi', $where);

        $this->session->set_flashdata('pesan', '<div class ="alert alert-danger alert-dismissible">
                <strong>Data berhasil dihapus!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>');
        redirect('admin/hasil_terapi');
    }
}
