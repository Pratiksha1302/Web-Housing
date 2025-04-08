<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payroll_bill_master extends CI_Controller
{
	
	// function __construct()
	// {
	// 	$this->load->model('Model_master');
	// }

	public function index()
	{
		if(isset($_SESSION['logged_in']))
		{
			$datas['web_menu'] = "hostel_bill";
			$datas['web_submenu'] = "payroll_bill";
			$this->load->view("admin/payroll_bill_master",$datas);
		}
		else
		{
			$this->session->set_flashdata('error', 'You Have To Login First!!');
			redirect("Login_master");
		}
	}

}
?>