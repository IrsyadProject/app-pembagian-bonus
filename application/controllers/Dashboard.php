<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Bonus_model');
	}

	public function index()
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}

		$data = array(
			'judul' => 'Halaman Dashboard',
			'totaldatabonus' => $this->Bonus_model->totaldatabonus(),
		);
		$this->load->view('backend/header', $data);
		$this->load->view('backend/dashboard', $data);
		$this->load->view('backend/footer', $data);
	}
}


/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */
