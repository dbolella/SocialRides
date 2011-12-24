<?PHP

$data = $_POST;
$data["cellNum"]= $data["phone1"].$data["phone2"].$data["phone3"];
$data["time"]= $data["year"]."-".$data["month"]."-".$data["day"]." ".$data["hour"].":".$data["minute"];
$data["customerName"]= $data["first"]." ".$data["last"];
$data["duration"]= $data["dhour"].":".$data["dminute"];
$data["price"]= $data["dollars"].".".$data["cents"];
$data["type"]= "job";
$data["state"]= "ready";
unset($data["phone1"]);
unset($data["phone2"]);
unset($data["phone3"]);
unset($data["dhour"]);
unset($data["dminute"]);
unset($data["dollars"]);
unset($data["cents"]);
unset($data["month"]);
unset($data["day"]);
unset($data["year"]);
unset($data["hour"]);
unset($data["minute"]);
unset($data["ampm"]);
unset($data["first"]);
unset($data["last"]);
unset($data["form_id"]);
unset($data["submit"]);
$c1= rand(1000, 9999);
$c2= rand(1000, 9999);
$id = $c1.$c2;
$data["Pickup"]= $c1;
$data["Dropoff"]= $c2;

print_r($data);

//reference: http://www.lornajane.net/posts/2009/putting-data-fields-with-php-curl
$ch = curl_init("http://socialfarm.org/edu_rides/job.$id");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));

$response = curl_exec($ch);
if(!$response) {
	echo "\n\nThe response was a failure\n$c1\n$c2";
	return false;
}

echo $response;
echo "\n\nYour ride has been entered!  Please check back using the following codes: ";
echo "\n$c1\n$c2\n\n";

$ch = $ch = curl_init("http://socialfarm.org/edu_rides/job.$id");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

$response = curl_exec($ch);

echo $response;


?>