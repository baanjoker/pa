<?php 
defined('BASEPATH') OR exit('No direct access script allowed!');
/**
 * 
 */
class Wetland_report extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model([
			'report/wetland_report_model'
		]);
		if ($this->session->userdata('isLogIn') == FALSE || $this->session->userdata('user_role') !=1)
		redirect('login');

		$context = stream_context_set_default( [
        'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                 ],
        ]);
	}

	public function index()
	{
		$data['page_title'] = 'Wetland Generated Report';
		$data['setting'] = $this->setting_model->read();

		$data['filter_field'] = array(
		    NULL => 'Filtered Field',
		    'tblwetland.wetlandname'		=>	'Wetland Name',
		    'tbllocregion.regionName'    => 	'Region',
		    'tbllocprovince.provinceName'  => 	'Province',
		    'tbllocmunicipality.municipalName' => 	'Municipality',
		);
		$data['filter_comparison'] = array(
		    NULL => 'Comparison Operator',
		    '='    => 	'Equal to',
		    '!='  => 	'Not equal to',
		    'like'	=>	'Like',
		    'not_like'	=>	'Not like',
		);
		$data['filter_comparison_and_or'] = array(
		    NULL 	=> 	'AND/OR Operator',
		    'And'	=> 	'And',
		    'Or'  	=> 	'Or'		    
		);
		$data['sortby'] = array(
			NULL 	=>	'Sort by',
			'ASC'	=>	'Ascending',
			'DESC'	=>	'Descending'
		);

		$data['content'] = $this->load->view('report/wetland_report',$data,TRUE);
		$this->load->view('main_server/dashboard',$data);
	}

	public function resultsearch(){

        $field 		= 	$this->input->post('cfield1');
		$compared 	= 	$this->input->post('ccomp1');
		$valued 	= 	$this->input->post('cvalue1');
		$andor1		=	$this->input->post('candor2');
		$field2		=	$this->input->post('cfield2');
		$compared2	=	$this->input->post('ccomp2');
		$valued2	=	$this->input->post('cvalue2');
		$andor2		=	$this->input->post('candor3');
		$field3		=	$this->input->post('cfield3');
		$compared3	=	$this->input->post('ccomp3');
		$valued3	=	$this->input->post('cvalue3');
		$sortby		=	$this->input->post('sortby');
		$orderby	=	$this->input->post('orderby');		
		$draw   = intval($this->input->get("draw"));
        $start  = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        if (empty($andor1) && empty($andor2)) {

        	if (!empty($field) && !empty($compared) && !empty($valued) ) {
        	 		
		        	$this->db->join('tbllocregion', 'tblwetland.regionid = tbllocregion.id','left');
				 	$this->db->join('tbllocprovince', 'tblwetland.provinceid = tbllocprovince.id_p','left');
				 	$this->db->join('tbllocmunicipality', 'tblwetland.municipalid = tbllocmunicipality.id_m','left');
				 	$this->db->join('tbllocbarangay', 'tblwetland.barangayid = tbllocbarangay.id_b','left');
				 	if($compared == "=") {
				 		$this->db->where($field, $valued);	
				 	} elseif($compared == "!=") { 
				 		$this->db->where($field.'!=', $valued);
				 	} elseif($compared == "like" || $compared == "not_like") {
				 		$this->db->$compared($field, $valued);
				 	}
				 	if (!empty($sortby)) {
				 		$this->db->order_by($sortby,$orderby);
				 	}
		      		$query = $this->db->get('tblwetland');

        	} else {   

        	$this->db->join('tbllocregion', 'tblwetland.regionid = tbllocregion.id','left');
		 	$this->db->join('tbllocprovince', 'tblwetland.provinceid = tbllocprovince.id_p','left');
		 	$this->db->join('tbllocmunicipality', 'tblwetland.municipalid = tbllocmunicipality.id_m','left');
		 	$this->db->join('tbllocbarangay', 'tblwetland.barangayid = tbllocbarangay.id_b','left');
		 	// $this->db->where('cave_name', '');	
		 	$this->db->order_by('tbllocregion.regionName','ASC');
		 	$this->db->order_by('tbllocprovince.provinceName','ASC');
		 	$this->db->order_by('tbllocmunicipality.municipalName','ASC');
		 	$this->db->order_by('wetlandname','ASC');
		 	if (!empty($sortby)) {
				$this->db->order_by($sortby,$orderby);
			}
      		$query = $this->db->get('tblwetland');
        	}    
        } elseif ($andor1 == "And"){
        	$this->db->join('tbllocregion', 'tblwetland.regionid = tbllocregion.id','left');
			$this->db->join('tbllocprovince', 'tblwetland.provinceid = tbllocprovince.id_p','left');
			$this->db->join('tbllocmunicipality', 'tblwetland.municipalid = tbllocmunicipality.id_m','left');
			$this->db->join('tbllocbarangay', 'tblwetland.barangayid = tbllocbarangay.id_b','left');
        	
        	if ($compared == "like"  && $compared2 == "like" || $compared == "like"  && $compared2 == "not_like" || $compared == "not_like"  && $compared2 == "like" || $compared == "not_like" && $compared2 == "not_like") {
        		$this->db->$compared($field, $valued);	
			 	$this->db->$compared2($field2, $valued2);
        	}elseif($compared == "like"  && $compared2 == "=" || $compared == "not_like"  && $compared2 == "="){
        		$this->db->$compared($field, $valued);	
			 	$this->db->where($field2, $valued2);
			} elseif ($compared == "like"  && $compared2 == "!=" || $compared == "not_like"  && $compared2 == "!="){
				$this->db->$compared($field, $valued);	
			 	$this->db->where($field2.'!=', $valued2);
			} elseif ($compared == "="  && $compared2 == "=") {
				$this->db->where($field, $valued);	
			 	$this->db->where($field2, $valued2);
			} elseif ($compared == "="  && $compared2 == "!=") {
				$this->db->where($field, $valued);
				$this->db->where($field2.'!=', $valued2);
			} elseif ($compared == "="  && $compared2 == "like" || $compared == "="  && $compared2 == "not_like") {
				$this->db->where($field, $valued);	
			 	$this->db->$compared2($field2, $valued2);
			} elseif($compared == "!=" && $compared2 == "=") {
				$this->db->where($field.'!=', $valued);
			 	$this->db->where($field2, $valued2);
			} elseif($compared == "!=" && $compared2 == "!=") {
				$this->db->where($field.'!=', $valued);
				$this->db->where($field2.'!=', $valued2);
			} elseif ($compared == "!="  && $compared2 == "like" || $compared == "!="  && $compared2 == "not_like") {
				$this->db->where($field.'!=', $valued);
				$this->db->$compared2($field2, $valued2);
        	}
			 	if (!empty($sortby)) {
				$this->db->order_by($sortby,$orderby);
				}	
			$query = $this->db->get('tblwetland');
        } else {

        	$this->db->join('tbllocregion', 'tblwetland.regionid = tbllocregion.id','left');
			$this->db->join('tbllocprovince', 'tblwetland.provinceid = tbllocprovince.id_p','left');
			$this->db->join('tbllocmunicipality', 'tblwetland.municipalid = tbllocmunicipality.id_m','left');
			$this->db->join('tbllocbarangay', 'tblwetland.barangayid = tbllocbarangay.id_b','left');

			if ($compared == "like" && $compared2 == "like" || $compared == "not_like" && $compared2 == "like") {
				$this->db->$compared($field, $valued);	
			 	$this->db->or_like($field2, $valued2);
			} elseif ($compared == "like" && $compared2 == "not_like" || $compared == "not_like" && $compared2 == "not_like") {
				$this->db->$compared($field, $valued);	
				$this->db->or_not_like($field2, $valued2);
			} elseif($compared == "like" && $compared2 == "=" || $compared == "not_like" && $compared2 == "=") {
				$this->db->$compared($field, $valued);
			 	$this->db->or_where($field2, $valued2);
			} elseif($compared == "like" && $compared2 == "!=" || $compared == "not_like" && $compared2 == "!=") {
				$this->db->$compared($field, $valued);
			 	$this->db->or_where($field2.'!=', $valued2);
			} elseif($compared == "=" && $compared2 == "=") {
				$this->db->where($field, $valued);
			 	$this->db->or_where($field2, $valued2);
			} elseif($compared == "=" && $compared2 == "!=") {
				$this->db->where($field, $valued);
			 	$this->db->or_where($field2.'!=', $valued2);
			} elseif($compared == "=" && $compared2 == "like") {
				$this->db->where($field, $valued);
			 	$this->db->or_like($field2, $valued2);
			} elseif($compared == "=" && $compared2 == "not_like") {
				$this->db->where($field, $valued);
			 	$this->db->or_not_like($field2, $valued2);
			} elseif($compared == "!=" && $compared2 == "=") {
				$this->db->where($field.'!=', $valued);
			 	$this->db->or_where($field2, $valued2);
			} elseif($compared == "!=" && $compared2 == "!=") {
				$this->db->where($field.'!=', $valued);
			 	$this->db->or_where($field2.'!=', $valued2);
			} elseif($compared == "!=" && $compared2 == "like") {
				$this->db->where($field.'!=', $valued);
			 	$this->db->or_like($field2, $valued2);
			} elseif($compared == "!=" && $compared2 == "not_like") {
				$this->db->where($field.'!=', $valued);
			 	$this->db->or_not_like($field2, $valued2);
			}
			if (!empty($sortby)) {
				$this->db->order_by($sortby,$orderby);
				}	
			$query = $this->db->get('tblwetland');
        }
        
// =====================================================================================//
        

    	$result = array(
            "draw" => $draw,
            "recordsTotal" => $query->num_rows(),
            "recordsFiltered" => $query->num_rows()           
        );

		$counts = $query->num_rows();

		if ($counts == 0) { ?>
			<tr>
				<td colspan="5" style="text-align: center">No record found</td>
			</tr>

		<?php } else  {
			
			foreach($query->result() as $row){
            ?>
            <tr>
                <td><?php echo $row->wetlandname; ?></td>
                <td><?php echo $row->regionName; ?></td>
                <td><?php echo $row->provinceName; ?></td>
                <td><?php echo $row->municipalName; ?></td>
                <td><?php echo $row->barangayName; ?></td>               
            </tr>
            <?php
        	}
		}
		echo json_encode($result);
        exit();
           
    }


}