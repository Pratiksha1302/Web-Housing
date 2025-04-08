<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forget_pwd extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_master');
		$this->load->library('form_validation');
		$this->load->helpers('mail_helper');
	}

	public function index()
	{
		$this->load->view('admin/Forget_pwd');
	}

	public function send_otp()
	{
		if (isset($_POST['send_otp']) && $_POST['send_otp']!="") 
		{
			$this->form_validation->set_rules('email','Email Address','required|valid_email');
			if ($this->form_validation->run() == false) 
			{
				$this->session->set_flashdata('email',$this->input->post('email'));
				$this->index();
			}
			else
			{
				//Check email  is Saved email or not
				$email = array('admin_username' => $this->input->post('email'));
				$rsl = $this->Model_master->read_admin_information($email);
				if ($rsl == false) 
				{
				 	$this->session->set_flashdata('error','Email missmatched!!Plz Enter valid email');
				 	$this->session->set_flashdata('email', $this->input->post('email'));
				 	$this->index();
				}
				else
				{ 
					$otp=rand(111111,999999);
					$sess_array = array(
								'otp' 		=> $otp,
								'username'  => $this->input->post('email')
								);
					print_r($sess_array);
					$this->session->set_userdata('otp_session', $sess_array);
		            $email=$this->input->post('email');
		            $sub="OTP Conformation";
		            $msg="
<div>
	<h4 style='font-family:sans-serif'>Do not reply this mail.</h4>
	<p style='font-family:sans-serif'>Your One Time Password is : $otp;</p>

</div>
		            ";
	                if(send_mail($email,$sub,$msg)==true)
	                {
	                    $this->session->set_flashdata('success','Enter OTP received by your email');
	                    $this->session->set_flashdata('email', $email);
	                    redirect('Otp_matching');
	                }
	                else
	                {
	                    $this->session->set_flashdata('error','Email is not send!!!');
                    	echo $this->email->print_debugger();
	                }
				} 
			}
		}
	}
}