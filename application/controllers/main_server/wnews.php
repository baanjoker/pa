<?php defined('BASEPATH') or exit('No direct access allowed script.');
/**
 * 
 */
class wnews extends CI_Controller
{
	
	function __construct()
	{
		parent ::__construct();
		$this->load->model(['setting_model']);

		if ($this->session->userdata('isLogIn') == FALSE || $this->session->userdata('user_role') !=1)
		redirect('login');

	}


	public function index()
	{
		$data['page_title'] = 'News and Event';
		$data['setting'] = $this->setting_model->read();

		$data['content'] = $this->load->view('main_server/website/website_news',$data,true);
		$this->load->view('main_server/dashboard',$data);		
	}

	public function form($id=null)
	{
		$data['page_title'] = 'News and Event Form';
		$data['setting'] = $this->setting_model->read();
        $data['news'] = $this->setting_model->getNews($id);


		$data['content'] = $this->load->view('main_server/website/website_news_form',$data,true);
		$this->load->view('main_server/dashboard',$data);		
	}

	public function newsload()
	{
        $data = $this->setting_model->loadNews();
        foreach($data as $row){
        	$time = strtotime($row->advisory_date);
            ?>
            
            <tr>
                <?php if ($row->category == 1): ?>
                    <td><?php echo "News"  ?></td>
                <?php else: ?>
                    <td><?php echo "Events"  ?></td>                    
                <?php endif ?>
                <td><?php echo $row->advisory_title ?></td>               
                <td><?php echo date("M d, Y", $time) ?></td>
                <?php if ($row->advisory_status == 1): ?>
                	<td><span class="badge badge-success" style="background-color: #42f456; color:#000"><?php echo "Active"  ?></span></td>
                <?php else: ?>
                	<td><span class="badge badge-danger" style="background-color: #ff0000; color:#fff"><?php echo "Inactive"  ?></span></td>                	
                <?php endif ?>
                <td>
                	<a type='button' class='btn btn-flat btn-success' href='wnews/form/<?php echo $row->id_advisory ?>' title='Edit' ><i class='ion ion-edit'></i></a>
                    <a type='button' class='btn btn-flat btn-danger btn-deletenews' title='Delete' data-id="<?php echo $row->id_advisory ?>"><i class='ion ion-android-delete'></i></a>
                </td>
            </tr>
            <?php
        }
	}

	public function insert()
    {        
        if(!empty($_FILES['image']['name'])){
            $config ['upload_path'] = 'bmb_assets2/upload/news_image';
            $config['file_name'] = $_FILES['image']['name'];
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
             if($this->upload->do_upload('image')){
                $uploadData = $this->upload->data();
                $filenames = $uploadData['file_name'];
            }
        }


        if ($this->input->post('id',true) == null)
        {
        date_default_timezone_set('Asia/Manila'); # add your city to set local time zone
		$now = date('Y-m-d');
        $this->form_validation->set_rules('subject','Subject/Title','required');
        // $this->form_validation->set_rules('details','Details','required');
        $data['news'] = (object)$postData = [
            'id_advisory'        =>  $this->input->post('id',true),        	
            'advisory_title'     =>  $this->input->post('subject',true),
            'advisory_details'   =>  $this->input->post('details',true),
            'advisory_date'    	 =>  $now,
            'advisory_status'    =>  $this->input->post('status'),
            'advisory_author'    =>  $this->input->post('author',true),
            'important'          =>  $this->input->post('important'),
            'category'           =>  $this->input->post('category'),
            'advisory_image'     =>  (!empty($filenames)?$filenames:$this->input->post('old_picture')),

        ];
        }else{
        $this->form_validation->set_rules('subject','Title','required');
        $data['news'] = (object)$postData = [
            'id_advisory'        =>  $this->input->post('id',true),        	
            'advisory_title'     =>  $this->input->post('subject',true),
            'advisory_details'   =>  $this->input->post('details',true),
            'advisory_status'    =>  $this->input->post('status'),            
            'advisory_author'    =>  $this->input->post('author',true),
            'important'          =>  $this->input->post('important'),
            'category'           =>  $this->input->post('category'),
            'advisory_image'     =>  (!empty($filenames)?$filenames:$this->input->post('old_picture')),
        ];
        }
        if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['message'] = validation_errors();
        }else{
            if(empty($postData['id_advisory'])){
                $query = $this->setting_model->insertnews($postData);
                if($query){
                $output['message'] = 'News/Events added successfully';
                }else{
                $output['error'] = true;
                $output['message'] = 'Somethings wrong in the query...';
                }
            }else{
                $query = $this->setting_model->updatenews($postData);
                if($query){
                $output['message'] = 'News/Events successfully Updated';               
                }else{
                $output['error'] = true;
                $output['message'] = 'Somethings wrong in the query...';
                }
            }
        }
        echo json_encode($output);
    }

    public function delete_news($id = null)
    {

    	$sql1 = $this->db->where('id_advisory',$id)
                                            ->get('tbladvisory')
                                            ->row();
            unlink('bmb_assets2/upload/news_image/'.$sql1->advisory_image);
            // $image_path = base_url().'bmb_assets2/upload/map_image/'; // your image path
            $sql = "DELETE FROM tbladvisory WHERE id_advisory = '$id'";
            if ($this->db->query($sql)) {

                $output['status'] = 'success';
                $output['message'] = 'Ecotourism activity successfully removed';
            } else {
                $output['status'] = 'error';
                $output['message'] = 'Something went wrong in deleting the data';
            }
              echo json_encode($output);        
    }
}