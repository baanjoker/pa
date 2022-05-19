<?php defined('BASEPATH') OR exit('No direct access script allowed!');

/**
 * 
 */
class waterfowl_report extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model([
			'report/waterfowl_report_model'
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
		$data['page_title'] = 'Waterfowl Generated Report';
		$data['setting'] = $this->setting_model->read();

		$data['filter_field'] = array(
		    NULL 								=> 	'Filtered Field',
		    'tblwetland.wetlandname'			=>	'Wetland Name',
		    'tbllocregion.regionName'    		=> 	'Region',
		    'tbllocprovince.provinceName'  		=> 	'Province',
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

		$data['content'] = $this->load->view('report/waterfowl_report',$data,TRUE);
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
        	$this->db->select("tblwetland.wetlandname,tbllocregion.regionName,tbllocprovince.provinceName,tbldateyear.year,tbldatemonth.month,GROUP_CONCAT(tblwspeciesgenus.scientificName_genus,CONCAT(' (', tblwaterfowlspecies.total,')') SEPARATOR '<br>') as species");
        	$this->db->join('tbllocregion', 'tblwaterfowl.regionid = tbllocregion.id','left');
		 	$this->db->join('tbllocprovince', 'tblwaterfowl.provinceid = tbllocprovince.id_p','left');
		 	$this->db->join('tblwetland', 'tblwaterfowl.wetlandid = tblwetland.id_wetland','left');
		 	$this->db->join('tbldateyear', 'tblwaterfowl.year_census = tbldateyear.id_year','left');
		 	$this->db->join('tbldatemonth', 'tblwaterfowl.month_census = tbldatemonth.id_month','left');
		 	$this->db->join('tblwaterfowlspecies', 'tblwaterfowl.randomcode = tblwaterfowlspecies.randomcode','left');
		 	$this->db->join('tblwspeciesgenus','tblwaterfowlspecies.species_id = tblwspeciesgenus.id_genus','left');			 	
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
				 	$this->db->group_by('tblwaterfowl.randomcode');
		      		$query = $this->db->get('tblwaterfowl');
        	} else {   
        	$this->db->select("tblwetland.wetlandname,tbllocregion.regionName,tbllocprovince.provinceName,tbldateyear.year,tbldatemonth.month,GROUP_CONCAT(tblwspeciesgenus.scientificName_genus,CONCAT(' (', tblwaterfowlspecies.total,')') SEPARATOR '<br>') as species");
        	$this->db->join('tbllocregion', 'tblwaterfowl.regionid = tbllocregion.id','left');
		 	$this->db->join('tbllocprovince', 'tblwaterfowl.provinceid = tbllocprovince.id_p','left');
		 	$this->db->join('tblwetland', 'tblwaterfowl.wetlandid = tblwetland.id_wetland','left');
		 	$this->db->join('tbldateyear', 'tblwaterfowl.year_census = tbldateyear.id_year','left');
		 	$this->db->join('tbldatemonth', 'tblwaterfowl.month_census = tbldatemonth.id_month','left');
		 	$this->db->join('tblwaterfowlspecies', 'tblwaterfowl.randomcode = tblwaterfowlspecies.randomcode','left');
		 	$this->db->join('tblwspeciesgenus','tblwaterfowlspecies.species_id = tblwspeciesgenus.id_genus','left');
		 	$this->db->order_by('tbllocregion.regionName','ASC');
		 	$this->db->order_by('tbllocprovince.provinceName','ASC');		 	
		 	$this->db->order_by('tblwetland.wetlandname','ASC');
		 	if (!empty($sortby)) {
				$this->db->order_by($sortby,$orderby);
			}
			$this->db->group_by('tblwaterfowl.randomcode');
      		$query = $this->db->get('tblwaterfowl');
        	}    
        } elseif ($andor1 == "And"){
			$this->db->select("tblwetland.wetlandname,tbllocregion.regionName,tbllocprovince.provinceName,tbldateyear.year,tbldatemonth.month,GROUP_CONCAT(tblwspeciesgenus.scientificName_genus,CONCAT(' (', tblwaterfowlspecies.total,')') SEPARATOR '<br>') as species");
			$this->db->join('tbllocregion', 'tblwaterfowl.regionid = tbllocregion.id','left');
		 	$this->db->join('tbllocprovince', 'tblwaterfowl.provinceid = tbllocprovince.id_p','left');
		 	$this->db->join('tblwetland', 'tblwaterfowl.wetlandid = tblwetland.id_wetland','left');
		 	$this->db->join('tbldateyear', 'tblwaterfowl.year_census = tbldateyear.id_year','left');
		 	$this->db->join('tbldatemonth', 'tblwaterfowl.month_census = tbldatemonth.id_month','left');
		 	$this->db->join('tblwaterfowlspecies', 'tblwaterfowl.randomcode = tblwaterfowlspecies.randomcode','left');
		 	$this->db->join('tblwspeciesgenus','tblwaterfowlspecies.species_id = tblwspeciesgenus.id_genus','left');
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
			$this->db->group_by('tblwaterfowl.randomcode');
			$query = $this->db->get('tblwaterfowl');
        } else {

        	$this->db->select("tblwetland.wetlandname,tbllocregion.regionName,tbllocprovince.provinceName,tbldateyear.year,tbldatemonth.month,GROUP_CONCAT(tblwspeciesgenus.scientificName_genus,CONCAT(' (', tblwaterfowlspecies.total,')') SEPARATOR '<br>') as species");
        	$this->db->join('tbllocregion', 'tblwaterfowl.regionid = tbllocregion.id','left');
		 	$this->db->join('tbllocprovince', 'tblwaterfowl.provinceid = tbllocprovince.id_p','left');
		 	$this->db->join('tblwetland', 'tblwaterfowl.wetlandid = tblwetland.id_wetland','left');
		 	$this->db->join('tbldateyear', 'tblwaterfowl.year_census = tbldateyear.id_year','left');
		 	$this->db->join('tbldatemonth', 'tblwaterfowl.month_census = tbldatemonth.id_month','left');
		 	$this->db->join('tblwaterfowlspecies', 'tblwaterfowl.randomcode = tblwaterfowlspecies.randomcode','left');
		 	$this->db->join('tblwspeciesgenus','tblwaterfowlspecies.species_id = tblwspeciesgenus.id_genus','left');
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
			$this->db->group_by('tblwaterfowl.randomcode');
			$query = $this->db->get('tblwaterfowl');
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
                <td><?php echo $row->month." ".$row->year; ?></td>  
                <td><?php echo $row->species?></td>
            </tr>
            <?php
        	}
		}
		echo json_encode($result);
        exit();
           
    }
}