<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booktiffin extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_master');
	}

	public function index()
	{
		if(isset($_SESSION['user']) && $_SESSION['user']!="")
		{
			$id=$_SESSION['user'];
			$data['reg']=$this->Model_master->selectDataById("reg_master",$id);
			$this->load->view('user/booktiffin.php',$data);
		}
		else
		{
			$this->load->view('user/booktiffin.php');
		}
	}
   	
   	public function find()
   	{
   		if(isset($_POST['booktiffin']))
   		{
   			$name=$_POST['cust_name'];
   			$time=$_POST['meal_time'];
   			$type=$_POST['meal_type'];
   			$duration=$_POST['meal_duration'];
   			$week=$_POST['meal_week'];
   			$qty=$_POST['meal_qty'];
   			$date=$_POST['meal_date'];
   			$amt=$_POST['meal_rate'];

   			$n=array("reg_name"=>$_POST['cust_name']);
   			$id=$this->Model_master->selectDataById("reg_master",$n);

   			foreach ($id as $s)
   			{
   				$reg_id=$s->reg_id;
   				$email=$s->reg_email;
   				$phone=$s->reg_mobile;
   			}
   			$data['data']=array("name"=>$name,"meal_time"=>$time,"meal_type"=>$type,"meal_qty"=>$qty,"amt"=>$amt,"reg_id"=>$reg_id,"email"=>$email,"phone"=>$phone);
   			
   			$_SESSION['meal_date']=$date;
   			$_SESSION['meal_type']=$type;
   			// echo $_SESSION['meal_type'];die;
   			$_SESSION['meal_duration']=$duration;
   			$_SESSION['meal_week']=$week;
   			$_SESSION['meal_qty']=$qty;
   			$this->load->view("user/payment_tiffin.php",$data);
   		}
   	}

   	public function tiffinInsert()
   	{
   		if(isset($_SESSION['meal_week']) && $_SESSION['meal_week']!="")
   		{
		    $meal_week = $_SESSION['meal_week'];
   		}
   		if(isset($_SESSION['meal_date']) && $_SESSION['meal_date']!="")
   		{
		    $meal_date = $_SESSION['meal_date'];
   		}
   		if(isset($_SESSION['meal_type']) && $_SESSION['meal_type']!="")
   		{
		    $meal_type = $_SESSION['meal_type'];
   		}
   		if(isset($_SESSION['meal_duration']) && $_SESSION['meal_duration']!="")
   		{
		    $meal_duration = $_SESSION['meal_duration'];
   		}
   		if(isset($_SESSION['meal_qty']) && $_SESSION['meal_qty']!="")
   		{
		    $meal_qty = $_SESSION['meal_qty'];
   		}

   		$meal_time=$_POST["productinfo"];
   		// echo "type".$meal_time;
	    $firstname=array('reg_name' => $_POST["firstname"]);
	    $i=$this->Model_master->selectDataById("reg_master",$firstname);
	    foreach ($i as $s)
	    {
	    	$reg_id=$s->reg_id;
		}

	    $amount=$_POST["amount"];
	    $txnid=$_POST["txnid"];

	    $data=array("reg_id"=>$reg_id,"meal_time"=>$meal_time,"meal_type"=>$meal_type,"meal_duration"=>$meal_duration,"meal_week"=>$meal_week,"meal_qty"=>$meal_qty,"meal_date"=>$meal_date,"meal_amount"=>$amount,"meal_transaction_id"=>$txnid);
	   
	    if($this->Model_master->insertdata("tiffin_master",$data))
	    {
	    	$this->session->set_flashdata("tiffin","Your tiffin is booked");
	    	redirect("user/mybookings");
	    }
	    else
	    {
	    	$this->session->set_flashdata("fail","Your tiffin is not booked");
	    	redirect("user/booktiffin");
	    }
	    
   	} 
}
