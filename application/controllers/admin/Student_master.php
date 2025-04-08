<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_master extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_master');
	}

	public function index()
	{
		if(isset($_SESSION['logged_in']))
		{
			$datas['web_menu'] = "hostel_details";
			$datas['web_submenu'] = "student_details";
			$from = "reg_master rm, state_master sm,city_master cim";
			$where = "cim.state_id = sm.state_id and rm.city_id = cim.city_id";
			$datas['data'] = $this->Model_master->jointable($from,$where);
			$datas['state'] = $this->Model_master->selectAllData('state_master');
			$datas['city'] = $this->Model_master->selectAllData('city_master');
			$datas['city2'] = $this->Model_master->selectAllData('city_master');
			$this->load->view("admin/student_details_master",$datas);
		}
		else
		{
			$this->session->set_flashdata('error', 'You Have To Login First!!');
			redirect("Login_master");
		}
	}

	public function insert(){
		if(isset($_POST['add']) && $_POST['add']!="")
		{
			//echo "hi";
			$reg_name = $_POST['reg_name'];
			$reg_email = $_POST['reg_email'];
			$reg_passwd = $_POST['reg_passwd'];
			$reg_gender = $_POST['reg_gender'];
			$reg_dob = $_POST['reg_dob'];
			$reg_blood_grp = $_POST['reg_blood_grp'];
			$reg_type = $_POST['reg_type'];
			$reg_mobile = $_POST['reg_mobile'];
			$reg_address = $_POST['reg_address'];
			$city_id = $_POST['city_id'];
			
			if ($_FILES['reg_stud_profile']['name']!="") {
				$config['upload_path'] = "images/reg_profile";
	            $config['allowed_types'] = "jpg|png|jpeg";
	            $this->upload->initialize($config);

	            $ext = strrchr($_FILES['reg_stud_profile']['name'],".");
	            $img="WebHousing_".md5(rand(1,9999999)).$ext;
	            $_FILES['newname']['name']=$img;
	            $_FILES['newname']['type']=$_FILES['reg_stud_profile']['type'];
	            $_FILES['newname']['tmp_name']=$_FILES['reg_stud_profile']['tmp_name'];
	            $_FILES['newname']['error']=$_FILES['reg_stud_profile']['error'];
	            $_FILES['newname']['size']=$_FILES['reg_stud_profile']['size'];
	            if ($this->upload->do_upload('newname')) {
	            		$reg_stud_profile = $_FILES['newname']['name'];
	            	}else{
						echo mysql_error();
					}	
			}
			if ($_FILES['reg_gov_proof']['name']!="") {
				$config['upload_path'] = "images/reg_gov_proof";
	            $config['allowed_types'] = "jpg|png|jpeg";
	            $this->upload->initialize($config);

	            $ext = strrchr($_FILES['reg_gov_proof']['name'],".");
	            $img="WebHousing_".md5(rand(1,9999999)).$ext;
	            $_FILES['newname']['name']=$img;
	            $_FILES['newname']['type']=$_FILES['reg_gov_proof']['type'];
	            $_FILES['newname']['tmp_name']=$_FILES['reg_gov_proof']['tmp_name'];
	            $_FILES['newname']['error']=$_FILES['reg_gov_proof']['error'];
	            $_FILES['newname']['size']=$_FILES['reg_gov_proof']['size'];
	            if ($this->upload->do_upload('newname')) {
	            		$reg_gov_proof = $_FILES['newname']['name'];
	            	}else{
						echo mysql_error();
					}

			}
				$data = array("reg_name"=>$reg_name,"reg_email"=>$reg_email,"reg_passwd"=>$reg_passwd,"reg_gender"=>$reg_gender,"reg_dob"=>$reg_dob,"reg_blood_grp"=>$reg_blood_grp,"reg_type"=>$reg_type,"reg_mobile"=>$reg_mobile,"reg_address"=>$reg_address,"city_id"=>$city_id,"reg_stud_profile"=>$reg_stud_profile,"reg_gov_proof"=>$reg_gov_proof);
				
				if($this->Model_master->insertdata('reg_master',$data))
				{
					$this->session->set_flashdata('success', 'A New Record is Added Successfully');
					redirect('admin/Student_master');
				}
				else
				{
					$this->session->set_flashdata('del', mysql_error() );
					redirect('admin/Student_master');
					
				}
            
		}

	}

	//Delete record
	public function delete(){
		if (isset($_POST['reg_id']) && $_POST['reg_id']!="") {
			$id=array("reg_id"=>$_POST['reg_id']);
			if($this->Model_master->deletedata("reg_master",$id))
			{
				$this->session->set_flashdata('del', 'Record Deleted Successfully');
				
			}
		}
	}

	//Fetching Record
	public function fetch(){
		if (isset($_POST['reg_id']) && $_POST['reg_id']!="") {
			$id=array("reg_id"=>$_POST['reg_id']);
			$data=$this->Model_master->selectDataById("reg_master",$id);
	        // print_r($data);
			foreach ($data as $key) {
				$result = array("reg_id"=>$key->reg_id,"reg_name"=>$key->reg_name,"reg_email"=>$key->reg_email,"reg_passwd"=>$key->reg_passwd,"reg_gender"=>$key->reg_gender,"reg_dob"=>$key->reg_dob,"reg_blood_grp"=>$key->reg_blood_grp,"reg_type"=>$key->reg_type,"reg_mobile"=>$key->reg_mobile,"reg_address"=>$key->reg_address,"city_id"=>$key->city_id,"reg_stud_profile"=>$key->reg_stud_profile,"reg_gov_proof"=>$key->reg_gov_proof);
			}
			echo json_encode($result);	
		}	
	}

	//Updating Record
	public function update()
	{
		// echo "out side";
		if (isset($_POST['edit']) && $_POST['edit']!="") 
		{
			// echo "in side -> ";
			$iid=$_POST['reg_id'];
			$id = array("reg_id"=>$iid);
			$reg_name = $_POST['reg_name'];
			$reg_email = $_POST['reg_email'];
			$reg_passwd = $_POST['reg_passwd'];
			$reg_gender = $_POST['reg_gender'];
			$reg_dob = $_POST['reg_dob'];
			$reg_blood_grp = $_POST['reg_blood_grp'];
			$reg_type = $_POST['reg_type'];
			$reg_mobile = $_POST['reg_mobile'];
			$reg_address = $_POST['reg_address'];
			$city_id = $_POST['city_id'];

			if ($_FILES['reg_stud_profile']['name']=="" && $_FILES['reg_gov_proof']['name']=="") 
			{
				$reg_stud_profile = $_POST['reg_profile_stud'];
				$reg_gov_proof = $_POST['old_reg_proof_gov'];
				$data = array("reg_name"=>$reg_name,"reg_email"=>$reg_email,"reg_passwd"=>$reg_passwd,"reg_gender"=>$reg_gender,"reg_dob"=>$reg_dob,"reg_blood_grp"=>$reg_blood_grp,"reg_type"=>$reg_type,"reg_mobile"=>$reg_mobile,"reg_address"=>$reg_address,"city_id"=>$city_id,"reg_stud_profile"=>$reg_stud_profile,"reg_gov_proof"=>$reg_gov_proof);
				// echo "<pre>";
				// print_r($id);
				// print_r($data);
				// die;
				if($this->Model_master->updatedata("reg_master",$data,$id))
				{
					$this->session->set_flashdata('edit', 'A Record is uploaded Successfully');
					redirect('admin/Student_master');
				}
				else
				{
					$this->session->set_flashdata('del', mysql_error() );
					redirect('admin/Student_master');
					
				}
			}
			else if ($_FILES['reg_stud_profile']['name']!="" && $_FILES['reg_gov_proof']['name']=="") 
			{
				if(unlink('images/reg_profile/'.$_POST['reg_profile_stud']))
				{
					$config['upload_path'] = "images/reg_profile";
		            $config['allowed_types'] = "jpg|png|jpeg";
		            $this->upload->initialize($config);

		            $ext = strrchr($_FILES['reg_stud_profile']['name'],".");
		            $img="WebHousing_".md5(rand(1,9999999)).$ext;
		            $_FILES['newname']['name']=$img;
		            $_FILES['newname']['type']=$_FILES['reg_stud_profile']['type'];
		            $_FILES['newname']['tmp_name']=$_FILES['reg_stud_profile']['tmp_name'];
		            $_FILES['newname']['error']=$_FILES['reg_stud_profile']['error'];
		            $_FILES['newname']['size']=$_FILES['reg_stud_profile']['size'];
		            if ($this->upload->do_upload('newname')) {
		            		$reg_stud_profile = $_FILES['newname']['name'];
		            		$reg_gov_proof = $_POST['old_reg_proof_gov'];
							$data = array("reg_name"=>$reg_name,"reg_email"=>$reg_email,"reg_passwd"=>$reg_passwd,"reg_gender"=>$reg_gender,"reg_dob"=>$reg_dob,"reg_blood_grp"=>$reg_blood_grp,"reg_type"=>$reg_type,"reg_mobile"=>$reg_mobile,"reg_address"=>$reg_address,"city_id"=>$city_id,"reg_stud_profile"=>$reg_stud_profile,"reg_gov_proof"=>$reg_gov_proof);
							// echo "<pre>";
							// print_r($id);
							// print_r($data);
							// die;
							if($this->Model_master->updatedata("reg_master",$data,$id))
							{
								$this->session->set_flashdata('edit', 'A Record is uploaded Successfully');
								redirect('admin/Student_master');
							}
							else
							{
								$this->session->set_flashdata('del', mysql_error() );
								redirect('admin/Student_master');
								
							}
		            	}else{
							echo mysql_error();
						}
				}
				
			}

			else if ($_FILES['reg_stud_profile']['name']=="" && $_FILES['reg_gov_proof']['name']!="") 
			{
				// echo "profile wasn't selected and gov_proof is selected -> ";	
				if(unlink('images/reg_gov_proof/'.$_POST['old_reg_proof_gov']))
				{
					$config['upload_path'] = "images/reg_gov_proof";
		            $config['allowed_types'] = "jpg|png|jpeg";
		            $this->upload->initialize($config);

		            $ext = strrchr($_FILES['reg_gov_proof']['name'],".");
		            $img="WebHousing_".md5(rand(1,9999999)).$ext;
		            $_FILES['newname']['name']=$img;
		            $_FILES['newname']['type']=$_FILES['reg_gov_proof']['type'];
		            $_FILES['newname']['tmp_name']=$_FILES['reg_gov_proof']['tmp_name'];
		            $_FILES['newname']['error']=$_FILES['reg_gov_proof']['error'];
		            $_FILES['newname']['size']=$_FILES['reg_gov_proof']['size'];
		            if ($this->upload->do_upload('newname')) {
		            		$reg_gov_proof = $_FILES['newname']['name'];
		            		$reg_stud_profile = $_POST['reg_profile_stud'];
							$data = array("reg_name"=>$reg_name,"reg_email"=>$reg_email,"reg_passwd"=>$reg_passwd,"reg_gender"=>$reg_gender,"reg_dob"=>$reg_dob,"reg_blood_grp"=>$reg_blood_grp,"reg_type"=>$reg_type,"reg_mobile"=>$reg_mobile,"reg_address"=>$reg_address,"city_id"=>$city_id,"reg_stud_profile"=>$reg_stud_profile,"reg_gov_proof"=>$reg_gov_proof);
							// echo "<pre>";
							// print_r($id);
							// print_r($data);
							// die;
							if($this->Model_master->updatedata("reg_master",$data,$id))
							{
								$this->session->set_flashdata('edit', 'A Record is uploaded Successfully');
								redirect('admin/Student_master');
							}
							else
							{
								$this->session->set_flashdata('del', 'A Record is not uploaded Successfully'.mysql_error() );
								redirect('admin/Student_master');
								
							}
		            	}else{
							echo mysql_error();
						}
				}
			}

			else
			{
				if (unlink('images/reg_profile/'.$_POST['reg_profile_stud'])) 
				{
					$config['upload_path'] = "images/reg_profile";
		            $config['allowed_types'] = "jpg|png|jpeg";
		            $this->upload->initialize($config);

		            $ext = strrchr($_FILES['reg_stud_profile']['name'],".");
		            $img="WebHousing_".md5(rand(1,9999999)).$ext;
		            $_FILES['newname']['name']=$img;
		            $_FILES['newname']['type']=$_FILES['reg_stud_profile']['type'];
		            $_FILES['newname']['tmp_name']=$_FILES['reg_stud_profile']['tmp_name'];
		            $_FILES['newname']['error']=$_FILES['reg_stud_profile']['error'];
		            $_FILES['newname']['size']=$_FILES['reg_stud_profile']['size'];
		            if ($this->upload->do_upload('newname')) {
		            		$reg_stud_profile = $_FILES['newname']['name'];
		            	}else{
							echo mysql_error();
						}	
				}
				if (unlink('images/reg_gov_proof/'.$_POST['old_reg_proof_gov'])) 
				{
					$config['upload_path'] = "images/reg_gov_proof";
		            $config['allowed_types'] = "jpg|png|jpeg";
		            $this->upload->initialize($config);

		            $ext = strrchr($_FILES['reg_gov_proof']['name'],".");
		            $img="WebHousing_".md5(rand(1,9999999)).$ext;
		            $_FILES['newname']['name']=$img;
		            $_FILES['newname']['type']=$_FILES['reg_gov_proof']['type'];
		            $_FILES['newname']['tmp_name']=$_FILES['reg_gov_proof']['tmp_name'];
		            $_FILES['newname']['error']=$_FILES['reg_gov_proof']['error'];
		            $_FILES['newname']['size']=$_FILES['reg_gov_proof']['size'];
		            if ($this->upload->do_upload('newname')) {
		            		$reg_gov_proof = $_FILES['newname']['name'];
		            	}else{
							echo mysql_error();
						}

				}
				$data = array("reg_name"=>$reg_name,"reg_email"=>$reg_email,"reg_passwd"=>$reg_passwd,"reg_gender"=>$reg_gender,"reg_dob"=>$reg_dob,"reg_blood_grp"=>$reg_blood_grp,"reg_type"=>$reg_type,"reg_mobile"=>$reg_mobile,"reg_address"=>$reg_address,"city_id"=>$city_id,"reg_stud_profile"=>$reg_stud_profile,"reg_gov_proof"=>$reg_gov_proof);
				// echo "<pre>";
				// print_r($id);
				// print_r($data);
				// die;
				if($this->Model_master->updatedata("reg_master",$data,$id))
				{
					$this->session->set_flashdata('edit', 'A Record is uploaded Successfully');
					redirect('admin/Student_master');
				}
				else
				{
					$this->session->set_flashdata('del', 'A Record is not uploaded Successfully'.mysql_error() );
					redirect('admin/Student_master');
					
				}
			
			}
		}		
	}


}
?>