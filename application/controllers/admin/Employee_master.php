<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_master extends CI_Controller {
	
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
			$datas['web_menu'] = "hostel_details";
			$datas['web_submenu'] = "employee_details";
			$this->load->model('Model_master');
			$from = "block_master bm,emp_master em";
			$where = "bm.block_id = em.block_id";
			$datas['data'] = $this->Model_master->jointable($from,$where);
			$datas['hostel'] = $this->Model_master->selectAllData('hostel_master');
			$datas['block'] = $this->Model_master->selectAllData('block_master');
			$this->load->view("admin/employee_details_master",$datas);
		}
		else
		{
			$this->session->set_flashdata('error', 'You Have To Login First!!');
			redirect("Login_master");
		}
	}

	public function insert()
	{
		if(isset($_POST['add']) && $_POST['add']!="")
		{
			//echo "hi";
			$blockid = $_POST['block_id'];
			$emp_name = $_POST['emp_name'];
			$emp_email = $_POST['emp_email'];
			$emp_gender = $_POST['emp_gender'];
			$emp_dob = $_POST['emp_dob'];
			$emp_doj = $_POST['emp_doj'];
			$emp_desig = $_POST['emp_desig'];
			$emp_address = $_POST['emp_address'];
			$emp_salary = $_POST['emp_salary'];
			
			if ($_FILES['emp_profile']['name']!="") 
			{
				$config['upload_path'] = "images/emp_profile";
	            $config['allowed_types'] = "gif|jpg|png|jpeg|bmp";
	            $this->upload->initialize($config);

	            $ext = strrchr($_FILES['emp_profile']['name'],".");
	            $img="WebHousing_".md5(rand(1,9999999)).$ext;
	            $_FILES['newname']['name']=$img;
	            $_FILES['newname']['type']=$_FILES['emp_profile']['type'];
	            $_FILES['newname']['tmp_name']=$_FILES['emp_profile']['tmp_name'];
	            $_FILES['newname']['error']=$_FILES['emp_profile']['error'];
	            $_FILES['newname']['size']=$_FILES['emp_profile']['size'];
	            if($this->upload->do_upload('newname'))
	            {
	            	$emp_profile = $_FILES['newname']['name'];
				}
			}
            else
			{
				$emp_profile = "";
			}
				$data = array("block_id"=>$blockid,"emp_name"=>$emp_name,"emp_email"=>$emp_email,"emp_gender"=>$emp_gender,"emp_dob"=>$emp_dob,"emp_doj"=>$emp_doj,"emp_desig"=>$emp_desig,"emp_address"=>$emp_address,"emp_salary"=>$emp_salary,"emp_profile"=>$emp_profile);
				
				// echo "<pre>";
				// print_r($data);
				if($this->Model_master->insertdata('emp_master',$data))
				{
					$this->session->set_flashdata('success', 'A New Record is Added Successfully');
					redirect('admin/Employee_master');
				}
				else
				{
					$this->session->set_flashdata('del', 'A record is not inserted successfully' );
					redirect('admin/Employee_master');
					
				}
		}
	}

	// Delete Selected Employee Details
	public function delete()
	{
		if (isset($_POST['emp_id']) && $_POST['emp_id']!="") {
			$id=array("emp_id"=>$_POST['emp_id']);
			$rsl = $this->Model_master->selectDataById('emp_master',$id);
			foreach ($rsl as $rsl) 
			{
				$emp_profile = $rsl->emp_profile;
			}
			if($emp_profile!="")
			{
				unlink('images/emp_profile/'.$emp_profile);	
			}
			if($this->Model_master->deletedata("emp_master",$id))
			{
				$this->session->set_flashdata('del', 'Record Deleted Successfully');
				
			}
		}
	}

	// View Selected Employee Details
	public function fetch()
	{
		if (isset($_POST['emp_id']) && $_POST['emp_id']!="") {
			// $id=array("emp_id"=>$_POST['emp_id']);
			$id = $_POST['emp_id'];
			$from = "block_master bm,emp_master em";
			$where = "bm.block_id = em.block_id and em.emp_id = $id";
			$data = $this->Model_master->jointable($from,$where);
	        // print_r($data);
			foreach ($data as $key) {
				$result = array("hostel_id"=>$key->hostel_id,"block_id"=>$key->block_id,"emp_id"=>$key->emp_id,"emp_name"=>$key->emp_name,"emp_email"=>$key->emp_email,"emp_gender"=>$key->emp_gender,"emp_dob"=>$key->emp_dob,"emp_doj"=>$key->emp_doj,"emp_desig"=>$key->emp_desig,"emp_address"=>$key->emp_address,"emp_salary"=>$key->emp_salary,"emp_profile"=>$key->emp_profile);
			}
			echo json_encode($result);	
		}	
	}

	public function update()
	{
		if(isset($_POST['edit']) && $_POST['edit']!="")
		{

			$id=array("emp_id" => $_POST['emp_id']);
			$blockid = $_POST['block_id'];
			$emp_name = $_POST['emp_name'];
			$emp_email = $_POST['emp_email'];
			$emp_gender = $_POST['emp_gender'];
			$emp_dob = $_POST['emp_dob'];
			$emp_doj = $_POST['emp_doj'];
			$emp_desig = $_POST['emp_desig'];
			$emp_address = $_POST['emp_address'];
			$emp_salary = $_POST['emp_salary'];

			if ($_POST['old_emp_profile']!="" && $_FILES['emp_profile']['name']!="") 
			{
				echo "old img is not null img selected";
				if(unlink("images/emp_profile/".$_POST['old_emp_profile']))
				{
					$config['upload_path'] = "images/emp_profile";
		            $config['allowed_types'] = "gif|jpg|png|jpeg|bmp";
		            $this->upload->initialize($config);

		            $ext = strrchr($_FILES['emp_profile']['name'],".");
		            $img="WebHousing_".md5(rand(1,9999999)).$ext;
		            $_FILES['newname']['name']=$img;
		            $_FILES['newname']['type']=$_FILES['emp_profile']['type'];
		            $_FILES['newname']['tmp_name']=$_FILES['emp_profile']['tmp_name'];
		            $_FILES['newname']['error']=$_FILES['emp_profile']['error'];
		            $_FILES['newname']['size']=$_FILES['emp_profile']['size'];
		            if($this->upload->do_upload('newname'))
		            {
		            	$emp_profile = $_FILES['newname']['name'];
					}
				}
			}
			elseif($_POST['old_emp_profile'] == "")
			{
				echo "old img is null new upload";	
				$config['upload_path'] = "images/emp_profile";
	            $config['allowed_types'] = "gif|jpg|png|jpeg|bmp";
	            $this->upload->initialize($config);

	            $ext = strrchr($_FILES['emp_profile']['name'],".");
	            $img="WebHousing_".md5(rand(1,9999999)).$ext;
	            $_FILES['newname']['name']=$img;
	            $_FILES['newname']['type']=$_FILES['emp_profile']['type'];
	            $_FILES['newname']['tmp_name']=$_FILES['emp_profile']['tmp_name'];
	            $_FILES['newname']['error']=$_FILES['emp_profile']['error'];
	            $_FILES['newname']['size']=$_FILES['emp_profile']['size'];
	            if($this->upload->do_upload('newname'))
	            {
	            	$emp_profile = $_FILES['newname']['name'];
				}
			}
			else
			{
					echo "img not selected";
					$emp_profile = $_POST['old_emp_profile'];
			}
			$data = array("block_id"=>$blockid,"emp_name"=>$emp_name,"emp_email"=>$emp_email,"emp_gender"=>$emp_gender,"emp_dob"=>$emp_dob,"emp_doj"=>$emp_doj,"emp_desig"=>$emp_desig,"emp_address"=>$emp_address,"emp_salary"=>$emp_salary,"emp_profile"=>$emp_profile);
						
						echo "<pre>";
						print_r($data);
						print_r($id);
						if($this->Model_master->updatedata('emp_master',$data,$id))
						{
							$this->session->set_flashdata('edit', 'A Record is Updated Successfully');
							redirect('admin/Employee_master');
						}
						else
						{
							$this->session->set_flashdata('del', "A Record wasn't Updated Successfully");
							redirect('admin/Employee_master');
						}
		
			
            
		}
	}

}







?>