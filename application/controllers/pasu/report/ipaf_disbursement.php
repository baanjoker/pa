<?php defined('BASEPATH') OR exit('No direct access script allowed!');

/**
 * 
 */
class ipaf_disbursement extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library([
			'PDFL',
			// 'PDFPAMAIN',
			]);
		$this->load->model([
			'setting_model',
			'login_model',
			'pasu/dashboard_model',
			'pasu/pamain_model'
		]);
		
		if ($this->session->userdata('isLogIn') == FALSE || $this->session->userdata('user_role') !=3)
		redirect('login');
    
        $context = stream_context_set_default( [
        'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                 ],
        ]);
        // $fd = fopen("https://pais.bmb.gov.ph/pas/pasu/report/cepa/printcepa
	}

	public function index()
	{
		$data['page_title'] = 'IPAF Disbursement Report';
        $user_id = $this->session->userdata('user_id');
        $data['yeardistribution'] = $this->pamain_model->yearlistedDisburse();
		$data['paList']			= $this->pamain_model->paList();
        $data['yearListed']		= $this->pamain_model->yearListed();
        $data['yearListedduration']     = $this->pamain_model->yearListedduration();

        $data['content'] = $this->load->view('pasu/report/ipaf_disbursement',$data,TRUE);
        $this->load->view('pasu/main_wrapper',$data);
	}

	public function fetchDisbursementReport(){
        $palist = $this->input->post('palist');
        $payear = $this->input->post('payear');
        $payearto = $this->input->post('payearto');

        // $data = $this->pamain_model->getAllDisburReportGeneration($palist,$payear,$payearto);
        // $dataAnnualIncome = $this->pamain_model->getTotalAnnualIncomeForDisbursementReportGeneration($palist,$payear,$payearto);      

        $data = $this->pamain_model->getAllDisburReportbyYr($palist,$payear,$payearto);
        $dataAnnualIncome = $this->pamain_model->getTotalSourceIncomeForDisbursementReport($palist,$payear,$payearto);
        $dataAnnualIncomeOthers = $this->pamain_model->getTotalotherincomesDisbursementReport($palist,$payear,$payearto);
        $dataAnnualIncomeOthers2 = $this->pamain_model->getTotalsourceotherincomesDisbursementReport($palist,$payear,$payearto);
        $datadonation = $this->pamain_model->getTotalDonationCashForDisbursementReport($palist,$payear,$payearto);
        // ----------------------------------------------------------------------------------------------//
        // $data = $this->pamain_model->getAllDisburReportsourceincome($codegens);
        // $dataAnnualIncome = $this->pamain_model->getTotalSourceIncomeForDisbursement($codegens);
        // $dataAnnualIncomeOthers = $this->pamain_model->getTotalotherincomesDisbursement($codegens);
        // $dataAnnualIncomeOthers2 = $this->pamain_model->getTotalsourceotherincomesDisbursement($codegens);
        // $datadonation = $this->pamain_model->getTotalDonationCashForDisbursement($codegens);


        $totalincome = 0.00;
        $otherincome1 = 0.00;
        $otherincome2 = 0.00;
        $donationCash = 0.00;
        $annaulincome = 0.00;
        foreach($data as $row): 
            $year = $row->year_disbursement;
            $codegens = $row->generatedcode;
            $runningbalance = $this->pamain_model->getrunningbalances($codegens,$year);
            $rbal = 0.00;
                foreach($runningbalance as $bal): 
                       $rbal =  $bal->balance_oldsubfund + $row->annual_income_old - $row->disbursement_oldsubfund;
                    endforeach;
            ?>
            <tr id="<?php echo $row->id_disburementsec ; ?>">
                <td><?php echo $row->year_disbursement; ?></td>
                <td style="text-align:right"><?php echo number_format($row->annual_income_old,2); ?></td>
                <td style="text-align:right"><?php echo number_format($row->annual_disbursements,2); ?></td>               
                <td style="text-align:right"><?php echo number_format($row->annual_balances,2); ?></td>
                <td style="text-align:right"><?php echo number_format($row->disbursement_old_income,2); ?></td>
                <td style="text-align:right"><?php echo number_format($row->disbursement_oldsubfund,2); ?></td>
                <td style="text-align:right"><?php echo number_format($row->balance_oldsubfund,2); ?></td>    
                <td style="text-align:right"><?php echo number_format($row->income_paria,2); ?></td>
                <td style="text-align:right"><?php echo number_format($row->disbursement_paria,2); ?></td>
                <td style="text-align:right"><?php echo number_format($row->balance_paria,2); ?></td>
                <td style="text-align:right"><?php echo number_format($row->income_sagf,2); ?></td>
                <td style="text-align:right"><?php echo number_format($row->disbursement_sagf,2); ?></td>
                <td style="text-align:right"><?php echo number_format($row->balance_sagf,2); ?></td>
            </tr>
        <?php endforeach; ?>
        <?php 
            $grandtotal = $this->pamain_model->getgrandtotaldisbusementannual($palist,$payear,$payearto);
            foreach($grandtotal as $gt):
        ?>
            <tr style="background-color: #ff8566; font-weight: 700; color: #fff;">
                <td>GRAND TOTAL</td>
                <td style="text-align:right"><?php echo number_format($gt->gtai,2); ?></td>
                <td style="text-align:right"><?php echo number_format($gt->gtad,2); ?></td>
                <td style="text-align:right"><?php echo number_format($gt->gtab,2); ?></td>
                <td style="text-align:right"><?php echo number_format($gt->gtos,2); ?></td>
                <td style="text-align:right"><?php echo number_format($gt->gtosd,2); ?></td>
                <td style="text-align:right"><?php echo number_format($gt->gtosb,2); ?></td>
                <td style="text-align:right"><?php echo number_format($gt->gtpi,2); ?></td>
                <td style="text-align:right"><?php echo number_format($gt->gtpd,2); ?></td>
                <td style="text-align:right"><?php echo number_format($gt->gtpb,2); ?></td>
                <td style="text-align:right"><?php echo number_format($gt->gtsi,2); ?></td>
                <td style="text-align:right"><?php echo number_format($gt->gtsd,2); ?></td>
                <td style="text-align:right"><?php echo number_format($gt->gtsb,2); ?></td>
            </tr>
               
        <?php
            endforeach;
        }

    public function ipafdisbursementreport(){
		$searchpa = $this->input->post('disburse_pa');
		$disburse_year = $this->input->post('disburse_year');
		$disburse_year_to = $this->input->post('disburse_year_to');
        $displaypa = $this->pamain_model->resultpa($searchpa);
        $sum1 = $this->input->post('sumthiscolumn1');
        $sum2 = $this->input->post('sumthiscolumn2');
        $sum3 = $this->input->post('sumthiscolumn3');
        $sum4 = $this->input->post('sumthiscolumn4');
        $sum5 = $this->input->post('sumthiscolumn5');
        $sum6 = $this->input->post('sumthiscolumn6');
        $sum7 = $this->input->post('sumthiscolumn7');
        $sum8 = $this->input->post('sumthiscolumn8');
        $sum9 = $this->input->post('sumthiscolumn9');
        $sum10 = $this->input->post('sumthiscolumn10');

        $data = $this->pamain_model->getAllDisburPDFReport($searchpa,$disburse_year,$disburse_year_to);
        $dataAnnualIncome = $this->pamain_model->getTotalAnnualIncomeForDisbursementPDFReport($searchpa,$disburse_year,$disburse_year_to); 
        $dataGT = $this->pamain_model->getAllGrandTotalDisburPDFReport($searchpa,$disburse_year,$disburse_year_to);

		$pdf = new PDFL();
        $pdf->AddPage();
        $pdf->AliasNbPages();
        $pdf->SetFont('Times','',10);
		$table = new easyTable($pdf, '{130, 180, 180, 180, 180, 180, 180,180,180,180,180,180,180}','align:C{LCRR};border:1; border-color:#a1a1a1; ');
        $table->rowStyle('border:TB;border-color:#fff;');
        $table->printRow();
			$pdf->SetFillColor(255, 255, 255);
				$pdf->SetDrawColor(255,255,255);
        	foreach ($displaypa as $datas) {				
				$pdf->Multicell(336,5,"Statement of Receipts and Disbursements \nIntegrated Protected Area Fund \nNational Integrated Protected Areas System \n".$datas->name."\nYear ".$disburse_year." to ".$disburse_year_to,1,'L',true);
			}
		$table->printRow();

		$table->rowStyle('align:{CCCCCCCCCCCCCCCCCC}; bgcolor:#fcf8e3;font-color:#000');
 		$table->easyCell("Year", 'rowspan:2;paddingY:3;');
 		$table->easyCell("Total Income", 'colspan:3;paddingY:3;');
 		$table->easyCell("Old IPAF Sub-Fund\n(75% Prior to PA-RIA)", 'colspan:3;paddingY:3;');
 		$table->easyCell("Protected Area-Retained Income Account\n(75% Current Bank Deposits)", 'colspan:3;paddingY:3;');
 		$table->easyCell("IPAF-Special Account in the General Fund\n(25% Central Fund)", 'colspan:3;paddingY:3;');
 		$table->printRow();

 		$table->rowStyle('align:{CCCCCCCCCCCCCC};valign:M;bgcolor:#fcf8e3; font-color:#000; font-family:times;');
        $table->easyCell('Receipt','paddingY:3;');
        $table->easyCell('Disbursement','paddingY:3;');
        $table->easyCell('Balance','paddingY:3;');
		$table->easyCell('Receipt','paddingY:3;');
		$table->easyCell('Disbursement','paddingY:3;');
		$table->easyCell('Balance','paddingY:3;');
		$table->easyCell('Receipt','paddingY:3;');
		$table->easyCell('Disbursement','paddingY:3;');
		$table->easyCell('Balance','paddingY:3;');
		$table->easyCell('Receipt','paddingY:3;');
		$table->easyCell('Disbursement','paddingY:3;');
		$table->easyCell('Balance','paddingY:3;');
 		$table->printRow();
        $totalincome = 0.00;
        foreach($data as $row):
            $table->rowStyle('align:{CRRRRRRRRRRRR};valign:M;border:LRB;paddingY:2;font-color:#000;');
            $table->easyCell($row->year_disbursement); 
            $table->easyCell(number_format($row->annual_income_old,2)); 
            $table->easyCell(number_format($row->annual_disbursements,2)); 
            $table->easyCell(number_format($row->annual_balances,2)); 
            $table->easyCell(number_format($row->disbursement_old_income,2)); 
            $table->easyCell(number_format($row->disbursement_oldsubfund,2)); 
            $table->easyCell(number_format($row->balance_oldsubfund,2)); 
            $table->easyCell(number_format($row->income_paria,2)); 
            $table->easyCell(number_format($row->disbursement_paria,2)); 
            $table->easyCell(number_format($row->balance_paria,2)); 
            $table->easyCell(number_format($row->income_sagf,2)); 
            $table->easyCell(number_format($row->disbursement_sagf,2)); 
            $table->easyCell(number_format($row->balance_sagf,2)); 
            $table->printRow();
        endforeach;
        foreach($dataGT as $rowgt):
            $table->rowStyle('align:{CRRRRRRRRRRRR};valign:M;border:LRB;paddingY:2;font-color:#fff;font-style:;bgcolor:#ff8566;font-style:B');
            $table->easyCell('GRAND TOTAL');    
            $table->easyCell(number_format($rowgt->gtai,2)); 
            $table->easyCell(number_format($rowgt->gtad,2)); 
            $table->easyCell(number_format($rowgt->gtab,2)); 
            $table->easyCell(number_format($rowgt->gtosi,2)); 
            $table->easyCell(number_format($rowgt->gtosd,2)); 
            $table->easyCell(number_format($rowgt->gtosb,2));
            $table->easyCell(number_format($rowgt->gtpi,2)); 
            $table->easyCell(number_format($rowgt->gtpd,2)); 
            $table->easyCell(number_format($rowgt->gtpb,2));
            $table->easyCell(number_format($rowgt->gtsfi,2)); 
            $table->easyCell(number_format($rowgt->gtsfd,2)); 
            $table->easyCell(number_format($rowgt->gtsfb,2)); 
            $table->printRow();
        endforeach;
        // foreach ($data as $row): 
        //     $table->rowStyle('align:{CRRRRRRRRRR};valign:M;border:LRB;paddingY:2;font-color:#000;');
        //     $table->easyCell($row->year_disbursement); 
        //     foreach ($dataAnnualIncome as $rowAI):
        //         if ($row->year_disbursement == $rowAI->visitorlogs_year): 
        //               $table->easyCell(number_format($rowAI->efamount+$rowAI->ffamount+$rowAI->rfamount+$rowAI->cfamount+$rowAI->dfamount+$rowAI->ofamount,2));
        //         endif;
        //     endforeach;
        //     foreach ($dataAnnualIncome as $rowAI):
        //        if ($row->year_disbursement == $rowAI->visitorlogs_year): 
        //            $table->easyCell(($rowAI->visitorlogs_year>=2015?'0.00':number_format(($rowAI->efamount+$rowAI->ffamount+$rowAI->rfamount+$rowAI->cfamount+$rowAI->dfamount+$rowAI->ofamount)*.75,2)));
        //         endif;
        //     endforeach;
        //     $table->easyCell(number_format($row->disbursement_oldsubfund,2));
        //     foreach ($dataAnnualIncome as $rowAI):
        //         if ($row->year_disbursement == $rowAI->visitorlogs_year): 
        //             $table->easyCell(($row->balance_oldsubfund=="0.00"?($row->year_disbursement<=2015?number_format(($rowAI->efamount+$rowAI->ffamount+$rowAI->rfamount+$rowAI->cfamount+$rowAI->dfamount+$rowAI->ofamount)*.75 - $row->disbursement_oldsubfund,2):"0.00"):number_format($row->balance_oldsubfund,2))); 
        //         endif;
        //     endforeach;
        //     foreach ($dataAnnualIncome as $rowAI):
        //         if ($row->year_disbursement == $rowAI->visitorlogs_year): 
        //             $table->easyCell(($rowAI->visitorlogs_year<=2016?'0.00':number_format(($rowAI->efamount+$rowAI->ffamount+$rowAI->rfamount+$rowAI->cfamount+$rowAI->dfamount+$rowAI->ofamount)*.75,2)));
        //         endif;
        //     endforeach;
        //     foreach ($dataAnnualIncome as $rowAI):
        //         if ($row->year_disbursement == $rowAI->visitorlogs_year): 
        //             $table->easyCell(number_format($row->disbursement_paria,2));
        //         endif;
        //     endforeach;
        //     foreach ($dataAnnualIncome as $rowAI):
        //         if ($row->year_disbursement == $rowAI->visitorlogs_year): 
        //             $table->easyCell(($rowAI->visitorlogs_year>=2016?($row->balance_paria=="0.00"?number_format(($rowAI->efamount+$rowAI->ffamount+$rowAI->rfamount+$rowAI->cfamount+$rowAI->dfamount+$rowAI->ofamount)*.75 - $row->disbursement_paria,2):number_format($row->balance_paria,2)):'0.00'));
        //         endif;
        //     endforeach;
        //     foreach ($dataAnnualIncome as $rowAI):
        //         if ($row->year_disbursement == $rowAI->visitorlogs_year): 
        //             $table->easyCell(number_format(($rowAI->efamount+$rowAI->ffamount+$rowAI->rfamount+$rowAI->cfamount+$rowAI->dfamount+$rowAI->ofamount)*.25,2));
        //         endif;
        //     endforeach;
        //     foreach ($dataAnnualIncome as $rowAI):
        //         if ($row->year_disbursement == $rowAI->visitorlogs_year): 
        //             $table->easyCell(number_format($row->disbursement_sagf,2));
        //         endif;
        //     endforeach;
        //     foreach ($dataAnnualIncome as $rowAI):
        //         if ($row->year_disbursement == $rowAI->visitorlogs_year): 
        //             $table->easyCell(number_format(($rowAI->efamount+$rowAI->ffamount+$rowAI->rfamount+$rowAI->cfamount+$rowAI->dfamount+$rowAI->ofamount)*.25 - $row->disbursement_sagf,2));
        //         endif;
        //     endforeach;
        //     $table->printRow();
        // endforeach;
        // 		$table->rowStyle('align:{CRRRRRRRRRR};valign:M;border:LRB;paddingY:2;font-color:#000;font-style:;bgcolor:#79a6d2');
        // 		$table->easyCell('GRAND TOTAL');	
        //         $table->easyCell($sum1);        
        //         $table->easyCell($sum2);        
        //         $table->easyCell($sum3);        
        //         $table->easyCell($sum4);        
        //         $table->easyCell($sum5);        
        //         $table->easyCell($sum6);        
        //         $table->easyCell($sum7);        
        //         $table->easyCell($sum8);        
        //         $table->easyCell($sum9);        
        // 		$table->easyCell($sum10);
        // 		$table->printRow();
	$pdf->Output(); 
		
	}
}