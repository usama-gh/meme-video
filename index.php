<!DOCTYPE html>
<?php include("database.php"); ?>
<?php
if(isset($_POST['submit']))
{
    $target_dir = "uploaded/";

    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    if($imageFileType!="") 
    {
        if($imageFileType != "mp4" && $imageFileType != "avi" && $imageFileType != "mov" && $imageFileType != "3gp" && $imageFileType != "mpeg")
        {
            echo "<p class='text-danger' style='font-size:15px;'>File Format Not Suppoted</p>";
            $uploaded=0;
        } 
        else
        {
            $video_path=$_FILES['fileToUpload']['name'];

            $insert_video = "INSERT INTO videos (url)
            VALUES ('$video_path')"; 
            $run1=mysqli_query($conn, $insert_video);

            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file);
            $view_video = "SELECT * FROM videos WHERE id=(select max(id) from videos) ;";
            $result = $conn->query($view_video);
            while($row = $result->fetch_assoc())
            {
                $id=$row["id"];
                header("Location: process.php?id=".$id."&url=0");	
            }
        }
    }
    else
    {
        echo "<p class='text-danger' style='font-size:15px;'>First Specify File</p>";
    }
}
?>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Start.ly — SAAS Software Landing Template</title>
        <!-- Meta Share -->
        <meta property="og:title" content="Start.ly — Agency One Page Parallax Template" />
        <meta property="og:type" content="website" />
        <meta property="og:image" content="images/screen.jpg" />
        <!-- CSS Files -->
        <link href="https://fonts.googleapis.com/css?family=Product+Sans:300,400,700" rel="stylesheet">
        <!-- build:css css/app.min.css -->
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/global/bootstrap.min.css">
        <!-- Plugins -->
        <link rel="stylesheet" href="css/global/plugins/icon-font.css">
        <!-- Main CSS -->
        <link rel="stylesheet" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
        <!-- /build -->
    </head>

    <body class="overflow-hidden">
        <header id="home">
            <!-- navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <h3 class="gradient-mask">Start.ly</h3>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#site-nav" aria-controls="site-nav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="site-nav">
                    <ul class="navbar-nav text-sm-left ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#features">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pricing">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="blog.html">Blog</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" data-toggle="dropdown">Pages <span class="pe-2x pe-7s-angle-down"></span>  </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="index-two.html">Landing Style Two</a>
                                <a class="dropdown-item" href="blog.html">Blog Page</a>
                                <a class="dropdown-item" href="blog-single.html">Blog Single</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Help</a>
                        </li>

                        <li class="nav-item text-center">
                            <a href="#signup" class="btn align-middle btn-outline-primary my-2 my-lg-0">Login</a>
                        </li>
                        <li class="nav-item text-center">
                            <a href="#signup" class="btn align-middle btn-primary my-2 my-lg-0">Sign Up</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
        <!-- // end navbar -->


        <!-- hero -->
        <section class="jumbotron-two">

            <div class="container">

                <div class="row align-items-center">
                    <div class="col-12 col-md-9 my-3 my-md-lg">

                       <h1 class="display-2">Meme Maker.</h1>
                       <h3 class="text-muted mb-3">Create high engagement video content for your business.</h3>
                       <form action="index.php" method="post" enctype="multipart/form-data">
                          <div class="row">
                              <div class="col">
                                <input type="text" id="myInput" class="form-control" placeholder="Paste Youtube Video URL" style="width:50%" 
                                onkeyup="myFunction(document.getElementById('myInput').value)">
                                <input type="hidden" id="videoId">

                            </div>
                        </div>
                        <br/>
                        <div class="row">
                          <div class="col">
                            <input class="btn btn-lg btn-primary"  
                            type="submit" name="submit" value="OR UPLOAD">
                            &nbsp;&nbsp;
                            <input class="btn btn-lg btn-primary" accept="video/mp4,video/*,image/*"
                            type="file" name="fileToUpload" id="fileToUpload">
                            

                        </div>
                    </div>
                </form>

                <div class="col-12 col-md-3 my-3 my-md-lg">


                </div>
            </div>

        </div>

    </section>
    <!-- // end hero -->


    <div class="bg-shape"></div>
    <div class="bg-circle"></div>
    <!--<div class="bg-circle-two"></div>-->

