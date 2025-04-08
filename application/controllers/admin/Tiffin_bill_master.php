<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiffin_bill_master extends CI_Controller
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
			$datas['web_menu'] = "pg_bill";
			$datas['web_submenu'] = "tiffin_bill";
			$from = "tiffin_master tm,reg_master rm";
			$where = "tm.reg_id = rm.reg_id";
			$datas['reg_data'] = $this->Model_master->jointable($from,$where);
			$from = "tiffin_bill_master tbm,tiffin_master tm,reg_master rm";
			$where = "tbm.reg_id = rm.reg_id and tbm.tiffin_id = tm.tiffin_id";
			$datas['tiffin_bills'] = $this->Model_master->jointable($from,$where);
			$this->load->view("admin/Tiffin_bill_master",$datas);
		}
		else
		{
			$this->session->set_flashdata('error', 'You Have To Login First!!');
			redirect("Login_master");
		}
	}

	public function insert_bill()
	{
		// echo "hii";
		if (isset($_POST['bill_gen']) && $_POST['bill_gen']!="") 
		{
			$bill_no = $_POST['bill_no'];
			$reg_id = $_POST['reg_id'];
			$reg_email = $_POST['reg_email'];
			$tiffin_id = $_POST['tiffin_id'];
			$bill_amount = $_POST['bill_amount'];
			$bill_details = $_POST['bill_details'];
			$bill_status = $_POST['bill_status'];
			$bill_date = $_POST['bill_date'];
			$bill_due_date = $_POST['bill_due_date'];
			if($_FILES['bill_logo']['name']!="")
				{
					$config['upload_path'] = "images/pg_bill_logo";
			        $config['allowed_types'] = "jpg|png|jpeg";
			        $this->upload->initialize($config);

			        $ext = strrchr($_FILES['bill_logo']['name'],".");
			        $img="WebHousing_".md5(rand(1,9999999)).$ext;
			        $_FILES['newname']['name']=$img;
			        $_FILES['newname']['type']=$_FILES['bill_logo']['type'];
			        $_FILES['newname']['tmp_name']=$_FILES['bill_logo']['tmp_name'];
			        $_FILES['newname']['error']=$_FILES['bill_logo']['error'];
			        $_FILES['newname']['size']=$_FILES['bill_logo']['size'];
			        if ($this->upload->do_upload('newname')) 
			        {
			          	$bill_logo = $_FILES['newname']['name'];
			        }
			        else
			        {
						if ($this->session->set_flashdata('del',' is not Updated')) 
						{
							$this->index();
						}		
					}
				}
			else
				{
					$bill_logo = "logo3.png";
				}

			$data = array('bill_id' => $bill_no ,'bill_date' => $bill_date ,'bill_due_date' => $bill_due_date ,'reg_id' => $reg_id ,'reg_email' => $reg_email ,'tiffin_id' => $tiffin_id ,'bill_amount' => $bill_amount ,'bill_details' => $bill_details ,'bill_logo' => $bill_logo,'bill_status' => $bill_status);
			// echo "<pre>";
			// print_r($data);
			$rsl = $this->Model_master->insertdata('tiffin_bill_master',$data);
			if ($rsl == true)
			{
				$this->session->set_flashdata('success', 'Bill is generated successfully!!');
				redirect('admin/Tiffin_bill_master');
			}
			else
			{
				$this->session->set_flashdata('del', 'Bill is not generated successfully!!');	
				redirect('admin/Tiffin_bill_master');
			}
		}
	}

	public function fetch_client()
	{
		// $_POST['reg_id'] = '17';
		if (isset($_POST['reg_id']) && $_POST['reg_id']!="") 
		{
			$id = $_POST['reg_id'];
			$from = "tiffin_master tm,reg_master rm";
			$where = "tm.reg_id = rm.reg_id and tm.reg_id = $id";
			$reg_data = $this->Model_master->jointable($from,$where);
			// echo "<pre>";
			// print_r($reg_data);
			foreach ($reg_data as $reg) 
			{
				$result = array('reg_id' => $reg->reg_id,'tiffin_id' => $reg->tiffin_id,'reg_email' => $reg->reg_email,'meal_amount' => $reg->meal_amount,'meal_date' => $reg->meal_date);
			}
			echo json_encode($result);
		}
	}


}