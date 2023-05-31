<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Form Login";
			$this->load->view('templates_admin/Header', $data);
			$this->load->view('form_login');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$cek = $this->monevco_model->cek_login($username, $password);

			if ($cek == FALSE) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"><Strong>Username atau Password Salah!</Strong>
				<button type = "button" class ="close" data-dismiss="alert"
				aria-label="Close"
				<span aria-hidden = "true">&times;</span>
				</button>
				</div>');
				redirect('welcome');
			} else {
				$this->session->set_userdata('id_tipeUser', $cek->id_tipeUser);
				$this->session->set_userdata('id_user', $cek->id_user);
				$this->session->set_userdata('nama', $cek->nama);
				$this->session->set_userdata('photo', $cek->photo);
				switch ($cek->id_tipeUser) {
					case 1:
						redirect('admin/dashboard');
						break;
					case 2:
						redirect('terapis/dashboard');
						break;
					case 3:
						redirect('pasien/dashboard');
						break;
					default:
						break;
				}
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('welcome');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username harus diisi']);
		$this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password harus diisi']);
	}
}
