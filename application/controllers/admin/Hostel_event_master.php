<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hostel_event_master extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_master');
	}

	public function index()
	{
		$datas['web_menu'] = "hostel_details";
		$datas['web_submenu'] = "event_details";
		$datas['data'] = $this->Model_master->selectalldata('event_master');
		$this->load->view("admin/event_details_master",$datas);
	}

	public function insert(){

		if (isset($_POST['add']) && $_POST['add']!="") {

			$event_name = $_POST['event_name'];
			$event_detail = $_POST['event_detail'];
			$event_date = $_POST['event_date'];
			$event_time = $_POST['event_time'];	
				$count_files=count($_FILES['event_photos']['name']);
				$event_photo="";
				for($i=0;$i<$count_files;$i++)
				{
					$config['upload_path'] = "images/event_images";
	            	$config['allowed_types'] = "gif|jpg|png|jpeg|bmp";
	            	$this->upload->initialize($config);

		            $ext = strrchr($_FILES['event_photos']['name'][$i],".");
		            $img="WebHousing_".md5(rand(1,9999999)).$ext;
		            $_FILES['newname']['name']=$img;
		            $_FILES['newname']['type']=$_FILES['event_photos']['type'][$i];
		            $_FILES['newname']['tmp_name']=$_FILES['event_photos']['tmp_name'][$i];
		            $_FILES['newname']['error']=$_FILES['event_photos']['error'][$i];
		            $_FILES['newname']['size']=$_FILES['event_photos']['size'][$i];
		            $event_photo=$event_photo.$_FILES['newname']['name'].",";
		            $result=$this->upload->do_upload('newname');
				}
			if($result=="1")
            {
            	echo "hi";
				$data = array("event_name"=>$event_name,"event_description"=>$event_detail,"event_photos"=>$event_photo,"event_date"=>$event_date,"event_time"=>$event_time);
				
				$this->load->model('Model_master');
				if($this->Model_master->insertdata('event_master',$data))
				{
					$this->session->set_flashdata('success', 'A New Record is Added Successfully');
					redirect('admin/hostel_event_master');
				}
				else
				{
					$this->session->set_flashdata('del', mysql_error() );
					redirect('admin/hostel_event_master');
					
				}
            }
		}

	}

	public function delete(){

		if (isset($_POST['event_id']) && $_POST['event_id']) {
			$id = array("event_id"=>$_POST['event_id']);
			if($this->Model_master->deletedata("event_master",$data))
			{
				$this->session->set_flashdata('success', 'A New Record is Added Successfully');
				redirect('admin/Hostel_event_master');
			}else{
				$this->session->set_flashdata('del', 'A selected Record is removed Successfully');
				redirect('admin/Hostel_event_master');
			}
		}

	}

	public function fetch()
	{
		//$_POST['event_id']=5;
		$result=array();
			if (isset($_POST['event_id']) && $_POST['event_id']!="") 
			{
				$id=array("event_id"=>$_POST['event_id']);
				$this->load->model('Model_master');
		        $data=$this->Model_master->selectDataById("event_master",$id);
		        // print_r($data);
					foreach ($data as $key) 
					{
						$p = explode(",", $key->event_photos);
								/*for($i=0;$i<count($p);$i++)
								{
									$p['img'.$i]=$p[$i];
								}*/
						$result = array("event_id"=>$key->event_id,"event_name"=>$key->event_name,"event_description"=>$key->event_description,"event_photos"=>$p,"event_time"=>$key->event_time,"event_date"=>$key->event_date);
					}
			}
			echo json_encode($result);	
		
	}

	public function update()
	{
		echo "hii";
	}
}
?>