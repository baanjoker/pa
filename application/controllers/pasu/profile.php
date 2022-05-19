<?php defined('BASEPATH') OR exit('No direct access script allowed!');

/**
 * 
 */
class Profile extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model([
            // 'setting_model',
            // 'login_model',
            'pasu/dashboard_model',
        ]);

        if ($this->session->userdata('isLogIn') == FALSE || $this->session->userdata('user_role') !=3)
        redirect('login');
    }

    public function index()
    {
        $user_id = $this->session->userdata('user_id');
        $user_region = $this->session->userdata('region');
        $user_role   = $this->session->userdata('user_role');
        $data['regions'] = $this->dashboard_model->region_display($user_region);
        
        $data['read'] = $this->dashboard_model->read_by_id($user_id);

        $data['page_title'] = 'Profile';
        $data['gender'] =[
            ''  => 'Select Gender',
            '1' => 'Male',
            '2' => 'Female'
            ];
        $data['agebrcket'] =[
            ''  => 'Select age bracket',
            '18-24 y/o' => '18-24 y/o',
            '25-34 y/o' => '25-34 y/o',
            '35-44 y/o' => '35-44 y/o',
            '45-54 y/o' => '45-54 y/o',
            '55-64 y/o' => '55-64 y/o',
            '65-54 y/o and over' => '65-54 y/o and over',

            ];
        $data['bloodList'] = $this->dashboard_model->blood_list(); 
        $data['content'] = $this->load->view('pasu/pasu_profile',$data,true);
        $this->load->view('pasu/main_wrapper',$data);
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
            'middlename'          => $this->input->post('mname',true),
            'lastname'          => $this->input->post('plastname',true),
            'psuffix'          => $this->input->post('suffix',true),
            'email'             => $this->input->post('email',true),
            'designation'       => $this->input->post('designation',true),
            'department'        => $this->input->post('department',true),
            'address'           => $this->input->post('address',true),
            'landline'          => $this->input->post('landline',true),
            'mobile'            => $this->input->post('mobile',true),
            'sex'               => $this->input->post('sex',true),
            'dob'               => $this->input->post('dob',true),
            'blood_type'        => $this->input->post('blood',true),
            'age_bracket'        => $this->input->post('age_bracket',true),
            'picture'           => (!empty($filenames)?$filenames:$this->input->post('old_picture')),
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

                $query = $this->dashboard_model->updateProfile($postData);

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
}