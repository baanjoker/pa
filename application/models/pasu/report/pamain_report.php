<?php defined('BASEPATH') OR exit('No direct script access allowed!');
/**
 * 
 */
class pamain_report extends CI_Model
{
	private $pamain = 'tblpamain';
	private $member = 'tblpambmember';
	private $location = 'tblpamainlocation';
	private $proclamation = 'tblpamainlegislation';
	private $biological = 'tblpamainbiological';
	private $project = 'tblpamainproject';
	private $image = 'tblpamainimageupload';
	private $attract = 'tblpaattraction';
	private $facility = 'tblpafacility';
	private $activity = 'tblpaecotourism';
	private $income = 'tblpavisitorsrate';
	private $pasu = 'tbluser';
	private $multiplezone = 'tblpamultiplezone';
	private $strictzone = 'tblstrictprotzone';
	private $tribe = 'tblsrpaoregister';
	private $agro = 'tblpaagroforestry';
	private $threats = 'tblpathreat';
	private $reference = 'tblpareference';
    private $fee_new = 'tblpaipaf';


    public function data_main($gencode)
    {
            $this->db->join('tblnip','tblpamain.nip_id = tblnip.id_nip','left');
            $this->db->join('tblnipsub','tblpamain.nipsub_id = tblnipsub.id_subnip','left');    
            $this->db->join('tblpacategory','tblpamain.pacategory_id = tblpacategory.id_cat','left');
            $this->db->join('tblpacareadesc','tblpamain.cpabi_id = tblpacareadesc.id_pac','left');
            $this->db->join('tblpatbzones','tblpamain.tbz_id = tblpatbzones.id_tbz','left');
            $this->db->join('tbliucncode','tblpamain.iucn_id = tbliucncode.id','left');
            $this->db->join('tbldatemonth','tblpamain.pamb_month = tbldatemonth.id_month','left');
            $this->db->join('tbldateyear','tblpamain.pamb_year = tbldateyear.id_year','left');
            $this->db->join('tblpamain_img','tblpamain.generatedcode = tblpamain_img.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query = $this->db->get($this->pamain);
            return $query->result();
    }

    public function query_apasu($gencode)
    {
            $this->db->select('*');         
            $this->db->join('tblpamain','tblpaapasuinfo.id_apasu = tblpamain.pasu_id','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query= $this->db->get('tblpaapasuinfo');
            return $query->result();
    }

    public function queryboundary($gencode){
        $query = $this->db->get($this->pamain);
        return $query->result();
    }


	public function query_search_individual($gencode)
    {
		 	$this->db->join('tblnip','tblpamain.nip_id = tblnip.id_nip','left');
		 	$this->db->join('tblnipsub','tblpamain.nipsub_id = tblnipsub.id_subnip','left');	
		 	$this->db->join('tblpacategory','tblpamain.pacategory_id = tblpacategory.id_cat','left');
			$this->db->join('tblpacareadesc','tblpamain.cpabi_id = tblpacareadesc.id_pac','left');
			$this->db->join('tblpatbzones','tblpamain.tbz_id = tblpatbzones.id_tbz','left');
			$this->db->join('tbliucncode','tblpamain.iucn_id = tbliucncode.id','left');
			$this->db->join('tbldatemonth','tblpamain.pamb_month = tbldatemonth.id_month','left');
			$this->db->join('tbldateyear','tblpamain.pamb_year = tbldateyear.id_year','left');
			$this->db->where('generatedcode',$gencode);
			$query = $this->db->get($this->pamain);
		    return $query->result();
    }

    public function paArea($gencode)
    {
    		$this->db->select('*');    		
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get($this->pamain);
		    return $query->result();
	}

		public function legalstatus2($gencode)
    {
    		$this->db->select('group_concat(nipDesc) as legal_status,nipsub_id,nipDesc');    
    		$this->db->join('tblnip','tblpamainlegislation.nip_id=tblnip.id_nip','left');    
    		// $this->db->join('tblnipsub','tblpamainlegislation.nipsub_id=tblnipsub.id_subnip','left');
			$this->db->where('generatedcode',$gencode);
			$this->db->group_by('legis_id');
			$query= $this->db->get('tblpamainlegislation');
		    return $query->result();
	}

	public function legalstatus($gencode)
    {
    		$this->db->select('group_concat(tbllegislation.LegisDesc," No. ", legis_no," (",tbldatemonth.month," ",date_year, ") ",nipDesc separator "\n ") as legis,
    						   group_concat(nipDesc," (",sub_nip_description,") ",tbllegislation.LegisDesc," No. ", legis_no," (",tbldatemonth.month," ",date_year, ")" separator "\n ") as nlegis,
    						   nipsub_id');    
    		$this->db->join('tblnip','tblpamainlegislation.nip_id=tblnip.id_nip','left');    
    		$this->db->join('tblnipsub','tblpamainlegislation.nipsub_id=tblnipsub.id_subnip','left');
    		$this->db->join('tbldatemonth','tblpamainlegislation.date_month = tbldatemonth.id_month ','left');   
    		$this->db->join('tbllegislation','tblpamainlegislation.legis_id = tbllegislation.id_legis ','left');
    		$this->db->join('tbldateyear','tblpamainlegislation.date_year = tbldateyear.year ','left');
			$this->db->where('generatedcode',$gencode);
			$this->db->order_by('LENGTH(date_year)','DESC');
        	$this->db->order_by('date_year','DESC');
			$query= $this->db->get('tblpamainlegislation');
		    return $query->result();
	}

	public function legalstatusNew($gencode)
    { 
    		$this->db->join('tblnip','tblpamainlegislation.nip_id=tblnip.id_nip','left');    
    		$this->db->join('tblnipsub','tblpamainlegislation.nipsub_id=tblnipsub.id_subnip','left');
    		$this->db->join('tbldatemonth','tblpamainlegislation.date_month = tbldatemonth.id_month ','left');   
    		$this->db->join('tbllegislation','tblpamainlegislation.legis_id = tbllegislation.id_legis ','left');
    		$this->db->join('tbldateyear','tblpamainlegislation.date_year = tbldateyear.year ','left');
    		$this->db->join('tblpacategory','tblpamainlegislation.pa_category_id = tblpacategory.id_cat ','left');
			$this->db->where('generatedcode',$gencode);
			$this->db->order_by('LENGTH(date_year)','DESC');
        	$this->db->order_by('date_year','DESC');
			$query= $this->db->get('tblpamainlegislation');
		    return $query->result();
	}

	public function legalstatusHistory($coded)
    { 
$this->db->join('tblnipsub','tblpamainlegislation_history.nipid_status = tblnipsub.id_subnip','LEFT');
        $this->db->join('tbllegislation','tblpamainlegislation_history.legal_basis_id = tbllegislation.id_legis','LEFT');
        $this->db->join('tbldatemonth','tblpamainlegislation_history.legal_basis_month = tbldatemonth.id_month','LEFT');
        $this->db->join('tblpacategory','tblpamainlegislation_history.nipid_category = tblpacategory.id_cat','LEFT');
        $this->db->where('legal_generatedcode',$coded);
        $query1 = $this->db->get('tblpamainlegislation_history');
        $result1 = $query1->result();

        return array_merge($result1);
	}

	public function paAreaTotal($gencode)
    {
    		$this->db->select('(terrestrial + marine_area) as total_area');    		
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get($this->pamain);
		    return $query->result();
	}
	
    public function query_pambmember($gencode)
    {
    		$this->db->join('tblpambmember','tblpamain.generatedcode = tblpambmember.generatedcode','left');
    		$this->db->join('tblsex','tblpambmember.sex = tblsex.id','left');
    		$this->db->join('tblpambmemberposition','tblpambmember.designation = tblpambmemberposition.id_memposition','left');
    		$this->db->order_by('tblpambmember.designation','ASC');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$this->db->order_by('LENGTH(id_memposition)');
        	$this->db->order_by('id_memposition');
			$query2 = $this->db->get($this->pamain);
		    return $query2->result();
    }

     public function query_tribe($gencode)
    {

    		$this->db->join('tblsrpaoregister','tblpamain.generatedcode = tblsrpaoregister.generatedcode','left');
    		$this->db->join('tblsex','tblsrpaoregister.tribe_gender = tblsex.id','left');
    		$this->db->join('tblsrpaotribe','tblsrpaoregister.tribe = tblsrpaotribe.id_tribe','left');
    		$this->db->join('tbldatemonth','tblsrpaoregister.tribe_month = tbldatemonth.id_month','left');
    		$this->db->join('tbldateyear','tblsrpaoregister.tribe_year = tbldateyear.id_year','left');

    		// $this->db->order_by('tblpambmember.designation','ASC');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query2 = $this->db->get($this->pamain);
		    return $query2->result();
		    
    }

    public function query_threatss($gencode)
    {
			$this->db->select('*');    		
			$this->db->join('tblpamain','tblpathreat.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get($this->threats);
		    return $query->result();		    
    }

    public function query_reference($gencode)
    {
			$this->db->select('*');    		
			$this->db->join('tblpamain','tblpareference.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get($this->reference);
		    return $query->result();
		    
    }
    
    public function query_pambmember_count($gencode)
    {
			$this->db->join('tblpamain','tblpambmember.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get($this->member);
		    return $query->num_rows();
	}

	public function query_pamblocation($gencode)
    {
    		$this->db->select('group_concat(distinct tbllocregion.regionName) as try1, 
    						   group_concat(tbllocbarangay.barangayName,", ",tbllocmunicipality.municipalName,", ",tbllocmunicipality.cong_dist,", ",tbllocprovince.provinceName separator "\n ") as try3,
    						   group_concat(tbllocbarangay.barangayName,", ",tbllocmunicipality.municipalName,", ",tbllocprovince.provinceName separator "\n ") as try2,barangayName,
    						   group_concat(tbllocmunicipality.municipalName,", ",tbllocprovince.provinceName separator "\n ") as municipalonly,barangayName');
    		$this->db->join('tbllocregion', 'tblpamainlocation.region_id = tbllocregion.id','left');
		 	$this->db->join('tbllocprovince', 'tblpamainlocation.province_id = tbllocprovince.id_p','left');
		 	$this->db->join('tbllocmunicipality', 'tblpamainlocation.municipal_id = tbllocmunicipality.id_m','left');
		 	$this->db->join('tbllocbarangay', 'tblpamainlocation.barangay_id = tbllocbarangay.id_b','left');
			$this->db->where('tblpamainlocation.generatedcode',$gencode);
			$this->db->group_by('generatedcode');
			$query= $this->db->get($this->location);
		    return $query->result();
	}

	public function query_pamblocationNew($gencode)
    {
    		$this->db->join('tbllocregion', 'tblpamainlocation.region_id = tbllocregion.id','left');
		 	$this->db->join('tbllocprovince', 'tblpamainlocation.province_id = tbllocprovince.id_p','left');
		 	$this->db->join('tbllocmunicipality', 'tblpamainlocation.municipal_id = tbllocmunicipality.id_m','left');
		 	$this->db->join('tbllocbarangay', 'tblpamainlocation.barangay_id = tbllocbarangay.id_b','left');
			$this->db->where('tblpamainlocation.generatedcode',$gencode);
			$this->db->order_by('region_id');
			$this->db->order_by('province_id');
			$this->db->order_by('municipal_id');
			$this->db->order_by('barangay_id');
			// $this->db->group_by('generatedcode');
			$query= $this->db->get($this->location);
		    return $query->result();
	}

	public function query_pamblocation_count($gencode)
    {
			$this->db->join('tblpamain','tblpamainlocation.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get($this->location);
		    return $query->num_rows();
	}

	public function query_pambproc($gencode)
    {
    		$this->db->select('SUM(tblpamainlegislation.legis_area) as total_area,SUM(tblpamainlegislation.buffer) as total_buffer');
    		$this->db->join('tbldatemonth','tblpamainlegislation.date_month = tbldatemonth.id_month ','left');
    		$this->db->join('tbllegislation','tblpamainlegislation.legis_id = tbllegislation.id_legis ','left');
			$this->db->join('tblpamain','tblpamainlegislation.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$this->db->group_by('tblpamainlegislation.generatedcode');
			$query= $this->db->get($this->proclamation);
		    return $query->result();
	}

	public function query_pambproc_combined($gencode)
    {
    		$this->db->select('group_concat( concat(tbllegislation.LegisDesc," No. ", legis_no," (",tbldatemonth.month," ",date_year, ")") separator "\n ") as try');
    		$this->db->join('tbldatemonth','tblpamainlegislation.date_month = tbldatemonth.id_month ','left');
    		$this->db->join('tbllegislation','tblpamainlegislation.legis_id = tbllegislation.id_legis ','left');
			$this->db->join('tblpamain','tblpamainlegislation.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamainlegislation.generatedcode',$gencode);
			$this->db->group_by('tblpamainlegislation.generatedcode');
			$query= $this->db->get($this->proclamation);
		    return $query->result();
	}

	public function query_pasu($gencode)
    {
    		$this->db->select('*');    		
			$this->db->join('tblpamain','tbluser.user_id = tblpamain.pasu_id','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get($this->pasu);
		    return $query->result();
	}

	public function count_pambproc($gencode)
    {
    		$this->db->select('COUNT id_palegis as total');
    		$this->db->where('generatedcode',$gencode);
    		$this->db->group_by('id_palegis');
			$query= $this->db->get($this->proclamation);
		    return $query->num_rows();
	}

	public function query_pambproc_count($gencode)
    {
    		$this->db->join('tbllegislation','tblpamainlegislation.legis_id = tbllegislation.id_legis','left');
			$this->db->join('tblpamain','tblpamainlegislation.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get($this->proclamation);
		    return $query->num_rows();
	}

	#####SELECT ONLY CRITICAL ENDANGERED SPECIES ##########
	// public function query_pambbiological($gencode)
 //    {
 //    		$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	//         $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	//         $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	//         $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	//         $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
 //    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
	// 		$this->db->join('tblpamain','tblpamainbiological.generatedcode = tblpamain.generatedcode','left');
	// 		$this->db->where('tblpamain.generatedcode',$gencode);
	// 		$this->db->where('IUCNCode','CR');
	// 		$this->db->where('tblwcategory.id',1);			
	// 		$query= $this->db->get($this->biological);
	// 	    return $query->result();
	// }

	public function queryFaunaLimitCR($gencode,$noofdisplaybio)
    {
    		$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
    		$this->db->join('tblpamainbiological_residency','tblwspeciesgenus.residency_status = tblpamainbiological_residency.id_residency','LEFT');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);			
			$this->db->where('IUCNCode','CR');
			$this->db->where('tblwcategory.id',1);

			if($noofdisplaybio!=''){
				$this->db->limit($noofdisplaybio);
		    }
			$query= $this->db->get($this->biological);
		    return $query->result();
	}

	public function queryFloraLimitCR($gencode,$noofdisplaybio)
    {
    		$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
    		$this->db->join('tblpamainbiological_residency','tblwspeciesgenus.residency_status = tblpamainbiological_residency.id_residency','LEFT');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);			
			$this->db->where('IUCNCode','CR');
			$this->db->where('tblwcategory.id',2);

			if($noofdisplaybio!=''){
				$this->db->limit($noofdisplaybio);
		    }
			$query= $this->db->get($this->biological);
		    return $query->result();
	}

	public function queryFloraFaunaLimitCR($gencode,$noofdisplaybio)
    {
    		$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
    		$this->db->join('tblpamainbiological_residency','tblwspeciesgenus.residency_status = tblpamainbiological_residency.id_residency','LEFT');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);			
			$this->db->where('IUCNCode','CR');
			// $this->db->where('tblwcategory.id',1);

			if($noofdisplaybio!=''){
				$this->db->limit($noofdisplaybio);
		    }
			$query= $this->db->get($this->biological);
		    return $query->result();
	}

	public function queryFaunaLimitDD($gencode,$noofdisplaybio)
    {
    		$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
    		$this->db->join('tblpamainbiological_residency','tblwspeciesgenus.residency_status = tblpamainbiological_residency.id_residency','LEFT');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);			
			$this->db->where('IUCNCode','DD');
			$this->db->where('tblwcategory.id',1);
			
			if($noofdisplaybio!=''){
				$this->db->limit($noofdisplaybio);
		    }
			$query= $this->db->get($this->biological);
		    return $query->result();
	}

	public function queryFloraLimitDD($gencode,$noofdisplaybio)
    {
    		$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
    		$this->db->join('tblpamainbiological_residency','tblwspeciesgenus.residency_status = tblpamainbiological_residency.id_residency','LEFT');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);			
			$this->db->where('IUCNCode','DD');
			$this->db->where('tblwcategory.id',2);
			
			if($noofdisplaybio!=''){
				$this->db->limit($noofdisplaybio);
		    }
			$query= $this->db->get($this->biological);
		    return $query->result();
	}

	public function queryFaunaLimitVUFAUNA($gencode,$noofdisplaybio)
    {
    		$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
    		$this->db->join('tblpamainbiological_residency','tblwspeciesgenus.residency_status = tblpamainbiological_residency.id_residency','LEFT');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);			
			$this->db->where('IUCNCode','VU');			
			$this->db->where('tblwcategory.id',1);
			if($noofdisplaybio!=''){
				$this->db->limit($noofdisplaybio);
		    }
			$query= $this->db->get($this->biological);
		    return $query->result();
	}

	public function queryFaunaLimitVUFLORA($gencode,$noofdisplaybio)
    {
    		$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
    		$this->db->join('tblpamainbiological_residency','tblwspeciesgenus.residency_status = tblpamainbiological_residency.id_residency','LEFT');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);			
			$this->db->where('IUCNCode','VU');			
			$this->db->where('tblwcategory.id',2);
			if($noofdisplaybio!=''){
				$this->db->limit($noofdisplaybio);
		    }
			$query= $this->db->get($this->biological);
		    return $query->result();
	}

	public function queryFaunaLimitEN($gencode,$noofdisplaybio)
    {
    		$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
    		$this->db->join('tblpamainbiological_residency','tblwspeciesgenus.residency_status = tblpamainbiological_residency.id_residency','LEFT');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);			
			$this->db->where('IUCNCode','EN');			
			$this->db->where('tblwcategory.id',1);
			if($noofdisplaybio!=''){
				$this->db->limit($noofdisplaybio);
		    }
			$query= $this->db->get($this->biological);
		    return $query->result();
	}

	public function queryFloraLimitEN($gencode,$noofdisplaybio)
    {
    		$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
    		$this->db->join('tblpamainbiological_residency','tblwspeciesgenus.residency_status = tblpamainbiological_residency.id_residency','LEFT');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);			
			$this->db->where('IUCNCode','EN');			
			$this->db->where('tblwcategory.id',2);
			if($noofdisplaybio!=''){
				$this->db->limit($noofdisplaybio);
		    }
			$query= $this->db->get($this->biological);
		    return $query->result();
	}

	public function queryFaunaLimitEW($gencode,$noofdisplaybio)
    {
    		$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
    		$this->db->join('tblpamainbiological_residency','tblwspeciesgenus.residency_status = tblpamainbiological_residency.id_residency','LEFT');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);			
			$this->db->where('IUCNCode','EW');			
			$this->db->where('tblwcategory.id',1);
			if($noofdisplaybio!=''){
				$this->db->limit($noofdisplaybio);
		    }
			$query= $this->db->get($this->biological);
		    return $query->result();
	}

	public function queryFloraLimitEW($gencode,$noofdisplaybio)
    {
    		$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
    		$this->db->join('tblpamainbiological_residency','tblwspeciesgenus.residency_status = tblpamainbiological_residency.id_residency','LEFT');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);			
			$this->db->where('IUCNCode','EW');			
			$this->db->where('tblwcategory.id',2);
			if($noofdisplaybio!=''){
				$this->db->limit($noofdisplaybio);
		    }
			$query= $this->db->get($this->biological);
		    return $query->result();
	}

