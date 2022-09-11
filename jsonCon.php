
<?php

  $host = 'localhost';
	$dbUsername = 'root';
	$dbPassword = '';
	$dbName = 'call';
	$con = new mysqli($host, $dbUsername, $dbPassword, $dbName);


     $jsncntnt = file_get_contents('emergency.json');
     $cntnt = json_decode($jsncntnt, true);


     $FN = $cntnt['Area'];
     $RN = $cntnt['Room'];
     $PN = $cntnt['color'];
     $BN = $cntnt['Building'];


     echo $FN;
     echo $RN;
     echo $PN;
     echo $BN;



$sql = "INSERT INTO calls2 (`AREA`, `ROOM`,`CLR`,`BULD`)
VALUES ('$FN', '$RN', '$PN' , '$BN')";


     if (mysqli_query($con, $sql)) {
          //header("location:index.php");
          header("location:announcement.php");
     }
    else {
        echo "Error: " . $sql . ":-" . mysqli_error($con);
     }
     mysqli_close($con);

?>
