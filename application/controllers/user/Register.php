<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_master');
        $this->load->helper('mail_helper');
        $this->load->library('upload');
    }
    
    public function index()
    {
        if(isset($_SESSION['user']) && $_SESSION['user']!="")
        {
            redirect("user/user_site");
        }
        else
        {
            $from = "state_master sm,city_master cim";
            $where = "cim.state_id = sm.state_id";
            $datas['state'] = $this->Model_master->selectAllData('state_master');
            $datas['city'] = $this->Model_master->jointable($from,$where);
            $this->load->view("user/register.php",$datas);
        }
    }

    public function check_email()
    {
        if (isset($_POST['reg_email']) && $_POST['reg_email'])
        {
            $mail=$_POST['reg_email'];
            $email=array("reg_email"=>$mail);
            
            if($this->Model_master->rowscount("reg_master",$email))
            {
                $res['id']="0";
                $res['msg'] = "Email ID is already exist..!!";
            }   
            else
            {
                $res['id'] = "1";
                $res['msg'] = "";
            }
            echo json_encode($res);
        }
    }

    public function insert_data()
    {
        if (isset($_POST['register']))
        {
            $reg_name=$_POST['reg_name'];
            $reg_email=$_POST['reg_email'];
            $reg_passwd=$_POST['reg_passwd'];
            $reg_gender=$_POST['reg_gender'];
            $reg_dob=$_POST['reg_dob'];
            $reg_city=$_POST['reg_city'];
            $reg_bld_grp=$_POST['reg_bld_grp'];
            $reg_type=$_POST['reg_type'];
            $reg_mobile=$_POST['reg_mobile'];
            $reg_add=$_POST['reg_add'];

            if ($_FILES['reg_profile']['name']!="")
            {
                $config['upload_path'] = "images/reg_profile";
                $config['allowed_types'] = "jpg|png|jpeg";
                $this->upload->initialize($config);

                $ext = strrchr($_FILES['reg_profile']['name'],".");
                $img="WebHousing_".md5(rand(1,9999999)).$ext;
                $_FILES['newname']['name']=$img;
                $_FILES['newname']['type']=$_FILES['reg_profile']['type'];
                $_FILES['newname']['tmp_name']=$_FILES['reg_profile']['tmp_name'];
                $_FILES['newname']['error']=$_FILES['reg_profile']['error'];
                $_FILES['newname']['size']=$_FILES['reg_profile']['size'];
                if ($this->upload->do_upload('newname')) 
                {
                    $reg_profile = $_FILES['newname']['name'];
                }
                else
                {
                    $reg_profile = "user.png";
                }
            }

            if ($_FILES['reg_id_proof']['name']!="")
            {
                $config['upload_path'] = "images/reg_gov_proof";
                $config['allowed_types'] = "jpg|png|jpeg";
                $this->upload->initialize($config);

                $ext = strrchr($_FILES['reg_id_proof']['name'],".");
                $img="WebHousing_".md5(rand(1,9999999)).$ext;
                $_FILES['newname']['name']=$img;
                $_FILES['newname']['type']=$_FILES['reg_id_proof']['type'];
                $_FILES['newname']['tmp_name']=$_FILES['reg_id_proof']['tmp_name'];
                $_FILES['newname']['error']=$_FILES['reg_id_proof']['error'];
                $_FILES['newname']['size']=$_FILES['reg_id_proof']['size'];
                if ($this->upload->do_upload('newname'))
                {
                    $reg_id_proof = $_FILES['newname']['name'];
                }
            }

            $reg_number=rand(1111111111,9999999999);
            $_SESSION['reg_uniq_num'] = $reg_number;
            $email=$_POST['reg_email'];

            $subject="Registration";
            $msg="<div style=''>
                <h1>Hello! $reg_name</h1>
                <h4 style='font-family: sans-serif;font-size: 20px;'>Thank You For choosing Web Housing</h4> <br>
                <b>DO NOT REPLY THIS MAIL</b>
                <p style='font-family:sans-serif;'>Your registration at web housing is successfully done.Please kindly keep your registration ID for future or taking online appointments</p><br>
                    <label style='font-family: sans-serif;'>
                    Your registration number is :- $reg_number
                    </label>
            </div>";

            if(send_mail($email,$subject,$msg))
            {
                $data=array("reg_name"=>$reg_name,"reg_email"=>$reg_email,"reg_passwd"=>$reg_passwd,"reg_gender"=>$reg_gender,"reg_dob"=>$reg_dob,"reg_stud_profile"=>$reg_profile,"reg_blood_grp"=>$reg_bld_grp,"reg_type"=>$reg_type,"reg_mobile"=>$reg_mobile,"reg_address"=>$reg_add,"city_id"=>$reg_city,"reg_gov_proof"=>$reg_id_proof,"reg_uniq_id"=>$reg_number);
                
                if($this->Model_master->insertdata('reg_master',$data))
                {
                    $this->session->set_flashdata('success_reg', 'Your Registration at Web Housing is successfully completed..!!');
                    redirect('user/signin');
                }
            }
            else
            {
                $data=array("reg_name"=>$reg_name,"reg_email"=>$reg_email,"reg_passwd"=>$reg_passwd,"reg_gender"=>$reg_gender,"reg_dob"=>$reg_dob,"reg_stud_profile"=>$reg_profile,"reg_blood_grp"=>$reg_bld_grp,"reg_type"=>$reg_type,"reg_mobile"=>$reg_mobile,"reg_address"=>$reg_add,"city_id"=>$reg_city,"reg_gov_proof"=>$reg_id_proof,"reg_uniq_id"=>$reg_number);
                
                if($this->Model_master->insertdata('reg_master',$data))
                {
                    $this->session->set_flashdata('success_reg_e', "Your Registration at Web Housing is successfully completed..!! Your registration number is $reg_number");
                    redirect('user/signin');
                }
            }
        }
    }
}