</header>
<div class="section" id="intro">
    <div class="container">

        <div class="client-logos text-center">
            <p class="text-muted">TRUSTED BY MOST POPULAR BRANDS</p>

            <img src="images/client_logo_1.png" alt="client logo" />
            <img src="images/client_logo_2.png" alt="client logo" />
            <img src="images/client_logo_3.png" alt="client logo" />
            <img src="images/client_logo_4.png" alt="client logo" />
            <img src="images/client_logo_5.png" alt="client logo" />
            <img src="images/client_logo_6.png" alt="client logo" />
            <img src="images/client_logo_7.png" alt="client logo" />
            <img src="images/client_logo_8.png" alt="client logo" />
            <img src="images/client_logo_9.png" alt="client logo" />
            <img src="images/client_logo_10.png" alt="client logo" />

        </div>
        <!-- // end .client-logos -->

    </div>
    <!-- // end .container -->
</div>
<!-- // end #services.section -->
<div class="section bg-light pt-lg">
    <div class="container">

        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="media mb-5">
                    <div class="media-icon d-flex mr-3"> <i class="pe-7s-paint-bucket pe-3x"></i> </div>
                    <!-- // end .di -->
                    <div class="media-body">
                        <h5 class="mt-0">Easy Customization</h5> Cras sit amet nibh libero, in gravida nulla. Nulla vel
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="media mb-5">
                    <div class="media-icon d-flex mr-3"> <i class="pe-7s-rocket pe-3x"></i> </div>
                    <!-- // end .di -->
                    <div class="media-body">
                        <h5 class="mt-0">Super Fast</h5> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante.
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="media mb-5">
                    <div class="media-icon d-flex mr-3"> <i class="pe-7s-piggy pe-3x"></i> </div>
                    <!-- // end .di -->
                    <div class="media-body">
                        <h5 class="mt-0">Save Money</h5>in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="media mb-5">
                    <div class="media-icon d-flex mr-3"> <i class="pe-7s-cloud-upload pe-3x"></i> </div>
                    <!-- // end .di -->
                    <div class="media-body">
                        <h5 class="mt-0">Cloud Upload</h5> sit amet nibh libero, in gravida nulla. vel metus scelerisque ante sollicitudin.
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="media mb-5">
                    <div class="media-icon d-flex mr-3"> <i class="pe-7s-science pe-3x"></i> </div>
                    <!-- // end .di -->
                    <div class="media-body">
                        <h5 class="mt-0">Proven Technology</h5> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus ante .
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="media mb-5">
                    <div class="media-icon d-flex mr-3"> <i class="pe-7s-like2 pe-3x"></i> </div>
                    <!-- // end .di -->
                    <div class="media-body">
                        <h5 class="mt-0">100% Satisfaction</h5>Amet nibh libero, in gravida nulla. Nulla vel metus ante sollicitudin.
                    </div>
                </div>
            </div>
            <!-- // end .col -->
        </div>
    </div>
</div>

