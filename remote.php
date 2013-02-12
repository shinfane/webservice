<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>NXT Command Center</title>
<!--We load jquery as we use the Ajax GET fucntion of the library -->
<script type="Text/Javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script type="Text/Javascript">
$(document).ready(function(){
	
  $("#FORWARD").mousedown(function(){
   //$.get("/~micha/webservice/m.php?role=c_w&cn=nxtmove&key=move&value=1"); //for items with the ID Forward, we send '1' on mousedown
	$.get("/~micha/webservice/m.php?role=remote&order=1");
  });
$("#BACKWARD").mousedown(function(){
	//$.get("/~micha/webservice/m.php?role=c_w&cn=nxtmove&key=move&value=2") //For items with the ID Backward, we send '2' on mousedown
	$.get("/~micha/webservice/m.php?role=remote&order=2");
  });

$("#LEFT").mousedown(function(){
	//$.get("/~micha/webservice/m.php?role=c_w&cn=nxtmove&key=move&value=3") //For items with the ID Left, we send '3' on mousedown
	$.get("/~micha/webservice/m.php?role=remote&order=3");
  });

$("#RIGHT").mousedown(function(){
	//$.get("/~micha/webservice/m.php?role=c_w&cn=nxtmove&key=move&value=4") //For items with the ID Right, we send '4' on mousedown
    $.get("/~micha/webservice/m.php?role=remote&order=4");
  });

$("#STOP").mousedown(function(){
	//$.get("/~micha/webservice/m.php?role=c_w&cn=nxtmove&key=move&value=0");//For items with the ID Stop, we send '0' on mousedown
	$.get("/~micha/webservice/m.php?role=remote&order=0");
  });

$("#RELEASE").mousedown(function(){
  	//$.get("/~micha/webservice/m.php?role=c_w&cn=nxtmove&key=move&value=5") //For items with the ID Release, we send '5' on mousedown
	$.get("/~micha/webservice/m.php?role=remote&order=5");
    });

$("#STATUS").mousedown(function(){
	//$.get("/~micha/webservice/m.php?role=c_w&cn=nxtmove&key=move&value=6") 
	$.get("/~micha/webservice/m.php?role=remote&order=6");
	 });
$("#LSCAN").mousedown(function(){
	 	//$.get("/~micha/webservice/m.php?role=c_w&cn=nxtmove&key=move&value=6") 
	$.get("/~micha/webservice/m.php?role=remote&order=7");
	});
		 
$("#RSCAN").mousedown(function(){
		 	//$.get("/~micha/webservice/m.php?role=c_w&cn=nxtmove&key=move&value=6") 
	$.get("/~micha/webservice/m.php?role=remote&order=8");
	});


$(".remoteControl").mouseup(function(){
	//$.get("/~micha/webservice/m.php?role=c_w&cn=nxtmove&key=move&value=99") //For all items with the class remoteControl, we send 0 on mouseup
	$.get("/~micha/webservice/m.php?role=remote&order=99");
  });

});
</script>
</head>
<body>
<!--
Each Button has an ID allowing to perform the associated action on mousedown.
All buttons have the same class 'remoteControl' in order to send a STOP commend on the mouseup event
-->

<img src=http://192.168.1.133:8080><BR>

<button id="FORWARD" class="remoteControl">FORWARD</button>
<button id="BACKWARD" class="remoteControl">BACKWARD</button>
<button id="LEFT" class="remoteControl">LEFT</button>
<button id="RIGHT" class="remoteControl">RIGHT</button>
<button id="STOP" class="remoteControl">STOP</button>
<button id="RELEASE" class="remoteControl">RELEASE</button><br>
<button id="STATUS" class="remoteControl">STATUS</button>
<button id="LSCAN" class="remoteControl">LEFTSCAN</button>
<button id="RSCAN" class="remoteControl">RIGHTSCAN</button>
	
</body>
</html>
