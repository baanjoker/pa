<?php defined('BASEPATH') OR exit('No direct script access allowed!');
/**
 * 
 */
class wslider extends CI_Controller
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
		$data['page_title'] = "Website Slider Settings";
		$data['setting'] = $this->setting_model->read();

		$data['content'] = $this->load->view('main_server/website/website_slider',$data,true);
		$this->load->view('main_server/dashboard',$data);
	}

    public function load_slider(){
        $data = $this->setting_model->wsliderload();
        foreach($data as $r){
            ?>
            <tr>
                <td><img width='100px' height='80px' src="<?php echo base_url('bmb_assets2/img/website/slider/').$r->image ?>"></td>   
                <td><?php echo $r->title ?></td>
                <td><?php echo $r->status ?></td>              
                <td>
                    <a type='button' class='btn btn-flat btn-success' href='wslider/form/<?php echo $r->id ?>' title='Edit' ><i class='ion ion-edit'></i></a>
                    <a type='button' class='btn btn-flat btn-danger btn-deleteslide' title='Delete' data-id="<?php echo $r->id ?>"><i class='ion ion-android-delete'></i></a>
                </td>              

            </tr>            
            <?php
        }

    }

    public function form($id=null)
    {
        $data['page_title'] = "Website Slider Form";
        $data['setting'] = $this->setting_model->read();
        $data['image'] = $this->setting_model->getData($id);

        // $data['image'] = (object)$postData = [
        //     'id'        =>  $this->input->post('id',true),
        //     'image'     =>  $this->input->post('upload',true),
        //     'title'     =>  $this->input->post('title',true),
        //     'remarks'   =>  $this->input->post('remarks',true),
        //     'status'    =>  $this->input->post('status')==null ? 0 : 1,
        // ];

        $data['content'] = $this->load->view('main_server/website/website_slider_form',$data,true);
        $this->load->view('main_server/dashboard',$data);
    }

    public function insert()
    {        
        if(!empty($_FILES['file']['name'])){
            $config ['upload_path'] = 'bmb_assets2/img/website/slider';
            $config['file_name'] = $_FILES['file']['name'];
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
             if($this->upload->do_upload('file')){
                $uploadData = $this->upload->data();
                $filenames = $uploadData['file_name'];
            }
        }


        if ($this->input->post('id',true) == null)
        {
        $this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('remarks','Remarks','required');
        $data['image'] = (object)$postData = [
            'id'        =>  $this->input->post('id',true),
            'image'     =>  (!empty($filenames)?$filenames:$this->input->post('old_picture')),
            'title'     =>  $this->input->post('title',true),
            'remarks'   =>  $this->input->post('remarks',true),
            'status'    => $this->input->post('status'),
        ];
        }else{
        $this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('remarks','Remarks','required');
        $data['image'] = (object)$postData = [
            'id'        =>  $this->input->post('id',true),
            'image'     =>  (!empty($filenames)?$filenames:$this->input->post('old_picture')),
            'title'     =>  $this->input->post('title',true),
            'remarks'   =>  $this->input->post('remarks',true),
            'status'    => $this->input->post('status'),
        ];
        }
        if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['message'] = validation_errors();
        }else{
            if(empty($postData['id'])){
                $query = $this->setting_model->insertfile($postData);
                if($query){
                $output['message'] = 'File uploaded successfully';
                }else{
                $output['error'] = true;
                $output['message'] = 'Somethings wrong in the query...';
                }
            }else{

                $query = $this->setting_model->updatefile($postData);

                if($query){
                $output['message'] = 'File successfully Updated';               
                }else{
                $output['error'] = true;
                $output['message'] = 'Somethings wrong in the query...';
                }
            }
        }
        echo json_encode($output);
    }
    

    // public function insert(){
    //     $output = array('error' => false);
                
    //     if(!empty($_FILES['file']['name'])){
    //         $config['upload_path']  = 'bmb_assets2/img/website/slider';
    //         $config['file_name']    = $_FILES['file']['name'];
    //         $config['allowed_types']= 'gif|jpg|png|jpeg';
    //         // $config['max_size']     = 500;
    //         // $config['max_width']    = 1024;
    //         // $config['max_height']   = 460;
    //         // // $config['min_width']    = 1024;
    //         // // $config['min_height']   = 460;
            
    //         $this->load->library('upload', $config);
    //         $this->upload->initialize($config);
            
    //         if($this->upload->do_upload('file')){
    //             $uploadData = $this->upload->data();
    //             $filename = $uploadData['file_name'];

    //             if ($this->input->post('id',true) == null)
    //             {
    //             $data['image'] = (object)$postData = [
    //                 'id'        =>  $this->input->post('id',true),
    //                 'image'     =>  (!empty($filename)?$filename:$this->input->post('old_picture')),
    //                 'title'     =>  $this->input->post('title',true),
    //                 'remarks'   =>  $this->input->post('remarks',true),
    //                 'status'    => $this->input->post('status'),
    //             ];
    //             }else{
    //             $data['image'] = (object)$postData = [
    //                 'id'        =>  $this->input->post('id',true),
    //                 'image'     =>  (!empty($filename)?$filename:$this->input->post('old_picture')),
    //                 'title'     =>  $this->input->post('title',true),
    //                 'remarks'   =>  $this->input->post('remarks',true),
    //                 'status'    => $this->input->post('status'),
    //             ];    
    //             }
    //             if(empty($postData['id'])){
    //                 $query = $this->setting_model->insertfile($postData);
    //                 if($query){
    //                     $output['message'] = 'File uploaded successfully';
    //                 }
    //                 else{
    //                     $output['error'] = true;
    //                     $output['message'] = 'File uploaded but not inserted to database';
    //                 }
    //             }else{
    //                 $query = $this->setting_model->updatefile($postData);
    //                 if($query){
    //                     $output['message'] = 'File successfully Updated';
    //                 }
    //                 else{
    //                     $output['error'] = true;
    //                     $output['message'] = 'File updated but not inserted to database';
    //                 }
    //             }

    //         }else{
    //             $output['error'] = true;
    //             $output['message'] = 'Cannot upload file';
    //         }
    //     // }else{            
    //     //         $output['error'] = true;
    //     //         $output['message'] = 'Cannot upload empty file';
    //     }

    //     echo json_encode($output);
        
    // }

     public function delete_slide($id = null)
    {

        $output = array();
         $sql = "DELETE FROM tblwslides WHERE id = '$id'";

        if($this->db->query($sql)){
            $output['status'] = 'success';
            $output['message'] = 'Selected slides successfully deleted';
        }
        else{
            $output['status'] = 'error';
            $output['message'] = 'Something went wrong in deleting the data';
        }
        echo json_encode($output);
    }
}