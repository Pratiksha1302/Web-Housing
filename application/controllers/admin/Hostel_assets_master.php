<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hostel_assets_master extends CI_Controller
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
			$datas['web_submenu'] = "assets_details";
			$from = "assets_master am,hostel_master hm";
			$where = "am.hostel_id = hm.hostel_id";
			$datas['data'] = $this->Model_master->jointable($from,$where);
			$datas['hostel'] = $this->Model_master->selectAllData('hostel_master');
			$this->load->view("admin/assets_details_master",$datas);
		}
		else
		{
			$this->session->set_flashdata('error', 'You Have To Login First!!');
			redirect("Login_master");
		}
	}

	// add new Hostel's Asset Details
	public function insert() {
		if (isset($_POST['add']) && $_POST['add']!="") 
		{
			$assets_name = $_POST['asset_name'];
			$assets_qty = $_POST['asset_qty'];
			$price_per_qty = $_POST['asset_mrp'];
			$total_price = $_POST['asset_mrp'] * $_POST['asset_qty']; 
			$hostel_id = $_POST['hostel_name'];

			$data=array("assets_name"=>$assets_name,"assets_qty"=>$assets_qty,"price_per_qty"=>$price_per_qty,"total_price"=>$total_price,"hostel_id"=>$hostel_id);
			// echo "<pre>";
			// print_r($data);
			if($this->Model_master->insertdata("assets_master",$data))
			{
				$this->session->set_flashdata('success', 'A New Record is Added Successfully');
				redirect("admin/Hostel_assets_master");
			}
		}
	}

	// Delete Selected Hostel assets Details
	public function delete()
	{
		if (isset($_POST['asset_id']) && $_POST['asset_id']!="") {
			$id=array("assets_id"=>$_POST['asset_id']);
			$this->load->model("Model_master");
			if($this->Model_master->deletedata("assets_master",$id))
			{
				$this->session->set_flashdata('del', 'Record Deleted Successfully');
				
			}
		}
	}

	// View Selected Hostel Details
	public function fetch()
	{
		if (isset($_POST['asset_id']) && $_POST['asset_id']!="") {
			$id=array("assets_id"=>$_POST['asset_id']);
			$this->load->model('Model_master');
	        $data=$this->Model_master->selectDataById("assets_master",$id);
	        // print_r($data);
			foreach ($data as $key) {
				$result = array("assets_id"=>$key->assets_id,"assets_name"=>$key->assets_name,"assets_qty"=>$key->assets_qty,"price_per_qty"=>$key->price_per_qty,"total_price"=>$key->total_price,"hostel_id"=>$key->hostel_id);
			}
			echo json_encode($result);	
		}
		
	}

	public function update() {
		if (isset($_POST['asset_id']) && $_POST['asset_id']!="") 
		{
			$id = array('assets_id' =>$_POST['asset_id']);
			$assets_name = $_POST['asset_name'];
			$assets_qty = $_POST['asset_qty'];
			$price_per_qty = $_POST['asset_mrp'];
			$total_price = $_POST['asset_mrp'] * $_POST['asset_qty']; 
			$hostel_id = $_POST['hostel_name'];

			$data=array("assets_name"=>$assets_name,"assets_qty"=>$assets_qty,"price_per_qty"=>$price_per_qty,"total_price"=>$total_price,"hostel_id"=>$hostel_id);
			// echo "<pre>";
			// print_r($id);
			// print_r($data);
			if($this->Model_master->updatedata("assets_master",$data,$id))
			{
				$this->session->set_flashdata('edit', 'A Record is updated Successfully');
				redirect("admin/Hostel_assets_master");
			}
			else
			{
				$this->session->set_flashdata('del', 'A Record not updated Successfully');
				redirect("admin/Hostel_assets_master");	
			}
		}
	}

}
?>