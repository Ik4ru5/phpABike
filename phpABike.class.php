<?php
class phpABike {
	var $client;
	var $result = "";
	var $commonParams = array();
	var $geoPos = array();
	var $cusotmerData = array();
	
	function __construct($url) {
		$this->client = new SoapClient("https://xml.dbcarsharing-buchung.de/hal2_cabserver/definitions/HAL2_CABSERVER_3.wsdl");
		$this->buildCommonParams();
	}
	
	function buildCustomerData($user = "", $passwd = "") {
		$this->customerData["Phone"] = $user;
		$this->customerData["Password"] = $passwd;
		
		return $this->customerData;
	}
	
	function buildGeoPos($lat, $lng) {
		$this->geoPos["Latitude"]	= $lat;
		$this->geoPos["Longitude"]	= $lng;
		
		return $this->geoPos;
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
	
	function listFreeBikes() {}
	
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