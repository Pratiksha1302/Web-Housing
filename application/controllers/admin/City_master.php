<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City_master extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_master');
	}

	public function index()
	{
		if(isset($_SESSION['logged_in']))
		{
			$datas['web_menu'] = "extra";
			$datas['web_submenu'] = "city_details";
			$from = "state_master sm,city_master cim";
			$where = "cim.state_id = sm.state_id";
	        $datas['city'] = $this->Model_master->jointable($from,$where);
	        $datas['country'] = $this->Model_master->selectAllData('country_master');
	        $datas['state'] = $this->Model_master->selectAllData('state_master');
			$this->load->view("admin/city_master",$datas);
		}
		else
		{
			$this->session->set_flashdata('error', 'You Have To Login First!!');
			redirect("Login_master");
		}
	}

//-------------		Insert update delete for city_master 	------------------//
	public function insert_into_city_master()
	{
		// echo "outer";
		if(isset($_POST['submit']) && $_POST['submit']!="")
		{
			$country_id = $_POST['country_id'];
			$state_id = $_POST['state_id'];
			$city_name = $_POST['city_name'];
			$data = array("city_name"=>"$city_name","state_id"=>"$state_id");
			if($this->Model_master->insertdata('city_master',$data))
			{
				$this->session->set_flashdata('success','record inserted successfully');
				redirect('admin/city_master');
			}
			else
			{
				$this->session->set_flashdata('del','record is not inserted successfully');
				redirect('admin/city_master');
			}
			
		}
	}

	public function update_city()
	{
		// echo "outer";
		if(isset($_POST['submit']) && $_POST['submit']!="")
		{
			$country_id = $_POST['country_id'];
			$state_id = $_POST['state_id'];
			$city_name = $_POST['city_name'];
			$id = array('city_id' => $_POST['city_id']);
			$data = array("city_name"=>"$city_name","state_id"=>"$state_id");
			if($this->Model_master->updatedata('city_master',$data,$id))
			{
				$this->session->set_flashdata('success','record inserted successfully');
				redirect('admin/city_master');
			}
			else
			{
				$this->session->set_flashdata('del','record is not inserted successfully');
				redirect('admin/city_master');
			}
			
		}	
	}

	public function delete_city()
	{
		if(isset($_POST['city_id']) && $_POST['city_id']!="")
		{
			$id = array('city_id' =>$_POST['city_id']);
			 // print_r($id);
			if($this->Model_master->deletedata('city_master',$id))
			{
				$this->session->set_flashdata('success','record deleted successfully');
				redirect('admin/city_master');
			}
			else
			{
				$this->session->set_flashdata('del','record is not deleted successfully');
				redirect('admin/city_master');
			} 
		}
	}

	//Fetch city using state_id
	public function fetch_city_data(){
		// $_POST['city_id']
		if (isset($_POST['city_id']) && $_POST['city_id']!="") {
			$id = $_POST['city_id'];
			$from = "city_master cm,state_master sm";
			$where = "cm.city_id = $id and cm.state_id = sm.state_id";
			$data = $this->Model_master->jointable($from,$where);
			foreach ($data as $key) {
				$result = array('country_id' => $key->country_id,'state_id' => $key->state_id,'city_name' => $key->city_name,'city_id' => $key->city_id);
			}
			echo json_encode($result);
		}
	}

	public function fetch_country()
	{
		if (isset($_POST['cid']) && $_POST['cid']!="") 
		{
			$id = array('country_id' => $_POST['cid']);
			$data = $this->Model_master->selectDataById("state_master",$id);
?>
		    <option value="-1">Select state</option>
                            
<?php
            foreach($data as $c)
            {
?>
    			<option value="<?php echo $c->state_id; ?>"><?php echo $c->state_name; ?></option>
<?php
            }
		}
	}

}







?>