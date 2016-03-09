<?php 



echo "Hello hello<br>" ;

           

include ("account.php") ;

( $dbh = mysql_connect ( $hostname, $username, $password ) )

	        or die ( "Unable to connect to MySQL database" );

print "Connected to MySQL<br>";



mysql_select_db( $project );



$user = $_GET["user"];

$user = mysql_real_escape_string($user);

echo "<br>Username: $user<br>";



$course = $_GET["course"];

$course = mysql_real_escape_string($course);

echo "<br>Course: $course<br>";



$a1 = $_GET["a1"];

$a1 = mysql_real_escape_string($a1);

echo "<br>A1: $a1<br>";

	

$a1s = $_GET["a1s"];

$a1s = mysql_real_escape_string($a1s);

echo "<br>A1S: $a1s<br>";





$a2 = $_GET["a2"];

$a2 = mysql_real_escape_string($a2);

echo "<br>A2: $a2<br>";

	                                          

$a2s = $_GET["a2s"];

$a2s = mysql_real_escape_string($a2s);

echo "<br>A2S: $a2s<br>";



$part = $_GET["part"];

$part = mysql_real_escape_string($part);

echo "<br>PART: $part<br><br>";



include ("functions.php") ;

$count = Rnum($user, $email);

$number = Gnum($user , $course);



if(Rnum($user, "")== 0){

    die (" $user needs to be registered first.");

}

if(Gnum($user, $course)== 0){

	$s = "Insert into Grades values('$user', '$course', '$a1', '$a1s', '$a2', '$a2s', '$part', '$total', '$percent')";

	( $t = mysql_query ( $s  ) ) or die ( mysql_error() );

	

	mysql_query("UPDATE `Registered` SET `numcourses`=numcourses+`1`

            WHERE user = '$user' ");

	

echo "Grades inserted successfully!!";

}

if(isset($_GET["A1check"])){

	$a = "update `Grades` SET a1 = '$a1', a1s = '$a1s' where user = '$user' and course = '$course' ";

	($t1 = mysql_query($a)) or die (mysql_error());	

}

if(isset($_GET["A2check"])){

	$b = "update `Grades` SET a2 = '$a2', a2s = '$a2s' where user = '$user' and course = '$course'";

	($t2 = mysql_query($b)) or die (mysql_error());

}

