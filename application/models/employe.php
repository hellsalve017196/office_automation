<?php

class employe extends CI_Model
{
    public function add_employe($name,$dep_id,$email,$user,$pass)
    {
        $flag = false;
        if($this->db->query("INSERT INTO employee VALUES(NULL,'".$user."','".md5($pass)."','".$name."','".$email."',".$dep_id.")"))
        {
            $flag = true;
        }
        return $flag;
    }

    public function employe_remove($e_id)
    {
        $flag = false;

        if($this->db->query("DELETE FROM employee WHERE e_id =".$e_id))
        {
            $flag = true;
        }

        return $flag;

    }

    public function employe_list()
    {
        $query = $this->db->query("SELECT e_id,user,name,email,dep_no FROM employee ORDER BY e_id DESC");

        $data = array();

        if($query->num_rows() > 0)
        {
            foreach($query->result_array() as $r)
            {
                $data[] = $r;
            }
        }

        return $data;
    }

    public function add_cv($filename,$dept)
    {
        $flag = false;
        if($this->db->query("INSERT INTO files VALUES(NULL,".$dept.",'".$filename."')"))
        {
            $flag = true;
        }
        return $flag;
    }

    public function file_list($dep_id)
    {
        $query = $this->db->query("SELECT f_id,dep_id,filename FROM files WHERE dep_id = ".$dep_id." ORDER BY f_id DESC");

        $data = array();

        if($query->num_rows() > 0)
        {
            foreach($query->result_array() as $r)
            {
                $data[] = $r;
            }
        }

        return $data;
    }

    public function file_remove($f_id)
    {
        $filename = null;

        $query = $this->db->query("SELECT filename FROM files WHERE f_id =".$f_id);
        if($query->num_rows() > 0)
        {
            $res = $query->row();
            $filename = $res->filename;

            $this->db->query("DELETE FROM files WHERE f_id =".$f_id);
        }

        return $filename;
    }
}

?>