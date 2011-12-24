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

$fh= fopen("job.test", 'w');

fwrite($fh, "{");
fwrite($fh, "       \"type\":\"".$data['type']."\",\n");
fwrite($fh, "        \"state\":\"".$data['state']."\",\n");
fwrite($fh, "        \"customer\":\"".$data['customerName']."\",\n");
fwrite($fh, "        \"total_rating\":".$data['rating'].",\n");
fwrite($fh, "        \"price\":".$data['price'].",\n");
fwrite($fh, "        \"started_since\":1324429221.400007,\n");
fwrite($fh, "        \"data_items\":{\n");
fwrite($fh, "                \"customerName\" : \"".$data['customerName']."\",\n");
fwrite($fh, "                \"cellNum\" : \"".$data['cellNum']."\" ,\n");
fwrite($fh, "                \"source\" : \"".$data['source']."\" ,\n");
fwrite($fh, "                \"dest\" : \"".$data['dest']."\" ,\n");
fwrite($fh, "                \"time\" : \"".$data['time']."\" ,\n");
fwrite($fh, "                \"load\" : \"".$data['load']."\" ,\n");
fwrite($fh, "                \"price\": \"".$data['price']."\" ,\n");
fwrite($fh, "                \"duration\" : \"".$data['duration']."\" ,\n");
fwrite($fh, "                \"passengers\" : \"".$data['passengers']."\" ,\n");
fwrite($fh, "                \"passGender\" : \"".$data['passGender']."\",\n");
fwrite($fh, "                \"otherGender\": \"".$data['otherGender']."\",\n");
if(array_key_exists("handicap", $data))
fwrite($fh, "                \"handicap\" : \"".$data['handicap']."\",\n");
if(array_key_exists("smoking", $data))
fwrite($fh, "                \"smoking\" : \"".$data['smoking']."\" ,\n");
fwrite($fh, "                \"rating\" : \"".$data['rating']."\",\n");
fwrite($fh, "                \"language\" : \"".$data['language']."\",\n");
fwrite($fh, "                \"Pickup\" : \"".$data['Pickup']."\",\n");
fwrite($fh, "                \"Dropoff\" : \"".$data['Dropoff']."\"\n");
fwrite($fh, "         }\n");
fwrite($fh, "}\n");

fclose($fh);

echo "\n\nYour ride has been entered!  Please check back using the following codes: ";
echo "\n$c1\n$c2\n\n";
echo gethostname();

?>