<?php
    


    set_time_limit(200);

    if(isset($_POST["top-text"])){
        $topText = $_POST["top-text"];
    }else{
        $topText = "";
    }
    if(isset($_POST["bottom-text"])){
        $bottomText = $_POST["bottom-text"]; 
    }else{
        $bottomText = "";
    }

    if(isset($_POST["font-type"])){
        $fontType = $_POST["font-type"];
    }else{
        $fontType = "Arial";
    }
    if(isset($_POST["text-size"])){
        $textSize = $_POST["text-size"];
    }else{
        $textSize = 24;
    }

    $textAlign = $_POST["text-align"];
    
    if(isset($_POST["line-height"])){
        $lineHeight = $_POST["line-height"];
    }else{
        $lineHeight = 4;
    }
    if(isset($_POST["top-bar-color"])){
        $topBarColor = $_POST["top-bar-color"];
    }else{
        $topBarColor = "white";
    }


    if(isset($_POST["bottom-bar-color"])){
        $bottomBarColor = $_POST["bottom-bar-color"];
    }else{
        $bottomBarColor = "white";
    }

    if(isset($_POST["top-bar-text-color"])){
        $topBarTextColor=$_POST["top-bar-text-color"];
    }else{
        $topBarTextColor="black";
    }

    if(isset($_POST["bottom-bar-text-color"])){
        $bottomBarTextColor=$_POST["bottom-bar-text-color"];
    }else{
        $bottomBarTextColor ="black";
    }

    $path = $_POST["videoUrl"];

    $time = time();
    $cmd="ffmpeg -i $path -filter_complex \"[0:v]pad=iw:ih+100:0:(oh-ih)/2, drawbox=x=0:y=0:h=50:color=$topBarColor:t=fill,drawtext=text='$topText':fontfile=C:\Windows\Fonts\Arial.ttf:fontsize=$textSize:x=(w-tw)/2:y=(50-th)/2:fontcolor=$topBarTextColor,drawbox=x=0:y=ih-h:h=50:color=$bottomBarColor:t=fill,drawtext=text='$bottomText':fontfile=C:\Windows\Fonts\Arial.ttf:fontsize=$textSize:x=(w-tw)/2:y=h-25-(th/2):fontcolor=$bottomBarTextColor\" ./media/$time-output.mp4";

	shell_exec($cmd);




    $trimmed = "ffmpeg -i ./media/$time-output.mp4 -ss {$_POST['start']} -to {$_POST['end']} -c copy ./media/$time-trimmed.mp4";
    shell_exec($trimmed);
                
    echo json_encode(array("path"=>"./media/$time-trimmed.mp4"));