<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Notfound extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['judul'] = "404 | Maaf Halaman yang anda cari tidak ada";
		$this->load->view('notfound', $data);
	}
}


/* End of file Notfound.php */
/* Location: ./application/controllers/Notfound.php */
