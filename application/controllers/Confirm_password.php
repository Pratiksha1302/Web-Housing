<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Confirm_password extends CI_Controller
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
		$this->load->view('admin/confirm_password');
	}

	public function Confirm_passwd()
	{
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('pass','Password','required|min_length[6]');
		$this->form_validation->set_rules('con_pass','Confirm Password','required|min_length[6]|matches[pass]');
		if ($this->form_validation->run() == false) 
		{
			$this->session->set_flashdata('email',$this->input->post('email'));
			$this->session->set_flashdata('pass',$this->input->post('pass'));
			$this->session->set_flashdata('con_pass',$this->input->post('con_pass'));
			$this->index();
		}
		else
		{
			$id = array('admin_username' => $this->input->post('email'));
			$data = array('admin_passwd' => $this->input->post('con_pass'));
			$rsl = $this->Model_master->updatedata('admin_master',$data,$id);
			if ($rsl == false) 
			{
				$this->session->set_flashdata('error','password is not updated Successfully!!');
				redirect('Login_master');
			}
			else
			{
				$this->session->unset_userdata('otp_session');
				$this->session->set_flashdata('success','password is updated Successfully!!');
				redirect('Login_master');	
			}
		}
	}

}