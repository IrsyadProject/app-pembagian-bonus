<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Bonus extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Bonus_model');
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'bonuses' => $this->Bonus_model->get_all_bonuses(),
			'judul'	=> 'Halaman Pembagian Bonus',
		);
		$this->load->view('backend/header', $data);
		$this->load->view('backend/bonus', $data);
		$this->load->view('backend/footer', $data);
	}

	public function create()
	{
		$data = array(
			'judul' => 'Tambah Pembagian Bonus',
		);
		$this->load->view('backend/header', $data);
		$this->load->view('backend/tambahbonus', $data);
		$this->load->view('backend/footer', $data);
	}

	public function store()
	{
		$total = $this->input->post('totalBonus');
		$presentase = $this->input->post('presentase');

		$data = [
			'total' => $total,
			'jumlah_buruh' => count($presentase),
			'presentase' => implode(',', $presentase),
		];

		if ($this->Bonus_model->insert_bonus($data)) {
			$this->session->set_flashdata('message', ['type' => 'success', 'text' => 'Penyimpanan bonus berhasil.']);
		} else {
			$this->session->set_flashdata('message', ['type' => 'error', 'text' => 'Gagal menyimpan bonus.']);
		}

		redirect('bonus');
	}


	public function delete($id)
	{
		$hapus = $this->Bonus_model->delete_bonus($id);

		if ($hapus) {
			$this->session->set_flashdata('message', ['type' => 'success', 'text' => 'Penghapusan bonus berhasil.']);
		} else {
			$this->session->set_flashdata('message', ['type' => 'error', 'text' => 'Gagal Menghapus bonus.']);
		}
		redirect('bonus');
	}


	public function edit($id)
	{
		$data = array(
			'judul'	=> 'Edit Bonus',
			'bonus' => $this->Bonus_model->get_bonus($id),
		);
		$this->load->view('backend/header', $data);
		$this->load->view('backend/editbonus', $data);
		$this->load->view('backend/footer', $data);
	}

	public function update($id)
	{
		$total = $this->input->post('totalBonus');
		$presentase = $this->input->post('presentase');

		$data = [
			'total' => $total,
			'jumlah_buruh' => count($presentase),
			'presentase' => implode(',', $presentase),
		];

		$update = $this->Bonus_model->update_bonus($id, $data);

		if ($update) {
			$this->session->set_flashdata('message', ['type' => 'success', 'text' => 'Edit bonus berhasil.']);
		} else {
			$this->session->set_flashdata('message', ['type' => 'error', 'text' => 'Gagal Edit bonus.']);
		}
		redirect('bonus');
	}
}



/* End of file Bonus.php */
/* Location: ./application/controllers/Bonus.php */
