<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messcard_bill_master extends CI_Controller
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
			$datas['web_menu'] = "hostel_bill";
			$datas['web_submenu'] = "messcard_bill";
			$datas['hostel_data'] = $this->Model_master->selectAllData('hostel_master');
			$from = "reg_master rm,hostel_master hm,messcard_bill_master mbm,mess_card_master mcm";
			$where = "mbm.reg_id = rm.reg_id and mbm.hostel_id = hm.hostel_id and mbm.messcard_id = mcm.mess_card_id";
			$datas['bills'] = $this->Model_master->jointable($from,$where);
			$this->load->view("admin/messcard_bill_master",$datas);
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
			// echo "jii";
			$bill_no = $_POST['bill_no'];
			$bill_date = $_POST['bill_date'];
			$bill_due_date = $_POST['bill_due_date'];
			$reg_id = $_POST['reg_id'];
			$reg_email = $_POST['reg_email'];
			$messcard_id = $_POST['messcard_id'];
			$hostel_id = $_POST['hostel_id'];
			$bill_amount = $_POST['mess_card_amount'];
			$bill_details = $_POST['bill_details'];
			$bill_status = "paid";

			if($_FILES['bill_logo']['name']!="")
				{
					$config['upload_path'] = "images/bill_logo";
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

			$data = array('bill_id' => $bill_no ,'bill_date' => $bill_date ,'bill_due_date' => $bill_due_date ,'reg_id' => $reg_id ,'reg_email' => $reg_email ,'hostel_id' => $hostel_id ,'bill_amount' => $bill_amount ,'bill_details' => $bill_details ,'bill_logo' => $bill_logo ,'messcard_id' => $messcard_id);
			// echo "<pre>";
			// print_r($data);

			$rsl = $this->Model_master->insertdata('messcard_bill_master',$data);
			if ($rsl == true)
			{
				$this->session->set_flashdata('success', 'Bill is generated successfully!!');
				redirect('admin/Messcard_bill_master');
			}
			else
			{
				$this->session->set_flashdata('del', 'Bill is not generated successfully!!');	
				redirect('admin/Messcard_bill_master');
			}
		}
	}

	public function fetch_stud_details()
	{
		// $_POST['reg_id'] = '24';
		if (isset($_POST['reg_id']) && $_POST['reg_id']!="") 
		{
			$id = $_POST['reg_id'];

			$from = "hostel_booking_master as hbm,reg_master rm,mess_card_master mcm";
			$where = "hbm.reg_id = $id and mcm.hostel_id = hbm.hostel_id and hbm.reg_id = rm.reg_id";
			$rsl = $this->Model_master->jointable($from,$where);
			// echo "<pre>";
			// print_r($rsl);
			foreach ($rsl as $bill) 
			{
				$result = array('reg_email' => $bill->reg_email,'mess_card_duration' => $bill->mess_card_duration,'mess_card_amount' => $bill->mess_card_amount,'mess_card_id' => $bill->mess_card_id);
			}

			echo json_encode($result);
		}
	}

}
?>