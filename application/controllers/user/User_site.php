<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_site extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_master');
	}
	public function index()
	{
		$data2['state']= $this->Model_master->selectAllData('state_master');
    $query="select * from pg_master pm,landlord_master lm where pm.landlord_id=lm.landlord_id ORDER BY pg_id desc LIMIT 3 ";
    $data['data2']=$this->Model_master->selectQuery($query);

		// $data['data']=$this->Model_master->selectAllData_pg("pg_master");
		$data1['data1']=$this->Model_master->selectAllData_hostel("hostel_master");
		$mrg_array = array_merge($data,$data1,$data2);
		$this->load->view("user/index.php",$mrg_array);
	}

	public function find()
	{
		
		if (isset($_POST['find']))
		{
			$state=$_POST['state'];
			$city=$_POST['city'];
			$type=$_POST['type'];
			$price=$_POST['price'];

			if($type=="Hostel")
			{	
				// $data=array("city_id"=>$city,"hostel_rent"=>$price);
				$query="select * from hostel_master where city_id='$city' and hostel_rent <= '$price'";
				$data['data']=$this->Model_master->selectQuery($query);
				
				$this->load->view("user/find.php",$data);
			}

			else
			{
				// $from="landlord_master lm,pg_master pm";
				// $where="lm.landlord_id=pm.landlord_id and pm.city_id='$city' and pm.pg_rent<='$price'";
				// $data['landlord']=$this->Model_master->jointable($from,$where);
				// echo "<pre>";
				// print_r($data);die;
				$query="select * from pg_master pm,landlord_master lm where pm.landlord_id=lm.landlord_id and pm.city_id='$city' and pg_rent <= '$price'";
				$data['data']=$this->Model_master->selectQuery($query);
				// echo "<pre>";
				// print_r($data);
				// die;
				$this->load->view("user/find_pg.php",$data);
			}
		}	
	}

	 public function selectcity()
    {
    	if(isset($_POST['s_id']) && $_POST['s_id']!="")
    	{
    		$stateid = array("state_id" =>$_POST['s_id']);
    		$data = $this->Model_master->selectDataById("city_master",$stateid); 
    	?>
    	<option value="-1">Select Your City</option>
    		<?php 
    			foreach ($data as $result) {
    		?>
    	<option value="<?php echo $result->city_id; ?>"><?php echo $result->city_name; ?></option>
    <?php } }
    	else
    	{
    		redirect("user/user_site");
    	}
    } 

	public function booknow()
	{
		if(isset($_GET['hostel_id']) && $_GET['hostel_id']!="")
		{
			$hostel_id=array("hostel_id"=>base64_decode($_GET['hostel_id']));
			$id=$_SESSION['user'];
			$data['reg_data']=$this->Model_master->selectDataById("reg_master",$id);
			$data['hostel_data']=$this->Model_master->selectDataById("hostel_master",$hostel_id);
      // echo "<pre>";
      // print_r($data);
      $this->load->view("user/paynow.php",$data);
		}
	}
	
  public function bookpg()
  {
    if(isset($_GET['pg_id']) && $_GET['pg_id']!="")
    {
      $pg_id=base64_decode($_GET['pg_id']);
      $id=$_SESSION['user'];
      $query="select * from pg_master pm,landlord_master lm where pm.landlord_id=lm.landlord_id and pm.pg_id = $pg_id";
      $data['pg']=$this->Model_master->selectQuery($query);

      $data['reg_data']=$this->Model_master->selectDataById("reg_master",$id);
  
      // echo "<pre>";
      // print_r($data);
      $this->load->view("user/paynow_pg.php",$data);
    }
  }

  public function hostelinsert()
  {
    $status=$_POST["status"];
    $firstname=array('reg_name' => $_POST["firstname"]);
    $amount=$_POST["amount"];
    $txnid=$_POST["txnid"];
    $productinfo=array('hostel_name' => $_POST["productinfo"]);
    $email=$_POST["email"];
    $date=date("M d,Y");

    $reg_data = $this->Model_master->selectDataById('reg_master',$firstname);
    $hostel_data = $this->Model_master->selectDataById('hostel_master',$productinfo);
    foreach ($reg_data as $key) 
    {
        $reg_id = $key->reg_id;
    }
    foreach ($hostel_data as $key) 
    {
        $hostel_id = $key->hostel_id;
    }
    $data=array("reg_id"=>$reg_id,"hostel_id"=>$hostel_id,"hostel_payment_status"=>$status,"hostel_amount"=>$amount,"hostel_transaction_id"=>$txnid," hostel_booking_date"=>$date);
    
    if($this->Model_master->insertdata("hostel_booking_master",$data))
    {
      redirect("user/mybookings");
    }
    else
    {
      redirect("user/user_site");
    }
  }

	public function pginsert()
	{
  		$status=$_POST["status"];
      $firstname=array('reg_name' => $_POST["firstname"]);
      $amount=$_POST["amount"];
      $txnid=$_POST["txnid"];
      $productinfo=array('landlord_name' => $_POST["productinfo"]);
      $pg_id=$_POST["email"];
      $date=date("M d,Y");

      $reg_data = $this->Model_master->selectDataById('reg_master',$firstname);
      foreach ($reg_data as $key) 
      {
          $reg_id = $key->reg_id;
      }
      $data=array("reg_id"=>$reg_id,"pg_id"=>$pg_id,"pg_payment_status"=>$status,"pg_amount"=>$amount,"pg_transaction_id"=>$txnid,"pg_booking_date"=>$date);
      
      // echo "<pre>";
      // print_r($reg_data);
      // print_r($data);
      if($this->Model_master->insertdata("pg_booking_master",$data))
      {
        redirect("user/mybookings");
      }
      else
      {
        redirect("user/user_site");
      }
      
	}
}
?>