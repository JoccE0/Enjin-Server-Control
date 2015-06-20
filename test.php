<html>
<head>
<title>Simple PHP get-tags Iterator</title> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>

<script type="text/javascript">
$( document ).ready(function() {
$.getJSON( "http://island-quest.nu/api/get-current-user", function( data ) {
alert(data.displayname);
});
});
</script>

<iframe src="http://island-quest.nu/api/get-current-user"></iframe>
<?php


	echo "<br>";
	echo "#############";
	echo "<br>";

	$url = "http://island-quest.nu/api/get-current-user";

	//$buffer = include($url);
/*	$buffer = file_get_contents($url);
	echo $buffer;

	$data= json_decode($buffer,true);

	print_r($data);
	echo "<br>";
	echo "##FIXED##";
	echo "<br>";

	print_r($data['users_id']);*/
	
	

	
?>

</body>
</html>