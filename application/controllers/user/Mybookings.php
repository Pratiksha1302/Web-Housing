<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mybookings extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_master');
	}

	public function index()
	{
		if(isset($_SESSION['user']) && $_SESSION['user']!="")
		{
			$id = $_SESSION['user'];
			$reg_data = $this->Model_master->selectDataById('reg_master',$id);
			// echo "<pre>";
			// print_r($reg_data);
			foreach ($reg_data as $key) 
			{
				$reg_id = array('reg_id' => $key->reg_id);
				$reg_email=$key->reg_email;
			}
			$from = "reg_master rm,hostel_booking_master hm";
			$where = "rm.reg_id = hm.reg_id and rm.reg_email='$reg_email'";

			$from1="hostel_master hm, hostel_booking_master hb,reg_master rm";
			$where1="hm.hostel_id=hb.hostel_id and hb.reg_id=rm.reg_id and rm.reg_email='$reg_email'";
			$data['hostel'] = $this->Model_master->jointable($from,$where);
			$data['hostel_name']=$this->Model_master->jointable($from1,$where1);

			// echo "<pre>";
			// print_r($data['hostel_name']);die;
			$from_pg="pg_master pm, pg_booking_master pb,landlord_master lm,reg_master rm";
			$where_pg="pm.pg_id = pb.pg_id and lm.landlord_id = pm.landlord_id and rm.reg_id = pb.reg_id and rm.reg_email='$reg_email'";
			$data['pg'] = $this->Model_master->jointable($from_pg,$where_pg);

			$from_tifin="tiffin_master tm,reg_master rm";
			$where_tifin="tm.reg_id = rm.reg_id and rm.reg_email='$reg_email'";
			$data['tiffin'] = $this->Model_master->jointable($from_tifin,$where_tifin);

			// print_r($data['t_id']);die;
			$this->load->view('user/mybookings',$data);
		}
		else
		{
			$this->session->set_flashdata("err","Please Login First..!!");
			redirect("user/signin");
		}
		
	}    

	public function cancel_hostel()
	{
		if (isset($_GET['id']) && $_GET['id']!="") 
		{
			$id = base64_decode($_GET['id']);
			$reg_id = array('reg_id' => $id);
			// echo "<pre>";
			// print_r($reg_id);

			if ($this->Model_master->deletedata('hostel_booking_master',$reg_id)) 
			{
				$this->session->set_flashdata("cancel","Your Booking is cancelled successfully..!!");
				redirect("user/mybookings");
			}

		}
	}

	public function cancel_pg()
	{
		if (isset($_GET['id']) && $_GET['id']!="") 
		{
			$id = base64_decode($_GET['id']);
			$reg_id = array('reg_id' => $id);
			// echo "<pre>";
			// print_r($reg_id);

			if ($this->Model_master->deletedata('pg_booking_master',$reg_id)) 
			{
				$this->session->set_flashdata("cancel","Your Booking is cancelled successfully..!!");
				redirect("user/mybookings");
			}

		}
	}

	public function cancel_tiffin()
	{
		if (isset($_GET['id']) && $_GET['id']!="") 
		{
			$id = base64_decode($_GET['id']);
			$reg_id = array('reg_id' => $id);
			// echo "<pre>";
			// print_r($reg_id);

			if ($this->Model_master->deletedata('tiffin_master',$reg_id)) 
			{
				$this->session->set_flashdata("cancel","Your Booking is cancelled successfully..!!");
				redirect("user/mybookings");
			}

		}
	}
}
