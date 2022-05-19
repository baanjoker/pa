<?php defined('BASEPATH') OR exit ('No direct access script allowed!');
/**
 * 
 */
class Pamain_save_Model extends CI_Model
{
    var $conf;
    function __construct(){
        parent::__construct();           
    }
    public function createMain($data = [],$rel_data1,$rel_data2,$rel_data3,$rel_data3flora,$rel_data4,$rel_data5,$rel_data6_1,$rel_data7_1,$rel_data9,$rel_data10,$rel_data11,$rel_data12,$rel_data13_1,$rel_data14_1,$rel_data15,$rel_data16,$rel_data17,$rel_data18,$rel_data19,$rel_data20,$rel_data21,$rel_data22,$rel_data23,$rel_data24,$rel_data25,$rel_data26,$rel_data27,$rel_data28,$rel_data29,$rel_data30,$rel_data31,$rel_data32,$rel_data33,$rel_data34,$rel_data35,$rel_data36,$rel_data37,$rel_data38,$rel_data39,$rel_data40,$rel_data41,$rel_data42,$rel_data43,$rel_data44,$rel_data45,$rel_data46,$rel_data47,$rel_data48,$rel_data49,$rel_data50,$rel_data51,$rel_data52,$rel_data53,$rel_data54,$rel_data55,$rel_data56,$rel_data57,$rel_data58,$rel_data59,$rel_data60,$rel_data61,$rel_data62,$rel_data63,$rel_data64,$rel_data65,$rel_data66,$rel_data67,$rel_data68,$rel_data69,$rel_data70,$rel_data71,$rel_data72,$rel_data73,$rel_data74,$rel_data75,$rel_data76,$rel_data77,$rel_data78,$rel_data79,$rel_data80,$rel_data81,$rel_data82,$rel_data83,$rel_data84,$rel_data85,$rel_data86,$rel_data87,$rel_data88,$rel_data89,$rel_data90,$rel_data91,$rel_data92,$rel_data93,$rel_data94,$rel_data95,$rel_data96,$rel_data97,$rel_data98,$rel_data99,$rel_data100,$rel_data101,$rel_data102,$rel_data103,$rel_data104,$rel_data105,$rel_data106,$rel_data107,$rel_data108)
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
                );
            }
        }

        if (!empty($rel_data3)) {
            for($flora = 0; $flora < count($rel_data3); $flora++){
                $dataBio[] = array(
                    "id_genus_get"  => $rel_data3[$flora]['id_genus_get'],
                    "generatedcode" => $rel_data3[$flora]['codegen'],                
                );
            }    
        }

        if (!empty($rel_data3flora)) {
            for($flora = 0; $flora < count($rel_data3flora); $flora++){
                $dataBioflora[] = array(
                    "id_genus_get"  => $rel_data3flora[$flora]['id_genus_get'],
                    "generatedcode" => $rel_data3flora[$flora]['codegen'],                
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
                );
            }
        }

        if (!empty($rel_data9)) {
            for($x9 = 0; $x9 < count($rel_data9); $x9++){
                $dataMultiple[] = array(          
                    "generatedcode"         => $rel_data9[$x9]['codegen'], 
                    "description"             => $rel_data9[$x9]['description'],
                    "area"             => $rel_data9[$x9]['area'] 

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
                    "generatedcode"         => $rel_data11[$x11]['codegen'], 
                    "threat_desc"             => $rel_data11[$x11]['threat_desc'],
                    "img_threat"             => $rel_data11[$x11]['img_threat'],            
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
                    "link"        => $rel_data12[$x12]['link']

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
                    "start_implementation_month"        => $rel_data16[$proj]['start_implementation_month'],
                    "start_implementation_year"        => $rel_data16[$proj]['start_implementation_year'],
                    "end_implementation_month"        => $rel_data16[$proj]['end_implementation_month'],
                    "end_implementation_year"        => $rel_data16[$proj]['end_implementation_year'],
                    "source_fund"        => $rel_data16[$proj]['source_fund'],
                    "program_cost"        => $rel_data16[$proj]['program_cost'],
                    "program_area"        => $rel_data16[$proj]['program_area'],
                    "program_location"        => $rel_data16[$proj]['program_location'],
                    "program_remarks"        => $rel_data16[$proj]['program_remarks'],
                    "program_proponent"        => $rel_data16[$proj]['program_proponent'],   
                );
            }
        }

        if (!empty($rel_data17)) {        
            for($researchX = 0; $researchX < count($rel_data17); $researchX++){
                $datasearch[] = array(          
                    "generatedcode"         => $rel_data17[$researchX]['codegen'], 
                    "search_type"        => $rel_data17[$researchX]['search_type'],
                    "search_title"        => $rel_data17[$researchX]['search_title'],
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
                );
            }
        }

        if (!empty($rel_data19)) {
            for($topo1 = 0; $topo1 < count($rel_data19); $topo1++){
                $datatopo[] = array(          
                    "generatedcode"         => $rel_data19[$topo1]['codegen'], 
                    "topo_desc"        => $rel_data19[$topo1]['topo_desc'],
                    "topo_map"        => $rel_data19[$topo1]['topo_map'],
                );
            }
        }

        if (!empty($rel_data20)) {
            for($soil = 0; $soil < count($rel_data20); $soil++){
                $datasoil[] = array(          
                    "generatedcode"         => $rel_data20[$soil]['codegen'], 
                    "soil_type"        => $rel_data20[$soil]['soil_type'],
                    "geology_map"        => $rel_data20[$soil]['geology_map'],
                );
            }
        }

        if (!empty($rel_data21)) {
            for($climate = 0; $climate < count($rel_data21); $climate++){
                $dataclimate[] = array(          
                    "generatedcode"         => $rel_data21[$climate]['codegen'], 
                    "climate_desc"        => $rel_data21[$climate]['climate_desc'],
                    "climate_img"        => $rel_data21[$climate]['climate_img'],
                );
            }
        }

        if (!empty($rel_data22)) {        
            for($landlside = 0; $landlside < count($rel_data22); $landlside++){
                $datalandslide[] = array(          
                    "generatedcode"         => $rel_data22[$landlside]['codegen'], 
                    "landslide_desc"        => $rel_data22[$landlside]['landslide_desc'],
                    "landslide_img"        => $rel_data22[$landlside]['landslide_img'],
                );
            }
        }
       
        if (!empty($rel_data23)) {        
            for($flooding = 0; $flooding < count($rel_data23); $flooding++){
                $dataflooding[] = array(          
                    "generatedcode"         => $rel_data23[$flooding]['codegen'], 
                    "flooding_desc"        => $rel_data23[$flooding]['flooding_desc'],
                    "flooding_img"        => $rel_data23[$flooding]['flooding_img'],
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
        
        if (!empty($rel_data32)) {        
            for($contribution = 0; $contribution < count($rel_data32); $contribution++){
                $datacontri[] = array(          
                    "generatedcode"         => $rel_data32[$contribution]['codegen'], 
                    "date_month_coontri"        => $rel_data32[$contribution]['date_month'],
                    "date_year_coontri"        => $rel_data32[$contribution]['date_year'],                
                    "trust_fund"        => $rel_data32[$contribution]['trust_fund'],                
                    "payment"        => $rel_data32[$contribution]['payment'],                
                    "amount"        => $rel_data32[$contribution]['amount'],                
                    "remarks"        => $rel_data32[$contribution]['remarks'],                
                    "devt_fee"   => $rel_data32[$contribution]['devt_fee'], 
                    "devt_remarks"    => $rel_data32[$contribution]['devt_remarks'], 
                    "penalty_fee"    => $rel_data32[$contribution]['penalty_fee'], 
                    "penalty_remarks" => $rel_data32[$contribution]['penalty_remarks'], 
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
                    "inscribed"        => $rel_data33[$recognition]['inscribed']
                );
            }
        }

        if (!empty($rel_data34)) {        
            for($rock = 0; $rock < count($rel_data34); $rock++){
                $datarock[] = array(          
                    "generatedcode"         => $rel_data34[$rock]['codegen'], 
                    "rock_desc"        => $rel_data34[$rock]['rock_desc'],
                    "rock_img"        => $rel_data34[$rock]['rock_img'],
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
                    "ff_map_img"        => $rel_data36[$ff]['ff_map_img'],
                    "ff_pic_img"        => $rel_data36[$ff]['ff_pic_img'],
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
                    "caves_long"        => $rel_data39[$x]['caves_long'],
                    "caves_lat"         => $rel_data39[$x]['caves_lat'],
                    "land_status"        => $rel_data39[$x]['land_status'],
                    "undisturbed_cave"        => $rel_data39[$x]['undisturbed_cave'],
                    "intact_difficult_access"        => $rel_data39[$x]['intact_difficult_access'],
                    "intact_within_pa"        => $rel_data39[$x]['intact_within_pa'],
                    "intact_private"        => $rel_data39[$x]['intact_private'],
                    "vandalized"        => $rel_data39[$x]['vandalized'],
                    "exploited"        => $rel_data39[$x]['exploited'],
                    "claimant"        => $rel_data39[$x]['claimant'],
                    "other_status"        => $rel_data39[$x]['other_status'],
                    "vandalized_text"        => $rel_data39[$x]['vandalized_text'],
                    "exploited_text"        => $rel_data39[$x]['exploited_text'],
                    "claimant_text"        => $rel_data39[$x]['claimant_text'],
                    "other_status_text"        => $rel_data39[$x]['other_status_text'],
                    "cave_img_map"        => $rel_data39[$x]['cave_img_map'],
                    "cave_img"        => $rel_data39[$x]['cave_img'],
                    "assessment_form"        => $rel_data39[$x]['assessment_form'],                   
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

                );
            }
        }

        if (!empty($rel_data42)) {        
            for($demo = 0; $demo < count($rel_data42); $demo++){
                $datan[] = array(          
                    "generatedcode" => $rel_data42[$demo]['codegen'], 
                    "income_region" => $rel_data42[$demo]['income_region'],
                    "income_province" => $rel_data42[$demo]['income_province'],
                    "income_municipal" => $rel_data42[$demo]['income_municipal'],
                    "income_barangay" => $rel_data42[$demo]['income_barangay'],
                    "ecotourism_name_head" => $rel_data42[$demo]['ecotourism_name_head'],
                    "ecotourism_revenue" => $rel_data42[$demo]['ecotourism_revenue'],
                    "ecotourism_source_location" => $rel_data42[$demo]['ecotourism_source_location'],
                    "ecotourism_total_revenue" => $rel_data42[$demo]['ecotourism_total_revenue'],
                    "ecotourism_total_cost" => $rel_data42[$demo]['ecotourism_total_cost'],
                    "ecotourism_net_revenue" => $rel_data42[$demo]['ecotourism_net_revenue'],
                    "saltwater_species_caught" => $rel_data42[$demo]['saltwater_species_caught'],
                    "saltwater_location" => $rel_data42[$demo]['saltwater_location'],
                    "saltwater_avarange_fishing" => $rel_data42[$demo]['saltwater_avarange_fishing'],
                    "saltwater_revenue" => $rel_data42[$demo]['saltwater_revenue'],
                    "saltwater_cost" => $rel_data42[$demo]['saltwater_cost'],
                    "saltwater_net_revenue" => $rel_data42[$demo]['saltwater_net_revenue'],
                    "freshwater_species_caught" => $rel_data42[$demo]['freshwater_species_caught'],
                    "freshwater_location" => $rel_data42[$demo]['freshwater_location'],
                    "freshwater_avarange_fishing" => $rel_data42[$demo]['freshwater_avarange_fishing'],
                    "freshwater_revenue" => $rel_data42[$demo]['freshwater_revenue'],
                    "freshwater_cost" => $rel_data42[$demo]['freshwater_cost'],
                    "freshwater_net_revenue" => $rel_data42[$demo]['freshwater_net_revenue'],
                    "ptm_species" => $rel_data42[$demo]['ptm_species'],
                    "ptm_source_location" => $rel_data42[$demo]['ptm_source_location'],
                    "ptm_revenue" => $rel_data42[$demo]['ptm_revenue'],
                    "ptm_cost" => $rel_data42[$demo]['ptm_cost'],
                    "ptm_net_revenue" => $rel_data42[$demo]['ptm_net_revenue'],
                    "agriculture_crops" => $rel_data42[$demo]['agriculture_crops'],
                    "agriculture_source_location" => $rel_data42[$demo]['agriculture_source_location'],
                    "agriculture_cultivated_area" => $rel_data42[$demo]['agriculture_cultivated_area'],
                    "agriculture_revenue" => $rel_data42[$demo]['agriculture_revenue'],
                    "agriculture_cost" => $rel_data42[$demo]['agriculture_cost'],
                    "agriculture_net_revenue" => $rel_data42[$demo]['agriculture_net_revenue'],
                    "livestock_species" => $rel_data42[$demo]['livestock_species'],
                    "livestock_source_location" => $rel_data42[$demo]['livestock_source_location'],
                    "livestock_grazing_area" => $rel_data42[$demo]['livestock_grazing_area'],
                    "livestock_revenue" => $rel_data42[$demo]['livestock_revenue'],
                    "livestock_cost" => $rel_data42[$demo]['livestock_cost'],
                    "livestock_net_revenue" => $rel_data42[$demo]['livestock_net_revenue'],
                    "nontimber_species" => $rel_data42[$demo]['nontimber_species'],
                    "nontimber_source_location" => $rel_data42[$demo]['nontimber_source_location'],
                    "nontimber_revenue" => $rel_data42[$demo]['nontimber_revenue'],
                    "nontimber_cost" => $rel_data42[$demo]['nontimber_cost'],
                    "nontimber_net_revenue" => $rel_data42[$demo]['nontimber_net_revenue'],
                    "timber_species" => $rel_data42[$demo]['timber_species'],
                    "timber_source_location" => $rel_data42[$demo]['timber_source_location'],
                    "timber_volume" => $rel_data42[$demo]['timber_volume'],
                    "timber_revenue" => $rel_data42[$demo]['timber_revenue'],
                    "timber_cost" => $rel_data42[$demo]['timber_cost'],
                    "timber_net_revenue" => $rel_data42[$demo]['timber_net_revenue'],
                    "wildlife_species" => $rel_data42[$demo]['wildlife_species'],
                    "wildlife_source_location" => $rel_data42[$demo]['wildlife_source_location'],
                    "wildlife_revenue" => $rel_data42[$demo]['wildlife_revenue'],
                    "wildlife_cost" => $rel_data42[$demo]['wildlife_cost'],
                    "wildlife_net_revenue" => $rel_data42[$demo]['wildlife_net_revenue'],
                    "mining_revenue_source" => $rel_data42[$demo]['mining_revenue_source'],
                    "mining_source_location" => $rel_data42[$demo]['mining_source_location'],
                    "mining_revenue" => $rel_data42[$demo]['mining_revenue'],
                    "mining_cost" => $rel_data42[$demo]['mining_cost'],
                    "mining_net_revenue" => $rel_data42[$demo]['mining_net_revenue'],
                    "industry_revenue" => $rel_data42[$demo]['industry_revenue'],
                    "industry_cost" => $rel_data42[$demo]['industry_cost'],
                    "industry_net_revenue" => $rel_data42[$demo]['industry_net_revenue'],
                    "services_revenue" => $rel_data42[$demo]['services_revenue'],
                    "services_cost" => $rel_data42[$demo]['services_cost'],
                    "services_net_revenue" => $rel_data42[$demo]['services_net_revenue'],
                    "other_revenue_revenue" => $rel_data42[$demo]['other_revenue_revenue'],
                    "other_revenue_cost" => $rel_data42[$demo]['other_revenue_cost'],
                    "other_revenue_net_revenue" => $rel_data42[$demo]['other_revenue_net_revenue'],

                );
            }
        }

        if (!empty($rel_data43)) {
            for($hydro = 0; $hydro < count($rel_data43); $hydro++){
                $datahydro[] = array(          
                    "generatedcode"         => $rel_data43[$hydro]['codegen'], 
                    "hydro_desc"        => $rel_data43[$hydro]['hydro_desc'],
                    "hydro_img"        => $rel_data43[$hydro]['hydro_img'],
                );
            }
        }

        if (!empty($rel_data44)) {
            for($x = 0; $x < count($rel_data44); $x++){
                $dataland[] = array(          
                    "generatedcode"         => $rel_data44[$x]['codegen'], 
                    "landuse_desc"        => $rel_data44[$x]['landuse_desc'],
                    "landuse_img"        => $rel_data44[$x]['landuse_img'],
                );
            }
        }

        if (!empty($rel_data45)) {
            for($x = 0; $x < count($rel_data45); $x++){
                $datavegetative[] = array(          
                    "generatedcode"         => $rel_data45[$x]['codegen'], 
                    "vegetative_desc"        => $rel_data45[$x]['vegetative_desc'],
                    "vegetative_img"        => $rel_data45[$x]['vegetative_img'],
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
                    "iw_mgntplan_prep"        => $rel_data47[$x]['iw_mgntplan_prep'],
                    "iw_mgntplan"        => $rel_data47[$x]['iw_mgntplan'],
                    "iw_mgntplan_ecopy"        => $rel_data47[$x]['iw_mgntplan_ecopy'],
                    "iw_mgntplan_implementation"        => $rel_data47[$x]['iw_mgntplan_implementation'],
                    "mgntplan_pdf"        => $rel_data47[$x]['mgntplan_pdf'],
                    "iw_description"        => $rel_data47[$x]['iw_description'],
                );
            }
        }

        if (!empty($rel_data48)) {
            for($x = 0; $x < count($rel_data48); $x++){
                $dataseamsfs[] = array(          
                    "generatedcode"         => $rel_data48[$x]['codegen'], 
                    "id_demographic_fish"        => $rel_data48[$x]['id_demographic_fish'],
                    "fishing_type"        => $rel_data48[$x]['fishing_type'],
                    "species"        => $rel_data48[$x]['species'],
                    "unit_measure"        => $rel_data48[$x]['unit_measure'],
                    "volume_sold_year"        => $rel_data48[$x]['volume_sold_year'],
                    "volume_consume_year"        => $rel_data48[$x]['volume_consume_year'],
                    "price_unit"        => $rel_data48[$x]['price_unit'],
                    "fishsalt_value"        => $rel_data48[$x]['fishsalt_value'],
                    "type_gear"        => $rel_data48[$x]['type_gear'],
                    "no_fishing_year"        => $rel_data48[$x]['no_fishing_year'],
                    "no_season_year"        => $rel_data48[$x]['no_season_year'],
                    "season_of_fishing"        => $rel_data48[$x]['season_of_fishing'],
                    "location_fishing"        => $rel_data48[$x]['location_fishing'],
                    "no_member_activity"        => $rel_data48[$x]['no_member_activity'],
                    "marketing_agent"        => $rel_data48[$x]['marketing_agent'],
                    "marketing_location"        => $rel_data48[$x]['marketing_location'],
                    "type_payment"        => $rel_data48[$x]['type_payment'],
                    "fishing_salt_remarks"        => $rel_data48[$x]['fishing_salt_remarks'],
                );
            }
        }

        if (!empty($rel_data49)) {
            for($x = 0; $x < count($rel_data49); $x++){
                $dataseamsffs[] = array(          
                    "generatedcode"         => $rel_data49[$x]['codegen'], 
                    "id_demographic_fish_fresh"        => $rel_data49[$x]['id_demographic_fish_fresh'],
                    "fishing_type_fresh"        => $rel_data49[$x]['fishing_type_fresh'],
                    "species_fresh"        => $rel_data49[$x]['species_fresh'],
                    "unit_measure_fresh"        => $rel_data49[$x]['unit_measure_fresh'],
                    "volume_sold_year_fresh"        => $rel_data49[$x]['volume_sold_year_fresh'],
                    "volume_consume_year_fresh"        => $rel_data49[$x]['volume_consume_year_fresh'],
                    "price_unit_fresh"        => $rel_data49[$x]['price_unit_fresh'],
                    "fishsalt_value_fresh"        => $rel_data49[$x]['fishsalt_value_fresh'],
                    "type_gear_fresh"        => $rel_data49[$x]['type_gear_fresh'],
                    "no_fishing_year_fresh"        => $rel_data49[$x]['no_fishing_year_fresh'],
                    "no_season_year_fresh"        => $rel_data49[$x]['no_season_year_fresh'],
                    "season_of_fishing_fresh"        => $rel_data49[$x]['season_of_fishing_fresh'],
                    "location_fishing_fresh"        => $rel_data49[$x]['location_fishing_fresh'],
                    "no_member_activity_fresh"        => $rel_data49[$x]['no_member_activity_fresh'],
                    "marketing_agent_fresh"        => $rel_data49[$x]['marketing_agent_fresh'],
                    "marketing_location_fresh"        => $rel_data49[$x]['marketing_location_fresh'],
                    "type_payment_fresh"        => $rel_data49[$x]['type_payment_fresh'],
                    "fishing_fresh_remarks"        => $rel_data49[$x]['fishing_fresh_remarks'],
                );
            }
        }

        if (!empty($rel_data50)) {
            for($x = 0; $x < count($rel_data50); $x++){
                $dataseamstpm[] = array(          
                    "generatedcode"         => $rel_data50[$x]['codegen'], 
                    "id_demographic_tpm"        => $rel_data50[$x]['id_demographic_tpm'],
                    "type_trading"        => $rel_data50[$x]['type_trading'],
                    "species_tpm"        => $rel_data50[$x]['species_tpm'],
                    "unit_measurement"        => $rel_data50[$x]['unit_measurement'],
                    "volume_sold_year_tpm"        => $rel_data50[$x]['volume_sold_year_tpm'],
                    "volume_consumed_year_tpm"        => $rel_data50[$x]['volume_consumed_year_tpm'],
                    "price_unit_tpm"        => $rel_data50[$x]['price_unit_tpm'],
                    "value_tpm"        => $rel_data50[$x]['value_tpm'],
                    "season_trading_tpm"        => $rel_data50[$x]['season_trading_tpm'],
                    "location_activity_tpm"        => $rel_data50[$x]['location_activity_tpm'],
                    "no_member_activity_tpm"        => $rel_data50[$x]['no_member_activity_tpm'],
                    "marketing_agent_tpm"        => $rel_data50[$x]['marketing_agent_tpm'],
                    "marketing_location_tpm"        => $rel_data50[$x]['marketing_location_tpm'],
                    "type_payment_tpm"        => $rel_data50[$x]['type_payment_tpm'],
                    "remarks_tpm"        => $rel_data50[$x]['remarks_tpm'],
                );
            }
        }

        if (!empty($rel_data51)) {
            for($x = 0; $x < count($rel_data51); $x++){
                $dataseamsagri[] = array(          
                    "generatedcode"         => $rel_data51[$x]['codegen'], 
                    "id_demographic_agricultural"        => $rel_data51[$x]['id_demographic_agricultural'],
                    "agricultural_type"        => $rel_data51[$x]['agricultural_type'],
                    "species_agricultural"        => $rel_data51[$x]['species_agricultural'],
                    "area_agricultural"        => $rel_data51[$x]['area_agricultural'],
                    "unit_measure_agricultural"        => $rel_data51[$x]['unit_measure_agricultural'],
                    "volume_sold_year_agricultural"        => $rel_data51[$x]['volume_sold_year_agricultural'],
                    "volume_consume_year_agricultural"        => $rel_data51[$x]['volume_consume_year_agricultural'],
                    "price_unit_agricultural"        => $rel_data51[$x]['price_unit_agricultural'],
                    "agricultural_value"        => $rel_data51[$x]['agricultural_value'],
                    "described_agricultural"        => $rel_data51[$x]['described_agricultural'],
                    "location_agricultural"        => $rel_data51[$x]['location_agricultural'],
                    "season_of_agricultural"        => $rel_data51[$x]['season_of_agricultural'],
                    "no_production_year_agricultural"        => $rel_data51[$x]['no_production_year_agricultural'],
                    "no_member_activity_agricultural"        => $rel_data51[$x]['no_member_activity_agricultural'],
                    "marketing_agent_agricultural"        => $rel_data51[$x]['marketing_agent_agricultural'],
                    "marketing_location_agricultural"        => $rel_data51[$x]['marketing_location_agricultural'],
                    "type_payment_agricultural"        => $rel_data51[$x]['type_payment_agricultural'],
                    "agricultural_remarks"        => $rel_data51[$x]['agricultural_remarks'],

                );
            }
        }
        
        if (!empty($rel_data52)) {
                for($x = 0; $x < count($rel_data52); $x++){
                $dataseamsls[] = array(          
                    "generatedcode"         => $rel_data52[$x]['codegen'], 
                    "id_demographic_livestock"        => $rel_data52[$x]['id_demographic_livestock'],
                    "type_livestock"        => $rel_data52[$x]['type_livestock'],
                    "grazing_area"        => $rel_data52[$x]['grazing_area'],
                    "unit_measure_livestock"        => $rel_data52[$x]['unit_measure_livestock'],
                    "volume_sold_year_livestock"        => $rel_data52[$x]['volume_sold_year_livestock'],
                    "volume_consumed_year_livestock"        => $rel_data52[$x]['volume_consumed_year_livestock'],
                    "price_unit_livestock"        => $rel_data52[$x]['price_unit_livestock'],
                    "value_livestock"        => $rel_data52[$x]['value_livestock'],
                    "location_livestock"        => $rel_data52[$x]['location_livestock'],
                    "specific_activities_livestock"        => $rel_data52[$x]['specific_activities_livestock'],
                    "season_livestock"        => $rel_data52[$x]['season_livestock'],
                    "no_household_livestock"        => $rel_data52[$x]['no_household_livestock'],
                    "marketing_agent_livestock"        => $rel_data52[$x]['marketing_agent_livestock'],
                    "marketing_location_livestock"        => $rel_data52[$x]['marketing_location_livestock'],
                    "type_payment_livestock"        => $rel_data52[$x]['type_payment_livestock'],
                    "remarks_livestock"        => $rel_data52[$x]['remarks_livestock'],
                );
            }
        }

        if (!empty($rel_data53)) {
                for($x = 0; $x < count($rel_data53); $x++){
                $dataseamsnontimber[] = array(    
                    "generatedcode"         => $rel_data53[$x]['codegen'],                       
                    "id_demographic_nontimber"         => $rel_data53[$x]['id_demographic_nontimber'], 
                    "type_nontimber"        => $rel_data53[$x]['type_nontimber'],
                    "species_nontimber"        => $rel_data53[$x]['species_nontimber'],
                    "area_nontimber"        => $rel_data53[$x]['area_nontimber'],
                    "unit_measure_nontimber"        => $rel_data53[$x]['unit_measure_nontimber'],
                    "volume_sold_year_nontimber"        => $rel_data53[$x]['volume_sold_year_nontimber'],
                    "volume_consumed_year_nontimber"        => $rel_data53[$x]['volume_consumed_year_nontimber'],
                    "unit_price_nontimber"        => $rel_data53[$x]['unit_price_nontimber'],
                    "value_nontimber"        => $rel_data53[$x]['value_nontimber'],
                    "location_nontimber"        => $rel_data53[$x]['location_nontimber'],
                    "nontimber_activity"        => $rel_data53[$x]['nontimber_activity'],
                    "season_nontimber"        => $rel_data53[$x]['season_nontimber'],
                    "no_member_activity_nontimber"        => $rel_data53[$x]['no_member_activity_nontimber'],
                    "marketing_agent_nontimber"        => $rel_data53[$x]['marketing_agent_nontimber'],
                    "marketing_location_nontimber"        => $rel_data53[$x]['marketing_location_nontimber'],
                    "type_payment_nontimber"        => $rel_data53[$x]['type_payment_nontimber'],
                    "remarks_nontimber"        => $rel_data53[$x]['remarks_nontimber'],
                );
            }
        }

        if (!empty($rel_data54)) {
                for($x = 0; $x < count($rel_data54); $x++){
                $dataseamstimber[] = array(    
                    "generatedcode"         => $rel_data54[$x]['codegen'],                       
                    "id_demographic_timber"         => $rel_data54[$x]['id_demographic_timber'], 
                    "type_timber"        => $rel_data54[$x]['type_timber'],
                    "species_timber"        => $rel_data54[$x]['species_timber'],
                    "area_timber"        => $rel_data54[$x]['area_timber'],
                    "unit_measure_timber"        => $rel_data54[$x]['unit_measure_timber'],
                    "volume_sold_year_timber"        => $rel_data54[$x]['volume_sold_year_timber'],
                    "volume_consumed_year_timber"        => $rel_data54[$x]['volume_consumed_year_timber'],
                    "unit_price_timber"        => $rel_data54[$x]['unit_price_timber'],
                    "value_timber"        => $rel_data54[$x]['value_timber'],
                    "location_timber"        => $rel_data54[$x]['location_timber'],
                    "timber_activity"        => $rel_data54[$x]['timber_activity'],
                    "season_timber"        => $rel_data54[$x]['season_timber'],
                    "no_member_activity_timber"        => $rel_data54[$x]['no_member_activity_timber'],
                    "marketing_agent_timber"        => $rel_data54[$x]['marketing_agent_timber'],
                    "marketing_location_timber"        => $rel_data54[$x]['marketing_location_timber'],
                    "type_payment_timber"        => $rel_data54[$x]['type_payment_timber'],
                    "remarks_timber"        => $rel_data54[$x]['remarks_timber'],
                );
            }
        }

        if (!empty($rel_data55)) {
                for($x = 0; $x < count($rel_data55); $x++){
                $dataseamsrwc[] = array(    
                    "generatedcode"         => $rel_data55[$x]['codegen'],                       
                    "id_demographic_rwc"         => $rel_data55[$x]['id_demographic_rwc'], 
                    "type_rwc"        => $rel_data55[$x]['type_rwc'],
                    "species_rwc"        => $rel_data55[$x]['species_rwc'],
                    "area_rwc"        => $rel_data55[$x]['area_rwc'],
                    "unit_measure_rwc"        => $rel_data55[$x]['unit_measure_rwc'],
                    "volume_sold_year_rwc"        => $rel_data55[$x]['volume_sold_year_rwc'],
                    "volume_consumed_year_rwc"        => $rel_data55[$x]['volume_consumed_year_rwc'],
                    "unit_price_rwc"        => $rel_data55[$x]['unit_price_rwc'],
                    "value_rwc"        => $rel_data55[$x]['value_rwc'],
                    "location_rwc"        => $rel_data55[$x]['location_rwc'],
                    "rwc_activity"        => $rel_data55[$x]['rwc_activity'],
                    "season_rwc"        => $rel_data55[$x]['season_rwc'],
                    "no_member_activity_rwc"        => $rel_data55[$x]['no_member_activity_rwc'],
                    "marketing_agent_rwc"        => $rel_data55[$x]['marketing_agent_rwc'],
                    "marketing_location_rwc"        => $rel_data55[$x]['marketing_location_rwc'],
                    "type_payment_rwc"        => $rel_data55[$x]['type_payment_rwc'],
                    "remarks_rwc"        => $rel_data55[$x]['remarks_rwc'],
                );
            }
        }

        if (!empty($rel_data56)) {
                for($x = 0; $x < count($rel_data56); $x++){
                $dataseamsmining[] = array(    
                    "generatedcode"         => $rel_data56[$x]['codegen'],                       
                    "id_demographic_mining"         => $rel_data56[$x]['id_demographic_mining'], 
                    "type_mining"        => $rel_data56[$x]['type_mining'],
                    "revenue_month_mining"        => $rel_data56[$x]['revenue_month_mining'],
                    "no_time_year_mining"        => $rel_data56[$x]['no_time_year_mining'],
                    "source_extraction_mining"        => $rel_data56[$x]['source_extraction_mining'],
                    "remarks_mining"        => $rel_data56[$x]['remarks_mining'],                    
                );
            }
        }

        if (!empty($rel_data57)) {
                for($x = 0; $x < count($rel_data57); $x++){
                $dataseamsindustry[] = array(    
                    "generatedcode"         => $rel_data57[$x]['codegen'],                       
                    "id_demographic_industry"         => $rel_data57[$x]['id_demographic_industry'], 
                    "type_industry"        => $rel_data57[$x]['type_industry'],
                    "revenue_month_industry"        => $rel_data57[$x]['revenue_month_industry'],
                    "no_times_year_industry"        => $rel_data57[$x]['no_times_year_industry'],
                    "remarks_industry"        => $rel_data57[$x]['remarks_industry'],                    
                );
            }
        }

        if (!empty($rel_data58)) {
                for($x = 0; $x < count($rel_data58); $x++){
                $dataseamsservice[] = array(    
                    "generatedcode"         => $rel_data58[$x]['codegen'],                       
                    "id_demographic_service"         => $rel_data58[$x]['id_demographic_service'], 
                    "type_service"        => $rel_data58[$x]['type_service'],
                    "revenue_month_service"        => $rel_data58[$x]['revenue_month_service'],
                    "no_times_year_service"        => $rel_data58[$x]['no_times_year_service'],
                    "remarks_service"        => $rel_data58[$x]['remarks_service'],                    
                );
            }
        }

        if (!empty($rel_data59)) {
                for($x = 0; $x < count($rel_data59); $x++){
                $dataseamssource[] = array(    
                    "generatedcode"         => $rel_data59[$x]['codegen'],                       
                    "id_demographic_source"         => $rel_data59[$x]['id_demographic_source'], 
                    "type_source"        => $rel_data59[$x]['type_source'],
                    "revenue_month_source"        => $rel_data59[$x]['revenue_month_source'],
                    "no_times_year_source"        => $rel_data59[$x]['no_times_year_source'],
                    "remarks_source"        => $rel_data59[$x]['remarks_source'],                    
                );
            }
        }

        if (!empty($rel_data60)) {
                for($x = 0; $x < count($rel_data60); $x++){
                $dataseamsEcoMaterial[] = array(    
                    "generatedcode"         => $rel_data60[$x]['codegen'],                       
                    "id_demographic_ecocostmaterial"         => $rel_data60[$x]['id_demographic_ecocostmaterial'], 
                    "item_ecocostmaterial"        => $rel_data60[$x]['item_ecocostmaterial'],
                    "annualcost_ecocostmaterial"        => $rel_data60[$x]['annualcost_ecocostmaterial'],
                    "unit_ecocostmaterial"        => $rel_data60[$x]['unit_ecocostmaterial'],
                    "avgpriceunit_ecocostmaterial"        => $rel_data60[$x]['avgpriceunit_ecocostmaterial'],  
                    "noincurredyear_ecocostmaterial"        => $rel_data60[$x]['noincurredyear_ecocostmaterial'], 
                    "costincurredstage_ecocostmaterial"        => $rel_data60[$x]['costincurredstage_ecocostmaterial'], 
                );
            }
        }

        if (!empty($rel_data61)) {
                for($x = 0; $x < count($rel_data61); $x++){
                $dataseamsEcoEquipment[] = array(    
                    "generatedcode"         => $rel_data61[$x]['codegen'],                       
                    "id_demographic_ecocostequipment"         => $rel_data61[$x]['id_demographic_ecocostequipment'], 
                    "item_ecocostequipment"        => $rel_data61[$x]['item_ecocostequipment'],
                    "annualcost_ecocostequipment"        => $rel_data61[$x]['annualcost_ecocostequipment'],
                    "unit_ecocostequipment"        => $rel_data61[$x]['unit_ecocostequipment'],
                    "avgpriceunit_ecocostequipment"        => $rel_data61[$x]['avgpriceunit_ecocostequipment'],  
                    "noincurredyear_ecocostequipment"        => $rel_data61[$x]['noincurredyear_ecocostequipment'], 
                    "costincurredstage_ecocostequipment"        => $rel_data61[$x]['costincurredstage_ecocostequipment'], 
                );
            }
        }

        if (!empty($rel_data62)) {
                for($x = 0; $x < count($rel_data62); $x++){
                $dataseamsEcoLabor[] = array(    
                    "generatedcode"         => $rel_data62[$x]['codegen'],                       
                    "id_demographic_ecocostlabor"         => $rel_data62[$x]['id_demographic_ecocostlabor'], 
                    "item_ecocostlabor"        => $rel_data62[$x]['item_ecocostlabor'],
                    "annualcost_ecocostlabor"        => $rel_data62[$x]['annualcost_ecocostlabor'],
                    "unit_ecocostlabor"        => $rel_data62[$x]['unit_ecocostlabor'],
                    "avgpriceunit_ecocostlabor"        => $rel_data62[$x]['avgpriceunit_ecocostlabor'],  
                    "noincurredyear_ecocostlabor"        => $rel_data62[$x]['noincurredyear_ecocostlabor'], 
                    "costincurredstage_ecocostlabor"        => $rel_data62[$x]['costincurredstage_ecocostlabor'], 
                );
            }
        }

        if (!empty($rel_data63)) {
                for($x = 0; $x < count($rel_data63); $x++){
                $dataseamsEcoOther[] = array(    
                    "generatedcode"         => $rel_data63[$x]['codegen'],                       
                    "id_demographic_ecocostother"         => $rel_data63[$x]['id_demographic_ecocostother'], 
                    "item_ecocostother"        => $rel_data63[$x]['item_ecocostother'],
                    "annualcost_ecocostother"        => $rel_data63[$x]['annualcost_ecocostother'],
                    "unit_ecocostother"        => $rel_data63[$x]['unit_ecocostother'],
                    "avgpriceunit_ecocostother"        => $rel_data63[$x]['avgpriceunit_ecocostother'],  
                    "noincurredyear_ecocostother"        => $rel_data63[$x]['noincurredyear_ecocostother'], 
                    "costincurredstage_ecocostother"        => $rel_data63[$x]['costincurredstage_ecocostother'], 
                );
            }
        }

        if (!empty($rel_data64)) {
                for($x = 0; $x < count($rel_data64); $x++){
                $dataseamsfsMaterial[] = array(    
                    "generatedcode"         => $rel_data64[$x]['codegen'],                       
                    "id_demographic_fishsaltcostmaterial"         => $rel_data64[$x]['id_demographic_fishsaltcostmaterial'], 
                    "item_fishsaltcostmaterial"        => $rel_data64[$x]['item_fishsaltcostmaterial'],
                    "annualcost_fishsaltcostmaterial"        => $rel_data64[$x]['annualcost_fishsaltcostmaterial'],
                    "unit_fishsaltcostmaterial"        => $rel_data64[$x]['unit_fishsaltcostmaterial'],
                    "avgpriceunit_fishsaltcostmaterial"        => $rel_data64[$x]['avgpriceunit_fishsaltcostmaterial'],  
                    "noincurredyear_fishsaltcostmaterial"        => $rel_data64[$x]['noincurredyear_fishsaltcostmaterial'], 
                    "costincurredstage_fishsaltcostmaterial"        => $rel_data64[$x]['costincurredstage_fishsaltcostmaterial'], 
                );
            }
        }

        if (!empty($rel_data65)) {
                for($x = 0; $x < count($rel_data65); $x++){
                $dataseamsfsEquip[] = array(    
                    "generatedcode"         => $rel_data65[$x]['codegen'],                       
                    "id_demographic_fishsaltcostequipment"         => $rel_data65[$x]['id_demographic_fishsaltcostequipment'], 
                    "item_fishsaltcostequipment"        => $rel_data65[$x]['item_fishsaltcostequipment'],
                    "annualcost_fishsaltcostequipment"        => $rel_data65[$x]['annualcost_fishsaltcostequipment'],
                    "unit_fishsaltcostequipment"        => $rel_data65[$x]['unit_fishsaltcostequipment'],
                    "avgpriceunit_fishsaltcostequipment"        => $rel_data65[$x]['avgpriceunit_fishsaltcostequipment'],  
                    "noincurredyear_fishsaltcostequipment"        => $rel_data65[$x]['noincurredyear_fishsaltcostequipment'], 
                    "costincurredstage_fishsaltcostequipment"        => $rel_data65[$x]['costincurredstage_fishsaltcostequipment'], 
                );
            }
        }

        if (!empty($rel_data66)) {
                for($x = 0; $x < count($rel_data66); $x++){
                $dataseamsfsLabor[] = array(    
                    "generatedcode"         => $rel_data66[$x]['codegen'],                       
                    "id_demographic_fishsaltcostlabor"         => $rel_data66[$x]['id_demographic_fishsaltcostlabor'], 
                    "item_fishsaltcostlabor"        => $rel_data66[$x]['item_fishsaltcostlabor'],
                    "annualcost_fishsaltcostlabor"        => $rel_data66[$x]['annualcost_fishsaltcostlabor'],
                    "unit_fishsaltcostlabor"        => $rel_data66[$x]['unit_fishsaltcostlabor'],
                    "avgpriceunit_fishsaltcostlabor"        => $rel_data66[$x]['avgpriceunit_fishsaltcostlabor'],  
                    "noincurredyear_fishsaltcostlabor"        => $rel_data66[$x]['noincurredyear_fishsaltcostlabor'], 
                    "costincurredstage_fishsaltcostlabor"        => $rel_data66[$x]['costincurredstage_fishsaltcostlabor'], 
                );
            }
        }

        if (!empty($rel_data67)) {
                for($x = 0; $x < count($rel_data67); $x++){
                $dataseamsfsOther[] = array(    
                    "generatedcode"         => $rel_data67[$x]['codegen'],                       
                    "id_demographic_fishsaltcostother"         => $rel_data67[$x]['id_demographic_fishsaltcostother'], 
                    "item_fishsaltcostother"        => $rel_data67[$x]['item_fishsaltcostother'],
                    "annualcost_fishsaltcostother"        => $rel_data67[$x]['annualcost_fishsaltcostother'],
                    "unit_fishsaltcostother"        => $rel_data67[$x]['unit_fishsaltcostother'],
                    "avgpriceunit_fishsaltcostother"        => $rel_data67[$x]['avgpriceunit_fishsaltcostother'],  
                    "noincurredyear_fishsaltcostother"        => $rel_data67[$x]['noincurredyear_fishsaltcostother'], 
                    "costincurredstage_fishsaltcostother"        => $rel_data67[$x]['costincurredstage_fishsaltcostother'], 
                );
            }
        }

        if (!empty($rel_data68)) {
                for($x = 0; $x < count($rel_data68); $x++){
                $dataseamsffMaterial[] = array(    
                    "generatedcode"         => $rel_data68[$x]['codegen'],                       
                    "id_demographic_fishfreshcostmaterial"         => $rel_data68[$x]['id_demographic_fishfreshcostmaterial'], 
                    "item_fishfreshcostmaterial"        => $rel_data68[$x]['item_fishfreshcostmaterial'],
                    "annualcost_fishfreshcostmaterial"        => $rel_data68[$x]['annualcost_fishfreshcostmaterial'],
                    "unit_fishfreshcostmaterial"        => $rel_data68[$x]['unit_fishfreshcostmaterial'],
                    "avgpriceunit_fishfreshcostmaterial"        => $rel_data68[$x]['avgpriceunit_fishfreshcostmaterial'],  
                    "noincurredyear_fishfreshcostmaterial"        => $rel_data68[$x]['noincurredyear_fishfreshcostmaterial'], 
                    "costincurredstage_fishfreshcostmaterial"        => $rel_data68[$x]['costincurredstage_fishfreshcostmaterial'], 
                );
            }
        }

        if (!empty($rel_data69)) {
                for($x = 0; $x < count($rel_data69); $x++){
                $dataseamsffEquip[] = array(    
                    "generatedcode"         => $rel_data69[$x]['codegen'],                       
                    "id_demographic_fishfreshcostequipment"         => $rel_data69[$x]['id_demographic_fishfreshcostequipment'], 
                    "item_fishfreshcostequipment"        => $rel_data69[$x]['item_fishfreshcostequipment'],
                    "annualcost_fishfreshcostequipment"        => $rel_data69[$x]['annualcost_fishfreshcostequipment'],
                    "unit_fishfreshcostequipment"        => $rel_data69[$x]['unit_fishfreshcostequipment'],
                    "avgpriceunit_fishfreshcostequipment"        => $rel_data69[$x]['avgpriceunit_fishfreshcostequipment'],  
                    "noincurredyear_fishfreshcostequipment"        => $rel_data69[$x]['noincurredyear_fishfreshcostequipment'], 
                    "costincurredstage_fishfreshcostequipment"        => $rel_data69[$x]['costincurredstage_fishfreshcostequipment'], 
                );
            }
        }

        if (!empty($rel_data70)) {
                for($x = 0; $x < count($rel_data70); $x++){
                $dataseamsffLabor[] = array(    
                    "generatedcode"         => $rel_data70[$x]['codegen'],                       
                    "id_demographic_fishfreshcostlabor"         => $rel_data70[$x]['id_demographic_fishfreshcostlabor'], 
                    "item_fishfreshcostlabor"        => $rel_data70[$x]['item_fishfreshcostlabor'],
                    "annualcost_fishfreshcostlabor"        => $rel_data70[$x]['annualcost_fishfreshcostlabor'],
                    "unit_fishfreshcostlabor"        => $rel_data70[$x]['unit_fishfreshcostlabor'],
                    "avgpriceunit_fishfreshcostlabor"        => $rel_data70[$x]['avgpriceunit_fishfreshcostlabor'],  
                    "noincurredyear_fishfreshcostlabor"        => $rel_data70[$x]['noincurredyear_fishfreshcostlabor'], 
                    "costincurredstage_fishfreshcostlabor"        => $rel_data70[$x]['costincurredstage_fishfreshcostlabor'], 
                );
            }
        }

        if (!empty($rel_data71)) {
                for($x = 0; $x < count($rel_data71); $x++){
                $dataseamsffOther[] = array(    
                    "generatedcode"         => $rel_data71[$x]['codegen'],                       
                    "id_demographic_fishfreshcostother"         => $rel_data71[$x]['id_demographic_fishfreshcostother'], 
                    "item_fishfreshcostother"        => $rel_data71[$x]['item_fishfreshcostother'],
                    "annualcost_fishfreshcostother"        => $rel_data71[$x]['annualcost_fishfreshcostother'],
                    "unit_fishfreshcostother"        => $rel_data71[$x]['unit_fishfreshcostother'],
                    "avgpriceunit_fishfreshcostother"        => $rel_data71[$x]['avgpriceunit_fishfreshcostother'],  
                    "noincurredyear_fishfreshcostother"        => $rel_data71[$x]['noincurredyear_fishfreshcostother'], 
                    "costincurredstage_fishfreshcostother"        => $rel_data71[$x]['costincurredstage_fishfreshcostother'], 
                );
            }
        }

        if (!empty($rel_data72)) {
                for($x = 0; $x < count($rel_data72); $x++){
                $dataseamstpmMaterial[] = array(    
                    "generatedcode"         => $rel_data72[$x]['codegen'],                       
                    "id_demographic_tpmcostmaterial"         => $rel_data72[$x]['id_demographic_tpmcostmaterial'], 
                    "item_tpmcostmaterial"        => $rel_data72[$x]['item_tpmcostmaterial'],
                    "annualcost_tpmcostmaterial"        => $rel_data72[$x]['annualcost_tpmcostmaterial'],
                    "unit_tpmcostmaterial"        => $rel_data72[$x]['unit_tpmcostmaterial'],
                    "avgpriceunit_tpmcostmaterial"        => $rel_data72[$x]['avgpriceunit_tpmcostmaterial'],  
                    "noincurredyear_tpmcostmaterial"        => $rel_data72[$x]['noincurredyear_tpmcostmaterial'], 
                    "costincurredstage_tpmcostmaterial"        => $rel_data72[$x]['costincurredstage_tpmcostmaterial'], 
                );
            }
        }

        if (!empty($rel_data73)) {
                for($x = 0; $x < count($rel_data73); $x++){
                $dataseamstpmEquip[] = array(    
                    "generatedcode"         => $rel_data73[$x]['codegen'],                       
                    "id_demographic_tpmcostequipment"         => $rel_data73[$x]['id_demographic_tpmcostequipment'], 
                    "item_tpmcostequipment"        => $rel_data73[$x]['item_tpmcostequipment'],
                    "annualcost_tpmcostequipment"        => $rel_data73[$x]['annualcost_tpmcostequipment'],
                    "unit_tpmcostequipment"        => $rel_data73[$x]['unit_tpmcostequipment'],
                    "avgpriceunit_tpmcostequipment"        => $rel_data73[$x]['avgpriceunit_tpmcostequipment'],  
                    "noincurredyear_tpmcostequipment"        => $rel_data73[$x]['noincurredyear_tpmcostequipment'], 
                    "costincurredstage_tpmcostequipment"        => $rel_data73[$x]['costincurredstage_tpmcostequipment'], 
                );
            }
        }

        if (!empty($rel_data74)) {
                for($x = 0; $x < count($rel_data74); $x++){
                $dataseamstpmLabor[] = array(    
                    "generatedcode"         => $rel_data74[$x]['codegen'],                       
                    "id_demographic_tpmcostlabor"         => $rel_data74[$x]['id_demographic_tpmcostlabor'], 
                    "item_tpmcostlabor"        => $rel_data74[$x]['item_tpmcostlabor'],
                    "annualcost_tpmcostlabor"        => $rel_data74[$x]['annualcost_tpmcostlabor'],
                    "unit_tpmcostlabor"        => $rel_data74[$x]['unit_tpmcostlabor'],
                    "avgpriceunit_tpmcostlabor"        => $rel_data74[$x]['avgpriceunit_tpmcostlabor'],  
                    "noincurredyear_tpmcostlabor"        => $rel_data74[$x]['noincurredyear_tpmcostlabor'], 
                    "costincurredstage_tpmcostlabor"        => $rel_data74[$x]['costincurredstage_tpmcostlabor'], 
                );
            }
        }

        if (!empty($rel_data75)) {
                for($x = 0; $x < count($rel_data75); $x++){
                $dataseamstpmOther[] = array(    
                    "generatedcode"         => $rel_data75[$x]['codegen'],                       
                    "id_demographic_tpmcostother"         => $rel_data75[$x]['id_demographic_tpmcostother'], 
                    "item_tpmcostother"        => $rel_data75[$x]['item_tpmcostother'],
                    "annualcost_tpmcostother"        => $rel_data75[$x]['annualcost_tpmcostother'],
                    "unit_tpmcostother"        => $rel_data75[$x]['unit_tpmcostother'],
                    "avgpriceunit_tpmcostother"        => $rel_data75[$x]['avgpriceunit_tpmcostother'],  
                    "noincurredyear_tpmcostother"        => $rel_data75[$x]['noincurredyear_tpmcostother'], 
                    "costincurredstage_tpmcostother"        => $rel_data75[$x]['costincurredstage_tpmcostother'], 
                );
            }
        }

        if (!empty($rel_data76)) {
                for($x = 0; $x < count($rel_data76); $x++){
                $dataseamsagriMaterial[] = array(    
                    "generatedcode"         => $rel_data76[$x]['codegen'],                       
                    "id_demographic_agricostmaterial"         => $rel_data76[$x]['id_demographic_agricostmaterial'], 
                    "item_agricostmaterial"        => $rel_data76[$x]['item_agricostmaterial'],
                    "annualcost_agricostmaterial"        => $rel_data76[$x]['annualcost_agricostmaterial'],
                    "unit_agricostmaterial"        => $rel_data76[$x]['unit_agricostmaterial'],
                    "avgpriceunit_agricostmaterial"        => $rel_data76[$x]['avgpriceunit_agricostmaterial'],  
                    "noincurredyear_agricostmaterial"        => $rel_data76[$x]['noincurredyear_agricostmaterial'], 
                    "costincurredstage_agricostmaterial"        => $rel_data76[$x]['costincurredstage_agricostmaterial'], 
                );
            }
        }

        if (!empty($rel_data77)) {
                for($x = 0; $x < count($rel_data77); $x++){
                $dataseamsagriEquip[] = array(    
                    "generatedcode"         => $rel_data77[$x]['codegen'],                       
                    "id_demographic_agricostequipment"         => $rel_data77[$x]['id_demographic_agricostequipment'], 
                    "item_agricostequipment"        => $rel_data77[$x]['item_agricostequipment'],
                    "annualcost_agricostequipment"        => $rel_data77[$x]['annualcost_agricostequipment'],
                    "unit_agricostequipment"        => $rel_data77[$x]['unit_agricostequipment'],
                    "avgpriceunit_agricostequipment"        => $rel_data77[$x]['avgpriceunit_agricostequipment'],  
                    "noincurredyear_agricostequipment"        => $rel_data77[$x]['noincurredyear_agricostequipment'], 
                    "costincurredstage_agricostequipment"        => $rel_data77[$x]['costincurredstage_agricostequipment'], 
                );
            }
        }

        if (!empty($rel_data78)) {
                for($x = 0; $x < count($rel_data78); $x++){
                $dataseamsagriLabor[] = array(    
                    "generatedcode"         => $rel_data78[$x]['codegen'],                       
                    "id_demographic_agricostlabor"         => $rel_data78[$x]['id_demographic_agricostlabor'], 
                    "item_agricostlabor"        => $rel_data78[$x]['item_agricostlabor'],
                    "annualcost_agricostlabor"        => $rel_data78[$x]['annualcost_agricostlabor'],
                    "unit_agricostlabor"        => $rel_data78[$x]['unit_agricostlabor'],
                    "avgpriceunit_agricostlabor"        => $rel_data78[$x]['avgpriceunit_agricostlabor'],  
                    "noincurredyear_agricostlabor"        => $rel_data78[$x]['noincurredyear_agricostlabor'], 
                    "costincurredstage_agricostlabor"        => $rel_data78[$x]['costincurredstage_agricostlabor'], 
                );
            }
        }

        if (!empty($rel_data79)) {
                for($x = 0; $x < count($rel_data79); $x++){
                $dataseamsagriOther[] = array(    
                    "generatedcode"         => $rel_data79[$x]['codegen'],                       
                    "id_demographic_agricostother"         => $rel_data79[$x]['id_demographic_agricostother'], 
                    "item_agricostother"        => $rel_data79[$x]['item_agricostother'],
                    "annualcost_agricostother"        => $rel_data79[$x]['annualcost_agricostother'],
                    "unit_agricostother"        => $rel_data79[$x]['unit_agricostother'],
                    "avgpriceunit_agricostother"        => $rel_data79[$x]['avgpriceunit_agricostother'],  
                    "noincurredyear_agricostother"        => $rel_data79[$x]['noincurredyear_agricostother'], 
                    "costincurredstage_agricostother"        => $rel_data79[$x]['costincurredstage_agricostother'], 
                );
            }
        }

        if (!empty($rel_data80)) {
                for($x = 0; $x < count($rel_data80); $x++){
                $dataseamslivestockMaterial[] = array(    
                    "generatedcode"         => $rel_data80[$x]['codegen'],                       
                    "id_demographic_livestockcostmaterial"         => $rel_data80[$x]['id_demographic_livestockcostmaterial'], 
                    "item_livestockcostmaterial"        => $rel_data80[$x]['item_livestockcostmaterial'],
                    "annualcost_livestockcostmaterial"        => $rel_data80[$x]['annualcost_livestockcostmaterial'],
                    "unit_livestockcostmaterial"        => $rel_data80[$x]['unit_livestockcostmaterial'],
                    "avgpriceunit_livestockcostmaterial"        => $rel_data80[$x]['avgpriceunit_livestockcostmaterial'],  
                    "noincurredyear_livestockcostmaterial"        => $rel_data80[$x]['noincurredyear_livestockcostmaterial'], 
                    "costincurredstage_livestockcostmaterial"        => $rel_data80[$x]['costincurredstage_livestockcostmaterial'], 
                );
            }
        }

        if (!empty($rel_data81)) {
                for($x = 0; $x < count($rel_data81); $x++){
                $dataseamslivestockEquip[] = array(    
                    "generatedcode"         => $rel_data81[$x]['codegen'],                       
                    "id_demographic_livestockcostequipment"         => $rel_data81[$x]['id_demographic_livestockcostequipment'], 
                    "item_livestockcostequipment"        => $rel_data81[$x]['item_livestockcostequipment'],
                    "annualcost_livestockcostequipment"        => $rel_data81[$x]['annualcost_livestockcostequipment'],
                    "unit_livestockcostequipment"        => $rel_data81[$x]['unit_livestockcostequipment'],
                    "avgpriceunit_livestockcostequipment"        => $rel_data81[$x]['avgpriceunit_livestockcostequipment'],  
                    "noincurredyear_livestockcostequipment"        => $rel_data81[$x]['noincurredyear_livestockcostequipment'], 
                    "costincurredstage_livestockcostequipment"        => $rel_data81[$x]['costincurredstage_livestockcostequipment'], 
                );
            }
        }

        if (!empty($rel_data82)) {
                for($x = 0; $x < count($rel_data82); $x++){
                $dataseamslivestockLabor[] = array(    
                    "generatedcode"         => $rel_data82[$x]['codegen'],                       
                    "id_demographic_livestockcostlabor"         => $rel_data82[$x]['id_demographic_livestockcostlabor'], 
                    "item_livestockcostlabor"        => $rel_data82[$x]['item_livestockcostlabor'],
                    "annualcost_livestockcostlabor"        => $rel_data82[$x]['annualcost_livestockcostlabor'],
                    "unit_livestockcostlabor"        => $rel_data82[$x]['unit_livestockcostlabor'],
                    "avgpriceunit_livestockcostlabor"        => $rel_data82[$x]['avgpriceunit_livestockcostlabor'],  
                    "noincurredyear_livestockcostlabor"        => $rel_data82[$x]['noincurredyear_livestockcostlabor'], 
                    "costincurredstage_livestockcostlabor"        => $rel_data82[$x]['costincurredstage_livestockcostlabor'], 
                );
            }
        }

        if (!empty($rel_data83)) {
                for($x = 0; $x < count($rel_data83); $x++){
                $dataseamslivestockOther[] = array(    
                    "generatedcode"         => $rel_data83[$x]['codegen'],                       
                    "id_demographic_livestockcostother"         => $rel_data83[$x]['id_demographic_livestockcostother'], 
                    "item_livestockcostother"        => $rel_data83[$x]['item_livestockcostother'],
                    "annualcost_livestockcostother"        => $rel_data83[$x]['annualcost_livestockcostother'],
                    "unit_livestockcostother"        => $rel_data83[$x]['unit_livestockcostother'],
                    "avgpriceunit_livestockcostother"        => $rel_data83[$x]['avgpriceunit_livestockcostother'],  
                    "noincurredyear_livestockcostother"        => $rel_data83[$x]['noincurredyear_livestockcostother'], 
                    "costincurredstage_livestockcostother"        => $rel_data83[$x]['costincurredstage_livestockcostother'], 
                );
            }
        }

        if (!empty($rel_data84)) {
                for($x = 0; $x < count($rel_data84); $x++){
                $dataseamsnontimberMaterial[] = array(    
                    "generatedcode"         => $rel_data84[$x]['codegen'],                       
                    "id_demographic_nontimbercostmaterial"         => $rel_data84[$x]['id_demographic_nontimbercostmaterial'], 
                    "item_nontimbercostmaterial"        => $rel_data84[$x]['item_nontimbercostmaterial'],
                    "annualcost_nontimbercostmaterial"        => $rel_data84[$x]['annualcost_nontimbercostmaterial'],
                    "unit_nontimbercostmaterial"        => $rel_data84[$x]['unit_nontimbercostmaterial'],
                    "avgpriceunit_nontimbercostmaterial"        => $rel_data84[$x]['avgpriceunit_nontimbercostmaterial'],  
                    "noincurredyear_nontimbercostmaterial"        => $rel_data84[$x]['noincurredyear_nontimbercostmaterial'], 
                    "costincurredstage_nontimbercostmaterial"        => $rel_data84[$x]['costincurredstage_nontimbercostmaterial'], 
                );
            }
        }

        if (!empty($rel_data85)) {
                for($x = 0; $x < count($rel_data85); $x++){
                $dataseamsnontimberEquip[] = array(    
                    "generatedcode"         => $rel_data85[$x]['codegen'],                       
                    "id_demographic_nontimbercostequipment"         => $rel_data85[$x]['id_demographic_nontimbercostequipment'], 
                    "item_nontimbercostequipment"        => $rel_data85[$x]['item_nontimbercostequipment'],
                    "annualcost_nontimbercostequipment"        => $rel_data85[$x]['annualcost_nontimbercostequipment'],
                    "unit_nontimbercostequipment"        => $rel_data85[$x]['unit_nontimbercostequipment'],
                    "avgpriceunit_nontimbercostequipment"        => $rel_data85[$x]['avgpriceunit_nontimbercostequipment'],  
                    "noincurredyear_nontimbercostequipment"        => $rel_data85[$x]['noincurredyear_nontimbercostequipment'], 
                    "costincurredstage_nontimbercostequipment"        => $rel_data85[$x]['costincurredstage_nontimbercostequipment'], 
                );
            }
        }

        if (!empty($rel_data86)) {
                for($x = 0; $x < count($rel_data86); $x++){
                $dataseamsnontimberLabor[] = array(    
                    "generatedcode"         => $rel_data86[$x]['codegen'],                       
                    "id_demographic_nontimbercostlabor"         => $rel_data86[$x]['id_demographic_nontimbercostlabor'], 
                    "item_nontimbercostlabor"        => $rel_data86[$x]['item_nontimbercostlabor'],
                    "annualcost_nontimbercostlabor"        => $rel_data86[$x]['annualcost_nontimbercostlabor'],
                    "unit_nontimbercostlabor"        => $rel_data86[$x]['unit_nontimbercostlabor'],
                    "avgpriceunit_nontimbercostlabor"        => $rel_data86[$x]['avgpriceunit_nontimbercostlabor'],  
                    "noincurredyear_nontimbercostlabor"        => $rel_data86[$x]['noincurredyear_nontimbercostlabor'], 
                    "costincurredstage_nontimbercostlabor"        => $rel_data86[$x]['costincurredstage_nontimbercostlabor'], 
                );
            }
        }

        if (!empty($rel_data87)) {
                for($x = 0; $x < count($rel_data87); $x++){
                $dataseamsnontimberOther[] = array(    
                    "generatedcode"         => $rel_data87[$x]['codegen'],                       
                    "id_demographic_nontimbercostother"         => $rel_data87[$x]['id_demographic_nontimbercostother'], 
                    "item_nontimbercostother"        => $rel_data87[$x]['item_nontimbercostother'],
                    "annualcost_nontimbercostother"        => $rel_data87[$x]['annualcost_nontimbercostother'],
                    "unit_nontimbercostother"        => $rel_data87[$x]['unit_nontimbercostother'],
                    "avgpriceunit_nontimbercostother"        => $rel_data87[$x]['avgpriceunit_nontimbercostother'],  
                    "noincurredyear_nontimbercostother"        => $rel_data87[$x]['noincurredyear_nontimbercostother'], 
                    "costincurredstage_nontimbercostother"        => $rel_data87[$x]['costincurredstage_nontimbercostother'], 
                );
            }
        }

        if (!empty($rel_data88)) {
                for($x = 0; $x < count($rel_data88); $x++){
                $dataseamstimberMaterial[] = array(    
                    "generatedcode"         => $rel_data88[$x]['codegen'],                       
                    "id_demographic_timbercostmaterial"         => $rel_data88[$x]['id_demographic_timbercostmaterial'], 
                    "item_timbercostmaterial"        => $rel_data88[$x]['item_timbercostmaterial'],
                    "annualcost_timbercostmaterial"        => $rel_data88[$x]['annualcost_timbercostmaterial'],
                    "unit_timbercostmaterial"        => $rel_data88[$x]['unit_timbercostmaterial'],
                    "avgpriceunit_timbercostmaterial"        => $rel_data88[$x]['avgpriceunit_timbercostmaterial'],  
                    "noincurredyear_timbercostmaterial"        => $rel_data88[$x]['noincurredyear_timbercostmaterial'], 
                    "costincurredstage_timbercostmaterial"        => $rel_data88[$x]['costincurredstage_timbercostmaterial'], 
                );
            }
        }

        if (!empty($rel_data89)) {
                for($x = 0; $x < count($rel_data89); $x++){
                $dataseamstimberEquip[] = array(    
                    "generatedcode"         => $rel_data89[$x]['codegen'],                       
                    "id_demographic_timbercostequipment"         => $rel_data89[$x]['id_demographic_timbercostequipment'], 
                    "item_timbercostequipment"        => $rel_data89[$x]['item_timbercostequipment'],
                    "annualcost_timbercostequipment"        => $rel_data89[$x]['annualcost_timbercostequipment'],
                    "unit_timbercostequipment"        => $rel_data89[$x]['unit_timbercostequipment'],
                    "avgpriceunit_timbercostequipment"        => $rel_data89[$x]['avgpriceunit_timbercostequipment'],  
                    "noincurredyear_timbercostequipment"        => $rel_data89[$x]['noincurredyear_timbercostequipment'], 
                    "costincurredstage_timbercostequipment"        => $rel_data89[$x]['costincurredstage_timbercostequipment'], 
                );
            }
        }

        if (!empty($rel_data90)) {
                for($x = 0; $x < count($rel_data90); $x++){
                $dataseamstimberLabor[] = array(    
                    "generatedcode"         => $rel_data90[$x]['codegen'],                       
                    "id_demographic_timbercostlabor"         => $rel_data90[$x]['id_demographic_timbercostlabor'], 
                    "item_timbercostlabor"        => $rel_data90[$x]['item_timbercostlabor'],
                    "annualcost_timbercostlabor"        => $rel_data90[$x]['annualcost_timbercostlabor'],
                    "unit_timbercostlabor"        => $rel_data90[$x]['unit_timbercostlabor'],
                    "avgpriceunit_timbercostlabor"        => $rel_data90[$x]['avgpriceunit_timbercostlabor'],  
                    "noincurredyear_timbercostlabor"        => $rel_data90[$x]['noincurredyear_timbercostlabor'], 
                    "costincurredstage_timbercostlabor"        => $rel_data90[$x]['costincurredstage_timbercostlabor'], 
                );
            }
        }

        if (!empty($rel_data91)) {
                for($x = 0; $x < count($rel_data91); $x++){
                $dataseamstimberOther[] = array(    
                    "generatedcode"         => $rel_data91[$x]['codegen'],                       
                    "id_demographic_timbercostother"         => $rel_data91[$x]['id_demographic_timbercostother'], 
                    "item_timbercostother"        => $rel_data91[$x]['item_timbercostother'],
                    "annualcost_timbercostother"        => $rel_data91[$x]['annualcost_timbercostother'],
                    "unit_timbercostother"        => $rel_data91[$x]['unit_timbercostother'],
                    "avgpriceunit_timbercostother"        => $rel_data91[$x]['avgpriceunit_timbercostother'],  
                    "noincurredyear_timbercostother"        => $rel_data91[$x]['noincurredyear_timbercostother'], 
                    "costincurredstage_timbercostother"        => $rel_data91[$x]['costincurredstage_timbercostother'], 
                );
            }
        }

        if (!empty($rel_data96)) {
                for($x = 0; $x < count($rel_data96); $x++){
                $dataseamsminingMaterial[] = array(    
                    "generatedcode"         => $rel_data96[$x]['codegen'],                       
                    "id_demographic_miningcostmaterial"         => $rel_data96[$x]['id_demographic_miningcostmaterial'], 
                    "item_miningcostmaterial"        => $rel_data96[$x]['item_miningcostmaterial'],
                    "annualcost_miningcostmaterial"        => $rel_data96[$x]['annualcost_miningcostmaterial'],
                    "unit_miningcostmaterial"        => $rel_data96[$x]['unit_miningcostmaterial'],
                    "avgpriceunit_miningcostmaterial"        => $rel_data96[$x]['avgpriceunit_miningcostmaterial'],  
                    "noincurredyear_miningcostmaterial"        => $rel_data96[$x]['noincurredyear_miningcostmaterial'], 
                    "costincurredstage_miningcostmaterial"        => $rel_data96[$x]['costincurredstage_miningcostmaterial'], 
                );
            }
        }

        if (!empty($rel_data97)) {
                for($x = 0; $x < count($rel_data97); $x++){
                $dataseamsminingEquip[] = array(    
                    "generatedcode"         => $rel_data97[$x]['codegen'],                       
                    "id_demographic_miningcostequipment"         => $rel_data97[$x]['id_demographic_miningcostequipment'], 
                    "item_miningcostequipment"        => $rel_data97[$x]['item_miningcostequipment'],
                    "annualcost_miningcostequipment"        => $rel_data97[$x]['annualcost_miningcostequipment'],
                    "unit_miningcostequipment"        => $rel_data97[$x]['unit_miningcostequipment'],
                    "avgpriceunit_miningcostequipment"        => $rel_data97[$x]['avgpriceunit_miningcostequipment'],  
                    "noincurredyear_miningcostequipment"        => $rel_data97[$x]['noincurredyear_miningcostequipment'], 
                    "costincurredstage_miningcostequipment"        => $rel_data97[$x]['costincurredstage_miningcostequipment'], 
                );
            }
        }

        if (!empty($rel_data98)) {
                for($x = 0; $x < count($rel_data98); $x++){
                $dataseamsminingLabor[] = array(    
                    "generatedcode"         => $rel_data98[$x]['codegen'],                       
                    "id_demographic_miningcostlabor"         => $rel_data98[$x]['id_demographic_miningcostlabor'], 
                    "item_miningcostlabor"        => $rel_data98[$x]['item_miningcostlabor'],
                    "annualcost_miningcostlabor"        => $rel_data98[$x]['annualcost_miningcostlabor'],
                    "unit_miningcostlabor"        => $rel_data98[$x]['unit_miningcostlabor'],
                    "avgpriceunit_miningcostlabor"        => $rel_data98[$x]['avgpriceunit_miningcostlabor'],  
                    "noincurredyear_miningcostlabor"        => $rel_data98[$x]['noincurredyear_miningcostlabor'], 
                    "costincurredstage_miningcostlabor"        => $rel_data98[$x]['costincurredstage_miningcostlabor'], 
                );
            }
        }

        if (!empty($rel_data99)) {
                for($x = 0; $x < count($rel_data99); $x++){
                $dataseamsminingOther[] = array(    
                    "generatedcode"         => $rel_data99[$x]['codegen'],                       
                    "id_demographic_miningcostother"         => $rel_data99[$x]['id_demographic_miningcostother'], 
                    "item_miningcostother"        => $rel_data99[$x]['item_miningcostother'],
                    "annualcost_miningcostother"        => $rel_data99[$x]['annualcost_miningcostother'],
                    "unit_miningcostother"        => $rel_data99[$x]['unit_miningcostother'],
                    "avgpriceunit_miningcostother"        => $rel_data99[$x]['avgpriceunit_miningcostother'],  
                    "noincurredyear_miningcostother"        => $rel_data99[$x]['noincurredyear_miningcostother'], 
                    "costincurredstage_miningcostother"        => $rel_data99[$x]['costincurredstage_miningcostother'], 
                );
            }
        }

        if (!empty($rel_data100)) {
                for($x = 0; $x < count($rel_data100); $x++){
                $dataseamsindustryOther[] = array(    
                    "generatedcode"         => $rel_data100[$x]['codegen'],                       
                    "id_demographic_industry"         => $rel_data100[$x]['id_demographic_industry'], 
                    "total_amount_industry"        => $rel_data100[$x]['total_amount_industry'],
                    "no_time_industry"        => $rel_data100[$x]['no_time_industry'],
                    "remarks_industry"        => $rel_data100[$x]['remarks_industry']                    
                );
            }
        }

        if (!empty($rel_data101)) {
                for($x = 0; $x < count($rel_data101); $x++){
                $dataseamssbindustryOther[] = array(    
                    "generatedcode"         => $rel_data101[$x]['codegen'],                       
                    "id_demographic_servicebased"         => $rel_data101[$x]['id_demographic_servicebased'], 
                    "total_amount_servicebased"        => $rel_data101[$x]['total_amount_servicebased'],
                    "no_time_servicebased"        => $rel_data101[$x]['no_time_servicebased'],
                    "remarks_servicebased"        => $rel_data101[$x]['remarks_servicebased']                    
                );
            }
        }

        if (!empty($rel_data102)) {
                for($x = 0; $x < count($rel_data102); $x++){
                $dataseamsothersource[] = array(    
                    "generatedcode"         => $rel_data102[$x]['codegen'],                       
                    "id_demographic_othersource"         => $rel_data102[$x]['id_demographic_othersource'], 
                    "total_amount_othersource"        => $rel_data102[$x]['total_amount_othersource'],
                    "no_time_othersource"        => $rel_data102[$x]['no_time_othersource'],
                    "remarks_othersource"        => $rel_data102[$x]['remarks_othersource']                    
                );
            }
        }

        if (!empty($rel_data103)) {
                for($x = 0; $x < count($rel_data103); $x++){
                $datacoralreef[] = array(    
                    "generatedcode"         => $rel_data103[$x]['codegen'],                       
                    "coastal_generatedcode"         => $rel_data103[$x]['Ccodegen'],                       
                    "coralreef_has"         => $rel_data103[$x]['coralreef_has'],                       
                    "coralreef_map_shp"         => $rel_data103[$x]['coralreef_map_shp'],                       
                    "coralreef_saba_pt"         => $rel_data103[$x]['coralreef_saba_pt'],                       
                    "coralreef_pms_point"         => $rel_data103[$x]['coralreef_pms_point'],                       
                    "coralreef_hcc"         => $rel_data103[$x]['coralreef_hcc'],                       
                    "hard_coral"         => $rel_data103[$x]['hard_coral'],                       
                    "algal_assemblage"         => $rel_data103[$x]['algal_assemblage'],                       
                    "abiotic"         => $rel_data103[$x]['abiotic'],                       
                    "macroalgae"         => $rel_data103[$x]['macroalgae'],                       
                    "halimeda"         => $rel_data103[$x]['halimeda'],                       
                    "other_biota"         => $rel_data103[$x]['other_biota'],                       
                    "density"         => $rel_data103[$x]['density'],                       
                    "biomass"         => $rel_data103[$x]['biomass'],      
                    "coral_month"         => $rel_data103[$x]['coral_month'],                 
                    "coral_day"         => $rel_data103[$x]['coral_day'],                 
                    "coral_year"         => $rel_data103[$x]['coral_year'],                 
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
                );
            }
        }

        if (!empty($rel_data106)) {
                for($x = 0; $x < count($$rel_data106); $x++){
                $datacoralreefspeciescompo[] = array(    
                    "generatedcode"         => $rel_data106[$x]['codegen'],                       
                    "coastal_generatedcode"         => $rel_data106[$x]['Ccodegen'],                       
                    "speciescompo_img"         => $rel_data106[$x]['speciescompo_img'],                       
                    "species_name"         => $rel_data106[$x]['species_name'],                       
                );
            }
        }

        if (!empty($rel_data107)) {
                for($x = 0; $x < count($$rel_data107); $x++){
                $datacoralreefmonitoring[] = array(    
                    "generatedcode"         => $rel_data107[$x]['codegen'],                       
                    "coastal_generatedcode"         => $rel_data107[$x]['Ccodegen'],                       
                    "monitoring_site_point"         => $rel_data107[$x]['monitoring_site_point'],                       
                );
            }
        }

        if (!empty($rel_data108)) {
                for($x = 0; $x < count($$rel_data108); $x++){
                $datacoralreefkmlkmz[] = array(    
                    "generatedcode"         => $rel_data108[$x]['codegen'],                       
                    "coastal_generatedcode"         => $rel_data108[$x]['Ccodegen'],                       
                    "kmlkmz"         => $rel_data108[$x]['kmlkmz'],                       
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
                    $this->db->insert('tblmainprograms',$dataPrograms[$xy611]);
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
                    $this->db->insert('tblpatopology',$datatopo[$topo1]);
                }
            }

            if (!empty($rel_data20)) {
                for($soil =0; $soil<count($rel_data20); $soil++){
                    $this->db->insert('tblpageology',$datasoil[$soil]);
                }
            }

            if (!empty($rel_data21)) {
                for($climate =0; $climate<count($rel_data21); $climate++){
                    $this->db->insert('tblpaclimate',$dataclimate[$climate]);
                }
            }

            if (!empty($rel_data22)) {
                for($landslide =0; $landslide<count($rel_data22); $landslide++){
                    $this->db->insert('tblpahazardlandslide',$datalandslide[$landslide]);
                }
            }

            if (!empty($rel_data23)) {
                for($flooding =0; $flooding<count($rel_data23); $flooding++){
                    $this->db->insert('tblpahazardflooding',$dataflooding[$flooding]);
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

            if (!empty($rel_data32)) {
                for($contribution =0; $contribution<count($rel_data32); $contribution++){
                    $this->db->insert('tblpaipafcontri',$datacontri[$contribution]);
                }
            }

            if (!empty($rel_data33)) {
                for($recognition =0; $recognition<count($rel_data33); $recognition++){
                    $this->db->insert('tblrecognition',$datarecog[$recognition]);
                }
            }

            if (!empty($rel_data34)) {
                for($rock =0; $rock<count($rel_data34); $rock++){
                    $this->db->insert('tblparock',$datarock[$rock]);
                }
            }

            if (!empty($rel_data35)) {
                for($hazard =0; $hazard<count($rel_data35); $hazard++){
                    $this->db->insert('tblpageohazard',$datahazard[$hazard]);
                }
            }

            if (!empty($rel_data36)) {
                for($ff =0; $ff<count($rel_data36); $ff++){
                    $this->db->insert('tblpaforestformation',$dataff[$ff]);
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

            if (!empty($rel_data42)) {
                for($x =2; $x<count($rel_data42); $x++){
                    $this->db->insert('tblseamsincome',$datan[$x]);   
                }
            }

            if (!empty($rel_data43)) {
                for($x =0; $x<count($rel_data43); $x++){
                    $this->db->insert('tblpahydrology',$datahydro[$x]);   
                }
            }

            if (!empty($rel_data44)) {
                for($x =0; $x<count($rel_data44); $x++){
                    $this->db->insert('tblpalanduse',$dataland[$x]);   
                }
            }

            if (!empty($rel_data45)) {
                for($x =0; $x<count($rel_data45); $x++){
                    $this->db->insert('tblpavegetative',$datavegetative[$x]);   
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

            if (!empty($rel_data48)) {
                for($x =0; $x<count($rel_data48); $x++){
                    $this->db->insert('tblseams_sourceincome_fishery_salt',$dataseamsfs[$x]);   
                }
            }

            if (!empty($rel_data49)) {
                for($x =0; $x<count($rel_data49); $x++){
                    $this->db->insert('tblseams_sourceincome_fishery_fresh',$dataseamsffs[$x]);   
                }
            }

            if (!empty($rel_data50)) {
                for($x =0; $x<count($rel_data50); $x++){
                    $this->db->insert('tblseams_sourceincome_tpm',$dataseamstpm[$x]);   
                }
            }

            if (!empty($rel_data51)) {
                for($x =0; $x<count($rel_data51); $x++){
                    $this->db->insert('tblseams_sourceincome_agriculture',$dataseamsagri[$x]);   
                }
            }

            if (!empty($rel_data52)) {
                for($x =0; $x<count($rel_data52); $x++){
                    $this->db->insert('tblseams_sourceincome_livestock',$dataseamsls[$x]);   
                }
            }

            if (!empty($rel_data53)) {
                for($x =0; $x<count($rel_data53); $x++){
                    $this->db->insert('tblseams_sourceincome_nontimber',$dataseamsnontimber[$x]);   
                }
            }

            if (!empty($rel_data54)) {
                for($x =0; $x<count($rel_data54); $x++){
                    $this->db->insert('tblseams_sourceincome_timber',$dataseamstimber[$x]);   
                }
            }

            if (!empty($rel_data55)) {
                for($x =0; $x<count($rel_data55); $x++){
                    $this->db->insert('tblseams_sourceincome_rwc',$dataseamsrwc[$x]);   
                }
            }

            if (!empty($rel_data56)) {
                for($x =0; $x<count($rel_data56); $x++){
                    $this->db->insert('tblseams_sourceincome_mining',$dataseamsmining[$x]);   
                }
            }

            if (!empty($rel_data57)) {
                for($x =0; $x<count($rel_data57); $x++){
                    $this->db->insert('tblseams_sourceincome_industry',$dataseamsindustry[$x]);   
                }
            }

            if (!empty($rel_data58)) {
                for($x =0; $x<count($rel_data58); $x++){
                    $this->db->insert('tblseams_sourceincome_service',$dataseamsservice[$x]);   
                }
            }

            if (!empty($rel_data59)) {
                for($x =0; $x<count($rel_data59); $x++){
                    $this->db->insert('tblseams_sourceincome_source',$dataseamssource[$x]);   
                }
            }

            if (!empty($rel_data60)) {
                for($x =0; $x<count($rel_data60); $x++){
                    $this->db->insert('tblseams_sourceincome_economic_material',$dataseamsEcoMaterial[$x]);   
                }
            }

            if (!empty($rel_data61)) {
                for($x =0; $x<count($rel_data61); $x++){
                    $this->db->insert('tblseams_sourceincome_economic_equipment',$dataseamsEcoEquipment[$x]);   
                }
            }

            if (!empty($rel_data62)) {
                for($x =0; $x<count($rel_data62); $x++){
                    $this->db->insert('tblseams_sourceincome_economic_labor',$dataseamsEcoLabor[$x]);   
                }
            }

            if (!empty($rel_data63)) {
                for($x =0; $x<count($rel_data63); $x++){
                    $this->db->insert('tblseams_sourceincome_economic_other',$dataseamsEcoOther[$x]);   
                }
            }

            if (!empty($rel_data64)) {
                for($x =0; $x<count($rel_data64); $x++){
                    $this->db->insert('tblseams_sourceincome_fishsalt_material',$dataseamsfsMaterial[$x]);   
                }
            }

            if (!empty($rel_data65)) {
                for($x =0; $x<count($rel_data65); $x++){
                    $this->db->insert('tblseams_sourceincome_fishsalt_equipment',$dataseamsfsEquip[$x]);   
                }
            }

            if (!empty($rel_data66)) {
                for($x =0; $x<count($rel_data66); $x++){
                    $this->db->insert('tblseams_sourceincome_fishsalt_labor',$dataseamsfsLabor[$x]);   
                }
            }

            if (!empty($rel_data67)) {
                for($x =0; $x<count($rel_data67); $x++){
                    $this->db->insert('tblseams_sourceincome_fishsalt_other',$dataseamsfsOther[$x]);   
                }
            }

            if (!empty($rel_data68)) {
                for($x =0; $x<count($rel_data68); $x++){
                    $this->db->insert('tblseams_sourceincome_fishfresh_material',$dataseamsffMaterial[$x]);   
                }
            }

            if (!empty($rel_data69)) {
                for($x =0; $x<count($rel_data69); $x++){
                    $this->db->insert('tblseams_sourceincome_fishfresh_equipment',$dataseamsffEquip[$x]);   
                }
            }

            if (!empty($rel_data70)) {
                for($x =0; $x<count($rel_data70); $x++){
                    $this->db->insert('tblseams_sourceincome_fishfresh_labor',$dataseamsffLabor[$x]);   
                }
            }

            if (!empty($rel_data71)) {
                for($x =0; $x<count($rel_data71); $x++){
                    $this->db->insert('tblseams_sourceincome_fishfresh_other',$dataseamsffOther[$x]);   
                }
            }

            if (!empty($rel_data72)) {
                for($x =0; $x<count($rel_data72); $x++){
                    $this->db->insert('tblseams_sourceincome_tpm_material',$dataseamstpmMaterial[$x]);   
                }
            }

            if (!empty($rel_data73)) {
                for($x =0; $x<count($rel_data73); $x++){
                    $this->db->insert('tblseams_sourceincome_tpm_equipment',$dataseamstpmEquip[$x]);   
                }
            }

            if (!empty($rel_data74)) {
                for($x =0; $x<count($rel_data74); $x++){
                    $this->db->insert('tblseams_sourceincome_tpm_labor',$dataseamstpmLabor[$x]);   
                }
            }

            if (!empty($rel_data75)) {
                for($x =0; $x<count($rel_data75); $x++){
                    $this->db->insert('tblseams_sourceincome_tpm_other',$dataseamstpmOther[$x]);   
                }
            }

            if (!empty($rel_data76)) {
                for($x =0; $x<count($rel_data76); $x++){
                    $this->db->insert('tblseams_sourceincome_agri_material',$dataseamsagriMaterial[$x]);   
                }
            }

            if (!empty($rel_data77)) {
                for($x =0; $x<count($rel_data77); $x++){
                    $this->db->insert('tblseams_sourceincome_agri_equipment',$dataseamsagriEquip[$x]);   
                }
            }

            if (!empty($rel_data78)) {
                for($x =0; $x<count($rel_data78); $x++){
                    $this->db->insert('tblseams_sourceincome_agri_labor',$dataseamsagriLabor[$x]);   
                }
            }

            if (!empty($rel_data79)) {
                for($x =0; $x<count($rel_data79); $x++){
                    $this->db->insert('tblseams_sourceincome_agri_other',$dataseamsagriOther[$x]);   
                }
            }

            if (!empty($rel_data80)) {
                for($x =0; $x<count($rel_data80); $x++){
                    $this->db->insert('tblseams_sourceincome_livestock_material',$dataseamslivestockMaterial[$x]);   
                }
            }

            if (!empty($rel_data81)) {
                for($x =0; $x<count($rel_data81); $x++){
                    $this->db->insert('tblseams_sourceincome_livestock_equipment',$dataseamslivestockEquip[$x]);   
                }
            }

            if (!empty($rel_data82)) {
                for($x =0; $x<count($rel_data82); $x++){
                    $this->db->insert('tblseams_sourceincome_livestock_labor',$dataseamslivestockLabor[$x]);   
                }
            }

            if (!empty($rel_data83)) {
                for($x =0; $x<count($rel_data83); $x++){
                    $this->db->insert('tblseams_sourceincome_livestock_other',$dataseamslivestockOther[$x]);   
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

            if (!empty($rel_data103)) {
                for($x =0; $x<count($rel_data103); $x++){
                    $this->db->insert('tblpacoastalcoral',$datacoralreef[$x]);   
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

            $this->db->insert($this->table,$data);                               
             
            
            return "success";
        }catch(Exception $e){
            return "failed";
        }
    }

    public function updateMain($data = [],$rel_data1,$rel_data2,$rel_data3,$rel_data3flora,$rel_data4,$rel_data5,$rel_data6_1,$rel_data7_1,$rel_data9,$rel_data10,$rel_data11,$rel_data12,$rel_data13_1,$rel_data14_1,$rel_data15,$rel_data16,$rel_data17,$rel_data18,$rel_data19,$rel_data20,$rel_data21,$rel_data22,$rel_data23,$rel_data24,$rel_data25,$rel_data26,$rel_data27,$rel_data28,$rel_data29,$rel_data30,$rel_data31,$rel_data32,$rel_data33,$rel_data34,$rel_data35,$rel_data36,$rel_data37,$rel_data38,$rel_data39,$rel_data40,$rel_data41,$rel_data42,$rel_data43,$rel_data44,$rel_data45,$rel_data46,$rel_data47,$rel_data48,$rel_data49,$rel_data50,$rel_data51,$rel_data52,$rel_data53,$rel_data54,$rel_data55,$rel_data56,$rel_data57,$rel_data58,$rel_data59,$rel_data60,$rel_data61,$rel_data62,$rel_data63,$rel_data64,$rel_data65,$rel_data66,$rel_data67,$rel_data68,$rel_data69,$rel_data70,$rel_data71,$rel_data72,$rel_data73,$rel_data74,$rel_data75,$rel_data76,$rel_data77,$rel_data78,$rel_data79,$rel_data80,$rel_data81,$rel_data82,$rel_data83,$rel_data84,$rel_data85,$rel_data86,$rel_data87,$rel_data88,$rel_data89,$rel_data90,$rel_data91,$rel_data92,$rel_data93,$rel_data94,$rel_data95,$rel_data96,$rel_data97,$rel_data98,$rel_data99,$rel_data100,$rel_data101,$rel_data102,$rel_data103,$rel_data104,$rel_data105,$rel_data106,$rel_data107,$rel_data108)
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
                );
            }
        }

        if (!empty($rel_data3)) {
            for($flora = 0; $flora < count($rel_data3); $flora++){
                $dataBio[] = array(
                    "id_genus_get"  => $rel_data3[$flora]['id_genus_get'],
                    "generatedcode" => $rel_data3[$flora]['codegen'],                
                );
            }    
        }

        if (!empty($rel_data3flora)) {
            for($flora = 0; $flora < count($rel_data3flora); $flora++){
                $dataBioflora[] = array(
                    "id_genus_get"  => $rel_data3flora[$flora]['id_genus_get'],
                    "generatedcode" => $rel_data3flora[$flora]['codegen'],                
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
                );
            }
        }

        if (!empty($rel_data9)) {
            for($x9 = 0; $x9 < count($rel_data9); $x9++){
                $dataMultiple[] = array(          
                    "generatedcode"         => $rel_data9[$x9]['codegen'], 
                    "description"             => $rel_data9[$x9]['description'],
                    "area"             => $rel_data9[$x9]['area'] 

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
                    "generatedcode"         => $rel_data11[$x11]['codegen'], 
                    "threat_desc"             => $rel_data11[$x11]['threat_desc'],
                    "img_threat"             => $rel_data11[$x11]['img_threat'],            
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
                    "link"        => $rel_data12[$x12]['link']

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
                    "start_implementation_month"        => $rel_data16[$proj]['start_implementation_month'],
                    "start_implementation_year"        => $rel_data16[$proj]['start_implementation_year'],
                    "end_implementation_month"        => $rel_data16[$proj]['end_implementation_month'],
                    "end_implementation_year"        => $rel_data16[$proj]['end_implementation_year'],
                    "source_fund"        => $rel_data16[$proj]['source_fund'],
                    "program_cost"        => $rel_data16[$proj]['program_cost'],
                    "program_area"        => $rel_data16[$proj]['program_area'],
                    "program_location"        => $rel_data16[$proj]['program_location'],
                    "program_remarks"        => $rel_data16[$proj]['program_remarks'],
                    "program_proponent"        => $rel_data16[$proj]['program_proponent'],   
                );
            }
        }

        if (!empty($rel_data17)) {        
            for($researchX = 0; $researchX < count($rel_data17); $researchX++){
                $datasearch[] = array(          
                    "generatedcode"         => $rel_data17[$researchX]['codegen'], 
                    "search_type"        => $rel_data17[$researchX]['search_type'],
                    "search_title"        => $rel_data17[$researchX]['search_title'],
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
                );
            }
        }

        if (!empty($rel_data19)) {
            for($topo1 = 0; $topo1 < count($rel_data19); $topo1++){
                $datatopo[] = array(          
                    "generatedcode"         => $rel_data19[$topo1]['codegen'], 
                    "topo_desc"        => $rel_data19[$topo1]['topo_desc'],
                    "topo_map"        => $rel_data19[$topo1]['topo_map'],
                );
            }
        }

        if (!empty($rel_data20)) {
            for($soil = 0; $soil < count($rel_data20); $soil++){
                $datasoil[] = array(          
                    "generatedcode"         => $rel_data20[$soil]['codegen'], 
                    "soil_type"        => $rel_data20[$soil]['soil_type'],
                    "geology_map"        => $rel_data20[$soil]['geology_map'],
                );
            }
        }

        if (!empty($rel_data21)) {
            for($climate = 0; $climate < count($rel_data21); $climate++){
                $dataclimate[] = array(          
                    "generatedcode"         => $rel_data21[$climate]['codegen'], 
                    "climate_desc"        => $rel_data21[$climate]['climate_desc'],
                    "climate_img"        => $rel_data21[$climate]['climate_img'],
                );
            }
        }

        if (!empty($rel_data22)) {        
            for($landlside = 0; $landlside < count($rel_data22); $landlside++){
                $datalandslide[] = array(          
                    "generatedcode"         => $rel_data22[$landlside]['codegen'], 
                    "landslide_desc"        => $rel_data22[$landlside]['landslide_desc'],
                    "landslide_img"        => $rel_data22[$landlside]['landslide_img'],
                );
            }
        }
       
        if (!empty($rel_data23)) {        
            for($flooding = 0; $flooding < count($rel_data23); $flooding++){
                $dataflooding[] = array(          
                    "generatedcode"         => $rel_data23[$flooding]['codegen'], 
                    "flooding_desc"        => $rel_data23[$flooding]['flooding_desc'],
                    "flooding_img"        => $rel_data23[$flooding]['flooding_img'],
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

        if (!empty($rel_data32)) {        
            for($contribution = 0; $contribution < count($rel_data32); $contribution++){
                $datacontri[] = array(          
                    "generatedcode"         => $rel_data32[$contribution]['codegen'], 
                    "date_month_coontri"        => $rel_data32[$contribution]['date_month'],
                    "date_year_coontri"        => $rel_data32[$contribution]['date_year'],                
                    "trust_fund"        => $rel_data32[$contribution]['trust_fund'],                
                    "payment"        => $rel_data32[$contribution]['payment'],                
                    "amount"        => $rel_data32[$contribution]['amount'],                
                    "remarks"        => $rel_data32[$contribution]['remarks'],                
                    "devt_fee"   => $rel_data32[$contribution]['devt_fee'], 
                    "devt_remarks"    => $rel_data32[$contribution]['devt_remarks'], 
                    "penalty_fee"    => $rel_data32[$contribution]['penalty_fee'], 
                    "penalty_remarks" => $rel_data32[$contribution]['penalty_remarks'],         
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
                    "inscribed"        => $rel_data33[$recognition]['inscribed']
                );
            }
        }

        if (!empty($rel_data34)) {        
            for($rock = 0; $rock < count($rel_data34); $rock++){
                $datarock[] = array(          
                    "generatedcode"         => $rel_data34[$rock]['codegen'], 
                    "rock_desc"        => $rel_data34[$rock]['rock_desc'],
                    "rock_img"        => $rel_data34[$rock]['rock_img'],
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
                    "ff_map_img"        => $rel_data36[$ff]['ff_map_img'],
                    "ff_pic_img"        => $rel_data36[$ff]['ff_pic_img'],
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
                    "caves_long"        => $rel_data39[$x]['caves_long'],
                    "caves_lat"         => $rel_data39[$x]['caves_lat'],
                    "land_status"        => $rel_data39[$x]['land_status'],
                    "undisturbed_cave"        => $rel_data39[$x]['undisturbed_cave'],
                    "intact_difficult_access"        => $rel_data39[$x]['intact_difficult_access'],
                    "intact_within_pa"        => $rel_data39[$x]['intact_within_pa'],
                    "intact_private"        => $rel_data39[$x]['intact_private'],
                    "vandalized"        => $rel_data39[$x]['vandalized'],
                    "exploited"        => $rel_data39[$x]['exploited'],
                    "claimant"        => $rel_data39[$x]['claimant'],
                    "other_status"        => $rel_data39[$x]['other_status'],
                    "vandalized_text"        => $rel_data39[$x]['vandalized_text'],
                    "exploited_text"        => $rel_data39[$x]['exploited_text'],
                    "claimant_text"        => $rel_data39[$x]['claimant_text'],
                    "other_status_text"        => $rel_data39[$x]['other_status_text'],
                    "cave_img_map"        => $rel_data39[$x]['cave_img_map'],
                    "cave_img"        => $rel_data39[$x]['cave_img'],
                    "assessment_form"        => $rel_data39[$x]['assessment_form'],     
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

                );
            }
        }

        if (!empty($rel_data42)) {        
            for($demos = 0; $demos < count($rel_data42); $demos++){
                $datan[] = array(          
                    "generatedcode" => $rel_data42[$demos]['codegen'], 
                    "income_region" => $rel_data42[$demos]['income_region'],
                    "income_province" => $rel_data42[$demos]['income_province'],
                    "income_municipal" => $rel_data42[$demos]['income_municipal'],
                    "income_barangay" => $rel_data42[$demos]['income_barangay'],
                    "ecotourism_name_head" => $rel_data42[$demos]['ecotourism_name_head'],
                    "ecotourism_revenue" => $rel_data42[$demos]['ecotourism_revenue'],
                    "ecotourism_source_location" => $rel_data42[$demos]['ecotourism_source_location'],
                    "ecotourism_total_revenue" => $rel_data42[$demos]['ecotourism_total_revenue'],
                    "ecotourism_total_cost" => $rel_data42[$demos]['ecotourism_total_cost'],
                    "ecotourism_net_revenue" => $rel_data42[$demos]['ecotourism_net_revenue'],
                    "saltwater_species_caught" => $rel_data42[$demos]['saltwater_species_caught'],
                    "saltwater_location" => $rel_data42[$demos]['saltwater_location'],
                    "saltwater_avarange_fishing" => $rel_data42[$demos]['saltwater_avarange_fishing'],
                    "saltwater_revenue" => $rel_data42[$demos]['saltwater_revenue'],
                    "saltwater_cost" => $rel_data42[$demos]['saltwater_cost'],
                    "saltwater_net_revenue" => $rel_data42[$demos]['saltwater_net_revenue'],
                    "freshwater_species_caught" => $rel_data42[$demos]['freshwater_species_caught'],
                    "freshwater_location" => $rel_data42[$demos]['freshwater_location'],
                    "freshwater_avarange_fishing" => $rel_data42[$demos]['freshwater_avarange_fishing'],
                    "freshwater_revenue" => $rel_data42[$demos]['freshwater_revenue'],
                    "freshwater_cost" => $rel_data42[$demos]['freshwater_cost'],
                    "freshwater_net_revenue" => $rel_data42[$demos]['freshwater_net_revenue'],
                    "ptm_species" => $rel_data42[$demos]['ptm_species'],
                    "ptm_source_location" => $rel_data42[$demos]['ptm_source_location'],
                    "ptm_revenue" => $rel_data42[$demos]['ptm_revenue'],
                    "ptm_cost" => $rel_data42[$demos]['ptm_cost'],
                    "ptm_net_revenue" => $rel_data42[$demos]['ptm_net_revenue'],
                    "agriculture_crops" => $rel_data42[$demos]['agriculture_crops'],
                    "agriculture_source_location" => $rel_data42[$demos]['agriculture_source_location'],
                    "agriculture_cultivated_area" => $rel_data42[$demos]['agriculture_cultivated_area'],
                    "agriculture_revenue" => $rel_data42[$demos]['agriculture_revenue'],
                    "agriculture_cost" => $rel_data42[$demos]['agriculture_cost'],
                    "agriculture_net_revenue" => $rel_data42[$demos]['agriculture_net_revenue'],
                    "livestock_species" => $rel_data42[$demos]['livestock_species'],
                    "livestock_source_location" => $rel_data42[$demos]['livestock_source_location'],
                    "livestock_grazing_area" => $rel_data42[$demos]['livestock_grazing_area'],
                    "livestock_revenue" => $rel_data42[$demos]['livestock_revenue'],
                    "livestock_cost" => $rel_data42[$demos]['livestock_cost'],
                    "livestock_net_revenue" => $rel_data42[$demos]['livestock_net_revenue'],
                    "nontimber_species" => $rel_data42[$demos]['nontimber_species'],
                    "nontimber_source_location" => $rel_data42[$demos]['nontimber_source_location'],
                    "nontimber_revenue" => $rel_data42[$demos]['nontimber_revenue'],
                    "nontimber_cost" => $rel_data42[$demos]['nontimber_cost'],
                    "nontimber_net_revenue" => $rel_data42[$demos]['nontimber_net_revenue'],
                    "timber_species" => $rel_data42[$demos]['timber_species'],
                    "timber_source_location" => $rel_data42[$demos]['timber_source_location'],
                    "timber_volume" => $rel_data42[$demos]['timber_volume'],
                    "timber_revenue" => $rel_data42[$demos]['timber_revenue'],
                    "timber_cost" => $rel_data42[$demos]['timber_cost'],
                    "timber_net_revenue" => $rel_data42[$demos]['timber_net_revenue'],
                    "wildlife_species" => $rel_data42[$demos]['wildlife_species'],
                    "wildlife_source_location" => $rel_data42[$demos]['wildlife_source_location'],
                    "wildlife_revenue" => $rel_data42[$demos]['wildlife_revenue'],
                    "wildlife_cost" => $rel_data42[$demos]['wildlife_cost'],
                    "wildlife_net_revenue" => $rel_data42[$demos]['wildlife_net_revenue'],
                    "mining_revenue_source" => $rel_data42[$demos]['mining_revenue_source'],
                    "mining_source_location" => $rel_data42[$demos]['mining_source_location'],
                    "mining_revenue" => $rel_data42[$demos]['mining_revenue'],
                    "mining_cost" => $rel_data42[$demos]['mining_cost'],
                    "mining_net_revenue" => $rel_data42[$demos]['mining_net_revenue'],
                    "industry_revenue" => $rel_data42[$demos]['industry_revenue'],
                    "industry_cost" => $rel_data42[$demos]['industry_cost'],
                    "industry_net_revenue" => $rel_data42[$demos]['industry_net_revenue'],
                    "services_revenue" => $rel_data42[$demos]['services_revenue'],
                    "services_cost" => $rel_data42[$demos]['services_cost'],
                    "services_net_revenue" => $rel_data42[$demos]['services_net_revenue'],
                    "other_revenue_revenue" => $rel_data42[$demos]['other_revenue_revenue'],
                    "other_revenue_cost" => $rel_data42[$demos]['other_revenue_cost'],
                    "other_revenue_net_revenue" => $rel_data42[$demos]['other_revenue_net_revenue'],

                );
            }
        }

        if (!empty($rel_data43)) {
            for($hydro = 0; $hydro < count($rel_data43); $hydro++){
                $datahydro[] = array(          
                    "generatedcode"         => $rel_data43[$hydro]['codegen'], 
                    "hydro_desc"        => $rel_data43[$hydro]['hydro_desc'],
                    "hydro_img"        => $rel_data43[$hydro]['hydro_img'],
                );
            }
        }

        if (!empty($rel_data44)) {
            for($x = 0; $x < count($rel_data44); $x++){
                $dataland[] = array(          
                    "generatedcode"         => $rel_data44[$x]['codegen'], 
                    "landuse_desc"        => $rel_data44[$x]['landuse_desc'],
                    "landuse_img"        => $rel_data44[$x]['landuse_img'],
                );
            }
        }

        if (!empty($rel_data45)) {
            for($x = 0; $x < count($rel_data45); $x++){
                $datavegetative[] = array(          
                    "generatedcode"         => $rel_data45[$x]['codegen'], 
                    "vegetative_desc"        => $rel_data45[$x]['vegetative_desc'],
                    "vegetative_img"        => $rel_data45[$x]['vegetative_img'],
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
                    "iw_mgntplan_prep"        => $rel_data47[$x]['iw_mgntplan_prep'],
                    "iw_mgntplan"        => $rel_data47[$x]['iw_mgntplan'],
                    "iw_mgntplan_ecopy"        => $rel_data47[$x]['iw_mgntplan_ecopy'],
                    "iw_mgntplan_implementation"        => $rel_data47[$x]['iw_mgntplan_implementation'],
                    "mgntplan_pdf"        => $rel_data47[$x]['mgntplan_pdf'],
                    "iw_description"        => $rel_data47[$x]['iw_description'],                    
                );
            }
        }

        if (!empty($rel_data48)) {
            for($x = 0; $x < count($rel_data48); $x++){
                $dataseamsfs[] = array(          
                    "generatedcode"         => $rel_data48[$x]['codegen'], 
                    "id_demographic_fish"        => $rel_data48[$x]['id_demographic_fish'],
                    "fishing_type"        => $rel_data48[$x]['fishing_type'],
                    "species"        => $rel_data48[$x]['species'],
                    "unit_measure"        => $rel_data48[$x]['unit_measure'],
                    "volume_sold_year"        => $rel_data48[$x]['volume_sold_year'],
                    "volume_consume_year"        => $rel_data48[$x]['volume_consume_year'],
                    "price_unit"        => $rel_data48[$x]['price_unit'],
                    "fishsalt_value"        => $rel_data48[$x]['fishsalt_value'],
                    "type_gear"        => $rel_data48[$x]['type_gear'],
                    "no_fishing_year"        => $rel_data48[$x]['no_fishing_year'],
                    "no_season_year"        => $rel_data48[$x]['no_season_year'],
                    "season_of_fishing"        => $rel_data48[$x]['season_of_fishing'],
                    "location_fishing"        => $rel_data48[$x]['location_fishing'],
                    "no_member_activity"        => $rel_data48[$x]['no_member_activity'],
                    "marketing_agent"        => $rel_data48[$x]['marketing_agent'],
                    "marketing_location"        => $rel_data48[$x]['marketing_location'],
                    "type_payment"        => $rel_data48[$x]['type_payment'],
                    "fishing_salt_remarks"        => $rel_data48[$x]['fishing_salt_remarks'],
                );
            }
        }

        if (!empty($rel_data49)) {
            for($x = 0; $x < count($rel_data49); $x++){
                $dataseamsffs[] = array(          
                    "generatedcode"         => $rel_data49[$x]['codegen'], 
                    "id_demographic_fish_fresh"        => $rel_data49[$x]['id_demographic_fish_fresh'],
                    "fishing_type_fresh"        => $rel_data49[$x]['fishing_type_fresh'],
                    "species_fresh"        => $rel_data49[$x]['species_fresh'],
                    "unit_measure_fresh"        => $rel_data49[$x]['unit_measure_fresh'],
                    "volume_sold_year_fresh"        => $rel_data49[$x]['volume_sold_year_fresh'],
                    "volume_consume_year_fresh"        => $rel_data49[$x]['volume_consume_year_fresh'],
                    "price_unit_fresh"        => $rel_data49[$x]['price_unit_fresh'],
                    "fishsalt_value_fresh"        => $rel_data49[$x]['fishsalt_value_fresh'],
                    "type_gear_fresh"        => $rel_data49[$x]['type_gear_fresh'],
                    "no_fishing_year_fresh"        => $rel_data49[$x]['no_fishing_year_fresh'],
                    "no_season_year_fresh"        => $rel_data49[$x]['no_season_year_fresh'],
                    "season_of_fishing_fresh"        => $rel_data49[$x]['season_of_fishing_fresh'],
                    "location_fishing_fresh"        => $rel_data49[$x]['location_fishing_fresh'],
                    "no_member_activity_fresh"        => $rel_data49[$x]['no_member_activity_fresh'],
                    "marketing_agent_fresh"        => $rel_data49[$x]['marketing_agent_fresh'],
                    "marketing_location_fresh"        => $rel_data49[$x]['marketing_location_fresh'],
                    "type_payment_fresh"        => $rel_data49[$x]['type_payment_fresh'],
                    "fishing_fresh_remarks"        => $rel_data49[$x]['fishing_fresh_remarks'],
                );
            }
        }

        if (!empty($rel_data50)) {
            for($x = 0; $x < count($rel_data50); $x++){
                $dataseamstpm[] = array(          
                    "generatedcode"         => $rel_data50[$x]['codegen'], 
                    "id_demographic_tpm"        => $rel_data50[$x]['id_demographic_tpm'],
                    "type_trading"        => $rel_data50[$x]['type_trading'],
                    "species_tpm"        => $rel_data50[$x]['species_tpm'],
                    "unit_measurement"        => $rel_data50[$x]['unit_measurement'],
                    "volume_sold_year_tpm"        => $rel_data50[$x]['volume_sold_year_tpm'],
                    "volume_consumed_year_tpm"        => $rel_data50[$x]['volume_consumed_year_tpm'],
                    "price_unit_tpm"        => $rel_data50[$x]['price_unit_tpm'],
                    "value_tpm"        => $rel_data50[$x]['value_tpm'],
                    "season_trading_tpm"        => $rel_data50[$x]['season_trading_tpm'],
                    "location_activity_tpm"        => $rel_data50[$x]['location_activity_tpm'],
                    "no_member_activity_tpm"        => $rel_data50[$x]['no_member_activity_tpm'],
                    "marketing_agent_tpm"        => $rel_data50[$x]['marketing_agent_tpm'],
                    "marketing_location_tpm"        => $rel_data50[$x]['marketing_location_tpm'],
                    "type_payment_tpm"        => $rel_data50[$x]['type_payment_tpm'],
                    "remarks_tpm"        => $rel_data50[$x]['remarks_tpm'],
                );
            }
        }

        if (!empty($rel_data51)) {
            for($x = 0; $x < count($rel_data51); $x++){
                $dataseamsagri[] = array(          
                    "generatedcode"         => $rel_data51[$x]['codegen'], 
                    "id_demographic_agricultural"        => $rel_data51[$x]['id_demographic_agricultural'],
                    "agricultural_type"        => $rel_data51[$x]['agricultural_type'],
                    "species_agricultural"        => $rel_data51[$x]['species_agricultural'],
                    "area_agricultural"        => $rel_data51[$x]['area_agricultural'],
                    "unit_measure_agricultural"        => $rel_data51[$x]['unit_measure_agricultural'],
                    "volume_sold_year_agricultural"        => $rel_data51[$x]['volume_sold_year_agricultural'],
                    "volume_consume_year_agricultural"        => $rel_data51[$x]['volume_consume_year_agricultural'],
                    "price_unit_agricultural"        => $rel_data51[$x]['price_unit_agricultural'],
                    "agricultural_value"        => $rel_data51[$x]['agricultural_value'],
                    "described_agricultural"        => $rel_data51[$x]['described_agricultural'],
                    "location_agricultural"        => $rel_data51[$x]['location_agricultural'],
                    "season_of_agricultural"        => $rel_data51[$x]['season_of_agricultural'],
                    "no_production_year_agricultural"        => $rel_data51[$x]['no_production_year_agricultural'],
                    "no_member_activity_agricultural"        => $rel_data51[$x]['no_member_activity_agricultural'],
                    "marketing_agent_agricultural"        => $rel_data51[$x]['marketing_agent_agricultural'],
                    "marketing_location_agricultural"        => $rel_data51[$x]['marketing_location_agricultural'],
                    "type_payment_agricultural"        => $rel_data51[$x]['type_payment_agricultural'],
                    "agricultural_remarks"        => $rel_data51[$x]['agricultural_remarks'],

                );
            }
        }

        if (!empty($rel_data52)) {
                for($x = 0; $x < count($rel_data52); $x++){
                $dataseamsls[] = array(          
                    "generatedcode"         => $rel_data52[$x]['codegen'], 
                    "id_demographic_livestock"        => $rel_data52[$x]['id_demographic_livestock'],
                    "type_livestock"        => $rel_data52[$x]['type_livestock'],
                    "grazing_area"        => $rel_data52[$x]['grazing_area'],
                    "unit_measure_livestock"        => $rel_data52[$x]['unit_measure_livestock'],
                    "volume_sold_year_livestock"        => $rel_data52[$x]['volume_sold_year_livestock'],
                    "volume_consumed_year_livestock"        => $rel_data52[$x]['volume_consumed_year_livestock'],
                    "price_unit_livestock"        => $rel_data52[$x]['price_unit_livestock'],
                    "value_livestock"        => $rel_data52[$x]['value_livestock'],
                    "location_livestock"        => $rel_data52[$x]['location_livestock'],
                    "specific_activities_livestock"        => $rel_data52[$x]['specific_activities_livestock'],
                    "season_livestock"        => $rel_data52[$x]['season_livestock'],
                    "no_household_livestock"        => $rel_data52[$x]['no_household_livestock'],
                    "marketing_agent_livestock"        => $rel_data52[$x]['marketing_agent_livestock'],
                    "marketing_location_livestock"        => $rel_data52[$x]['marketing_location_livestock'],
                    "type_payment_livestock"        => $rel_data52[$x]['type_payment_livestock'],
                    "remarks_livestock"        => $rel_data52[$x]['remarks_livestock'],
                );
            }
        }

        if (!empty($rel_data53)) {
                for($x = 0; $x < count($rel_data53); $x++){
                $dataseamsnontimber[] = array(    
                    "generatedcode"         => $rel_data53[$x]['codegen'],                       
                    "id_demographic_nontimber"         => $rel_data53[$x]['id_demographic_nontimber'], 
                    "type_nontimber"        => $rel_data53[$x]['type_nontimber'],
                    "species_nontimber"        => $rel_data53[$x]['species_nontimber'],
                    "area_nontimber"        => $rel_data53[$x]['area_nontimber'],
                    "unit_measure_nontimber"        => $rel_data53[$x]['unit_measure_nontimber'],
                    "volume_sold_year_nontimber"        => $rel_data53[$x]['volume_sold_year_nontimber'],
                    "volume_consumed_year_nontimber"        => $rel_data53[$x]['volume_consumed_year_nontimber'],
                    "unit_price_nontimber"        => $rel_data53[$x]['unit_price_nontimber'],
                    "value_nontimber"        => $rel_data53[$x]['value_nontimber'],
                    "location_nontimber"        => $rel_data53[$x]['location_nontimber'],
                    "nontimber_activity"        => $rel_data53[$x]['nontimber_activity'],
                    "season_nontimber"        => $rel_data53[$x]['season_nontimber'],
                    "no_member_activity_nontimber"        => $rel_data53[$x]['no_member_activity_nontimber'],
                    "marketing_agent_nontimber"        => $rel_data53[$x]['marketing_agent_nontimber'],
                    "marketing_location_nontimber"        => $rel_data53[$x]['marketing_location_nontimber'],
                    "type_payment_nontimber"        => $rel_data53[$x]['type_payment_nontimber'],
                    "remarks_nontimber"        => $rel_data53[$x]['remarks_nontimber'],
                );
            }
        }

        if (!empty($rel_data54)) {
                for($x = 0; $x < count($rel_data54); $x++){
                $dataseamstimber[] = array(    
                    "generatedcode"         => $rel_data54[$x]['codegen'],                       
                    "id_demographic_timber"         => $rel_data54[$x]['id_demographic_timber'], 
                    "type_timber"        => $rel_data54[$x]['type_timber'],
                    "species_timber"        => $rel_data54[$x]['species_timber'],
                    "area_timber"        => $rel_data54[$x]['area_timber'],
                    "unit_measure_timber"        => $rel_data54[$x]['unit_measure_timber'],
                    "volume_sold_year_timber"        => $rel_data54[$x]['volume_sold_year_timber'],
                    "volume_consumed_year_timber"        => $rel_data54[$x]['volume_consumed_year_timber'],
                    "unit_price_timber"        => $rel_data54[$x]['unit_price_timber'],
                    "value_timber"        => $rel_data54[$x]['value_timber'],
                    "location_timber"        => $rel_data54[$x]['location_timber'],
                    "timber_activity"        => $rel_data54[$x]['timber_activity'],
                    "season_timber"        => $rel_data54[$x]['season_timber'],
                    "no_member_activity_timber"        => $rel_data54[$x]['no_member_activity_timber'],
                    "marketing_agent_timber"        => $rel_data54[$x]['marketing_agent_timber'],
                    "marketing_location_timber"        => $rel_data54[$x]['marketing_location_timber'],
                    "type_payment_timber"        => $rel_data54[$x]['type_payment_timber'],
                    "remarks_timber"        => $rel_data54[$x]['remarks_timber'],
                );
            }
        }

        if (!empty($rel_data55)) {
                for($x = 0; $x < count($rel_data55); $x++){
                $dataseamsrwc[] = array(    
                    "generatedcode"         => $rel_data55[$x]['codegen'],                       
                    "id_demographic_rwc"         => $rel_data55[$x]['id_demographic_rwc'], 
                    "type_rwc"        => $rel_data55[$x]['type_rwc'],
                    "species_rwc"        => $rel_data55[$x]['species_rwc'],
                    "area_rwc"        => $rel_data55[$x]['area_rwc'],
                    "unit_measure_rwc"        => $rel_data55[$x]['unit_measure_rwc'],
                    "volume_sold_year_rwc"        => $rel_data55[$x]['volume_sold_year_rwc'],
                    "volume_consumed_year_rwc"        => $rel_data55[$x]['volume_consumed_year_rwc'],
                    "unit_price_rwc"        => $rel_data55[$x]['unit_price_rwc'],
                    "value_rwc"        => $rel_data55[$x]['value_rwc'],
                    "location_rwc"        => $rel_data55[$x]['location_rwc'],
                    "rwc_activity"        => $rel_data55[$x]['rwc_activity'],
                    "season_rwc"        => $rel_data55[$x]['season_rwc'],
                    "no_member_activity_rwc"        => $rel_data55[$x]['no_member_activity_rwc'],
                    "marketing_agent_rwc"        => $rel_data55[$x]['marketing_agent_rwc'],
                    "marketing_location_rwc"        => $rel_data55[$x]['marketing_location_rwc'],
                    "type_payment_rwc"        => $rel_data55[$x]['type_payment_rwc'],
                    "remarks_rwc"        => $rel_data55[$x]['remarks_rwc'],
                );
            }
        }

        if (!empty($rel_data56)) {
                for($x = 0; $x < count($rel_data56); $x++){
                $dataseamsmining[] = array(    
                    "generatedcode"         => $rel_data56[$x]['codegen'],                       
                    "id_demographic_mining"         => $rel_data56[$x]['id_demographic_mining'], 
                    "type_mining"        => $rel_data56[$x]['type_mining'],
                    "revenue_month_mining"        => $rel_data56[$x]['revenue_month_mining'],
                    "no_time_year_mining"        => $rel_data56[$x]['no_time_year_mining'],
                    "source_extraction_mining"        => $rel_data56[$x]['source_extraction_mining'],
                    "remarks_mining"        => $rel_data56[$x]['remarks_mining'],                    
                );
            }
        }

        if (!empty($rel_data57)) {
                for($x = 0; $x < count($rel_data57); $x++){
                $dataseamsindustry[] = array(    
                    "generatedcode"         => $rel_data57[$x]['codegen'],                       
                    "id_demographic_industry"         => $rel_data57[$x]['id_demographic_industry'], 
                    "type_industry"        => $rel_data57[$x]['type_industry'],
                    "revenue_month_industry"        => $rel_data57[$x]['revenue_month_industry'],
                    "no_times_year_industry"        => $rel_data57[$x]['no_times_year_industry'],
                    "remarks_industry"        => $rel_data57[$x]['remarks_industry'],                    
                );
            }
        }

        if (!empty($rel_data58)) {
                for($x = 0; $x < count($rel_data58); $x++){
                $dataseamsservice[] = array(    
                    "generatedcode"         => $rel_data58[$x]['codegen'],                       
                    "id_demographic_service"         => $rel_data58[$x]['id_demographic_service'], 
                    "type_service"        => $rel_data58[$x]['type_service'],
                    "revenue_month_service"        => $rel_data58[$x]['revenue_month_service'],
                    "no_times_year_service"        => $rel_data58[$x]['no_times_year_service'],
                    "remarks_service"        => $rel_data58[$x]['remarks_service'],                    
                );
            }
        }

        if (!empty($rel_data59)) {
                for($x = 0; $x < count($rel_data59); $x++){
                $dataseamssource[] = array(    
                    "generatedcode"         => $rel_data59[$x]['codegen'],                       
                    "id_demographic_source"         => $rel_data59[$x]['id_demographic_source'], 
                    "type_source"        => $rel_data59[$x]['type_source'],
                    "revenue_month_source"        => $rel_data59[$x]['revenue_month_source'],
                    "no_times_year_source"        => $rel_data59[$x]['no_times_year_source'],
                    "remarks_source"        => $rel_data59[$x]['remarks_source'],                    
                );
            }
        }

        if (!empty($rel_data60)) {
                for($x = 0; $x < count($rel_data60); $x++){
                $dataseamsEcoMaterial[] = array(    
                    "generatedcode"         => $rel_data60[$x]['codegen'],                       
                    "id_demographic_ecocostmaterial"         => $rel_data60[$x]['id_demographic_ecocostmaterial'], 
                    "item_ecocostmaterial"        => $rel_data60[$x]['item_ecocostmaterial'],
                    "annualcost_ecocostmaterial"        => $rel_data60[$x]['annualcost_ecocostmaterial'],
                    "unit_ecocostmaterial"        => $rel_data60[$x]['unit_ecocostmaterial'],
                    "avgpriceunit_ecocostmaterial"        => $rel_data60[$x]['avgpriceunit_ecocostmaterial'],  
                    "noincurredyear_ecocostmaterial"        => $rel_data60[$x]['noincurredyear_ecocostmaterial'], 
                    "costincurredstage_ecocostmaterial"        => $rel_data60[$x]['costincurredstage_ecocostmaterial'], 
                );
            }
        }

        if (!empty($rel_data61)) {
                for($x = 0; $x < count($rel_data61); $x++){
                $dataseamsEcoEquipment[] = array(    
                    "generatedcode"         => $rel_data61[$x]['codegen'],                       
                    "id_demographic_ecocostequipment"         => $rel_data61[$x]['id_demographic_ecocostequipment'], 
                    "item_ecocostequipment"        => $rel_data61[$x]['item_ecocostequipment'],
                    "annualcost_ecocostequipment"        => $rel_data61[$x]['annualcost_ecocostequipment'],
                    "unit_ecocostequipment"        => $rel_data61[$x]['unit_ecocostequipment'],
                    "avgpriceunit_ecocostequipment"        => $rel_data61[$x]['avgpriceunit_ecocostequipment'],  
                    "noincurredyear_ecocostequipment"        => $rel_data61[$x]['noincurredyear_ecocostequipment'], 
                    "costincurredstage_ecocostequipment"        => $rel_data61[$x]['costincurredstage_ecocostequipment'], 
                );
            }
        }

        if (!empty($rel_data62)) {
                for($x = 0; $x < count($rel_data62); $x++){
                $dataseamsEcoLabor[] = array(    
                    "generatedcode"         => $rel_data62[$x]['codegen'],                       
                    "id_demographic_ecocostlabor"         => $rel_data62[$x]['id_demographic_ecocostlabor'], 
                    "item_ecocostlabor"        => $rel_data62[$x]['item_ecocostlabor'],
                    "annualcost_ecocostlabor"        => $rel_data62[$x]['annualcost_ecocostlabor'],
                    "unit_ecocostlabor"        => $rel_data62[$x]['unit_ecocostlabor'],
                    "avgpriceunit_ecocostlabor"        => $rel_data62[$x]['avgpriceunit_ecocostlabor'],  
                    "noincurredyear_ecocostlabor"        => $rel_data62[$x]['noincurredyear_ecocostlabor'], 
                    "costincurredstage_ecocostlabor"        => $rel_data62[$x]['costincurredstage_ecocostlabor'], 
                );
            }
        }

        if (!empty($rel_data63)) {
                for($x = 0; $x < count($rel_data63); $x++){
                $dataseamsEcoOther[] = array(    
                    "generatedcode"         => $rel_data63[$x]['codegen'],                       
                    "id_demographic_ecocostother"         => $rel_data63[$x]['id_demographic_ecocostother'], 
                    "item_ecocostother"        => $rel_data63[$x]['item_ecocostother'],
                    "annualcost_ecocostother"        => $rel_data63[$x]['annualcost_ecocostother'],
                    "unit_ecocostother"        => $rel_data63[$x]['unit_ecocostother'],
                    "avgpriceunit_ecocostother"        => $rel_data63[$x]['avgpriceunit_ecocostother'],  
                    "noincurredyear_ecocostother"        => $rel_data63[$x]['noincurredyear_ecocostother'], 
                    "costincurredstage_ecocostother"        => $rel_data63[$x]['costincurredstage_ecocostother'], 
                );
            }
        }

        if (!empty($rel_data64)) {
                for($x = 0; $x < count($rel_data64); $x++){
                $dataseamsfsMaterial[] = array(    
                    "generatedcode"         => $rel_data64[$x]['codegen'],                       
                    "id_demographic_fishsaltcostmaterial"         => $rel_data64[$x]['id_demographic_fishsaltcostmaterial'], 
                    "item_fishsaltcostmaterial"        => $rel_data64[$x]['item_fishsaltcostmaterial'],
                    "annualcost_fishsaltcostmaterial"        => $rel_data64[$x]['annualcost_fishsaltcostmaterial'],
                    "unit_fishsaltcostmaterial"        => $rel_data64[$x]['unit_fishsaltcostmaterial'],
                    "avgpriceunit_fishsaltcostmaterial"        => $rel_data64[$x]['avgpriceunit_fishsaltcostmaterial'],  
                    "noincurredyear_fishsaltcostmaterial"        => $rel_data64[$x]['noincurredyear_fishsaltcostmaterial'], 
                    "costincurredstage_fishsaltcostmaterial"        => $rel_data64[$x]['costincurredstage_fishsaltcostmaterial'], 
                );
            }
        }

        if (!empty($rel_data65)) {
                for($x = 0; $x < count($rel_data65); $x++){
                $dataseamsfsEquip[] = array(    
                    "generatedcode"         => $rel_data65[$x]['codegen'],                       
                    "id_demographic_fishsaltcostequipment"         => $rel_data65[$x]['id_demographic_fishsaltcostequipment'], 
                    "item_fishsaltcostequipment"        => $rel_data65[$x]['item_fishsaltcostequipment'],
                    "annualcost_fishsaltcostequipment"        => $rel_data65[$x]['annualcost_fishsaltcostequipment'],
                    "unit_fishsaltcostequipment"        => $rel_data65[$x]['unit_fishsaltcostequipment'],
                    "avgpriceunit_fishsaltcostequipment"        => $rel_data65[$x]['avgpriceunit_fishsaltcostequipment'],  
                    "noincurredyear_fishsaltcostequipment"        => $rel_data65[$x]['noincurredyear_fishsaltcostequipment'], 
                    "costincurredstage_fishsaltcostequipment"        => $rel_data65[$x]['costincurredstage_fishsaltcostequipment'], 
                );
            }
        }

        if (!empty($rel_data66)) {
                for($x = 0; $x < count($rel_data66); $x++){
                $dataseamsfsLabor[] = array(    
                    "generatedcode"         => $rel_data66[$x]['codegen'],                       
                    "id_demographic_fishsaltcostlabor"         => $rel_data66[$x]['id_demographic_fishsaltcostlabor'], 
                    "item_fishsaltcostlabor"        => $rel_data66[$x]['item_fishsaltcostlabor'],
                    "annualcost_fishsaltcostlabor"        => $rel_data66[$x]['annualcost_fishsaltcostlabor'],
                    "unit_fishsaltcostlabor"        => $rel_data66[$x]['unit_fishsaltcostlabor'],
                    "avgpriceunit_fishsaltcostlabor"        => $rel_data66[$x]['avgpriceunit_fishsaltcostlabor'],  
                    "noincurredyear_fishsaltcostlabor"        => $rel_data66[$x]['noincurredyear_fishsaltcostlabor'], 
                    "costincurredstage_fishsaltcostlabor"        => $rel_data66[$x]['costincurredstage_fishsaltcostlabor'], 
                );
            }
        }

        if (!empty($rel_data67)) {
                for($x = 0; $x < count($rel_data67); $x++){
                $dataseamsfsOther[] = array(    
                    "generatedcode"         => $rel_data67[$x]['codegen'],                       
                    "id_demographic_fishsaltcostother"         => $rel_data67[$x]['id_demographic_fishsaltcostother'], 
                    "item_fishsaltcostother"        => $rel_data67[$x]['item_fishsaltcostother'],
                    "annualcost_fishsaltcostother"        => $rel_data67[$x]['annualcost_fishsaltcostother'],
                    "unit_fishsaltcostother"        => $rel_data67[$x]['unit_fishsaltcostother'],
                    "avgpriceunit_fishsaltcostother"        => $rel_data67[$x]['avgpriceunit_fishsaltcostother'],  
                    "noincurredyear_fishsaltcostother"        => $rel_data67[$x]['noincurredyear_fishsaltcostother'], 
                    "costincurredstage_fishsaltcostother"        => $rel_data67[$x]['costincurredstage_fishsaltcostother'], 
                );
            }
        }

        if (!empty($rel_data68)) {
                for($x = 0; $x < count($rel_data68); $x++){
                $dataseamsffMaterial[] = array(    
                    "generatedcode"         => $rel_data68[$x]['codegen'],                       
                    "id_demographic_fishfreshcostmaterial"         => $rel_data68[$x]['id_demographic_fishfreshcostmaterial'], 
                    "item_fishfreshcostmaterial"        => $rel_data68[$x]['item_fishfreshcostmaterial'],
                    "annualcost_fishfreshcostmaterial"        => $rel_data68[$x]['annualcost_fishfreshcostmaterial'],
                    "unit_fishfreshcostmaterial"        => $rel_data68[$x]['unit_fishfreshcostmaterial'],
                    "avgpriceunit_fishfreshcostmaterial"        => $rel_data68[$x]['avgpriceunit_fishfreshcostmaterial'],  
                    "noincurredyear_fishfreshcostmaterial"        => $rel_data68[$x]['noincurredyear_fishfreshcostmaterial'], 
                    "costincurredstage_fishfreshcostmaterial"        => $rel_data68[$x]['costincurredstage_fishfreshcostmaterial'], 
                );
            }
        }

        if (!empty($rel_data69)) {
                for($x = 0; $x < count($rel_data69); $x++){
                $dataseamsffEquip[] = array(    
                    "generatedcode"         => $rel_data69[$x]['codegen'],                       
                    "id_demographic_fishfreshcostequipment"         => $rel_data69[$x]['id_demographic_fishfreshcostequipment'], 
                    "item_fishfreshcostequipment"        => $rel_data69[$x]['item_fishfreshcostequipment'],
                    "annualcost_fishfreshcostequipment"        => $rel_data69[$x]['annualcost_fishfreshcostequipment'],
                    "unit_fishfreshcostequipment"        => $rel_data69[$x]['unit_fishfreshcostequipment'],
                    "avgpriceunit_fishfreshcostequipment"        => $rel_data69[$x]['avgpriceunit_fishfreshcostequipment'],  
                    "noincurredyear_fishfreshcostequipment"        => $rel_data69[$x]['noincurredyear_fishfreshcostequipment'], 
                    "costincurredstage_fishfreshcostequipment"        => $rel_data69[$x]['costincurredstage_fishfreshcostequipment'], 
                );
            }
        }

        if (!empty($rel_data70)) {
                for($x = 0; $x < count($rel_data70); $x++){
                $dataseamsffLabor[] = array(    
                    "generatedcode"         => $rel_data70[$x]['codegen'],                       
                    "id_demographic_fishfreshcostlabor"         => $rel_data70[$x]['id_demographic_fishfreshcostlabor'], 
                    "item_fishfreshcostlabor"        => $rel_data70[$x]['item_fishfreshcostlabor'],
                    "annualcost_fishfreshcostlabor"        => $rel_data70[$x]['annualcost_fishfreshcostlabor'],
                    "unit_fishfreshcostlabor"        => $rel_data70[$x]['unit_fishfreshcostlabor'],
                    "avgpriceunit_fishfreshcostlabor"        => $rel_data70[$x]['avgpriceunit_fishfreshcostlabor'],  
                    "noincurredyear_fishfreshcostlabor"        => $rel_data70[$x]['noincurredyear_fishfreshcostlabor'], 
                    "costincurredstage_fishfreshcostlabor"        => $rel_data70[$x]['costincurredstage_fishfreshcostlabor'], 
                );
            }
        }

        if (!empty($rel_data71)) {
                for($x = 0; $x < count($rel_data71); $x++){
                $dataseamsffOther[] = array(    
                    "generatedcode"         => $rel_data71[$x]['codegen'],                       
                    "id_demographic_fishfreshcostother"         => $rel_data71[$x]['id_demographic_fishfreshcostother'], 
                    "item_fishfreshcostother"        => $rel_data71[$x]['item_fishfreshcostother'],
                    "annualcost_fishfreshcostother"        => $rel_data71[$x]['annualcost_fishfreshcostother'],
                    "unit_fishfreshcostother"        => $rel_data71[$x]['unit_fishfreshcostother'],
                    "avgpriceunit_fishfreshcostother"        => $rel_data71[$x]['avgpriceunit_fishfreshcostother'],  
                    "noincurredyear_fishfreshcostother"        => $rel_data71[$x]['noincurredyear_fishfreshcostother'], 
                    "costincurredstage_fishfreshcostother"        => $rel_data71[$x]['costincurredstage_fishfreshcostother'], 
                );
            }
        }

        if (!empty($rel_data72)) {
                for($x = 0; $x < count($rel_data72); $x++){
                $dataseamstpmMaterial[] = array(    
                    "generatedcode"         => $rel_data72[$x]['codegen'],                       
                    "id_demographic_tpmcostmaterial"         => $rel_data72[$x]['id_demographic_tpmcostmaterial'], 
                    "item_tpmcostmaterial"        => $rel_data72[$x]['item_tpmcostmaterial'],
                    "annualcost_tpmcostmaterial"        => $rel_data72[$x]['annualcost_tpmcostmaterial'],
                    "unit_tpmcostmaterial"        => $rel_data72[$x]['unit_tpmcostmaterial'],
                    "avgpriceunit_tpmcostmaterial"        => $rel_data72[$x]['avgpriceunit_tpmcostmaterial'],  
                    "noincurredyear_tpmcostmaterial"        => $rel_data72[$x]['noincurredyear_tpmcostmaterial'], 
                    "costincurredstage_tpmcostmaterial"        => $rel_data72[$x]['costincurredstage_tpmcostmaterial'], 
                );
            }
        }

        if (!empty($rel_data73)) {
                for($x = 0; $x < count($rel_data73); $x++){
                $dataseamstpmEquip[] = array(    
                    "generatedcode"         => $rel_data73[$x]['codegen'],                       
                    "id_demographic_tpmcostequipment"         => $rel_data73[$x]['id_demographic_tpmcostequipment'], 
                    "item_tpmcostequipment"        => $rel_data73[$x]['item_tpmcostequipment'],
                    "annualcost_tpmcostequipment"        => $rel_data73[$x]['annualcost_tpmcostequipment'],
                    "unit_tpmcostequipment"        => $rel_data73[$x]['unit_tpmcostequipment'],
                    "avgpriceunit_tpmcostequipment"        => $rel_data73[$x]['avgpriceunit_tpmcostequipment'],  
                    "noincurredyear_tpmcostequipment"        => $rel_data73[$x]['noincurredyear_tpmcostequipment'], 
                    "costincurredstage_tpmcostequipment"        => $rel_data73[$x]['costincurredstage_tpmcostequipment'], 
                );
            }
        }

        if (!empty($rel_data74)) {
                for($x = 0; $x < count($rel_data74); $x++){
                $dataseamstpmLabor[] = array(    
                    "generatedcode"         => $rel_data74[$x]['codegen'],                       
                    "id_demographic_tpmcostlabor"         => $rel_data74[$x]['id_demographic_tpmcostlabor'], 
                    "item_tpmcostlabor"        => $rel_data74[$x]['item_tpmcostlabor'],
                    "annualcost_tpmcostlabor"        => $rel_data74[$x]['annualcost_tpmcostlabor'],
                    "unit_tpmcostlabor"        => $rel_data74[$x]['unit_tpmcostlabor'],
                    "avgpriceunit_tpmcostlabor"        => $rel_data74[$x]['avgpriceunit_tpmcostlabor'],  
                    "noincurredyear_tpmcostlabor"        => $rel_data74[$x]['noincurredyear_tpmcostlabor'], 
                    "costincurredstage_tpmcostlabor"        => $rel_data74[$x]['costincurredstage_tpmcostlabor'], 
                );
            }
        }

        if (!empty($rel_data75)) {
                for($x = 0; $x < count($rel_data75); $x++){
                $dataseamstpmOther[] = array(    
                    "generatedcode"         => $rel_data75[$x]['codegen'],                       
                    "id_demographic_tpmcostother"         => $rel_data75[$x]['id_demographic_tpmcostother'], 
                    "item_tpmcostother"        => $rel_data75[$x]['item_tpmcostother'],
                    "annualcost_tpmcostother"        => $rel_data75[$x]['annualcost_tpmcostother'],
                    "unit_tpmcostother"        => $rel_data75[$x]['unit_tpmcostother'],
                    "avgpriceunit_tpmcostother"        => $rel_data75[$x]['avgpriceunit_tpmcostother'],  
                    "noincurredyear_tpmcostother"        => $rel_data75[$x]['noincurredyear_tpmcostother'], 
                    "costincurredstage_tpmcostother"        => $rel_data75[$x]['costincurredstage_tpmcostother'], 
                );
            }
        }

        if (!empty($rel_data76)) {
                for($x = 0; $x < count($rel_data76); $x++){
                $dataseamsagriMaterial[] = array(    
                    "generatedcode"         => $rel_data76[$x]['codegen'],                       
                    "id_demographic_agricostmaterial"         => $rel_data76[$x]['id_demographic_agricostmaterial'], 
                    "item_agricostmaterial"        => $rel_data76[$x]['item_agricostmaterial'],
                    "annualcost_agricostmaterial"        => $rel_data76[$x]['annualcost_agricostmaterial'],
                    "unit_agricostmaterial"        => $rel_data76[$x]['unit_agricostmaterial'],
                    "avgpriceunit_agricostmaterial"        => $rel_data76[$x]['avgpriceunit_agricostmaterial'],  
                    "noincurredyear_agricostmaterial"        => $rel_data76[$x]['noincurredyear_agricostmaterial'], 
                    "costincurredstage_agricostmaterial"        => $rel_data76[$x]['costincurredstage_agricostmaterial'], 
                );
            }
        }

        if (!empty($rel_data77)) {
                for($x = 0; $x < count($rel_data77); $x++){
                $dataseamsagriEquip[] = array(    
                    "generatedcode"         => $rel_data77[$x]['codegen'],                       
                    "id_demographic_agricostequipment"         => $rel_data77[$x]['id_demographic_agricostequipment'], 
                    "item_agricostequipment"        => $rel_data77[$x]['item_agricostequipment'],
                    "annualcost_agricostequipment"        => $rel_data77[$x]['annualcost_agricostequipment'],
                    "unit_agricostequipment"        => $rel_data77[$x]['unit_agricostequipment'],
                    "avgpriceunit_agricostequipment"        => $rel_data77[$x]['avgpriceunit_agricostequipment'],  
                    "noincurredyear_agricostequipment"        => $rel_data77[$x]['noincurredyear_agricostequipment'], 
                    "costincurredstage_agricostequipment"        => $rel_data77[$x]['costincurredstage_agricostequipment'], 
                );
            }
        }

        if (!empty($rel_data78)) {
                for($x = 0; $x < count($rel_data78); $x++){
                $dataseamsagriLabor[] = array(    
                    "generatedcode"         => $rel_data78[$x]['codegen'],                       
                    "id_demographic_agricostlabor"         => $rel_data78[$x]['id_demographic_agricostlabor'], 
                    "item_agricostlabor"        => $rel_data78[$x]['item_agricostlabor'],
                    "annualcost_agricostlabor"        => $rel_data78[$x]['annualcost_agricostlabor'],
                    "unit_agricostlabor"        => $rel_data78[$x]['unit_agricostlabor'],
                    "avgpriceunit_agricostlabor"        => $rel_data78[$x]['avgpriceunit_agricostlabor'],  
                    "noincurredyear_agricostlabor"        => $rel_data78[$x]['noincurredyear_agricostlabor'], 
                    "costincurredstage_agricostlabor"        => $rel_data78[$x]['costincurredstage_agricostlabor'], 
                );
            }
        }

        if (!empty($rel_data79)) {
                for($x = 0; $x < count($rel_data79); $x++){
                $dataseamsagriOther[] = array(    
                    "generatedcode"         => $rel_data79[$x]['codegen'],                       
                    "id_demographic_agricostother"         => $rel_data79[$x]['id_demographic_agricostother'], 
                    "item_agricostother"        => $rel_data79[$x]['item_agricostother'],
                    "annualcost_agricostother"        => $rel_data79[$x]['annualcost_agricostother'],
                    "unit_agricostother"        => $rel_data79[$x]['unit_agricostother'],
                    "avgpriceunit_agricostother"        => $rel_data79[$x]['avgpriceunit_agricostother'],  
                    "noincurredyear_agricostother"        => $rel_data79[$x]['noincurredyear_agricostother'], 
                    "costincurredstage_agricostother"        => $rel_data79[$x]['costincurredstage_agricostother'], 
                );
            }
        }

        if (!empty($rel_data80)) {
                for($x = 0; $x < count($rel_data80); $x++){
                $dataseamslivestockMaterial[] = array(    
                    "generatedcode"         => $rel_data80[$x]['codegen'],                       
                    "id_demographic_livestockcostmaterial"         => $rel_data80[$x]['id_demographic_livestockcostmaterial'], 
                    "item_livestockcostmaterial"        => $rel_data80[$x]['item_livestockcostmaterial'],
                    "annualcost_livestockcostmaterial"        => $rel_data80[$x]['annualcost_livestockcostmaterial'],
                    "unit_livestockcostmaterial"        => $rel_data80[$x]['unit_livestockcostmaterial'],
                    "avgpriceunit_livestockcostmaterial"        => $rel_data80[$x]['avgpriceunit_livestockcostmaterial'],  
                    "noincurredyear_livestockcostmaterial"        => $rel_data80[$x]['noincurredyear_livestockcostmaterial'], 
                    "costincurredstage_livestockcostmaterial"        => $rel_data80[$x]['costincurredstage_livestockcostmaterial'], 
                );
            }
        }

        if (!empty($rel_data81)) {
                for($x = 0; $x < count($rel_data81); $x++){
                $dataseamslivestockEquip[] = array(    
                    "generatedcode"         => $rel_data81[$x]['codegen'],                       
                    "id_demographic_livestockcostequipment"         => $rel_data81[$x]['id_demographic_livestockcostequipment'], 
                    "item_livestockcostequipment"        => $rel_data81[$x]['item_livestockcostequipment'],
                    "annualcost_livestockcostequipment"        => $rel_data81[$x]['annualcost_livestockcostequipment'],
                    "unit_livestockcostequipment"        => $rel_data81[$x]['unit_livestockcostequipment'],
                    "avgpriceunit_livestockcostequipment"        => $rel_data81[$x]['avgpriceunit_livestockcostequipment'],  
                    "noincurredyear_livestockcostequipment"        => $rel_data81[$x]['noincurredyear_livestockcostequipment'], 
                    "costincurredstage_livestockcostequipment"        => $rel_data81[$x]['costincurredstage_livestockcostequipment'], 
                );
            }
        }

        if (!empty($rel_data82)) {
                for($x = 0; $x < count($rel_data82); $x++){
                $dataseamslivestockLabor[] = array(    
                    "generatedcode"         => $rel_data82[$x]['codegen'],                       
                    "id_demographic_livestockcostlabor"         => $rel_data82[$x]['id_demographic_livestockcostlabor'], 
                    "item_livestockcostlabor"        => $rel_data82[$x]['item_livestockcostlabor'],
                    "annualcost_livestockcostlabor"        => $rel_data82[$x]['annualcost_livestockcostlabor'],
                    "unit_livestockcostlabor"        => $rel_data82[$x]['unit_livestockcostlabor'],
                    "avgpriceunit_livestockcostlabor"        => $rel_data82[$x]['avgpriceunit_livestockcostlabor'],  
                    "noincurredyear_livestockcostlabor"        => $rel_data82[$x]['noincurredyear_livestockcostlabor'], 
                    "costincurredstage_livestockcostlabor"        => $rel_data82[$x]['costincurredstage_livestockcostlabor'], 
                );
            }
        }

        if (!empty($rel_data83)) {
                for($x = 0; $x < count($rel_data83); $x++){
                $dataseamslivestockOther[] = array(    
                    "generatedcode"         => $rel_data83[$x]['codegen'],                       
                    "id_demographic_livestockcostother"         => $rel_data83[$x]['id_demographic_livestockcostother'], 
                    "item_livestockcostother"        => $rel_data83[$x]['item_livestockcostother'],
                    "annualcost_livestockcostother"        => $rel_data83[$x]['annualcost_livestockcostother'],
                    "unit_livestockcostother"        => $rel_data83[$x]['unit_livestockcostother'],
                    "avgpriceunit_livestockcostother"        => $rel_data83[$x]['avgpriceunit_livestockcostother'],  
                    "noincurredyear_livestockcostother"        => $rel_data83[$x]['noincurredyear_livestockcostother'], 
                    "costincurredstage_livestockcostother"        => $rel_data83[$x]['costincurredstage_livestockcostother'], 
                );
            }
        }

        if (!empty($rel_data84)) {
                for($x = 0; $x < count($rel_data84); $x++){
                $dataseamsnontimberMaterial[] = array(    
                    "generatedcode"         => $rel_data84[$x]['codegen'],                       
                    "id_demographic_nontimbercostmaterial"         => $rel_data84[$x]['id_demographic_nontimbercostmaterial'], 
                    "item_nontimbercostmaterial"        => $rel_data84[$x]['item_nontimbercostmaterial'],
                    "annualcost_nontimbercostmaterial"        => $rel_data84[$x]['annualcost_nontimbercostmaterial'],
                    "unit_nontimbercostmaterial"        => $rel_data84[$x]['unit_nontimbercostmaterial'],
                    "avgpriceunit_nontimbercostmaterial"        => $rel_data84[$x]['avgpriceunit_nontimbercostmaterial'],  
                    "noincurredyear_nontimbercostmaterial"        => $rel_data84[$x]['noincurredyear_nontimbercostmaterial'], 
                    "costincurredstage_nontimbercostmaterial"        => $rel_data84[$x]['costincurredstage_nontimbercostmaterial'], 
                );
            }
        }

        if (!empty($rel_data85)) {
                for($x = 0; $x < count($rel_data85); $x++){
                $dataseamsnontimberEquip[] = array(    
                    "generatedcode"         => $rel_data85[$x]['codegen'],                       
                    "id_demographic_nontimbercostequipment"         => $rel_data85[$x]['id_demographic_nontimbercostequipment'], 
                    "item_nontimbercostequipment"        => $rel_data85[$x]['item_nontimbercostequipment'],
                    "annualcost_nontimbercostequipment"        => $rel_data85[$x]['annualcost_nontimbercostequipment'],
                    "unit_nontimbercostequipment"        => $rel_data85[$x]['unit_nontimbercostequipment'],
                    "avgpriceunit_nontimbercostequipment"        => $rel_data85[$x]['avgpriceunit_nontimbercostequipment'],  
                    "noincurredyear_nontimbercostequipment"        => $rel_data85[$x]['noincurredyear_nontimbercostequipment'], 
                    "costincurredstage_nontimbercostequipment"        => $rel_data85[$x]['costincurredstage_nontimbercostequipment'], 
                );
            }
        }

        if (!empty($rel_data86)) {
                for($x = 0; $x < count($rel_data86); $x++){
                $dataseamsnontimberLabor[] = array(    
                    "generatedcode"         => $rel_data86[$x]['codegen'],                       
                    "id_demographic_nontimbercostlabor"         => $rel_data86[$x]['id_demographic_nontimbercostlabor'], 
                    "item_nontimbercostlabor"        => $rel_data86[$x]['item_nontimbercostlabor'],
                    "annualcost_nontimbercostlabor"        => $rel_data86[$x]['annualcost_nontimbercostlabor'],
                    "unit_nontimbercostlabor"        => $rel_data86[$x]['unit_nontimbercostlabor'],
                    "avgpriceunit_nontimbercostlabor"        => $rel_data86[$x]['avgpriceunit_nontimbercostlabor'],  
                    "noincurredyear_nontimbercostlabor"        => $rel_data86[$x]['noincurredyear_nontimbercostlabor'], 
                    "costincurredstage_nontimbercostlabor"        => $rel_data86[$x]['costincurredstage_nontimbercostlabor'], 
                );
            }
        }

        if (!empty($rel_data87)) {
                for($x = 0; $x < count($rel_data87); $x++){
                $dataseamsnontimberOther[] = array(    
                    "generatedcode"         => $rel_data87[$x]['codegen'],                       
                    "id_demographic_nontimbercostother"         => $rel_data87[$x]['id_demographic_nontimbercostother'], 
                    "item_nontimbercostother"        => $rel_data87[$x]['item_nontimbercostother'],
                    "annualcost_nontimbercostother"        => $rel_data87[$x]['annualcost_nontimbercostother'],
                    "unit_nontimbercostother"        => $rel_data87[$x]['unit_nontimbercostother'],
                    "avgpriceunit_nontimbercostother"        => $rel_data87[$x]['avgpriceunit_nontimbercostother'],  
                    "noincurredyear_nontimbercostother"        => $rel_data87[$x]['noincurredyear_nontimbercostother'], 
                    "costincurredstage_nontimbercostother"        => $rel_data87[$x]['costincurredstage_nontimbercostother'], 
                );
            }
        }

        if (!empty($rel_data88)) {
                for($x = 0; $x < count($rel_data88); $x++){
                $dataseamstimberMaterial[] = array(    
                    "generatedcode"         => $rel_data88[$x]['codegen'],                       
                    "id_demographic_timbercostmaterial"         => $rel_data88[$x]['id_demographic_timbercostmaterial'], 
                    "item_timbercostmaterial"        => $rel_data88[$x]['item_timbercostmaterial'],
                    "annualcost_timbercostmaterial"        => $rel_data88[$x]['annualcost_timbercostmaterial'],
                    "unit_timbercostmaterial"        => $rel_data88[$x]['unit_timbercostmaterial'],
                    "avgpriceunit_timbercostmaterial"        => $rel_data88[$x]['avgpriceunit_timbercostmaterial'],  
                    "noincurredyear_timbercostmaterial"        => $rel_data88[$x]['noincurredyear_timbercostmaterial'], 
                    "costincurredstage_timbercostmaterial"        => $rel_data88[$x]['costincurredstage_timbercostmaterial'], 
                );
            }
        }

        if (!empty($rel_data89)) {
                for($x = 0; $x < count($rel_data89); $x++){
                $dataseamstimberEquip[] = array(    
                    "generatedcode"         => $rel_data89[$x]['codegen'],                       
                    "id_demographic_timbercostequipment"         => $rel_data89[$x]['id_demographic_timbercostequipment'], 
                    "item_timbercostequipment"        => $rel_data89[$x]['item_timbercostequipment'],
                    "annualcost_timbercostequipment"        => $rel_data89[$x]['annualcost_timbercostequipment'],
                    "unit_timbercostequipment"        => $rel_data89[$x]['unit_timbercostequipment'],
                    "avgpriceunit_timbercostequipment"        => $rel_data89[$x]['avgpriceunit_timbercostequipment'],  
                    "noincurredyear_timbercostequipment"        => $rel_data89[$x]['noincurredyear_timbercostequipment'], 
                    "costincurredstage_timbercostequipment"        => $rel_data89[$x]['costincurredstage_timbercostequipment'], 
                );
            }
        }

        if (!empty($rel_data90)) {
                for($x = 0; $x < count($rel_data90); $x++){
                $dataseamstimberLabor[] = array(    
                    "generatedcode"         => $rel_data90[$x]['codegen'],                       
                    "id_demographic_timbercostlabor"         => $rel_data90[$x]['id_demographic_timbercostlabor'], 
                    "item_timbercostlabor"        => $rel_data90[$x]['item_timbercostlabor'],
                    "annualcost_timbercostlabor"        => $rel_data90[$x]['annualcost_timbercostlabor'],
                    "unit_timbercostlabor"        => $rel_data90[$x]['unit_timbercostlabor'],
                    "avgpriceunit_timbercostlabor"        => $rel_data90[$x]['avgpriceunit_timbercostlabor'],  
                    "noincurredyear_timbercostlabor"        => $rel_data90[$x]['noincurredyear_timbercostlabor'], 
                    "costincurredstage_timbercostlabor"        => $rel_data90[$x]['costincurredstage_timbercostlabor'], 
                );
            }
        }

        if (!empty($rel_data91)) {
                for($x = 0; $x < count($rel_data91); $x++){
                $dataseamstimberOther[] = array(    
                    "generatedcode"         => $rel_data91[$x]['codegen'],                       
                    "id_demographic_timbercostother"         => $rel_data91[$x]['id_demographic_timbercostother'], 
                    "item_timbercostother"        => $rel_data91[$x]['item_timbercostother'],
                    "annualcost_timbercostother"        => $rel_data91[$x]['annualcost_timbercostother'],
                    "unit_timbercostother"        => $rel_data91[$x]['unit_timbercostother'],
                    "avgpriceunit_timbercostother"        => $rel_data91[$x]['avgpriceunit_timbercostother'],  
                    "noincurredyear_timbercostother"        => $rel_data91[$x]['noincurredyear_timbercostother'], 
                    "costincurredstage_timbercostother"        => $rel_data91[$x]['costincurredstage_timbercostother'], 
                );
            }
        }

        if (!empty($rel_data92)) {
                for($x = 0; $x < count($rel_data92); $x++){
                $dataseamswildlifeMaterial[] = array(    
                    "generatedcode"         => $rel_data92[$x]['codegen'],                       
                    "id_demographic_wildlifecostmaterial"         => $rel_data92[$x]['id_demographic_wildlifecostmaterial'], 
                    "item_wildlifecostmaterial"        => $rel_data92[$x]['item_wildlifecostmaterial'],
                    "annualcost_wildlifecostmaterial"        => $rel_data92[$x]['annualcost_wildlifecostmaterial'],
                    "unit_wildlifecostmaterial"        => $rel_data92[$x]['unit_wildlifecostmaterial'],
                    "avgpriceunit_wildlifecostmaterial"        => $rel_data92[$x]['avgpriceunit_wildlifecostmaterial'],  
                    "noincurredyear_wildlifecostmaterial"        => $rel_data92[$x]['noincurredyear_wildlifecostmaterial'], 
                    "costincurredstage_wildlifecostmaterial"        => $rel_data92[$x]['costincurredstage_wildlifecostmaterial'], 
                );
            }
        }

        if (!empty($rel_data93)) {
                for($x = 0; $x < count($rel_data93); $x++){
                $dataseamswildlifeEquip[] = array(    
                    "generatedcode"         => $rel_data93[$x]['codegen'],                       
                    "id_demographic_wildlifecostequipment"         => $rel_data93[$x]['id_demographic_wildlifecostequipment'], 
                    "item_wildlifecostequipment"        => $rel_data93[$x]['item_wildlifecostequipment'],
                    "annualcost_wildlifecostequipment"        => $rel_data93[$x]['annualcost_wildlifecostequipment'],
                    "unit_wildlifecostequipment"        => $rel_data93[$x]['unit_wildlifecostequipment'],
                    "avgpriceunit_wildlifecostequipment"        => $rel_data93[$x]['avgpriceunit_wildlifecostequipment'],  
                    "noincurredyear_wildlifecostequipment"        => $rel_data93[$x]['noincurredyear_wildlifecostequipment'], 
                    "costincurredstage_wildlifecostequipment"        => $rel_data93[$x]['costincurredstage_wildlifecostequipment'], 
                );
            }
        }

        if (!empty($rel_data94)) {
                for($x = 0; $x < count($rel_data94); $x++){
                $dataseamswildlifeLabor[] = array(    
                    "generatedcode"         => $rel_data94[$x]['codegen'],                       
                    "id_demographic_wildlifecostlabor"         => $rel_data94[$x]['id_demographic_wildlifecostlabor'], 
                    "item_wildlifecostlabor"        => $rel_data94[$x]['item_wildlifecostlabor'],
                    "annualcost_wildlifecostlabor"        => $rel_data94[$x]['annualcost_wildlifecostlabor'],
                    "unit_wildlifecostlabor"        => $rel_data94[$x]['unit_wildlifecostlabor'],
                    "avgpriceunit_wildlifecostlabor"        => $rel_data94[$x]['avgpriceunit_wildlifecostlabor'],  
                    "noincurredyear_wildlifecostlabor"        => $rel_data94[$x]['noincurredyear_wildlifecostlabor'], 
                    "costincurredstage_wildlifecostlabor"        => $rel_data94[$x]['costincurredstage_wildlifecostlabor'], 
                );
            }
        }

        if (!empty($rel_data95)) {
                for($x = 0; $x < count($rel_data95); $x++){
                $dataseamswildlifeOther[] = array(    
                    "generatedcode"         => $rel_data95[$x]['codegen'],                       
                    "id_demographic_wildlifecostother"         => $rel_data95[$x]['id_demographic_wildlifecostother'], 
                    "item_wildlifecostother"        => $rel_data95[$x]['item_wildlifecostother'],
                    "annualcost_wildlifecostother"        => $rel_data95[$x]['annualcost_wildlifecostother'],
                    "unit_wildlifecostother"        => $rel_data95[$x]['unit_wildlifecostother'],
                    "avgpriceunit_wildlifecostother"        => $rel_data95[$x]['avgpriceunit_wildlifecostother'],  
                    "noincurredyear_wildlifecostother"        => $rel_data95[$x]['noincurredyear_wildlifecostother'], 
                    "costincurredstage_wildlifecostother"        => $rel_data95[$x]['costincurredstage_wildlifecostother'], 
                );
            }
        }

        if (!empty($rel_data96)) {
                for($x = 0; $x < count($rel_data96); $x++){
                $dataseamsminingMaterial[] = array(    
                    "generatedcode"         => $rel_data96[$x]['codegen'],                       
                    "id_demographic_miningcostmaterial"         => $rel_data96[$x]['id_demographic_miningcostmaterial'], 
                    "item_miningcostmaterial"        => $rel_data96[$x]['item_miningcostmaterial'],
                    "annualcost_miningcostmaterial"        => $rel_data96[$x]['annualcost_miningcostmaterial'],
                    "unit_miningcostmaterial"        => $rel_data96[$x]['unit_miningcostmaterial'],
                    "avgpriceunit_miningcostmaterial"        => $rel_data96[$x]['avgpriceunit_miningcostmaterial'],  
                    "noincurredyear_miningcostmaterial"        => $rel_data96[$x]['noincurredyear_miningcostmaterial'], 
                    "costincurredstage_miningcostmaterial"        => $rel_data96[$x]['costincurredstage_miningcostmaterial'], 
                );
            }
        }

        if (!empty($rel_data97)) {
                for($x = 0; $x < count($rel_data97); $x++){
                $dataseamsminingEquip[] = array(    
                    "generatedcode"         => $rel_data97[$x]['codegen'],                       
                    "id_demographic_miningcostequipment"         => $rel_data97[$x]['id_demographic_miningcostequipment'], 
                    "item_miningcostequipment"        => $rel_data97[$x]['item_miningcostequipment'],
                    "annualcost_miningcostequipment"        => $rel_data97[$x]['annualcost_miningcostequipment'],
                    "unit_miningcostequipment"        => $rel_data97[$x]['unit_miningcostequipment'],
                    "avgpriceunit_miningcostequipment"        => $rel_data97[$x]['avgpriceunit_miningcostequipment'],  
                    "noincurredyear_miningcostequipment"        => $rel_data97[$x]['noincurredyear_miningcostequipment'], 
                    "costincurredstage_miningcostequipment"        => $rel_data97[$x]['costincurredstage_miningcostequipment'], 
                );
            }
        }

        if (!empty($rel_data98)) {
                for($x = 0; $x < count($rel_data98); $x++){
                $dataseamsminingLabor[] = array(    
                    "generatedcode"         => $rel_data98[$x]['codegen'],                       
                    "id_demographic_miningcostlabor"         => $rel_data98[$x]['id_demographic_miningcostlabor'], 
                    "item_miningcostlabor"        => $rel_data98[$x]['item_miningcostlabor'],
                    "annualcost_miningcostlabor"        => $rel_data98[$x]['annualcost_miningcostlabor'],
                    "unit_miningcostlabor"        => $rel_data98[$x]['unit_miningcostlabor'],
                    "avgpriceunit_miningcostlabor"        => $rel_data98[$x]['avgpriceunit_miningcostlabor'],  
                    "noincurredyear_miningcostlabor"        => $rel_data98[$x]['noincurredyear_miningcostlabor'], 
                    "costincurredstage_miningcostlabor"        => $rel_data98[$x]['costincurredstage_miningcostlabor'], 
                );
            }
        }

        if (!empty($rel_data99)) {
                for($x = 0; $x < count($rel_data99); $x++){
                $dataseamsminingOther[] = array(    
                    "generatedcode"         => $rel_data99[$x]['codegen'],                       
                    "id_demographic_miningcostother"         => $rel_data99[$x]['id_demographic_miningcostother'], 
                    "item_miningcostother"        => $rel_data99[$x]['item_miningcostother'],
                    "annualcost_miningcostother"        => $rel_data99[$x]['annualcost_miningcostother'],
                    "unit_miningcostother"        => $rel_data99[$x]['unit_miningcostother'],
                    "avgpriceunit_miningcostother"        => $rel_data99[$x]['avgpriceunit_miningcostother'],  
                    "noincurredyear_miningcostother"        => $rel_data99[$x]['noincurredyear_miningcostother'], 
                    "costincurredstage_miningcostother"        => $rel_data99[$x]['costincurredstage_miningcostother'], 
                );
            }
        }

        if (!empty($rel_data100)) {
                for($x = 0; $x < count($rel_data100); $x++){
                $dataseamsindustryOther[] = array(    
                    "generatedcode"         => $rel_data100[$x]['codegen'],                       
                    "id_demographic_industry"         => $rel_data100[$x]['id_demographic_industry'], 
                    "total_amount_industry"        => $rel_data100[$x]['total_amount_industry'],
                    "no_time_industry"        => $rel_data100[$x]['no_time_industry'],
                    "remarks_industry"        => $rel_data100[$x]['remarks_industry']                    
                );
            }
        }

        if (!empty($rel_data101)) {
                for($x = 0; $x < count($rel_data101); $x++){
                $dataseamssbindustryOther[] = array(    
                    "generatedcode"         => $rel_data101[$x]['codegen'],                       
                    "id_demographic_servicebased"         => $rel_data101[$x]['id_demographic_servicebased'], 
                    "total_amount_servicebased"        => $rel_data101[$x]['total_amount_servicebased'],
                    "no_time_servicebased"        => $rel_data101[$x]['no_time_servicebased'],
                    "remarks_servicebased"        => $rel_data101[$x]['remarks_servicebased']                    
                );
            }
        }

        if (!empty($rel_data102)) {
                for($x = 0; $x < count($rel_data102); $x++){
                $dataseamsothersource[] = array(    
                    "generatedcode"         => $rel_data102[$x]['codegen'],                       
                    "id_demographic_othersource"         => $rel_data102[$x]['id_demographic_othersource'], 
                    "total_amount_othersource"        => $rel_data102[$x]['total_amount_othersource'],
                    "no_time_othersource"        => $rel_data102[$x]['no_time_othersource'],
                    "remarks_othersource"        => $rel_data102[$x]['remarks_othersource']                    
                );
            }
        }

        if (!empty($rel_data103)) {
                for($x = 0; $x < count($rel_data103); $x++){
                $datacoralreef[] = array(    
                    "generatedcode"         => $rel_data103[$x]['codegen'],                       
                    "coastal_generatedcode"         => $rel_data103[$x]['Ccodegen'],                       
                    "coralreef_has"         => $rel_data103[$x]['coralreef_has'],                       
                    "coralreef_map_shp"         => $rel_data103[$x]['coralreef_map_shp'],                       
                    "coralreef_saba_pt"         => $rel_data103[$x]['coralreef_saba_pt'],                       
                    "coralreef_pms_point"         => $rel_data103[$x]['coralreef_pms_point'],                       
                    "coralreef_hcc"         => $rel_data103[$x]['coralreef_hcc'],                       
                    "hard_coral"         => $rel_data103[$x]['hard_coral'],                       
                    "algal_assemblage"         => $rel_data103[$x]['algal_assemblage'],                       
                    "abiotic"         => $rel_data103[$x]['abiotic'],                       
                    "macroalgae"         => $rel_data103[$x]['macroalgae'],                       
                    "halimeda"         => $rel_data103[$x]['halimeda'],                       
                    "other_biota"         => $rel_data103[$x]['other_biota'],                       
                    "density"         => $rel_data103[$x]['density'],                       
                    "biomass"         => $rel_data103[$x]['biomass'],   
                    "coral_month"         => $rel_data103[$x]['coral_month'],                 
                    "coral_day"         => $rel_data103[$x]['coral_day'],                 
                    "coral_year"         => $rel_data103[$x]['coral_year'],
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
                for($x = 0; $x < count($$rel_data107); $x++){
                $datacoralreefmonitoring[] = array(    
                    "generatedcode"         => $rel_data107[$x]['codegen'],                       
                    "coastal_generatedcode"         => $rel_data107[$x]['Ccodegen'],                       
                    "monitoring_site_point"         => $rel_data107[$x]['monitoring_site_point'],                       
                );
            }
        }

        if (!empty($rel_data108)) {
                for($x = 0; $x < count($$rel_data108); $x++){
                $datacoralreefkmlkmz[] = array(    
                    "generatedcode"         => $rel_data108[$x]['codegen'],                       
                    "coastal_generatedcode"         => $rel_data108[$x]['Ccodegen'],                       
                    "kmlkmz"         => $rel_data108[$x]['kmlkmz'],                       
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
                    $this->db->insert('tblmainprograms',$dataPrograms[$xy611]);
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
                    $this->db->insert('tblpatopology',$datatopo[$topo1]);
                }
            }

            if (!empty($rel_data20)) {
                for($soil =0; $soil<count($rel_data20); $soil++){
                    $this->db->insert('tblpageology',$datasoil[$soil]);
                }
            }

            if (!empty($rel_data21)) {
                for($climate =0; $climate<count($rel_data21); $climate++){
                    $this->db->insert('tblpaclimate',$dataclimate[$climate]);
                }
            }

            if (!empty($rel_data22)) {
                for($landslide =0; $landslide<count($rel_data22); $landslide++){
                    $this->db->insert('tblpahazardlandslide',$datalandslide[$landslide]);
                }
            }

            if (!empty($rel_data23)) {
                for($flooding =0; $flooding<count($rel_data23); $flooding++){
                    $this->db->insert('tblpahazardflooding',$dataflooding[$flooding]);
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

            if (!empty($rel_data32)) {
                for($contribution =0; $contribution<count($rel_data32); $contribution++){
                    $this->db->insert('tblpaipafcontri',$datacontri[$contribution]);
                }
            }

            if (!empty($rel_data33)) {
                for($recognition =0; $recognition<count($rel_data33); $recognition++){
                    $this->db->insert('tblrecognition',$datarecog[$recognition]);
                }
            }

            if (!empty($rel_data34)) {
                for($rock =0; $rock<count($rel_data34); $rock++){
                    $this->db->insert('tblparock',$datarock[$rock]);
                }
            }

            if (!empty($rel_data35)) {
                for($hazard =0; $hazard<count($rel_data35); $hazard++){
                    $this->db->insert('tblpageohazard',$datahazard[$hazard]);
                }
            }

            if (!empty($rel_data36)) {
                for($ff =0; $ff<count($rel_data36); $ff++){
                    $this->db->insert('tblpaforestformation',$dataff[$ff]);
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

            if (!empty($rel_data42)) {
                for($x =2; $x<count($rel_data42); $x++){
                    $this->db->insert('tblseamsincome',$datan[$x]);   
                }
            }

            if (!empty($rel_data43)) {
                for($x =0; $x<count($rel_data43); $x++){
                    $this->db->insert('tblpahydrology',$datahydro[$x]);   
                }
            }

            if (!empty($rel_data44)) {
                for($x =0; $x<count($rel_data44); $x++){
                    $this->db->insert('tblpalanduse',$dataland[$x]);   
                }
            }

            if (!empty($rel_data45)) {
                for($x =0; $x<count($rel_data45); $x++){
                    $this->db->insert('tblpavegetative',$datavegetative[$x]);   
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

            if (!empty($rel_data48)) {
                for($x =0; $x<count($rel_data48); $x++){
                    $this->db->insert('tblseams_sourceincome_fishery_salt',$dataseamsfs[$x]);   
                }
            }

            if (!empty($rel_data49)) {
                for($x =0; $x<count($rel_data49); $x++){
                    $this->db->insert('tblseams_sourceincome_fishery_fresh',$dataseamsffs[$x]);   
                }
            }

            if (!empty($rel_data50)) {
                for($x =0; $x<count($rel_data50); $x++){
                    $this->db->insert('tblseams_sourceincome_tpm',$dataseamstpm[$x]);   
                }
            }

            if (!empty($rel_data51)) {
                for($x =0; $x<count($rel_data51); $x++){
                    $this->db->insert('tblseams_sourceincome_agriculture',$dataseamsagri[$x]);   
                }
            }

            if (!empty($rel_data52)) {
                for($x =0; $x<count($rel_data52); $x++){
                    $this->db->insert('tblseams_sourceincome_livestock',$dataseamsls[$x]);   
                }
            }

            if (!empty($rel_data53)) {
                for($x =0; $x<count($rel_data53); $x++){
                    $this->db->insert('tblseams_sourceincome_nontimber',$dataseamsnontimber[$x]);   
                }
            }

            if (!empty($rel_data54)) {
                for($x =0; $x<count($rel_data54); $x++){
                    $this->db->insert('tblseams_sourceincome_timber',$dataseamstimber[$x]);   
                }
            }

            if (!empty($rel_data55)) {
                for($x =0; $x<count($rel_data55); $x++){
                    $this->db->insert('tblseams_sourceincome_rwc',$dataseamsrwc[$x]);   
                }
            }

            if (!empty($rel_data56)) {
                for($x =0; $x<count($rel_data56); $x++){
                    $this->db->insert('tblseams_sourceincome_mining',$dataseamsmining[$x]);   
                }
            }

            if (!empty($rel_data57)) {
                for($x =0; $x<count($rel_data57); $x++){
                    $this->db->insert('tblseams_sourceincome_industry',$dataseamsindustry[$x]);   
                }
            }

            if (!empty($rel_data58)) {
                for($x =0; $x<count($rel_data58); $x++){
                    $this->db->insert('tblseams_sourceincome_service',$dataseamsservice[$x]);   
                }
            }

            if (!empty($rel_data59)) {
                for($x =0; $x<count($rel_data59); $x++){
                    $this->db->insert('tblseams_sourceincome_source',$dataseamssource[$x]);   
                }
            }

            if (!empty($rel_data60)) {
                for($x =0; $x<count($rel_data60); $x++){
                    $this->db->insert('tblseams_sourceincome_economic_material',$dataseamsEcoMaterial[$x]);   
                }
            }

            if (!empty($rel_data61)) {
                for($x =0; $x<count($rel_data61); $x++){
                    $this->db->insert('tblseams_sourceincome_economic_equipment',$dataseamsEcoEquipment[$x]);   
                }
            }

            if (!empty($rel_data62)) {
                for($x =0; $x<count($rel_data62); $x++){
                    $this->db->insert('tblseams_sourceincome_economic_labor',$dataseamsEcoLabor[$x]);   
                }
            }

            if (!empty($rel_data63)) {
                for($x =0; $x<count($rel_data63); $x++){
                    $this->db->insert('tblseams_sourceincome_economic_other',$dataseamsEcoOther[$x]);   
                }
            }

            if (!empty($rel_data64)) {
                for($x =0; $x<count($rel_data64); $x++){
                    $this->db->insert('tblseams_sourceincome_fishsalt_material',$dataseamsfsMaterial[$x]);   
                }
            }

            if (!empty($rel_data65)) {
                for($x =0; $x<count($rel_data65); $x++){
                    $this->db->insert('tblseams_sourceincome_fishsalt_equipment',$dataseamsfsEquip[$x]);   
                }
            }

            if (!empty($rel_data66)) {
                for($x =0; $x<count($rel_data66); $x++){
                    $this->db->insert('tblseams_sourceincome_fishsalt_labor',$dataseamsfsLabor[$x]);   
                }
            }

            if (!empty($rel_data67)) {
                for($x =0; $x<count($rel_data67); $x++){
                    $this->db->insert('tblseams_sourceincome_fishsalt_other',$dataseamsfsOther[$x]);   
                }
            }

            if (!empty($rel_data68)) {
                for($x =0; $x<count($rel_data68); $x++){
                    $this->db->insert('tblseams_sourceincome_fishfresh_material',$dataseamsffMaterial[$x]);   
                }
            }

            if (!empty($rel_data69)) {
                for($x =0; $x<count($rel_data69); $x++){
                    $this->db->insert('tblseams_sourceincome_fishfresh_equipment',$dataseamsffEquip[$x]);   
                }
            }

            if (!empty($rel_data70)) {
                for($x =0; $x<count($rel_data70); $x++){
                    $this->db->insert('tblseams_sourceincome_fishfresh_labor',$dataseamsffLabor[$x]);   
                }
            }

            if (!empty($rel_data71)) {
                for($x =0; $x<count($rel_data71); $x++){
                    $this->db->insert('tblseams_sourceincome_fishfresh_other',$dataseamsffOther[$x]);   
                }
            }

            if (!empty($rel_data72)) {
                for($x =0; $x<count($rel_data72); $x++){
                    $this->db->insert('tblseams_sourceincome_tpm_material',$dataseamstpmMaterial[$x]);   
                }
            }

            if (!empty($rel_data73)) {
                for($x =0; $x<count($rel_data73); $x++){
                    $this->db->insert('tblseams_sourceincome_tpm_equipment',$dataseamstpmEquip[$x]);   
                }
            }

            if (!empty($rel_data74)) {
                for($x =0; $x<count($rel_data74); $x++){
                    $this->db->insert('tblseams_sourceincome_tpm_labor',$dataseamstpmLabor[$x]);   
                }
            }

            if (!empty($rel_data75)) {
                for($x =0; $x<count($rel_data75); $x++){
                    $this->db->insert('tblseams_sourceincome_tpm_other',$dataseamstpmOther[$x]);   
                }
            }

            if (!empty($rel_data76)) {
                for($x =0; $x<count($rel_data76); $x++){
                    $this->db->insert('tblseams_sourceincome_agri_material',$dataseamsagriMaterial[$x]);   
                }
            }

            if (!empty($rel_data77)) {
                for($x =0; $x<count($rel_data77); $x++){
                    $this->db->insert('tblseams_sourceincome_agri_equipment',$dataseamsagriEquip[$x]);   
                }
            }

            if (!empty($rel_data78)) {
                for($x =0; $x<count($rel_data78); $x++){
                    $this->db->insert('tblseams_sourceincome_agri_labor',$dataseamsagriLabor[$x]);   
                }
            }

            if (!empty($rel_data79)) {
                for($x =0; $x<count($rel_data79); $x++){
                    $this->db->insert('tblseams_sourceincome_agri_other',$dataseamsagriOther[$x]);   
                }
            }

            if (!empty($rel_data80)) {
                for($x =0; $x<count($rel_data80); $x++){
                    $this->db->insert('tblseams_sourceincome_livestock_material',$dataseamslivestockMaterial[$x]);   
                }
            }

            if (!empty($rel_data81)) {
                for($x =0; $x<count($rel_data81); $x++){
                    $this->db->insert('tblseams_sourceincome_livestock_equipment',$dataseamslivestockEquip[$x]);   
                }
            }

            if (!empty($rel_data82)) {
                for($x =0; $x<count($rel_data82); $x++){
                    $this->db->insert('tblseams_sourceincome_livestock_labor',$dataseamslivestockLabor[$x]);   
                }
            }

            if (!empty($rel_data83)) {
                for($x =0; $x<count($rel_data83); $x++){
                    $this->db->insert('tblseams_sourceincome_livestock_other',$dataseamslivestockOther[$x]);   
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

            if (!empty($rel_data103)) {
                for($x =0; $x<count($rel_data103); $x++){
                    $this->db->insert('tblpacoastalcoral',$datacoralreef[$x]);   
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

            $this->db->where('id_main',$data['id_main'])
            ->update($this->table,$data);

            return "success";
        }catch(Exception $e){
            return "failed";
        }

        // return $this->db->where('id_main',$data['id_main'])
        // ->update($this->table,$data);
    }

}