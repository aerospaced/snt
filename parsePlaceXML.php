<?php
include_once 'include/sqlconnect.php';
include("include/functions.php");
$mysqli = new mysqli(HOST,USER, PASSWORD, DB);
$source = "listings.xml";
$xml=simplexml_load_file("listings.xml") or die("Error: Cannot create object");
const XMLNS_COMMON = 'http://rets.org/xsd/RETSCommons'; // the value from the xmlns:common attribute?
foreach($xml->Listing as $listing)
{
	$price = $listing->ListPrice;
	$key = $listing->ListingKey;
	$status = $listing->ListingStatus;
	$listingDescription = $listing->ListingDescription;
	$listingURL = $listing->ListingURL;
	$bedrooms = $listing->Bedrooms;
	$bathrooms = $listing->Bathrooms;
	$propertyType = $listing->PropertyType;
	$listingCategory = $listing->ListingCategory;
	$discloseAddress = $listing->DiscloseAddress;
	$mlsId = $listing->MlsId;
	$mlsName = $listing->MlsName;
	$mlsNumber = $listing->MlsNumber;
	$street = $listing->Address->children(XMLNS_COMMON)->FullStreetAddress;
	$city = $listing->Address->children(XMLNS_COMMON)->City;
	$state = $listing->Address->children(XMLNS_COMMON)->StateOrProvince;
	$zip = $listing->Address->children(XMLNS_COMMON)->PostalCode;
	$country = $listing->Address->children(XMLNS_COMMON)->Country;

	/*echo "MLS Number: $mlsNumber<br />";
	echo "MlsName: $mlsName<br />";
	echo "Price: $price<br />";
	echo "Key: $key<br />";
	echo "Status: $status<br />";
	echo "listingURL: $listingURL<br />";
	echo "bedrooms: $bedrooms<br />";
	echo "bathrooms: $bathrooms<br />";
	echo "propertyType: $propertyType<br />";
	echo "listingCategory: $listingCategory<br />";
	echo "discloseAddress: $discloseAddress<br />";*/
	if($discloseAddress == "true")
	{
		$disclose = 1;
		/*echo "-> Street: $street<br />";
		echo "-> City: $city<br />";
		echo "-> State: $state<br />";
		echo "-> Zip: $zip<br />";
		echo "-> Country: $country<br />";	*/	
	}
	else
	{
		$disclose = 0;
	}
	//echo "listingDescription: $listingDescription<br />";
	$sqlQuery = "INSERT INTO `snt`.`tblmls` (`mlsNumber`, `mlsName`, `price`, `key`, `status`,`listingURL`, `bedrooms`, `bathrooms`, `propertyType`,";
	$sqlQuery = $sqlQuery." `listingCategory`, `discloseAddress`, `street`, `city`, `state`, `zip`, `country`, `listingDesc`, `timestamp`, `modifiedBy`) VALUES (";
	$sqlQuery = $sqlQuery." '$mlsNumber', '$mlsName','$price','$key','$status','$listingURL','$bedrooms', '$bathrooms','$propertyType','$listingCategory','$disclose', ";
	$sqlQuery = $sqlQuery." '$street','$city','$state','$zip','$country','$listingDescription', CURRENT_TIMESTAMP(), 'root' )";
	$results = $mysqli->query($sqlQuery);
	if ($results==0) {
		echo "SQL error, writing MLS listing: -->".$mysqli->error;
		LogError("SQL error, writing MLS listing: -->".$mysqli->error);
	} 
	foreach($listing->Photos->Photo as $photo){
		$photoUrl = $photo->MediaURL;
		//echo ($photoUrl);
		//echo "<br />";
		//$sqlQuery = "call SetPhotos($mlsNumber, $photoUrl, 'root')";
		$sqlQuery = "INSERT INTO `snt`.`tblPhotos` (`photoIndex`, `mlsNumber`, `photoUrl`, `timestamp`, `user`) VALUES (NULL, $mlsNumber, '$photoUrl', CURRENT_TIMESTAMP(), 'root')";
		 $results = $mysqli->query($sqlQuery);
		 if ($results==0) {
			echo "SQL error writing photos -->".$mysqli->error;
			LogError("SQL error, writing photos -->".$mysqli->error);
		} 
	}
	echo "<br />---------------------------------------------------------------------------------------------------------<br /><br />";
	//
	// now write all this to sql
	//
	//$sqlQuery = "select * from tblPhotos where 1";
	//$sqlQuery = "call GetPhotos(12777)";
	//$results =$mysqli->query($sqlQuery);
    //$num_results = $results->num_rows;
	
	//for($i=0; $i <$num_results; $i++)
		//{
			//$row = $results->fetch_assoc();
			//echo $row['photoUrl']."<br />";
		//}
}

?>
<form action="index.php">
    <input type="submit" value="HOME" />
</form>