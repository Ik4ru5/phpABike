<?php
class phpABike {
	var $client;
	var $commonParams = array();
	var $geoPos
	
	function __construct($url) {
		$this->client = new SoapClient("https://xml.dbcarsharing-buchung.de/hal2_cabserver/definitions/HAL2_CABSERVER_3.wsdl");
	}
	
	function buildCommonParams () {
		$this->commonParams["UserData"] = array (
			"User" => "t_cab_android",
			"Password" => "3b3cc28469")
		$this->commonParams["languageUID"] = 1;
		$this->commonParams["RequestTime"] = date("Y-d-m\TG:i:s", time());
		$this->commonParams["Version"] = 1;
	}
	
	function buildGeoPos($lat, $lng) {
		$this->geoPos["Latitude"]	= $lat;
		$this->geoPos["Longitude"]	= $lng;
	}
}
?>