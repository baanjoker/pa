<?php defined('BASEPATH') OR exit('No direct access script allowed!');

/**
 * 
 */
class wetland_report_model extends CI_Model
{
	private $wetland = 'tblwetland';
	
	public function region()
	{
		$result = $this->db->select("*")
			->from('tbllocregion')
			->get()
			->result();

			$list[''] = "SELECT REGION";
				if (!empty($result)) {
					foreach ($result as $value) {
						$list[$value->id] = strtoupper($value->regionName);
			}
			return $list;
		} else {
			return false;
		}
	}

	public function query_search($field,$compared,$valued,$andor1,$field2,$compared2,$valued2,$sortby,$orderby)
	{
		

					// $this->db->join('tbllocregion', 'tblwetland.regionid = tbllocregion.id','left');
				 // 	$this->db->join('tbllocprovince', 'tblwetland.provinceid = tbllocprovince.id_p','left');
				 // 	$this->db->join('tbllocmunicipality', 'tblwetland.municipalid = tbllocmunicipality.id_m','left');
				 // 	$this->db->join('tbllocbarangay', 'tblwetland.barangayid = tbllocbarangay.id_b','left');				 	
				 // 	$this->db->where($field,$valued);
		   //    		$query = $this->db->get('tblwetland');
		   //    		return $query->result();

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
		      		return $query->result();
        	} else {   

        	$this->db->join('tbllocregion', 'tblwetland.regionid = tbllocregion.id','left');
		 	$this->db->join('tbllocprovince', 'tblwetland.provinceid = tbllocprovince.id_p','left');
		 	$this->db->join('tbllocmunicipality', 'tblwetland.municipalid = tbllocmunicipality.id_m','left');
		 	$this->db->join('tbllocbarangay', 'tblwetland.barangayid = tbllocbarangay.id_b','left');
		 	// $this->db->where('wetlandname', '');	
		 	$this->db->order_by('tbllocregion.regionName','ASC');
		 	$this->db->order_by('tbllocprovince.provinceName','ASC');
		 	$this->db->order_by('tbllocmunicipality.municipalName','ASC');
		 	$this->db->order_by('wetlandname','ASC');
		 	if (!empty($sortby)) {
				$this->db->order_by($sortby,$orderby);
			}
      		$query = $this->db->get('tblwetland');
      		return $query->result();
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
			return $query->result();
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
		    return $query->result();
        }

    }

    public function query_search_individual($id_wetland)
    {
    		$this->db->join('tblwetlanddesc', 'tblwetland.wldescid = tblwetlanddesc.id_wdesc','left');
    		$this->db->join('tblwetlandtype', 'tblwetland.wltypeid = tblwetlandtype.id_wtype','left');
    		$this->db->join('tbllocregion', 'tblwetland.regionid = tbllocregion.id','left');
			$this->db->join('tbllocprovince', 'tblwetland.provinceid = tbllocprovince.id_p','left');
			$this->db->join('tbllocmunicipality', 'tblwetland.municipalid = tbllocmunicipality.id_m','left');
			$this->db->join('tbllocbarangay', 'tblwetland.barangayid = tbllocbarangay.id_b','left');
			$this->db->where('id_wetland',$id_wetland);
			$query = $this->db->get('tblwetland');
		    return $query->result();
    }
}