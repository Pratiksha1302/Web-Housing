<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_master extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_master');
		$this->load->library('form_validation');
		$this->load->helper('email');
	}

	public function index()
	{
		if (isset($_SESSION['logged_in'])) 
		{
			redirect('admin/Admin_panel');	
		}
		$this->load->view("admin/index");
	}


	public function login_validation()
	{
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('passwd','Passwd','required|min_length[6]');
		$this->form_validation->set_rules('type','Type','required');
		if($this->form_validation->run() == TRUE)
		{
			//true
			$data = array(
					'admin_username' => $this->input->post('email'),
					'admin_passwd'   => $this->input->post('passwd'),
					'admin_type'     => $this->input->post('type')
				);

			//model function
			$result = $this->Model_master->login_admin($data);
			if($result == TRUE)
			{
				$id = array('admin_username'=>$this->input->post('email'));
				$datas = $this->Model_master->selectDataById("admin_master",$id);

				if (isset($_POST['rememberme']) && $_POST['rememberme']!="") 
				{
					setcookie('username', $this->input->post('email') , time() + (86400 * 30));
					setcookie('password', $this->input->post('passwd') , time() + (86400 * 30));
					setcookie('type', $this->input->post('type') , time() + (86400 * 30));
				}
				else
				{
					setcookie("username", "", time() - 3600);
					setcookie("password", "", time() - 3600);
					setcookie("type", "", time() - 3600);
				}

				foreach ($datas as $key) 
				{
					$sess_array = array(
						'admin_username' => $key->admin_username,
						'admin_type'     => $key->admin_type,
						'admin_profile'  => $key->admin_profile 
					);
				}
				print_r($sess_array);
				// Add user data in session
				$config['sess_expiration']= 10;
				$this->session->set_userdata('logged_in', $sess_array);
				$result = $this->Model_master->read_admin_information($sess_array);
				if($result != false)
				{
					$admin = array(
						'admin_username' =>$result[0]->admin_username,
						'admin_passwd'   =>$result[0]->admin_passwd,
						'admin_type'     =>$result[0]->admin_type,
						'admin_profile'  =>$result[0]->admin_profile,
						'admin_status'   =>'true'
					);
					$rsl = $this->Model_master->updatedata('admin_master',$admin,$id);
					print_r($rsl);
					if ($rsl == TRUE) 
					{
						echo "true";
						redirect('admin/admin_panel');
					}
				}
			}
			else
			{
				//false
				$this->session->set_flashdata('error','Invalid Username or Password');
				$this->session->set_flashdata('uname',$this->input->post('email'));
				$this->session->set_flashdata('passwd',$this->input->post('passwd'));
				$this->session->set_flashdata('type',$this->input->post('type'));
				$this->index();	
			}
		}
		else
		{
			//false
			$this->session->set_flashdata('uname',$this->input->post('email'));
			$this->session->set_flashdata('passwd',$this->input->post('passwd'));
			$this->session->set_flashdata('type',$this->input->post('type'));
			$this->index();	
		}
	}

	public function logout() 
	{
		// putting status on false
		if (isset($_SESSION['logged_in'])) 
		{
			$id = array('admin_username' => $_SESSION['logged_in']['admin_username']);
			$data = array('admin_status'=>'false');
			$rsl = $this->Model_master->updatedata('admin_master',$data,$id);
			if ($rsl == TRUE) 
			{
				// Removing session data
				$this->session->unset_userdata('logged_in');
				$this->session->set_flashdata('error','Successfully Logout!!!');
				redirect('login_master');
			}
		}
		else
		{
			redirect('login_master');
		}
		
	}
	

	
	

}
?>