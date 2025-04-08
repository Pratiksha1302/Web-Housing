<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hostel_master extends CI_Controller
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
			$datas['web_submenu'] = "hostel_details";
			$this->load->model('Model_master');
			$datas['state'] = $this->Model_master->selectAllData('state_master');
			$datas['city'] = $this->Model_master->selectAllData('city_master');
			$from = "city_master cm,hostel_master hm";
			$where = "cm.city_id = hm.city_id";
			$datas['data'] = $this->Model_master->jointable($from,$where);
			$this->load->view("admin/hostel_details_master",$datas);
		}
		else
		{
			$this->session->set_flashdata('error', 'You Have To Login First!!');
			redirect("Login_master");
		}
	}

	// add new Hostel Details
	public function insert() {
		if (isset($_POST['add']) && $_POST['add']!="") 
		{
			$hostel_name = $_POST['hostel_name'];
			$hostel_address = $_POST['hostel_address'];
			$hostel_pincode = $_POST['hostel_pincode'];
			$hostel_phone = $_POST['hostel_phone'];
			$city_id = $_POST['hostel_city'];
			$hostel_rent = $_POST['hostel_rent'];
			$hostel_details= "Hostel contains free wifi for the students & it also provides the students mess.
Students can read the books or can issue the books from the liabrary.
Messcard also provided by hostel.";
			// print_r($_FILES['hostel_photo']['name']);
			if($_FILES['hostel_photo']['name']!="")
			{
					$config['upload_path'] = "images/hostel_image";
	            	$config['allowed_types'] = "gif|jpg|png|jpeg|bmp";
	            	$this->upload->initialize($config);

		            $ext = strrchr($_FILES['hostel_photo']['name'],".");
		            $img="WebHousing_".md5(rand(1,9999)).$ext;
		            $_FILES['newname']['name']=$img;
		            $_FILES['newname']['type']=$_FILES['hostel_photo']['type'];
		            $_FILES['newname']['tmp_name']=$_FILES['hostel_photo']['tmp_name'];
		            $_FILES['newname']['error']=$_FILES['hostel_photo']['error'];
		            $_FILES['newname']['size']=$_FILES['hostel_photo']['size'];
		            $hostel_image=$_FILES['newname']['name'];
		            $result=$this->upload->do_upload('newname');
				
				if ($result == "0") 
				{
					echo "images are not uploaded!!";
					$hostel_image = "";
				}
			}
			else
			{
				echo "images are not selected";
				$hostel_image = "";
			}

			$data=array("hostel_name"=>$hostel_name,"hostel_address"=>$hostel_address,"hostel_details"=>$hostel_details,"hostel_pincode"=>$hostel_pincode,"hostel_phone"=>$hostel_phone,"city_id"=>$city_id,"hostel_rent"=>$hostel_rent,"hostel_image"=>$hostel_image);
			
			// echo "<pre>";
			// print_r($data);

			if($this->Model_master->insertdata("hostel_master",$data))
			{
				$this->session->set_flashdata('success', 'A New Record is Added Successfully');
				redirect("admin/Hostel_master");
			}
		}
	}

	// Delete Selected Hostel Details
	public function delete()
	{
		if (isset($_POST['hostel_id']) && $_POST['hostel_id']!="") {
			$id=array("hostel_id"=>$_POST['hostel_id']);
			$data = $this->Model_master->selectDataById('hostel_master',$id);
			if ($data == true) 
			{
				foreach ($data as $rsl) 
				{
					$p = explode(',', $rsl->hostel_image);
				}

				for($i=0;$i<count($p);$i++)
				{
					if(unlink('images/hostel_image/'.$p[$i]))
					{
						echo $i.' image remove<br>';
					}

				}
				if($this->Model_master->deletedata("hostel_master",$id))
				{
					$this->session->set_flashdata('del', 'Record Deleted Successfully');	
				}
			}
		}
	}

	// View Selected Hostel Details
	public function fetch()
	{
		if (isset($_POST['hostel_id']) && $_POST['hostel_id']!="") {
			$id=$_POST['hostel_id'];
			$from = "city_master cm,hostel_master hm";
			$where = "cm.city_id = hm.city_id and hm.hostel_id=$id";
			$data = $this->Model_master->jointable($from,$where);
			// print_r($data);
			foreach ($data as $key) {

				$p = explode(",", $key->hostel_image);

				$result = array("hostel_id"=>$key->hostel_id,"hostel_name"=>$key->hostel_name,"hostel_address"=>$key->hostel_address,"hostel_pincode"=>$key->hostel_pincode,"hostel_phone"=>$key->hostel_phone,"city_id"=>$key->city_id,"state_id"=>$key->state_id,"hostel_rent"=>$key->hostel_rent,"hostel_image"=>$p,"array" => $key->hostel_image);
			}
			echo json_encode($result);	
		}
		
	}

	// Update Hostel Details
	public function update()
	{
		if (isset($_POST['edit']) && $_POST['edit']!="") 
		{	
			$id=array("hostel_id"=>$_POST['hostel_id']);
			$hostel_name = $_POST['hostel_name'];
			$hostel_address = $_POST['hostel_address'];
			$hostel_pincode = $_POST['hostel_pincode'];
			$hostel_phone = $_POST['hostel_phone'];
			$city_id = $_POST['hostel_city'];
			$hostel_rent = $_POST['hostel_rent'];

			// print_r($_FILES['hostel_photo']['name']);
			if($_FILES['hostel_photo']['name']!="" & $_POST['old_hostel_photos']=="")
			{
					$config['upload_path'] = "images/hostel_image";
	            	$config['allowed_types'] = "gif|jpg|png|jpeg|bmp";
	            	$this->upload->initialize($config);

		            $ext = strrchr($_FILES['hostel_photo']['name'],".");
		            $img="WebHousing_".md5(rand(1,9999)).$ext;
		            $_FILES['newname']['name']=$img;
		            $_FILES['newname']['type']=$_FILES['hostel_photo']['type'];
		            $_FILES['newname']['tmp_name']=$_FILES['hostel_photo']['tmp_name'];
		            $_FILES['newname']['error']=$_FILES['hostel_photo']['error'];
		            $_FILES['newname']['size']=$_FILES['hostel_photo']['size'];
		            $hostel_image=$_FILES['newname']['name'];
		            $result=$this->upload->do_upload('newname');
			
			}
			elseif ($_FILES['hostel_photo']['name']!="" & $_POST['old_hostel_photos']!="") 
			{
				$photo = explode(',', $_POST['old_hostel_photos']);
				for($i=0;$i<count($photo);$i++)
				{
					if(unlink('images/hostel_image/'.$photo[$i]))
					{
						echo $i.' image remove<br>';
					}

				}

				
					$config['upload_path'] = "images/hostel_image";
	            	$config['allowed_types'] = "gif|jpg|png|jpeg|bmp";
	            	$this->upload->initialize($config);

		            $ext = strrchr($_FILES['hostel_photo']['name'],".");
		            $img="WebHousing_".md5(rand(1,9999)).$ext;
		            $_FILES['newname']['name']=$img;
		            $_FILES['newname']['type']=$_FILES['hostel_photo']['type'];
		            $_FILES['newname']['tmp_name']=$_FILES['hostel_photo']['tmp_name'];
		            $_FILES['newname']['error']=$_FILES['hostel_photo']['error'];
		            $_FILES['newname']['size']=$_FILES['hostel_photo']['size'];
		            $hostel_image=$_FILES['newname']['name'];
		            $result=$this->upload->do_upload('newname');
				
				if ($result == false) 
				{
					echo "images not uploaded";
					die;
				}

			}
			else
			{
				echo "images are not selected";
				$hostel_image = $_POST['old_hostel_photos'];
			}

			$data=array("hostel_name"=>$hostel_name,"hostel_address"=>$hostel_address,"hostel_pincode"=>$hostel_pincode,"hostel_phone"=>$hostel_phone,"city_id"=>$city_id,"hostel_rent"=>$hostel_rent,"hostel_image"=>$hostel_image);
			
			// echo "<pre>";
			// print_r($data);
			// print_r($id);
			if($this->Model_master->updatedata("hostel_master",$data,$id))
			{
				$this->session->set_flashdata('edit', 'Record is Updated Successfully');
				redirect("admin/Hostel_master");
			}
		}

	}
}
?>