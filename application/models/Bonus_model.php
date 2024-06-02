<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Bonus_model extends CI_Model
{

	// ------------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();
	}

	// ------------------------------------------------------------------------


	// ------------------------------------------------------------------------
	public function get_all_bonuses()
	{
		return $this->db->get('bonus')->result();
	}

	public function get_bonus($id)
	{
		return $this->db->get_where(
			'bonus',
			['idbonus' => $id]
		)->row();
	}

	public function insert_bonus($data)
	{
		$this->db->insert('bonus', $data);
		return $this->db->insert_id();
	}

	public function delete_bonus($id)
	{
		return $this->db->delete(
			'bonus',
			['idbonus' => $id]
		);
	}

	public function update_bonus($id, $data)
	{
		$this->db->where('idbonus', $id);
		return $this->db->update('bonus', $data);
	}

	public function totaldatabonus()
	{
		return $this->db->get('bonus')->num_rows();
	}


	// ------------------------------------------------------------------------

}

/* End of file Bonus_model.php */
/* Location: ./application/models/Bonus_model.php */
