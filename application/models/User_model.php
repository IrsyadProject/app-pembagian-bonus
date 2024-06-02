<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model User_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class User_model extends CI_Model
{

	public function create_user($data)
	{
		return $this->db->insert('users', $data);
	}

	public function get_user($username)
	{
		return $this->db->get_where('users', ['username' => $username])->row();
	}

	public function get_user_count()
	{
		return $this->db->count_all('users');
	}

	public function get_all()
	{
		return $this->db->get('users')->result();
	}

	public function delete_users($id)
	{
		return $this->db->delete(
			'users',
			['id' => $id]
		);
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
