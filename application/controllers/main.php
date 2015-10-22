<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Main extends CI_Controller {
		public function index()
		{
            $this->load->view("header");
			$this->load->view("login",array("error"=>array(),"login_error"=>""));
			$this->load->view("footer");
		}

        public function logging_in()
        {
            $this->form_validation->set_rules('username','username','required');
            $this->form_validation->set_rules('password','password','required');

            if($this->form_validation->run() == false)
            {
                $this->load->view("header");
                $this->load->view("login",array("error"=>validation_errors(),"login_error",""));
                $this->load->view("footer");
            }
            else
            {
                $user = $this->input->post("username");
                $pass = $this->input->post("password");

                $this->load->model("login");

                if($this->login->entering($user,$pass))
                {
                    $this->session->userdata("name");
                    $this->session->userdata("dep_no");
                    $this->home();
                }
                else{
                    $this->load->view("header");
                    $this->load->view("login",array("error"=>array(),"login_error"=>"invalid username or password"));
                    $this->load->view("footer");
                }
            }
        }

		public function home()
		{
            $username = $this->session->userdata("name");
            $key = $this->session->userdata("dep_no");

            $this->employe_list();
		}

        public function adding_new()
        {
            $key = $this->session->userdata("dep_no");

            $menu = $this->navigation($key);

            $this->load->view("header");
            $this->load->view("menu",array("menu"=>$menu));
            $this->load->view("new",array("error"=>array(),"success"=>""));
            $this->load->view("footer");
        }

        public function deleting_employe($e_id)
        {
            $this->load->model("employe");

            if($this->employe->employe_remove($e_id))
            {
                $this->home();
            }
        }


        public function navigation($key)
        {
            switch($key)
            {
                /*   $menu[0] = add new emloye  */
                /*   $menu[1] = upload cv  */
                /*   $menu[2] = Upload Project File  */
                /*   $menu[3] = Upload Account File  */

                case 0:
                    $menu = array(true,true,true,true,true);
                    break;
                case 1:
                    $menu = array(true,true,true,false,false);
                    break;
                case 2:
                    $menu = array(false,false,false,false,true);
                    break;
                case 3:
                    $menu = array(false,false,false,true,false);
                    break;
                case 4:
                    $menu = array(false,false,false,false,false);
                    break;
            }

            return $menu;
        }

        public function delete($f_id,$dep_id)
        {
            $this->load->model("employe");
            $filename = $this->employe->file_remove($f_id);
            unlink('uploads/'.$filename);

            $this->file_list($dep_id);
        }

        public function file_list($dep_id)
        {
            $this->load->model("employe");
            $result = $this->employe->file_list($dep_id);

            $key = $this->session->userdata("dep_no");
            $menu = $this->navigation($key);
            $this->load->view("header");
            $this->load->view("menu",array("menu"=>$menu));
            $this->load->view("files",array("result"=>$result));
            $this->load->view("footer");
        }

        public function upload()
        {
            $key = $this->session->userdata("dep_no");
            $menu = $this->navigation($key);


            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = "*";



            $this->load->library('upload', $config);

            if($this->upload->do_upload())
            {
                $file_data = $this->upload->data();

                $this->load->model("employe");
                $this->employe->add_cv($file_data['file_name'],$key);

                $this->load->view("header");
                $this->load->view("menu",array("menu"=>$menu));
                $this->load->view("upload",array("error"=>"","success"=>"Successfully Uploaded","flag"=>$this->input->post('flag'),"destination"=>base_url()."main/upload"));
                $this->load->view("footer");
            }
            else
            {
                    $this->load->view("header");
                    $this->load->view("menu",array("menu"=>$menu));
                    $this->load->view("upload",array("error"=>"error occured","success"=>"","flag"=>$this->input->post('flag'),"destination"=>base_url()."main/upload"));
                    $this->load->view("footer");
            }

        }

        /*cv*/
        public function upload_cv_form()
        {
            $key = $this->session->userdata("dep_no");
            $menu = $this->navigation($key);

            $this->load->view("header");
            $this->load->view("menu",array("menu"=>$menu));
            $this->load->view("upload",array("error"=>"","success"=>"","flag"=>"1","destination"=>base_url()."main/upload"));
            $this->load->view("footer");
        }


        /**/

        /*project*/

        public function upload_project_form()
        {
            $key = $this->session->userdata("dep_no");
            $menu = $this->navigation($key);

            $this->load->view("header");
            $this->load->view("menu",array("menu"=>$menu));
            $this->load->view("upload",array("error"=>"","success"=>"","flag"=>"2","destination"=>base_url()."main/upload"));
            $this->load->view("footer");
        }

        /**/

        /*account*/

        public function upload_account_form()
        {
            $key = $this->session->userdata("dep_no");
            $menu = $this->navigation($key);

            $this->load->view("header");
            $this->load->view("menu",array("menu"=>$menu));
            $this->load->view("upload",array("error"=>"","success"=>"","flag"=>"3","destination"=>base_url()."main/upload"));
            $this->load->view("footer");
        }


        /**/

        /*employee*/
        public function add_employe()
        {
            $this->form_validation->set_rules('e_name','Employee_name','required');
            $this->form_validation->set_rules('e_type','Employee_type','required');
            $this->form_validation->set_rules('e_email','Employee_email','required|email');
            $this->form_validation->set_rules('e_username','Employee_username','required');
            $this->form_validation->set_rules('e_password','Employee_password','required');

            $key = $this->session->userdata("dep_no");

            $menu = $this->navigation($key);


            if($this->form_validation->run()==false)
            {
                $this->load->view("header");
                $this->load->view("menu",array("menu"=>$menu));
                $this->load->view("new",array("error"=>validation_errors(),"success"=>""));
                $this->load->view("footer");
            }
            else
            {
                $e_name = $this->input->post('e_name');
                $e_type =  $this->input->post('e_type');
                $e_email = $this->input->post('e_email');
                $e_username = $this->input->post('e_username');
                $e_password = $this->input->post('e_password');

                $this->load->model("employe");

                if($this->employe->add_employe($e_name,$e_type,$e_email,$e_username,$e_password))
                {
                    $this->load->view("header");
                    $this->load->view("menu",array("menu"=>$menu));
                    $this->load->view("new",array("error"=>array(),"success"=>"successfully inserted"));
                    $this->load->view("footer");
                }
                else
                {
                    $this->load->view("header");
                    $this->load->view("menu",array("menu"=>$menu));
                    $this->load->view("new",array("error"=>array("problem in database"),"success"=>""));
                    $this->load->view("footer");
                }
            }
        }

        public function employe_list()
        {
            $key = $this->session->userdata("dep_no");

            $menu = $this->navigation($key);

            $this->load->model("employe");

            $result = $this->employe->employe_list();

            $this->load->view("header");
            $this->load->view("menu",array("menu"=>$menu));
            $this->load->view("employe",array("result"=>$result));
            $this->load->view("footer");
        }

        public function logout()
        {
            $user_data = array("name"=>"","dep_no"=>"");

            $this->session->unset_userdata($user_data);
            $this->index();
        }

	}

?>