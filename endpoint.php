<?php
	include_once 'include/sqlconnect.php';
	include("include/functions.php");	
	$mysqli = new mysqli(HOST,USER, PASSWORD, DB);
	$mysqli2 = new mysqli(HOST,USER, PASSWORD, DB);
	/*
	'all' 
	'ascprice' (list all with ascending prices) 
	'descprice' (list all with descending prices)
	'photos' (list all with just photos)
	'ascdate' (list all with ascending dates)
	'descdate' (list all with descending dates)
	'active' toggle a listing active flag.  ?mls=  ?mode=active
	*/
	//$mode = isset($_GET['mode']); 
	
	if(!empty($_GET['mode']))
	{
		//
		if(!empty($_GET['mlsno'])? $mlsno = $_GET['mlsno']:$mlsno="");
		//$mls = 12777;
		$mode=$_GET['mode'];
		//echo $mode."....".$mlsno;
		switch($mode){
			case "all": // list all full listing.
			//echo "line 28";
				$sqlQuery = "CALL GetAllListings()";
				$results = $mysqli->query($sqlQuery);
				$masterArray = array();
				$subArray = array();
				$num_results = $results->num_rows;
				if ($num_results==0) {
					//echo "SQL error, writing MLS listing: -->".$mysqli->error;
					LogError("SQL error, writing MLS listing: -->".$mysqli->error);
				} 
				for($i=0; $i <$num_results; $i++)
				{
					$row = $results->fetch_assoc();
					$mlsNum = $row['mlsNumber'];
					extract($row);
					$subArray[] = array("mlsNumber"=>$mlsNumber, "mlsName"=> $mlsName, "price"=>$price, "status"=>$status, "listingURL"=>$listingURL, "bedrooms"=>$bedrooms, "bathrooms"=>$bathrooms,
					"propertyType"=>$propertyType, "listingCategory"=>$listingCategory, "discloseAddress"=>$discloseAddress, "street"=>$street, "city"=>$city, "state"=>$state, "zip"=>$zip, "country"=>$country, "listingDesc"=>$listingDesc);
					//$sqlQuery2 ="call GetPhotos($mlsNumber)"; 
					$sqlQuery2 ="SELECT * FROM `tblphotos` WHERE mlsNumber = $mlsNum";
					$results2 = $mysqli2->query($sqlQuery2);
					$num_results2 = $results2->num_rows;
					$photoArray[] = array();
					for($x=0; $x<$num_results2;$x++)
					{
						$row2 = $results2->fetch_assoc();
						extract($row2);
						$photoArray[] = array("mlsNumber"=>$mlsNumber, "photoUrl"=>$photoUrl);
						
					}
					$subArray[] = array("MlsNumber"=>$mlsNum, "photo"=>$photoArray);	
					unset($photoArray);
					//deliver_response(200,"success",$mslNum);
					//echo $mlsNum;
					//var_dump($subArray);
				}
				deliver_response(400,"success",$subArray);
				//echo json_encode($subArray);
			break;
			
			case "ascprice": //(list all with ascending prices) 
				$sqlQuery = "SELECT * FROM `tblmls` ORDER BY `price` ASC";
				$results = $mysqli->query($sqlQuery);
				$masterArray = array();
				$subArray = array();
				$num_results = $results->num_rows;
				if ($num_results==0) {
					//echo "SQL error, writing MLS listing: -->".$mysqli->error;
					LogError("SQL error, writing MLS listing: -->".$mysqli->error);
				} 
				for($i=0; $i <$num_results; $i++)
				{
					$row = $results->fetch_assoc();
					$mlsNum = $row['mlsNumber'];
					extract($row);
					$subArray[] = array("mlsNumber"=>$mlsNumber, "mlsName"=> $mlsName, "price"=>$price, "status"=>$status, "listingURL"=>$listingURL, "bedrooms"=>$bedrooms, "bathrooms"=>$bathrooms,
					"propertyType"=>$propertyType, "listingCategory"=>$listingCategory, "discloseAddress"=>$discloseAddress, "street"=>$street, "city"=>$city, "state"=>$state, "zip"=>$zip, "country"=>$country, "listingDesc"=>$listingDesc);
					//$sqlQuery2 ="call GetPhotos($mlsNumber)"; 
					$sqlQuery2 ="SELECT * FROM `tblphotos` WHERE mlsNumber = $mlsNum";
					$results2 = $mysqli2->query($sqlQuery2);
					$num_results2 = $results2->num_rows;
					$photoArray[] = array();
					for($x=0; $x<$num_results2;$x++)
					{
						$row2 = $results2->fetch_assoc();
						extract($row2);
						$photoArray[] = array("mlsNumber"=>$mlsNumber, "photoUrl"=>$photoUrl);
						
					}
					$subArray[] = array("MlsNumber"=>$mlsNum, "photo"=>$photoArray);	
					unset($photoArray);
					//deliver_response(200,"success",$mslNum);
					//echo $mlsNum;
					//var_dump($subArray);
				}				
				deliver_response(400,"success",$subArray);
				//echo json_encode($subArray);
			break;
			
			
			case "descprice":
				$sqlQuery = "SELECT * FROM `tblmls` ORDER BY `price` DESC";
				$results = $mysqli->query($sqlQuery);
				$masterArray = array();
				$subArray = array();
				$num_results = $results->num_rows;
				if ($num_results==0) {
					//echo "SQL error, writing MLS listing: -->".$mysqli->error;
					LogError("SQL error, writing MLS listing: -->".$mysqli->error);
				} 
				for($i=0; $i <$num_results; $i++)
				{
					$row = $results->fetch_assoc();
					$mlsNum = $row['mlsNumber'];
					extract($row);
					$subArray[] = array("mlsNumber"=>$mlsNumber, "mlsName"=> $mlsName, "price"=>$price, "status"=>$status, "listingURL"=>$listingURL, "bedrooms"=>$bedrooms, "bathrooms"=>$bathrooms,
					"propertyType"=>$propertyType, "listingCategory"=>$listingCategory, "discloseAddress"=>$discloseAddress, "street"=>$street, "city"=>$city, "state"=>$state, "zip"=>$zip, "country"=>$country, "listingDesc"=>$listingDesc);
					//$sqlQuery2 ="call GetPhotos($mlsNumber)"; 
					$sqlQuery2 ="SELECT * FROM `tblphotos` WHERE mlsNumber = $mlsNum";
					$results2 = $mysqli2->query($sqlQuery2);
					$num_results2 = $results2->num_rows;
					$photoArray[] = array();
					for($x=0; $x<$num_results2;$x++)
					{
						$row2 = $results2->fetch_assoc();
						extract($row2);
						$photoArray[] = array("mlsNumber"=>$mlsNumber, "photoUrl"=>$photoUrl);
						
					}
					$subArray[] = array("MlsNumber"=>$mlsNum, "photo"=>$photoArray);	
					unset($photoArray);
					//deliver_response(200,"success",$mslNum);
					//echo $mlsNum;
					//var_dump($subArray);
				}
				deliver_response(400,"success",$subArray);
				//echo json_encode($subArray);
			break;
			
			case "photos":
				$sqlQuery2 ="SELECT * FROM `tblphotos` WHERE mlsNumber = $mlsno";
					$results2 = $mysqli2->query($sqlQuery2);
					$num_results2 = $results2->num_rows;
					$photoArray[] = array();
					for($x=0; $x<$num_results2;$x++)
					{
						$row2 = $results2->fetch_assoc();
						extract($row2);
						$photoArray[] = array("mlsNumber"=>$mlsNumber, "photoUrl"=>$photoUrl);
						
					}
					deliver_response(400,"success",$photoArray);
					//echo json_encode($photoArray);
			break;
			
			case 'ascdate':
				$sqlQuery = "SELECT * FROM `tblmls` ORDER BY `price` DESC";
				$results = $mysqli->query($sqlQuery);
				$masterArray = array();
				$subArray = array();
				$num_results = $results->num_rows;
				if ($num_results==0) {
					//echo "SQL error, writing MLS listing: -->".$mysqli->error;
					LogError("SQL error, writing MLS listing: -->".$mysqli->error);
				} 
				for($i=0; $i <$num_results; $i++)
				{
					$row = $results->fetch_assoc();
					$mlsNum = $row['mlsNumber'];
					extract($row);
					$subArray[] = array("mlsNumber"=>$mlsNumber, "mlsName"=> $mlsName, "price"=>$price, "status"=>$status, "listingURL"=>$listingURL, "bedrooms"=>$bedrooms, "bathrooms"=>$bathrooms,
					"propertyType"=>$propertyType, "listingCategory"=>$listingCategory, "discloseAddress"=>$discloseAddress, "street"=>$street, "city"=>$city, "state"=>$state, "zip"=>$zip, "country"=>$country, "listingDesc"=>$listingDesc);
					//$sqlQuery2 ="call GetPhotos($mlsNumber)"; 
					$sqlQuery2 ="SELECT * FROM `tblphotos` WHERE mlsNumber = $mlsNum";
					$results2 = $mysqli2->query($sqlQuery2);
					$num_results2 = $results2->num_rows;
					$photoArray[] = array();
					for($x=0; $x<$num_results2;$x++)
					{
						$row2 = $results2->fetch_assoc();
						extract($row2);
						$photoArray[] = array("mlsNumber"=>$mlsNumber, "photoUrl"=>$photoUrl);
						
					}
					$subArray[] = array("MlsNumber"=>$mlsNum, "photo"=>$photoArray);	
					unset($photoArray);
					//deliver_response(200,"success",$mslNum);
					//echo $mlsNum;
					//var_dump($subArray);
				}
				deliver_response(400,"success",$subArray);
				//echo json_encode($subArray);
			break;
			
			case 'descdate':
			
			break;
			
			case 'active':
			
			break;
			
			default:
				//throw invalid request
			    deliver_response(400,"Invalid Request",null);
			
		}

	}
	else
	{
		//throw invalid request
			deliver_response(400,"Invalid Request",null);
		
	}
	function deliver_response($status, $status_message,$data){
		
		header("HTTP/1.1 $status $status_message");
		
		$response['status']=$status;
		$response['status_message']=$status_message; 
		$response['data']=$data;
		
		$json_response=json_encode($response);
		echo $json_response;
		
	}
	
	
?>
