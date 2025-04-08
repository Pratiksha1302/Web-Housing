<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PG_rent_master extends CI_Controller
{
	
	// function __construct()
	// {
	// 	$this->load->model('Model_master');
	// }

	public function index()
	{
		if(isset($_SESSION['logged_in']))
		{
			$datas['web_menu'] = "pg_details";
			$datas['web_submenu'] = "rent_details";
			$this->load->view("admin/rent_details_master",$datas);
		}
		else
		{
			$this->session->set_flashdata('error', 'You Have To Login First!!');
			redirect("Login_master");
		}
	}

}
?>