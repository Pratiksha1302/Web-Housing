<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PG_detail_master extends CI_Controller
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
			$datas['web_submenu'] = "pg_details";
			$from = "city_master cm,state_master sm,pg_master pgm,landlord_master lm";
			$where = "pgm.landlord_id = lm.landlord_id and pgm.city_id = cm.city_id and cm.state_id = sm.state_id";
			$datas['data'] = $this->Model_master->jointable($from,$where);
			$datas['landlord'] = $this->Model_master->selectAllData("landlord_master");
			$datas['state'] = $this->Model_master->selectAllData("state_master");
			$datas['city'] = $this->Model_master->selectAllData("city_master");
			// echo "<pre>";
			// print_r($datas);
			$this->load->view("admin/pg_details_master",$datas);
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
			$landlord_id = $_POST['pg_owner_name'];
			$pg_detail = $_POST['pg_details'];
			$pg_address = $_POST['pg_add'];
			$city_id = $_POST['pg_city'];
			$pg_rent = $_POST['pg_rent'];
			if ($_FILES['pg_photo']['name']!="") 
			{
					$config['upload_path'] = "images/pg_photos";
		            $config['allowed_types'] = "jpg|png|jpeg";
		            $this->upload->initialize($config);

		            $ext = strrchr($_FILES['pg_photo']['name'],".");
		            $img="WebHousing_".md5(rand(1,9999999)).$ext;
		            $_FILES['newname']['name']=$img;
		            $_FILES['newname']['type']=$_FILES['pg_photo']['type'];
		            $_FILES['newname']['tmp_name']=$_FILES['pg_photo']['tmp_name'];
		            $_FILES['newname']['error']=$_FILES['pg_photo']['error'];
		            $_FILES['newname']['size']=$_FILES['pg_photo']['size'];
		            if ($this->upload->do_upload('newname')) 
		            {
		            	$pg_photo = $_FILES['newname']['name'];
		            }
		            else
		            {
						echo mysql_error();
					}
				// echo "hi";
				$data = array("landlord_id"=>$landlord_id,"pg_photo"=>$pg_photo,"pg_details"=>$pg_detail,"pg_address"=>$pg_address,"city_id"=>$city_id,"pg_rent"=>$pg_rent);
				
				// echo "<pre>";
				// print_r($data);
				if($this->Model_master->insertdata('pg_master',$data))
				{
					$this->session->set_flashdata('success', 'A Record is Inserted Successfully');
					redirect('admin/PG_detail_master');
				}
				else
				{
					$this->session->set_flashdata('del', 'A Record is not Inserted Successfully');
					redirect('admin/PG_detail_master');
				}
			}

		}
	}

	public function fetch()
	{
		if (isset($_POST['pg_id']) && $_POST['pg_id']!="") 
		{
			$id = $_POST['pg_id'];
			$from = "pg_master pm,city_master cm,landlord_master lm";
			$where = "pm.pg_id = $id and pm.city_id = cm.city_id and pm.landlord_id=lm.landlord_id";
			$rsl = $this->Model_master->jointable($from,$where);
			foreach ($rsl as $pg) 
			{
				$result = array('pg_id' => $pg->pg_id,'landlord_name' => $pg->landlord_name,'pg_photo' => $pg->pg_photo,'pg_details' => $pg->pg_details,'pg_address' => $pg->pg_address,'pg_rent' => $pg->pg_rent,'state_id' => $pg->state_id,'city_id' => $pg->city_id);
			}
			echo json_encode($result);
		}
	}

	public function update()
	{
		if(isset($_POST['edit']) && $_POST['edit']!="")
		{
			$id = array('pg_id' => $_POST['pg_id']);
			$landlord_id = $_POST['pg_owner_name'];
			$pg_detail = $_POST['pg_details'];
			$pg_address = $_POST['pg_add'];
			$city_id = $_POST['client_city'];
			$pg_rent = $_POST['pg_rent'];
			if ($_FILES['pg_photo']['name']!="") 
			{
					$config['upload_path'] = "images/pg_photos";
		            $config['allowed_types'] = "jpg|png|jpeg";
		            $this->upload->initialize($config);

		            $ext = strrchr($_FILES['pg_photo']['name'],".");
		            $img="WebHousing_".md5(rand(1,9999999)).$ext;
		            $_FILES['newname']['name']=$img;
		            $_FILES['newname']['type']=$_FILES['pg_photo']['type'];
		            $_FILES['newname']['tmp_name']=$_FILES['pg_photo']['tmp_name'];
		            $_FILES['newname']['error']=$_FILES['pg_photo']['error'];
		            $_FILES['newname']['size']=$_FILES['pg_photo']['size'];
		            if ($this->upload->do_upload('newname')) 
		            {
		            	$pg_photo = $_FILES['newname']['name'];
		            }
		            else
		            {
						echo mysql_error();
					}
			}
			else
			{
				$pg_photo = $_POST['old_pg_photo'];
			}
				// echo "hi";
				$data = array("landlord_id"=>$landlord_id,"pg_photo"=>$pg_photo,"pg_details"=>$pg_detail,"pg_address"=>$pg_address,"city_id"=>$city_id,"pg_rent"=>$pg_rent);
				
				// echo "<pre>";
				// print_r($data);
				if($this->Model_master->updatedata('pg_master',$data,$id))
				{
					$this->session->set_flashdata('success', 'A Record is Inserted Successfully');
					redirect('admin/PG_detail_master');
				}
				else
				{
					$this->session->set_flashdata('del', 'A Record is not Inserted Successfully');
					redirect('admin/PG_detail_master');
				}
		}
	}

	public function delete()
	{
		if (isset($_POST['pg_id']) && $_POST['pg_id']!="") 
		{
			$id = array('pg_id' => $_POST['pg_id']);
			$this->Model_master->deletedata("pg_master",$id);		
			$this->session->set_flashdata('del', 'Record Deleted Successfully');
		}
	}

}
?>