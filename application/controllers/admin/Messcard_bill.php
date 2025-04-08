<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messcard_bill extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_master');
	}

	public function index()
	{
		if(isset($_GET['id']) && $_GET['id']!="")
		{
			$id=array("bill_id"=>$_GET['id']);
			$data['data']=$this->Model_master->selectDataById("messcard_bill_master",$id);
			foreach ($data['data'] as $s)
			{
				$reg_id=array("reg_id"=>$s->reg_id);
				$hostel_id=array("hostel_id"=>$s->hostel_id);
			}		
			$data['reg']=$this->Model_master->selectDataById("reg_master",$reg_id);
			$data['hostel']=$this->Model_master->selectDataById("hostel_master",$hostel_id);	
			$this->load->view("admin/messcard_bill",$data);
		}
	}
}
