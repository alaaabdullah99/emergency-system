<!--- old system-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
function popup() {swal("Enter color",'','warning');}
</script>
<?php
 $message = '';
 $error = '';


 if(isset($_POST["submit"]))
 {
      if(empty($_POST["color"]))
      {

           $error="enter color";
      }


      else
      {
           if(file_exists('emergency.json'))
           {


                $extra = array(
                     'Area'               =>     $_POST['area'],
                     'Room'          =>     $_POST["SRN"],
                     'Building'          =>     $_POST["Building"],
                      'color'          =>     $_POST["color"]

                );

              $array_data = $extra;
                $final_data = json_encode($array_data);
                if(file_put_contents('emergency.json', $final_data))
                {
                  $message = "<label class='text-success'>File Appended Success fully</p>";

                     header("location:jsonCon.php");
                }
           }
           else
           {

              echo '<script>alert("JSON File not exits")</script>';
           }
      }

 }
 ?>


 <?php
function buttonf()
{


         $host = 'localhost';
	$dbUsername = 'root';
	$dbPassword = '';
	$dbName = 'call';
	$con = new mysqli($host, $dbUsername, $dbPassword, $dbName);

     $query = "SELECT * FROM class ";

      $res = mysqli_query($con,$query) or die("Query Not Executed " . mysqli_error($con));

              echo'<div id="buttons">';
              while ($row = mysqli_fetch_assoc($res)) {
                  $code = $row['code'];
                  $c=$row['color'];

                  echo('<button type="button" class="ColorB"style="'.$c.'"  id="'.$code.'"  onclick="clicked(this.id)">' .$row['code'].'</button>');

              }

              echo "</div>";

      mysqli_close($con);

}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Announcement</title>
	<link rel="stylesheet" href="E.css">
  <!--style the button-->
  <link rel="stylesheet" href="emergencyStyle.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>

<div class="wrapper">
    <div class="sidebar">

        <h2>ASG</h2>
				<ul>
						<li><a href="profile.html"><i class="fas fa-user"></i>Profile</a></li>
						<li><a href="search.html"><i class="fas fa-search"></i>Search</a></li>
						<li><a href="bar.html"><i class="fas fa-clipboard"></i>Reports</a></li>
						<li><a href="ticket.html"><i class="fas fa-address-book"></i>Manage Staff</a></li>
				</ul>
        <div class="social_media">
          <a href="#"><i class="fas fa-phone"></i></a>
          <a href="#"><i class="fas fa-envelope"></i></a>
          <a href="#"><i class="fas fa-map-marker-alt"></i></a>
      </div>
    </div>

    <div class="main_content">
        <div class="header">Announcement Page  <i class="fas fa-power-off log"></i></div>
        <div class="info">

          <div class="container2">

<!--- old code-->

  <h2>Emergency system </h2>
  <center>

        <label><span id="datetime"></span></label>
        <script>var dt = new Date(); document.getElementById("datetime").innerHTML = dt.getDate() + "/" + (dt.getMonth() + 1) + "/" + dt.getFullYear();</script>
    </center>
    <?php buttonf() ?>

  <form method="post" >
    <?php
    if(!empty($error))
    {

 echo '<script>popup()</script>';

    }
    ?>
  <div id="buttons">
<center>
<table border="0">
  <tr>
    <td><center><label>Area</label></center></td>
    <td><select name="area" id="arealist"  required>
        <option value="1A - Surgical ICU ">1A - Surgical ICU </option>
        <option value="1B - Burn Unit">1B - Burn Unit</option>
        <option value="Burn Unit OR">Burn Unit OR</option>
        <option value="1C - Short Stay">1C - Short Stay</option>
        <option value="1D">1D</option>
        <option value="2A - Delivery ROOM">2A - Delivery ROOM</option>
        <option value="2B - Wellborn Nursery">2B - Wellborn Nursery</option>
        <option value="2B - Pediatric ICU">2B - Pediatric ICU</option>
        <option value="2C">2C</option>
        <option value="2D">2D</option>
        <option value="2E - CCU">2E - CCU</option>
        <option value="3A">3A</option>
        <option value="3B">3B</option>
        <option value="3C">3C</option>
        <option value="3D">3D</option>
        <option value="3E">3E</option>
        <option value="4A">4A</option>
        <option value="4B">4B</option>
        <option value="4C">4C</option>
        <option value="4D">4D</option>
        <option value="4E">4E</option>
        <option value="5A">5A</option>
        <option value="5B">5B</option>
        <option value="E1 - Medical ICU">E1 - Medical ICU</option>
        <option value="E2 - Neonatal ICU">E2 - Neonatal ICU</option>
        <option value="E3">E3</option>
       <option value="E4">E4</option>
       <option value="CATH LAB">CATH LAB</option>
       <option value="Day Surgery">Day Surgery</option>
       <option value="Endoscopy">Endoscopy</option>
       <option value="Hemodialysis">Hemodialysis</option>
      <option value="Peritoneal Dialysis">Peritoneal Dialysis</option>
      <option value="Pediatric Dialysis">Pediatric Dialysis</option>
      <option value="Main OR">Main OR</option>
      <option value="ER">ER</option>
      <option value="OPD MAIN">OPD MAIN</option>
     <option value="EHS">EHS</option>
     <option value="OPD - ENT">OPD - ENT</option>
     <option value="OPD - Opthalmology">OPD - Opthalmology</option>
     <option value="OPD - Dermatology">OPD - Dermatology</option>
     <option value="OPD - Psychiatry">OPD - Psychiatry</option>
    <option value="CSSD">CSSD</option>
      </select></td>
  </tr>
  <tr>

    <td><center><label>Building</label></center></td>

    <td><select name="Building" id="Building"  >
        <option value=""></option>
      <option value="Main Building">Main Building</option>
      <option value="VIP Building">VIP Building</option>
      <option value="Psychiatry Building 200">Psychiatry Building 200</option>
      <option value="Business Center Building">Business Center Building</option>
      <option value="Nephrology Building">Nephrology Building</option>
      <option value="Building 400">Building 400</option>
      <option value="Building 300">Building 300</option>
      <option value="Building 200">Building 200</option>
    </select></td>
  </tr>

  <tr>
    <td><center><label>Room</label></center></td>
    <td><input type="text" maxlength="4" name="SRN" value=""  style="width: 355px;height:25px;" id="rnum" ></td>
  </tr>
</table>
<br>
<button type="submit" name="submit" value="Submit" class="lastbutton" >Submit</button>
<button type="reset" value="Reset" class="lastbutton">Reset</button>

  </center>
  <?php
  if(isset($message))
  {
       echo $message;

  }
  ?>

  </div>

  <input type="hidden" name="color" id="CLR" value="">
</form>
<script>
function clicked(n) {
var e=document.getElementById("CLR");
e.setAttribute("value",n);
}


</script>
<!-- end old code-->


          </div>

      </div>
    </div>
</div>

</body>
</html>
