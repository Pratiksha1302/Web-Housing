<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_fees_master extends CI_Controller
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
			$datas['web_submenu'] = "student_bill";
			$datas['hostel_data'] = $this->Model_master->selectAllData('hostel_master');
			$from = "reg_master rm,hostel_master hm,hostel_bill_master hbm";
			$where = "hbm.reg_id = rm.reg_id and hbm.hostel_id = hm.hostel_id";
			$datas['bills'] = $this->Model_master->jointable($from,$where);
			$this->load->view("admin/student_fees_master",$datas);
		}
		else
		{
			$this->session->set_flashdata('error', 'You Have To Login First!!');
			redirect("Login_master");
		}
	}

	//insertion in hostel_bill_master
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
			$hostel_id = $_POST['hostel_id'];
			$bill_amount = $_POST['bill_amount'];
			$bill_details = $_POST['bill_details'];

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

			$data = array('bill_no' => $bill_no ,'bill_date' => $bill_date ,'bill_due_date' => $bill_due_date ,'reg_id' => $reg_id ,'reg_email' => $reg_email ,'hostel_id' => $hostel_id ,'bill_amount' => $bill_amount ,'bill_details' => $bill_details ,'bill_logo' => $bill_logo);
			// echo "<pre>";
			// print_r($data);

			$rsl = $this->Model_master->insertdata('hostel_bill_master',$data);
			if ($rsl == true)
			{
				$this->session->set_flashdata('success', 'Bill is generated successfully!!');
				$this->index();
			}
			else
			{
				$this->session->set_flashdata('del', 'Bill is not generated successfully!!');	
				$this->index();
			}
		}
	}

	public function fetch_stud()
	{
		if (isset($_POST['hostel_id']) && $_POST['hostel_id']!="") 
		{
			echo $id = $_POST['hostel_id'];
			$from = "hostel_booking_master as hbm,reg_master rm";
			$where = "hbm.hostel_id = $id and hbm.reg_id = rm.reg_id";
			$rsl = $this->Model_master->jointable($from,$where);
			print_r($rsl);
?>
			<option value="-1">Select Student </option>
<?php
			foreach ($rsl as $r) 
			{
?>
    			<option value="<?php echo $r->reg_id; ?>"><?php echo $r->reg_name; ?></option>
<?php
			}
		}
	}

	public function fetch_stud_details()
	{
		if (isset($_POST['reg_id']) && $_POST['reg_id']!="") 
		{
			$id = $_POST['reg_id'];
			$from = "hostel_booking_master as hbm,reg_master rm";
			$where = "hbm.reg_id = $id and hbm.reg_id = rm.reg_id";
			$rsl = $this->Model_master->jointable($from,$where);
			// print_r($rsl);
			foreach ($rsl as $bill) 
			{
				$result = array('reg_email' => $bill->reg_email,'hostel_booking_date' => $bill->hostel_booking_date,'bill_status' => $bill->hostel_payment_status,'bill_amount' => $bill->hostel_amount);
			}

			echo json_encode($result);
		}
	}

}
?>