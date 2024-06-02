<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Bonus_model');
		$this->load->model('User_model');
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'judul' => 'Halaman Dashboard',
			'totaldatabonus' => $this->Bonus_model->totaldatabonus(),
		);
		$this->load->view('backend/header', $data);
		$this->load->view('backend/dashboard', $data);
		$this->load->view('backend/footer', $data);
	}

	public function listusers()
	{
		$data = array(
			'judul' => 'Halaman Daftar Pengguna',
			'datausers' => $this->User_model->get_all(),
		);
		$this->load->view('backend/header', $data);
		$this->load->view('backend/listusers', $data);
		$this->load->view('backend/footer', $data);
	}

	public function hapususers($id)
	{
		$hapus = $this->User_model->delete_users($id);

		if ($hapus) {
			$this->session->set_flashdata('message', ['type' => 'success', 'text' => 'Penghapusan user berhasil.']);
		} else {
			$this->session->set_flashdata('message', ['type' => 'error', 'text' => 'Gagal Menghapus user.']);
		}
		redirect('listusers');
	}
}


/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */
