<?php defined('BASEPATH') OR exit ('No direct access script allowed!');
/**
 *
 */
class Pamain_Model extends CI_Model
{
    var $conf;
    function __construct(){
        parent::__construct();
            $this->conf=array(
            'start_day'=>'monday',
            'show_next_prev'=>TRUE,
            'next_prev_url'=>base_url().'calendar/display'
            );

            $this->conf['template'] = '

               {table_open}<table border="0" cellpadding="0" cellspacing="0" class="calendar" >{/table_open}

               {heading_row_start}<tr>{/heading_row_start}

               {heading_previous_cell}<th><a href="{previous_url}"><button id="prev-button"class ="leftarrow" >&lt;&lt;</button></a></th>{/heading_previous_cell}
               {heading_title_cell}<th class="date text-center" style="font-size:20px" id="tempdate" colspan="{colspan}">{heading}</th>{/heading_title_cell}
               {heading_next_cell}<th><a href="{next_url}"><button class ="rightarrow pull-right">&gt;&gt;</button></a></th>{/heading_next_cell}

               {heading_row_end}</tr>{/heading_row_end}

               {week_row_start}<tr class="elem" style="height:50px">{/week_row_start}
               {week_day_cell}<td><div class="bold text-center" style="font-size:18px">{week_day}</td></div>{/week_day_cell}
               {week_row_end}</tr>{/week_row_end}

               {cal_row_start}<tr class ="days">{/cal_row_start}
               {cal_cell_start}<td  id="div-day" class ="day">{/cal_cell_start}

               {cal_cell_content}
               <div class ="day_num">{day}</div>
               <div class="content hidden"  >{content}</div>
               {/cal_cell_content}

               {cal_cell_content_today}
               <div class="day_num highlight" >{day}</div>
               <div class="content hidden"  >{content}</div>
               {/cal_cell_content_today}

               {cal_cell_no_content}<div class="day_num">{day}</div>{/cal_cell_no_content}
               {cal_cell_no_content_today}<div class="day_num highlight">{day}</div>{/cal_cell_no_content_today}

               {cal_cell_blank}&nbsp;{/cal_cell_blank}

               {cal_cell_end}</td>{/cal_cell_end}
               {cal_row_end}</tr>{/cal_row_end}

               {table_close}</table>{/table_close}
            ';
    }

    private $table = 'tblpamain';
    private $table2 ='tblpamainlocation';
    private $table3 = 'tblpamainlegislation';
    private $table4 = 'tblpambmember';
    private $table5 = 'tblwspeciesgenus';
    private $table6 = 'tblpamainbiological';
    private $table7 = 'tblmainprojects';
    private $table8 = 'tblsrpaoregister';
    private $table9 =  'tblpamainimageupload';
    private $table10 = 'tblpavisitorsrate';
    private $table11 = 'tblpaecotourism';
    private $table12 = 'tblpaattraction';
    private $table13 = 'tblpafacility';
    private $tablestrict = 'tblstrictprotzone';
    private $tablemultiple = 'tblpamultiplezone';
    private $categorySpecies = 'tblwcategory';
    private $pambcount = 'tblpambmember';
    private $fee = 'tblpamainvisitor';
    private $fee_new = 'tblpamainvisitorpa';
    private $pambfile =  'tblpambmemberfile';
    private $Agro   = 'tblpaagroforestry';
    private $threat   = 'tblpathreat';
    private $ref   = 'tblpareference';
    private $ipafs   = 'tblpaipaf';
    private $lgu   = 'tblpalgu';
    private $tabletopo = 'tblpatopology';
    private $tablesoil = 'tblpageology';
    private $tableclimate = 'tblpaclimate';
    private $tablelandslide = 'tblpahazardlandslide';
    private $tableflooding = 'tblpahazardflooding';
    private $tablesealevel = 'tblpahazardsealevelrise';
    private $tabletsunami = 'tblpahazardtsunami';
    private $tableecon = 'tblpaeconomicprofile';
    private $program = 'tblmainprograms';
    private $research = 'tblmainresearcher';
    private $spiecies = 'tblwspeciesgenus';
    private $staff = 'tblpasustaff';

    public function generate($year,$month){
    $this->load->library('calendar',$this->conf);
    /*echo $this->calendar->generate($year,$month);*/;
    // $cal_data= $this->get_calendar_data($year,$month);
    return $this->calendar->generate($year,$month);
    }

    public function searcdateincome($codegens,$month,$year){

        $this->db->select('(entrancefee + facilities + resource + concession  ) as Grand_total_income,
            (entrancefee + facilities + resource + concession)*0.75 as total_75,
            (entrancefee + facilities + resource + concession)*0.25 as total_25,
            (entrancefee + facilities + resource + concession) as Grand_total_btr,date_day_income,
            id_income,tblpaipafincome.generatedcode,date_month_income,date_day_income,date_year_income,entrancefee,facilities,resource,concession,other_specify_title,other_specify_amount,certificate_receipt,bank_deposit_file')
        ->join('tbldatemonth','tblpaipafincome.date_month_income = tbldatemonth.month','LEFT')
        ->where('generatedcode',$codegens)
        ->where('date_year_income',$year)
        ->where('date_month_income',$month)
        ->order_by('date_day_income')
        ->order_by('LENGTH(date_day_income)');
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function searchgetallIpafdisbursement($codegens,$month,$year,$id){
        $this->db->select('group_concat(disbursement_remarks,": ",disbursement_amount separator "<br> ") as trydisburse,disbursement_month,id_fromincome,disbursement_day,disbursement_year,generatedcode,id_ipafdisburse,disbursement_remarks,disbursement_amount,SUM(disbursement_amount) as sumdisbursement')
        ->where('disbursement_year',$year)
        ->where('disbursement_month',$month)
        ->where('id_fromincome',$id)
        ->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaipafdisbursement');
        return $query->result();
    }

    public function searchgetallIpafother($codegens,$month,$year,$id){
        $this->db->select('group_concat(other_title,": ",other_amount separator "<br> ") as try2,income_month,income_day,income_year,generatedcode,id_fromincome,id_incomeP,other_title,other_amount,SUM(other_amount) as sumOther')
        ->where('income_year',$year)
        ->where('income_month',$month)
        ->where('id_fromincome',$id)
        ->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaipafincomeothers');
        return $query->result();
    }

    public function searchGrandtotalIpafother($codegens,$month,$year){
        $this->db->select('income_month,income_day,income_year,generatedcode,id_fromincome,id_incomeP,other_title,other_amount,SUM(other_amount) as GsumOther')
        ->where('income_year',$year)
        ->where('income_month',$month)
        // ->where('id_fromincome',$id)
        ->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaipafincomeothers');
        return $query->result();
    }

    public function searchGrandtotalIpafdisburse($codegens,$month,$year){
        $this->db->select('disbursement_month,disbursement_day,disbursement_year,id_ipafdisburse,generatedcode,id_fromincome,disbursement_remarks,disbursement_amount,SUM(disbursement_amount) as DsumOther')
        ->where('disbursement_year',$year)
        ->where('disbursement_month',$month)
        // ->where('id_fromincome',$id)
        ->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaipafdisbursement');
        return $query->result();
    }

    public function searchGrandtotalIpafdevelopment($codegens,$month,$year){
        $this->db->select('dev_month,dev_day,dev_year,id_devfees,generatedcode,id_fromincome,dev_remarks,devfee_amount,SUM(devfee_amount) as DevsumOther')
        ->where('dev_year',$year)
        ->where('dev_month',$month)
        // ->where('id_fromincome',$id)
        ->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaipafdevfee');
        return $query->result();
    }

    public function searchGrandtotalIPAF($codegens,$month,$year){
        $this->db->select('(entrancefee + facilities + resource + concession  ) as Grand_total_income,
            (entrancefee + facilities + resource + concession)*0.75 as total_75,
            (entrancefee + facilities + resource + concession)*0.25 as total_25,
            (entrancefee + facilities + resource + concession) as Grand_total_btr,date_day_income,
            SUM(entrancefee + facilities + resource + concession) as sumgtotal,
            id_income,tblpaipafincome.generatedcode,date_month_income,date_year_income,entrancefee,facilities,resource,concession,other_specify_title,other_specify_amount')
        ->where('generatedcode',$codegens)
        ->where('date_month_income',$month)
        ->where('date_year_income',$year)
        // ->where('id_fromincome',$id)
        ->order_by('LENGTH(date_day_income)')
        ->order_by('date_day_income');
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function searcdateincome1($codegens,$month,$year){
        $this->db->select('(entrancefee + facilities + resource + concession ) as Grand_total_income,
            (entrancefee + facilities + resource + concession ))*0.75 as total_75,
            (entrancefee + facilities + resource + concession))*0.25 as total_25,
            (entrancefee + facilities + resource + concession)) as Grand_total_btr,
            id_income,tblpaipafincome.generatedcode,date_month_income,date_year_income,entrancefee,facilities,resource,concession,other_specify_title,other_specify_amount')
        ->where('tblpaipafincome.generatedcode',$codegens)
        ->where('date_month_income',$month)
        ->where('date_year_income',$year);
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function searcdatetrust($codegens){
        $date = new DateTime("now");
        $curr_year = $date->format('Y');
        $curr_month = $date->format('F');

        $this->db->select('id_contrisub,trustfund,mode_payment,contri_amount,contri_remarks,id_trustreceipt,tblpaipaftrustreciept.generatedcode,trust_month,trust_day,trust_year,group_concat(DISTINCT(tblfinancialassistance.finance_desc) separator "<br> ") as finance, group_concat(DISTINCT(tblfinancialassistancesub.description) separator "<br> ") as mode,group_concat(DISTINCT(tblpaipafcontrisub.contri_amount) separator "<br> ") as amounts, group_concat(DISTINCT(tblpaipafdevfee.dev_remarks) ,"- ", tblpaipafdevfee.devfee_amount separator "<br>") as dconamount, group_concat(DISTINCT(tblpaipafpenalty.penalty_remarks) ,"- ", tblpaipafpenalty.penalty_amount separator "<br>") as dconpenaltyamount')
        ->join('tblpaipafcontrisub','tblpaipaftrustreciept.id_trustreceipt = tblpaipafcontrisub.id_fromcontri','LEFT')
        ->join('tblpaipafdevfee','tblpaipaftrustreciept.id_trustreceipt = tblpaipafdevfee.id_fromtrust','LEFT')
        ->join('tblpaipafpenalty','tblpaipaftrustreciept.id_trustreceipt = tblpaipafpenalty.id_fromtrust','LEFT')
        ->join('tblfinancialassistance','tblpaipafcontrisub.trustfund = tblfinancialassistance.id_financial','LEFT')
        ->join('tblfinancialassistancesub','tblpaipafcontrisub.mode_payment = tblfinancialassistancesub.id_finance_sub','LEFT')
        ->where('tblpaipaftrustreciept.generatedcode',$codegens)
        // ->where('trust_month',$curr_month)

        ->where('trust_year',$curr_year);
        $query = $this->db->get('tblpaipaftrustreciept');
        return $query->result();
    }

    public function getsearcdatetrust($codegens,$month,$year){

        $this->db->select('id_contrisub,trustfund,mode_payment,contri_amount,contri_remarks,id_trustreceipt,tblpaipaftrustreciept.generatedcode,trust_month,trust_day,trust_year,group_concat(DISTINCT(tblfinancialassistance.finance_desc) separator "<br> ") as finance, group_concat(DISTINCT(tblfinancialassistancesub.description) separator "<br> ") as mode,group_concat(DISTINCT(tblpaipafcontrisub.contri_amount) separator "<br> ") as amounts, group_concat(DISTINCT(tblpaipafdevfee.dev_remarks) ,"- ", tblpaipafdevfee.devfee_amount separator "<br>") as dconamount, group_concat(DISTINCT(tblpaipafpenalty.penalty_remarks) ,"- ", tblpaipafpenalty.penalty_amount separator "<br>") as dconpenaltyamount')
        ->join('tblpaipafcontrisub','tblpaipaftrustreciept.id_trustreceipt = tblpaipafcontrisub.id_fromcontri','LEFT')
        ->join('tblpaipafdevfee','tblpaipaftrustreciept.id_trustreceipt = tblpaipafdevfee.id_fromtrust','LEFT')
        ->join('tblpaipafpenalty','tblpaipaftrustreciept.id_trustreceipt = tblpaipafpenalty.id_fromtrust','LEFT')
        ->join('tblfinancialassistance','tblpaipafcontrisub.trustfund = tblfinancialassistance.id_financial','LEFT')
        ->join('tblfinancialassistancesub','tblpaipafcontrisub.mode_payment = tblfinancialassistancesub.id_finance_sub','LEFT')
        ->where('tblpaipaftrustreciept.generatedcode',$codegens)
        // ->where('trust_month',$month)
        ->where('trust_year',$year)
        ->order_by('LENGTH(trust_day)')
        ->order_by('trust_day');
        $query = $this->db->get('tblpaipaftrustreciept');
        return $query->result();
    }

    public function get_trust_data($id){
        $this->db->select('*');
        $this->db->join('tblfinancialassistance','tblpaipafcontrisub.trustfund = tblfinancialassistance.id_financial','LEFT');
        $this->db->join('tblfinancialassistancesub','tblpaipafcontrisub.mode_payment = tblfinancialassistancesub.id_finance_sub','LEFT');
        $this->db->from('tblpaipafcontrisub');
        $this->db->where('id_fromcontri',$id);
        $res = $this->db->get();
        return $res->result();
    }

    public function get_development_data($id){
        $this->db->select('*');
        $this->db->from('tblpaipafdevfee');
        $this->db->where('id_fromtrust',$id);
        $res = $this->db->get();
        return $res->result();
    }

    public function get_penalty_data($id){
        $this->db->select('*');
        $this->db->from('tblpaipafpenalty');
        $this->db->where('id_fromtrust',$id);
        $res = $this->db->get();
        return $res->result();
    }


    public function addincome($data){
        $this->db->insert('tblpaipafincome',$data);
        return $this->db->insert_id();
    }

    // public function addResearchNextID($data){
    //     $this->db->insert('tblmainresearch',$data);
    //     return $this->db->insert_id();
    // }

    public function addResearchNextID($data,$rel_data1,$rel_data2)
    {
    date_default_timezone_set('Asia/Manila'); # add your city to set local time zone
    $now = date('Y-m-d');
        if (!empty($rel_data1)) {
            for($x11 = 0; $x11 < count($rel_data1); $x11++){
            $datas[] = array(
                "generatedcode" => $rel_data1[$x11]["generatedcode"],
                "research_code" => $rel_data1[$x11]["research_code"],
                "pambreso_no" => $rel_data1[$x11]['pambreso_no'],
                "pambreso_title" => $rel_data1[$x11]['pambreso_title'],
                "file_nameReso" => $rel_data1[$x11]['file_nameReso']);
            }
        }

      if (!empty($rel_data2)) {
        for($x2 = 0; $x2 < count($rel_data2); $x2++){
        $datasother[] = array(         
          "generatedcode" => $rel_data2[$x2]["generatedcode"],
          "research_code" => $rel_data2[$x2]["research_code"],
          "ref_date_month" => $rel_data2[$x2]['ref_date_month'],
          "ref_date_year" => $rel_data2[$x2]['ref_date_year'],
          "type_citation" => $rel_data2[$x2]['type_citation'],
          "author" => $rel_data2[$x2]['author'],
          "webtitleRef" => $rel_data2[$x2]['webtitleRef'],
          "websiteRef" => $rel_data2[$x2]['websiteRef'],
          "worktitleRef" => $rel_data2[$x2]['worktitleRef'],
          "bookpublisherRef" => $rel_data2[$x2]['bookpublisherRef'],
          "journaltitleRef" => $rel_data2[$x2]['journaltitleRef'],
          "periodicalRef" => $rel_data2[$x2]['periodicalRef'],
          "journalVolRef" => $rel_data2[$x2]['journalVolRef'],
          "journalpagerangeRef" => $rel_data2[$x2]['journalpagerangeRef'],
          "link" => $rel_data2[$x2]['link'],
          "ref_desc" => $rel_data2[$x2]['ref_desc'],
          'id_program' => $rel_data2[$x2]["id_program"]);
        }
      }

      try{
        if (!empty($rel_data1)) {
          for($x =0; $x<count($rel_data1); $x++){
            $this->db->insert('tblmainresearch_pambreso',$datas[$x]);
          }
        }
        if (!empty($rel_data2)) {
          for($y =0; $y<count($rel_data2); $y++){
            $this->db->insert('tblpareference',$datasother[$y]);
          }
        }

        $this->db->insert('tblmainresearch',$data);
        return "success";
      }catch(Exception $e){
        return "failed";
      }
    }

    public function addResearchNextIDnew($data,$rel_data1,$rel_data2)
    {
    date_default_timezone_set('Asia/Manila'); # add your city to set local time zone
    $now = date('Y-m-d');
      if (!empty($rel_data1)) {
        for($x11 = 0; $x11 < count($rel_data1); $x11++){
        $datas[] = array(
          "generatedcode" => $rel_data1[$x11]["generatedcode"],
          "research_code" => $rel_data1[$x11]["research_code"],
          "pambreso_no" => $rel_data1[$x11]['pambreso_no'],
          "pambreso_title" => $rel_data1[$x11]['pambreso_title'],
          "file_nameReso" => $rel_data1[$x11]['file_nameReso']);
        }
      }

      if (!empty($rel_data2)) {
        for($x2 = 0; $x2 < count($rel_data2); $x2++){
        $datasother[] = array(
          "generatedcode" => $rel_data2[$x2]["generatedcode"],
          "research_code" => $rel_data2[$x2]["research_code"],
          "ref_date_month" => $rel_data2[$x2]['ref_date_month'],
          "ref_date_year" => $rel_data2[$x2]['ref_date_year'],
          "type_citation" => $rel_data2[$x2]['type_citation'],
          "author" => $rel_data2[$x2]['author'],
          "webtitleRef" => $rel_data2[$x2]['webtitleRef'],
          "websiteRef" => $rel_data2[$x2]['websiteRef'],
          "worktitleRef" => $rel_data2[$x2]['worktitleRef'],
          "bookpublisherRef" => $rel_data2[$x2]['bookpublisherRef'],
          "journaltitleRef" => $rel_data2[$x2]['journaltitleRef'],
          "periodicalRef" => $rel_data2[$x2]['periodicalRef'],
          "journalVolRef" => $rel_data2[$x2]['journalVolRef'],
          "journalpagerangeRef" => $rel_data2[$x2]['journalpagerangeRef'],
          "link" => $rel_data2[$x2]['link'],
          "ref_desc" => $rel_data2[$x2]['ref_desc'],
      );
        }
      }

      try{
        if (!empty($rel_data1)) {
          for($x =0; $x<count($rel_data1); $x++){
            $this->db->insert('tblmainresearch_pambreso',$datas[$x]);
          }
        }
        if (!empty($rel_data2)) {
          for($y =0; $y<count($rel_data2); $y++){
            $this->db->insert('tblpareference',$datasother[$y]);
          }
        }

        $this->db->insert('tblmainresearch',$data);
        return "success";
      }catch(Exception $e){
        return "failed";
      }
    }

    public function addeventPA($data,$rel_data1)
    {
    date_default_timezone_set('Asia/Manila'); # add your city to set local time zone
    $now = date('Y-m-d');
      if (!empty($rel_data1)) {
        for($x11 = 0; $x11 < count($rel_data1); $x11++){
        $datas[] = array(
          "generatedcode" => $rel_data1[$x11]["generatedcode"],
          "evet_code" => $rel_data1[$x11]["evet_code"],
          "participant_name" => $rel_data1[$x11]['participant_name']);
        }
      }

      try{
        if (!empty($rel_data1)) {
          for($x =0; $x<count($rel_data1); $x++){
            $this->db->insert('tblpamainevent_participant',$datas[$x]);
          }
        }
        
        $this->db->insert('tblpamainevent',$data);
        return "success";
      }catch(Exception $e){
        return "failed";
      }
    }

    public function addIntoLogs($data){
        $this->db->insert('tblaudit_logs',$data);
        return $this->db->insert_id();
    }

    public function addcoastalcoral($data){
        $this->db->insert('tblpacoastalcoral',$data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
        // return $this->db->insert_id();

    }

    public function searcdateincome2($codegens,$month,$year){
        $this->db->select('income_month,income_day,income_year,generatedcode,id_incomeP,other_title,other_amount,group_concat(tblpaipafincomeothers.other_title,": ",tblpaipafincomeothers.other_amount separator "<br> ") as try2')
        ->where('generatedcode',$codegens)
        ->where('income_month',$month)
        ->where('income_year',$year);
        $query = $this->db->get('tblpaipafincomeothers');
        return $query->result();
    }

    function get_sub_prov($provid){
        $query = $this->db->get_where('tbllocmunicipality', array('provinceid' => $provid));

        return $query;
    }

    function get_sub_mun($munid){
        $query = $this->db->get_where('tbllocbarangay', array('municipalid' => $munid));

        return $query;
    }

    public function updategeninfo($data = [])
    {

    try{
        $this->db->where('generatedcode',$data['generatedcode'])
            ->update($this->table,$data);

            return "success";
        }catch(Exception $e){
            return "failed";
        }
    }

    // public function createMain($data=[],$rel_data1,$rel_data2,$rel_data3,$rel_data3flora,$rel_data4,$rel_data5,$rel_data6_1,$rel_data7_1,$rel_data8,$rel_data9,$rel_data10,$rel_data11,$rel_data12,$rel_data13_1,$rel_data14_1,$rel_data15,$rel_data16,$rel_data17,$rel_data18,$rel_data19,$rel_data20,$rel_data21,$rel_data22,$rel_data23,$rel_data24,$rel_data25,$rel_data26,$rel_data27,$rel_data28,$rel_data29,$rel_data30,$rel_data31,$rel_data33,$rel_data34,$rel_data35,$rel_data36,$rel_data37,$rel_data38,$rel_data39,$rel_data40,$rel_data41,$rel_data43,$rel_data44,$rel_data45,$rel_data46,$rel_data47,$rel_data104,$rel_data105,$rel_data106,$rel_data107,$rel_data108,$rel_data109,$rel_data110,$rel_data111,$rel_data112,$rel_data113,$rel_data114,$rel_data115,$rel_data116,$rel_data117,$rel_data118,$rel_data119,$rel_data120,$rel_data121,$rel_data122,$rel_data123,$rel_data124,$rel_data125)
    public function createMain($data,$rel_data1,$rel_data2,$rel_data3,$rel_data3flora,$rel_data4,$rel_data5,$rel_data6_1,$rel_data7_1,$rel_data8,$rel_data9,$rel_data10,$rel_data11,$rel_data12,$rel_data13_1,$rel_data14_1,$rel_data15,$rel_data16,$rel_data17,$rel_data18,$rel_data19,$rel_data20,$rel_data21,$rel_data22,$rel_data23,$rel_data24,$rel_data25,$rel_data26,$rel_data27,$rel_data28,$rel_data29,$rel_data30,$rel_data31,$rel_data33,$rel_data34,$rel_data35,$rel_data36,$rel_data37,$rel_data38,$rel_data39,$rel_data40,$rel_data41,$rel_data43,$rel_data44,$rel_data45,$rel_data46,$rel_data47,$rel_data104,$rel_data105,$rel_data106,$rel_data107,$rel_data108,$rel_data109,$rel_data110,$rel_data111,$rel_data112,$rel_data113,$rel_data114,$rel_data115,$rel_data116,$rel_data117,$rel_data118,$rel_data119,$rel_data120,$rel_data121,$rel_data122,$rel_data123,$rel_data124,$rel_data125)

    {
        if (!empty($rel_data1)) {
            for($x11 = 0; $x11 < count($rel_data1); $x11++){
                $datas[] = array(
                    "region_id" => $rel_data1[$x11]["region_ids"],
                    "province_id" => $rel_data1[$x11]["province_ids"],
                    "municipal_id" => $rel_data1[$x11]['municipal_ids'],
                    "barangay_id" => $rel_data1[$x11]['barangay_ids'],
                    "generatedcode" => $rel_data1[$x11]['codegen'],
                    "status"  => 1,
                );
            }
        }

        if (!empty($rel_data2)) {
            for($x2 = 0; $x2 < count($rel_data2); $x2++){
                $dataLeg[] = array(
                    "legis_id"      => $rel_data2[$x2]['legis_id'],
                    "legis_no"      => $rel_data2[$x2]['legis_no'],
                    "date_month"    => $rel_data2[$x2]['date_month'],
                    "date_day"      => $rel_data2[$x2]['date_day'],
                    "date_year"     => $rel_data2[$x2]['date_year'],
                    "generatedcode" => $rel_data2[$x2]['codegen'],
                    "nip_id" => $rel_data2[$x2]['nip_id'],
                    "nipsub_id" => $rel_data2[$x2]['nipsub_id'],
                    "legis_area" => $rel_data2[$x2]['legis_area'],
                );
            }
        }

        if (!empty($rel_data3)) {
            for($flora = 0; $flora < count($rel_data3); $flora++){
                $dataBio[] = array(
                    "id_genus_get"  => $rel_data3[$flora]['id_genus_get'],
                    "generatedcode" => $rel_data3[$flora]['codegen'],
                    "chk_forest" => $rel_data3[$flora]['chk_forest'],
                    "chk_inland" => $rel_data3[$flora]['chk_inland'],
                    "chk_cave" => $rel_data3[$flora]['chk_cave'],
                    "chk_coral" => $rel_data3[$flora]['chk_coral'],
                    "chk_seagrass" => $rel_data3[$flora]['chk_seagrass'],
                    "chk_mangrove" => $rel_data3[$flora]['chk_mangrove'],
                    "residency_status" => $rel_data3[$flora]['residency_status'],
                );
            }
        }

        if (!empty($rel_data3flora)) {
            for($flora = 0; $flora < count($rel_data3flora); $flora++){
                $dataBioflora[] = array(
                    "id_genus_get"  => $rel_data3flora[$flora]['id_genus_get'],
                    "generatedcode" => $rel_data3flora[$flora]['codegen'],
                    "chk_forest" => $rel_data3flora[$flora]['chk_forest'],
                    "chk_inland" => $rel_data3flora[$flora]['chk_inland'],
                    "chk_cave" => $rel_data3flora[$flora]['chk_cave'],
                    "chk_coral" => $rel_data3flora[$flora]['chk_coral'],
                    "chk_seagrass" => $rel_data3flora[$flora]['chk_seagrass'],
                    "chk_mangrove" => $rel_data3flora[$flora]['chk_mangrove'],
                    "residency_status" => $rel_data3flora[$flora]['residency_status'],
                );
            }
        }


        if (!empty($rel_data4)) {
           for($x4 = 0; $x4 < count($rel_data4); $x4++){
            $dataPamb[] = array(
                "generatedcode"         => $rel_data4[$x4]['codegen'],
                "fname"                 => $rel_data4[$x4]['fname'],
                "mname"                 => $rel_data4[$x4]['mname'],
                "lname"                 => $rel_data4[$x4]['lname'],
                "office_name"           => $rel_data4[$x4]['office_name'],
                "sex"                   => $rel_data4[$x4]['sex'],
                "civil_status"          => $rel_data4[$x4]['civil_status'],
                "designation"           => $rel_data4[$x4]['designation'],
                "appointment"           => $rel_data4[$x4]['appointment'],
                "sub_appointment"       => $rel_data4[$x4]['sub_appointment'],
                "appointment_month"     => $rel_data4[$x4]['appointment_month'],
                "appointment_day"       => $rel_data4[$x4]['appointment_day'],
                "appointment_year"      => $rel_data4[$x4]['appointment_year'],
                "status"                => $rel_data4[$x4]['status'],
                "residential_address"   => $rel_data4[$x4]['residential_address'],
                "pamb_landline"         => $rel_data4[$x4]['pamb_landline'],
                "pamb_mobile"           => $rel_data4[$x4]['pamb_mobile'],
                "techworkgrp"           => $rel_data4[$x4]['techworkgrp'],
                "techcom"               => $rel_data4[$x4]['techcom'],
                "execom"                => $rel_data4[$x4]['execom'],
                "date_created"          => $rel_data4[$x4]['date_created'],
                "pamb_file_appt"          => $rel_data4[$x4]['pamb_file_appt'],
                "alternateofficial"          => $rel_data4[$x4]['alternateofficial'],
            );
            }
        }

        if (!empty($rel_data5)) {
            for($x5 = 0; $x5 < count($rel_data5); $x5++){
                $dataProject[] = array(
                    "generatedcode" => $rel_data5[$x5]["generatedcode"],
                    "project_name" => $rel_data5[$x5]["project_name"],
                    "date_start" => $rel_data5[$x5]['date_start'],
                    "date_end" => $rel_data5[$x5]['date_end'],
                    "source_fund" => $rel_data5[$x5]['source_fund'],
                    "amount" => $rel_data5[$x5]['amount'],
                    "implementor" => $rel_data5[$x5]['implementor'],
                    "remarks" => $rel_data5[$x5]['remarks'],
                    "type_processing" => $rel_data5[$x5]['type_processing'],
                    "sapa_no" => $rel_data5[$x5]['sapa_no'],
                    "moa_date_signing_month" => $rel_data5[$x5]['moa_date_signing_month'],
                    "moa_date_signing_day" => $rel_data5[$x5]['moa_date_signing_day'],
                    "moa_date_signing_year" => $rel_data5[$x5]['moa_date_signing_year'],
                    "moa_date_exp_month" => $rel_data5[$x5]['moa_date_exp_month'],
                    "moa_date_exp_day" => $rel_data5[$x5]['moa_date_exp_day'],
                    "moa_date_exp_year" => $rel_data5[$x5]['moa_date_exp_year'],
                    "secondparty" => $rel_data5[$x5]['secondparty'],
                    "pacbrma_no" => $rel_data5[$x5]['pacbrma_no'],
                    "people_organization" => $rel_data5[$x5]['people_organization'],
                    "proj_location" => $rel_data5[$x5]['proj_location'],
                    "proj_area" => $rel_data5[$x5]['proj_area'],
                    "nature_development" => $rel_data5[$x5]['nature_development'],
                    "approve_docs" => $rel_data5[$x5]['approve_docs'],
                    "pcbrmamember_csv" => $rel_data5[$x5]['pcbrmamember_csv'],
                );
            }
        }

        if (!empty($rel_data8)) {
            for($x = 0; $x < count($rel_data8); $x++){
                $dataStrict[] = array(
                    "generatedcode"         => $rel_data8[$x]['codegen'],
                    "description"             => $rel_data8[$x]['description'],
                    "s_area"             => $rel_data8[$x]['s_area'],
                    "spzcat"             => $rel_data8[$x]['spzcat'],
                    "strictarchipelagic"             => $rel_data8[$x]['strictarchipelagic'],
                );
            }
        }

        if (!empty($rel_data9)) {
            for($x9 = 0; $x9 < count($rel_data9); $x9++){
                $dataMultiple[] = array(
                    "generatedcode"         => $rel_data9[$x9]['codegen'],
                    "description"             => $rel_data9[$x9]['description'],
                    "area"             => $rel_data9[$x9]['area'],
                    "multicat"             => $rel_data9[$x9]['multicat'],
                    "multiarchipelagic"             => $rel_data9[$x9]['multiarchipelagic'],
                );
            }
        }


        if (!empty($rel_data10)) {
            for($ipaf_txt = 0; $ipaf_txt < count($rel_data10); $ipaf_txt++){
                $dataipafs[] = array(
                    "generatedcode"         => $rel_data10[$ipaf_txt]['codegen'],
                    "date_month_income"        => $rel_data10[$ipaf_txt]['date_month_income'],
                    "date_year_income"        => $rel_data10[$ipaf_txt]['date_year_income'],
                    "entrancefee"        => $rel_data10[$ipaf_txt]['entrancefee'],
                    "facilities"        => $rel_data10[$ipaf_txt]['facilities'],
                    "resource"        => $rel_data10[$ipaf_txt]['resource'],
                    "concession"        => $rel_data10[$ipaf_txt]['concession'],
                    "development"        => $rel_data10[$ipaf_txt]['development'],
                    "finespenalties"        => $rel_data10[$ipaf_txt]['finespenalties'],
                    "other_specify_title"        => $rel_data10[$ipaf_txt]['other_specify_title'],
                    "other_specify_amount"        => $rel_data10[$ipaf_txt]['other_specify_amount']
                );
            }
        }

        if (!empty($rel_data11)) {
            for($x11 = 0; $x11 < count($rel_data11); $x11++){
                $dataT[] = array(
                    "generatedcode" => $rel_data11[$x11]['generatedcode'],
                    "img_threat"    => $rel_data11[$x11]['img_threat'],
                    "threats_rank"  => $rel_data11[$x11]['threats_rank'],
                    "qualifier" => $rel_data11[$x11]['qualifier'],
                    "threats_category"  => $rel_data11[$x11]['threats_category'],
                    "threats_sub"   => $rel_data11[$x11]['threats_sub'],
                    "threat_desc"   => $rel_data11[$x11]['threat_desc'],
                    "threats_location"  => $rel_data11[$x11]['threats_location'],
                    "threats_longitude_dms_direction"   => $rel_data11[$x11]['threats_longitude_dms_direction'],
                    "threats_longitude_dms_degrees" => $rel_data11[$x11]['threats_longitude_dms_degrees'],
                    "threats_longitude_dms_minutes" => $rel_data11[$x11]['threats_longitude_dms_minutes'],
                    "threats_longitude_dms_seconds" => $rel_data11[$x11]['threats_longitude_dms_seconds'],
                    "threats_latitude_dms_direction"    => $rel_data11[$x11]['threats_latitude_dms_direction'],
                    "threats_latitude_dms_degrees"  => $rel_data11[$x11]['threats_latitude_dms_degrees'],
                    "threats_latitude_dms_minutes"  => $rel_data11[$x11]['threats_latitude_dms_minutes'],
                    "threats_latitude_dms_seconds"  => $rel_data11[$x11]['threats_latitude_dms_seconds'],
                    "threats_month_observe" => $rel_data11[$x11]['threats_month_observe'],
                    "threats_year_observe"  => $rel_data11[$x11]['threats_year_observe'],
                    "date_upload"   => $rel_data11[$x11]['date_upload'],
                    "x_long" =>$rel_data11[$x11]['x_long'],
                    "y_lat" =>$rel_data11[$x11]['y_lat'],
                    "nature_threats" =>$rel_data11[$x11]['nature_threats'],
                    "sub_nature_threats" =>$rel_data11[$x11]['sub_nature_threats'],

                );
            }
        }

        if (!empty($rel_data12)) {
            for($x12 = 0; $x12 < count($rel_data12); $x12++){
                $dataR[] = array(
                    "generatedcode"         => $rel_data12[$x12]['codegen'],
                    "title"        => $rel_data12[$x12]['title'],
                    "author"        => $rel_data12[$x12]['author'],
                    "ref_date_month"        => $rel_data12[$x12]['ref_date_month'],
                    "ref_date_year"        => $rel_data12[$x12]['ref_date_year'],
                    "place"        => $rel_data12[$x12]['place'],
                    "sponsoring_body"        => $rel_data12[$x12]['sponsoring_body'],
                    "link"        => $rel_data12[$x12]['link'],
                    "ref_desc"        => $rel_data12[$x12]['ref_desc'],
                    "ref_usage"        => $rel_data12[$x12]['ref_usage'],
                    "date_created"   => $rel_data12[$x12]['date_created'],
                );
            }
        }

        if (!empty($rel_data15)) {
            for($xy15 = 0; $xy15 < count($rel_data15); $xy15++){
                $dataip[] = array(
                    "generatedcode"         => $rel_data15[$xy15]['codegen'],
                    "iccip"        => $rel_data15[$xy15]['iccip'],
                    "male_iccip"        => $rel_data15[$xy15]['male_iccip'],
                    "female_iccip"        => $rel_data15[$xy15]['female_iccip'],
                );
            }
        }

        if (!empty($rel_data16)) {
            for($proj = 0; $proj < count($rel_data16); $proj++){
                $dataPrograms[] = array(
                    "generatedcode"         => $rel_data16[$proj]['codegen'],
                    "program_name"        => $rel_data16[$proj]['program_name'],
                    "program_details"        => $rel_data16[$proj]['program_details'],

                );
            }
        }

        if (!empty($rel_data17)) {
            for($researchX = 0; $researchX < count($rel_data17); $researchX++){
                $datasearch[] = array(
                    "generatedcode"   => $rel_data17[$researchX]['codegen'],
                    "search_type"   => $rel_data17[$researchX]['search_type'],
                    "research_purpose"  => $rel_data17[$researchX]['research_purpose'],
                    "research_year" => $rel_data17[$researchX]['research_year'],
                    "funding_agency"    => $rel_data17[$researchX]['funding_agency'],
                    "name_researcher"   => $rel_data17[$researchX]['name_researcher'],
                    "institution"   => $rel_data17[$researchX]['institution'],
                    "permit_no" => $rel_data17[$researchX]['permit_no'],
                    "search_permit_attache" => $rel_data17[$researchX]['search_permit_attached'],
                    "pamb_reso_no"  => $rel_data17[$researchX]['pamb_reso_no'],
                    "pamb_reso_title"   => $rel_data17[$researchX]['pamb_reso_title'],
                    "research_reso_file"    => $rel_data17[$researchX]['research_reso_file'],
                );
            }
        }

        if (!empty($rel_data18)) {
            for($staff = 0; $staff < count($rel_data18); $staff++){
                $datastaff[] = array(
                    "generatedcode"         => $rel_data18[$staff]['codegen'],
                    "tfname"         => $rel_data18[$staff]['tfname'],
                    "tmname"         => $rel_data18[$staff]['tmname'],
                    "tlname"         => $rel_data18[$staff]['tlname'],
                    "tsex"         => $rel_data18[$staff]['tsex'],
                    "tage"         => $rel_data18[$staff]['tage'],
                    "tstatus"         => $rel_data18[$staff]['tstatus'],
                    "tposition"         => $rel_data18[$staff]['tposition'],
                    "appointed_month"         => $rel_data18[$staff]['appointed_month'],
                    "appointed_year"         => $rel_data18[$staff]['appointed_year'],
                    "status"         => $rel_data18[$staff]['status'],
                    "date_created"         => $rel_data18[$staff]['date_created'],
                );
            }
        }

        if (!empty($rel_data19)) {
            for($topo1 = 0; $topo1 < count($rel_data19); $topo1++){
                $datatopo[] = array(
                    "generatedcode"         => $rel_data19[$topo1]['codegen'],
                    "topology_desc"        => $rel_data19[$topo1]['topology_desc'],
                    "date_created"        => $rel_data19[$topo1]['date_created'],
                );
            }
        }

        if (!empty($rel_data20)) {
            for($soil = 0; $soil < count($rel_data20); $soil++){
                $datasoil[] = array(
                    "generatedcode"         => $rel_data20[$soil]['codegen'],
                    "geology_desc"        => $rel_data20[$soil]['geology_desc'],
                    "date_created"        => $rel_data20[$soil]['date_created'],
                );
            }
        }

        if (!empty($rel_data21)) {
            for($climate = 0; $climate < count($rel_data21); $climate++){
                $dataclimate[] = array(
                    "generatedcode"         => $rel_data21[$climate]['codegen'],
                    "climate_desc"        => $rel_data21[$climate]['climate_desc'],
                    "climate_type"        => $rel_data21[$climate]['climate_type'],
                    "date_created"        => $rel_data21[$climate]['date_created'],
                );
            }
        }

        if (!empty($rel_data22)) {
            for($landlside = 0; $landlside < count($rel_data22); $landlside++){
                $datalandslide[] = array(
                    "generatedcode"         => $rel_data22[$landlside]['codegen'],
                    "landslide_desc"        => $rel_data22[$landlside]['landslide_desc'],
                    "landslide_area"        => $rel_data22[$landlside]['landslide_area'],
                    "landslide_remarks"     => $rel_data22[$landlside]['landslide_remarks'],
                    "date_created"          => $rel_data22[$landlside]['date_created'],
                );
            }
        }

        if (!empty($rel_data23)) {
            for($flooding = 0; $flooding < count($rel_data23); $flooding++){
                $dataflooding[] = array(
                    "generatedcode"         => $rel_data23[$flooding]['codegen'],
                    "flooding_desc"        => $rel_data23[$flooding]['flooding_desc'],
                    "flooding_area"        => $rel_data23[$flooding]['flooding_area'],
                    "flooding_remarks"        => $rel_data23[$flooding]['flooding_remarks'],
                    "date_created"        => $rel_data23[$flooding]['date_created'],
                );
            }
        }

        if (!empty($rel_data24)) {
            for($sea = 0; $sea < count($rel_data24); $sea++){
                $datasea[] = array(
                    "generatedcode"         => $rel_data24[$sea]['codegen'],
                    "sea_desc"        => $rel_data24[$sea]['sea_desc'],
                    "sea_img"        => $rel_data24[$sea]['sea_img'],
                );
            }
        }

        if (!empty($rel_data25)) {
            for($tsunami = 0; $tsunami < count($rel_data25); $tsunami++){
                $datatsunami[] = array(
                    "generatedcode"         => $rel_data25[$tsunami]['codegen'],
                    "tsunami_desc"        => $rel_data25[$tsunami]['tsunami_desc'],
                    "tsunami_img"        => $rel_data25[$tsunami]['tsunami_img'],
                );
            }
        }

        if (!empty($rel_data26)) {
            for($attraction = 0; $attraction < count($rel_data26); $attraction++){
                $dataattract[] = array(
                    "generatedcode"         => $rel_data26[$attraction]['codegen'],
                    "title"        => $rel_data26[$attraction]['title'],
                    "description"        => $rel_data26[$attraction]['description'],
                    "image_attr"        => $rel_data26[$attraction]['image_attr'],
                    "eco_activity"        => $rel_data26[$attraction]['eco_activity'],
                    "other_activity"        => $rel_data26[$attraction]['other_activity'],
                );
            }
        }

        if (!empty($rel_data27)) {
            for($facility = 0; $facility < count($rel_data27); $facility++){
                $datafacility[] = array(
                    "generatedcode"         => $rel_data27[$facility]['codegen'],
                    "title_facility"        => $rel_data27[$facility]['title_facility'],
                    "description_facility"        => $rel_data27[$facility]['description_facility'],
                    "image_facility"        => $rel_data27[$facility]['image_facility'],
                    "facility_date_month"        => $rel_data27[$facility]['facility_date_month'],
                    "facility_date_year"        => $rel_data27[$facility]['facility_date_year'],
                    "facility_condition"        => $rel_data27[$facility]['facility_condition'],
                    "noaccomodate"        => $rel_data27[$facility]['noaccomodate'],
                );
            }
        }

        if (!empty($rel_data28)) {
            for($activity = 0; $activity < count($rel_data28); $activity++){
                $dataactivity[] = array(
                    "generatedcode"         => $rel_data28[$activity]['codegen'],
                    "activity_title"        => $rel_data28[$activity]['activity_title'],
                    "description_activity"        => $rel_data28[$activity]['description_activity'],
                    "image_eco"        => $rel_data28[$activity]['image_eco'],
                );
            }
        }

        if (!empty($rel_data29)) {
            for($agro = 0; $agro < count($rel_data29); $agro++){
                $dataagro[] = array(
                    "generatedcode"         => $rel_data29[$agro]['codegen'],
                    "title_agro"        => $rel_data29[$agro]['title_agro'],
                    "description_agro"        => $rel_data29[$agro]['description_agro'],
                    "has_agro"        => $rel_data29[$agro]['has_agro'],
                    "image_agro"        => $rel_data29[$agro]['image_agro'],
                );
            }
        }

        if (!empty($rel_data30)) {
            for($maps = 0; $maps < count($rel_data30); $maps++){
                $datamap[] = array(
                    "generatedcode"         => $rel_data30[$maps]['codegen'],
                    "filename"        => $rel_data30[$maps]['filename'],
                    "remarks"        => $rel_data30[$maps]['remarks']
                );
            }
        }

        if (!empty($rel_data31)) {
            for($visitor = 0; $visitor < count($rel_data31); $visitor++){
                $datavisitores[] = array(
                    "generatedcode"         => $rel_data31[$visitor]['codegen'],
                    "date_month"        => $rel_data31[$visitor]['date_month'],
                    "date_year"        => $rel_data31[$visitor]['date_year'],
                    "no_male_local"        => $rel_data31[$visitor]['no_male_local'],
                    "no_female_local"        => $rel_data31[$visitor]['no_female_local'],
                    "no_male_foreign"        => $rel_data31[$visitor]['no_male_foreign'],
                    "no_female_foreign"        => $rel_data31[$visitor]['no_female_foreign'],

                );
            }
        }

        if (!empty($rel_data33)) {
            for($recognition = 0; $recognition < count($rel_data33); $recognition++){
                $datarecog[] = array(
                    "generatedcode"         => $rel_data33[$recognition]['codegen'],
                    "recognition"        => $rel_data33[$recognition]['recognition'],
                    "month_declared"        => $rel_data33[$recognition]['month_declared'],
                    "year_declared"        => $rel_data33[$recognition]['year_declared'],
                    "inscribed"        => $rel_data33[$recognition]['inscribed'],
                    "siteno"        => $rel_data33[$recognition]['siteno'],
                    "recog_sub"        => $rel_data33[$recognition]['recog_sub'],
                );
            }
        }

        if (!empty($rel_data34)) {
            for($rock = 0; $rock < count($rel_data34); $rock++){
                $datarock[] = array(
                    "generatedcode"         => $rel_data34[$rock]['codegen'],
                    "rock_details"        => $rel_data34[$rock]['rock_details'],
                    "date_created"        => $rel_data34[$rock]['date_created'],
                );
            }
        }

        if (!empty($rel_data35)) {
            for($hazard = 0; $hazard < count($rel_data35); $hazard++){
                $datahazard[] = array(
                    "generatedcode"         => $rel_data35[$hazard]['codegen'],
                    "geohazard_desc"        => $rel_data35[$hazard]['geohazard_desc'],
                    "geohazard_map"        => $rel_data35[$hazard]['geohazard_map'],
                );
            }
        }

        if (!empty($rel_data36)) {
            for($ff = 0; $ff < count($rel_data36); $ff++){
                $dataff[] = array(
                    "generatedcode"         => $rel_data36[$ff]['codegen'],
                    "forest_formation"        => $rel_data36[$ff]['forest_formation'],
                    "forest_formation_area"        => $rel_data36[$ff]['forest_formation_area'],
                    "forest_formation_remarks"        => $rel_data36[$ff]['forest_formation_remarks'],
                    "date_created"        => $rel_data36[$ff]['date_created'],
                );
            }
        }

        if (!empty($rel_data37)) {
            for($x = 0; $x < count($rel_data37); $x++){
                $datainland[] = array(
                    "generatedcode"         => $rel_data37[$x]['codegen'],
                    "inland_desc"        => $rel_data37[$x]['inland_desc'],
                    "inland_area"        => $rel_data37[$x]['inland_area'],
                );
            }
        }
        if (!empty($rel_data38)) {
            for($x = 0; $x < count($rel_data38); $x++){
                $data_wetland[] = array(
                    "generatedcode"         => $rel_data38[$x]['codegen'],
                    "wetland_desc"        => $rel_data38[$x]['wetland_desc'],
                    "wetland_area"        => $rel_data38[$x]['wetland_area'],
                );
            }
        }
        if (!empty($rel_data39)) {
            for($x = 0; $x < count($rel_data39); $x++){
                $datacave[] = array(
                    "generatedcode"     => $rel_data39[$x]['codegen'],
                    "caves_name"        => $rel_data39[$x]['caves_name'],
                    "caves_area"        => $rel_data39[$x]['caves_area'],
                    "cave_province"     => $rel_data39[$x]['cave_province'],
                    "cave_municipal"    => $rel_data39[$x]['cave_municipal'],
                    "cave_barangay"     => $rel_data39[$x]['cave_barangay'],
                    "land_status"        => $rel_data39[$x]['land_status'],
                    "date_created"        => $rel_data39[$x]['date_created'],
                    "cave_longitude_dms_direction"        => $rel_data39[$x]['cave_longitude_dms_direction'],
                    "cave_longitude_dms_degrees"        => $rel_data39[$x]['cave_longitude_dms_degrees'],
                    "cave_longitude_dms_minutes"        => $rel_data39[$x]['cave_longitude_dms_minutes'],
                    "cave_longitude_dms_seconds"        => $rel_data39[$x]['cave_longitude_dms_seconds'],
                    "cave_latitude_dms_direction"        => $rel_data39[$x]['cave_latitude_dms_direction'],
                    "cave_latitude_dms_degrees"        => $rel_data39[$x]['cave_latitude_dms_degrees'],
                    "cave_latitude_dms_minutes"        => $rel_data39[$x]['cave_latitude_dms_minutes'],
                    "cave_latitude_dms_seconds"        => $rel_data39[$x]['cave_latitude_dms_seconds'],
                    "x_long"        => $rel_data39[$x]['x_long'],
                    "y_lat"        => $rel_data39[$x]['y_lat'],
                    "cave_status"        => $rel_data39[$x]['cave_status'],
                    "cave_class_sub"        => $rel_data39[$x]['cave_class_sub'],

                );
            }
        }
        if (!empty($rel_data40)) {
            for($projs = 0; $projs < count($rel_data40); $projs++){
                $dataprojs[] = array(
                    "generatedcode"         => $rel_data40[$projs]['codegen'],
                    "proj_name"        => $rel_data40[$projs]['proj_name'],
                    "proj_start_implement_month"        => $rel_data40[$projs]['proj_start_implement_month'],
                    "proj_start_implement_year"        => $rel_data40[$projs]['proj_start_implement_year'],
                    "proj_end_implement_month"        => $rel_data40[$projs]['proj_end_implement_month'],
                    "proj_end_implement_year"        => $rel_data40[$projs]['proj_end_implement_year'],
                    "source_fund"        => $rel_data40[$projs]['source_fund'],
                    "proj_cost"        => $rel_data40[$projs]['proj_cost'],
                    "proj_area"        => $rel_data40[$projs]['proj_area'],
                    "proj_location"        => $rel_data40[$projs]['proj_location'],
                    "proj_remarks"        => $rel_data40[$projs]['proj_remarks'],
                    "proj_proponent"        => $rel_data40[$projs]['proj_proponent'],
                    "proj_code"        => $rel_data40[$projs]['proj_code'],
                );
            }
        }

        if (!empty($rel_data41)) {
            for($demo = 0; $demo < count($rel_data41); $demo++){
                $datademo[] = array(
                    "generatedcode"         => $rel_data41[$demo]['codegen'],
                    "seams_region"        => $rel_data41[$demo]['seams_region'],
                    "seams_province"        => $rel_data41[$demo]['seams_province'],
                    "seams_municipality"        => $rel_data41[$demo]['seams_municipality'],
                    "seams_barangay"        => $rel_data41[$demo]['seams_barangay'],
                    "name_household_head"        => $rel_data41[$demo]['name_household_head'],
                    "seams_sex_head"        => $rel_data41[$demo]['seams_sex_head'],
                    "seams_male"        => $rel_data41[$demo]['seams_male'],
                    "seams_female"        => $rel_data41[$demo]['seams_female'],
                    "area_farmlot"        => $rel_data41[$demo]['area_farmlot'],
                    "area_homelot"        => $rel_data41[$demo]['area_homelot'],
                    "other_uses"        => $rel_data41[$demo]['other_uses'],
                    "area_occupied"        => $rel_data41[$demo]['area_occupied'],
                    "date_occupy_month"        => $rel_data41[$demo]['date_occupy_month'],
                    "date_occupy_year"        => $rel_data41[$demo]['date_occupy_year'],
                    "seams_remarks"        => $rel_data41[$demo]['seams_remarks'],
                    "longitude_dms_direction"         => $rel_data41[$demo]['longitude_dms_direction'],
                    "longitude_dms_degrees"         => $rel_data41[$demo]['longitude_dms_degrees'],
                    "longitude_dms_minutes"         => $rel_data41[$demo]['longitude_dms_minutes'],
                    "longitude_dms_seconds"         => $rel_data41[$demo]['longitude_dms_seconds'],
                    "latitude_dms_direction"         => $rel_data41[$demo]['latitude_dms_direction'],
                    "latitude_dms_degrees"         => $rel_data41[$demo]['latitude_dms_degrees'],
                    "latitude_dms_minutes"         => $rel_data41[$demo]['latitude_dms_minutes'],
                    "latitude_dms_seconds"         => $rel_data41[$demo]['latitude_dms_seconds'],
                    "tenured_migrant"         => $rel_data41[$demo]['tenured_migrant'],
                    "ipsiccs"         => $rel_data41[$demo]['ipsiccs'],
                    "chkhomelot"         => $rel_data41[$demo]['chkhomelot'],
                    "x_long"         => $rel_data41[$demo]['x_long'],
                    "y_lat"         => $rel_data41[$demo]['y_lat'],
                    "shp_zip"         => $rel_data41[$demo]['shp_zip'],
                );
            }
        }

        if (!empty($rel_data43)) {
            for($hydro = 0; $hydro < count($rel_data43); $hydro++){
                $datahydro[] = array(
                    "generatedcode"         => $rel_data43[$hydro]['codegen'],
                    "hydro_desc"        => $rel_data43[$hydro]['hydro_desc'],
                    "hydro_class"        => $rel_data43[$hydro]['hydro_class'],
                    "hydroSub_class"        => $rel_data43[$hydro]['hydroSub_class'],
                    "date_created"        => $rel_data43[$hydro]['date_created'],
                    "hydro_map_img"        => $rel_data43[$hydro]['hydro_map_img'],
                    "hydro_shp_file"        => $rel_data43[$hydro]['hydro_shp_file'],
                    "riverinflow"        => $rel_data43[$hydro]['riverinflow'],
                    "riveroutflow"        => $rel_data43[$hydro]['riveroutflow'],
                );
            }
        }

        if (!empty($rel_data44)) {
            for($x = 0; $x < count($rel_data44); $x++){
                $dataland[] = array(
                    "generatedcode"         => $rel_data44[$x]['codegen'],
                    "landuse_type"        => $rel_data44[$x]['landuse_type'],
                    "landuse_sub"        => $rel_data44[$x]['landuse_sub'],
                    "landuse_area"        => $rel_data44[$x]['landuse_area'],
                    "remarks"        => $rel_data44[$x]['remarks'],
                    "date_created"        => $rel_data44[$x]['date_created'],
                );
            }
        }

        if (!empty($rel_data45)) {
            for($x = 0; $x < count($rel_data45); $x++){
                $datavegetative[] = array(
                    "generatedcode"         => $rel_data45[$x]['codegen'],
                    "vegetative_desc"        => $rel_data45[$x]['vegetative_desc'],
                    "vegetative_area"        => $rel_data45[$x]['vegetative_area'],
                    "vremarks"        => $rel_data45[$x]['vremarks'],
                    "date_created"        => $rel_data45[$x]['date_created'],
                );
            }
        }

        if (!empty($rel_data46)) {
            for($x = 0; $x < count($rel_data46); $x++){
                $datafire[] = array(
                    "generatedcode"         => $rel_data46[$x]['codegen'],
                    "fire_desc"        => $rel_data46[$x]['fire_desc'],
                    "fire_img"        => $rel_data46[$x]['fire_img'],
                );
            }
        }

        if (!empty($rel_data47)) {
            for($x = 0; $x < count($rel_data47); $x++){
                $dataiw[] = array(
                    "generatedcode"         => $rel_data47[$x]['codegen'],
                    "iw_name"        => $rel_data47[$x]['iw_name'],
                    "iw_area"        => $rel_data47[$x]['iw_area'],
                    "iw_province"        => $rel_data47[$x]['iw_province'],
                    "iw_municipal"        => $rel_data47[$x]['iw_municipal'],
                    "iw_long"        => $rel_data47[$x]['iw_long'],
                    "iw_lat"        => $rel_data47[$x]['iw_lat'],
                    "iw_year_assessed"        => $rel_data47[$x]['iw_year_assessed'],
                    "wetland_type"        => $rel_data47[$x]['wetland_type'],
                    "iw_description"        => $rel_data47[$x]['iw_description'],
                    "inland_map_img"     => $rel_data47[$x]['inland_map_img'],
                    "inland_shp_file"     => $rel_data47[$x]['inland_shp_file'],
                    "waterbody_classID"     => $rel_data47[$x]['waterbody_classID'],
                    "down_long_dms_direction"     => $rel_data47[$x]['down_long_dms_direction'],
                    "down_long_dms_degrees"     => $rel_data47[$x]['down_long_dms_degrees'],
                    "down_long_dms_minutes"     => $rel_data47[$x]['down_long_dms_minutes'],
                    "down_long_dms_seconds"     => $rel_data47[$x]['down_long_dms_seconds'],
                    "down_lat_dms_direction"     => $rel_data47[$x]['down_lat_dms_direction'],
                    "down_lat_dms_degrees"     => $rel_data47[$x]['down_lat_dms_degrees'],
                    "down_lat_dms_minutes"     => $rel_data47[$x]['down_lat_dms_minutes'],
                    "down_lat_dms_seconds"     => $rel_data47[$x]['down_lat_dms_seconds'],
                    "mid_long_dms_direction"     => $rel_data47[$x]['mid_long_dms_direction'],
                    "mid_long_dms_degrees"     => $rel_data47[$x]['mid_long_dms_degrees'],
                    "mid_long_dms_minutes"     => $rel_data47[$x]['mid_long_dms_minutes'],
                    "mid_long_dms_seconds"     => $rel_data47[$x]['mid_long_dms_seconds'],
                    "mid_lat_dms_direction"     => $rel_data47[$x]['mid_lat_dms_direction'],
                    "mid_lat_dms_degrees"     => $rel_data47[$x]['mid_lat_dms_degrees'],
                    "mid_lat_dms_minutes"     => $rel_data47[$x]['mid_lat_dms_minutes'],
                    "mid_lat_dms_seconds"     => $rel_data47[$x]['mid_lat_dms_seconds'],
                    "up_long_dms_direction"     => $rel_data47[$x]['up_long_dms_direction'],
                    "up_long_dms_degrees"     => $rel_data47[$x]['up_long_dms_degrees'],
                    "up_long_dms_minutes"     => $rel_data47[$x]['up_long_dms_minutes'],
                    "up_long_dms_seconds"     => $rel_data47[$x]['up_long_dms_seconds'],
                    "up_lat_dms_direction"     => $rel_data47[$x]['up_lat_dms_direction'],
                    "up_lat_dms_degrees"     => $rel_data47[$x]['up_lat_dms_degrees'],
                    "up_lat_dms_minutes"     => $rel_data47[$x]['up_lat_dms_minutes'],
                    "up_lat_dms_seconds"     => $rel_data47[$x]['up_lat_dms_seconds'],
                    "iw_longitude_dms_direction"     => $rel_data47[$x]['iw_longitude_dms_direction'],
                    "iw_longitude_dms_degrees"     => $rel_data47[$x]['iw_longitude_dms_degrees'],
                    "iw_longitude_dms_minutes"     => $rel_data47[$x]['iw_longitude_dms_minutes'],
                    "iw_longitude_dms_seconds"     => $rel_data47[$x]['iw_longitude_dms_seconds'],
                    "iw_latitude_dms_direction"     => $rel_data47[$x]['iw_latitude_dms_direction'],
                    "iw_latitude_dms_degrees"     => $rel_data47[$x]['iw_latitude_dms_degrees'],
                    "iw_latitude_dms_minutes"     => $rel_data47[$x]['iw_latitude_dms_minutes'],
                    "iw_latitude_dms_seconds"     => $rel_data47[$x]['iw_latitude_dms_seconds'],
                    "waterbodysub_classID"     => $rel_data47[$x]['waterbodysub_classID'],
                );
            }
        }


        if (!empty($rel_data104)) {
                for($x = 0; $x < count($rel_data104); $x++){
                $datacoralreeflocation[] = array(
                    "generatedcode"         => $rel_data104[$x]['codegen'],
                    "coastal_generatedcode"         => $rel_data104[$x]['Ccodegen'],
                    "coral_municipal"         => $rel_data104[$x]['coral_municipal'],
                    "coral_barangay"         => $rel_data104[$x]['coral_barangay'],
                );
            }
        }

        if (!empty($rel_data105)) {
                for($x = 0; $x < count($rel_data105); $x++){
                $datacoralreefspecies[] = array(
                    "generatedcode"         => $rel_data105[$x]['codegen'],
                    "coastal_generatedcode"         => $rel_data105[$x]['Ccodegen'],
                    "coralspecies_id"         => $rel_data105[$x]['coralspecies_id'],
                    "date_upload"         => $rel_data105[$x]['date_upload'],
                );
            }
        }

        if (!empty($rel_data106)) {
                for($x = 0; $x < count($rel_data106); $x++){
                $datacoralreefspeciescompo[] = array(
                    "generatedcode"         => $rel_data106[$x]['codegen'],
                    "coastal_generatedcode"         => $rel_data106[$x]['Ccodegen'],
                    "speciescompo_img"         => $rel_data106[$x]['speciescompo_img'],
                    "species_name"         => $rel_data106[$x]['species_name'],
                );
            }
        }

        if (!empty($rel_data107)) {
                for($x = 0; $x < count($rel_data107); $x++){
                $datacoralreefmonitoring[] = array(
                    "generatedcode"         => $rel_data107[$x]['codegen'],
                    "coastal_generatedcode"         => $rel_data107[$x]['Ccodegen'],
                    "monitoring_site_point"         => $rel_data107[$x]['monitoring_site_point'],
                );
            }
        }

        if (!empty($rel_data108)) {
                for($x = 0; $x < count($rel_data108); $x++){
                $datacoralreefkmlkmz[] = array(
                    "generatedcode"         => $rel_data108[$x]['codegen'],
                    "coastal_generatedcode"         => $rel_data108[$x]['Ccodegen'],
                    "kmlkmz"         => $rel_data108[$x]['kmlkmz'],
                );
            }
        }

        if (!empty($rel_data109)) {
                for($x = 0; $x < count($rel_data109); $x++){
                $datacoraldetails[] = array(
                    "generatedcode"         => $rel_data109[$x]['codegen'],
                    "coastal_generatedcode"         => $rel_data109[$x]['Ccodegen'],
                    "coral_has"         => $rel_data109[$x]['coral_has'],
                    "coral_remarks"         => $rel_data109[$x]['coral_remarks'],
                    "date_created"         => $rel_data109[$x]['date_created'],
                    "hcc_category"         => $rel_data109[$x]['hcc_category'],
                );
            }
        }

        if (!empty($rel_data110)) {
                for($x = 0; $x < count($rel_data110); $x++){
                $dataseagrassdetails[] = array(
                    "generatedcode"         => $rel_data110[$x]['codegen'],
                    "coastal_generatedcode"         => $rel_data110[$x]['Ccodegen'],
                    "seagrass_area"         => $rel_data110[$x]['seagrass_area'],
                    "seagrass_remarks"         => $rel_data110[$x]['seagrass_remarks'],
                    "date_created"         => $rel_data110[$x]['date_created'],
                    "seagrass_conditions"         => $rel_data110[$x]['seagrass_condition'],
                );
            }
        }

        if (!empty($rel_data111)) {
                for($x = 0; $x < count($rel_data111); $x++){
                $dataseagrassspecies[] = array(
                    "generatedcode"         => $rel_data111[$x]['codegen'],
                    "seagrass_generatedcode"         => $rel_data111[$x]['Ccodegen'],
                    "seagrass_species_name"         => $rel_data111[$x]['seagrass_species_name'],
                    "date_created"         => $rel_data111[$x]['date_upload'],
                );
            }
        }

        if (!empty($rel_data112)) {
                for($x = 0; $x < count($rel_data112); $x++){
                $datamangrovedetails[] = array(
                    "generatedcode"         => $rel_data112[$x]['codegen'],
                    "mangrove_generatedcode"         => $rel_data112[$x]['Ccodegen'],
                    "mangrove_area"         => $rel_data112[$x]['mangrove_area'],
                    "mangrove_remarks"         => $rel_data112[$x]['mangrove_remarks'],
                    "date_created"         => $rel_data112[$x]['date_created'],
                    "mangrove_condition"         => $rel_data112[$x]['mangrove_condition'],
                );
            }
        }

        if (!empty($rel_data113)) {
                for($x = 0; $x < count($rel_data113); $x++){
                $datamangrovespecies[] = array(
                    "generatedcode"         => $rel_data113[$x]['codegen'],
                    "mangrove_generatedcode"         => $rel_data113[$x]['Ccodegen'],
                    "mangrove_species"         => $rel_data113[$x]['mangrove_species'],
                    "date_upload"         => $rel_data113[$x]['date_upload'],
                );
            }
        }

        if (!empty($rel_data114)) {
                for($x = 0; $x < count($rel_data114); $x++){
                $dataproducts[] = array(
                    "generatedcode"         => $rel_data114[$x]['codegen'],
                    "prod_img"         => $rel_data114[$x]['prod_img'],
                    "prod_desc"         => $rel_data114[$x]['prod_desc'],
                );
            }
        }

        if (!empty($rel_data115)) {
                for($x = 0; $x < count($rel_data115); $x++){
                $dataenterprise[] = array(
                    "generatedcode"         => $rel_data115[$x]['codegen'],
                    "enterprise_img"         => $rel_data115[$x]['enterprise_img'],
                    "enterprise_desc"         => $rel_data115[$x]['enterprise_desc'],
                );
            }
        }

        if (!empty($rel_data116)) {
                for($x = 0; $x < count($rel_data116); $x++){
                $datalivelihood[] = array(
                    // "generatedcode"         => $rel_data116[$x]['generatedcode'],
                    // "enterprise_name"         => $rel_data116[$x]['enterprise_name'],
                    // "lh_type_enterprise"         => $rel_data116[$x]['lh_type_enterprise'],
                    // "lh_desc"         => $rel_data116[$x]['lh_desc'],
                    // "lh_region"         => $rel_data116[$x]['lh_region'],
                    // "lh_province"         => $rel_data116[$x]['lh_province'],
                    // "lh_municipal"         => $rel_data116[$x]['lh_municipal'],
                    // "lh_barangay"         => $rel_data116[$x]['lh_barangay'],
                    // "lh_long_dms_direction"         => $rel_data116[$x]['lh_long_dms_direction'],
                    // "lh_lat_dms_direction"         => $rel_data116[$x]['lh_lat_dms_direction'],
                    // "lh_long_dms_degree"         => $rel_data116[$x]['lh_long_dms_degree'],
                    // "lh_long_dms_minute"         => $rel_data116[$x]['lh_long_dms_minute'],
                    // "lh_long_dms_second"         => $rel_data116[$x]['lh_long_dms_second'],
                    // "lh_long_dd"         => $rel_data116[$x]['lh_long_dd'],
                    // "lh_lat_dms_degree"         => $rel_data116[$x]['lh_lat_dms_degree'],
                    // "lh_lat_dms_minute"         => $rel_data116[$x]['lh_lat_dms_minute'],
                    // "lh_lat_dms_second"         => $rel_data116[$x]['lh_lat_dms_second'],
                    // "lh_lat_dd"         => $rel_data116[$x]['lh_lat_dd'],
                    // "lh_area"         => $rel_data116[$x]['lh_area'],
                    // "lh_assessed_month_frm"         => $rel_data116[$x]['lh_assessed_month_frm'],
                    // "lh_assessed_day_frm"         => $rel_data116[$x]['lh_assessed_day_frm'],
                    // "lh_assessed_year_frm"         => $rel_data116[$x]['lh_assessed_year_frm'],
                    // "lh_assessed_month_to"         => $rel_data116[$x]['lh_assessed_month_to'],
                    // "lh_assessed_day_to"         => $rel_data116[$x]['lh_assessed_day_to'],
                    // "lh_assessed_year_to"         => $rel_data116[$x]['lh_assessed_year_to'],
                    // "office_involved"         => $rel_data116[$x]['office_involved'],
                    // "lh_po_male"         => $rel_data116[$x]['lh_po_male'],
                    // "lh_po_female"         => $rel_data116[$x]['lh_po_female'],
                    // "mpa_name"         => $rel_data116[$x]['mpa_name'],
                    // "other_source_assistance"         => $rel_data116[$x]['other_source_assistance'],
                    // "proj_proposal"         => $rel_data116[$x]['proj_proposal'],
                    // "lh_business_plan"         => $rel_data116[$x]['lh_business_plan'],
                    // "lh_wfp"         => $rel_data116[$x]['lh_wfp'],
                    // "lh_moa"         => $rel_data116[$x]['lh_moa'],
                    // "lh_ecological"         => $rel_data116[$x]['lh_ecological'],
                    // "lh_economic"         => $rel_data116[$x]['lh_economic'],
                    // "lh_equity"         => $rel_data116[$x]['lh_equity'],
                    // "capacity_desc"         => $rel_data116[$x]['capacity_desc'],
                    // "lh_total_rating" => $rel_data116[$x]['lh_total_rating'],
                    // "lh_img" => $rel_data116[$x]['lh_img'],
                    // "lh_products" => $rel_data116[$x]['lh_products'],
                    // "lh_income" => $rel_data116[$x]['lh_income'],
                    // "lh_po_assisted" => $rel_data116[$x]['lh_po_assisted'],
"generatedcode" => $rel_data116[$x]['generatedcode'],
"bdfe_codegen" => $rel_data116[$x]['bdfe_codegen'],
"enterprise_name" => $rel_data116[$x]['enterprise_name'],
"lh_po_assisted" => $rel_data116[$x]['lh_po_assisted'],
"dor_month" => $rel_data116[$x]['dor_month'],
"dor_day" => $rel_data116[$x]['dor_day'],
"dor_year" => $rel_data116[$x]['dor_year'],
"type_registration" => $rel_data116[$x]['type_registration'],
"lh_category" => $rel_data116[$x]['lh_category'],
"lh_sub_category" => $rel_data116[$x]['lh_sub_category'],
"lh_category_others" => $rel_data116[$x]['lh_category_others'],
"lh_products" => $rel_data116[$x]['lh_products'],
"lh_region" => $rel_data116[$x]['lh_region'],
"lh_province" => $rel_data116[$x]['lh_province'],
"lh_municipal" => $rel_data116[$x]['lh_municipal'],
"lh_barangay" => $rel_data116[$x]['lh_barangay'],
"lh_product_source" => $rel_data116[$x]['lh_product_source'],
"lh_long_dms_direction" => $rel_data116[$x]['lh_long_dms_direction'],
"lh_lat_dms_direction" => $rel_data116[$x]['lh_lat_dms_direction'],
"lh_long_dms_degree" => $rel_data116[$x]['lh_long_dms_degree'],
"lh_long_dms_minute" => $rel_data116[$x]['lh_long_dms_minute'],
"lh_long_dms_second" => $rel_data116[$x]['lh_long_dms_second'],
"lh_long_dd" => $rel_data116[$x]['lh_long_dd'],
"lh_lat_dms_degree" => $rel_data116[$x]['lh_lat_dms_degree'],
"lh_lat_dms_minute" => $rel_data116[$x]['lh_lat_dms_minute'],
"lh_lat_dms_second" => $rel_data116[$x]['lh_lat_dms_second'],
"lh_lat_dd" => $rel_data116[$x]['lh_lat_dd'],
"lh_area" => $rel_data116[$x]['lh_area'],
"lh_month_inclusion" => $rel_data116[$x]['lh_month_inclusion'],
"lh_day_inclusion" => $rel_data116[$x]['lh_day_inclusion'],
"lh_year_inclusion" => $rel_data116[$x]['lh_year_inclusion'],
"date_profile_month" => $rel_data116[$x]['date_profile_month'],
"date_profile_day" => $rel_data116[$x]['date_profile_day'],
"date_profile_year" => $rel_data116[$x]['date_profile_year'],
"lh_po_male" => $rel_data116[$x]['lh_po_male'],
"lh_po_female" => $rel_data116[$x]['lh_po_female'],
"size_enterprise" => $rel_data116[$x]['size_enterprise'],
"lh_enteprise_other" => $rel_data116[$x]['lh_enteprise_other'],
"poassetval" => $rel_data116[$x]['poassetval'],
"avgnetmonthincome" => $rel_data116[$x]['avgnetmonthincome'],
"date_appraisal_month" => $rel_data116[$x]['date_appraisal_month'],
"date_appraisal_day" => $rel_data116[$x]['date_appraisal_day'],
"date_appraisal_year" => $rel_data116[$x]['date_appraisal_year'],
"bdfe_level" => $rel_data116[$x]['bdfe_level'],
"rapidhabitatassess_file" => $rel_data116[$x]['rapidhabitatassess_file'],
"businesspermit_file" => $rel_data116[$x]['businesspermit_file'],
"poinventory_file" => $rel_data116[$x]['poinventory_file'],
"bamsresult_file" => $rel_data116[$x]['bamsresult_file'],
"businessplan_file" => $rel_data116[$x]['businessplan_file'],
"seamsresult_file" => $rel_data116[$x]['seamsresult_file'],
"updatebusinessplan_file" => $rel_data116[$x]['updatebusinessplan_file'],
"bamsresultdeveloped_file" => $rel_data116[$x]['bamsresultdeveloped_file'],
"businesspermitdeveloped_fi" => $rel_data116[$x]['businesspermitdeveloped_fi'],
"pppagreementdeveloped_file" => $rel_data116[$x]['pppagreementdeveloped_file'],
"lguresolution_file" => $rel_data116[$x]['lguresolution_file'],
"bamsresultsustained_file" => $rel_data116[$x]['bamsresultsustained_file'],
"seamsresultsustained_file" => $rel_data116[$x]['seamsresultsustained_file'],
"submissionappraisalpdf_fil" => $rel_data116[$x]['submissionappraisalpdf_fil'],
"tech_assistance" => $rel_data116[$x]['tech_assistance'],
"financce_assistance" => $rel_data116[$x]['financce_assistance'],
"faamount" => $rel_data116[$x]['faamount'],
"othersourceassistance" => $rel_data116[$x]['othersourceassistance'],
"assistingorganization" => $rel_data116[$x]['assistingorganization'],
"qualifiesrecog" => $rel_data116[$x]['qualifiesrecog'],
"date_recog_endorsement_mon" => $rel_data116[$x]['date_recog_endorsement_mon'],
"date_recog_endorsement_day" => $rel_data116[$x]['date_recog_endorsement_day'],
"date_recog_endorsement_yea" => $rel_data116[$x]['date_recog_endorsement_yea'],
"date_recog_validation_mont" => $rel_data116[$x]['date_recog_validation_mont'],
"date_recog_validation_day" => $rel_data116[$x]['date_recog_validation_day'],
"date_recog_validation_year" => $rel_data116[$x]['date_recog_validation_year'],
"resultvalidation" => $rel_data116[$x]['resultvalidation'],
"dateCOR_month" => $rel_data116[$x]['dateCOR_month'],
"dateCOR_day" => $rel_data116[$x]['dateCOR_day'],
"dateCOR_year" => $rel_data116[$x]['dateCOR_year'],
"recogfindingsdocupload" => $rel_data116[$x]['recogfindingsdocupload'],
"supportingmaterialsupload" => $rel_data116[$x]['supportingmaterialsupload'],
"other_registration" => $rel_data116[$x]['other_registration'],
                );
            }
        }

        if (!empty($rel_data117)) {
                for($x = 0; $x < count($rel_data117); $x++){
                $datasapa[] = array(
                    "generatedcode"         => $rel_data117[$x]['generatedcode'],
                    "sapa_no"         => $rel_data117[$x]['sapa_no'],
                    "sapa_name_proponent"         => $rel_data117[$x]['sapa_name_proponent'],
                    "sapa_duration_from"         => $rel_data117[$x]['sapa_duration_from'],
                    "sapa_duration_to"         => $rel_data117[$x]['sapa_duration_to'],
                    "sapa_nature_development"         => $rel_data117[$x]['sapa_nature_development'],
                    "sapa_project_location"         => $rel_data117[$x]['sapa_project_location'],
                    "sapa_area"         => $rel_data117[$x]['sapa_area'],
                    "sapa_project_cost"         => $rel_data117[$x]['sapa_project_cost'],
                    "sapa_scanned_file"         => $rel_data117[$x]['sapa_scanned_file'],
                    "sapa_remarks"         => $rel_data117[$x]['sapa_remarks'],
                    "sapa_status"         => $rel_data117[$x]['sapa_status'],
                    "sapa_development_others"         => $rel_data117[$x]['sapa_development_others'],
                    "sapa_date_month"       => $rel_data117[$x]['sapa_date_month'],
                    "sapa_date_year"        => $rel_data117[$x]['sapa_date_year'],
                    "sapa_rehabbond_cost"       => $rel_data117[$x]['sapa_rehabbond_cost'],
                    "sapa_cdmp_file"        => $rel_data117[$x]['sapa_cdmp_file'],
                    "sapa_mgm_plan"     => $rel_data117[$x]['sapa_mgm_plan'],
                    "sapa_pamb_reso"        => $rel_data117[$x]['sapa_pamb_reso'],
                    "sapa_generatedcode"        => $rel_data117[$x]['sapa_generatedcode'],
                );
            }
        }

        if (!empty($rel_data118)) {
                for($x = 0; $x < count($rel_data118); $x++){
                $datamoa[] = array(
                    "generatedcode"         => $rel_data118[$x]['generatedcode'],
                    "moa_generatedcode"         => $rel_data118[$x]['moa_generatedcode'],
                    "moa_holder"         => $rel_data118[$x]['moa_holder'],
                    "moa_second_party"         => $rel_data118[$x]['moa_second_party'],
                    "moa_from_month"         => $rel_data118[$x]['moa_from_month'],
                    "moa_from_day"         => $rel_data118[$x]['moa_from_day'],
                    "moa_from_year"         => $rel_data118[$x]['moa_from_year'],
                    "moa_to_month"         => $rel_data118[$x]['moa_to_month'],
                    "moa_to_day"         => $rel_data118[$x]['moa_to_day'],
                    "moa_to_year"         => $rel_data118[$x]['moa_to_year'],
                    "moa_devt"         => $rel_data118[$x]['moa_devt'],
                    "moa_location"         => $rel_data118[$x]['moa_location'],
                    "moa_area"         => $rel_data118[$x]['moa_area'],
                    "moa_cost"         => $rel_data118[$x]['moa_cost'],
                    "moa_doc_file"         => $rel_data118[$x]['moa_doc_file'],
                    "moa_remarks"         => $rel_data118[$x]['moa_remarks'],
                    "moa_status"         => $rel_data118[$x]['moa_status'],
                    "moa_projplan"         => $rel_data118[$x]['moa_projplan'],
                    "moa_pambapprove"         => $rel_data118[$x]['moa_pambapprove'],
                    "moa_pambreso"         => $rel_data118[$x]['moa_pambreso'],
                );
            }
        }

        if (!empty($rel_data119)) {
                for($x = 0; $x < count($rel_data119); $x++){
                $datapacbrma[] = array(
                    "generatedcode"         => $rel_data119[$x]['generatedcode'],
                    "pacbrma_no"         => $rel_data119[$x]['pacbrma_no'],
                    "pacbrma_holder"         => $rel_data119[$x]['pacbrma_holder'],
                    "pacbrma_po"         => $rel_data119[$x]['pacbrma_po'],
                    "pacbrma_start"         => $rel_data119[$x]['pacbrma_start'],
                    "pacbrma_end"         => $rel_data119[$x]['pacbrma_end'],
                    "pacbrma_devt"         => $rel_data119[$x]['pacbrma_devt'],
                    "pacbrma_location"         => $rel_data119[$x]['pacbrma_location'],
                    "pacbrma_area"         => $rel_data119[$x]['pacbrma_area'],
                    "pacbrma_cost"         => $rel_data119[$x]['pacbrma_cost'],
                    "pacbrma_doc_file"         => $rel_data119[$x]['pacbrma_doc_file'],
                    "pacbrma_remarks"         => $rel_data119[$x]['pacbrma_remarks'],
                    "pacbrma_status"         => $rel_data119[$x]['pacbrma_status'],
                    "pacbrma_male"         => $rel_data119[$x]['pacbrma_male'],
                    "pacbrma_female"         => $rel_data119[$x]['pacbrma_female'],
                    "pacbrma_total"         => $rel_data119[$x]['pacbrma_total'],
                    "pacbrma_member_file"         => $rel_data119[$x]['pacbrma_member_file'],
                );
            }
        }

        if (!empty($rel_data120)) {
                for($x = 0; $x < count($rel_data120); $x++){
                $datawatershed[] = array(
                    "generatedcode"         => $rel_data120[$x]['generatedcode'],
                    "watershedmap_img"         => $rel_data120[$x]['watershedmap_img'],
                    "riverbasin_name"         => $rel_data120[$x]['riverbasin_name'],
                    "watershed_name"         => $rel_data120[$x]['watershed_name'],
                    "subwatershed_name"         => $rel_data120[$x]['subwatershed_name'],
                    "date_created"         => $rel_data120[$x]['date_created'],
                );
            }
        }

        if (!empty($rel_data47)) {
            for($x = 0; $x < count($rel_data47); $x++){
                $dataiw[] = array(
                    "generatedcode"         => $rel_data47[$x]['codegen'],
                    "iw_name"        => $rel_data47[$x]['iw_name'],
                    "iw_area"        => $rel_data47[$x]['iw_area'],
                    "iw_province"        => $rel_data47[$x]['iw_province'],
                    "iw_municipal"        => $rel_data47[$x]['iw_municipal'],
                    "iw_long"        => $rel_data47[$x]['iw_long'],
                    "iw_lat"        => $rel_data47[$x]['iw_lat'],
                    "iw_year_assessed"        => $rel_data47[$x]['iw_year_assessed'],
                    "wetland_type"        => $rel_data47[$x]['wetland_type'],
                    "iw_description"        => $rel_data47[$x]['iw_description'],
                    "inland_map_img"     => $rel_data47[$x]['inland_map_img'],
                    "inland_shp_file"     => $rel_data47[$x]['inland_shp_file'],
                    "waterbody_classID"     => $rel_data47[$x]['waterbody_classID'],
                    "down_long_dms_direction"     => $rel_data47[$x]['down_long_dms_direction'],
                    "down_long_dms_degrees"     => $rel_data47[$x]['down_long_dms_degrees'],
                    "down_long_dms_minutes"     => $rel_data47[$x]['down_long_dms_minutes'],
                    "down_long_dms_seconds"     => $rel_data47[$x]['down_long_dms_seconds'],
                    "down_lat_dms_direction"     => $rel_data47[$x]['down_lat_dms_direction'],
                    "down_lat_dms_degrees"     => $rel_data47[$x]['down_lat_dms_degrees'],
                    "down_lat_dms_minutes"     => $rel_data47[$x]['down_lat_dms_minutes'],
                    "down_lat_dms_seconds"     => $rel_data47[$x]['down_lat_dms_seconds'],
                    "mid_long_dms_direction"     => $rel_data47[$x]['mid_long_dms_direction'],
                    "mid_long_dms_degrees"     => $rel_data47[$x]['mid_long_dms_degrees'],
                    "mid_long_dms_minutes"     => $rel_data47[$x]['mid_long_dms_minutes'],
                    "mid_long_dms_seconds"     => $rel_data47[$x]['mid_long_dms_seconds'],
                    "mid_lat_dms_direction"     => $rel_data47[$x]['mid_lat_dms_direction'],
                    "mid_lat_dms_degrees"     => $rel_data47[$x]['mid_lat_dms_degrees'],
                    "mid_lat_dms_minutes"     => $rel_data47[$x]['mid_lat_dms_minutes'],
                    "mid_lat_dms_seconds"     => $rel_data47[$x]['mid_lat_dms_seconds'],
                    "up_long_dms_direction"     => $rel_data47[$x]['up_long_dms_direction'],
                    "up_long_dms_degrees"     => $rel_data47[$x]['up_long_dms_degrees'],
                    "up_long_dms_minutes"     => $rel_data47[$x]['up_long_dms_minutes'],
                    "up_long_dms_seconds"     => $rel_data47[$x]['up_long_dms_seconds'],
                    "up_lat_dms_direction"     => $rel_data47[$x]['up_lat_dms_direction'],
                    "up_lat_dms_degrees"     => $rel_data47[$x]['up_lat_dms_degrees'],
                    "up_lat_dms_minutes"     => $rel_data47[$x]['up_lat_dms_minutes'],
                    "up_lat_dms_seconds"     => $rel_data47[$x]['up_lat_dms_seconds'],
                    "iw_longitude_dms_direction"     => $rel_data47[$x]['iw_longitude_dms_direction'],
                    "iw_longitude_dms_degrees"     => $rel_data47[$x]['iw_longitude_dms_degrees'],
                    "iw_longitude_dms_minutes"     => $rel_data47[$x]['iw_longitude_dms_minutes'],
                    "iw_longitude_dms_seconds"     => $rel_data47[$x]['iw_longitude_dms_seconds'],
                    "iw_latitude_dms_direction"     => $rel_data47[$x]['iw_latitude_dms_direction'],
                    "iw_latitude_dms_degrees"     => $rel_data47[$x]['iw_latitude_dms_degrees'],
                    "iw_latitude_dms_minutes"     => $rel_data47[$x]['iw_latitude_dms_minutes'],
                    "iw_latitude_dms_seconds"     => $rel_data47[$x]['iw_latitude_dms_seconds'],
                    "waterbodysub_classID"     => $rel_data47[$x]['waterbodysub_classID'],
                );
            }
        }

        if (!empty($rel_data121)) {
            for($x = 0; $x < count($rel_data121); $x++){
                $datahiw[] = array(
                    "generatedcode"         => $rel_data121[$x]['codegen'],
                    "hiw_name"        => $rel_data121[$x]['hiw_name'],
                    "hiw_area"        => $rel_data121[$x]['hiw_area'],
                    "hiw_province"        => $rel_data121[$x]['hiw_province'],
                    "hiw_municipal"        => $rel_data121[$x]['hiw_municipal'],
                    "hiw_long"        => $rel_data121[$x]['hiw_long'],
                    "hiw_lat"        => $rel_data121[$x]['hiw_lat'],
                    "hiw_year_assessed"        => $rel_data121[$x]['hiw_year_assessed'],
                    "hwetland_type"        => $rel_data121[$x]['hwetland_type'],
                    "hiw_description"        => $rel_data121[$x]['hiw_description'],
                    "hinland_map_img"     => $rel_data121[$x]['hinland_map_img'],
                    "hinland_shp_file"     => $rel_data121[$x]['hinland_shp_file'],
                    "hwaterbody_classID"     => $rel_data121[$x]['hwaterbody_classID'],
                    "hdown_long_dms_direction"     => $rel_data121[$x]['hdown_long_dms_direction'],
                    "hdown_long_dms_degrees"     => $rel_data121[$x]['hdown_long_dms_degrees'],
                    "hdown_long_dms_minutes"     => $rel_data121[$x]['hdown_long_dms_minutes'],
                    "hdown_long_dms_seconds"     => $rel_data121[$x]['hdown_long_dms_seconds'],
                    "hdown_lat_dms_direction"     => $rel_data121[$x]['hdown_lat_dms_direction'],
                    "hdown_lat_dms_degrees"     => $rel_data121[$x]['hdown_lat_dms_degrees'],
                    "hdown_lat_dms_minutes"     => $rel_data121[$x]['hdown_lat_dms_minutes'],
                    "hdown_lat_dms_seconds"     => $rel_data121[$x]['hdown_lat_dms_seconds'],
                    "hmid_long_dms_direction"     => $rel_data121[$x]['hmid_long_dms_direction'],
                    "hmid_long_dms_degrees"     => $rel_data121[$x]['hmid_long_dms_degrees'],
                    "hmid_long_dms_minutes"     => $rel_data121[$x]['hmid_long_dms_minutes'],
                    "hmid_long_dms_seconds"     => $rel_data121[$x]['hmid_long_dms_seconds'],
                    "hmid_lat_dms_direction"     => $rel_data121[$x]['hmid_lat_dms_direction'],
                    "hmid_lat_dms_degrees"     => $rel_data121[$x]['hmid_lat_dms_degrees'],
                    "hmid_lat_dms_minutes"     => $rel_data121[$x]['hmid_lat_dms_minutes'],
                    "hmid_lat_dms_seconds"     => $rel_data121[$x]['hmid_lat_dms_seconds'],
                    "hup_long_dms_direction"     => $rel_data121[$x]['hup_long_dms_direction'],
                    "hup_long_dms_degrees"     => $rel_data121[$x]['hup_long_dms_degrees'],
                    "hup_long_dms_minutes"     => $rel_data121[$x]['hup_long_dms_minutes'],
                    "hup_long_dms_seconds"     => $rel_data121[$x]['hup_long_dms_seconds'],
                    "hup_lat_dms_direction"     => $rel_data121[$x]['hup_lat_dms_direction'],
                    "hup_lat_dms_degrees"     => $rel_data121[$x]['hup_lat_dms_degrees'],
                    "hup_lat_dms_minutes"     => $rel_data121[$x]['hup_lat_dms_minutes'],
                    "hup_lat_dms_seconds"     => $rel_data121[$x]['hup_lat_dms_seconds'],
                    "hiw_longitude_dms_direction"     => $rel_data121[$x]['hiw_longitude_dms_direction'],
                    "hiw_longitude_dms_degrees"     => $rel_data121[$x]['hiw_longitude_dms_degrees'],
                    "hiw_longitude_dms_minutes"     => $rel_data121[$x]['hiw_longitude_dms_minutes'],
                    "hiw_longitude_dms_seconds"     => $rel_data121[$x]['hiw_longitude_dms_seconds'],
                    "hiw_latitude_dms_direction"     => $rel_data121[$x]['hiw_latitude_dms_direction'],
                    "hiw_latitude_dms_degrees"     => $rel_data121[$x]['hiw_latitude_dms_degrees'],
                    "hiw_latitude_dms_minutes"     => $rel_data121[$x]['hiw_latitude_dms_minutes'],
                    "hiw_latitude_dms_seconds"     => $rel_data121[$x]['hiw_latitude_dms_seconds'],
                    "hwaterbodysub_classID"     => $rel_data121[$x]['hwaterbodysub_classID'],
                );
            }
        }

        if (!empty($rel_data122)) {
                for($x = 0; $x < count($rel_data122); $x++){
                $dataothertenure[] = array(
                    "generatedcode"         => $rel_data122[$x]['generatedcode'],
                    "tenure_holder"         => $rel_data122[$x]['tenure_holder'],
                    "type_instrument"         => $rel_data122[$x]['type_instrument'],
                    "tenure_purpose"         => $rel_data122[$x]['tenure_purpose'],
                    "other_instrument_location"         => $rel_data122[$x]['other_instrument_location'],
                    "other_instrument_area"         => $rel_data122[$x]['other_instrument_area'],
                    "other_instrument_start"         => $rel_data122[$x]['other_instrument_start'],
                    "other_instrument_expire"         => $rel_data122[$x]['other_instrument_expire'],
                    "other_instrument_status"         => $rel_data122[$x]['other_instrument_status'],
                    "other_instrument_file"         => $rel_data122[$x]['other_instrument_file'],
                    "other_instrument_map"         => $rel_data122[$x]['other_instrument_map'],
                    "other_instrument_shp"         => $rel_data122[$x]['other_instrument_shp'],
                    "date_created"         => $rel_data122[$x]['date_created'],
                    "titledno"         => $rel_data122[$x]['titledno'],
                );
            }
        }

        if (!empty($rel_data123)) {
                for($x = 0; $x < count($rel_data123); $x++){
                $dataurbaneco[] = array(
                    "generatedcode"         => $rel_data123[$x]['generatedcode'],
                    "cityurbanarea"         => $rel_data123[$x]['cityurbanarea'],
                    "cityurbanarea_specify"         => $rel_data123[$x]['cityurbanarea_specify'],
                    "citybioindex"         => $rel_data123[$x]['citybioindex'],
                    "lgu_reso_file"         => $rel_data123[$x]['lgu_reso_file'],
                );
            }
        }

        if (!empty($rel_data124)) {
                for($x = 0; $x < count($rel_data124); $x++){
                $datadisburse[] = array(
                    "generatedcode"         => $rel_data124[$x]['generatedcode'],
                    "year_disbursement"         => $rel_data124[$x]['year_disbursement'],
                    "disbursement_paria"         => $rel_data124[$x]['disbursement_paria'],
                    "disbursement_sagf"         => $rel_data124[$x]['disbursement_sagf'],
                    "disbursement_totals"         => $rel_data124[$x]['disbursement_totals'],
                    "disbursement_paria_file"         => $rel_data124[$x]['disbursement_paria_file'],
                    "disbursement_sagf_file"         => $rel_data124[$x]['disbursement_sagf_file'],
                );
            }
        }

        if (!empty($rel_data125)) {
                for($x = 0; $x < count($rel_data125); $x++){
                $datavisitorslog[] = array(
                    "generatedcode"         => $rel_data125[$x]['generatedcode'],
                    "visitorlog_month"         => $rel_data125[$x]['visitorlog_month'],
                    "visitorlog_day"         => $rel_data125[$x]['visitorlog_day'],
                    "visitorlog_year"         => $rel_data125[$x]['visitorlog_year'],
                    "visitorlog_fullname"         => $rel_data125[$x]['visitorlog_fullname'],
                    "visitorlog_forloc"         => $rel_data125[$x]['visitorlog_forloc'],
                    "visitorlog_nationality"         => $rel_data125[$x]['visitorlog_nationality'],
                    "visitorlog_below"         => $rel_data125[$x]['visitorlog_below'],
                    "visitorlog_student"         => $rel_data125[$x]['visitorlog_student'],
                    "visitorlog_senior"         => $rel_data125[$x]['visitorlog_senior'],
                    "visitorlog_pwd"         => $rel_data125[$x]['visitorlog_pwd'],
                    "visitorlog_sex"         => $rel_data125[$x]['visitorlog_sex'],
                    "visitorlog_address"         => $rel_data125[$x]['visitorlog_address'],
                    "visitorlog_typeofpaid"         => $rel_data125[$x]['visitorlog_typeofpaid'],
                    "visitorlog_amount"         => $rel_data125[$x]['visitorlog_amount'],

                );
            }
        }


        try{

            if (!empty($rel_data1)) {
                for($x =0; $x<count($rel_data1); $x++){
                    $this->db->insert('tblpamainlocation',$datas[$x]);
                }
            }
            if (!empty($rel_data2)) {
                for($xL =0; $xL<count($rel_data2); $xL++){
                    $this->db->insert('tblpamainlegislation',$dataLeg[$xL]);
                }
            }

            if (!empty($rel_data3)) {
                for($xx =0; $xx<count($rel_data3); $xx++){
                    $this->db->insert('tblpamainbiological',$dataBio[$xx]);
                }
            }

            if (!empty($rel_data3flora)) {
                for($xx =0; $xx<count($rel_data3flora); $xx++){
                    $this->db->insert('tblpamainbiological',$dataBioflora[$xx]);
                }
            }

            if (!empty($rel_data4)) {
                for($xP =0; $xP<count($rel_data4); $xP++){
                    $this->db->insert('tblpambmember',$dataPamb[$xP]);
                }
            }
            if (!empty($rel_data5)) {
                for($xPr =0; $xPr<count($rel_data5); $xPr++){
                    $this->db->insert('tblpamainproject',$dataProject[$xPr]);
                }
            }

            if (!empty($rel_data8)) {
                for($x =0; $x<count($rel_data8); $x++){
                    $this->db->insert('tblstrictprotzone',$dataStrict[$x]);
                }
            }

            if (!empty($rel_data9)) {
                for($xIII =0; $xIII<count($rel_data9); $xIII++){
                    $this->db->insert('tblpamultiplezone',$dataMultiple[$xIII]);
                }
            }

            if (!empty($rel_data10)) {
                for($ipaf_txt = 0; $ipaf_txt<count($rel_data10); $ipaf_txt++){
                    $this->db->insert('tblpaipafincome',$dataipafs[$ipaf_txt]);
                }
            }

            if (!empty($rel_data11)) {
                for($xVIA =0; $xVIA<count($rel_data11); $xVIA++){
                    $this->db->insert('tblpathreat',$dataT[$xVIA]);
                }
            }

            if (!empty($rel_data12)) {
                for($xVIB =0; $xVIB<count($rel_data12); $xVIB++){
                    $this->db->insert('tblpareference',$dataR[$xVIB]);
                }
            }
            if (!empty($rel_data15)) {
                for($xy61 =1; $xy61<count($rel_data15); $xy61++){
                    $this->db->insert('tbliccip',$dataip[$xy61]);
                }
            }
            if (!empty($rel_data16)) {
                for($xy611 =0; $xy611<count($rel_data16); $xy611++){
                    $this->db->insert('tblmainprogram',$dataPrograms[$xy611]);
                }
            }
            if (!empty($rel_data17)) {
                for($researchXY =0; $researchXY<count($rel_data17); $researchXY++){
                    $this->db->insert('tblmainresearcher',$datasearch[$researchXY]);
                }
            }
            if (!empty($rel_data18)) {
                for($staff =0; $staff<count($rel_data18); $staff++){
                    $this->db->insert('tblpasustaff',$datastaff[$staff]);
                }
            }
            if (!empty($rel_data19)) {
                for($topo1 =0; $topo1<count($rel_data19); $topo1++){
                    $this->db->insert('tblpatopology_description',$datatopo[$topo1]);
                }
            }

            if (!empty($rel_data20)) {
                for($soil =0; $soil<count($rel_data20); $soil++){
                    $this->db->insert('tblpageology_details',$datasoil[$soil]);
                }
            }

            if (!empty($rel_data21)) {
                for($climate =0; $climate<count($rel_data21); $climate++){
                    $this->db->insert('tblpaclimate_details',$dataclimate[$climate]);
                }
            }

            if (!empty($rel_data22)) {
                for($landslide =0; $landslide<count($rel_data22); $landslide++){
                    $this->db->insert('tblpahazardlandslide_details',$datalandslide[$landslide]);
                }
            }

            if (!empty($rel_data23)) {
                for($flooding =0; $flooding<count($rel_data23); $flooding++){
                    $this->db->insert('tblpahazardflooding_details',$dataflooding[$flooding]);
                }
            }

            if (!empty($rel_data24)) {
                for($sealevel =0; $sealevel<count($rel_data24); $sealevel++){
                    $this->db->insert('tblpahazardsealevelrise',$datasea[$sealevel]);
                }
            }

            if (!empty($rel_data25)) {
                for($tsunami =0; $tsunami<count($rel_data25); $tsunami++){
                    $this->db->insert('tblpahazardtsunami',$datatsunami[$tsunami]);
                }
            }

            if (!empty($rel_data26)) {
                for($attraction =0; $attraction<count($rel_data26); $attraction++){
                    $this->db->insert('tblpaattraction',$dataattract[$attraction]);
                }
            }

            if (!empty($rel_data27)) {
                for($facility =0; $facility<count($rel_data27); $facility++){
                    $this->db->insert('tblpafacility',$datafacility[$facility]);
                }
            }

            if (!empty($rel_data28)) {
                for($activity =0; $activity<count($rel_data28); $activity++){
                    $this->db->insert('tblpaecotourism',$dataactivity[$activity]);
                }
            }

            if (!empty($rel_data29)) {
                for($agro =0; $agro<count($rel_data29); $agro++){
                    $this->db->insert('tblpaagroforestry',$dataagro[$agro]);
                }
            }

            if (!empty($rel_data30)) {
                for($map =0; $map<count($rel_data30); $map++){
                    $this->db->insert('tblpamainimageupload',$datamap[$map]);
                }
            }

            if (!empty($rel_data31)) {
                for($visitors =0; $visitors<count($rel_data31); $visitors++){
                    $this->db->insert('tblpaipafvisitors',$datavisitores[$visitors]);
                }
            }

            if (!empty($rel_data33)) {
                for($recognition =0; $recognition<count($rel_data33); $recognition++){
                    $this->db->insert('tblrecognition',$datarecog[$recognition]);
                }
            }

            if (!empty($rel_data34)) {
                for($rock =0; $rock<count($rel_data34); $rock++){
                    $this->db->insert('tblparock_details',$datarock[$rock]);
                }
            }

            if (!empty($rel_data35)) {
                for($hazard =0; $hazard<count($rel_data35); $hazard++){
                    $this->db->insert('tblpageohazard',$datahazard[$hazard]);
                }
            }

            if (!empty($rel_data36)) {
                for($ff =0; $ff<count($rel_data36); $ff++){
                    $this->db->insert('tblpaforestformation_details',$dataff[$ff]);
                }
            }

            if (!empty($rel_data37)) {
                for($x =0; $x<count($rel_data37); $x++){
                    $this->db->insert('tblpainland',$datainland[$x]);
                }
            }

            if (!empty($rel_data38)) {
                for($x =0; $x<count($rel_data38); $x++){
                    $this->db->insert('tblpawetland',$data_wetland[$x]);
                }
            }

            if (!empty($rel_data39)) {
                for($x =0; $x<count($rel_data39); $x++){
                    $this->db->insert('tblpacaves',$datacave[$x]);
                }
            }

            if (!empty($rel_data40)) {
                for($x =0; $x<count($rel_data40); $x++){
                    $this->db->insert('tblmainprojects',$dataprojs[$x]);
                }
            }

            if (!empty($rel_data41)) {
                for($x =0; $x<count($rel_data41); $x++){
                    $this->db->insert('tblseamsdemographic',$datademo[$x]);
                }
            }

            if (!empty($rel_data43)) {
                for($x =0; $x<count($rel_data43); $x++){
                    $this->db->insert('tblpahydrology_details',$datahydro[$x]);
                }
            }

            if (!empty($rel_data44)) {
                for($x =0; $x<count($rel_data44); $x++){
                    $this->db->insert('tblpalanduse_details',$dataland[$x]);
                }
            }

            if (!empty($rel_data45)) {
                for($x =0; $x<count($rel_data45); $x++){
                    $this->db->insert('tblpavegetative_details',$datavegetative[$x]);
                }
            }

            if (!empty($rel_data46)) {
                for($x =0; $x<count($rel_data46); $x++){
                    $this->db->insert('tblpahazardfire',$datafire[$x]);
                }
            }

            if (!empty($rel_data47)) {
                for($x =0; $x<count($rel_data47); $x++){
                    $this->db->insert('tblpainlandwetland',$dataiw[$x]);
                }
            }

            if (!empty($rel_data104)) {
                for($x =0; $x<count($rel_data104); $x++){
                    $this->db->insert('tblpacoastalcorallocation',$datacoralreeflocation[$x]);
                }
            }

            if (!empty($rel_data105)) {
                for($x =0; $x<count($rel_data105); $x++){
                    $this->db->insert('tblpacoastalcoralspeciesdata',$datacoralreefspecies[$x]);
                }
            }

            if (!empty($rel_data106)) {
                for($x =0; $x<count($rel_data106); $x++){
                    $this->db->insert('tblpacoastalcoralspeciescomposition',$datacoralreefspeciescompo[$x]);
                }
            }

            if (!empty($rel_data107)) {
                for($x =0; $x<count($rel_data107); $x++){
                    $this->db->insert('tblpacoastalcoralspeciesmonitoringsite',$datacoralreefmonitoring[$x]);
                }
            }

            if (!empty($rel_data108)) {
                for($x =0; $x<count($rel_data108); $x++){
                    $this->db->insert('tblpacoastalcoralkmlkmz',$datacoralreefkmlkmz[$x]);
                }
            }

            if (!empty($rel_data109)) {
                for($x =0; $x<count($rel_data109); $x++){
                    $this->db->insert('tblpacoastalcoral_details',$datacoraldetails[$x]);
                }
            }


            if (!empty($rel_data110)) {
                for($x =0; $x<count($rel_data110); $x++){
                    $this->db->insert('tblpacoastalseagrass_details',$dataseagrassdetails[$x]);
                }
            }

            if (!empty($rel_data111)) {
                for($x =0; $x<count($rel_data111); $x++){
                    $this->db->insert('tblpacoastalseagrassspeciesdata',$dataseagrassspecies[$x]);
                }
            }

            if (!empty($rel_data112)) {
                for($x =0; $x<count($rel_data112); $x++){
                    $this->db->insert('tblpacoastalmangrove_details',$datamangrovedetails[$x]);
                }
            }

            if (!empty($rel_data113)) {
                for($x =0; $x<count($rel_data113); $x++){
                    $this->db->insert('tblpacoastalmangrovespeciesdata',$datamangrovespecies[$x]);
                }
            }

            if (!empty($rel_data114)) {
                for($x =0; $x<count($rel_data114); $x++){
                    $this->db->insert('tblpaproducts',$dataproducts[$x]);
                }
            }

            if (!empty($rel_data115)) {
                for($x =0; $x<count($rel_data115); $x++){
                    $this->db->insert('tblpaenterprise',$dataenterprise[$x]);
                }
            }

            if (!empty($rel_data116)) {
                for($x =0; $x<count($rel_data116); $x++){
                    $this->db->insert('tblpalivelihood',$datalivelihood[$x]);
                }
            }

            if (!empty($rel_data117)) {
                for($x =0; $x<count($rel_data117); $x++){
                    $this->db->insert('tblpamaintenuresapa',$datasapa[$x]);
                }
            }

            if (!empty($rel_data118)) {
                for($x =0; $x<count($rel_data118); $x++){
                    $this->db->insert('tblpamaintenuremoa',$datamoa[$x]);
                }
            }

            if (!empty($rel_data119)) {
                for($x =0; $x<count($rel_data119); $x++){
                    $this->db->insert('tblpamaintenurepacbrma',$datapacbrma[$x]);
                }
            }

            if (!empty($rel_data120)) {
                for($x =0; $x<count($rel_data120); $x++){
                    $this->db->insert('tblpamainwatershed',$datawatershed[$x]);
                }
            }

            if (!empty($rel_data121)) {
                for($x =0; $x<count($rel_data121); $x++){
                    $this->db->insert('tblpainlandhumanmade',$datahiw[$x]);
                }
            }

            if (!empty($rel_data122)) {
                for($x =0; $x<count($rel_data122); $x++){
                    $this->db->insert('tblpamaintenureothers',$dataothertenure[$x]);
                }
            }

            if (!empty($rel_data123)) {
                for($x =0; $x<count($rel_data123); $x++){
                    $this->db->insert('tblurbaneco',$dataurbaneco[$x]);
                }
            }

            if (!empty($rel_data124)) {
                for($x =0; $x<count($rel_data124); $x++){
                    $this->db->insert('tblpaipafdisbursementfiles',$datadisburse[$x]);
                }
            }

            if (!empty($rel_data125)) {
                for($x =0; $x<count($rel_data125); $x++){
                    $this->db->insert('tblipafvisitorslog',$datavisitorslog[$x]);
                }
            }

            $this->db->insert($this->table,$data);


            return "success";
        }catch(Exception $e){
            return "failed";
        }
    }

    public function updateMain($data,$rel_data1,$rel_data2,$rel_data3,$rel_data3flora,$rel_data4,$rel_data5,$rel_data6_1,$rel_data7_1,$rel_data8,$rel_data9,$rel_data10,$rel_data11,$rel_data12,$rel_data13_1,$rel_data14_1,$rel_data15,$rel_data16,$rel_data17,$rel_data18,$rel_data19,$rel_data20,$rel_data21,$rel_data22,$rel_data23,$rel_data24,$rel_data25,$rel_data26,$rel_data27,$rel_data28,$rel_data29,$rel_data30,$rel_data31,$rel_data33,$rel_data34,$rel_data35,$rel_data36,$rel_data37,$rel_data38,$rel_data39,$rel_data40,$rel_data41,$rel_data43,$rel_data44,$rel_data45,$rel_data46,$rel_data47,$rel_data104,$rel_data105,$rel_data106,$rel_data107,$rel_data108,$rel_data109,$rel_data110,$rel_data111,$rel_data112,$rel_data113,$rel_data114,$rel_data115,$rel_data116,$rel_data117,$rel_data118,$rel_data119,$rel_data120,$rel_data121,$rel_data122,$rel_data123,$rel_data124,$rel_data125)
    {
        if (!empty($rel_data1)) {
            for($x11 = 0; $x11 < count($rel_data1); $x11++){
                $datas[] = array(
                    "region_id" => $rel_data1[$x11]["region_ids"],
                    "province_id" => $rel_data1[$x11]["province_ids"],
                    "municipal_id" => $rel_data1[$x11]['municipal_ids'],
                    "barangay_id" => $rel_data1[$x11]['barangay_ids'],
                    "generatedcode" => $rel_data1[$x11]['codegen'],
                    "status"  => 1,
                );
            }
        }

        if (!empty($rel_data2)) {
            for($x2 = 0; $x2 < count($rel_data2); $x2++){
                $dataLeg[] = array(
                    "legis_id"      => $rel_data2[$x2]['legis_id'],
                    "legis_no"      => $rel_data2[$x2]['legis_no'],
                    "date_month"    => $rel_data2[$x2]['date_month'],
                    "date_day"      => $rel_data2[$x2]['date_day'],
                    "date_year"     => $rel_data2[$x2]['date_year'],
                    "generatedcode" => $rel_data2[$x2]['codegen'],
                    "nip_id" => $rel_data2[$x2]['nip_id'],
                    "nipsub_id" => $rel_data2[$x2]['nipsub_id'],
                    "legis_area" => $rel_data2[$x2]['legis_area'],
                );
            }
        }

        if (!empty($rel_data3)) {
            for($flora = 0; $flora < count($rel_data3); $flora++){
                $dataBio[] = array(
                    "id_genus_get"  => $rel_data3[$flora]['id_genus_get'],
                    "generatedcode" => $rel_data3[$flora]['codegen'],
                    "chk_forest" => $rel_data3[$flora]['chk_forest'],
                    "chk_inland" => $rel_data3[$flora]['chk_inland'],
                    "chk_cave" => $rel_data3[$flora]['chk_cave'],
                    "chk_coral" => $rel_data3[$flora]['chk_coral'],
                    "chk_seagrass" => $rel_data3[$flora]['chk_seagrass'],
                    "chk_mangrove" => $rel_data3[$flora]['chk_mangrove'],
                    "residency_status" => $rel_data3[$flora]['residency_status'],
                );
            }
        }

        if (!empty($rel_data3flora)) {
            for($flora = 0; $flora < count($rel_data3flora); $flora++){
                $dataBioflora[] = array(
                    "id_genus_get"  => $rel_data3flora[$flora]['id_genus_get'],
                    "generatedcode" => $rel_data3flora[$flora]['codegen'],
                    "chk_forest" => $rel_data3flora[$flora]['chk_forest'],
                    "chk_inland" => $rel_data3flora[$flora]['chk_inland'],
                    "chk_cave" => $rel_data3flora[$flora]['chk_cave'],
                    "chk_coral" => $rel_data3flora[$flora]['chk_coral'],
                    "chk_seagrass" => $rel_data3flora[$flora]['chk_seagrass'],
                    "chk_mangrove" => $rel_data3flora[$flora]['chk_mangrove'],
                    "residency_status" => $rel_data3flora[$flora]['residency_status'],
                );
            }
        }


        if (!empty($rel_data4)) {
           for($x4 = 0; $x4 < count($rel_data4); $x4++){
            $dataPamb[] = array(
                "generatedcode"         => $rel_data4[$x4]['codegen'],
                "fname"                 => $rel_data4[$x4]['fname'],
                "mname"                 => $rel_data4[$x4]['mname'],
                "lname"                 => $rel_data4[$x4]['lname'],
                "office_name"           => $rel_data4[$x4]['office_name'],
                "sex"                   => $rel_data4[$x4]['sex'],
                "civil_status"          => $rel_data4[$x4]['civil_status'],
                "designation"           => $rel_data4[$x4]['designation'],
                "appointment"           => $rel_data4[$x4]['appointment'],
                "sub_appointment"       => $rel_data4[$x4]['sub_appointment'],
                "appointment_month"     => $rel_data4[$x4]['appointment_month'],
                "appointment_day"       => $rel_data4[$x4]['appointment_day'],
                "appointment_year"      => $rel_data4[$x4]['appointment_year'],
                "status"                => $rel_data4[$x4]['status'],
                "residential_address"   => $rel_data4[$x4]['residential_address'],
                "pamb_landline"         => $rel_data4[$x4]['pamb_landline'],
                "pamb_mobile"           => $rel_data4[$x4]['pamb_mobile'],
                "techworkgrp"           => $rel_data4[$x4]['techworkgrp'],
                "techcom"               => $rel_data4[$x4]['techcom'],
                "execom"                => $rel_data4[$x4]['execom'],
                "date_created"          => $rel_data4[$x4]['date_created'],
                "pamb_file_appt"        => $rel_data4[$x4]['pamb_file_appt'],
                "alternateofficial"          => $rel_data4[$x4]['alternateofficial'],
            );
            }
        }

        if (!empty($rel_data5)) {
            for($x5 = 0; $x5 < count($rel_data5); $x5++){
                $dataProject[] = array(
                    "generatedcode" => $rel_data5[$x5]["generatedcode"],
                    "project_name" => $rel_data5[$x5]["project_name"],
                    "date_start" => $rel_data5[$x5]['date_start'],
                    "date_end" => $rel_data5[$x5]['date_end'],
                    "source_fund" => $rel_data5[$x5]['source_fund'],
                    "amount" => $rel_data5[$x5]['amount'],
                    "implementor" => $rel_data5[$x5]['implementor'],
                    "remarks" => $rel_data5[$x5]['remarks'],
                    "type_processing" => $rel_data5[$x5]['type_processing'],
                    "sapa_no" => $rel_data5[$x5]['sapa_no'],
                    "moa_date_signing_month" => $rel_data5[$x5]['moa_date_signing_month'],
                    "moa_date_signing_day" => $rel_data5[$x5]['moa_date_signing_day'],
                    "moa_date_signing_year" => $rel_data5[$x5]['moa_date_signing_year'],
                    "moa_date_exp_month" => $rel_data5[$x5]['moa_date_exp_month'],
                    "moa_date_exp_day" => $rel_data5[$x5]['moa_date_exp_day'],
                    "moa_date_exp_year" => $rel_data5[$x5]['moa_date_exp_year'],
                    "secondparty" => $rel_data5[$x5]['secondparty'],
                    "pacbrma_no" => $rel_data5[$x5]['pacbrma_no'],
                    "people_organization" => $rel_data5[$x5]['people_organization'],
                    "proj_location" => $rel_data5[$x5]['proj_location'],
                    "proj_area" => $rel_data5[$x5]['proj_area'],
                    "nature_development" => $rel_data5[$x5]['nature_development'],
                    "approve_docs" => $rel_data5[$x5]['approve_docs'],
                    "pcbrmamember_csv" => $rel_data5[$x5]['pcbrmamember_csv'],
                );
            }
        }

        if (!empty($rel_data8)) {
            for($x = 0; $x < count($rel_data8); $x++){
                $dataStrict[] = array(
                    "generatedcode"         => $rel_data8[$x]['codegen'],
                    "description"             => $rel_data8[$x]['description'],
                    "s_area"             => $rel_data8[$x]['s_area'],
                    "spzcat"             => $rel_data8[$x]['spzcat'],
                    "strictarchipelagic"             => $rel_data8[$x]['strictarchipelagic'],
                );
            }
        }

        if (!empty($rel_data9)) {
            for($x9 = 0; $x9 < count($rel_data9); $x9++){
                $dataMultiple[] = array(
                    "generatedcode"         => $rel_data9[$x9]['codegen'],
                    "description"             => $rel_data9[$x9]['description'],
                    "area"             => $rel_data9[$x9]['area'],
                    "multicat"             => $rel_data9[$x9]['multicat'],
                    "multiarchipelagic"             => $rel_data9[$x9]['multiarchipelagic'],
                );
            }
        }


        if (!empty($rel_data10)) {
            for($ipaf_txt = 0; $ipaf_txt < count($rel_data10); $ipaf_txt++){
                $dataipafs[] = array(
                    "generatedcode"         => $rel_data10[$ipaf_txt]['codegen'],
                    "date_month_income"        => $rel_data10[$ipaf_txt]['date_month_income'],
                    "date_year_income"        => $rel_data10[$ipaf_txt]['date_year_income'],
                    "entrancefee"        => $rel_data10[$ipaf_txt]['entrancefee'],
                    "facilities"        => $rel_data10[$ipaf_txt]['facilities'],
                    "resource"        => $rel_data10[$ipaf_txt]['resource'],
                    "concession"        => $rel_data10[$ipaf_txt]['concession'],
                    "development"        => $rel_data10[$ipaf_txt]['development'],
                    "finespenalties"        => $rel_data10[$ipaf_txt]['finespenalties'],
                    "other_specify_title"        => $rel_data10[$ipaf_txt]['other_specify_title'],
                    "other_specify_amount"        => $rel_data10[$ipaf_txt]['other_specify_amount']
                );
            }
        }

        if (!empty($rel_data11)) {
            for($x11 = 0; $x11 < count($rel_data11); $x11++){
                $dataT[] = array(
                    "generatedcode" => $rel_data11[$x11]['generatedcode'],
                    "img_threat"    => $rel_data11[$x11]['img_threat'],
                    "threats_rank"  => $rel_data11[$x11]['threats_rank'],
                    "qualifier" => $rel_data11[$x11]['qualifier'],
                    "threats_category"  => $rel_data11[$x11]['threats_category'],
                    "threats_sub"   => $rel_data11[$x11]['threats_sub'],
                    "threat_desc"   => $rel_data11[$x11]['threat_desc'],
                    "threats_location"  => $rel_data11[$x11]['threats_location'],
                    "threats_longitude_dms_direction"   => $rel_data11[$x11]['threats_longitude_dms_direction'],
                    "threats_longitude_dms_degrees" => $rel_data11[$x11]['threats_longitude_dms_degrees'],
                    "threats_longitude_dms_minutes" => $rel_data11[$x11]['threats_longitude_dms_minutes'],
                    "threats_longitude_dms_seconds" => $rel_data11[$x11]['threats_longitude_dms_seconds'],
                    "threats_latitude_dms_direction"    => $rel_data11[$x11]['threats_latitude_dms_direction'],
                    "threats_latitude_dms_degrees"  => $rel_data11[$x11]['threats_latitude_dms_degrees'],
                    "threats_latitude_dms_minutes"  => $rel_data11[$x11]['threats_latitude_dms_minutes'],
                    "threats_latitude_dms_seconds"  => $rel_data11[$x11]['threats_latitude_dms_seconds'],
                    "threats_month_observe" => $rel_data11[$x11]['threats_month_observe'],
                    "threats_year_observe"  => $rel_data11[$x11]['threats_year_observe'],
                    "date_upload"   => $rel_data11[$x11]['date_upload'],
                    "x_long" => $rel_data11[$x11]['x_long'],
                    "y_lat" => $rel_data11[$x11]['y_lat'],
                    "nature_threats" =>$rel_data11[$x11]['nature_threats'],
                    "sub_nature_threats" =>$rel_data11[$x11]['sub_nature_threats'],
                );
            }
        }

        if (!empty($rel_data12)) {
            for($x12 = 0; $x12 < count($rel_data12); $x12++){
                $dataR[] = array(
                    "generatedcode"         => $rel_data12[$x12]['codegen'],
                    "title"        => $rel_data12[$x12]['title'],
                    "author"        => $rel_data12[$x12]['author'],
                    "ref_date_month"        => $rel_data12[$x12]['ref_date_month'],
                    "ref_date_year"        => $rel_data12[$x12]['ref_date_year'],
                    "place"        => $rel_data12[$x12]['place'],
                    "sponsoring_body"        => $rel_data12[$x12]['sponsoring_body'],
                    "link"        => $rel_data12[$x12]['link'],
                    "ref_desc"        => $rel_data12[$x12]['ref_desc'],
                    "ref_usage"        => $rel_data12[$x12]['ref_usage'],
                    "date_created"   => $rel_data12[$x12]['date_created'],
                );
            }
        }

        if (!empty($rel_data15)) {
            for($xy15 = 0; $xy15 < count($rel_data15); $xy15++){
                $dataip[] = array(
                    "generatedcode"         => $rel_data15[$xy15]['codegen'],
                    "iccip"        => $rel_data15[$xy15]['iccip'],
                    "male_iccip"        => $rel_data15[$xy15]['male_iccip'],
                    "female_iccip"        => $rel_data15[$xy15]['female_iccip'],
                );
            }
        }

        if (!empty($rel_data16)) {
            for($proj = 0; $proj < count($rel_data16); $proj++){
                $dataPrograms[] = array(
                    "generatedcode"         => $rel_data16[$proj]['codegen'],
                    "program_name"        => $rel_data16[$proj]['program_name'],
                    "program_details"        => $rel_data16[$proj]['program_details'],

                );
            }
        }

        if (!empty($rel_data17)) {
            for($researchX = 0; $researchX < count($rel_data17); $researchX++){
                $datasearch[] = array(
                    "generatedcode"   => $rel_data17[$researchX]['codegen'],
                    "research_type"   => $rel_data17[$researchX]['research_type'],
                    "research_purpose"  => $rel_data17[$researchX]['research_purpose'],
                    "research_year" => $rel_data17[$researchX]['research_year'],
                    "funding_agency"    => $rel_data17[$researchX]['funding_agency'],
                    "name_researcher"   => $rel_data17[$researchX]['name_researcher'],
                    "institution"   => $rel_data17[$researchX]['institution'],
                    "permit_no" => $rel_data17[$researchX]['permit_no'],
                    "search_permit_attache" => $rel_data17[$researchX]['search_permit_attached'],
                    "pamb_reso_no"  => $rel_data17[$researchX]['pamb_reso_no'],
                    "pamb_reso_title"   => $rel_data17[$researchX]['pamb_reso_title'],
                    "research_reso_file"    => $rel_data17[$researchX]['research_reso_file'],
                );
            }
        }

        if (!empty($rel_data18)) {
            for($staff = 0; $staff < count($rel_data18); $staff++){
                $datastaff[] = array(
                    "generatedcode"         => $rel_data18[$staff]['codegen'],
                    "tfname"         => $rel_data18[$staff]['tfname'],
                    "tmname"         => $rel_data18[$staff]['tmname'],
                    "tlname"         => $rel_data18[$staff]['tlname'],
                    "tsex"         => $rel_data18[$staff]['tsex'],
                    "tage"         => $rel_data18[$staff]['tage'],
                    "tstatus"         => $rel_data18[$staff]['tstatus'],
                    "tposition"         => $rel_data18[$staff]['tposition'],
                    "appointed_month"         => $rel_data18[$staff]['appointed_month'],
                    "appointed_year"         => $rel_data18[$staff]['appointed_year'],
                    "status"         => $rel_data18[$staff]['status'],
                    "date_created"         => $rel_data18[$staff]['date_created'],
                );
            }
        }

        if (!empty($rel_data19)) {
            for($topo1 = 0; $topo1 < count($rel_data19); $topo1++){
                $datatopo[] = array(
                    "generatedcode"         => $rel_data19[$topo1]['codegen'],
                    "topology_desc"        => $rel_data19[$topo1]['topology_desc'],
                    "date_created"        => $rel_data19[$topo1]['date_created'],
                );
            }
        }

        if (!empty($rel_data20)) {
            for($soil = 0; $soil < count($rel_data20); $soil++){
                $datasoil[] = array(
                    "generatedcode"         => $rel_data20[$soil]['codegen'],
                    "geology_desc"        => $rel_data20[$soil]['geology_desc'],
                    "date_created"        => $rel_data20[$soil]['date_created'],
                );
            }
        }

        if (!empty($rel_data21)) {
            for($climate = 0; $climate < count($rel_data21); $climate++){
                $dataclimate[] = array(
                    "generatedcode"         => $rel_data21[$climate]['codegen'],
                    "climate_desc"        => $rel_data21[$climate]['climate_desc'],
                    "date_created"        => $rel_data21[$climate]['date_created'],
                    "climate_type"        => $rel_data21[$climate]['climate_type'],
                );
            }
        }

        if (!empty($rel_data22)) {
            for($landlside = 0; $landlside < count($rel_data22); $landlside++){
                $datalandslide[] = array(
                    "generatedcode"         => $rel_data22[$landlside]['codegen'],
                    "landslide_desc"        => $rel_data22[$landlside]['landslide_desc'],
                    "landslide_area"        => $rel_data22[$landlside]['landslide_area'],
                    "landslide_remarks"     => $rel_data22[$landlside]['landslide_remarks'],
                    "date_created"          => $rel_data22[$landlside]['date_created'],
                );
            }
        }

        if (!empty($rel_data23)) {
            for($flooding = 0; $flooding < count($rel_data23); $flooding++){
                $dataflooding[] = array(
                    "generatedcode"         => $rel_data23[$flooding]['codegen'],
                    "flooding_desc"        => $rel_data23[$flooding]['flooding_desc'],
                    "flooding_area"        => $rel_data23[$flooding]['flooding_area'],
                    "flooding_remarks"        => $rel_data23[$flooding]['flooding_remarks'],
                    "date_created"        => $rel_data23[$flooding]['date_created'],
                );
            }
        }

        if (!empty($rel_data24)) {
            for($sea = 0; $sea < count($rel_data24); $sea++){
                $datasea[] = array(
                    "generatedcode"         => $rel_data24[$sea]['codegen'],
                    "sea_desc"        => $rel_data24[$sea]['sea_desc'],
                    "sea_img"        => $rel_data24[$sea]['sea_img'],
                );
            }
        }

        if (!empty($rel_data25)) {
            for($tsunami = 0; $tsunami < count($rel_data25); $tsunami++){
                $datatsunami[] = array(
                    "generatedcode"         => $rel_data25[$tsunami]['codegen'],
                    "tsunami_desc"        => $rel_data25[$tsunami]['tsunami_desc'],
                    "tsunami_img"        => $rel_data25[$tsunami]['tsunami_img'],
                );
            }
        }

        if (!empty($rel_data26)) {
            for($attraction = 0; $attraction < count($rel_data26); $attraction++){
                $dataattract[] = array(
                    "generatedcode"         => $rel_data26[$attraction]['codegen'],
                    "title"        => $rel_data26[$attraction]['title'],
                    "description"        => $rel_data26[$attraction]['description'],
                    "image_attr"        => $rel_data26[$attraction]['image_attr'],
                    "eco_activity"        => $rel_data26[$attraction]['eco_activity'],
                    "other_activity"        => $rel_data26[$attraction]['other_activity'],
                );
            }
        }

        if (!empty($rel_data27)) {
            for($facility = 0; $facility < count($rel_data27); $facility++){
                $datafacility[] = array(
                    "generatedcode"         => $rel_data27[$facility]['codegen'],
                    "title_facility"        => $rel_data27[$facility]['title_facility'],
                    "description_facility"        => $rel_data27[$facility]['description_facility'],
                    "image_facility"        => $rel_data27[$facility]['image_facility'],
                    "facility_date_month"        => $rel_data27[$facility]['facility_date_month'],
                    "facility_date_year"        => $rel_data27[$facility]['facility_date_year'],
                    "facility_condition"        => $rel_data27[$facility]['facility_condition'],
                    "noaccomodate"        => $rel_data27[$facility]['noaccomodate'],
                );
            }
        }

        if (!empty($rel_data28)) {
            for($activity = 0; $activity < count($rel_data28); $activity++){
                $dataactivity[] = array(
                    "generatedcode"         => $rel_data28[$activity]['codegen'],
                    "activity_title"        => $rel_data28[$activity]['activity_title'],
                    "description_activity"        => $rel_data28[$activity]['description_activity'],
                    "image_eco"        => $rel_data28[$activity]['image_eco'],
                );
            }
        }

        if (!empty($rel_data29)) {
            for($agro = 0; $agro < count($rel_data29); $agro++){
                $dataagro[] = array(
                    "generatedcode"         => $rel_data29[$agro]['codegen'],
                    "title_agro"        => $rel_data29[$agro]['title_agro'],
                    "description_agro"        => $rel_data29[$agro]['description_agro'],
                    "has_agro"        => $rel_data29[$agro]['has_agro'],
                    "image_agro"        => $rel_data29[$agro]['image_agro'],
                );
            }
        }

        if (!empty($rel_data30)) {
            for($maps = 0; $maps < count($rel_data30); $maps++){
                $datamap[] = array(
                    "generatedcode"         => $rel_data30[$maps]['codegen'],
                    "filename"        => $rel_data30[$maps]['filename'],
                    "remarks"        => $rel_data30[$maps]['remarks']
                );
            }
        }

        if (!empty($rel_data31)) {
            for($visitor = 0; $visitor < count($rel_data31); $visitor++){
                $datavisitores[] = array(
                    "generatedcode"         => $rel_data31[$visitor]['codegen'],
                    "date_month"        => $rel_data31[$visitor]['date_month'],
                    "date_year"        => $rel_data31[$visitor]['date_year'],
                    "no_male_local"        => $rel_data31[$visitor]['no_male_local'],
                    "no_female_local"        => $rel_data31[$visitor]['no_female_local'],
                    "no_male_foreign"        => $rel_data31[$visitor]['no_male_foreign'],
                    "no_female_foreign"        => $rel_data31[$visitor]['no_female_foreign'],

                );
            }
        }

        if (!empty($rel_data33)) {
            for($recognition = 0; $recognition < count($rel_data33); $recognition++){
                $datarecog[] = array(
                    "generatedcode"         => $rel_data33[$recognition]['codegen'],
                    "recognition"        => $rel_data33[$recognition]['recognition'],
                    "month_declared"        => $rel_data33[$recognition]['month_declared'],
                    "year_declared"        => $rel_data33[$recognition]['year_declared'],
                    "inscribed"        => $rel_data33[$recognition]['inscribed'],
                    "siteno"        => $rel_data33[$recognition]['siteno'],
                    "recog_sub"        => $rel_data33[$recognition]['recog_sub'],
                );
            }
        }

        if (!empty($rel_data34)) {
            for($rock = 0; $rock < count($rel_data34); $rock++){
                $datarock[] = array(
                    "generatedcode"         => $rel_data34[$rock]['codegen'],
                    "rock_details"        => $rel_data34[$rock]['rock_details'],
                    "date_created"        => $rel_data34[$rock]['date_created'],
                );
            }
        }

        if (!empty($rel_data35)) {
            for($hazard = 0; $hazard < count($rel_data35); $hazard++){
                $datahazard[] = array(
                    "generatedcode"         => $rel_data35[$hazard]['codegen'],
                    "geohazard_desc"        => $rel_data35[$hazard]['geohazard_desc'],
                    "geohazard_map"        => $rel_data35[$hazard]['geohazard_map'],
                );
            }
        }

        if (!empty($rel_data36)) {
            for($ff = 0; $ff < count($rel_data36); $ff++){
                $dataff[] = array(
                    "generatedcode"         => $rel_data36[$ff]['codegen'],
                    "forest_formation"        => $rel_data36[$ff]['forest_formation'],
                    "forest_formation_area"        => $rel_data36[$ff]['forest_formation_area'],
                    "forest_formation_remarks"        => $rel_data36[$ff]['forest_formation_remarks'],
                    "date_created"        => $rel_data36[$ff]['date_created'],
                );
            }
        }

        if (!empty($rel_data37)) {
            for($x = 0; $x < count($rel_data37); $x++){
                $datainland[] = array(
                    "generatedcode"         => $rel_data37[$x]['codegen'],
                    "inland_desc"        => $rel_data37[$x]['inland_desc'],
                    "inland_area"        => $rel_data37[$x]['inland_area'],
                );
            }
        }
        if (!empty($rel_data38)) {
            for($x = 0; $x < count($rel_data38); $x++){
                $data_wetland[] = array(
                    "generatedcode"         => $rel_data38[$x]['codegen'],
                    "wetland_desc"        => $rel_data38[$x]['wetland_desc'],
                    "wetland_area"        => $rel_data38[$x]['wetland_area'],
                );
            }
        }
        if (!empty($rel_data39)) {
            for($x = 0; $x < count($rel_data39); $x++){
                $datacave[] = array(
                    "generatedcode"     => $rel_data39[$x]['codegen'],
                    "caves_name"        => $rel_data39[$x]['caves_name'],
                    "caves_area"        => $rel_data39[$x]['caves_area'],
                    "cave_province"     => $rel_data39[$x]['cave_province'],
                    "cave_municipal"    => $rel_data39[$x]['cave_municipal'],
                    "cave_barangay"     => $rel_data39[$x]['cave_barangay'],
                    "land_status"        => $rel_data39[$x]['land_status'],
                    "date_created"        => $rel_data39[$x]['date_created'],
                    "cave_longitude_dms_direction"        => $rel_data39[$x]['cave_longitude_dms_direction'],
                    "cave_longitude_dms_degrees"        => $rel_data39[$x]['cave_longitude_dms_degrees'],
                    "cave_longitude_dms_minutes"        => $rel_data39[$x]['cave_longitude_dms_minutes'],
                    "cave_longitude_dms_seconds"        => $rel_data39[$x]['cave_longitude_dms_seconds'],
                    "cave_latitude_dms_direction"        => $rel_data39[$x]['cave_latitude_dms_direction'],
                    "cave_latitude_dms_degrees"        => $rel_data39[$x]['cave_latitude_dms_degrees'],
                    "cave_latitude_dms_minutes"        => $rel_data39[$x]['cave_latitude_dms_minutes'],
                    "cave_latitude_dms_seconds"        => $rel_data39[$x]['cave_latitude_dms_seconds'],
                    "x_long"        => $rel_data39[$x]['x_long'],
                    "y_lat"        => $rel_data39[$x]['y_lat'],
                    "cave_status"        => $rel_data39[$x]['cave_status'],
                    "cave_class_sub"        => $rel_data39[$x]['cave_class_sub'],
                );
            }
        }
        if (!empty($rel_data40)) {
            for($projs = 0; $projs < count($rel_data40); $projs++){
                $dataprojs[] = array(
                    "generatedcode"         => $rel_data40[$projs]['codegen'],
                    "proj_name"        => $rel_data40[$projs]['proj_name'],
                    "proj_start_implement_month"        => $rel_data40[$projs]['proj_start_implement_month'],
                    "proj_start_implement_year"        => $rel_data40[$projs]['proj_start_implement_year'],
                    "proj_end_implement_month"        => $rel_data40[$projs]['proj_end_implement_month'],
                    "proj_end_implement_year"        => $rel_data40[$projs]['proj_end_implement_year'],
                    "source_fund"        => $rel_data40[$projs]['source_fund'],
                    "proj_cost"        => $rel_data40[$projs]['proj_cost'],
                    "proj_area"        => $rel_data40[$projs]['proj_area'],
                    "proj_location"        => $rel_data40[$projs]['proj_location'],
                    "proj_remarks"        => $rel_data40[$projs]['proj_remarks'],
                    "proj_proponent"        => $rel_data40[$projs]['proj_proponent'],
                    "proj_code"        => $rel_data40[$projs]['proj_code'],

                );
            }
        }

        if (!empty($rel_data41)) {
            for($demo = 0; $demo < count($rel_data41); $demo++){
                $datademo[] = array(
                    "generatedcode"         => $rel_data41[$demo]['codegen'],
                    "seams_region"        => $rel_data41[$demo]['seams_region'],
                    "seams_province"        => $rel_data41[$demo]['seams_province'],
                    "seams_municipality"        => $rel_data41[$demo]['seams_municipality'],
                    "seams_barangay"        => $rel_data41[$demo]['seams_barangay'],
                    "name_household_head"        => $rel_data41[$demo]['name_household_head'],
                    "seams_sex_head"        => $rel_data41[$demo]['seams_sex_head'],
                    "seams_male"        => $rel_data41[$demo]['seams_male'],
                    "seams_female"        => $rel_data41[$demo]['seams_female'],
                    "area_farmlot"        => $rel_data41[$demo]['area_farmlot'],
                    "area_homelot"        => $rel_data41[$demo]['area_homelot'],
                    "other_uses"        => $rel_data41[$demo]['other_uses'],
                    "area_occupied"        => $rel_data41[$demo]['area_occupied'],
                    "date_occupy_month"        => $rel_data41[$demo]['date_occupy_month'],
                    "date_occupy_year"        => $rel_data41[$demo]['date_occupy_year'],
                    "seams_remarks"        => $rel_data41[$demo]['seams_remarks'],
                    "longitude_dms_direction"         => $rel_data41[$demo]['longitude_dms_direction'],
                    "longitude_dms_degrees"         => $rel_data41[$demo]['longitude_dms_degrees'],
                    "longitude_dms_minutes"         => $rel_data41[$demo]['longitude_dms_minutes'],
                    "longitude_dms_seconds"         => $rel_data41[$demo]['longitude_dms_seconds'],
                    "latitude_dms_direction"         => $rel_data41[$demo]['latitude_dms_direction'],
                    "latitude_dms_degrees"         => $rel_data41[$demo]['latitude_dms_degrees'],
                    "latitude_dms_minutes"         => $rel_data41[$demo]['latitude_dms_minutes'],
                    "latitude_dms_seconds"         => $rel_data41[$demo]['latitude_dms_seconds'],
                    "tenured_migrant"         => $rel_data41[$demo]['tenured_migrant'],
                    "ipsiccs"         => $rel_data41[$demo]['ipsiccs'],
                    "chkhomelot"         => $rel_data41[$demo]['chkhomelot'],
                    "x_long"         => $rel_data41[$demo]['x_long'],
                    "y_lat"         => $rel_data41[$demo]['y_lat'],
                    "shp_zip"         => $rel_data41[$demo]['shp_zip'],
                );
            }
        }

        if (!empty($rel_data43)) {
            for($hydro = 0; $hydro < count($rel_data43); $hydro++){
                $datahydro[] = array(
                    "generatedcode"         => $rel_data43[$hydro]['codegen'],
                    "hydro_desc"        => $rel_data43[$hydro]['hydro_desc'],
                    "date_created"        => $rel_data43[$hydro]['date_created'],
                    "hydro_class"        => $rel_data43[$hydro]['hydro_class'],
                    "hydroSub_class"        => $rel_data43[$hydro]['hydroSub_class'],
                    "hydro_map_img"        => $rel_data43[$hydro]['hydro_map_img'],
                    "hydro_shp_file"        => $rel_data43[$hydro]['hydro_shp_file'],
                    "riverinflow"        => $rel_data43[$hydro]['riverinflow'],
                    "riveroutflow"        => $rel_data43[$hydro]['riveroutflow'],
                );
            }
        }

        if (!empty($rel_data44)) {
            for($x = 0; $x < count($rel_data44); $x++){
                $dataland[] = array(
                    "generatedcode"         => $rel_data44[$x]['codegen'],
                    "landuse_type"        => $rel_data44[$x]['landuse_type'],
                    "landuse_sub"        => $rel_data44[$x]['landuse_sub'],
                    "landuse_area"        => $rel_data44[$x]['landuse_area'],
                    "remarks"        => $rel_data44[$x]['remarks'],
                    "date_created"        => $rel_data44[$x]['date_created'],
                );
            }
        }

        if (!empty($rel_data45)) {
            for($x = 0; $x < count($rel_data45); $x++){
                $datavegetative[] = array(
                   "generatedcode"         => $rel_data45[$x]['codegen'],
                    "vegetative_desc"        => $rel_data45[$x]['vegetative_desc'],
                    "vegetative_area"        => $rel_data45[$x]['vegetative_area'],
                    "vremarks"        => $rel_data45[$x]['vremarks'],
                    "date_created"        => $rel_data45[$x]['date_created'],
                );
            }
        }

        if (!empty($rel_data46)) {
            for($x = 0; $x < count($rel_data46); $x++){
                $datafire[] = array(
                    "generatedcode"         => $rel_data46[$x]['codegen'],
                    "fire_desc"        => $rel_data46[$x]['fire_desc'],
                    "fire_img"        => $rel_data46[$x]['fire_img'],
                );
            }
        }

        if (!empty($rel_data47)) {
            for($x = 0; $x < count($rel_data47); $x++){
                $dataiw[] = array(
                    "generatedcode"         => $rel_data47[$x]['codegen'],
                    "iw_name"        => $rel_data47[$x]['iw_name'],
                    "iw_area"        => $rel_data47[$x]['iw_area'],
                    "iw_province"        => $rel_data47[$x]['iw_province'],
                    "iw_municipal"        => $rel_data47[$x]['iw_municipal'],
                    "iw_long"        => $rel_data47[$x]['iw_long'],
                    "iw_lat"        => $rel_data47[$x]['iw_lat'],
                    "iw_year_assessed"        => $rel_data47[$x]['iw_year_assessed'],
                    "wetland_type"        => $rel_data47[$x]['wetland_type'],
                    "iw_description"        => $rel_data47[$x]['iw_description'],
                    "inland_map_img"     => $rel_data47[$x]['inland_map_img'],
                    "inland_shp_file"     => $rel_data47[$x]['inland_shp_file'],
                    "waterbody_classID"     => $rel_data47[$x]['waterbody_classID'],
                    "down_long_dms_direction"     => $rel_data47[$x]['down_long_dms_direction'],
                    "down_long_dms_degrees"     => $rel_data47[$x]['down_long_dms_degrees'],
                    "down_long_dms_minutes"     => $rel_data47[$x]['down_long_dms_minutes'],
                    "down_long_dms_seconds"     => $rel_data47[$x]['down_long_dms_seconds'],
                    "down_lat_dms_direction"     => $rel_data47[$x]['down_lat_dms_direction'],
                    "down_lat_dms_degrees"     => $rel_data47[$x]['down_lat_dms_degrees'],
                    "down_lat_dms_minutes"     => $rel_data47[$x]['down_lat_dms_minutes'],
                    "down_lat_dms_seconds"     => $rel_data47[$x]['down_lat_dms_seconds'],
                    "mid_long_dms_direction"     => $rel_data47[$x]['mid_long_dms_direction'],
                    "mid_long_dms_degrees"     => $rel_data47[$x]['mid_long_dms_degrees'],
                    "mid_long_dms_minutes"     => $rel_data47[$x]['mid_long_dms_minutes'],
                    "mid_long_dms_seconds"     => $rel_data47[$x]['mid_long_dms_seconds'],
                    "mid_lat_dms_direction"     => $rel_data47[$x]['mid_lat_dms_direction'],
                    "mid_lat_dms_degrees"     => $rel_data47[$x]['mid_lat_dms_degrees'],
                    "mid_lat_dms_minutes"     => $rel_data47[$x]['mid_lat_dms_minutes'],
                    "mid_lat_dms_seconds"     => $rel_data47[$x]['mid_lat_dms_seconds'],
                    "up_long_dms_direction"     => $rel_data47[$x]['up_long_dms_direction'],
                    "up_long_dms_degrees"     => $rel_data47[$x]['up_long_dms_degrees'],
                    "up_long_dms_minutes"     => $rel_data47[$x]['up_long_dms_minutes'],
                    "up_long_dms_seconds"     => $rel_data47[$x]['up_long_dms_seconds'],
                    "up_lat_dms_direction"     => $rel_data47[$x]['up_lat_dms_direction'],
                    "up_lat_dms_degrees"     => $rel_data47[$x]['up_lat_dms_degrees'],
                    "up_lat_dms_minutes"     => $rel_data47[$x]['up_lat_dms_minutes'],
                    "up_lat_dms_seconds"     => $rel_data47[$x]['up_lat_dms_seconds'],
                    "iw_longitude_dms_direction"     => $rel_data47[$x]['iw_longitude_dms_direction'],
                    "iw_longitude_dms_degrees"     => $rel_data47[$x]['iw_longitude_dms_degrees'],
                    "iw_longitude_dms_minutes"     => $rel_data47[$x]['iw_longitude_dms_minutes'],
                    "iw_longitude_dms_seconds"     => $rel_data47[$x]['iw_longitude_dms_seconds'],
                    "iw_latitude_dms_direction"     => $rel_data47[$x]['iw_latitude_dms_direction'],
                    "iw_latitude_dms_degrees"     => $rel_data47[$x]['iw_latitude_dms_degrees'],
                    "iw_latitude_dms_minutes"     => $rel_data47[$x]['iw_latitude_dms_minutes'],
                    "iw_latitude_dms_seconds"     => $rel_data47[$x]['iw_latitude_dms_seconds'],
                );
            }
        }

        if (!empty($rel_data104)) {
                for($x = 0; $x < count($rel_data104); $x++){
                $datacoralreeflocation[] = array(
                    "generatedcode"         => $rel_data104[$x]['codegen'],
                    "coastal_generatedcode"         => $rel_data104[$x]['Ccodegen'],
                    "coral_municipal"         => $rel_data104[$x]['coral_municipal'],
                    "coral_barangay"         => $rel_data104[$x]['coral_barangay'],
                );
            }
        }

        if (!empty($rel_data105)) {
                for($x = 0; $x < count($rel_data105); $x++){
                $datacoralreefspecies[] = array(
                    "generatedcode"         => $rel_data105[$x]['codegen'],
                    "coastal_generatedcode"         => $rel_data105[$x]['Ccodegen'],
                    "coralspecies_id"         => $rel_data105[$x]['coralspecies_id'],
                    "date_upload"         => $rel_data105[$x]['date_upload'],
                );
            }
        }

        if (!empty($rel_data106)) {
                for($x = 0; $x < count($rel_data106); $x++){
                $datacoralreefspeciescompo[] = array(
                    "generatedcode"         => $rel_data106[$x]['codegen'],
                    "coastal_generatedcode"         => $rel_data106[$x]['Ccodegen'],
                    "speciescompo_img"         => $rel_data106[$x]['speciescompo_img'],
                    "species_name"         => $rel_data106[$x]['species_name'],
                );
            }
        }

        if (!empty($rel_data107)) {
                for($x = 0; $x < count($rel_data107); $x++){
                $datacoralreefmonitoring[] = array(
                    "generatedcode"         => $rel_data107[$x]['codegen'],
                    "coastal_generatedcode"         => $rel_data107[$x]['Ccodegen'],
                    "monitoring_site_point"         => $rel_data107[$x]['monitoring_site_point'],
                );
            }
        }

        if (!empty($rel_data108)) {
                for($x = 0; $x < count($rel_data108); $x++){
                $datacoralreefkmlkmz[] = array(
                    "generatedcode"         => $rel_data108[$x]['codegen'],
                    "coastal_generatedcode"         => $rel_data108[$x]['Ccodegen'],
                    "kmlkmz"         => $rel_data108[$x]['kmlkmz'],
                );
            }
        }

        if (!empty($rel_data109)) {
                for($x = 0; $x < count($rel_data109); $x++){
                $datacoraldetails[] = array(
                    "generatedcode"         => $rel_data109[$x]['codegen'],
                    "coastal_generatedcode"         => $rel_data109[$x]['Ccodegen'],
                    "coral_has"         => $rel_data109[$x]['coral_has'],
                    "coral_remarks"         => $rel_data109[$x]['coral_remarks'],
                    "date_created"         => $rel_data109[$x]['date_created'],
                    "hcc_category"         => $rel_data109[$x]['hcc_category'],
                );
            }
        }

        if (!empty($rel_data110)) {
                for($x = 0; $x < count($rel_data110); $x++){
                $dataseagrassdetails[] = array(
                    "generatedcode"         => $rel_data110[$x]['codegen'],
                    "coastal_generatedcode"         => $rel_data110[$x]['Ccodegen'],
                    "seagrass_area"         => $rel_data110[$x]['seagrass_area'],
                    "seagrass_remarks"         => $rel_data110[$x]['seagrass_remarks'],
                    "date_created"         => $rel_data110[$x]['date_created'],
                    "seagrass_conditions"         => $rel_data110[$x]['seagrass_condition'],
                );
            }
        }

        if (!empty($rel_data111)) {
                for($x = 0; $x < count($rel_data111); $x++){
                $dataseagrassspecies[] = array(
                    "generatedcode"         => $rel_data111[$x]['codegen'],
                    "seagrass_generatedcode"         => $rel_data111[$x]['Ccodegen'],
                    "seagrass_species_name"         => $rel_data111[$x]['seagrass_species_name'],
                    "date_created"         => $rel_data111[$x]['date_upload'],
                );
            }
        }

        if (!empty($rel_data112)) {
                for($x = 0; $x < count($rel_data112); $x++){
                $datamangrovedetails[] = array(
                    "generatedcode"         => $rel_data112[$x]['codegen'],
                    "mangrove_generatedcode"         => $rel_data112[$x]['Ccodegen'],
                    "mangrove_area"         => $rel_data112[$x]['mangrove_area'],
                    "mangrove_remarks"         => $rel_data112[$x]['mangrove_remarks'],
                    "date_created"         => $rel_data112[$x]['date_created'],
                    "mangrove_condition"         => $rel_data112[$x]['mangrove_condition'],
                );
            }
        }

        if (!empty($rel_data113)) {
                for($x = 0; $x < count($rel_data113); $x++){
                $datamangrovespecies[] = array(
                    "generatedcode"         => $rel_data113[$x]['codegen'],
                    "mangrove_generatedcode"         => $rel_data113[$x]['Ccodegen'],
                    "mangrove_species"         => $rel_data113[$x]['mangrove_species'],
                    "date_upload"         => $rel_data113[$x]['date_upload'],
                );
            }
        }

        if (!empty($rel_data114)) {
                for($x = 0; $x < count($rel_data114); $x++){
                $dataproducts[] = array(
                    "generatedcode"         => $rel_data114[$x]['codegen'],
                    "prod_img"         => $rel_data114[$x]['prod_img'],
                    "prod_desc"         => $rel_data114[$x]['prod_desc'],
                );
            }
        }

        if (!empty($rel_data115)) {
                for($x = 0; $x < count($rel_data115); $x++){
                $dataenterprise[] = array(
                    "generatedcode"         => $rel_data115[$x]['codegen'],
                    "enterprise_img"         => $rel_data115[$x]['enterprise_img'],
                    "enterprise_desc"         => $rel_data115[$x]['enterprise_desc'],
                );
            }
        }

        if (!empty($rel_data116)) {
                for($x = 0; $x < count($rel_data116); $x++){
                $datalivelihood[] = array(
                    "generatedcode" => $rel_data116[$x]['generatedcode'],
"bdfe_codegen" => $rel_data116[$x]['bdfe_codegen'],
"enterprise_name" => $rel_data116[$x]['enterprise_name'],
"lh_po_assisted" => $rel_data116[$x]['lh_po_assisted'],
"dor_month" => $rel_data116[$x]['dor_month'],
"dor_day" => $rel_data116[$x]['dor_day'],
"dor_year" => $rel_data116[$x]['dor_year'],
"type_registration" => $rel_data116[$x]['type_registration'],
"lh_category" => $rel_data116[$x]['lh_category'],
"lh_sub_category" => $rel_data116[$x]['lh_sub_category'],
"lh_category_others" => $rel_data116[$x]['lh_category_others'],
"lh_products" => $rel_data116[$x]['lh_products'],
"lh_region" => $rel_data116[$x]['lh_region'],
"lh_province" => $rel_data116[$x]['lh_province'],
"lh_municipal" => $rel_data116[$x]['lh_municipal'],
"lh_barangay" => $rel_data116[$x]['lh_barangay'],
"lh_product_source" => $rel_data116[$x]['lh_product_source'],
"lh_long_dms_direction" => $rel_data116[$x]['lh_long_dms_direction'],
"lh_lat_dms_direction" => $rel_data116[$x]['lh_lat_dms_direction'],
"lh_long_dms_degree" => $rel_data116[$x]['lh_long_dms_degree'],
"lh_long_dms_minute" => $rel_data116[$x]['lh_long_dms_minute'],
"lh_long_dms_second" => $rel_data116[$x]['lh_long_dms_second'],
"lh_long_dd" => $rel_data116[$x]['lh_long_dd'],
"lh_lat_dms_degree" => $rel_data116[$x]['lh_lat_dms_degree'],
"lh_lat_dms_minute" => $rel_data116[$x]['lh_lat_dms_minute'],
"lh_lat_dms_second" => $rel_data116[$x]['lh_lat_dms_second'],
"lh_lat_dd" => $rel_data116[$x]['lh_lat_dd'],
"lh_area" => $rel_data116[$x]['lh_area'],
"lh_month_inclusion" => $rel_data116[$x]['lh_month_inclusion'],
"lh_day_inclusion" => $rel_data116[$x]['lh_day_inclusion'],
"lh_year_inclusion" => $rel_data116[$x]['lh_year_inclusion'],
"date_profile_month" => $rel_data116[$x]['date_profile_month'],
"date_profile_day" => $rel_data116[$x]['date_profile_day'],
"date_profile_year" => $rel_data116[$x]['date_profile_year'],
"lh_po_male" => $rel_data116[$x]['lh_po_male'],
"lh_po_female" => $rel_data116[$x]['lh_po_female'],
"size_enterprise" => $rel_data116[$x]['size_enterprise'],
"lh_enteprise_other" => $rel_data116[$x]['lh_enteprise_other'],
"poassetval" => $rel_data116[$x]['poassetval'],
"avgnetmonthincome" => $rel_data116[$x]['avgnetmonthincome'],
"date_appraisal_month" => $rel_data116[$x]['date_appraisal_month'],
"date_appraisal_day" => $rel_data116[$x]['date_appraisal_day'],
"date_appraisal_year" => $rel_data116[$x]['date_appraisal_year'],
"bdfe_level" => $rel_data116[$x]['bdfe_level'],
"rapidhabitatassess_file" => $rel_data116[$x]['rapidhabitatassess_file'],
"businesspermit_file" => $rel_data116[$x]['businesspermit_file'],
"poinventory_file" => $rel_data116[$x]['poinventory_file'],
"bamsresult_file" => $rel_data116[$x]['bamsresult_file'],
"businessplan_file" => $rel_data116[$x]['businessplan_file'],
"seamsresult_file" => $rel_data116[$x]['seamsresult_file'],
"updatebusinessplan_file" => $rel_data116[$x]['updatebusinessplan_file'],
"bamsresultdeveloped_file" => $rel_data116[$x]['bamsresultdeveloped_file'],
"businesspermitdeveloped_fi" => $rel_data116[$x]['businesspermitdeveloped_fi'],
"pppagreementdeveloped_file" => $rel_data116[$x]['pppagreementdeveloped_file'],
"lguresolution_file" => $rel_data116[$x]['lguresolution_file'],
"bamsresultsustained_file" => $rel_data116[$x]['bamsresultsustained_file'],
"seamsresultsustained_file" => $rel_data116[$x]['seamsresultsustained_file'],
"submissionappraisalpdf_fil" => $rel_data116[$x]['submissionappraisalpdf_fil'],
"tech_assistance" => $rel_data116[$x]['tech_assistance'],
"financce_assistance" => $rel_data116[$x]['financce_assistance'],
"faamount" => $rel_data116[$x]['faamount'],
"othersourceassistance" => $rel_data116[$x]['othersourceassistance'],
"assistingorganization" => $rel_data116[$x]['assistingorganization'],
"qualifiesrecog" => $rel_data116[$x]['qualifiesrecog'],
"date_recog_endorsement_mon" => $rel_data116[$x]['date_recog_endorsement_mon'],
"date_recog_endorsement_day" => $rel_data116[$x]['date_recog_endorsement_day'],
"date_recog_endorsement_yea" => $rel_data116[$x]['date_recog_endorsement_yea'],
"date_recog_validation_mont" => $rel_data116[$x]['date_recog_validation_mont'],
"date_recog_validation_day" => $rel_data116[$x]['date_recog_validation_day'],
"date_recog_validation_year" => $rel_data116[$x]['date_recog_validation_year'],
"resultvalidation" => $rel_data116[$x]['resultvalidation'],
"dateCOR_month" => $rel_data116[$x]['dateCOR_month'],
"dateCOR_day" => $rel_data116[$x]['dateCOR_day'],
"dateCOR_year" => $rel_data116[$x]['dateCOR_year'],
"recogfindingsdocupload" => $rel_data116[$x]['recogfindingsdocupload'],
"supportingmaterialsupload" => $rel_data116[$x]['supportingmaterialsupload'],
"other_registration" => $rel_data116[$x]['other_registration'],
                );
            }
        }

        if (!empty($rel_data117)) {
                for($x = 0; $x < count($rel_data117); $x++){
                $datasapa[] = array(
                    "generatedcode"         => $rel_data117[$x]['generatedcode'],
                    "sapa_no"         => $rel_data117[$x]['sapa_no'],
                    "sapa_name_proponent"         => $rel_data117[$x]['sapa_name_proponent'],
                    "sapa_duration_from"         => $rel_data117[$x]['sapa_duration_from'],
                    "sapa_duration_to"         => $rel_data117[$x]['sapa_duration_to'],
                    "sapa_nature_development"         => $rel_data117[$x]['sapa_nature_development'],
                    "sapa_project_location"         => $rel_data117[$x]['sapa_project_location'],
                    "sapa_area"         => $rel_data117[$x]['sapa_area'],
                    "sapa_project_cost"         => $rel_data117[$x]['sapa_project_cost'],
                    "sapa_scanned_file"         => $rel_data117[$x]['sapa_scanned_file'],
                    "sapa_remarks"         => $rel_data117[$x]['sapa_remarks'],
                    "sapa_status"         => $rel_data117[$x]['sapa_status'],
                    "sapa_development_others"         => $rel_data117[$x]['sapa_development_others'],
                    "sapa_date_month"       => $rel_data117[$x]['sapa_date_month'],
                    "sapa_date_year"        => $rel_data117[$x]['sapa_date_year'],
                    "sapa_rehabbond_cost"       => $rel_data117[$x]['sapa_rehabbond_cost'],
                    "sapa_cdmp_file"        => $rel_data117[$x]['sapa_cdmp_file'],
                    "sapa_mgm_plan"     => $rel_data117[$x]['sapa_mgm_plan'],
                    "sapa_pamb_reso"        => $rel_data117[$x]['sapa_pamb_reso'],
                    "sapa_generatedcode"        => $rel_data117[$x]['sapa_generatedcode'],
                );
            }
        }

        if (!empty($rel_data118)) {
                for($x = 0; $x < count($rel_data118); $x++){
                $datamoa[] = array(
                    "generatedcode"         => $rel_data118[$x]['generatedcode'],
                    "moa_generatedcode"         => $rel_data118[$x]['moa_generatedcode'],
                    "moa_holder"         => $rel_data118[$x]['moa_holder'],
                    "moa_second_party"         => $rel_data118[$x]['moa_second_party'],
                    "moa_from_month"         => $rel_data118[$x]['moa_from_month'],
                    "moa_from_day"         => $rel_data118[$x]['moa_from_day'],
                    "moa_from_year"         => $rel_data118[$x]['moa_from_year'],
                    "moa_to_month"         => $rel_data118[$x]['moa_to_month'],
                    "moa_to_day"         => $rel_data118[$x]['moa_to_day'],
                    "moa_to_year"         => $rel_data118[$x]['moa_to_year'],
                    "moa_devt"         => $rel_data118[$x]['moa_devt'],
                    "moa_location"         => $rel_data118[$x]['moa_location'],
                    "moa_area"         => $rel_data118[$x]['moa_area'],
                    "moa_cost"         => $rel_data118[$x]['moa_cost'],
                    "moa_doc_file"         => $rel_data118[$x]['moa_doc_file'],
                    "moa_remarks"         => $rel_data118[$x]['moa_remarks'],
                    "moa_status"         => $rel_data118[$x]['moa_status'],
                    "moa_projplan"         => $rel_data118[$x]['moa_projplan'],
                    "moa_pambapprove"         => $rel_data118[$x]['moa_pambapprove'],
                    "moa_pambreso"         => $rel_data118[$x]['moa_pambreso'],
                );
            }
        }

        if (!empty($rel_data119)) {
                for($x = 0; $x < count($rel_data119); $x++){
                $datapacbrma[] = array(
                    "generatedcode"         => $rel_data119[$x]['generatedcode'],
                    "pacbrma_no"         => $rel_data119[$x]['pacbrma_no'],
                    "pacbrma_holder"         => $rel_data119[$x]['pacbrma_holder'],
                    "pacbrma_po"         => $rel_data119[$x]['pacbrma_po'],
                    "pacbrma_start"         => $rel_data119[$x]['pacbrma_start'],
                    "pacbrma_end"         => $rel_data119[$x]['pacbrma_end'],
                    "pacbrma_devt"         => $rel_data119[$x]['pacbrma_devt'],
                    "pacbrma_location"         => $rel_data119[$x]['pacbrma_location'],
                    "pacbrma_area"         => $rel_data119[$x]['pacbrma_area'],
                    "pacbrma_cost"         => $rel_data119[$x]['pacbrma_cost'],
                    "pacbrma_doc_file"         => $rel_data119[$x]['pacbrma_doc_file'],
                    "pacbrma_remarks"         => $rel_data119[$x]['pacbrma_remarks'],
                    "pacbrma_status"         => $rel_data119[$x]['pacbrma_status'],
                    "pacbrma_male"         => $rel_data119[$x]['pacbrma_male'],
                    "pacbrma_female"         => $rel_data119[$x]['pacbrma_female'],
                    "pacbrma_total"         => $rel_data119[$x]['pacbrma_total'],
                    "pacbrma_member_file"         => $rel_data119[$x]['pacbrma_member_file'],
                );
            }
        }

        if (!empty($rel_data120)) {
                for($x = 0; $x < count($rel_data120); $x++){
                $datawatershed[] = array(
                    "generatedcode"         => $rel_data120[$x]['generatedcode'],
                    "watershedmap_img"         => $rel_data120[$x]['watershedmap_img'],
                    "riverbasin_name"         => $rel_data120[$x]['riverbasin_name'],
                    "watershed_name"         => $rel_data120[$x]['watershed_name'],
                    "subwatershed_name"         => $rel_data120[$x]['subwatershed_name'],
                    "date_created"         => $rel_data120[$x]['date_created'],
                );
            }
        }

        if (!empty($rel_data121)) {
            for($x = 0; $x < count($rel_data121); $x++){
                $datahiw[] = array(
                    "generatedcode"         => $rel_data121[$x]['codegen'],
                    "hiw_name"        => $rel_data121[$x]['hiw_name'],
                    "hiw_area"        => $rel_data121[$x]['hiw_area'],
                    "hiw_province"        => $rel_data121[$x]['hiw_province'],
                    "hiw_municipal"        => $rel_data121[$x]['hiw_municipal'],
                    "hiw_long"        => $rel_data121[$x]['hiw_long'],
                    "hiw_lat"        => $rel_data121[$x]['hiw_lat'],
                    "hiw_year_assessed"        => $rel_data121[$x]['hiw_year_assessed'],
                    "hwetland_type"        => $rel_data121[$x]['hwetland_type'],
                    "hiw_description"        => $rel_data121[$x]['hiw_description'],
                    "hinland_map_img"     => $rel_data121[$x]['hinland_map_img'],
                    "hinland_shp_file"     => $rel_data121[$x]['hinland_shp_file'],
                    "hwaterbody_classID"     => $rel_data121[$x]['hwaterbody_classID'],
                    "hdown_long_dms_direction"     => $rel_data121[$x]['hdown_long_dms_direction'],
                    "hdown_long_dms_degrees"     => $rel_data121[$x]['hdown_long_dms_degrees'],
                    "hdown_long_dms_minutes"     => $rel_data121[$x]['hdown_long_dms_minutes'],
                    "hdown_long_dms_seconds"     => $rel_data121[$x]['hdown_long_dms_seconds'],
                    "hdown_lat_dms_direction"     => $rel_data121[$x]['hdown_lat_dms_direction'],
                    "hdown_lat_dms_degrees"     => $rel_data121[$x]['hdown_lat_dms_degrees'],
                    "hdown_lat_dms_minutes"     => $rel_data121[$x]['hdown_lat_dms_minutes'],
                    "hdown_lat_dms_seconds"     => $rel_data121[$x]['hdown_lat_dms_seconds'],
                    "hmid_long_dms_direction"     => $rel_data121[$x]['hmid_long_dms_direction'],
                    "hmid_long_dms_degrees"     => $rel_data121[$x]['hmid_long_dms_degrees'],
                    "hmid_long_dms_minutes"     => $rel_data121[$x]['hmid_long_dms_minutes'],
                    "hmid_long_dms_seconds"     => $rel_data121[$x]['hmid_long_dms_seconds'],
                    "hmid_lat_dms_direction"     => $rel_data121[$x]['hmid_lat_dms_direction'],
                    "hmid_lat_dms_degrees"     => $rel_data121[$x]['hmid_lat_dms_degrees'],
                    "hmid_lat_dms_minutes"     => $rel_data121[$x]['hmid_lat_dms_minutes'],
                    "hmid_lat_dms_seconds"     => $rel_data121[$x]['hmid_lat_dms_seconds'],
                    "hup_long_dms_direction"     => $rel_data121[$x]['hup_long_dms_direction'],
                    "hup_long_dms_degrees"     => $rel_data121[$x]['hup_long_dms_degrees'],
                    "hup_long_dms_minutes"     => $rel_data121[$x]['hup_long_dms_minutes'],
                    "hup_long_dms_seconds"     => $rel_data121[$x]['hup_long_dms_seconds'],
                    "hup_lat_dms_direction"     => $rel_data121[$x]['hup_lat_dms_direction'],
                    "hup_lat_dms_degrees"     => $rel_data121[$x]['hup_lat_dms_degrees'],
                    "hup_lat_dms_minutes"     => $rel_data121[$x]['hup_lat_dms_minutes'],
                    "hup_lat_dms_seconds"     => $rel_data121[$x]['hup_lat_dms_seconds'],
                    "hiw_longitude_dms_direction"     => $rel_data121[$x]['hiw_longitude_dms_direction'],
                    "hiw_longitude_dms_degrees"     => $rel_data121[$x]['hiw_longitude_dms_degrees'],
                    "hiw_longitude_dms_minutes"     => $rel_data121[$x]['hiw_longitude_dms_minutes'],
                    "hiw_longitude_dms_seconds"     => $rel_data121[$x]['hiw_longitude_dms_seconds'],
                    "hiw_latitude_dms_direction"     => $rel_data121[$x]['hiw_latitude_dms_direction'],
                    "hiw_latitude_dms_degrees"     => $rel_data121[$x]['hiw_latitude_dms_degrees'],
                    "hiw_latitude_dms_minutes"     => $rel_data121[$x]['hiw_latitude_dms_minutes'],
                    "hiw_latitude_dms_seconds"     => $rel_data121[$x]['hiw_latitude_dms_seconds'],
                    "hwaterbodysub_classID"     => $rel_data121[$x]['hwaterbodysub_classID'],
                );
            }
        }

        if (!empty($rel_data122)) {
                for($x = 0; $x < count($rel_data122); $x++){
                $dataothertenure[] = array(
                    "generatedcode"         => $rel_data122[$x]['generatedcode'],
                    "tenure_holder"         => $rel_data122[$x]['tenure_holder'],
                    "type_instrument"         => $rel_data122[$x]['type_instrument'],
                    "tenure_purpose"         => $rel_data122[$x]['tenure_purpose'],
                    "other_instrument_location"         => $rel_data122[$x]['other_instrument_location'],
                    "other_instrument_area"         => $rel_data122[$x]['other_instrument_area'],
                    "other_instrument_start"         => $rel_data122[$x]['other_instrument_start'],
                    "other_instrument_expire"         => $rel_data122[$x]['other_instrument_expire'],
                    "other_instrument_status"         => $rel_data122[$x]['other_instrument_status'],
                    "other_instrument_file"         => $rel_data122[$x]['other_instrument_file'],
                    "other_instrument_map"         => $rel_data122[$x]['other_instrument_map'],
                    "other_instrument_shp"         => $rel_data122[$x]['other_instrument_shp'],
                    "date_created"         => $rel_data122[$x]['date_created'],
                    "titledno"         => $rel_data122[$x]['titledno'],
                );
            }
        }

        if (!empty($rel_data123)) {
                for($x = 0; $x < count($rel_data123); $x++){
                $dataurbaneco[] = array(
                    "generatedcode"         => $rel_data123[$x]['generatedcode'],
                    "cityurbanarea"         => $rel_data123[$x]['cityurbanarea'],
                    "cityurbanarea_specify"         => $rel_data123[$x]['cityurbanarea_specify'],
                    "citybioindex"         => $rel_data123[$x]['citybioindex'],
                    "lgu_reso_file"         => $rel_data123[$x]['lgu_reso_file'],
                );
            }
        }

        if (!empty($rel_data124)) {
                for($x = 0; $x < count($rel_data124); $x++){
                $datadisburse[] = array(
                    "generatedcode"         => $rel_data124[$x]['generatedcode'],
                    "year_disbursement"         => $rel_data124[$x]['year_disbursement'],
                    "disbursement_paria"         => $rel_data124[$x]['disbursement_paria'],
                    "disbursement_sagf"         => $rel_data124[$x]['disbursement_sagf'],
                    "disbursement_totals"         => $rel_data124[$x]['disbursement_totals'],
                    "disbursement_paria_file"         => $rel_data124[$x]['disbursement_paria_file'],
                    "disbursement_sagf_file"         => $rel_data124[$x]['disbursement_sagf_file'],
                );
            }
        }

        if (!empty($rel_data125)) {
                for($x = 0; $x < count($rel_data125); $x++){
                $datavisitorslog[] = array(
                    "generatedcode"         => $rel_data125[$x]['generatedcode'],
                    "visitorlog_month"         => $rel_data125[$x]['visitorlog_month'],
                    "visitorlog_day"         => $rel_data125[$x]['visitorlog_day'],
                    "visitorlog_year"         => $rel_data125[$x]['visitorlog_year'],
                    "visitorlog_fullname"         => $rel_data125[$x]['visitorlog_fullname'],
                    "visitorlog_forloc"         => $rel_data125[$x]['visitorlog_forloc'],
                    "visitorlog_nationality"         => $rel_data125[$x]['visitorlog_nationality'],
                    "visitorlog_below"         => $rel_data125[$x]['visitorlog_below'],
                    "visitorlog_student"         => $rel_data125[$x]['visitorlog_student'],
                    "visitorlog_senior"         => $rel_data125[$x]['visitorlog_senior'],
                    "visitorlog_pwd"         => $rel_data125[$x]['visitorlog_pwd'],
                    "visitorlog_sex"         => $rel_data125[$x]['visitorlog_sex'],
                    "visitorlog_address"         => $rel_data125[$x]['visitorlog_address'],
                    "visitorlog_typeofpaid"         => $rel_data125[$x]['visitorlog_typeofpaid'],
                    "visitorlog_amount"         => $rel_data125[$x]['visitorlog_amount'],

                );
            }
        }


        try{

            if (!empty($rel_data1)) {
                for($x =0; $x<count($rel_data1); $x++){
                    $this->db->insert('tblpamainlocation',$datas[$x]);
                }
            }
            if (!empty($rel_data2)) {
                for($xL =0; $xL<count($rel_data2); $xL++){
                    $this->db->insert('tblpamainlegislation',$dataLeg[$xL]);
                }
            }

            if (!empty($rel_data3)) {
                for($xx =0; $xx<count($rel_data3); $xx++){
                    $this->db->insert('tblpamainbiological',$dataBio[$xx]);
                }
            }

            if (!empty($rel_data3flora)) {
                for($xx =0; $xx<count($rel_data3flora); $xx++){
                    $this->db->insert('tblpamainbiological',$dataBioflora[$xx]);
                }
            }

            if (!empty($rel_data4)) {
                for($xP =0; $xP<count($rel_data4); $xP++){
                    $this->db->insert('tblpambmember',$dataPamb[$xP]);
                }
            }
            if (!empty($rel_data5)) {
                for($xPr =0; $xPr<count($rel_data5); $xPr++){
                    $this->db->insert('tblpamainproject',$dataProject[$xPr]);
                }
            }

            if (!empty($rel_data8)) {
                for($x =0; $x<count($rel_data8); $x++){
                    $this->db->insert('tblstrictprotzone',$dataStrict[$x]);
                }
            }

            if (!empty($rel_data9)) {
                for($xIII =0; $xIII<count($rel_data9); $xIII++){
                    $this->db->insert('tblpamultiplezone',$dataMultiple[$xIII]);
                }
            }

            if (!empty($rel_data10)) {
                for($ipaf_txt = 0; $ipaf_txt<count($rel_data10); $ipaf_txt++){
                    $this->db->insert('tblpaipafincome',$dataipafs[$ipaf_txt]);
                }
            }

            if (!empty($rel_data11)) {
                for($xVIA =0; $xVIA<count($rel_data11); $xVIA++){
                    $this->db->insert('tblpathreat',$dataT[$xVIA]);
                }
            }

            if (!empty($rel_data12)) {
                for($xVIB =0; $xVIB<count($rel_data12); $xVIB++){
                    $this->db->insert('tblpareference',$dataR[$xVIB]);
                }
            }
            if (!empty($rel_data15)) {
                for($xy61 =1; $xy61<count($rel_data15); $xy61++){
                    $this->db->insert('tbliccip',$dataip[$xy61]);
                }
            }
            if (!empty($rel_data16)) {
                for($xy611 =0; $xy611<count($rel_data16); $xy611++){
                    $this->db->insert('tblmainprogram',$dataPrograms[$xy611]);
                }
            }
            if (!empty($rel_data17)) {
                for($researchXY =0; $researchXY<count($rel_data17); $researchXY++){
                    $this->db->insert('tblmainresearcher',$datasearch[$researchXY]);
                }
            }
            if (!empty($rel_data18)) {
                for($staff =0; $staff<count($rel_data18); $staff++){
                    $this->db->insert('tblpasustaff',$datastaff[$staff]);
                }
            }
            if (!empty($rel_data19)) {
                for($topo1 =0; $topo1<count($rel_data19); $topo1++){
                    $this->db->insert('tblpatopology_description',$datatopo[$topo1]);
                }
            }

            if (!empty($rel_data20)) {
                for($soil =0; $soil<count($rel_data20); $soil++){
                    $this->db->insert('tblpageology_details',$datasoil[$soil]);
                }
            }

            if (!empty($rel_data21)) {
                for($climate =0; $climate<count($rel_data21); $climate++){
                    $this->db->insert('tblpaclimate_details',$dataclimate[$climate]);
                }
            }

            if (!empty($rel_data22)) {
                for($landslide =0; $landslide<count($rel_data22); $landslide++){
                    $this->db->insert('tblpahazardlandslide_details',$datalandslide[$landslide]);
                }
            }

            if (!empty($rel_data23)) {
                for($flooding =0; $flooding<count($rel_data23); $flooding++){
                    $this->db->insert('tblpahazardflooding_details',$dataflooding[$flooding]);
                }
            }

            if (!empty($rel_data24)) {
                for($sealevel =0; $sealevel<count($rel_data24); $sealevel++){
                    $this->db->insert('tblpahazardsealevelrise',$datasea[$sealevel]);
                }
            }

            if (!empty($rel_data25)) {
                for($tsunami =0; $tsunami<count($rel_data25); $tsunami++){
                    $this->db->insert('tblpahazardtsunami',$datatsunami[$tsunami]);
                }
            }

            if (!empty($rel_data26)) {
                for($attraction =0; $attraction<count($rel_data26); $attraction++){
                    $this->db->insert('tblpaattraction',$dataattract[$attraction]);
                }
            }

            if (!empty($rel_data27)) {
                for($facility =0; $facility<count($rel_data27); $facility++){
                    $this->db->insert('tblpafacility',$datafacility[$facility]);
                }
            }

            if (!empty($rel_data28)) {
                for($activity =0; $activity<count($rel_data28); $activity++){
                    $this->db->insert('tblpaecotourism',$dataactivity[$activity]);
                }
            }

            if (!empty($rel_data29)) {
                for($agro =0; $agro<count($rel_data29); $agro++){
                    $this->db->insert('tblpaagroforestry',$dataagro[$agro]);
                }
            }

            if (!empty($rel_data30)) {
                for($map =0; $map<count($rel_data30); $map++){
                    $this->db->insert('tblpamainimageupload',$datamap[$map]);
                }
            }

            if (!empty($rel_data31)) {
                for($visitors =0; $visitors<count($rel_data31); $visitors++){
                    $this->db->insert('tblpaipafvisitors',$datavisitores[$visitors]);
                }
            }

            if (!empty($rel_data33)) {
                for($recognition =0; $recognition<count($rel_data33); $recognition++){
                    $this->db->insert('tblrecognition',$datarecog[$recognition]);
                }
            }

            if (!empty($rel_data34)) {
                for($rock =0; $rock<count($rel_data34); $rock++){
                    $this->db->insert('tblparock_details',$datarock[$rock]);
                }
            }

            if (!empty($rel_data35)) {
                for($hazard =0; $hazard<count($rel_data35); $hazard++){
                    $this->db->insert('tblpageohazard',$datahazard[$hazard]);
                }
            }

            if (!empty($rel_data36)) {
                for($ff =0; $ff<count($rel_data36); $ff++){
                    $this->db->insert('tblpaforestformation_details',$dataff[$ff]);
                }
            }

            if (!empty($rel_data37)) {
                for($x =0; $x<count($rel_data37); $x++){
                    $this->db->insert('tblpainland',$datainland[$x]);
                }
            }

            if (!empty($rel_data38)) {
                for($x =0; $x<count($rel_data38); $x++){
                    $this->db->insert('tblpawetland',$data_wetland[$x]);
                }
            }

            if (!empty($rel_data39)) {
                for($x =0; $x<count($rel_data39); $x++){
                    $this->db->insert('tblpacaves',$datacave[$x]);
                }
            }

            if (!empty($rel_data40)) {
                for($x =0; $x<count($rel_data40); $x++){
                    $this->db->insert('tblmainprojects',$dataprojs[$x]);
                }
            }

            if (!empty($rel_data41)) {
                for($x =0; $x<count($rel_data41); $x++){
                    $this->db->insert('tblseamsdemographic',$datademo[$x]);
                }
            }

            if (!empty($rel_data43)) {
                for($x =0; $x<count($rel_data43); $x++){
                    $this->db->insert('tblpahydrology_details',$datahydro[$x]);
                }
            }

            if (!empty($rel_data44)) {
                for($x =0; $x<count($rel_data44); $x++){
                    $this->db->insert('tblpalanduse_details',$dataland[$x]);
                }
            }

            if (!empty($rel_data45)) {
                for($x =0; $x<count($rel_data45); $x++){
                    $this->db->insert('tblpavegetative_details',$datavegetative[$x]);
                }
            }

            if (!empty($rel_data46)) {
                for($x =0; $x<count($rel_data46); $x++){
                    $this->db->insert('tblpahazardfire',$datafire[$x]);
                }
            }

            if (!empty($rel_data47)) {
                for($x =0; $x<count($rel_data47); $x++){
                    $this->db->insert('tblpainlandwetland',$dataiw[$x]);
                }
            }

            if (!empty($rel_data84)) {
                for($x =0; $x<count($rel_data84); $x++){
                    $this->db->insert('tblseams_sourceincome_nontimber_material',$dataseamsnontimberMaterial[$x]);
                }
            }

            if (!empty($rel_data85)) {
                for($x =0; $x<count($rel_data85); $x++){
                    $this->db->insert('tblseams_sourceincome_nontimber_equipment',$dataseamsnontimberEquip[$x]);
                }
            }

            if (!empty($rel_data86)) {
                for($x =0; $x<count($rel_data86); $x++){
                    $this->db->insert('tblseams_sourceincome_nontimber_labor',$dataseamsnontimberLabor[$x]);
                }
            }

            if (!empty($rel_data87)) {
                for($x =0; $x<count($rel_data87); $x++){
                    $this->db->insert('tblseams_sourceincome_nontimber_other',$dataseamsnontimberOther[$x]);
                }
            }

            if (!empty($rel_data88)) {
                for($x =0; $x<count($rel_data88); $x++){
                    $this->db->insert('tblseams_sourceincome_timber_material',$dataseamstimberMaterial[$x]);
                }
            }

            if (!empty($rel_data89)) {
                for($x =0; $x<count($rel_data89); $x++){
                    $this->db->insert('tblseams_sourceincome_timber_equipment',$dataseamstimberEquip[$x]);
                }
            }

            if (!empty($rel_data90)) {
                for($x =0; $x<count($rel_data90); $x++){
                    $this->db->insert('tblseams_sourceincome_timber_labor',$dataseamstimberLabor[$x]);
                }
            }

            if (!empty($rel_data91)) {
                for($x =0; $x<count($rel_data91); $x++){
                    $this->db->insert('tblseams_sourceincome_timber_other',$dataseamstimberOther[$x]);
                }
            }

            if (!empty($rel_data92)) {
                for($x =0; $x<count($rel_data92); $x++){
                    $this->db->insert('tblseams_sourceincome_wildlife_material',$dataseamswildlifeMaterial[$x]);
                }
            }

            if (!empty($rel_data93)) {
                for($x =0; $x<count($rel_data93); $x++){
                    $this->db->insert('tblseams_sourceincome_wildlife_equipment',$dataseamswildlifeEquip[$x]);
                }
            }

            if (!empty($rel_data94)) {
                for($x =0; $x<count($rel_data94); $x++){
                    $this->db->insert('tblseams_sourceincome_wildlife_labor',$dataseamswildlifeLabor[$x]);
                }
            }

            if (!empty($rel_data95)) {
                for($x =0; $x<count($rel_data95); $x++){
                    $this->db->insert('tblseams_sourceincome_wildlife_other',$dataseamswildlifeOther[$x]);
                }
            }

            if (!empty($rel_data96)) {
                for($x =0; $x<count($rel_data96); $x++){
                    $this->db->insert('tblseams_sourceincome_mining_material',$dataseamsminingMaterial[$x]);
                }
            }

            if (!empty($rel_data97)) {
                for($x =0; $x<count($rel_data97); $x++){
                    $this->db->insert('tblseams_sourceincome_mining_equipment',$dataseamsminingEquip[$x]);
                }
            }

            if (!empty($rel_data98)) {
                for($x =0; $x<count($rel_data98); $x++){
                    $this->db->insert('tblseams_sourceincome_mining_labor',$dataseamsminingLabor[$x]);
                }
            }

            if (!empty($rel_data99)) {
                for($x =0; $x<count($rel_data99); $x++){
                    $this->db->insert('tblseams_sourceincome_mining_other',$dataseamsminingOther[$x]);
                }
            }

            if (!empty($rel_data100)) {
                for($x =0; $x<count($rel_data100); $x++){
                    $this->db->insert('tblseams_sourceincome_industry_cost',$dataseamsindustryOther[$x]);
                }
            }

            if (!empty($rel_data101)) {
                for($x =0; $x<count($rel_data101); $x++){
                    $this->db->insert('tblseams_sourceincome_servicebased_cost',$dataseamssbindustryOther[$x]);
                }
            }

            if (!empty($rel_data102)) {
                for($x =0; $x<count($rel_data102); $x++){
                    $this->db->insert('tblseams_sourceincome_othersource_cost',$dataseamsothersource[$x]);
                }
            }

            if (!empty($rel_data104)) {
                for($x =0; $x<count($rel_data104); $x++){
                    $this->db->insert('tblpacoastalcorallocation',$datacoralreeflocation[$x]);
                }
            }

            if (!empty($rel_data105)) {
                for($x =0; $x<count($rel_data105); $x++){
                    $this->db->insert('tblpacoastalcoralspeciesdata',$datacoralreefspecies[$x]);
                }
            }

            if (!empty($rel_data106)) {
                for($x =0; $x<count($rel_data106); $x++){
                    $this->db->insert('tblpacoastalcoralspeciescomposition',$datacoralreefspeciescompo[$x]);
                }
            }

            if (!empty($rel_data107)) {
                for($x =0; $x<count($rel_data107); $x++){
                    $this->db->insert('tblpacoastalcoralspeciesmonitoringsite',$datacoralreefmonitoring[$x]);
                }
            }

            if (!empty($rel_data108)) {
                for($x =0; $x<count($rel_data108); $x++){
                    $this->db->insert('tblpacoastalcoralkmlkmz',$datacoralreefkmlkmz[$x]);
                }
            }

            if (!empty($rel_data109)) {
                for($x =0; $x<count($rel_data109); $x++){
                    $this->db->insert('tblpacoastalcoral_details',$datacoraldetails[$x]);
                }
            }

            if (!empty($rel_data110)) {
                for($x =0; $x<count($rel_data110); $x++){
                    $this->db->insert('tblpacoastalseagrass_details',$dataseagrassdetails[$x]);
                }
            }

            if (!empty($rel_data111)) {
                for($x =0; $x<count($rel_data111); $x++){
                    $this->db->insert('tblpacoastalseagrassspeciesdata',$dataseagrassspecies[$x]);
                }
            }

            if (!empty($rel_data112)) {
                for($x =0; $x<count($rel_data112); $x++){
                    $this->db->insert('tblpacoastalmangrove_details',$datamangrovedetails[$x]);
                }
            }

            if (!empty($rel_data113)) {
                for($x =0; $x<count($rel_data113); $x++){
                    $this->db->insert('tblpacoastalmangrovespeciesdata',$datamangrovespecies[$x]);
                }
            }

            if (!empty($rel_data114)) {
                for($x =0; $x<count($rel_data114); $x++){
                    $this->db->insert('tblpaproducts',$dataproducts[$x]);
                }
            }

            if (!empty($rel_data115)) {
                for($x =0; $x<count($rel_data115); $x++){
                    $this->db->insert('tblpaenterprise',$dataenterprise[$x]);
                }
            }

            if (!empty($rel_data116)) {
                for($x =0; $x<count($rel_data116); $x++){
                    $this->db->insert('tblpalivelihood',$datalivelihood[$x]);
                }
            }

            if (!empty($rel_data117)) {
                for($x =0; $x<count($rel_data117); $x++){
                    $this->db->insert('tblpamaintenuresapa',$datasapa[$x]);
                }
            }

            if (!empty($rel_data118)) {
                for($x =0; $x<count($rel_data118); $x++){
                    $this->db->insert('tblpamaintenuremoa',$datamoa[$x]);
                }
            }

            if (!empty($rel_data119)) {
                for($x =0; $x<count($rel_data119); $x++){
                    $this->db->insert('tblpamaintenurepacbrma',$datapacbrma[$x]);
                }
            }

            if (!empty($rel_data120)) {
                for($x =0; $x<count($rel_data120); $x++){
                    $this->db->insert('tblpamainwatershed',$datawatershed[$x]);
                }
            }

            if (!empty($rel_data121)) {
                for($x =0; $x<count($rel_data121); $x++){
                    $this->db->insert('tblpainlandhumanmade',$datahiw[$x]);
                }
            }

            if (!empty($rel_data122)) {
                for($x =0; $x<count($rel_data122); $x++){
                    $this->db->insert('tblpamaintenureothers',$dataothertenure[$x]);
                }
            }

            if (!empty($rel_data123)) {
                for($x =0; $x<count($rel_data123); $x++){
                    $this->db->insert('tblurbaneco',$dataurbaneco[$x]);
                }
            }

            if (!empty($rel_data124)) {
                for($x =0; $x<count($rel_data124); $x++){
                    $this->db->insert('tblpaipafdisbursementfiles',$datadisburse[$x]);
                }
            }

            if (!empty($rel_data125)) {
                for($x =0; $x<count($rel_data125); $x++){
                    $this->db->insert('tblipafvisitorslog',$datavisitorslog[$x]);
                }
            }

            $this->db->where('id_main',$data['id_main'])
            ->update($this->table,$data);

            return "success";
        }catch(Exception $e){
            return "failed";
        }

        // return $this->db->where('id_main',$data['id_main'])
        // ->update($this->table,$data);
    }

    public function createEcotourism($data = []){
        return $this->db->insert('tblseams_sourceincome_ecourism',$data);
    }

    public function createcepaactivity($data,$rel_data1,$rel_data2,$rel_data3,$rel_data4,$rel_data5){
    date_default_timezone_set('Asia/Manila'); # add your city to set local time zone
    $now = date('Y-m-d');
      if (!empty($rel_data1)) {
        for($x1 = 0; $x1 < count($rel_data1); $x1++){
        $dataprint[] = array(
            "generatedcode"       =>      $rel_data1[$x1]["generatedcode"],
            "cepa_code"           =>      $rel_data1[$x1]["cepa_code"],
            "print_name"          =>      $rel_data1[$x1]['print_name'],
            "print_name_others"   =>      $rel_data1[$x1]['print_name_others'],
            "title_print"         =>      $rel_data1[$x1]['title_print'],
            "year_produced"       =>      $rel_data1[$x1]['year_produced'],
            "volume"              =>      $rel_data1[$x1]['volume'],
            "print_image"         =>      $rel_data1[$x1]['print_image']);
        }
      }

      if (!empty($rel_data2)) {
        for($x2 = 0; $x2 < count($rel_data2); $x2++){
        $datamm[] = array(
            "generatedcode"         =>      $rel_data2[$x2]["generatedcode"],
            "cepa_code"             =>      $rel_data2[$x2]["cepa_code"],
            "multimedia"            =>      $rel_data2[$x2]['multimedia'],
            "cepa_multimedia_others"=>      $rel_data2[$x2]['cepa_multimedia_others'],
            "m_title"               =>      $rel_data2[$x2]['m_title'],
            "m_year"                =>      $rel_data2[$x2]['m_year'],
            "file_upload"           =>      $rel_data2[$x2]['file_upload'],
            "url_links"             =>      $rel_data2[$x2]['url_links']);
        }
      }

      if (!empty($rel_data3)) {
        for($x3 = 0; $x3 < count($rel_data3); $x3++){
        $datasm[] = array(
            "generatedcode"         =>      $rel_data3[$x3]["generatedcode"],
            "cepa_code"             =>      $rel_data3[$x3]["cepa_code"],
            "multimedia"            =>      $rel_data3[$x3]['multimedia'],
            "other_socialmedia"     =>      $rel_data3[$x3]['other_socialmedia'],
            "film_name"             =>      $rel_data3[$x3]['film_name'],
            "social_year"           =>      $rel_data3[$x3]['social_year'],
            "file_upload"           =>      $rel_data3[$x3]['file_upload'],
            "socialmedia_links"     =>      $rel_data3[$x3]['socialmedia_links'],
            "film_upload"           =>      $rel_data3[$x3]['film_upload']);
        }
      }

      if (!empty($rel_data4)) {
        for($x4 = 0; $x4 < count($rel_data4); $x4++){
        $datars[] = array(
            "generatedcode"         =>      $rel_data4[$x4]["generatedcode"],
            "cepa_code"             =>      $rel_data4[$x4]["cepa_code"],
            "radiostation"          =>      $rel_data4[$x4]['radiostation'],
            "radio_program"         =>      $rel_data4[$x4]['radio_program'],
            "radio_link"            =>      $rel_data4[$x4]['radio_link']);        }
      }

      if (!empty($rel_data5)) {
        for($x5 = 0; $x5 < count($rel_data5); $x5++){
        $datasv[] = array(
            "generatedcode"         =>      $rel_data5[$x5]["generatedcode"],
            "cepa_code"             =>      $rel_data5[$x5]["cepa_code"],
            "souveniritem"          =>      $rel_data5[$x5]['souveniritem'],
            "souvenir_name"         =>      $rel_data5[$x5]['souvenir_name'],
            "souvenir_other"        =>      $rel_data5[$x5]['souvenir_other'],
            "souvenir_year"         =>      $rel_data5[$x5]['souvenir_year'],
            "file_name"             =>      $rel_data5[$x5]['file_name']);        }
      }

      try{
        if (!empty($rel_data1)) {
          for($x =0; $x<count($rel_data1); $x++){
            $this->db->insert('tblpamaincepa_print_materials',$dataprint[$x]);
          }
        }
        if (!empty($rel_data2)) {
          for($y =0; $y<count($rel_data2); $y++){
            $this->db->insert('tblpamaincepa_multimedia_materials',$datamm[$y]);
          }
        }
        if (!empty($rel_data3)) {
          for($z =0; $z<count($rel_data3); $z++){
            $this->db->insert('tblpamaincepa_socialmedia_materials',$datasm[$z]);
          }
        }
        if (!empty($rel_data4)) {
          for($a =0; $a<count($rel_data4); $a++){
            $this->db->insert('tblpamaincepa_radiostation',$datars[$a]);
          }
        }
        if (!empty($rel_data5)) {
          for($b =0; $b<count($rel_data5); $b++){
            $this->db->insert('tblpamaincepa_souvenir',$datasv[$b]);
          }
        }


        $this->db->insert('tblpamaincepa_activity_details',$data);
        return "success";
      }catch(Exception $e){
        return "failed";
      }
    }

    public function createcepaevent($data = []){
        return $this->db->insert('tblpamaincepa_event_details',$data);
    }

    public function createIncomeGenerated($data = []){
         $this->db->insert('tblpaipafincome',$data);
         return $this->db->insert_id();
    }

    public function createPAWetlandNatural($data = []){
         $this->db->insert('tblpainlandwetland',$data);
         return $this->db->insert_id();
    }

    public function createspeciesimage($data = []){
         $this->db->insert('tblpamainbiological_img',$data);
         return $this->db->insert_id();
    }

    public function createattractionactivity($data = []){
         $this->db->insert('tblpaattraction_activity_img',$data);
         return $this->db->insert_id();
    }

    public function createfacilitymultiImgsEdit($data = []){
         $this->db->insert('tblpafacility_activity_img',$data);
         return $this->db->insert_id();
    }

    public function createfacilitymultiimg($data = []){
         $this->db->insert('tblpafacility_activity_img',$data);
         return $this->db->insert_id();
    }

    public function createapasufileso($data = []){
         $this->db->insert('tblapasu_sofile',$data);
         return $this->db->insert_id();
    }

    public function createbamsresults($data = []){
         $this->db->insert('tblbamsresult',$data);
         return $this->db->insert_id();
    }

    public function createbmsresults($data = []){
         $this->db->insert('tblbmsresult',$data);
         return $this->db->insert_id();
    }

    public function createseamsresults($data = []){
         $this->db->insert('tblseamsresult',$data);
         return $this->db->insert_id();
    }

    public function createmettresults($data = []){
         $this->db->insert('tblmettresult',$data);
         return $this->db->insert_id();
    }

    public function createecorresults($data = []){
         $this->db->insert('tblecorresult',$data);
         return $this->db->insert_id();
    }

    public function createbdfeimagesupload($data = []){
         $this->db->insert('tblpalivelihoodmultiimage',$data);
         return $this->db->insert_id();
    }

    public function createcavesimage($data = []){
         $this->db->insert('tblpacaves_images',$data);
         return $this->db->insert_id();
    }

    public function createPAWetlandHumanMade($data = []){
         $this->db->insert('tblpainlandhumanmade',$data);
         return $this->db->insert_id();
    }

    public function createcaveinfo($data = []){
         $this->db->insert('tblpacaves',$data);
         return $this->db->insert_id();
    }

    public function createCRMPActivity($data = []){
         $this->db->insert('tblpamaintenurepacbrma_crmp',$data);
         return $this->db->insert_id();
    }

    public function createApasuinfo($data = []){
         $this->db->insert('tblpaapasuinfo',$data);
         return $this->db->insert_id();
    }

    public function createProjects($data = []){
         $this->db->insert('tblmainprojects',$data);
         return $this->db->insert_id();
    }

    public function createProgramactivity($data = []){
         $this->db->insert('tblmainprogram_activity',$data);
         return $this->db->insert_id();
    }

    public function createResearchs($data = []){
         $this->db->insert('tblmainresearch',$data);
         return $this->db->insert_id();
    }

    public function createPAVisitorss($data = []){
         $this->db->insert('tblpaipafvisitors',$data);
         return $this->db->insert_id();
    }

    public function createPAlocations($data = []){
         $this->db->insert('tblpamainlocation',$data);
         return $this->db->insert_id();
    }

    public function createthreatlist($data = []){
         $this->db->insert('tblpathreat_multi',$data);
         return $this->db->insert_id();
    }

    public function createPAeventlist($data = []){
         $this->db->insert('tblpamainevent_participant',$data);
         return $this->db->insert_id();
    }

    public function createpambtechcomms($data = []){
         $this->db->insert('tblpambmember_techcomm',$data);
         return $this->db->insert_id();
    }

    public function createbiodiv_ter($data = []){
         $this->db->insert('tblpamain_terrestrial_biozone',$data);
         return $this->db->insert_id();
    }

    public function createbiodiv_mar($data = []){
         $this->db->insert('tblpamain_marine_biozone',$data);
         return $this->db->insert_id();
    }

    public function createPAmapimageOthers($data = []){
         $this->db->insert('tblpamainimageupload',$data);
         return $this->db->insert_id();
    }

    public function createPAmapimageOthersGallerys($data = []){
         $this->db->insert('gallery',$data);
         return $this->db->insert_id();
    }

    // public function createPApambmembers($data,$rel_data1){
    //      $this->db->insert('tblpambmember',$data);
    //      return $this->db->insert_id();
    // }

    public function createPApambmembers($data,$rel_data1)
    {
    date_default_timezone_set('Asia/Manila'); # add your city to set local time zone
    $now = date('Y-m-d');

      if (!empty($rel_data1)) {
        for($x2 = 0; $x2 < count($rel_data1); $x2++){
        $datasother[] = array(
          "generatedcode" => $rel_data1[$x2]["generatedcode"],
          "pambcode" => $rel_data1[$x2]["pambcode"],          
          "techcomm" => $rel_data1[$x2]['techcomm'],
          "other_techcomm" => $rel_data1[$x2]['other_techcomm']);
        }
      }

      try{
       
        if (!empty($rel_data1)) {
          for($y =0; $y<count($rel_data1); $y++){
            $this->db->insert('tblpambmember_techcomm',$datasother[$y]);
          }
        }

        $this->db->insert('tblpambmember',$data);
        return "success";
      }catch(Exception $e){
        return "failed";
      }
    }

    public function createIPAFdisbursement($data = []){
         $this->db->insert('tblpaipafdisbursementfiles',$data);
         return $this->db->insert_id();
    }

    public function createPAecoattraction($data = []){
         $this->db->insert('tblpaattraction',$data);
         return $this->db->insert_id();
    }

    public function createPAreference($data = []){
         $this->db->insert('tblpareference',$data);
         return $this->db->insert_id();
    }

    public function createPApamo($data = []){
         $this->db->insert('tblpasustaff',$data);
         return $this->db->insert_id();
    }

    public function createPAthreats($data = []){
         $this->db->insert('tblpathreat',$data);
         return $this->db->insert_id();
    }

    public function createPAecofacility($data = []){
         $this->db->insert('tblpafacility',$data);
         return $this->db->insert_id();
    }

    public function createPAecoproduct($data = []){
         $this->db->insert('tblpaproducts',$data);
         return $this->db->insert_id();
    }

    public function createPAecoenterprise($data = []){
         $this->db->insert('tblpaenterprise',$data);
         return $this->db->insert_id();
    }

    public function createPAstrictprot($data = []){
         $this->db->insert('tblstrictprotzone',$data);
         return $this->db->insert_id();
    }

    public function createPAmultipleused($data = []){
         $this->db->insert('tblpamultiplezone',$data);
         return $this->db->insert_id();
    }

    public function createPAdemographic($data = []){
         $this->db->insert('tblseamsdemographic',$data);
         return $this->db->insert_id();
    }

    // public function createPAhydrology($data = []){
    //      $this->db->insert('tblpahydrology_details',$data);
    //      return $this->db->insert_id();
    // }

    public function createPAhydrology($data,$rel_data1){
        if (!empty($rel_data1)) {
            for($x11 = 0; $x11 < count($rel_data1); $x11++){
            $datas[] = array(
              "generatedcode" => $rel_data1[$x11]["generatedcode"],
              "hydro_code" => $rel_data1[$x11]["hydro_code"],
              "hydro_parawclass_id" => $rel_data1[$x11]['hydro_parawclass_id'],
              "hydro_parasubwclass_id" => $rel_data1[$x11]['hydro_parasubwclass_id'],
              "hydro_parameter" => $rel_data1[$x11]['hydro_parameter'],
              "hydro_para_status" => $rel_data1[$x11]['hydro_para_status'],
              "hydro_date_assessed" => $rel_data1[$x11]['hydro_date_assessed']);
            }
        }
        try{
            if (!empty($rel_data1)) {
                for($x =0; $x<count($rel_data1); $x++){
                    $this->db->insert('tblpahydrology_para_details',$datas[$x]);
                }
            }

            $this->db->insert('tblpahydrology_details',$data);
            return "success";
            }
                catch(Exception $e)
            {
                return "failed";
            }
    }

    public function createPAWatersheds($data = []){
         $this->db->insert('tblpamainwatershed',$data);
         return $this->db->insert_id();
    }

    public function createPAtopoandslope($data = []){
         $this->db->insert('tblpatopology_description',$data);
         return $this->db->insert_id();
    }

    public function createPAtenureSAPA($data = []){
         $this->db->insert('tblpamaintenuresapa',$data);
         return $this->db->insert_id();
    }

    public function createPAtenureMOA($data = []){
         $this->db->insert('tblpamaintenuremoa',$data);
         return $this->db->insert_id();
    }

    public function createPAtenurePACBRMA($data = []){
         $this->db->insert('tblpamaintenurepacbrma',$data);
         return $this->db->insert_id();
    }

    public function createPAbdfepoInformation($data,$rel_data1){
        if (!empty($rel_data1)) {
            for($x1 = 0; $x1 < count($rel_data1); $x1++){
            $datasH[] = array(
              "generatedcode" => $rel_data1[$x1]["generatedcode"],
              "bdfe_codegen" => $rel_data1[$x1]["bdfe_codegen"],
              "bdfe_po_codegen" => $rel_data1[$x1]["bdfe_po_codegen"],
              "bdfe_po_status" => $rel_data1[$x1]['bdfe_po_status'],
              "bdfe_po_year" => $rel_data1[$x1]['bdfe_po_year'],
              "bdfe_po_remarks" => $rel_data1[$x1]['bdfe_po_remarks']);
            }
        }

        try{
            if (!empty($rel_data1)) {
              for($y =0; $y<count($rel_data1); $y++){
                $this->db->insert('tblpalivelihood_pohistory',$datasH[$y]);
              }
            }
        $this->db->insert('tblpalivelihood_poname',$data);

            return "success";
        }catch(Exception $e){
            return "failed";
        }
    }

    // public function createPAbdfe($data,$rel_data1,$rel_data2){
    public function createPAbdfe($data){
        // if (!empty($rel_data1)) {
        //     for($x11 = 0; $x11 < count($rel_data1); $x11++){
        //     $datas[] = array(
        //       "generatedcode" => $rel_data1[$x11]["generatedcode"],
        //       "bdfe_codegen" => $rel_data1[$x11]["bdfe_codegen"],
        //       "bdfe_po_codegen" => $rel_data1[$x11]["bdfe_po_codegen"],
        //       "bdfe_po_name" => $rel_data1[$x11]['bdfe_po_name'],
        //       "bdfe_contact" => $rel_data1[$x11]['bdfe_contact']);
        //     }
        // }

        // if (!empty($rel_data2)) {
        //     for($x1 = 0; $x1 < count($rel_data2); $x1++){
        //     $datasH[] = array(
        //       "generatedcode" => $rel_data2[$x1]["generatedcode"],
        //       "bdfe_codegen" => $rel_data2[$x1]["bdfe_codegen"],
        //       "bdfe_po_codegen" => $rel_data2[$x1]["bdfe_po_codegen"],
        //       "bdfe_po_status" => $rel_data2[$x1]['bdfe_po_status'],
        //       "bdfe_po_year" => $rel_data2[$x1]['bdfe_po_year'],
        //       "bdfe_po_remarks" => $rel_data2[$x1]['bdfe_po_remarks']);
        //     }
        // }

        try{
        
        // if (!empty($rel_data1)) {
        //   for($x =0; $x<count($rel_data1); $x++){
        //     $this->db->insert('tblpalivelihood_poname',$datas[$x]);
        //   }
        // }

        // if (!empty($rel_data2)) {
        //   for($y =0; $y<count($rel_data2); $y++){
        //     $this->db->insert('tblpalivelihood_pohistory',$datasH[$y]);
        //   }
        // }
        
        $this->db->insert('tblpalivelihood',$data);

            return "success";
        }catch(Exception $e){
            return "failed";
        }
    }

    public function createPAclimatetype($data = []){
         $this->db->insert('tblpaclimate_details',$data);
         return $this->db->insert_id();
    }

     public function createPAteureothers($data = []){
         $this->db->insert('tblpamaintenureothers',$data);
         return $this->db->insert_id();
    }

    public function createPAexistinglanduse($data = []){
         $this->db->insert('tblpalanduse_details',$data);
         return $this->db->insert_id();
    }

     public function createPAprojectList($data = []){
         $this->db->insert('tblmainprogram',$data);
         return $this->db->insert_id();
    }

    public function createPAprojectssList($data = []){
         $this->db->insert('tblmainprojects',$data);
         return $this->db->insert_id();
    }

    public function createIPAFvisitors($data,$data1){
        if (!empty($data1)) {
            for($x = 0; $x < count($data1); $x++){
                $datas[] = array(
                    "generatedcode" => $data1[$x]["generatedcode"],
                    "visitors_gencode" => $data1[$x]["visitors_gencode"],
                    "visitorlogs_month" => $data1[$x]['visitorlogs_month'],
                    "visitorlogs_day" => $data1[$x]['visitorlogs_day'],
                    "visitorlogs_year" => $data1[$x]['visitorlogs_year'],
                    "types_of_payment" => $data1[$x]['types_of_payment'],
                    "other_payments" => $data1[$x]['other_payments'],
                    "amount_payment" => str_replace(',','',$data1[$x]['amount_payment']),
                    "date_created" => $data1[$x]['date_created'],
                    "trust_fund" => $data1[$x]['trust_fund'],
                    "mode_payment" => $data1[$x]['mode_payment'],
                    "penalty_desc" => $data1[$x]['penalty_desc'],
                );
            }
        }

        try{
            // $nxti

            if (!empty($data1)) {
                for($x =0; $x<count($data1); $x++){
                    $this->db->insert('tblpavisitorspayment',$datas[$x]);
                }
            }
                $this->db->insert('tblipafvisitorslog',$data);

            return "success";
        }catch(Exception $e){
            return "failed";
        }

    }

    public function add_visitorspayment($data){
        $this->db->insert('tblpavisitorspayment',$data);
    }


    public function createPAlandslidesusceptibility($data = []){
         $this->db->insert('tblpahazardlandslide_details',$data);
         return $this->db->insert_id();
    }

    public function createPAfloodingsusceptibility($data = []){
         $this->db->insert('tblpahazardflooding_details',$data);
         return $this->db->insert_id();
    }

    public function createPAsealevel($data = []){
         $this->db->insert('tblpahazardsealevelrise',$data);
         return $this->db->insert_id();
    }

    public function createPAtsunami($data = []){
         $this->db->insert('tblpahazardtsunami',$data);
         return $this->db->insert_id();
    }

    public function createPAfaultline($data = []){
         $this->db->insert('tblpahazardfire',$data);
         return $this->db->insert_id();
    }

    public function createPAothergeohazard($data = []){
         $this->db->insert('tblpageohazard',$data);
         return $this->db->insert_id();
    }

    public function createPArockform($data = []){
         $this->db->insert('tblparock_details',$data);
         return $this->db->insert_id();
    }

    public function createPAsoilform($data = []){
         $this->db->insert('tblpageology_details',$data);
         return $this->db->insert_id();
    }

    public function createPAurbanEco($data = []){
         $this->db->insert('tblurbaneco',$data);
         return $this->db->insert_id();
    }

    public function createPAmanagementPlan($data = []){
         $this->db->insert('tblpamanagementplan',$data);
         return $this->db->insert_id();
    }

    public function createPAkapsurveyed($data = []){
         $this->db->insert('tblpamaincepa_kap_surveyed',$data);
         return $this->db->insert_id();
    }

    public function createPAEcoPlanFile($data = []){
         $this->db->insert('tblpamanagementecotourim',$data);
         return $this->db->insert_id();
    }

    public function createPAWetlandPlanFile($data = []){
         $this->db->insert('tblpamanagementwetland',$data);
         return $this->db->insert_id();
    }

    public function createPACavePlanFile($data = []){
         $this->db->insert('tblpamanagementcaves',$data);
         return $this->db->insert_id();
    }

    public function createPAotherPlanFile($data = []){
         $this->db->insert('tblpamanagementothers',$data);
         return $this->db->insert_id();
    }

    public function createPAbiologicalFF($data = []){
         $this->db->insert('tblpamainbiological',$data);
         return $this->db->insert_id();
    }

    public function createPAbtrcertifi($data = []){
         $this->db->insert('tblipafincomecertificate',$data);
         return $this->db->insert_id();
    }

    public function updatePAbtrcertifi($ipafdetails,$id){
        $this->db->where("id_income_certificate",$id);
        $this->db->update("tblipafincomecertificate",$ipafdetails);
    }

    public function createPAlegalstatus($data,$rel_data1){
        if (!empty($rel_data1)) {
            for($x11 = 0; $x11 < count($rel_data1); $x11++){
            $datas[] = array(
              "generatedcode" => $rel_data1[$x11]["generatedcode"],
              "legal_generatedcode" => $rel_data1[$x11]["legal_generatedcode"],
              "nipid_status" => $rel_data1[$x11]['nipid_status'],
              "nipid_category" => $rel_data1[$x11]['nipid_category'],
              "legal_basis_id" => $rel_data1[$x11]['legal_basis_id'],
              "legal_basis_no" => str_replace(',','',$rel_data1[$x11]['legal_basis_no']),
              "legal_basis_area" => $rel_data1[$x11]['legal_basis_area'],
              "legal_basis_month" => $rel_data1[$x11]['legal_basis_month'],
              "legal_basis_day" => $rel_data1[$x11]['legal_basis_day'],
              "legal_basis_year" => $rel_data1[$x11]['legal_basis_year']);
            }
        }
        try{
            if (!empty($rel_data1)) {
                for($x =0; $x<count($rel_data1); $x++){
                    $this->db->insert('tblpamainlegislation_history',$datas[$x]);
                }
            }

            $this->db->insert('tblpamainlegislation',$data);
            return "success";
            }
                catch(Exception $e)
            {
                return "failed";
            }
    }

    public function createPAinterRecogs($data,$rel_data1){
        if (!empty($rel_data1)) {
            for($x11 = 0; $x11 < count($rel_data1); $x11++){
            $datas[] = array(
              "generatedcode" => $rel_data1[$x11]["generatedcode"],
              "recognition_code" => $rel_data1[$x11]["recognition_code"],
              "criteria_list" => $rel_data1[$x11]['criteria_list']);            
            }
        }
        try{
            if (!empty($rel_data1)) {
                for($x =0; $x<count($rel_data1); $x++){
                    $this->db->insert('tblrecognition_criteria_list',$datas[$x]);
                }
            }

            $this->db->insert('tblrecognition',$data);
            return "success";
            }
                catch(Exception $e)
            {
                return "failed";
            }
         // $this->db->insert('tblrecognition',$data);
         // return $this->db->insert_id();
    }

    public function createPAforestformation($data = []){
         $this->db->insert('tblpaforestformation_details',$data);
         return $this->db->insert_id();
    }

    public function createndfelocations($data = []){
         $this->db->insert('tblpalivelihoodpolocation',$data);
         return $this->db->insert_id();
    }

    public function createndfeappraisals($data,$rel_data1,$rel_data2,$rel_data3,$rel_data4,$rel_data5){

        if (!empty($rel_data1)) {
            for($x1 = 0; $x1 < count($rel_data1); $x1++){
            $data1[] = array(
              "generatedcode" => $rel_data1[$x1]["generatedcode"],
              "bdfe_codegen" => $rel_data1[$x1]["bdfe_codegen"],
              "bdfe_appraisal_code" => $rel_data1[$x1]["bdfe_appraisal_code"],
              "bams_date_year" => $rel_data1[$x1]["bams_date_year"],
              "bams_date_month" => $rel_data1[$x1]["bams_date_month"],
              "bams_status" => $rel_data1[$x1]["bams_status"],
              "bams_remarks" => $rel_data1[$x1]["bams_remarks"],
              "bams_file_attached" => $rel_data1[$x1]["bams_file_attached"],
              "bams_filename" => $rel_data1[$x1]["bams_filename"]);
            }
        }

        if (!empty($rel_data2)) {
            for($x2 = 0; $x2 < count($rel_data2); $x2++){
            $data2[] = array(
              "generatedcode" => $rel_data2[$x2]["generatedcode"],
              "bdfe_codegen" => $rel_data2[$x2]["bdfe_codegen"],
              "bdfe_appraisal_code" => $rel_data2[$x2]["bdfe_appraisal_code"],
              "seams_date_year" => $rel_data2[$x2]["seams_date_year"],
              "seams_date_month" => $rel_data2[$x2]["seams_date_month"],
              "seams_status" => $rel_data2[$x2]["seams_status"],
              "seams_remarks" => $rel_data2[$x2]["seams_remarks"],
              "seams_file_attached" => $rel_data2[$x2]["seams_file_attached"],
              "saut_file" => $rel_data2[$x2]["saut_file"],
              "seams_filename" => $rel_data2[$x2]["seams_filename"]);
            }
        }

        if (!empty($rel_data3)) {
            for($x3 = 0; $x3 < count($rel_data3); $x3++){
            $data3[] = array(
              "generatedcode" => $rel_data3[$x3]["generatedcode"],
              "bdfe_codegen" => $rel_data3[$x3]["bdfe_codegen"],
              "bdfe_appraisal_code" => $rel_data3[$x3]["bdfe_appraisal_code"],
              "bams_date_year" => $rel_data3[$x3]["bams_date_year"],
              "bams_date_month" => $rel_data3[$x3]["bams_date_month"],
              "bams_status" => $rel_data3[$x3]["bams_status"],
              "bams_remarks" => $rel_data3[$x3]["bams_remarks"],
              "bams_file_attached" => $rel_data3[$x3]["bams_file_attached"],
              "bams_filename" => $rel_data3[$x3]["bams_filename"]);
            }
        }

        if (!empty($rel_data4)) {
            for($x4 = 0; $x4 < count($rel_data4); $x4++){
            $data4[] = array(
              "generatedcode" => $rel_data4[$x4]["generatedcode"],
              "bdfe_codegen" => $rel_data4[$x4]["bdfe_codegen"],
              "bdfe_appraisal_code" => $rel_data4[$x4]["bdfe_appraisal_code"],
              "bams_date_year" => $rel_data4[$x4]["bams_date_year"],
              "bams_date_month" => $rel_data4[$x4]["bams_date_month"],
              "bams_status" => $rel_data4[$x4]["bams_status"],
              "bams_remarks" => $rel_data4[$x4]["bams_remarks"],
              "bams_file_attached" => $rel_data4[$x4]["bams_file_attached"],
              "bams_filename" => $rel_data4[$x4]["bams_filename"]);
            }
        }

        if (!empty($rel_data5)) {
            for($x5 = 0; $x5 < count($rel_data5); $x5++){
            $data5[] = array(
              "generatedcode" => $rel_data5[$x5]["generatedcode"],
              "bdfe_codegen" => $rel_data5[$x5]["bdfe_codegen"],
              "bdfe_appraisal_code" => $rel_data5[$x5]["bdfe_appraisal_code"],
              "seams_date_year" => $rel_data5[$x5]["seams_date_year"],
              "seams_date_month" => $rel_data5[$x5]["seams_date_month"],
              "seams_status" => $rel_data5[$x5]["seams_status"],
              "seams_remarks" => $rel_data5[$x5]["seams_remarks"],
              "seams_file_attached" => $rel_data5[$x5]["seams_file_attached"],
              "saut_file" => $rel_data5[$x5]["saut_file"],
              "seams_filename" => $rel_data5[$x5]["seams_filename"]);
            }
        }

        try{
        
        if (!empty($rel_data1)) {
          for($x =0; $x<count($rel_data1); $x++){
            $this->db->insert('tblbamsresult',$data1[$x]);
          }
        }

        if (!empty($rel_data2)) {
          for($x =0; $x<count($rel_data2); $x++){
            $this->db->insert('tblseamsresult',$data2[$x]);
          }
        }

        if (!empty($rel_data3)) {
          for($x =0; $x<count($rel_data3); $x++){
            $this->db->insert('tblbamsresult',$data3[$x]);
          }
        }

        if (!empty($rel_data4)) {
          for($x =0; $x<count($rel_data4); $x++){
            $this->db->insert('tblbamsresult',$data4[$x]);
          }
        }

        if (!empty($rel_data5)) {
          for($x =0; $x<count($rel_data5); $x++){
            $this->db->insert('tblseamsresult',$data5[$x]);
          }
        }
        
        $this->db->insert('tblpalivelihood_appraisal',$data);

            return "success";
        }catch(Exception $e){
            return "failed";
        }

         // $this->db->insert('tblpalivelihood_appraisal',$data);
         // return $this->db->insert_id();
    }

    public function createbdfeenhancementTA_techassist($data = []){
         $this->db->insert('tblpalivelihood_enhancement_ta_type_assistance',$data);
         return $this->db->insert_id();
    }

    public function createbdfeenhancementFA_techassist($data = []){
         $this->db->insert('tblpalivelihood_enhancement_fa_type_assistance',$data);
         return $this->db->insert_id();
    }

    public function createbdfeenhancementTA($data = []){
         $this->db->insert('tblpalivelihood_enhancement',$data);
         return $this->db->insert_id();
    }

    public function createbdfeenhancementoss_techassist($data = []){
         $this->db->insert('tblpalivelihood_enhancement_oss_type_assistance',$data);
         return $this->db->insert_id();
    }

    public function createbdfeenhancementFA($data = []){
         $this->db->insert('tblpalivelihood_enhancement_financial',$data);
         return $this->db->insert_id();
    }

    public function createbdfeenhancementOSS($data = []){
         $this->db->insert('tblpalivelihood_enhancement_oss',$data);
         return $this->db->insert_id();
    }

    public function createvidedocument($data = []){
         $this->db->insert('tblpalivelihoodmultivideo',$data);
         return $this->db->insert_id();
    }

    public function createndfepoproducts($data = []){
         $this->db->insert('tblpalivelihood_po_product',$data);
         return $this->db->insert_id();
    }

    public function createPAvegetative($data = []){
         $this->db->insert('tblpavegetative_details',$data);
         return $this->db->insert_id();
    }

    public function createPAwdpaLocations($data = []){
         $this->db->insert('tblpawdpa_location',$data);
         return $this->db->insert_id();
    }

    public function createTrustGenerated($data = []){
         $this->db->insert('tblpaipaftrustreciept',$data);
         return $this->db->insert_id();
    }

    public function add_household($data){
        $this->db->insert('patients',$data);
        return $this->db->insert_id();
    }

    public function add_subEconTrans($data){
        $this->db->insert('tblseams_sourceincome_ecourism_sub_transportation',$data);
    }

    public function add_IpafIncomeOthers($data){
        $this->db->insert('tblpaipafincomeothers',$data);
    }

    public function add_IpafcontriOther($data){
        $this->db->insert('tblpaipafcontrisub',$data);
    }

    public function add_IpafdevelopmentOther($data){
        $this->db->insert('tblpaipafdevfee',$data);
    }

    public function add_IpafpenaltyOther($data){
        $this->db->insert('tblpaipafpenalty',$data);
    }

    public function add_subEconOthers($data){
        $this->db->insert('tblseams_sourceincome_ecourism_sub_transportation_others',$data);
    }

    public function add_subIncomeGeneratedOthers($data){
        $this->db->insert('tblpaipafincomeothers',$data);
    }

    public function add_subIncomeDisbursement($data){
        $this->db->insert('tblpaipafdisbursement',$data);
    }

    public function add_editvisitorspayment($data){
        $this->db->insert('tblpavisitorspayment',$data);
    }

     public function addbdfeaddtechass($data){
        $this->db->insert('tblpalivelihood_enhancement_tehass',$data);
    }

    public function add_subcontri($data){
        $this->db->insert('tblpaipafcontrisub',$data);
    }

    public function add_subdev($data){
        $this->db->insert('tblpaipafdevfee',$data);
    }

    public function add_subfine($data){
        $this->db->insert('tblpaipafpenalty',$data);
    }

    public function createFee($data = [])
        {
        return $this->db->insert($this->fee,$data);
        }

    public function updateFee($data = [])
    {
        return $this->db->where('id_mainfee',$data['id_mainfee'])
        ->update($this->fee,$data);
    }


    public function getAllData($gencode=null)
    {
        return $this->db->select("*")
                        ->join('tblpamanagementzone','tblpamain.generatedcode = tblpamanagementzone.generatedcode_mgnt','left')
                        ->join('tbluser','tblpamain.pasu_id = tbluser.user_id','LEFT')
                        ->join('tblsex','tbluser.sex = tblsex.id','left')
                        ->join('tblpacategory','tblpamain.cpabi_id = tblpacategory.id_cat','LEFT')
                        ->join('tblpatbzones','tblpamain.tbz_id = tblpatbzones.id_tbz','LEFT')
                        ->from($this->table)
                        ->where('tblpamain.generatedcode',$gencode)
                        ->get()
                        ->row();
    }

    // public function totalpaoccupants($gencode=null)
    // {
    //     $this->db->select('tbliccip.id_iccip, iccip, tbliccip.generatedcode, male_iccip, female_iccip, SUM(male_iccip+female_iccip) as Total_iccip, sum(male_iccip) as total_male,sum(female_iccip) as total_female');
    //     $this->db->where('generatedcode',$gencode);
    //     $this->db->order_by('iccip','ASC');
    //     $query = $this->db->get('tbliccip');
    //     return $query->result();
    // }

    public function CheckFee($user_id=null)
    {
        return $this->db->select("*")
                        ->from($this->fee)
                        ->where('pasu_id',$user_id)
                        ->get()
                        ->row();
    }

    public function tappointment()
    {

        $result = $this->db->select("*")
            ->from('tblappoinmentstatus')
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_astatus] = $value->adescription;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function classList()
    {

        $result = $this->db->select("*")
            ->from('tblnipsub')
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_subnip] = $value->sub_nip_description;
            }
            return $list;
        } else {
            return false;
        }
    }

     public function classListsub()
    {

        $result = $this->db->select("*")
            ->from('tblnip')
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_nip] = $value->nipDesc;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function subclassList()
    {

        $result = $this->db->select("*")
            ->from('tblnipsub')
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_subnip] = $value->description;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function subclassHydro($classHydro)
    {

        $result = $this->db->select("*")
            ->from('tblhydrology_waterclass_sub')
            ->where('id_waterClass',$classHydro)
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_waterClassSub] = $value->waterClass;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function categoryList()
    {

        $result = $this->db->select("*")
            ->from('tblpacategory')
            ->order_by('id_cat','ASC')
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_cat] = $value->categoryName;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function yearListedDisbursement()
    {

        $result = $this->db->select("*")
            ->join('tbldateyear','tblipafsourceincome.income_date_year =tbldateyear.id_year','left')
            ->from('tblipafsourceincome')
            ->group_by('income_date_year')
            ->get()
            ->result();

            $list[''] = "Year";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->year] = strtoupper($value->year);
            }
            return $list;
        } else {
            return false;
        }
    }

    public function cpabiList($UserRegions)
    {

        $result = $this->db->select("*")
            ->join('tbluser','tblpalistkba.kba_region = tbluser.region','left')
            ->join('tbllocregion','tbluser.region = tbllocregion.id','left')
            ->join('tblpamain','tbluser.user_id = tblpamain.pasu_id','left')
            ->from('tblpalistkba')
            ->where('id',$UserRegions)
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_kba] = $value->kba_name;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function zoneList()
    {

        $result = $this->db->select("*")
            ->from('tblpatbzones')
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_tbz] = $value->TBZlocation;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function zoneListm()
    {

        $result = $this->db->select("*")
            ->from('tblpatbzonesmarine')
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_tbz_marine] = $value->TBZlocationmarine;
            }
            return $list;
        } else {
            return false;
        }
    }


    public function paListReport()
    {
        $user_id = $this->session->userdata('user_id');

        $result = $this->db->select("*")
            ->from('tblpamain')
            ->where('pasu_id',$user_id)
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

    public function paListVisitor()
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

     public function yearlistedDisburse()
    {
        $user_id = $this->session->userdata('user_id');

        $result = $this->db->select("*")
            ->join('tblpamain','tblpaipafdisbursementfiles.generatedcode = tblpamain.generatedcode','LEFT')
            ->join('tbldateyear','tblpaipafdisbursementfiles.year_disbursement = tbldateyear.id_year','LEFT')
            ->from('tblpaipafdisbursementfiles')
            ->where('tblpamain.pasu_id',$user_id)
            ->get()
            ->result();

            $list[''] = "Select Year";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->year_disbursement] = $value->year;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function QuarterlyList()
    {
        $user_id = $this->session->userdata('user_id');

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

    public function donatelist()
    {
        $result = $this->db->select("*")
            ->from('tblipafsourceincomedonation')
            ->get()
            ->result();

            $list[''] = "Select Donation";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_donation] = $value->donation_desc;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function monthList()
    {

        $result = $this->db->select("*")
            ->from('tbldatemonth')
            ->get()
            ->result();

            $list[''] = "Month";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_month] = $value->month;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function lhpostatus()
    {

        $result = $this->db->select("*")
            ->from('tblpabdfepostatus')
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_po_status] = $value->po_status;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function monthListed()
    {

        $result = $this->db->select("*")
            ->from('tbldatemonth')
            ->get()
            ->result();

            $list[''] = "Month";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->month] = $value->month;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function progsourceoffund()
    {

        $result = $this->db->select("*")
            ->from('tblprogram_sourcefund')
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_prog_fund] = $value->sourceoffund;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function progtypeoffund()
    {

        $result = $this->db->select("*")
            ->from('tblprogram_typefund')
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_prog_typefund] = $value->typeoffund;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function progtypeofpayment()
    {

        $result = $this->db->select("*")
            ->from('tblprogram_typepayment')
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_progpayment] = $value->typeofpaymentprog;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function projcurrency()
    {

        $result = $this->db->select("*")
            ->from('tbl_listofcurrencies')
            ->order_by('country_and_currency','asc')
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->currency_id] = $value->country_and_currency." (".$value->currency_symbol.")";
            }
            return $list;
        } else {
            return false;
        }
    }

    public function programsector()
    {

        $result = $this->db->select("*")
            ->from('tblpaprogram_agency')
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_sector ] = $value->name_agency;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function citationlist()
    {

        $result = $this->db->select("*")
            ->from('tblpareference_type')
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_type_reference] = $value->type_reference;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function yearList()
    {

        $result = $this->db->select("*")
            ->from('tbldateyear')
            ->order_by('id_year','desc')
            ->get()
            ->result();

            $list[''] = "Year";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_year] = $value->year;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function yearduration()
    {
        $add = date("Y",strtotime('+15 years')) + 15;
        $years = range($add,1900);
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

    public function yearListedduration()
    {
        $add = date("Y",strtotime('+15 years')) + 15;
        $years = range($add,1900);
            $list[''] = "Year";
                if (!empty($years)) {
                    foreach ($years as $value) {
                        $list[$value] = $value;
            }
            return $list;
        } else {
            return false;
        }

        // $result = $this->db->select("*")
        //     ->from('tbldateyear')
        //     ->order_by('year','DESC')
        //     ->get()
        //     ->result();

        //     $list[''] = "Year";
        //         if (!empty($result)) {
        //             foreach ($result as $value) {
        //                 $list[$value->year] = strtoupper($value->year);
        //     }
        //     return $list;
        // } else {
        //     return false;
        // }
    }

    public function projstatus()
    {

        $result = $this->db->select("*")
            ->from('tblmainprojects_status')
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->proj_status_id] = $value->proj_status_desc;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function researchstatus()
    {
        $result = $this->db->select("*")
            ->from('tblmainresearch_status')
            // ->where('id',$UserRegions)
            ->get()
            ->result();

            $list[''] = "Select Status";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_research_status] = $value->research_status_details;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function finespelaltiesdamages()
    {
        $result = $this->db->select("*")
            ->from('tblipatrustreceipts')
            // ->where('id',$UserRegions)
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->receipt_id] = $value->receipt_name;
            }
            return $list;
        } else {
            return false;
        }
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


    public function oldsubpariaListed()
    {
        $result = $this->db->select("*")
            ->from('tblpaipaf_oldsubparia')
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_subfundparia] = $value->subparia_desc;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function techcomm()
    {
        $result = $this->db->select("*")
            ->from('tblmgntboardtechcomm')
            // ->where('id',$UserRegions)
            ->get()
            ->result();

            $list[''] = "Select Technical Committee";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_techcomm] = $value->techcomm_detail;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function dayList()
    {

        $result = $this->db->select("*")
            ->from('tbldateday')
            ->get()
            ->result();

            $list[''] = "Day";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_day] = strtoupper($value->day);
            }
            return $list;
        } else {
            return false;
        }
    }

    public function regionList($UserRegions)
    {

        $result = $this->db->select("*")
            ->from('tbllocregion')
            // ->where('id',$UserRegions)
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

    public function floodingLegend()
    {

        $result = $this->db->select("*")
            ->from('tblpamgblegendflooding')
            // ->where('id',$UserRegions)
            ->get()
            ->result();

            $list[''] = "Select Legend";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_legend_flooding] = $value->flooding_legend;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function landslideLegend()
    {

        $result = $this->db->select("*")
            ->from('tblpamgblegendflooding')
            // ->where('id',$UserRegions)
            ->get()
            ->result();

            $list[''] = "Select Legend";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_legend_flooding] = $value->flooding_legend;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function threatsCategory()
    {

        $result = $this->db->select("*")
            ->from('tblpathreat_category')
            // ->where('id',$UserRegions)
            ->get()
            ->result();

            $list[''] = "Select Category";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_threats_category] = $value->threats_category_desc;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function nature_threats()
    {

        $result = $this->db->select("*")
            ->from('tblpathreat_naturalthreats')
            // ->where('id',$UserRegions)
            ->get()
            ->result();

            $list[''] = "Select Nature of Threats";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_natural_threats] = $value->natural_threats_desc;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function threatsrank()
    {

        $result = $this->db->select("*")
            ->from('tblpathreat_category_rank')
            // ->where('id',$UserRegions)
            ->get()
            ->result();

            $list[''] = "Select Rank";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_threat_rank] = $value->rank;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function lh_type()
    {

        $result = $this->db->select("*")
            ->from('tblpalivelihood_type')
            // ->where('id',$UserRegions)
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_lh_type] = $value->lh_type;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function lh_products()
    {

        $result = $this->db->select("*")
            ->from('tblpalivelihood_products')
            // ->where('id',$UserRegions)
            ->get()
            ->result();

            $list[''] = "Select Category";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_products] = $value->products_desc;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function sizeenterprise()
    {

        $result = $this->db->from('tblpalivelihood_enterprise')
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_size_enterprise] = $value->size_enterprise;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function bdfe_level()
    {

        $result = $this->db->from('tblpalivelihood_bdfe_level')
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_bdfe_level] = $value->bdfe_level_desc;
            }
            return $list;
        } else {
            return false;
        }
    }


    public function waterclass()
    {

        $result = $this->db->from('tblhydrology_waterclass')
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_waterClass] = $value->id_waterClassDesc;
            }
            return $list;
        } else {
            return $list;
        }
    }

    public function waterqualitystatus()
    {

        $result = $this->db->from('tblhydrology_waterstatus')
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_waterquality_status] = $value->status_waterquality;
            }
            return $list;
        } else {
            return $list;
        }
    }

    public function inlandwaterclass()
    {

        $result = $this->db->from('tblpainlandwaterbodyclass')
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_waterclass] = $value->waterclass_desc;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function region_demoList($UserRegions)
    {

        $result = $this->db->select("*")
            ->from('tbllocregion')
            ->where('id',$UserRegions)
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


    public function provincesList($UserProvince)
    {

        $result = $this->db->select("*")
            ->from('tbllocmunicipality')
            ->where('provinceid',$UserProvince)
            ->get()
            ->result();

            $list[''] = "Select Municipality";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_m] = $value->municipalName;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function fftype()
    {

        $result = $this->db->select("*")
            ->from('tblpaforestformationtype')
            ->get()
            ->result();

            $list[''] = "Types of Forest Formation";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_fftype] = $value->ff_details;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function hcc()
    {

        $result = $this->db->select("*")
            ->from('tblpacoastalcoralhcc')
            ->get()
            ->result();

            $list[''] = "Select Hard Coral Cover";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_coral_hcc] = $value->hcc;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function hcccondition()
    {

        $result = $this->db->select("*")
            ->from('tblpacoastalcoralhcc')
            ->get()
            ->result();

            $list[''] = "Hard Coral Cover (HCC) Category";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_coral_hcc] = $value->hcc_condition." (".$value->hcc.")";
            }
            return $list;
        } else {
            return false;
        }
    }

    public function tauscategory()
    {

        $result = $this->db->select("*")
            ->from('tbltblpacoastalcoraltaus')
            ->get()
            ->result();

            $list[''] = "TAUs Category";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_taus] = $value->taus_categorys." (".$value->taus_values.")";
            }
            return $list;
        } else {
            return false;
        }
    }

    public function seagrasscondition()
    {

        $result = $this->db->select("*")
            ->from('tblpacoastalseagrasscondition')
            ->get()
            ->result();

            $list[''] = "Seagrass Condition";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_seagrass_condition] = $value->seagrass_condition." (".$value->seagrass_coverage.")";
            }
            return $list;
        } else {
            return false;
        }
    }

    public function seagrassdiversity()
    {

        $result = $this->db->select("*")
            ->from('tblseagrassdiversity')
            ->get()
            ->result();

            $list[''] = "Seagrass Diversity Index";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_diversity_index] = $value->diversity_indexs;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function mangrovescondition()
    {

        $result = $this->db->select("*")
            ->from('tblpacoastalmangrovecondition')
            ->get()
            ->result();

            $list[''] = "Select Condition";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_mangrove_condition] = $value->mangrove_conditions." (".$value->mangrove_criteria.")";
            }
            return $list;
        } else {
            return false;
        }
    }

    public function mangroveregen()
    {

        $result = $this->db->select("*")
            ->from('tblpacoastalmangrove_regen')
            ->get()
            ->result();

            $list[''] = "Select Condition";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_regen] = $value->regen_category." (".$value->regen_value.")";
            }
            return $list;
        } else {
            return false;
        }
    }

    public function mangrovesaverage()
    {

        $result = $this->db->select("*")
            ->from('tblpacoastalmangrove_height')
            ->get()
            ->result();

            $list[''] = "Select Condition";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_mangrove_height] = $value->average_height_category." (".$value->average_height_value.")";
            }
            return $list;
        } else {
            return false;
        }
    }

    public function mangrovesobservation()
    {

        $result = $this->db->select("*")
            ->from('tblpacoastalmangrove_observation')
            ->get()
            ->result();

            $list[''] = "Select Condition";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_observation] = $value->observation_category." (".$value->observation_value.")";
            }
            return $list;
        } else {
            return false;
        }
    }

    public function mangrovesdiversity()
    {

        $result = $this->db->select("*")
            ->from('tblpacoastalmangrove_diversity')
            ->get()
            ->result();

            $list[''] = "Select Condition";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_mangrove_diversity] = $value->mangrove_diversity_value." (".$value->shannon_index.")";
            }
            return $list;
        } else {
            return false;
        }
    }

    public function fishdiversity()
    {

        $result = $this->db->select("*")
            ->from('tblpacoastalfishdiversity')
            ->get()
            ->result();

            $list[''] = "Fish Diversity";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_fish_diversity] = $value->fish_diverity_values;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function fishcategorysa()
    {

        $result = $this->db->select("*")
            ->from('tblpacoastalfishcategory')
            ->get()
            ->result();

            $list[''] = "Fish Category";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_fish_category] = $value->fish_category_value;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function fishspeciesdata()
    {

        $result = $this->db->select("*")
            ->from('tblcoastalmarine_fishspecies')
            ->get()
            ->result();

            $list[''] = "Fish Species";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_fishspecies] = "<i>".$value->fish_scientific_name."</i>";
            }
            return $list;
        } else {
            return false;
        }
    }

     public function fishdensity()
    {

        $result = $this->db->select("*")
            ->from('tblpacoastalfishdensity')
            ->get()
            ->result();

            $list[''] = "Fish Density";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_fish_density] = $value->fish_density_value;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function fishbiomass()
    {

        $result = $this->db->select("*")
            ->from('tblpacoastalfishbiomass')
            ->get()
            ->result();

            $list[''] = "Fish Biomass";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_fishbiomass] = $value->fish_categorys." (".$value->fish_biomass.")";
            }
            return $list;
        } else {
            return false;
        }
    }

    public function riverbasinlist()
    {

        $result = $this->db->select("*")
            ->from('tblriverbasin_list')
            ->get()
            ->result();

            $list[''] = "List of River Basin";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_riverbasin] = $value->riverbasin_names;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function bdfetyperegistration()
    {

        $result = $this->db->select("*")
            ->from('tblpalivelihood_registration')
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_bdfe_registration] = $value->bdfe_registration_type;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function coralspecies()
    {

        $result = $this->db->select("*")
            ->from('tblpacoastalcoralspecies')
            ->get()
            ->result();

            $list[''] = "Select Coral Species";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_coral_species] = $value->coral_species_name;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function seagrasspecies()
    {

        $result = $this->db->select("*")
            ->from('tblpacoastalseagrassspecies')
            ->get()
            ->result();

            $list[''] = "Select Seagrass Species";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_seagrassSpecies] = $value->seagrassName;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function mangrovespecies()
    {

        $result = $this->db->select("*")
            ->from('tblpacoastalmangrovespecies')
            ->get()
            ->result();

            $list[''] = "Select Mangrove Species";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_mangrove_species] = $value->mangrove_scientific_name;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function provincesListi($UserProvince)
    {

        $result = $this->db->select("*")
            ->from('tbllocmunicipality')
            ->where('provinceid',$UserProvince)
            ->get()
            ->result();

    }


    public function recognitionList()
    {

        $result = $this->db->select("*")
            ->from('tblinternationalrecognition')
            ->order_by('aa','ASC')
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_recognition] = $value->reg_desc;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function save_loc($rel_data1){
        for($x = 0; $x < count($rel_data1); $x++){
            $data[] = array(
                "region_id" => $rel_data1[$x]["region_ids"],
                "province_id" => $rel_data1[$x]["province_ids"],
                "municipal_id" => $rel_data1[$x]['municipal_ids'],
                "barangay_id" => $rel_data1[$x]['barangay_ids'],
                "generatedcode" => $rel_data1[$x]['codegen'],
                "status"  => 1,
            );
        }
        try{
            for($x =0; $x<count($rel_data1); $x++){
                $this->db->insert('tblpamainlocation',$data[$x]);
            }
            return "success";
        }catch(Exception $e){
            return "failed";
        }


        // return $this->db->insert($this->table2,$data);
    }

    public function mngmntplan_status()
    {
        $result = $this->db->select("*")
            ->from('tblpamanagementplanstatus')
            ->get()
            ->result();

            $list[''] = "Select Status";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_mpstatus] = $value->status_desc;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function tenures_status()
    {
        $result = $this->db->select("*")
            ->from('tblpamaintenure_status')
            ->get()
            ->result();

            $list[''] = "Select Status";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_tenure_status] = $value->tenure_status_desc;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function seams_status()
    {
        $result = $this->db->select("*")
            ->from('tblseams_status')
            ->get()
            ->result();

            $list[''] = "Select Status";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->seams_id_stat] = $value->seams_stat_desc;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function mett_status()
    {
        $result = $this->db->select("*")
            ->from('tblmett_status')
            ->get()
            ->result();

            $list[''] = "Select Status";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->mett_id_stat] = $value->mett_stat_desc;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function ecoimpact_status()
    {
        $result = $this->db->select("*")
            ->from('tblecoimpact_stat')
            ->get()
            ->result();

            $list[''] = "Select Status";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->ecoimpact_id] = $value->ecoimpact_stat_desc;
            }
            return $list;
        } else {
            return false;
        }
    }


    public function nipselects()
    {
        $result = $this->db->select("*")
            ->from('tblpacategory')
            ->where('id_nips',3)
            ->get()
            ->result();

            $list[''] = "Select Category";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_cat] = $value->categoryName;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function cepa_activity_audience()
    {
        $result = $this->db->select("*")
            ->from('tblpamaincepa_activity_audience')
            ->get()
            ->result();

            $list[''] = "Select Audience";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_cepa_audience] = $value->cepa_audience_details;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function ecotourismactivity()
    {
        $result = $this->db->select("*")
            ->from('tblpaecotourism_activities')
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_ecotourism_activities] = $value->ecotourism_activities_details;
            }
            return $list;
        } else {
            return false;
        }
    }

public function pabstatus()
    {
        $result = $this->db->select("*")
            ->from('tblpambstatus_file')
            ->get()
            ->result();

            $list[''] = "Select Status";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_file_status] = $value->status_desc;
            }
            return $list;
        } else {
            return false;
        }
    }
    public function provinceListeds()
    {
        $region = $this->session->userdata('region');
        $result = $this->db->select("*")
            ->from('tbllocprovince')
            ->where('regionid',$region)
            ->get()
            ->result();

            $list[''] = "Select Province";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_p] = $value->provinceName;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function visitorsforloc()
    {
        $result = $this->db->select("*")
            ->from('tblipafvisitorslog_forloc')
            // ->where('regionid',$region)
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_visitorforloc] = $value->visitorsforloc_details;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function florafuanalist()
    {
        $result = $this->db->select("*")
            ->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','LEFT')
            ->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','LEFT')
            ->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','LEFT')
            ->join('tblwcategory','tblclass.WCode = tblwcategory.id','LEFT')
            ->from('tblwspeciesgenus')
            ->where('id',1)
            ->where('commonNameSpecies !=',"")
            ->order_by('commonNameSpecies','ASC')
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_genus] = ucfirst($value->commonNameSpecies);
            }
            return $list;
        } else {
            return false;
        }
    }

     public function florafuanalistScientific()
    {
        $result = $this->db->select("*")
            ->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','LEFT')
            ->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','LEFT')
            ->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','LEFT')
            ->join('tblwcategory','tblclass.WCode = tblwcategory.id','LEFT')
            ->from('tblwspeciesgenus')
            ->where('id',1)
            ->where('scientificName_genus !=',"")
            ->order_by('genus_species','ASC')
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_genus] = ucfirst($value->scientificName_genus);
            }
            return $list;
        } else {
            return false;
        }
    }


    public function florafuanalist2()
    {
        $result = $this->db->select("*")
            ->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','LEFT')
            ->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','LEFT')
            ->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','LEFT')
            ->join('tblwcategory','tblclass.WCode = tblwcategory.id','LEFT')
            ->from('tblwspeciesgenus')
            ->where('id',2)
            ->where('commonNameSpecies !=',"")
            ->order_by('commonNameSpecies','ASC')
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_genus] = $value->commonNameSpecies;
            }
            return $list;
        } else {
            return false;
        }
    }

     public function florafuanalistScientific2()
    {
        $result = $this->db->select("*")
            ->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','LEFT')
            ->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','LEFT')
            ->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','LEFT')
            ->join('tblwcategory','tblclass.WCode = tblwcategory.id','LEFT')
            ->from('tblwspeciesgenus')
            ->where('id',2)
            ->where('scientificName_genus !=',"")
            ->order_by('genus_species','ASC')
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_genus] = $value->genus_species." ".$value->scientificName_genus;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function municipalss()
    {
        $result = $this->db->select("*")
            ->from('tbllocmunicipality')
            // ->where('regionid',$region)
            ->get()
            ->result();

            $list[''] = "Select Municipal";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_m] = $value->municipalName;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function cavelandstat()
    {
        $result = $this->db->select("*")
            ->from('tblcaveclassification')
            ->get()
            ->result();

            $list[''] = "Select Cave Classification";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_cave_class] = $value->class_no;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function cavetype()
    {
        $result = $this->db->select("*")
            ->from('tblpacaves_type')
            ->get()
            ->result();

            $list[''] = "Type of Cave";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_cave_type] = $value->type_cave;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function cepasouvenir()
    {
        $result = $this->db->select("*")
            ->order_by('num')
            ->from('tblpamaincepa_souvenir_list')
            ->get()
            ->result();

            $list[''] = "Select souvenir item";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_cepa_souvenir] = $value->cepa_souvenir_details;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function getRegionq($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tbl');
                // $this->db->where('generatedcode',$codegen)
        return $query->result();

    }
    public function getallthreatsLists($codegens){
        $this->db->join('tblpathreat_naturalthreats','tblpathreat_multi.nature_threat_x = tblpathreat_naturalthreats.id_natural_threats','left');
        $this->db->join('tblpathreat_category','tblpathreat_multi.nature_category_x = tblpathreat_category.id_threats_category','left');
        $this->db->join('tblpathreat_category_sub','tblpathreat_multi.sub_nature_category_x = tblpathreat_category_sub.id_threats_sub','left');
        $this->db->where('threat_gencode',$codegens);
        $query = $this->db->get('tblpathreat_multi');
                // $this->db->where('generatedcode',$codegen)
        return $query->result();

    }

    public function getthreatlistperPA($code){
        $this->db->join('tblpathreat_naturalthreats','tblpathreat_multi.nature_threat_x = tblpathreat_naturalthreats.id_natural_threats','left');
        $this->db->join('tblpathreat_category','tblpathreat_multi.nature_category_x = tblpathreat_category.id_threats_category','left');
        $this->db->join('tblpathreat_category_sub','tblpathreat_multi.sub_nature_category_x = tblpathreat_category_sub.id_threats_sub','left');
        $this->db->where('threat_gencode',$code);
        $query = $this->db->get('tblpathreat_multi');
                // $this->db->where('generatedcode',$codegen)
        return $query->result();

    }

    public function getAllUsers($codegens){
        $this->db->join('tbllocregion','tblpamainlocation.region_id = tbllocregion.id','left');
        $this->db->join('tbllocprovince','tblpamainlocation.province_id = tbllocprovince.id_p','left');
        $this->db->join('tbllocmunicipality','tblpamainlocation.municipal_id = tbllocmunicipality.id_m','left');
        $this->db->join('tbllocbarangay','tblpamainlocation.barangay_id = tbllocbarangay.id_b','left');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get($this->table2);
                // $this->db->where('generatedcode',$codegen)
        return $query->result();

    }

    public function getbiogeoter($codegens){
        $this->db->join('tblpatbzones','tblpamain_terrestrial_biozone.biodiv_terrestrial=tblpatbzones.id_tbz','LEFT');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpamain_terrestrial_biozone');
        return $query->result();
    }

    public function getbiogeomar($codegens){
        $this->db->join('tblpatbzonesmarine','tblpamain_marine_biozone.biodiv_marine=tblpatbzonesmarine.id_tbz_marine','LEFT');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpamain_marine_biozone');
        return $query->result();
    }

    public function GetRow($title,$codegens) {
        // $this->db->order_by('id_genus', 'DESC');
        // $this->db->like("scientificName_genus", $keyword);
        // return $this->db->get('tblwspeciesgenus')->result_array();

        $this->db->or_like('commonNameSpecies', $title , 'both');
        // $this->db->or_like('scientificName_genus', $title , 'both');
        // $this->db->or_like(array('commonNameSpecies' => $title, 'scientificName_genus' => $title));
        $this->db->order_by('commonNameSpecies', 'ASC');
        $this->db->limit(10);
        return $this->db->get('tblwspeciesgenus')->result();
    }

    public function procList()
    {

        $result = $this->db->select("*")
            ->from('tbllegislation')
            ->get()
            ->result();

            $list[''] = "Select Issuance";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_legis] = $value->LegisDesc;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function household($gencode=null)
    {
        // $gencode = $this->input->post('gencode');
        $result = $this->db->select("*")
            ->from('tblseamsdemographic')
            ->where('generatedcode',$gencode)
            ->get()
            ->result();

            $list[''] = "Select Household Member";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_seams_demo] = $value->name_household_head;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function financialList()
    {

        $result = $this->db->select("*")
            ->from('tblfinancialassistance')
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->finance_desc] = $value->finance_desc;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function financialListsub()
    {

        $result = $this->db->select("*")
            ->from('tblfinancialassistancesub')
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->description] = $value->description;
            }
            return $list;
        } else {
            return false;
        }
    }


    public function save_legislation($rel_data2){

        for($x = 0; $x < count($rel_data2); $x++){
            $data[] = array(
                "legis_id"      => $rel_data2[$x]['legis_id'],
                "legis_no"      => $rel_data2[$x]['legis_no'],
                "date_month"    => $rel_data2[$x]['date_month'],
                "date_day"      => $rel_data2[$x]['date_day'],
                "date_year"     => $rel_data2[$x]['date_year'],
                "area"          => $rel_data2[$x]['area'],
                "buffer"        => $rel_data2[$x]['buffer'],
                "generatedcode" => $rel_data2[$x]['codegen'],
                "legis_area" => $rel_data2[$x]['legis_area'],
            );
        }

        try{
            for($x =0; $x<count($rel_data2); $x++){
                $this->db->insert('tblpamainlegislation',$data[$x]);
            }
            return "success";
        }catch(Exception $e){
            return "failed";
        }
    }

    public function getAllLegislation($codegens){
        $this->db->join('tblnip','tblpamainlegislation.nip_id = tblnip.id_nip','LEFT');
        $this->db->join('tblnipsub','tblpamainlegislation.nipsub_id = tblnipsub.id_subnip','LEFT');
        $this->db->join('tbllegislation','tblpamainlegislation.legis_id = tbllegislation.id_legis','LEFT');
        $this->db->join('tbldatemonth','tblpamainlegislation.date_month = tbldatemonth.id_month','LEFT');
        $this->db->join('tblpacategory','tblpamainlegislation.pa_category_id = tblpacategory.id_cat','LEFT');
        // $this->db->join('tbldateyear','tblpamainlegislation.date_year = tbldateyear.id_year','LEFT');

        $this->db->where('generatedcode',$codegens);
        $this->db->order_by("date_year","desc");
        $query1 = $this->db->get($this->table3);
        $result1 = $query1->result();

        return array_merge($result1);
    }

    public function getAllhistoryinitialcomp($codes){
        $this->db->join('tblnipsub','tblpamainlegislation_history.nipid_status = tblnipsub.id_subnip','LEFT');
        $this->db->join('tbllegislation','tblpamainlegislation_history.legal_basis_id = tbllegislation.id_legis','LEFT');
        $this->db->join('tbldatemonth','tblpamainlegislation_history.legal_basis_month = tbldatemonth.id_month','LEFT');
        $this->db->join('tblpacategory','tblpamainlegislation_history.nipid_category = tblpacategory.id_cat','LEFT');
        $this->db->where('legal_generatedcode',$codes);
        $query1 = $this->db->get('tblpamainlegislation_history');
        $result1 = $query1->result();

        return array_merge($result1);
    }

     public function getAllLegislationbyIDs($codegens,$user_id){
        $this->db->join('tblnip','tblpamainlegislation.nip_id = tblnip.id_nip','LEFT');
        $this->db->join('tblnipsub','tblpamainlegislation.nipsub_id = tblnipsub.id_subnip','LEFT');
        $this->db->join('tbllegislation','tblpamainlegislation.legis_id = tbllegislation.id_legis','LEFT');
        $this->db->join('tbldatemonth','tblpamainlegislation.date_month = tbldatemonth.id_month','LEFT');
        $this->db->join('tblpamain','tblpamainlegislation.generatedcode = tblpamain.generatedcode','LEFT');

        $this->db->where('pasu_id',$user_id);
        $this->db->order_by('LENGTH(date_year)');
        $this->db->order_by('date_year','DESC');
        $query = $this->db->get($this->table3);
        return $query->result();

    }

    public function getAllUsersIDs($codegens,$user_id){
        $this->db->join('tbllocregion','tblpamainlocation.region_id = tbllocregion.id','left');
        $this->db->join('tbllocprovince','tblpamainlocation.province_id = tbllocprovince.id_p','left');
        $this->db->join('tbllocmunicipality','tblpamainlocation.municipal_id = tbllocmunicipality.id_m','left');
        $this->db->join('tbllocbarangay','tblpamainlocation.barangay_id = tbllocbarangay.id_b','left');
        $this->db->join('tblpamain','tblpamainlocation.generatedcode = tblpamain.generatedcode','LEFT');
        $this->db->where('pasu_id',$user_id);
        // $this->db->where('generatedcode',$codegens);
        $query = $this->db->get($this->table2);
                // $this->db->where('generatedcode',$codegen)
        return $query->result();

    }

    // public function getAllLegislationbyIDs($codegens){
    //     $this->db->join('tblnip','tblpamainlegislation.nip_id = tblnip.id_nip','LEFT');
    //     $this->db->join('tblnipsub','tblpamainlegislation.nipsub_id = tblnipsub.id_subnip','LEFT');
    //     $this->db->join('tbllegislation','tblpamainlegislation.legis_id = tbllegislation.id_legis','LEFT');
    //     $this->db->join('tbldatemonth','tblpamainlegislation.date_month = tbldatemonth.id_month','LEFT');

    //     $this->db->where('generatedcode',$codegens);
    //     $this->db->order_by("date_year","desc");
    //     $query1 = $this->db->get($this->table3);
    //     $result1 = $query1->result();

    //     return array_merge($result1);
    // }

    public function SpeciescategoryList()
    {

        $result = $this->db->select("*")
            ->from($this->categorySpecies)
            ->order_by('wdesc','ASC')
            ->get()
            ->result();

            $list[''] = "Species Category";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id] = $value->wdesc;
            }
            return $list;
        } else {
            return false;
        }

    }

    public function CommonListSpecies()
    {

        $result = $this->db->select("*")
            ->from($this->table5)
            ->order_by('commonNameSpecies','ASC')
            ->get()
            ->result();

            $list[''] = "Species Category";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_genus] = $value->commonNameSpecies;
            }
            return $list;
        } else {
            return false;
        }

    }

    public function save_biological($rel_data3){


        for($x = 0; $x < count($rel_data3); $x++){
            $data[] = array(
                "id_genus_get"  => $rel_data3[$x]['id_genus_get'],
                "generatedcode" => $rel_data3[$x]['codegen'],
            );
        }

        try{
            for($x =0; $x<count($rel_data3); $x++){
                $this->db->insert('tblpamainbiological',$data[$x]);
            }
            return "success";
        }catch(Exception $e){
            return "failed";
        }
    }

    public function getAllbiological($codegens){

        $this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
        $this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
        $this->db->join('tblpamainbiological_residency','tblwspeciesgenus.residency_status = tblpamainbiological_residency.id_residency ','left');

        $this->db->where('tblpamainbiological.generatedcode',$codegens);
        $this->db->where('tblwcategory.id',1);
        $query = $this->db->get($this->table6);
        return $query->result();
    }

    public function getAllbiologicalImgespecies($id_species){
        // $this->db->join('tblpamainbiological','tblpamainbiological_img.species_id=tblpamainbiological.id_genus_get','left');
        $this->db->where('species_codegen',$id_species);
                 // ->where('tblpamainbiological_img.generatedcode',$codegens);
        $query = $this->db->get('tblpamainbiological_img');
        return $query->result();
    }

    public function getAllbiologicalImgespeciesIndi($codegens){
        // $this->db->join('tblpamainbiological','tblpamainbiological_img.species_id=tblpamainbiological.id_genus_get','left');
        $this->db->where('species_codegen',$codegens);
                 // ->where('tblpamainbiological_img.generatedcode',$codegens);
        $query = $this->db->get('tblpamainbiological_img');
        return $query->result();
    }

    public function getAllcavesimagess($codegens){
        $this->db->where('cavegenerator',$codegens);
        $query = $this->db->get('tblpacaves_images');
        return $query->result();
    }

    public function getAllbiologicalflora($codegens){

        $this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
        $this->db->join('tbliucncode','tblwspeciesgenus.status = tbliucncode.id','LEFT');
        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
        $this->db->join('tblpamainbiological_residency','tblwspeciesgenus.residency_status = tblpamainbiological_residency.id_residency ','left');
        $this->db->where('tblpamainbiological.generatedcode',$codegens);
        $this->db->where('tblwcategory.id',2);
        $query = $this->db->get($this->table6);
        return $query->result();
    }

    public function sexList()
    {

        $result = $this->db->select("*")
            ->from('tblsex')
            ->get()
            ->result();

            $list[''] = "Select sex";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->sexcode] = $value->sexdesc;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function visitorspayment()
    {

        $result = $this->db->select("*")
            ->from('tblipafvisitorslog_payment')
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_visitorpayment] = $value->paymenttypes;
            }
            return $list;
        } else {
            return false;
        }
    }
    public function maritalStatus()
        {

            $result = $this->db->select("*")
                ->from('tblcvstatus')
                ->get()
                ->result();

                $list[''] = "Marital Status";
                    if (!empty($result)) {
                        foreach ($result as $value) {
                            $list[$value->id_marital] = $value->cvdesc;
                }
                return $list;
            } else {
                return false;
            }
        }

    public function appointment()
        {
            $result = $this->db->select("*")
                ->from('tblpambmemberappointment')
                ->get()
                ->result();

                $list[''] = "Appointment type";
                    if (!empty($result)) {
                        foreach ($result as $value) {
                            $list[$value->id] = $value->description;
                }
                return $list;
            } else {
                return false;
            }
        }

    public function iwtype()
    {
        $result = $this->db->select("*")
            ->from('tblwetlandtypes')
            ->get()
            ->result();
            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_wetland] = $value->wetland_desc;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function hiwtype()
    {
        $result = $this->db->select("*")
            ->from('tblpainlandhumanmadetype')
            ->get()
            ->result();
            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_humantype] = $value->human_type_desc;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function fcondition()
    {
        $result = $this->db->select("*")
            ->from('tblpafacility_condition')
            ->get()
            ->result();
            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_fcondition] = $value->condition_desc;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function facilityList()
    {
        $result = $this->db->select("*")
            ->order_by('num')
            ->from('tblpafacility_list')
            ->get()
            ->result();
            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_facilities] = $value->facility_descs;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function tenurelist()
    {
        $result = $this->db->select("*")
            ->from('tblpamaintenureinstrument_types')
            ->get()
            ->result();
            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_tenuretypes] = $value->types_tenure_desc;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function landcover()
    {
        $result = $this->db->select("*")
            ->from('tbllandcover')
            ->order_by('landcover_class','ASC')
            ->get()
            ->result();
            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_landcovertype] = $value->landcover_class." (".$value->namria_landcover.")";
            }
            return $list;
        } else {
            return false;
        }
    }

    public function yesorno()
    {
        $result = $this->db->select("*")
            ->from('tblipafvisitorslog_yesno')
            ->get()
            ->result();
            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_yesno] = $value->yesnodisc;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function visitor_category()
    {
        $result = $this->db->select("*")
            ->from('tblpavisitorscategory')
            ->get()
            ->result();
            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_visitor_cat] = $value->visitor_category_details;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function cepa_print_materials()
    {
        $result = $this->db->select("*")
            ->order_by('num')
            ->from('tblpamaincepa_print_list')
            ->get()
            ->result();
            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_cepa_print] = $value->cepa_print_details;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function cepa_multimedia()
    {
        $result = $this->db->select("*")
            ->from('tblpamaincepa_multimedia_list')
            ->where('group_cat',1)
            ->or_where('group_cat',0)
            ->order_by('arrnge','asc')
            ->get()
            ->result();
            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_cepa_multimedia] = $value->cepa_multimedia_desc;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function cepa_multimedia4()
    {
        $result = $this->db->select("*")
            ->from('tblpamaincepa_multimedia_list')
            ->where('group_cat',3)
            // ->or_where('group_cat',0)
            ->order_by('arrnge','asc')
            ->get()
            ->result();
            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_cepa_multimedia] = $value->cepa_multimedia_desc;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function cepa_multimedia2()
    {
        $result = $this->db->select("*")
            ->from('tblpamaincepa_multimedia_list')
            ->where('group_cat',2)
            ->or_where('group_cat',0)
            ->order_by('arrnge','asc')
            ->get()
            ->result();
            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_cepa_multimedia] = $value->cepa_multimedia_desc;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function cepa_multimedia3()
    {
        $result = $this->db->select("*")
            ->from('tblpamaincepa_multimedia_list')
            ->where('group_cat',3)
            ->or_where('group_cat',0)
            ->get()
            ->result();
            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_cepa_multimedia] = $value->cepa_multimedia_desc;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function cepa_event()
    {
        $result = $this->db->select("*")
            ->order_by('num')
            ->from('tblpamaincepa_event_list')
            ->get()
            ->result();
            $list[''] = "Select Environmental Event";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_cepa_event] = $value->cepa_event_details;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function feetypeipaf()
    {
        $result = $this->db->select("*")
            ->from('tblpaipaffeetype')
            ->get()
            ->result();
            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_typefee] = $value->typefee_details;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function quarters()
    {
        $result = $this->db->select("*")
            ->from('tblpaipaffeetype')
            ->get()
            ->result();
            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_typefee] = $value->typefee_details;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function cavestatus()
    {
        $result = $this->db->select("*")
            ->from('tblpacavestatus')
            ->get()
            ->result();
            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_cave_status] = $value->cave_status_desc;
            }
            return $list;
        } else {
            return false;
        }
    }
    public function appointmentsub()
        {
            $result = $this->db->select("*")
                ->from('tblpambmemappointmentsub')
                ->get()
                ->result();

                $list[''] = "Select Designate";
                    if (!empty($result)) {
                        foreach ($result as $value) {
                            $list[$value->id] = $value->sub_desc;
                }
                return $list;
            } else {
                return false;
            }
        }

    public function appointment_status()
        {

            $result = $this->db->select("*")
                ->from('tblpambstatus')
                ->order_by('description')
                ->get()
                ->result();

                $list[''] = "Select";
                    if (!empty($result)) {
                        foreach ($result as $value) {
                            $list[$value->id_pambstatus] = $value->description;
                }
                return $list;
            } else {
                return false;
            }
        }

    public function sapa_devtlist()
        {

            $result = $this->db->select("*")
                ->from('tblpamaintenuresapa_development')
                ->get()
                ->result();

                $list[''] = "Select";
                    if (!empty($result)) {
                        foreach ($result as $value) {
                            $list[$value->id_sapa_development] = $value->sapa_devtlist;
                }
                return $list;
            } else {
                return false;
            }
        }

    public function iucnCategory()
        {

            $result = $this->db->select("*")
                ->from('tblpaiucncategory')
                ->get()
                ->result();

                $list[''] = "Select";
                    if (!empty($result)) {
                        foreach ($result as $value) {
                            $list[$value->id_iucncat ] = $value->iucn_code.". ".$value->iucn_title;
                }
                return $list;
            } else {
                return false;
            }
        }

    public function organizationposition()
        {

            $result = $this->db->select("*")
                ->from('tblpambmemberposition')
                ->get()
                ->result();

                $list[''] = "Select Position";
                    if (!empty($result)) {
                        foreach ($result as $value) {
                            $list[$value->id_memposition] = $value->description;
                }
                return $list;
            } else {
                return false;
            }
        }

    public function save_pambs($rel_data4){


        for($x = 0; $x < count($rel_data4); $x++){
            $data[] = array(
                "fname"                 => $rel_data4[$x]['fname'],
                "mname"                 => $rel_data4[$x]['mname'],
                "lname"                 => $rel_data4[$x]['lname'],
                "residential_address"   => $rel_data4[$x]['address'],
                "office_name"           => $rel_data4[$x]['office_name'],
                "sex"                   => $rel_data4[$x]['sex'],
                "civil_status"          => $rel_data4[$x]['marital'],
                "designation"           => $rel_data4[$x]['position'],
                "generatedcode"         => $rel_data4[$x]['codegen'],
                "office_address"        => $rel_data4[$x]['officeaddress1'],
                "status"                => 1,
                "pamb_landline"         => $rel_data4[$x]['pamb_landline'],
                "pamb_mobile"           => $rel_data4[$x]['pamb_mobile'],
                "techworkgrp"           => $rel_data4[$x]['techworkgrp'],
                "techcom"               => $rel_data4[$x]['techcom'],
                "execom"                => $rel_data4[$x]['execom'],
                "date_created"          => $rel_data4[$x4]['date_created'],

            );
        }

        try{
            for($x =0; $x<count($rel_data4); $x++){
                $this->db->insert('tblpambmember',$data[$x]);
                $this->db->where('status !=',null);
            }
            return "success";
        }catch(Exception $e){
            return "failed";
        }
    }

    public function getAllUsers2($codegens){
        $this->db->join('tbllocregion','tblpamainlocation.region_id = tbllocregion.id','left');
        $this->db->join('tbllocprovince','tblpamainlocation.province_id = tbllocprovince.id_p','left');
        $this->db->join('tbllocmunicipality','tblpamainlocation.municipal_id = tbllocmunicipality.id_m','left');
        $this->db->join('tbllocbarangay','tblpamainlocation.barangay_id = tbllocbarangay.id_b','left');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get($this->table2);
                // $this->db->where('generatedcode',$codegen)
        return $query->result();

    }

    public function getAllPAMBmembers($codegens){

        // $this->db->join('tbllegislation','tblpamainlegislation.legis_id = tbllegislation.id_legis');
        $this->db->join('tblpambmemappointmentsub','tblpambmember.sub_appointment = tblpambmemappointmentsub.id','left');
        $this->db->join('tbldatemonth','tblpambmember.appointment_month = tbldatemonth.id_month','left');
        $this->db->join('tblpambmemberposition','tblpambmember.designation = tblpambmemberposition.id_memposition','left');
        $this->db->join('tblpambmemberappointment','tblpambmember.appointment = tblpambmemberappointment.id','left');
        $this->db->join('tblsex','tblpambmember.sex = tblsex.id','left');
        $this->db->join('tblpambstatus','tblpambmember.status = tblpambstatus.id_pambstatus','left');
        $this->db->where('generatedcode',$codegens);
        $this->db->order_by('status','ASC');
        $query1 = $this->db->get($this->table4);
        $result1 = $query1->result();
        return array_merge($result1);
    }

    public function getAllPAMBmembersTechcomm($code){
        $this->db->join('tblmgntboardtechcomm','tblpambmember_techcomm.techcomm = tblmgntboardtechcomm.id_techcomm','left');
        $this->db->where('pambcode',$code);
        $query1 = $this->db->get('tblpambmember_techcomm');
        $result1 = $query1->result();
        return array_merge($result1);
    }

    public function save_tourism($rel_data){

        for($x = 0; $x < count($rel_data); $x++){
            $data[] = array(
                "activities"            => $rel_data[$x]['activityTitle'],
                "description"           => $rel_data[$x]['activityDesc'],
                "image_eco"             => $rel_data[$x]['pic_eco'],
                "generatedcode"         => $rel_data[$x]['codegen'],
            );
        }

        try{
            for($x =0; $x<count($rel_data); $x++){
                $this->db->insert('tblpaecotourism',$data[$x]);
                // $this->db->where('status !=',null);
            }
            return "success";
        }catch(Exception $e){
            return "failed";
        }
    }

    public function createImageeco($data = [])
    {
        return $this->db->insert($this->table11,$data);

    }

    public function createImageAgro($data = [])
    {
        return $this->db->insert($this->Agro,$data);

    }

    public function uploadsaveTopo($data = [])
    {
        return $this->db->insert('tblpatopology',$data);
    }

    public function uploadUpdateTopo($data = [])
    {
        $this->db->where('id_topo',$data['id_topo'])
            ->update('tblpatopology',$data);
    }

    public function uploadsaveSoil($data = [])
    {
        return $this->db->insert('tblpageology',$data);
    }

    public function uploadUpdateSoil($data = [])
    {
        $this->db->where('id_geology',$data['id_geology'])
            ->update('tblpageology',$data);
    }

    public function uploadsaveRock($data = [])
    {
        return $this->db->insert('tblparock',$data);
    }

    public function uploadUpdateRock($data = [])
    {
        $this->db->where('id_rock',$data['id_rock'])
            ->update('tblparock',$data);
    }

    public function uploadsaveClimate($data = [])
    {
        return $this->db->insert('tblpaclimate',$data);
    }

    public function uploadUpdateClimate($data = [])
    {
        $this->db->where('id_climate',$data['id_climate'])
            ->update('tblpaclimate',$data);
    }

    public function uploadsaveHydro($data = [])
    {
        return $this->db->insert('tblpahydrology',$data);
    }

    public function uploadUpdateHydro($data = [])
    {
        $this->db->where('id_hydrology',$data['id_hydrology'])
            ->update('tblpahydrology',$data);
    }

    public function uploadsaveLanduse($data = [])
    {
        return $this->db->insert('tblpalanduse',$data);
    }

    public function uploadUpdateLanduse($data = [])
    {
        $this->db->where('id_landuse',$data['id_landuse'])
            ->update('tblpalanduse',$data);
    }

    public function uploadsaveVegetative($data = [])
    {
        return $this->db->insert('tblpavegetative',$data);
    }

    public function uploadUpdateVegetative($data = [])
    {
        $this->db->where('id_vegetative',$data['id_vegetative'])
            ->update('tblpavegetative',$data);
    }

    public function uploadsavelandslide($data = [])
    {
        return $this->db->insert('tblpahazardlandslide',$data);
    }

    public function uploadUpdatelandslide($data = [])
    {
        $this->db->where('id_landslide',$data['id_landslide'])
            ->update('tblpahazardlandslide',$data);
    }

    public function uploadsavelandslide_shpfile($data = [])
    {
        return $this->db->insert('tblpahazardlandslide_shpfile',$data);
    }

    public function uploadUpdatelandslide_shpfile($data = [])
    {
        $this->db->where('id_landslide_shpfile',$data['id_landslide_shpfile'])
            ->update('tblpahazardlandslide_shpfile',$data);
    }

    public function uploadsaveforestform_shpfile($data = [])
    {
        return $this->db->insert('tblpaforestformation_shpfile',$data);
    }

    public function uploadUpdateforestform_shpfile($data,$id)
    {
        $this->db->where('id_forestform_shpfile',$id)
            ->update('tblpaforestformation_shpfile',$data);
    }

    public function uploadsavepamaps_shpfile($data = [])
    {
        return $this->db->insert('tblpamain_shapfile',$data);
    }

    public function uploadUpdatepamaps_shpfile($data,$id)
    {
        $this->db->where('id_pamain_shpfile',$id)
            ->update('tblpamain_shapfile',$data);
    }

    public function uploadsaveclimate_shpfile($data = [])
    {
        return $this->db->insert('tblpaclimate_shpfile',$data);
    }

    public function uploadUpdateclimate_shpfile($data = [])
    {
        $this->db->where('id_climate_shpfile',$data['id_climate_shpfile'])
            ->update('tblpaclimate_shpfile',$data);
    }

    public function uploadsavemgmtzone_shpfile($data = [])
    {
        return $this->db->insert('tblpamanagementzone_shpfile',$data);
    }

    public function uploadUpdatemgmtzone_shpfile($data = [])
    {
        $this->db->where('id_mgmtzone_shpfile',$data['id_mgmtzone_shpfile'])
            ->update('tblpamanagementzone_shpfile',$data);
    }

    public function uploadsaveattractions_shpfile($data = [])
    {
        return $this->db->insert('tblpaattraction_shpfile',$data);
    }

    public function uploadUpdateattractions_shpfile($data = [])
    {
        $this->db->where('id_attaction_shpfile',$data['id_attaction_shpfile'])
            ->update('tblpaattraction_shpfile',$data);
    }

    public function uploadsavefacility_shpfile($data = [])
    {
        return $this->db->insert('tblpafacility_shpfile',$data);
    }

    public function uploadUpdatefacility_shpfile($data = [])
    {
        $this->db->where('id_facility_shpfile',$data['id_facility_shpfile'])
            ->update('tblpafacility_shpfile',$data);
    }

    public function uploadsavevegetative_shpfile($data = [])
    {
        return $this->db->insert('tblpavegetative_shpfile',$data);
    }

    public function uploadUpdatevegetative_shpfile($data = [])
    {
        $this->db->where('id_vegetative_shpfile',$data['id_vegetative_shpfile'])
            ->update('tblpavegetative_shpfile',$data);
    }

    public function uploadsaveflooding_shpfile($data = [])
    {
        return $this->db->insert('tblpahazardflooding_shpfile',$data);
    }

    public function uploadUpdateflooding_shpfile($data = [])
    {
        $this->db->where('id_flooding_shpfile',$data['id_flooding_shpfile'])
            ->update('tblpahazardflooding_shpfile',$data);
    }

    public function uploadsaveflooding($data = [])
    {
        return $this->db->insert('tblpahazardflooding',$data);
    }

    public function uploadUpdateflooding($data = [])
    {
        $this->db->where('id_flooding',$data['id_flooding'])
            ->update('tblpahazardflooding',$data);
    }

    public function uploadsaveforestform($data = [])
    {
        return $this->db->insert('tblpaforestformation',$data);
    }

    public function uploadUpdateforestform($data = [])
    {
        $this->db->where('id_forestform',$data['id_forestform'])
            ->update('tblpaforestformation',$data);
    }

    public function uploadsavecave($data = [])
    {
        return $this->db->insert('tblpacavemap',$data);
    }

    public function uploadUpdatecave($data = [])
    {
        $this->db->where('id_cavemap',$data['id_cavemap'])
            ->update('tblpacavemap',$data);
    }

    public function uploadsavethreatmap($data = [])
    {
        return $this->db->insert('tblpatreatmap',$data);
    }

    public function uploadUpdatethreatmap($data = [])
    {
        $this->db->where('id_threatmap',$data['id_threatmap'])
            ->update('tblpatreatmap',$data);
    }

    public function uploadsavecoral($data = [])
    {
        return $this->db->insert('tblpacoastalcoralmap',$data);
    }

    public function uploadUpdatecoral($data = [])
    {
        $this->db->where('id_coralmap',$data['id_coralmap'])
            ->update('tblpacoastalcoralmap',$data);
    }

    public function uploadsaveseagrass($data = [])
    {
        return $this->db->insert('tblpacoastalseagrassmap',$data);
    }

    public function uploadUpdateseagrass($data = [])
    {
        $this->db->where('id_seagrassmap',$data['id_seagrassmap'])
            ->update('tblpacoastalseagrassmap',$data);
    }

    public function uploadsavemngmtzone($data = [])
    {
        return $this->db->insert('tblpamanagementzone',$data);
    }

    public function uploadUpdatemngmtzone($data = [])
    {
        $this->db->where('id_management',$data['id_management'])
            ->update('tblpamanagementzone',$data);
    }

    public function uploadsaveattraction($data = [])
    {
        return $this->db->insert('tblpaattraction_map',$data);
    }

    public function uploadUpdateattraction($data = [])
    {
        $this->db->where('id_attraction_map',$data['id_attraction_map'])
            ->update('tblpaattraction_map',$data);
    }

    public function uploadsavefacility($data = [])
    {
        return $this->db->insert('tblpafacility_map',$data);
    }

    public function uploadUpdatefacility($data = [])
    {
        $this->db->where('id_facilitymap',$data['id_facilitymap'])
            ->update('tblpafacility_map',$data);
    }

    public function uploadsaveecotourism($data = [])
    {
        return $this->db->insert('tblpaecotourism_map',$data);
    }

    public function uploadUpdateecotourism($data = [])
    {
        $this->db->where('id_ecotourismmap',$data['id_ecotourismmap'])
            ->update('tblpaecotourism_map',$data);
    }

    public function uploadsavemangrove($data = [])
    {
        return $this->db->insert('tblpacoastalmangrovemap',$data);
    }

    public function uploadUpdatemangrove($data = [])
    {
        $this->db->where('id_mangrove_map',$data['id_mangrove_map'])
            ->update('tblpacoastalmangrovemap',$data);
    }

    public function uploadsaveiw($data = [])
    {
        return $this->db->insert('tblpainlandwetland_map',$data);
    }

    public function uploadUpdateiw($data = [])
    {
        $this->db->where('iw_id',$data['iw_id'])
            ->update('tblpainlandwetland_map',$data);
    }

    public function uploadsavehiw($data = [])
    {
        return $this->db->insert('tblpahumanwetland_map',$data);
    }

    public function uploadUpdatehiw($data = [])
    {
        $this->db->where('hiw_id',$data['hiw_id'])
            ->update('tblpahumanwetland_map',$data);
    }

    public function uploadsavepa($data = [])
    {
        return $this->db->insert('tblpamain_img',$data);
    }

    public function uploadUpdatepa($data = [])
    {
        $this->db->where('id_pa_image',$data['id_pa_image'])
            ->update('tblpamain_img',$data);
    }

    public function createAttr($data = [])
    {
        return $this->db->insert($this->table12,$data);

    }

    public function createFacility($data = [])
    {
        return $this->db->insert($this->table13,$data);

    }

    public function createmgntimage($data = [])
    {
        return $this->db->insert('tblpamanagementzone',$data);

    }

    public function updatemgntimage($data = [])
    {
        return $this->db->where('id_management',$data['id_management'])
        ->update('tblpamanagementzone',$data);
    }

    public function getAllImageeco($codegens){

        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get($this->table11);
        return $query->result();
    }

    public function getAllImageproducts($codegens){

        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaproducts');
        return $query->result();
    }

    public function getAllImageenterprise($codegens){

        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaenterprise');
        return $query->result();
    }

    public function getAllImageAgro($codegens){

        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get($this->Agro);
        return $query->result();
    }


    public function getAllImageAttr($codegens){
        $this->db->join('tblpaecotourism_activities','tblpaattraction.eco_activity = tblpaecotourism_activities.id_ecotourism_activities','LEFT');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get($this->table12);
        return $query->result();
    }

    public function getAllMultiImageAttr_1($code){
        $this->db->where('activty_code',1);
        $this->db->where('ecogeneratedcode',$code);
        $query = $this->db->get('tblpaattraction_activity_img');
        return $query->result();
    }

    public function getAllMultiImageAttrFacility($code){
        $this->db->where('facilitycode',$code);
        $query = $this->db->get('tblpafacility_activity_img');
        return $query->result();
    }

    public function getAllMultiImageAttr_2($code){
        $this->db->where('activty_code',2);
        $this->db->where('ecogeneratedcode',$code);
        $query = $this->db->get('tblpaattraction_activity_img');
        return $query->result();
    }

    public function getAllMultiImageAttr_3($code){
        $this->db->where('activty_code',3);
        $this->db->where('ecogeneratedcode',$code);
        $query = $this->db->get('tblpaattraction_activity_img');
        return $query->result();
    }

    public function getAllMultiImageAttr_4($code){
        $this->db->where('activty_code',4);
        $this->db->where('ecogeneratedcode',$code);
        $query = $this->db->get('tblpaattraction_activity_img');
        return $query->result();
    }

    public function getAllMultiImageAttr_5($code){
        $this->db->where('activty_code',5);
        $this->db->where('ecogeneratedcode',$code);
        $query = $this->db->get('tblpaattraction_activity_img');
        return $query->result();
    }

    public function getAllMultiImageAttr_6($code){
        $this->db->where('activty_code',6);
        $this->db->where('ecogeneratedcode',$code);
        $query = $this->db->get('tblpaattraction_activity_img');
        return $query->result();
    }

    public function getAllMultiImageAttr_7($code){
        $this->db->where('activty_code',7);
        $this->db->where('ecogeneratedcode',$code);
        $query = $this->db->get('tblpaattraction_activity_img');
        return $query->result();
    }

    public function getAllMultiImageAttr_8($code){
        $this->db->where('activty_code',8);
        $this->db->where('ecogeneratedcode',$code);
        $query = $this->db->get('tblpaattraction_activity_img');
        return $query->result();
    }

    public function getAllMultiImageAttr_9($code){
        $this->db->where('activty_code',9);
        $this->db->where('ecogeneratedcode',$code);
        $query = $this->db->get('tblpaattraction_activity_img');
        return $query->result();
    }

    public function getAllMultiImageAttr_10($code){
        $this->db->where('activty_code',10);
        $this->db->where('ecogeneratedcode',$code);
        $query = $this->db->get('tblpaattraction_activity_img');
        return $query->result();
    }

    public function getAllMultiImageAttr_11($code){
        $this->db->where('activty_code',11);
        $this->db->where('ecogeneratedcode',$code);
        $query = $this->db->get('tblpaattraction_activity_img');
        return $query->result();
    }

    public function getAllMultiImageAttr_12($code){
        $this->db->where('activty_code',12);
        $this->db->where('ecogeneratedcode',$code);
        $query = $this->db->get('tblpaattraction_activity_img');
        return $query->result();
    }

    public function getAllMultiImageAttr_13($code){
        $this->db->where('activty_code',13);
        $this->db->where('ecogeneratedcode',$code);
        $query = $this->db->get('tblpaattraction_activity_img');
        return $query->result();
    }

    public function getAllMultiImageAttr_14($code){
        $this->db->where('activty_code',14);
        $this->db->where('ecogeneratedcode',$code);
        $query = $this->db->get('tblpaattraction_activity_img');
        return $query->result();
    }

    public function getAllMultiImageAttr_15($code){
        $this->db->where('activty_code',15);
        $this->db->where('ecogeneratedcode',$code);
        $query = $this->db->get('tblpaattraction_activity_img');
        return $query->result();
    }

    public function getAllPAMBFile($codegens){

        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get($this->pambfile);
        return $query->result();
    }

    public function getAllEcotourism($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_ecourism.id_demographic = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->join('tblsex','tblseamsdemographic.seams_sex_head = tblsex.id','LEFT');
        $this->db->join('tblseams_sourceincome_ecourism_sub_transportation','tblseamsdemographic.id_seams_demo = tblseams_sourceincome_ecourism_sub_transportation.id_si_ecotour','LEFT');
        $this->db->where('tblseams_sourceincome_ecourism.generatedcode',$codegens);
        $this->db->group_by('id_demographic');
        $query = $this->db->get('tblseams_sourceincome_ecourism');
        return $query->result();
    }

    public function getallCEPAActivityReportFetch($codegens){
        $this->db->join('tbldateyear','tblpamaincepa_activity_details.activity_year = tbldateyear.id_year','LEFT');
        $this->db->join('tblpamaincepa_activity_audience','tblpamaincepa_activity_details.activity_audience_type = tblpamaincepa_activity_audience.id_cepa_audience ','LEFT');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpamaincepa_activity_details');
        return $query->result();
    }


    public function get_income_other($id){
        $date = new DateTime("now");
        $curr_year = $date->format('Y');
        $curr_month = $date->format('F');

         $this->db->select('*');
        $this->db->from('tblpaipafincomeothers');
        $this->db->where('id_fromincome',$id);
        $this->db->where('income_year',$curr_year);
        $this->db->where('income_month',$curr_month);
        $res = $this->db->get();
        return $res->result();
    }

    public function getbdfe_tech_assistance($bdfecode){
        $this->db->select('*');
        $this->db->from('tblpalivelihood_enhancement_tehass');
        $this->db->where('bdfe_codegen',$bdfecode);
        $res = $this->db->get();
        return $res->result();
    }

    public function getbdfe_type_assistance($bdfecode){
        $this->db->select('*');
        $this->db->from('tblpalivelihood_type_tehass');
        $this->db->where('bdfe_codegen',$bdfecode);
        $res = $this->db->get();
        return $res->result();
    }

    public function get_subcontrisplit($id){
        $date = new DateTime("now");
        $curr_year = $date->format('Y');
        $curr_month = $date->format('F');

        $this->db->join('tblfinancialassistance','tblpaipafcontrisub.trustfund = tblfinancialassistance.id_financial','LEFT');
        $this->db->join('tblfinancialassistancesub','tblpaipafcontrisub.mode_payment = tblfinancialassistancesub.id_finance_sub','LEFT');

        $this->db->from('tblpaipafcontrisub');
        $this->db->where('id_fromincome',$id);
        $this->db->where('year_contri',$curr_year);
        $this->db->where('month_contri',$curr_month);
        $res = $this->db->get();
        return $res->result();

    }

    public function getsearch_contriedit($id,$year,$month){
        $this->db->join('tblfinancialassistance','tblpaipafcontrisub.trustfund = tblfinancialassistance.id_financial','LEFT');
        $this->db->join('tblfinancialassistancesub','tblpaipafcontrisub.mode_payment = tblfinancialassistancesub.id_finance_sub','LEFT');
        $this->db->from('tblpaipafcontrisub');
        $this->db->where('id_fromincome',$id);
        $this->db->where('year_contri',$year);
        $this->db->where('month_contri',$month);
        $res = $this->db->get();
        return $res->result();

    }

    public function get_subcontri($id){
        $date = new DateTime("now");
        $curr_year = $date->format('Y');
        $curr_month = $date->format('F');

        // $this->db->select('group_concat(DISTINCT(tblpaipafcontrisub.contri_amount) separator "<br> ") as amounts,id_fromincome,year_contri');
        $this->db->select('group_concat(tblfinancialassistance.finance_desc separator "<br>") as finance,
                           group_concat(tblfinancialassistancesub.description separator "<br> ") as mode,
                           group_concat(tblpaipafcontrisub.contri_amount separator "<br>") as amounts,id_fromincome,year_contri,month_contri,id_contrisub,finance_desc,description,contri_amount,contri_remarks');

        $this->db->join('tblfinancialassistance','tblpaipafcontrisub.trustfund = tblfinancialassistance.id_financial','LEFT');
        $this->db->join('tblfinancialassistancesub','tblpaipafcontrisub.mode_payment = tblfinancialassistancesub.id_finance_sub','LEFT');

        $this->db->from('tblpaipafcontrisub');
        $this->db->where('id_fromincome',$id);
        $this->db->where('year_contri',$curr_year);
        $this->db->where('month_contri',$curr_month);
        $res = $this->db->get();
        return $res->result();

    }

    public function getsearch_subcontri($id,$year,$month){

        // $this->db->select('group_concat(DISTINCT(tblpaipafcontrisub.contri_amount) separator "<br> ") as amounts,id_fromincome,year_contri');
        $this->db->select('group_concat(tblfinancialassistance.finance_desc separator "<br> ") as finance,
                           group_concat(tblfinancialassistancesub.description separator "<br> ") as mode,
                           group_concat(tblpaipafcontrisub.contri_amount separator "<br> ") as amounts,id_fromincome,year_contri,month_contri,id_contrisub,finance_desc,description,contri_amount,contri_remarks');

        $this->db->join('tblfinancialassistance','tblpaipafcontrisub.trustfund = tblfinancialassistance.id_financial','LEFT');
        $this->db->join('tblfinancialassistancesub','tblpaipafcontrisub.mode_payment = tblfinancialassistancesub.id_finance_sub','LEFT');

        $this->db->from('tblpaipafcontrisub');
        $this->db->where('id_fromincome',$id);
        $this->db->where('year_contri',$year);
        $this->db->where('month_contri',$month);
        $res = $this->db->get();
        return $res->result();

    }

    public function numrows_subcontri($id,$year,$month){

        // $this->db->select('group_concat(DISTINCT(tblpaipafcontrisub.contri_amount) separator "<br> ") as amounts,id_fromincome,year_contri');
        $this->db->select('group_concat(tblfinancialassistance.finance_desc separator "<br> ") as finance,
                           group_concat(tblfinancialassistancesub.description separator "<br> ") as mode,
                           group_concat(tblpaipafcontrisub.contri_amount separator "<br> ") as amounts,id_fromincome,year_contri,month_contri,id_contrisub,finance_desc,description,contri_amount,contri_remarks');

        $this->db->join('tblfinancialassistance','tblpaipafcontrisub.trustfund = tblfinancialassistance.id_financial','LEFT');
        $this->db->join('tblfinancialassistancesub','tblpaipafcontrisub.mode_payment = tblfinancialassistancesub.id_finance_sub','LEFT');

        $this->db->from('tblpaipafcontrisub');
        $this->db->where('id_fromincome',$id);
        $this->db->where('year_contri',$year);
        $this->db->where('month_contri',$month);
        $res = $this->db->get();
        return $res->num_rows();

    }


    public function get_devtfee($id){
        $date = new DateTime("now");
        $curr_year = $date->format('Y');
        $curr_month = $date->format('F');

        $this->db->select('group_concat(dev_remarks separator "<br> ") as remark,
                           group_concat(devfee_amount separator "<br> ") as amounts,id_fromincome,dev_year,dev_month,id_devfees,devfee_amount,dev_remarks,
                           group_concat(dev_remarks ,"- ", devfee_amount separator "<br>") as dconamount,SUM(devfee_amount) as sumdevamount');
        $this->db->from('tblpaipafdevfee');
        $this->db->where('id_fromincome',$id);
        $this->db->where('dev_year',$curr_year);
        $this->db->where('dev_month',$curr_month);
        $res = $this->db->get();
        return $res->result();
    }

    public function get_devtfeeedit($id){
        $date = new DateTime("now");
        $curr_year = $date->format('Y');
        $curr_month = $date->format('F');

        $this->db->select('*');
        $this->db->from('tblpaipafdevfee');
        $this->db->where('id_fromincome',$id);
        $this->db->where('dev_year',$curr_year);
        $this->db->where('dev_month',$curr_month);
        $res = $this->db->get();
        return $res->result();
    }

    public function getsearch_devfeeedit($id,$year,$month){
        $this->db->from('tblpaipafdevfee');
        $this->db->where('id_fromincome',$id);
        $this->db->where('dev_year',$year);
        $this->db->where('dev_month',$month);
        $res = $this->db->get();
        return $res->result();

    }

    public function getsearch_devtfee($id,$year,$month){

        $this->db->select('group_concat(dev_remarks separator "<br> ") as remark,
                           group_concat(devfee_amount separator "<br> ") as amounts,id_fromincome,dev_year,dev_month,id_devfees,devfee_amount,dev_remarks,
                           group_concat(dev_remarks ,"- ", devfee_amount separator "<br>") as dconamount,SUM(devfee_amount) as sumdev');
        $this->db->from('tblpaipafdevfee');
        $this->db->where('id_fromincome',$id);
        $this->db->where('dev_year',$year);
        $this->db->where('dev_month',$month);
        $res = $this->db->get();
        return $res->result();

    }

    public function get_fines($id){
        $date = new DateTime("now");
        $curr_year = $date->format('Y');
        $curr_month = $date->format('F');

        $this->db->select('group_concat(penalty_remarks ,"- ", penalty_amount separator "<br>") as pconamount,penalty_month,id_penalty,penalty_amount,penalty_remarks,id_fromincome');
        $this->db->from('tblpaipafpenalty');
        $this->db->where('id_fromincome',$id);
        $this->db->where('penalty_year',$curr_year);
        $this->db->where('penalty_month',$curr_month);
        $res = $this->db->get();
        return $res->result();

    }

    public function get_finesedit($id){
        $date = new DateTime("now");
        $curr_year = $date->format('Y');
        $curr_month = $date->format('F');

        // $this->db->select('group_concat(penalty_remarks ,"- ", penalty_amount separator "<br>") as pconamount,penalty_month,id_penalty,penalty_amount,penalty_remarks,id_fromincome');
        $this->db->from('tblpaipafpenalty');
        $this->db->where('id_fromincome',$id);
        $this->db->where('penalty_year',$curr_year);
        $this->db->where('penalty_month',$curr_month);
        $res = $this->db->get();
        return $res->result();
    }

    public function getsearch_finesedit($id,$year,$month){
        $this->db->from('tblpaipafpenalty');
        $this->db->where('id_fromincome',$id);
        $this->db->where('penalty_year',$year);
        $this->db->where('penalty_month',$month);
        $res = $this->db->get();
        return $res->result();

    }

    public function getsearch_fines($id,$year,$month){
        $this->db->select('group_concat(penalty_remarks ,"- ", penalty_amount separator "<br>") as pconamount,penalty_month,id_penalty,penalty_amount,penalty_remarks,id_fromincome');
        $this->db->from('tblpaipafpenalty');
        $this->db->where('id_fromincome',$id);
        $this->db->where('penalty_year',$year);
        $this->db->where('penalty_month',$month);
        $res = $this->db->get();
        return $res->result();

    }

    public function getsearch_disbursement($id,$year,$month){
        $this->db->from('tblpaipafdisbursement');
        $this->db->where('id_fromincome',$id);
        $this->db->where('disbursement_year',$year);
        $this->db->where('disbursement_month',$month);
        $res = $this->db->get();
        return $res->result();

    }

    public function search_income_other($id,$month,$year){
        $this->db->select('*');
        $this->db->from('tblpaipafincomeothers');
        $this->db->where('income_month',$month);
        $this->db->where('income_year',$year);
        $this->db->where('id_fromincome',$id);
        $res = $this->db->get();
        return $res->result();
    }

    public function get_ecotourism_transportation_info($id){
        $this->db->select('*');
        $this->db->from('tblseams_sourceincome_ecourism_sub_transportation');
        $this->db->where('id_si_ecotour',$id);
        $res = $this->db->get();
        return $res->result();
    }

    public function get_cepa_activity_img($cepacode){
        $this->db->from('tblpamaincepa_activity_img');
        $this->db->where('cepacode',$cepacode);
        $res = $this->db->get();
        return $res->result();
    }

    public function get_cepa_print($cepacode){
        $this->db->select('group_concat(cepa_print_details separator ", ") as print,print_name_others,print_name')
        ->join('tblpamaincepa_print_list','tblpamaincepa_print_materials.print_name = tblpamaincepa_print_list.id_cepa_print','LEFT')
        ->where('cepa_code',$cepacode);
        $query = $this->db->get('tblpamaincepa_print_materials');
        return $query->result();
    }

     public function get_cepa_print_indi($cepacode){
        $this->db->join('tblpamaincepa_print_list','tblpamaincepa_print_materials.print_name = tblpamaincepa_print_list.id_cepa_print','LEFT')
        ->where('cepa_code',$cepacode);
        $query = $this->db->get('tblpamaincepa_print_materials');
        return $query->result();
    }

    public function get_cepa_multimedia($cepacode){
        $this->db->select('group_concat(cepa_multimedia_desc separator ", ") as multimedias,cepa_multimedia_others,multimedia')
        ->join('tblpamaincepa_multimedia_list','tblpamaincepa_multimedia_materials.multimedia = tblpamaincepa_multimedia_list.id_cepa_multimedia','LEFT')
        ->where('cepa_code',$cepacode);
        $query = $this->db->get('tblpamaincepa_multimedia_materials');
        return $query->result();
    }

    public function get_cepa_multimedia_indi($cepacode){
        $this->db->join('tblpamaincepa_multimedia_list','tblpamaincepa_multimedia_materials.multimedia = tblpamaincepa_multimedia_list.id_cepa_multimedia','LEFT')
        ->where('cepa_code',$cepacode);
        $query = $this->db->get('tblpamaincepa_multimedia_materials');
        return $query->result();
    }

    public function get_cepa_socialmedia($cepacode){
        $this->db->select('group_concat(cepa_multimedia_desc separator ", ") as socialmedia,other_socialmedia,multimedia')
        ->join('tblpamaincepa_multimedia_list','tblpamaincepa_socialmedia_materials.multimedia = tblpamaincepa_multimedia_list.id_cepa_multimedia','LEFT')
        ->where('cepa_code',$cepacode);
        $query = $this->db->get('tblpamaincepa_socialmedia_materials');
        return $query->result();
    }

    public function get_cepa_socialmedia_indi($cepacode){
        $this->db->join('tblpamaincepa_multimedia_list','tblpamaincepa_socialmedia_materials.multimedia = tblpamaincepa_multimedia_list.id_cepa_multimedia','LEFT')
        ->where('cepa_code',$cepacode);
        $query = $this->db->get('tblpamaincepa_socialmedia_materials');
        return $query->result();
    }

    public function get_cepa_radio($cepacode){
        $this->db->select('group_concat(cepa_multimedia_desc separator ", ") as radiostations')
        ->join('tblpamaincepa_multimedia_list','tblpamaincepa_radiostation.radiostation = tblpamaincepa_multimedia_list.id_cepa_multimedia','LEFT')
        ->where('cepa_code',$cepacode);
        $query = $this->db->get('tblpamaincepa_radiostation');
        return $query->result();
    }

    public function get_cepa_radio_indi($cepacode){
        $this->db->join('tblpamaincepa_multimedia_list','tblpamaincepa_radiostation.radiostation = tblpamaincepa_multimedia_list.id_cepa_multimedia','LEFT')
        ->where('cepa_code',$cepacode);
        $query = $this->db->get('tblpamaincepa_radiostation');
        return $query->result();
    }

    public function get_cepa_souvenir($cepacode){
        $this->db->select('group_concat(cepa_souvenir_details separator ", ") as souvenir,souvenir_other,souveniritem')
        ->join('tblpamaincepa_souvenir_list','tblpamaincepa_souvenir.souveniritem = tblpamaincepa_souvenir_list.id_cepa_souvenir','LEFT')
        ->where('cepa_code',$cepacode);
        $query = $this->db->get('tblpamaincepa_souvenir');
        return $query->result();
    }

    public function get_cepa_souvenir_indi($cepacode){
        $this->db->join('tblpamaincepa_souvenir_list','tblpamaincepa_souvenir.souveniritem = tblpamaincepa_souvenir_list.id_cepa_souvenir','LEFT')
        ->where('cepa_code',$cepacode);
        $query = $this->db->get('tblpamaincepa_souvenir');
        return $query->result();
    }

    public function get_ecotourism_otherRev($id){
        $this->db->select('*');
        $this->db->from('tblseams_sourceincome_ecourism_sub_transportation_others');
        $this->db->where('id_si_ecotour',$id);
        $res = $this->db->get();
        return $res->result();
    }

    public function get_threat_multiimages($code){
        $this->db->where('threat_gencode',$code);
        $query = $this->db->get('tblpathreat_multi_img');
        return $query->result();
    }

    public function getAllPAs($user_id){
        $this->db->select('tblpamain.*,tblpacategory.*,tblnip.*,tblpacareadesc.*,tblpamain_img.*, tblpamain.generatedcode as gencod');
        $this->db->join('tblpacategory','tblpamain.pacategory_id = tblpacategory.id_cat','LEFT');
        $this->db->join('tblnip','tblpamain.nip_id = tblnip.id_nip','LEFT');
        $this->db->join('tblpacareadesc','tblpamain.cpabi_id = tblpacareadesc.id_pac','LEFT');
        $this->db->join('tblpamain_img','tblpamain.generatedcode = tblpamain_img.generatedcode','LEFT');
        $this->db->where('pasu_id',$user_id);
        $this->db->group_by('tblpamain.generatedcode');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function getAllStrict($codegens){

        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get($this->tablestrict);
        return $query->result();
    }

    public function getallmultiimgfacility($code)
    {
        $this->db->where('facilitycode',$code);
        $query = $this->db->get('tblpafacility_activity_img');
        return $query->result();
    }

    public function getAllImageFacility($codegens){
        $this->db->join('tblpafacility_condition','tblpafacility.facility_condition = tblpafacility_condition.id_fcondition ','LEFT');
        $this->db->join('tblpafacility_list','tblpafacility.title_facility = tblpafacility_list.id_facilities ','LEFT');
        $this->db->join('tbldatemonth','tblpafacility.facility_date_month = tbldatemonth.id_month','LEFT');
        $this->db->join('tbldateyear','tblpafacility.facility_date_year = tbldateyear.id_year','LEFT');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get($this->table13);
        return $query->result();
    }

    public function getAllStrictzone($codegens){

        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get($this->tablestrict);
        return $query->result();
    }

     public function getAllMultiple($codegens){

        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get($this->tablemultiple);
        return $query->result();
    }

    public function getalleventlists($code){

        $this->db->where('generatedcode',$code);
        // $query = $this->db->get('tblpamainevent');
        // return $query->result();
        // $this->db->order_by('id');
        return $this->db->get('tblpamainevent');
    }

    public function getAllmultipleusezoneTotal($codegens){
        $this->db->select('SUM(area) as total_area');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpamultiplezone');
        return $query->result();
    }

    public function getAllstrictprotzoneTotal($codegens){
        $this->db->select('SUM(s_area) as total_area');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblstrictprotzone');
        return $query->result();
    }

    public function save_project($rel_data5){

        for($x = 0; $x < count($rel_data5); $x++){
            $data[] = array(
                "generatedcode" => $rel_data5[$x]["codegen"],
                "project_name" => $rel_data5[$x]["project_name"],
                "date_start" => $rel_data5[$x]['date_start'],
                "date_end" => $rel_data5[$x]['date_end'],
                "source_fund" => $rel_data5[$x]['source_fund'],
                "amount" => $rel_data5[$x]['amount'],
                "implementor" => $rel_data5[$x]['implementor'],
                "remarks" => $rel_data5[$x]['remarks'],
            );
        }

        try{
            for($x =0; $x<count($rel_data5); $x++){
                $this->db->insert('tblpamainproject',$data[$x]);
                // $this->db->where('status',null);
            }
            return "success";
        }catch(Exception $e){
            return "failed";
        }


        // return $this->db->insert($this->table2,$data);
    }

    public function getAllproject($codegens)
    {
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblmainprojects');
        return $query->result();
    }

    public function countnoofProjects($id){
        $this->db->where('id_program',$id);
        $query = $this->db->get("tblmainprojects");
        return $query->num_rows();
    }

    public function countnoofResearch($id){
        $this->db->where('id_program',$id);
        $query = $this->db->get("tblmainresearch");
        return $query->num_rows();
    }

    public function countnoofActivity($id){
        $this->db->where('id_program',$id);
        $query = $this->db->get("tblmainprogram_activity");
        return $query->num_rows();
    }

    public function getAllprograms($codegens)
    {
        $this->db->join('tblpaprogram_agency','tblmainprogram.program_sector=tblpaprogram_agency.id_sector','LEFT');
        $this->db->join('tblpaprogram_agency_program','tblmainprogram.sector_program_id=tblpaprogram_agency_program.id_agencyprog','LEFT');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblmainprogram');
        return $query->result();
    }

    public function getAllproj($ids)
    {
        $this->db->join('tblpaprogram_agency','tblmainprojects.proj_sector_id=tblpaprogram_agency.id_sector','LEFT');
        $this->db->join('tblmainprojects_projectlist','tblmainprojects.proj_list_id=tblmainprojects_projectlist.id_projectlist','LEFT');
        $this->db->join('tblprogram_typepayment','tblmainprojects.proj_typeofpayment=tblprogram_typepayment.id_progpayment','LEFT');
        $this->db->join('tblprogram_typefund','tblmainprojects.proj_typefund=tblprogram_typefund.id_prog_typefund','LEFT');
        $this->db->join('tblprogram_sourcefund','tblmainprojects.source_fund=tblprogram_sourcefund.id_prog_fund','LEFT');
        $this->db->join('tbl_listofcurrencies','tblmainprojects.proj_currency=tbl_listofcurrencies.currency_id','LEFT');
        $this->db->where('id_program',$ids);
        $query = $this->db->get('tblmainprojects');
        return $query->result();
    }

    public function getAllprojNotProgram($codegens)
    {
        $this->db->join('tblpaprogram_agency','tblmainprojects.proj_sector_id=tblpaprogram_agency.id_sector','LEFT');
        $this->db->join('tblmainprojects_projectlist','tblmainprojects.proj_list_id=tblmainprojects_projectlist.id_projectlist','LEFT');
        $this->db->join('tblprogram_typepayment','tblmainprojects.proj_typeofpayment=tblprogram_typepayment.id_progpayment','LEFT');
        $this->db->join('tblprogram_typefund','tblmainprojects.proj_typefund=tblprogram_typefund.id_prog_typefund','LEFT');
        $this->db->join('tblprogram_sourcefund','tblmainprojects.source_fund=tblprogram_sourcefund.id_prog_fund','LEFT');
        $this->db->join('tbl_listofcurrencies','tblmainprojects.proj_currency=tbl_listofcurrencies.currency_id','LEFT');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblmainprojects');
        return $query->result();
    }

    public function getcountreportsProgram($code2)
    {
        $this->db->where('proj_code',$code2);
        $query = $this->db->get('tblmainprojects_files');
        return $query->num_rows();
    }

    public function getAllprogactivity($ids)
    {
        $this->db->where('id_program',$ids);
        $query = $this->db->get('tblmainprogram_activity');
        return $query->result();
    }

    public function getAllsearch($ids)
    {
        $this->db->where('id_program',$ids);
        $query = $this->db->get('tblmainresearch');
        return $query->result();
    }

    public function getAllResearch($codegens)
    {
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblmainresearch');
        return $query->result();
    }

    public function getAllResearchReference($code2)
    {
        $this->db->join('tbldatemonth','tblpareference.ref_date_month=tbldatemonth.id_month','LEFT');
        $this->db->join('tbldateyear','tblpareference.ref_date_year=tbldateyear.id_year','LEFT');
        $this->db->join('tblpareference_type','tblpareference.type_citation=tblpareference_type.id_type_reference','LEFT');
        $this->db->where('research_code',$code2);
        $query = $this->db->get('tblpareference');
        return $query->result();
    }

    // public function getAllResearchReferenceProgram($code2,$id)
    // {
    //     $this->db->where('research_code',$code2);
    //     $this->db->where('id_program',$id);
    //     $query = $this->db->get('tblpareference');
    //     return $query->result();
    // }

    public function getAllResearchReferenceProgram($codes,$id)
    {
        $this->db->join('tbldatemonth','tblpareference.ref_date_month=tbldatemonth.id_month','LEFT');
        $this->db->join('tbldateyear','tblpareference.ref_date_year=tbldateyear.id_year','LEFT');
        $this->db->join('tblpareference_type','tblpareference.type_citation=tblpareference_type.id_type_reference','LEFT');
        $this->db->where('research_code',$codes);
        $this->db->where('id_program',$id);
        $query = $this->db->get('tblpareference');
        return $query->result();
    }

    public function tribelist()
    {

        $result = $this->db->select("*")
            ->from('tblsrpaotribe')
            ->order_by('tribe_name','ASC')
            ->get()
            ->result();

            $list[''] = "Select ICCs/IPs";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_tribe] = $value->tribe_name;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function triberelation()
    {

        $result = $this->db->select("*")
            ->from('tblsrpaorelationship')
            ->get()
            ->result();

            $list[''] = "SELECT RELATIONSHIP";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id_relation] = $value->reladesc;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function save_tribes($rel_data6){

        for($x = 0; $x < count($rel_data6); $x++){
            $data[] = array(
                "generatedcode"         => $rel_data6[$x]['codegen'],
                "tribe_housetag"        => $rel_data6[$x]['tribe_housetag'],
                "tribe_fname"           => $rel_data6[$x]['tribe_fname'],
                "tribe_mname"           => $rel_data6[$x]['tribe_mname'],
                "tribe_lname"           => $rel_data6[$x]['tribe_lname'],
                "tribe"                 => $rel_data6[$x]['tribe'],
                "tribe_month"           => $rel_data6[$x]['tribe_month'],
                "tribe_day"             => $rel_data6[$x]['tribe_day'],
                "tribe_year"            => $rel_data6[$x]['tribe_year'],
                "tribe_relationship"    => $rel_data6[$x]['tribe_relationship'],
                "tribe_gender"          => $rel_data6[$x]['tribe_gender'],
                "tribe_marital"         => $rel_data6[$x]['tribe_marital'],
            );
        }

        try{
            for($x =0; $x<count($rel_data6); $x++){
                $this->db->insert('tblsrpaoregister',$data[$x]);
                // $this->db->where('status !=',null);
            }
            return "success";
        }catch(Exception $e){
            return "failed";
        }
    }

    public function getAlltribe($codegens){

        $this->db->join('tblsex','tblsrpaoregister.tribe_gender = tblsex.id','left');
        $this->db->join('tbldatemonth','tblsrpaoregister.tribe_month = tbldatemonth.id_month','left');
        $this->db->join('tblsrpaorelationship','tblsrpaoregister.tribe_relationship = tblsrpaorelationship.id_relation','left');
        $this->db->join('tblcvstatus','tblsrpaoregister.tribe_marital = tblcvstatus.id_marital','left');
        $this->db->join('tblsrpaotribe','tblsrpaoregister.tribe = tblsrpaotribe.id_tribe','left');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get($this->table8);
        return $query->result();
    }

    public function createImage($data = [])
    {
        return $this->db->insert($this->table9,$data);

    }

    public function createtopoImage($data = [])
    {
        return $this->db->insert($this->tabletopo,$data);

    }

    public function createsoilImage($data = [])
    {
        return $this->db->insert($this->tablesoil,$data);

    }

    public function createclimateImage($data = [])
    {
        return $this->db->insert($this->tableclimate,$data);

    }

    public function createlandslideImage($data = [])
    {
        return $this->db->insert($this->tablelandslide,$data);

    }

    public function createfloodingImage($data = [])
    {
        return $this->db->insert($this->tableflooding,$data);
    }

    public function createseaImage($data = [])
    {
        return $this->db->insert($this->tablesealevel,$data);
    }

    public function createtsunamiImage($data = [])
    {
        return $this->db->insert($this->tabletsunami,$data);
    }

    public function inseteconpdf($data = [])
    {
        return $this->db->insert($this->tableecon,$data);
    }

    public function insertresofile($data = [])
    {
        return $this->db->insert('tblpambreso',$data);
    }

    public function insertmngmtplanfile($data = [])
    {
        return $this->db->insert('tblpamanagementplan',$data);
    }

    public function insertecotourmngmtplanfile($data = [])
    {
        return $this->db->insert('tblpamanagementecotourim',$data);
    }

    public function insertwetlandmngmtplanfile($data = [])
    {
        return $this->db->insert('tblpamanagementwetland',$data);
    }

    public function insertcavemngmtplanfile($data = [])
    {
        return $this->db->insert('tblpamanagementcaves',$data);
    }

     public function insertcepamultimedia($data = [])
    {
        return $this->db->insert('tblpamaincepa_multimedia_materials',$data);
    }

     public function insertcepasocialmedia($data = [])
    {
        return $this->db->insert('tblpamaincepa_socialmedia_materials',$data);
    }

    public function insertceparadiostation($data = [])
    {
        return $this->db->insert('tblpamaincepa_radiostation',$data);
    }

    public function createPambFile($data = [])
    {
        return $this->db->insert($this->pambfile,$data);

    }

    public function createStrict($data = [])
    {
        return $this->db->insert($this->tablestrict,$data);

    }

    public function updateStrict($data = [])
    {
        $this->db->where('id',$data['id'])
        ->update($this->tablestrict,$data);
    }

    public function getAllImage($codegens){

        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get($this->table9);
        return $query->result();
    }

    public function getAllImageTopo($codegens){
        $this->db->join('tblslope_category','tblpatopology_description.slope_id= tblslope_category.id_slopecat','LEFT');

        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpatopology_description');
        return $query->result();
    }

    public function getAllImageSoil($codegens){

        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get($this->tablesoil);
        return $query->result();
    }

    public function getAllDisburReportsourceincome($codegens){
        // $this->db->join('tbldateyear','tblpaipafdisbursementfiles.income_date_year = tbldateyear.id_year','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->group_by('year_disbursement');
        $this->db->order_by('year_disbursement','ASC');
        $query = $this->db->get('tblpaipafdisbursementfiles');
        return $query->result();
    }

    public function getAllDisburReport($codegens){
        $this->db->join('tbldateyear','tblpaipafdisbursementfiles.year_disbursement = tbldateyear.id_year','LEFT');
        $this->db->where('tblpaipafdisbursementfiles.generatedcode',$codegens);
        $this->db->group_by('year_disbursement');
        $this->db->order_by('year_disbursement','DESC');
        $query = $this->db->get('tblpaipafdisbursementfiles');
        return $query->result();
    }

    public function getAllDisburReportbyYr($palist,$payear,$payearto){
        $this->db->where('generatedcode',$palist);
        $this->db->where('year_disbursement >=',$payear);
        $this->db->where('year_disbursement <=',$payearto);
        $this->db->group_by('year_disbursement');
        $this->db->order_by('year_disbursement','ASC');
        $query = $this->db->get('tblpaipafdisbursementfiles');
        return $query->result();
    }

    public function getAllDisburPDFReport($searchpa,$disburse_year,$disburse_year_to){    
        $this->db->where('generatedcode',$searchpa);
        $this->db->where('year_disbursement >=',$disburse_year);
        $this->db->where('year_disbursement <=',$disburse_year_to);
        $this->db->group_by('year_disbursement');
        $this->db->order_by('year_disbursement','ASC');
        $query = $this->db->get('tblpaipafdisbursementfiles');
        return $query->result();
    }

    public function getAllGrandTotalDisburPDFReport($searchpa,$disburse_year,$disburse_year_to){    
        $this->db->select('SUM(annual_income_old) as gtai,SUM(annual_disbursements) as gtad, SUM(annual_balances) as gtab, SUM(disbursement_old_income) as gtosi, SUM(disbursement_oldsubfund) as gtosd, SUM(balance_oldsubfund) as gtosb, SUM(income_paria) as gtpi, SUM(disbursement_paria) as gtpd,SUM(balance_paria) as gtpb, SUM(income_sagf) as gtsfi, SUM(disbursement_sagf) as gtsfd, SUM(balance_sagf) as gtsfb');
        $this->db->where('generatedcode',$searchpa);
        $this->db->where('year_disbursement >=',$disburse_year);
        $this->db->where('year_disbursement <=',$disburse_year_to);
        $query = $this->db->get('tblpaipafdisbursementfiles');
        return $query->result();
    }

    public function getAllGrandTotalDisburPDFReportform($codegens){    
        $this->db->select('SUM(annual_income_old) as gtai,SUM(annual_disbursements) as gtad, SUM(annual_balances) as gtab, SUM(disbursement_old_income) as gtosi, SUM(disbursement_oldsubfund) as gtosd, SUM(balance_oldsubfund) as gtosb, SUM(income_paria) as gtpi, SUM(disbursement_paria) as gtpd,SUM(balance_paria) as gtpb, SUM(income_sagf) as gtsfi, SUM(disbursement_sagf) as gtsfd, SUM(balance_sagf) as gtsfb');
        $this->db->where('generatedcode',$codegens);
        // $this->db->where('year_disbursement',$year);
        $query = $this->db->get('tblpaipafdisbursementfiles');
        return $query->result();
    }

    public function getTotalAnnualIncomeForDisbursementPDFReport($searchpa,$disburse_year,$disburse_year_to){
        $date = new DateTime("now");
        $now = date('Y-m-d');
        $curr_year = $date->format('Y');
        $curr_day = $date->format('D');
        $curr_month = $date->format('F');
        $this->db->select('SUM(CASE WHEN types_of_payment=1  THEN amount_payment ELSE 0 END) as efamount,
                           SUM(CASE WHEN types_of_payment=2  THEN amount_payment ELSE 0 END) as ffamount,
                           SUM(CASE WHEN types_of_payment=3  THEN amount_payment ELSE 0 END) as rfamount,
                           SUM(CASE WHEN types_of_payment=4  THEN amount_payment ELSE 0 END) as cfamount,
                           SUM(CASE WHEN types_of_payment=5  THEN amount_payment ELSE 0 END) as dfamount,
                           SUM(CASE WHEN types_of_payment=8  THEN amount_payment ELSE 0 END) as ofamount,
                           (CASE WHEN types_of_payment=6  THEN group_concat("Trust fund : ",tblfinancialassistance.finance_desc,"<br>"
                                                                   "Mode payment : ",tblfinancialassistancesub.description,"<br>",
                                                                    "Amount : ",amount_payment separator "<hr> ") ELSE group_concat("Trust fund : ",tblfinancialassistance.finance_desc,"<br>"
                                                                   "Mode payment : ",tblfinancialassistancesub.description,"<br>",
                                                                    "Amount : ",amount_payment separator "<hr> ") END) as contritext,
                            SUM(CASE WHEN types_of_payment=7  THEN amount_payment ELSE 0 END) as fpfamount,
            visitorlogs_month,visitorlogs_day,visitorlogs_year,types_of_payment,id_visitor_payment,visitors_gencode,generatedcode')
        ->join('tbldatemonth','tblpavisitorspayment.visitorlogs_month = tbldatemonth.month','LEFT')
        ->join('tblfinancialassistance','tblpavisitorspayment.trust_fund = tblfinancialassistance.id_financial','LEFT')
        ->join('tblfinancialassistancesub','tblpavisitorspayment.mode_payment = tblfinancialassistancesub.id_finance_sub','LEFT')
        ->where('generatedcode',$searchpa)
        ->where('visitorlogs_year >=', $disburse_year)
        ->where('visitorlogs_year <=', $disburse_year_to)
        ->group_by("visitorlogs_year");
        $query = $this->db->get('tblpavisitorspayment');
        return $query->result();
    }

    public function getGrandTotalSAGF($codegens){
        $this->db->select('SUM(disbursement_sagf) as gtdissagf');
        $this->db->where('generatedcode',$codegens);
        $this->db->group_by('year_disbursement');
        $query = $this->db->get('tblpaipafdisbursementfiles');
        return $query->result();
    }

    public function getGTDisburReport($codegens){
        $this->db->select('SUM(disbursement_oldsubfund) as gtoldsub,SUM(balance_oldsubfund) as gtbalanceold,year_disbursement,disbursement_oldsubfund');
        $this->db->where('generatedcode',$codegens)
        ->where('year_disbursement<=','2015');
        $query = $this->db->get('tblpaipafdisbursementfiles');
        return $query->result();
    }

    public function getGrandTotal25SAGF($codegens){
        $this->db->select('SUM(disbursement_sagf) as gtdissagf,year_disbursement');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaipafdisbursementfiles');
        return $query->result();
    }
    public function getTotalotherincomesDisbursement($codegens){
        $this->db->select('SUM(income_others_amount) as sumOtherincomes,income_other_year');
        // $this->db->join('tbldateyear','tblipafsourceincome_others.income_other_year = tbldateyear.id_year','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->group_by("income_other_year");
        $query = $this->db->get('tblipafsourceincome_others');
        return $query->result();
    }

     public function getTotalotherincomesDisbursementReport($palist,$payear,$payearto){
        $this->db->select('SUM(income_others_amount) as sumOtherincomes,income_other_year');
        $this->db->where('generatedcode',$palist);
        $this->db->where('income_other_year >=',$payear);
        $this->db->where('income_other_year <=',$payearto);
        $this->db->group_by("income_other_year");
        $query = $this->db->get('tblipafsourceincome_others');
        return $query->result();
    }

    public function getTotalsourceotherincomesDisbursement($codegens){
        $this->db->select('SUM(otherincome_other_amount) as sumOtherincomes2,otherincome_other_year');
        // $this->db->join('tbldateyear','tblipafsourceincomeother_others.otherincome_other_year = tbldateyear.id_year','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->group_by("otherincome_other_year");
        $query = $this->db->get('tblipafsourceincomeother_others');
        return $query->result();
    }

    public function getTotalsourceotherincomesDisbursementReport($palist,$payear,$payearto){        
        $this->db->select('SUM(otherincome_other_amount) as sumOtherincomes2,otherincome_other_year');
        // $this->db->join('tbldateyear','tblipafsourceincomeother_others.otherincome_other_year = tbldateyear.id_year','LEFT');
        $this->db->where('generatedcode',$palist);
        $this->db->where('otherincome_other_year >=',$payear);
        $this->db->where('otherincome_other_year <=',$payearto);
        $this->db->group_by("otherincome_other_year");
        $query = $this->db->get('tblipafsourceincomeother_others');
        return $query->result();
    }

    public function getTotalSourceIncomeForDisbursement($codegens){
        $this->db->select('SUM(entrance_fee+facility_fee+recreational_fee+resource_fee+sapa_fee+moa_fee+rsa_fee+cla_fee+fines_fee+grant_fee+endowment_fee) as sumall,income_date_year');
        // $this->db->join('tbldateyear','tblipafsourceincome.income_date_year = tbldateyear.id_year','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->group_by("income_date_year");
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    // public function getTotalSourceIncomeForDisbursementReport($palist,$payear,$payearto){
    //     $this->db->select('SUM(entrance_fee) as efamount,SUM(facility_fee) as ffamount,SUM(recreational_fee) as rfsum,SUM(resource_fee) as rffsum,SUM(sapa_fee) as SAPAsum,SUM(moa_fee) as MOAsum,SUM(rsa_fee) as RSAsum, SUM(cla_fee) as CLAsum,SUM(fines_fee) as FINEsum,SUM(grant_fee) as GRsum,sum(endowment_fee) as ENDsum,year');
    //     $this->db->join('tbldateyear','tblipafsourceincome.income_date_year = tbldateyear.id_year','LEFT');
    //     $this->db->where('generatedcode',$palist);
    //     $this->db->where('year >=',$payear);
    //     $this->db->where('year <=',$payearto);
    //     $this->db->group_by("income_date_year");
    //     $query = $this->db->get('tblipafsourceincome');
    //     return $query->result();
    // }

    public function getTotalSourceIncomeForDisbursementReport($palist,$payear,$payearto){
        $this->db->select('SUM(entrance_fee+facility_fee+recreational_fee+resource_fee+sapa_fee+moa_fee+rsa_fee+cla_fee+fines_fee+grant_fee+endowment_fee) as sumall,income_date_year');
        $this->db->where('generatedcode',$palist);
        $this->db->where('income_date_year >=',$payear);
        $this->db->where('income_date_year <=',$payearto);
        $this->db->group_by("income_date_year");
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getTotalDonationCashForDisbursement($codegens){
        $this->db->select('SUM(donation_amount) as cashSum,income_donate_year');
        // $this->db->join('tbldateyear','tblipafsourceincome_donation.income_donate_year = tbldateyear.id_year','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_donation',1);
        $this->db->group_by("income_donate_year");
        $query = $this->db->get('tblipafsourceincome_donation');
        return $query->result();
    }

    public function getrunningbalances($codegens,$year){
        // $this->db->select('SUM(donation_amount) as cashSum,income_donate_year');
        // $this->db->join('tbldateyear','tblipafsourceincome_donation.income_donate_year = tbldateyear.id_year','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('year_disbursement',$year - 1);
        $this->db->group_by("year_disbursement");
        $query = $this->db->get('tblpaipafdisbursementfiles');
        return $query->result();
    }

    public function getTotalDonationCashForDisbursementReport($palist,$payear,$payearto){     
        $this->db->select('SUM(donation_amount) as cashSum,income_donate_year');
        $this->db->where('generatedcode',$palist);
        $this->db->where('income_donate_year >=',$payear);
        $this->db->where('income_donate_year <=',$payearto);
        $this->db->where('income_donation',1);
        $this->db->group_by("income_donate_year");
        $query = $this->db->get('tblipafsourceincome_donation');
        return $query->result();
    }

    public function getgrandtotaldisbusementannual($palist,$payear,$payearto)
    {
        $this->db->select('SUM(annual_income_old) as gtai, SUM(annual_disbursements) as gtad,SUM(annual_balances) as gtab,SUM(disbursement_old_income) as gtos, SUM(disbursement_oldsubfund) as gtosd, SUM(balance_oldsubfund) as gtosb,SUM(income_paria) as gtpi, SUM(disbursement_paria) as gtpd, SUM(balance_paria) as gtpb, SUM(income_sagf) as gtsi, SUM(disbursement_sagf) as gtsd,SUM(balance_sagf) as gtsb');
        $this->db->where('generatedcode',$palist);
        $this->db->where('year_disbursement >=',$payear);
        $this->db->where('year_disbursement <=',$payearto);
        $this->db->group_by("generatedcode");
        $query = $this->db->get('tblpaipafdisbursementfiles');
        return $query->result();
    }

    public function getTotalAnnualIncomeForDisbursement($codegens){
        $date = new DateTime("now");
        $now = date('Y-m-d');
        $curr_year = $date->format('Y');
        $curr_day = $date->format('D');
        $curr_month = $date->format('F');
        $this->db->select('SUM(CASE WHEN types_of_payment=1  THEN amount_payment ELSE 0 END) as efamount,
                           SUM(CASE WHEN types_of_payment=2  THEN amount_payment ELSE 0 END) as ffamount,
                           SUM(CASE WHEN types_of_payment=3  THEN amount_payment ELSE 0 END) as rfamount,
                           SUM(CASE WHEN types_of_payment=4  THEN amount_payment ELSE 0 END) as cfamount,
                           SUM(CASE WHEN types_of_payment=5  THEN amount_payment ELSE 0 END) as dfamount,
                           SUM(CASE WHEN types_of_payment=8  THEN amount_payment ELSE 0 END) as ofamount,
                           (CASE WHEN types_of_payment=6  THEN group_concat("Trust fund : ",tblfinancialassistance.finance_desc,"<br>"
                                                                   "Mode payment : ",tblfinancialassistancesub.description,"<br>",
                                                                    "Amount : ",amount_payment separator "<hr> ") ELSE group_concat("Trust fund : ",tblfinancialassistance.finance_desc,"<br>"
                                                                   "Mode payment : ",tblfinancialassistancesub.description,"<br>",
                                                                    "Amount : ",amount_payment separator "<hr> ") END) as contritext,
                            SUM(CASE WHEN types_of_payment=7  THEN amount_payment ELSE 0 END) as fpfamount,
            visitorlogs_month,visitorlogs_day,visitorlogs_year,types_of_payment,id_visitor_payment,visitors_gencode,generatedcode')
        ->join('tbldatemonth','tblpavisitorspayment.visitorlogs_month = tbldatemonth.month','LEFT')
        ->join('tblfinancialassistance','tblpavisitorspayment.trust_fund = tblfinancialassistance.id_financial','LEFT')
        ->join('tblfinancialassistancesub','tblpavisitorspayment.mode_payment = tblfinancialassistancesub.id_finance_sub','LEFT')
        ->where('generatedcode',$codegens)
        ->group_by("visitorlogs_year");
        $query = $this->db->get('tblpavisitorspayment');
        return $query->result();
    }

    public function getGrandTotalAnnualIncomeForDisbursement($codegens){
        $date = new DateTime("now");
        $now = date('Y-m-d');
        $curr_year = $date->format('Y');
        $curr_day = $date->format('D');
        $curr_month = $date->format('F');
        $this->db->select('SUM(CASE WHEN types_of_payment=1  THEN amount_payment ELSE 0 END) as efamount,
                           SUM(CASE WHEN types_of_payment=2  THEN amount_payment ELSE 0 END) as ffamount,
                           SUM(CASE WHEN types_of_payment=3  THEN amount_payment ELSE 0 END) as rfamount,
                           SUM(CASE WHEN types_of_payment=4  THEN amount_payment ELSE 0 END) as cfamount,
                           SUM(CASE WHEN types_of_payment=5  THEN amount_payment ELSE 0 END) as dfamount,
                           SUM(CASE WHEN types_of_payment=8  THEN amount_payment ELSE 0 END) as ofamount,
                           (CASE WHEN types_of_payment=6  THEN group_concat("Trust fund : ",tblfinancialassistance.finance_desc,"<br>"
                                                                   "Mode payment : ",tblfinancialassistancesub.description,"<br>",
                                                                    "Amount : ",amount_payment separator "<hr> ") ELSE group_concat("Trust fund : ",tblfinancialassistance.finance_desc,"<br>"
                                                                   "Mode payment : ",tblfinancialassistancesub.description,"<br>",
                                                                    "Amount : ",amount_payment separator "<hr> ") END) as contritext,
                            SUM(CASE WHEN types_of_payment=7  THEN amount_payment ELSE 0 END) as fpfamount,
            visitorlogs_month,visitorlogs_day,visitorlogs_year,types_of_payment,id_visitor_payment,visitors_gencode,generatedcode')
        ->join('tbldatemonth','tblpavisitorspayment.visitorlogs_month = tbldatemonth.month','LEFT')
        ->join('tblfinancialassistance','tblpavisitorspayment.trust_fund = tblfinancialassistance.id_financial','LEFT')
        ->join('tblfinancialassistancesub','tblpavisitorspayment.mode_payment = tblfinancialassistancesub.id_finance_sub','LEFT')
        ->where('generatedcode',$codegens);
        $query = $this->db->get('tblpavisitorspayment');
        return $query->result();
    }

    public function getTotalAnnualIncomeForDisbursementbelow2015($codegens){
        $date = new DateTime("now");
        $now = date('Y-m-d');
        $curr_year = $date->format('Y');
        $curr_day = $date->format('D');
        $curr_month = $date->format('F');
        $this->db->select('SUM(CASE WHEN types_of_payment=1  THEN amount_payment ELSE 0 END) as efamount,
                           SUM(CASE WHEN types_of_payment=2  THEN amount_payment ELSE 0 END) as ffamount,
                           SUM(CASE WHEN types_of_payment=3  THEN amount_payment ELSE 0 END) as rfamount,
                           SUM(CASE WHEN types_of_payment=4  THEN amount_payment ELSE 0 END) as cfamount,
                           SUM(CASE WHEN types_of_payment=5  THEN amount_payment ELSE 0 END) as dfamount,
                           SUM(CASE WHEN types_of_payment=8  THEN amount_payment ELSE 0 END) as ofamount,
                           (CASE WHEN types_of_payment=6  THEN group_concat("Trust fund : ",tblfinancialassistance.finance_desc,"<br>"
                                                                   "Mode payment : ",tblfinancialassistancesub.description,"<br>",
                                                                    "Amount : ",amount_payment separator "<hr> ") ELSE group_concat("Trust fund : ",tblfinancialassistance.finance_desc,"<br>"
                                                                   "Mode payment : ",tblfinancialassistancesub.description,"<br>",
                                                                    "Amount : ",amount_payment separator "<hr> ") END) as contritext,
                            SUM(CASE WHEN types_of_payment=7  THEN amount_payment ELSE 0 END) as fpfamount,
            visitorlogs_month,visitorlogs_day,visitorlogs_year,types_of_payment,id_visitor_payment,visitors_gencode,generatedcode')
        ->join('tbldatemonth','tblpavisitorspayment.visitorlogs_month = tbldatemonth.month','LEFT')
        ->join('tblfinancialassistance','tblpavisitorspayment.trust_fund = tblfinancialassistance.id_financial','LEFT')
        ->join('tblfinancialassistancesub','tblpavisitorspayment.mode_payment = tblfinancialassistancesub.id_finance_sub','LEFT')
        ->where('generatedcode',$codegens)
        ->where('visitorlogs_year<=','2015');
        // ->group_by("visitorlogs_year");
        $query = $this->db->get('tblpavisitorspayment');
        return $query->result();
    }

    public function getTotalAnnualIncomeForDisbursementabove2016Paria($codegens){
        $date = new DateTime("now");
        $now = date('Y-m-d');
        $curr_year = $date->format('Y');
        $curr_day = $date->format('D');
        $curr_month = $date->format('F');
        $this->db->select('SUM(CASE WHEN types_of_payment=1  THEN amount_payment ELSE 0 END) as efamount,
                           SUM(CASE WHEN types_of_payment=2  THEN amount_payment ELSE 0 END) as ffamount,
                           SUM(CASE WHEN types_of_payment=3  THEN amount_payment ELSE 0 END) as rfamount,
                           SUM(CASE WHEN types_of_payment=4  THEN amount_payment ELSE 0 END) as cfamount,
                           SUM(CASE WHEN types_of_payment=5  THEN amount_payment ELSE 0 END) as dfamount,
                           SUM(CASE WHEN types_of_payment=8  THEN amount_payment ELSE 0 END) as ofamount,
                           (CASE WHEN types_of_payment=6  THEN group_concat("Trust fund : ",tblfinancialassistance.finance_desc,"<br>"
                                                                   "Mode payment : ",tblfinancialassistancesub.description,"<br>",
                                                                    "Amount : ",amount_payment separator "<hr> ") ELSE group_concat("Trust fund : ",tblfinancialassistance.finance_desc,"<br>"
                                                                   "Mode payment : ",tblfinancialassistancesub.description,"<br>",
                                                                    "Amount : ",amount_payment separator "<hr> ") END) as contritext,
                            SUM(CASE WHEN types_of_payment=7  THEN amount_payment ELSE 0 END) as fpfamount,
            visitorlogs_month,visitorlogs_day,visitorlogs_year,types_of_payment,id_visitor_payment,visitors_gencode,generatedcode')
        ->join('tbldatemonth','tblpavisitorspayment.visitorlogs_month = tbldatemonth.month','LEFT')
        ->join('tblfinancialassistance','tblpavisitorspayment.trust_fund = tblfinancialassistance.id_financial','LEFT')
        ->join('tblfinancialassistancesub','tblpavisitorspayment.mode_payment = tblfinancialassistancesub.id_finance_sub','LEFT')
        ->where('generatedcode',$codegens)
        ->where('visitorlogs_year>=','2016');
        // ->group_by("visitorlogs_year");
        $query = $this->db->get('tblpavisitorspayment');
        return $query->result();
    }

    public function getGTDisburReport2016Above($codegens){
        $this->db->select('SUM(disbursement_paria) as disparia,year_disbursement');
        $this->db->where('generatedcode',$codegens)
        ->where('year_disbursement>=','2016');
        $query = $this->db->get('tblpaipafdisbursementfiles');
        return $query->result();
    }

    public function getGTDisbursements($codegens){
        $date = new DateTime("now");
        $now = date('Y-m-d');
        $curr_year = $date->format('Y');
        $curr_day = $date->format('D');
        $curr_month = $date->format('F');
        $this->db->select('SUM(CASE WHEN types_of_payment=1  THEN amount_payment ELSE 0 END) as efamount,
                           SUM(CASE WHEN types_of_payment=2  THEN amount_payment ELSE 0 END) as ffamount,
                           SUM(CASE WHEN types_of_payment=3  THEN amount_payment ELSE 0 END) as rfamount,
                           SUM(CASE WHEN types_of_payment=4  THEN amount_payment ELSE 0 END) as cfamount,
                           SUM(CASE WHEN types_of_payment=5  THEN amount_payment ELSE 0 END) as dfamount,
                           SUM(CASE WHEN types_of_payment=8  THEN amount_payment ELSE 0 END) as ofamount,
                           (CASE WHEN types_of_payment=6  THEN group_concat("Trust fund : ",tblfinancialassistance.finance_desc,"<br>"
                                                                   "Mode payment : ",tblfinancialassistancesub.description,"<br>",
                                                                    "Amount : ",amount_payment separator "<hr> ") ELSE group_concat("Trust fund : ",tblfinancialassistance.finance_desc,"<br>"
                                                                   "Mode payment : ",tblfinancialassistancesub.description,"<br>",
                                                                    "Amount : ",amount_payment separator "<hr> ") END) as contritext,
                            SUM(CASE WHEN types_of_payment=7  THEN amount_payment ELSE 0 END) as fpfamount,
            visitorlogs_month,visitorlogs_day,visitorlogs_year,types_of_payment,id_visitor_payment,visitors_gencode,generatedcode,')
        ->join('tbldatemonth','tblpavisitorspayment.visitorlogs_month = tbldatemonth.month','LEFT')
        ->join('tblfinancialassistance','tblpavisitorspayment.trust_fund = tblfinancialassistance.id_financial','LEFT')
        ->join('tblfinancialassistancesub','tblpavisitorspayment.mode_payment = tblfinancialassistancesub.id_finance_sub','LEFT')
        ->where('generatedcode',$codegens);
        $query = $this->db->get('tblpavisitorspayment');
        return $query->result();
    }

    public function getAllDisburReportGeneration($palist,$payear,$payearto){
        $this->db->join('tblpaipafdisbursementfiles','tblpaipafincome.date_year_income = tblpaipafdisbursementfiles.year_disbursement','LEFT');
        $this->db->where('tblpaipafdisbursementfiles.generatedcode',$palist);
        $this->db->where('year_disbursement >=', $payear);
        $this->db->where('year_disbursement <=', $payearto);
        $this->db->group_by('year_disbursement');
        $this->db->order_by('year_disbursement','DESC');
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function getTotalAnnualIncomeForDisbursementReportGeneration($palist,$payear,$payearto){
        $date = new DateTime("now");
        $now = date('Y-m-d');
        $curr_year = $date->format('Y');
        $curr_day = $date->format('D');
        $curr_month = $date->format('F');
        $this->db->select('SUM(CASE WHEN types_of_payment=1  THEN amount_payment ELSE 0 END) as efamount,
                           SUM(CASE WHEN types_of_payment=2  THEN amount_payment ELSE 0 END) as ffamount,
                           SUM(CASE WHEN types_of_payment=3  THEN amount_payment ELSE 0 END) as rfamount,
                           SUM(CASE WHEN types_of_payment=4  THEN amount_payment ELSE 0 END) as cfamount,
                           SUM(CASE WHEN types_of_payment=5  THEN amount_payment ELSE 0 END) as dfamount,
                           SUM(CASE WHEN types_of_payment=8  THEN amount_payment ELSE 0 END) as ofamount,
                           (CASE WHEN types_of_payment=6  THEN group_concat("Trust fund : ",tblfinancialassistance.finance_desc,"<br>"
                                                                   "Mode payment : ",tblfinancialassistancesub.description,"<br>",
                                                                    "Amount : ",amount_payment separator "<hr> ") ELSE group_concat("Trust fund : ",tblfinancialassistance.finance_desc,"<br>"
                                                                   "Mode payment : ",tblfinancialassistancesub.description,"<br>",
                                                                    "Amount : ",amount_payment separator "<hr> ") END) as contritext,
                            SUM(CASE WHEN types_of_payment=7  THEN amount_payment ELSE 0 END) as fpfamount,
            visitorlogs_month,visitorlogs_day,visitorlogs_year,types_of_payment,id_visitor_payment,visitors_gencode,generatedcode')
        ->join('tbldatemonth','tblpavisitorspayment.visitorlogs_month = tbldatemonth.month','LEFT')
        ->join('tblfinancialassistance','tblpavisitorspayment.trust_fund = tblfinancialassistance.id_financial','LEFT')
        ->join('tblfinancialassistancesub','tblpavisitorspayment.mode_payment = tblfinancialassistancesub.id_finance_sub','LEFT')
        ->where('generatedcode',$palist)
        ->where('visitorlogs_year >=', $payear)
        ->where('visitorlogs_year <=', $payearto)
        ->group_by("visitorlogs_year");
        $query = $this->db->get('tblpavisitorspayment');
        return $query->result();
    }

    public function getAllDisbursementReport($palist,$payear,$payearto){
        $this->db->join('tblpaipafdisbursementfiles','tblpaipafincome.date_year_income = tblpaipafdisbursementfiles.year_disbursement','LEFT');
        $this->db->where('tblpaipafdisbursementfiles.generatedcode',$palist);
        $this->db->where('year_disbursement >=', $payear);
        $this->db->where('year_disbursement <=', $payearto);
        $this->db->group_by('year_disbursement');
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function getAllDisbursementReportPDF($searchpa,$disburse_year,$disburse_year_to){
        // $this->db->join('tbldateyear','tblpaipafdisbursementfiles.year_disbursement=tbldateyear.id_year','LEFT');
        $this->db->where('generatedcode',$searchpa);
        $this->db->where('year_disbursement >=', $disburse_year);
        $this->db->where('year_disbursement <=', $disburse_year_to);
        $query = $this->db->get('tblpaipafdisbursementfiles');
        return $query->result();
    }


    public function getAllImageSoilDetails($codegens){

        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpageology_details');
        return $query->result();
    }

    public function getAllpdfeinfo($codegens){

        $this->db->join('tblpalivelihood_type','tblpalivelihood.lh_sub_category= tblpalivelihood_type.id_lh_type','LEFT')
                 ->join('tbllocregion','tblpalivelihood.lh_region = tbllocregion.id','left')
                 ->join('tbllocprovince','tblpalivelihood.lh_province = tbllocprovince.id_p','left')
                 ->join('tbllocmunicipality','tblpalivelihood.lh_municipal = tbllocmunicipality.id_m','left')
                 ->join('tbllocbarangay','tblpalivelihood.lh_barangay = tbllocbarangay.id_b','left')
                 ->join('tblpalivelihood_products','tblpalivelihood.lh_category = tblpalivelihood_products.id_products','left')
                 ->join('tblpalivelihood_registration','tblpalivelihood.type_registration = tblpalivelihood_registration.id_bdfe_registration','left')

        ->where('generatedcode',$codegens);
        $query = $this->db->get('tblpalivelihood');
        return $query->result();
    }

    public function getAllbdfeponameinfo($code2){

        $this->db->where('bdfe_codegen',$code2);
        $query = $this->db->get('tblpalivelihood_poname');
        return $query->result();
    }

    public function getAllbdfeponameinfo2($code2){
        $this->db->select('group_concat(bdfe_po_name," | Contact No.: ",bdfe_contact separator "<br> ") as pomem,bdfe_codegen');        
        $this->db->where('bdfe_codegen',$code2);
        $query = $this->db->get('tblpalivelihood_poname');
        return $query->result();
    }

    public function insertbdfeponames($data = [])
    {
        return $this->db->insert('tblpalivelihood_poname',$data);
    }

    public function insertbdfeponamesStatusHistory($data = [])
    {
        return $this->db->insert('tblpalivelihood_pohistory',$data);
    }

    public function insertperformeas($data = [])
    {
        return $this->db->insert('tblipaf_physical_performace_measure',$data);
    }

    public function insertstartingbalances($data = [])
    {
        return $this->db->insert('tblipafsourceincome_startingbalance',$data);
    }

    public function getallOtherTenure($codegens)
    {
        $this->db->join('tblpamaintenureinstrument_types','tblpamaintenureothers.type_instrument = tblpamaintenureinstrument_types.id_tenuretypes','LEFT')
             ->join('tblpamanagementplanstatus','tblpamaintenureothers.other_instrument_status = tblpamanagementplanstatus.id_mpstatus','LEFT')
             ->where('generatedcode',$codegens);
        $query = $this->db->get('tblpamaintenureothers');
        return $query->result();
    }

    public function getAllImageRock($codegens){

        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblparock');
        return $query->result();
    }

    public function getAllImageRockDetails($codegens){

        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblparock_details');
        return $query->result();
    }

    public function getAllPAdata(){

        $this->db->join('tblpamain','tblpamanagementzone.generatedcode_mgnt = tblpamain.generatedcode','LEFT');
        $query = $this->db->get('tblpamanagementzone');
        return $query->result();
    }

    public function getAllImageClimate($codegens){

        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get($this->tableclimate);
        return $query->result();
    }

    public function getAllImageClimateDetails($codegens){
        $this->db->join('tblclimate_type','tblpaclimate_details.climate_type=tblclimate_type.id_climates','left');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaclimate_details');
        return $query->result();
    }

    public function getAllImageHydrology($codegens){

        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpahydrology');
        return $query->result();
    }

    public function getAllImageHydrologyDetails($codegens){

        $this->db->join('tblhydrology_waterclass','tblpahydrology_details.hydro_class = tblhydrology_waterclass.id_waterClass','left')
        ->join('tblhydrology_waterclass_sub','tblpahydrology_details.hydroSub_class = tblhydrology_waterclass_sub.id_waterClassSub','left')
        ->where('generatedcode',$codegens);

        $query = $this->db->get('tblpahydrology_details');
        return $query->result();
    }

    public function getAllImageHydrologyWaterParam($code2){
        $this->db->select('group_concat("Sub Water Classification : ",waterClass,"<br>Parameter : ",hydro_parameter,"<br>Status : ",status_waterquality,"<br>Year assessed : ",hydro_date_assessed separator "<br><br> ") as hydrodet,id_hydrology_para');        
        $this->db->join('tblhydrology_waterclass','tblpahydrology_para_details.hydro_parawclass_id = tblhydrology_waterclass.id_waterClass','left')
                 ->join('tblhydrology_waterclass_sub','tblpahydrology_para_details.hydro_parasubwclass_id = tblhydrology_waterclass_sub.id_waterClassSub','left')
                 ->join('tblhydrology_waterstatus','tblpahydrology_para_details.hydro_para_status = tblhydrology_waterstatus.id_waterquality_status','left')
                 ->where('tblpahydrology_para_details.hydro_code',$code2);
        $query = $this->db->get('tblpahydrology_para_details');
        return $query->result();
    }

    public function getAllImageHydrologyWaterParam_break($code2){
        $this->db->join('tblhydrology_waterclass','tblpahydrology_para_details.hydro_parawclass_id = tblhydrology_waterclass.id_waterClass','left')
                 ->join('tblhydrology_waterclass_sub','tblpahydrology_para_details.hydro_parasubwclass_id = tblhydrology_waterclass_sub.id_waterClassSub','left')
                 ->join('tblhydrology_waterstatus','tblpahydrology_para_details.hydro_para_status = tblhydrology_waterstatus.id_waterquality_status','left')
                 ->where('tblpahydrology_para_details.hydro_code',$code2);
        $query = $this->db->get('tblpahydrology_para_details');
        return $query->result();
    }

    public function getAllImagelanduse($codegens){

        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpalanduse');
        return $query->result();
    }

    public function getAllImagelanduseDetails($codegens){
        $this->db->join('tblpaexisting_landuse','tblpalanduse_details.landuse_type=tblpaexisting_landuse.id_landuses','left');
        $this->db->join('tblpaexisting_landuse_sub','tblpalanduse_details.landuse_sub=tblpaexisting_landuse_sub.id_landuse_sub','left');
        $this->db->where('generatedcode',$codegens);
        // $this->db->group_by('id_landuse');

        $query = $this->db->get('tblpalanduse_details');
        return $query->result();
    }

    public function getAllImagelanduseDetailsTotal($codegens){

        $this->db->select('SUM(landuse_area) as total_area')
        ->where('generatedcode',$codegens)
        ->group_by('generatedcode');
        $query = $this->db->get('tblpalanduse_details');
        return $query->result();
    }

    public function getalldatawatershed($codegens){
        $this->db->join('tblriverbasin_list','tblpamainwatershed.riverbasin_name=tblriverbasin_list.id_riverbasin','LEFT');
        $this->db->join('tblriverbasin__watershed','tblpamainwatershed.watershed_name=tblriverbasin__watershed.id_watersheds','LEFT');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpamainwatershed');
        return $query->result();
    }

    public function getAllImagevegetativeDetails($codegens){
        $this->db->join('tbllandcover','tblpavegetative_details.vegetative_desc=tbllandcover.id_landcovertype','LEFT');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpavegetative_details');
        return $query->result();
    }

    public function getAllwdpasublocDetails($codegens){
        $this->db->join('tblpawdpa_subloc','tblpawdpa_location.wdpa_id=tblpawdpa_subloc.id_iso','LEFT');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpawdpa_location');
        return $query->result();
    }

    public function getAllImagevegetativeDetailsTotal($codegens){

        $this->db->select('SUM(vegetative_area) as total_area')
        ->where('generatedcode',$codegens)
        ->group_by('generatedcode');
        $query = $this->db->get('tblpavegetative_details');
        return $query->result();
    }

    public function getAllImagefire($codegens){

        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpahazardfire');
        return $query->result();
    }

    public function getAllImagevegetatives($codegens){

        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpavegetative');
        return $query->result();
    }

    public function getAllImageLandslide($codegens){

        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpahazardlandslide');
        return $query->result();
    }

    public function getAllImageLandslideshpfile($codegens){

        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpahazardlandslide_shpfile');
        return $query->result();
    }

    public function getAllImageforestformshpfile($codegens){

        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaforestformation_shpfile');
        return $query->result();
    }

    public function getAllImagepamainshpfile($codegens){

        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpamain_shapfile');
        return $query->result();
    }

    public function getAllImageclimateshpfile($codegens){

        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaclimate_shpfile');
        return $query->result();
    }

    public function getAllImageattractionsshpfile($codegens){

        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaattraction_shpfile');
        return $query->result();
    }

    public function getAllImagefacilityshpfile($codegens){

        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpafacility_shpfile');
        return $query->result();
    }

    public function getAllImagemgmtzoneshpfile($codegens){

        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpamanagementzone_shpfile');
        return $query->result();
    }

    public function getAllImagevegetativeshpfile($codegens){

        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpavegetative_shpfile');
        return $query->result();
    }

    public function getAllImagefloodingshpfile($codegens){

        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpahazardflooding_shpfile');
        return $query->result();
    }

    public function getAllImageLandslideDetails($codegens){

        $this->db->where('generatedcode',$codegens);
        $this->db->join('tblpamgblegendlandslide','tblpahazardlandslide_details.landslide_desc = tblpamgblegendlandslide.id_legend_landslide','Left');
        $query = $this->db->get('tblpahazardlandslide_details');
        return $query->result();
    }

    public function getAllImagelandslideDetailsTotal($codegens){

        $this->db->select('SUM(landslide_area) as total_area')
        ->where('generatedcode',$codegens)
        ->group_by('generatedcode');
        $query = $this->db->get('tblpahazardlandslide_details');
        return $query->result();
    }

    public function getAllImagefloodingDetails($codegens){

        $this->db->where('generatedcode',$codegens);
        $this->db->join('tblpamgblegendflooding','tblpahazardflooding_details.flooding_desc = tblpamgblegendflooding.id_legend_flooding','Left');
        $query = $this->db->get('tblpahazardflooding_details');
        return $query->result();
    }

    public function getAllImagefloodingDetailsTotal($codegens){

        $this->db->select('SUM(flooding_area) as total_area')
        ->where('generatedcode',$codegens)
        ->group_by('generatedcode');
        $query = $this->db->get('tblpahazardflooding_details');
        return $query->result();
    }

    public function getAllImageFlooding($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get($this->tableflooding);
        return $query->result();
    }

    public function getAllImageForestForm($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaforestformation');
        return $query->result();
    }

    public function getAllImageiw($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpainlandwetland_map');
        return $query->result();
    }

    public function getAllImagehiw($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpahumanwetland_map');
        return $query->result();
    }

    public function getAllImagepa($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpamain_img');
        return $query->result();
    }

    public function getAllImageCave($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpacavemap');
        return $query->result();
    }

    public function getAllImageThreatMap($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpatreatmap');
        return $query->result();
    }

    public function getAllImageCoralEdit($codegens){
        $this->db->where('coastal_generatedcode',$codegens);
        $query = $this->db->get('tblpacoastalcoralmap');
        return $query->result();
    }

    public function getAllImageCoral($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpacoastalcoralmap');
        return $query->result();
    }


    public function getAllImageSeagrass($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpacoastalseagrassmap');
        return $query->result();
    }

    public function getAllImagemngtzone($codegens){
        $this->db->where('generatedcode_mgnt',$codegens);
        $query = $this->db->get('tblpamanagementzone');
        return $query->result();
    }

    public function getAllImageattraction($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaattraction_map');
        return $query->result();
    }

    public function getAllImagefacility1($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpafacility_map');
        return $query->result();
    }

    public function getAllImageactivity($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaecotourism_map');
        return $query->result();
    }

    public function getAllImagemangrove($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpacoastalmangrovemap');
        return $query->result();
    }

    public function getAllImageSea($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get($this->tablesealevel);
        return $query->result();
    }

    public function getAllImageTsunami($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get($this->tabletsunami);
        return $query->result();
    }

    public function getAllImageGeohazard($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpageohazard');
        return $query->result();
    }

    public function getRecognition($codegens){
        $this->db->join('tblinternationalrecognition','tblrecognition.recognition = tblinternationalrecognition.id_recognition','left');
        $this->db->join('tblinternationalrecognition_sub','tblrecognition.recog_sub = tblinternationalrecognition_sub.id_recog_sub','left');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblrecognition');
        return $query->result();
    }

    public function getRecognitionCriteriaRamsar($code2){
        $this->db->select('group_concat(int_crit,") ",crit_desc separator "<br> ") as try2,recognition_code');
        $this->db->join('tblinternationalrecognition_sub','tblrecognition_criteria_list.criteria_list = tblinternationalrecognition_sub.id_recog_sub','left');
        $this->db->where('recognition_code',$code2);
        $query = $this->db->get('tblrecognition_criteria_list');
        return $query->result();
    }

    public function getRecognitionCriteriaRamsarList($code2){
        // $this->db->select('group_concat(int_crit,") ",crit_desc separator "<br> ") as try2,recognition_code');
        $this->db->join('tblinternationalrecognition_sub','tblrecognition_criteria_list.criteria_list = tblinternationalrecognition_sub.id_recog_sub','left');
        $this->db->where('recognition_code',$code2);
        $query = $this->db->get('tblrecognition_criteria_list');
        return $query->result();
    }

    public function getallIpafVisitors($codegens){
        $this->db->select()
        ->where('generatedcode',$codegens)
        ->group_by(array("visitorlog_month", "visitorlog_day","visitorlog_year"))
        ->order_by('LENGTH(visitorlog_day)')
        ->order_by('visitorlog_day');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }

    public function getallIpafincomecertificates($codegens){
        $date = new DateTime("now");
        $now = date('Y-m-d');
        $curr_year = $date->format('Y');
        $curr_day = $date->format('D');
        $curr_month = $date->format('F');
        $this->db->where('certificate_date_year',$curr_year)
        ->where('certificate_date_month',$curr_month)
        ->where('generatedcode',$codegens);
        $query = $this->db->get('tblipafincomecertificate');
        return $query->result();
    }

    public function SearchgetallIpafincomecertificates($codegens,$year,$month){
        $this->db->where('certificate_date_year',$year)
        ->where('certificate_date_month',$month)
        ->where('generatedcode',$codegens);
        $query = $this->db->get('tblipafincomecertificate');
        return $query->result();
    }

    public function getallIpafIncomeQuarterly($searchPa,$year_list,$quarter){
        $date = new DateTime("now");
        $now = date('Y-m-d');
        $curr_year = $date->format('Y');
        $curr_day = $date->format('D');
        $curr_month = $date->format('F');
        $this->db->select('SUM(CASE WHEN types_of_payment=1 THEN amount_payment ELSE 0 END) as efamount,
                           SUM(CASE WHEN types_of_payment=2 THEN amount_payment ELSE 0 END) as ffamount,
                           SUM(CASE WHEN types_of_payment=3 THEN amount_payment ELSE 0 END) as rfamount,
                           SUM(CASE WHEN types_of_payment=4 THEN amount_payment ELSE 0 END) as cfamount,
                           SUM(CASE WHEN types_of_payment=5 THEN amount_payment ELSE 0 END) as dfamount,
                           SUM(CASE WHEN types_of_payment=8 THEN amount_payment ELSE 0 END) as ofamount,

                           (CASE WHEN types_of_payment=6  THEN group_concat("Trust fund : ",tblfinancialassistance.finance_desc,"<br>"
                                                                   "Mode payment : ",tblfinancialassistancesub.description,"<br>",
                                                                    "Amount : ",amount_payment separator "<hr> ") ELSE group_concat("Trust fund : ",tblfinancialassistance.finance_desc,"<br>"
                                                                   "Mode payment : ",tblfinancialassistancesub.description,"<br>",
                                                                    "Amount : ",amount_payment separator "<hr> ") END) as contritext,

                            SUM(CASE WHEN types_of_payment=7 THEN amount_payment ELSE 0 END) as fpfamount,

            visitorlogs_month,visitorlogs_day,visitorlogs_year,types_of_payment,id_visitor_payment,visitors_gencode,generatedcode')
        ->join('tblfinancialassistance','tblpavisitorspayment.trust_fund = tblfinancialassistance.id_financial','LEFT')
        ->join('tblfinancialassistancesub','tblpavisitorspayment.mode_payment = tblfinancialassistancesub.id_finance_sub','LEFT')
        ->join('tbldatemonth','tblpavisitorspayment.visitorlogs_month = tbldatemonth.month','LEFT')
        ->join('tblpaipaffeetype','tblpavisitorspayment.types_of_payment=tblpaipaffeetype.id_typefee','LEFT')
        ->where('visitorlogs_year',$year_list)
        ->where('QtrCode',$quarter)
        ->where('generatedcode',$searchPa)
        // ->group_by(array("visitorlogs_month", "visitorlogs_day","visitorlogs_year"))
        ->group_by('visitorlogs_month');
        // ->order_by('LENGTH(visitorlogs_day)')
        // ->order_by('visitorlogs_day');
        $query = $this->db->get('tblpavisitorspayment');
        return $query->result();
    }

    public function getallIpafIncomeWeekly($searchPa,$year,$fday,$tday,$months){
        $date = new DateTime("now");
        $now = date('Y-m-d');
        $curr_year = $date->format('Y');
        $curr_day = $date->format('D');
        $curr_month = $date->format('F');
        $this->db->select('SUM(CASE WHEN types_of_payment=1 THEN amount_payment ELSE 0 END) as efamount,
                           SUM(CASE WHEN types_of_payment=2 THEN amount_payment ELSE 0 END) as ffamount,
                           SUM(CASE WHEN types_of_payment=3 THEN amount_payment ELSE 0 END) as rfamount,
                           SUM(CASE WHEN types_of_payment=4 THEN amount_payment ELSE 0 END) as cfamount,
                           SUM(CASE WHEN types_of_payment=5 THEN amount_payment ELSE 0 END) as dfamount,
                           SUM(CASE WHEN types_of_payment=8 THEN amount_payment ELSE 0 END) as ofamount,

                           (CASE WHEN types_of_payment=6  THEN group_concat("Trust fund : ",tblfinancialassistance.finance_desc,"<br>"
                                                                   "Mode payment : ",tblfinancialassistancesub.description,"<br>",
                                                                    "Amount : ",amount_payment separator "<hr> ") ELSE group_concat("Trust fund : ",tblfinancialassistance.finance_desc,"<br>"
                                                                   "Mode payment : ",tblfinancialassistancesub.description,"<br>",
                                                                    "Amount : ",amount_payment separator "<hr> ") END) as contritext,

                            SUM(CASE WHEN types_of_payment=7 THEN amount_payment ELSE 0 END) as fpfamount,

            visitorlogs_month,visitorlogs_day,visitorlogs_year,types_of_payment,id_visitor_payment,visitors_gencode,generatedcode')
        ->join('tblfinancialassistance','tblpavisitorspayment.trust_fund = tblfinancialassistance.id_financial','LEFT')
        ->join('tblfinancialassistancesub','tblpavisitorspayment.mode_payment = tblfinancialassistancesub.id_finance_sub','LEFT')
        ->join('tbldatemonth','tblpavisitorspayment.visitorlogs_month = tbldatemonth.month','LEFT')
        // ->join('tblpaipaffeetype','tblpavisitorspayment.types_of_payment=tblpaipaffeetype.id_typefee','LEFT')
        ->where('visitorlogs_year',$year)
        ->where('visitorlogs_month',$months)
        ->where("visitorlogs_day BETWEEN $fday AND $tday")
        ->where('generatedcode',$searchPa)
        ->group_by('visitorlogs_day');
        $query = $this->db->get('tblpavisitorspayment');
        return $query->result();
    }

    public function getallIpafIncomeWeeklyContriFinePenalty($searchPa,$year,$fday,$tday,$months){
        $date = new DateTime("now");
        $now = date('Y-m-d');
        $curr_year = $date->format('Y');
        $curr_day = $date->format('D');
        $curr_month = $date->format('F');
        $this->db->select('(CASE WHEN types_of_payment=6  THEN group_concat("Trust fund : ",tblfinancialassistance.finance_desc,"<br>"
                                                                   "Mode payment : ",tblfinancialassistancesub.description,"<br>",
                                                                    "Amount : ",amount_payment separator "<hr> ") ELSE group_concat("Trust fund : ",tblfinancialassistance.finance_desc,"<br>"
                                                                   "Mode payment : ",tblfinancialassistancesub.description,"<br>",
                                                                    "Amount : ",amount_payment separator "<hr> ") END) as contritext,
                            (CASE WHEN types_of_payment=7  THEN group_concat("Specify Fines and Penalties : ",penalty_desc,"<br>Amount : ",amount_payment separator "<hr> ") ELSE group_concat("Specify Fines and Penalties : ",penalty_desc,"<br>Amount : ",amount_payment separator "<hr> ") END) as penaltext,
                            SUM(CASE WHEN types_of_payment=7 THEN amount_payment ELSE 0 END) as fpfamount,

            visitorlogs_month,visitorlogs_day,visitorlogs_year,types_of_payment,id_visitor_payment,visitors_gencode,generatedcode')
        ->join('tblfinancialassistance','tblpavisitorspayment.trust_fund = tblfinancialassistance.id_financial','LEFT')
        ->join('tblfinancialassistancesub','tblpavisitorspayment.mode_payment = tblfinancialassistancesub.id_finance_sub','LEFT')
        ->join('tbldatemonth','tblpavisitorspayment.visitorlogs_month = tbldatemonth.month','LEFT')
        // ->join('tblpaipaffeetype','tblpavisitorspayment.types_of_payment=tblpaipaffeetype.id_typefee','LEFT')
        ->where('visitorlogs_year',$year)
        ->where('visitorlogs_month',$months)
        ->where("visitorlogs_day BETWEEN $fday AND $tday")
        ->where('generatedcode',$searchPa)
        ->group_by(' ');
        $query = $this->db->get('tblpavisitorspayment');
        return $query->result();
    }

    public function getallIpafIncomeWeeklyGrandTotal($searchPa,$year,$fday,$tday,$months){
        $date = new DateTime("now");
        $now = date('Y-m-d');
        $curr_year = $date->format('Y');
        $curr_day = $date->format('D');
        $curr_month = $date->format('F');
        $this->db->select('SUM(CASE WHEN types_of_payment=1 THEN amount_payment ELSE 0 END) as efamount,
                           SUM(CASE WHEN types_of_payment=2 THEN amount_payment ELSE 0 END) as ffamount,
                           SUM(CASE WHEN types_of_payment=3 THEN amount_payment ELSE 0 END) as rfamount,
                           SUM(CASE WHEN types_of_payment=4 THEN amount_payment ELSE 0 END) as cfamount,
                           SUM(CASE WHEN types_of_payment=5 THEN amount_payment ELSE 0 END) as dfamount,
                           SUM(CASE WHEN types_of_payment=8 THEN amount_payment ELSE 0 END) as ofamount,
            visitorlogs_month,visitorlogs_day,visitorlogs_year,types_of_payment,id_visitor_payment,visitors_gencode,generatedcode')
        ->join('tblfinancialassistance','tblpavisitorspayment.trust_fund = tblfinancialassistance.id_financial','LEFT')
        ->join('tblfinancialassistancesub','tblpavisitorspayment.mode_payment = tblfinancialassistancesub.id_finance_sub','LEFT')
        ->join('tbldatemonth','tblpavisitorspayment.visitorlogs_month = tbldatemonth.month','LEFT')
        // ->join('tblpaipaffeetype','tblpavisitorspayment.types_of_payment=tblpaipaffeetype.id_typefee','LEFT')
        ->where('visitorlogs_year',$year)
        ->where('visitorlogs_month',$months)
        ->where("visitorlogs_day BETWEEN $fday AND $tday")
        ->where('generatedcode',$searchPa);
        // ->group_by('visitorlogs_day');
        $query = $this->db->get('tblpavisitorspayment');
        return $query->result();
    }

    public function getallIpafVisitorsEntrancefee($codegens){
        $date = new DateTime("now");
        $now = date('Y-m-d');
        $curr_year = $date->format('Y');
        $curr_day = $date->format('D');
        $curr_month = $date->format('F');
        // SUM(CASE WHEN group_id='1' THEN population_percent ELSE 0 END) p1,
        //       SUM(CASE WHEN Type='2' THEN population_percent ELSE 0 END) p2,
        //       SUM(CASE WHEN Type='3' THEN population_percent ELSE 0 END) p3,
        $this->db->select('SUM(CASE WHEN types_of_payment=1  THEN amount_payment ELSE 0 END) as efamount,
                           SUM(CASE WHEN types_of_payment=2  THEN amount_payment ELSE 0 END) as ffamount,
                           SUM(CASE WHEN types_of_payment=3  THEN amount_payment ELSE 0 END) as rfamount,
                           SUM(CASE WHEN types_of_payment=4  THEN amount_payment ELSE 0 END) as cfamount,
                           SUM(CASE WHEN types_of_payment=5  THEN amount_payment ELSE 0 END) as dfamount,
                           SUM(CASE WHEN types_of_payment=8  THEN amount_payment ELSE 0 END) as ofamount,
                           (CASE WHEN types_of_payment=6  THEN group_concat("Trust fund : ",tblfinancialassistance.finance_desc,"<br>"
                                                                   "Mode payment : ",tblfinancialassistancesub.description,"<br>",
                                                                    "Amount : ",amount_payment separator "<hr> ") ELSE group_concat("Trust fund : ",tblfinancialassistance.finance_desc,"<br>"
                                                                   "Mode payment : ",tblfinancialassistancesub.description,"<br>",
                                                                    "Amount : ",amount_payment separator "<hr> ") END) as contritext,
                            SUM(CASE WHEN types_of_payment=7  THEN amount_payment ELSE 0 END) as fpfamount,
            visitorlogs_month,visitorlogs_day,visitorlogs_year,types_of_payment,id_visitor_payment,visitors_gencode,generatedcode')
        ->join('tbldatemonth','tblpavisitorspayment.visitorlogs_month = tbldatemonth.month','LEFT')
        ->join('tblfinancialassistance','tblpavisitorspayment.trust_fund = tblfinancialassistance.id_financial','LEFT')
        ->join('tblfinancialassistancesub','tblpavisitorspayment.mode_payment = tblfinancialassistancesub.id_finance_sub','LEFT')
        ->where('visitorlogs_year',$curr_year)
        ->where('visitorlogs_month',$curr_month)
        ->where('generatedcode',$codegens)
        // ->where('types_of_payment',1)
        ->group_by(array("visitorlogs_month", "visitorlogs_day","visitorlogs_year"))
        ->order_by('LENGTH(visitorlogs_day)')
        ->order_by('visitorlogs_day');
        $query = $this->db->get('tblpavisitorspayment');
        return $query->result();
    }

    public function SearchgetallIpafVisitorsEntrancefee($codegens,$year,$month){
        $date = new DateTime("now");
        $now = date('Y-m-d');
        $curr_year = $date->format('Y');
        $curr_day = $date->format('D');
        $curr_month = $date->format('F');
        $this->db->select('SUM(CASE WHEN types_of_payment=1  THEN amount_payment ELSE 0 END) as efamount,
                           SUM(CASE WHEN types_of_payment=2  THEN amount_payment ELSE 0 END) as ffamount,
                           SUM(CASE WHEN types_of_payment=3  THEN amount_payment ELSE 0 END) as rfamount,
                           SUM(CASE WHEN types_of_payment=4  THEN amount_payment ELSE 0 END) as cfamount,
                           SUM(CASE WHEN types_of_payment=5  THEN amount_payment ELSE 0 END) as dfamount,
                           SUM(CASE WHEN types_of_payment=8  THEN amount_payment ELSE 0 END) as ofamount,
                           (CASE WHEN types_of_payment=6  THEN group_concat("Trust fund : ",tblfinancialassistance.finance_desc,"<br>"
                                                                   "Mode payment : ",tblfinancialassistancesub.description,"<br>",
                                                                    "Amount : ",amount_payment separator "<hr> ") ELSE group_concat("Trust fund : ",tblfinancialassistance.finance_desc,"<br>"
                                                                   "Mode payment : ",tblfinancialassistancesub.description,"<br>",
                                                                    "Amount : ",amount_payment separator "<hr> ") END) as contritext,
                            SUM(CASE WHEN types_of_payment=7  THEN amount_payment ELSE 0 END) as fpfamount,
            visitorlogs_month,visitorlogs_day,visitorlogs_year,types_of_payment,id_visitor_payment,visitors_gencode,generatedcode')
        ->join('tbldatemonth','tblpavisitorspayment.visitorlogs_month = tbldatemonth.month','LEFT')
        ->join('tblfinancialassistance','tblpavisitorspayment.trust_fund = tblfinancialassistance.id_financial','LEFT')
        ->join('tblfinancialassistancesub','tblpavisitorspayment.mode_payment = tblfinancialassistancesub.id_finance_sub','LEFT')
        ->where('visitorlogs_year',$year)
        ->where('visitorlogs_month',$month)
        ->where('generatedcode',$codegens)
        // ->where('types_of_payment',1)
        ->group_by(array("visitorlogs_month", "visitorlogs_day","visitorlogs_year"))
        ->order_by('LENGTH(visitorlogs_day)')
        ->order_by('visitorlogs_day');
        $query = $this->db->get('tblpavisitorspayment');
        return $query->result();
    }

    public function grandtotalincomevisit($codegens)
    {
        $date = new DateTime("now");
        $now = date('Y-m-d');
        $curr_year = $date->format('Y');
        $curr_day = $date->format('D');
        $curr_month = $date->format('F');
        $this->db->select('SUM(CASE WHEN types_of_payment=1  THEN amount_payment ELSE 0 END) as efamount,
                           SUM(CASE WHEN types_of_payment=2  THEN amount_payment ELSE 0 END) as ffamount,
                           SUM(CASE WHEN types_of_payment=3  THEN amount_payment ELSE 0 END) as rfamount,
                           SUM(CASE WHEN types_of_payment=4  THEN amount_payment ELSE 0 END) as cfamount,
                           SUM(CASE WHEN types_of_payment=5  THEN amount_payment ELSE 0 END) as dfamount,
                           SUM(CASE WHEN types_of_payment=8  THEN amount_payment ELSE 0 END) as ofamount,
                           visitorlogs_month,visitorlogs_day,visitorlogs_year,types_of_payment,id_visitor_payment,visitors_gencode,generatedcode')
        ->join('tbldatemonth','tblpavisitorspayment.visitorlogs_month = tbldatemonth.month','LEFT')
        ->where('visitorlogs_year',$curr_year)
        ->where('visitorlogs_month',$curr_month)
        ->where('generatedcode',$codegens);
        // ->group_by(array("visitorlogs_month", "visitorlogs_year"));
        // ->group_by('generatedcode');
        $query = $this->db->get('tblpavisitorspayment');
        return $query->result();
    }

    public function Searchgrandtotalincomevisit($codegens,$year,$month)
    {
        $this->db->select('SUM(CASE WHEN types_of_payment=1  THEN amount_payment ELSE 0 END) as efamount,
                           SUM(CASE WHEN types_of_payment=2  THEN amount_payment ELSE 0 END) as ffamount,
                           SUM(CASE WHEN types_of_payment=3  THEN amount_payment ELSE 0 END) as rfamount,
                           SUM(CASE WHEN types_of_payment=4  THEN amount_payment ELSE 0 END) as cfamount,
                           SUM(CASE WHEN types_of_payment=5  THEN amount_payment ELSE 0 END) as dfamount,
                           SUM(CASE WHEN types_of_payment=8  THEN amount_payment ELSE 0 END) as ofamount,
                           visitorlogs_month,visitorlogs_day,visitorlogs_year,types_of_payment,id_visitor_payment,visitors_gencode,generatedcode')
        ->join('tbldatemonth','tblpavisitorspayment.visitorlogs_month = tbldatemonth.month','LEFT')
        ->where('visitorlogs_year',$year)
        ->where('visitorlogs_month',$month)
        ->where('generatedcode',$codegens);
        // ->group_by(array("visitorlogs_month", "visitorlogs_year"));
        // ->group_by('generatedcode');
        $query = $this->db->get('tblpavisitorspayment');
        return $query->result();
    }

    public function getallIpafVisitorsfacilities($codegens){
        $date = new DateTime("now");
        $now = date('Y-m-d');
        $curr_year = $date->format('Y');
        $curr_day = $date->format('D');
        $curr_month = $date->format('F');
        $this->db->select('SUM(amount_payment) as ffamount,visitorlogs_month,visitorlogs_day,visitorlogs_year,types_of_payment')
        ->join('tbldatemonth','tblpavisitorspayment.visitorlogs_month = tbldatemonth.month','LEFT')
        ->where('visitorlogs_year',$curr_year)
        ->where('visitorlogs_month',$curr_month)
        ->where('generatedcode',$codegens)
        ->where('types_of_payment',2)
        ->group_by(array("visitorlogs_month", "visitorlogs_day","visitorlogs_year"))
        ->order_by('LENGTH(visitorlogs_day)')
        ->order_by('visitorlogs_day');
        $query = $this->db->get('tblpavisitorspayment');
        return $query->result();
    }

    public function getallIpaf1($codegens){
    $date = new DateTime("now");
        $now = date('Y-m-d');

    $curr_year = $date->format('Y');
    $curr_day = $date->format('D');
    $curr_month = $date->format('F');
        $this->db->select('(entrancefee + facilities + resource + concession ) as Grand_total_income,
            (entrancefee + facilities + resource + concession)*0.75 as total_75,
            (entrancefee + facilities + resource + concession)*0.25 as total_25,
            (entrancefee + facilities + resource + concession) as Grand_total_btr,date_day_income,
            id_income,tblpaipafincome.generatedcode,date_month_income,date_year_income,entrancefee,facilities,resource,concession,other_specify_title,other_specify_amount,tbldatemonth.id_month,certificate_receipt,bank_deposit_file')
        ->join('tbldatemonth','tblpaipafincome.date_month_income = tbldatemonth.month','LEFT')
        // ->where('date_year_income',$curr_year)
        // ->where('date_month_income',$curr_month)
        ->where('date_uploaded',date('Y-m-d'))
        ->where('tblpaipafincome.generatedcode',$codegens)
        ->order_by('LENGTH(date_day_income)')
        ->order_by('date_day_income');
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function getallIpafGrandtotals($codegens,$month,$year){
    $date = new DateTime("now");
    $curr_year = $date->format('Y');
    $curr_month = $date->format('F');
          $this->db->select('(entrancefee + facilities + resource + concession) as Grand_total_income,
            (entrancefee + facilities + resource + concession)*0.75 as total_75,
            (entrancefee + facilities + resource + concession)*0.25 as total_25,
            SUM(entrancefee + facilities + resource + concession) as Grand_totals,
            (entrancefee + facilities + resource + concession) as Grand_total_btr,date_day_income,
            id_income,tblpaipafincome.generatedcode,date_month_income,date_year_income,entrancefee,facilities,resource,concession,other_specify_title,other_specify_amount')
        ->where('date_year_income',$year)
        ->where('date_month_income',$month)
        ->where('tblpaipafincome.generatedcode',$codegens);
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

     public function getallIpafGrandtotal($codegens){
    $date = new DateTime("now");
    $curr_year = $date->format('Y');
    $curr_month = $date->format('F');
          $this->db->select('(entrancefee + facilities + resource + concession) as Grand_total_income,
            (entrancefee + facilities + resource + concession)*0.75 as total_75,
            (entrancefee + facilities + resource + concession)*0.25 as total_25,
            SUM(entrancefee + facilities + resource + concession) as Grand_totals,
            (entrancefee + facilities + resource + concession) as Grand_total_btr,date_day_income,
            id_income,tblpaipafincome.generatedcode,date_month_income,date_year_income,entrancefee,facilities,resource,concession,other_specify_title,other_specify_amount')
        ->where('date_year_income',$curr_year)
        ->where('date_month_income',$curr_month)
        ->where('tblpaipafincome.generatedcode',$codegens);
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function getallGrandtotalIpafothers($codegens,$month,$year){
        $date = new DateTime("now");
        $curr_year = $date->format('Y');
        $curr_month = $date->format('F');
        $this->db->select('group_concat(other_title,": ",other_amount separator "<br> ") as try2,income_month,income_day,income_year,generatedcode,id_fromincome,id_incomeP,other_title,other_amount,SUM(other_amount) as GsumOther,id_fromincome')
        ->where('income_year',$year)
        ->where('income_month',$month)
        ->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaipafincomeothers');
        return $query->result();
    }

    public function getallGrandtotalIpafother($codegens){
        $date = new DateTime("now");
        $curr_year = $date->format('Y');
        $curr_month = $date->format('F');
        $this->db->select('group_concat(other_title,": ",other_amount separator "<br> ") as try2,income_month,income_day,income_year,generatedcode,id_fromincome,id_incomeP,other_title,other_amount,SUM(other_amount) as GsumOther,id_fromincome')
        ->where('income_year',$curr_year)
        ->where('income_month',$curr_month)
        ->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaipafincomeothers');
        return $query->result();
    }

    public function getallGrandtotalIpafdisbursementss($codegens,$month,$year){
        $date = new DateTime("now");
        $curr_year = $date->format('Y');
        $curr_month = $date->format('F');
        $this->db->select('group_concat(disbursement_remarks,": ",disbursement_amount separator "<br> ") as try2,disbursement_month,disbursement_day,disbursement_year,id_ipafdisburse,generatedcode,id_fromincome,disbursement_remarks,disbursement_amount,SUM(disbursement_amount) as Gsumdisburse,id_fromincome')
        ->where('disbursement_year',$year)
        ->where('disbursement_month',$month)
        ->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaipafdisbursement');
        return $query->result();
    }

    public function getallGrandtotalIpafdisbursements($codegens){
        $date = new DateTime("now");
        $curr_year = $date->format('Y');
        $curr_month = $date->format('F');
        $this->db->select('group_concat(disbursement_remarks,": ",disbursement_amount separator "<br> ") as try2,disbursement_month,disbursement_day,disbursement_year,id_ipafdisburse,generatedcode,id_fromincome,disbursement_remarks,disbursement_amount,SUM(disbursement_amount) as Gsumdisburse,id_fromincome')
        ->where('disbursement_year',$curr_year)
        ->where('disbursement_month',$curr_month)
        ->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaipafdisbursement');
        return $query->result();
    }

    public function getallGrandtotalIpafdevelopments($codegens,$month,$year){
        $date = new DateTime("now");
        $curr_year = $date->format('Y');
        $curr_month = $date->format('F');
        $this->db->select('dev_month,dev_day,dev_year,id_devfees,generatedcode,id_fromincome,dev_remarks,devfee_amount,SUM(devfee_amount) as Gsumdevelopment')
        ->where('dev_year',$year)
        ->where('dev_month',$month)
        ->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaipafdevfee');
        return $query->result();
    }

    public function getallGrandtotalIpafdevelopment($codegens){
        $date = new DateTime("now");
        $curr_year = $date->format('Y');
        $curr_month = $date->format('F');
        $this->db->select('dev_month,dev_day,dev_year,id_devfees,generatedcode,id_fromincome,dev_remarks,devfee_amount,SUM(devfee_amount) as Gsumdevelopment')
        ->where('dev_year',$curr_year)
        ->where('dev_month',$curr_month)
        ->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaipafdevfee');
        return $query->result();
    }

    public function getallIpafdisbursementss($id){
    $date = new DateTime("now");
    $curr_year = $date->format('Y');
    $curr_month = $date->format('F');
        $this->db->select('group_concat(disbursement_remarks,": ",disbursement_amount separator "<br> ") as trydisburse,disbursement_month,disbursement_day,disbursement_year,id_ipafdisburse,generatedcode,id_fromincome,disbursement_remarks,disbursement_amount,SUM(disbursement_amount) as sumdisburse')
        ->where('disbursement_year',$curr_year)
        ->where('disbursement_month',$curr_month)
        ->where('id_fromincome',$id);
        $query = $this->db->get('tblpaipafdisbursement');
        return $query->result();
    }

    public function getallIpafother($id){
    $date = new DateTime("now");
    $curr_year = $date->format('Y');
    $curr_month = $date->format('F');
        $this->db->select('group_concat(other_title,": ",other_amount separator "<br> ") as try2,income_month,income_day,income_year,generatedcode,id_fromincome,id_incomeP,other_title,other_amount,SUM(other_amount) as sumOther')
        ->where('income_year',$curr_year)
        ->where('income_month',$curr_month)
        ->where('id_fromincome',$id);
        $query = $this->db->get('tblpaipafincomeothers');
        return $query->result();
    }

    public function getalldisburse($id){
    $date = new DateTime("now");
    $curr_year = $date->format('Y');
    $curr_month = $date->format('F');
        $this->db->select('group_concat(disbursement_remarks,": ",disbursement_amount separator "<br> ") as try2 ,disbursement_month,disbursement_day,disbursement_year,generatedcode,id_fromincome,id_ipafdisburse,disbursement_remarks,disbursement_amount,SUM(disbursement_amount) as sumDisburse')
        ->where('disbursement_year',$curr_year)
        ->where('disbursement_month',$curr_month)
        ->where('id_fromincome',$id);
        $query = $this->db->get('tblpaipafdisbursement');
        return $query->result();
    }
    public function getalldisburseedit($id){
    $date = new DateTime("now");
    $curr_year = $date->format('Y');
    $curr_month = $date->format('F');
        $this->db->where('disbursement_year',$curr_year)
        ->where('disbursement_month',$curr_month)
        ->where('id_fromincome',$id);
        $query = $this->db->get('tblpaipafdisbursement');
        return $query->result();
    }

    public function getallvisitors($codegens){
        $date = new DateTime("now");
        $curr_year = $date->format('Y');
        $curr_month = $date->format('F');
        $this->db->select('(no_male_local + no_female_local) as total_local,
            (no_male_foreign + no_female_foreign) as total_foreign,
            (no_male_local + no_male_foreign + no_male_local_student + no_male_local_pwd + no_male_local_sc + no_male_local_children) as total_male,
            (no_female_local + no_female_foreign + no_female_local_student + no_female_local_pwd + no_female_local_sc + no_female_local_children) as total_female,
            (no_male_local_student + no_female_local_student) as total_student,
            (no_male_local_pwd + no_female_local_pwd) as total_pwd,
            (no_male_local_sc + no_female_local_sc) as total_sc,
            (no_male_local_children + no_female_local_children) as total_children,
            (no_female_local + no_female_foreign + no_female_local_student + no_female_local_pwd + no_female_local_sc + no_female_local_children + no_male_local + no_male_foreign + no_male_local_student + no_male_local_pwd + no_male_local_sc + no_male_local_children) as grand_total,
            id_visitors,generatedcode,
            date_month,date_day,
            date_year,
            no_male_local,
            no_female_local,
            no_male_foreign,
            no_female_foreign,
            no_male_local_student,
            no_female_local_student,
            no_male_local_pwd,
            no_female_local_pwd,
            no_male_local_sc,
            no_female_local_sc,
            no_male_local_children,
            no_female_local_children
            ')
        ->join('tbldatemonth','tblpaipafvisitors.date_month = tbldatemonth.month','LEFT')
        ->where('date_year',$curr_year)
        ->where('date_month',$curr_month)
        ->where('generatedcode',$codegens)
        ->order_by('LENGTH(id_month)')
        ->order_by('id_month');
        $query = $this->db->get('tblpaipafvisitors');
        return $query->result();
    }
    public function getsearchallvisitorsGrandtotal($codegens,$year,$month){
        $this->db->select('SUM(no_male_local + no_female_local + no_male_foreign + no_female_foreign + no_male_local_student + no_female_local_student + no_male_local_pwd + no_female_local_pwd + no_male_local_sc + no_female_local_sc + no_male_local_children + no_female_local_children) as overallGrandTotal,
            SUM(no_male_local + no_female_local) as gtadults,
            SUM(no_male_local_student + no_female_local_student) as gtstudents,
            SUM(no_male_local_pwd + no_female_local_pwd) as gtpwd,
            SUM(no_male_local_sc + no_female_local_sc) as gtsc,
            SUM(no_male_local_children + no_female_local_children) as gtchildren,
            SUM(no_male_foreign + no_female_foreign) as gtforeign,
            id_visitors,generatedcode,date_month,date_day,date_year,no_male_local,no_female_local,no_male_foreign,no_female_foreign')
        ->where('date_month',$month)
        ->where('date_year',$year)
        ->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaipafvisitors');
        return $query->result();
    }

    public function getgrandtotalvisitors($codegens){
    $date = new DateTime("now");
    $curr_year = $date->format('Y');
    $curr_month = $date->format('F');
        $this->db->select('SUM(no_male_local + no_female_local + no_male_foreign + no_female_foreign + no_male_local_student + no_female_local_student + no_male_local_pwd + no_female_local_pwd + no_male_local_sc + no_female_local_sc + no_male_local_children + no_female_local_children) as overallGrandTotal,
            SUM(no_male_local + no_female_local) as gtadults,
            SUM(no_male_local_student + no_female_local_student) as gtstudents,
            SUM(no_male_local_pwd + no_female_local_pwd) as gtpwd,
            SUM(no_male_local_sc + no_female_local_sc) as gtsc,
            SUM(no_male_local_children + no_female_local_children) as gtchildren,
            SUM(no_male_foreign + no_female_foreign) as gtforeign,
            id_visitors,generatedcode,date_month,date_day,date_year,no_male_local,no_female_local,no_male_foreign,no_female_foreign')
        ->where('date_month',$curr_month)
        ->where('date_year',$curr_year)
        ->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaipafvisitors');
        return $query->result();
    }

    public function getsearchallvisitors($codegens,$year,$month){
        $this->db->select('(no_male_local + no_female_local) as total_local,
            (no_male_foreign + no_female_foreign) as total_foreign,
            (no_male_local + no_male_foreign + no_male_local_student + no_male_local_pwd + no_male_local_sc + no_male_local_children) as total_male,
            (no_female_local + no_female_foreign + no_female_local_student + no_female_local_pwd + no_female_local_sc + no_female_local_children) as total_female,
            (no_male_local_student + no_female_local_student) as total_student,
            (no_male_local_pwd + no_female_local_pwd) as total_pwd,
            (no_male_local_sc + no_female_local_sc) as total_sc,
            (no_male_local_children + no_female_local_children) as total_children,
            (no_female_local + no_female_foreign + no_female_local_student + no_female_local_pwd + no_female_local_sc + no_female_local_children + no_male_local + no_male_foreign + no_male_local_student + no_male_local_pwd + no_male_local_sc + no_male_local_children) as grand_total,
            id_visitors,generatedcode,
            date_month,date_day,
            date_year,
            no_male_local,
            no_female_local,
            no_male_foreign,
            no_female_foreign,
            no_male_local_student,
            no_female_local_student,
            no_male_local_pwd,
            no_female_local_pwd,
            no_male_local_sc,
            no_female_local_sc,
            no_male_local_children,
            no_female_local_children
            ')
        // ->join('tbldatemonth','tblpaipafvisitors.date_month = tbldatemonth.month','LEFT')
        ->where('date_year',$year)
        ->where('date_month',$month)
        ->where('generatedcode',$codegens)
        ->order_by('LENGTH(date_day)')
        ->order_by('date_day');
        $query = $this->db->get('tblpaipafvisitors');
        return $query->result();
    }

    public function getAllcontri($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaipafcontri');
        return $query->result();
    }

    public function getBDFEimages($codegens){
        $this->db->where('bdfe_codegen',$codegens);
        $query = $this->db->get('tblpalivelihoodmultiimage');
        return $query->result();
    }

     public function getBDFEpoproducts($codegens){
        $this->db->where('bdfe_codegen',$codegens);
        $query = $this->db->get('tblpalivelihood_po_product');
        return $query->result();
    }

    public function getBDFEappraisals($codegens){
        $this->db->join('tblpalivelihood_bdfe_level','tblpalivelihood_appraisal.bdfe_level = tblpalivelihood_bdfe_level.id_bdfe_level','Left');
        $this->db->where('bdfe_codegen',$codegens);
        $query = $this->db->get('tblpalivelihood_appraisal');
        return $query->result();
    }

    public function getBDFEappraisalsSTREGNTHBAMS($appraisal_code){
        $this->db->join('tbldatemonth','tblbamsresult.bams_date_month = tbldatemonth.id_month','Left');
        $this->db->join('tblpamaintenure_status','tblbamsresult.bams_status = tblpamaintenure_status.id_tenure_status','Left');
        $this->db->where('bdfe_appraisal_code',$appraisal_code);
        $query = $this->db->get('tblbamsresult');
        return $query->result();
    }

    public function getBDFEappraisalsSTREGNTHSEAMS($appraisal_code){
        $this->db->join('tbldatemonth','tblseamsresult.seams_date_month = tbldatemonth.id_month','Left');
        $this->db->join('tblpamaintenure_status','tblseamsresult.seams_status = tblpamaintenure_status.id_tenure_status','Left');
        $this->db->where('bdfe_appraisal_code',$appraisal_code);
        $query = $this->db->get('tblseamsresult');
        return $query->result();
    }

    public function getPOlocations($codegens){
        $this->db->join('tbllocregion','tblpalivelihoodpolocation.lh_regs = tbllocregion.id','Left')
                 ->join('tbllocprovince','tblpalivelihoodpolocation.lh_provs = tbllocprovince.id_p','Left')
                 ->join('tbllocmunicipality','tblpalivelihoodpolocation.lh_muns = tbllocmunicipality.id_m','Left')
                 ->join('tbllocbarangay','tblpalivelihoodpolocation.lh_barangays = tbllocbarangay.id_b','Left')
        ->where('bdfe_codegen',$codegens);
        $query = $this->db->get('tblpalivelihoodpolocation');
        return $query->result();
    }

    // public function getallbdfelocation($codegens){
    //     $this->db->join('tbllocregion','tblpalivelihoodpolocation.lh_regs = tbllocregion.id','Left')
    //              ->join('tbllocprovince','tblpalivelihoodpolocation.lh_provs = tbllocprovince.id_p','Left')
    //              ->join('tbllocmunicipality','tblpalivelihoodpolocation.lh_muns = tbllocmunicipality.id_m','Left')
    //              ->join('tbllocbarangay','tblpalivelihoodpolocation.lh_barangays = tbllocbarangay.id_b','Left')
    //     ->where('bdfe_codegen',$codegens);
    //     $query = $this->db->get('tblpalivelihoodpolocation');
    //     return $query->result();
    // }

    public function getAllff($codegens){
        $this->db->join('tblpaforestformationtype','tblpaforestformation_details.forest_formation = tblpaforestformationtype.id_fftype','Left')
        ->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaforestformation_details');
        return $query->result();
    }

    public function getallcertificatebyMonth($codegens){
        $this->db->join('tbldatemonth','tblipafincomecertificate_monthly.certificate_date_month = tbldatemonth.id_month','Left');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblipafincomecertificate_monthly');
        return $query->result();
    }

    public function getallcertificatebyWeek($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblipafincomecertificate_weekly');
        return $query->result();
    }

    public function getallcertificatebyDay($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblipafincomecertificate_daily');
        return $query->result();
    }

    public function getAllfftotal($codegens){
        $this->db->select('SUM(forest_formation_area) as gtotal');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaforestformation_details');
        return $query->result();
    }

    public function getAllInland($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpainland');
        return $query->result();
    }

    public function getAllInlandTotal($codegens){
        $this->db->select('SUM(inland_area) as gtotal');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpainland');
        return $query->result();
    }

    public function getAllwetland($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpawetland');
        return $query->result();
    }

    public function getAllwetlandtotal($codegens){
        $this->db->select('SUM(wetland_area) as gtotal');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpawetland');
        return $query->result();
    }

    public function getAllcavesimages($codegen){
        $this->db->where('cavegenerator',$codegen);
        $query = $this->db->get('tblpacaves_images');
        return $query->result();
    }

    public function getapasuinfo($codegens){
        $this->db->join('tblsex','tblpaapasuinfo.apasu_sex = tblsex.id','left');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaapasuinfo');
        return $query->result();
    }

    public function getapasuinfoSO($code){
        $this->db->where('apasu_code',$code);
        $query = $this->db->get('tblapasu_sofile');
        return $query->result();
    }

    public function getAllcaves($codegens){
        $this->db->join('tbllocprovince','tblpacaves.cave_province = tbllocprovince.id_p','left')
        ->join('tbllocmunicipality','tblpacaves.cave_municipal = tbllocmunicipality.id_m','left')
        ->join('tbllocbarangay','tblpacaves.cave_barangay = tbllocbarangay.id_b','left')
        ->join('tblpacavestatus','tblpacaves.cave_status = tblpacavestatus.id_cave_status','left')
        ->join('tblcaveclassificationsub','tblpacaves.cave_class_sub = tblcaveclassificationsub.id_sub_class ','left')
        ->join('tblcaveclassification','tblpacaves.land_status = tblcaveclassification.id_cave_class','left')
        ->where('generatedcode',$codegens);
        $query = $this->db->get('tblpacaves');
        return $query->result();
    }

    public function getAlliw($codegens){
        $this->db->join('tbllocprovince','tblpainlandwetland.iw_province = tbllocprovince.id_p','left')
        ->join('tbllocmunicipality','tblpainlandwetland.iw_municipal = tbllocmunicipality.id_m','left')
        ->join('tblwetlandtypes','tblpainlandwetland.wetland_type = tblwetlandtypes.id_wetland','left')
        ->join('tblhydrology_waterclass','tblpainlandwetland.waterbody_classID = tblhydrology_waterclass.id_waterClass','left')
        ->join('tblhydrology_waterclass_sub','tblpainlandwetland.waterbodysub_classID = tblhydrology_waterclass_sub.id_waterClassSub ','left')
        ->where('generatedcode',$codegens);
        $query = $this->db->get('tblpainlandwetland');
        return $query->result();
    }

    public function getAllhiw($codegens){
        $this->db->join('tbllocprovince','tblpainlandhumanmade.hiw_province = tbllocprovince.id_p','left')
        ->join('tbllocmunicipality','tblpainlandhumanmade.hiw_municipal = tbllocmunicipality.id_m','left')
        ->join('tblwetlandtypes','tblpainlandhumanmade.hwetland_type = tblwetlandtypes.id_wetland','left')
        ->join('tblpainlandwaterbodyclass','tblpainlandhumanmade.hwaterbody_classID = tblpainlandwaterbodyclass.id_waterclass','left')
        ->where('generatedcode',$codegens);
        $query = $this->db->get('tblpainlandhumanmade');
        return $query->result();
    }

    public function getAllcavestotal($codegens){
        $this->db->select('SUM(caves_area) as gtotal');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpacaves');
        return $query->result();
    }

    public function getAlleconpdf($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get($this->tableecon);
        return $query->result();
    }
    public function getresofileTransmit($transmit){
        $this->db->join('tbldatemonth','tblpambreso_transmittal.month_transmital = tbldatemonth.id_month','left');
        $this->db->join('tbldateyear','tblpambreso_transmittal.year_transmital = tbldateyear.id_year','left');
        $this->db->where('transmitcode',$transmit);
        $query = $this->db->get('tblpambreso_transmittal');
        return $query->result();
    }

    public function getresofile($codegens){
        $this->db->select('
                           tbm1.id_month as month1,
                           tby1.id_year as year1,
                           tbm.id_month as month2,
                           tby.id_year as year2,

                           tbm1.month as m1,
                           tby1.year as y1,
                           tbm.month as m2,
                           tby.year as y2,
                           id_resolution,id_research,id_researchPamBFile,research_code,pambreso_code,id_researchmain,generatedcode,resolution_name,resolution_no,file_reso,month_chair,year_chair,month_sec ,year_sec,status,status_desc,transmitcode
                           ');
        $this->db->join('tbldatemonth as tbm1','tblpambreso.month_chair = tbm1.id_month','left');
        $this->db->join('tbldateyear as tby1','tblpambreso.year_chair = tby1.id_year','left');
        $this->db->join('tbldatemonth as tbm','tblpambreso.month_sec = tbm.id_month','left');
        $this->db->join('tbldateyear as tby','tblpambreso.year_sec = tby.id_year','left');
        $this->db->join('tblpambstatus_file','tblpambreso.status = tblpambstatus_file.id_file_status','left');
        $this->db->where('pambreso_code',$codegens);
        $query = $this->db->get('tblpambreso');
        return $query->result();
    }

    public function pambtransmitalload($pambcode)
    {
        $this->db->join('tbldatemonth as tbm1','tblpambreso_transmittal.month_transmital = tbm1.id_month','left');
        $this->db->join('tbldateyear as tby1','tblpambreso_transmittal.year_transmital = tby1.id_year','left');
        $this->db->where('pambreso_code', $pambcode);
        $query = $this->db->get('tblpambreso_transmittal');
        return $query->result();
    }

    public function countpambminutesofmeetings($cs)
    {
        $this->db->where('pambreso_code', $cs);
        $query = $this->db->get('tblpambreso');
        return $query->num_rows();
    }

    public function pambminutesofmeetings($codegens)
    {
        $this->db->join('tbldatemonth as tbm1','tblpambreso_minutes.month_minutes = tbm1.id_month','left');
        $this->db->join('tbldateyear as tby1','tblpambreso_minutes.year_minutes = tby1.id_year','left');
        $this->db->where('generatedcode', $codegens);
        $query = $this->db->get('tblpambreso_minutes');
        return $query->result();
    }

    public function getmngmtplansfile($codegens){
        $this->db->join('tbldatemonth','tblpamanagementplan.mpMonth = tbldatemonth.id_month','left');
        $this->db->join('tbldateyear','tblpamanagementplan.mpYear = tbldateyear.id_year','left');
        $this->db->join('tblpamanagementplanstatus','tblpamanagementplan.mpStatus = tblpamanagementplanstatus.id_mpstatus','left');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpamanagementplan');
        return $query->result();
    }

    public function getCEPAMultimedia($codegens){
        $this->db->join('tblpamaincepa_multimedia_list','tblpamaincepa_multimedia_materials.multimedia = tblpamaincepa_multimedia_list.id_cepa_multimedia','left');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpamaincepa_multimedia_materials');
        return $query->result();
    }

    public function getCEPASocialmedia($codegens){
        $this->db->join('tblpamaincepa_multimedia_list','tblpamaincepa_socialmedia_materials.multimedia = tblpamaincepa_multimedia_list.id_cepa_multimedia','left');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpamaincepa_socialmedia_materials');
        return $query->result();
    }

    public function getCEPAradiostations($codegens){
        $this->db->join('tblpamaincepa_multimedia_list','tblpamaincepa_radiostation.radiostation = tblpamaincepa_multimedia_list.id_cepa_multimedia','left');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpamaincepa_radiostation');
        return $query->result();
    }

    public function getAlliccip($codegens){
        // $this->db->select('tbliccip.id_iccip, tblsrpaotribe.id_tribe, tblsrpaotribe.tribe_name, iccip, tbliccip.generatedcode, male_iccip, female_iccip, SUM(male_iccip+female_iccip) as Total_iccip');
        $this->db->join('tblsrpaotribe','tbliccip.iccip = tblsrpaotribe.id_tribe','left');
        $this->db->where('generatedcode',$codegens);
        $this->db->order_by('iccip','ASC');
        $query = $this->db->get('tbliccip');
        return $query->result();
    }
    public function getAlliccipTotal($codegens){
        $this->db->select('tbliccip.id_iccip, iccip, tbliccip.generatedcode, male_iccip, female_iccip, SUM(male_iccip+female_iccip) as Total_iccip, sum(male_iccip) as total_male,sum(female_iccip) as total_female');
        $this->db->where('generatedcode',$codegens);
        $this->db->order_by('iccip','ASC');
        $query = $this->db->get('tbliccip');
        return $query->result();
    }

    public function getAllcoralreefsSpecies($codegens){
        $this->db->join('tblpacoastalcoralspecies','tblpacoastalcoralspeciesdata.coralspecies_id = tblpacoastalcoralspecies.id_coral_species','left');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpacoastalcoralspeciesdata');
        return $query->result();
    }

    public function getallfishspeciesdata($codegens){
        $this->db->join('tblcoastalmarine_fishspecies','tblcoastalmarinefishspecies.fishspecies_ids = tblcoastalmarine_fishspecies.id_fishspecies','left');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblcoastalmarinefishspecies');
        return $query->result();
    }

    public function getAllcoralreefss($codegens){
        $this->db->join('tbldatemonth','tblpacoastalcoral_details.coral_date_month = tbldatemonth.id_month','left');
        $this->db->join('tbldateday','tblpacoastalcoral_details.coral_date_day = tbldateday.id_day','left');
        $this->db->join('tbldateyear','tblpacoastalcoral_details.coral_date_year = tbldateyear.id_year','left');
        $this->db->join('tbltblpacoastalcoraltaus','tblpacoastalcoral_details.taus_category = tbltblpacoastalcoraltaus.id_taus','left');
        $this->db->join('tblpacoastalcoralhcc','tblpacoastalcoral_details.hcc_category = tblpacoastalcoralhcc.id_coral_hcc','left');
        $this->db->join('tblpacoastalcoralmap','tblpacoastalcoral_details.generatedcode = tblpacoastalcoralmap.generatedcode','left');
        $this->db->where('tblpacoastalcoral_details.generatedcode',$codegens);
        $query = $this->db->get('tblpacoastalcoral_details');
        return $query->result();
    }

    public function getAllseagrass($codegens){
        $this->db->join('tbldatemonth','tblpacoastalseagrass_details.seagrass_date_month = tbldatemonth.id_month','left');
        $this->db->join('tbldateday','tblpacoastalseagrass_details.seagrass_date_day = tbldateday.id_day','left');
        $this->db->join('tbldateyear','tblpacoastalseagrass_details.seagrass_date_year = tbldateyear.id_year','left');
        $this->db->join('tblseagrassdiversity','tblpacoastalseagrass_details.diversity_index = tblseagrassdiversity.id_diversity_index','left');
        $this->db->join('tblpacoastalseagrasscondition','tblpacoastalseagrass_details.seagrass_conditions = tblpacoastalseagrasscondition.id_seagrass_condition','left');
        $this->db->join('tblpacoastalseagrassmap','tblpacoastalseagrass_details.generatedcode = tblpacoastalseagrassmap.generatedcode','left');
        $this->db->where('tblpacoastalseagrass_details.generatedcode',$codegens);
        $query = $this->db->get('tblpacoastalseagrass_details');
        return $query->result();
    }

    public function getAllmangroveSpeciesdata($codegens){
        $this->db->join('tblpacoastalmangrovespecies','tblpacoastalmangrovespeciesdata.mangrove_species = tblpacoastalmangrovespecies.id_mangrove_species','left');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpacoastalmangrovespeciesdata');
        return $query->result();
    }

    public function getAllfishdetails($codegens){
        $this->db->join('tblcoastalmarine_fishspecies','tblcoastalmarinefish.fishspecies_id = tblcoastalmarine_fishspecies.id_fishspecies','left');
        $this->db->join('tblpacoastalfishcategory','tblcoastalmarinefish.fish_category = tblpacoastalfishcategory.id_fish_category','left');
        $this->db->join('tblpacoastalfishdiversity','tblcoastalmarinefish.fish_diversity = tblpacoastalfishdiversity.id_fish_diversity','left');
        $this->db->join('tblpacoastalfishdensity','tblcoastalmarinefish.fishdensity = tblpacoastalfishdensity.id_fish_density','left');
        $this->db->join('tblpacoastalfishbiomass','tblcoastalmarinefish.fishbiomass = tblpacoastalfishbiomass.id_fishbiomass','left');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblcoastalmarinefish');
        return $query->result();
    }

     public function getallbamsresults($codegens){
        $this->db->join('tblpamaintenure_status','tblbamsresult.bams_status = tblpamaintenure_status.id_tenure_status','left');
        $this->db->join('tbldatemonth','tblbamsresult.bams_date_month = tbldatemonth.id_month','left');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblbamsresult');
        return $query->result();
    }

    public function getallbmsresults($codegens){
        $this->db->join('tblpamaintenure_status','tblbmsresult.bms_status = tblpamaintenure_status.id_tenure_status','left');
        $this->db->join('tbldatemonth','tblbmsresult.bms_date_month = tbldatemonth.id_month','left');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblbmsresult');
        return $query->result();
    }

    public function getallseamsresults($codegens){
        $this->db->join('tblseams_status','tblseamsresult.seams_status = tblseams_status.seams_id_stat','left');
        $this->db->join('tbldatemonth','tblseamsresult.seams_date_month = tbldatemonth.id_month','left');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblseamsresult');
        return $query->result();
    }

    public function getallmettresults($codegens){
        $this->db->join('tblmett_status','tblmettresult.mes_status = tblmett_status.mett_id_stat','left');
        $this->db->join('tbldatemonth','tblmettresult.mett_date_month = tbldatemonth.id_month','left');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblmettresult');
        return $query->result();
    }

    public function getallecorresults($codegens){
        $this->db->join('tblecoimpact_stat','tblecorresult.ecor_status = tblecoimpact_stat.ecoimpact_id','left');
        $this->db->join('tbldatemonth','tblecorresult.ecor_date_month = tbldatemonth.id_month','left');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblecorresult');
        return $query->result();
    }

    public function getAllmangrove($codegens){
        $this->db->join('tbldatemonth','tblpacoastalmangrove_details.mangrove_date_month = tbldatemonth.id_month','left');
        $this->db->join('tbldateday','tblpacoastalmangrove_details.mangrove_date_day = tbldateday.id_day','left');
        $this->db->join('tbldateyear','tblpacoastalmangrove_details.mangrove_date_year = tbldateyear.id_year','left');
        $this->db->join('tblpacoastalmangrovecondition','tblpacoastalmangrove_details.mangrove_condition = tblpacoastalmangrovecondition.id_mangrove_condition','left');
        $this->db->join('tblpacoastalmangrove_regen','tblpacoastalmangrove_details.regen_cat = tblpacoastalmangrove_regen.id_regen','left');
        $this->db->join('tblpacoastalmangrove_height','tblpacoastalmangrove_details.height_cat = tblpacoastalmangrove_height.id_mangrove_height','left');
        $this->db->join('tblpacoastalmangrove_observation','tblpacoastalmangrove_details.observe_cat = tblpacoastalmangrove_observation.id_observation','left');
        $this->db->join('tblpacoastalmangrove_diversity','tblpacoastalmangrove_details.divert_cat = tblpacoastalmangrove_diversity.id_mangrove_diversity','left');
        // $this->db->join('tblpacoastalmangrovemap','tblpacoastalmangrove_details.generatedcode = tblpacoastalmangrovemap.generatedcode','left');
        $this->db->where('tblpacoastalmangrove_details.generatedcode',$codegens);
        $query = $this->db->get('tblpacoastalmangrove_details');
        return $query->result();
    }

    public function getAllseagrassSpecies($codegens){
        $this->db->join('tblpacoastalseagrassspecies','tblpacoastalseagrassspeciesdata.seagrass_species_name = tblpacoastalseagrassspecies.id_seagrassSpecies','left');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpacoastalseagrassspeciesdata');
        return $query->result();
    }

    public function getAllcoralreef($codegens){
        $this->db->join('tbldatemonth','tblpacoastalcoral.coral_month = tbldatemonth.id_month','left');
        $this->db->join('tbldateday','tblpacoastalcoral.coral_day = tbldateday.id_day','left');
        $this->db->join('tbldateyear','tblpacoastalcoral.coral_year = tbldateyear.id_year','left');
        $this->db->join('tblpacoastalcoralhcc','tblpacoastalcoral.coralreef_hcc = tblpacoastalcoralhcc.id_coral_hcc','left');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpacoastalcoral');
        return $query->result();
    }

    public function getAllcoralreeflocation($codegens){
        $this->db->join('tbllocmunicipality','tblpacoastalcorallocation.coral_municipal = tbllocmunicipality.id_m','left');
        $this->db->join('tbllocbarangay','tblpacoastalcorallocation.coral_barangay = tbllocbarangay.id_b','left');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpacoastalcorallocation');
        return $query->result();
    }

    public function getAllcoralreefdomspecies($codegens){
        $this->db->join('tblpacoastalcoralspecies','tblpacoastalcoralspeciesdata.coralspecies_id = tblpacoastalcoralspecies.id_coral_species','left');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpacoastalcoralspeciesdata');
        return $query->result();
    }
    public function getAllcoralreefaso($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpacoastalcoralspeciescomposition');
        return $query->result();
    }

    public function getAllcoralreefmonitoringsite($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpacoastalcoralspeciesmonitoringsite');
        return $query->result();
    }

    public function getAllcoralreefkmlkmz($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpacoastalcoralkmlkmz');
        return $query->result();
    }

    public function getAllseamsdemo($codegens){
        $this->db->join('tbllocregion','tblseamsdemographic.seams_region = tbllocregion.id','left');
        $this->db->join('tbllocprovince','tblseamsdemographic.seams_province = tbllocprovince.id_p','left');
        $this->db->join('tbllocmunicipality','tblseamsdemographic.seams_municipality = tbllocmunicipality.id_m','left');
        $this->db->join('tbllocbarangay','tblseamsdemographic.seams_barangay = tbllocbarangay.id_b','left');
        $this->db->join('tblsex','tblseamsdemographic.seams_sex_head = tblsex.id','left');
        $this->db->join('tbldatemonth','tblseamsdemographic.date_occupy_month = tbldatemonth.id_month','left');
        $this->db->join('tbldateyear','tblseamsdemographic.date_occupy_year = tbldateyear.id_year','left');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblseamsdemographic');
        return $query->result();
    }

    public function getAllbarangayseams($codegens){
        $this->db->join('tbllocregion','tblseamsdemographic.seams_region = tbllocregion.id','left');
        $this->db->join('tbllocprovince','tblseamsdemographic.seams_province = tbllocprovince.id_p','left');
        $this->db->join('tbllocmunicipality','tblseamsdemographic.seams_municipality = tbllocmunicipality.id_m','left');
        $this->db->join('tbllocbarangay','tblseamsdemographic.seams_barangay = tbllocbarangay.id_b','left');
        $this->db->join('tblsex','tblseamsdemographic.seams_sex_head = tblsex.id','left');
        $this->db->join('tbldatemonth','tblseamsdemographic.date_occupy_month = tbldatemonth.id_month','left');
        $this->db->join('tbldateyear','tblseamsdemographic.date_occupy_year = tbldateyear.id_year','left');
        $this->db->where('generatedcode',$codegens);
        $this->db->group_by('tblseamsdemographic.seams_barangay');
        $query = $this->db->get('tblseamsdemographic');
        return $query->result();
    }


    public function insertGallery($data = [])
    {
        return $this->db->insert('gallery',$data);
    }

    public function insertproject_report($data = [])
    {
        return $this->db->insert('tblmainprojects_files',$data);
    }

    public function insertresearchReportFile($data = [])
    {
        return $this->db->insert('tblmainresearch_files',$data);
    }

    public function inserttransmitalFile($data = [])
    {
        return $this->db->insert('tblpambreso_transmittal',$data);
    }

    public function insertmanualoperationFile($data = [])
    {
        return $this->db->insert('tblpasumanualoperation',$data);
    }

    public function insertpasusoFile($data = [])
    {
        return $this->db->insert('tblpasu_sofile',$data);
    }

    public function insertlegismapcompile($data = [])
    {
        return $this->db->insert('tblpamainlegislation_compilemap',$data);
    }

    public function insertapasusoFile($data = [])
    {
        return $this->db->insert('tblapasu_sofile',$data);
    }

    public function insertresominutesFile($data = [])
    {
        return $this->db->insert('tblpambreso_minutes',$data);
    }

    public function insertcepamaterialsprintFile($data = [])
    {
        return $this->db->insert('tblpamaincepa_print_materials',$data);
    }

    public function insertcepasouveniritem($data = [])
    {
        return $this->db->insert('tblpamaincepa_souvenir',$data);
    }

    public function insertCoraldetails($data = [])
    {
        return $this->db->insert('tblpacoastalcoral_details',$data);
    }

    public function insertSeagrassdetails($data = [])
    {
        return $this->db->insert('tblpacoastalseagrass_details',$data);
    }

    public function insertMangrovedetails($data = [])
    {
        return $this->db->insert('tblpacoastalmangrove_details',$data);
    }

    public function insertFishdetails($data = [])
    {
        return $this->db->insert('tblcoastalmarinefish',$data);
    }

    public function insertFishspeciesData($data = [])
    {
        return $this->db->insert('tblcoastalmarinefishspecies',$data);
    }

    public function insertCoralsSpecies($data = [])
    {
        return $this->db->insert('tblpacoastalcoralspeciesdata',$data);
    }

    public function insertSeagrassSpecies($data = [])
    {
        return $this->db->insert('tblpacoastalseagrassspeciesdata',$data);
    }

    public function insertMangroveSpecies($data = [])
    {
        return $this->db->insert('tblpacoastalmangrovespeciesdata',$data);
    }

    public function insertsapamonitoringreport($data = [])
    {
        return $this->db->insert('tblpamaintenuresapamonitoring',$data);
    }

    public function insertmoamonitoringreportEdit($data = [])
    {
        return $this->db->insert('tblpamaintenuremoamonitoring',$data);
    }

    public function insertmoamonitoringreport($data = [])
    {
        return $this->db->insert('tblpamaintenuremoamonitoring',$data);
    }

    public function insertappraisalRHA($data = [])
    {
        return $this->db->insert('tblpalivelihood_appraisalrha_file',$data);
    }

    public function insertKAPReport($data = [])
    {
        return $this->db->insert('tblpamaincepa_kap_surveyed',$data);
    }

    public function insertcepaactivityreportImage($data = [])
    {
        return $this->db->insert('tblpamaincepa_activity_img',$data);
    }

    public function insertthreatmultipleImage($data = [])
    {
        return $this->db->insert('tblpathreat_multi_img',$data);
    }

    public function insertbdfephotodocs($data = [])
    {
        return $this->db->insert('tblpalivelihood_bdfe_supportmaterialphotodoc',$data);
    }

    public function insertcepasouvenirFile($data = [])
    {
        return $this->db->insert('tblpamaincepa_souvenir',$data);
    }

    public function insertresearchPAMBReso($data = [])
    {
        $this->db->insert('tblmainresearch_pambreso',$data);
        return $this->db->insert_id();
    }

    public function insertresearchPAMBResoNew($data = [])
    {
        $this->db->insert('tblmainresearch_pambreso',$data);
        return $this->db->insert_id();
    }

    public function save_incomes($rel_data7){

        for($x = 0; $x < count($rel_data7); $x++){
            $data[] = array(
                "generatedcode"         => $rel_data7[$x]['codegen'],
                "date_year"        => $rel_data7[$x]['date_year'],
                "date_month"           => $rel_data7[$x]['date_month'],
                "localmale"           => $rel_data7[$x]['localmale'],
                "localfemale"           => $rel_data7[$x]['localfemale'],
                "foreignmale"                 => $rel_data7[$x]['foreignmale'],
                "foreignfemale"           => $rel_data7[$x]['foreignfemale'],
                "entrance"             => $rel_data7[$x]['entrance'],
                "parkingfee"            => $rel_data7[$x]['parkingfee'],
                "rentalsfee"    => $rel_data7[$x]['rentalsfee'],
                "others"          => $rel_data7[$x]['others'],
            );
        }

        try{
            for($x =0; $x<count($rel_data7); $x++){
                $this->db->insert('tblpavisitorsrate',$data[$x]);
                // $this->db->where('status !=',null);
            }
            return "success";
        }catch(Exception $e){
            return "failed";
        }
    }

    public function getallIncome($codegens){
        $this->db->select(" tbldateyear.year,
                            tbldatemonth.month,
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

        $this->db->join('tbldateyear','tblpavisitorsrate.date_year = tbldateyear.id_year','left');
        $this->db->join('tbldatemonth','tblpavisitorsrate.date_month = tbldatemonth.id_month','left');
        $this->db->order_by('tblpavisitorsrate.date_year','DESC');
        $this->db->order_by("STR_TO_DATE('tblpavisitorsrate.date_month','%m')");

        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get($this->table10);
        return $query->result();

    }

    public function getallfee($codegens){
        $this->db->select("id_fee,date_month,locMale,locFemale,forMale,forFemale,date_day,date_year,generatedcode,fil_adults,fil_students,fil_distab,foreigner,facility_tables,facility_cottages_day,facility_cottages_night,facility_campingsite,
                facility_swimmingpool,facility_bcourt_daytime,facility_bcourt_light,facility_dockingarea,special_docking_area,facility_parkingarea,parking_tricycle,
                parking_cars,parking_jeep,parking_bus,recreational_waterbase_activity_foreign,recreational_waterbase_activity_local,recreational_hiking_foreign,
                recreational_hiking_local,trekking_biking_foreign,commercialdoc_photography,trekking_biking_local,scuba_foreign,scuba_local");

        $this->db->where('generatedcode',$codegens);
        $this->db->order_by('date_month');
        $this->db->order_by('date_month');
        $this->db->order_by('date_day');

        $query = $this->db->get($this->fee_new);
        return $query->result();
    }


    public function getallfeeReport($user_id){
        $this->db->select("id_fee,date_month,date_day,date_year,generatedcode,fil_adults,fil_students,fil_distab,foreigner,facility_tables,facility_cottages_day,facility_cottages_night,facility_campingsite,
                facility_swimmingpool,facility_bcourt_daytime,facility_bcourt_light,facility_dockingarea,special_docking_area,facility_parkingarea,parking_tricycle,
                parking_cars,parking_jeep,parking_bus,recreational_waterbase_activity_foreign,recreational_waterbase_activity_local,recreational_hiking_foreign,
                recreational_hiking_local,trekking_biking_foreign,commercialdoc_photography,trekking_biking_local,scuba_foreign,scuba_local");

        $this->db->where('pasu_id',$user_id);
        $query = $this->db->get($this->fee_new);
        return $query->result();
    }

    public function getallfeeReportFiltered($codegens,$user_id){
        $this->db->select("id_fee,date_month,date_day,date_year,generatedcode,fil_adults,fil_students,fil_distab,foreigner,facility_tables,facility_cottages_day,facility_cottages_night,facility_campingsite,
                facility_swimmingpool,facility_bcourt_daytime,facility_bcourt_light,facility_dockingarea,special_docking_area,facility_parkingarea,parking_tricycle,
                parking_cars,parking_jeep,parking_bus,recreational_waterbase_activity_foreign,recreational_waterbase_activity_local,recreational_hiking_foreign,
                recreational_hiking_local,trekking_biking_foreign,commercialdoc_photography,trekking_biking_local,scuba_foreign,scuba_local");

        $this->db->where('pasu_id',$user_id);
        $this->db->where('generatedcode',$codegens);
        // $this->db->where('date_month',$months);
        $query = $this->db->get($this->fee_new);
        return $query->result();
    }

    public function getallfeeReportQuerried($searchPa,$year_list,$searchMonth,$user_id){
        $this->db->select("id_fee,locMale,locFemale,forMale,forFemale,date_month,date_day,date_year,generatedcode,fil_adults,fil_students,fil_distab,foreigner,facility_tables,facility_cottages_day,facility_cottages_night,facility_campingsite,
                facility_swimmingpool,facility_bcourt_daytime,facility_bcourt_light,facility_dockingarea,special_docking_area,facility_parkingarea,parking_tricycle,
                parking_cars,parking_jeep,parking_bus,recreational_waterbase_activity_foreign,recreational_waterbase_activity_local,recreational_hiking_foreign,
                recreational_hiking_local,trekking_biking_foreign,commercialdoc_photography,trekking_biking_local,scuba_foreign,scuba_local,
                (locMale + locFemale + forMale + forFemale) as total_visit,
                (fil_adults + fil_students + fil_distab + foreigner) as visitors_total,
                (facility_tables + facility_cottages_day + facility_cottages_night + facility_campingsite + facility_swimmingpool + facility_bcourt_daytime + facility_bcourt_light + facility_dockingarea + special_docking_area) as facilities_total,
                (parking_tricycle + parking_cars + parking_jeep + parking_bus) as parking_total,
                (recreational_waterbase_activity_foreign + recreational_waterbase_activity_local + recreational_hiking_foreign + recreational_hiking_local + trekking_biking_foreign + commercialdoc_photography + trekking_biking_local + scuba_foreign + scuba_local) as other_total,
                (fil_adults + fil_students + fil_distab + foreigner + facility_tables + facility_cottages_day + facility_cottages_night + facility_campingsite + facility_swimmingpool + facility_bcourt_daytime + facility_bcourt_light + facility_dockingarea + special_docking_area + parking_tricycle + parking_cars + parking_jeep + parking_bus + recreational_waterbase_activity_foreign + recreational_waterbase_activity_local + recreational_hiking_foreign + recreational_hiking_local + trekking_biking_foreign + commercialdoc_photography + trekking_biking_local + scuba_foreign + scuba_local) as sub_total
                ");
        $this->db->where('pasu_id',$user_id);
        $this->db->where('generatedcode',$searchPa);
        $this->db->where('date_year',$year_list);
        $this->db->where('date_month',$searchMonth);
        $this->db->order_by('date_day');
        // $this->db->group_by('date_year');
        // $this->db->group_by('date_month');
        // $this->db->or_where("'generatedcode'=$searchPa AND 'date_year'=$year_list", NULL, FALSE);
        $query = $this->db->get($this->fee_new);
        return $query->result();
    }

    public function getAllbiologicalNew($title){
        $this->db->select('*')
                 ->where('commonNameSpecies',$title);
                 $query = $this->db->get($this->spiecies);
                 return $query->result();
    }

    // public function getIpafYear($searchPa,$year_list,$quarter){
    //     $this->db->select('(entrancefee + facilities + resource + concession + SUM(tblpaipafincomeothers.other_amount)) as Grand_total_income,
    //         (entrancefee + facilities + resource + concession + SUM(tblpaipafincomeothers.other_amount))*0.75 as total_75,
    //         (entrancefee + facilities + resource + concession + SUM(tblpaipafincomeothers.other_amount))*0.25 as total_25,
    //         (entrancefee + facilities + resource + concession + SUM(tblpaipafincomeothers.other_amount)) as Grand_total_btr,date_day_income,
    //         id_income,tblpaipafincome.generatedcode,date_month_income,date_year_income,entrancefee,facilities,resource,concession,development,
    //         finespenalties,other_specify_title,other_specify_amount,tbldatemonth.id_month')
    //     ->join('tblpaipafincomeothers','tblpaipafincome.id_income = tblpaipafincomeothers.id_fromincome','LEFT')
    //     ->join('tbldatemonth','tblpaipafincome.date_month_income = tbldatemonth.month','LEFT')
    //     ->where('tblpaipafincome.generatedcode',$searchPa)
    //     ->where('date_year_income',$year_list)
    //     ->where('QtrCode',$quarter)
    //     ->order_by('tbldatemonth.id_month')
    //     ->group_by('date_month_income')
    //     ->order_by('LENGTH(tbldatemonth.id_month)');
    //     $query = $this->db->get('tblpaipafincome');
    //     return $query->result();
    // }

    public function getIpafYear($searchPa,$year_list,$quarter){
        $this->db->select('SUM(entrancefee + facilities + resource + concession ) as Grand_total_income,
            (entrancefee + facilities + resource + concession)*0.75 as total_75,
            (entrancefee + facilities + resource + concession)*0.25 as total_25,
            (entrancefee + facilities + resource + concession) as Grand_total_btr,date_day_income,
            SUM(entrancefee) as sum_entrance,SUM(facilities) as sum_facility,SUM(resource) as sum_resource,SUM(concession) as sum_concession,
            id_income,tblpaipafincome.generatedcode,date_month_income,date_year_income,entrancefee,facilities,resource,concession,other_specify_title,other_specify_amount,tbldatemonth.id_month')
        ->join('tbldatemonth','tblpaipafincome.date_month_income = tbldatemonth.month','LEFT')
        ->where('tblpaipafincome.generatedcode',$searchPa)
        ->where('date_year_income',$year_list)
        ->where('QtrCode',$quarter)
        ->order_by('tbldatemonth.id_month')
        ->group_by('date_month_income')
        ->order_by('LENGTH(tbldatemonth.id_month)');
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function getIpafDisburse($codegens){
        $this->db->select('SUM(entrancefee + facilities + resource + concession ) as Grand_total_income,
            id_income,generatedcode,date_month_income,date_year_income,entrancefee,facilities,resource,concession,other_specify_title,other_specify_amount')
        ->group_by('date_year_income')
        ->where('generatedcode',$codegens)
        ->order_by('LENGTH(date_year_income)');
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function getIpafYearDisburse($palist,$payear,$payearto){
        $this->db->select('SUM(entrancefee + facilities + resource + concession ) as Grand_total_income,
            id_income,generatedcode,date_month_income,date_year_income,entrancefee,facilities,resource,concession,other_specify_title,other_specify_amount')
        ->where('generatedcode',$palist)
        ->where('date_year_income >=', $payear)
        ->where('date_year_income <=', $payearto)
        ->group_by('date_year_income')
        ->order_by('LENGTH(date_year_income)');
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function getGrandTotalincomeDis($codegens){
        $this->db->select('SUM(entrancefee + facilities + resource + concession) as incomSumGT,date_year_income');
        $this->db->join('tblpaipafdisbursementfiles','tblpaipafincome.date_year_income=tblpaipafdisbursementfiles.year_disbursement','LEFT');
        $this->db->where('tblpaipafincome.generatedcode',$codegens);
        $this->db->group_by('tblpaipafdisbursementfiles.generatedcode');
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function getGrandTotalincome($palist,$payear,$payearto){
        $this->db->select('SUM(entrancefee + facilities + resource + concession) as incomSumGT,date_year_income');
        $this->db->join('tblpaipafdisbursementfiles','tblpaipafincome.date_year_income=tblpaipafdisbursementfiles.year_disbursement','LEFT');
        $this->db->where('tblpaipafincome.generatedcode',$palist);
        $this->db->where('year_disbursement >=', $payear);
        $this->db->where('year_disbursement <=', $payearto);
        $this->db->group_by('tblpaipafdisbursementfiles.generatedcode');
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function getGrandTotalincomepdf($searchpa,$disburse_year,$disburse_year_to){
        $this->db->select('SUM(entrancefee + facilities + resource + concession) as incomSumGT,date_year_income');
        $this->db->join('tblpaipafdisbursementfiles','tblpaipafincome.date_year_income=tblpaipafdisbursementfiles.year_disbursement','LEFT');
        $this->db->where('tblpaipafincome.generatedcode',$searchpa);
        $this->db->where('year_disbursement >=', $disburse_year);
        $this->db->where('year_disbursement <=', $disburse_year_to);
        $this->db->group_by('tblpaipafdisbursementfiles.generatedcode');
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function getGrandTotalincome75Dis($codegens){
        $this->db->select('(SUM(entrancefee + facilities + resource + concession)*0.75) as incomSumGT75,date_year_income');
        $this->db->join('tblpaipafdisbursementfiles','tblpaipafincome.date_year_income=tblpaipafdisbursementfiles.year_disbursement','LEFT');
        $this->db->where('tblpaipafincome.generatedcode',$codegens);
        $this->db->where('disbursement_oldsubfund !=','0.00');
        $this->db->group_by('tblpaipafdisbursementfiles.generatedcode');
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function getGrandTotalincome75($palist,$payear,$payearto){
        $this->db->select('(SUM(entrancefee + facilities + resource + concession)*0.75) as incomSumGT75,date_year_income');
        $this->db->join('tblpaipafdisbursementfiles','tblpaipafincome.date_year_income=tblpaipafdisbursementfiles.year_disbursement','LEFT');
        $this->db->where('tblpaipafincome.generatedcode',$palist);
        $this->db->where('year_disbursement >=', $payear);
        $this->db->where('year_disbursement <=', $payearto);
        $this->db->where('disbursement_oldsubfund !=','0.00');
        $this->db->group_by('tblpaipafdisbursementfiles.generatedcode');
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function getGrandTotalincome75pdf($searchpa,$disburse_year,$disburse_year_to){
        $this->db->select('(SUM(entrancefee + facilities + resource + concession)*0.75) as incomSumGT75,date_year_income');
        $this->db->join('tblpaipafdisbursementfiles','tblpaipafincome.date_year_income=tblpaipafdisbursementfiles.year_disbursement','LEFT');
        $this->db->where('tblpaipafincome.generatedcode',$searchpa);
        $this->db->where('year_disbursement >=', $disburse_year);
        $this->db->where('year_disbursement <=', $disburse_year_to);
        $this->db->where('disbursement_oldsubfund !=','0.00');
        $this->db->group_by('tblpaipafdisbursementfiles.generatedcode');
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function getGrandTotalincomeparia75Dis($codegens){
        $this->db->select('(SUM(entrancefee + facilities + resource + concession)*0.75) as incomSumGTparia75,date_year_income');
        $this->db->join('tblpaipafdisbursementfiles','tblpaipafincome.date_year_income=tblpaipafdisbursementfiles.year_disbursement','LEFT');
        $this->db->where('tblpaipafincome.generatedcode',$codegens);
        $this->db->group_by('tblpaipafdisbursementfiles.generatedcode');
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function getGrandTotalincomeparia75($palist,$payear,$payearto){
        $this->db->select('(SUM(entrancefee + facilities + resource + concession)*0.75) as incomSumGTparia75,date_year_income');
        $this->db->join('tblpaipafdisbursementfiles','tblpaipafincome.date_year_income=tblpaipafdisbursementfiles.year_disbursement','LEFT');
        $this->db->where('tblpaipafincome.generatedcode',$palist);
        $this->db->where('year_disbursement >=', $payear);
        $this->db->where('year_disbursement <=', $payearto);
        // $this->db->where('disbursement_paria !=','0.00');
        $this->db->group_by('tblpaipafdisbursementfiles.generatedcode');
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function getGrandTotalincomeparia75pdf($searchpa,$disburse_year,$disburse_year_to){
        $this->db->select('(SUM(entrancefee + facilities + resource + concession)*0.75) as incomSumGTparia75,date_year_income');
        $this->db->join('tblpaipafdisbursementfiles','tblpaipafincome.date_year_income=tblpaipafdisbursementfiles.year_disbursement','LEFT');
        $this->db->where('tblpaipafincome.generatedcode',$searchpa);
        $this->db->where('year_disbursement >=', $disburse_year);
        $this->db->where('year_disbursement <=', $disburse_year_to);
        // $this->db->where('disbursement_paria !=','0.00');
        $this->db->group_by('tblpaipafdisbursementfiles.generatedcode');
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function sample2pdf($searchpa,$disburse_year,$disburse_year_to){
       $this->db->select('(SUM(entrancefee + facilities + resource + concession)*0.75) as Grand_total_income75ss,
            id_income,date_month_income,date_year_income,entrancefee,facilities,resource,concession,other_specify_title,other_specify_amount')
        ->join('tblpaipafdisbursementfiles','tblpaipafincome.date_year_income=tblpaipafdisbursementfiles.year_disbursement','LEFT')
        ->where('tblpaipafdisbursementfiles.generatedcode',$searchpa)
        ->where('year_disbursement >=', $disburse_year)
        ->where('year_disbursement <=', $disburse_year_to)
        ->where('disbursement_paria !=','0.00')
        ->group_by('tblpaipafincome.generatedcode');
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function sample2Dis(){
        $this->db->select('(SUM(entrancefee + facilities + resource + concession)*0.75) as Grand_total_income75ss,
            id_income,date_month_income,date_year_income,entrancefee,facilities,resource,concession,other_specify_title,other_specify_amount')
        ->join('tblpaipafdisbursementfiles','tblpaipafincome.date_year_income=tblpaipafdisbursementfiles.year_disbursement','LEFT')
        ->where('disbursement_paria !=','0.00')
        ->group_by('tblpaipafincome.generatedcode');
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function sample2($palist,$payear,$payearto){
        $this->db->select('(SUM(entrancefee + facilities + resource + concession)*0.75) as Grand_total_income75ss,
            id_income,date_month_income,date_year_income,entrancefee,facilities,resource,concession,other_specify_title,other_specify_amount')
        ->join('tblpaipafdisbursementfiles','tblpaipafincome.date_year_income=tblpaipafdisbursementfiles.year_disbursement','LEFT')
        ->where('tblpaipafdisbursementfiles.generatedcode',$palist)
        ->where('year_disbursement >=', $payear)
        ->where('year_disbursement <=', $payearto)
        ->where('disbursement_paria !=','0.00')
        ->group_by('tblpaipafincome.generatedcode');
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function getGrandTotalincomesagf25Dis($codegens){
        $this->db->select('(SUM(entrancefee + facilities + resource + concession)*0.25) as incomSumGTsagf5,date_year_income');
        $this->db->join('tblpaipafdisbursementfiles','tblpaipafincome.date_year_income=tblpaipafdisbursementfiles.year_disbursement','LEFT');
        $this->db->where('tblpaipafincome.generatedcode',$codegens);
        $this->db->group_by('tblpaipafdisbursementfiles.generatedcode');
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function getGrandTotalincomesagf25($palist,$payear,$payearto){
        $this->db->select('(SUM(entrancefee + facilities + resource + concession)*0.25) as incomSumGTsagf5,date_year_income');
        $this->db->join('tblpaipafdisbursementfiles','tblpaipafincome.date_year_income=tblpaipafdisbursementfiles.year_disbursement','LEFT');
        $this->db->where('tblpaipafincome.generatedcode',$palist);
        $this->db->where('year_disbursement >=', $payear);
        $this->db->where('year_disbursement <=', $payearto);
        $this->db->group_by('tblpaipafdisbursementfiles.generatedcode');
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function getGrandTotalincomesagf25pdf($searchpa,$disburse_year,$disburse_year_to){
        $this->db->select('(SUM(entrancefee + facilities + resource + concession)*0.25) as incomSumGTsagf5,date_year_income');
        $this->db->join('tblpaipafdisbursementfiles','tblpaipafincome.date_year_income=tblpaipafdisbursementfiles.year_disbursement','LEFT');
        $this->db->where('tblpaipafincome.generatedcode',$searchpa);
        $this->db->where('year_disbursement >=', $disburse_year);
        $this->db->where('year_disbursement <=', $disburse_year_to);
        $this->db->group_by('tblpaipafdisbursementfiles.generatedcode');
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function getGrandTotalincomeDevDis($codegens){
        $this->db->select('SUM(devfee_amount) as incomDevSumGT,dev_year');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaipafdevfee');
        return $query->result();
    }

    public function getGrandTotalincomeDev($palist,$payear,$payearto){
        $this->db->select('SUM(devfee_amount) as incomDevSumGT,dev_year');
        $this->db->where('generatedcode',$palist);
        $this->db->where('dev_year >=', $payear);
        $this->db->where('dev_year <=', $payearto);
        // $this->db->group_by('dev_year');
        $query = $this->db->get('tblpaipafdevfee');
        return $query->result();
    }

    public function getGrandTotalincomeDevpdf($searchpa,$disburse_year,$disburse_year_to){
        $this->db->select('SUM(devfee_amount) as incomDevSumGT,dev_year');
        $this->db->where('generatedcode',$searchpa);
        $this->db->where('dev_year >=', $disburse_year);
        $this->db->where('dev_year <=', $disburse_year_to);
        // $this->db->group_by('dev_year');
        $query = $this->db->get('tblpaipafdevfee');
        return $query->result();
    }

    public function getGrandTotalincomeOtherDis($codegens){
        $this->db->select('SUM(other_amount) as incomOtherSumGT,income_year');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaipafincomeothers');
        return $query->result();
    }

    public function getGrandTotalincomeOther($palist,$payear,$payearto){
        $this->db->select('SUM(other_amount) as incomOtherSumGT,income_year');
        $this->db->where('generatedcode',$palist);
        $this->db->where('income_year >=', $payear);
        $this->db->where('income_year <=', $payearto);
        // $this->db->group_by('income_year');
        $query = $this->db->get('tblpaipafincomeothers');
        return $query->result();
    }

    public function getGrandTotalincomeOtherpdf($searchpa,$disburse_year,$disburse_year_to){
        $this->db->select('SUM(other_amount) as incomOtherSumGT,income_year');
        $this->db->where('generatedcode',$searchpa);
        $this->db->where('income_year >=', $disburse_year);
        $this->db->where('income_year <=', $disburse_year_to);
        // $this->db->group_by('income_year');
        $query = $this->db->get('tblpaipafincomeothers');
        return $query->result();
    }

    public function getAllDisburseGT($codegens){
        $this->db->select('SUM(disbursement_oldsubfund) as GTsubfund,SUM(balance_oldsubfund) as GTsubbalance, SUM(disbursement_paria) as GTdisparia, SUM(balance_paria) as GTdispariabal,SUM(disbursement_sagf) as GTdissagf,SUM(balance_sagf) as GTbalancesagf,disbursement_oldsubfund,year_disbursement');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaipafdisbursementfiles');
        return $query->result();
    }

    public function getAllDisbursementGT($palist,$payear,$payearto){
        $this->db->select('SUM(disbursement_oldsubfund) as GTsubfund,SUM(balance_oldsubfund) as GTsubbalance, SUM(disbursement_paria) as GTdisparia, SUM(balance_paria) as GTdispariabal,SUM(disbursement_sagf) as GTdissagf,SUM(balance_sagf) as GTbalancesagf,disbursement_oldsubfund,year_disbursement');
        $this->db->where('generatedcode',$palist);
        $this->db->where('year_disbursement >=', $payear);
        $this->db->where('year_disbursement <=', $payearto);
        $query = $this->db->get('tblpaipafdisbursementfiles');
        return $query->result();
    }

    public function getAllDisbursementGTpdf($searchpa,$disburse_year,$disburse_year_to){
        $this->db->select('SUM(disbursement_oldsubfund) as GTsubfund,SUM(balance_oldsubfund) as GTsubbalance, SUM(disbursement_paria) as GTdisparia, SUM(balance_paria) as GTdispariabal,SUM(disbursement_sagf) as GTdissagf,SUM(balance_sagf) as GTbalancesagf,disbursement_oldsubfund,year_disbursement');
        $this->db->where('generatedcode',$searchpa);
        $this->db->where('year_disbursement >=', $disburse_year);
        $this->db->where('year_disbursement <=', $disburse_year_to);
        $query = $this->db->get('tblpaipafdisbursementfiles');
        return $query->result();
    }

    public function getIpafYearDisbursePDF($searchpa,$disburse_year,$disburse_year_to){
        $this->db->select('SUM(entrancefee + facilities + resource + concession ) as Grand_total_income,
            id_income,generatedcode,date_month_income,date_year_income,entrancefee,facilities,resource,concession,other_specify_title,other_specify_amount')
        ->where('generatedcode',$searchpa)
        ->where('date_year_income >=', $disburse_year)
        ->where('date_year_income <=', $disburse_year_to)
        ->group_by('date_year_income')
        ->order_by('LENGTH(date_year_income)');
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function countrowother($id,$searchPa,$year_list,$quarter)
    {
        $this->db->join('tbldatemonth','tblpaipafincomeothers.income_month = tbldatemonth.month','LEFT')
        ->where('generatedcode',$searchPa)
        ->where('income_year',$year_list)
        ->where('QtrCode',$quarter);
        $query = $this->db->get('tblpaipafincomeothers');
        return $query->num_rows();
    }

    public function searchallIpafdisbursementbyyear($id,$searchPa,$year_list,$quarter){
        $this->db->select('group_concat(disbursement_remarks,": ",disbursement_amount separator "<br> ") as disbursements,disbursement_month,id_fromincome,disbursement_day,disbursement_year,generatedcode,id_ipafdisburse,disbursement_remarks,disbursement_amount,SUM(disbursement_amount) as sumdisbursement')
        ->join('tbldatemonth','tblpaipafdisbursement.disbursement_month = tbldatemonth.month','LEFT')
        ->where('disbursement_year',$year_list)
        ->where('QtrCode',$quarter)
        ->where('generatedcode',$searchPa)
        ->group_by('disbursement_month');
        $query = $this->db->get('tblpaipafdisbursement');
        return $query->result();
    }

    public function searchallIpafdevelopmentbyyear($id,$searchPa,$year_list,$quarter){
        $this->db->select('group_concat(dev_remarks,": ",devfee_amount separator "<br> ") as developmentdetails,dev_month,id_fromincome,dev_day,dev_year,generatedcode,id_devfees ,dev_remarks,devfee_amount,SUM(devfee_amount) as sumdevelopment')
        ->join('tbldatemonth','tblpaipafdevfee.dev_month = tbldatemonth.month','LEFT')
        ->where('dev_year',$year_list)
        ->where('QtrCode',$quarter)
        ->where('generatedcode',$searchPa)
        ->group_by('dev_month');
        $query = $this->db->get('tblpaipafdevfee');
        return $query->result();
    }

    public function searchallIpafotherbyyear($id,$searchPa,$year_list,$quarter){
        $this->db->select('group_concat(other_title,": ",other_amount separator "<br> ") as try2, income_month,income_day,income_year,generatedcode,id_fromincome,id_incomeP,other_title,other_amount,SUM(other_amount) as sumOther3')
        ->join('tbldatemonth','tblpaipafincomeothers.income_month = tbldatemonth.month','LEFT')
        ->where('generatedcode',$searchPa)
        ->where('income_year',$year_list)
        ->where('QtrCode',$quarter)
        ->group_by('income_month');
        $query = $this->db->get('tblpaipafincomeothers');
        return $query->result();
    }

    public function searchallIpafdevelopmentDisburse($codegens){
        $this->db->select('group_concat(dev_remarks,": ",devfee_amount separator "<br> ") as developmentdetails,dev_month,id_fromincome,dev_day,dev_year,generatedcode,id_devfees ,dev_remarks,devfee_amount,SUM(devfee_amount) as sumdevelopment')
        ->join('tbldateyear','tblpaipafdevfee.dev_year = tbldateyear.id_year','LEFT')
        ->where('generatedcode',$codegens)
        ->group_by('dev_year');
        $query = $this->db->get('tblpaipafdevfee');
        return $query->result();
    }

    public function searchallIpafdevelopmentbyyearDisburse($palist,$payear,$payearto){
        $this->db->select('group_concat(dev_remarks,": ",devfee_amount separator "<br> ") as developmentdetails,dev_month,id_fromincome,dev_day,dev_year,generatedcode,id_devfees ,dev_remarks,devfee_amount,SUM(devfee_amount) as sumdevelopment')
        ->join('tbldateyear','tblpaipafdevfee.dev_year = tbldateyear.id_year','LEFT')
        ->where('year >=', $payear)
        ->where('year <=', $payearto)
        ->where('generatedcode',$palist)
        ->group_by('dev_year');
        $query = $this->db->get('tblpaipafdevfee');
        return $query->result();
    }

    public function searchallIpafdevelopmentbyyearDisbursePDF($searchpa,$disburse_year,$disburse_year_to){
        $this->db->select('group_concat(dev_remarks,": ",devfee_amount separator "<br> ") as developmentdetails,dev_month,id_fromincome,dev_day,dev_year,generatedcode,id_devfees ,dev_remarks,devfee_amount,SUM(devfee_amount) as sumdevelopment')
        ->join('tbldateyear','tblpaipafdevfee.dev_year = tbldateyear.id_year','LEFT')
        ->where('year >=', $disburse_year)
        ->where('year <=', $disburse_year_to)
        ->where('generatedcode',$searchpa)
        ->group_by('dev_year');
        $query = $this->db->get('tblpaipafdevfee');
        return $query->result();
    }

    public function searchallIpafotherDisburse($codegens){
        $this->db->select('group_concat(other_title,": ",other_amount separator "<br> ") as try2, income_month,income_day,income_year,generatedcode,id_fromincome,id_incomeP,other_title,other_amount,SUM(other_amount) as sumOther3')
        ->join('tbldateyear','tblpaipafincomeothers.income_year = tbldateyear.id_year','LEFT')
        ->where('generatedcode',$codegens)
        ->group_by('income_year');
        $query = $this->db->get('tblpaipafincomeothers');
        return $query->result();
    }

    public function searchallIpafotherbyyearDisburse($palist,$payear,$payearto){
        $this->db->select('group_concat(other_title,": ",other_amount separator "<br> ") as try2, income_month,income_day,income_year,generatedcode,id_fromincome,id_incomeP,other_title,other_amount,SUM(other_amount) as sumOther3')
        ->join('tbldateyear','tblpaipafincomeothers.income_year = tbldateyear.id_year','LEFT')
        ->where('generatedcode',$palist)
        ->where('year >=', $payear)
        ->where('year <=', $payearto)
        ->group_by('income_year');
        $query = $this->db->get('tblpaipafincomeothers');
        return $query->result();
    }

    public function searchallIpafotherbyyearDisbursePDF($searchpa,$disburse_year,$disburse_year_to){
        $this->db->select('group_concat(other_title,": ",other_amount separator "<br> ") as try2, income_month,income_day,income_year,generatedcode,id_fromincome,id_incomeP,other_title,other_amount,SUM(other_amount) as sumOther3')
        ->join('tbldateyear','tblpaipafincomeothers.income_year = tbldateyear.id_year','LEFT')
        ->where('generatedcode',$searchpa)
        ->where('year >=', $disburse_year)
        ->where('year <=', $disburse_year_to)
        ->group_by('income_year');
        $query = $this->db->get('tblpaipafincomeothers');
        return $query->result();
    }


    public function othertotalsum($id,$searchPa,$year_list,$quarter){
        $this->db->select('income_month,SUM(other_amount) as totalsumother')
        ->join('tbldatemonth','tblpaipafincomeothers.income_month = tbldatemonth.month','left')
        ->where('tblpaipafincomeothers.generatedcode',$searchPa)
        ->where('income_year',$year_list)
        ->where('QtrCode',$quarter);
        // ->group_by('income_month');
        $query = $this->db->get('tblpaipafincomeothers');
        return $query->result();
    }

    public function disbursetotalsum($id,$searchPa,$year_list,$quarter){
        $this->db->select('disbursement_month,SUM(disbursement_amount) as totalsumdisburse')
        ->join('tbldatemonth','tblpaipafdisbursement.disbursement_month = tbldatemonth.month','left')
        ->where('tblpaipafdisbursement.generatedcode',$searchPa)
        ->where('disbursement_year',$year_list)
        ->where('QtrCode',$quarter);
        // ->group_by('disbursement_month');
        $query = $this->db->get('tblpaipafdisbursement');
        return $query->result();
    }

    public function incometotalsum($searchPa,$year_list,$quarter){
        $this->db->select('date_month_income,SUM(entrancefee + facilities + resource + concession) as totalsumincome')
        ->join('tbldatemonth','tblpaipafincome.date_month_income = tbldatemonth.month','left')
        ->where('tblpaipafincome.generatedcode',$searchPa)
        ->where('date_year_income',$year_list)
        ->where('QtrCode',$quarter);
        // ->group_by('date_month_income');
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }


    public function searchallIpafOthersbyyear($id,$searchPa,$year_list,$quarter){
        $this->db->select('group_concat(disbursement_remarks,": ",disbursement_amount separator "<br> ") as disbursements,disbursement_month,id_fromincome,disbursement_day,disbursement_year,generatedcode,id_ipafdisburse,disbursement_remarks,disbursement_amount,SUM(disbursement_amount) as sumdisbursement')
        ->join('tbldatemonth','tblpaipafdisbursement.disbursement_month = tbldatemonth.month','LEFT')
        ->where('disbursement_year',$year_list)
        ->where('QtrCode',$quarter)
        ->where('generatedcode',$searchPa)
        ->group_by('disbursement_month');
        $query = $this->db->get('tblpaipafdisbursement');
        return $query->result();
    }

    public function searchallIpafdisbursementbyyearssss($id,$searchPa,$year_list,$quarter){
        $this->db->select('disbursement_month,id_fromincome,disbursement_day,disbursement_year,generatedcode,id_ipafdisburse,disbursement_remarks, disbursement_amount,SUM(disbursement_amount) as sumdisbursementsss')
        ->join('tbldatemonth','tblpaipafdisbursement.disbursement_month = tbldatemonth.month','LEFT')
        ->where('disbursement_year',$year_list)
        ->where('QtrCode',$quarter)
        ->where('generatedcode',$searchPa);
        // ->group_by('disbursement_month');
        $query = $this->db->get('tblpaipafdisbursement');
        return $query->result();
    }

    public function searchpdfotherbyyear($id,$searchpa,$searchyear,$quarter){
        $this->db->select('group_concat(other_title,": ",other_amount separator "\n") as try2, income_month,income_day,income_year,generatedcode,id_fromincome,id_incomeP,other_title,other_amount,SUM(other_amount) as sumOther')
        ->join('tbldatemonth','tblpaipafincomeothers.income_month = tbldatemonth.month','LEFT')
        ->where('tblpaipafincomeothers.generatedcode',$searchpa)
        ->where('id_fromincome',$id)
        ->where('income_year',$searchyear)
        ->where('QtrCode',$quarter);
        // ->group_by('income_month');
        $query = $this->db->get('tblpaipafincomeothers');
        return $query->result();
    }

    public function searchpdfdisbursementbyquarter($id,$searchpa,$searchyear,$quarter){
        $this->db->select('group_concat(disbursement_remarks,": ",disbursement_amount separator "\n") as disburse_view, disbursement_month,disbursement_day,disbursement_year,generatedcode,id_fromincome,disbursement_remarks,disbursement_amount,SUM(disbursement_amount) as sumdisbursement')
        ->join('tbldatemonth','tblpaipafdisbursement.disbursement_month = tbldatemonth.month','LEFT')
        ->where('tblpaipafdisbursement.generatedcode',$searchpa)
        ->where('id_fromincome',$id)
        ->where('disbursement_year',$searchyear)
        ->where('QtrCode',$quarter);
        // ->group_by('income_month');
        $query = $this->db->get('tblpaipafdisbursement');
        return $query->result();
    }

    public function searchpdfdevelopmentbyquarter($id,$searchpa,$searchyear,$quarter){
        $this->db->select('group_concat(dev_remarks,": ",devfee_amount separator "\n") as development_view, dev_month,dev_day,dev_year,generatedcode,id_fromincome,dev_remarks,devfee_amount,SUM(devfee_amount) as sumdevelopment')
        ->join('tbldatemonth','tblpaipafdevfee.dev_month = tbldatemonth.month','LEFT')
        ->where('tblpaipafdevfee.generatedcode',$searchpa)
        ->where('id_fromincome',$id)
        ->where('dev_year',$searchyear)
        ->where('QtrCode',$quarter);
        // ->group_by('income_month');
        $query = $this->db->get('tblpaipafdevfee');
        return $query->result();
    }

    public function searchdevfeesbyyear($id,$searchPa,$year_list,$quarter){
        $this->db->select('group_concat(dev_remarks,": ",devfee_amount separator "<br> ") as devfee')
        ->join('tbldatemonth','tblpaipafdevfee.dev_month = tbldatemonth.month','LEFT')
        ->where('tblpaipafdevfee.generatedcode',$searchPa)
        ->where('id_fromincome',$id)
        ->where('dev_year',$year_list)
        ->where('QtrCode',$quarter);
        // ->group_by('income_month');
        $query = $this->db->get('tblpaipafdevfee');
        return $query->result();
    }

    public function searchdsibursementfeesbyyear($id,$searchPa,$year_list,$quarter){
        $this->db->select('group_concat(disbursement_remarks,": ",disbursement_amount separator "<br> ") as disbursefee')
        ->join('tbldatemonth','tblpaipafdisbursement.disbursement_month = tbldatemonth.month','LEFT')
        ->where('tblpaipafdisbursement.generatedcode',$searchPa)
        ->where('id_fromincome',$id)
        ->where('disbursement_year',$year_list)
        ->where('QtrCode',$quarter);
        $query = $this->db->get('tblpaipafdisbursement');
        return $query->result();
    }

    public function searchdevfeesperweek($id,$searchPa,$year,$months,$fday,$tday){
        $this->db->select('group_concat(dev_remarks,": ",devfee_amount separator "<br> ") as devfee,devfee_amount')
        ->join('tbldatemonth','tblpaipafdevfee.dev_month = tbldatemonth.month','LEFT')
        ->where('generatedcode',$searchPa)
        ->where('id_fromincome',$id)
        ->where('dev_year',$year)
        ->where('dev_month',$months)
        ->where('dev_day >=',$fday)
        ->where('dev_day <=',$tday)
        ->group_by('dev_day');
        $query = $this->db->get('tblpaipafdevfee');
        return $query->result();
    }

    public function searchdisbursementsfeesperweek($id,$searchPa,$year,$months,$fday,$tday){
        $this->db->select('group_concat(disbursement_remarks,": ",disbursement_amount separator "<br> ") as disbursement_views,disbursement_amount')
        ->join('tbldatemonth','tblpaipafdisbursement.disbursement_month = tbldatemonth.month','LEFT')
        ->where('generatedcode',$searchPa)
        ->where('id_fromincome',$id)
        ->where('disbursement_year',$year)
        ->where('disbursement_month',$months)
        ->where('disbursement_day >=',$fday)
        ->where('disbursement_day <=',$tday)
        ->group_by('disbursement_day');
        $query = $this->db->get('tblpaipafdisbursement');
        return $query->result();
    }

    public function searchcontribyyear($id,$searchPa,$year_list,$quarter){
        $this->db->select('group_concat("Trust fund : ",tblfinancialassistance.finance_desc,"<br>"
                                        "Mode payment : ",tblfinancialassistancesub.description,"<br>",
                                         contri_remarks," : ",contri_amount separator "<hr> ") as contrif')
        ->join('tbldatemonth','tblpaipafcontrisub.month_contri = tbldatemonth.month','LEFT')
        ->join('tblfinancialassistance','tblpaipafcontrisub.trustfund = tblfinancialassistance.id_financial','LEFT')
        ->join('tblfinancialassistancesub','tblpaipafcontrisub.mode_payment = tblfinancialassistancesub.id_finance_sub','LEFT')
        ->where('tblpaipafcontrisub.generatedcode',$searchPa)
        ->where('id_fromincome',$id)
        ->where('year_contri',$year_list)
        ->where('QtrCode',$quarter);
        // ->group_by('income_month');
        $query = $this->db->get('tblpaipafcontrisub');
        return $query->result();
    }

    public function searchcontriperweek($id,$searchPa,$year,$months,$fday,$tday){
        $this->db->select('group_concat("Trust fund : ",tblfinancialassistance.finance_desc,"<br>"
                                        "Mode payment : ",tblfinancialassistancesub.description,"<br>",
                                         contri_remarks," : ",contri_amount separator "<hr> ") as contrif,contri_amount')
        ->join('tbldatemonth','tblpaipafcontrisub.month_contri = tbldatemonth.month','LEFT')
        ->join('tblfinancialassistance','tblpaipafcontrisub.trustfund = tblfinancialassistance.id_financial','LEFT')
        ->join('tblfinancialassistancesub','tblpaipafcontrisub.mode_payment = tblfinancialassistancesub.id_finance_sub','LEFT')
        ->where('tblpaipafcontrisub.generatedcode',$searchPa)
        ->where('id_fromincome',$id)
        ->where('year_contri',$year)
        ->where('month_contri',$months)
        ->where('day_contri >=',$fday)
        ->where('day_contri <=',$tday)
        ->group_by('day_contri');
        $query = $this->db->get('tblpaipafcontrisub');
        return $query->result();
    }

    public function searchffbyyear($id,$searchPa,$year_list,$quarter){
        $this->db->select('group_concat(penalty_remarks,": ",penalty_amount separator "<br> ") as ffd')
        ->join('tbldatemonth','tblpaipafpenalty.penalty_month = tbldatemonth.month','LEFT')
        ->where('tblpaipafpenalty.generatedcode',$searchPa)
        ->where('id_fromincome',$id)
        ->where('penalty_year',$year_list)
        ->where('QtrCode',$quarter);
        $query = $this->db->get('tblpaipafpenalty');
        return $query->result();
    }

    public function searchffperweek($id,$searchPa,$year,$months,$fday,$tday){
        $this->db->select('group_concat(penalty_remarks,": ",penalty_amount separator "<br> ") as ffd,penalty_amount')
        ->join('tbldatemonth','tblpaipafpenalty.penalty_month = tbldatemonth.month','LEFT')
        ->where('tblpaipafpenalty.generatedcode',$searchPa)
        ->where('id_fromincome',$id)
        ->where('penalty_year',$year)
        ->where('penalty_month',$months)
        ->where('penalty_day >=',$fday)
        ->where('penalty_day <=',$tday)
        ->group_by('penalty_day');
        $query = $this->db->get('tblpaipafpenalty');
        return $query->result();
    }

    public function searchpdfdevfeesbyyear($id,$searchpa,$searchyear,$quarter){
      $this->db->select('group_concat(dev_remarks,": Php ",devfee_amount separator "\n ") as devfee')
        ->join('tbldatemonth','tblpaipafdevfee.dev_month = tbldatemonth.month','LEFT')
        ->where('tblpaipafdevfee.generatedcode',$searchpa)
        ->where('id_fromincome',$id)
        ->where('dev_year',$searchyear)
        ->where('QtrCode',$quarter);
        // ->group_by('income_month');
        $query = $this->db->get('tblpaipafdevfee');
        return $query->result();
    }

    public function searchpdfdisbursementfeebyyear($id,$searchpa,$searchyear,$quarter){
      $this->db->select('group_concat(disbursement_remarks,": Php ",disbursement_amount separator "\n ") as disbursement_view')
        ->join('tbldatemonth','tblpaipafdisbursement.disbursement_month = tbldatemonth.month','LEFT')
        ->where('tblpaipafdisbursement.generatedcode',$searchpa)
        ->where('id_fromincome',$id)
        ->where('disbursement_year',$searchyear)
        ->where('QtrCode',$quarter);
        // ->group_by('income_month');
        $query = $this->db->get('tblpaipafdisbursement');
        return $query->result();
    }

    public function searchpdfcontribyyear($id,$searchpa,$searchyear,$quarter){
        $this->db->select('group_concat("Trust fund : ",tblfinancialassistance.finance_desc,"\n"
                                        "Mode payment : ",tblfinancialassistancesub.description,"\n",
                                         "Php",contri_amount separator "\n\n ") as contrif')
        ->join('tbldatemonth','tblpaipafcontrisub.month_contri = tbldatemonth.month','LEFT')
        ->join('tblfinancialassistance','tblpaipafcontrisub.trustfund = tblfinancialassistance.id_financial','LEFT')
        ->join('tblfinancialassistancesub','tblpaipafcontrisub.mode_payment = tblfinancialassistancesub.id_finance_sub','LEFT')
        ->where('tblpaipafcontrisub.generatedcode',$searchpa)
        ->where('id_fromincome',$id)
        ->where('year_contri',$searchyear)
        ->where('QtrCode',$quarter);
        // ->group_by('income_month');
        $query = $this->db->get('tblpaipafcontrisub');
        return $query->result();
    }

    public function searchpdfffbyyear($id,$searchpa,$searchyear,$quarter){
        $this->db->select('group_concat(penalty_remarks,": ",penalty_amount separator "\n ") as ffd')
        ->join('tbldatemonth','tblpaipafpenalty.penalty_month = tbldatemonth.month','LEFT')
        ->where('tblpaipafpenalty.generatedcode',$searchpa)
        ->where('id_fromincome',$id)
        ->where('penalty_year',$searchyear)
        ->where('QtrCode',$quarter);
        $query = $this->db->get('tblpaipafpenalty');
        return $query->result();
    }

    public function gettotalincome($searchPa,$year_list,$quarter){
        $this->db->select('id_income,SUM(entrancefee + facilities + resource + concession) as grandtotals, date_year_income,date_month_income')
        ->join('tbldatemonth','tblpaipafincome.date_month_income = tbldatemonth.month','left')
        ->where('tblpaipafincome.generatedcode',$searchPa)
        ->where('date_year_income',$year_list)
        ->where('QtrCode',$quarter);
        // ->group_by(array("date_year_income", "date_month_income"));
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function getpdfGrandtotalIpaf($searchpa,$searchyear,$quarter){
        $this->db->select('id_income,SUM(entrancefee + facilities + resource + concession + other_specify_amount) as grandtotal')
        ->join('tbldatemonth','tblpaipafincome.date_month_income = tbldatemonth.month','left')
        ->where('generatedcode',$searchpa)
        ->where('date_year_income',$searchyear)
        ->where('QtrCode',$quarter);
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function getGrandtotalIpaf($searchPa,$year_list,$quarter){
        $this->db->select('date_month_income,SUM(entrancefee + facilities + resource + concession) as grandtotal')
        ->join('tbldatemonth','tblpaipafincome.date_month_income = tbldatemonth.month','left')
        ->where('tblpaipafincome.generatedcode',$searchPa)
        ->where('date_year_income',$year_list)
        ->where('QtrCode',$quarter);
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function getGrandtotalDisburse($searchPa,$year_list,$quarter){
        $this->db->select('disbursement_month,SUM(disbursement_amount) as grandtotalDisburse')
        ->join('tbldatemonth','tblpaipafdisbursement.disbursement_month = tbldatemonth.month','left')
        // ->join('tblpaipafincomeothers','tblpaipafdisbursement.id_fromincome = tblpaipafincomeothers.id_fromincome','INNER')
        ->where('tblpaipafdisbursement.generatedcode',$searchPa)
        ->where('disbursement_year',$year_list)
        ->where('QtrCode',$quarter)
        ->group_by('disbursement_year');
        // ->group_by(array('date_month_income','date_year_income'));
        $query = $this->db->get('tblpaipafdisbursement');
        return $query->result();
    }

    public function getGrandtotalDevelopments($searchPa,$year_list,$quarter){
        $this->db->select('dev_month,SUM(devfee_amount) as grandtotalDevelopment')
        ->join('tbldatemonth','tblpaipafdevfee.dev_month = tbldatemonth.month','left')
        ->where('tblpaipafdevfee.generatedcode',$searchPa)
        ->where('dev_year',$year_list)
        ->where('QtrCode',$quarter)
        ->group_by('dev_year');
        $query = $this->db->get('tblpaipafdevfee');
        return $query->result();
    }

    public function getGrandtotalother1($searchPa,$year_list,$quarter){
        $this->db->select('id_fromincome,income_month,SUM(other_amount) as grandtotalothe')
        ->join('tbldatemonth','tblpaipafincomeothers.income_month = tbldatemonth.month','left')
        ->where('tblpaipafincomeothers.generatedcode',$searchPa)
        ->where('income_year',$year_list)
        ->where('QtrCode',$quarter)
        ->group_by('income_year');
        // ->group_by(array('date_month_income','date_year_income'));
        $query = $this->db->get('tblpaipafincomeothers');
        return $query->result();
    }

    public function searchallIpafotherbyyearGT($id,$searchPa,$year_list,$quarter){
        $this->db->select('SUM(other_amount) as sumOtherGT')
        ->join('tbldatemonth','tblpaipafincomeothers.income_month = tbldatemonth.month','LEFT')
        ->where('tblpaipafincomeothers.generatedcode',$searchPa)
        // ->where('id_fromincome',$id)
        ->where('income_year',$year_list)
        ->where('QtrCode',$quarter);
        $query = $this->db->get('tblpaipafincomeothers');
        return $query->result();
    }

    public function searchpdfallIpafotherbyyearGT($id,$searchpa,$searchyear,$quarter){
        $this->db->select('SUM(other_amount) as sumOtherGT')
        ->join('tbldatemonth','tblpaipafincomeothers.income_month = tbldatemonth.month','LEFT')
        ->where('tblpaipafincomeothers.generatedcode',$searchpa)
        // ->where('id_fromincome',$id)
        ->where('income_year',$searchyear)
        ->where('QtrCode',$quarter);
        $query = $this->db->get('tblpaipafincomeothers');
        return $query->result();
    }

    public function searchpdfallIpafdisbursementbyyearGT($id,$searchpa,$searchyear,$quarter){
        $this->db->select('SUM(disbursement_amount) as sumdisbursementGT')
        ->join('tbldatemonth','tblpaipafdisbursement.disbursement_month = tbldatemonth.month','LEFT')
        ->where('generatedcode',$searchpa)
        ->where('disbursement_year',$searchyear)
        ->where('QtrCode',$quarter);
        $query = $this->db->get('tblpaipafdisbursement');
        return $query->result();
    }

    public function searchpdfallIpafdevelopmentbyyearGT($id,$searchpa,$searchyear,$quarter){
        $this->db->select('SUM(devfee_amount) as sumdevelopmentGT')
        ->join('tbldatemonth','tblpaipafdevfee.dev_month = tbldatemonth.month','LEFT')
        ->where('generatedcode',$searchpa)
        ->where('dev_year',$searchyear)
        ->where('QtrCode',$quarter);
        $query = $this->db->get('tblpaipafdevfee');
        return $query->result();
    }


    public function resultQuerybyYearOthers($searchpa,$searchyear,$quarter){
        $this->db->select('*')
        ->join('tbldatemonth','tblpaipafincome.date_month_income = tbldatemonth.month','LEFT')
        ->where('tblpaipafincome.generatedcode',$searchpa)
        ->where('date_year_income',$searchyear)
        ->where('QtrCode',$quarter)
        ->order_by('tbldatemonth.id_month')
        ->group_by('date_month_income')
        ->order_by('LENGTH(tbldatemonth.id_month)');
        $query = $this->db->get('tblpaipafincome');
        return $query->result();

    }

    public function getgrantotalOther($searchpa,$searchyear,$quarter){
        $this->db->select('SUM(amount) + SUM(devt_fee) + SUM(penalty_fee) as grandtotal')
        ->join('tbldatemonth','tblpaipafcontri.date_month_coontri = tbldatemonth.month')
        ->where('generatedcode',$searchpa)
        ->where('date_year_coontri',$searchyear)
        ->where('QtrCode',$quarter);
        $query = $this->db->get('tblpaipafcontri');
        return $query->result();

        }
    public function getIpafYearOthers($searchPa,$year_list,$quarter){
        $this->db->select('*')
        ->join('tbldatemonth','tblpaipafincome.date_month_income = tbldatemonth.month','LEFT')
        ->where('tblpaipafincome.generatedcode',$searchPa)
        ->where('date_year_income',$year_list)
        ->where('QtrCode',$quarter)
        ->order_by('tbldatemonth.id_month')
        ->group_by('date_month_income')
        ->order_by('LENGTH(tbldatemonth.id_month)');
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function getIncomeDateperweek($searchPa,$year,$months,$fday,$tday){
        $this->db->select('*')
        ->where('tblpaipafincome.generatedcode',$searchPa)
        ->join('tbldatemonth','tblpaipafincome.date_month_income = tbldatemonth.month','LEFT')
        ->where('date_year_income',$year)
        ->where('date_month_income',$months)
        ->where('date_day_income >=',$fday)
        ->where('date_day_income <=',$tday)
        ->order_by('date_day_income')
        ->order_by('LENGTH(date_day_income)');
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }
    public function getGrandtotalIpafOther($searchPa,$year_list,$quarter)
    {
        $this->db->select('SUM(amount) + SUM(devt_fee) + SUM(penalty_fee) as grandtotal')
        ->join('tbldatemonth','tblpaipafcontri.date_month_coontri = tbldatemonth.month','LEFT')
        ->where('generatedcode',$searchPa)
        ->where('date_year_coontri',$year_list)
        ->where('QtrCode',$quarter);
        $query = $this->db->get('tblpaipafcontri');
        return $query->result();

    }


    public function getallfeeReportQuerriedbyYear($searchPa,$year_list,$user_id){
        $this->db->select("id_fee,locMale,locFemale,forMale,forFemale,date_month,date_day,date_year,generatedcode,fil_adults,fil_students,fil_distab,foreigner,facility_tables,facility_cottages_day,facility_cottages_night,facility_campingsite,
                facility_swimmingpool,facility_bcourt_daytime,facility_bcourt_light,facility_dockingarea,special_docking_area,facility_parkingarea,parking_tricycle,
                parking_cars,parking_jeep,parking_bus,recreational_waterbase_activity_foreign,recreational_waterbase_activity_local,recreational_hiking_foreign,
                recreational_hiking_local,trekking_biking_foreign,commercialdoc_photography,trekking_biking_local,scuba_foreign,scuba_local,
                SUM(locMale + locFemale) as local_visit,
                SUM(forMale + forFemale) as foreign_visit,
                SUM(locMale + locFemale + forMale + forFemale) as total_visit,
                (fil_adults + fil_students + fil_distab + foreigner) as visitors_total,
                (facility_tables + facility_cottages_day + facility_cottages_night + facility_campingsite + facility_swimmingpool + facility_bcourt_daytime + facility_bcourt_light + facility_dockingarea + special_docking_area) as facilities_total,
                (parking_tricycle + parking_cars + parking_jeep + parking_bus) as parking_total,
                (recreational_waterbase_activity_foreign + recreational_waterbase_activity_local + recreational_hiking_foreign + recreational_hiking_local) as total_recreational,
                (trekking_biking_foreign + trekking_biking_local) as land_total,
                (scuba_foreign + scuba_local) as water_total,
                (fil_adults + fil_students + fil_distab + foreigner + facility_tables + facility_cottages_day + facility_cottages_night + facility_campingsite + facility_swimmingpool + facility_bcourt_daytime + facility_bcourt_light + facility_dockingarea + special_docking_area + parking_tricycle + parking_cars + parking_jeep + parking_bus + recreational_waterbase_activity_foreign + recreational_waterbase_activity_local + recreational_hiking_foreign + recreational_hiking_local + trekking_biking_foreign + commercialdoc_photography + trekking_biking_local + scuba_foreign + scuba_local) as sub_total,
                ((fil_adults + fil_students + fil_distab + foreigner + facility_tables + facility_cottages_day + facility_cottages_night + facility_campingsite + facility_swimmingpool + facility_bcourt_daytime + facility_bcourt_light + facility_dockingarea + special_docking_area + parking_tricycle + parking_cars + parking_jeep + parking_bus + recreational_waterbase_activity_foreign + recreational_waterbase_activity_local + recreational_hiking_foreign + recreational_hiking_local + trekking_biking_foreign + commercialdoc_photography + trekking_biking_local + scuba_foreign + scuba_local) *.75) AS total_sub,
                ((fil_adults + fil_students + fil_distab + foreigner + facility_tables + facility_cottages_day + facility_cottages_night + facility_campingsite + facility_swimmingpool + facility_bcourt_daytime + facility_bcourt_light + facility_dockingarea + special_docking_area + parking_tricycle + parking_cars + parking_jeep + parking_bus + recreational_waterbase_activity_foreign + recreational_waterbase_activity_local + recreational_hiking_foreign + recreational_hiking_local + trekking_biking_foreign + commercialdoc_photography + trekking_biking_local + scuba_foreign + scuba_local) *.25) AS total_central
                ");
        $this->db->where('pasu_id',$user_id);
        $this->db->where('generatedcode',$searchPa);
        $this->db->where('date_year',$year_list);
        $this->db->order_by('date_day');
        // $this->db->group_by('date_year');
        $this->db->group_by('date_month');
        // $this->db->or_where("'generatedcode'=$searchPa AND 'date_year'=$year_list", NULL, FALSE);
        $query = $this->db->get($this->fee_new);
        return $query->result();
    }


    public function PAdata($user_id)
    {
        $this->db->select('*');
        $this->db->where('pasu_id',$user_id);
        $query = $this->db->get($this->table);
        return $query->result();
    }

    // public function resultQuerybyYear($searchpa,$searchyear)
    // {
    //     $this->db->select('pa_name,id_ipaf,tblpaipaf.generatedcode,no_visitors,visitors,tblpaipaf.facilities,parking_area,recreational_activity,water_activity,date_month,date_year,
    //                       (visitors+tblpaipaf.facilities+parking_area+recreational_activity+water_activity) AS total, ((visitors+tblpaipaf.facilities+parking_area+recreational_activity+water_activity) * .75) AS sub_total, ((visitors+tblpaipaf.facilities+parking_area+recreational_activity+water_activity) * .25) AS central_total')
    //              ->join('tblpamain','tblpaipaf.generatedcode = tblpamain.generatedcode','left')
    //              ->where('tblpaipaf.generatedcode',$searchpa)
    //              ->where('date_year',$searchyear)
    //              ->group_by('date_year')
    //              ->group_by('date_month');
    //              $query = $this->db->get($this->ipafs);
    //              return $query->result();
    // }

    public function queryquarter($quarter)
    {
        $this->db->select('*')
        ->where('QtrCode',$quarter)
        ->group_by('month');
        $query = $this->db->get('tbldatemonth');
        return $query->result();
    }

    // public function getIpafYear($searchPa,$year_list,$quarter){
    //     $this->db->select('(entrancefee + facilities + resource + concession ) as Grand_total_income,
    //         (entrancefee + facilities + resource + concession)*0.75 as total_75,
    //         (entrancefee + facilities + resource + concession)*0.25 as total_25,
    //         (entrancefee + facilities + resource + concession) as Grand_total_btr,date_day_income,
    //         id_income,tblpaipafincome.generatedcode,date_month_income,date_year_income,entrancefee,facilities,resource,concession,development,
    //         finespenalties,other_specify_title,other_specify_amount,tbldatemonth.id_month')
    //     ->join('tbldatemonth','tblpaipafincome.date_month_income = tbldatemonth.month','LEFT')
    //     ->where('tblpaipafincome.generatedcode',$searchPa)
    //     ->where('date_year_income',$year_list)
    //     ->where('QtrCode',$quarter)
    //     ->order_by('tbldatemonth.id_month')
    //     ->group_by('date_month_income')
    //     ->order_by('LENGTH(tbldatemonth.id_month)');
    //     $query = $this->db->get('tblpaipafincome');
    //     return $query->result();
    // }

    public function resultQuerybyYear($searchpa,$searchyear,$quarter)
    {
        $this->db->select('SUM(entrancefee + facilities + resource + concession ) as Grand_total_income,
            (entrancefee + facilities + resource + concession)*0.75 as total_75,
            (entrancefee + facilities + resource + concession)*0.25 as total_25,
            (entrancefee + facilities + resource + concession) as Grand_total_btr,date_day_income,
            SUM(entrancefee) as sum_entrance,SUM(facilities) as sum_facility,SUM(resource) as sum_resource,SUM(concession) as sum_concession,
            id_income,tblpaipafincome.generatedcode,date_month_income,date_year_income,entrancefee,facilities,resource,concession,other_specify_title,other_specify_amount,tbldatemonth.id_month')
        ->join('tbldatemonth','tblpaipafincome.date_month_income = tbldatemonth.month','LEFT')
        ->where('tblpaipafincome.generatedcode',$searchpa)
        ->where('date_year_income',$searchyear)
        ->where('QtrCode',$quarter)
        ->order_by('tbldatemonth.id_month')
        ->group_by('date_month_income')
        ->order_by('LENGTH(tbldatemonth.id_month)');
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function querydevelopmentfee($searchpa,$searchyear,$quarter)
    {
        $this->db->select('*');
        $this->db->join('tbldatemonth','tblpaipafdevfee.dev_month = tbldatemonth.month','Left');
        $this->db->where('tblpaipafdevfee.generatedcode',$searchpa);
        $this->db->where('dev_year',$searchyear);
        $this->db->where('QtrCode',$quarter);
        // $this->db->group_by('generatedcode');
        // $this->db->group_by('dev_year');
        $this->db->group_by('devfee_amount');
        $query = $this->db->get('tblpaipafdevfee');
        return $query->result();
    }

    public function querycontrifee($searchpa,$searchyear,$quarter)
    {
        $this->db->select('*');
        $this->db->join('tbldatemonth','tblpaipafcontri.date_month_coontri = tbldatemonth.month','Left');
        $this->db->where('tblpaipafcontri.generatedcode',$searchpa);
        $this->db->where('date_year_coontri',$searchyear);
        $this->db->where('QtrCode',$quarter);
        $query = $this->db->get('tblpaipafcontri');
        return $query->result();
    }


    public function resultgroupbyYear($searchpa,$searchyear,$quarter)
    {
        $this->db->select('(entrancefee + tblpaipafincome.facilities + resource + concession + other_specify_amount) as Grand_total_income,
            (entrancefee + tblpaipafincome.facilities + resource + concession + other_specify_amount)*0.75 as total_75,
            (entrancefee + tblpaipafincome.facilities + resource + concession + other_specify_amount)*0.25 as total_25,
            (entrancefee + tblpaipafincome.facilities + resource + concession + other_specify_amount) as Grand_total_btr,
            id_income,tblpaipafincome.generatedcode,date_month_income,date_year_income,entrancefee,tblpaipafincome.facilities,resource,concession,other_specify_title,other_specify_amount,pa_name')
        ->join('tblpamain','tblpaipafincome.generatedcode = tblpamain.generatedcode','left')
        ->join('tbldatemonth','tblpaipafincome.date_month_income = tbldatemonth.month','left')
        ->where('tblpaipafincome.generatedcode',$searchpa)
        ->where('date_year_income',$searchyear)
        ->where('QtrCode',$quarter)
        ->group_by('tblpaipafincome.generatedcode');
        // ->group_by('date_month_income');
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function visitorsLogsResult($searchpa,$searchyear,$quarter)
    {
        $this->db->select('*');
        // $this->db->join('tblpamain','tblpaipafvisitors.generatedcode = tblpamain.generatedcode','left');
        $this->db->join('tbldatemonth','tblipafvisitorslog.visitorlog_month = tbldatemonth.id_month','Left');
        $this->db->where('tblipafvisitorslog.generatedcode',$searchpa);
        $this->db->where('visitorlog_year',$searchyear);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblipafvisitorslog.visitorlog_month');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }

    public function visitorsLogsResultmalebelow($searchPa,$year_list,$quarter)
    {
        $this->db->select('COUNT(visitorlog_below) as below,visitorlog_month');
        $this->db->join('tbldatemonth','tblipafvisitorslog.visitorlog_month = tbldatemonth.id_month','Left');
        $this->db->where('visitorlog_sex',1);
        $this->db->where('visitorlog_below',1);
        $this->db->where('generatedcode',$searchPa);
        $this->db->where('visitorlog_year',$year_list);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblipafvisitorslog.visitorlog_month');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }

    public function visitorsLogsResultfemalebelow($searchPa,$year_list,$quarter)
    {
        $this->db->select('COUNT(visitorlog_below) as febelow,visitorlog_month');
        $this->db->join('tbldatemonth','tblipafvisitorslog.visitorlog_month = tbldatemonth.id_month','Left');
        $this->db->where('visitorlog_sex',2);
        $this->db->where('visitorlog_below',1);
        $this->db->where('generatedcode',$searchPa);
        $this->db->where('visitorlog_year',$year_list);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblipafvisitorslog.visitorlog_month');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }

    public function visitorsLogsResulttotalbelow($searchPa,$year_list,$quarter)
    {
        $this->db->select('COUNT(visitorlog_below) as totalbelow,
            visitorlog_month,visitorlog_day,visitorlog_year,visitorlog_sex');
        $this->db->join('tbldatemonth','tblipafvisitorslog.visitorlog_month = tbldatemonth.id_month','Left');
        $this->db->where('visitorlog_below',1);
        $this->db->where('tblipafvisitorslog.generatedcode',$searchPa);
        $this->db->where('visitorlog_year',$year_list);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblipafvisitorslog.visitorlog_month');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }

    public function visitorsLogsResultmalepwd($searchPa,$year_list,$quarter)
    {
        $this->db->select('COUNT(visitorlog_pwd) as malepwd,
            visitorlog_month,visitorlog_day,visitorlog_year,visitorlog_sex');
        $this->db->join('tbldatemonth','tblipafvisitorslog.visitorlog_month = tbldatemonth.id_month','Left');
        $this->db->where('visitorlog_sex',1);
        $this->db->where('visitorlog_pwd',1);
        $this->db->where('tblipafvisitorslog.generatedcode',$searchPa);
        $this->db->where('visitorlog_year',$year_list);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblipafvisitorslog.visitorlog_month');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }

    public function visitorsLogsResultfemalepwd($searchPa,$year_list,$quarter)
    {
        $this->db->select('COUNT(visitorlog_pwd) as femalepwd,
            visitorlog_month,visitorlog_day,visitorlog_year,visitorlog_sex');
        $this->db->join('tbldatemonth','tblipafvisitorslog.visitorlog_month = tbldatemonth.id_month','Left');
        $this->db->where('visitorlog_sex',2);
        $this->db->where('visitorlog_pwd',1);
        $this->db->where('tblipafvisitorslog.generatedcode',$searchPa);
        $this->db->where('visitorlog_year',$year_list);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblipafvisitorslog.visitorlog_month');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }

    public function visitorsLogsResulttotalpwd($searchPa,$year_list,$quarter)
    {
        $this->db->select('COUNT(visitorlog_pwd) as totalpwd,
            visitorlog_month,visitorlog_day,visitorlog_year,visitorlog_sex');
        $this->db->join('tbldatemonth','tblipafvisitorslog.visitorlog_month = tbldatemonth.id_month','Left');
        $this->db->where('visitorlog_pwd',1);
        $this->db->where('tblipafvisitorslog.generatedcode',$searchPa);
        $this->db->where('visitorlog_year',$year_list);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblipafvisitorslog.visitorlog_month');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }

    public function visitorsLogsResultmalesenior($searchPa,$year_list,$quarter)
    {
        $this->db->select('COUNT(visitorlog_senior) as malesenior,
            visitorlog_month,visitorlog_day,visitorlog_year,visitorlog_sex');
        $this->db->join('tbldatemonth','tblipafvisitorslog.visitorlog_month = tbldatemonth.id_month','Left');
        $this->db->where('visitorlog_sex',1);
        $this->db->where('visitorlog_senior',1);
        $this->db->where('tblipafvisitorslog.generatedcode',$searchPa);
        $this->db->where('visitorlog_year',$year_list);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblipafvisitorslog.visitorlog_month');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }
    public function visitorsLogsResultfemalesenior($searchPa,$year_list,$quarter)
    {
        $this->db->select('COUNT(visitorlog_senior) as femalesenior,
            visitorlog_month,visitorlog_day,visitorlog_year,visitorlog_sex');
        $this->db->join('tbldatemonth','tblipafvisitorslog.visitorlog_month = tbldatemonth.id_month','Left');
        $this->db->where('visitorlog_sex',2);
        $this->db->where('visitorlog_senior',1);
        $this->db->where('tblipafvisitorslog.generatedcode',$searchPa);
        $this->db->where('visitorlog_year',$year_list);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblipafvisitorslog.visitorlog_month');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }
    public function visitorsLogsResulttotalsenior($searchPa,$year_list,$quarter)
    {
        $this->db->select('COUNT(visitorlog_senior) as totalsenior,
            visitorlog_month,visitorlog_day,visitorlog_year,visitorlog_sex');
        $this->db->join('tbldatemonth','tblipafvisitorslog.visitorlog_month = tbldatemonth.id_month','Left');
        $this->db->where('visitorlog_senior',1);
        $this->db->where('tblipafvisitorslog.generatedcode',$searchPa);
        $this->db->where('visitorlog_year',$year_list);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblipafvisitorslog.visitorlog_month');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }

    public function visitorsResult($searchpa,$searchyear,$quarter)
    {
        $this->db->select('(no_male_local + no_female_local) as total_local,
            (no_male_foreign + no_female_foreign) as total_foreign,
            (no_male_local + no_male_foreign) as total_male,
            (no_female_local + no_female_foreign) as total_female,
            (no_male_local + no_female_local + no_male_foreign + no_female_foreign) as grand_total,
            id_visitors,tblpaipafvisitors.generatedcode,date_month,date_year,no_male_local,no_female_local,no_male_foreign,no_female_foreign');
        // $this->db->join('tblpamain','tblpaipafvisitors.generatedcode = tblpamain.generatedcode','left');
        $this->db->join('tbldatemonth','tblpaipafvisitors.date_month = tbldatemonth.month','Left');
        $this->db->where('tblpaipafvisitors.generatedcode',$searchpa);
        $this->db->where('date_year',$searchyear);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblpaipafvisitors.generatedcode');
        $query = $this->db->get('tblpaipafvisitors');
        return $query->result();
    }

    public function QueryvisitorsResult($searchpa,$searchyear,$quarter)
    {
        $this->db->select('(no_male_local + no_female_local) as total_local,
            (no_male_foreign + no_female_foreign) as total_foreign,
            (no_male_local + no_male_foreign + no_male_local_student + no_male_local_pwd + no_male_local_sc + no_male_local_children) as total_male,
            (no_female_local + no_female_foreign + no_female_local_student + no_female_local_pwd + no_female_local_sc + no_female_local_children) as total_female,
            (no_male_local_student + no_female_local_student) as total_student,
            (no_male_local_pwd + no_female_local_pwd) as total_pwd,
            (no_male_local_sc + no_female_local_sc) as total_sc,
            (no_male_local_children + no_female_local_children) as total_children,
            (no_female_local + no_female_foreign + no_female_local_student + no_female_local_pwd + no_female_local_sc + no_female_local_children + no_male_local + no_male_foreign + no_male_local_student + no_male_local_pwd + no_male_local_sc + no_male_local_children) as grand_total,
            id_visitors,generatedcode,
            date_month,date_day,
            date_year,
            no_male_local,
            no_female_local,
            no_male_foreign,
            no_female_foreign,
            no_male_local_student,
            no_female_local_student,
            no_male_local_pwd,
            no_female_local_pwd,
            no_male_local_sc,
            no_female_local_sc,
            no_male_local_children,
            no_female_local_children
            ');
        // $this->db->join('tblpamain','tblpaipafvisitors.generatedcode = tblpamain.generatedcode','left');
        $this->db->join('tbldatemonth','tblpaipafvisitors.date_month = tbldatemonth.month','Left');
        $this->db->where('tblpaipafvisitors.generatedcode',$searchpa);
        $this->db->where('date_year',$searchyear);
        $this->db->where('QtrCode',$quarter);
        $query = $this->db->get('tblpaipafvisitors');
        return $query->result();
    }

    public function QueryvisitorsResultGT($searchpa,$searchyear,$quarter)
    {
        $this->db->select('SUM(no_male_local + no_female_local + no_male_foreign + no_female_foreign + no_male_local_student + no_female_local_student + no_male_local_pwd + no_female_local_pwd + no_male_local_sc + no_female_local_sc + no_male_local_children + no_female_local_children) as overallGrandTotal,
            SUM(no_male_local + no_female_local) as gtadults,
            SUM(no_male_local_student + no_female_local_student) as gtstudents,
            SUM(no_male_local_pwd + no_female_local_pwd) as gtpwd,
            SUM(no_male_local_sc + no_female_local_sc) as gtsc,
            SUM(no_male_local_children + no_female_local_children) as gtchildren,
            SUM(no_male_foreign + no_female_foreign) as gtforeign,
            id_visitors,generatedcode,date_month,date_day,date_year,no_male_local,no_female_local,no_male_foreign,no_female_foreign');
        // $this->db->join('tblpamain','tblpaipafvisitors.generatedcode = tblpamain.generatedcode','left');
        $this->db->join('tbldatemonth','tblpaipafvisitors.date_month = tbldatemonth.month','Left');
        $this->db->where('tblpaipafvisitors.generatedcode',$searchpa);
        $this->db->where('date_year',$searchyear);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblpaipafvisitors.generatedcode');
        $query = $this->db->get('tblpaipafvisitors');
        return $query->result();
    }

    public function resultQueryGrandTotalbyYear($searchpa,$searchyear){
        $this->db->select('pa_name,id_ipaf,tblpaipaf.generatedcode,no_visitors,visitors,tblpaipaf.facilities,parking_area,recreational_activity,water_activity,date_month,date_year,
                          (visitors+tblpaipaf.facilities+parking_area+recreational_activity+water_activity) AS total, ((visitors+tblpaipaf.facilities+parking_area+recreational_activity+water_activity) * .75) AS sub_total, ((visitors+tblpaipaf.facilities+parking_area+recreational_activity+water_activity) * .25) AS central_total')
                 ->join('tblpamain','tblpaipaf.generatedcode = tblpamain.generatedcode','left')
                 ->where('tblpaipaf.generatedcode',$searchpa)
                 ->where('date_year',$searchyear)
                 ->group_by('date_year')
                 ->group_by('date_month');
                 $query = $this->db->get($this->ipafs);
                 return $query->result();
    }

    public function groupbyYear($searchpa,$searchyear,$searchmonth,$user_id)
    {
        $this->db->select('*');
        // $this->db->where('pasu_id',$user_id);
        $this->db->where('generatedcode',$searchpa);
        $this->db->where('date_year',$searchyear);
        $this->db->where('date_month',$searchmonth);
        // $this->db->group_by('date_year');
        // $this->db->group_by('date_month');

        $query = $this->db->get($this->fee_new);
        return $query->result();
    }

    public function groupbyYear2nd($searchpa,$searchyear,$user_id)
    {
        $this->db->select('*');
        // $this->db->where('pasu_id',$user_id);
        $this->db->where('generatedcode',$searchpa);
        $this->db->where('date_year',$searchyear);
        $this->db->group_by('date_year');
        $this->db->group_by('date_month');
        $query = $this->db->get($this->fee_new);
        return $query->result();
    }


     function count_pamb_members($gencode){
        // $this->db->from('tblpambmember');
        $this->db->where('generatedcode',$gencode);
        $query= $this->db->get($this->pambcount);
            return $query->num_rows();
    }

    public function wcategory()
    {

        $result = $this->db->select("*")
            ->from('tblwcategory')
            ->get()
            ->result();

            $list[''] = "Select";
                if (!empty($result)) {
                    foreach ($result as $value) {
                        $list[$value->id] = strtoupper($value->wdesc);
            }
            return $list;
        } else {
            return false;
        }
    }


    public function query_by_year($user_id,$codegens)
    {
        // $this->db->distinct();
        $this->db->select('*');
        // $this->db->join('tbllocregion', 'tblpamainlocation.region_id = tbllocregion.id','left');
        // $this->db->join('tbllocprovince', 'tblpamainlocation.province_id = tbllocprovince.id_p','left');
        // $this->db->join('tbllocmunicipality', 'tblpamainlocation.municipal_id = tbllocmunicipality.id_m','left');
        // $this->db->join('tbllocbarangay', 'tblpamainlocation.barangay_id = tbllocbarangay.id_b','left');
        // $this->db->join('tblpamain','tblpamainlocation.generatedcode = tblpamain.generatedcode','left');
        $this->db->where('pasu_id',$user_id);
        $this->db->where('generatedcode',$codegens);
        $this->db->group_by('date_year');
        $query= $this->db->get($this->fee_new);
           return $query->result();
    }

    public function update_member($servicedetails,$ser_id){
        $this->db->where("id_pambmember",$ser_id);
        $this->db->update("tblpambmember",$servicedetails);
    }

    public function update_Ref($servicedetails,$ser_id){
        $this->db->where("id_reference",$ser_id);
        $this->db->update("tblpareference",$servicedetails);
    }

     public function update_lgu($lgudetails,$ser_id){
        $this->db->where("id_lgu",$ser_id);
        $this->db->update("tblpalgu",$lgudetails);
    }

    public function update_Threat($servicedetails,$ser_id){
        $this->db->where("id_threat",$ser_id);
        $this->db->update("tblpathreat",$servicedetails);
    }

    public function update_othergeohazardMaps($servicedetails,$ser_id){
        $this->db->where("id_geohazard",$ser_id);
        $this->db->update("tblpageohazard",$servicedetails);
    }

    public function update_Incomes($servicedetails,$ser_id){
        $this->db->where("id_income",$ser_id);
        $this->db->update("tblpaipafincome",$servicedetails);
    }

    public function update_Visitors($servicedetails,$ser_id){
        $this->db->where("id_visitors",$ser_id);
        $this->db->update("tblpaipafvisitors",$servicedetails);
    }

    public function update_Contri($servicedetails,$ser_id){
        $this->db->where("id_contri",$ser_id);
        $this->db->update("tblpaipafcontri",$servicedetails);
    }

    public function update_Fform($servicedetails,$ser_id){
        $this->db->where("id_forestform",$ser_id);
        $this->db->update("tblpaforestformation_details",$servicedetails);
    }

    public function update_Inland($servicedetails,$ser_id){
        $this->db->where("id_inland",$ser_id);
        $this->db->update("tblpainland",$servicedetails);
    }

    public function update_Wetland($servicedetails,$ser_id){
        $this->db->where("id_wetland",$ser_id);
        $this->db->update("tblpawetland",$servicedetails);
    }

    public function update_Caves($details,$id){
        $this->db->where("id_caves",$id);
        $this->db->update("tblpacaves",$details);
    }

    public function update_pasusinfor($details,$id){
        $this->db->where("id_apasu",$id);
        $this->db->update("tblpaapasuinfo",$details);
    }

    public function update_iw($details,$id){
        $this->db->where("iw_id",$id);
        $this->db->update("tblpainlandwetland",$details);
    }

    public function update_hiw($details,$id){
        $this->db->where("hiw_id",$id);
        $this->db->update("tblpainlandhumanmade",$details);
    }

    public function update_Topo($topodetails,$topo_id){
        $this->db->where("id_topology_desc",$topo_id);
        $this->db->update("tblpatopology_description",$topodetails);
    }

    public function updateResoFile($details,$id){
        $this->db->where("id_resolution",$id);
        $this->db->update("tblpambreso",$details);
    }

    public function updateMgmtPlan($details,$id){
        $this->db->where("id_mngmtplan",$id);
        $this->db->update("tblpamanagementplan",$details);
    }

    public function updateEcotourismMgmtPlan($details,$id){
        $this->db->where("id_mgmt_ecotourism",$id);
        $this->db->update("tblpamanagementecotourim",$details);
    }

    public function updateWetlandMgmtPlan($details,$id){
        $this->db->where("id_mgmt_wetland",$id);
        $this->db->update("tblpamanagementwetland",$details);
    }

    public function updatebdfeinformation2($details,$id){
        $this->db->where("id_livelihood",$id);
        $this->db->update("tblpalivelihood",$details);
    }

    public function updatePhysicalReport($details,$id){
        $this->db->where("id_ipaf_physical",$id);
        $this->db->update("tblipaf_physical",$details);
    }

    public function updateactualincomer($details,$id){
        $this->db->where("id_source_income",$id);
        $this->db->update("tblipafsourceincome",$details);
    }

    public function updateCavesMgmtPlan($details,$id){
        $this->db->where("id_mgmt_cave",$id);
        $this->db->update("tblpamanagementcaves",$details);
    }

    public function update_Maps($servicedetails,$ser_id){
        $this->db->where("id_image",$ser_id);
        $this->db->update("tblpamainimageupload",$servicedetails);
    }

    public function updateOthersMgmtPlan($details,$id){
        $this->db->where("id_mgmt_other",$id);
        $this->db->update("tblpamanagementothers",$details);
    }

    public function updatepaeventsa($details,$id){
        $this->db->where("id_paevent",$id);
        $this->db->update("tblpamainevent",$details);
    }

    public function updatequerySapa($details,$id){
        $this->db->where("id_sapa",$id);
        $this->db->update("tblpamaintenuresapa",$details);
    }

    public function updatequeryPCBRMA($details,$id){
        $this->db->where("id_pacbrma",$id);
        $this->db->update("tblpamaintenurepacbrma",$details);
    }

    public function updatequeryResearch($details,$id){
        $this->db->where("id_research",$id);
        $this->db->update("tblmainresearch",$details);
    }

    public function updatequeryResearchPAMReso($details2,$id){
        $this->db->where("id_research",$id);
        $this->db->update("tblpambreso",$details2);
    }

    public function updatequeryResearchEdit($details,$id){
        $this->db->where("id_research",$id);
        $this->db->update("tblmainresearch",$details);
    }

    public function updatequeryOtherTenure($details,$id){
        $this->db->where("id_tenureother",$id);
        $this->db->update("tblpamaintenureothers",$details);
    }

    public function updatequeryMoa($details,$id){
        $this->db->where("id_moa",$id);
        $this->db->update("tblpamaintenuremoa",$details);
    }

    public function updatequeryUrbanEco($details,$id){
        $this->db->where("id_urbaneco",$id);
        $this->db->update("tblurbaneco",$details);
    }

    public function updatequeryCoralReef($details,$id){
        $this->db->where("id_coral_detail",$id);
        $this->db->update("tblpacoastalcoral_details",$details);
    }

    public function updatequerySeagrass($details,$id){
        $this->db->where("id_seagrass",$id);
        $this->db->update("tblpacoastalseagrass_details",$details);
    }

    public function updatequeryMangrove($details,$id){
        $this->db->where("id_mangrove",$id);
        $this->db->update("tblpacoastalmangrove_details",$details);
    }

    public function updatequeryfishdetails($details,$id){
        $this->db->where("id_cmfish",$id);
        $this->db->update("tblcoastalmarinefish",$details);
    }

    public function updatequerydisbursements($details,$id){
        $this->db->where("id_disburementsec ",$id);
        $this->db->update("tblpaipafdisbursementfiles",$details);
    }

    public function updatequeryprevannualinc($details,$id){
        $this->db->where("id_previncome",$id);
        $this->db->update("tblpaipafincomeprevyear",$details);
    }

    public function updatequerystartbalance($details,$id){
        $this->db->where("id_startingbalance",$id);
        $this->db->update("tblipafsourceincome_startingbalance",$details);
    }

    public function updatequeryphyfinaccomtart($details,$id){
        $this->db->where("id_physical_target",$id);
        $this->db->update("tblipaf_physical_target",$details);
    }

    public function updatequeryphyfinaccomtartMAIN($details,$id){
        $this->db->where("id_ipaf_physical",$id);
        $this->db->update("tblipaf_physical",$details);
    }

    public function updatemonthlycertificate($details,$id){
        $this->db->where("id_certificate_monthly",$id);
        $this->db->update("tblipafincomecertificate_monthly",$details);
    }

    public function updateweeklycertificate($details,$id){
        $this->db->where("id_certificate_weekly",$id);
        $this->db->update("tblipafincomecertificate_weekly",$details);
    }

    public function updatedailycertificate($details,$id){
        $this->db->where("id_certificate_daily",$id);
        $this->db->update("tblipafincomecertificate_daily",$details);
    }

    public function updatequeryCoralReefImage($detailsmap,$idcoralmap){
        $this->db->where("id_coralmap",$idcoralmap);
        $this->db->update("tblpacoastalcoralmap",$detailsmap);
    }

    public function updatequerySeagrassImage($detailsmap,$idcoralmap){
        $this->db->where("id_seagrassmap",$idcoralmap);
        $this->db->update("tblpacoastalseagrassmap",$detailsmap);
    }

    public function updatequeryMangroveImage($detailsmap,$idcoralmap){
        $this->db->where("id_mangrove_map",$idcoralmap);
        $this->db->update("tblpacoastalmangrovemap",$detailsmap);
    }

    public function update_Soil($soildetails,$soil_id){
        $this->db->where("id_geology",$soil_id);
        $this->db->update("tblpageology_details",$soildetails);
    }

    public function update_bdfe($details,$id){
        $this->db->where("id_livelihood",$id);
        $this->db->update("tblpalivelihood",$details);
    }

    public function update_crmpactivity($details,$id){
        $this->db->where("id_crmp",$id);
        $this->db->update("tblpamaintenurepacbrma_crmp",$details);
    }

    public function update_programactivity($details,$id){
        $this->db->where("id_program_activity",$id);
        $this->db->update("tblmainprogram_activity",$details);
    }

    public function update_visitorsLogs($details,$id,$data1){
        if (!empty($data1)) {
            for($x = 0; $x < count($data1); $x++){
                $datas[] = array(
                    "generatedcode" => $data1[$x]["generatedcode"],
                    "visitors_gencode" => $data1[$x]["visitors_gencode"],
                    "visitorlogs_month" => $data1[$x]['visitorlogs_month'],
                    "visitorlogs_day" => $data1[$x]['visitorlogs_day'],
                    "visitorlogs_year" => $data1[$x]['visitorlogs_year'],
                    "types_of_payment" => $data1[$x]['types_of_payment'],
                    "other_payments" => $data1[$x]['other_payments'],
                    "amount_payment" => str_replace(',','',$data1[$x]['amount_payment']),
                    "date_created" => $data1[$x]['date_created'],
                    "trust_fund" => $data1[$x]['trust_fund'],
                    "mode_payment" => $data1[$x]['mode_payment'],
                    "penalty_desc" => $data1[$x]['penalty_desc'],
                );
            }
        }

        try{
            // $nxti

            if (!empty($data1)) {
                for($x =0; $x<count($data1); $x++){
                    $this->db->insert('tblpavisitorspayment',$datas[$x]);
                }
            }
                // $this->db->insert('tblipafvisitorslog',$data);
            $this->db->where("id_visitorslog",$id);
            $this->db->update("tblipafvisitorslog",$details);

            return "success";
        }catch(Exception $e){
            return "failed";
        }



    }

    public function update_Rock($details,$id){
        $this->db->where("id_rock",$id);
        $this->db->update("tblparock_details",$details);
    }

    public function update_Climate($climatedetails,$climate_id){
        $this->db->where("id_climate",$climate_id);
        $this->db->update("tblpaclimate_details",$climatedetails);
    }

    public function update_Hydro($details,$id){
        $this->db->where("id_hydrology",$id);
        $this->db->update("tblpahydrology_details",$details);
    }

    public function update_Land($details,$id){
        $this->db->where("id_landuse",$id);
        $this->db->update("tblpalanduse_details",$details);
    }

    public function update_Vege($details,$id){
        $this->db->where("id_vegetative",$id);
        $this->db->update("tblpavegetative_details",$details);
    }

    public function update_Landslide($details,$id){
        $this->db->where("id_landslide",$id);
        $this->db->update("tblpahazardlandslide_details",$details);
    }

    public function update_Flooding($details,$id){
        $this->db->where("id_flooding",$id);
        $this->db->update("tblpahazardflooding_details",$details);
    }

    public function update_Sea($seadetails,$sea_id){
        $this->db->where("id_sea",$sea_id);
        $this->db->update("tblpahazardsealevelrise",$seadetails);
    }

    public function update_Tsunami($tsunamidetails,$tsunami_id){
        $this->db->where("id_tsunami",$tsunami_id);
        $this->db->update("tblpahazardtsunami",$tsunamidetails);
    }

    public function update_Fire($tsunamidetails,$tsunami_id){
        $this->db->where("id_fire",$tsunami_id);
        $this->db->update("tblpahazardfire",$tsunamidetails);
    }

    public function update_hazard($tsunamidetails,$tsunami_id){
        $this->db->where("id_geohazard",$tsunami_id);
        $this->db->update("tblpageohazard",$tsunamidetails);
    }

    public function update_Attraction($details,$id){
        $this->db->where("attr_id",$id);
        $this->db->update("tblpaattraction",$details);
    }

    public function update_watershed($details,$id){
        $this->db->where("id_watershed ",$id);
        $this->db->update("tblpamainwatershed",$details);
    }

    public function update_Facility($details,$id){
        $this->db->where("facility_id",$id);
        $this->db->update("tblpafacility",$details);
    }

    public function update_Activity($details,$id){
        $this->db->where("eco_id",$id);
        $this->db->update("tblpaecotourism",$details);
    }

    public function update_product($details,$id){
        $this->db->where("id_products",$id);
        $this->db->update("tblpaproducts",$details);
    }

    public function update_enterprise($details,$id){
        $this->db->where("id_enterprise",$id);
        $this->db->update("tblpaenterprise",$details);
    }

    public function update_Agro($details,$id){
        $this->db->where("id_agro",$id);
        $this->db->update("tblpaagroforestry",$details);
    }

    public function update_sProt($servicedetails1,$strict_id){
        $this->db->where("id",$strict_id);
        $this->db->update("tblstrictprotzone",$servicedetails1);
    }

    public function update_Multi($servicedetails1,$multiId){
        $this->db->where("id",$multiId);
        $this->db->update("tblpamultiplezone",$servicedetails1);
    }

    public function update_ipafs($ipafdetails,$ipaf_id){
        $this->db->where("id_ipaf",$ipaf_id);
        $this->db->update("tblpaipaf",$ipafdetails);
    }

    public function update_recog($ipafdetails,$ipaf_id){
        $this->db->where("id_interrecog",$ipaf_id);
        $this->db->update("tblrecognition",$ipafdetails);
    }

    public function update_minutesofmeeting($ipafdetails,$ipaf_id){
        $this->db->where("id_reso_minutes",$ipaf_id);
        $this->db->update("tblpambreso_minutes",$ipafdetails);
    }

    public function update_bdferesourcelocations($ipafdetails,$ipaf_id){
        $this->db->where("id_po_locations",$ipaf_id);
        $this->db->update("tblpalivelihoodpolocation",$ipafdetails);
    }

    public function update_bdfeprofilings($ipafdetails,$ipaf_id){
        $this->db->where("id_bdfe_appraisal",$ipaf_id);
        $this->db->update("tblpalivelihood_appraisal",$ipafdetails);
    }

    public function update_dev($ipafdetails,$ipaf_id){
        $this->db->where("id_devfees",$ipaf_id);
        $this->db->update("tblpaipafdevfee",$ipafdetails);
    }

    public function update_penalty($ipafdetails,$ipaf_id){
        $this->db->where("id_penalty",$ipaf_id);
        $this->db->update("tblpaipafpenalty",$ipafdetails);
    }

    public function update_projs($projdetails,$projid){
        $this->db->where("id_project",$projid);
        $this->db->update("tblpamainproject",$projdetails);
    }

    public function update_progs($progdetails,$progid){
        $this->db->where("id_program",$progid);
        $this->db->update("tblmainprogram",$progdetails);
    }

    public function update_proj2($progdetails,$progid){
        $this->db->where("id_projects",$progid);
        $this->db->update("tblmainprojects",$progdetails);
    }

    public function update_biological($details,$ids){
        $this->db->where("id_pabiological",$ids);
        $this->db->update("tblpamainbiological",$details);
    }

    public function update_cepaactivityreport($details,$ids){
        $this->db->where("id_cepa_activity",$ids);
        $this->db->update("tblpamaincepa_activity_details",$details);
    }

    public function update_searchh($searchgdetails,$searchgid){
        $this->db->where("id_researcher",$searchgid);
        $this->db->update("tblmainresearcher",$searchgdetails);
    }
    public function update_staffs($staffdetails,$staffgid){
        $this->db->where("id_staff",$staffgid);
        $this->db->update("tblpasustaff",$staffdetails);
    }

    public function update_seamsecotourism($details,$id){
        $this->db->where("id_si_ecotourism",$id);
        $this->db->update("tblseams_sourceincome_ecourism",$details);
    }

    public function update_seamsfishsalt($details,$id){
        $this->db->where("id_fishery_salt",$id);
        $this->db->update("tblseams_sourceincome_fishery_salt",$details);
    }

    public function update_seamsfishfresh($details,$id){
        $this->db->where("id_fishery_fresh",$id);
        $this->db->update("tblseams_sourceincome_fishery_fresh",$details);
    }

    public function update_seamstpm($details,$id){
        $this->db->where("id_tpm",$id);
        $this->db->update("tblseams_sourceincome_tpm",$details);
    }

    public function update_seamsagri($details,$id){
        $this->db->where("id_agricultural",$id);
        $this->db->update("tblseams_sourceincome_agriculture",$details);
    }

    public function update_seamsgrazing($details,$id){
        $this->db->where("id_livestock",$id);
        $this->db->update("tblseams_sourceincome_livestock",$details);
    }

    public function update_seamsnontimbers($details,$id){
        $this->db->where("id_nontimber",$id);
        $this->db->update("tblseams_sourceincome_nontimber",$details);
    }

    public function update_seamstimbers($details,$id){
        $this->db->where("id_timber",$id);
        $this->db->update("tblseams_sourceincome_timber",$details);
    }

    public function update_seamsrwc($details,$id){
        $this->db->where("id_rwc",$id);
        $this->db->update("tblseams_sourceincome_rwc",$details);
    }

    public function update_seamsmining($details,$id){
        $this->db->where("id_mining",$id);
        $this->db->update("tblseams_sourceincome_mining",$details);
    }

    public function update_seamsindustry($details,$id){
        $this->db->where("id_industry",$id);
        $this->db->update("tblseams_sourceincome_industry",$details);
    }

    public function update_seamsservice($details,$id){
        $this->db->where("id_service",$id);
        $this->db->update("tblseams_sourceincome_service",$details);
    }

    public function update_seamssource($details,$id){
        $this->db->where("id_source",$id);
        $this->db->update("tblseams_sourceincome_source",$details);
    }

    public function update_Legal($details,$id){
        $this->db->where("id_palegis",$id);
        $this->db->update("tblpamainlegislation",$details);
    }

    public function update_main_paname($details,$id){
        $this->db->where("id_main",$id);
        $this->db->update("tblpamain",$details);
    }

    public function update_coralreefs($data,$data_coral_1,$data_coral_2,$data_coral_3,$data_coral_4,$data_coral_5)
    {
        if (!empty($data_coral_3)) {
                for($x = 0; $x < count($data_coral_3); $x++){
                $datacoralreeflocation[] = array(
                    "generatedcode"         => $data_coral_3[$x]['codegen'],
                    "coastal_generatedcode"         => $data_coral_3[$x]['Ccodegen'],
                    "coral_municipal"         => $data_coral_3[$x]['coral_municipal'],
                    "coral_barangay"         => $data_coral_3[$x]['coral_barangay'],
                );
            }
        }

        if (!empty($data_coral_2)) {
                for($x = 0; $x < count($data_coral_2); $x++){
                $datacoralreefspecies[] = array(
                    "generatedcode"         => $data_coral_2[$x]['codegen'],
                    "coastal_generatedcode"         => $data_coral_2[$x]['Ccodegen'],
                    "coralspecies_id"         => $data_coral_2[$x]['coralspecies_id'],
                );
            }
        }

        if (!empty($data_coral_1)) {
                for($x = 0; $x < count($data_coral_1); $x++){
                $datacoralreefspeciescompo[] = array(
                    "generatedcode"         => $data_coral_1[$x]['codegen'],
                    "coastal_generatedcode"         => $data_coral_1[$x]['Ccodegen'],
                    "speciescompo_img"         => $data_coral_1[$x]['speciescompo_img'],
                    "species_name"         => $data_coral_1[$x]['species_name'],
                );
            }
        }

        if (!empty($data_coral_4)) {
                for($x = 0; $x < count($data_coral_4); $x++){
                $datacoralreefmonitoringsite[] = array(
                    "generatedcode"         => $data_coral_4[$x]['codegen'],
                    "coastal_generatedcode"         => $data_coral_4[$x]['Ccodegen'],
                    "monitoring_site_point"         => $data_coral_4[$x]['monitoring_site_point'],
                );
            }
        }

        if (!empty($data_coral_5)) {
                for($x = 0; $x < count($data_coral_5); $x++){
                $datacoralreefkmlkmz[] = array(
                    "generatedcode"         => $data_coral_5[$x]['codegen'],
                    "coastal_generatedcode"         => $data_coral_5[$x]['Ccodegen'],
                    "kmlkmz"         => $data_coral_5[$x]['kmlkmz'],
                );
            }
        }

        try{

            if (!empty($data_coral_3)) {
                for($x =0; $x<count($data_coral_3); $x++){
                    $this->db->insert('tblpacoastalcorallocation',$datacoralreeflocation[$x]);
                }
            }

            if (!empty($data_coral_2)) {
                for($x =0; $x<count($data_coral_2); $x++){
                    $this->db->insert('tblpacoastalcoralspeciesdata',$datacoralreefspecies[$x]);
                }
            }

            if (!empty($data_coral_1)) {
                for($x =0; $x<count($data_coral_1); $x++){
                    $this->db->insert('tblpacoastalcoralspeciescomposition',$datacoralreefspeciescompo[$x]);
                }
            }

            if (!empty($data_coral_4)) {
                for($x =0; $x<count($data_coral_4); $x++){
                    $this->db->insert('tblpacoastalcoralspeciesmonitoringsite',$datacoralreefmonitoringsite[$x]);
                }
            }

            if (!empty($data_coral_5)) {
                for($x =0; $x<count($data_coral_5); $x++){
                    $this->db->insert('tblpacoastalcoralkmlkmz',$datacoralreefkmlkmz[$x]);
                }
            }

            $this->db->where('id_coralreef_ecosystem',$data['id_coralreef_ecosystem'])
            ->update('tblpacoastalcoral',$data);

        // $this->db->where("id_coralreef_ecosystem",$id);
        // $this->db->update("tblpacoastalcoral",$details);

            return "success";
        }catch(Exception $e){
            return "failed";
        }

    }


    public function update_ecotourismtransportation($al,$aid){
        $this->db->where("id_transportation",$aid);
        $this->db->update("tblseams_sourceincome_ecourism_sub_transportation",$al);
    }

    public function remove_ecotourismtransportation($aid){
        $this->db->where("id_transportation",$aid);
        $this->db->delete("tblseams_sourceincome_ecourism_sub_transportation");
    }

    public function update_ecotourismtransportationOthers($al,$aid){
        $this->db->where("id_transport_others",$aid);
        $this->db->update("tblseams_sourceincome_ecourism_sub_transportation_others",$al);
    }

    public function remove_ecotourismtransportationOthers($aid){
        $this->db->where("id_transport_others",$aid);
        $this->db->delete("tblseams_sourceincome_ecourism_sub_transportation_others");
    }

    public function update_iccips($servicedetails,$ser_id){
        $this->db->where("id_iccip",$ser_id);
        $this->db->update("tbliccip",$servicedetails);
    }

    public function update_demo($servicedetails,$ser_id){
        $this->db->where("id_seams_demo",$ser_id);
        $this->db->update("tblseamsdemographic",$servicedetails);
    }

    public function update_seamsincome($servicedetails,$ser_id){
        $this->db->where("id_seams_income",$ser_id);
        $this->db->update("tblseamsincome",$servicedetails);
    }

    public function update_ipafincome($al,$aid){
        $this->db->where("id_incomeOthers",$aid);
        $this->db->update("tblpaipafincomeothers",$al);
    }

    public function remove_ipafincome($aid){
        $this->db->where("id_incomeOthers",$aid);
        $this->db->delete("tblpaipafincomeothers");
    }


    /*
     * Fetch files data from the database
     * @param id returns a single record if specified, otherwise all records
     */



    public function getRows($id = ''){
        $this->db->select('id_pamb_file,file_name,uploaded_on');
        $this->db->from('tblpambmemberfile');
        if($id){
            $this->db->where('id_pamb_file',$id);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $this->db->order_by('uploaded_on','desc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return !empty($result)?$result:false;
    }

    /*
     * Insert file data into the database
     * @param array the data for inserting into the table
     */
    public function insert($data = array()){
        $insert = $this->db->insert_batch('tblpambmemberfile',$data);
        return $insert?true:false;
    }

    function save_upload($image){
        $data = array(
                // 'title'     => $title,
                'file_name' => $file_name
            );
        $result= $this->db->insert('tblpambmemberfile',$data);
        return $result;
    }

    public function getAllThreat($codegens){
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
        ->where('generatedcode',$codegens);
        $query = $this->db->get($this->threat);
        return $query->result();
    }

    public function getAllRef($codegens){
        $this->db->join('tblpareference_type','tblpareference.type_citation = tblpareference_type.id_type_reference','LEFT');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get($this->ref);
        return $query->result();
    }

    // public function getAllReffromProgram($codes,$id){
    //     $this->db->join('tblpareference_type','tblpareference.type_citation = tblpareference_type.id_type_reference','LEFT');
    //     $this->db->where('research_code',$codes);
    //     $this->db->where('id_program',$id);
    //     $query = $this->db->get($this->ref);
    //     // return $query;
    //     return $query->result();
    // }

    public function getAllReffromProgram($codes,$id)
    {
        $this->db->join('tbldatemonth','tblpareference.ref_date_month=tbldatemonth.id_month','LEFT');
        $this->db->join('tbldateyear','tblpareference.ref_date_year=tbldateyear.id_year','LEFT');
        $this->db->join('tblpareference_type','tblpareference.type_citation=tblpareference_type.id_type_reference','LEFT');
        $this->db->where('research_code',$codes);
        $this->db->where('id_program',$id);
        $query = $this->db->get('tblpareference');
        return $query->result();
    }

    public function getAllRefResearch($codegens){
        $this->db->where('research_code',$codegens);
        $query = $this->db->get($this->ref);
        return $query->result();
    }

    public function getallpabdfeponames($codegens){
        $this->db->where('bdfe_codegen',$codegens);
        $query = $this->db->get('tblpalivelihood_poname');
        return $query->result();
    }

    public function getallpabdfeponamesStatHistory($code2){
        $this->db->select('group_concat("Status : ",po_status,"<br>As of (Year) : ",bdfe_po_year,"<br>Remarks : ",bdfe_po_remarks separator "<br> ") as postathis,bdfe_po_codegen, id_bdfe_pohistory');
        $this->db->join('tblpabdfepostatus','tblpalivelihood_pohistory.bdfe_po_status = tblpabdfepostatus.id_po_status','LEFT');
        $this->db->where('bdfe_po_codegen',$code2);
        $query = $this->db->get('tblpalivelihood_pohistory');
        return $query->result();
    }

    public function getallpabdfeponamesStatHistorys($code2){
        $this->db->join('tblpabdfepostatus','tblpalivelihood_pohistory.bdfe_po_status = tblpabdfepostatus.id_po_status','LEFT');
        $this->db->where('bdfe_po_codegen',$code2);
        $query = $this->db->get('tblpalivelihood_pohistory');
        return $query->result();
    }

    public function update_bdfeponames($ipafdetails,$ipaf_id){
        $this->db->where("id_bdfe_po",$ipaf_id);
        $this->db->update("tblpalivelihood_poname",$ipafdetails);
    }

    public function getallpaevents($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpamainevent');
        return $query->result();
    }

    public function getallpaeventparticipant($codegens){
        $this->db->select('group_concat(participant_name separator ", ") as participant');
        $this->db->where('evet_code',$codegens);
        $query = $this->db->get('tblpamainevent_participant');
        return $query->result();
    }

    public function getallpaeventparticipants($codegens){
        // $this->db->select('group_concat(participant_name separator ", ") as participant');
        $this->db->where('evet_code',$codegens);
        $query = $this->db->get('tblpamainevent_participant');
        return $query->result();
    }

    public function getAlldev($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaipafdevfee');
        return $query->result();
    }

    public function getallsapa($codegens){
        $this->db->join('tblpamaintenure_status','tblpamaintenuresapa.sapa_status = tblpamaintenure_status.id_tenure_status','left')
        ->join('tblpamaintenuresapa_development','tblpamaintenuresapa.sapa_nature_development = tblpamaintenuresapa_development.id_sapa_development','left')
        ->where('generatedcode',$codegens);
        $query = $this->db->get('tblpamaintenuresapa');
        return $query->result();
    }

    public function getallmoa($codegens){
        $this->db->join('tblpamaintenure_status','tblpamaintenuremoa.moa_status = tblpamaintenure_status.id_tenure_status','left')
        ->where('generatedcode',$codegens);
        $query = $this->db->get('tblpamaintenuremoa');
        return $query->result();
    }

    public function removepacbrma($id){
        $this->db->where('id_pacbrma',$id);
        $query = $this->db->get('tblpamaintenurepacbrma');
        return $query->result();
    }

    public function getallpacbrma($codegens){
        $this->db->join('tblpamaintenure_status','tblpamaintenurepacbrma.pacbrma_status = tblpamaintenure_status.id_tenure_status','left')
        ->where('generatedcode',$codegens);
        $query = $this->db->get('tblpamaintenurepacbrma');
        return $query->result();
    }

    public function countRowCRMP($codegens,$id){
        // $this->db->join('tblpamaintenurepacbrma','tblpamaintenurepacbrma_crmp.generatedcode = tblpamaintenurepacbrma.generatedcode','left')
        // ->where('tblpamaintenurepacbrma_crmp.generatedcode',$codegens)
        $this->db->where('tblpamaintenurepacbrma_crmp.id_pacbrma',$id);
        $query = $this->db->get("tblpamaintenurepacbrma_crmp");
        return $query->num_rows();

    }

    public function getAllpenalty($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaipafpenalty');
        return $query->result();
    }

    public function getAllIpafs($codegens){
        $this->db->select('id_ipaf,generatedcode,no_visitors,visitors,facilities,parking_area,recreational_activity,water_activity,date_month,date_year,SUM(visitors+facilities+parking_area+recreational_activity+water_activity) as total');
        $this->db->where('generatedcode',$codegens);
        $this->db->group_by('date_year');
        $this->db->group_by('date_month');

        $query = $this->db->get($this->ipafs);
        return $query->result();
    }

    public function getAllLGU($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get($this->lgu);
        return $query->result();
    }

    public function getAllstaff($codegens){
        $this->db->join("tblsex","tblpasustaff.tsex = tblsex.id",'left')
                 ->join("tblappoinmentstatus","tblpasustaff.tstatus = tblappoinmentstatus.id_astatus","left")
        ->where('generatedcode',$codegens);
        $query = $this->db->get($this->staff);
        return $query->result();
    }

    public function getAllGallery($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('gallery');
        return $query->result();
    }

    public function getAllTopoImages($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpatopology');
        return $query->result();
    }

    public function getAllGalleryTopo($codegens){
        // $this->db->select('group_concat(" * ", topology_desc separator "<br> ") as try2, topo_map');
        $this->db->join('tblpatopology_description','tblpatopology.generatedcode = tblpatopology_description.generatedcode','left');
        $this->db->where('tblpatopology.generatedcode',$codegens)
        ->group_by('tblpatopology.generatedcode');
        $query = $this->db->get('tblpatopology');
        return $query->result();

        // other_title,": ",other_amount separator "<br> "
    }

    public function getAllGallerysoil($codegens){
        // $this->db->select('group_concat(" * ", geology_desc separator "<br> ") as try2, geology_map');
        // $this->db->join('tblpageology_details','tblpageology.generatedcode = tblpageology_details.generatedcode','left')
        $this->db->where('tblpageology.generatedcode',$codegens)
        ->group_by('tblpageology.generatedcode');
        $query = $this->db->get('tblpageology');
        return $query->result();
    }

    public function getAllGalleryrock($codegens){
        // $this->db->select('group_concat(" * ", rock_details separator "<br> ") as try2, rock_img');
        // $this->db->join('tblparock_details','tblparock.generatedcode = tblparock_details.generatedcode','left')
        $this->db->where('tblparock.generatedcode',$codegens)
        ->group_by('tblparock.generatedcode');
        $query = $this->db->get('tblparock');
        return $query->result();
    }

    public function getAllGalleryhydro($codegens){
        // $this->db->select('group_concat(" * ", rock_details separator "<br> ") as try2, rock_img');
        // $this->db->join('tblparock_details','tblparock.generatedcode = tblparock_details.generatedcode','left')
        $this->db->where('generatedcode',$codegens)
        ->group_by('generatedcode');
        $query = $this->db->get('tblpahydrology');
        return $query->result();
    }

    public function getAllGalleryexland($codegens){
        // $this->db->select('group_concat(" * ", rock_details separator "<br> ") as try2, rock_img');
        // $this->db->join('tblparock_details','tblparock.generatedcode = tblparock_details.generatedcode','left')
        $this->db->where('generatedcode',$codegens)
        ->group_by('generatedcode');
        $query = $this->db->get('tblpalanduse');
        return $query->result();
    }

    public function getAllGalleryclimate($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaclimate');
        return $query->result();
    }

    public function getAllGallerylandlside($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpahazardlandslide');
        return $query->result();
    }

    public function getAllGalleryflooding($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpahazardflooding');
        return $query->result();
    }

    public function getAllGallerysealevel($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpahazardsealevelrise');
        return $query->result();
    }

    public function getAllGallerytsunami($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpahazardtsunami');
        return $query->result();
    }

    public function getAllGalleryothergeohazard($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpageohazard');
        return $query->result();
    }

    public function getAllGallerymz($codegens){
        $this->db->where('generatedcode_mgnt',$codegens);
        $query = $this->db->get('tblpamanagementzone');
        return $query->result();
    }

    public function getAllGallerybdfe($codegens){
        $this->db->join('tblpalivelihoodmultiimage','tblpalivelihood.bdfe_codegen = tblpalivelihoodmultiimage.bdfe_codegen','LEFT');
        $this->db->where('tblpalivelihood.generatedcode',$codegens);
        $query = $this->db->get('tblpalivelihood');
        return $query->result();
    }

    public function getAllGallerybdfeprods($codegens){
        $this->db->join('tblpalivelihood_po_product','tblpalivelihood.bdfe_codegen = tblpalivelihood_po_product.bdfe_codegen','LEFT');
        $this->db->where('tblpalivelihood.generatedcode',$codegens);
        $query = $this->db->get('tblpalivelihood');
        return $query->result();
    }

    public function getAllGallerybdfeProduct($code2){
        $this->db->where('bdfe_codegen',$code2);
        $query = $this->db->get('tblpalivelihood_po_product');
        return $query->result();
    }

    public function getAllGalleryattraction($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaattraction');
        return $query->result();
    }

    public function getAllGalleryactivity($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaecotourism');
        return $query->result();
    }

    public function getAllGalleryfacility($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpafacility');
        return $query->result();
    }

    public function getAllGallerythreat($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpathreat');
        return $query->result();
    }

    public function getAllGallerymaps($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpamainimageupload');
        return $query->result();
    }

    public function getseamsIncome($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblseamsincome');
        return $query->result();
    }

    public function getAllincomedate($codegens,$month,$day,$year){
        $this->db->where('generatedcode',$codegens);
        $this->db->where('date_month_income',$month);
        $this->db->where('date_day_income',$day);
        $this->db->where('date_year_income',$year);
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function getAllipafothersss($ser_id){
        $this->db->where('id_fromincome',$ser_id);
        // $this->db->where('date_day_income',$day);
        $query = $this->db->get('tblpaipafincomeothers');
        return $query->result();
    }

    public function getAlltrustdate($codegens,$month,$year,$day){
        $this->db->where('generatedcode',$codegens);
        $this->db->where('trust_month',$month);
        $this->db->where('trust_year',$year);
        $this->db->where('trust_day',$day);
        $query = $this->db->get('tblpaipaftrustreciept');
        return $query->result();
    }

    public function getAllvisitordate($codegens,$month,$year){
        $this->db->where('generatedcode',$codegens);
        $this->db->where('date_month',$month);
        $this->db->where('date_year',$year);
        $query = $this->db->get('tblpaipafvisitors');
        return $query->result();
    }

    public function getAllfftype($codegens,$type){
        $this->db->where('generatedcode',$codegens);
        $this->db->where('forest_formation',$type);
        $query = $this->db->get('tblpaforestformation_details');
        return $query->result();
    }

    public function getAlldevdate($codegens,$month,$year){
        $this->db->where('generatedcode',$codegens);
        $this->db->where('dev_month',$month);
        $this->db->where('dev_year',$year);
        $query = $this->db->get('tblpaipafdevfee');
        return $query->result();
    }

    public function getAllcontridate($codegens,$month,$year){
        $this->db->where('generatedcode',$codegens);
        $this->db->where('date_month_coontri',$month);
        $this->db->where('date_year_coontri',$year);
        $query = $this->db->get('tblpaipafcontri');
        return $query->result();
    }

    public function getAllpenaltydate($codegens,$month,$year){
        $this->db->where('generatedcode',$codegens);
        $this->db->where('penalty_month',$month);
        $this->db->where('penalty_year',$year);
        $query = $this->db->get('tblpaipafpenalty');
        return $query->result();
    }

    public function getAlllocationdata($codegens,$region,$province,$municipal,$barangay){
        $this->db->where('generatedcode',$codegens);
        $this->db->where('region_id',$region);
        $this->db->where('province_id',$province);
        $this->db->where('municipal_id',$municipal);
        $this->db->where('barangay_id',$barangay);
        $query = $this->db->get('tblpamainlocation');
        return $query->result();
    }

    public function getallyearprevactualincome($year,$codegens){
        $this->db->where('generatedcode',$codegens);
        $this->db->where('previncome_year',$year);       
        $query = $this->db->get('tblpaipafincomeprevyear');
        return $query->result();
    }

    public function getallyearstartingbalances($year,$codegens){
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_sb_year',$year);       
        $query = $this->db->get('tblipafsourceincome_startingbalance');
        return $query->result();
    }


    public function getalldateactualincome($codegens,$month,$day,$year){
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_date_month',$month);       
        $this->db->where('income_date_day',$day);       
        $this->db->where('income_date_year',$year);       
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getalldatamonthlycertificateupload($codegens,$month,$year){
        $this->db->where('generatedcode',$codegens);
        $this->db->where('certificate_date_month',$month);       
        $this->db->where('certificate_date_year',$year);       
        $query = $this->db->get('tblipafincomecertificate_monthly');
        return $query->result();
    }

    public function getalldataweeklycertificateupload($codegens,$vdate){
        $this->db->where('generatedcode',$codegens);
        $this->db->where('certificate_daterange',$vdate);       
        $query = $this->db->get('tblipafincomecertificate_weekly');
        return $query->result();
    }

    public function getalldatadailycertificateupload($codegens,$vdate){
        $this->db->where('generatedcode',$codegens);
        $this->db->where('certificate_date',$vdate);       
        $query = $this->db->get('tblipafincomecertificate_daily');
        return $query->result();
    }

    public function createcertificatemonthly($data = []){
         $this->db->insert('tblipafincomecertificate_monthly',$data);
         return $this->db->insert_id();
    }

    public function createcertificateweekly($data = []){
         $this->db->insert('tblipafincomecertificate_weekly',$data);
         return $this->db->insert_id();
    }

    public function createcertificatedaily($data = []){
         $this->db->insert('tblipafincomecertificate_daily',$data);
         return $this->db->insert_id();
    }

    public function getallyearactualincome($year,$codegens){
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_date_year',$year);       
        $this->db->group_by('income_date_year');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getAllbiologicaldata($search,$codegens){
        $this->db->join('tblwspeciesgenus','tblpamainbiological.id_genus_get = tblwspeciesgenus.id_genus','left');
        $this->db->join('tblfamily','tblwspeciesgenus.family_id = tblfamily.id_scientific','left');
        $this->db->join('tblorderw','tblfamily.Ordercode = tblorderw.id_family','left');
        $this->db->join('tblclass','tblorderw.ClassCodes = tblclass.id_c','left');
        $this->db->join('tblwcategory','tblclass.WCode = tblwcategory.id','left');
        $this->db->where('id_genus',$search);
        $this->db->where('tblpamainbiological.generatedcode',$codegens);
        $query = $this->db->get('tblpamainbiological');
        return $query->result();
    }

    public function getAlldatawhensameyrmonthid($year,$month,$codegens){
        $this->db->where('physical_target_year',$year);
        $this->db->where('physical_target_month',$month);
        $this->db->where('physical_code',$codegens);
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }
    public function searchifyearallreadyexist($search,$codegens)
    {
        $this->db->where('generatedcode',$codegens)
        ->where('year_disbursement',$search);
        $query = $this->db->get('tblpaipafdisbursementfiles');
        return $query->result();
    }

    public function getAllcoralspeciesdata($codegens,$search){

        $this->db->join('tblpacoastalcoralspecies','tblpacoastalcoralspeciesdata.coralspecies_id = tblpacoastalcoralspecies.id_coral_species','left');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('coralspecies_id',$search);
        $query = $this->db->get('tblpacoastalcoralspeciesdata');
        return $query->result();
    }

    public function getAllseagrassspeciesNew($codegens,$search){

        $this->db->join('tblpacoastalseagrassspecies','tblpacoastalseagrassspeciesdata.seagrass_species_name = tblpacoastalseagrassspecies.id_seagrassSpecies','left');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('seagrass_species_name',$search);
        $query = $this->db->get('tblpacoastalseagrassspeciesdata');
        return $query->result();
    }

    public function getAllMangroveSpecies($codegens,$search){

        $this->db->join('tblpacoastalmangrovespecies','tblpacoastalmangrovespeciesdata.mangrove_species = tblpacoastalmangrovespecies.id_mangrove_species','left');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('mangrove_species',$search);
        $query = $this->db->get('tblpacoastalmangrovespeciesdata');
        return $query->result();
    }

    public function getAllseagrassspeciesdata($codegens,$search){

        $this->db->join('tblpacoastalseagrassspecies','tblpacoastalseagrassspeciesdata.seagrass_species_name = tblpacoastalseagrassspecies.id_seagrassSpecies','left');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('seagrass_species_name',$search);
        $query = $this->db->get('tblpacoastalseagrassspeciesdata');
        return $query->result();
    }

    public function getalliccips($codegens,$idICCIP){
        $this->db->where('generatedcode',$codegens);
        $this->db->where('iccip',$idICCIP);
        $query = $this->db->get('tbliccip');
        return $query->result();
    }

    public function fetchSearchVisitor($searchPa,$year_list,$quarter)
    {
        $this->db->select('(no_male_local + no_female_local) as total_local,
            (no_male_foreign + no_female_foreign) as total_foreign,
            (no_male_local + no_male_foreign + no_male_local_student + no_male_local_pwd + no_male_local_sc + no_male_local_children) as total_male,
            (no_female_local + no_female_foreign + no_female_local_student + no_female_local_pwd + no_female_local_sc + no_female_local_children) as total_female,
            (no_male_local_student + no_female_local_student) as total_student,
            (no_male_local_pwd + no_female_local_pwd) as total_pwd,
            (no_male_local_sc + no_female_local_sc) as total_sc,
            (no_male_local_children + no_female_local_children) as total_children,
            (no_female_local + no_female_foreign + no_female_local_student + no_female_local_pwd + no_female_local_sc + no_female_local_children + no_male_local + no_male_foreign + no_male_local_student + no_male_local_pwd + no_male_local_sc + no_male_local_children) as grand_total,
            id_visitors,generatedcode,
            date_month,date_day,
            date_year,
            no_male_local,
            no_female_local,
            no_male_foreign,
            no_female_foreign,
            no_male_local_student,
            no_female_local_student,
            no_male_local_pwd,
            no_female_local_pwd,
            no_male_local_sc,
            no_female_local_sc,
            no_male_local_children,
            no_female_local_children
            ');
        $this->db->join('tbldatemonth','tblpaipafvisitors.date_month = tbldatemonth.month','Left');
        $this->db->where('tblpaipafvisitors.generatedcode',$searchPa);
        $this->db->where('date_year',$year_list);
        $this->db->where('QtrCode',$quarter);
        $query = $this->db->get('tblpaipafvisitors');
        return $query->result();
    }

    public function fetchSearchVisitorGrandTotal($searchPa,$year_list,$quarter)
    {
        $this->db->select('SUM(no_male_local + no_female_local + no_male_foreign + no_female_foreign + no_male_local_student + no_female_local_student + no_male_local_pwd + no_female_local_pwd + no_male_local_sc + no_female_local_sc + no_male_local_children + no_female_local_children) as overallGrandTotal,
            SUM(no_male_local + no_female_local) as gtadults,
            SUM(no_male_local_student + no_female_local_student) as gtstudents,
            SUM(no_male_local_pwd + no_female_local_pwd) as gtpwd,
            SUM(no_male_local_sc + no_female_local_sc) as gtsc,
            SUM(no_male_local_children + no_female_local_children) as gtchildren,
            SUM(no_male_foreign + no_female_foreign) as gtforeign,
            id_visitors,generatedcode,date_month,date_day,date_year,no_male_local,no_female_local,no_male_foreign,no_female_foreign');
        $this->db->join('tbldatemonth','tblpaipafvisitors.date_month = tbldatemonth.month','Left');
        $this->db->where('tblpaipafvisitors.generatedcode',$searchPa);
        $this->db->where('date_year',$year_list);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblpaipafvisitors.generatedcode');
        $query = $this->db->get('tblpaipafvisitors');
        return $query->result();
    }

    public function getAllSeamsFishSalt($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_fishery_salt.id_demographic_fish = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->join('tbldatemonth','tblseams_sourceincome_fishery_salt.season_of_fishing = tbldatemonth.id_month','LEFT');
        $this->db->where('tblseams_sourceincome_fishery_salt.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_fishery_salt');
        return $query->result();
    }
     public function getAllSeamsFishSaltGroup($codegens){
        // $this->db->join('tblseamsdemographic','tblseams_sourceincome_fishery_salt.id_demographic_fish = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseamsdemographic.generatedcode',$codegens);
        $this->db->group_by('id_seams_demo');
        $query = $this->db->get('tblseamsdemographic');
        return $query->result();
    }

    public function getAllSeamsFishFresh($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_fishery_fresh.id_demographic_fish_fresh = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->join('tbldatemonth','tblseams_sourceincome_fishery_fresh.season_of_fishing_fresh = tbldatemonth.id_month','LEFT');
        $this->db->where('tblseams_sourceincome_fishery_fresh.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_fishery_fresh');
        return $query->result();
    }
     public function getAllSeamsFishFreshGroup($codegens){
        // $this->db->join('tblseamsdemographic','tblseams_sourceincome_fishery_salt.id_demographic_fish = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseamsdemographic.generatedcode',$codegens);
        $this->db->group_by('id_seams_demo');
        $query = $this->db->get('tblseamsdemographic');
        return $query->result();
    }

    public function getAllSeamstpm($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_tpm.id_demographic_tpm = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->join('tbldatemonth','tblseams_sourceincome_tpm.season_trading_tpm = tbldatemonth.id_month','LEFT');
        $this->db->where('tblseams_sourceincome_tpm.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_tpm');
        return $query->result();
    }

    public function getAllSeamsagri($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_agriculture.id_demographic_agricultural = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->join('tbldatemonth','tblseams_sourceincome_agriculture.season_of_agricultural = tbldatemonth.id_month','LEFT');
        $this->db->where('tblseams_sourceincome_agriculture.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_agriculture');
        return $query->result();
    }

    public function getAllSeamsgrazing($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_livestock.id_demographic_livestock = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->join('tbldatemonth','tblseams_sourceincome_livestock.season_livestock = tbldatemonth.id_month','LEFT');
        $this->db->where('tblseams_sourceincome_livestock.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_livestock');
        return $query->result();
    }

    public function getAllSeamsnontimber($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_nontimber.id_demographic_nontimber = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->join('tbldatemonth','tblseams_sourceincome_nontimber.season_nontimber = tbldatemonth.id_month','LEFT');
        $this->db->where('tblseams_sourceincome_nontimber.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_nontimber');
        return $query->result();
    }

    public function getAllSeamstimber($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_timber.id_demographic_timber = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->join('tbldatemonth','tblseams_sourceincome_timber.season_timber = tbldatemonth.id_month','LEFT');
        $this->db->where('tblseams_sourceincome_timber.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_timber');
        return $query->result();
    }

    public function getAllSeamsrwc($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_rwc.id_demographic_rwc = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->join('tbldatemonth','tblseams_sourceincome_rwc.season_rwc = tbldatemonth.id_month','LEFT');
        $this->db->where('tblseams_sourceincome_rwc.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_rwc');
        return $query->result();
    }

    public function getAllSeamsmining($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_mining.id_demographic_mining = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_mining.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_mining');
        return $query->result();
    }

    public function getAllSeamsindustry($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_industry.id_demographic_industry = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_industry.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_industry');
        return $query->result();
    }

    public function getAllSeamsservice($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_service.id_demographic_service = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_service.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_service');
        return $query->result();
    }

    public function getAllSeamssource($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_source.id_demographic_source = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_source.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_source');
        return $query->result();
    }

    public function getAllSeamsEcoMaterial($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_economic_material.id_demographic_ecocostmaterial = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_economic_material.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_economic_material');
        return $query->result();
    }

    public function getAllSeamsEcoEquipment($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_economic_equipment.id_demographic_ecocostequipment = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_economic_equipment.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_economic_equipment');
        return $query->result();
    }

    public function getAllSeamsEcoLabor($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_economic_labor.id_demographic_ecocostlabor = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_economic_labor.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_economic_labor');
        return $query->result();
    }

    public function getAllSeamsEcoOther($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_economic_other.id_demographic_ecocostother = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_economic_other.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_economic_other');
        return $query->result();
    }

    public function getAllSeamsfsMaterial($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_fishsalt_material.id_demographic_fishsaltcostmaterial = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_fishsalt_material.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_fishsalt_material');
        return $query->result();
    }

    public function getAllSeamsfsEquipment($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_fishsalt_equipment.id_demographic_fishsaltcostequipment = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_fishsalt_equipment.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_fishsalt_equipment');
        return $query->result();
    }

    public function getallcrmpactivity($ids){
        // $this->db->where('generatedcode',$codegens);
        $this->db->where('id_pacbrma ',$ids);
        $query = $this->db->get('tblpamaintenurepacbrma_crmp');
        return $query->result();
    }

    public function getAllSeamsfsLabor($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_fishsalt_labor.id_demographic_fishsaltcostlabor = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_fishsalt_labor.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_fishsalt_labor');
        return $query->result();
    }

    public function getAllSeamsfsOther($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_fishsalt_other.id_demographic_fishsaltcostother = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_fishsalt_other.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_fishsalt_other');
        return $query->result();
    }

    public function getAllSeamsffMaterial($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_fishfresh_material.id_demographic_fishfreshcostmaterial = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_fishfresh_material.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_fishfresh_material');
        return $query->result();
    }

    public function getAllSeamsffEquipment($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_fishfresh_equipment.id_demographic_fishfreshcostequipment = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_fishfresh_equipment.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_fishfresh_equipment');
        return $query->result();
    }

    public function getAllSeamsffLabor($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_fishfresh_labor.id_demographic_fishfreshcostlabor = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_fishfresh_labor.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_fishfresh_labor');
        return $query->result();
    }

    public function getAllSeamsffOther($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_fishfresh_other.id_demographic_fishfreshcostother = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_fishfresh_other.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_fishfresh_other');
        return $query->result();
    }

    public function getAllSeamstpmMaterial($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_tpm_material.id_demographic_tpmcostmaterial = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_tpm_material.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_tpm_material');
        return $query->result();
    }

    public function getAllSeamstpmEquipment($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_tpm_equipment.id_demographic_tpmcostequipment = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_tpm_equipment.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_tpm_equipment');
        return $query->result();
    }

    public function getAllSeamstpmLabor($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_tpm_labor.id_demographic_tpmcostlabor = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_tpm_labor.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_tpm_labor');
        return $query->result();
    }

    public function getAllSeamstpmOther($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_tpm_other.id_demographic_tpmcostother = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_tpm_other.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_tpm_other');
        return $query->result();
    }

    public function getAllSeamsagriMaterial($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_agri_material.id_demographic_agricostmaterial = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_agri_material.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_agri_material');
        return $query->result();
    }

    public function getallProjectreportFileUpload($codegens){
        $this->db->where('proj_code',$codegens);
        $query = $this->db->get('tblmainprojects_files');
        return $query->result();
    }

    public function getallCEPAActivityimg($codegens){
        $this->db->where('cepacode',$codegens);
        $query = $this->db->get('tblpamaincepa_activity_img');
        return $query->result();
    }

    public function getallResearchModalPAMBResoEdit($codegens){
        $this->db->where('research_code',$codegens);
        $query = $this->db->get('tblmainresearch_files');
        return $query->result();
    }

    public function getallResearchModalPAMBResoEditEdit($codegens){
        $this->db->where('research_code',$codegens);
        $query = $this->db->get('tblmainresearch_pambreso');
        return $query->result();
    }

    public function getallResearchreportFileUpload($codegens){
        $this->db->where('research_code',$codegens);
        $query = $this->db->get('tblmainresearch_files');
        return $query->result();
    }

    public function getalltransmitalFileUpload($codegens){
        $this->db->join('tbldatemonth','tblpambreso_transmittal.month_transmital = tbldatemonth.id_month','LEFT');
        $this->db->join('tbldateyear','tblpambreso_transmittal.year_transmital = tbldateyear.id_year','LEFT');
        $this->db->where('transmitcode',$codegens);
        $query = $this->db->get('tblpambreso_transmittal');
        return $query->result();
    }

    public function getallMnualoperationFileUpload($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpasumanualoperation');
        return $query->result();
    }

    public function getallpasusoFileUpload($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpasu_sofile');
        return $query->result();
    }

     public function getalllegismapcompile($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpamainlegislation_compilemap');
        return $query->result();
    }

    public function getallapasusoFileUpload($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblapasu_sofile');
        return $query->result();
    }

    public function getallResoMinutesFileUpload($codegens){
        $this->db->join('tbldatemonth','tblpambreso_minutes.month_minutes = tbldatemonth.id_month','LEFT');
        $this->db->join('tbldateyear','tblpambreso_minutes.year_minutes = tbldateyear.id_year','LEFT');
        $this->db->where('pambreso_code',$codegens);
        $query = $this->db->get('tblpambreso_minutes');
        return $query->result();
    }

    public function getallKapSurveyReport($codegens){
        $this->db->join('tbldatemonth','tblpamaincepa_kap_surveyed.kap_month = tbldatemonth.id_month','LEFT');
        $this->db->join('tbldateyear','tblpamaincepa_kap_surveyed.kap_year = tbldateyear.id_year','LEFT');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpamaincepa_kap_surveyed');
        return $query->result();
    }

    public function getallCEPAEvent($codegens){
        $this->db->join('tbldatemonth','tblpamaincepa_event_details.cepa_event_month = tbldatemonth.id_month','LEFT');
        $this->db->join('tbldateyear','tblpamaincepa_event_details.cepa_event_year = tbldateyear.id_year','LEFT');
        $this->db->join('tblpamaincepa_event_list','tblpamaincepa_event_details.cepa_event = tblpamaincepa_event_list.id_cepa_event','LEFT');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpamaincepa_event_details');
        return $query->result();
    }

    public function getallcepaprintmaterials($codegens){
        $this->db->join('tblpamaincepa_print_list','tblpamaincepa_print_materials.print_name = tblpamaincepa_print_list.id_cepa_print','LEFT');
        // $this->db->join('tbldateyear','tblpamaincepa_print_materials.year_produced = tbldateyear.id_year','LEFT');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpamaincepa_print_materials');
        return $query->result();
    }

    public function getallsapamaterialreport($codegens){
        $this->db->where('sapa_generatedcode',$codegens);
        $query = $this->db->get('tblpamaintenuresapamonitoring');
        return $query->result();
    }

    public function getallmoamaterialreport($codegens){
        $this->db->where('moa_generatedcode',$codegens);
        $query = $this->db->get('tblpamaintenuremoamonitoring');
        return $query->result();
    }

    public function getallbdfeappraisalRHA($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpalivelihood_appraisalrha_file');
        return $query->result();
    }

    public function getallpainformations($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpamain');
        return $query->result();
    }

    public function getallcepaactivityreport($codegens){
        $this->db->where('cepacode',$codegens);
        $query = $this->db->get('tblpamaincepa_activity_img');
        return $query->result();
    }

    public function getallthreatsmultipleimages($codegens){
        $this->db->where('threat_gencode',$codegens);
        $query = $this->db->get('tblpathreat_multi_img');
        return $query->result();
    }

    public function getallbdfesupportmatphotodocs($codegens){
        $this->db->where('bdfe_generatedcode',$codegens);
        $query = $this->db->get('tblpalivelihood_bdfe_supportmaterialphotodoc');
        return $query->result();
    }

    public function getallbdfesupportmatvideodocs($codegens){
        $this->db->where('bdfe_codegen',$codegens);
        $query = $this->db->get('tblpalivelihoodmultivideo');
        return $query->result();
    }

    public function getallbdfeenahancementTA_techassist($codegens){
        $this->db->where('ta_enhancement_code',$codegens);
        $query = $this->db->get('tblpalivelihood_enhancement_ta_type_assistance');
        return $query->result();
    }

    public function getallbdfeenahancementFA_techassist($codegens){
        $this->db->where('fa_enhancement_code',$codegens);
        $query = $this->db->get('tblpalivelihood_enhancement_fa_type_assistance');
        return $query->result();
    }

    public function getallbdfeenahancementoss_techassist($codegens){
        $this->db->where('oss_enhancement_code',$codegens);
        $query = $this->db->get('tblpalivelihood_enhancement_oss_type_assistance');
        return $query->result();
    }

    public function getspecifictechnicalassistance($code)
    {
        $this->db->where('ta_enhancement_code',$code);
        $query = $this->db->get('tblpalivelihood_enhancement_ta_type_assistance');
        return $query->result();
    }

    public function getspecifictechnicalassistanceFA($code)
    {
        $this->db->where('fa_enhancement_code',$code);
        $query = $this->db->get('tblpalivelihood_enhancement_fa_type_assistance');
        return $query->result();
    }

    public function getspecifictechnicalassistanceoss($code)
    {
        $this->db->where('oss_enhancement_code',$code);
        $query = $this->db->get('tblpalivelihood_enhancement_oss_type_assistance');
        return $query->result();
    }

    public function getallbdfeenahancementTA($codegens){
        $this->db->select('m1.month as month1,y1.year as year1,generatedcode,bdfe_codegen,id_enhancement,ta_assisting_org,ta_duration,enhancement_code,ta_male,ta_female');
        $this->db->join('tbldatemonth as m1','tblpalivelihood_enhancement.ta_date_month=m1.id_month','LEFt');
        $this->db->join('tbldateyear as y1','tblpalivelihood_enhancement.ta_date_year=y1.id_year','LEFt');
        $this->db->where('bdfe_codegen',$codegens);
        $query = $this->db->get('tblpalivelihood_enhancement');
        return $query->result();
    }

    public function getallbdfeenahancementFA($codegens){
        $this->db->select('m1.month as month1,y1.year as year1,generatedcode,bdfe_codegen,id_enhancement_financial,fa_assisting_org,fa_duration,enhancement_code,financial_proposal_file,financial_wfp_file');
        $this->db->join('tbldatemonth as m1','tblpalivelihood_enhancement_financial.fa_date_month=m1.id_month','LEFt');
        $this->db->join('tbldateyear as y1','tblpalivelihood_enhancement_financial.fa_date_year=y1.id_year','LEFt');
        $this->db->where('bdfe_codegen',$codegens);
        $query = $this->db->get('tblpalivelihood_enhancement_financial');
        return $query->result();
    }

    public function getallbdfeenahancementoss($codegens){
        $this->db->select('m1.month as month1,y1.year as year1,generatedcode,bdfe_codegen,id_enhancement_oss,oss_assisting_org,oss_duration,enhancement_code');
        $this->db->join('tbldatemonth as m1','tblpalivelihood_enhancement_oss.oss_date_month=m1.id_month','LEFt');
        $this->db->join('tbldateyear as y1','tblpalivelihood_enhancement_oss.oss_date_year=y1.id_year','LEFt');
        $this->db->where('bdfe_codegen',$codegens);
        $query = $this->db->get('tblpalivelihood_enhancement_oss');
        return $query->result();
    }

    public function getallcepasouvenir($codegens){
        $this->db->join('tblpamaincepa_souvenir_list','tblpamaincepa_souvenir.souveniritem = tblpamaincepa_souvenir_list.id_cepa_souvenir','LEFT');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpamaincepa_souvenir');
        return $query->result();
    }

    public function getallResearchreportPAMBResoFileUpload($codegens){
        $this->db->where('research_code',$codegens);
        $query = $this->db->get('tblmainresearch_pambreso');
        return $query->result();
    }

    public function getallResearchModalPAMBResoAdd($codegens){
        $this->db->where('research_code',$codegens);
        $query = $this->db->get('tblmainresearch_pambreso');
        return $query->result();
    }

    public function getAllSeamsagriEquipment($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_agri_equipment.id_demographic_agricostequipment = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_agri_equipment.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_agri_equipment');
        return $query->result();
    }

    public function getAllSeamsagriLabor($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_agri_labor.id_demographic_agricostlabor = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_agri_labor.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_agri_labor');
        return $query->result();
    }

    public function getAllSeamsagriOther($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_agri_other.id_demographic_agricostother = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_agri_other.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_agri_other');
        return $query->result();
    }

    public function getAllSeamslivestockMaterial($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_livestock_material.id_demographic_livestockcostmaterial = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_livestock_material.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_livestock_material');
        return $query->result();
    }

    public function getAllSeamslivestockEquipment($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_livestock_equipment.id_demographic_livestockcostequipment = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_livestock_equipment.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_livestock_equipment');
        return $query->result();
    }

    public function getAllSeamslivestockLabor($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_livestock_labor.id_demographic_livestockcostlabor = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_livestock_labor.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_livestock_labor');
        return $query->result();
    }

    public function getAllSeamslivestockOther($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_livestock_other.id_demographic_livestockcostother = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_livestock_other.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_livestock_other');
        return $query->result();
    }

    public function getAllSeamsnontimberMaterial($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_nontimber_material.id_demographic_nontimbercostmaterial = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_nontimber_material.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_nontimber_material');
        return $query->result();
    }

    public function getAllSeamsnontimberEquipment($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_nontimber_equipment.id_demographic_nontimbercostequipment = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_nontimber_equipment.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_nontimber_equipment');
        return $query->result();
    }

    public function getAllSeamsnontimberLabor($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_nontimber_labor.id_demographic_nontimbercostlabor = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_nontimber_labor.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_nontimber_labor');
        return $query->result();
    }

    public function getAllSeamsnontimberOther($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_nontimber_other.id_demographic_nontimbercostother = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_nontimber_other.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_nontimber_other');
        return $query->result();
    }

    public function getAllSeamstimberMaterial($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_timber_material.id_demographic_timbercostmaterial = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_timber_material.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_timber_material');
        return $query->result();
    }

    public function getAllSeamstimberEquipment($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_timber_equipment.id_demographic_timbercostequipment = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_timber_equipment.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_timber_equipment');
        return $query->result();
    }

    public function getAllSeamstimberLabor($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_timber_labor.id_demographic_timbercostlabor = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_timber_labor.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_timber_labor');
        return $query->result();
    }

    public function getAllSeamstimberOther($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_timber_other.id_demographic_timbercostother = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_timber_other.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_timber_other');
        return $query->result();
    }

    public function getAllSeamswildlifeMaterial($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_wildlife_material.id_demographic_wildlifecostmaterial = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_wildlife_material.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_wildlife_material');
        return $query->result();
    }

    public function getAllSeamswildlifeEquipment($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_wildlife_equipment.id_demographic_wildlifecostequipment = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_wildlife_equipment.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_wildlife_equipment');
        return $query->result();
    }

    public function getAllSeamswildlifeLabor($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_wildlife_labor.id_demographic_wildlifecostlabor = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_wildlife_labor.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_wildlife_labor');
        return $query->result();
    }

    public function getAllSeamswildlifeOther($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_wildlife_other.id_demographic_wildlifecostother = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_wildlife_other.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_wildlife_other');
        return $query->result();
    }

    public function getAllSeamsminingMaterial($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_mining_material.id_demographic_miningcostmaterial = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_mining_material.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_mining_material');
        return $query->result();
    }

    public function getAllSeamsminingEquipment($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_mining_equipment.id_demographic_miningcostequipment = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_mining_equipment.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_mining_equipment');
        return $query->result();
    }

    public function getAllSeamsminingLabor($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_mining_labor.id_demographic_miningcostlabor = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_mining_labor.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_mining_labor');
        return $query->result();
    }

    public function getAllSeamsminingOther($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_mining_other.id_demographic_miningcostother = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_mining_other.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_mining_other');
        return $query->result();
    }

    public function getAllSeamsindustrycost($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_industry_cost.id_demographic_industry = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_industry_cost.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_industry_cost');
        return $query->result();
    }

    public function getAllSeamssbindustrycost($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_servicebased_cost.id_demographic_servicebased = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_servicebased_cost.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_servicebased_cost');
        return $query->result();
    }

    public function getAllSeamsothersourcecost($codegens){
        $this->db->join('tblseamsdemographic','tblseams_sourceincome_othersource_cost.id_demographic_othersource = tblseamsdemographic.id_seams_demo','LEFT');
        $this->db->where('tblseams_sourceincome_othersource_cost.generatedcode',$codegens);
        $query = $this->db->get('tblseams_sourceincome_othersource_cost');
        return $query->result();
    }

    public function primaryimagedashboardslide($codegens,$user_id)
    {
        $this->db->join('tblpamain_img','tblpamain.generatedcode = tblpamain_img.generatedcode');
        $this->db->where('pasu_id',$user_id);
        $this->db->where_in('.tblpamain_img.generatedcode',$codegens);
        $this->db->group_by('tblpamain.generatedcode');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function getincomeperweek($searchPa,$year,$months,$fday,$tday){
        $this->db->select('SUM(entrancefee) as sumEntrance,
            SUM(facilities) as sumFacility,
            SUM(resource) as sumResource,
            SUM(concession) as sumConcession,
            (entrancefee + facilities + resource + concession ) as Grand_total_income,
            (entrancefee + facilities + resource + concession)*0.75 as total_75,
            (entrancefee + facilities + resource + concession)*0.25 as total_25,
            (entrancefee + facilities + resource + concession) as Grand_total_btr,date_day_income,
            id_income,tblpaipafincome.generatedcode,date_month_income,date_year_income,entrancefee,facilities,resource,concession,other_specify_title,other_specify_amount')
        // ->join('tbldatemonth','tblpaipafincome.date_month_income = tbldatemonth.month','LEFT')
        ->where('generatedcode',$searchPa)
        ->where('date_year_income',$year)
        ->where('date_month_income',$months)
        ->where("date_day_income BETWEEN $fday AND $tday")
        // ->where('date_day_income >=',$fday)
        // ->where('date_day_income <=',$tday)
        ->group_by('date_day_income');
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function getincomeotherperweek($id,$searchPa,$year,$months,$fday,$tday){
        $this->db->select('group_concat(other_title,": ",other_amount separator "<br> ") as try2, income_month,income_day,income_year,generatedcode,id_fromincome,id_incomeP,other_title,other_amount,SUM(other_amount) as sumOther3')
        ->join('tbldatemonth','tblpaipafincomeothers.income_month = tbldatemonth.month','LEFT')
        ->where('generatedcode',$searchPa)
        ->where('income_year',$year)
        ->where('income_month',$months)
        // ->where('income_day >=',$fday)
        // ->where('income_day <=',$tday)
        ->where("income_day BETWEEN $fday AND $tday")

        ->group_by('income_day');
        $query = $this->db->get('tblpaipafincomeothers');
        return $query->result();
    }

    public function getincomedisbursementperweek($id,$searchPa,$year,$months,$fday,$tday){
        $this->db->select('group_concat(disbursement_remarks,": ",disbursement_amount separator "<br> ") as concat_disbursement, disbursement_month,disbursement_day,disbursement_year,generatedcode,id_fromincome,disbursement_remarks,disbursement_amount,SUM(disbursement_amount) as sumDisbursement')
        ->join('tbldatemonth','tblpaipafdisbursement.disbursement_month = tbldatemonth.month','LEFT')
        ->where('generatedcode',$searchPa)
        ->where('disbursement_year',$year)
        ->where('disbursement_month',$months)
        // ->where('disbursement_day >=',$fday)
        // ->where('disbursement_day <=',$tday)
        ->where("disbursement_day BETWEEN $fday AND $tday")

        ->group_by('disbursement_day');
        $query = $this->db->get('tblpaipafdisbursement');
        return $query->result();
    }

    public function getincomedevelopmentperweek($id,$searchPa,$year,$months,$fday,$tday){
        $this->db->select('group_concat(dev_remarks,": ",devfee_amount separator "<br> ") as concat_development, dev_month,dev_day,dev_year,generatedcode,id_fromincome,dev_remarks,devfee_amount,SUM(devfee_amount) as sumDevelopment')
        ->join('tbldatemonth','tblpaipafdevfee.dev_month = tbldatemonth.month','LEFT')
        ->where('generatedcode',$searchPa)
        ->where('dev_year',$year)
        ->where('dev_month',$months)
        // ->where('dev_day >=',$fday)
        // ->where('dev_day <=',$tday)
        ->where("dev_day BETWEEN $fday AND $tday")

        ->group_by('dev_day');
        $query = $this->db->get('tblpaipafdevfee');
        return $query->result();
    }

    public function getGrandtotalIpafperweek($searchPa,$year,$months,$fday,$tday){
        $this->db->select('SUM(entrancefee + facilities + resource + concession) as grandtotaly')
        ->where('generatedcode',$searchPa)
        ->where('date_year_income',$year)
        ->where('date_month_income',$months)
        ->where("date_day_income BETWEEN $fday AND $tday");

        // ->where('date_day_income >=',$fday)
        // ->where('date_day_income <=',$tday);
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function getGrandtotalOthersperweek($searchPa,$year,$months,$fday,$tday){
        $this->db->select('SUM(other_amount) as gtother')
        ->where('generatedcode',$searchPa)
        ->where('income_year',$year)
        ->where('income_month',$months)
        // ->where('income_day >=',$fday)
        // ->where('income_day <=',$tday);
        ->where("income_day BETWEEN $fday AND $tday");

        $query = $this->db->get('tblpaipafincomeothers');
        return $query->result();
    }

    public function getGrandtotalDisbursementperweek($searchPa,$year,$months,$fday,$tday){
        $this->db->select('SUM(disbursement_amount) as gtdisburse')
        ->where('generatedcode',$searchPa)
        ->where('disbursement_year',$year)
        ->where('disbursement_month',$months)
        // ->where('disbursement_day >=',$fday)
        // ->where('disbursement_day <=',$tday);
        ->where("disbursement_day BETWEEN $fday AND $tday");

        $query = $this->db->get('tblpaipafdisbursement');
        return $query->result();
    }

    public function getGrandtotalDevelopmentperweek($searchPa,$year,$months,$fday,$tday){
        $this->db->select('SUM(devfee_amount) as gtdevelopment')
        ->where('generatedcode',$searchPa)
        ->where('dev_year',$year)
        ->where('dev_month',$months)
        // ->where('dev_day >=',$fday)
        // ->where('dev_day <=',$tday);
        ->where("dev_day BETWEEN $fday AND $tday");
        $query = $this->db->get('tblpaipafdevfee');
        return $query->result();
    }

    public function resultgroupweekly($searchpa,$searchyear,$month,$day1,$day2)
    {
         $this->db->select('SUM(entrancefee + tblpaipafincome.facilities + resource + concession) as Grand_total_income,
            (entrancefee + tblpaipafincome.facilities + resource + concession)*0.75 as total_75,
            (entrancefee + tblpaipafincome.facilities + resource + concession)*0.25 as total_25,
            (entrancefee + tblpaipafincome.facilities + resource + concession) as Grand_total_btr,date_day_income,
            SUM(entrancefee) as sum_entrance,SUM(tblpaipafincome.facilities) as sum_facility,SUM(resource) as sum_resource,SUM(concession) as sum_concession,
            id_income,tblpaipafincome.generatedcode,date_month_income,date_year_income,entrancefee,tblpaipafincome.facilities,resource,concession,other_specify_title,other_specify_amount,tbldatemonth.id_month')
        // ->join('tblpamain','tblpaipafincome.generatedcode = tblpamain.generatedcode','left')
        ->join('tbldatemonth','tblpaipafincome.date_month_income = tbldatemonth.month','LEFT')
        ->where('tblpaipafincome.generatedcode',$searchpa)
        ->where('date_year_income',$searchyear)
        ->where('date_month_income',$month)
        // ->where('date_day_income >=',$day1)
        // ->where('date_day_income <=',$day2)
        ->where("date_day_income BETWEEN $day1 AND $day2")

        ->order_by('date_day_income')
        ->group_by('date_day_income')
        ->order_by('LENGTH(date_day_income)');
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function resultpa($searchpa)
    {
         $this->db->select('DISTINCT(pa_name) as name')
        ->where('generatedcode',$searchpa)
        ->group_by('generatedcode');

        $query = $this->db->get('tblpamain');
        return $query->result();
    }

    public function searchpdfdisbursementbyweekly($id,$searchpa,$searchyear,$month,$day1,$day2){
        $this->db->select('group_concat(disbursement_remarks,": ",disbursement_amount separator "\n") as disburse_view, disbursement_month,disbursement_day,disbursement_year,generatedcode,id_fromincome,disbursement_remarks,disbursement_amount,SUM(disbursement_amount) as sumdisbursement')
        ->join('tbldatemonth','tblpaipafdisbursement.disbursement_month = tbldatemonth.month','LEFT')
        ->where('tblpaipafdisbursement.generatedcode',$searchpa)
        ->where('id_fromincome',$id)
        ->where('disbursement_year',$searchyear)
        ->where('disbursement_month',$month)
        // ->where('disbursement_day >=',$day1)
        // ->where('disbursement_day <=',$day2)
        ->where("disbursement_day BETWEEN $day1 AND $day2")

        ->order_by('disbursement_day')
        ->order_by('LENGTH(disbursement_day)');
        // ->group_by('disbursement_day');
        // ->group_by('income_month');
        $query = $this->db->get('tblpaipafdisbursement');
        return $query->result();
    }

    public function searchpdfdevelopmentbyweekly($id,$searchpa,$searchyear,$month,$day1,$day2){
        $this->db->select('group_concat(dev_remarks,": ",devfee_amount separator "\n") as development_view, dev_month,dev_day,dev_year,generatedcode,id_fromincome,dev_remarks,devfee_amount,SUM(devfee_amount) as sumdevelopment')
        ->join('tbldatemonth','tblpaipafdevfee.dev_month = tbldatemonth.month','LEFT')
        ->where('tblpaipafdevfee.generatedcode',$searchpa)
        ->where('id_fromincome',$id)
        ->where('dev_year',$searchyear)
        ->where('dev_month',$month)
        // ->where('dev_day >=',$day1)
        // ->where('dev_day <=',$day2)
        ->where("dev_day BETWEEN $day1 AND $day2")

        ->order_by('dev_day')
        ->order_by('LENGTH(dev_day)');
        $query = $this->db->get('tblpaipafdevfee');
        return $query->result();
    }

    public function searchincomedevelopmentperweek($id,$searchpa,$searchyear,$month,$day1,$day2){
        $this->db->select('SUM(devfee_amount) as sumDevelopmenttotal')
        ->join('tbldatemonth','tblpaipafdevfee.dev_month = tbldatemonth.month','LEFT')
        ->where('generatedcode',$searchpa)
        ->where('dev_year',$searchyear)
        ->where('dev_month',$month)
        // ->where('dev_day >=',$day1)
        // ->where('dev_day <=',$day2)
        ->where("dev_day BETWEEN $day1 AND $day2")

        ->group_by('dev_day');
        $query = $this->db->get('tblpaipafdevfee');
        return $query->result();
    }

    public function searchincomeotherperweek($id,$searchpa,$searchyear,$month,$day1,$day2){
        $this->db->select('group_concat(other_title,": ",other_amount separator "<br> ") as try2, income_month,income_day,income_year,generatedcode,id_fromincome,id_incomeP,other_title,other_amount,SUM(other_amount) as sumOther3')
        ->join('tbldatemonth','tblpaipafincomeothers.income_month = tbldatemonth.month','LEFT')
        ->where('generatedcode',$searchpa)
        ->where('income_year',$searchyear)
        ->where('income_month',$month)
        // ->where('income_day >=',$day1)
        // ->where('income_day <=',$day2)
        ->where("income_day BETWEEN $day1 AND $day2")

        ->group_by('income_day');
        $query = $this->db->get('tblpaipafincomeothers');
        return $query->result();
    }

    public function searchpdfotherbyweekly($id,$searchpa,$searchyear,$month,$day1,$day2){
        $this->db->select('group_concat(other_title,": ",other_amount separator "<br>") as try2, income_month,income_day,income_year,generatedcode,id_fromincome,id_incomeP,other_title,other_amount,SUM(other_amount) as sumOther')
        ->join('tbldatemonth','tblpaipafincomeothers.income_month = tbldatemonth.month','LEFT')
        ->where('generatedcode',$searchpa)
        ->where('id_fromincome',$id)
        ->where('income_year',$searchyear)
        ->where('income_month',$month)
        // ->where('income_day >=',$day1)
        // ->where('income_day <=',$day2)
        ->where("income_day BETWEEN $day1 AND $day2")

        ->order_by('income_day')
        ->order_by('LENGTH(income_day)');
        // ->group_by('income_month');
        $query = $this->db->get('tblpaipafincomeothers');
        return $query->result();
    }

    public function getpdfGrandtotalIpafperweek($searchpa,$searchyear,$month,$day1,$day2){
        $this->db->select('id_income,SUM(entrancefee + facilities + resource + concession + other_specify_amount) as grandtotal')
        ->join('tbldatemonth','tblpaipafincome.date_month_income = tbldatemonth.month','left')
        ->where('date_year_income',$searchyear)
        ->where('date_month_income',$month)
        // ->where('date_day_income >=',$day1)
        // ->where('date_day_income <=',$day2);
        ->where("date_day_income BETWEEN $day1 AND $day2");

        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function searchpdfallIpafotherbyweekGT($id,$searchpa,$searchyear,$month,$day1,$day2){
        $this->db->select('SUM(other_amount) as sumOtherGT')
        ->join('tbldatemonth','tblpaipafincomeothers.income_month = tbldatemonth.month','LEFT')
        ->where('generatedcode',$searchpa)
        ->where('income_year',$searchyear)
        ->where('income_month',$month)
        // ->where('income_day >=',$day1)
        // ->where('income_day <=',$day2);
        ->where("income_day BETWEEN $day1 AND $day2");

        $query = $this->db->get('tblpaipafincomeothers');
        return $query->result();
    }

    public function searchpdfallIpafdisbursementbyweekGT($id,$searchpa,$searchyear,$month,$day1,$day2){
        $this->db->select('SUM(disbursement_amount) as sumdisbursementGT')
        ->join('tbldatemonth','tblpaipafdisbursement.disbursement_month = tbldatemonth.month','LEFT')
        ->where('generatedcode',$searchpa)
        ->where('disbursement_year',$searchyear)
        ->where('disbursement_month',$month)
        // ->where('disbursement_day >=',$day1)
        // ->where('disbursement_day <=',$day2);
        ->where("disbursement_day BETWEEN $day1 AND $day2");

        $query = $this->db->get('tblpaipafdisbursement');
        return $query->result();
    }

    public function searchpdfallIpafdevelopmentbyweekGT($id,$searchpa,$searchyear,$month,$day1,$day2){
        $this->db->select('SUM(devfee_amount) as sumdevelopmentGT')
        ->join('tbldatemonth','tblpaipafdevfee.dev_month = tbldatemonth.month','LEFT')
        ->where('generatedcode',$searchpa)
        ->where('dev_year',$searchyear)
        ->where('dev_month',$month)
        // ->where('dev_day >=',$day1)
        // ->where('dev_day <=',$day2);
        ->where("dev_day BETWEEN $day1 AND $day2");

        $query = $this->db->get('tblpaipafdevfee');
        return $query->result();
    }

    public function resultQuerybyweeklyOthers($searchpa,$searchyear,$month,$day1,$day2){
        $this->db->select('*')
        ->join('tbldatemonth','tblpaipafincome.date_month_income = tbldatemonth.month','LEFT')
        ->where('tblpaipafincome.generatedcode',$searchpa)
        ->where('date_year_income',$searchyear)
        ->where('date_month_income',$month)
        // ->where('date_day_income >=',$day1)
        // ->where('date_day_income <=',$day2)
        ->where("date_day_income BETWEEN $day1 AND $day2")

        ->order_by('tbldatemonth.id_month')
        ->group_by('date_month_income')
        ->order_by('LENGTH(tbldatemonth.id_month)');
        $query = $this->db->get('tblpaipafincome');
        return $query->result();
    }

    public function searchpdfdevfeesbyweekly($id,$searchpa,$searchyear,$month,$day1,$day2){
      $this->db->select('group_concat(disbursement_remarks,": Php ",disbursement_amount separator "\n ") as disburementfee')
        ->join('tbldatemonth','tblpaipafdisbursement.disbursement_month = tbldatemonth.month','LEFT')
        ->where('tblpaipafdisbursement.generatedcode',$searchpa)
        ->where('id_fromincome',$id)
        ->where('disbursement_year',$searchyear)
        ->where('disbursement_month',$month)
        // ->where('disbursement_day >=',$day1)
        // ->where('disbursement_day <=',$day2);
        ->where("disbursement_day BETWEEN $day1 AND $day2");

        // ->group_by('income_month');
        $query = $this->db->get('tblpaipafdisbursement');
        return $query->result();
    }
    public function searchpdfcontribyweekly($id,$searchpa,$searchyear,$month,$day1,$day2){
        $this->db->select('group_concat("Trust fund : ",tblfinancialassistance.finance_desc,"\n"
                                        "Mode payment : ",tblfinancialassistancesub.description,"\n",
                                         "Php",contri_amount separator "\n\n ") as contrif')
        ->join('tbldatemonth','tblpaipafcontrisub.month_contri = tbldatemonth.month','LEFT')
        ->join('tblfinancialassistance','tblpaipafcontrisub.trustfund = tblfinancialassistance.id_financial','LEFT')
        ->join('tblfinancialassistancesub','tblpaipafcontrisub.mode_payment = tblfinancialassistancesub.id_finance_sub','LEFT')
        ->where('tblpaipafcontrisub.generatedcode',$searchpa)
        ->where('id_fromincome',$id)
        ->where('year_contri',$searchyear)
        ->where('month_contri',$month)
        // ->where('day_contri >=',$day1)
        // ->where('day_contri <=',$day2);
        ->where("day_contri BETWEEN $day1 AND $day2");

        // ->group_by('income_month');
        $query = $this->db->get('tblpaipafcontrisub');
        return $query->result();
    }

    public function searchpdfffbyweekly($id,$searchpa,$searchyear,$month,$day1,$day2){
        $this->db->select('group_concat(penalty_remarks,": ",penalty_amount separator "\n ") as ffd')
        ->join('tbldatemonth','tblpaipafpenalty.penalty_month = tbldatemonth.month','LEFT')
        ->where('tblpaipafpenalty.generatedcode',$searchpa)
        ->where('id_fromincome',$id)
        ->where('penalty_year',$searchyear)
        ->where('penalty_month',$month)
        // ->where('penalty_day >=',$day1)
        // ->where('penalty_day <=',$day2);
        ->where("penalty_day BETWEEN $day1 AND $day2");

        $query = $this->db->get('tblpaipafpenalty');
        return $query->result();
    }

    public function iucnList()
    {
        $result = $this->db->select("*")
        ->from('tbliucncode')
        ->get()
        ->result();
        $list[''] = "SELECT IUCN STATUS";
        if (!empty($result)){
            foreach ($result as $value) {
                $list[$value->id] = ucwords($value->description);
            }
            return $list;
        } else {
            return false;
        }
    }

    public function residency_status()
    {
        $result = $this->db->select("*")
        ->from('tblpamainbiological_residency')
        ->get()
        ->result();
        $list[''] = "Select";
        if (!empty($result)){
            foreach ($result as $value) {
                $list[$value->id_residency] = ucwords($value->residency_desc);
            }
            return $list;
        } else {
            return false;
        }
    }

     public function desig_type()
    {
        $result = $this->db->select("*")
        ->from('tbldesig_type')
        ->get()
        ->result();
        $list[''] = "Select";
        if (!empty($result)){
            foreach ($result as $value) {
                $list[$value->id_desig_type] = ucwords($value->desig_type);
            }
            return $list;
        } else {
            return false;
        }
    }

    public function wdpamarine()
    {
        $result = $this->db->select("*")
        ->from('tblpawdpa_marine')
        ->get()
        ->result();
        $list[''] = "Select";
        if (!empty($result)){
            foreach ($result as $value) {
                $list[$value->id_wdpa_marine] = $value->marine_value." - ".ucwords($value->marine_desc);
            }
            return $list;
        } else {
            return false;
        }
    }

    public function wdpanotake()
    {
        $result = $this->db->select("*")
        ->from('tblpawdpa_notake')
        ->get()
        ->result();
        $list[''] = "Select";
        if (!empty($result)){
            foreach ($result as $value) {
                $list[$value->id_notake] = $value->notake_value." - ".ucwords($value->notake_desc);
            }
            return $list;
        } else {
            return false;
        }
    }

    public function wdpastatus()
    {
        $result = $this->db->select("*")
        ->from('tblpawdpa_status')
        ->get()
        ->result();
        $list[''] = "Select";
        if (!empty($result)){
            foreach ($result as $value) {
                $list[$value->id_wdpa_status] = $value->wdpa_status;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function wdpagovtype()
    {
        $result = $this->db->select("*")
        ->from('tblpawdpa_govtype')
        ->get()
        ->result();
        $list[''] = "Select";
        if (!empty($result)){
            foreach ($result as $value) {
                $list[$value->id_govtype] = $value->govtype_value;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function wdpaowntype()
    {
        $result = $this->db->select("*")
        ->from('tblpawdpa_owntype')
        ->get()
        ->result();
        $list[''] = "Select";
        if (!empty($result)){
            foreach ($result as $value) {
                $list[$value->id_owntype] = $value->owntype_value;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function wdpaverif()
    {
        $result = $this->db->select("*")
        ->from('tblpawdpa_verif')
        ->get()
        ->result();
        $list[''] = "Select";
        if (!empty($result)){
            foreach ($result as $value) {
                $list[$value->id_verif] = $value->verif_value;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function wdpaiso()
    {
        $result = $this->db->select("*")
        ->from('tblpawdpa_subloc')
        ->get()
        ->result();
        $list[''] = "Select";
        if (!empty($result)){
            foreach ($result as $value) {
                $list[$value->id_iso] = $value->iso_value." - ".$value->iso_desc;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function clitype()
    {
        $result = $this->db->select("*")
        ->from('tblclimate_type')
        ->get()
        ->result();
        $list[''] = "Select";
        if (!empty($result)){
            foreach ($result as $value) {
                $list[$value->id_climates] = $value->climates_type.") ".$value->climates_desc;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function existlanduse()
    {
        $result = $this->db->select("*")
        ->from('tblpaexisting_landuse')
        ->get()
        ->result();
        $list[''] = "Select";
        if (!empty($result)){
            foreach ($result as $value) {
                $list[$value->id_landuses] = $value->landuses_desc;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function slopecat()
    {
        $result = $this->db->select("*")
        ->from('tblslope_category')
        ->get()
        ->result();
        $list[''] = "Select";
        if (!empty($result)){
            foreach ($result as $value) {
                $list[$value->id_slopecat ] = $value->slope_category;
            }
            return $list;
        } else {
            return false;
        }
    }

    public function getAllUrbanEco($codegens){
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblurbaneco');
        return $query->result();
    }

    public function getecotourismmngmtplansfile($codegens){
        $this->db->join('tbldatemonth','tblpamanagementecotourim.ecotourism_plan_dateM = tbldatemonth.id_month','left');
        $this->db->join('tbldateyear','tblpamanagementecotourim.ecotourism_plan_dateY = tbldateyear.id_year','left');
        $this->db->join('tbldateday','tblpamanagementecotourim.ecotourism_plan_dateD = tbldateday.id_day','left');
        $this->db->join('tblpamanagementplanstatus','tblpamanagementecotourim.ecotourism_status = tblpamanagementplanstatus.id_mpstatus','left');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpamanagementecotourim');
        return $query->result();
    }

    public function getwetlandmngmtplansfile($codegens){
        $this->db->join('tbldatemonth','tblpamanagementwetland.wetland_plan_dateM = tbldatemonth.id_month','left');
        $this->db->join('tbldateyear','tblpamanagementwetland.wetland_plan_dateY = tbldateyear.id_year','left');
        $this->db->join('tbldateday','tblpamanagementwetland.wetland_plan_dateD = tbldateday.id_day','left');
        $this->db->join('tblpamanagementplanstatus','tblpamanagementwetland.wetland_plan_status = tblpamanagementplanstatus.id_mpstatus','left');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpamanagementwetland');
        return $query->result();
    }

    public function getcavesmngmtplansfile($codegens){
        $this->db->join('tbldatemonth','tblpamanagementcaves.cave_plan_dateM = tbldatemonth.id_month','left');
        $this->db->join('tbldateyear','tblpamanagementcaves.cave_plan_dateY = tbldateyear.id_year','left');
        $this->db->join('tbldateday','tblpamanagementcaves.cave_plan_dateD = tbldateday.id_day','left');
        $this->db->join('tblpamanagementplanstatus','tblpamanagementcaves.cave_plan_status = tblpamanagementplanstatus.id_mpstatus','left');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpamanagementcaves');
        return $query->result();
    }

    public function getothermngmtplansfile($codegens){
        $this->db->join('tbldatemonth','tblpamanagementothers.other_plan_dateM = tbldatemonth.id_month','left');
        $this->db->join('tbldateyear','tblpamanagementothers.other_plan_dateY = tbldateyear.id_year','left');
        $this->db->join('tbldateday','tblpamanagementothers.other_plan_dateD = tbldateday.id_day','left');
        $this->db->join('tblpamanagementplanstatus','tblpamanagementothers.other_plan_status = tblpamanagementplanstatus.id_mpstatus','left');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpamanagementothers');
        return $query->result();
    }

    public function getallmonitoring($codes){
        $this->db->where('sapa_generatedcode',$codes);
        $query = $this->db->get('tblpamaintenuresapamonitoring');
        return $query->result();
    }

    public function getallmonitoringcount($codes){
        $this->db->where('sapa_generatedcode',$codes);
        $query = $this->db->get('tblpamaintenuresapamonitoring');
        return $query->num_rows();
    }

    public function getallmoamonitoring($codes){
        $this->db->where('moa_generatedcode',$codes);
        $query = $this->db->get('tblpamaintenuremoamonitoring');
        return $query->result();
    }

    public function getcountallmoamonitoring($codes){
        $this->db->where('moa_generatedcode',$codes);
        $query = $this->db->get('tblpamaintenuremoamonitoring');
        return $query->num_rows();
    }

    public function getallincomedisbursement($codegens){
        $this->db->join('tbldateyear','tblpaipafdisbursementfiles.year_disbursement = tbldateyear.id_year','left');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblpaipafdisbursementfiles');
        return $query->result();
    }

    public function getallactualincomes($codegens)
    {
        $this->db->join('tbldatemonth','tblipafsourceincome.income_date_month = tbldatemonth.id_month','LEFT');
        $this->db->where('generatedcode',$codegens)
        ->order_by('tbldatemonth.id_month','ASC')
        ->order_by('LENGTH(tbldatemonth.id_month)','ASC');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getallactualincomes2($codegens)
    {
        $this->db->join('tbldatemonth','tblipafsourceincome.income_date_month = tbldatemonth.id_month','LEFT');
        $this->db->where('generatedcode',$codegens)
        ->order_by('tbldatemonth.id_month','ASC')
        ->order_by('LENGTH(tbldatemonth.id_month)','ASC');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

     public function getbyMonthSumEntranceFee($codegens,$months,$years)
    {
        $this->db->select('SUM(entrance_fee) as EFsumbyMonth');
        $this->db->join('tbldatemonth','tblipafsourceincome.income_date_month = tbldatemonth.id_month','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_date_month',$months);
        $this->db->where('income_date_year',$years);
        $this->db->group_by('income_date_month');
        // ->order_by('tbldatemonth.id_month','ASC')
        // ->order_by('LENGTH(tbldatemonth.id_month)','ASC');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

     public function getbyMonthSumFacilityUserFee($codegens,$months,$years)
    {
        $this->db->select('SUM(facility_fee) as FUFsum');
        $this->db->join('tbldatemonth','tblipafsourceincome.income_date_month = tbldatemonth.id_month','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_date_month',$months);
        $this->db->where('income_date_year',$years);
        $this->db->group_by('income_date_month');
        // ->order_by('tbldatemonth.id_month','ASC')
        // ->order_by('LENGTH(tbldatemonth.id_month)','ASC');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getbyMonthSumRecreationalFee($codegens,$months,$years)
    {
        $this->db->select('SUM(recreational_fee) as RFsum');
        $this->db->join('tbldatemonth','tblipafsourceincome.income_date_month = tbldatemonth.id_month','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_date_month',$months);
        $this->db->where('income_date_year',$years);
        $this->db->group_by('income_date_month');
        // ->order_by('tbldatemonth.id_month','ASC')
        // ->order_by('LENGTH(tbldatemonth.id_month)','ASC');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getbyMonthSumResourceUserFee($codegens,$months,$years)
    {
        $this->db->select('SUM(resource_fee) as RUFsum');
        $this->db->join('tbldatemonth','tblipafsourceincome.income_date_month = tbldatemonth.id_month','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_date_month',$months);
        $this->db->where('income_date_year',$years);
        $this->db->group_by('income_date_month');
        // ->order_by('tbldatemonth.id_month','ASC')
        // ->order_by('LENGTH(tbldatemonth.id_month)','ASC');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getbyMonthSumSAPAFee($codegens,$months,$years)
    {
        $this->db->select('SUM(sapa_fee) as SAPAsum');
        $this->db->join('tbldatemonth','tblipafsourceincome.income_date_month = tbldatemonth.id_month','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_date_month',$months);
        $this->db->where('income_date_year',$years);
        $this->db->group_by('income_date_month');
        // ->order_by('tbldatemonth.id_month','ASC')
        // ->order_by('LENGTH(tbldatemonth.id_month)','ASC');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getbyMonthSumMOAFee($codegens,$months,$years)
    {
        $this->db->select('SUM(moa_fee) as MOAsum');
        $this->db->join('tbldatemonth','tblipafsourceincome.income_date_month = tbldatemonth.id_month','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_date_month',$months);
        $this->db->where('income_date_year',$years);
        $this->db->group_by('income_date_month');
        // ->order_by('tbldatemonth.id_month','ASC')
        // ->order_by('LENGTH(tbldatemonth.id_month)','ASC');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getbyMonthSumRSAFee($codegens,$months,$years)
    {
        $this->db->select('SUM(rsa_fee) as RSAsum');
        $this->db->join('tbldatemonth','tblipafsourceincome.income_date_month = tbldatemonth.id_month','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_date_month',$months);
        $this->db->where('income_date_year',$years);
        $this->db->group_by('income_date_month');
        // ->order_by('tbldatemonth.id_month','ASC')
        // ->order_by('LENGTH(tbldatemonth.id_month)','ASC');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getbyMonthSumCLAFee($codegens,$months,$years)
    {
        $this->db->select('SUM(cla_fee) as CLAsum');
        $this->db->join('tbldatemonth','tblipafsourceincome.income_date_month = tbldatemonth.id_month','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_date_month',$months);
        $this->db->where('income_date_year',$years);
        $this->db->group_by('income_date_month');
        // ->order_by('tbldatemonth.id_month','ASC')
        // ->order_by('LENGTH(tbldatemonth.id_month)','ASC');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getbyMonthSumFines($codegens,$months,$years)
    {
        $this->db->select('SUM(income_pfd_amount) as Finesum');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_pfd_month',$months);
        $this->db->where('income_pfd_year',$years);
        // $this->db->group_by('income_pfd_month');
        $query = $this->db->get('tblipafsourceincome_finespenaltydamage');
        return $query->result();
    }

    public function getbyMonthSumGrant($codegens,$months,$years)
    {
        $this->db->select('SUM(grant_fee) as Grantsum');
        $this->db->join('tbldatemonth','tblipafsourceincome.income_date_month = tbldatemonth.id_month','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_date_month',$months);
        $this->db->where('income_date_year',$years);
        $this->db->group_by('income_date_month');
        // ->order_by('tbldatemonth.id_month','ASC')
        // ->order_by('LENGTH(tbldatemonth.id_month)','ASC');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getbyMonthSumEndowment($codegens,$months,$years)
    {
        $this->db->select('SUM(endowment_fee) as Endowmentsum');
        $this->db->join('tbldatemonth','tblipafsourceincome.income_date_month = tbldatemonth.id_month','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_date_month',$months);
        $this->db->where('income_date_year',$years);
        $this->db->group_by('income_date_month');
        // ->order_by('tbldatemonth.id_month','ASC')
        // ->order_by('LENGTH(tbldatemonth.id_month)','ASC');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getbyMonthSumDonation($codegens,$months,$years)
    {
        $this->db->select('SUM(donation_amount) as Donationsum,month');
        $this->db->join('tbldatemonth','tblipafsourceincome_donation.income_donate_month = tbldatemonth.id_month','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_donate_month',$months);
        $this->db->where('income_donate_year',$years);
        $this->db->where('income_donation',1);
        $this->db->group_by('income_donate_month');
        // ->order_by('tbldatemonth.id_month','ASC')
        // ->order_by('LENGTH(tbldatemonth.id_month)','ASC');
        $query = $this->db->get('tblipafsourceincome_donation');
        return $query->result();
    }

     public function getbyMonthSumOthersources($codegens,$months,$years)
    {
        $this->db->select('SUM(otherincome_other_amount) as OtherSourcesSum');
        $this->db->join('tbldatemonth','tblipafsourceincomeother_others.otherincome_other_month = tbldatemonth.id_month','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('otherincome_other_month',$months);
        $this->db->where('otherincome_other_year',$years);
        $this->db->group_by('otherincome_other_month');
        // ->order_by('tbldatemonth.id_month','ASC')
        // ->order_by('LENGTH(tbldatemonth.id_month)','ASC');
        $query = $this->db->get('tblipafsourceincomeother_others');
        return $query->result();
    }

    public function getbyMonthSumOIFee($codegens,$months,$years)
    {
        $this->db->select('SUM(income_others_amount) as OIsum1,month');
        $this->db->join('tbldatemonth','tblipafsourceincome_others.income_other_month = tbldatemonth.id_month','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_other_month',$months);
        $this->db->where('income_other_year',$years);
        $this->db->group_by('income_other_month');
        // ->order_by('tbldatemonth.id_month','ASC')
        // ->order_by('LENGTH(tbldatemonth.id_month)','ASC');
        $query = $this->db->get('tblipafsourceincome_others');
        return $query->result();
    }

     public function getbyDaySumOIFee22($codegens,$months,$years,$day)
    {
        $this->db->select('SUM(income_others_amount) as OIsum2');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_other_month',$months);
        $this->db->where('income_other_year',$years);
        $this->db->where('income_other_day',$day);
        $query = $this->db->get('tblipafsourceincome_others');
        return $query->result();
    }

     public function getbyDaySumOIFee($codegens,$months,$years,$day)
    {
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_other_month',$months);
        $this->db->where('income_other_year',$years);
        $this->db->where('income_other_day',$day);
        $query = $this->db->get('tblipafsourceincome_others');
        return $query->result();
    }

    public function getbyDaySumOIFee2($codegens,$months,$years)
    {
        $this->db->where('generatedcode',$codegens);
        $this->db->where('otherincome_other_month',$months);
        $this->db->where('otherincome_other_year',$years);
        $query = $this->db->get('tblipafsourceincomeother_others');
        return $query->result();
    }

    public function getbyDayDonation1($codegens,$months,$years)
    {
        $this->db->select('SUM(donation_amount) as totalamount,income_donate_day');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_donate_month',$months);
        $this->db->where('income_donate_year',$years);
        $this->db->where('income_donation',1);
        $this->db->group_by('income_donate_day');
        $query = $this->db->get('tblipafsourceincome_donation');
        return $query->result();
    }

    public function getbyDayfinespenaltiesdamage($codegens,$months,$years,$day)
    {
        $this->db->select('SUM(income_pfd_amount) as totalamountpdf,income_pfd_day');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_pfd_month',$months);
        $this->db->where('income_pfd_year',$years);
        $this->db->where('income_pfd_day',$day);
        // $this->db->where('income_donation',1);
        $this->db->group_by('income_pfd_day');
        $query = $this->db->get('tblipafsourceincome_finespenaltydamage');
        return $query->result();
    }

    public function getbyDayothersourceother($codegens,$months,$years,$day)
    {
        $this->db->select('SUM(otherincome_other_amount) as totalamountothersourse');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('otherincome_other_month',$months);
        $this->db->where('otherincome_other_year',$years);
        $this->db->where('otherincome_other_day',$day);
        $this->db->group_by('otherincome_other_day');
        $query = $this->db->get('tblipafsourceincomeother_others');
        return $query->result();
    }

    public function getbyDayDonation2($codegens,$months,$years)
    {
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_donate_month',$months);
        $this->db->where('income_donate_year',$years);
        $this->db->where('income_donation',2);
        $query = $this->db->get('tblipafsourceincome_donation');
        return $query->result();
    }

    public function getallyears2($codegens)
    {
        $this->db->join('tbldatemonth','tblipafsourceincome.income_date_month = tbldatemonth.id_month','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->group_by('income_date_year')
        ->order_by('income_date_year','DESC')
        ->order_by('LENGTH(income_date_year)','DESC');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getallmonth2($codegens,$year)
    {
        $this->db->join('tbldatemonth','tblipafsourceincome.income_date_month = tbldatemonth.id_month','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_date_year',$year);
        $this->db->order_by('income_date_month','ASC');
        $this->db->order_by('LENGTH(income_date_month)','ASC');
        $this->db->group_by('income_date_month');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getallincomebymonths($codegens,$year,$months)
    {
        $this->db->join('tbldatemonth','tblipafsourceincome.income_date_month = tbldatemonth.id_month','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_date_year',$year);
        $this->db->where('income_date_month',$months);
        // $this->db->group_by('income_date_month');
        $this->db->order_by('income_date_day','ASC');
        $this->db->order_by('LENGTH(income_date_day)','ASC');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    // public function getallincomefinespenaltiesdamagebymonths($codegens,$year,$months)
    // {
    //     $this->db->join('tbldatemonth','tblipafsourceincome_finespenaltydamage.income_pfd_month = tbldatemonth.id_month','LEFT');
    //     $this->db->where('generatedcode',$codegens);
    //     $this->db->where('income_pfd_year',$year);
    //     $this->db->where('income_pfd_month',$months);
    //     $this->db->order_by('income_pfd_day','ASC');
    //     $this->db->order_by('LENGTH(income_pfd_day)','ASC');
    //     $query = $this->db->get('tblipafsourceincome_finespenaltydamage');
    //     return $query->result();
    // }

    public function getallincomefinespenaltiesdamagebymonths($codegens,$months,$years)
    {
        $this->db->select('group_concat("Category :",receipt_name,"<br>Amount : ",income_pfd_amount,"<br>Source : ",income_pfd_source separator "<hr> ") as inkinddonate, SUM(income_pfd_amount) as totalpdfs ,
                           income_donation,donation_desc,income_pfd_amount,income_pfd_month,income_pfd_year,income_pfd_source,income_pfd_day');
        $this->db->join('tblipatrustreceipts','tblipafsourceincome_finespenaltydamage.income_pfd = tblipatrustreceipts.receipt_id','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_pfd_month',$months);
        $this->db->where('income_pfd_year',$years);
        // $this->db->where('income_pfd',2);
        // $this->db->group_by('income_date_year')
        $query = $this->db->get('tblipafsourceincome_finespenaltydamage');
        return $query->result();
    }

    public function getallfinespenaltiesdamageEdita($codegens,$months,$years,$day)
    {
        $this->db->join('tblipatrustreceipts','tblipafsourceincome_finespenaltydamage.income_pfd = tblipatrustreceipts.receipt_id','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_pfd_month',$months);
        $this->db->where('income_pfd_year',$years);
        $this->db->where('income_pfd_day',$day);
        $query = $this->db->get('tblipafsourceincome_finespenaltydamage');
        return $query->result();
    }

    public function getallyears($codegens)
    {
        $this->db->where('generatedcode',$codegens);
        $this->db->group_by('income_date_year')
        ->order_by('income_date_year','DESC')
        ->order_by('LENGTH(income_date_year)','DESC');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getsumactualincomebyYr($codegens,$years)
    {
        $this->db->select('SUM(entrance_fee+facility_fee+recreational_fee+resource_fee+sapa_fee+moa_fee+rsa_fee+cla_fee) as sumnumber1,SUM(grant_fee+endowment_fee) as sumothersourceother,income_date_year');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_date_year',$years);
        // $this->db->group_by('income_date_year');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getsumactualincomeotherincomebyYr($codegens,$years)
    {
        $this->db->select('SUM(income_others_amount) as sumnumber2,income_other_year');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_other_year',$years);
        // $this->db->group_by('income_other_year');
        $query = $this->db->get('tblipafsourceincome_others');
        return $query->result();
    }

    public function getsumothersourceCashDonatebyYr($codegens,$years)
    {
        $this->db->select('SUM(donation_amount) as sumnumber3,income_donate_year');
        // $this->db->join('tbldateyear','tblipafsourceincome_donation.income_donate_year = tbldateyear.id_year','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_donation',1);
        $this->db->where('income_donate_year',$years);
        // $this->db->group_by('income_donate_year');
        $query = $this->db->get('tblipafsourceincome_donation');
        return $query->result();
    }

    public function getsumothersourceOthersbyYr($codegens,$years)
    {
        $this->db->select('SUM(otherincome_other_amount) as sumnumber4,otherincome_other_year');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('otherincome_other_year',$years);
        // $this->db->group_by('otherincome_other_year');
        $query = $this->db->get('tblipafsourceincomeother_others');
        return $query->result();
    }

    public function getsumfinesbyYr($codegens,$years)
    {
        $this->db->select('SUM(income_pfd_amount) as sumnumber5');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_pfd_year',$years);
        // $this->db->group_by('income_pfd_year');
        $query = $this->db->get('tblipafsourceincome_finespenaltydamage');
        return $query->result();
    }

    public function getalldonations($codegens,$months,$years)
    {
        $this->db->join('tblipafsourceincomedonation','tblipafsourceincome_donation.income_donation = tblipafsourceincomedonation.id_donation','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_donate_month',$months);
        $this->db->where('income_donate_year',$years);
        $this->db->where('income_donation',1);
        $query = $this->db->get('tblipafsourceincome_donation');
        return $query->result();
    }

    public function getalldonationsEdit2($codegens,$months,$years,$day)
    {
        $this->db->join('tblipafsourceincomedonation','tblipafsourceincome_donation.income_donation = tblipafsourceincomedonation.id_donation','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_donate_month',$months);
        $this->db->where('income_donate_year',$years);
        $query = $this->db->get('tblipafsourceincome_donation');
        return $query->result();
    }

    public function getalldonationsEdit($codegens,$months,$years)
    {
        $this->db->join('tblipafsourceincomedonation','tblipafsourceincome_donation.income_donation = tblipafsourceincomedonation.id_donation','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_donate_month',$months);
        $this->db->where('income_donate_year',$years);
        $query = $this->db->get('tblipafsourceincome_donation');
        return $query->result();
    }

    public function getalldonationsEdita($codegens,$months,$years,$day)
    {
        $this->db->join('tblipafsourceincomedonation','tblipafsourceincome_donation.income_donation = tblipafsourceincomedonation.id_donation','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_donate_month',$months);
        $this->db->where('income_donate_year',$years);
        $this->db->where('income_donate_day',$day);
        $query = $this->db->get('tblipafsourceincome_donation');
        return $query->result();
    }

    public function getallotherincome($codegens,$months,$years)
    {
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_other_month',$months);
        $this->db->where('income_other_year',$years);
        $query = $this->db->get('tblipafsourceincome_others');
        return $query->result();
    }

    public function getallotherincomea($codegens,$months,$years,$day)
    {
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_other_month',$months);
        $this->db->where('income_other_year',$years);
        $this->db->where('income_other_day',$day);
        $query = $this->db->get('tblipafsourceincome_others');
        return $query->result();
    }

    public function getallotherincomeSUM($codegens,$months,$years)
    {
        $this->db->select('SUM(income_others_amount) as incomesum,income_other_month,income_other_year');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_other_month',$months);
        $this->db->where('income_other_year',$years);
        // $this->db->group_by('income_other_month');
        // $this->db->group_by(array("income_other_month"));
        $query = $this->db->get('tblipafsourceincome_others');
        return $query->result();
    }

    public function getallothersourceincome($codegens,$months,$years)
    {
        $this->db->where('generatedcode',$codegens);
        $this->db->where('otherincome_other_month',$months);
        $this->db->where('otherincome_other_year',$years);
        $query = $this->db->get('tblipafsourceincomeother_others');
        return $query->result();
    }

    public function getallothersourceincomea($codegens,$months,$years,$day)
    {
        $this->db->where('generatedcode',$codegens);
        $this->db->where('otherincome_other_month',$months);
        $this->db->where('otherincome_other_year',$years);
        $this->db->where('otherincome_other_day',$day);
        $query = $this->db->get('tblipafsourceincomeother_others');
        return $query->result();
    }

    public function getallothersourceincomeSUM($codegens,$months,$years)
    {
        $this->db->select('SUM(otherincome_other_amount) as incomesum,otherincome_other_month,otherincome_other_year');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('otherincome_other_month',$months);
        $this->db->where('otherincome_other_year',$years);
        // $this->db->group_by(array("otherincome_other_month","otherincome_other_year"));
        $query = $this->db->get('tblipafsourceincomeother_others');
        return $query->result();
    }

    public function getalldonationsinkind($codegens,$months,$years)
    {
        $this->db->select('group_concat("Book value :",income_donation_bookval,"<br>Description : ",income_donation_desc separator "<hr> ") as inkinddonate, SUM(donation_amount) as totaldonataion ,
                           income_donation,donation_desc,donation_amount,income_donation_desc,income_donation_bookval,income_donate_month,income_donate_year');
        $this->db->join('tblipafsourceincomedonation','tblipafsourceincome_donation.income_donation = tblipafsourceincomedonation.id_donation','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_donate_month',$months);
        $this->db->where('income_donate_year',$years);
        $this->db->where('income_donation',2);
        // $this->db->group_by('income_date_year')
        $query = $this->db->get('tblipafsourceincome_donation');
        return $query->result();
    }

    public function getalldonationtotalcash($codegens,$months,$years)
    {
        $this->db->select('SUM(donation_amount) as totaldonataion, income_donate_month,income_donate_year');
        // $this->db->join('tblipafsourceincomedonation','tblipafsourceincome_donation.income_donation = tblipafsourceincomedonation.id_donation','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_donate_month',$months);
        $this->db->where('income_donate_year',$years);
        $this->db->where('income_donation',1);
        // $this->db->group_by('income_donate_month');
        $query = $this->db->get('tblipafsourceincome_donation');
        return $query->result();
    }

    public function getallprevactualincomes($codegens){
        $this->db->where('generatedcode',$codegens)
        ->order_by('tblpaipafincomeprevyear.previncome_year','DESC')
        ->order_by('LENGTH(tblpaipafincomeprevyear.previncome_year)','DESC');
        $query = $this->db->get('tblpaipafincomeprevyear');
        return $query->result();
    }

    public function getallInitactualincomes($codegens){
        $this->db->select('SUM(entrance_fee+facility_fee+recreational_fee+resource_fee+sapa_fee+moa_fee+rsa_fee+cla_fee+grant_fee+endowment_fee) as sumentrance,income_date_year,id_source_income,generatedcode');
        $this->db->where('generatedcode',$codegens)
        ->order_by('tblipafsourceincome.income_date_year','DESC')
        ->order_by('LENGTH(tblipafsourceincome.income_date_year)','DESC')
        ->group_by('income_date_year');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getallInitactualincomesOthers($codegens,$years){
        $this->db->select('SUM(income_others_amount) as sumother,income_other_year');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_other_year',$years)
        ->order_by('income_other_year','DESC')
        ->order_by('LENGTH(income_other_year)','DESC')
        ->group_by('income_other_year');
        $query = $this->db->get('tblipafsourceincome_others');
        return $query->result();
    }

    public function getallInitactualincomesDonation($codegens,$years){
        $this->db->select('SUM(donation_amount) as sumdonate,income_donation');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_donate_year',$years);
        $this->db->where('income_donation',1)
        ->order_by('income_donate_year','DESC')
        ->order_by('LENGTH(income_donate_year)','DESC')
        ->group_by('income_donate_year');
        $query = $this->db->get('tblipafsourceincome_donation');
        return $query->result();
    }

    public function getallInitactualincomesOthers2($codegens,$years){
        $this->db->select('SUM(otherincome_other_amount) as sumother2,otherincome_other_year');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('otherincome_other_year',$years)
        ->order_by('otherincome_other_year','DESC')
        ->order_by('LENGTH(otherincome_other_year)','DESC')
        ->group_by('otherincome_other_year');
        $query = $this->db->get('tblipafsourceincomeother_others');
        return $query->result();
    }

    public function getallInitactualincomesfinespenaltydmg($codegens,$years){
        $this->db->select('SUM(income_pfd_amount) as sumfpd,income_pfd_year');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_pfd_year',$years)
        ->order_by('income_pfd_year','DESC')
        ->order_by('LENGTH(income_pfd_year)','DESC')
        ->group_by('income_pfd_year');
        $query = $this->db->get('tblipafsourceincome_finespenaltydamage');
        return $query->result();
    }

    public function getallInitactualincomesstartingbalance($codegens,$years){
        // $this->db->select('SUM(income_pfd_amount) as sumfpd,income_pfd_year');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_sb_year',$years);
        $query = $this->db->get('tblipafsourceincome_startingbalance');
        return $query->result();
    }
    public function getallInitactualincomesstartingbalancenotbyyear($codegens,$years){
        // $this->db->select('SUM(income_pfd_amount) as sumfpd,income_pfd_year');
        // $this->db->where('generatedcode',$codegens);
        // $this->db->where('income_sb_year',$years);
        $query = $this->db->get('tblipafsourceincome_startingbalance');
        return $query->result();
    }

    public function getallphysicalreport($code2,$yearly)
    {
        // $this->db->select('*,tblipaf_physical.generatedcode,tblipaf_physical.physical_code ');
        // $this->db->join('tbldatemonth','tblipaf_physical.physical_month = tbldatemonth.id_month','LEFT');
        // $this->db->join('tblipaf_physical_target','tblipaf_physical.id_ipaf_physical = tblipaf_physical_target.id_physical_pap','LEFT');
        // $this->db->group_by('id_physical_pap');
        // $this->db->where('tblipaf_physical.generatedcode',$codegens)
        // ->order_by('tbldatemonth.id_month','DESC')
        // ->order_by('LENGTH(tbldatemonth.id_month)','DESC');
        // $query = $this->db->get('tblipaf_physical');
        // return $query->result();
        $this->db->select('*,tblipaf_physical_target.generatedcode,tblipaf_physical_target.physical_code ');
        $this->db->join('tbldatemonth','tblipaf_physical_target.physical_target_month = tbldatemonth.id_month','LEFT');
        $this->db->where('physical_code',$code2);
        $this->db->where('physical_target_year',$yearly);
        // $this->db->group_by('id_physical_pap');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallphysicalfinancialreportdata($codegens,$codegens2,$papid)
    {
        $this->db->join('tbldatemonth','tblipaf_physical_target.physical_target_month = tbldatemonth.id_month','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('physical_code',$codegens2);
        $this->db->where('id_physical_pap',$papid);
        $this->db->order_by('tbldatemonth.id_month','ASC');
        $this->db->order_by('LENGTH(tbldatemonth.id_month)','ASC');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallphysicalfinancialreport($codegens)
    {
        $this->db->where('generatedcode',$codegens);
        $this->db->where('pap_id_title',0);
        $query = $this->db->get('tblipaf_physical_pap');
        return $query->result();
    }

    public function getallphysicalfinancialreport_sub($codeid)
    {
        $this->db->where('pap_id_title',$codeid);
        // $this->db->group_by('pap_id_title');
        $query = $this->db->get('tblipaf_physical_pap');
        return $query->result();
    }

    public function getallphysicalfinancialreport_groupbyYear($codegens)
    {
        $this->db->where('generatedcode',$codegens);
        // $this->db->join('tbldateyear',$codegens);
        $this->db->group_by('pap_year');
        $query = $this->db->get('tblipaf_physical_pap');
        return $query->result();
    }

    public function getallphysicalfinancialpapindicatorreport($code)
    {
        $query = $this->db->query('SELECT * FROM tblipaf_physical_pap_indicator');
        $this->db->where('physical_code',$code);
        return $query->num_rows();
       
    }

    public function getallyearsphysical($codegens,$yrid)
    {
        $this->db->join('tbldatemonth','tblipaf_physical.physical_month = tbldatemonth.id_month','LEFT');
        // $this->db->join('tbldateyear','tblipaf_physical.physical_year = tbldateyear.id_year','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('physical_year',$yrid);
        $query = $this->db->get('tblipaf_physical');
        return $query->result();
    }

    public function getyeartoheader($codegens)
    {
        $this->db->where('generatedcode',$codegens);
        $this->db->group_by('physical_year');
        $this->db->order_by('physical_year','DESC');
        $this->db->order_by('LENGTH(physical_year)','DESC');
        $query = $this->db->get('tblipaf_physical');
        return $query->result();
    }

    public function getallphyrepperJan($id,$code,$year,$quarter)
    {
        $this->db->where('id_physical_pap',$id);
        $this->db->where('physical_code',$code);
        $this->db->where('physical_target_year',$year);
        $this->db->where('physical_target_quarter',$quarter);      
        $this->db->where('physical_target_month',1);      
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallphyrepperFeb($id,$code,$year,$quarter)
    {
        $this->db->where('id_physical_pap',$id);
        $this->db->where('physical_code',$code);
        $this->db->where('physical_target_year',$year);
        $this->db->where('physical_target_quarter',$quarter);      
        $this->db->where('physical_target_month',2);      
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallphyrepperMar($id,$code,$year,$quarter)
    {
        $this->db->where('id_physical_pap',$id);
        $this->db->where('physical_code',$code);
        $this->db->where('physical_target_year',$year);
        $this->db->where('physical_target_quarter',$quarter);      
        $this->db->where('physical_target_month',3);      
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallphyrepperApr($id,$code,$year,$quarter)
    {
        $this->db->where('id_physical_pap',$id);
        $this->db->where('physical_code',$code);
        $this->db->where('physical_target_year',$year);
        $this->db->where('physical_target_quarter',$quarter);      
        $this->db->where('physical_target_month',4);      
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallphyrepperMay($id,$code,$year,$quarter)
    {
        $this->db->where('id_physical_pap',$id);
        $this->db->where('physical_code',$code);
        $this->db->where('physical_target_year',$year);
        $this->db->where('physical_target_quarter',$quarter);      
        $this->db->where('physical_target_month',5);      
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallphyrepperJun($id,$code,$year,$quarter)
    {
        $this->db->where('id_physical_pap',$id);
        $this->db->where('physical_code',$code);
        $this->db->where('physical_target_year',$year);
        $this->db->where('physical_target_quarter',$quarter);      
        $this->db->where('physical_target_month',6);      
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallphyrepperJul($id,$code,$year,$quarter)
    {
        $this->db->where('id_physical_pap',$id);
        $this->db->where('physical_code',$code);
        $this->db->where('physical_target_year',$year);
        $this->db->where('physical_target_quarter',$quarter);      
        $this->db->where('physical_target_month',7);      
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallphyrepperAug($id,$code,$year,$quarter)
    {
        $this->db->where('id_physical_pap',$id);
        $this->db->where('physical_code',$code);
        $this->db->where('physical_target_year',$year);
        $this->db->where('physical_target_quarter',$quarter);      
        $this->db->where('physical_target_month',8);      
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallphyrepperSep($id,$code,$year,$quarter)
    {
        $this->db->where('id_physical_pap',$id);
        $this->db->where('physical_code',$code);
        $this->db->where('physical_target_year',$year);
        $this->db->where('physical_target_quarter',$quarter);      
        $this->db->where('physical_target_month',9);      
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallphyrepperOct($id,$code,$year,$quarter)
    {
        $this->db->where('id_physical_pap',$id);
        $this->db->where('physical_code',$code);
        $this->db->where('physical_target_year',$year);
        $this->db->where('physical_target_quarter',$quarter);      
        $this->db->where('physical_target_month',10);      
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallphyrepperNov($id,$code,$year,$quarter)
    {
        $this->db->where('id_physical_pap',$id);
        $this->db->where('physical_code',$code);
        $this->db->where('physical_target_year',$year);
        $this->db->where('physical_target_quarter',$quarter);      
        $this->db->where('physical_target_month',11);      
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallphyrepperDec($id,$code,$year,$quarter)
    {
        $this->db->where('id_physical_pap',$id);
        $this->db->where('physical_code',$code);
        $this->db->where('physical_target_year',$year);
        $this->db->where('physical_target_quarter',$quarter);      
        $this->db->where('physical_target_month',12);      
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallTotalphyrepperuarter($id,$code,$year,$quarter)
    {
        $this->db->select('SUM(physical_target_quantity) as totalptq, SUM(physical_target_accomp) as totalpta, SUM(physical_cost_target) as totalpct, SUM(physical_cost_accomplishment) as totalpca');
        $this->db->where('physical_code',$code);
        $this->db->where('physical_target_year',$year);
        $this->db->where('physical_target_quarter',$quarter);
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
     
    }

    public function getallphyrepJan($pcode,$pyear)
    {
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_month',1);
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallphyrepFeb($pcode,$pyear)
    {
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_month',2);
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallphyrepMar($pcode,$pyear)
    {
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_month',3);
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallphyrep1q($pcode,$pyear)
    {
        $this->db->select('SUM(physical_target_quantity) as totalpt');
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_quarter','1st');
        $this->db->group_by('physical_target_quarter');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallphyacc1q($pcode,$pyear)
    {
        $this->db->select('SUM(physical_target_accomp) as totalpt');
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_quarter','1st');
        $this->db->group_by('physical_target_quarter');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallphyrepApr($pcode,$pyear)
    {
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_month',4);
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallphyrepMay($pcode,$pyear)
    {
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_month',5);
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallphyrepJun($pcode,$pyear)
    {
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_month',6);
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallphyrep2q($pcode,$pyear)
    {
        $this->db->select('SUM(physical_target_quantity) as totalpt');
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_quarter','2nd');
        $this->db->group_by('physical_target_quarter');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallphyacc2q($pcode,$pyear)
    {
        $this->db->select('SUM(physical_target_accomp) as totalpt');
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_quarter','2nd');
        $this->db->group_by('physical_target_quarter');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallphyrepJul($pcode,$pyear)
    {
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_month',7);
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallphyrepAug($pcode,$pyear)
    {
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_month',8);
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallphyrepSep($pcode,$pyear)
    {
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_month',9);
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallphyrep3q($pcode,$pyear)
    {
        $this->db->select('SUM(physical_target_quantity) as totalpt');
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_quarter','3rd');
        $this->db->group_by('physical_target_quarter');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallphyacc3q($pcode,$pyear)
    {
        $this->db->select('SUM(physical_target_accomp) as totalpt');
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_quarter','3rd');
        $this->db->group_by('physical_target_quarter');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallphyrepOct($pcode,$pyear)
    {
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_month',10);
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallphyrepNov($pcode,$pyear)
    {
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_month',11);
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallphyrepDec($pcode,$pyear)
    {
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_month',12);
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallphyrep4q($pcode,$pyear)
    {
        $this->db->select('SUM(physical_target_quantity) as totalpt');
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_quarter','4th');
        $this->db->group_by('physical_target_quarter');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    } 

    public function getallphyacc4q($pcode,$pyear)
    {
        $this->db->select('SUM(physical_target_accomp) as totalpt');
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_quarter','4th');
        $this->db->group_by('physical_target_quarter');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getalltotalannualphyrep($pcode,$pyear)
    {
        $this->db->select('SUM(physical_target_quantity) as annualphyrep');
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->group_by('physical_target_year');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getalltotalannualphyaccom($pcode,$pyear)
    {
        $this->db->select('SUM(physical_target_accomp) as annualphyaccom');
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->group_by('physical_target_year');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getalltotalannualpercentagephysicalreport($pcode,$pyear)
    {
        $this->db->select('SUM(physical_target_accomp) as annualphyaccom, SUM(physical_target_quantity) as annualphytar');
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->group_by('physical_target_year');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallfinrepJan($pcode,$pyear)
    {
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_month',1);
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallfinrepFeb($pcode,$pyear)
    {
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_month',2);
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallfinrepMar($pcode,$pyear)
    {
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_month',3);
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getalfinyrep1q($pcode,$pyear)
    {
        $this->db->select('SUM(physical_cost_target) as totalft');
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_quarter','1st');
        $this->db->group_by('physical_target_quarter');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallfinacc1q($pcode,$pyear)
    {
        $this->db->select('SUM(physical_cost_accomplishment) as totalfa');
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_quarter','1st');
        $this->db->group_by('physical_target_quarter');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallfinrepApr($pcode,$pyear)
    {
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_month',4);
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallfinrepMay($pcode,$pyear)
    {
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_month',5);
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallfinrepJun($pcode,$pyear)
    {
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_month',6);
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getalfinyrep2q($pcode,$pyear)
    {
        $this->db->select('SUM(physical_cost_target) as totalft');
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_quarter','2nd');
        $this->db->group_by('physical_target_quarter');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallfinacc2q($pcode,$pyear)
    {
        $this->db->select('SUM(physical_cost_accomplishment) as totalfa');
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_quarter','2nd');
        $this->db->group_by('physical_target_quarter');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallfinrepJul($pcode,$pyear)
    {
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_month',7);
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallfinrepAug($pcode,$pyear)
    {
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_month',8);
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallfinrepSep($pcode,$pyear)
    {
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_month',9);
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getalfinyrep3q($pcode,$pyear)
    {
        $this->db->select('SUM(physical_cost_target) as totalft');
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_quarter','3rd');
        $this->db->group_by('physical_target_quarter');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallfinacc3q($pcode,$pyear)
    {
        $this->db->select('SUM(physical_cost_accomplishment) as totalfa');
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_quarter','3rd');
        $this->db->group_by('physical_target_quarter');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallfinrepOct($pcode,$pyear)
    {
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_month',7);
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallfinrepNov($pcode,$pyear)
    {
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_month',8);
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallfinrepDec($pcode,$pyear)
    {
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_month',9);
        $this->db->group_by('physical_code');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getalfinyrep4q($pcode,$pyear)
    {
        $this->db->select('SUM(physical_cost_target) as totalft');
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_quarter','4th');
        $this->db->group_by('physical_target_quarter');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getallfinacc4q($pcode,$pyear)
    {
        $this->db->select('SUM(physical_cost_accomplishment) as totalfa');
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->where('physical_target_quarter','4th');
        $this->db->group_by('physical_target_quarter');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }
    
    public function getalltotalannualfinrep($pcode,$pyear)
    {
        $this->db->select('SUM(physical_cost_target) as annualfinrep');
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->group_by('physical_target_year');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }

    public function getalltotalannualfinaccom($pcode,$pyear)
    {
        $this->db->select('SUM(physical_cost_accomplishment) as annualfinaccom');
        $this->db->where('physical_code',$pcode);
        $this->db->where('physical_target_year',$pyear);
        $this->db->group_by('physical_target_year');
        $query = $this->db->get('tblipaf_physical_target');
        return $query->result();
    }
   

    public function getallmonthphysical($code2)
    {
        $this->db->join('tbldatemonth','tblipaf_physical.physical_month = tbldatemonth.id_month','LEFT');
        // $this->db->join('tbldateyear','tblipaf_physical.physical_year = tbldateyear.id_year','LEFT');
        $this->db->where('physical_code',$code2);
        $this->db->group_by('physical_month')
        ->order_by('tbldatemonth.id_month','ASC ')
        ->order_by('LENGTH(tbldatemonth.id_month)','ASC ');
        $query = $this->db->get('tblipaf_physical');
        return $query->result();
    }

    public function getallphysicalreportGenerateReport($codegens,$years,$quarter)
    {
        $this->db->join('tbldatemonth','tblipaf_physical.physical_month = tbldatemonth.id_month','LEFT');
        $this->db->join('tbldateyear','tblipaf_physical.physical_year = tbldateyear.id_year','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('physical_year',$years);
        $this->db->order_by('tbldatemonth.id_month','DESC');
        $this->db->order_by('LENGTH(tbldatemonth.id_month)','DESC');
        $query = $this->db->get('tblipaf_physical');
        return $query->result();
    }

    public function getallphysicalreportGenerateReportYear($codegens,$years,$monthss)
    {
        $this->db->join('tbldatemonth','tblipaf_physical.physical_month = tbldatemonth.id_month','LEFT');
        $this->db->join('tbldateyear','tblipaf_physical.physical_year = tbldateyear.id_year','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('physical_year',$years);
        $this->db->where('physical_month',$monthss);
        // $this->db->order_by('tbldatemonth.id_month','ASC');
        // $this->db->order_by('LENGTH(tbldatemonth.id_month)','ASC');
        $query = $this->db->get('tblipaf_physical');
        return $query->result();
    }

    public function getallyearsphysicalGenerateReport($codegens,$year,$quarter)
    {
        $this->db->join('tblipaf_physical_target','tblipaf_physical.id_ipaf_physical = tblipaf_physical_target.id_physical_pap','LEFT');
        $this->db->join('tbldatemonth','tblipaf_physical.physical_month = tbldatemonth.id_month','LEFT');
        $this->db->join('tbldateyear','tblipaf_physical.physical_year = tbldateyear.id_year','LEFT');
        $this->db->where('tblipaf_physical.generatedcode',$codegens);
        $this->db->where('physical_year',$year);
        $this->db->where('physical_target_quarter',$quarter);
        $this->db->group_by('id_ipaf_physical')
        ->order_by('tbldateyear.id_year','DESC')
        ->order_by('LENGTH(tbldateyear.id_year)','DESC');
        $query = $this->db->get('tblipaf_physical');
        return $query->result();
    }

    public function getallyearsphysicalGenerateReportYear($codegens,$year)
    {
        // $this->db->join('tbldatemonth','tblipaf_physical.physical_month = tbldatemonth.id_month','LEFT');
        // $this->db->join('tbldateyear','tblipaf_physical.physical_year = tbldateyear.id_year','LEFT');
        // $this->db->where('generatedcode',$codegens);
        // $this->db->where('physical_year',$year);
        // $this->db->group_by('physical_year')
        // ->order_by('tbldateyear.id_year','DESC')
        // ->order_by('LENGTH(tbldateyear.id_year)','DESC');
        // $query = $this->db->get('tblipaf_physical');
        // return $query->result();

        $this->db->join('tbldatemonth','tblipaf_physical.physical_month = tbldatemonth.id_month','LEFT');
        // $this->db->join('tbldateyear','tblipaf_physical.physical_year = tbldateyear.id_year','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('physical_year',$year);
        $query = $this->db->get('tblipaf_physical');
        return $query->result();
    }

    public function getallmonthphysicalGenerateReport($codegens,$year,$quarter)
    {
        $this->db->join('tbldatemonth','tblipaf_physical.physical_month = tbldatemonth.id_month','LEFT');
        $this->db->join('tbldateyear','tblipaf_physical.physical_year = tbldateyear.id_year','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('physical_year',$year);
        $this->db->where('physical_quarter',$quarter);
        $this->db->group_by('physical_month')
        ->order_by('tbldatemonth.id_month','ASC')
        ->order_by('LENGTH(tbldatemonth.id_month)','ASC');
        $query = $this->db->get('tblipaf_physical');
        return $query->result();
    }

    public function getallmonthphysicalGenerateReportYear($codegens,$year)
    {
        $this->db->join('tbldatemonth','tblipaf_physical.physical_month = tbldatemonth.id_month','LEFT');
        $this->db->join('tbldateyear','tblipaf_physical.physical_year = tbldateyear.id_year','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('physical_year',$year);
        $this->db->group_by('physical_month')
        ->order_by('tbldatemonth.id_month','ASC')
        ->order_by('LENGTH(tbldatemonth.id_month)','ASC');
        $query = $this->db->get('tblipaf_physical');
        return $query->result();
    }

    public function getSUMtotalcostphysicalReport($codegens,$year)
    {
        $this->db->select('SUM(physical_cost) as total,physical_year');
        // $this->db->join('tbldateyear','tblipaf_physical.physical_year = tbldateyear.id_year','LEFT');
        $this->db->group_by('physical_year');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('physical_year',$year);
        $query = $this->db->get('tblipaf_physical');
        return $query->result();
    }

    public function getallperformacemeasuress($code2)
    {
        $this->db->select('group_concat(perfomance_measure separator "<br> ") as nameperformacemeasure');
        $this->db->where('physical_code',$code2);
        $query = $this->db->get('tblipaf_physical_performace_measure');
        return $query->result();
    }

    public function getallperformacemeasuressIn($codegens)
    {
        // $this->db->select('group_concat(perfomance_measure separator "<br> ") as nameperformacemeasure');
        $this->db->where('physical_code',$codegens);
        $query = $this->db->get('tblipaf_physical_performace_measure');
        return $query->result();
    }

    public function getSUMtotalcostphysicalReportbyMonth($codegens,$year)
    {
        $this->db->select('SUM(physical_cost) as total,physical_year,id_year,physical_month,id_month');
        $this->db->join('tbldateyear','tblipaf_physical.physical_year = tbldateyear.id_year','LEFT');
        $this->db->join('tbldatemonth','tblipaf_physical.physical_month = tbldatemonth.id_month','LEFT');
        $this->db->group_by(array('physical_year','physical_month'));
        $this->db->where('generatedcode',$codegens);
        $this->db->where('physical_year',$year);
        $query = $this->db->get('tblipaf_physical');
        return $query->result();
    }

    public function getallvisitorslogs($codegens){
    $date = new DateTime("now");
    $curr_year = $date->format('Y');
    $curr_month = $date->format('n');

        $this->db->join('tblipafvisitorslog_forloc','tblipafvisitorslog.visitorlog_forloc = tblipafvisitorslog_forloc.id_visitorforloc','left');
        $this->db->join('tblsex','tblipafvisitorslog.visitorlog_sex = tblsex.id','left');
        $this->db->join('tblpavisitorscategory','tblipafvisitorslog.visitors_category = tblpavisitorscategory.id_visitor_cat','left');
        $this->db->join('tblipafvisitorslog_payment','tblipafvisitorslog.visitorlog_typeofpaid = tblipafvisitorslog_payment.id_visitorpayment ','left');
        $this->db->join('tbldateyear','tblipafvisitorslog.visitorlog_year = tbldateyear.id_year','LEFT');
        $this->db->join('tbldatemonth','tblipafvisitorslog.visitorlog_month = tbldatemonth.id_month','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('visitorlog_month',$curr_month);
        $this->db->where('visitorlog_year',$curr_year);
        // $this->db->where('date_created',date('Y-m-d'));
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }

    public function getallvisitorslogsSearch($codegens,$year,$month){
        $this->db->join('tblipafvisitorslog_forloc','tblipafvisitorslog.visitorlog_forloc = tblipafvisitorslog_forloc.id_visitorforloc','left');
        $this->db->join('tblsex','tblipafvisitorslog.visitorlog_sex = tblsex.id','left');
        $this->db->join('tblpavisitorscategory','tblipafvisitorslog.visitors_category = tblpavisitorscategory.id_visitor_cat','left');
        $this->db->join('tblipafvisitorslog_payment','tblipafvisitorslog.visitorlog_typeofpaid = tblipafvisitorslog_payment.id_visitorpayment ','left')

        ->where('visitorlog_year',$year)
        ->where('visitorlog_month',$month)
        ->where('generatedcode',$codegens)
        ->order_by('LENGTH(visitorlog_day)')
        ->order_by('visitorlog_day');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }

    public function getsearchallvisitorsLogbookAmount($codegens,$year,$month){
        $this->db->select('SUM(amount_payment) as amounts')
        ->where('visitorlogs_month',$month)
        ->where('visitorlogs_year',$year)
        ->where('generatedcode',$codegens);
        $query = $this->db->get('tblpavisitorspayment');
        return $query->result();
    }

    public function getpaymentvisitors($id)
    {
        $this->db->join('tblpaipaffeetype','tblpavisitorspayment.types_of_payment=tblpaipaffeetype.id_typefee','LEFT')
        ->where('visitors_gencode',$id);
        $query = $this->db->get('tblpavisitorspayment');
        return $query->result();
    }

    public function getsearchpaymentvisitors($id,$year,$month)
    {
        $this->db->join('tblpaipaffeetype','tblpavisitorspayment.types_of_payment=tblpaipaffeetype.id_typefee','LEFT')
        ->where('visitorlogs_month',$month)
        ->where('visitorlogs_year',$year)
        ->where('visitors_gencode',$id);
        $query = $this->db->get('tblpavisitorspayment');
        return $query->result();
    }

    public function getsearchallvisitorsLogbook($codegens){
    $date = new DateTime("now");
    $curr_year = $date->format('Y');
    $curr_month = $date->format('F');
        $this->db->select('SUM(amount_payment) as amounts')
        ->where('date_created',date('Y-m-d'))
        ->where('generatedcode',$codegens);
        $query = $this->db->get('tblpavisitorspayment');
        return $query->result();
    }

    public function did_delete_row($id){
        $this->db->join('tblipafvisitorslog','tblpavisitorspayment.visitors_gencode=tblipafvisitorslog.visitors_gencode','LEFT');
        $this->db->where('id_visitorslog', $id);
        $this->db->delete('tblpavisitorspayment');
    }

    public function fetchSearchVisitorLogbook_date($searchPa,$year_list,$quarter)
    {
        $this->db->select('*');
        $this->db->join('tbldatemonth','tblipafvisitorslog.visitorlog_month = tbldatemonth.id_month','Left');
        $this->db->where('generatedcode',$searchPa);
        $this->db->where('visitorlog_year',$year_list);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblipafvisitorslog.visitorlog_month');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }


    public function fetchSearchVisitorLogbook_male_below($searchPa,$year_list,$quarter)
    {
        $this->db->select('COUNT(visitors_category) as below,visitorlog_month');
        $this->db->join('tbldatemonth','tblipafvisitorslog.visitorlog_month = tbldatemonth.id_month','Left');
        $this->db->where('visitorlog_sex',1);
        $this->db->where('visitors_category',1);
        $this->db->where('generatedcode',$searchPa);
        $this->db->where('visitorlog_year',$year_list);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblipafvisitorslog.visitorlog_month');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }

    public function fetchSearchVisitorLogbook_female_below($searchPa,$year_list,$quarter)
    {
        $this->db->select('COUNT(visitors_category) as below2,
            visitorlog_month,visitorlog_day,visitorlog_year,visitorlog_sex');
        $this->db->join('tbldatemonth','tblipafvisitorslog.visitorlog_month = tbldatemonth.id_month','Left');
        $this->db->where('visitorlog_sex',2);
        $this->db->where('visitors_category',1);
        $this->db->where('tblipafvisitorslog.generatedcode',$searchPa);
        $this->db->where('visitorlog_year',$year_list);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblipafvisitorslog.visitorlog_month');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }

    public function fetchSearchVisitorLogbook_total_below($searchPa,$year_list,$quarter)
    {
        $this->db->select('COUNT(visitors_category) as totalbelow,
            visitorlog_month,visitorlog_day,visitorlog_year,visitorlog_sex');
        $this->db->join('tbldatemonth','tblipafvisitorslog.visitorlog_month = tbldatemonth.id_month','Left');
        $this->db->where('visitors_category',1);
        $this->db->where('tblipafvisitorslog.generatedcode',$searchPa);
        $this->db->where('visitorlog_year',$year_list);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblipafvisitorslog.visitorlog_month');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }

    public function fetchSearchVisitorLogbook_male_pwd($searchPa,$year_list,$quarter)
    {
        $this->db->select('COUNT(visitors_category) as malepwd,
            visitorlog_month,visitorlog_day,visitorlog_year,visitorlog_sex');
        $this->db->join('tbldatemonth','tblipafvisitorslog.visitorlog_month = tbldatemonth.id_month','Left');
        $this->db->where('visitorlog_sex',1);
        $this->db->where('visitors_category',5);
        $this->db->where('tblipafvisitorslog.generatedcode',$searchPa);
        $this->db->where('visitorlog_year',$year_list);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblipafvisitorslog.visitorlog_month');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }

    public function fetchSearchVisitorLogbook_female_pwd($searchPa,$year_list,$quarter)
    {
        $this->db->select('COUNT(visitors_category) as femalepwd,
            visitorlog_month,visitorlog_day,visitorlog_year,visitorlog_sex');
        $this->db->join('tbldatemonth','tblipafvisitorslog.visitorlog_month = tbldatemonth.id_month','Left');
        $this->db->where('visitorlog_sex',2);
        $this->db->where('visitors_category',5);
        $this->db->where('tblipafvisitorslog.generatedcode',$searchPa);
        $this->db->where('visitorlog_year',$year_list);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblipafvisitorslog.visitorlog_month');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }

    public function fetchSearchVisitorLogbook_total_pwd($searchPa,$year_list,$quarter)
    {
        $this->db->select('COUNT(visitors_category) as totalpwd,
            visitorlog_month,visitorlog_day,visitorlog_year,visitorlog_sex');
        $this->db->join('tbldatemonth','tblipafvisitorslog.visitorlog_month = tbldatemonth.id_month','Left');
        $this->db->where('visitors_category',5);
        $this->db->where('tblipafvisitorslog.generatedcode',$searchPa);
        $this->db->where('visitorlog_year',$year_list);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblipafvisitorslog.visitorlog_month');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }

    public function fetchSearchVisitorLogbook_male_senior($searchPa,$year_list,$quarter)
    {
        $this->db->select('COUNT(visitors_category) as malesenior,
            visitorlog_month,visitorlog_day,visitorlog_year,visitorlog_sex');
        $this->db->join('tbldatemonth','tblipafvisitorslog.visitorlog_month = tbldatemonth.id_month','Left');
        $this->db->where('visitorlog_sex',1);
        $this->db->where('visitors_category',4);
        $this->db->where('tblipafvisitorslog.generatedcode',$searchPa);
        $this->db->where('visitorlog_year',$year_list);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblipafvisitorslog.visitorlog_month');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }

    public function fetchSearchVisitorLogbook_female_senior($searchPa,$year_list,$quarter)
    {
        $this->db->select('COUNT(visitors_category) as femalesenior,
            visitorlog_month,visitorlog_day,visitorlog_year,visitorlog_sex');
        $this->db->join('tbldatemonth','tblipafvisitorslog.visitorlog_month = tbldatemonth.id_month','Left');
        $this->db->where('visitorlog_sex',2);
        $this->db->where('visitors_category',4);
        $this->db->where('tblipafvisitorslog.generatedcode',$searchPa);
        $this->db->where('visitorlog_year',$year_list);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblipafvisitorslog.visitorlog_month');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }

    public function fetchSearchVisitorLogbook_total_senior($searchPa,$year_list,$quarter)
    {
        $this->db->select('COUNT(visitors_category) as totalsenior,
            visitorlog_month,visitorlog_day,visitorlog_year,visitorlog_sex');
        $this->db->join('tbldatemonth','tblipafvisitorslog.visitorlog_month = tbldatemonth.id_month','Left');
        $this->db->where('visitors_category',4);
        $this->db->where('tblipafvisitorslog.generatedcode',$searchPa);
        $this->db->where('visitorlog_year',$year_list);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblipafvisitorslog.visitorlog_month');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }

    public function fetchSearchVisitorLogbook_male_student($searchPa,$year_list,$quarter)
    {
        $this->db->select('COUNT(visitors_category) as malestudent,
            visitorlog_month,visitorlog_day,visitorlog_year,visitorlog_sex');
        $this->db->join('tbldatemonth','tblipafvisitorslog.visitorlog_month = tbldatemonth.id_month','Left');
        $this->db->where('visitorlog_sex',1);
        $this->db->where('visitors_category',2);
        $this->db->where('tblipafvisitorslog.generatedcode',$searchPa);
        $this->db->where('visitorlog_year',$year_list);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblipafvisitorslog.visitorlog_month');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }

    public function fetchSearchVisitorLogbook_female_student($searchPa,$year_list,$quarter)
    {
        $this->db->select('COUNT(visitors_category) as femalestudent,
            visitorlog_month,visitorlog_day,visitorlog_year,visitorlog_sex');
        $this->db->join('tbldatemonth','tblipafvisitorslog.visitorlog_month = tbldatemonth.id_month','Left');
        $this->db->where('visitorlog_sex',2);
        $this->db->where('visitors_category',2);
        $this->db->where('tblipafvisitorslog.generatedcode',$searchPa);
        $this->db->where('visitorlog_year',$year_list);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblipafvisitorslog.visitorlog_month');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }

    public function fetchSearchVisitorLogbook_total_student($searchPa,$year_list,$quarter)
    {
        $this->db->select('COUNT(visitors_category) as totalstudent,
            visitorlog_month,visitorlog_day,visitorlog_year,visitorlog_sex');
        $this->db->join('tbldatemonth','tblipafvisitorslog.visitorlog_month = tbldatemonth.id_month','Left');
        $this->db->where('visitors_category',2);
        $this->db->where('tblipafvisitorslog.generatedcode',$searchPa);
        $this->db->where('visitorlog_year',$year_list);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblipafvisitorslog.visitorlog_month');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }

    public function fetchSearchVisitorLogbook_male_adult($searchPa,$year_list,$quarter)
    {
        $this->db->select('COUNT(visitors_category) as maleadult,
            visitorlog_month,visitorlog_day,visitorlog_year,visitorlog_sex');
        $this->db->join('tbldatemonth','tblipafvisitorslog.visitorlog_month = tbldatemonth.id_month','Left');
        $this->db->where('visitorlog_sex',1);
        $this->db->where('visitors_category',3);
        $this->db->where('tblipafvisitorslog.generatedcode',$searchPa);
        $this->db->where('visitorlog_year',$year_list);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblipafvisitorslog.visitorlog_month');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }

    public function fetchSearchVisitorLogbook_female_adult($searchPa,$year_list,$quarter)
    {
        $this->db->select('COUNT(visitors_category) as femaleadult,
            visitorlog_month,visitorlog_day,visitorlog_year,visitorlog_sex');
        $this->db->join('tbldatemonth','tblipafvisitorslog.visitorlog_month = tbldatemonth.id_month','Left');
        $this->db->where('visitorlog_sex',2);
        $this->db->where('visitors_category',3);
        $this->db->where('tblipafvisitorslog.generatedcode',$searchPa);
        $this->db->where('visitorlog_year',$year_list);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblipafvisitorslog.visitorlog_month');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }

    public function fetchSearchVisitorLogbook_total_adult($searchPa,$year_list,$quarter)
    {
        $this->db->select('COUNT(visitors_category) as totaladult,
            visitorlog_month,visitorlog_day,visitorlog_year,visitorlog_sex');
        $this->db->join('tbldatemonth','tblipafvisitorslog.visitorlog_month = tbldatemonth.id_month','Left');
        $this->db->where('visitors_category',3);
        $this->db->where('tblipafvisitorslog.generatedcode',$searchPa);
        $this->db->where('visitorlog_year',$year_list);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblipafvisitorslog.visitorlog_month');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }

    public function fetchSearchVisitorLogbook_foreign_male($searchPa,$year_list,$quarter)
    {
        $this->db->select('COUNT(visitorlog_forloc) as forMale,
            visitorlog_month,visitorlog_day,visitorlog_year,visitorlog_sex');
        $this->db->join('tbldatemonth','tblipafvisitorslog.visitorlog_month = tbldatemonth.id_month','Left');
        $this->db->where('visitorlog_forloc',1);
        $this->db->where('visitorlog_sex',1);
        $this->db->where('tblipafvisitorslog.generatedcode',$searchPa);
        $this->db->where('visitorlog_year',$year_list);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblipafvisitorslog.visitorlog_month');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }

    public function fetchSearchVisitorLogbook_foreign_female($searchPa,$year_list,$quarter)
    {
        $this->db->select('COUNT(visitorlog_forloc) as forFemale,
            visitorlog_month,visitorlog_day,visitorlog_year,visitorlog_sex');
        $this->db->join('tbldatemonth','tblipafvisitorslog.visitorlog_month = tbldatemonth.id_month','Left');
        $this->db->where('visitorlog_forloc',1);
        $this->db->where('visitorlog_sex',2);
        $this->db->where('tblipafvisitorslog.generatedcode',$searchPa);
        $this->db->where('visitorlog_year',$year_list);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblipafvisitorslog.visitorlog_month');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }

    public function fetchSearchVisitorLogbook_total_foreign($searchPa,$year_list,$quarter)
    {
        $this->db->select('COUNT(visitorlog_forloc) as totalfor,
            visitorlog_month,visitorlog_day,visitorlog_year,visitorlog_sex');
        $this->db->join('tbldatemonth','tblipafvisitorslog.visitorlog_month = tbldatemonth.id_month','Left');
        $this->db->where('visitorlog_forloc',1);
        $this->db->where('tblipafvisitorslog.generatedcode',$searchPa);
        $this->db->where('visitorlog_year',$year_list);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblipafvisitorslog.visitorlog_month');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }

    public function fetchSearchVisitorLogbook_tMaleLocal($searchPa,$year_list,$quarter)
    {
        $this->db->select('COUNT(visitorlog_forloc) as totalmalelocalssss,
            visitorlog_month,visitorlog_day,visitorlog_year,visitorlog_sex');
        $this->db->join('tbldatemonth','tblipafvisitorslog.visitorlog_month = tbldatemonth.id_month','Left');
        $this->db->where('visitorlog_sex',1);
        $this->db->where('visitorlog_forloc',2);
        $this->db->where('tblipafvisitorslog.generatedcode',$searchPa);
        $this->db->where('visitorlog_year',$year_list);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblipafvisitorslog.visitorlog_month');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }

    public function fetchSearchVisitorLogbook_totalLocal($searchPa,$year_list,$quarter)
    {
        $this->db->select('COUNT(visitorlog_sex) as totalloclss,
            visitorlog_month,visitorlog_day,visitorlog_year,visitorlog_sex');
        $this->db->join('tbldatemonth','tblipafvisitorslog.visitorlog_month = tbldatemonth.id_month','Left');
        $this->db->where('visitorlog_forloc',2);
        $this->db->where('tblipafvisitorslog.generatedcode',$searchPa);
        $this->db->where('visitorlog_year',$year_list);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblipafvisitorslog.visitorlog_month');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }

    public function fetchSearchVisitorLogbook_GTOTAL($searchPa,$year_list,$quarter)
    {
        $this->db->select('COUNT(*) as gggttt,
            visitorlog_month,visitorlog_day,visitorlog_year,visitorlog_sex');
        $this->db->join('tbldatemonth','tblipafvisitorslog.visitorlog_month = tbldatemonth.id_month','Left');
        // $this->db->where('visitorlog_sex',2);
        $this->db->where('tblipafvisitorslog.generatedcode',$searchPa);
        $this->db->where('visitorlog_year',$year_list);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblipafvisitorslog.visitorlog_month');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }

    public function fetchSearchVisitorLogbook_GTOTALMALE($searchPa,$year_list,$quarter)
    {
        $this->db->select('COUNT(*) as gtmale,
            visitorlog_month,visitorlog_day,visitorlog_year,visitorlog_sex');
        $this->db->join('tbldatemonth','tblipafvisitorslog.visitorlog_month = tbldatemonth.id_month','Left');
        $this->db->where('visitorlog_sex',1);
        $this->db->where('tblipafvisitorslog.generatedcode',$searchPa);
        $this->db->where('visitorlog_year',$year_list);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblipafvisitorslog.visitorlog_month');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }

    public function fetchSearchVisitorLogbook_GTOTALFEMALE($searchPa,$year_list,$quarter)
    {
        $this->db->select('COUNT(*) as gtfemale,
            visitorlog_month,visitorlog_day,visitorlog_year,visitorlog_sex');
        $this->db->join('tbldatemonth','tblipafvisitorslog.visitorlog_month = tbldatemonth.id_month','Left');
        $this->db->where('visitorlog_sex',2);
        $this->db->where('tblipafvisitorslog.generatedcode',$searchPa);
        $this->db->where('visitorlog_year',$year_list);
        $this->db->where('QtrCode',$quarter);
        $this->db->group_by('tblipafvisitorslog.visitorlog_month');
        $query = $this->db->get('tblipafvisitorslog');
        return $query->result();
    }

    public function insertPhysicalReport($data,$rel_data1){
        if (!empty($rel_data1)) {
            for($x11 = 0; $x11 < count($rel_data1); $x11++){
            $datas[] = array(
              "generatedcode" => $rel_data1[$x11]["generatedcode"],
              "physical_code" => $rel_data1[$x11]["physical_code"],
              "perfomance_measure" => $rel_data1[$x11]['perfomance_measure']);
            }
        }


        try{
        
        if (!empty($rel_data1)) {
          for($x =0; $x<count($rel_data1); $x++){
            $this->db->insert('tblipaf_physical_performace_measure',$datas[$x]);
          }
        }
        
        $this->db->insert('tblipaf_physical',$data);

            return "success";
        }catch(Exception $e){
            return "failed";
        }
    }

    public function insertphysandfinancialtargetaccom($data){
        $this->db->insert('tblipaf_physical_target',$data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    public function insertphysfinancialreps($data){
        $this->db->insert('tblipaf_physical_pap',$data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }


    public function insertprevAnnualIncome($data){
        $this->db->insert('tblpaipafincomeprevyear',$data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    public function insertactualincome($data,$rel_data1,$rel_data2,$rel_data3,$rel_data4)
    {
      if (!empty($rel_data1)) {
        for($x11 = 0; $x11 < count($rel_data1); $x11++){
        $datas[] = array(
          "generatedcode" => $rel_data1[$x11]["generatedcode"],
          "income_donate_month" => $rel_data1[$x11]["income_donate_month"],
          "income_donate_quarter" => $rel_data1[$x11]['income_donate_quarter'],
          "income_donate_year" => $rel_data1[$x11]['income_donate_year'],
          "income_donation" => $rel_data1[$x11]['income_donation'],
          "donation_amount" => str_replace(',','',$rel_data1[$x11]['donation_amount']),
          "income_donation_bookval" => $rel_data1[$x11]['income_donation_bookval'],
          "income_donation_desc" => $rel_data1[$x11]['income_donation_desc'],
          "income_donate_day" => $rel_data1[$x11]['income_donate_day'],
          "income_gencode" => $rel_data1[$x11]['income_gencode'],
          "income_donation_source" => $rel_data1[$x11]['income_donation_source']);
        }
      }

      if (!empty($rel_data2)) {
        for($x2 = 0; $x2 < count($rel_data2); $x2++){
        $datasother[] = array(
          "generatedcode" => $rel_data2[$x2]["generatedcode"],
          "income_other_month" => $rel_data2[$x2]["income_other_month"],
          "income_other_quarter" => $rel_data2[$x2]['income_other_quarter'],
          "income_other_year" => $rel_data2[$x2]['income_other_year'],
          "income_others_amount" => str_replace(',','',$rel_data2[$x2]['income_others_amount']),
          "income_others_desc" => $rel_data2[$x2]['income_others_desc'],
          "income_other_day" => $rel_data2[$x2]['income_other_day'],
          "income_gencode" => $rel_data2[$x2]['income_gencode']);
        }
      }

      if (!empty($rel_data3)) {
        for($x3 = 0; $x3 < count($rel_data3); $x3++){
        $datasother2[] = array(
          "generatedcode" => $rel_data3[$x3]["generatedcode"],
          "otherincome_other_month" => $rel_data3[$x3]["otherincome_other_month"],
          "otherincome_other_quarter" => $rel_data3[$x3]['otherincome_other_quarter'],
          "otherincome_other_year" => $rel_data3[$x3]['otherincome_other_year'],
          "otherincome_other_amount" => str_replace(',','',$rel_data3[$x3]['otherincome_other_amount']),
          "otherincome_other_desc" => $rel_data3[$x3]['otherincome_other_desc'],
          "otherincome_other_day" => $rel_data3[$x3]['otherincome_other_day'],
          "income_gencode" => $rel_data3[$x3]['income_gencode']);
        }
      }

       if (!empty($rel_data4)) {
        for($x4 = 0; $x4 < count($rel_data4); $x4++){
        $datafinesa[] = array(
          "generatedcode" => $rel_data4[$x4]["generatedcode"],
          "income_gencode" => $rel_data4[$x4]['income_gencode'],
          "income_pfd_month" => $rel_data4[$x4]["income_pfd_month"],
          "income_pfd_quarter" => $rel_data4[$x4]['income_pfd_quarter'],
          "income_pfd_day" => $rel_data4[$x4]['income_pfd_day'],
          "income_pfd" => $rel_data4[$x4]['income_pfd'],
          "income_pfd_year" => $rel_data4[$x4]['income_pfd_year'],
          "income_pfd_amount" => str_replace(',','',$rel_data4[$x4]['income_pfd_amount']),
          "income_pfd_source" => $rel_data4[$x4]['income_pfd_source'],
          "income_pfd_others" => $rel_data4[$x4]['income_pfd_others']);
        }
      }

      try{
        if (!empty($rel_data1)) {
          for($x =0; $x<count($rel_data1); $x++){
            $this->db->insert('tblipafsourceincome_donation',$datas[$x]);
          }
        }
        if (!empty($rel_data2)) {
          for($y =0; $y<count($rel_data2); $y++){
            $this->db->insert('tblipafsourceincome_others',$datasother[$y]);
          }
        }

        if (!empty($rel_data3)) {
          for($z =0; $z<count($rel_data3); $z++){
            $this->db->insert('tblipafsourceincomeother_others',$datasother2[$z]);
          }
        }

        if (!empty($rel_data4)) {
          for($z1 =0; $z1<count($rel_data4); $z1++){
            $this->db->insert('tblipafsourceincome_finespenaltydamage',$datafinesa[$z1]);
          }
        }

        $this->db->insert('tblipafsourceincome',$data);
        return "success";
      }catch(Exception $e){
        return "failed";
      }
    }

    public function insertipafdonations($data = [])
    {
        return $this->db->insert('tblipafsourceincome_donation',$data);
    }

    public function insertipaffinespenaltiesdmgs($data = [])
    {
        return $this->db->insert('tblipafsourceincome_finespenaltydamage',$data);
    }

    public function insertincomeotherfee($data = [])
    {
        return $this->db->insert('tblipafsourceincome_others',$data);
    }

    public function inserthydroprameterss($data = [])
    {
        return $this->db->insert('tblpahydrology_para_details',$data);
    }

    public function insertsourceotherfee($data = [])
    {
        return $this->db->insert('tblipafsourceincomeother_others',$data);
    }

    public function insertinitialcompHistory($data = [])
    {
        return $this->db->insert('tblpamainlegislation_history',$data);
    }

    public function insertrecognitionCriterias($data = [])
    {
        return $this->db->insert('tblrecognition_criteria_list',$data);
    }

    public function getallEditDonations($codegens,$month,$year,$day){
        $this->db->join('tblipafsourceincomedonation','tblipafsourceincome_donation.income_donation = tblipafsourceincomedonation.id_donation','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_donate_month',$month);
        $this->db->where('income_donate_year',$year);
        $this->db->where('income_donate_day',$day);
        $query = $this->db->get('tblipafsourceincome_donation');
        return $query->result();
    }

    public function getallincomeotherfee($codegens,$month,$year,$day){
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_other_month',$month);
        $this->db->where('income_other_year',$year);
        $this->db->where('income_other_day',$day);
        $query = $this->db->get('tblipafsourceincome_others');
        return $query->result();
    }

    public function getallsourceotherfee($codegens,$month,$year,$day){
        $this->db->where('generatedcode',$codegens);
        $this->db->where('otherincome_other_month',$month);
        $this->db->where('otherincome_other_year',$year);
        $this->db->where('otherincome_other_day',$day);
        $query = $this->db->get('tblipafsourceincomeother_others');
        return $query->result();
    }

    public function getallinitialcomphistory($codes){
      $this->db->join('tblnipsub','tblpamainlegislation_history.nipid_status = tblnipsub.id_subnip','LEFT');
      $this->db->join('tbllegislation','tblpamainlegislation_history.legal_basis_id = tbllegislation.id_legis','LEFT');
      $this->db->join('tbldatemonth','tblpamainlegislation_history.legal_basis_month = tbldatemonth.id_month','LEFT');
      $this->db->join('tblpacategory','tblpamainlegislation_history.nipid_category = tblpacategory.id_cat','LEFT');
      $this->db->where('legal_generatedcode',$codes);
      $query1 = $this->db->get('tblpamainlegislation_history');
      $result1 = $query1->result();
      return array_merge($result1);
    }

    public function getallsourceincomeReportGen($codegens,$year,$quarter)
    {
        $this->db->select('SUM(entrance_fee) as dsumEF,SUM(facility_fee) as dsumFF,SUM(recreational_fee) as dsumRF,SUM(resource_fee) as dsumRUF,SUM(sapa_fee) as dsumSAPA,SUM(moa_fee) as dsumMOA,SUM(rsa_fee) as dsumRSA,SUM(cla_fee) as dsumCLA,SUM(fines_fee) as dsumFINE,SUM(grant_fee) as dsumGRANT,SUM(endowment_fee) as dsumENDOW, income_date_month');
        $this->db->join('tbldatemonth','tblipafsourceincome.income_date_month = tbldatemonth.id_month','LEFT');
        $this->db->join('tbldateyear','tblipafsourceincome.income_date_year = tbldateyear.id_year','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_date_year',$year);
        $this->db->where('income_date_quarter',$quarter)
        ->order_by('tbldatemonth.id_month','ASC')
        ->order_by('LENGTH(tbldatemonth.id_month)','ASC')
        ->group_by('income_date_month');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getallsourceincomePrevious($codegens,$year,$quarter)
    {
        $this->db->select('SUM(prev_annualincome) as previncome');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('previncome_year',$year);
        // $this->db->where('income_date_quarter',$quarter)
        // ->order_by('tbldatemonth.id_month','ASC')
        // ->order_by('LENGTH(tbldatemonth.id_month)','ASC')
        // ->group_by('previncome_year');
        $query = $this->db->get('tblpaipafincomeprevyear');
        return $query->result();
    }

    public function getalldonationCash($codegens,$year,$quarter)
    {
        $this->db->select('group_concat("Amount : ",FORMAT(donation_amount,2) separator "<br> ") as cashdonate,income_donate_month, SUM(donation_amount) as sumperqrt');
        $this->db->join('tbldatemonth','tblipafsourceincome_donation.income_donate_month = tbldatemonth.id_month','LEFT');
        $this->db->join('tbldateyear','tblipafsourceincome_donation.income_donate_year = tbldateyear.id_year','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_donate_year',$year);
        $this->db->where('income_donate_quarter',$quarter);
        $this->db->where('income_donation',1)
        ->order_by('tbldatemonth.id_month','ASC')
        ->order_by('LENGTH(tbldatemonth.id_month)','ASC');
        $query = $this->db->get('tblipafsourceincome_donation');
        return $query->result();
    }

    public function getalldonationInkind($codegens,$year,$quarter)
    {
        $this->db->select('income_donate_month, group_concat(income_donation_desc,"<br>",FORMAT(income_donation_bookval,2) separator "<br> ") as inkinddonate,');
        $this->db->join('tbldatemonth','tblipafsourceincome_donation.income_donate_month = tbldatemonth.id_month','LEFT');
        $this->db->join('tbldateyear','tblipafsourceincome_donation.income_donate_year = tbldateyear.id_year','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_donate_year',$year);
        $this->db->where('income_donate_quarter',$quarter);
        $this->db->where('income_donation',2)
        ->order_by('tbldatemonth.id_month','ASC')
        ->order_by('LENGTH(tbldatemonth.id_month)','ASC');
        $query = $this->db->get('tblipafsourceincome_donation');
        return $query->result();
    }

    public function getSUMdonationCash($codegens,$year,$quarter)
    {
        $this->db->select('SUM(donation_amount) as SUMDonation');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_donate_year',$year);
        $this->db->where('income_donate_quarter',$quarter);
        $this->db->group_by('income_donate_quarter');
        $query = $this->db->get('tblipafsourceincome_donation');
        return $query->result();
    }

    public function getCommulativeSUMdonationCash($codegens,$year,$quarter)
    {
        $this->db->select('SUM(donation_amount) as CSUMDonation');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_donate_year <=',$year);
        $this->db->where('income_donate_quarter',$quarter);
        // $this->db->group_by('income_donate_quarter');
        $query = $this->db->get('tblipafsourceincome_donation');
        return $query->result();
    }

    public function getSUMdonationCashbyYear($codegens,$year,$quarter)
    {
        $this->db->select('SUM(donation_amount) as SUMDonations');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_donate_year',$year);
        $this->db->group_by('income_donate_year');
        $query = $this->db->get('tblipafsourceincome_donation');
        return $query->result();
    }

    public function getallsourceincomeOthersReportGen($codegens,$year,$quarter)
    {
        $this->db->select('group_concat(income_others_desc,": ",income_others_amount separator "<br> ") as trydisburse');
        $this->db->join('tbldatemonth','tblipafsourceincome_others.income_other_month = tbldatemonth.id_month','LEFT');
        $this->db->join('tbldateyear','tblipafsourceincome_others.income_other_year = tbldateyear.id_year','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_other_year',$year);
        $this->db->where('income_other_quarter',$quarter)
        ->order_by('tbldatemonth.id_month','ASC')
        ->order_by('LENGTH(tbldatemonth.id_month)','ASC');
        $query = $this->db->get('tblipafsourceincome_others');
        return $query->result();
    }

     public function getTotalfor1stmont($codegens,$year,$quarter)
    {
        $this->db->select('SUM(entrance_fee+facility_fee+recreational_fee+resource_fee+sapa_fee+moa_fee+rsa_fee+cla_fee) as sumpermonth,income_date_month');
        $this->db->join('tbldatemonth','tblipafsourceincome.income_date_month = tbldatemonth.id_month','LEFT');
        $this->db->join('tbldateyear','tblipafsourceincome.income_date_year = tbldateyear.id_year','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_date_year',$year);
        $this->db->where('income_date_quarter',$quarter);
        // $this->db->where('income_date_month',1);
        // $this->db->where('income_date_month',4);
        // $this->db->where('income_date_month',7);
        // $this->db->where('income_date_month',10);
        $this->db->group_by('income_date_month');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getSUMEntranceFee($codegens,$year,$quarter)
    {
        $this->db->select('SUM(entrance_fee) as EntranceSum');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_date_year',$year);
        // $this->db->where('income_date_quarter',$quarter);
        $this->db->group_by('income_date_year');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getCommulativetotalactualincome($codegens,$year,$quarter)
    {
        $this->db->select('SUM(entrance_fee+facility_fee+recreational_fee+resource_fee+sapa_fee+moa_fee+rsa_fee+cla_fee+fines_fee+grant_fee+endowment_fee) as CTotal');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_date_year <=',$year);
        // $this->db->where('income_date_quarter',$quarter);
        // $this->db->group_by('income_date_year');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getSUMFaciityUserFee($codegens,$year,$quarter)
    {
        $this->db->select('SUM(facility_fee) as FUFSum');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_date_year',$year);
        // $this->db->where('income_date_quarter',$quarter);
        $this->db->group_by('income_date_year');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getCommulativeSUMFaciityUserFee($codegens,$year,$quarter)
    {
        $this->db->select('SUM(facility_fee) as FUFSum');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_date_year <=',$year);
        // $this->db->where('income_date_quarter',$quarter);
        $this->db->group_by('income_date_year');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getSUMRecreationalFee($codegens,$year,$quarter)
    {
        $this->db->select('SUM(recreational_fee) as RFsum');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_date_year',$year);
        // $this->db->where('income_date_quarter',$quarter);
        $this->db->group_by('income_date_year');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getSUMResourceUserFee($codegens,$year,$quarter)
    {
        $this->db->select('SUM(resource_fee) as RUFsum');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_date_year',$year);
        // $this->db->where('income_date_quarter',$quarter);
        $this->db->group_by('income_date_year');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getSUMSAPAFee($codegens,$year,$quarter)
    {
        $this->db->select('SUM(sapa_fee) as SAPAsum');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_date_year',$year);
        // $this->db->where('income_date_quarter',$quarter);
        $this->db->group_by('income_date_year');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getSUMMOAFee($codegens,$year,$quarter)
    {
        $this->db->select('SUM(moa_fee) as MOAsum');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_date_year',$year);
        // $this->db->where('income_date_quarter',$quarter);
        $this->db->group_by('income_date_year');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getSUMRSAFee($codegens,$year,$quarter)
    {
        $this->db->select('SUM(rsa_fee) as RSAsum');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_date_year',$year);
        // $this->db->where('income_date_quarter',$quarter);
        $this->db->group_by('income_date_year');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getSUMCLAFee($codegens,$year,$quarter)
    {
        $this->db->select('SUM(cla_fee) as CLAsum');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_date_year',$year);
        // $this->db->where('income_date_quarter',$quarter);
        $this->db->group_by('income_date_year');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getincomeotherFees($codegens,$year,$quarter)
    {
        $this->db->select('SUM(income_others_amount) as OTHsum,income_other_month');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_other_year',$year);
        $this->db->where('income_other_quarter',$quarter);
        $this->db->group_by('income_other_year','generatedcode');
        $query = $this->db->get('tblipafsourceincome_others');
        return $query->result();
    }

    public function getSUMOtherFee($codegens,$year,$quarter)
    {
        $this->db->select('SUM(income_others_amount) as OTHsum,income_other_month');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_other_year',$year);
        $this->db->group_by('income_other_year','generatedcode');
        $query = $this->db->get('tblipafsourceincome_others');
        return $query->result();
    }

    public function getCommulativeSUMOtherFee($codegens,$year,$quarter)
    {
        $this->db->select('SUM(income_others_amount) as COTHsum,income_other_month');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_other_year <=',$year);
        // $this->db->group_by('income_other_year','generatedcode');
        $query = $this->db->get('tblipafsourceincome_others');
        return $query->result();
    }

    public function getSUMOtherFeebyMonth($codegens,$year,$quarter)
    {
        $this->db->select('SUM(income_others_amount) as OTHsum,income_other_month');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_other_quarter',$quarter);
        $this->db->where('income_other_year',$year);
        $this->db->group_by('income_other_month','generatedcode');
        $query = $this->db->get('tblipafsourceincome_others');
        return $query->result();
    }

    public function getMonths($quarter)
    {
        $this->db->where('QtrCode',$quarter);        
        $this->db->order_by('tbldatemonth.id_month','ASC')
        ->order_by('LENGTH(tbldatemonth.id_month)','ASC');
        $query = $this->db->get('tbldatemonth');
        return $query->result();
    }

    public function getMonthsbyYr()
    {
        // $this->db->where('QtrCode',$quarter);        
        $this->db->order_by('tbldatemonth.id_month','ASC')
        ->order_by('LENGTH(tbldatemonth.id_month)','ASC')
        ->group_by('QtrCode');
        $query = $this->db->get('tbldatemonth');
        return $query->result();
    }

    public function getSUMFines($codegens,$year,$quarter)
    {
        $this->db->select('SUM(fines_fee) as FineSum');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_date_year',$year);
        // $this->db->where('income_date_quarter',$quarter);
        $this->db->group_by('income_date_year');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getSUMGrant($codegens,$year,$quarter)
    {
        $this->db->select('SUM(grant_fee) as Grantsum');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_date_year',$year);
        // $this->db->where('income_date_quarter',$quarter);
        $this->db->group_by('income_date_year');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getSUMEndowment($codegens,$year,$quarter)
    {
        $this->db->select('SUM(endowment_fee) as Endowmentsum');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_date_year',$year);
        // $this->db->where('income_date_quarter',$quarter);
        $this->db->group_by('income_date_year');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getincomeothersourceFees($codegens,$year,$quarter)
    {
        $this->db->select('SUM(otherincome_other_amount) as OTHsourcesum,otherincome_other_month');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('otherincome_other_year',$year);
        $this->db->where('otherincome_other_quarter',$quarter);
        $this->db->group_by('otherincome_other_year','generatedcode');
        $query = $this->db->get('tblipafsourceincomeother_others');
        return $query->result();
    }

    public function getCommulativeincomeothersourceFees($codegens,$year,$quarter)
    {
        $this->db->select('SUM(otherincome_other_amount) as COTHsourcesum,otherincome_other_month');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('otherincome_other_year <=',$year);
        $this->db->where('otherincome_other_quarter',$quarter);
        // $this->db->group_by('otherincome_other_year','generatedcode');
        $query = $this->db->get('tblipafsourceincomeother_others');
        return $query->result();
    }

    public function getCommulativeincomeprevyear($codegens,$year,$quarter)
    {
        $this->db->select('SUM(prev_annualincome) as Csumprevinc');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('previncome_year <=',$year);
        // $this->db->group_by('otherincome_other_year','generatedcode');
        $query = $this->db->get('tblpaipafincomeprevyear');
        return $query->result();
    }

    public function getallsourceOthersReportGen($codegens,$year,$quarter)
    {
        $this->db->select('group_concat(otherincome_other_desc,": ",FORMAT(otherincome_other_amount,2) separator "<br> ") as othersources,otherincome_other_month');
        $this->db->join('tbldatemonth','tblipafsourceincomeother_others.otherincome_other_month = tbldatemonth.id_month','LEFT');
        $this->db->join('tbldateyear','tblipafsourceincomeother_others.otherincome_other_year = tbldateyear.id_year','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('otherincome_other_year',$year);
        $this->db->where('otherincome_other_quarter',$quarter)
        ->order_by('tbldatemonth.id_month','ASC')
        ->order_by('LENGTH(tbldatemonth.id_month)','ASC');
        $query = $this->db->get('tblipafsourceincomeother_others');
        return $query->result();
    }

    public function getSUMotherssource($codegens,$year,$quarter)
    {
        $this->db->select('SUM(otherincome_other_amount) as OthsSum');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('otherincome_other_year',$year);
        // $this->db->where('income_date_quarter',$quarter);
        $this->db->group_by('otherincome_other_year');
        $query = $this->db->get('tblipafsourceincomeother_others');
        return $query->result();
    }

    public function getSUMotherssourceQtr($codegens,$year,$quarter)
    {
        $this->db->select('SUM(otherincome_other_amount) as OthsSumQtr,otherincome_other_month');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('otherincome_other_year',$year);
        $this->db->where('otherincome_other_quarter',$quarter);
        $this->db->group_by('otherincome_other_year');
        $query = $this->db->get('tblipafsourceincomeother_others');
        return $query->result();
    }

    public function getSumOthersourcebyyear($codegens,$year,$quarter)
    {
        $this->db->select('SUM(otherincome_other_amount) as SUMoy');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('otherincome_other_year',$year);
        $this->db->group_by('otherincome_other_year');
        $query = $this->db->get('tblipafsourceincomeother_others');
        return $query->result();
    }

    public function getallsourceincomeReportGenbyYr($codegens,$year)
    {
        $this->db->select('SUM(entrance_fee) as sumEF,SUM(facility_fee) as FUFsum,SUM(recreational_fee) as sumRF,SUM(resource_fee) as sumRUF,SUM(sapa_fee) as sumSAPA,SUM(moa_fee) as sumMOA,SUM(rsa_fee) as sumRSA,SUM(cla_fee) as sumCLA,SUM(fines_fee) as sumFP,SUM(grant_fee) as sumGR,SUM(endowment_fee) as sumEND,QtrCode');
        $this->db->join('tbldatemonth','tblipafsourceincome.income_date_month = tbldatemonth.id_month','LEFT');
        $this->db->join('tbldateyear','tblipafsourceincome.income_date_year = tbldateyear.id_year','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_date_year',$year)
        ->order_by('tbldatemonth.id_month','ASC')
        ->order_by('LENGTH(tbldatemonth.id_month)','ASC')
        ->group_by('QtrCode');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getallsourceincomeReportGenbyYr2($codegens,$year)
    {
        $this->db->select('SUM(entrance_fee + facility_fee + recreational_fee + resource_fee + sapa_fee + moa_fee + rsa_fee + cla_fee + fines_fee + grant_fee + endowment_fee) as sumperqtr,QtrCode');
        $this->db->join('tbldatemonth','tblipafsourceincome.income_date_month = tbldatemonth.id_month','LEFT');
        $this->db->join('tbldateyear','tblipafsourceincome.income_date_year = tbldateyear.id_year','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_date_year',$year)
        ->order_by('tbldatemonth.id_month','ASC')
        ->order_by('LENGTH(tbldatemonth.id_month)','ASC')
        ->group_by('QtrCode');
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getSUMEntranceFeebyYr($codegens,$year)
    {
        $this->db->select('SUM(entrance_fee) as EFsum,SUM(facility_fee) as FUFsum,SUM(recreational_fee) as RFsum,SUM(resource_fee) as RUGsum,SUM(sapa_fee) as SAPAsum,SUM(moa_fee) as MOAsum,SUM(rsa_fee) as RSAsum,SUM(cla_fee) as CLAsum,SUM(fines_fee) as FPsum,SUM(grant_fee) as GRsum,SUM(endowment_fee) as ENDsum');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblipafsourceincome');
        return $query->result();
    }

    public function getincomeotherFeesbyYr($codegens,$year)
    {
        $this->db->select('SUM(income_others_amount) as OTHsum,QtrCode');
        $this->db->join('tbldatemonth','tblipafsourceincome_others.income_other_month = tbldatemonth.id_month','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_other_year',$year);
        $this->db->group_by('income_other_quarter');
        $query = $this->db->get('tblipafsourceincome_others');
        return $query->result();
    }

     public function getSUMOtherfeebyYr($codegens,$year)
    {
        $this->db->select('SUM(income_others_amount) as sumOTH');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblipafsourceincome_others');
        return $query->result();
    }

    public function getalldonationCashbyYr($codegens,$year)
    {
        $this->db->select('group_concat("Amount : ",FORMAT(donation_amount,2) separator "<br> ") as cashdonate,income_donate_month,income_donate_quarter, SUM(donation_amount) as sumperYr');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_donate_year',$year);
        $this->db->where('income_donation',1);
        $this->db->group_by('income_donate_quarter');
        $query = $this->db->get('tblipafsourceincome_donation');
        return $query->result();
    }

    public function getalldonationInkindbyYr($codegens,$year)
    {
        $this->db->select('income_donate_month, group_concat(income_donation_desc,"<br>",FORMAT(income_donation_bookval,2) separator "<br> ") as inkinddonate,income_donate_quarter');
        $this->db->join('tbldatemonth','tblipafsourceincome_donation.income_donate_month = tbldatemonth.id_month','LEFT');
        $this->db->join('tbldateyear','tblipafsourceincome_donation.income_donate_year = tbldateyear.id_year','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_donate_year',$year);
        $this->db->where('income_donation',2);
        $this->db->group_by('income_donate_quarter');
        $query = $this->db->get('tblipafsourceincome_donation');
        return $query->result();
    }

    public function getSUMdonationcashbyYr($codegens,$year)
    {
        $this->db->select('SUM(donation_amount) as CashSum');
        $this->db->where('income_donation',1);
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblipafsourceincome_donation');
        return $query->result();
    }

    public function getSUMdonationcashbyYr2($codegens,$year)
    {
        $this->db->select('SUM(donation_amount) as CashSum,income_donate_quarter');
        $this->db->where('income_donation',1);
        $this->db->where('generatedcode',$codegens);
        $this->db->where('income_donate_year',$year);
        $this->db->group_by('income_donate_quarter');
        $query = $this->db->get('tblipafsourceincome_donation');
        return $query->result();
    }


    public function getallsourceOthersbyYrs($codegens,$year)
    {
        $this->db->select('group_concat(otherincome_other_desc,": ",FORMAT(otherincome_other_amount,2) separator "<br> ") as othersources,otherincome_other_month,otherincome_other_quarter');
        $this->db->join('tbldatemonth','tblipafsourceincomeother_others.otherincome_other_month = tbldatemonth.id_month','LEFT');
        $this->db->join('tbldateyear','tblipafsourceincomeother_others.otherincome_other_year = tbldateyear.id_year','LEFT');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('otherincome_other_year',$year);
        $this->db->group_by('otherincome_other_quarter');
        $query = $this->db->get('tblipafsourceincomeother_others');
        return $query->result();
    }

    public function getSUMotherssourcebyYrs2($codegens,$year)
    {
        $this->db->select('SUM(otherincome_other_amount) as OthsSumQtr,otherincome_other_quarter');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('otherincome_other_year',$year);
        $this->db->group_by('otherincome_other_quarter');
        $query = $this->db->get('tblipafsourceincomeother_others');
        return $query->result();
    }

    public function getSUMOthersourceincbyYr($codegens,$year)
    {
        $this->db->select('SUM(otherincome_other_amount) as OSIsum');
        $this->db->where('generatedcode',$codegens);
        $query = $this->db->get('tblipafsourceincomeother_others');
        return $query->result();
    }

     public function getSUMprevincomebyYr($codegens,$year)
    {
        $this->db->select('SUM(prev_annualincome) as SumPrevIncome,previncome_year');
        $this->db->where('generatedcode',$codegens);
        $this->db->where('previncome_year <=',$year);
        // $this->db->group_by('previncome_year');
        $query = $this->db->get('tblpaipafincomeprevyear');
        return $query->result();
    }

    function getRows9($params = array()) {
        $this->db->select('*');
        $this->db->from('tblipafvisitorslog');

        if (array_key_exists("where", $params)) {
            foreach ($params['where'] as $key => $val) {
                $this->db->where($key, $val);
            }
        }

        if (array_key_exists("returnType", $params) && $params['returnType'] == 'count') {
            $result = $this->db->count_all_results();
        } else {
            if (array_key_exists("id", $params)) {
                $this->db->where('id', $params['id']);
                $query = $this->db->get();
                $result = $query->row_array();
            } else {
                $this->db->order_by('id', 'desc');
                if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
                    $this->db->limit($params['limit'], $params['start']);
                } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
                    $this->db->limit($params['limit']);
                }

                $query = $this->db->get();
                $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
            }
        }

        // Return fetched data
        return $result;
    }
    
    public function update9($data, $condition = array()) {
        if (!empty($data)) {
            // Add modified date if not included
            // 
//            if (!array_key_exists("updated", $data)) {
//                $data['updated'] = date("Y-m-d H:i:s");
//            }

            // Update member data
            $update = $this->db->update('tblipafvisitorslog', $data, $condition);

            // Return the status
            return $update ? true : false;
        }
        return false;
    }
    
    public function insert9($data = array()) {
        if (!empty($data)) {
            // Add created and modified date if not included
            
//            if (!array_key_exists("time", $data)) {
//                $data['time'] = date("Y-m-d H:i:s");
//            }
//            if (!array_key_exists("updated", $data)) {
//                $data['updated'] = date("Y-m-d H:i:s");
//            }

            // Insert member data
            $insert = $this->db->insert('tblipafvisitorslog', $data);

            // Return the status
            return $insert ? $this->db->insert_id() : false;
        }
        return false;
    }

}