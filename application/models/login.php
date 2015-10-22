<?php
	
	class login extends CI_Model
	{
        public function entering($user,$pass)
        {
            $flag = false;

            $query = $this->db->query("SELECT name,dep_no FROM employee WHERE user = '".$user."' AND password = '".md5($pass)."'");

            if($query->num_rows() == 1)
            {
                $res = $query->row();
                $this->session->set_userdata($res);
                $flag = true;
            }

            return $flag;
        }
	}
	
?>