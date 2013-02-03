<?php 
$role = $_GET['role'];   //We handle the role of the client that can be 'robot' or 'remote'

switch ($role) {
    case "robot": //For the case 'robot', we fetch the command from the data.txt file
    $fp = fopen("data.txt","r");
	$order = fgets($fp,255);
	fclose($fp);
	echo $order;		
	break;
    
	case "remote"://For the case 'remote', we write the command passed by the 'order variable in the data.txt file
		$order = $_GET['order'];
		$fp = fopen("data.txt","w");
		fseek($fp,0);
		fputs($fp,$order);
		fclose($fp);
		break;
    default: echo 'Ooops, there is a problem'; //We should never arrive here :)
}
?>