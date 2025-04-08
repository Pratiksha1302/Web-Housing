<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tifin_source_master extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_master');
		$table = "Tifin_source_master";
	}

	public function index()
	{
		if(isset($_SESSION['logged_in']))
		{
			$datas['web_menu'] = "tifin_details";
			$datas['web_submenu'] = "source_details";
			$datas['data'] = $this->Model_master->selectAllData("tifin_source_master");
			$this->load->view("admin/source_details_master",$datas);
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
			$tifin_source_name = $_POST['tifin_source_name'];
			$tifin_source_address = $_POST['tifin_source_address'];
			$tifin_source_phone = $_POST['tifin_source_phone'];

			$data = array("tifin_source_name"=>$tifin_source_name,"tifin_source_address"=>$tifin_source_address,"tifin_source_phone"=>$tifin_source_phone);
			if ($this->Model_master->insertdata("tifin_source_master",$data)) 
			{
				$this->session->set_flashdata('success',"Data is insert successfully!!" );
				redirect('admin/Tifin_source_master');
			} 
			else 
			{
				$this->session->set_flashdata('del',"Data not insert successfully!!" );
				redirect('admin/Tifin_source_master');
			}
			
		} 
		else 
		{
			$this->session->set_flashdata('del',"Data not insert successfully!!" );
			redirect('admin/Tifin_source_master');
		}
		
	}

	public function update()
	{
		if (isset($_POST['edit']) && $_POST['edit']!="") 
		{
			$id = array("tifin_source_id"=>$_POST['tifin_source_id']);

			$tifin_source_name = $_POST['tifin_source_name'];
			$tifin_source_address = $_POST['tifin_source_address'];
			$tifin_source_phone = $_POST['tifin_source_phone'];

			$data = array("tifin_source_name"=>$tifin_source_name,"tifin_source_address"=>$tifin_source_address,"tifin_source_phone"=>$tifin_source_phone);
			if ($this->Model_master->updatedata("tifin_source_master",$data,$id)) 
			{
				$this->session->set_flashdata('edit',"Data is Updated Successfully!!" );
				redirect('admin/Tifin_source_master');
			} 
			else 
			{
				$this->session->set_flashdata('del',"Data is not Updated successfully!!" );
				redirect('admin/Tifin_source_master');
			}
			
		} 
		else 
		{
			$this->session->set_flashdata('del',"Data is not Updated successfully!!" );
			redirect('admin/Tifin_source_master');
		}
		
	}

	public function fetch()
	{
		if (isset($_POST['tifin_source_id']) && $_POST['tifin_source_id']!="") 
		{
			$id = array("tifin_source_id"=>$_POST['tifin_source_id']);
			if($data = $this->Model_master->selectDataById("Tifin_source_master",$id))
			{
				// print_r($data);
				foreach ($data as $key) {
					$result = array('tifin_source_id' =>$key->tifin_source_id,'tifin_source_name' =>$key->tifin_source_name,'tifin_source_address' =>$key->tifin_source_address,'tifin_source_phone' =>$key->tifin_source_phone);
				}
				echo json_encode($result);
			}
			else 
			{
				$this->session->set_flashdata('del',"The Data is not Found!!" );
				redirect('admin/Tifin_source_master');	
			}
		} 
		else 
		{
			$this->session->set_flashdata('del',"The Data is not Found!!" );
			redirect('admin/Tifin_source_master');	
		}
		
	}

	public function delete()
	{
		if (isset($_POST['tifin_source_id']) && $_POST['tifin_source_id']!="") 
		{
			$id = array("tifin_source_id"=>$_POST['tifin_source_id']);
			if ($this->Model_master->deletedata("Tifin_source_master",$id)) 
			{
				if($this->session->set_flashdata('del',"The Data is Deleted!!" ))
				{
					redirect('admin/Tifin_source_master');	
				}
			} 
			else 
			{
				$this->session->set_flashdata('del',"The Data is not Deleted!!" );
				redirect('admin/Tifin_source_master');		
			}
			
		} 
		else 
		{
			$this->session->set_flashdata('del',"The Data is not Found!!" );
			redirect('admin/Tifin_source_master');
		}
		
	}

}
?>