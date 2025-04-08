<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Changepassword extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_master');
	}

	public function index()
	{	
		if(isset($_SESSION['user']) && $_SESSION['user']!="")
		{
			$this->load->view('user/changepassword.php');
		}
		else
		{
			$this->session->set_flashdata("err","Please Login First..!!");
			redirect("user/signin");
		}
	}
    
    public function updatePass()
	{
		if(isset($_POST['change_pass']))
		{
			$pass = $_POST['newpass'];
			$email = $_SESSION['user'];
			$data=array("reg_passwd"=>$pass);
			$data=$this->Model_master->updatedata("reg_master",$data,$email);
			
    		if($data)
    		{
    			unset($_SESSION['email']);
    			$this->session->set_flashdata("change","Your password is changed successfully..!!");
    			redirect("user/changepassword");
    		}
    		else
    		{
    			$this->session->set_flashdata("fail","Something went wrong please try again..!");
    			redirect("user/changepassword");	
    		}
    	}
    	else
    	{
    		redirect("Email_OTP/updatePass");
    	}
	}

	public function check_pass()
	{
		if(isset($_POST['oldpass']) && $_POST['oldpass']!="")
		{
			$id=$_SESSION['user'];
			$p=$_POST['oldpass'];
			$data=$this->Model_master->selectDataById("reg_master",$id);
			
			foreach ($data as $k)
			{
				$passwd=$k->reg_passwd;
			}	
			if($passwd==$p)
			{
				$result['id']="1";
				$result['msg']="";
			}
			else
			{
				$result['id'] = "0";
				$result['msg']="Old password is not matched..!! Provide correct one..!";
			}
			echo json_encode($result);
		}
	}
}
