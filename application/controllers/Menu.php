<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Menu_model');
	}

	private function buildTree(array &$elements, $parentId = 0)
	{
		$branch = array();

		foreach ($elements as &$element) {
			if ($element['parent_id'] == $parentId) {
				$children = $this->buildTree($elements, $element['id']);
				if ($children) {
					$element['child'] = $children;
				}
				$branch[] = $element;
				unset($element);
			}
		}
		return $branch;
	}

	public function index()
	{
		$menus = $this->Menu_model->get_menus();
		$menuTree = $this->buildTree($menus);
		$data['menuTree'] = $menuTree;
		$this->load->view('menu_view', $data);
	}
}


/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */
