<?php defined('BASEPATH') OR exit('No direct script access allowed!');
/**
 * 
 */
class dashboard_model extends CI_Model
{
	private $user	=  "tbluser";
    private $blood  = "tblbloodtype";
    private $sex    = "tblsex";
    private $region = "tbllocregion";
    private $pamain = "tblpamain";

    public function queryannual1($user_id,$year,$year2,$pa)
    {
        return $this->db->select('SUM(entrancefee + facilities + resource + concession) as ggtotal ,SUM(entrancefee) as total1, SUM(facilities) as total2, SUM(resource) as total3, SUM(concession) as total4, date_month_income,date_year_income,year')
        ->join('tbldateyear','tblpaipafincome.date_year_income=tbldateyear.year','leaft')
        ->where('generatedcode', $pa)
        ->where('date_year_income >=', $year)
        ->where('date_year_income <=', $year2)
        ->group_by('date_year_income')
        ->get('tblpaipafincome')
        ->result();
    }

    public function queryannual2($user_id,$year,$year2,$pa)
    {
        return $this->db->select('SUM(other_amount) as other_amounts,id_fromincome,income_year,income_month')
        ->where('generatedcode', $pa)
        ->where('income_year >=', $year)
        ->where('income_year <=', $year2)
        ->group_by('income_year')
        ->get('tblpaipafincomeothers')
        ->result();
    }

    public function queryannual3($user_id,$year,$year2,$pa)
    {
        return $this->db->select('SUM(disbursement_amount) as disburse_amount,id_fromincome,disbursement_year,disbursement_month')
        ->where('generatedcode', $pa)
        ->where('disbursement_year >=', $year)
        ->where('disbursement_year <=', $year2)
        ->group_by('disbursement_year')
        ->get('tblpaipafdisbursement')
        ->result();
    }


    public function queryyear($year,$year2)
    {
        return $this->db->select('year')
                    ->where('year >=', $year)
                    ->where('year <=', $year2)
                    ->get('tbldateyear')
                    ->result();
    }

    public function yearListed()
    {
        $years = range(date("Y"),1900);        
            $list[''] = "Year";
                if (!empty($years)) {
                    foreach ($years as $value) {
                        $list[$value] = $value;
            }
            return $list;
        } else {
            return false;
        }
    }

     public function QuarterlyList()
    {
        $result = $this->db->select("*")
            ->from('tbldatemonth')
            ->get()
            ->result();

            $list[''] = "Select Quarter";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->QtrCode] = $value->QtrCode;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function getYear(){               
        $query = $this->db->query("SELECT DISTINCT year FROM tbldateyear ORDER BY year DESC");
        return $query->result();
    }

    public function getMonth(){       
        $query = $this->db->query("SELECT month FROM tbldatemonth ");
        return $query->result();
    }

    public function queryVisitorsMonth($year,$quarter,$pa,$user_id)
    {
        return $this->db->select('')
                        ->join('tblpaipafvisitors','tbldatemonth.month = tblpaipafvisitors.date_month','LEFT')
                        ->where('QtrCode',$quarter)
                        ->group_by('month')          
                        ->order_by('id_month')              
                        ->get('tbldatemonth')
                        ->result();
    }

    public function queryVisitors($year,$quarter,$pa,$user_id)
    {
        return $this->db->select('(no_male_local + no_male_foreign) as totalMale, (no_female_local + no_female_foreign) as totalFemale, tblpaipafvisitors.generatedcode,date_month,date_year,month,id_month')
                        ->join('tblpamain','tblpaipafvisitors.generatedcode = tblpamain.generatedcode','LEFT')
                        ->join('tbldatemonth','tblpaipafvisitors.date_month = tbldatemonth.month','LEFT')
                        ->where('QtrCode',$quarter)
                        ->where('pasu_id',$user_id)
                        ->where('tblpaipafvisitors.generatedcode',$pa)
                        ->where('date_year',$year)
                        ->group_by('date_month')
                        ->group_by('tblpaipafvisitors.generatedcode')
                        ->order_by('id_month')
                        ->get('tblpaipafvisitors')
                        ->result();
    }

