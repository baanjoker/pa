<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class library_model extends CI_Model
{
	private $defterm = 'tbldefterms';
    private $cite    =  'tblcitestatus';
    private $cms     =  'tblcmsstatus';
    private $marital =  'tblcvstatus';
    private $eco     =  'tblecosystems';
    private $bio     =  'tblpatbzones';
    private $nip     =  'tblnip';
    private $cat     =  'tblpacategory';
    private $leg     =  'tbllegislation';
    private $con     =  'tblpacareadesc';
    private $wtype   =  'tblwetlandtype';
    private $wdesc   =  'tblwetlanddesc';

//============================================= ======//
//			DEFINITION OF TERM 						  //
//====================================================//
    public function createdefterm($data = [])
    {    
        return $this->db->insert($this->defterm,$data);

    }

    public function updatedefterm($data = [])
    {
        return $this->db->where('id',$data['id'])
        ->update($this->defterm,$data);       

    } 

    public function getDatadefterm($id=null)
    {
        return $this->db->select("*")           
            ->from($this->defterm)
            ->where('id',$id)
            ->get()
            ->row();
    }

//====================================================//
//                        CITE                        //
//====================================================//
    public function createcite($data = [])
    {    
        return $this->db->insert($this->cite,$data);

    }

    public function updatecite($data = [])
    {
        return $this->db->where('id',$data['id'])
        ->update($this->cite,$data);       

    } 

    public function getDatacite($id=null)
    {
        return $this->db->select("*")           
            ->from($this->cite)
            ->where('id',$id)
            ->get()
            ->row();
    }

    function check_CodeCite($id = '', $citescode) {
        $this->db->where('CitesCode', $citescode);
        if($id) {
            $this->db->where_not_in('id', $id);
        }
        return $this->db->get($this->cite)->num_rows();
    }

    function check_NameCite($id = '', $description) {
        $this->db->where('Description', $description);
        if($id) {
            $this->db->where_not_in('id', $id);
        }
        return $this->db->get($this->cite)->num_rows();
    }


//====================================================//
//                        CMS                         //
//====================================================//
    public function createcms($data = [])
    {    
        return $this->db->insert($this->cms,$data);

    }

    public function updatecms($data = [])
    {
        return $this->db->where('id_cms',$data['id_cms'])
        ->update($this->cms,$data);       

    } 

    public function getDatacms($id_cms=null)
    {
        return $this->db->select("*")           
            ->from($this->cms)
            ->where('id_cms',$id_cms)
            ->get()
            ->row();
    }

    function check_CodeCms($id_cms = '', $cmscode) {
        $this->db->where('CMSCode', $cmscode);
        if($id_cms) {
            $this->db->where_not_in('id_cms', $id_cms);
        }
        return $this->db->get($this->cms)->num_rows();
    }

    function check_NameCms($id_cms = '', $description) {
        $this->db->where('Description', $description);
        if($id_cms) {
            $this->db->where_not_in('id_cms', $id_cms);
        }
        return $this->db->get($this->cms)->num_rows();
    }

//====================================================//
//                        MARITAL                     //
//====================================================//
    public function createmarital($data = [])
    {    
        return $this->db->insert($this->marital,$data);

    }

    public function updatemarital($data = [])
    {
        return $this->db->where('id_marital',$data['id_marital'])
        ->update($this->marital,$data);       

    } 

    public function getDatamarital($id_marital=null)
    {
        return $this->db->select("*")           
            ->from($this->marital)
            ->where('id_marital',$id_marital)
            ->get()
            ->row();
    }

    function check_CodeMarital($id_marital = '', $cvcode) {
        $this->db->where('cvcode', $cvcode);
        if($id_marital) {
            $this->db->where_not_in('id_marital', $id_marital);
        }
        return $this->db->get($this->marital)->num_rows();
    }

    function check_NameMarital($id_marital = '', $cvdesc) {
        $this->db->where('cvdesc', $cvdesc);
        if($id_marital) {
            $this->db->where_not_in('id_marital', $id_marital);
        }
        return $this->db->get($this->marital)->num_rows();
    }

//====================================================//
//                        ECOSYSTEM                   //
//====================================================//
    public function createeco($data = [])
    {    
        return $this->db->insert($this->eco,$data);

    }

    public function updateeco($data = [])
    {
        return $this->db->where('id',$data['id'])
        ->update($this->eco,$data);       

    } 

    public function getDataeco($id=null)
    {
        return $this->db->select("*")           
            ->from($this->eco)
            ->where('id',$id)
            ->get()
            ->row();
    }

    function check_CodeEco($id = '', $ecocode) {
        $this->db->where('EcoCode', $ecocode);
        if($id) {
            $this->db->where_not_in('id', $id);
        }
        return $this->db->get($this->eco)->num_rows();
    }

    function check_NameEco($id = '', $description) {
        $this->db->where('description', $description);
        if($id) {
            $this->db->where_not_in('id', $id);
        }
        return $this->db->get($this->eco)->num_rows();
    }

//====================================================//
//                      BIOGEOLOCATION                //
//====================================================//
    public function createbio($data = [])
    {    
        return $this->db->insert($this->bio,$data);

    }

    public function updatebio($data = [])
    {
        return $this->db->where('id_tbz',$data['id_tbz'])
        ->update($this->bio,$data);       

    } 

    public function getDatabio($id_tbz=null)
    {
        return $this->db->select("*")           
            ->from($this->bio)
            ->where('id_tbz',$id_tbz)
            ->get()
            ->row();
    }

    function check_CodeBio($id = '', $tbzcode) {
        $this->db->where('TBZCode', $tbzcode);
        if($id) {
            $this->db->where_not_in('id_tbz', $id);
        }
        return $this->db->get($this->bio)->num_rows();
    }

    function check_NameBio($id = '', $tbzlocation) {
        $this->db->where('TBZlocation', $tbzlocation);
        if($id) {
            $this->db->where_not_in('id_tbz', $id);
        }
        return $this->db->get($this->bio)->num_rows();
    }

//====================================================//
//                      CLASSIFICATION                //
//====================================================//
    public function createclass($data = [])
    {    
        return $this->db->insert($this->nip,$data);

    }

    public function updateclass($data = [])
    {
        return $this->db->where('id_nip',$data['id_nip'])
        ->update($this->nip,$data);       

    } 

    public function getDataclass($id_nip=null)
    {
        return $this->db->select("*")           
            ->from($this->nip)
            ->where('id_nip',$id_nip)
            ->get()
            ->row();
    }

    function check_CodeClass($id = '', $nipcode) {
        $this->db->where('nipCode', $nipcode);
        if($id) {
            $this->db->where_not_in('id_nip', $id);
        }
        return $this->db->get($this->nip)->num_rows();
    }

    function check_NameClass($id = '', $nipdesc) {
        $this->db->where('nipDesc', $nipdesc);
        if($id) {
            $this->db->where_not_in('id_nip', $id);
        }
        return $this->db->get($this->nip)->num_rows();
    }

//====================================================//
//                      CATEGORY                      //
//====================================================//
    public function createcat($data = [])
    {    
        return $this->db->insert($this->cat,$data);

    }

    public function updatecat($data = [])
    {
        return $this->db->where('id_cat',$data['id_cat'])
        ->update($this->cat,$data);       

    } 

    public function getDatacat($id_cat=null)
    {
        return $this->db->select("*")           
            ->from($this->cat)
            ->where('id_cat',$id_cat)
            ->get()
            ->row();
    }

    function check_CodeCat($id = '', $categorycode) {
        $this->db->where('categoryCode', $categorycode);
        if($id) {
            $this->db->where_not_in('id_cat', $id);
        }
        return $this->db->get($this->cat)->num_rows();
    }

    function check_NameCat($id = '', $categoryname) {
        $this->db->where('categoryName', $categoryname);
        if($id) {
            $this->db->where_not_in('id_cat', $id);
        }
        return $this->db->get($this->cat)->num_rows();
    }

//====================================================//
//                      LEGISLATION                   //
//====================================================//
    public function createleg($data = [])
    {    
        return $this->db->insert($this->leg,$data);

    }

    public function updateleg($data = [])
    {
        return $this->db->where('id_legis',$data['id_legis'])
        ->update($this->leg,$data);       

    } 

    public function getDataleg($id_legis=null)
    {
        return $this->db->select("*")           
            ->from($this->leg)
            ->where('id_legis',$id_legis)
            ->get()
            ->row();
    }

    function check_CodeLeg($id = '', $legiscode) {
        $this->db->where('LegisCode', $legiscode);
        if($id) {
            $this->db->where_not_in('id_legis', $id);
        }
        return $this->db->get($this->leg)->num_rows();
    }

    function check_NameLeg($id = '', $legisdesc) {
        $this->db->where('LegisDesc', $legisdesc);
        if($id) {
            $this->db->where_not_in('id_legis', $id);
        }
        return $this->db->get($this->leg)->num_rows();
    }

//====================================================//
//                      CONSERVATION                  //
//====================================================//
    public function createcon($data = [])
    {    
        return $this->db->insert($this->leg,$data);

    }

    public function updatecon($data = [])
    {
        return $this->db->where('id_pac',$data['id_pac'])
        ->update($this->con,$data);       

    } 

    public function getDatacon($id_pac=null)
    {
        return $this->db->select("*")           
            ->from($this->con)
            ->where('id_pac',$id_pac)
            ->get()
            ->row();
    }

    function check_CodeCon($id = '', $cpabicode) {
        $this->db->where('CPABICode', $cpabicode);
        if($id) {
            $this->db->where_not_in('id_pac', $id);
        }
        return $this->db->get($this->con)->num_rows();
    }

    function check_NameCon($id = '', $CPABIdesc,$cpacode) {
        $cpid = $this->input->post('cpacode');
        // $this->db->where('CPABIdesc', $CPABIdesc AND);
        $where = "CPABIdesc='$CPABIdesc' AND CPAreaCode='$cpid'";

        $this->db->where($where);       

        if($id) {
            $this->db->where_not_in('id_pac', $id);
        }
        return $this->db->get($this->con)->num_rows();
    }

    public function conList()
    {
        $result = $this->db->select("*")
        ->from('tblpacparea')
        ->get()
        ->result();
        $list[''] = "SELECT CONSERVATION";
        if (!empty($result)){ 
            foreach ($result as $value) {
                $list[$value->id_pacparea] = strtoupper($value->CPAreaDesc);
            }
            return $list;
        } else {
            return false;
        }
    }

//====================================================//
//                  WETLAND TYPE                      //
//====================================================//
    public function createwltype($data = [])
    {    
        return $this->db->insert($this->wtype,$data);

    }

    public function updatewltype($data = [])
    {
        return $this->db->where('id_wtype',$data['id_wtype'])
        ->update($this->wtype,$data);       

    } 

    public function getDatawtype($id_wtype=null)
    {
        return $this->db->select("*")           
            ->from($this->wtype)
            ->where('id_wtype',$id_wtype)
            ->get()
            ->row();
    }

    function check_Codewtype($id = '', $wtypecode) {
        $this->db->where('wtypecode', $wtypecode);
        if($id) {
            $this->db->where_not_in('id_wtype', $id);
        }
        return $this->db->get($this->wtype)->num_rows();
    }

    function check_Namewtype($id = '', $wtypedesc) {
        $this->db->where('wtypedesc', $wtypedesc);
        if($id) {
            $this->db->where_not_in('id_wtype', $id);
        }
        return $this->db->get($this->wtype)->num_rows();
    }

//====================================================//
//                  WETLAND DESC                      //
//====================================================//
    public function createwldesc($data = [])
    {    
        return $this->db->insert($this->wdesc,$data);

    }

    public function updatewldesc($data = [])
    {
        return $this->db->where('id_wdesc',$data['id_wdesc'])
        ->update($this->wdesc,$data);       

    } 

    public function getDatawdesc($id_wdesc=null)
    {
        return $this->db->select("*")           
            ->from($this->wdesc)
            ->where('id_wdesc',$id_wdesc)
            ->get()
            ->row();
    }

    function check_Codewdesc($id = '', $wdesccode) {
        $this->db->where('wdesccode', $wdesccode);
        if($id) {
            $this->db->where_not_in('id_wdesc', $id);
        }
        return $this->db->get($this->wdesc)->num_rows();
    }

    function check_Namewdesc($id = '',$wtypeid, $wdescdesc) {
        $mc = $this->input->post('wtypeid');
        $where = "wdesccode='$wdescdesc' AND wtype_id='$mc'";

        $this->db->where($where);
        if($id) {
            $this->db->where_not_in('id_wdesc', $id, 'wtype_id', $mc);
        }
        return $this->db->get($this->wdesc)->num_rows();
    }

     public function wtypelist()
    {

        $result = $this->db->select("*")
            ->from('tblwetlandtype')
            ->get()
            ->result();

            $list[''] = "SELECT TYPE OF WETLAND";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_wtype] = strtoupper($value->wtypedesc);
            }
            return $list;
        } else {
            return false;
        }
            
    }
}