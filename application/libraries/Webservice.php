<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Webservice {

	function CheckMatkulKeseluruhan($nim,$nama)
	{
		// request list of contacts from Web API
		$url="https://api.mercubuana.ac.id/akademik/esurat/".$nim;

		
		$json = file_get_contents($url);
		$jsonToArray = json_decode($json);

		$hasil = 0;

		

		foreach ($jsonToArray as $value) {
			if ($value->namamk=="KERJA PRAKTEK" AND strtoupper($value->mhsnama)==strtoupper($nama) OR $value->namamk=="TUGAS AKHIR" AND strtoupper($value->mhsnama)==strtoupper($nama)) {
				$hasil = 1;
			}
		}

		return $hasil;
	}

	function CheckMatkulKp($nim,$nama)
	{
		// request list of contacts from Web API
		$url="https://api.mercubuana.ac.id/akademik/esurat/".$nim;

		
		$json = file_get_contents($url);
		$jsonToArray = json_decode($json);

		$hasil = 0;

		

		foreach ($jsonToArray as $value) {
			if ($value->namamk=="KERJA PRAKTEK" AND strtoupper($value->mhsnama)==strtoupper($nama)) {
				$hasil = 1;
			}
		}

		return $hasil;
	}

	function CheckNimNama($nim,$nama)
	{
		// request list of contacts from Web API
		$url="https://api.mercubuana.ac.id/akademik/esurat/".$nim;

		
		$json = file_get_contents($url);
		$jsonToArray = json_decode($json);

		$hasil = 0;

		

		foreach ($jsonToArray as $value) {
			if ($value->nim==$nim AND strtoupper($value->mhsnama)==strtoupper($nama)) {
				$hasil = 1;
			}
		}

		return $hasil;
	}

	function CheckTranskripKp($nim)
	{
		$opts = [
			    "http" => [
			        
			        "header" => "Content-Type: application/json\n"."sia:mercubuana2017!\n"
			    ]
			];

			$context = stream_context_create($opts);

			// request list of contacts from Web API
			$json = file_get_contents("https://api.mercubuana.ac.id/akademik/transkripmhs/".$nim, false, $context);

		

			$jsonToArray = json_decode($json);
			$hasil = 0;

			

			foreach ($jsonToArray as $value) {
				if ($value->namamk=="KERJA PRAKTEK") {
					$hasil = 1;
				}
			}

			return $hasil;
	}

	function CheckMatkulTA($nim,$nama)
	{
		// request list of contacts from Web API
		$url="https://api.mercubuana.ac.id/akademik/esurat/".$nim;

		
		$json = file_get_contents($url);
		$jsonToArray = json_decode($json);

		$hasil = 0;

		

		foreach ($jsonToArray as $value) {
			if ($value->namamk=="TUGAS AKHIR" AND strtoupper($value->mhsnama)==strtoupper($nama)) {
				$hasil = 1;
			}
		}

		return $hasil;
	}

	function CheckTranskripTA($nim)
	{
		$opts = [
			    "http" => [
			        
			        "header" => "Content-Type: application/json\n"."sia:mercubuana2017!\n"
			    ]
			];

			$context = stream_context_create($opts);

			// request list of contacts from Web API
			$json = file_get_contents("https://api.mercubuana.ac.id/akademik/transkripmhs/".$nim, false, $context);

		

			$jsonToArray = json_decode($json);
			$hasil = 0;

			

			foreach ($jsonToArray as $value) {
				if ($value->namamk=="TUGAS AKHIR") {
					$hasil = 1;
				}
			}

			return $hasil;
	}


}