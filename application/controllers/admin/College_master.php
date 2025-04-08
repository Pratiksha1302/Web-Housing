<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class College_master extends CI_Controller {

	// function __construct()
	// {
	// 	$this->load->model('Model_master');
	// }

	public function index()
	{
		if(isset($_SESSION['logged_in']))
		{
			$datas['web_menu'] = "hostel_details";
			$datas['web_submenu'] = "clg_details";
			$this->load->model('Model_master');
			$datas['state'] = $this->Model_master->selectAllData('state_master');
			$datas['city'] = $this->Model_master->selectAllData('city_master');
			$from = "clg_master clg,city_master cm";
			$where = "clg.city_id = cm.city_id";
			$datas['data'] = $this->Model_master->jointable($from,$where);
			$this->load->view("admin/college_details_master",$datas);
		}
		else
		{
			$this->session->set_flashdata('error', 'You Have To Login First!!');
			redirect("Login_master");
		}
	}

	public function insert(){

		if (isset($_POST['AddCollege']) && $_POST['AddCollege']=="Add") {
			
			$clg_name = $_POST['clg_name'];
			$clg_address = $_POST['clg_address'];
			$clg_pincode = $_POST['clg_pincode'];
			$clg_phone = $_POST['clg_phone'];
			$clg_state = $_POST['clg_state'];
			$clg_city = $_POST['clg_city'];
			$data = array('clg_name' =>$clg_name ,'clg_address' =>$clg_address ,'clg_pincode' =>$clg_pincode,'clg_phone' =>$clg_phone,'state_id' =>$clg_state,'city_id' =>$clg_city );
			$this->load->model('Model_master');
			
			if ($this->Model_master->insertdata('clg_master',$data)) {
				$this->session->set_flashdata('success', 'A New Record is Added Successfully');
				redirect("admin/College_master");
			}
		}

	}

	public function delete(){
		if (isset($_POST['clg_id']) && $_POST['clg_id']!="") {
			$id=array("clg_id"=>$_POST['clg_id']);
			$this->load->model("Model_master");
			if($this->Model_master->deletedata("clg_master",$id))
			{
				$this->session->set_flashdata('del', 'Record Deleted Successfully');
				
			}
		}
	}

	public function fetch() {
		if (isset($_POST['clg_id']) && $_POST['clg_id']!="") {
			$id=array("clg_id"=>$_POST['clg_id']);
			$this->load->model('Model_master');
	        $data=$this->Model_master->selectDataById("clg_master",$id);
	        // print_r($data);
			foreach ($data as $key) {
				$result = array('clg_id' => $key->clg_id,'clg_name' => $key->clg_name,'clg_address' => $key->clg_address,'clg_pincode' => $key->clg_pincode,'clg_phone' => $key->clg_phone,'state_id' => $key->state_id,'city_id' => $key->city_id);
			}
			echo json_encode($result);	
		}
		
	}

	public function update() {
		if (isset($_POST['clgedit']) && $_POST['clgedit']!="") 
		{	
			$clg_id=array("clg_id"=>$_POST['clg_id']);
			$clg_name=$_POST['clg_name'];
			$clg_address=$_POST['clg_address'];
			$clg_pincode=$_POST['clg_pincode'];
			$clg_phone=$_POST['clg_phone'];
			$state_id=$_POST['clg_state'];
			$city_id=$_POST['clg_city'];

			$data=array("clg_name"=>$clg_name,"clg_address"=>$clg_address,"clg_pincode"=>$clg_pincode,"clg_phone"=>$clg_phone,"state_id"=>$state_id,"city_id"=>$city_id);
			$this->load->model("Model_master");
			if($this->Model_master->updatedata("clg_master",$data,$clg_id))
			{
				$this->session->set_flashdata('edit', 'Record is Updated Successfully');
				redirect("admin/College_master");
			}
		}
	}

}

?>