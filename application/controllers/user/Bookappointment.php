<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bookappointment extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_master');
	}

	public function index()
	{
		if(isset($_SESSION['user']) && $_SESSION['user']!="")
		{
			$mail=$_SESSION['user'];
			$data['data']=$this->Model_master->selectDataById("reg_master",$mail);
			$data['hostel']= $this->Model_master->selectAllData('hostel_master');
			// echo "<pre>";
			// print_r($d);die;
			$this->load->view("user/booknow.php",$data);
		}
		else
		{
			$data['hostel']= $this->Model_master->selectAllData('hostel_master');
			$this->load->view("user/booknow.php",$data);
		}
	}

	public function check_id()
	{
		if (isset($_POST['reg_uniq_id']) && $_POST['reg_uniq_id']!="")
		{
			$reg_id=$_POST['reg_uniq_id'];
			$reg_uniq_id=array('reg_uniq_id'=>$reg_id);

			if($this->Model_master->rowscount('reg_master',$reg_uniq_id)!=true)
			{
				$result['id']="0";
				$result['msg']="Your id is not valid..!! Please check your id..!!";
				
			}
			else
			{
				$result['id']="1";
				$result['msg']="";
				
			}
			echo json_encode($result);
		}

	}

	public function insert_data()
	{
		if (isset($_POST['booknow'])) 
		{
			$name = $_POST['ap_name'];
			$relation = $_POST['ap_relation'];
			$mno = $_POST['ap_mobile'];
			$ap_email= $_POST['ap_email'];
			$ap_date=$_POST['ap_date'];
			$ap_time=$_POST['ap_time'];
			$ap_subject=$_POST['ap_subject'];
			$reg_uniq_id=$_POST['ap_reg_id'];
			$hostel_name=$_POST['ap_hostel'];
			$comments = $_POST['ap_comments'];
			$visitor_status="active";
 	
 				$this->load->helpers('mail_helper');
 				$word="WH";
	    		$ap_number=$word.rand(111111,999999);
	    		$_SESSION['ap_number'] = $ap_number;
	    		$email_con=$_POST['ap_email'];

	    		$subject="Appointment Confirmation";
	    		$msg="<div style=''>
					<h4 style='font-family: sans-serif;font-size: 20px;'>Your appointment is booked Successfully.</h4> <br>
					<strong style='font-family: sans-serif;'>Please note your appointment number for future references.</strong><br>
						<label style='font-family: sans-serif;'>
							Your appointment number is :- $ap_number
						</label>
				</div>";
	    		if(send_mail($email_con,$subject,$msg))
	    		{
	    			$d=array('visitor_name'=>$name,'visitor_email'=>$ap_email,'visitor_relation'=>$relation,'visitor_mobile'=>$mno,'visitor_comment'=>$comments,"visitor_date"=>$ap_date,'visitor_time'=>$ap_time,'visitor_subject'=>$ap_subject,'visitor_unique_no'=>$ap_number,'reg_uniq_id'=>$reg_uniq_id,'hostel_id'=>$hostel_name,'visitor_status'=>$visitor_status);	

	    			if ($this->Model_master->insertdata('visitor_master',$d)) 
					{
						$this->session->set_flashdata('success',"Hello..!! $name Your appointment for $ap_subject is booked");
	    				redirect("user/Bookappointment");		
					}
	    		}
	    		else
	    		{
	    			$d=array('visitor_name'=>$name,'visitor_email'=>$ap_email,'visitor_relation'=>$relation,'visitor_mobile'=>$mno,'visitor_comment'=>$comments,"visitor_date"=>$ap_date,'visitor_time'=>$ap_time,'visitor_subject'=>$ap_subject,'visitor_unique_no'=>$ap_number,'reg_uniq_id'=>$reg_uniq_id,'hostel_id'=>$hostel_name,'visitor_status'=>$visitor_status);	

	    			if ($this->Model_master->insertdata('visitor_master',$d)) 
					{
						$this->session->set_flashdata("success_e","Hello..!! $name your appointment for $ap_subject is booked. Your appointment number is $ap_number");
	    				redirect("user/Bookappointment");	
					}
	    			
	    		}
	    }
	}
}