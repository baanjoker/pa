<?php defined('BASEPATH') OR exit('No direct script access allowed!');
/**
 * 
 */
class wsettings extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->model([
			'setting_model',
            'login_model',
		]);

		if ($this->session->userdata('isLogIn') == false 
			|| $this->session->userdata('user_role') != 1 
		) 
		redirect('login'); 
	}

	public function index(){
		$data['page_title'] = 'Homepage Settings';
		$data['setting'] = $this->setting_model->read();

		$userid = $this->session->userdata('user_id');
		$data['websetting'] = $this->setting_model->webSetting();
        $data['lastlog'] = $this->login_model->read_lastlogs($userid);
		$data['content'] = $this->load->view('main_server/website/website_settings',$data,true);
		$this->load->view('main_server/dashboard',$data);
	}

	public function update(){
		
		$this->form_validation->set_rules('title','Website Title','required|max_length[50]');
		$this->form_validation->set_rules('email','Email address','required|valid_email');
		$this->form_validation->set_rules('landline','Contact number','required');
		$this->form_validation->set_rules('address','Office Address','required');		

		if(!empty($_FILES['logo']['name'])){                
            $config ['upload_path'] = 'bmb_assets2/img/website/logo';
            $config['file_name'] = $_FILES['logo']['name'];
            $config['allowed_types'] = 'gif|jpg|png|jpeg';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
             if($this->upload->do_upload('logo')){
                $uploadData = $this->upload->data();
                $filenames = $uploadData['file_name'];
            }
        }

        if(!empty($_FILES['favicon']['name'])){                
            $config ['upload_path'] = 'bmb_assets2/img/website/favicon';
            $config['file_name'] = $_FILES['favicon']['name'];
            $config['allowed_types'] = 'ico';

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
             if($this->upload->do_upload('favicon')){
                $uploadDataIcon = $this->upload->data();
                $filenamesicon = $uploadDataIcon['file_name'];
            }
        }

        $data['websetting'] = (object)$postData = [
        	'id'  => $this->input->post('id',true),
			'title' 	  => $this->input->post('title',true),
			'description' => $this->input->post('description',true),
			'email' 	  => $this->input->post('email',true),
			'landline' 	  => $this->input->post('landline',true),
			'logo' 	      => (!empty($filenames)?$filenames:$this->input->post('old_logo')),
			'favicon' 	  => (!empty($filenamesicon)?$filenamesicon:$this->input->post('old_favicon')),
			'address' => $this->input->post('address',true),
			'facebook' => $this->input->post('facebook',true),
			'twitter' => $this->input->post('twitter',true),
			'youtube' => $this->input->post('youtube',true),
			'copyright' => $this->input->post('copyright',true),
			'status' => $this->input->post('status')==null ? 0 : 1,
		]; 

		if ($this->form_validation->run() === true) {
			if ($filenamesicon === false) {
				$this->session->set_flashdata('exception', 'Invalid logo!');
			}
			#if empty $setting_id then insert data
			if (empty($postData['id'])) {
				if ($this->setting_model->createWeb($postData)) {
					#set success message
					$this->session->set_flashdata('message',"Save successfully!");
				} else {
					#set exception message
					$this->session->set_flashdata('exception',"Please try again!");
				}
			} else {
				if ($this->setting_model->updateWeb($postData)) {
					#set success message
					$this->session->set_flashdata('message',"Update successfully!");
				} else {
					#set exception message
					$this->session->set_flashdata('exception',"Please try again!");
				} 
			}

			//update session data
			// $this->session->set_userdata([
			// 	'title' 	  => $postData['title'],
			// 	'address' 	  => $postData['description'],
			// 	'email' 	  => $postData['email'],
			// 	'phone' 	  => $postData['phone'],
			// 	'logo' 		  => $postData['logo'],
			// 	'favicon' 	  => $postData['favicon'],
			// 	'footer_text' => $postData['footer_text'],
			// ]);

			redirect('main_server/wsettings');

		} else { 
			$data['content'] = $this->load->view('main_server/website/website_settings',$data,true);
			$this->load->view('main_server/dashboard',$data);
		} 
	}
}