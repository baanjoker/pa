<?php defined('BASEPATH') OR exit('No direct access script allowed!');
/**
 * 
 */
class waterfowl_report_model extends CI_Model
{
	
	private $water = 'tblwaterfowl';

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
		
		if (empty($andor1) && empty($andor2)) {

        	if (!empty($field) && !empty($compared) && !empty($valued) ) {
        	 		
		    $this->db->select("tblwetland.wetlandname,tbllocregion.regionName,tbllocprovince.provinceName,tbldateyear.year,tbldatemonth.month,GROUP_CONCAT(tblwspeciesgenus.scientificName_genus,CONCAT(' (', tblwaterfowlspecies.total,')') SEPARATOR '\n') as species");
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
		      		return $query->result();
        	} else {   

        	$this->db->select("tblwetland.wetlandname,tbllocregion.regionName,tbllocprovince.provinceName,tbldateyear.year,tbldatemonth.month,GROUP_CONCAT(tblwspeciesgenus.scientificName_genus,CONCAT(' (', tblwaterfowlspecies.total,')') SEPARATOR '\n') as species");
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
      		return $query->result();
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
			return $query->result();
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
		    return $query->result();
        }
    }

    public function query_search_individual($id_wf)
    {
    		$this->db->select("tblwetland.wetlandname,tbllocregion.regionName,tbllocprovince.provinceName,tbldateyear.year,tbldatemonth.month,GROUP_CONCAT(tblwspeciesgenus.scientificName_genus,CONCAT(' (', tblwaterfowlspecies.total,')') SEPARATOR '\n') as species");
        	$this->db->join('tbllocregion', 'tblwaterfowl.regionid = tbllocregion.id','left');
		 	$this->db->join('tbllocprovince', 'tblwaterfowl.provinceid = tbllocprovince.id_p','left');
		 	$this->db->join('tblwetland', 'tblwaterfowl.wetlandid = tblwetland.id_wetland','left');
		 	$this->db->join('tbldateyear', 'tblwaterfowl.year_census = tbldateyear.id_year','left');
		 	$this->db->join('tbldatemonth', 'tblwaterfowl.month_census = tbldatemonth.id_month','left');
		 	$this->db->join('tblwaterfowlspecies', 'tblwaterfowl.randomcode = tblwaterfowlspecies.randomcode','left');
		 	$this->db->join('tblwspeciesgenus','tblwaterfowlspecies.species_id = tblwspeciesgenus.id_genus','left');			
			$this->db->where('id_wf',$id_wf);
			$query = $this->db->get('tblwaterfowl');
		    return $query->result();
    }

}