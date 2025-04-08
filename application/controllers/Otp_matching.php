<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Otp_matching extends CI_Controller
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
		$this->load->view('admin/otp_confirmation_page');
	}

	public function conform_otp()
	{
		$this->form_validation->set_rules('email','Email Address','required|valid_email');
		$this->form_validation->set_rules('otp','OTP','required|max_length[6]|min_length[6]');
		$otp = $_SESSION['otp_session']['otp'];
		if($this->form_validation->run() == false)
		{
			$this->session->set_flashdata('email',$this->input->post('email'));
			$this->session->set_flashdata('otp',$this->input->post('otp'));
			$this->index();
		}
		else
		{
			if($otp == $this->input->post('otp'))
			{
				redirect('Confirm_password');
			}
			else
			{
				$this->session->set_flashdata('error','Please enter correct OTP!!');
				$this->index();
			}
		}
	}

}