<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hostel_block_master extends CI_Controller
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
			$datas['web_submenu'] = "block_details";
			$from = "block_master bm,hostel_master hm";
			$where = "bm.hostel_id = hm.hostel_id";
			$datas['data'] = $this->Model_master->jointable($from,$where);
			$datas['hostel'] = $this->Model_master->selectAllData('hostel_master');
			$this->load->view("admin/block_details_master",$datas);	
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
			$block_name = $_POST['block_name'];
			$block_division = $_POST['block_division'];
			$block_status = $_POST['block_status'];
			$hostel_id = $_POST['hostel_name'];

			$data=array("block_name"=>$block_name,"block_division"=>$block_division,"block_status"=>$block_status,"hostel_id"=>$hostel_id);
			$this->load->model("Model_master");
			if($this->Model_master->insertdata("block_master",$data))
			{
				$this->session->set_flashdata('success', 'A New Record is Added Successfully');
				redirect("admin/Hostel_block_master");
			}
		}
	}

	// Delete Selected Hostel Details
	public function delete()
	{
		if (isset($_POST['block_id']) && $_POST['block_id']!="") {
			$id=array("block_id"=>$_POST['block_id']);
			$this->load->model("Model_master");
			if($this->Model_master->deletedata("block_master",$id))
			{
				$this->session->set_flashdata('del', 'Record Deleted Successfully');
				
			}
		}
	}

	// View Selected Hostel Details
	public function fetch()
	{
		if (isset($_POST['block_id']) && $_POST['block_id']!="") {
			$id=array("block_id"=>$_POST['block_id']);
			$this->load->model('Model_master');
	        $data=$this->Model_master->selectDataById("block_master",$id);
	        // print_r($data);
			foreach ($data as $key) {
				$result = array("block_id"=>$key->block_id,"block_name"=>$key->block_name,"block_division"=>$key->block_division,"block_status"=>$key->block_status,"hostel_id"=>$key->hostel_id);
			$this->load->model("Model_master");
			}
			echo json_encode($result);	
		}
		
	}

	// Update Hostel Details
	public function update()
	{
		if (isset($_POST['block_id']) && $_POST['block_id']!="") 
		{	
			$id = array('block_id' => $_POST['block_id'] );
			$block_name = $_POST['block_name'];
			$block_division = $_POST['block_division'];
			$block_status = $_POST['block_status'];
			$hostel_id = $_POST['hostel_name'];

			$data=array("block_name"=>$block_name,"block_division"=>$block_division,"block_status"=>$block_status,"hostel_id"=>$hostel_id);
			$this->load->model("Model_master");
			if($this->Model_master->updatedata("block_master",$data,$id))
			{
				$this->session->set_flashdata('edit', 'Record is Updated Successfully');
				redirect("admin/Hostel_block_master");
			}
		}

	}

	public function fetch_block()
	{
		if (isset($_POST['hostel_id']) && $_POST['hostel_id']!="") 
		{
			$id = array('hostel_id' => $_POST['hostel_id']);

			$rsl = $this->Model_master->selectDataById('block_master',$id);
			?>
			<optgroup label="Block Names">Block Names</optgroup>
		    <option value="-1">Select Block</option>
                            
<?php
            foreach($rsl as $c)
            {
?>
    			<option value="<?php echo $c->block_id; ?>"><?php echo $c->block_name; ?></option>
<?php
            }
		}
	}


}
?>