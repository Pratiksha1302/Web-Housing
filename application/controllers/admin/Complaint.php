<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Complaint extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_master');
	}

	public function index()
	{	
		$datas['web_menu'] = "others";
		$datas['web_submenu'] = "complaint";

		$datas['complaint']=$this->Model_master->selectAllData("complaint_master");
		$this->load->view("admin/complaint",$datas);
	}

	public function deleteComplaint()
	{
		if (isset($_GET['id']) && $_GET['id']!="")
		{
			$id=array("complaint_id"=>$_GET['id']);
			if($this->Model_master->deletedata("complaint_master",$id))
			{
				$this->session->set_flashdata("del","Complaint is deleted successfully");
				redirect("admin/complaint");
			}
		}
	}
}
