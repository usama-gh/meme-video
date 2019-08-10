<?php

set_time_limit(200);
    
$data = array("downloaded"=>false,"source"=>"","seconds"=>0);
$time = time();
$path = $_POST["videoUrl"];
$result = file_put_contents("./media/$time-vid.mp4",file_get_contents($path));
 
if($result){

	$seconds= intval(shell_exec("ffprobe ./media/$time-vid.mp4 -show_format 2>&1 | sed -n 's/duration=//p' "));
				
	$data["source"]="./media/$time-vid.mp4";
	$data["downloaded"]=true;
	$data["seconds"] = $seconds;

}

echo json_encode($data);