    public function incomefeebymonth($paid,$yearid,$quarter)
    {
        return $this->db->select('SUM(entrancefee) as total_entrance, SUM(tblpaipafincome.facilities) as total_facility, SUM(resource) as total_resource, SUM(concession) as total_concession')
        ->join('tbldatemonth','tblpaipafincome.date_month_income = tbldatemonth.month','LEFT')
        ->where('QtrCode',$quarter)
        ->where('tblpaipafincome.generatedcode',$paid)
        ->where('date_year_income',$yearid)
        ->get('tblpaipafincome')
        ->result();
    }

    public function incomeotherfeebymonth($paid,$yearid,$quarter)
    {
        return $this->db->select('SUM(other_amount) as total_others')
        ->join('tbldatemonth','tblpaipafincomeothers.income_month = tbldatemonth.month','LEFT')
        ->where('tblpaipafincomeothers.generatedcode',$paid)
        ->where('income_year',$yearid)
        ->where('QtrCode',$quarter)        
        // ->group_by('date_month_income')
        ->get('tblpaipafincomeothers')
        ->result();
    }

    public function incomedistributionfeebymonth($paid,$yearid,$quarter)
    {
        return $this->db->select('SUM(disbursement_amount) as total_distribution')
        ->join('tbldatemonth','tblpaipafdisbursement.disbursement_month = tbldatemonth.month','LEFT')
        ->where('tblpaipafdisbursement.generatedcode',$paid)
        ->where('disbursement_year',$yearid)
        ->where('QtrCode',$quarter)        
        ->get('tblpaipafdisbursement')
        ->result();
    }

    public function queryresultbyyear($user_id,$paid,$yearid)
    {
        return $this->db->select('*')
        ->order_by('LENGTH(id_month)')
        ->order_by('id_month')
        ->get('tbldatemonth')
        ->result();
    }

    public function queryresultbyyears($user_id,$paid,$yearid)
    {
        return $this->db->select('SUM(entrancefee + facilities + resource + concession ) as incomeit,date_year_income,date_month_income,month,id_income')
        ->join('tbldatemonth','tblpaipafincome.date_month_income=tbldatemonth.month','left')        
        ->where('tblpaipafincome.generatedcode',$paid)
        ->where('date_year_income',$yearid)
        ->group_by(array('date_month_income'))
        ->order_by('LENGTH(id_month)')
        ->order_by('id_month')
        ->get('tblpaipafincome')
        ->result();
    }

    public function queryresultOthersbyyears($user_id,$paid,$yearid)
    {
        return $this->db->select('SUM(other_amount) as othersum,income_year,income_month,id_fromincome,month')
        ->join('tbldatemonth','tblpaipafincomeothers.income_month=tbldatemonth.month','left')
        ->where('generatedcode',$paid)
        ->where('income_year',$yearid)
        ->order_by('LENGTH(month)')
        ->order_by('month')
        ->group_by(array('income_month'))
        ->get('tblpaipafincomeothers')
        ->result();
    }


    public function queryresultdisbyyears($user_id,$paid,$yearid)
    {
        return $this->db->select('SUM(disbursement_amount) as dissum,disbursement_year,disbursement_month')
        ->join('tbldatemonth','tblpaipafdisbursement.disbursement_amount=tbldatemonth.month','left')
        ->where('generatedcode',$paid)
        ->where('disbursement_year',$yearid)
        ->order_by('LENGTH(month)')
        ->order_by('month')
        ->group_by(array('disbursement_month'))
        ->get('tblpaipafdisbursement')
        ->result();
    }

    public function queryresultdisbursementbyyears($user_id,$paid,$yearid){    
        return $this->db->select('SUM(disbursement_amount) as sumdisburse,id_fromincome,disbursement_month')
        ->where_in('disbursement_year',$yearid)
        ->where_in('generatedcode',$paid)
        ->group_by('id_fromincome')
        ->get('tblpaipafdisbursement')
        ->result();
    }

