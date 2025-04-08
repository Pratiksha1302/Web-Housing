<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_bill extends CI_Controller
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
			$data['data']=$this->Model_master->selectDataById("pg_bill_master",$id);
			foreach ($data['data'] as $s)
			{
				$reg_id=array("reg_id"=>$s->reg_id);
				$o_id=array("landlord_id"=>$s->landlord_id);
			}		
			$data['reg']=$this->Model_master->selectDataById("reg_master",$reg_id);
			$data['pg']=$this->Model_master->selectDataById("landlord_master",$o_id);	
			$this->load->view("admin/client_bill",$data);
		}
	}
}
