<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hostel_room_master extends CI_Controller
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
			$datas['web_submenu'] = "room_details";
			$from = "block_master bm,room_master rm";
			$where = "rm.block_id = bm.block_id";
			$datas['data'] = $this->Model_master->jointable($from,$where);
			$datas['hostel'] = $this->Model_master->selectAllData('hostel_master');
			$datas['block'] = $this->Model_master->selectAllData('block_master');
			$this->load->view("admin/room_details_master",$datas);
		}
		else
		{
			$this->session->set_flashdata('error', 'You Have To Login First!!');
			redirect("Login_master");
		}
	}

	// add new Room Details
	public function insert() {
		if (isset($_POST['add']) && $_POST['add']!="") 
		{
			$block_id = $_POST['b_name'];
			$room_beds = $_POST['r_beds'];
			$room_type = $_POST['r_type'];
			$room_details = $_POST['r_detail'];

			$data=array("block_id"=>$block_id,"room_beds"=>$room_beds,"room_type"=>$room_type,"room_details"=>$room_details);
			echo "<pre>";
			print_r($data);

			if($this->Model_master->insertdata("room_master",$data))
			{
				$this->session->set_flashdata('success', 'A New Record is Added Successfully');
				redirect("admin/Hostel_room_master");
			}
			else
			{
				echo mysql_error();
			}
		}
	}

	// Delete Selected Room Details
	public function delete()
	{
		if (isset($_POST['room_id']) && $_POST['room_id']!="") {
			$id=array("room_id"=>$_POST['room_id']);
			$this->load->model("Model_master");
			if($this->Model_master->deletedata("room_master",$id))
			{
				$this->session->set_flashdata('del', 'Record Deleted Successfully');
				
			}
		}
	}

	// View Selected Room Details
	public function fetch()
	{
		if (isset($_POST['room_id']) && $_POST['room_id']!="") {
			$id=$_POST['room_id'];
			$from = "block_master bm,room_master rm";
			$where = "rm.room_id = $id and rm.block_id = bm.block_id";
			$data = $this->Model_master->jointable($from,$where);
	        // print_r($data);
			foreach ($data as $key) {
				$result = array("room_id"=>$key->room_id,"hostel_id"=>$key->hostel_id,"block_id"=>$key->block_id,"room_beds"=>$key->room_beds,"room_type"=>$key->room_type,"room_details"=>$key->room_details);
			}
			echo json_encode($result);	
		}
		
	}

	// Update Room Details
	public function update()
	{
		if (isset($_POST['edit']) && $_POST['edit']!="") 
		{	
			$id=array("room_id"=>$_POST['room_id']);
			$block_id = $_POST['b_name'];
			$room_beds = $_POST['r_beds'];
			$room_type = $_POST['r_type'];
			$room_details = $_POST['r_detail'];

			$data=array("block_id"=>$block_id,"room_beds"=>$room_beds,"room_type"=>$room_type,"room_details"=>$room_details);
			// echo "<pre>";
			// print_r($data);
			if($this->Model_master->updatedata("room_master",$data,$id))
			{
				$this->session->set_flashdata('edit', 'Record is Updated Successfully');
				redirect("admin/Hostel_room_master");
			}
		}

	}

	public function fetch_room()
	{
		if (isset($_POST['block_id']) && $_POST['block_id']!="") 
		{
			$id = $_POST['block_id'];
			$from = "room_master rm";
			$where = "rm.block_id = $id and rm.room_status != 'full'";
			$data = $this->Model_master->jointable($from,$where);
			?>
			<optgroup label="room Number">Room Numbers</optgroup>
			<option value="-1">Select Room</option>
			<?php
			foreach ($data as $key) 
			{
				?>
				<option value="<?php echo $key->room_id; ?>">Room Number <?php echo $key->room_id; ?></option>
				<?php
			}
		}
	}

}
?>