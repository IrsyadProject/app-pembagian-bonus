<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function login()
	{
		if ($this->session->userdata('logged_in')) {
			redirect('dashboard');
		}

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data['judul'] = 'Halaman Login';
			$this->load->view('auth/login', $data);
		} else {
			$this->load->model('User_model');
			$user = $this->User_model->get_user($this->input->post('username'));
			if ($user && password_verify($this->input->post('password'), $user->password)) {
				$this->session->set_userdata('logged_in', $user);
				$this->session->set_flashdata('message', ['type' => 'success', 'text' => 'Signed in successfully']);
				redirect('dashboard');
			} else {
				$this->session->set_flashdata('message', ['type' => 'error', 'text' => 'Invalid username or password']);
				redirect('login');
			}
		}
	}

	public function register()
	{
		$this->load->model('User_model');
		$user_count = $this->User_model->get_user_count();
		if ($user_count < 2) {
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('role', 'Role', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['judul'] = 'Halaman Registrasi';
				$this->load->view('auth/register', $data);
			} else {
				$data = [
					'username' => $this->input->post('username'),
					'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
					'role' => $this->input->post('role')
				];
				$this->User_model->create_user($data);
				$this->session->set_flashdata('message', ['type' => 'success', 'text' => 'Registration successful']);
				redirect('login');
			}
		} else {
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		$this->session->set_flashdata('message', ['type' => 'success', 'text' => 'Logged out successfully']);
		redirect('login');
	}
}


/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */
