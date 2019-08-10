<!DOCTYPE html>
<?php include("database.php"); ?>
<?php if(isset($_GET['id']) && isset($_GET['url'])){ 
	$id = $_GET['id']; 
	$url=$_GET['url'];
	
}?>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Start.ly — SAAS Software Landing Template</title>
    <!-- Meta Share -->
    <meta property="og:title" content="Start.ly — Agency One Page Parallax Template" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="images/hero.jpg" />
    <!-- CSS Files -->
    <link href="https://fonts.googleapis.com/css?family=Product+Sans:300,400,700" rel="stylesheet">
    <!-- build:css css/app.min.css -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/global/bootstrap.min.css">
    <!-- Plugins -->
    <link rel="stylesheet" href="css/global/plugins/icon-font.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- /build -->
	
	<style>
		.modal-video{
			width: 300px;
			height:300px;
		}
		#top-bar{
			width: 300px;
		    position: absolute;
		    margin-left: 29.5%;
		    color: white;
		    background-color: black;
		    height: 30px;
		}
		#bottom-bar{
		    background: black;
		    color: white;
		    width: 300px;
		    margin-top: -5px;
		    margin-left: 29.5%;
		    position: absolute;
		    height: 30px;
		}
	</style>


</head>

<body data-spy="scroll" data-target="#site-nav" data-offset="80" data-scroll-animation="true">

    <section class="h-100">
        <div class="row " style="min-height: 800px;">
            <div class="col-12 bg-light  text-center col-md-5 pt-5">
                <div class="box ">
                    <div class="card-body">
                       	<form action="" name="mainForm">
                        	<div class="row">
	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    <label>Top Bar Text</label>
	                                    <input type="text" class="form-control" placeholder="Top Bar Text" name="top-text">
	                                </div>
	                            </div>
	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    <label>Bottom Bar Text</label>
	                                    <input type="text" class="form-control" placeholder="Top Bar Text" name="bottom-text">
	                                </div>
	                            </div>
	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    <label >Font Type</label>
	                                    <select class="form-control"  style="height: 55px;" name="font-type">
										    <option>Arial</option>
										    <option>Calibri</option>
										    <option>Impact</option>
									    </select>
	                                </div>
	                            </div>
	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    <label >Text Size</label>
	                                    <input type="number" class="form-control" placeholder="1px" value="1" name="text-size">
	                                </div>
	                            </div>


	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    <label >Text Align</label>
	                                    <select class="form-control" style="height: 55px;" name="text-align">
									        <option>Align Left</option>
									        <option>Align Right</option>
									        <option>Align Center</option>
									    </select>
	                                </div>
	                            </div>

	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    <label >Line Height</label>
	                                    <input type="number" class="form-control" placeholder="1px" value="1" name="line-height">
	                                </div>
	                            </div>


	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    <label >Top Bar Color</label>
	                                    <input class="form-control" type="color"  name="top-bar-color" value="#ffffff" >
	                                </div>

	                            </div>

	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    <label>Bottom Bar Color</label>
	                                    <input class="form-control" type="color" name="bottom-bar-color" value="#ffffff">
	                                </div>
	                            </div>
	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    <label>Top Bar Text Color</label>
	                                    <input class="form-control" type="color" name="top-bar-text-color" value="#ffffff">   
	                                </div>
	                            </div>
	                            <div class="col-sm-6">
	                                <div class="form-group">
	                                    <label>Bottom Bar Text Color</label>
	                                    <input type="color" class="form-control" name="bottom-bar-text-color" value="#ffffff">
	                                </div>
	                            </div>
			                    <button type="submit" class="btn btn-lg btn-primary col-sm-6 offset-sm-3" data-target="#creatingVideoModal" data-toggle="modal" disabled="" id="createVideoBtn" >Preparing Video...</button>
                        	</div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12 bg-primary pb-5 text-center col-md-7 ">
                <h1 class="light mt-3 mb-5">Video Preview</h1>
				<div id="top-bar">Top Text</div>
                <?php
				if($url==0)
				{
					$view_video = "SELECT * FROM videos WHERE id=".$id." ;";
					$result = $conn->query($view_video);
					while($row = $result->fetch_assoc()) {
				?>
					<video  width="300" controls autoplay >
					 	<source src="uploaded/<?php echo $row['url']; ?>" type="video/mp4" id="video">
					</video>
                <?php  }
            	} else if($url==1){
					$arrContextOptions=array(
					    "ssl"=>array(
					        "verify_peer"=>false,
					        "verify_peer_name"=>false,
					    ),
					);  
				    $data=file_get_contents("https://www.youtube.com/get_video_info?video_id=".$id,false, stream_context_create($arrContextOptions));
				  	parse_str($data);
				  	$arr=explode(",",$url_encoded_fmt_stream_map);
				  	parse_str($arr[0]);
				  	echo "<video width='300' controls autoplay src='$url' id='video'></video>";
				}?>
				<div id="bottom-bar">Bottom Text</div>

				<br><br><br>
				<div class="form-group">
					<label for="">start</label>
					<input type="number" name="start" placeholder="seconds">
				</div>
				<div class="form-group">
					<label for="">end</label>
					<input type="number" name="end" placeholder="seconds">					
				</div>



            </div>
        </div>
    </section>
    <!-- // end #blog.section -->
    <!-- // end #about.section -->
    <!-- // end .agency -->


	