    public function getEarning($year,$user_id){
        return $this->db->select(" 
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
                            (entrance + parkingfee + rentalsfee + others) AS grand_total")
        ->join('tblpamain','tblpavisitorsrate.generatedcode = tblpamain.generatedcode','left')
        ->join('tbluser','tblpamain.pasu_id = tbluser.user_id','left')
        ->where('tblpavisitorsrate.date_year',$year)
        ->where('tblpamain.pasu_id',$user_id)   
        ->order_by("STR_TO_DATE('tblpavisitorsrate.date_month','%m')")
        ->get('tblpavisitorsrate')->result();
    }
        public function read_by_id($user_id = null)
        {
                return $this->db->select("*")
                        ->join('tbllocregion','tbluser.region = tbllocregion.id','LEFT')
                        ->join('tblsex','tbluser.sex = tblsex.id','LEFT')
                        ->join('tblbloodtype','tbluser.blood_type = tblbloodtype.id_blood','LEFT')
                        ->from($this->user)
                        ->where('user_id',$user_id)
                        ->get()
                        ->row();
        } 

        
        public function getPA($user_id)
        {
        $this->db->join('tblpacategory','tblpamain.pacategory_id = tblpacategory.id_cat','LEFT');
        $this->db->join('tblnip','tblpamain.nip_id = tblnip.id_nip','LEFT');
        $this->db->join('tblpacareadesc','tblpamain.cpabi_id = tblpacareadesc.id_pac','LEFT');
        $this->db->where('pasu_id',$user_id);
        $query = $this->db->get($this->pamain);
        return $query->result();

        } 

	public function region_display($user_region){		 
        return $this->db->select("*")
                        ->join('tblbloodtype','tbluser.blood_type = tblbloodtype.id_blood','LEFT')
        		->join('tbllocregion','tbluser.region = tbllocregion.id','LEFT')
                        ->from($this->user)
                        ->where('region',$user_region)
                        ->get()
                        ->row();
	}

        public function blood_list()
        {
        $result = $this->db->select("*")
            ->from($this->blood)
            ->get()
            ->result();

            $list[''] = "Select Blood";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_blood] = strtoupper($value->symbol);
            }
            return $list;
        } else {
            return false;
        }            
        }

        public function gender_list()
        {
        $result = $this->db->select("*")
            ->from($this->sex)
            ->get()
            ->result();

            $list[''] = "Select Gender";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id] = strtoupper($value->sexdesc);
            }
            return $list;
        } else {
            return false;
        }            
        }

        function check_email($id, $email) {
        $this->db->where('email', $email);
        if($id) {
            $this->db->where_not_in('user_id', $id);
        }
        return $this->db->get($this->user)->num_rows();
        }

        public function createMain($data = [])
        {
        return $this->db->insert($this->user,$data);
        }

        public function updateProfile($data = [])
        {
        return $this->db->where('user_id',$data['user_id'])
        ->update($this->user,$data);
        }

        public function updatePass($data = [])
        {
                return $this->db->where('user_id',$data['user_id'])
                ->update($this->user,$data);           

        } 

        public function fetchPasswordHashFromDB($id)
        {
            $this->db->where('user_id', $id);
            $query = $this->db->get('tbluser');
            return $query->row();
         
        } 


        public function yearList()
    {

        $result = $this->db->select("*")
            ->from('tbldateyear')
            ->get()
            ->result();

            $list[''] = "Year";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->year] = $value->year;
            }
            return $list;
        } else {
            return false;
        }
    }
         public function region_list()
        {
        $result = $this->db->select("*")
            ->from($this->region)
            ->get()
            ->result();

            $list[''] = "Select Region";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id] = $value->regionName;
            }
            return $list;
        } else {
            return false;
        }            
        }

    public function get_all_regions($user_region) 
    { 
        return $this->db->select('tblpacategory.categoryName,COUNT(tblpamain.pacategory_id) as total')
                        ->join('tblpacategory','tblpamain.pacategory_id = tblpacategory.id_cat','LEFT')
                        ->join('tbluser','tblpamain.pasu_id=tbluser.user_id','LEFT')
                        ->where('tbluser.region',$user_region)
                        ->group_by('tblpamain.pacategory_id')                        
                        // ->group_by('tblpamain.generatedcode')
                        ->get('tblpamain')->result(); 
    } 

    public function get_by_classification($user_region) 
    { 
        return $this->db->select('tblnip.nipDesc,COUNT(nip_id) as total')
                        ->join('tblnip','tblpamain.nip_id = tblnip.id_nip','LEFT')
                        ->join('tbluser','tblpamain.pasu_id=tbluser.user_id','LEFT')
                        ->where('tbluser.region',$user_region)
                        ->group_by('tblpamain.nip_id')
                        ->get('tblpamain')->result(); 
    } 

    public function get_by_cpa($user_region) 
    { 
        return $this->db->select('tblpacareadesc.CPABIdesc,COUNT(cpabi_id) as total')
                        ->join('tblpacareadesc','tblpamain.cpabi_id = tblpacareadesc.id_pac','LEFT')
                        ->join('tbluser','tblpamain.pasu_id=tbluser.user_id','LEFT')
                        ->where('tbluser.region',$user_region)
                        ->group_by('tblpamain.cpabi_id')
                        ->get('tblpamain')->result(); 
    } 

    public function countPa($user_id)
    {
        $this->db->where('pasu_id',$user_id);
        $query= $this->db->get('tblpamain');
            return $query->num_rows();
    }

    public function line_chart($user_id,$paid) {
   
        $query = $this->db->select('(entrancefee + tblpaipafincome.facilities + resource + concession + other_specify_amount) as Grand_total_income,
            (entrancefee + tblpaipafincome.facilities + resource + concession + other_specify_amount)*0.75 as total_75,
            (entrancefee + tblpaipafincome.facilities + resource + concession + other_specify_amount)*0.25 as total_25,
            SUM(entrancefee + tblpaipafincome.facilities + resource + concession + other_specify_amount) as Grand_total_btr,
            id_income,tblpaipafincome.generatedcode,date_month_income,date_year_income,entrancefee,tblpaipafincome.facilities,resource,concession,
            other_specify_title,other_specify_amount,pasu_id,month')
        ->join('tbldatemonth','tblpaipafincome.date_month_income = tbldatemonth.month')
        ->join('tblpamain','tblpaipafincome.generatedcode = tblpamain.generatedcode')
        ->where('pasu_id',$user_id)
        ->where('tblpaipafincome.generatedcode',$paid)
        ->group_by('tblpaipafincome.generatedcode');
        $query = $this->db->get('tblpaipafincome');
        // return $query->result();

        return $query->result();
       
    }

    public function paList()
    {
        $user_id = $this->session->userdata('user_id');

        $result = $this->db->select("*")
            ->join('tblpamain','tblipafsourceincome.generatedcode = tblpamain.generatedcode','LEFT')
            ->from('tblipafsourceincome')
            ->where('tblpamain.pasu_id',$user_id)
            ->get()
            ->result();

            $list[''] = "Select Protected Area";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->generatedcode] = $value->pa_name;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function paListvisitor()
    {
        $user_id = $this->session->userdata('user_id');

        $result = $this->db->select("*")
            ->join('tblpamain','tblpaipafvisitors.generatedcode = tblpamain.generatedcode','LEFT')
            ->from('tblpaipafvisitors')
            ->where('tblpamain.pasu_id',$user_id)
            ->get()
            ->result();

            $list[''] = "Select Protected Area";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->generatedcode] = $value->pa_name;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function QuerybyYearIncome($user_id,$paid,$yearid)
    {
        return $this->db->select('(entrancefee + facilities + resource + concession) as incomeit,date_year_income,date_month_income,id_income')
        ->where('generatedcode',$paid)
        ->where('date_year_income',$yearid)
        ->group_by('date_month_income')
        ->get('tblpaipafincome')
        ->result();
    }

    public function QuerybyYearOthers($user_id,$paid,$yearid)
    {
        return $this->db->select('SUM(other_amount) as otheramount,income_month,income_year,id_fromincome')
        ->where('generatedcode',$paid)
        ->where('income_year',$yearid)
        ->group_by('income_month')
        ->get('tblpaipafincomeothers')
        ->result();
    }
    
}