<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class State_master extends CI_Controller {
	
	public function index()
	{
		if(isset($_SESSION['logged_in']))
		{
			$datas['web_menu'] = "extra";
			$datas['web_submenu'] = "state_details";
			$this->load->model('Model_master');
			$from="country_master cm,state_master sm";
			$where="sm.country_id = cm.country_id";
			$datas['state']=$this->Model_master->jointable($from,$where);
			$datas['country']=$this->Model_master->selectAllData("country_master");
			$this->load->view("admin/state_master",$datas);
			//print_r($datas);
		}
		else
		{
			$this->session->set_flashdata('error', 'You Have To Login First!!');
			redirect("Login_master");
		}
	}

	//	-------- Insert into State_master ---------   //
	public function insert_state()
	{

		if(isset($_POST['add_state']) && $_POST['add_state']!="")
		{
			echo $state_name=$_POST['state_name'];
			echo $country_id=$_POST['country_id'];

			$data=array("state_name"=>$state_name,"country_id"=>$country_id);
			$this->load->model("Model_master");
			if($this->Model_master->insertdata("state_master",$data))
			{
				$this->session->set_flashdata('success', 'A New Record is <b>Added</b> Successfully');
				redirect("admin/state_master");
			}
		}
	}

	//	-------- Fetching state details by ID from State_master ---------   //
	public function fetch_state()
	{
		if(isset($_POST['state_id']) && $_POST['state_id']!="")
		{
			$state_id = array('state_id' =>$_POST['state_id']);
			$this->load->model('Model_master');
			$datas = $this->Model_master->selectDataById("state_master",$state_id);
			if(isset($datas))
			{
				foreach ($datas as $s) {
					$result = array('state_id' =>$s->state_id ,'state_name' =>$s->state_name ,'country_id' =>$s->country_id);
				}
			}
			echo json_encode($result);

		}

	}

	//	-------- Updating state details by ID on State_master ---------   //
	public function update_state(){

		if(isset($_POST['state_id']) && $_POST['state_id']!="")
		{
			$id = array('state_id' =>$_POST['state_id']);
			$datas = array('state_name' =>$_POST['state_name'],'country_id' =>$_POST['country_id']);
			$this->load->model('Model_master');
			if($this->Model_master->updatedata("state_master",$datas,$id)){

				$this->session->set_flashdata('edit', 'Changes <b>Saved</b> Successfully');
				redirect("admin/state_master/index");
			}
			else{
				$this->session->set_flashdata('del', 'Record was <b>not Updated</b> Successfully');
				redirect("admin/state_master/index");
			}
		}
			
	}

	//	-------- Delete state details by ID from State_master ---------   //
	public function delete_state()
	{
		if (isset($_POST['state_id']) && $_POST['state_id']!="") {
			$state_id=array("state_id"=>$_POST['state_id']);
			$this->load->model("Model_master");
			if($this->Model_master->deletedata("state_master",$state_id))
			{
				$this->session->set_flashdata('del', 'Record <b>Deleted</b> Successfully');
			}else{
				$this->session->set_flashdata('del', 'Record <b>Not Deleted</b> Successfully');
				redirect("admin/state_master/index");
			}
		}
	}

}







?>