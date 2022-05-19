<?php defined('BASEPATH') or exit ('No direct access script allowed!');
/**
 * 
 */
class GIS_MAIN extends CI_Model
{
	

public function gis_theat(){

	$query = $this->db->join('tblpamain','tblpathreat.generatedcode = tblpamain.generatedcode','LEFT')
					  ->get('tblpathreat');
    return $query->result();
}

public function geojsonTotxt(){

	$query = $this->db->select('threat_json_file')
					  ->where('generatedcode','QWEK87AWEAS')
					  ->get('tblpathreat');
    return $query->result();
}

}