<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messcard_master extends CI_Controller
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
			$datas['web_menu'] = "hostel_details";
			$datas['web_submenu'] = "messcard_details";
			$from = "mess_card_master mm,hostel_master hm";
			$where = "mm.hostel_id = hm.hostel_id";
			$datas['data'] = $this->Model_master->jointable($from,$where);
			$datas['hostel'] = $this->Model_master->selectAllData("hostel_master");
			// echo "<pre>";
			// print_r($datas);
			$this->load->view("admin/messcard_details_master",$datas);
		}
		else
		{
			$this->session->set_flashdata('error', 'You Have To Login First!!');
			redirect("Login_master");
		}
	}

	public function insert()
	{
		if (isset($_POST['add']) && $_POST['add']!="") 
		{
			$reg_id = $_POST['reg_id'];
			$mess_start_date = $_POST['mess_start_date'];
			$mess_end_date = $_POST['mess_end_date'];

			$data = array("reg_id"=>$reg_id,"mess_start_date"=>$mess_start_date,"mess_end_date"=>$mess_end_date);

			if ($this->Model_master->insertdata("mess_card_master",$data)) 
			{
				$this->session->set_flashdata('success',"A record is inserted successfully!!");
				redirect('admin/Messcard_master');
			} 
			else 
			{
				$this->session->set_flashdata('del',"A record is not inserted successfully!!");
				redirect('admin/Messcard_master');
			}
			
		}
		else
		{
			$this->session->set_flashdata('del',"A record is not inserted successfully!!");
			redirect('admin/Messcard_master');
		}
		
	}

	public function update()
	{
		if (isset($_POST['edit']) && $_POST['edit']!="") 
		{
			$id = array('mess_card_id' =>$_POST['mess_id']);
			$reg_id = $_POST['mess_stud'];
			$mess_start_date = $_POST['mess_start_date'];
			$mess_end_date = $_POST['mess_end_date'];

			$data = array("reg_id"=>$reg_id,"mess_start_date"=>$mess_start_date,"mess_end_date"=>$mess_end_date);

			if ($this->Model_master->updatedata("mess_card_master",$data,$id)) 
			{
				$this->session->set_flashdata('edit',"A record is Updated successfully!!");
				redirect('admin/Messcard_master');
			} 
			else 
			{
				$this->session->set_flashdata('del',"A record is not Updated successfully!!");
				redirect('admin/Messcard_master');
			}

		}
		else 
		{
			$this->session->set_flashdata('del',"A record is not Updated successfully!!");
			redirect('admin/Messcard_master');	
		}
		
	}

	public function fetch()
	{
		if (isset($_POST['mess_id']) && $_POST['mess_id']!="" )
		{
			$id = array('mess_card_id' =>$_POST['mess_id']);
			$result=array();

			$data = $this->Model_master->selectDataById("mess_card_master",$id);
			foreach ($data as $result) 
			{
				$result = array("mess_card_id"=>$result->mess_card_id,"reg_id"=>$result->reg_id,"mess_start_date"=>$result->mess_start_date,"mess_end_date"=>$result->mess_end_date);
			}
			echo json_encode($result);
		}
		else
		{
			$this->session->set_flashdata('del',"A record is not Fetched successfully!!".mysql_error() );
			redirect('admin/Messcard_master');
		}
						
	}

	public function delete()
	{
		if (isset($_POST['mess_id']) && $_POST['mess_id']!="") 
		{
			$id = array('mess_card_id' =>$_POST['mess_id']);
			if ($this->Model_master->deletedata("mess_card_master",$id)) 
			{
				if($this->session->set_flashdata('del',"A record is Deleted successfully!!"))
				{
					redirect('admin/Messcard_master');
				}
			} 
			else 
			{
				$this->session->set_flashdata('del',"A record is not Deleted successfully!!");
				redirect('admin/Messcard_master');
			}
			
		} 
		else 
		{
			$this->session->set_flashdata('del',"A record is not Exists!!".mysql_error() );
			redirect('admin/Messcard_master');
		}
		
	}
}
?>