	public function queryFaunaLimitEX($gencode,$noofdisplaybio)
    {
    		$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
    		$this->db->join('tblpamainbiological_residency','tblwspeciesgenus.residency_status = tblpamainbiological_residency.id_residency','LEFT');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);			
			$this->db->where('IUCNCode','EX');			
			$this->db->where('tblwcategory.id',1);
			if($noofdisplaybio!=''){
				$this->db->limit($noofdisplaybio);
		    }
			$query= $this->db->get($this->biological);
		    return $query->result();
	}

	public function queryFloraLimitEX($gencode,$noofdisplaybio)
    {
    		$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
    		$this->db->join('tblpamainbiological_residency','tblwspeciesgenus.residency_status = tblpamainbiological_residency.id_residency','LEFT');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);			
			$this->db->where('IUCNCode','EX');			
			$this->db->where('tblwcategory.id',2);
			if($noofdisplaybio!=''){
				$this->db->limit($noofdisplaybio);
		    }
			$query= $this->db->get($this->biological);
		    return $query->result();
	}

	public function queryFaunaLimitLC($gencode,$noofdisplaybio)
    {
    		$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
    		$this->db->join('tblpamainbiological_residency','tblwspeciesgenus.residency_status = tblpamainbiological_residency.id_residency','LEFT');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);			
			$this->db->where('IUCNCode','LC');			
			$this->db->where('tblwcategory.id',1);
			if($noofdisplaybio!=''){
				$this->db->limit($noofdisplaybio);
		    }
			$query= $this->db->get($this->biological);
		    return $query->result();
	}

	public function queryFloraLimitLC($gencode,$noofdisplaybio)
    {
    		$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
    		$this->db->join('tblpamainbiological_residency','tblwspeciesgenus.residency_status = tblpamainbiological_residency.id_residency','LEFT');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);			
			$this->db->where('IUCNCode','LC');			
			$this->db->where('tblwcategory.id',2);
			if($noofdisplaybio!=''){
				$this->db->limit($noofdisplaybio);
		    }
			$query= $this->db->get($this->biological);
		    return $query->result();
	}

	public function queryFaunaLimitNE($gencode,$noofdisplaybio)
    {
    		$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
    		$this->db->join('tblpamainbiological_residency','tblwspeciesgenus.residency_status = tblpamainbiological_residency.id_residency','LEFT');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);			
			$this->db->where('IUCNCode','NE');			
			$this->db->where('tblwcategory.id',1);
			if($noofdisplaybio!=''){
				$this->db->limit($noofdisplaybio);
		    }
			$query= $this->db->get($this->biological);
		    return $query->result();
	}

	public function queryFloraLimitNE($gencode,$noofdisplaybio)
    {
    		$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
    		$this->db->join('tblpamainbiological_residency','tblwspeciesgenus.residency_status = tblpamainbiological_residency.id_residency','LEFT');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);			
			$this->db->where('IUCNCode','NE');			
			$this->db->where('tblwcategory.id',2);
			if($noofdisplaybio!=''){
				$this->db->limit($noofdisplaybio);
		    }
			$query= $this->db->get($this->biological);
		    return $query->result();
	}

	public function queryFaunaLimitNT($gencode,$noofdisplaybio)
    {
    		$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
    		$this->db->join('tblpamainbiological_residency','tblwspeciesgenus.residency_status = tblpamainbiological_residency.id_residency','LEFT');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);			
			$this->db->where('IUCNCode','NT');			
			$this->db->where('tblwcategory.id',1);
			if($noofdisplaybio!=''){
				$this->db->limit($noofdisplaybio);
		    }
			$query= $this->db->get($this->biological);
		    return $query->result();
	}

	public function queryFloraLimitNT($gencode,$noofdisplaybio)
    {
    		$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
    		$this->db->join('tblpamainbiological_residency','tblwspeciesgenus.residency_status = tblpamainbiological_residency.id_residency','LEFT');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);			
			$this->db->where('IUCNCode','NT');			
			$this->db->where('tblwcategory.id',2);
			if($noofdisplaybio!=''){
				$this->db->limit($noofdisplaybio);
		    }
			$query= $this->db->get($this->biological);
		    return $query->result();
	}

	public function queryFaunaLimitOTS($gencode,$noofdisplaybio)
    {
    		$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
    		$this->db->join('tblpamainbiological_residency','tblwspeciesgenus.residency_status = tblpamainbiological_residency.id_residency','LEFT');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);			
			$this->db->where("(IUCNCode='OTS' OR status='0')");
			$this->db->where('tblwcategory.id',1);
			if($noofdisplaybio!=''){
				$this->db->limit($noofdisplaybio);
		    }
			$query= $this->db->get($this->biological);
		    return $query->result();
	}

	public function queryFloraLimitOTS($gencode,$noofdisplaybio)
    {
    		$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
    		$this->db->join('tblpamainbiological_residency','tblwspeciesgenus.residency_status = tblpamainbiological_residency.id_residency','LEFT');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);			
			$this->db->where("(IUCNCode='OTS' OR status='0')");
			$this->db->where('tblwcategory.id',2);
			if($noofdisplaybio!=''){
				$this->db->limit($noofdisplaybio);
		    }
			$query= $this->db->get($this->biological);
		    return $query->result();
	}

	public function query_pambbiological($gencode)
    {
    		$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
			// $this->db->join('tblpamain','tblpamainbiological.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);
			$this->db->where('IUCNCode','CR');
			$this->db->where('tblwcategory.id',1);
			// ->group_by('generatedcode');	
			$query= $this->db->get($this->biological);
		    return $query->result();
	}

	public function query_pambbiological_count($gencode)
    {
			$this->db->join('tblpamain','tblpamainbiological.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get($this->biological);
		    return $query->num_rows();
	}

	public function queryCountCRFuana($gencode)
    {
			$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
			// $this->db->join('tblpamain','tblpamainbiological.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);
			$this->db->where('IUCNCode','CR');
			$this->db->where('tblwcategory.id',1);
			$query= $this->db->get($this->biological);
		    return $query->num_rows();
	}

	public function queryCountCRFlora($gencode)
    {
			$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
			// $this->db->join('tblpamain','tblpamainbiological.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);
			$this->db->where('IUCNCode','CR');
			$this->db->where('tblwcategory.id',2);
			$query= $this->db->get($this->biological);
		    return $query->num_rows();
	}

	public function queryCountDDFauna($gencode)
    {
			$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
			// $this->db->join('tblpamain','tblpamainbiological.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);
			$this->db->where('IUCNCode','DD');
			$this->db->where('tblwcategory.id',1);
			$query= $this->db->get($this->biological);
		    return $query->num_rows();
	}

	public function queryCountDDFlora($gencode)
    {
			$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
			// $this->db->join('tblpamain','tblpamainbiological.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);
			$this->db->where('IUCNCode','DD');
			$this->db->where('tblwcategory.id',2);
			$query= $this->db->get($this->biological);
		    return $query->num_rows();
	}

	public function queryCountVUFAUNA($gencode)
    {
			$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
			// $this->db->join('tblpamain','tblpamainbiological.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);
			$this->db->where('IUCNCode','VU');
			$this->db->where('tblwcategory.id',1);
			$query= $this->db->get($this->biological);
		    return $query->num_rows();
	}

	public function queryCountVUFLORA($gencode)
    {
			$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
			// $this->db->join('tblpamain','tblpamainbiological.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);
			$this->db->where('IUCNCode','VU');
			$this->db->where('tblwcategory.id',2);
			$query= $this->db->get($this->biological);
		    return $query->num_rows();
	}

	public function queryCountEN($gencode)
    {
			$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
			// $this->db->join('tblpamain','tblpamainbiological.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);
			$this->db->where('IUCNCode','EN');
			$this->db->where('tblwcategory.id',1);
			$query= $this->db->get($this->biological);
		    return $query->num_rows();
	}

	public function queryCountENFlora($gencode)
    {
			$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
			// $this->db->join('tblpamain','tblpamainbiological.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);
			$this->db->where('IUCNCode','EN');
			$this->db->where('tblwcategory.id',2);			
			$query= $this->db->get($this->biological);
		    return $query->num_rows();
	}

	public function queryCountEWFauna($gencode)
    {
			$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
			// $this->db->join('tblpamain','tblpamainbiological.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);
			$this->db->where('IUCNCode','EW');
			$this->db->where('tblwcategory.id',1);			
			$query= $this->db->get($this->biological);
		    return $query->num_rows();
	}

	public function queryCountEWFlora($gencode)
    {
			$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
			// $this->db->join('tblpamain','tblpamainbiological.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);
			$this->db->where('IUCNCode','EW');
			$this->db->where('tblwcategory.id',1);			
			$query= $this->db->get($this->biological);
		    return $query->num_rows();
	}

	public function queryCountEXFuana($gencode)
    {
			$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
			// $this->db->join('tblpamain','tblpamainbiological.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);
			$this->db->where('IUCNCode','EX');
			$this->db->where('tblwcategory.id',1);			
			$query= $this->db->get($this->biological);
		    return $query->num_rows();
	}

	public function queryCountEXFlora($gencode)
    {
			$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
			// $this->db->join('tblpamain','tblpamainbiological.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);
			$this->db->where('IUCNCode','EX');
			$this->db->where('tblwcategory.id',2);			
			$query= $this->db->get($this->biological);
		    return $query->num_rows();
	}

	public function queryCountLCFauna($gencode)
    {
			$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
			// $this->db->join('tblpamain','tblpamainbiological.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);
			$this->db->where('IUCNCode','LC');
			$this->db->where('tblwcategory.id',1);			
			$query= $this->db->get($this->biological);
		    return $query->num_rows();
	}

	public function queryCountLCFlora($gencode)
    {
			$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
			// $this->db->join('tblpamain','tblpamainbiological.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);
			$this->db->where('IUCNCode','LC');
			$this->db->where('tblwcategory.id',1);			
			$query= $this->db->get($this->biological);
		    return $query->num_rows();
	}

	public function queryCountNEFauna($gencode)
    {
			$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
			// $this->db->join('tblpamain','tblpamainbiological.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);
			$this->db->where('IUCNCode','NE');
			$this->db->where('tblwcategory.id',1);			
			$query= $this->db->get($this->biological);
		    return $query->num_rows();
	}

	public function queryCountNEFlora($gencode)
    {
			$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
			// $this->db->join('tblpamain','tblpamainbiological.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);
			$this->db->where('IUCNCode','NE');
			$this->db->where('tblwcategory.id',2);			
			$query= $this->db->get($this->biological);
		    return $query->num_rows();
	}

	public function queryCountNTFauna($gencode)
    {
			$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
			// $this->db->join('tblpamain','tblpamainbiological.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);
			$this->db->where('IUCNCode','NT');
			$this->db->where('tblwcategory.id',1);			
			$query= $this->db->get($this->biological);
		    return $query->num_rows();
	}

	public function queryCountNTFlora($gencode)
    {
			$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
			// $this->db->join('tblpamain','tblpamainbiological.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);
			$this->db->where('IUCNCode','NT');
			$this->db->where('tblwcategory.id',2);			
			$query= $this->db->get($this->biological);
		    return $query->num_rows();
	}

	public function queryCountOTSFauna($gencode)
    {
			$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
			// $this->db->join('tblpamain','tblpamainbiological.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);
			// $this->db->where('IUCNCode','OTS');
			$this->db->where("(IUCNCode='OTS' OR status='0')");
			$this->db->where('tblwcategory.id',1);			
			$query= $this->db->get($this->biological);
		    return $query->num_rows();
	}

	public function queryCountOTSFlora($gencode)
    {
			$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
			// $this->db->join('tblpamain','tblpamainbiological.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);
			// $this->db->where('IUCNCode','OTS');
			$this->db->where("(IUCNCode='OTS' OR status='0')");
			$this->db->where('tblwcategory.id',2);			
			$query= $this->db->get($this->biological);
		    return $query->num_rows();
	}

	public function query_pambbiologicalflora($gencode)
    {
    		$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
			$this->db->join('tblpamain','tblpamainbiological.generatedcode = tblpamain.generatedcode','left');
			// $this->db->where('tblpamain.generatedcode',$gencode);
			// $this->db->where('IUCNCode','CR');
			$this->db->where('tblpamainbiological.generatedcode',$gencode);			
			$this->db->where('tblwcategory.id',2);			
			$query= $this->db->get($this->biological);
		    return $query->result();
	}

	public function query_pambbiologicalflora_count($gencode)
    {
			$this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
	        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
	        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
	        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
	        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
    		$this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
			$this->db->join('tblpamain','tblpamainbiological.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			// $this->db->where('IUCNCode','CR');
			$this->db->where('tblwcategory.id',2);			
			$query= $this->db->get($this->biological);
		    return $query->num_rows();
	}

	public function query_strictprot($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblstrictprotzone');
		    return $query->result();
	}

	public function query_SUMstrict($gencode)
    {
			$this->db->select('SUM(s_area) as total_strict');
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblstrictprotzone');
		    return $query->result();
	}

	public function query_SUMmultiple($gencode)
    {
			$this->db->select('SUM(area) as total_multi');
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpamultiplezone');
		    return $query->result();
	}

	public function query_multizone($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpamultiplezone');
		    return $query->result();
	}

	public function query_managementzone($gencode)
    {
			$this->db->where('generatedcode_mgnt',$gencode);
			$query= $this->db->get('tblpamanagementzone');
		    return $query->result();
	}

	public function query_managementplan($gencode)
    {
    		$this->db->join('tbldatemonth','tblpamanagementplan.mpMonth = tbldatemonth.id_month','left');			
			$this->db->join('tbldateyear','tblpamanagementplan.mpYear = tbldateyear.id_year','left');
			$this->db->join('tblpamanagementplanstatus','tblpamanagementplan.mpStatus = tblpamanagementplanstatus.id_mpstatus','left');
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpamanagementplan');
		    return $query->result();
	}

	public function query_ecomanagementplan($gencode)
    {
    		$this->db->join('tbldatemonth','tblpamanagementecotourim.ecotourism_plan_dateM = tbldatemonth.id_month','left');			
			$this->db->join('tbldateyear','tblpamanagementecotourim.ecotourism_plan_dateY = tbldateyear.id_year','left');
			$this->db->join('tblpamanagementplanstatus','tblpamanagementecotourim.ecotourism_status = tblpamanagementplanstatus.id_mpstatus','left');
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpamanagementecotourim');
		    return $query->result();
	}

	public function query_wetmanagementplan($gencode)
    {
    		$this->db->join('tbldatemonth','tblpamanagementwetland.wetland_plan_dateM = tbldatemonth.id_month','left');			
			$this->db->join('tbldateyear','tblpamanagementwetland.wetland_plan_dateY = tbldateyear.id_year','left');
			$this->db->join('tblpamanagementplanstatus','tblpamanagementwetland.wetland_plan_status = tblpamanagementplanstatus.id_mpstatus','left');
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpamanagementwetland');
		    return $query->result();
	}

	public function query_cavemanagementplan($gencode)
    {
    		$this->db->join('tbldatemonth','tblpamanagementcaves.cave_plan_dateM = tbldatemonth.id_month','left');			
			$this->db->join('tbldateyear','tblpamanagementcaves.cave_plan_dateY = tbldateyear.id_year','left');
			$this->db->join('tblpamanagementplanstatus','tblpamanagementcaves.cave_plan_status = tblpamanagementplanstatus.id_mpstatus','left');
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpamanagementcaves');
		    return $query->result();
	}

	public function query_othermanagementplan($gencode)
    {
    		$this->db->join('tbldatemonth','tblpamanagementothers.other_plan_dateM = tbldatemonth.id_month','left');			
			$this->db->join('tbldateyear','tblpamanagementothers.other_plan_dateY = tbldateyear.id_year','left');
			$this->db->join('tblpamanagementplanstatus','tblpamanagementothers.other_plan_status = tblpamanagementplanstatus.id_mpstatus','left');
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpamanagementothers');
		    return $query->result();
	}

	public function count_managementzone($gencode)
    {
			$this->db->where('generatedcode_mgnt',$gencode);
			$query= $this->db->get('tblpamanagementzone');
		    return $query->num_rows();
	}

	public function count_managementplan($gencode)
    {
   
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpamanagementplan');
		    return $query->num_rows();
	}

	public function count_ecomanagementplan($gencode)
    {
   
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpamanagementecotourim');
		    return $query->num_rows();
	}

	public function count_wetmanagementplan($gencode)
    {
   
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpamanagementwetland');
		    return $query->num_rows();
	}

	public function count_cavemanagementplan($gencode)
    {   
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpamanagementcaves');
		    return $query->num_rows();
	}

	public function count_othermanagementplan($gencode)
    {   
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpamanagementothers');
		    return $query->num_rows();
	}

	public function query_count_managementzone($gencode)
    {
			$this->db->where('generatedcode_mgnt',$gencode);
			$query= $this->db->get('tblpamanagementzone');
		    return $query->num_rows();
	}

	public function query_count_multi($gencode)
    {
			$this->db->join('tblpamain','tblpamultiplezone.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpamultiplezone');
		    return $query->num_rows();
	}

	public function query_tribe_count($gencode)
    {
			$this->db->join('tblpamain','tblsrpaoregister.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get($this->tribe);
		    return $query->num_rows();
	}

	public function query_pambproject($gencode)
    {
			$this->db->join('tblpamain','tblpamainproject.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get($this->project);
		    return $query->result();
	}

	public function query_pambproject_count($gencode)
    {
			$this->db->join('tblpamain','tblpamainproject.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get($this->project);
		    return $query->num_rows();
	}

	public function query_pambimage($gencode)
    {
			$this->db->join('tblpamain','tblpamainimageupload.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get($this->image);
		    return $query->result();
	}

	public function query_attractimage($gencode)
    {
			$this->db->join('tblpamain','tblpaattraction.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get($this->attract);
		    return $query->result();
	}

	public function query_facilityimage($gencode)
    {
			$this->db->join('tblpamain','tblpafacility.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get($this->facility);
		    return $query->result();
	}

	public function query_activityimage($gencode)
    {
			$this->db->join('tblpamain','tblpaecotourism.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get($this->activity);
		    return $query->result();
	}

	public function query_agroimage($gencode)
    {
			$this->db->join('tblpamain','tblpaagroforestry.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get($this->agro);
		    return $query->result();
	}

	public function query_slope($gencode)
    {
			// $this->db->join('tblpamain','tblpatopology.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpatopology');
		    return $query->result();
	}

	public function query_slope_details($gencode)
    {
			$this->db->join('tblpamain','tblpatopology_description.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpatopology_description');
		    return $query->result();
	}

	public function query_soil_details($gencode)
    {
			$this->db->join('tblpamain','tblpageology_details.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpageology_details');
		    return $query->result();
	}

	public function query_count_slope($gencode)
    {
			$this->db->join('tblpamain','tblpatopology.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpatopology');
		    return $query->num_rows();
	}

	public function query_count_slopeImage($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpatopology');
		    return $query->num_rows();
	}

	public function query_soil($gencode)
    {
			$this->db->join('tblpamain','tblpageology.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpageology');
		    return $query->result();
	}

	public function query_count_soil($gencode)
    {
			// $this->db->join('tblpamain','tblpageology.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpageology');
		    return $query->num_rows();
	}

	public function query_rock($gencode)
    {
			$this->db->join('tblpamain','tblparock.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblparock');
		    return $query->result();
	}

	public function query_count_rock($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblparock');
		    return $query->num_rows();
	}

	public function query_hydro($gencode)
    {
			$this->db->join('tblpamain','tblpahydrology.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpahydrology');
		    return $query->result();
	}

	public function query_count_hydro($gencode)
    {
			$this->db->join('tblpamain','tblpahydrology.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpahydrology');
		    return $query->num_rows();
	}

	public function query_count_existinglanduse($gencode)
    {
			$this->db->join('tblpamain','tblpalanduse_details.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpalanduse_details');
		    return $query->num_rows();
	}

	public function query_count_vegetative($gencode)
    {
			$this->db->join('tblpamain','tblpavegetative_details.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpavegetative_details');
		    return $query->num_rows();
	}

	public function query_rock_details($gencode)
    {
			$this->db->join('tblpamain','tblparock_details.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblparock_details');
		    return $query->result();
	}

	public function query_hydro_details($gencode)
    {
			$this->db->join('tblpamain','tblpahydrology_details.generatedcode = tblpamain.generatedcode','left');
			$this->db->join('tblhydrology_waterclass','tblpahydrology_details.hydro_class = tblhydrology_waterclass.id_waterClass','left');
			$this->db->join('tblhydrology_waterclass_sub','tblpahydrology_details.hydroSub_class = tblhydrology_waterclass_sub.id_waterClassSub','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpahydrology_details');
		    return $query->result();
	}

	public function query_climate_details($gencode)
    {
			$this->db->join('tblpamain','tblpaclimate_details.generatedcode = tblpamain.generatedcode','left');
			$this->db->join('tblclimate_type','tblpaclimate_details.climate_type = tblclimate_type.id_climates','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpaclimate_details');
		    return $query->result();
	}

	public function query_exlanduse_details($gencode)
    {
			$this->db->join('tblpamain','tblpalanduse_details.generatedcode = tblpamain.generatedcode','left');
			$this->db->join('tblpaexisting_landuse_sub','tblpalanduse_details.landuse_sub = tblpaexisting_landuse_sub.id_landuse_sub','left');
			$this->db->join('tblpaexisting_landuse','tblpalanduse_details.landuse_type = tblpaexisting_landuse.id_landuses','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpalanduse_details');
		    return $query->result();
	}

	public function query_totalexistinglandused($gencode)
    {
			$this->db->select('SUM(landuse_area) as gtexistinglanduse');
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpalanduse_details');
		    return $query->result();
	}

	public function query_forestfors_details($gencode)
    {
			$this->db->select('tblpamain.generatedcode, tblpaforestformation_details.forest_formation as ff_name, tblpaforestformation_details.forest_formation_area as ff_area,ff_details');    	
			$this->db->join('tblpaforestformationtype','tblpaforestformation_details.forest_formation = tblpaforestformationtype.id_fftype','left');
			$this->db->join('tblpamain','tblpaforestformation_details.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpaforestformation_details');
		    return $query->result();
	}

	public function query_GT_forfor($gencode)
    {
    	$this->db->select('SUM(forest_formation_area) as forGT');
    	$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpaforestformation_details');
		    return $query->result();
	}

	public function query_iw_details($gencode)
    { 	
			$this->db->join('tblpamain','tblpainlandwetland.generatedcode = tblpamain.generatedcode','left');
			$this->db->join('tbllocprovince','tblpainlandwetland.iw_province = tbllocprovince.id_p','left');
			$this->db->join('tbllocmunicipality','tblpainlandwetland.iw_municipal = tbllocmunicipality.id_m','left');
			$this->db->join('tblwetlandtypes','tblpainlandwetland.wetland_type = tblwetlandtypes.id_wetland','left');
			$this->db->join('tblhydrology_waterclass','tblpainlandwetland.waterbody_classID = tblhydrology_waterclass.id_waterClass','left');
			$this->db->join('tblhydrology_waterclass_sub','tblpainlandwetland.waterbodysub_classID = tblhydrology_waterclass_sub.id_waterClassSub','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpainlandwetland');
		    return $query->result();
	}

	public function query_humaniw_details($gencode)
    { 	
			$this->db->join('tblpamain','tblpainlandhumanmade.generatedcode = tblpamain.generatedcode','left');
			$this->db->join('tbllocprovince','tblpainlandhumanmade.hiw_province = tbllocprovince.id_p','left');
			$this->db->join('tbllocmunicipality','tblpainlandhumanmade.hiw_municipal = tbllocmunicipality.id_m','left');
			$this->db->join('tblwetlandtypes','tblpainlandhumanmade.hwetland_type = tblwetlandtypes.id_wetland','left');
			$this->db->join('tblhydrology_waterclass','tblpainlandhumanmade.hwaterbody_classID = tblhydrology_waterclass.id_waterClass','left');
			$this->db->join('tblhydrology_waterclass_sub','tblpainlandhumanmade.hwaterbodysub_classID = tblhydrology_waterclass_sub.id_waterClassSub','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpainlandhumanmade');
		    return $query->result();
	}

	public function query_cave_details($gencode)
    { 	
			$this->db->join('tblpamain','tblpacaves.generatedcode = tblpamain.generatedcode','left');
			$this->db->join('tbllocprovince','tblpacaves.cave_province = tbllocprovince.id_p','left');
			$this->db->join('tbllocmunicipality','tblpacaves.cave_municipal = tbllocmunicipality.id_m','left');
			$this->db->join('tbllocbarangay','tblpacaves.cave_barangay = tbllocbarangay.id_b','left');
			$this->db->join('tblcaveclassification','tblpacaves.land_status = tblcaveclassification.id_cave_class','left');
			$this->db->join('tblcaveclassificationsub','tblpacaves.cave_class_sub = tblcaveclassificationsub.id_sub_class','left');
			$this->db->join('tblpacavestatus','tblpacaves.cave_status = tblpacavestatus.id_cave_status','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpacaves');
		    return $query->result();
	}

	public function query_coral_details($gencode)
    { 	
			// $this->db->select('group_concat(coral_remarks," area covered ",coral_has," has." separator "<br> ") as coral_details');    	
			$this->db->join('tblpacoastalcoralhcc','tblpacoastalcoral_details.hcc_category = tblpacoastalcoralhcc.id_coral_hcc','left');			
			$this->db->join('tbltblpacoastalcoraltaus','tblpacoastalcoral_details.taus_category = tbltblpacoastalcoraltaus.id_taus','left');			
			$this->db->join('tbldatemonth','tblpacoastalcoral_details.coral_date_month = tbldatemonth.id_month','left');			
			$this->db->join('tbldateyear','tblpacoastalcoral_details.coral_date_year = tbldateyear.id_year','left');			
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpacoastalcoral_details');
		    return $query->result();
	}

	public function query_coral_SUM($gencode)
    { 	
			$this->db->select('SUM(coral_has) as coral_sum_area');    	
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpacoastalcoral_details');
		    return $query->result();
	}

	public function query_seagrass_SUM($gencode)
    { 	
			$this->db->select('SUM(seagrass_area) as seagrass_sum_area');    	
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpacoastalseagrass_details');
		    return $query->result();
	}

	public function query_mangrove_SUM($gencode)
    { 	
			$this->db->select('SUM(mangrove_area) as mangrove_sum_area');    	
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpacoastalmangrove_details');
		    return $query->result();
	}

	public function query_seagrass_details($gencode)
    { 	
			// $this->db->select('group_concat(seagrass_remarks," area covered ",seagrass_area," has." separator "<br> ") as seagrass_details');    	
			$this->db->join('tblpamain','tblpacoastalseagrass_details.generatedcode = tblpamain.generatedcode','left');			
			$this->db->join('tblpacoastalseagrasscondition','tblpacoastalseagrass_details.seagrass_conditions = tblpacoastalseagrasscondition.id_seagrass_condition','left');			
			$this->db->join('tblseagrassdiversity','tblpacoastalseagrass_details.diversity_index = tblseagrassdiversity.id_diversity_index','left');		
			$this->db->join('tbldatemonth','tblpacoastalseagrass_details.seagrass_date_month = tbldatemonth.id_month','left');			
			$this->db->join('tbldateyear','tblpacoastalseagrass_details.seagrass_date_year = tbldateyear.id_year','left');		
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpacoastalseagrass_details');
		    return $query->result();
	}

	public function query_mangrove_details($gencode)
    { 	
			// $this->db->select('group_concat(mangrove_remarks," area covered ",mangrove_area," has." separator "<br> ") as mangrove_details');    	
			$this->db->join('tblpamain','tblpacoastalmangrove_details.generatedcode = tblpamain.generatedcode','left');			
			$this->db->join('tblpacoastalmangrovecondition','tblpacoastalmangrove_details.mangrove_condition = tblpacoastalmangrovecondition.id_mangrove_condition','left');			
			$this->db->join('tblpacoastalmangrove_diversity','tblpacoastalmangrove_details.divert_cat = tblpacoastalmangrove_diversity.id_mangrove_diversity','left');			
			$this->db->join('tblpacoastalmangrove_height','tblpacoastalmangrove_details.height_cat = tblpacoastalmangrove_height.id_mangrove_height','left');			
			$this->db->join('tblpacoastalmangrove_observation','tblpacoastalmangrove_details.observe_cat = tblpacoastalmangrove_observation.id_observation','left');			
			$this->db->join('tblpacoastalmangrove_regen','tblpacoastalmangrove_details.regen_cat = tblpacoastalmangrove_regen.id_regen','left');			
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpacoastalmangrove_details');
		    return $query->result();
	}

	public function query_coralspecies_details($gencode)
    { 	
			// $this->db->select('group_concat(coral_species_name separator ", ") as coralspeciesd');
			// $this->db->join('tblpamain','tblpacoastalcoralspeciesdata.generatedcode = tblpamain.generatedcode','left');	
			$this->db->join('tblpacoastalcoralspecies','tblpacoastalcoralspeciesdata.coralspecies_id = tblpacoastalcoralspecies.id_coral_species','left');			
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpacoastalcoralspeciesdata');
		    return $query->result();
	}

	public function query_seagrasspecies_details($gencode)
    { 	
			// $this->db->select('group_concat(seagrassName separator ", ") as seagrassspecies');
			$this->db->join('tblpamain','tblpacoastalseagrassspeciesdata.generatedcode = tblpamain.generatedcode','left');	
			$this->db->join('tblpacoastalseagrassspecies','tblpacoastalseagrassspeciesdata.seagrass_species_name = tblpacoastalseagrassspecies.id_seagrassSpecies','left');			
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpacoastalseagrassspeciesdata');
		    return $query->result();
	}

	public function query_mangrovepecies_details($gencode)
    { 	
			// $this->db->select('group_concat(mangrove_scientific_name separator ", ") as mangrovespeciest');
			$this->db->join('tblpamain','tblpacoastalmangrovespeciesdata.generatedcode = tblpamain.generatedcode','left');	
			$this->db->join('tblpacoastalmangrovespecies','tblpacoastalmangrovespeciesdata.mangrove_species = tblpacoastalmangrovespecies.id_mangrove_species','left');			
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpacoastalmangrovespeciesdata');
		    return $query->result();
	}

	public function getAllImageHydrologyWaterParam($code2){
        $this->db->select('group_concat("Water Classification : ",id_waterClassDesc,"\nSub Water Classification : ",waterClass,"\nParameter : ",hydro_parameter,"\nStatus : ",status_waterquality,"\nYear assessed : ",hydro_date_assessed separator "\n\n ") as hydrodet,id_hydrology_para');        
        $this->db->join('tblhydrology_waterclass','tblpahydrology_para_details.hydro_parawclass_id = tblhydrology_waterclass.id_waterClass','left')
                 ->join('tblhydrology_waterclass_sub','tblpahydrology_para_details.hydro_parasubwclass_id = tblhydrology_waterclass_sub.id_waterClassSub','left')
                 ->join('tblhydrology_waterstatus','tblpahydrology_para_details.hydro_para_status = tblhydrology_waterstatus.id_waterquality_status','left')
                 ->where('tblpahydrology_para_details.hydro_code',$code2);
        $query = $this->db->get('tblpahydrology_para_details');
        return $query->result();
    }

	public function query_fishpecies_details($gencode)
    { 	
			$this->db->join('tblcoastalmarine_fishspecies','tblcoastalmarinefish.fishspecies_id = tblcoastalmarine_fishspecies.id_fishspecies','left');			
			$this->db->join('tblpacoastalfishdiversity','tblcoastalmarinefish.fish_diversity = tblpacoastalfishdiversity.id_fish_diversity','left');			
			$this->db->join('tblpacoastalfishdensity','tblcoastalmarinefish.fishdensity = tblpacoastalfishdensity.id_fish_density','left');			
			$this->db->join('tblpacoastalfishbiomass','tblcoastalmarinefish.fishbiomass = tblpacoastalfishbiomass.id_fishbiomass','left');			
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblcoastalmarinefish');
		    return $query->result();
	}


	public function query_vege_details($gencode)
    {
        	$this->db->join('tbllandcover','tblpavegetative_details.vegetative_desc=tbllandcover.id_landcovertype','LEFT');
			$this->db->join('tblpamain','tblpavegetative_details.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpavegetative_details');
		    return $query->result();
	}

	public function query_vege_GT($gencode)
    {        	
			$this->db->select('SUM(vegetative_area) as GTvegetative');
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpavegetative_details');
		    return $query->result();
	}

	public function query_landslide_details($gencode)
    {
			$this->db->join('tblpamain','tblpahazardlandslide_details.generatedcode = tblpamain.generatedcode','left');
			$this->db->join('tblpamgblegendlandslide','tblpahazardlandslide_details.landslide_desc = tblpamgblegendlandslide.id_legend_landslide','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpahazardlandslide_details');
		    return $query->result();
	}

	public function query_landslide_GT($gencode)
    {
    		$this->db->select('SUM(landslide_area) as GTlsa,landslide_legend,landslide_area');
			$this->db->join('tblpamgblegendlandslide','tblpahazardlandslide_details.landslide_desc = tblpamgblegendlandslide.id_legend_landslide','left');
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpahazardlandslide_details');
		    return $query->result();
	}

	public function query_flooding_GT($gencode)
    {
    		$this->db->select('SUM(flooding_area) as GTflood,flooding_desc,flooding_area');
			$this->db->join('tblpamgblegendflooding','tblpahazardflooding_details.flooding_desc = tblpamgblegendflooding.id_legend_flooding','left');
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpahazardflooding_details');
		    return $query->result();
	}

	public function query_flooding_details($gencode)
    {
			$this->db->join('tblpamgblegendflooding','tblpahazardflooding_details.flooding_desc = tblpamgblegendflooding.id_legend_flooding','left');
			$this->db->join('tblpamain','tblpahazardflooding_details.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpahazardflooding_details');
		    return $query->result();
	}

	public function query_sealevel_details($gencode)
    {
			$this->db->join('tblpamain','tblpahazardsealevelrise.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpahazardsealevelrise');
		    return $query->result();
	}

	public function query_tsunami_details($gencode)
    {
			// $this->db->join('tblpamain','tblpahazardtsunami.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpahazardtsunami.generatedcode',$gencode);
			$query= $this->db->get('tblpahazardtsunami');
		    return $query->result();
	}

	public function query_fault_details($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpahazardfire');
		    return $query->result();
	}

	public function query_othergeohazard_details($gencode)
    {
			// $this->db->join('tblpamain','tblpageohazard.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpageohazard');
		    return $query->result();
	}

	public function query_climate($gencode)
    {
			$this->db->join('tblpamain','tblpaclimate.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpaclimate');
		    return $query->result();
	}

	public function query_exlanduse($gencode)
    {
			$this->db->join('tblpamain','tblpalanduse.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpalanduse');
		    return $query->result();
	}

	public function query_riverbasin($gencode)
    {
			$this->db->join('tblriverbasin_list','tblpamainwatershed.riverbasin_name=tblriverbasin_list.id_riverbasin','LEFT');
        	$this->db->join('tblriverbasin__watershed','tblpamainwatershed.watershed_name=tblriverbasin__watershed.id_watersheds','LEFT');
        	$this->db->where('generatedcode',$gencode);
        	$query = $this->db->get('tblpamainwatershed');
        	return $query->result();
	}

	public function query_count_forfor($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpaforestformation');
		    return $query->num_rows();
	}

	public function query_count_forforImage($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpaforestformation');
		    return $query->num_rows();
	}

	public function query_count_forfordetails($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpaforestformation_details');
		    return $query->num_rows();
	}

	public function query_count_inwetImage($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpainlandwetland_map');
		    return $query->num_rows();
	}

	public function query_count_inwetdetails($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpainlandwetland');
		    return $query->num_rows();
	}

	public function query_count_cavesimage($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpacavemap');
		    return $query->num_rows();
	}

	public function query_count_cavesdetails($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpacaves');
		    return $query->num_rows();
	}

	public function query_count_demograph($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblseamsdemographic');
		    return $query->num_rows();
	}
	public function getAllbarangayseamsG($codegens){ 
        $this->db->join('tbllocregion','tblseamsdemographic.seams_region = tbllocregion.id','left');        
        $this->db->join('tbllocprovince','tblseamsdemographic.seams_province = tbllocprovince.id_p','left');        
        $this->db->join('tbllocmunicipality','tblseamsdemographic.seams_municipality = tbllocmunicipality.id_m','left');        
        $this->db->join('tbllocbarangay','tblseamsdemographic.seams_barangay = tbllocbarangay.id_b','left');                 
        $this->db->where('generatedcode',$codegens);
        $this->db->group_by('tblseamsdemographic.seams_barangay');
        $query = $this->db->get('tblseamsdemographic');
        return $query->result();
    }

    public function SumDemoPerBrgy($codegens)
    {
        $this->db->select('SUM(seams_male) as total_male, SUM(seams_female) as total_female,SUM(seams_male + seams_female) as GTseamss,id_b')
        ->join('tbllocbarangay','tblseamsdemographic.seams_barangay = tbllocbarangay.id_b','left')
        ->where('generatedcode',$codegens)
        ->group_by('tblseamsdemographic.seams_barangay');
		$query = $this->db->get('tblseamsdemographic');
        return $query->result();
    }

    public function GrandTotalDemoSeams($codegens)
    {
    	$this->db->select('SUM(seams_male) as total_male, SUM(seams_female) as total_female,SUM(seams_male + seams_female) as GTseamss,id_b')
        ->join('tbllocbarangay','tblseamsdemographic.seams_barangay = tbllocbarangay.id_b','left')
        ->where('generatedcode',$codegens);
		$query = $this->db->get('tblseamsdemographic');
        return $query->result();
    }

    public function getAllbarangayseamsTenuredMIgrant($codegens){ 
        $this->db->join('tbllocregion','tblseamsdemographic.seams_region = tbllocregion.id','left');        
        $this->db->join('tbllocprovince','tblseamsdemographic.seams_province = tbllocprovince.id_p','left');        
        $this->db->join('tbllocmunicipality','tblseamsdemographic.seams_municipality = tbllocmunicipality.id_m','left');        
        $this->db->join('tbllocbarangay','tblseamsdemographic.seams_barangay = tbllocbarangay.id_b','left');                 
        $this->db->where('generatedcode',$codegens);
        $this->db->where('tenured_migrant',1);
        $this->db->group_by('tblseamsdemographic.seams_barangay');
        $query = $this->db->get('tblseamsdemographic');
        return $query->result();
    }

    public function SumDemoPerBrgyTenureMigrant($codegens)
    {
        $this->db->select('SUM(seams_male) as total_male, SUM(seams_female) as total_female,SUM(seams_male + seams_female) as GTseamss,id_b')
        ->join('tbllocbarangay','tblseamsdemographic.seams_barangay = tbllocbarangay.id_b','left')
        ->where('generatedcode',$codegens)
        ->where('tenured_migrant',1)
        ->group_by('tblseamsdemographic.seams_barangay');
		$query = $this->db->get('tblseamsdemographic');
        return $query->result();
    }

    public function GrandTotalDemoSeamsTenureMigrant($codegens)
    {
    	$this->db->select('SUM(seams_male) as total_male, SUM(seams_female) as total_female,SUM(seams_male + seams_female) as GTseamss,id_b')
        ->join('tbllocbarangay','tblseamsdemographic.seams_barangay = tbllocbarangay.id_b','left')
        ->where('tenured_migrant',1)
        ->where('generatedcode',$codegens);
		$query = $this->db->get('tblseamsdemographic');
        return $query->result();
    }

    public function getAlliccip($gencode){ 
    	$this->db->select('DISTINCT(tribe_name)as tribe,ipsiccs');
        $this->db->join('tblsrpaotribe','tblseamsdemographic.ipsiccs = tblsrpaotribe.id_tribe','left');        
        $this->db->where('generatedcode',$gencode);
        $this->db->group_by('tribe_name');
        $this->db->order_by('ipsiccs','ASC');
        $query = $this->db->get('tblseamsdemographic');
        return $query->result();
    }

    public function getAlliccipMigrant($gencode){ 
    	$this->db->select('SUM(seams_male) as total_male, SUM(seams_female) as total_female,SUM(seams_male + seams_female) as GTseamss,ipsiccs');
        $this->db->join('tblsrpaotribe','tblseamsdemographic.ipsiccs = tblsrpaotribe.id_tribe','left');        
        $this->db->where('generatedcode',$gencode);
        $this->db->group_by('tribe_name');
        $this->db->order_by('ipsiccs','ASC');
        $query = $this->db->get('tblseamsdemographic');
        return $query->result();
    }

    public function GrandTotalgetAlliccipMigrant($codegens)
    {
    	$this->db->select('SUM(seams_male) as total_male, SUM(seams_female) as total_female,SUM(seams_male + seams_female) as GTseamss')
        ->join('tblsrpaotribe','tblseamsdemographic.ipsiccs = tblsrpaotribe.id_tribe','left')     
        ->where('generatedcode',$codegens);
		$query = $this->db->get('tblseamsdemographic');
        return $query->result();
    }

    public function query_count_bdfe($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpalivelihood');
		    return $query->num_rows();
	}

	public function getAllBDFE($gencode){ 
    	$this->db->select('*, bdfem.month as month1,bdfey.year as year1, bdfem2.month as month2, bdfem3.month as month3, bdfem4.month as month4, bdfem5.month as month5, bdfem6.month as month6,tblpalivelihood.size_enterprise as sizeenter,bdferap.month as month22');
    	$this->db->join('tbldatemonth as bdferap','tblpalivelihood.date_rapidassess_month = bdferap.id_month','left');        
    	$this->db->join('tbldatemonth as bdfem','tblpalivelihood.dor_month = bdfem.id_month','left');        
        $this->db->join('tbldateyear as bdfey','tblpalivelihood.dor_year = bdfey.id_year','left');
        $this->db->join('tbldatemonth as bdfem2','tblpalivelihood.date_profile_month = bdfem2.id_month','left');        
        $this->db->join('tbldatemonth as bdfem3','tblpalivelihood.date_appraisal_month = bdfem3.id_month','left');        
        $this->db->join('tbldatemonth as bdfem4','tblpalivelihood.date_recog_endorsement_month = bdfem4.id_month','left');        
        $this->db->join('tbldatemonth as bdfem5','tblpalivelihood.date_recog_validation_month = bdfem5.id_month','left');        
        $this->db->join('tbldatemonth as bdfem6','tblpalivelihood.dateCOR_month = bdfem6.id_month','left');        
        $this->db->join('tbllocregion','tblpalivelihood.lh_region = tbllocregion.id','left');        
        $this->db->join('tbllocprovince','tblpalivelihood.lh_province = tbllocprovince.id_p','left');        
        $this->db->join('tbllocmunicipality','tblpalivelihood.lh_municipal = tbllocmunicipality.id_m','left');        
        $this->db->join('tbllocbarangay','tblpalivelihood.lh_barangay = tbllocbarangay.id_b','left');        
        $this->db->join('tblpalivelihood_registration','tblpalivelihood.type_registration = tblpalivelihood_registration.id_bdfe_registration','left');        
        $this->db->join('tblpalivelihood_products','tblpalivelihood.lh_category = tblpalivelihood_products.id_products','left');        
        $this->db->join('tblpalivelihood_type','tblpalivelihood.lh_sub_category = tblpalivelihood_type.id_lh_type','left');     
        $this->db->join('tblpalivelihood_enterprise','tblpalivelihood.size_enterprise = tblpalivelihood_enterprise.id_size_enterprise','left');     
        $this->db->join('tblpalivelihood_bdfe_level','tblpalivelihood.bdfe_level = tblpalivelihood_bdfe_level.id_bdfe_level','left');     
     
        $this->db->where('generatedcode',$gencode);
        $query = $this->db->get('tblpalivelihood');
        return $query->result();
    }

    public function getallpabdfeponames($bdfe_codegen){
        $this->db->where('bdfe_codegen',$bdfe_codegen);
        $query = $this->db->get('tblpalivelihood_poname');
        return $query->result();
    }

    public function getallpabdfeponamesStatHistory($codegroup){
        $this->db->select('group_concat("Status : ",po_status,"\nAs of (Year) : ",bdfe_po_year,"\nRemarks : ",bdfe_po_remarks separator "\n\n ") as postathis,bdfe_po_codegen, id_bdfe_pohistory');
        $this->db->join('tblpabdfepostatus','tblpalivelihood_pohistory.bdfe_po_status = tblpabdfepostatus.id_po_status','LEFT');
        $this->db->where('bdfe_po_codegen',$codegroup);
        $query = $this->db->get('tblpalivelihood_pohistory');
        return $query->result();
    }

    public function getAllBDFE_po_product($bdfecode)
    {
			// $this->db->join('tblpamain','tblpaforestformation.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('bdfe_codegen',$bdfecode);
			$query= $this->db->get('tblpalivelihood_po_product');
		    return $query->result();
	}

	public function query_count_po_product($bdfecode)
    {
			$this->db->where('bdfe_codegen',$bdfecode);
			$query= $this->db->get('tblpalivelihood_po_product');
		    return $query->num_rows();
	}

	public function getAllBDFE_po_resource($bdfecode)
    {
			// $this->db->join('tblpamain','tblpaforestformation.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('bdfe_codegen',$bdfecode);
			$query= $this->db->get('tblpalivelihoodpolocation');
		    return $query->result();
	}

	public function getAllBDFE_enhancement_TA($bdfecode)
    {
			// $this->db->join('tblpamain','tblpaforestformation.generatedcode = tblpamain.generatedcode','left');
    		$this->db->join('tbldatemonth','tblpalivelihood_enhancement.ta_date_month = tbldatemonth.id_month','left');   
    		$this->db->join('tbldateyear','tblpalivelihood_enhancement.ta_date_year = tbldateyear.id_year','left');   
			$this->db->where('bdfe_codegen',$bdfecode);
			$query= $this->db->get('tblpalivelihood_enhancement');
		    return $query->result();
	}

	public function getAllBDFE_enhancement_FA($bdfecode)
    {
			// $this->db->join('tblpamain','tblpaforestformation.generatedcode = tblpamain.generatedcode','left');
    		$this->db->join('tbldatemonth','tblpalivelihood_enhancement_financial.fa_date_month = tbldatemonth.id_month','left');   
    		$this->db->join('tbldateyear','tblpalivelihood_enhancement_financial.fa_date_year = tbldateyear.id_year','left');   
			$this->db->where('bdfe_codegen',$bdfecode);
			$query= $this->db->get('tblpalivelihood_enhancement_financial');
		    return $query->result();
	}

	public function getAllBDFE_enhancement_OSA($bdfecode)
    {
    		$this->db->join('tbldatemonth','tblpalivelihood_enhancement_oss.oss_date_month = tbldatemonth.id_month','left');   
    		$this->db->join('tbldateyear','tblpalivelihood_enhancement_oss.oss_date_year = tbldateyear.id_year','left');   
			$this->db->where('bdfe_codegen',$bdfecode);
			$query= $this->db->get('tblpalivelihood_enhancement_oss');
		    return $query->result();
	}

	public function getAllBDFE_enhancement_TA_type_assistance($code)
    {
    		$this->db->select('group_concat(tblpalivelihood_enhancement_ta_type_assistance.ta_type_assistance separator ", ") as tatype');
			$this->db->where('ta_enhancement_code',$code);
			$query= $this->db->get('tblpalivelihood_enhancement_ta_type_assistance');
		    return $query->result();
	}

	public function getAllBDFE_enhancement_FA_type_assistance($code2)
    {
    		$this->db->select('group_concat( concat("<s font-color:#234fa7> Type of Assistance : </s> ",fa_type_assistance,"\n<s font-color:#234fa7> Amount (Php) : </s> ",fa_amount) separator "\n\n ") as fatype');

			$this->db->where('fa_enhancement_code',$code2);
			$query= $this->db->get('tblpalivelihood_enhancement_fa_type_assistance');
		    return $query->result();
	}

	public function getAllBDFE_enhancement_OSS_type_assistance($code3)
    {
    		$this->db->select('group_concat( concat("<s font-color:#234fa7> Type of Assistance : </s> ",oss_type_assistance,"\n<s font-color:#234fa7> Monetary Value : </s> ",oss_amount) separator "\n\n ") as osstype');

			$this->db->where('fa_enhancement_code',$code2);
			$query= $this->db->get('tblpalivelihood_enhancement_oss_type_assistance');
		    return $query->result();
	}

	public function query_count_po_resource($bdfecode)
    {
			$this->db->where('bdfe_codegen',$bdfecode);
			$query= $this->db->get('tblpalivelihoodpolocation');
		    return $query->num_rows();
	}

	public function query_count_enhancement_TA($bdfecode)
    {
			$this->db->where('bdfe_codegen',$bdfecode);
			$query= $this->db->get('tblpalivelihood_enhancement');
		    return $query->num_rows();
	}

	public function query_count_enhancement_FA($bdfecode)
    {
			$this->db->where('bdfe_codegen',$bdfecode);
			$query= $this->db->get('tblpalivelihood_enhancement_financial');
		    return $query->num_rows();
	}

	public function query_count_enhancement_OSA($bdfecode)
    {
			$this->db->where('bdfe_codegen',$bdfecode);
			$query= $this->db->get('tblpalivelihood_enhancement_oss');
		    return $query->num_rows();
	}

	public function query_forestformation($gencode)
    {
			// $this->db->join('tblpamain','tblpaforestformation.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpaforestformation');
		    return $query->result();
	}

	public function query_inlandwetland($gencode)
    {
			$this->db->join('tblpamain','tblpainlandwetland_map.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpainlandwetland_map');
		    return $query->result();
	}

	public function query_humaninlandwetland($gencode)
    {
			$this->db->join('tblpamain','tblpahumanwetland_map.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpahumanwetland_map');
		    return $query->result();
	}

	public function query_cave($gencode)
    {
			$this->db->join('tblpamain','tblpacavemap.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpacavemap');
		    return $query->result();
	}

	public function query_coastal($gencode)
    {
			$this->db->join('tblpamain','tblpacoastalcoralmap.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpacoastalcoralmap');
		    return $query->result();
	}

	public function query_seagrass($gencode)
    {
			$this->db->join('tblpamain','tblpacoastalseagrassmap.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpacoastalseagrassmap');
		    return $query->result();
	}

	public function query_attractsmap($gencode)
    {
			// $this->db->join('tblpamain','tblpaattraction_map.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpaattraction_map');
		    return $query->result();
	}

	public function query_facilitymap($gencode)
    {
			// $this->db->join('tblpamain','tblpafacility_map.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpafacility_map');
		    return $query->result();
	}

	public function query_activitymap($gencode)
    {
			$this->db->join('tblpamain','tblpaecotourism_map.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpaecotourism_map');
		    return $query->result();
	}

	public function query_mangrove($gencode)
    {
			$this->db->join('tblpamain','tblpacoastalmangrovemap.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpacoastalmangrovemap');
		    return $query->result();
	}

	public function query_vege($gencode)
    {
			$this->db->join('tblpamain','tblpavegetative.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpavegetative');
		    return $query->result();
	}

	public function query_count_climate($gencode)
    {
			$this->db->join('tblpamain','tblpaclimate.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpaclimate');
		    return $query->num_rows();
	}

	public function query_landslide($gencode)
    {
			$this->db->join('tblpamain','tblpahazardlandslide.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpahazardlandslide');
		    return $query->result();
	}

	public function query_count_landslide($gencode)
    {		
			$this->db->join('tblpamain','tblpahazardlandslide.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpahazardlandslide');
		    return $query->num_rows();
	}

	public function query_occupants($gencode)
	{						
			$this->db->join('tblpamain','tbliccip.generatedcode = tblpamain.generatedcode','left');
			$this->db->join('tblsrpaotribe','tbliccip.iccip = tblsrpaotribe.id_tribe','left'); 
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tbliccip');
		    return $query->result();
	}

	public function grandtotalicc($gencode)
	{
		$this->db->select('id_iccip,iccip,tbliccip.generatedcode,tblpamain.generatedcode, male_iccip,female_iccip,tblsrpaotribe.id_tribe,tblsrpaotribe.tribe_name,
								SUM(male_iccip + female_iccip) as GrandTotal');    		
			$this->db->join('tblpamain','tbliccip.generatedcode = tblpamain.generatedcode','left');
			$this->db->join('tblsrpaotribe','tbliccip.iccip = tblsrpaotribe.id_tribe','left'); 
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tbliccip');
		    return $query->result();
	}

	public function count_occupants($gencode)
    {
			$this->db->join('tblpamain','tbliccip.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tbliccip');
		    return $query->num_rows();
	}

	public function query_attraction($gencode)
    {
			$this->db->join('tblpaecotourism_activities','tblpaattraction.eco_activity = tblpaecotourism_activities.id_ecotourism_activities','left');
			$this->db->join('tblpamain','tblpaattraction.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpaattraction');
		    return $query->result();
	}

	public function query_attraction_imgs($attcode)
    {
			// $this->db->join('tblpaecotourism_activities','tblpaattraction.eco_activity = tblpaecotourism_activities.id_ecotourism_activities','left');
			// $this->db->join('tblpamain','tblpaattraction.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('ecogeneratedcode',$attcode);
			$query= $this->db->get('tblpaattraction_activity_img');
		    return $query->result();
	}

	public function query_attraction_imgs_numrows($attcode)
    {
			// $this->db->join('tblpaecotourism_activities','tblpaattraction.eco_activity = tblpaecotourism_activities.id_ecotourism_activities','left');
			// $this->db->join('tblpamain','tblpaattraction.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('ecogeneratedcode',$attcode);
			$query= $this->db->get('tblpaattraction_activity_img');
		    return $query->num_rows();
	}

	public function count_attraction_imgs($attcode)
    {		
			$this->db->where('ecogeneratedcode',$attcode);
			$query= $this->db->get('tblpaattraction_activity_img');
		    return $query->num_rows();
	}

	public function count_attraction_map($gencode)
    {		
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpaattraction_map');
		    return $query->num_rows();
	}

	public function count_attraction($gencode)
    {		
			$this->db->join('tblpamain','tblpaattraction.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpaattraction');
		    return $query->num_rows();
	}

	public function query_project_sapa($gencode)
    {
			$this->db->join('tblpamaintenuresapa_development','tblpamaintenuresapa.sapa_nature_development = tblpamaintenuresapa_development.id_sapa_development','left');
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpamaintenuresapa');
		    return $query->result();
	}

	public function query_project_sapa_count($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpamaintenuresapa');
		    return $query->num_rows();
	}

	public function query_project_moa($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpamaintenuremoa');
		    return $query->result();
	}
	
	public function query_project_moa_count($gencode)
    {
			// $this->db->join('tblpamain','tblpamainproject.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpamaintenuremoa');
		    return $query->num_rows();
	}

	public function query_project_othertenure($gencode)
    {
    		$this->db->join('tblpamaintenureinstrument_types','tblpamaintenureothers.type_instrument = tblpamaintenureinstrument_types.id_tenuretypes ','left');
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpamaintenureothers');
		    return $query->result();
	}

	public function getallmonitoringcount($codes){ 
        $this->db->where('sapa_generatedcode',$codes);
        $query = $this->db->get('tblpamaintenuresapamonitoring');
        return $query->num_rows();
    }

    public function getcountallmoamonitoring($codes){ 
        $this->db->where('moa_generatedcode',$codes);
        $query = $this->db->get('tblpamaintenuremoamonitoring');
        return $query->num_rows();
    }


	public function query_project_othertenure_count($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpamaintenureothers');
		    return $query->num_rows();
	}

	public function query_project_pacbrma($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpamaintenurepacbrma');
		    return $query->result();
	}

	public function countRowCRMP($codegens){
        $this->db->join('tblpamaintenurepacbrma','tblpamaintenurepacbrma_crmp.id_pacbrma=tblpamaintenurepacbrma.id_pacbrma','LEFT');
        $this->db->where('tblpamaintenurepacbrma.generatedcode',$codegens);
        $query = $this->db->get("tblpamaintenurepacbrma_crmp");
        return $query->num_rows();

    }

    public function queryRowCRMP($codegens){
        $this->db->select('(id_pacbrma) as pacid');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get("tblpamaintenurepacbrma_crmp");
        return $query->result();

    }

	public function query_project_pacbrma_count($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpamaintenurepacbrma');
		    return $query->num_rows();
	}

	public function query_project($gencode)
    {
			$this->db->join('tblpamain','tblmainprojects.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblmainprojects');
		    return $query->result();
	}

	public function count_project($gencode)
    {		
			$this->db->join('tblpamain','tblmainprojects.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblmainprojects');
		    return $query->num_rows();
	}

	public function query_programs($gencode)
    {
			$this->db->join('tblpamain','tblmainprograms.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblmainprograms');
		    return $query->result();
	}

	public function count_programs($gencode)
    {		
			$this->db->join('tblpamain','tblmainprograms.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblmainprograms');
		    return $query->num_rows();
	}

	public function query_research($gencode)
    {
			$this->db->join('tblpamain','tblmainresearcher.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblmainresearcher');
		    return $query->result();
	}

	public function count_research($gencode)
    {		
			$this->db->join('tblpamain','tblmainresearcher.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblmainresearcher');
		    return $query->num_rows();
	}

	public function query_facility($gencode)
    {
			$this->db->join('tblpafacility_condition','tblpafacility.facility_condition = tblpafacility_condition.id_fcondition','left');
			$this->db->join('tblpafacility_list','tblpafacility.title_facility = tblpafacility_list.id_facilities ','left');
			$this->db->join('tbldateyear','tblpafacility.facility_date_year = tbldateyear.id_year ','left');
			$this->db->join('tbldatemonth','tblpafacility.facility_date_month = tbldatemonth.id_month ','left');
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpafacility');
		    return $query->result();
	}

	public function query_facility_multi_img($codesa)
    {
			// $this->db->join('tblpafacility_condition','tblpafacility.facility_condition = tblpafacility_condition.id_fcondition','left');
			// $this->db->join('tblpafacility_list','tblpafacility.title_facility = tblpafacility_list.id_facilities ','left');
			// $this->db->join('tbldateyear','tblpafacility.facility_date_year = tbldateyear.id_year ','left');
			// $this->db->join('tbldatemonth','tblpafacility.facility_date_month = tbldatemonth.id_month ','left');
			$this->db->where('facilitycode',$codesa);
			$query= $this->db->get('tblpafacility_activity_img');
		    return $query->result();
	}

	// public function query_facilityMap($gencode)
 //    {
	// 		$this->db->join('tblpamain','tblpafacility.generatedcode = tblpamain.generatedcode','left');
	// 		$this->db->where('tblpamain.generatedcode',$gencode);
	// 		$query= $this->db->get('tblpafacility');
	// 	    return $query->result();
	// }

	public function query_product($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpaproducts');
		    return $query->result();
	}

	public function query_enterprise($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpaenterprise');
		    return $query->result();
	}

	public function count_facility($gencode)
    {		
			$this->db->join('tblpamain','tblpafacility.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpafacility');
		    return $query->num_rows();
	}

	public function count_facility_map($gencode)
    {		
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpafacility_map');
		    return $query->num_rows();
	}

	public function count_enterprise($gencode)
    {		
			$this->db->join('tblpamain','tblpaenterprise.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpaenterprise');
		    return $query->num_rows();
	}

	public function query_activity($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpaecotourism');
		    return $query->result();
	}

	public function count_activity($gencode)
    {		
			$this->db->join('tblpamain','tblpaecotourism.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpaecotourism');
		    return $query->num_rows();
	}

	public function count_activityMap($gencode)
    {		
    		$this->db->join('tblpamain','tblpaecotourism_map.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpaecotourism_map');
		    return $query->num_rows();
	}

	public function query_flooding($gencode)
    {
			$this->db->join('tblpamain','tblpahazardflooding.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpahazardflooding');
		    return $query->result();
	}

	public function query_sealevelrise($gencode)
    {
			$this->db->join('tblpamain','tblpahazardsealevelrise.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpahazardsealevelrise');
		    return $query->result();
	}

	public function query_storm($gencode)
    {
			// $this->db->join('tblpamain','tblpahazardtsunami.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpahazardtsunami.generatedcode',$gencode);
			$query= $this->db->get('tblpahazardtsunami');
		    return $query->result();
	}

	public function query_fault($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpahazardfire');
		    return $query->result();
	}

	public function query_count_flooding($gencode)
    {
			$this->db->join('tblpamain','tblpahazardflooding.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpahazardflooding');
		    return $query->num_rows();
	}

	public function query_count_sealevel($gencode)
    {
			$this->db->join('tblpamain','tblpahazardsealevelrise.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpahazardsealevelrise');
		    return $query->num_rows();
	}

	public function query_count_tsunami($gencode)
    {
			$this->db->join('tblpamain','tblpahazardtsunami.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpahazardtsunami');
		    return $query->num_rows();
	}

	public function query_count_fault($gencode)
    {
			$this->db->join('tblpamain','tblpahazardfire.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpahazardfire');
		    return $query->num_rows();
	}

	public function query_count_othergeohazard($gencode)
    {
			$this->db->join('tblpamain','tblpageohazard.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpageohazard');
		    return $query->num_rows();
	}

	public function query_othergeohazard($gencode)
    {
			$this->db->join('tblpamain','tblpageohazard.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpageohazard');
		    return $query->result();
	}

	public function query_sea($gencode)
    {
			$this->db->join('tblpamain','tblpahazardsealevelrise.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpahazardsealevelrise');
		    return $query->result();
	}

	public function query_count_sea($gencode)
    {
			$this->db->join('tblpamain','tblpahazardsealevelrise.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpahazardsealevelrise');
		    return $query->num_rows();
	}

	public function query_tsunami($gencode)
    {
			$this->db->join('tblpamain','tblpahazardtsunami.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get('tblpahazardtsunami');
		    return $query->result();
	}

	public function query_pambimage_count($gencode)
    {
			$this->db->join('tblpamain','tblpamainimageupload.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get($this->image);
		    return $query->num_rows();
	}

	public function query_income($gencode)
    {		
    		// $this->db->distinct('tblpavisitorsrate.date_year');
    		$this->db->select("
    						date_month,
							date_year,
                            id_rate,
                            localmale,
                            localfemale,
                            foreignmale,
                            foreignfemale,
                            entrance,parkingfee,rentalsfee,others,
                            (localmale + localfemale) AS total_local,
                            (foreignmale + foreignfemale) AS total_foreign,
                            ((entrance + parkingfee + rentalsfee + others) *.75) AS total_sub,
                            ((entrance + parkingfee + rentalsfee + others) *.25) AS total_central,
                            (entrance + parkingfee + rentalsfee + others) AS grand_total");

    		
			$this->db->join('tblpamain','tblpavisitorsrate.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$this->db->order_by('tblpavisitorsrate.date_year','ASC');
        	$this->db->order_by("STR_TO_DATE('tblpavisitorsrate.date_month','%m')");
        	$this->db->group_by(array("tblpavisitorsrate.date_month", "tblpavisitorsrate.date_year"));
			$query= $this->db->get($this->income);
		    return $query->result();
	}

	public function query_income_distinct($gencode)
    {
    		$this->db->distinct();
    		$this->db->select("tblpavisitorsrate.date_year as year_start");
			$this->db->join('tblpamain','tblpavisitorsrate.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$this->db->group_by('tblpavisitorsrate.date_year');
			$this->db->order_by('tblpavisitorsrate.date_year','DESC');
        	$this->db->order_by("STR_TO_DATE('tblpavisitorsrate.date_month','%m')");

			$query= $this->db->get($this->income);
		    return $query->result();
	}

	public function query_income_count($gencode)
    {
			$this->db->join('tblpamain','tblpavisitorsrate.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get($this->income);
		    return $query->num_rows();
	}

	public function multiplezone($gencode)
	{	
			$this->db->select('*');  
			$this->db->where('generatedcode',$gencode);
			$query2 = $this->db->get($this->multiplezone);
		    return $query2->result();			
	}

	public function multiplezoneGT($gencode)
	{	
			$this->db->select('SUM(area) as totalmz');  
			$this->db->where('generatedcode',$gencode);
			// $this->db->group_by('generatedcode');
			$query2 = $this->db->get($this->multiplezone);
		    return $query2->result();			
	}

	 public function query_strict($gencode)
    {
			$this->db->select('*');
			$this->db->where('generatedcode',$gencode);
			$query2 = $this->db->get($this->strictzone);
		    return $query2->result();		    
    }


	public function strictprotzones($gencode)
	{
			  	
			$this->db->select('generatedcode, group_concat("* ",description separator "\n ") as descs');	
			$this->db->where('generatedcode',$gencode);
			$this->db->group_by('generatedcode');
			$query= $this->db->get($this->strictzone);
		    return $query->result();
	}

	public function biogeozonmarine($gencode)
	{
			  	
			$this->db->select('group_concat("*",TBZlocationmarine separator "\n ") as descs');	
    		$this->db->join('tblpatbzonesmarine','tblpamain_marine_biozone.biodiv_marine=tblpatbzonesmarine.id_tbz_marine');
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpamain_marine_biozone');
		    return $query->result();
	}

	public function biogeozonterrestrial($gencode)
	{
			  	
			$this->db->select('group_concat("*",TBZlocation separator "\n ") as descs2');	
    		$this->db->join('tblpatbzones','tblpamain_terrestrial_biozone.biodiv_terrestrial=tblpatbzones.id_tbz');
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpamain_terrestrial_biozone');
		    return $query->result();
	}

	// public function biogeographic_combine($gencode)
 //    {
 //    		$this->db->select('group_concat( concat("Upper most left \n Longitude: ",geographic_long1,", Latitude: ", geographic_lat1,"\n","\n Lower most right \n Longitude: ",geographic_long2,", Latitude: ", geographic_lat2) separator "\n ") as Geographic');
	// 		$this->db->where('tblpamain.generatedcode',$gencode);
	// 		$this->db->group_by('id_main');
	// 		$query= $this->db->get($this->pamain);
	// 	    return $query->result();
	// }

	public function biogeographic_combine($gencode)
	{
		$this->db->where('tblpamain.generatedcode',$gencode);
		$this->db->group_by('id_main');
		$query= $this->db->get($this->pamain);
		return $query->result();
	}
	public function wdpa_combine($gencode)
    {
    		$this->db->select('group_concat(concat("<b>Designation type:</b> ",tbldesig_type.desig_type,"\n <b> IUCN Category: </b> ",iucn_title,"\n <b>Aquatic Area: </b> ",marine_desc,"\n <b> No-take: </b> ", notake_desc,"\n <b>Verification:</b> ",verif_value,"\n <b>Status </b>: ", wdpa_status) separator "\n ") as wdpatext,tblpamain.generatedcode');
    		$this->db->join('tbldesig_type','tblpamain.desig_type=tbldesig_type.id_desig_type');
    		$this->db->join('tblpaiucncategory','tblpamain.iucn_cat=tblpaiucncategory.id_iucncat');
    		$this->db->join('tblpawdpa_marine','tblpamain.wdpamarineid=tblpawdpa_marine.id_wdpa_marine');
    		$this->db->join('tblpawdpa_notake','tblpamain.wdpanotake=tblpawdpa_notake.id_notake');
    		$this->db->join('tblpawdpa_verif','tblpamain.wdpaverif=tblpawdpa_verif.id_verif');
    		$this->db->join('tblpawdpa_subloc','tblpamain.wdpaiso=tblpawdpa_subloc.id_iso');
    		$this->db->join('tblpawdpa_status','tblpamain.wdpastatus=tblpawdpa_status.id_wdpa_status');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$this->db->group_by('id_main');
			$query= $this->db->get($this->pamain);
		    return $query->result();
	}

	public function wdpa_location($passcode)
    {
    		$this->db->select('group_concat("(", iso_value,") ",iso_desc separator " | ") as wdpalocs');    		
    		$this->db->join('tblpawdpa_subloc','tblpawdpa_location.wdpa_id=tblpawdpa_subloc.id_iso');
			$this->db->where('generatedcode',$passcode);
			$query= $this->db->get('tblpawdpa_location');
		    return $query->result();
	}

	public function query_lgu($gencode)
    {
    		$this->db->select('*');    		
			$this->db->join('tblpamain','tblpalgu.generatedcode = tblpamain.generatedcode','left');
			$this->db->where('tblpamain.generatedcode',$gencode);
			$query= $this->db->get($this->pasu);
		    return $query->result();
	}

	public function international_recog($gencode)
    {
    		$this->db->select('siteno,recognition,generatedcode,group_concat( concat(reg_desc," ",inscribed," (Site No.: ",siteno,") dated ",month_declared," ",year_declared) separator "\n ") as interrecog,
    			group_concat( concat(inscribed," dated ",month_declared," ",year_declared) separator "\n ") as interrecogothers');    		 	
    		$this->db->join('tblinternationalrecognition','tblrecognition.recognition = tblinternationalrecognition.id_recognition','left');
			$this->db->where('generatedcode',$gencode);
			// $this->db->group_by('generatedcode');			
			$query= $this->db->get('tblrecognition');
		    return $query->result();
	}

	public function international_recogNew($gencode)
    {
    		$this->db->join('tblinternationalrecognition','tblrecognition.recognition = tblinternationalrecognition.id_recognition','left');
    		$this->db->join('tblinternationalrecognition_sub','tblrecognition.recog_sub = tblinternationalrecognition_sub.id_recog_sub','left');
    		// $this->db->join('tbldatemonth','tblrecognition.month_declared = tbldatemonth.id_month','left');    	
    		// $this->db->join('tbldateyear','tblrecognition.year_declared=tbldateyear.id_year','');    
			$this->db->where('generatedcode',$gencode);
			// $this->db->group_by('generatedcode');			
			$query= $this->db->get('tblrecognition');
		    return $query->result();
	}

	public function international_ramsarlists($regcode)
    {
    		$this->db->select('group_concat(concat(int_crit,") ",crit_desc) separator "\n\n") as sublisting');
    		$this->db->join('tblinternationalrecognition_sub','tblrecognition_criteria_list.criteria_list = tblinternationalrecognition_sub.id_recog_sub','left');
			$this->db->where('recognition_code',$regcode);
			$query= $this->db->get('tblrecognition_criteria_list');
		    return $query->result();
	}

	public function query_forestform($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpaforestformation_details');
		    return $query->result();
	}

	public function query_forestform_total($gencode)
    {
			$this->db->select('generatedcode,forest_formation,forest_formation_area,SUM(forest_formation_area) as gtotal');    		
			$this->db->where('generatedcode',$gencode);
			$this->db->group_by('generatedcode');
			$query= $this->db->get('tblpaforestformation_details');
		    return $query->result();
	}

	public function query_forestform_count($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpaforestformation_details');
		    return $query->num_rows();
	}

	public function query_inland($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpainland');
		    return $query->result();
	}

	public function query_inland_total($gencode)
    {
			$this->db->select('generatedcode,inland_desc,inland_area,SUM(inland_area) as gtotal');    		
			$this->db->where('generatedcode',$gencode);
			$this->db->group_by('generatedcode');
			$query= $this->db->get('tblpainland');
		    return $query->result();
	}

	public function query_inland_count($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpainland');
		    return $query->num_rows();
	}

	public function query_wetland($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpawetland');
		    return $query->result();
	}

	public function query_wetland_total($gencode)
    {
			$this->db->select('generatedcode,wetland_desc,wetland_area,SUM(wetland_area) as gtotal');    		
			$this->db->where('generatedcode',$gencode);
			$this->db->group_by('generatedcode');
			$query= $this->db->get('tblpawetland');
		    return $query->result();
	}

	public function query_wetland_count($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpawetland');
		    return $query->num_rows();
	}

	public function query_caves($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpacaves');
		    return $query->result();
	}

	public function query_caves_total($gencode)
    {
			$this->db->select('generatedcode,caves_desc,caves_area,SUM(caves_area) as gtotal');    		
			$this->db->where('generatedcode',$gencode);
			$this->db->group_by('generatedcode');
			$query= $this->db->get('tblpacaves');
		    return $query->result();
	}

	public function query_caves_count($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpacaves');
		    return $query->num_rows();
	}

	public function query_program($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblmainprograms');
		    return $query->result();
	}

	public function query_program_count($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblmainprograms');
		    return $query->num_rows();
	}

	public function query_researches($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblmainresearcher');
		    return $query->result();
	}

	public function query_researches_count($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblmainresearcher');
		    return $query->num_rows();
	}

	public function query_threat($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpathreat');
		    return $query->result();
	}

	public function query_threat_count($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpathreat');
		    return $query->num_rows();
	}

	public function query_references($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpareference');
		    return $query->result();
	}

	public function query_references_count($gencode)
    {
			$this->db->where('generatedcode',$gencode);
			$query= $this->db->get('tblpareference');
		    return $query->num_rows();
	}

	public function query_all_program($gencode)
    {
    	$this->db->join('tblpaprogram_agency','tblmainprogram.program_sector = tblpaprogram_agency.id_sector','LEFT');
    	$this->db->join('tblpaprogram_agency_program','tblmainprogram.sector_program_id = tblpaprogram_agency_program.id_agencyprog','LEFT');
		$this->db->where('generatedcode',$gencode);
		$query= $this->db->get('tblmainprogram');
		   return $query->result();
	}

	public function query_all_programActivity($gencode)
    {
		$this->db->where('generatedcode',$gencode);
		$query= $this->db->get('tblmainprogram_activity');
		   return $query->result();
	}

	public function query_all_programProject($gencode)
    {
    	$this->db->join('tblpaprogram_agency','tblmainprojects.proj_sector_id = tblpaprogram_agency.id_sector','LEFT');
    	$this->db->join('tblmainprojects_projectlist','tblmainprojects.proj_list_id = tblmainprojects_projectlist.id_projectlist','LEFT');
    	$this->db->join('tblprogram_sourcefund','tblmainprojects.source_fund = tblprogram_sourcefund.id_prog_fund','LEFT');
    	$this->db->join('tblprogram_typefund','tblmainprojects.proj_typefund = tblprogram_typefund.id_prog_typefund','LEFT');
		$this->db->where('generatedcode',$gencode);
		$query= $this->db->get('tblmainprojects');
		   return $query->result();
	}

	public function query_pambreso_byreasearch($pambcode)
	{
    	$this->db->select('group_concat("\n<b>PAMB Resolution no. : </b>",pambreso_no,"\n<b>PAMB Resolution title : </b> ",pambreso_title separator "\n") as pambreso');
    	$this->db->where('research_code', $pambcode);
        $query = $this->db->get('tblmainresearch_pambreso');
		   return $query->result();
	}

	public function query_pambreso_byreasearch2($pambcode)
	{
    	$this->db->select('group_concat("\n",pambreso_no,"\n",pambreso_title separator "\n") as pambreso');
    	$this->db->where('research_code', $pambcode);
        $query = $this->db->get('tblmainresearch_pambreso');
		   return $query->result();
	}


	public function query_all_programResearch($gencode)
    {
    	$this->db->join('tblmainresearch_status','tblmainresearch.search_status = tblmainresearch_status.id_research_status','LEFT');
		$this->db->where('generatedcode',$gencode);
		$query= $this->db->get('tblmainresearch');
		   return $query->result();
	}

	public function query_all_project($gencode)
    {
    	$this->db->join('tblpaprogram_agency','tblmainprojects.proj_sector_id = tblpaprogram_agency.id_sector','LEFT');
    	$this->db->join('tblmainprojects_projectlist','tblmainprojects.proj_list_id = tblmainprojects_projectlist.id_projectlist','LEFT');
    	$this->db->join('tblprogram_sourcefund','tblmainprojects.source_fund = tblprogram_sourcefund.id_prog_fund','LEFT');
    	$this->db->join('tblprogram_typefund','tblmainprojects.proj_typefund = tblprogram_typefund.id_prog_typefund','LEFT');
		$this->db->where('generatedcode',$gencode);
		$query= $this->db->get('tblmainprojects');
		   return $query->result();
	}

	public function query_all_research($gencode)
    {
    	$this->db->join('tblmainresearch_status','tblmainresearch.search_status = tblmainresearch_status.id_research_status','LEFT');
		$this->db->where('generatedcode',$gencode);
		$query= $this->db->get('tblmainresearch');
		   return $query->result();
	}

	public function query_all_threatsMap($gencode)
    {
		$this->db->where('generatedcode',$gencode);
		$query= $this->db->get('tblpatreatmap');
		   return $query->result();
	}
	public function count_all_threatsMap($gencode)
    {
		$this->db->where('generatedcode',$gencode);
		$query= $this->db->get('tblpatreatmap');
		   return $query->num_rows();
	}

	public function query_all_threats($gencode)
    {
    	$this->db->join('tblpathreat_category','tblpathreat.threats_category = tblpathreat_category.id_threats_category','LEFT')
        ->join('tblpathreat_category_rank','tblpathreat.threats_rank = tblpathreat_category_rank.id_threat_rank','LEFT')
        ->join('tblpathreat_category_sub','tblpathreat.threats_sub = tblpathreat_category_sub.id_threats_sub','LEFT')
        ->join('tbldatemonth','tblpathreat.threats_month_observe = tbldatemonth.id_month','LEFT')
        ->join('tbldateyear','tblpathreat.threats_year_observe = tbldateyear.id_year','LEFT')
        ->join('tblpathreat_naturalthreats','tblpathreat.nature_threats = tblpathreat_naturalthreats.id_natural_threats ','LEFT')
        ->join('tblpathreat_naturalthreats_sub','tblpathreat.sub_nature_threats = tblpathreat_naturalthreats_sub.id_natural_threats_sub  ','LEFT')
        ->join('tbllocregion','tblpathreat.threat_region = tbllocregion.id','LEFT')
        ->join('tbllocprovince','tblpathreat.threat_province = tbllocprovince.id_p','LEFT')
        ->join('tbllocmunicipality','tblpathreat.threat_municipality = tbllocmunicipality.id_m','LEFT')
        ->join('tbllocbarangay','tblpathreat.threat_barangay = tbllocbarangay.id_b','LEFT')
        ->where('tblpathreat.generatedcode',$gencode);

		$query= $this->db->get('tblpathreat');
		   return $query->result();
	}

	public function getallthreatsLists($codel){
        $this->db->join('tblpathreat_naturalthreats','tblpathreat_multi.nature_threat_x = tblpathreat_naturalthreats.id_natural_threats','left');
        $this->db->join('tblpathreat_category','tblpathreat_multi.nature_category_x = tblpathreat_category.id_threats_category','left');
        $this->db->join('tblpathreat_category_sub','tblpathreat_multi.sub_nature_category_x = tblpathreat_category_sub.id_threats_sub','left');
        $this->db->where('threat_gencode',$codel);
        $query = $this->db->get('tblpathreat_multi');
        return $query->result();
    }

	public function CountMemberbySexMale($gencode)
	{
		$this->db->where('sex',1);		
		$this->db->where('generatedcode',$gencode);		
		$query = $this->db->get('tblpambmember');
		   return $query->num_rows();
	}

	public function CountMemberbySexFemale($gencode)
	{
		$this->db->where('sex',2);		
		$this->db->where('generatedcode',$gencode);		
		$query = $this->db->get('tblpambmember');
		   return $query->num_rows();
	}

	public function queryboardMember($gencode,$countmember)
	{
		$this->db->join('tblpambmemberposition','tblpambmember.designation=tblpambmemberposition.description','LEFT');		
		$this->db->where('generatedcode',$gencode);		
		$this->db->order_by('id_memposition');
        $this->db->order_by('LENGTH(id_memposition)');
        if($countmember!=''){
			$this->db->limit($countmember);
		}
		$query = $this->db->get('tblpambmember');
		   return $query->result();
	}

	public function querymemberIssuances($gencode)
	{
		$this->db->join('tbldatemonth','tblpambreso_minutes.month_minutes=tbldatemonth.id_month','');  
		$this->db->join('tbldateyear','tblpambreso_minutes.year_minutes=tbldateyear.id_year','');    
		$this->db->where('generatedcode',$gencode);		
		$query = $this->db->get('tblpambreso_minutes');
		   return $query->result();
	}

	public function countpambminutesofmeetings($codenom)
    {
    	$this->db->select('group_concat("Title : ",resolution_name,"\n","Resolution No.: ",resolution_no,"\n Date Approved : ",month," ",year separator "\n\n") as resolutionname');
    	$this->db->join('tbldatemonth','tblpambreso.month_chair=tbldatemonth.id_month','');  
		$this->db->join('tbldateyear','tblpambreso.year_chair=tbldateyear.id_year','');
        $this->db->where('pambreso_code', $codenom);
        $query = $this->db->get('tblpambreso');
		   return $query->result();
        // return $query->num_rows();
    }

	public function querymemberpamo($gencode)
	{
		$this->db->join('tblappoinmentstatus','tblpasustaff.tstatus=tblappoinmentstatus.id_astatus');
		$this->db->where('generatedcode',$gencode);		
		$query = $this->db->get('tblpasustaff');
		   return $query->result();
	}

	public function CountpasobySexMale($gencode)
	{
		$this->db->where('tsex',1);		
		$this->db->where('generatedcode',$gencode);		
		$query = $this->db->get('tblpasustaff');
		   return $query->num_rows();
	}

	public function CountpasobySexFemale($gencode)
	{
		$this->db->where('tsex',2);		
		$this->db->where('generatedcode',$gencode);		
		$query = $this->db->get('tblpasustaff');
		   return $query->num_rows();
	}

	public function qreferences($gencode)
	{
		$this->db->where('generatedcode',$gencode);		
		$query = $this->db->get('tblpareference');
		   return $query->result();
	}
}