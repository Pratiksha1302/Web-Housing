<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_master extends CI_Controller
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
			$datas['web_submenu'] = "client_details";
			$from = "city_master cm,state_master sm,client_master clm";
			$where = "cm.city_id = clm.city_id and sm.state_id = cm.state_id";
			$datas['data'] = $this->Model_master->jointable($from,$where);
			$datas['state'] = $this->Model_master->selectAllData("state_master");
			$datas['city'] = $this->Model_master->selectAllData("city_master");
			// echo "<pre>";
			// print_r($datas);
			$this->load->view("admin/client_details_master",$datas);
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
			$client_name = $_POST['client_name'];
			$client_email = $_POST['client_email'];
			$client_password = $_POST['client_password'];
			$client_gender = $_POST['client_gender'];
			$client_address = $_POST['client_address'];
			$city_id = $_POST['client_city'];

			if($_FILES['client_profile']['name']!="")
			{
				$config['upload_path'] = "images/client_profile";
		        $config['allowed_types'] = "jpg|png|jpeg";
		        $this->upload->initialize($config);

		        $ext = strrchr($_FILES['client_profile']['name'],".");
		        $img="WebHousing_".md5(rand(1,9999999)).$ext;
		        $_FILES['newname2']['name']=$img;
		        $_FILES['newname2']['type']=$_FILES['client_profile']['type'];
		        $_FILES['newname2']['tmp_name']=$_FILES['client_profile']['tmp_name'];
		        $_FILES['newname2']['error']=$_FILES['client_profile']['error'];
		        $_FILES['newname2']['size']=$_FILES['client_profile']['size'];
		        if ($this->upload->do_upload('newname2')) 
		        {
		        	$client_profile = $_FILES['newname2']['name'];
		        }
		        else
		        {
					echo "file not uploaded";
				}
			}
			else
			{
				$client_profile = "";
			}

			if($_FILES['client_gov_proof']['name']!="")
			{
				$config['upload_path'] = "images/client_gov_proof";
		        $config['allowed_types'] = "jpg|png|jpeg";
		        $this->upload->initialize($config);

		        $ext = strrchr($_FILES['client_gov_proof']['name'],".");
		        $img="WebHousing_".md5(rand(1,9999999)).$ext;
		        $_FILES['newname']['name']=$img;
		        $_FILES['newname']['type']=$_FILES['client_gov_proof']['type'];
		        $_FILES['newname']['tmp_name']=$_FILES['client_gov_proof']['tmp_name'];
		        $_FILES['newname']['error']=$_FILES['client_gov_proof']['error'];
		        $_FILES['newname']['size']=$_FILES['client_gov_proof']['size'];
		        if ($this->upload->do_upload('newname')) 
		        {
		        	$client_gov_proof = $_FILES['newname']['name'];
		        }
		        else
		        {
					echo "file not uploaded";
				}
			}
			else
			{
				$client_gov_proof = "";
			}

			$data = array('client_name'=>$client_name,'client_email'=>$client_email,'client_password'=>$client_password,'client_gender'=>$client_gender,'client_address'=>$client_address,'city_id'=>$city_id,'client_profile'=>$client_profile,'client_gov_proof'=>$client_gov_proof);
			// echo "<pre>";
			// print_r($data);
			// die;
			if ($this->Model_master->insertdata("client_master",$data)) 
			{
				$this->session->set_flashdata('success',"A record is Inserted Successfully!!" );
				redirect('admin/Client_master');
			}
			else
			{
				$this->session->set_flashdata('del',"A record is not Inserted!!" );
				redirect('admin/Client_master');	
			}
		} 
		else 
		{
			$this->session->set_flashdata('del',"A record is not Inserted!!" );
			redirect('admin/Client_master');
		}
		
	}

	public function fetch()
	{
		if (isset($_POST['client_id']) && $_POST['client_id']!="") 
		{
			$id = $_POST['client_id'];
			// print_r($id);
			$from = "client_master lm,city_master cm,state_master sm";
			$where = "lm.city_id = cm.city_id and cm.state_id = sm.state_id and lm.client_id = '$id'";
			if ($data = $this->Model_master->jointable($from,$where)) 
			{
				foreach ($data as $key) 
				{
					$result = array('client_id'=>$key->client_id,'client_name'=>$key->client_name,'client_email'=>$key->client_email,'client_password'=>$key->client_password,'client_gender'=>$key->client_gender,'client_address'=>$key->client_address,'city_id'=>$key->city_id,'city_name'=>$key->city_name,'state_id'=>$key->state_id,'state_name'=>$key->state_name,'client_gov_proof'=>$key->client_gov_proof,'client_profile'=>$key->client_profile);	
				}
				// echo "<pre>";
				// print_r($data);
				echo json_encode($result);
			} 
			else 
			{
				if($this->session->set_flashdata('del',"A record is not Found!!" ))
				{	
					redirect('admin/Client_master');
				}
			}
		} 
		else 
		{
			if($this->session->set_flashdata('del',"hiii" ))
				{	
					redirect('admin/Client_master');
				}	
		}
	}

	public function update()
	{
		if (isset($_POST['edit']) && $_POST['edit']!="") 
		{
			$id = array('client_id'=>$_POST['client_id']);
			$client_name = $_POST['client_name'];
			$client_email = $_POST['client_email'];
			$client_password = $_POST['client_password'];
			$client_gender = $_POST['client_gender'];
			$client_address = $_POST['client_address'];
			$city_id = $_POST['client_city'];

			if($_POST['old_client_profile']!="" && $_FILES['client_profile']['name']!="")
			{
				if (unlink('images/client_profile/'.$_POST['old_client_profile'])) 
				{
					$config['upload_path'] = "images/client_profile";
			        $config['allowed_types'] = "jpg|png|jpeg";
			        $this->upload->initialize($config);

			        $ext = strrchr($_FILES['client_profile']['name'],".");
			        $img="WebHousing_".md5(rand(1,9999999)).$ext;
			        $_FILES['newname2']['name']=$img;
			        $_FILES['newname2']['type']=$_FILES['client_profile']['type'];
			        $_FILES['newname2']['tmp_name']=$_FILES['client_profile']['tmp_name'];
			        $_FILES['newname2']['error']=$_FILES['client_profile']['error'];
			        $_FILES['newname2']['size']=$_FILES['client_profile']['size'];
			        if ($this->upload->do_upload('newname2')) 
			        {
			        	$client_profile = $_FILES['newname2']['name'];
			        }
			        else
			        {
						echo "file not uploaded";
					}	
				}
				else
			        {
						echo "file not Unlink";
					}
			}
			elseif ($_POST['old_client_profile']=="" && $_FILES['client_profile']['name']!="") 
			{
					$config['upload_path'] = "images/client_profile";
			        $config['allowed_types'] = "jpg|png|jpeg";
			        $this->upload->initialize($config);

			        $ext = strrchr($_FILES['client_profile']['name'],".");
			        $img="WebHousing_".md5(rand(1,9999999)).$ext;
			        $_FILES['newname2']['name']=$img;
			        $_FILES['newname2']['type']=$_FILES['client_profile']['type'];
			        $_FILES['newname2']['tmp_name']=$_FILES['client_profile']['tmp_name'];
			        $_FILES['newname2']['error']=$_FILES['client_profile']['error'];
			        $_FILES['newname2']['size']=$_FILES['client_profile']['size'];
			        if ($this->upload->do_upload('newname2')) 
			        {
			        	$client_profile = $_FILES['newname2']['name'];
			        }
			        else
			        {
						echo "file not uploaded";
					}
			}
			else
			{
				$client_profile = $_POST['old_client_profile'];
			}

			if($_POST['old_client_gov_proof']!="" && $_FILES['client_gov_proof']['name']!="")
			{
				if(unlink('images/client_gov_proof/'.$_POST['old_client_gov_proof']))
				{
					$config['upload_path'] = "images/client_gov_proof";
			        $config['allowed_types'] = "jpg|png|jpeg";
			        $this->upload->initialize($config);

			        $ext = strrchr($_FILES['client_gov_proof']['name'],".");
			        $img="WebHousing_".md5(rand(1,9999999)).$ext;
			        $_FILES['newname']['name']=$img;
			        $_FILES['newname']['type']=$_FILES['client_gov_proof']['type'];
			        $_FILES['newname']['tmp_name']=$_FILES['client_gov_proof']['tmp_name'];
			        $_FILES['newname']['error']=$_FILES['client_gov_proof']['error'];
			        $_FILES['newname']['size']=$_FILES['client_gov_proof']['size'];
			        if ($this->upload->do_upload('newname')) 
			        {
			        	$client_gov_proof = $_FILES['newname']['name'];
			        }
			        else
			        {
						echo "file not uploaded";
					}	
				}
				
			}
			elseif ($_POST['old_client_gov_proof']=="" && $_FILES['client_gov_proof']['name']!="") 
			{
					$config['upload_path'] = "images/client_gov_proof";
			        $config['allowed_types'] = "jpg|png|jpeg";
			        $this->upload->initialize($config);

			        $ext = strrchr($_FILES['client_gov_proof']['name'],".");
			        $img="WebHousing_".md5(rand(1,9999999)).$ext;
			        $_FILES['newname']['name']=$img;
			        $_FILES['newname']['type']=$_FILES['client_gov_proof']['type'];
			        $_FILES['newname']['tmp_name']=$_FILES['client_gov_proof']['tmp_name'];
			        $_FILES['newname']['error']=$_FILES['client_gov_proof']['error'];
			        $_FILES['newname']['size']=$_FILES['client_gov_proof']['size'];
			        if ($this->upload->do_upload('newname')) 
			        {
			        	$client_gov_proof = $_FILES['newname']['name'];
			        }
			        else
			        {
						echo "file not uploaded";
					}
			}
			else
			{
				$client_gov_proof = $_POST['old_client_gov_proof'];
			}

			$data = array('client_name'=>$client_name,'client_email'=>$client_email,'client_password'=>$client_password,'client_gender'=>$client_gender,'client_address'=>$client_address,'city_id'=>$city_id,'client_profile'=>$client_profile,'client_gov_proof'=>$client_gov_proof);
			// echo "<pre>";
			// print_r($data);
			// die;
			if ($this->Model_master->updatedata("client_master",$data,$id)) 
			{
				$this->session->set_flashdata('success',"A record is Inserted Successfully!!" );
				redirect('admin/Client_master');
			}
			else
			{
				$this->session->set_flashdata('del',"A record is not Inserted!!" );
				redirect('admin/Client_master');	
			}
		} 
		else 
		{
			$this->session->set_flashdata('del',"A record is not Inserted!!" );
			redirect('admin/Client_master');
		}

		
	}


	public function delete()
	{
		if (isset($_POST['client_id']) && $_POST['client_id']!="") 
		{
			$id = array('client_id'=>$_POST['client_id']);

			$data = $this->Model_master->selectAllData("client_master",$id);
			// echo "<pre>";
			// print_r($data);die;
			foreach ($data as $k) 
			{
				$profile = $k->client_profile;
				$gov_proof = $k->client_gov_proof;	
			}

			if ($profile=="" && $gov_proof!="") 
			{
				if(unlink('images/client_gov_proof/'.$gov_proof))
				{
					if ($this->Model_master->deletedata("client_master",$id)) 
					{
						if($this->session->set_flashdata('del',"A record is Deleted Successfully!!" ))
						{	
							redirect('admin/Client_master');
						}
					} 
					else 
					{
						if($this->session->set_flashdata('del',"A record is not Deleted Successfully!!" ))
						{	
							redirect('admin/Client_master');
						}
					}
				}
				else
				{
					if($this->session->set_flashdata('del',"A record is not Deleted Successfully!!" ))
					{	
						redirect('admin/Client_master');
					}
				}
			} 
			else 
			{
				if($this->session->set_flashdata('del',"A record is not Deleted Successfully!!" ))
				{	
					redirect('admin/Client_master');
				}
			}
			
			if(unlink('images/client_profile/'.$profile) && unlink('images/client_gov_proof/'.$gov_proof))
			{
				if ($this->Model_master->deletedata("client_master",$id)) 
				{
					if($this->session->set_flashdata('del',"A record is Deleted Successfully!!" ))
					{	
						redirect('admin/Client_master');
					}
				} 
				else 
				{
					if($this->session->set_flashdata('del',"A record is not Deleted Successfully!!" ))
					{	
						redirect('admin/Client_master');
					}
				}
			}
			else 
			{
				if($this->session->set_flashdata('del',"A record is not Deleted Successfully!!" ))
					{	
						redirect('admin/Client_master');
					}
			}	
		} 
		else 
		{
			if($this->session->set_flashdata('del',"A record is not Deleted Successfully!!" ))
				{	
					redirect('admin/Client_master');
				}
		}
		
	}


}
?>