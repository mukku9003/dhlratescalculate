<?php 
require_once 'common/config.php';

if(isset($_FILES['zonefile']['name'])){
	$allowedExtensions = array("csv");
    $ext = pathinfo($_FILES['zonefile']['name'], PATHINFO_EXTENSION);
    if(in_array($ext, $allowedExtensions)) {
       	$row = 1;
       	$final_datas = array();
       	$cur_date = date('Y-m-d');
       	if (($handle = fopen($_FILES['zonefile']['tmp_name'], "r")) !== FALSE) {
       		 query("TRUNCATE `dhl_zones`", $conn);
		    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		        if($row == 1){ 
		        	$row++; 
		        	continue;
		        }
		        $country_name = escape($data[0], $conn);
		        $country_code = $data[1];
		        $zone = $data[2];
		        $ess_region = $data[3];

		        query("INSERT INTO `dhl_zones` SET `country_code` = '$country_code' , `country_name` = '$country_name', `zone` = '$zone', `ess_region` = '$ess_region' ", $conn);
		    }
		    header("Location: index.php");
		}
	}
}

if(isset($_FILES['dhlratesfile']['name'])){
	$allowedExtensions = array("csv");
    $ext = pathinfo($_FILES['dhlratesfile']['name'], PATHINFO_EXTENSION);
    if(in_array($ext, $allowedExtensions)) {
       	$row = 1;
       	$final_datas = array();
       	$cur_date = date('Y-m-d');
       	if (($handle = fopen($_FILES['dhlratesfile']['tmp_name'], "r")) !== FALSE) {
       		 query("TRUNCATE `dhl_rates`", $conn);
		    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		        if($row == 1){ 
		        	$row++; 
		        	continue;
		        }
		        $weight = escape($data[0], $conn);
		        $zone1 = $data[1];
		        $zone2 = $data[2];
		        $zone3 = $data[3];
		        $zone4 = $data[4];
		        $zone5 = $data[5];
		        $zone6 = $data[6];
		        $zone7 = $data[7];
		        $zone8 = $data[8];
		        $zone9 = $data[9];
		        $zone10 = $data[10];
		        $zone11 = $data[11];
		        $zone12 = $data[12];
		        $zone13 = $data[13];
		        $zone14 = $data[14];
		        
		        
		        query("INSERT INTO `dhl_rates` SET `weight` = '$weight' , `zone1` = '$zone1', `zone2` = '$zone2', `zone3` = '$zone3', `zone4` = '$zone4', `zone5` = '$zone5', `zone6` = '$zone6', `zone7` = '$zone7', `zone8` = '$zone8', `zone9` = '$zone9', `zone10` = '$zone10', `zone11` = '$zone11', `zone12` = '$zone12', `zone13` = '$zone13', `zone14` = '$zone14' ", $conn);
		    }
		    header("Location: index.php");
		}
	}
}

if(isset($_FILES['dhlesscharegsfile']['name'])){
	$allowedExtensions = array("csv");
    $ext = pathinfo($_FILES['dhlesscharegsfile']['name'], PATHINFO_EXTENSION);
    if(in_array($ext, $allowedExtensions)) {
       	$row = 1;
       	$final_datas = array();
       	$cur_date = date('Y-m-d');
       	if (($handle = fopen($_FILES['dhlesscharegsfile']['tmp_name'], "r")) !== FALSE) {
       		query("TRUNCATE `dhl_ess_charge`", $conn);
		    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		        if($row == 1){ 
		        	$row++; 
		        	continue;
		        }
		        $weight = escape($data[0], $conn);
		        $weight_int =  str_replace("KG","",$weight);
		        $weights = explode('TO', $weight_int);
		        $weight_from = trim($weights[0]);
		        $weight_to = trim($weights[1]);
		       
		        $country_region = $data[1];
		        $dhl = $data[2];
		        $tnt = $data[3];
		        $fedex = $data[4];
		        
		        query("INSERT INTO `dhl_ess_charge` SET `weight` = '$weight', `weight_from` = '$weight_from', `weight_to` = '$weight_to', `country_region` = '$country_region', `dhl` = '$dhl', `tnt` = '$tnt', `fedex` = '$fedex' ", $conn);
		    }
		    header("Location: index.php");
		}
	}

}




 