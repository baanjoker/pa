<?php defined('BASEPATH') OR exit('No direct access script allowed!');
/**
 * 
 */
class Dashboard extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model([
			'setting_model',
			'login_model',
			'penro/penro_model'
		]);

		
	}

	public function index()
	{
		if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') !=5) 
            redirect('login'); 
        $user_region = $this->session->userdata('region');
        $user_role	 = $this->session->userdata('user_role');
        $user	     = $this->session->userdata('user_id');
        $provId      = $this->session->userdata('province'); 
        $data['provId']	     = $this->session->userdata('province'); 

        $data['webSetting'] = $this->setting_model->webSetting();
             
        $data['read'] = $this->penro_model->read_by_id($user);
        $data['regions'] = $this->penro_model->region_display($user_region);
 		$data['blood'] = $this->penro_model->blood_list();
		$data['gender'] = $this->penro_model->gender_list();
		$data['region']	= $this->penro_model->region_list();
		$data['pamain'] = $this->penro_model->getPA($provId);

		$data['page_title'] = "DASHBOARD";
		$data['setting'] = $this->setting_model->read();
		$data['content'] = $this->load->view('penro/dashboard',$data,true);
		$this->load->view('penro/penro_wrapper',$data);
	}

	public function update()
    {
        if(!empty($_FILES['file-upload']['name'])){                
            $config ['upload_path'] = 'assets/img/profile';
            $config['file_name'] = $_FILES['file-upload']['name'];
            $config['allowed_types'] = 'gif|jpg|png|jpeg';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
             if($this->upload->do_upload('file-upload')){
                $uploaddata = $this->upload->data();
                $filenames = $uploaddata['file_name'];
            }
        }

        if ($this->input->post('user_id',true)==null) {
            $this->form_validation->set_rules('firstname','First Name','trim|required');
            $this->form_validation->set_rules('lastname','Last Name','trim|required');         
            $this->form_validation->set_rules('address','Home address','trim|required');
            $this->form_validation->set_rules('email','Email address','trim|valid_email|required|callback_check_emails');

        $data['profile'] = (object)$postdata = [    
            'user_id'	=>  $this->input->post('user_id',true),  
            'firstname' =>  $this->input->post('firstname',true),
            'lastname'  =>  $this->input->post('lastname',true),
            'dob' 		=>  $this->input->post('dob',true),
            'address'   =>  $this->input->post('address',true),
            'mobile'   	=>  $this->input->post('mobile',true),
            'landline'	=>	$this->input->post('landline',true),
            'designation'   =>  $this->input->post('designation',true),
            'email'     =>  $this->input->post('email',true),
            'region'	=>	$this->input->post('region',true),
            'blood_type'=> 	$this->input->post('blood',true),         
            'picture'   => (!empty($filenames)?$filenames:$this->input->post('old_picture')),
        ];
        } else {
            $this->form_validation->set_rules('firstname','First Name','trim|required');
            $this->form_validation->set_rules('lastname','Last Name','trim|required');         
            $this->form_validation->set_rules('address','Home address','trim|required');
            $this->form_validation->set_rules('email','Email address','trim|valid_email|required|callback_check_emails');

            $data['profile'] = (object)$postdata = [        
            'user_id'	=>  $this->input->post('user_id',true),  
            'firstname' =>  $this->input->post('firstname',true),
            'lastname'  =>  $this->input->post('lastname',true),
            'dob' 		=>  $this->input->post('dob',true),
            'address'   =>  $this->input->post('address',true),
            'mobile'   	=>  $this->input->post('mobile',true),
            'landline'	=>	$this->input->post('landline',true),
            'designation'   =>  $this->input->post('designation',true),
            'email'     =>  $this->input->post('email',true),
            'region'	=>	$this->input->post('region',true),
            'blood_type'=> 	$this->input->post('blood',true),
            // 'password'   =>  hash('sha256',$this->input->post('password',true)),         
            'picture'   => (!empty($filenames)?$filenames:$this->input->post('old_picture')),
        ];
        }

        if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['messageuser'] = validation_errors();
        }else{
            if(empty($postdata['user_id'])){      

                $query = $this->cenro_model->createMain($postdata);
                if($query){
                $output['messagemain'] = $this->input->post('firstname')." ".'Successfully registered';
                }else{
                $output['error'] = true;
                $output['messagemain'] = 'Successfully registered';
                }

            }else{

                $query = $this->cenro_model->updateProfile($postdata);

                if($query){
                $output['messageuser'] = $this->input->post('firstname')." ".'successfully update';
                }else{
                $output['error'] = true;
                $output['messageuser'] = 'Successfully Update';
                }
            }
        }
        echo json_encode($output);
    }

    function check_emails($email) {        
    if($this->input->post('user_id'))
        $id = $this->input->post('user_id');
    else
        $id = '';
    $result = $this->cenro_model->check_email($id, $email);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_emails', 'Email address already exists');
        $response = false;
    }
    return $response;
    }

    public function update_password(){
        if ($this->input->post('user_id',true))        {
            
            $rules = array(
            [           
                'field' =>  'newpassword' ,
                'label' =>  'New Password',
                'rules' =>  'required|trim|callback_valid_password'
            ],
            [
                'field' =>  'repassword' ,
                'label' =>  'Re-type Password',
                'rules' =>  'required|trim|matches[newpassword]'
            ]);

            $this->form_validation->set_rules($rules);

            $data['user']=(object)$postdata = 
            [
            'user_id'    =>  $this->input->post('user_id',true),
            'password'      =>  hash('sha256',$this->input->post('newpassword'))
            ];
           
            if ($this->form_validation->run() == false) {
                $output['error'] = true;
                $output['messagePass'] = validation_errors();
            }else{
                if(!empty($postdata['user_id'])){
                    $query = $this->cenro_model->updatePass($postdata);
                        if($query){
                        $output['messagePass'] = 'Account successfully change password, your account has been automatically logout!';
                        $this->session->sess_destroy();
                        
                        }else{
                        $output['error'] = true;
                        $output['messagePass'] = 'Account successfully update password';
                    } 
                }
            }
        }
        echo json_encode($output);
    }

    public function valid_password($newpassword = '')
    {
        $password = trim($newpassword);
        $regex_lowercase = '/[a-z]/';
        $regex_uppercase = '/[A-Z]/';
        $regex_number = '/[0-9]/';
        $regex_special = '/[!@#$%^&*()\-_=+{};:,<.>§~]/';
        if (empty($password))
        {
            $this->form_validation->set_message('valid_password', 'The {field} field is required.');
            return FALSE;
        }
        if (preg_match_all($regex_lowercase, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least one lowercase letter.');
            return FALSE;
        }
        if (preg_match_all($regex_uppercase, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least one uppercase letter.');
            return FALSE;
        }
        if (preg_match_all($regex_number, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must have at least one number.');
            return FALSE;
        }
        if (preg_match_all($regex_special, $password) < 1)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must have at least one special character.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>§~'));
            return FALSE;
        }
        if (strlen($password) < 5)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field must be at least 5 characters in length.');
            return FALSE;
        }
        if (strlen($password) > 32)
        {
            $this->form_validation->set_message('valid_password', 'The {field} field cannot exceed 32 characters in length.');
            return FALSE;
        }
        return TRUE;
    }

}