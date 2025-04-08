<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PG_owner_master extends CI_Controller
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
			$datas['web_menu'] = "pg_details";
			$datas['web_submenu'] = "owner_details";
			$from = "city_master cm,state_master sm,landlord_master lm";
			$where = "cm.city_id = lm.city_id and sm.state_id = cm.state_id";
			$datas['data'] = $this->Model_master->jointable($from,$where);

			$datas['state'] = $this->Model_master->selectAllData("state_master");
			$datas['city'] = $this->Model_master->selectAllData("city_master");
			$datas['state2'] = $this->Model_master->selectAllData("state_master");
			$datas['city2'] = $this->Model_master->selectAllData("city_master");
			// echo "<pre>";
			// print_r($datas);
			$this->load->view("admin/owner_details_master",$datas);
		}
		else
		{
			$this->session->set_flashdata('error', 'You Have To Login First!!');
			redirect("Login_master");
		}
	}

	public function insert()
	{
		if (isset($_POST['add']) && $_POST['add']!="") 
		{
			$landlord_name = $_POST['owner_name'];
			$landlord_email = $_POST['owner_email'];
			$landlord_password = $_POST['owner_pass'];
			$landlord_mobile = $_POST['owner_mno'];
			$landlord_address = $_POST['owner_add'];
			$city_id = $_POST['owner_city'];

				if ($_FILES['owner_profile']['name']!="") 
				{	
					$config['upload_path'] = "images/landlord_profile";
		            $config['allowed_types'] = "jpg|png|jpeg";
		            $this->upload->initialize($config);

		            $ext = strrchr($_FILES['owner_profile']['name'],".");
		            $img="WebHousing_".md5(rand(1,9999999)).$ext;
		            $_FILES['newname']['name']=$img;
		            $_FILES['newname']['type']=$_FILES['owner_profile']['type'];
		            $_FILES['newname']['tmp_name']=$_FILES['owner_profile']['tmp_name'];
		            $_FILES['newname']['error']=$_FILES['owner_profile']['error'];
		            $_FILES['newname']['size']=$_FILES['owner_profile']['size'];
		            if ($this->upload->do_upload('newname')) 
		            {
		            	$landlord_profile = $_FILES['newname']['name'];
		            }
		            else
		            {
						echo mysql_error();
					}	
				}
				else
				{
					$landlord_profile = "user.png";
				}
				
				if ($_FILES['owner_lightbill']['name']!="") 
				{
					$config['upload_path'] = "images/landlord_bill_proof";
		            $config['allowed_types'] = "jpg|png|jpeg";
		            $this->upload->initialize($config);

		            $ext = strrchr($_FILES['owner_lightbill']['name'],".");
		            $img="WebHousing_".md5(rand(1,9999999)).$ext;
		            $_FILES['newname2']['name']=$img;
		            $_FILES['newname2']['type']=$_FILES['owner_lightbill']['type'];
		            $_FILES['newname2']['tmp_name']=$_FILES['owner_lightbill']['tmp_name'];
		            $_FILES['newname2']['error']=$_FILES['owner_lightbill']['error'];
		            $_FILES['newname2']['size']=$_FILES['owner_lightbill']['size'];
		            if ($this->upload->do_upload('newname2')) 
		            {
		            	$landlord_bill_proof = $_FILES['newname2']['name'];
		            }
		            else
		            {
						echo mysql_error();
					}
				}

				$data = array('landlord_name'=>$landlord_name,'landlord_email'=>$landlord_email,'landlord_password'=>$landlord_password,'landlord_mobile'=>$landlord_mobile,'landlord_address'=>$landlord_address,'city_id'=>$city_id,'landlord_bill_proof'=>$landlord_bill_proof,'landlord_profile'=>$landlord_profile);
				
				echo "<pre>";
				print_r($data);

				if ($this->Model_master->insertdata("landlord_master",$data)) 
				{
					$this->session->set_flashdata('success',"A record is Inserted Successfully!!" );
					redirect('admin/PG_owner_master');
				} 
				else 
				{
					echo mysql_error();
				}
		} 
		else 
		{
			$this->session->set_flashdata('del',"A record is not Inserted!!" );
			redirect('admin/PG_owner_master');
		}
		
	}

	public function delete()
	{
		if (isset($_POST['landlord_id']) && $_POST['landlord_id']!="") 
		{
			$id = array('landlord_id'=>$_POST['landlord_id']);

			$data = $this->Model_master->selectAllData("landlord_master",$id);
			// echo "<pre>";
			// print_r($data);die;
			foreach ($data as $k) 
			{
				$profile = $k->landlord_profile;
				$gov_proof = $k->landlord_bill_proof;	
			}
			
			if ($profile!="user.png" && $gov_proof!="") 
			{
				if(unlink('images/landlord_profile/'.$profile) && unlink('images/landlord_bill_proof/'.$gov_proof))
				{
					if ($this->Model_master->deletedata("landlord_master",$id)) 
					{
						if($this->session->set_flashdata('del',"A record is Deleted Successfully!!" ))
						{	
							redirect('admin/PG_owner_master');
						}
					} 
					else 
					{
						if($this->session->set_flashdata('del',"A record is not Deleted Successfully!!" ))
						{	
							redirect('admin/PG_owner_master');
						}
					}
				}
				else 
				{
					if($this->session->set_flashdata('del',"A record is not Deleted Successfully!!" ))
						{	
							redirect('admin/PG_owner_master');
						}
				}		
			}
			elseif ($profile=="user.png" && $gov_proof!="") 
			{
				if(unlink('images/landlord_bill_proof/'.$gov_proof))
				{
					if ($this->Model_master->deletedata("landlord_master",$id)) 
					{
						if($this->session->set_flashdata('del',"A record is Deleted Successfully!!" ))
						{	
							redirect('admin/PG_owner_master');
						}
					} 
					else 
					{
						if($this->session->set_flashdata('del',"A record is not Deleted Successfully!!" ))
						{	
							redirect('admin/PG_owner_master');
						}
					}
				}
				else 
				{
					if($this->session->set_flashdata('del',"A record is not Deleted Successfully!!" ))
						{	
							redirect('admin/PG_owner_master');
						}
				}		
			}

		} 
		else 
		{
			if($this->session->set_flashdata('del',"A record is not Deleted Successfully!!" ))
				{	
					redirect('admin/PG_owner_master');
				}
		}
		
	}

	public function fetch()
	{
		if (isset($_POST['landlord_id']) && $_POST['landlord_id']!="") 
		{
			$id = $_POST['landlord_id'];
			// print_r($id);
			$from = "landlord_master lm,city_master cm,state_master sm";
			$where = "lm.city_id = cm.city_id and cm.state_id = sm.state_id and lm.landlord_id = '$id'";
			if ($data = $this->Model_master->jointable($from,$where)) 
			{
				foreach ($data as $key) 
				{
					$result = array('landlord_id'=>$key->landlord_id,'landlord_name'=>$key->landlord_name,'landlord_email'=>$key->landlord_email,'landlord_password'=>$key->landlord_password,'landlord_mobile'=>$key->landlord_mobile,'landlord_address'=>$key->landlord_address,'city_id'=>$key->city_id,'city_name'=>$key->city_name,'state_id'=>$key->state_id,'state_name'=>$key->state_name,'landlord_bill_proof'=>$key->landlord_bill_proof,'landlord_profile'=>$key->landlord_profile);	
				}
				// echo "<pre>";
				// print_r($data);
				echo json_encode($result);
			} 
			else 
			{
				if($this->session->set_flashdata('del',"A record is not Found!!" ))
				{	
					redirect('admin/PG_owner_master');
				}
			}
		} 
		else 
		{
			if($this->session->set_flashdata('del',"A record is not Found!!" ))
				{	
					redirect('admin/PG_owner_master');
				}	
		}
		
	}

	public function update()
	{
		if (isset($_POST['edit']) && $_POST['edit']!="") 
		{
			$id = array('landlord_id'=>$_POST['landlord_id']);
			$landlord_name = $_POST['owner_name'];
			$landlord_email = $_POST['owner_email'];
			$landlord_password = $_POST['owner_pass'];
			$landlord_mobile = $_POST['owner_mno'];
			$landlord_address = $_POST['owner_add'];
			$city_id = $_POST['owner_city'];

			if($_FILES['owner_profile']['name']!="")
			{	
				if ($_POST['landlord_profile']!="user.png") 
				{	
					if(unlink('images/landlord_profile/'.$_POST['landlord_profile']))
					{

						$config['upload_path'] = "images/landlord_profile";
			            $config['allowed_types'] = "jpg|png|jpeg";
			            $this->upload->initialize($config);

			            $ext = strrchr($_FILES['owner_profile']['name'],".");
			            $img="WebHousing_".md5(rand(1,9999999)).$ext;
			            $_FILES['newname']['name']=$img;
			            $_FILES['newname']['type']=$_FILES['owner_profile']['type'];
			            $_FILES['newname']['tmp_name']=$_FILES['owner_profile']['tmp_name'];
			            $_FILES['newname']['error']=$_FILES['owner_profile']['error'];
			            $_FILES['newname']['size']=$_FILES['owner_profile']['size'];
			            if ($this->upload->do_upload('newname')) 
			            {
			            	$landlord_profile = $_FILES['newname']['name'];
			            }
			            else
			            {
							echo "file was not uploaded!!";
						}
					}
					else
					{
						echo "file does not unlink!!";
					}
				}
				else
				{
						$config['upload_path'] = "images/landlord_profile";
			            $config['allowed_types'] = "jpg|png|jpeg";
			            $this->upload->initialize($config);

			            $ext = strrchr($_FILES['owner_profile']['name'],".");
			            $img="WebHousing_".md5(rand(1,9999999)).$ext;
			            $_FILES['newname']['name']=$img;
			            $_FILES['newname']['type']=$_FILES['owner_profile']['type'];
			            $_FILES['newname']['tmp_name']=$_FILES['owner_profile']['tmp_name'];
			            $_FILES['newname']['error']=$_FILES['owner_profile']['error'];
			            $_FILES['newname']['size']=$_FILES['owner_profile']['size'];
			            if ($this->upload->do_upload('newname')) 
			            {
			            	$landlord_profile = $_FILES['newname']['name'];
			            }
			            else
			            {
							echo "file was not uploaded!!";
						}
				}
			}
			else
			{
				$landlord_profile = $_POST['landlord_profile'];
			}
			if ($_FILES['owner_lightbill']['name']!="") 
			{
				if(unlink('images/landlord_bill_proof/'.$_POST['landlord_bill_proof']))
				{

					$config['upload_path'] = "images/landlord_bill_proof";
		            $config['allowed_types'] = "jpg|png|jpeg";
		            $this->upload->initialize($config);

		            $ext = strrchr($_FILES['owner_lightbill']['name'],".");
		            $img="WebHousing_".md5(rand(1,9999999)).$ext;
		            $_FILES['newname2']['name']=$img;
		            $_FILES['newname2']['type']=$_FILES['owner_lightbill']['type'];
		            $_FILES['newname2']['tmp_name']=$_FILES['owner_lightbill']['tmp_name'];
		            $_FILES['newname2']['error']=$_FILES['owner_lightbill']['error'];
		            $_FILES['newname2']['size']=$_FILES['owner_lightbill']['size'];
		            if ($this->upload->do_upload('newname2')) 
		            {
		            	$landlord_bill_proof = $_FILES['newname2']['name'];
		            }
		            else
		            {
						 echo "billing proof not uploaded";
					}
				}
				else
				{
					echo "file was not unlink";
				}
			}
			else 
			{
				$landlord_bill_proof = $_POST['landlord_bill_proof'];
			}

			$data = array('landlord_name'=>$landlord_name,'landlord_email'=>$landlord_email,'landlord_password'=>$landlord_password,'landlord_mobile'=>$landlord_mobile,'landlord_address'=>$landlord_address,'city_id'=>$city_id,'landlord_bill_proof'=>$landlord_bill_proof,'landlord_profile'=>$landlord_profile);
				echo "<pre>";
				print_r($data);
				print_r($id);
				if ($this->Model_master->updatedata("landlord_master",$data,$id))
				{
					$this->session->set_flashdata('edit',"A record is Updated Successfully!!" );
					redirect('admin/PG_owner_master');
					
				}
				else
				{
					if($this->session->set_flashdata('del',"A record is not Updated Successfully!!" ))
					{
						redirect('admin/PG_owner_master');
					}
				}
			

		} 
		else 
		{
			if($this->session->set_flashdata('del',"A record is not Updated!!" ))
			{
				redirect('admin/PG_owner_master');	
			}
		}
	}

}
?>