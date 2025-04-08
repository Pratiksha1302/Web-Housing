<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgotpassword extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_master');
	}

	public function index()
	{
		if(isset($_SESSION['user']) && $_SESSION['user']!="")
		{
			redirect("user/user_site");
		}
		else
		{
			$this->load->view("user/forgotpassword.php");
		}
		
	}

	public function check_email($value='')
	{
		$u_email = array('reg_email'=>$_POST['u_email']);

		$data = $this->Model_master->rowscount("reg_master",$u_email);

		if($data)
		{
	    	$this->load->helpers('mail_helper');
	    	$email=$_POST['u_email'];
	    	$_SESSION['email'] = $email;

	    	$otp="WH".rand(1111,9999);
	    	
	    	$_SESSION['email'] = $email;
	    	$_SESSION['otp'] = $otp;

	    		$subject="USER OTP CONFIRMATION PROCESS";
	    		$msg="
	    			<div style=''>
						<h4 style='font-family: sans-serif;font-size: 20px;margin-top: 1%;margin-left:25%;font-size: 25px;'>Your One time OTP Confirmation</h4> <br>
						<span style='font-family: sans-serif;font-size: 20px;'>You are requested to set or update your account password. Please Don't reply to this message.</span><br><br>
						<center>		
							<label style='font-family: sans-serif;margin-top: 20px;font-size: 20px;'>
								Your One Time Password (OTP) is $otp
							</label>
						</center> 
					</div>";
			if(send_mail($email,$subject,$msg))
			{
				$this->session->set_flashdata("mail_sent","OTP is sent on <b>$email</b>");
				redirect("user/forgotpassword/confirmotp");
			}
			else
			{
				$this->session->set_flashdata("mail_sent_of","Your OTP is $otp");
				redirect("user/forgotpassword/confirmotp");
			}
		}
		else
		{
			$this->session->set_flashdata('fail',"Email Address is not matched..!!");
			redirect("user/forgotpassword");
		}
	}

	public function confirmotp()
	{	
		if(isset($_SESSION['user']) && $_SESSION['user']!="")
		{
			redirect("user/user_site");
		}
		else{
			$this->load->view("user/confirm_otp");
		}
		
	}

	public function check_otp()
	{
		if(isset($_POST['check']))
		{
			$u_otp=$_POST['u_otp'];
			if(isset($_SESSION['otp']) && $_SESSION['otp']!="")
    		{
    			if($u_otp==$_SESSION['otp'])
    			{
    				$this->session->set_flashdata("pass","You may now change your password..!!");
    				redirect("user/forgotpassword/changepassword");
    			}
    			else
    			{	
    				$this->session->set_flashdata('not',"Verification code is not matched..!! Try Again");
    				redirect("user/forgotpassword/confirmotp");
    			}
    		}
		}
	}
	public function changepassword()
	{
		if(isset($_SESSION['user']) && $_SESSION['user']!="")
		{
			redirect("user/user_site");
		}
		else
		{
			$this->load->view("user/change_password");	
		}
	}

	public function updatePass()
	{
		if(isset($_POST['change_pass']))
		{
			$pass = $_POST['newpass'];
			$email = $_SESSION['email'];
			$data=array("reg_passwd"=>$pass);
			$email_id=array("reg_email"=>$email);

    		if($this->Model_master->updatedata("reg_master",$data,$email_id))
    		{
    			unset($_SESSION['email']);
    			$this->session->set_flashdata("change","Your password is changed successfully..!!");
    			redirect("user/signin");
    		}
    		else
    		{
    			$this->session->set_flashdata("fail","Something went wrong please try again..!");
    			redirect("user/forgotpassword/changepassword");	
    		}
    	}
    	else
    	{
    		redirect("Email_OTP/updatePass");
    	}
	}
}