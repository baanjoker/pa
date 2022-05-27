<?php defined('BASEPATH') or exit ('No direct script access allowed!');
/**
 * 
 */
class User extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->model([
			'user_model',
			'library_model',
            'login_model',
		]);

		if ($this->session->userdata('isLogIn') == false || $this->session->userdata('user_role') != 1 
		) 
		redirect('login'); 
	}

	public function index(){
		$data['page_title'] = 'User List';
		$data['setting'] = $this->setting_model->read();


		$data['content'] = $this->load->view('main_server/user/user_list',$data, true);
		$this->load->view('main_server/dashboard',$data);
	}

	public function userList(){
        $data = $this->user_model->getAllUser();
        foreach($data as $row){
            ?>          
            <tr>
                <td><?php echo $row->email; ?></td>
                <td><?php echo $row->pa_name ?></td>
                <?php if ($row->user_role == '1'): ?>
                <td>Administrator</td>
                <?php elseif ($row->user_role == '2'): ?>
                <td>Regional Officer</td>
                <?php elseif ($row->user_role == '3'): ?>
                <td>Protected Area Superintendent</td>
                <?php elseif ($row->user_role == '4'): ?>
                <td>CENR Officer</td>
                <?php elseif ($row->user_role == '5'): ?>
                <td>PENR Officer</td>
                <?php endif ?> 
                <?php if ($row->status == '1'): ?>
                <td>Active</td>                    
                <?php else: ?> 
                <td>Inactive</td>                    
                <?php endif ?> 

                <td><a type='button' class='btn btn-flat btn-success' href='./user/user/<?php echo $row->user_id ?>' title='Edit' ><i class='ion ion-edit'></i></a>
                    </td>
            </tr>
            <?php
        }
	}

	public function user($id=null)
	{
		
		$data['page_title'] = 'Add User';
		$data['setting'] = $this->setting_model->read();
		$data['user'] = $this->user_model->fetchAllUser($id);
        $data['regionList'] = $this->user_model->regionList();
        $userreg = $this->uri->segment(4);
        $data['provList'] = $this->user_model->provList($userreg);
        $data['munList'] = $this->user_model->munList($userreg);
        $data['gender'] =[
			''  => 'Select Gender',
			'1' => 'Male',
			'2' => 'Female'
			];
		$data['status_m'] =[
			'1' => 'active',
			'2' => 'inactive'
			];
		$data['bloodList'] = $this->user_model->blood_list();

		$data['content'] = $this->load->view('main_server/user/user_form',$data,true);
		$this->load->view('main_server/dashboard',$data);
	}

	public function getProv()
 		{
       $regid = $this->input->post('regid');
            if (!empty($regid)) {
            $query = $this->db->select('*')
                ->from('tbllocprovince')
                ->where('regionid',$regid)
                ->get();

            $option = "<option value=\"\">SELECT PROVINCE</option>";
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $prov) {
                    $option .= strtoupper("<option value=\"$prov->id_p\">$prov->provinceName</option>");
                }
                $data['message'] = $option;
                $data['status'] = true;
            } else {
                $data['message'] = "No Provinces available";
                $data['status'] = false;
            }
        } else {
            $data['message'] = "Invalid Region selected";
            $data['status'] = null;
        }

        echo json_encode($data);
    }

    private function hash_password($password){
       return password_hash($password, PASSWORD_BCRYPT);
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
        $this->form_validation->set_rules('lastname','Last Name','required');
        $this->form_validation->set_rules('email','Email Address','trim|required|valid_email|is_unique[tbluser.email]');
        $this->form_validation->set_rules('password','Password','trim|required');
        $this->form_validation->set_rules('repassword', 'Confirm Password', 'required|matches[password]');

        $data['profile'] = (object)$postData = [
            'user_id'           => $this->input->post('user_id',true),            
            'firstname'         => $this->input->post('firstname',true),
            'lastname'          => $this->input->post('lastname',true),
            'email'             => $this->input->post('email',true),
            'designation'       => $this->input->post('designation',true),
            'department'        => $this->input->post('department',true),
            'address'           => $this->input->post('address',true),
            'landline'          => $this->input->post('landline',true),
            'mobile'            => $this->input->post('mobile',true),
            'sex'               => $this->input->post('sex',true),
            'dob'               => $this->input->post('dob',true),
            'blood_type'        => $this->input->post('blood',true),
            'status'            => $this->input->post('status',true),
            'region'            => $this->input->post('region',true),
            'province'          => $this->input->post('province',true),
            'municipality'      => $this->input->post('municipality',true),
            'cenro'             => $this->input->post('cenroid',true),
            'picture'           => (!empty($filenames)?$filenames:$this->input->post('old_picture')),
            'password'          => hash('sha256',$this->input->post('password')),
            'user_role'         => $this->input->post('user_role',true),
        ];
        }else{
        $this->form_validation->set_rules('firstname','First Name','required');
        $this->form_validation->set_rules('lastname','Last Name','required');
        $this->form_validation->set_rules('email','Email Address','trim|required|valid_email');
        // $this->form_validation->set_rules('designation','Designation/Position','required');
        // $this->form_validation->set_rules('department','Department/Office','required');
        // $this->form_validation->set_rules('address','Permanent Address','required');
        // $this->form_validation->set_rules('dob','Date of birth','required');
        // $this->form_validation->set_rules('sex','Gender','required');
        // $this->form_validation->set_rules('status','Status','required');
        // $this->form_validation->set_rules('blood','Blood type','required');
        $data['profile'] = (object)$postData = [
            'user_id'           => $this->input->post('user_id',true),            
            'firstname'         => $this->input->post('firstname',true),
            'lastname'          => $this->input->post('lastname',true),
            'email'             => $this->input->post('email',true),
            'designation'       => $this->input->post('designation',true),
            'department'        => $this->input->post('department',true),
            'address'           => $this->input->post('address',true),
            'landline'          => $this->input->post('landline',true),
            'mobile'            => $this->input->post('mobile',true),
            'sex'               => $this->input->post('sex',true),
            'dob'               => $this->input->post('dob',true),
            'blood_type'        => $this->input->post('blood',true),
            'status'            => $this->input->post('status',true),
            'region'            => $this->input->post('region',true),
            'province'          => $this->input->post('province',true),
            'municipality'      => $this->input->post('municipality',true),
            'cenro'             => $this->input->post('cenroid',true),
            'picture'           => (!empty($filenames)?$filenames:$this->input->post('old_picture')),
            'user_role'         => $this->input->post('user_role',true),
        ];
        }
        if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['message'] = validation_errors();
        }else{
            if(empty($postData['user_id'])){
                $query = $this->user_model->create($postData);
                if($query){
                $output['message'] = $this->input->post('firstname')." ".'New member registered successfully';
                }else{
                $output['error'] = true;
                $output['message'] = 'New Member registered successfully';
                }
            }else{

                $query = $this->user_model->update($postData);

                if($query){
                $output['message'] = $this->input->post('firstname')." ".'Information successfully update';
                }else{
                $output['error'] = true;
                $output['message'] = 'Member Information successfully update';
                }                
            }
        }
        echo json_encode($output);
    }

    public function getMunicipal()
        {
       $regid = $this->input->post('regid');
       $provid = $this->input->post('provid');

            if (!empty($provid)) {
            $querys = $this->db->select('*')
                ->from('tbllocmunicipality')
                ->where('provinceid',$provid)
                ->get();

            $options = "<option value=\"\">SELECT MUNICIPALITY/CITY</option>";
            if ($querys->num_rows() > 0) {
                foreach ($querys->result() as $municipals) {
                    $options .= "<option value=\"$municipals->id_m\">$municipals->municipalName</option>";
                }
                $data['message'] = $options;
                $data['status'] = true;
            } else {
                $data['message'] = "No Municipalities available";
                $data['status'] = false;
            }
        } else {
            $data['message'] = "Invalid Province";
            $data['status'] = null;
        }

        echo json_encode($data);
    }


    public function getMunicipalCenro()
 		{
       $regid = $this->input->post('regid');
       $provid = $this->input->post('provid');

            if (!empty($provid)) {
            $querys = $this->db->select('*')
                ->from('tblloccenro')
                ->where('penro_id',$provid)
                ->group_by('cenro_id')
                // ->where('cenro_id IS NOT NULL', '', false)
                ->get();

            $options = "<option value=\"\">SELECT CENRO</option>";
            if ($querys->num_rows() > 0) {
                foreach ($querys->result() as $municipals) {
                    $options .= "<option value=\"$municipals->id_cenro\">$municipals->cenro_name</option>";
                }
                $datas['messages'] = $options;
                $datas['statuss'] = true;
            } else {
                $datas['messages'] = "No Municipalities available";
                $datas['statuss'] = false;
            }
        } else {
            $datas['messages'] = "Invalid Province";
            $datas['statuss'] = null;
        }

        echo json_encode($datas);
    }

    public function getBarangay()
        {
       $municipal_id = $this->input->post('municipal_id');

            if (!empty($municipal_id)) {
            $querys = $this->db->select('*')
                ->from('tbllocbarangay')
                ->where('municipalid',$municipal_id)
                ->order_by('barangayName','ASC')
                ->get();

            $options = "<option value=\"\">SELECT BARANGAY</option>";
            if ($querys->num_rows() > 0) {
                foreach ($querys->result() as $barangay) {
                    $options .= strtoupper("<option value=\"$barangay->id_b\">$barangay->barangayName</option>");
                }
                $data['message'] = $options;
                $data['status'] = true;
            } else {
                $data['message'] = "No Barangays available";
                $data['status'] = false;
            }
        } else {
            $data['message'] = "Invalid Municipality";
            $data['status'] = null;
        }

        echo json_encode($data);
    }

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
