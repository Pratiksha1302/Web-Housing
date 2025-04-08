<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tifin_attendance_master extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_master');
	}

	public function index()
	{
		if(isset($_SESSION['logged_in']))
		{
			$datas['web_menu'] = "tifin_details";
			$datas['web_submenu'] = "attendance_details";
			$from = "tiffin_master tm,reg_master rm";
			$where = "rm.reg_id = tm.reg_id";
			$datas['reg_data'] = $this->Model_master->jointable($from,$where);

			$from = "tiffin_master tm,reg_master rm,tiffin_attendance_master tam";
			$where = "tam.tiffin_id=tm.tiffin_id and rm.reg_id = tm.reg_id";
			$datas['attendance_data'] = $this->Model_master->jointable($from,$where);

			$this->load->view("admin/attendance_details_master",$datas);

			// echo "<pre>";
			// print_r($datas);
		}
		else
		{
			$this->session->set_flashdata('error', 'You Have To Login First!!');
			redirect("Login_master");
		}
	}

	public function insert_data()
	{
		if(isset($_POST['add']) && $_POST['add']!="")
		{
			$tiffin_id = $_POST['tiffin_id'];
			$reg_id = $_POST['reg_id'];
			$attendance_date = $_POST['attendance_date'];

			$data = array('tiffin_id' => $tiffin_id,'reg_id' => $reg_id,'attendance_date' => $attendance_date);
			$rsl = $this->Model_master->insertdata('tiffin_attendance_master',$data);
			if ($rsl == true) 
			{
				$this->session->set_flashdata('success', 'Data saved Successfully');
				redirect("admin/Tifin_attendance_master");
			}
			else
			{
				$this->session->set_flashdata('del', 'Data is not saved Successfully');
				redirect("admin/Tifin_attendance_master");
			}
		}
	}

	public function fetch_tiffin()
	{	
		// echo $_POST['reg_id'] = '17';
		if (isset($_POST['reg_id']) && $_POST['reg_id']!="") 
		{
			$id = array('reg_id' => $_POST['reg_id']);
			$rsl = $this->Model_master->selectDataById('tiffin_master',$id);
			foreach ($rsl as $key) 
			{
				$result = array('reg_id' => $key->reg_id,'tiffin_id' => $key->tiffin_id,'meal_type' => $key->meal_type,'meal_week' => $key->meal_week,'meal_qty' => $key->meal_qty);
			}
			// print_r($result);
			echo json_encode($result);
		}
	}

	public function delete()
	{
		if (isset($_GET['del']) && $_GET['del']!="") 
		{
			$id = array('attendance_id' => $_GET['del']);
			$rsl = $this->Model_master->deletedata('tiffin_attendance_master',$id);
			if ($rsl == true) 
			{
				$this->session->set_flashdata('success', 'Data Deleted Successfully');
				redirect("admin/Tifin_attendance_master");
			}
			else
			{
				$this->session->set_flashdata('del', 'Data is not Deleted Successfully');
				redirect("admin/Tifin_attendance_master");
			}
		}
	}

}
?>