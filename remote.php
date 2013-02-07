<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>NXT Command Center</title>
<!--We load jquery as we use the Ajax GET fucntion of the library -->
<script type="Text/Javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script type="Text/Javascript">
$(document).ready(function(){
	
  $("#FORWARD").mousedown(function(){
   $.get("/~micha/webservice/m.php?role=remote&order=1"); //for items with the ID Forward, we send '1' on mousedown
  });
$("#BACKWARD").mousedown(function(){
	$.get("/~micha/webservice/m.php?role=remote&order=2") //For items with the ID Backward, we send '2' on mousedown
  });

$("#LEFT").mousedown(function(){
	$.get("/~micha/webservice/m.php?role=remote&order=3") //For items with the ID Left, we send '3' on mousedown
  });

$("#RIGHT").mousedown(function(){
	$.get("/~micha/webservice/m.php?role=remote&order=4") //For items with the ID Right, we send '4' on mousedown
  });

$("#STOP").mousedown(function(){
	$.get("/~micha/webservice/m.php?role=remote&order=0") //For items with the ID Stop, we send '0' on mousedown
  });

$("#RELEASE").mousedown(function(){
  	$.get("/~micha/webservice/m.php?role=remote&order=5") //For items with the ID Release, we send '5' on mousedown
    });

$("#STATUS").mousedown(function(){
	  	$.get("/~micha/webservice/m.php?role=cloudtx&order=6") 
	    });


$(".remoteControl").mouseup(function(){
	$.get("/~micha/webservice/m.php?role=remote&order=99") //For all items with the class remoteControl, we send 0 on mouseup
  });
});
</script>
</head>
<body>
<!--
Each Button has an ID allowing to perform the associated action on mousedown.
All buttons have the same class 'remoteControl' in order to send a STOP commend on the mouseup event
-->

<button id="FORWARD" class="remoteControl">FORWARD</button>
<button id="BACKWARD" class="remoteControl">BACKWARD</button>
<button id="LEFT" class="remoteControl">LEFT</button>
<button id="RIGHT" class="remoteControl">RIGHT</button>
<button id="STOP" class="remoteControl">STOP</button>
<button id="RELEASE" class="remoteControl">RELEASE</button>
<button id="STATUS" class="remoteControl">STATUS</button>
</body>
</html>
