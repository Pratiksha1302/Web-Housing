<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assets_bill_master extends CI_Controller
{
	
	// function __construct()
	// {
	// 	$this->load->model('Model_master');
	// }

	public function index()
	{
		$datas['web_menu'] = "hostel_bill";
		$datas['web_submenu'] = "assets_bill";
		$this->load->view("admin/asstes_bill_master",$datas);
	}

}
?>