<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reports</title>
	<link rel="stylesheet" href="E.css">

	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <!-- old system-->
  <script>
    var api_url = 'https://api.pray.zone/v2/times/today.json?longitude=50.0888&latitude=26.4207&elevation=333';

  function mp3(audiofile) {
    var myMP3 = new Audio(audiofile);
    myMP3.play();
  }
  function voice() {
    //var h = new Date().getHours();
    var minute = new Date().getMinutes();
    var today = new Date();
    var time = (today.getHours() < 10 ? "0" + today.getHours() : today.getHours()) + ":" + (today.getMinutes() < 10 ? "0" + today.getMinutes() : today.getMinutes());
  var date= today.getDate()+"/"+(today.getMonth()+1);

    var userLang = navigator.language || navigator.userLanguage;
    var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
      if (request.readyState === 4) {
        if (request.status === 200) {
          var prayer_results = JSON.parse(request.responseText);
          console.log(JSON.stringify(prayer_results.results.location.local_offset));
          var prayer_date = new Date(prayer_results.results.datetime[0].date.gregorian);
          var Fajr = prayer_results.results.datetime[0].times.Fajr;
          var Dhuhr = prayer_results.results.datetime[0].times.Dhuhr;
          var Asr = prayer_results.results.datetime[0].times.Asr;
          var Maghrib = prayer_results.results.datetime[0].times.Maghrib;
          //var Isha = prayer_results.results.datetime[0].times.Isha;
          console.log(time);
          console.log(Dhuhr);
            var h = parseInt(Maghrib.substring(0, 2));
            var m = parseInt(Maghrib.substring(3, 5));
            var Isha = "";
            if ((m + 30) > 60) {
              h = h + 2;
              m = ((m + 30) - 60) - 15;
              if (m < 10) {
                if (h < 10) {
                  Isha = "0" + h + ":" + "0" + m;
                }
                else {
                  Isha = h + ":" + "0" + m;
                }
              }
              else {
                if (h < 10) {
                  Isha = "0" + h + ":" + m;
                }
                else {
                  Isha = h + ":" + m;
                }
              }
            }
            else {
              h = h + 1;
              m = m + 30;
              if (m < 10) {
                if (h < 10) {
                  Isha = "0" + h + ":" + "0" + m;
                }
                else {
                  Isha = h + ":" + "0" + m;
                }
              }
              else {
                if (h < 10) {
                  Isha = "0" + h + ":" + m;
                }
                else {
                  Isha = h + ":" + m;
                }
              }
            }

  // visiting time ends in half an hour
          if (time == "15:30") {
            mp3("visitHalf.MP4");
          }
          // visiting time ends Now
           if(time=="16:01"){
          mp3("visitNow.MP4");
          }
          // instructions
           if(minute==0){
            mp3("instructions.MP4");
          }
           if (time ==Fajr ) {
            mp3("Fajir.MP4");
          }
          // prayer Dhuhr
           if (time == Dhuhr) {
            mp3("Dhuhr.MP3");
          }
            // prayer Asr
           if (time == Asr) {
            mp3("Asr.MP3");
          }
            // prayer Maghrib
           if (time == Maghrib) {
            mp3("Maghrib.MP3");
          }
            // prayer Isha
           if (time == Isha) {
            mp3("Ishaa.MP3");
              console.log(Isha);
          }

        } else {
          console.log('An error occurred during your request: ' + request.status + ' ' + request.statusText);
        }
        if(time=="11:02"){
          let test = new SpeechSynthesisUtterance();
          switch (date) {
            case "5/1": case "5/6":
                      test.text="this is test for code red";
                          break;
            case "10/1": case "10/4": case "10/7": case "10/10":
                        test.text="this is test for code blue";
                            break;
             case "1/8":
                          test.text="this is test for code orange";
                            break;
              case "1/8":
                            test.text="this is test for code brown";
                            break;
              case "12/10":
                            test.text="this is test for code pink";
                            break;
              case "1/3":
                            test.text="this is test for code white";
                            break;
              case "8/12":
                            test.text="this is test for code silver";
                            break;
              case "10/4":
                            test.text="this is test for code black";
                            break;
              case "25/11":
                          test.text="this is test for code grey";
                            break;
              case "20/7":
                            test.text="this is test for code yellow";
                            break;
          }
         test.lang="en";
          window.speechSynthesis.speak(test);
        }

      }
    };
    request.open('Get', api_url, true);
    request.send();

    document.write("<center><h2>time now <br>" + time + "</h2></center>");


  }

  </script>
  <script>
  let voices = [];
  let speech = new SpeechSynthesisUtterance();


    function myFunction(FN,RN,RO,CC,RT,LS) {

        if (FN!= "" && RN != "" && RO != "" && CC != "" && LS != "") {

              // if all field filled

                  speech.text= "Attention!, All clear , Code " + CC +" , Area " + RN + ",  "+ FN +  ", Room "+ RO ;

          }
            // if  building and room are empty
            else if(FN=="" && RO=="")
            speech.text= "Attention!, All clear , Code " + CC + ", Area "+ RN ;
            // if  building is empty
            else if(FN=="" )
             speech.text= "Attention!, All clear , Code " + CC + ", Area "+ RN + ", Room "+ RO;
             // if  room is empty
            else if( RO=="")
            speech.text= "Attention!, All clear , Code " + CC + ", Area "+ RN+ ",  "+ FN;

          //Setting
           speech.lang = "en";
           speech.rate = 1;
           speech.volume=1;

         // if  the gender of color is Male
        if(LS==1){
          window.onload=function(){
            voices = window.speechSynthesis.getVoices();
            speech.voice = voices[1];
            window.speechSynthesis.speak(speech);
          }
  // to repeat the annoucment
            console.log("here 1");
            if(RT>1)
            timeFunction1();
            if(RT>2)
            timeFunction1();
        }
     // if  the gender of color is Female
        else if(LS==0){
          window.onload=function(){
            voices = window.speechSynthesis.getVoices();
            speech.voice = voices[3];
            speech.pitch=0;
            speech.rate = 0.9;
            speech.volume=100;
          window.speechSynthesis.speak(speech);
          }
   //to repeat the annoucment
            console.log("HERE 2");
            if(RT>1)
            timeFunction0();
            if(RT>2)
            timeFunction0();}
         else {
            responsiveVoice.speak("error");
        }

        function timeFunction0() {
          setTimeout(function(){ play1(); }, 7000);
        }
                   function play1(){
                    window.speechSynthesis.speak(speech);}


        function timeFunction1() {
        setTimeout(function(){ play2(); }, 7000);}

        function play2(){
            window.speechSynthesis.speak(speech);}

    //}
  }
  </script>