<div class="modal fade" id="creatingVideoModal" tabindex="-1" role="dialog" aria-labelledby="creatingVideoModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Your Video</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row justify-content-sm-center" id="loading">
            <img src="./images/Spinner.gif" alt="Laoding Images">
        </div>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="redefine();"> Close</button>
        <a id="download" href="" download="new title"><button type="button" class="btn btn-secondary" >Download</button></a>

      </div>
    </div>
  </div>
</div>
	



    <!-- build:js js/app.min.js -->
    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="js/global/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="js/global/bootstrap.bundle.min.js"></script>
    <!-- Main JS -->
    <script src="js/script.js"></script>
    <!-- /build -->


	<script>
		$(document).ready(function(){

			$.ajax({
				url:"downloadVideo.php",
				type:"post",
				data:{videoUrl:$("#video").attr("src")},
				success:function(data){
					data = JSON.parse(data);
					if(data.downloaded){
						$("#createVideoBtn").prop("disabled",false);
						$("#createVideoBtn").text("Create Video");
						$("#video").attr("src",data.source);

					}else{
						$("#createVideoBtn").text("Error!!!");
					}
				}
			});

			$("input[name='top-text']").on("change",function(){
				$("#top-bar").text($(this).val());
			});
			$("input[name='bottom-text']").on("change",function(){
				$("#bottom-bar").text($(this).val());
			});

			$("input[name='top-bar-color']").on("change",function(){
				$("#top-bar").css("background",$(this).val());
			})
			$("input[name='bottom-bar-color']").on("change",function(){
				$("#bottom-bar").css("background",$(this).val());
			})
			$("input[name='top-bar-text-color']").on("change",function(){
				$("#top-bar").css("color",$(this).val());
			})
			$("input[name='bottom-bar-text-color']").on("change",function(){
				$("#bottom-bar").css("color",$(this).val());
			})


			$("form[name='mainForm']").on("submit",function () {
				debugger;
				var form = new FormData($(this)[0]);
				form.append("videoUrl",$("#video").attr("src"));
				form.append("start",$("input[name='start']").val());
				form.append("end",$("input[name='end']").val());
				$.ajax({
					url:"processAjax.php",
					type:"post",
					data:form,
					processData: false,
					contentType: false,
					  
					success:function(data){
						console.log(data);
						data = JSON.parse(data);
						$("#loading").empty();
						$("#loading").append("<video class='modal-video' src='"+data.path+"' controls>");
						$("#download").attr("href",data.path);	
					}
				});

				return false;
			});

		});

		function redefine(){
			$("#loading").empty();
			$("#loading").append($("<img src='./images/Spinner.gif'> "));
		}
	</script>





</body>

</html>
