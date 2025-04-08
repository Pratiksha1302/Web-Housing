<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactus extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_master');
	}
	public function index()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']!="")
		{
			$mail=$_SESSION['user'];
			$data['data']=$this->Model_master->selectDataById("reg_master",$mail);
			$this->load->view("user/contactus.php",$data);	
		}	
		else
		{
			$this->load->view("user/contactus.php");
		}
	}

	public function insert_data()
	{
		if(isset($_POST['send']))
		{
			$c_name = $_POST['c_name'];
			$c_email = $_POST['c_email'];
			$c_mobile  = $_POST['c_mobile'];
			$c_subject = $_POST['c_subject'];
			$c_msg = $_POST['c_msg'];

			$data = array('complaint_name'=>$c_name,'complaint_email' =>$c_email ,'complaint_mobile'=>$c_mobile,'complaint_subject'=>$c_subject,'complaint_details'=>$c_msg );

			if ($this->Model_master->insertdata('complaint_master',$data)) 
			{
				$this->session->set_flashdata('success_complaint',"<i class='fas fa-check-circle'></i>&nbsp;Your complaint for <b>$c_subject</b> is registered Successfully..!!");
				redirect("user/contactus");
			}
		}
	}
}