<!-- Features -->
<div class="section" id="features">

    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-8">
                <div class="browser-window limit-height my-5 mr-0 mr-sm-5">
                    <div class="top-bar">
                        <div class="circles">
                            <div class="circle circle-red"></div>
                            <div class="circle circle-yellow"></div>
                            <div class="circle circle-blue"></div>
                        </div>
                    </div>
                    <div class="content">
                        <img src="images/dashboard.png" alt="image">
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="media">
                    <div class="media-body">
                        <div class="media-icon mb-3"> <i class="pe-7s-like2 pe-3x"></i> </div>
                        <h3 class="mt-0">Perfect Dashboard</h3>
                        <p> Reprehenderit nemo quod tempore doloribus ratione distinctio quis quidem vitae sunt reiciendis, molestias omnis soluta?</p>
                    </div>
                </div>
            </div>

        </div>



        <div class="row align-items-center mt-5">

            <div class="col-sm-4">
                <div class="media">
                    <div class="media-body">
                        <div class="media-icon mb-3"> <i class="pe-7s-graph1 pe-3x"></i> 
                        </div>
                        <h3 class="mt-0">Charts, Diagrams & more</h3>
                        <p> Reprehenderit nemo quod tempore doloribus ratione distinctio quis quidem vitae sunt reiciendis, molestias omnis soluta?</p>
                    </div>
                </div>
            </div>


            <div class="col-sm-8">
                <img src="images/screen.jpg" alt="image" class="img-fluid cast-shadow my-5">
            </div>


        </div>
    </div>



</div>



<!-- features -->


<div class="section bg-light py-lg">
    <div class="container">

        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="media">

                    <!-- // end .di -->
                    <div class="media-body text-center">
                        <div class="color-icon mb-3"> <i class="pe-7s-medal pe-3x"></i> </div>
                        <h5 class="mt-0">Award Winning Design</h5> Monotonectally envisioneer e-business niche markets vis-a-vis cost effective information. objectively promote worldwide.
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="media">
                    <!-- // end .di -->
                    <div class="media-body text-center">
                        <div class="color-icon mb-3"> <i class="pe-7s-diamond pe-3x"></i> </div>
                        <h5 class="mt-0">Carefully Crafted</h5> Authoritatively streamline strategic markets without user-centric potentialities. Credibly integrate progressive technologies
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="media">
                    <!-- // end .di -->
                    <div class="media-body text-center">
                        <div class="color-icon mb-3"> <i class="pe-7s-cloud-upload pe-3x"></i> </div>
                        <h5 class="mt-0">Cloud Sync</h5>Objectively underwhelm e-business leadership skills after cross-unit best practices. Continually innovate robust action items
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<!-- // end features -->



<!-- Testimonials -->
<div class="section">
    <div class="container">
        <div class="section-title text-center">
            <h3>What our users say</h3>
            <p>They love it. Read what our customers had to say!</p>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="embed-tweet-item">
                    <blockquote class="twitter-tweet" data-cards="hidden" lang="en" data-width="550" data-link-color="#7642FF" data-align="center">
                        <a href="https://twitter.com/kmin/status/943914224329347072"></a>
                    </blockquote>
                </div>
                <!-- end .embed-tweet-item -->
            </div>
            <!-- end .col -->
            <div class="col-md-4">
                <div class="embed-tweet-item">
                    <blockquote class="twitter-tweet" data-cards="hidden" lang="en" data-width="550" data-link-color="#7642FF" data-align="center">
                        <a href="https://twitter.com/halarewich/status/954224121784688640"></a>
                    </blockquote>
                </div>
                <!-- end .embed-tweet-item -->
            </div>
            <!-- end .col -->
            <div class="col-md-4">
                <div class="embed-tweet-item">
                    <blockquote class="twitter-tweet" data-cards="hidden" lang="en" data-width="550" data-link-color="#7642FF" data-align="center">
                        <a href="https://twitter.com/scottbelsky/status/921417663859052544"></a>
                    </blockquote>
                </div>
                <!-- end .embed-tweet-item -->
            </div>
            <!-- end .col -->
        </div>
        <!-- end .row -->


    </div>
</div>
<!-- // end Testimonials -->




