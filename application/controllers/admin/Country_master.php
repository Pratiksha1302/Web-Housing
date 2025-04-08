<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Country_master extends CI_Controller {
	
	// function __construct(argument)
	// {
	// 	parent::__construct();
	// 	$this->load->model('Model_master');
	// }

	public function index()
	{
		if(isset($_SESSION['logged_in']))
		{
			$datas['web_menu'] = "extra";
			$datas['web_submenu'] = "country_details";
			$this->load->model('Model_master');
			$datas['dataall']=$this->Model_master->selectAllData("country_master");
			$this->load->view("admin/country_master",$datas);
		}
		else
		{
			$this->session->set_flashdata('error', 'You Have To Login First!!');
			redirect("Login_master");
		}
	}

	public function insert_country()
	{
		if (isset($_POST['add_country']) && $_POST['add_country']!="") 
		{	
			$country_name=$_POST['c_name'];
			$data=array("country_name"=>$country_name);
			$this->load->model("Model_master");
			if($this->Model_master->insertdata("country_master",$data))
			{
				$this->session->set_flashdata('success', 'Record <b>Added</b> Successfully');
				redirect("admin/Country_master");
			}
		}
	}

	public function fetch_country()
	{
		if (isset($_POST['country_id']) && $_POST['country_id']!="") {
			$id = array('country_id' =>$_POST['country_id']);
			$this->load->model('Model_master');
			$countrydata = $this->Model_master->selectDataById('country_master',$id);
			//print_r($countrydata);
			foreach ($countrydata as $key) {
				$result = array('c_name' => $key->country_name,'c_id' => $key->country_id);
			}
			echo json_encode($result);	
		}	

	}

	public function update_country()
	{
		if (isset($_POST['edit_country']) && $_POST['edit_country']!="") 
		{	
			$id=array("country_id"=>$_POST['country_id']);
			$country_name=$_POST['country_name'];

			$data=array("country_name"=>$country_name);
			$this->load->model("Model_master");
			if($this->Model_master->updatedata("country_master",$data,$id))
			{
				 $this->session->set_flashdata('edit', 'Record <b>Updated</b> Successfully');
				 redirect("admin/country_master");
			}
		}
	}

	public function delete_country()
	{
		if(isset($_POST['country_id']) && $_POST['country_id']!="")
		{
			$c_id = $_POST['country_id'];
			$id=array("country_id"=>$c_id);
			$this->load->model("Model_master");
			if($this->Model_master->deletedata("country_master",$id))
			{
				$this->session->set_flashdata('del', 'Record <b>Deleted</b> Successfully');
			}
		}
	}

}