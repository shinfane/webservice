<?php 
	require_once "phar://iron_mq.phar";
	require_once "phar://iron_cache.phar";
	
	$cache = new IronCache();
	$ironmq = new IronMQ;

$role = $_GET['role'];   //We handle the role of the client that can be 'robot' or 'remote'


// I will need to add some error handling... later :)


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
	
	case "c_w":
		$cn=$_GET['cn'];
		$key=$_GET['key'];
		$value=$_GET['value'];
		$cache->setCacheName($cn);
		$cache->put($key,$value);
		break;
		
	case "c_r":
		$cn=$_GET['cn'];
		$key=$_GET['key'];
		$cache->setCacheName($cn);
		$message=$cache->get($key)->value;
		echo "$message<BR>";
		break;
		
		
	case "display_s":
		$msg=$_GET['msg'];
		$voltage=$msg/10;
		$cache->setCacheName('NXT_STATUS');
		$cache->put("Voltage","$voltage");
		
		break;
		
	case "display_r":
		$cache->setCacheName('NXT_STATUS');
		$message=$cache->get("Voltage")->value;

		echo "$message<BR>";
		break;
		
	case "cloudtx":
		$order=$_GET['order'];
		// $queue=$_GET['queue'];
		$ironmq->postMessage("nxt_queue", $order, array('expires_in' => 60));
		break;
	
	case "cloudrx":
		$message = $ironmq->getMessage("nxt_queue");
		$order=$message->body;
		$id=$message->id;
		
		echo $order;
		if ($id>0) {
			$ironmq->deleteMessage("nxt_queue", $id);
		} else { echo 'ENOMSG' ; }
		
		break;
			
    default: echo 'Ooops, there is a problem'; //We should never arrive here :)
	
	
}
?>