<!-- Pricing -->
<div class="section bg-light py-lg" id="pricing">
    <div class="container">

        <div class="section-title text-center mt-0 mb-5">
            <h3>Choose your plan</h3>
            <p>Simple pricing. no hidden charges. Choose a plan fit your needs</p>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="card pricing">
                    <div class="card-body">
                        <small class="text-muted">PERSONAL</small>
                        <h5 class="card-title">$9</h5>
                        <p class="card-text">
                            <ul class="list-unstyled">
                                <li>3 Projects</li>
                                <li class="plan-muted">Team Collaboration</li>
                                <li class="plan-muted">Analytics &amp; Reports</li>
                                <li>One user</li>
                            </ul>
                        </p>
                        <a href="#" class="btn btn-xl btn-outline-primary">Choose this plan</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card pricing">
                    <div class="card-body">
                        <small class="text-muted">STARTUP</small>
                        <h5 class="card-title">$29</h5>
                        <p class="card-text">
                            <ul class="list-unstyled">
                                <li>20 Projects</li>
                                <li>Team Collaboration</li>
                                <li>Analytics &amp; Reports</li>
                                <li>10 Active users</li>
                            </ul>
                        </p>
                        <a href="#" class="btn btn-xl btn-primary">Choose this plan</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card pricing">
                    <div class="card-body">
                        <small class="text-muted">ENTERPRISE</small>
                        <h5 class="card-title">$149</h5>
                        <p class="card-text">
                            <ul class="list-unstyled">
                                <li>Unlimited Projects</li>
                                <li>Team Collaboration</li>
                                <li>Analytics &amp; Reports</li>
                                <li>Priority Support</li>
                            </ul>
                        </p>
                        <a href="#" class="btn btn-xl btn-outline-primary">Choose this plan</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- // end Pricing -->

<!-- Signup -->
<div class="section" id="signup">
    <div class="container">
        <div class="section-title text-center">
            <h3>Start your free trial</h3>
            <p>Signup now. Its free and takes less than 3 minutes</p>
        </div>
        <div class="row justify-content-md-center">
            <div class="col col-md-5">
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Full Name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-xl btn-block btn-primary">GET STARTED FOR FREE</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>



<div class="section bg-light mt-4" id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-4"> <img src="images/global/logo-dark.svg" class="logo-dark" alt="Start.ly Logo" />
                <p class="mt-3 ml-1 text-muted">Start.ly is a SASS software landing page template. </p>
                <p class="ml-1"><a href="https://themeforest.net/user/surjithctly/portfolio?ref=surjithctly&utm_source=footer_content" target="_blank">Purchase now →</a></p>
                <!-- // end .lead -->
            </div>
            <!-- // end .col-sm-3 -->
            <div class="col-sm-2">
                <ul class="list-unstyled footer-links ml-1">
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#about">About us</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
            <!-- // end .col-sm-3 -->
            <div class="col-sm-2">
                <ul class="list-unstyled footer-links ml-1">
                    <li><a href="#">Terms</a></li>
                    <li><a href="#about">Privacy</a></li>
                </ul>
            </div>
            <!-- // end .col-sm-3 -->
            <div class="col-sm-2">
                <ul class="list-unstyled footer-links ml-1">
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Linkedin</a></li>
                </ul>
            </div>
            <!-- // end .col-sm-3 -->
            <div class="col-sm-2">
                <a href="#home" class="btn btn-sm btn-outline-primary ml-1">Go to Top</a>
            </div>
            <!-- // end .col-sm-3 -->
        </div>
        <!-- // end .row -->
        <div class=" text-center mt-4"> <small class="text-muted">Copyright ©
          <script type="text/javascript">
              document.write(new Date().getFullYear());
          </script>
          All rights reserved. Start.ly
      </small></div>
  </div>
  <!-- // end .container -->
</div>
<!-- // end #about.section -->
<!-- // end .agency -->
<!-- JS Files -->
<!-- build:js js/app.min.js -->
<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="js/global/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS -->
<script src="js/global/bootstrap.bundle.min.js"></script>
<!-- Main JS -->
<script src="js/script.js"></script>

<!-- /build -->
<script>

	

    function myFunction(url) {
        var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
        var match = url.match(regExp);

        if (match && match[2].length == 11) 
        {
          document.getElementById('videoId').value=match[2];
          var videoID=document.getElementById('videoId').value;
          if (videoID) {
            window.location = 'process.php?id=' + videoID +'&url=1';
        }

        return match[2];
    } else {
        return 'error';
    }
}



</script>
</body>

</html>