<!--end old system-->
</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <!--<h2>Vaccine Center</h2>-->
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
        <div class="header">Caller <i class="fas fa-power-off log"></i></div>
        <div class="info">

          <div class="container2">
<!--
<div class="box1">
	<img  src="logo.png" height="300px"width="300px">
	<center>
	<table class="styled-table">
<thead>
<tr>
<th>Code</th>
<td>Room</td>
</tr>
</thead>

			<tr>
				<td>Red</td>
				<td>110</td>
			</tr>


	</table>
	</center>

</div>
-->


<!-- old system-->
<br><br>
<center><h1>Caller Page</h1></center>

<br>
<!---call voice function-->
<script>voice();</script>
<?php
     $host = 'localhost';
	$dbUsername = 'root';
	$dbPassword = '';
	$dbName = 'call';


// Create connection
$con = new mysqli($host, $dbUsername, $dbPassword, $dbName);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$sql = "SELECT * FROM calls2 WHERE id=(SELECT MAX(id) FROM calls2);";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

$called=$row["calledOrNot"];
$room=$row["ROOM"];
$FN=$row["BULD"];
$ID=$row["ID"];
$RN=$row["AREA"];
$CC=$row["CLR"];



$sql = "SELECT * FROM class WHERE code='$CC';";
$result2 = $con->query($sql) or die($con->error);;

while($row = $result2->fetch_assoc()) {
  // get number of repeat and the gender
$RT=$row["times"];
$LS=$row["gender"];
}

// display last call in table

echo "</i><br><br><center><h3>Last call was in</h3></center>";
echo "<center><table border='1' class='styled-table'> <thead><tr><th>building</th><th>Area</th><th>Room</th></tr> </thead>
<tr><td>$FN</td><td>$RN</td><td>$room</td></tr></table></center>";


    if($called==1){
        echo "<script>window.setTimeout(function () {
            window.location.reload();
          }, 30000);</script>";


        return;
    }
// update call to be not play again
    $sqll= "UPDATE calls2 SET calledOrNot = 1 where ID = '$ID' ";
    if (mysqli_query($con, $sqll)) {
        echo "<center><h2>Done <br></h2></center>";
     }

    else {
        echo "Error: " . $sqll . ":-" . mysqli_error($con);
     }
    }


?>

<script>
var FN = "<?php echo $FN; ?>";
var RN = "<?php echo $RN; ?>";
var CC = "<?php echo $CC; ?>";
var RO ="<?php echo $room; ?>";
var RT = "<?php echo $RT; ?>";
var LS = "<?php echo $LS; ?>";

myFunction(FN,RN,RO,CC,RT,LS);

// set time to refresh the page
window.setTimeout(function () {
  window.location.reload();
}, 30000);

</script>
    <?php

} else {
    echo "0 results";
}

mysqli_close($con);
?>

<!--- end old system-->

          </div>

      </div>
    </div>
</div>

</body>
</html>
