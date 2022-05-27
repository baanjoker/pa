<?php defined('BASEPATH') OR exit ('No direct access script allowed!');
/**
 * 
 */
class Changepass extends CI_Controller
{
	
	function __construct()
    {
        parent::__construct();
        $this->load->model(['pasu/dashboard_model']);

        if ($this->session->userdata('isLogIn') == FALSE || $this->session->userdata('user_role') !=3)
        redirect('login');
    }

    public function index()
    {
        $user_id = $this->session->userdata('user_id');
    	$data['page_title'] = 'Change password';
        $data['read'] = $this->dashboard_model->read_by_id($user_id);
    	$data['content'] = $this->load->view('pasu/changepass',$data,true);
    	$this->load->view('pasu/main_wrapper',$data);
    }

    public function update_password(){
        if ($this->input->post('user_id',true)){
            
            $rules = array(
            [           
                'field' =>  'oldpass' ,
                'label' =>  'Old Password',
                'rules' =>  'trim|required|callback_oldpassword_check'
            ],
            [           
                'field' =>  'newpass' ,
                'label' =>  'New Password',
                'rules' =>  'required|trim|callback_valid_password'
            ],
            [
                'field' =>  'retypepass' ,
                'label' =>  'Re-type Password',
                'rules' =>  'required|trim|matches[newpass]'
            ]);

            $this->form_validation->set_rules($rules);
            $data['user']=(object)$postdata = 
            [
            'user_id'    =>  $this->input->post('user_id',true),
            'password'      =>  hash('sha256',$this->input->post('newpass'))
            ];           
            if ($this->form_validation->run() == false) {
                $output['error'] = true;
                $output['messagePass'] = validation_errors();
            }else{
                if(!empty($postdata['user_id'])){
                    $query = $this->dashboard_model->updatePass($postdata);
                        if($query){
                        $output['message'] = 'update';
                        $output['messagePass'] = 'Successfully Update'."\n".'logout automatically in 5 seconds!';
                        $this->session->sess_destroy();
                        
                        }
                    //     else{
                    //     $output['error'] = true;
                    //     $output['messagePass'] = 'Account successfully update password';
                    // } 
                }
            }
        }
        echo json_encode($output);
    }

    public function valid_password($newpass = '')
    {
        $password = trim($newpass);
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
        // if (preg_match_all($regex_special, $password) < 1)
        // {
        //     $this->form_validation->set_message('valid_password', 'The {field} field must have at least one special character.' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>§~'));
        //     return FALSE;
        // }
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

    public function oldpassword_check($oldpass){       
        $id = $this->session->userdata('user_id');
        $user = $this->dashboard_model->fetchPasswordHashFromDB($id);

        if($user->password !== hash('sha256',$oldpass)) {
            $this->form_validation->set_message('oldpassword_check', 'The {field} does not match');
            return false;
        }

        return true;
    }
}