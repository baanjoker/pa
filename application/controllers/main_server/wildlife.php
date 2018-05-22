<?php defined('BASEPATH') OR exit('No direct script access allowed!');
/**
 * 
 */
class wildlife extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();

        $this->load->model([
            'wildlife_model'
        ]);

        if ($this->session->userdata('isLogIn') == false
            || $this->session->userdata('user_role') != 1
        )
        redirect('index.php/login');
    }

    // ==================================================================//
    //                          CATEGORY                                 //
    // ================================================================= //
    public function category()
    {
        $data['page_title'] = 'Wildlife Category';
        $data['setting'] = $this->setting_model->read();

        $data['content'] = $this->load->view('main_server/wildlife/category',$data,TRUE);
        $this->load->view('main_server/dashboard',$data);
    }

    public function load_Category()
    {
        $draw   = intval($this->input->get("draw"));
        $start  = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $this->db->select("*");
        $this->db->from('tblwcategory');
      $query = $this->db->get();

        $data = [];
        foreach ($query->result() as $r) {
            $data[] = array(
                "",//this if for auto number
               $r->wcode,
               $r->wdesc,
               "<a type='button' class='btn btn-flat btn-warning' title='View Class' href='wclass/".$r->id."'><i class='ion ion-eye'></i></a>"." ".
                "<a type='button' class='btn btn-flat btn-success' href='categoryform/".$r->id."' title='Edit' ><i class='ion ion-edit'></i></a>"." ".
                "<a type='button' class='btn btn-flat btn-danger btn-deleteCategory' title='Delete' data-id=".$r->id."><i class='ion ion-android-delete'></i></a>"
            );
        }

        $result = array(
            "draw" => $draw,
            "recordsTotal" => $query->num_rows(),
            "recordsFiltered" => $query->num_rows(),
            "data" => $data
        );

        echo json_encode($result);
        exit();
    }

     public function delete_Category($id = null)
    {

        $output = array();
         // $sql = "DELETE FROM tblwcategory WHERE id = '$id'";
        $sql = "DELETE tblwcategory, tblclass, tblorderw, tblfamily  FROM tblwcategory 
                LEFT JOIN tblclass ON tblwcategory.id = tblclass.WCode
                LEFT JOIN tblorderw ON tblclass.id_c = tblorderw.ClassCodes
                LEFT JOIN tblfamily ON tblorderw.id_family = tblfamily.Ordercode
                -- LEFT JOIN tblwspeciesgenus ON tblfamily.id_scientific = tblwspeciesgenus.family_id
                WHERE      tblwcategory.id = '$id'";

        if($this->db->query($sql)){
            $output['status'] = 'success';
            $output['message'] = 'Selected item successfully deleted';
        }
        else{
            $output['status'] = 'error';
            $output['message'] = 'Something went wrong in deleting the data';
        }
        echo json_encode($output);
    }

    public function categoryform($id_cat=null)
    {
        $data['identifier'] = $this->uri->segment(4);
        $data['page_title'] = 'Wildlife Category';
        $data['setting'] = $this->setting_model->read();

        $data['wcat'] = $this->wildlife_model->getData($id_cat);

        $data['content'] = $this->load->view('main_server/wildlife/categoryForm',$data,TRUE);
        $this->load->view('main_server/dashboard',$data);
    }

    function check_Codes($wcode) {        
    if($this->input->post('id'))
        $id = $this->input->post('id');
    else
        $id = '';
    $result = $this->wildlife_model->check_Code($id, $wcode);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_Codes', 'Wildlife Code already exists');
        $response = false;
    }
    return $response;
    }

    function check_names($wdesc) {        
    if($this->input->post('id'))
        $id = $this->input->post('id');
    else
        $id = '';
    $result = $this->wildlife_model->check_Name($id, $wdesc);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_names', 'Name already exists');
        $response = false;
    }
    return $response;
    }

    public function save_cat()
    {
        if ($this->input->post('id',true) == null)
        {
            $this->form_validation->set_rules('wcode','Wildlife Code','required|is_unique[tblwCategory.wcode]');
            $this->form_validation->set_rules('wdesc','Name','required|is_unique[tblwCategory.wdesc]');
            $data['wcat'] = (object)$postData = [
                'id'            =>  $this->input->post('id',true),
                'wcode'     =>  $this->input->post('wcode',true),
                'wdesc' =>  $this->input->post('wdesc',true)
            ];
        } else {
            $this->form_validation->set_rules('wcode','Wildlife Codes','required|callback_check_Codes');
            $this->form_validation->set_rules('wdesc','Name','required|callback_check_names');
            $data['wcat'] = (object)$postData = [
                'id'            =>  $this->input->post('id',true),
                'wcode'     =>  $this->input->post('wcode',true),
                'wdesc' =>  $this->input->post('wdesc',true)
            ];
        }
        if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['messagecat'] = validation_errors();
        }else{
            if(empty($postData['id'])){
                $query = $this->wildlife_model->create($postData);
                if($query){
                $output['messagecat'] = "<strong style='color:yellow'>".$this->input->post('wdesc')."</strong> ".'registered successfully';
                }else{
                $output['error'] = true;
                $output['messagecat'] = 'New Cave registered successfully';
                }
            }else{

                $query = $this->wildlife_model->update($postData);

                if($query){
                $output['messagecat'] = "<strong style='color:yellow'>".$this->input->post('wdesc')."</strong> ".' successfully update';
                }else{
                $output['error'] = true;
                $output['messagecat'] = 'Cave successfully update';
                }
            }
        }
        echo json_encode($output);
    }

    // ==================================================================//
    //                          CLASS                                    //
    // ================================================================= //

    public function wclass()
    {
        $data['page_title'] = 'Wildlife Class';
        $data['setting'] = $this->setting_model->read();
        $data['get_uri_segment_id_category'] = $this->uri->segment(4);
        $data['content'] = $this->load->view('main_server/wildlife/class',$data,TRUE);
        $this->load->view('main_server/dashboard',$data);
    }

    public function load_Class($id=null)
    {
        $draw   = intval($this->input->get("draw"));
        $start  = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        if (!empty($id)) {
            $this->db->select("*");
            $this->db->from('tblclass');
            $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','LEFT');
            $this->db->where('tblclass.WCode',$id);
            $query = $this->db->get();

            $data = [];
            foreach ($query->result() as $r) {
                $data[] = array(
                    "",//this if for auto number
                   $r->wdesc,
                   $r->ClassCode,
                   $r->ClassDesc,
                   "<a type='button' class='btn btn-flat btn-warning' title='View Order' href='../order/".$r->id_c."'><i class='ion ion-eye'></i></a>"." ".
                    "<a type='button' class='btn btn-flat btn-success' href='../classform/".$r->id_c."' title='Edit' ><i class='ion ion-edit'></i></a>"." ".
                    "<a type='button' class='btn btn-flat btn-danger btn-deleteClass' title='Delete' data-id=".$r->id_c."><i class='ion ion-android-delete'></i></a>"
                );
            }
        } else {

            $this->db->select("*");
            $this->db->from('tblclass');
            $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','LEFT');
            $query = $this->db->get();

            $data = [];
            foreach ($query->result() as $r) {
                $data[] = array(
                    "",//this if for auto number
                   $r->wdesc,
                   $r->ClassCode,
                   $r->ClassDesc,
                    "<a type='button' class='btn btn-flat btn-warning' title='View Order' href='order/".$r->id_c."'><i class='ion ion-eye'></i></a>"." ".
                    "<a type='button' class='btn btn-flat btn-success' href='classform/".$r->id_c."' title='Edit' ><i class='ion ion-edit'></i></a>"." ".
                    "<a type='button' class='btn btn-flat btn-danger btn-deleteClass' title='Delete' data-id=".$r->id_c."><i class='ion ion-android-delete'></i></a>"
                );
            }
        }
        
        

        $result = array(
            "draw" => $draw,
            "recordsTotal" => $query->num_rows(),
            "recordsFiltered" => $query->num_rows(),
            "data" => $data
        );

        echo json_encode($result);
        exit();
    }

     public function delete_Class($id = null)
    {
        $output = array();

        $sql = "DELETE tblclass, tblorderw, tblfamily  FROM tblclass
                LEFT JOIN tblorderw ON tblclass.id_c = tblorderw.ClassCodes
                LEFT JOIN tblfamily ON tblorderw.id_family = tblfamily.Ordercode
                -- LEFT JOIN tblwspeciesgenus ON tblfamily.id_scientific = tblwspeciesgenus.family_id
                WHERE      tblclass.id_c = '$id'";

        if($this->db->query($sql)){
            $output['status'] = 'success';
            $output['message'] = 'Selected item successfully deleted';
        }
        else{
            $output['status'] = 'error';
            $output['message'] = 'Something went wrong in deleting the data';
        }
        echo json_encode($output);
    }

    public function classform($id_c=null)
    {
        $data['identifier'] = $this->uri->segment(4);
        $data['page_title'] = 'Wildlife Class';
        $data['setting'] = $this->setting_model->read();

        $data['wclass'] = $this->wildlife_model->getDataClass($id_c);
        $data['category'] = $this->wildlife_model->categoryList();
  
        $data['content'] = $this->load->view('main_server/wildlife/classForm',$data,TRUE);
        $this->load->view('main_server/dashboard',$data);
    }

    function check_class_code($classcode) {        
    if($this->input->post('id_c'))
        $id_c = $this->input->post('id_c');
    else
        $id_c = '';
    $result = $this->wildlife_model->check_cCode($id_c, $classcode);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_class_code', 'Wildlife Class Code already exists');
        $response = false;
    }
    return $response;
    }

    function check_names_class($ClassDesc) {        
    if($this->input->post('id_c'))
        $id_c = $this->input->post('id_c');
    else
        $id_c = '';
    $result = $this->wildlife_model->check_Name_class($id_c, $ClassDesc);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_names', 'Name already exists');
        $response = false;
    }
    return $response;
    }

    public function save_class()
    {
        if ($this->input->post('id_c',true) == null)
        {
            $this->form_validation->set_rules('wcode','Wildlife Code','required');
            $this->form_validation->set_rules('classcode','Wildlife Class','required|is_unique[tblclass.ClassCode]');
            $this->form_validation->set_rules('classdesc','Name','required|is_unique[tblclass.ClassDesc]');
            $data['wclass'] = (object)$postData = [
                'id_c'      =>  $this->input->post('id_c',true),
                'WCode'     =>  $this->input->post('wcode',true),
                'ClassCode' =>  $this->input->post('classcode',true),
                'ClassDesc' =>  $this->input->post('classdesc',true)
            ];
        } else {
            $this->form_validation->set_rules('wcode','Wildlife Code','required');
            $this->form_validation->set_rules('classcode','Wildlife Class','required|callback_check_class_code');
            $this->form_validation->set_rules('classdesc','Name','required|callback_check_names_class');
            $data['wclass'] = (object)$postData = [
                'id_c'      =>  $this->input->post('id_c',true),
                'WCode'     =>  $this->input->post('wcode',true),
                'ClassCode' =>  $this->input->post('classcode',true),
                'ClassDesc' =>  $this->input->post('classdesc',true)
            ];
        }
        if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['messageclass'] = validation_errors();
        }else{
            if(empty($postData['id_c'])){
                $query = $this->wildlife_model->createClass($postData);
                if($query){
                $output['messageclass'] = "<strong style='color:yellow'>".$this->input->post('classdesc')."</strong> ".'registered successfully';
                }else{
                $output['error'] = true;
                $output['messageclass'] = 'New Cave registered successfully';
                }
            }else{

                $query = $this->wildlife_model->updateClass($postData);

                if($query){
                $output['messageclass'] = "<strong style='color:yellow'>".$this->input->post('classdesc')."</strong> ".' successfully update';
                }else{
                $output['error'] = true;
                $output['messageclass'] = 'Cave successfully update';
                }
            }
        }
        echo json_encode($output);
    }

    // ==================================================================//
    //                          ORDER                                    //
    // ================================================================= //

    public function order()
    {
        $data['page_title'] = 'Wildlife Orders';
        $data['setting'] = $this->setting_model->read();
        $data['get_uri_segment_id_class'] = $this->uri->segment(4);
        $data['content'] = $this->load->view('main_server/wildlife/order',$data,TRUE);
        $this->load->view('main_server/dashboard',$data);
    }

    public function load_Order($id=null)
    {
        $draw   = intval($this->input->get("draw"));
        $start  = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        if (!empty($id)) {
            $this->db->select("*");
            $this->db->from('tblorderw');
            $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','LEFT');
            $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','LEFT');
            $this->db->where('tblorderw.ClassCodes',$id);
            $query = $this->db->get();

            $data = [];
            foreach ($query->result() as $r) {
                $data[] = array(
                    "",//this if for auto number
                   $r->wdesc,
                   $r->ClassDesc,
                   $r->OrderCode,
                   $r->OrderDesc,
                    "<a type='button' class='btn btn-flat btn-warning' title='View Family' href='../family/".$r->id_family."'><i class='ion ion-eye'></i></a>"." ".
                    "<a type='button' class='btn btn-flat btn-success' href='../orderform/".$r->id_family."' title='Edit' ><i class='ion ion-edit'></i></a>"." ".
                    "<a type='button' class='btn btn-flat btn-danger btn-deleteOrder' title='Delete' data-id=".$r->id_family."><i class='ion ion-android-delete'></i></a>"
                );
            }
        } else {

            $this->db->select("*");
            $this->db->from('tblorderw');
            $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','LEFT');
            $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','LEFT');
            $query = $this->db->get();

            $data = [];
            foreach ($query->result() as $r) {
                $data[] = array(
                    "",//this if for auto number
                    $r->wdesc,
                    $r->ClassDesc,
                    $r->OrderCode,
                    $r->OrderDesc,
                    "<a type='button' class='btn btn-flat btn-warning' title='View Family' href='family/".$r->id_family."'><i class='ion ion-eye'></i></a>"." ".
                    "<a type='button' class='btn btn-flat btn-success' href='orderform/".$r->id_family."' title='Edit' ><i class='ion ion-edit'></i></a>"." ".
                    "<a type='button' class='btn btn-flat btn-danger btn-deleteOrder' title='Delete' data-id=".$r->id_family."><i class='ion ion-android-delete'></i></a>"
                );
            }
        }
        
        

        $result = array(
            "draw" => $draw,
            "recordsTotal" => $query->num_rows(),
            "recordsFiltered" => $query->num_rows(),
            "data" => $data
        );

        echo json_encode($result);
        exit();
    }

     public function delete_Order($id = null)
    {
        $output = array();
        
        $sql = "DELETE tblorderw, tblfamily  FROM tblorderw
                LEFT JOIN tblfamily ON tblorderw.id_family = tblfamily.Ordercode
                WHERE      tblorderw.id_family = '$id'";

        if($this->db->query($sql)){
            $output['status'] = 'success';
            $output['message'] = 'Selected item successfully deleted';
        }
        else{
            $output['status'] = 'error';
            $output['message'] = 'Something went wrong in deleting the data';
        }
        echo json_encode($output);
    }

    public function orderform($id_family=null)
    {
        $data['identifier'] = $this->uri->segment(4);
        $data['page_title'] = 'Wildlife Order';
        $data['setting'] = $this->setting_model->read();

        $data['worder'] = $this->wildlife_model->getDataOrder($id_family);
        $data['category'] = $this->wildlife_model->categoryList();
        $data['classListDropdown'] = $this->wildlife_model->identify_order_class($id_family);

        $data['content'] = $this->load->view('main_server/wildlife/orderForm',$data,TRUE);
        $this->load->view('main_server/dashboard',$data);
    }

    public function getCat()
        {
       $wcode = $this->input->post('wcode');
            if (!empty($wcode)) {
            $query = $this->db->select('*')
                ->from('tblclass')
                ->where('WCode',$wcode)
                ->get();    

            $option = "<option value=\"\">SELECT CLASS</option>"; 
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $prov) {
                    $option .= strtoupper("<option value=\"$prov->id_c\">$prov->ClassDesc</option>");
                } 
                $data['message'] = $option;
                $data['status'] = true;
            } else {
                $data['message'] = "No Class available";
                $data['status'] = false;
            }
        } else {
            $data['message'] = "Invalid Class selected";
            $data['status'] = null;
        }

        echo json_encode($data);
    }

    function check_code_orders($ordercode) {        
    if($this->input->post('id_family'))
        $id_family = $this->input->post('id_family');
    else
        $id_family = '';
    $result = $this->wildlife_model->check_Code_order($id_family, $ordercode);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_code_orders', 'Wildlife Class Code already exists');
        $response = false;
    }
    return $response;
    }

    function check_names_orders($orderdesc) {        
    if($this->input->post('id_family'))
        $id = $this->input->post('id_family');
    else
        $id = '';
    $result = $this->wildlife_model->check_Name_order($id, $orderdesc);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_names_orders', 'Name already exists');
        $response = false;
    }
    return $response;
    }

    public function save_order()
    {
        if ($this->input->post('id_family',true) == null)
        {
            $this->form_validation->set_rules('wcode','Wildlife Category','required');
            $this->form_validation->set_rules('wclass','Wildlife Class','required');
            $this->form_validation->set_rules('ordercode','Code','required|is_unique[tblorderw.OrderCode]');
            $this->form_validation->set_rules('orderdesc','Name','required|is_unique[tblorderw.OrderDesc]');
            $data['wfamily'] = (object)$postData = [
                'id_family' =>  $this->input->post('id_family',true),
                'ClassCodes'    =>  $this->input->post('wclass',true),
                'OrderDesc' =>  $this->input->post('orderdesc',true),
                'OrderCode' =>  $this->input->post('ordercode',true),
                'wCategory' =>  $this->input->post('wcode',true),
            ];
        } else {
            $this->form_validation->set_rules('wcode','Wildlife Category','required');
            $this->form_validation->set_rules('wclass','Wildlife Class','required');
            $this->form_validation->set_rules('ordercode','Code','required|callback_check_code_orders'); //NEED TO HAVE CALL BACK
            $this->form_validation->set_rules('orderdesc','Name','required|callback_check_names_orders');
            $data['wfamily'] = (object)$postData = [
                'id_family' =>  $this->input->post('id_family',true),
                'ClassCodes'    =>  $this->input->post('wclass',true),
                'OrderDesc' =>  $this->input->post('orderdesc',true),
                'OrderCode' =>  $this->input->post('ordercode',true),
                'wCategory' =>  $this->input->post('wcode',true),
            ];
        }
if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['messageorder'] = validation_errors();
        }else{
            if(empty($postData['id_family'])){
                $query = $this->wildlife_model->createOrder($postData);
                if($query){
                $output['messageorder'] = "<strong style='color:yellow'>".$this->input->post('orderdesc')."</strong> ".'registered successfully';
                }else{
                $output['error'] = true;
                $output['messageorder'] = 'New Order registered successfully';
                }
            }else{

                $query = $this->wildlife_model->updateOrder($postData);

                if($query){
                $output['messageorder'] = "<strong style='color:yellow'>".$this->input->post('orderdesc')."</strong> ".' successfully update';
                }else{
                $output['error'] = true;
                $output['messageorder'] = 'Order successfully update';
                }
            }
        }
        echo json_encode($output);
    }

    // ==================================================================//
    //                          FAMILY                                   //
    // ================================================================= //

    public function family()
    {
        $data['page_title'] = 'Wildlife Family';
        $data['setting'] = $this->setting_model->read();
        $data['get_uri_segment_id_order'] = $this->uri->segment(4);
        $data['content'] = $this->load->view('main_server/wildlife/family',$data,TRUE);
        $this->load->view('main_server/dashboard',$data);
    }

    public function load_Family($id=null)
    {
        $draw   = intval($this->input->get("draw"));
        $start  = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        if (!empty($id)) {
            $this->db->select("*");
            $this->db->from('tblfamily');
            $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','LEFT');
            $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','LEFT');
            $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','LEFT');
            $this->db->where('tblfamily.Ordercode',$id);
            $query = $this->db->get();

            $data = [];
            foreach ($query->result() as $r) {
                $data[] = array(
                    "",//this if for auto number
                   $r->wdesc,
                   $r->ClassDesc,
                   $r->OrderDesc,
                   $r->FamilyCode,
                   $r->CommonName,
                   $r->ScientificName,
                    "<a type='button' class='btn btn-flat btn-warning' title='View Species Genus' href='../species/".$r->id_scientific."'><i class='ion ion-eye'></i></a>"." ".
                    "<a type='button' class='btn btn-flat btn-success' href='../familyform/".$r->id_scientific."' title='Edit' ><i class='ion ion-edit'></i></a>"." ".
                    "<a type='button' class='btn btn-flat btn-danger btn-deleteFamily' title='Delete' data-id=".$r->id_scientific."><i class='ion ion-android-delete'></i></a>"
                );
            }
        } else {

            $this->db->select("*");
            $this->db->from('tblfamily');
            $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','LEFT');
            $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','LEFT');
            $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','LEFT');
            $query = $this->db->get();

            $data = [];
            foreach ($query->result() as $r) {
                $data[] = array(
                    "",//this if for auto number
                    $r->wdesc,
                    $r->ClassDesc,
                    $r->OrderDesc,
                    $r->FamilyCode,
                    $r->CommonName,
                    $r->ScientificName,
                    "<a type='button' class='btn btn-flat btn-warning' title='View Species Genus' href='species/".$r->id_scientific."'><i class='ion ion-eye'></i></a>"." ".
                    "<a type='button' class='btn btn-flat btn-success' href='familyform/".$r->id_scientific."' title='Edit' ><i class='ion ion-edit'></i></a>"." ".
                    "<a type='button' class='btn btn-flat btn-danger btn-deleteFamily' title='Delete' data-id=".$r->id_scientific."><i class='ion ion-android-delete'></i></a>"
                );
            }
        }
        
        

        $result = array(
            "draw" => $draw,
            "recordsTotal" => $query->num_rows(),
            "recordsFiltered" => $query->num_rows(),
            "data" => $data
        );

        echo json_encode($result);
        exit();
    }

    public function delete_Family($id = null)
    {
        $output = array();
         $sql = "DELETE FROM tblfamily WHERE id_scientific = '$id'";

        if($this->db->query($sql)){
            $output['status'] = 'success';
            $output['message'] = 'Selected item successfully deleted';
        }
        else{
            $output['status'] = 'error';
            $output['message'] = 'Something went wrong in deleting the data';
        }
        echo json_encode($output);
    }

    public function familyform($id_scientific=null)
    {
        $data['identifier'] = $this->uri->segment(4);
        $data['page_title'] = 'Wildlife Family Name';
        $data['setting'] = $this->setting_model->read();
        $data['wfamily'] = $this->wildlife_model->getDataFamily($id_scientific);
        $data['category'] = $this->wildlife_model->categoryList();
        $data['classListDropdown'] = $this->wildlife_model->identify_family_class($id_scientific);
        $data['OrderListDropdown'] = $this->wildlife_model->identify_family_order($id_scientific);
        
        $data['content'] = $this->load->view('main_server/wildlife/familyForm',$data,TRUE);
        $this->load->view('main_server/dashboard',$data);
    }

    public function getClass()
        {
       $catid = $this->input->post('catid');
            if (!empty($catid)) {
            $query = $this->db->select('*')
                ->from('tblclass')
                ->where('WCode',$catid)
                ->get();    

            $option = "<option value=\"\">SELECT WILDLIFE CLASS</option>"; 
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $r) {
                    $option .= strtoupper("<option value=\"$r->id_c\">$r->ClassDesc</option>");
                } 
                $data['message'] = $option;
                $data['status'] = true;
            } else {
                $data['message'] = "No data Class available";
                $data['status'] = false;
            }
        } else {
            $data['message'] = "Must not be null";
            $data['status'] = null;
        }

        echo json_encode($data);
    }

    public function getOrder()
        {
       $classid = $this->input->post('classid');
            if (!empty($classid)) {
            $query = $this->db->select('*')
                ->from('tblorderw')
                ->where('ClassCodes',$classid)
                ->get();    

            $option = "<option value=\"\">SELECT WILDLIFE ORDER</option>"; 
            if ($query->num_rows() > 0) {
                foreach ($query->result() as $r) {
                    $option .= strtoupper("<option value=\"$r->id_family\">$r->OrderDesc</option>");
                } 
                $data['message'] = $option;
                $data['status'] = true;
            } else {
                $data['message'] = "No data available for Order!"." <a type='button'  href='././orderForm'>Add</>";
                $data['status'] = false;
            }
        } else {
            $data['message'] = "Must not be null";
            $data['status'] = null;
        }

        echo json_encode($data);
    }

    function check_familyCodes($wfamily) {        
    if($this->input->post('id_scientific'))
        $id = $this->input->post('id_scientific');
    else
        $id = '';
    $result = $this->wildlife_model->check_familycode($id, $wfamily);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_familyCodes', 'Family Code already exists');
        $response = false;
    }
    return $response;
    }

    function check_familyNames($scientificname) {        
    if($this->input->post('id_scientific'))
        $id = $this->input->post('id_scientific');
    else
        $id = '';
    $result = $this->wildlife_model->check_familyname($id, $scientificname);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_familyNames', 'Family Name already exists');
        $response = false;
    }
    return $response;
    }

    public function save_family()
    {
        if ($this->input->post('id_scientific',true) == null) {
            $this->form_validation->set_rules('catid','Category Name','required');
            $this->form_validation->set_rules('classid','Class Name','required');
            $this->form_validation->set_rules('orderid','Order Name','required');
            $this->form_validation->set_rules('wfamily','Family Code','required|is_unique[tblfamily.FamilyCode]|min_length[4]');
            $this->form_validation->set_rules('commonname','Common Name','required|is_unique[tblfamily.CommonName]');
            $this->form_validation->set_rules('scientificname','Scientific Name','required|is_unique[tblfamily.ScientificName]');
            $data['dataResult'] = (object)$postData = [
                'id_scientific' =>      $this->input->post('id_scientific',true),
                'OrderCode'     =>      $this->input->post('orderid',true),
                'FamilyCode'    =>      $this->input->post('wfamily',true),
                'CommonName'    =>      $this->input->post('commonname',true),
                'ScientificName'=>      $this->input->post('scientificname',true),
                'WCode'         =>      $this->input->post('catid',true),
                'ClassCode'     =>      $this->input->post('classid',true)
            ];
        }else{
            $this->form_validation->set_rules('catid','Category Name','required');
            $this->form_validation->set_rules('classid','Class Name','required');
            $this->form_validation->set_rules('orderid','Order Name','required');
            $this->form_validation->set_rules('wfamily','Family Code','required|min_length[4]|callback_check_familyCodes');
            $this->form_validation->set_rules('commonname','Common Name','required');
            $this->form_validation->set_rules('scientificname','Scientific Name','required|callback_check_familyNames');
            $data['dataResult'] = (object)$postData = [
                'id_scientific' =>      $this->input->post('id_scientific',true),
                'OrderCode'     =>      $this->input->post('orderid',true),
                'FamilyCode'    =>      $this->input->post('wfamily',true),
                'CommonName'    =>      $this->input->post('commonname',true),
                'ScientificName'=>      $this->input->post('scientificname',true),
                'WCode'         =>      $this->input->post('catid',true),
                'ClassCode'     =>      $this->input->post('classid',true)
            ];
        }
        if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['messagefamily'] = validation_errors();
        }else{
            if(empty($postData['id_scientific'])){
                $query = $this->wildlife_model->createFamily($postData);
                if($query){
                $output['messagefamily'] = "<strong style='color:yellow'>".$this->input->post('scientificname')."</strong> ".'registered successfully';
                }else{
                $output['error'] = true;
                $output['messagefamily'] = 'New Family name registered successfully';
                }
            }else{

                $query = $this->wildlife_model->updateFamily($postData);

                if($query){
                $output['messagefamily'] = "<strong style='color:yellow'>".$this->input->post('scientificname')."</strong> ".' successfully update';                
                }else{
                $output['error'] = true;
                $output['messagefamily'] = 'Family name successfully update';
                }

            }
        }
        echo json_encode($output);
    }
    // ==================================================================//
    //                          SPECIES                                  //
    // ================================================================= //

    public function species()
    {
        $data['page_title'] = 'Wildlife Species';
        $data['setting'] = $this->setting_model->read();
        $data['get_uri_segment_id_family'] = $this->uri->segment(4);
        $data['content'] = $this->load->view('main_server/wildlife/species',$data,TRUE);
        $this->load->view('main_server/dashboard',$data);
    }

    public function load_Species($id=null)
    {
        $draw   = intval($this->input->get("draw"));
        $start  = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        if (!empty($id)) {
            $this->db->select("*");
            $this->db->from('tblwspeciesgenus');
            $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','LEFT');
            $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','LEFT');
            $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','LEFT');
            $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','LEFT');
            $this->db->where('tblwspeciesgenus.family_id',$id);
            $query = $this->db->get();

            $data = [];
            foreach ($query->result() as $r) {
                $data[] = array(
                    "",//this if for auto number
                   $r->wdesc,
                   $r->ClassDesc,
                   $r->OrderDesc,
                   $r->ScientificName,
                   $r->speciesCode,                   
                   $r->commonNameSpecies,
                   $r->scientificName_genus,                    
                    "<a type='button' class='btn btn-flat btn-success' href='../speciesForm/".$r->id_genus."' title='Edit' ><i class='ion ion-edit'></i></a>"." ".
                    "<a type='button' class='btn btn-flat btn-danger btn-deleteFamily' title='Delete' data-id=".$r->id_genus."><i class='ion ion-android-delete'></i></a>"
                );
            }
        } else {

            $this->db->select("*");
            $this->db->from('tblwspeciesgenus');
            $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','LEFT');
            $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','LEFT');
            $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','LEFT');
            $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','LEFT');
            $query = $this->db->get();

            $data = [];
            foreach ($query->result() as $r) {
                $data[] = array(
                    "",//this if for auto number
                   $r->wdesc,
                   $r->ClassDesc,
                   $r->OrderDesc,
                   $r->ScientificName,
                   $r->speciesCode,                   
                   $r->commonNameSpecies,
                   $r->scientificName_genus,
                    "<a type='button' class='btn btn-flat btn-success' href='speciesForm/".$r->id_genus."' title='Edit' ><i class='ion ion-edit'></i></a>"." ".
                    "<a type='button' class='btn btn-flat btn-danger btn-deleteSpecies' title='Delete' data-id=".$r->id_genus."><i class='ion ion-android-delete'></i></a>"
                );
            }
        }
        
        

        $result = array(
            "draw" => $draw,
            "recordsTotal" => $query->num_rows(),
            "recordsFiltered" => $query->num_rows(),
            "data" => $data
        );

        echo json_encode($result);
        exit();
    }

    public function delete_Species($id = null)
    {
        $output = array();
         $sql = "DELETE FROM tblwspeciesgenus WHERE id_genus = '$id'";

        if($this->db->query($sql)){
            $output['status'] = 'success';
            $output['message'] = 'Selected item successfully deleted';
        }
        else{
            $output['status'] = 'error';
            $output['message'] = 'Something went wrong in deleting the data';
        }
        echo json_encode($output);
    }

     public function speciesform($id_genus=null)
    {
        $data['identifier'] = $this->uri->segment(4);
        $data['page_title'] = 'Wildlife Species Genus';
        $data['setting'] = $this->setting_model->read();
        $data['wspecies'] = $this->wildlife_model->getDataSpecies($id_genus);
        $data['family'] = $this->wildlife_model->familyList();
        $data['content'] = $this->load->view('main_server/wildlife/speciesForm',$data,TRUE);
        $this->load->view('main_server/dashboard',$data);
    }

    function check_codeSpecies($speciescode) {        
    if($this->input->post('id_genus'))
        $id_genus = $this->input->post('id_genus');
    else
        $id_genus = '';
        $result = $this->wildlife_model->check_codeSpecies($id_genus, $speciescode);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_codeSpecies', 'Code already exists');
        $response = false;
    }
    return $response;
    }

    function check_commonnames($commonname) {        
    if($this->input->post('id_genus'))
        $id_genus = $this->input->post('id_genus');
    else
        $id_genus = '';
        $result = $this->wildlife_model->check_commonNames($id_genus, $commonname);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_commonnames', 'Common Name already exists');
        $response = false;
    }
    return $response;
    }

    function check_speciesnames($scientificname) {        
    if($this->input->post('id_genus'))
        $id_genus = $this->input->post('id_genus');
    else
        $id_genus = '';
        $result = $this->wildlife_model->check_scientificNames($id_genus, $scientificname);
    if($result == 0)
        $response = true;
    else {
        $this->form_validation->set_message('check_speciesnames', 'Species Name already exists');
        $response = false;
    }
    return $response;
    }

    public function save_species()
    {
        if ($this->input->post('id_genus',true) == null)
        {
        $this->form_validation->set_rules('familyid','Family Name','required');
        $this->form_validation->set_rules('speciescode','Species Code','required|is_unique[tblwspeciesgenus.speciesCode]');
        $this->form_validation->set_rules('commonname','Common Name','required|is_unique[tblwspeciesgenus.commonNameSpecies]');
        $this->form_validation->set_rules('scientificanamegenus','Scientific Name','required|is_unique[tblwspeciesgenus.scientificName_genus]');
        $data['genus'] = (object)$postData = [
            'id_genus'      =>  $this->input->post('id_genus',true),
            'family_id'     =>  $this->input->post('familyid',true),
            'speciesCode'   =>  $this->input->post('speciescode',true),
            'commonNameSpecies' =>  $this->input->post('commonname',true),
            'scientificName_genus'  =>  $this->input->post('scientificanamegenus',true),
        ];
        }else{
        $this->form_validation->set_rules('familyid','Family Name','required');
        $this->form_validation->set_rules('speciescode','Species Code','required|callback_check_codeSpecies');
        $this->form_validation->set_rules('commonname','Common Name','required|callback_check_commonnames');
        $this->form_validation->set_rules('scientificanamegenus','Scientific Name','required|callback_check_speciesnames');
        $data['genus'] = (object)$postData = [
            'id_genus'      =>  $this->input->post('id_genus',true),
            'family_id'     =>  $this->input->post('familyid',true),
            'speciesCode'   =>  $this->input->post('speciescode',true),
            'commonNameSpecies' =>  $this->input->post('commonname',true),
            'scientificName_genus'  =>  $this->input->post('scientificanamegenus',true),
        ];
        }
        if ($this->form_validation->run() == false) {
            $output['error'] = true;
            $output['messagespecies'] = validation_errors();
        }else{
            if(empty($postData['id_genus'])){
                $query = $this->wildlife_model->createSpecies($postData);
                if($query){
                $output['messagespecies'] = "<strong style='color:yellow'>".$this->input->post('scientificanamegenus')."</strong> ".'registered successfully';
                }else{
                $output['error'] = true;
                $output['messagespecies'] = 'New Species Genus registered successfully';
                }
            }else{

                $query = $this->wildlife_model->updateSpecies($postData);

                if($query){
                $output['messagespecies'] = "<strong style='color:yellow'>".$this->input->post('scientificanamegenus')."</strong> ".' successfully update';                
                }else{
                $output['error'] = true;
                $output['messagespecies'] = 'Species Genus successfully update';
                }
            }
        }
        echo json_encode($output);
    }
}