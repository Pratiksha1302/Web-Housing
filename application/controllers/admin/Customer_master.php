<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_master extends CI_Controller
{
	
	// function __construct()
	// {
	// 	$this->load->model('Model_master');
	// }

	public function index()
	{
		if(isset($_SESSION['logged_in']))
		{
			$datas['web_menu'] = "tifin_details";
			$datas['web_submenu'] = "customer_details";
			$this->load->view("admin/customer_details_master",$datas);
		}
		else
		{
			$this->session->set_flashdata('error', 'You Have To Login First!!');
			redirect("Login_master");
		}
	}

}
?>