<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_bill_master extends CI_Controller
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
			$datas['web_submenu'] = "package_bill";
			$from = "pg_booking_master pbm,reg_master rm";
			$where = "pbm.reg_id = rm.reg_id";
			$datas['reg_datas'] = $this->Model_master->jointable($from,$where);
			$datas['landlord_datas'] = $this->Model_master->selectAllData('landlord_master');
			$from = "pg_bill_master pbm,pg_master pm,landlord_master lm,reg_master rm";
			$where = "pbm.reg_id = rm.reg_id and pbm.pg_id = pm.pg_id and pbm.landlord_id = lm.landlord_id";
			$datas['pg_bills'] = $this->Model_master->jointable($from,$where);
			$this->load->view("admin/client_bill_master",$datas);
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
			$pg_id = $_POST['pg_id'];
			$landlord_id = $_POST['landlord_id'];
			$bill_amount = $_POST['bill_amount'];
			$bill_details = $_POST['bill_details'];
			$bill_status = $_POST['bill_status'];
			$bill_date = $_POST['bill_date'];
			$bill_due_date = $_POST['bill_due_date'];
			if($_FILES['bill_logo']['name']!="")
				{
					$config['upload_path'] = "images/logoforbill";
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

			$data = array('bill_id' => $bill_no ,'bill_date' => $bill_date ,'bill_due_date' => $bill_due_date ,'reg_id' => $reg_id ,'reg_email' => $reg_email ,'landlord_id' => $landlord_id ,'pg_id' => $pg_id ,'bill_amount' => $bill_amount ,'bill_details' => $bill_details ,'bill_logo' => $bill_logo,'bill_status' => $bill_status);
			// echo "<pre>";
			// print_r($data);

			$rsl = $this->Model_master->insertdata('pg_bill_master',$data);
			if ($rsl == true)
			{
				$this->session->set_flashdata('success', 'Bill is generated successfully!!');
				redirect('admin/client_bill_master');
			}
			else
			{
				$this->session->set_flashdata('del', 'Bill is not generated successfully!!');	
				redirect('admin/client_bill_master');
			}

		}
	}

	public function fetch_client()
	{
		// $_POST['reg_id'] = '17';
		if (isset($_POST['reg_id']) && $_POST['reg_id']!="") 
		{
			$id = $_POST['reg_id'];
			$from = "pg_booking_master pbm,reg_master rm,pg_master pm,landlord_master lm";
			$where = "pbm.reg_id = $id and pbm.reg_id = rm.reg_id and pbm.pg_id = pm.pg_id and pm.landlord_id = lm.landlord_id";
			$reg_data = $this->Model_master->jointable($from,$where);
			// echo "<pre>";
			// print_r($reg_data);
			foreach ($reg_data as $reg) 
			{
				$result = array('reg_id' => $reg->reg_id,'landlord_id' => $reg->landlord_id,'pg_id' => $reg->pg_id,'reg_email' => $reg->reg_email,'pg_payment_status' => $reg->pg_payment_status,'pg_amount' => $reg->pg_amount,'pg_booking_date' => $reg->pg_booking_date);
			}
			echo json_encode($result);
		}
	}

}
?>