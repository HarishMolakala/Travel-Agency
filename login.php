<?php
$conn =mysqli_connect("localhost","root","","Project");
if($conn){
    echo "Connection established ... "."<br>";
}
else{
    echo "connection not established... "."<br>";
}

$email=$_POST['login-email'];
$password=$_POST['login-password'];
#using database:
$query2 = "use Project";
if($conn->query($query2)){
	echo "Database Project succesfully used..."."<br>";
}
else{
	echo "Database not used..."."<br>";
}
$query4 = "INSERT INTO Login_Details VALUES(?, ?);";
$initialize = mysqli_stmt_init($conn);
if(mysqli_stmt_prepare($initialize, $query4))
{
    mysqli_stmt_bind_param($initialize, "ss",$email,$password);
    mysqli_stmt_execute($initialize);
    echo "<h4 style='color:yellow'>Records Inserted</h4><br>"."<br>";
	
}

header("Location:home_1.html");
exit;
?>
