<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class C_test extends CI_Controller {
  
    function __construct()
    {
        parent::__construct();
        $this->load->library("Pdf");
        if ($this->session->userdata('isLogIn') == false 
            || $this->session->userdata('user_role') != 1 
        ) 
        redirect('login'); 
    }

    function resultsearch(){

            $output     =   '';
            $field      =   $this->input->post('c_field1');
            $compared   =   $this->input->post('comparison1');
            $valued     =   $this->input->post('c_value1');

            $this->db->join('tbllocregion', 'tblcaves.regionCode = tbllocregion.id','left');
            $this->db->join('tbllocprovince', 'tblcaves.provinceCode = tbllocprovince.id_p','left');
            $this->db->join('tbllocmunicipality', 'tblcaves.municipalCode = tbllocmunicipality.id_m','left');
            $this->db->join('tbllocbarangay', 'tblcaves.barangayCode = tbllocbarangay.id_b','left');
            $this->db->where('tbllocregion.regionName', $valued);
            $this->db->order_by('tblcaves.regionCode','ASC');
            $this->db->order_by('tblcaves.provinceCode','ASC');
            $this->db->order_by('tblcaves.municipalCode','ASC');
            $this->db->order_by('tblcaves.cave_name','ASC');
            
            $query = $this->db->get('tblcaves');
            
            foreach ($query->result_array() as $row)
            {
            $output .= '<tr>
                                <td style="width:20%; border: 1px solid black;border-collapse: collapse">'.$row['cave_name'].'</td>
                                <td style="width:20%; border: 1px solid black;border-collapse: collapse">'.$row['regionName'].'</td>
                                <td style="width:20%; border: 1px solid black;border-collapse: collapse">'.$row['provinceName'].'</td>
                                <td style="width:20%; border: 1px solid black;border-collapse: collapse">'.$row['municipalName'].'</td>
                                <td style="width:20%; border: 1px solid black;border-collapse: collapse">'.$row['barangayName'].'</td>
            </tr>';
        }

       return $output;
    }
  
    public function create_pdf() {
        
    //============================================================+
    // File name   : example_001.php
    //
    // Description : Example 001 for TCPDF class
    //               Default Header and Footer
    //
    // Author: Muhammad Saqlain Arif
    //
    // (c) Copyright:
    //               Muhammad Saqlain Arif
    //               PHP Latest Tutorials
    //               http://www.phplatesttutorials.com/
    //               saqlain.sial@gmail.com
    //============================================================+

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('BMB Management');
    $pdf->SetTitle('DENR-Biodiversity Management Bureau');
    $pdf->SetSubject('DENR-BMB Information System');
    $pdf->SetKeywords('DENR, BMB, DENR-BMB, Biodiversity, Management, Bureau'); 

    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
    $pdf->setFooterData(array(0,64,0), array(0,64,128)); 
  
    // set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
  
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED); 
  
    // set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);    
  
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM); 
  
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);  
  
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
        require_once(dirname(__FILE__).'/lang/eng.php');
        $pdf->setLanguageArray($l);
    } 

    $pdf->AddPage();
    // $pdf->SetFont('times','',16);
    // $pdf->Cell(40,'','List of Registered Caves in the Philippines');
    $content ='';
    $content .='
        <h1>List of Registered Caves in the Philippines</h1>
        <table style="border: 1px solid black;border-collapse: collapse">
            <thead>
                <tr style="background-color:#808080">
                    <th style="border: 1px solid black;border-collapse: collapse">CAVES NAME</th>
                    <th style="border: 1px solid black;border-collapse: collapse">REGION</th>
                    <th style="border: 1px solid black;border-collapse: collapse">PROVINCE</th> 
                    <th style="border: 1px solid black;border-collapse: collapse">MUNICIPALITY</th>
                    <th style="border: 1px solid black;border-collapse: collapse">BARANGAY</th>     
                </tr>
            </thead>    
    ';
    $content .= $this->resultsearch();
    $content .= '</table>';
    $pdf->writeHTML($content);
    $pdf->Output();
    //============================================================+
    // END OF FILE
    //============================================================+
    }
}
  
/* End of file c_test.php */
/* Location: ./application/controllers/c_test.php */