<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>oscarb.se - Technology and Learning</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Portfolio for Oscar B - Master of Science in Engineering and of Education, Degree Programme in Mathematics and Computer Science">
<meta name="keywords" content="MSE, technology, learning, education, computer science">
<meta name="author" content="Oscar B">
<!-- styles -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style-single-page.css" rel="stylesheet">
<!--<link href="font/css/fontello.css" rel="stylesheet"> -->
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
<!-- jQuery library -->
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<!-- fancyBox main JS and CSS files -->
<script type="text/javascript" src="js/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css?v=2.1.5" media="screen" />
</head>
<body>
<?php
/*
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="#profile"><img src="img/user.jpg"/></a>
      <ul class="nav nav-collapse pull-right">
        <li><a href="#profile"><i class="icon-user"></i> Profile</a></li>
        <li><a href="#skills"><i class="icon-trophy"></i> Skills</a></li>
        <li><a href="#work"><i class="icon-picture"></i> Work</a></li>
        <li><a href="#resume"><i class="icon-doc-text"></i> Resume</a></li>
      </ul>
      <div class="nav-collapse collapse">
        <!-- .nav, .navbar-search, .navbar-form, etc -->
      </div>
    </div>
  </div>
</div>
*/
?>

<div class="clearfix">
  <!--Profile container-->
  <div id="profile" class="container">
    <div class="span3"> <img src="img/mini.png" alt="Photo of Oscar"> </div>
    <div class="span5">
      <h1><strong>Oscar</strong> is my name. Hi!</h1>
      <h3>Curious. Patient. Always creating.</h3>
      <p> I create code. I design. I teach. <br />
      	 Contact me at &#104;&#101;&#108;&#108;&#111;&#064;&#111;&#115;&#099;&#097;&#114;&#098;&#046;&#115;&#101;</p>
    </div>
  </div>
  <!--END: Profile container-->

  <!-- Social Icons -->
  <div class="row social">
    <ul class="social-icons">
      <li><a href="https://www.facebook.com/oscar.bjorkman.1" target="_blank"><img src="img/Facebook.svg" alt="Facebook"></a></li>
      <li><a href="https://github.com/oscarb" target="_blank"><img src="img/Github.svg" alt="GitHub"></a></li>
      <li><a href="http://se.linkedin.com/in/oscarbjorkman/" target="_blank"><img src="img/LinkedIN.svg" alt="LinkedIn"></a></li>
    </ul>
  </div>
  <!-- END: Social Icons -->
  
   <div class="container">
    <div id="logo" class="btn-center">
    	<img src="img/ob.png" style="width:25%; height:25%;" alt="oscarb.se logo">
    	<br />
    </div>
  </div>
</div>
<!-- Scripts -->
<script src="js/vertical-scroll.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
            $('#myModal').modal('hidden')
</script>
<?php
include('includes/analytics.php');
?>
</body>
</html>
