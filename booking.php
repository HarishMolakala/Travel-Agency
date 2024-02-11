<?php
$conn =mysqli_connect("localhost","root","","Project");
if($conn){
    echo "Connection established ... "."<br>";
}
else{
    echo "connection not established... "."<br>";
}
$city=$_POST['To_Where'];
$number=$_POST['How_Many'];
$arraival_date=$_POST['Arrival'];
$leaving_date=$_POST['Leaving'];
$text=$_POST['text'];
#using database:
$query2 = "use Project";
if($conn->query($query2)){
	echo "Database Project succesfully used..."."<br>";
}
else{
	echo "Database not used..."."<br>";
}
$query4 = "INSERT INTO Booking VALUES(?, ?, ?, ?, ?);";
$initialize = mysqli_stmt_init($conn);
if(mysqli_stmt_prepare($initialize, $query4))
{
    mysqli_stmt_bind_param($initialize, "sssss",$city,$number,$arraival_date,$leaving_date,$text);
    mysqli_stmt_execute($initialize);
    echo "<h4 style='color:green'>Records Inserted</h4><br>"."<br>";	
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booked_Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <style>
        h4{
            color: red;
        }
    </style>
</head>
<body>
    <div class="container p-5">
         <h4>Booked Successfully</h4>
         <div class="mb-2">
            <?php
            echo "Your Details Are"."<br>";
            echo "Tourist place:".$city."<br>";
            echo "No.Of Persons:".$number."<br>";
            echo "Arrival_Date:".$arraival_date."<br>";
            echo "Leaving_date:".$leaving_date."<br>";
            echo "Details:".$text."<br>";
            ?>
         </div>
    </div>
</body>
</html>
