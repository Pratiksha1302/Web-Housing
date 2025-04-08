<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area_master extends CI_Controller {
	
	public function index()
	{
		if(isset($_SESSION['logged_in']))
		{
			$datas['web_menu'] = "extra";
			$datas['web_submenu'] = "area_details";
			$this->load->model("Model_master");
	        //$datas['area'] = $this->Model_master->selectAllData('area_master');
			$this->load->view("admin/area_master",$datas);
		}
		else
		{
			$this->session->set_flashdata('error', 'You Have To Login First!!');
			redirect("Login_master");
		}
	}

}







?>