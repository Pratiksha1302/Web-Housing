<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_master extends CI_Model {

    public function get_login($username,$password,$type)
    {
        $this->db->where('admin_username',$username);
        $this->db->where('admin_passwd',$password);
        $this->db->where('admin_type',$type);
        $query = $this->db->get('admin_master');

        //SELECT * FROM admin_master WHERE admin_username = '$username' AND admin_passwd = '$password' AND admin_type = '$type' 

        if( $query->num_rows() > 0)
        {
            //true
            return true;
        }
        else
        {
            //false
            return false;
        }
    }

    public function updatedata($table,$data,$id)
    {
        if($this->db->update($table,$data,$id))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function insertdata($table,$data)
    {
        if($this->db->insert($table,$data)){
            return true;
        }else{
            return false;
        }
    }


 public function deletedata($table,$data)
    {
        if($this->db->delete($table,$data))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public function selectAllData($table)
	{
		if($query=$this->db->get($table))
        {
            return $query->result();
        }
        else
        {
            return false;   
        }
	}
    
    public function selectDataById($table,$id)
	{
		if($query=$this->db->get_where($table,$id))
        {
            return $query->result();
        }
        else
        {
            return false;   
        }
	}
    
    public function rowscount($table,$id)
	{
        if($query=$this->db->get_where($table,$id))
        {
            return $query->num_rows();
        }
        else
        {
            return false;   
        }
	}

    public function count($table)
    {
        if($query=$this->db->get($table))
        {
            return $query->num_rows();
        }
        else
        {
            return false;   
        }
    }
    
    public function jointable($from,$where)
    {
        $this->db->select('*');
        $this->db->from($from);
        $this->db->where($where);
        //$this->db->order_by("state_id","desc");
        
        if($query=$this->db->get())
        {
            return $query->result();
        }
        else
        {
            return FALSE;
        }
    }

    // Insert registration data for admin in database
    public function admin_insert($data) {

        // Query to check whether username already exist or not
        $condition = "admin_username =" . "'" . $data['admin_username'] . "'";
        $this->db->select('*');
        $this->db->from('admin_master');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) 
        {
            // Query to insert data in database
            $this->db->insert('admin_master', $data);
            if ($this->db->affected_rows() > 0) 
            {
                return true;
            }
            else
            {
                return false;
            }

        } 
        else 
        {
            return false;
        }
    }

    // Read data using username and password
    public function login_admin($data) 
    {
        $condition = "admin_username =" . "'" . $data['admin_username'] . "' AND " . "admin_passwd =" . "'" . $data['admin_passwd'] . "' AND " . "admin_type =" . "'" . $data['admin_type'] . "'";
        $this->db->select('*');
        $this->db->from('admin_master');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }

    // Read data from database to show data in admin page
    public function read_admin_information($sess_array) 
    {
        $condition = "admin_username =" . "'" . $sess_array['admin_username'] . "'";
        $this->db->select('*');
        $this->db->from('admin_master');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) 
        {
            return $query->result();
        } 
        else 
        {
            return false;
        }
    }

    public function can_login($email,$passwd)
    {
        $this->db->where('reg_email',$email);
        $this->db->where('reg_passwd',$passwd);
        $query=$this->db->get('reg_master');

        if ($query->num_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function selectQuery($query)
    {
        if ($q=$this->db->query($query))
        {
            return $q->result();
        }
        else
        {
            return false;
        }
    }

    public function selectAllData_hostel($table)
    {
        
        $this->db->limit(3);
        $this->db->order_by('hostel_id','desc');
        if($query=$this->db->get($table))
        {

            return $query->result();
        }
        else
        {
            return false;   
        }
    }

    public function selectQuery_pg($query)
    {
        // $this->db->limit(3);
        // $this->db->order_by($id,'desc');
        if ($q=$this->db->query($query))
        {
            return $q->result();
        }
        else
        {
            return false;
        }
    }
    
}
