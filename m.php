<?php 
	require_once "phar://iron_mq.phar";
	require_once "phar://iron_cache.phar";

// oauth token and project ID stored locally because of public github repo
// those would have to be added to the code
	
	$cache = new IronCache();
	$ironmq = new IronMQ;

//We handle the multiple roles of the client that can be 'robot' or 'remote'

$role = $_GET['role'];   


// read the NXT status
// Voltage NXT
// Voltage WB
// Sensor1

function getStatus($icache){
	
	global $cache;
	
	$cache->setCacheName($icache);
	$vnxt=$cache->get("VNXT")->value;
	echo "Voltage NXT:$vnxt<BR>";
	$vwb=$cache->get("VWB")->value;
	echo "Voltage WB :$vwb<BR>";
	
}

// I will need to add some error handling... later :)
// TODO Error Handling

switch ($role) {
    case "robot": //For the case 'robot', we fetch the command from the data.txt file
	    $fp = fopen("data.txt","r");
		$order = fgets($fp,255);
		fclose($fp);
		echo $order;		
		break;
    
	case "_remote"://For the case 'remote', we write the command passed by the 'order variable in the data.txt file
		$order = $_GET['order'];
		$fp = fopen("data.txt","w");
		fseek($fp,0);
		fputs($fp,$order);
		fclose($fp);
		break;
		
	case "remote":
		$order = $_GET['order'];
		$cmd="/usr/local/bin/nexttool /COM=usb -msg=" . $order;
		exec($cmd, $result);
	
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
		
	case "status":
		$cn=$_GET['cn'];
		getStatus($cn);
		break;
		
	case "get_all":
		$cn=$_GET['cn'];
		$cache->setCacheName($cn);
		$message=$cache->getCache($cn);
		
		
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
		$ironmq->postMessage("nxt_queue", $order, array('expires_in' => 10));
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