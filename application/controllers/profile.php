<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	function __construct()
	{
		parent::__construct();

		$this->load->model([
			'setting_model',
			'login_model',
			'cave_model',
			'dashboard_model',
			'psgc_model',
		]);
		if ($this->session->userdata('isLogIn') == false 
			|| $this->session->userdata('user_role') != 1 
		) 
		redirect('login'); 
	}

	public function index()
    { 
        if ($this->session->userdata('isLogIn') == false) 
            redirect('login'); 

        $data['page_title'] = "PROFILE";
        $data['setting'] = $this->setting_model->read();
        #------------------------------# 
        $user_id = $this->session->userdata('user_id');
        $data['user']    = $this->dashboard_model->read_by_id($user_id);
        $data['content'] = $this->load->view('main_server/profile',$data,true);
        $this->load->view('main_server/dashboard',$data);
    }

    public function form($user_id = null){
    	$user_role = $this->session->userdata('user_role');
		if ($user_role != 1) 
			show_404();
	
		if ($user_role == 1 && $this->session->userdata('user_id') == $user_id)
			$data['page_title'] = "Admin Profile"; 		
		elseif ($user_role == 2)
			$data['page_title'] = "User Profile";
		else
			$data['page_title'] = "Profile";
		#-------------------------------#
		$data['gender'] =[
			''  => 'Select Gender',
			'1' => 'Male',
			'2' => 'Female'
			];
		$data['status_m'] =[
			''  => 'Select Gender',
			'1' => 'active',
			'2' => 'inactive'
			];
		$data['agebrcket'] =[
			''  => 'Select age bracket',
			'1' => '18-24 y/o',
			'2' => '25-34 y/o',
			'3' => '35-44 y/o',
			'4' => '45-54 y/o',
			'5' => '55-64 y/o',
			'5' => '65-54 y/o and over',

			];
		$data['setting'] = $this->setting_model->read();
		$data['regionlist'] = $this->psgc_model->region_list(); 
		$data['bloodList'] = $this->dashboard_model->blood_list();
		$data['user'] = $this->dashboard_model->read_by_id($user_id);
		#-------------------------------#
		// if (($this->input->post('user_id') != $this->session->userdata('user_id')) && $user_role != 1)
		if ($this->session->userdata('user_id') != $user_id)
			show_404();
		#-------------------------------#
		$data['content'] = $this->load->view('main_server/profile_form',$data,true);
		$this->load->view('main_server/dashboard',$data);

    }

    public function create()
    {

    	#-------------------------------#
		//picture upload
		$picture = $this->fileupload->do_upload(
			'bmb_assets2/img/user_img/',
			'picture'
		);
		// if picture is uploaded then resize the picture
		if ($picture !== false && $picture != null) {
			$this->fileupload->do_resize(
				$picture, 
				293,
				350
			);
		}
		//if picture is not uploaded
		if ($picture === false) {
			$this->session->set_flashdata('exception', 'Invalid picture!');
		}
		#-------------------------------# 
		
		if(!empty($_FILES['picture']['name'])){                
            $config ['upload_path'] = 'bmb_assets2/img/user_img';
            $config['file_name'] = $_FILES['picture']['name'];
            $config['allowed_types'] = 'gif|jpg|png|jpeg';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
             if($this->upload->do_upload('picture')){
                $uploadData = $this->upload->data();
                $filenames = $uploadData['file_name'];
            }
        }
    	if ($this->input->post('user_id',true) == null)
        {
        $this->form_validation->set_rules('firstname','First Name','required');
        $this->form_validation->set_rules('plastname','Last Name','required');
        $this->form_validation->set_rules('email','Email Address','trim|required|valid_email');
        $data['profile'] = (object)$postData = [
            'user_id'           => $this->input->post('user_id',true),
            'regionCode'        => $this->input->post('region',true),
            'provinceCode'      => $this->input->post('province',true),
            'municipalCode'     => $this->input->post('municipal',true),
            'barangayCode'      => $this->input->post('barangay',true),
            'sitio'             => $this->input->post('sitio',true),
            'cave_name'         => $this->input->post('cave_name',true),
        ];
        }else{
        $this->form_validation->set_rules('firstname','First Name','required');
        $this->form_validation->set_rules('plastname','Last Name','required');
        $this->form_validation->set_rules('email','Email Address','trim|required|valid_email');
        $data['profile'] = (object)$postData = [
            'user_id'           => $this->input->post('user_id',true),
            'firstname'         => $this->input->post('firstname',true),
            'lastname'         	=> $this->input->post('plastname',true),
            'email'         	=> $this->input->post('email',true),
            'designation'       => $this->input->post('designation',true),
            'department'      	=> $this->input->post('department',true),
            'address'      		=> $this->input->post('address',true),
            'landline'      	=> $this->input->post('landline',true),
            'mobile'      		=> $this->input->post('mobile',true),
            'sex'      			=> $this->input->post('sex',true),
            'dob'      			=> $this->input->post('dob',true),
            'blood_type'		=> $this->input->post('blood',true),
			'status'			=> $this->input->post('status',true),
			'picture'      		=> (!empty($filenames)?$filenames:$this->input->post('old_picture')),
        ];
        }
        if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['messageuser'] = validation_errors();
        }else{
            if(empty($postData['user_id'])){
                $query = $this->dashboard_model->create($postData);
                if($query){
                $output['messageuser'] = $this->input->post('firstname')." ".'New member registered successfully';
                }else{
                $output['error'] = true;
                $output['messageuser'] = 'New Member registered successfully';
                }
            }else{

                $query = $this->dashboard_model->update($postData);

                if($query){
                $output['messageuser'] = $this->input->post('firstname')." ".'Information successfully update';
                }else{
                $output['error'] = true;
                $output['messageuser'] = 'Member Information successfully update';
                }                
            }
        }
        echo json_encode($output);
    }

    /**
	 * Validate the password
	 *
	 * @param string $password
	 *
	 * @return bool
	 */
	public function valid_password($password = '')
	{
		$password = trim($password);
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