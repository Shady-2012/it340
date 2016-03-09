$s = "Select * from Registered where user = '$x' or email = '$y'";

$t = mysql_query($s) or die ( mysql_error() );

$count = mysql_num_rows($t);

return $count;

}

function Gnum( $a, $b )

{

$g = "Select * from Grades where user = '$a' and course = '$b'";

$t1 = mysql_query($g) or die ( mysql_error() );

$number = mysql_num_rows($t1);

return $number;

}



?>

