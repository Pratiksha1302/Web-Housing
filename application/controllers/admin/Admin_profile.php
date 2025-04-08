<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_profile extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_master');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if(isset($_SESSION['logged_in']))
		{
			$datas['web_menu'] = "admin_master";
			$id = array('admin_username' => $_SESSION['logged_in']['admin_username']);
			$datas['data']=$this->Model_master->selectDataById("admin_master",$id);
			$this->load->view("admin/admin_profile",$datas);	
		}
		else
		{
			$this->session->set_flashdata('error', 'You Have To Login First!!');
			redirect("Login_master");
		}
	}

	public function update_profile()
	{
		if (isset($_POST['edit']) && $_POST['edit']!="") 
		{
			// echo "hiii";
			$this->form_validation->set_rules('email','Username','valid_email');
			$this->form_validation->set_rules('passwd','Password','min_length[6]');
			$pass = $this->input->post('passwd');
			$this->form_validation->set_rules('con_passwd','Conform Password','required|min_length[6]');

			if($this->form_validation->run() == false)
			{
				$this->index();
			}
			else
			{
				if($_FILES['profile']['name']!="")
				{
					$config['upload_path'] = "images/admin_profile";
			            $config['allowed_types'] = "jpg|png|jpeg";
			            $this->upload->initialize($config);

			            $ext = strrchr($_FILES['profile']['name'],".");
			            $img="WebHousing_".md5(rand(1,9999999)).$ext;
			            $_FILES['newname']['name']=$img;
			            $_FILES['newname']['type']=$_FILES['profile']['type'];
			            $_FILES['newname']['tmp_name']=$_FILES['profile']['tmp_name'];
			            $_FILES['newname']['error']=$_FILES['profile']['error'];
			            $_FILES['newname']['size']=$_FILES['profile']['size'];
			            if ($this->upload->do_upload('newname')) 
			            {
			            	$admin_profile = $_FILES['newname']['name'];
			            	$_SESSION['logged_in']['admin_profile'] = $admin_profile;
			            }
			            else
			            {
							if ($this->session->set_flashdata('del','Admin Profile is not Updated')) 
							{
								$this->index();
							}		
						}
				}
				else
				{
					$admin_profile = $_POST['old_profile'];
				}
				$id = array('admin_id' => $this->input->post('id'));
				$data = array('admin_username' => $this->input->post('email'),'admin_passwd' => $this->input->post('con_passwd'),'admin_profile' => $admin_profile);
				$rsl = $this->Model_master->updatedata('admin_master',$data,$id);
				if ($rsl == false) 
				{
					$this->session->set_flashdata('del','Admin details is not updated');
					$this->index();
				}
				else
				{
					$this->session->set_flashdata('edit','Admin details is updated Successfully');
					$this->index();	
				}
			}
		}
	}

}

?>