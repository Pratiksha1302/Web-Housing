<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyProfile extends CI_Controller {
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
			$from = "state_master sm,city_master cim";
			$where = "cim.state_id = sm.state_id";
			$data['state'] = $this->Model_master->selectAllData('state_master');
			$data['city'] = $this->Model_master->jointable($from,$where);
			$data['data']=$this->Model_master->selectDataById("reg_master",$mail);
			// echo "<pre>";
			// print_r($data);die;
			$this->load->view("user/myprofile.php",$data);
		}
		else
		{
			$this->session->set_flashdata("err","Please Login First..!!");
			redirect("user/signin");
		}
	}

	public function check_email()
	{
		if (isset($_POST['reg_email']) && $_POST['reg_email'])
		{
			$mail=$_POST['reg_email'];
			$email=array("reg_email"=>$mail);
			
			if($this->Model_master->rowscount("reg_master",$email))
			{
				$res['id']="0";
				$res['msg'] = "Email ID is already exist..!!";
			}	
			else
			{
				$res['id'] = "1";
				$res['msg'] = "";
			}
			echo json_encode($res);
		}
	}

	public function update_data()
	{
		if(isset($_POST['change']))
		{
			$reg_id = array('reg_id' => $_POST['reg_id']);
			$reg_name=$_POST['reg_name'];
			$reg_email=$_POST['reg_email'];
			$reg_passwd=$_POST['reg_passwd'];
			$reg_gender=$_POST['reg_gender'];
			$reg_dob=$_POST['reg_dob'];
			$reg_type=$_POST['reg_type'];
			$reg_blood_grp=$_POST['reg_blood_grp'];
			$reg_mobile=$_POST['reg_mobile'];
			$reg_uniq_id=$_POST['reg_uniq_id'];
			$reg_address=$_POST['reg_address'];
			$reg_city=$_POST['reg_city'];
			$gov=$_POST['reg_gov_proof'];
			// $reg_profile_old = $_POST['reg_profile_old'];

			if ($_FILES['reg_profile']['name']!="")
			{
				echo "img selected";
				$config['upload_path'] = "images/reg_profile";
	            $config['allowed_types'] = "jpg|png|jpeg";
	            $this->upload->initialize($config);

	            $ext = strrchr($_FILES['reg_profile']['name'],".");
	            $img="WebHousing_".md5(rand(1,9999999)).$ext;
	            $_FILES['newname']['name']=$img;
	            $_FILES['newname']['type']=$_FILES['reg_profile']['type'];
	            $_FILES['newname']['tmp_name']=$_FILES['reg_profile']['tmp_name'];
	            $_FILES['newname']['error']=$_FILES['reg_profile']['error'];
	            $_FILES['newname']['size']=$_FILES['reg_profile']['size'];
	            if ($this->upload->do_upload('newname')) 
	            {	
	            	if(unlink("images/reg_profile/".$_POST['reg_profile_old']))
	            	{
	            		$reg_profile = $_FILES['newname']['name'];
	            	}
	            	else
	            	{
	            		$this->session->set_flashdata("err","Somethin wrong in delete old image please try again..!!");
	           			redirect("user/myprofile");
	            	}
	            }
	        }
	        else
	        {
	        	echo "img not selected";
	        	$reg_profile = $_POST['reg_profile_old'];
	        }
	
	        $data=array("reg_name"=>$reg_name,"reg_email"=>$reg_email,"reg_passwd"=>$reg_passwd,"reg_gender"=>$reg_gender,"reg_dob"=>$reg_dob,"reg_stud_profile"=>$reg_profile,"reg_blood_grp"=>$reg_blood_grp,"reg_type"=>$reg_type,"reg_mobile"=>$reg_mobile,"reg_address"=>$reg_address,"city_id"=>$reg_city,"reg_gov_proof"=>$gov,"reg_uniq_id"=>$reg_uniq_id);
	        
	        echo "<pre>";
	        print_r($data);
	        print_r($reg_id);	
	            	if($this->Model_master->updatedata("reg_master",$data,$reg_id))
	           		{
	           			$this->session->set_flashdata("up","Data Updated Successfully..!!");
	           			redirect("user/myprofile");
	           		}	
	            
			
		}	
	}
}