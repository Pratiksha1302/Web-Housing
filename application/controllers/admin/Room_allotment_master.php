<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room_allotment_master extends CI_Controller {
	
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
			$datas['web_submenu'] = "room_allotment";

			$from = "reg_master rm,hostel_master hm,hostel_booking_master hbm";
			$where = "hbm.reg_id = rm.reg_id and hm.hostel_id = hbm.hostel_id";
			$datas['data'] = $this->Model_master->jointable($from,$where);

			$from = "room_master rm,stud_room_allotment sra,hostel_master hm,block_master bm";
			$where = "sra.room_id = rm.room_id and rm.room_status = 'full' and rm.block_id = bm.block_id and bm.hostel_id = hm.hostel_id";
			$datas['allocated_room_data'] = $this->Model_master->jointable($from,$where);

			$datas['reg'] = $this->Model_master->selectAllData('reg_master');
			$datas['hostel'] = $this->Model_master->selectAllData('hostel_master');
			// echo "<pre>";
			// print_r($datas);
			$this->load->view("admin/room_allotment_master",$datas);
		}
		else
		{
			$this->session->set_flashdata('error', 'You Have To Login First!!');
			redirect("Login_master");
		}
	}

	public function fetch_stud()
	{
		if (isset($_POST['hostel_id']) && $_POST['hostel_id']!="") 
		{
			$h_id = $_POST['hostel_id'];

			$from = "hostel_booking_master hbm,reg_master rm";
			$where = "hbm.hostel_id = $h_id and hbm.reg_id = rm.reg_id";
			$data = $this->Model_master->jointable($from,$where);
			
			$from = "hostel_booking_master hbm,reg_master rm";
			$where = "hbm.hostel_id = $h_id and hbm.reg_id = rm.reg_id";
			$data = $this->Model_master->jointable($from,$where); 
			?>
			<optgroup label="reg_id">All Students</optgroup>
			<option value="-1">Select Student data</option>
			<?php
			foreach ($data as $key) 
			{
				?>
				<option value="<?php echo $key->reg_id; ?>"><?php echo $key->reg_name; ?></option>
				<?php
			}
		}
	}

	public function room_allotment()
	{
		if (isset($_POST['add']) && $_POST['add']!="") 
		{
			$room_id = $_POST['room_id'];
			$reg_id = implode(',', $_POST['reg_id']);
			// echo "$reg_id";

			$data = array('room_id'=>$room_id,'reg_id'=>$reg_id);
			// echo "<pre>";
			// print_r($data);
			$rsl = $this->Model_master->insertdata('stud_room_allotment',$data);
			if ($rsl == true) 
			{
				$rid = array('room_id'=>$room_id);
				$status = "full";
				$d = array('room_status'=>$status);
				$r = $this->Model_master->updatedata('room_master',$d,$rid);
				if ($r == true) 
				{
					$this->session->set_flashdata('success','Room allocation successfully done.');
					redirect('admin/Room_allotment_master');
				}
				else
				{
					$this->session->set_flashdata('del','Room allocation failed.');
					redirect('admin/Room_allotment_master');
				}
			}
			else
			{
				$this->session->set_flashdata('del','Room allocation failed.');
				redirect('admin/Room_allotment_master');
			}
		}
	}

	public function delete()
	{
		if (isset($_GET['del']) && $_GET['del']!="") 
		{
			$d = $_GET['del'];
			$id = array('allotment_id' => $d);
			$rsl = $this->Model_master->deletedata('stud_room_allotment',$id);
			if ($rsl == true) 
			{
				$room_id = array('room_id' => $_GET['room']);
				$data = array('room_status' => 'null');
				if ($this->Model_master->updatedata('room_master',$data,$room_id)) 
				{
					$this->session->set_flashdata('success', 'Data Deleted Successfully');
					redirect("admin/Room_allotment_master");
				}
				else
				{
					$this->session->set_flashdata('del', 'Room detail is not updated Successfully');
					redirect("admin/Room_allotment_master");
				}
				
			}
			else
			{
				$this->session->set_flashdata('del', 'Data is not Deleted Successfully');
				redirect("admin/Tifin_attendance_master");
			}
		}
	}

}