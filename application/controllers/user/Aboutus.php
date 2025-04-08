<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aboutus extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_master');
	}

	public function index()
	{
		if(isset($_SESSION['user']) && $_SESSION['user']!="")
		{
			$mail=$_SESSION['user'];
			// $email=array("reg_email"=>$mail);

			$data['data']=$this->Model_master->selectDataById("reg_master",$mail);

			$this->load->view("user/aboutus",$data);
		}
		else
		{
			$this->load->view("user/aboutus");
		}
		
	}

	public function insert_data()
	{
			
		if (isset($_POST['post'])) 
		{
			
			$cust_name = $_POST['cust_name'];
			$cust_email = $_POST['cust_email'];
			$cust_comment = $_POST['cust_comment'];
			$experience = $_POST['experience'];


			$data = array("feedback_name"=>$cust_name,"feedback_email"=>$cust_email,"feedback_msg"=>$cust_comment,"feedback_rate"=>$experience);
			
			if ($this->Model_master->insertdata('feedback_master',$data)) 
			{
				$this->session->set_flashdata('success_feedback',"Feedback Sent Successfully..!!&nbsp;<i class='fas fa-smile'></i>&nbsp;Thank You For rating Us..!!");
				redirect("user/aboutus");
			}
		}
	}
}