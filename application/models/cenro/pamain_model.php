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
            $this->db->join('tblpamain_img','tblpamain.generatedcode = tblpamain_img.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
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

    public function paAreaTotal($gencode)
    {
            $this->db->select('(area + marine_area + buffer) as total_area');           
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
                               group_concat(tbllocprovince.provinceName,", ",tbllocmunicipality.municipalName separator "\n ") as try2');
            $this->db->join('tbllocregion', 'tblpamainlocation.region_id = tbllocregion.id','left');
            $this->db->join('tbllocprovince', 'tblpamainlocation.province_id = tbllocprovince.id_p','left');
            $this->db->join('tbllocmunicipality', 'tblpamainlocation.municipal_id = tbllocmunicipality.id_m','left');
            $this->db->join('tbllocbarangay', 'tblpamainlocation.barangay_id = tbllocbarangay.id_b','left');
            $this->db->join('tblpamain','tblpamainlocation.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $this->db->group_by('tblpamainlocation.generatedcode');
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
            $this->db->select('SUM(tblpamainlegislation.area) as total_area,SUM(tblpamainlegislation.buffer) as total_buffer');
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

    public function query_pambbiological($gencode)
    {
            $this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
            $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
            $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
            $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
            $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
            $this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
            $this->db->join('tblpamain','tblpamainbiological.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $this->db->where('IUCNCode','CR');
            $this->db->where('tblwcategory.id',1);          
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

    public function query_pambbiologicalflora($gencode)
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

    public function query_managementzone($gencode)
    {
            $this->db->where('generatedcode_mgnt',$gencode);
            $query= $this->db->get('tblpamanagementzone');
            return $query->result();
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
            $this->db->join('tblpamain','tblpatopology.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query= $this->db->get('tblpatopology');
            return $query->result();
    }

    public function query_count_slope($gencode)
    {
            $this->db->join('tblpamain','tblpatopology.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
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
            $this->db->join('tblpamain','tblpageology.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query= $this->db->get('tblpageology');
            return $query->num_rows();
    }

    public function query_climate($gencode)
    {
            $this->db->join('tblpamain','tblpaclimate.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query= $this->db->get('tblpaclimate');
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
            $this->db->join('tblpamain','tblpaattraction.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query= $this->db->get('tblpaattraction');
            return $query->result();
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
            $this->db->join('tblpamain','tblpamainproject.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $this->db->where('type_processing','sapa');
            $query= $this->db->get('tblpamainproject');
            return $query->result();
    }

    public function query_project_sapa_count($gencode)
    {
            $this->db->join('tblpamain','tblpamainproject.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $this->db->where('type_processing','sapa');
            $query= $this->db->get('tblpamainproject');
            return $query->num_rows();
    }

    public function query_project_moa($gencode)
    {
            $this->db->join('tblpamain','tblpamainproject.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $this->db->where('type_processing','moa');
            $query= $this->db->get('tblpamainproject');
            return $query->result();
    }

    public function query_project_moa_count($gencode)
    {
            $this->db->join('tblpamain','tblpamainproject.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $this->db->where('type_processing','moa');
            $query= $this->db->get('tblpamainproject');
            return $query->num_rows();
    }

    public function query_project_pacbrma($gencode)
    {
            $this->db->join('tblpamain','tblpamainproject.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $this->db->where('type_processing','pacbrma');
            $query= $this->db->get('tblpamainproject');
            return $query->result();
    }

    public function query_project_pacbrma_count($gencode)
    {
            $this->db->join('tblpamain','tblpamainproject.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $this->db->where('type_processing','pacbrma');
            $query= $this->db->get('tblpamainproject');
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
            $this->db->join('tblpamain','tblpafacility.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query= $this->db->get('tblpafacility');
            return $query->result();
    }

    public function count_facility($gencode)
    {       
            $this->db->join('tblpamain','tblpafacility.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query= $this->db->get('tblpafacility');
            return $query->num_rows();
    }

    public function query_activity($gencode)
    {
            $this->db->join('tblpamain','tblpaecotourism.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
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


    public function query_flooding($gencode)
    {
            $this->db->join('tblpamain','tblpahazardflooding.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query= $this->db->get('tblpahazardflooding');
            return $query->result();
    }

    public function query_count_flooding($gencode)
    {
            $this->db->join('tblpamain','tblpahazardflooding.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query= $this->db->get('tblpahazardflooding');
            return $query->num_rows();
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

    public function query_count_tsunami($gencode)
    {
            $this->db->join('tblpamain','tblpahazardtsunami.generatedcode = tblpamain.generatedcode','left');
            $this->db->where('tblpamain.generatedcode',$gencode);
            $query= $this->db->get('tblpahazardtsunami');
            return $query->num_rows();
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
    public function biogeographic_combine($gencode)
    {
            // $this->db->select('group_concat( concat("Upper most left: ",geographic_long1,"\n Lower most right: ", geographic_long2,"\n","Lower most left: ",geographic_lat1,"\n Upper most right: ", geographic_lat2) separator "\n ") as Geographic');
            $this->db->select('group_concat( concat("Upper most left \n Longitude: ",geographic_long1,", Latitude: ", geographic_lat1,"\n","\n Lower most right \n Longitude: ",geographic_long2,", Latitude: ", geographic_lat2) separator "\n ") as Geographic');

            $this->db->where('tblpamain.generatedcode',$gencode);
            $this->db->group_by('generatedcode');
            $query= $this->db->get($this->pamain);
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
            // $this->db->select('group_concat( concat("Upper most left: ",geographic_long1,"\n Lower most right: ", geographic_long2,"\n","Lower most left: ",geographic_lat1,"\n Upper most right: ", geographic_lat2) separator "\n ") as Geographic');
            $this->db->select('generatedcode, group_concat( concat(reg_desc," inscribed by ",inscribed," dated ",month_declared," ",year_declared) separator "\n ") as interrecog');                
            $this->db->join('tblinternationalrecognition','tblrecognition.recognition = tblinternationalrecognition.id_recognition','left');
            $this->db->where('generatedcode',$gencode);
            $this->db->group_by('generatedcode');           
            $query= $this->db->get('tblrecognition');
            return $query->result();
    }

    public function query_forestform($gencode)
    {
            $this->db->where('generatedcode',$gencode);
            $query= $this->db->get('tblpaforestformation');
            return $query->result();
    }

    public function query_forestform_total($gencode)
    {
            $this->db->select('generatedcode,forest_formation,forest_formation_area,SUM(forest_formation_area) as gtotal');         
            $this->db->where('generatedcode',$gencode);
            $this->db->group_by('generatedcode');
            $query= $this->db->get('tblpaforestformation');
            return $query->result();
    }

    public function query_forestform_count($gencode)
    {
            $this->db->where('generatedcode',$gencode);
            $query= $this->db->get('tblpaforestformation');
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

}