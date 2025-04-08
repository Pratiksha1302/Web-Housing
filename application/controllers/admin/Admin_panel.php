<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_panel extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_master');
	}

	public function index()
	{
		if(isset($_SESSION['logged_in']))
		{
			if ($_SESSION['logged_in']['admin_type'] == "super_admin") 
			{
				$datas['web_menu'] = "admin_master";
				$this->load->model("Model_master");

				$datas['total_hostels'] = $this->Model_master->count('hostel_master');
				$datas['total_pg'] = $this->Model_master->count('pg_master');
				$datas['total_users'] = $this->Model_master->count('reg_master');
				$datas['total_owners'] = $this->Model_master->count('landlord_master');

				$datas['dataall']=$this->Model_master->selectAllData("admin_master");
				$this->load->view("admin/admin_dashboard",$datas);	
			}
			elseif ($_SESSION['logged_in']['admin_type'] == "hostel_admin") 
			{
				$datas['web_menu'] = "admin_master";
				$this->load->model("Model_master");

				$datas['total_hostels'] = $this->Model_master->count('hostel_master');
				$datas['total_emp'] = $this->Model_master->count('emp_master');
				$datas['total_users'] = $this->Model_master->count('hostel_booking_master');
				$datas['total_rooms'] = $this->Model_master->count('room_master');

				$from = "hostel_booking_master hbm,hostel_master hm,reg_master rm";
				$where = "hbm.hostel_id = hm.hostel_id and hbm.reg_id = rm.reg_id";
				$datas['hostel_booking_data']=$this->Model_master->jointable($from,$where);
				$this->load->view("admin/hosteladmin_master",$datas);
			}
			elseif ($_SESSION['logged_in']['admin_type'] == "pg_admin") 
			{
				$datas['web_menu'] = "admin_master";
				$this->load->model("Model_master");

				$datas['total_pg'] = $this->Model_master->count('pg_master');
				$datas['total_owners'] = $this->Model_master->count('landlord_master');
				$datas['total_users'] = $this->Model_master->count('reg_master');
				$datas['total_client'] = $this->Model_master->count('tiffin_master');
				
				$from1="tiffin_master tm,reg_master rm";
				$where1="tm.reg_id=rm.reg_id";
				$datas['tiffin']=$this->Model_master->jointable($from1,$where1);

				$from = "pg_booking_master pbm,pg_master pm,reg_master rm,landlord_master lm";
				$where = "pbm.pg_id = pm.pg_id and pbm.reg_id = rm.reg_id and pm.landlord_id = lm.landlord_id";
				$datas['pg_booking_data']=$this->Model_master->jointable($from,$where);
				$this->load->view("admin/pgadmin_master",$datas);
			}
		}
		else
		{
			$this->session->set_flashdata('error', 'You Have To Login First!!');
			redirect("Login_master");
		}
	}
	

	// add new admin
	public function AddNewAdmin()
	{
		if (isset($_POST['add']) && $_POST['add']!="") 
		{
			$admin_username=$_POST['admin_username'];
			$admin_passwd=$_POST['admin_passwd'];
			$admin_type=$_POST['admin_type'];

			if ($_FILES['admin_profile']['name']!="") 
			{
					$config['upload_path'] = "images/admin_profile";
		            $config['allowed_types'] = "jpg|png|jpeg";
		            $this->upload->initialize($config);

		            $ext = strrchr($_FILES['admin_profile']['name'],".");
		            $img="WebHousing_".md5(rand(1,9999999)).$ext;
		            $_FILES['newname']['name']=$img;
		            $_FILES['newname']['type']=$_FILES['admin_profile']['type'];
		            $_FILES['newname']['tmp_name']=$_FILES['admin_profile']['tmp_name'];
		            $_FILES['newname']['error']=$_FILES['admin_profile']['error'];
		            $_FILES['newname']['size']=$_FILES['admin_profile']['size'];
		            if ($this->upload->do_upload('newname')) 
		            {
		            	$admin_profile = $_FILES['newname']['name'];
		            }
		            else
		            {
						echo mysql_error();
					}
			}
			

			$data=array("admin_username"=>$admin_username,"admin_passwd"=>$admin_passwd,"admin_type"=>$admin_type,"admin_profile"=>$admin_profile);
			$this->load->model("Model_master");
			if($this->Model_master->admin_insert($data))
			{
				$this->session->set_flashdata('success', 'A New Record is Added Successfully');
				redirect("admin/Admin_panel");
			}
			else
			{
				$this->session->set_flashdata('del', 'Username is already Exist!!!');
				$this->index();
			}
		}
	}
	public function delete_admin()
	{

		if (isset($_POST['admin_id']) && $_POST['admin_id']!="") {
			$admin_id=array("admin_id"=>$_POST['admin_id']);
			$data = $this->Model_master->selectDataById("admin_master",$admin_id);
			// echo "<pre>";
			// print_r($admin_id);
			// print_r($data);
			foreach ($data as $key) 
			{
				if(unlink('images/admin_profile/'.$key->admin_profile))
				{
					$this->Model_master->deletedata("admin_master",$admin_id);		
				}
			}
			$this->session->set_flashdata('del', 'Record Deleted Successfully');
		}
	}
	public function fetch_admin()
	{
		if (isset($_POST['admin_id']) && $_POST['admin_id']!="") {
			$id=array("admin_id"=>$_POST['admin_id']);
			$this->load->model('Model_master');
	        $data=$this->Model_master->selectDataById("admin_master",$id);
	        // print_r($data);
			foreach ($data as $key) {
				$result = array("admin_id"=>$key->admin_id,"admin_username"=>$key->admin_username,"admin_passwd"=>$key->admin_passwd,"admin_type"=>$key->admin_type,"admin_profile"=>$key->admin_profile,"admin_status"=>$key->admin_status);
			}
			echo json_encode($result);	
		}
		
	}
	public function update_admin()
	{
		if (isset($_POST['edit']) && $_POST['edit']!="") 
		{	
			$admin_id=array("admin_id"=>$_POST['admin_id']);
			$admin_username=$_POST['admin_username'];
			$admin_passwd=$_POST['admin_passwd'];
			$admin_type=$_POST['admin_type'];

			if ($_FILES['admin_profile']['name']!="") 
			{	
				echo "img selected<br>";
				if($_POST['old_admin_profile']!="")
				{
					if(unlink('images/admin_profile/'.$_POST['old_admin_profile']))
					{
						$config['upload_path'] = "images/admin_profile";
			            $config['allowed_types'] = "jpg|png|jpeg";
			            $this->upload->initialize($config);

			            $ext = strrchr($_FILES['admin_profile']['name'],".");
			            $img="WebHousing_".md5(rand(1,9999999)).$ext;
			            $_FILES['newname']['name']=$img;
			            $_FILES['newname']['type']=$_FILES['admin_profile']['type'];
			            $_FILES['newname']['tmp_name']=$_FILES['admin_profile']['tmp_name'];
			            $_FILES['newname']['error']=$_FILES['admin_profile']['error'];
			            $_FILES['newname']['size']=$_FILES['admin_profile']['size'];
			            if ($this->upload->do_upload('newname')) 
			            {
			            	$admin_profile = $_FILES['newname']['name'];
			            	$_SESSION['logged_in']['admin_profile'] = $_FILES['newname']['name'];
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
						if ($this->session->set_flashdata('del','Old Admin Profile Was not unlinked')) 
						{
							$this->index();
						}
					}
				}
				else
				{
						$config['upload_path'] = "images/admin_profile";
			            $config['allowed_types'] = "jpg|png|jpeg";
			            $this->upload->initialize($config);

			            $ext = strrchr($_FILES['admin_profile']['name'],".");
			            $img="WebHousing_".md5(rand(1,9999999)).$ext;
			            $_FILES['newname']['name']=$img;
			            $_FILES['newname']['type']=$_FILES['admin_profile']['type'];
			            $_FILES['newname']['tmp_name']=$_FILES['admin_profile']['tmp_name'];
			            $_FILES['newname']['error']=$_FILES['admin_profile']['error'];
			            $_FILES['newname']['size']=$_FILES['admin_profile']['size'];
			            if ($this->upload->do_upload('newname')) 
			            {
			            	$admin_profile = $_FILES['newname']['name'];
			            }
			            else
			            {
							if ($this->session->set_flashdata('del','Admin Profile is not Updated')) 
							{
								$this->index();
							}		
						}
				}
			}
			else
			{
				echo "img not selected<br>";
				$admin_profile = $_POST['old_admin_profile'];
			}
			

			$data=array("admin_username"=>$admin_username,"admin_passwd"=>$admin_passwd,"admin_type"=>$admin_type,"admin_profile"=>$admin_profile);
			echo "<pre>";
			print_r($data);
			if($this->Model_master->updatedata("admin_master",$data,$admin_id))
			{
				$this->session->set_flashdata('edit', 'A Record is Updated Successfully');
				redirect("admin/Admin_panel");
			}
			else
				{
					if($this->session->set_flashdata('del', 'A record is not Updated Successfully'))
					{
						redirect("admin/Admin_panel");
					}
				}
		}
	}
	

}
