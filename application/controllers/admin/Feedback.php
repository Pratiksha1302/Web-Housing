<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_master');
	}

	public function index()
	{	
		$datas['web_menu'] = "others";
		$datas['web_submenu'] = "feedback";

		$datas['feedback']=$this->Model_master->selectAllData("feedback_master");
		$this->load->view("admin/feedback",$datas);
	}

	public function deleteFeedback()
	{
		if (isset($_GET['id']) && $_GET['id']!="")
		{
			$id=array("feedback_id"=>$_GET['id']);
			if($this->Model_master->deletedata("feedback_master",$id))
			{
				$this->session->set_flashdata("del","Feedback is deleted successfully");
				redirect("admin/feedback");
			}
		}
	}
}
