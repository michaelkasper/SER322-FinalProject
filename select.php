<?php
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'test');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL ' . mysqli_connect_error());

if($_POST["btn1"] == 'Click1') {
	$query = "SELECT * FROM asdf2 where name = 'Cowboys'";
}
else if($_POST["btn1"] == 'Click2') {
	$query = "SELECT * FROM asdf2 where name = 'patriots'";
}
else if($_POST["btn1"] == 'Click3') {
	$query = "SELECT * FROM asdf2";
}
else if($_POST["btn1"] == 'Click4') {
	$query = "SELECT teamID FROM asdf2";
}




$response = @mysqli_query($dbc, $query);
if($response) {
	$count = 0;
	while($row = mysqli_fetch_array($response)){
		while($count < count($row) /  2) {
			echo "$row[$count]" . " ";
			$count = $count + 1;
		}
		echo '</br>';
		$count = 0;
	}
} else {
	echo "Couldn't issue database query";
	
	echo mysqli_error($dbc);
}

mysqli_close($dbc);
?>
