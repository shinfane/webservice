<?php
$prefix="/tmp/upload/";
$nbc="/usr/local/bin/nexttool";


function startNBC($file) {

	global $nbc;
	
	$output = `ls -l $file`;
	echo $output;
	$cmd = $nbc;
	//$output = system($cmd);
	exec($cmd, $result);
	echo "<BR>Output:<BR><PRE>";
	foreach ($result as $value) {
		echo $value . "<BR>";
	}
	echo "</PRE>";
	
}
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"]) . " B<br>";

	$filepath=$prefix . $_FILES["file"]["name"];
	
    if (file_exists($prefix . $_FILES["file"]["name"]))
      {
      // echo $_FILES["file"]["name"] . " already exists. ";
	  $cmd="rm " . $filepath;
	  $output = system($cmd);
	  echo "deleted $filepath" . "<BR>";	  
      }
    
      
      move_uploaded_file($_FILES["file"]["tmp_name"],
      $prefix . $_FILES["file"]["name"]);
      echo "Stored in: " . $prefix . $_FILES["file"]["name"] . "<BR>";
	  $robotfile=$_FILES["file"]["name"];
	  startNBC($prefix . $robotfile);
      
    }
  
?>