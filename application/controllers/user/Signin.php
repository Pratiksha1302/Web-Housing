<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller {

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
			$this->load->view("user/signin");
		}
	}

	public function login_user()
	{
		if (isset($_POST['login']))
		{	
			$email = $_POST['u_email'];
			$passwd = $_POST['u_passwd'];

			if ($this->Model_master->can_login($email,$passwd))
			{
				if(isset($_POST['rememberme']) && $_POST['rememberme']!="")
        		{
            		setcookie("useremail",$_POST['u_email'],time()+3600);
            		setcookie("userpassword",$_POST['u_passwd'],time()+3600);
            		setcookie("rememberme",$_POST['rememberme'],time()+3600);
        		}
        		else
        		{
            		setcookie("useremail",$_POST['u_email'],time()-3600);
            		setcookie("userpassword",$_POST['u_passwd'],time()-3600);
            		setcookie("remeberme",$_POST['rememberme'],time()-3600);
        		}
				
				$session_data = array(
					"reg_email"=>$email,
				);
				// $this->session->set_flashdata('login','login success');
				$_SESSION['user'] = $session_data;
				// $this->session->set_userdata($session_data);
				redirect("user/user_site");
			}
			else
			{
				$this->session->set_flashdata('fail_login','Usernane & Password is not found..!!');
				redirect("user/signin");
			}
		}	
	}

	public function logout()
	{
		unset($_SESSION['user']);
		redirect("user/user_site");
	}
	public function terms()
	{
		$this->load->view("user/terms.php");
	}
}