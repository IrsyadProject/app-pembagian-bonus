<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Menu_model extends CI_Model
{

	// ------------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();
	}

	// ------------------------------------------------------------------------


	// ------------------------------------------------------------------------
	public function get_menus()
	{
		$query = $this->db->get('menu');
		return $query->result_array();
	}

	// ------------------------------------------------------------------------

}

/* End of file Menu_model.php */
/* Location: ./application/models/Menu_model.php */
