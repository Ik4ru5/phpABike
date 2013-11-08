<?php
class phpABike {
	var $client;
	var $result = "";
	var $commonParams = array();
	var $geoPos = array("Latitude" => 0.0, "Longitude" => 0.0);
	var $cusotmerData = array("Phone" => "", "Password" => "");
	
	function __construct($url) {
		$this->client = new SoapClient("https://xml.dbcarsharing-buchung.de/hal2_cabserver/definitions/HAL2_CABSERVER_3.wsdl");
		$this->buildCommonParams();
	}
	
	function buildCustomerData($user = "", $passwd = "") {
		$this->customerData["Phone"] = $user;
		$this->customerData["Password"] = $passwd;
		
		return $this->customerData;
	}
	
	function buildGeoPos($lat = 0.0, $lng = 0.0) {
		if($lat != 0.0) {
			$this->geoPos["Latitude"]	= $lat;
		}
		
		if($lng != 0.0) {
			$this->geoPos["Longitude"]	= $lng;
		}
		
		if($this->geoPos["Latitude"] != 0.0 && $this->geoPos["Longitude"] != 0.0) {
			return $this->geoPos;
		}
	}
	
	function buildCommonParams() {
		$this->commonParams["UserData"] = array (
			"User" => "t_cab_android",
			"Password" => "3b3cc28469");
		$this->commonParams["languageUID"] = 1;
		$this->commonParams["RequestTime"] = date("Y-d-m\TG:i:s", time());
		$this->commonParams["Version"] = 1;
		
		return $this->commonParams;
	}
	
	function buildNewCustomerData() {}
	
	function buildPaymentByWire() {}
	
	function buildPaymentByCreditCard() {}
	
	function buildBounusCard() {}
	
	function buildTripLimits() {}
	
	function buildDamageData() {}
	
	function listFreeBikes($maxRes = 100, $radius = 5000, $lat = 0.0, $lng = 0.0) {
		$this->result = $this->client->__soapCall("CABSERVER.listFreeBikes",
						array("CommonParams" => $this->buildCommonParams(),
							  "SearchPosition" => $this->buildGeoPos($lat, $lng),
							  "maxResults" => $maxRes,
							  "searchRadius" => $radius));
		
		return $this->result;
	}
	
	function getCustomerInfo() {}
	
	function listReturnLocations () {}
	
	function rentBike($bike, $user = "", $passwd = "") {
		$this->result = $this->client->__soapCall("CABSERVER.rentBike",
						array("Bike" => $bike,
							  "CustomerData" => $this->buildCustomerData($user, $passwd),
							  "CommonParams" => $this->buildCommonParams()));
		
		return $this->result;
	}
	
	function returnBike() {}
	
	function requestNewPassword() {}
	
	function listProductInfo() {}
	
	function checkTripStart() {}
	
	function changePersCode() {}
	
	function getBikeInfo() {}
	
	function redeemBonusCode() {}
	
	function addCustomer() {}
	
	function reportDamage() {}
	
	function listCompletedTrips() {}
}
?>