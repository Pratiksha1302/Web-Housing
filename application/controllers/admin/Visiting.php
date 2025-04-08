<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visiting extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_master');
	}

	public function index()
	{	
		$datas['web_menu'] = "others";
		$datas['web_submenu'] = "visiting";

		$from="hostel_master hm,visitor_master vm";
		$where="hm.hostel_id=vm.hostel_id";
		$datas['hostel']=$this->Model_master->jointable($from,$where);
		$this->load->view("admin/visiting",$datas);
	}

	public function deleteVisit()
	{
		if (isset($_GET['id']) && $_GET['id']!="")
		{
			$id=array("visitor_id"=>$_GET['id']);
			if($this->Model_master->deletedata("visitor_master",$id))
			{
				$this->session->set_flashdata("del","Appointment is deleted successfully");
				redirect("admin/visiting");
			}
		}
	}
}
