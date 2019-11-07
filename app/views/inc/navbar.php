<!DOCTYPE html>
<html>
<head>
<style>
.top-nav-collapse {
    background-color: #7d8488 !important;
}
.navbar:not(.top-nav-collapse) {
  background: linear-gradient(rgba(0,0,0,.9) 1%,rgba(0,0,0,.8) 15%,rgba(0,0,0,.7) 30%,rgba(0,0,0,.6) 45%,rgba(0,0,0,.5) 60%,rgba(0,0,0,.3) 75%,transparent);
  z-index: 99;
    position: fixed;
    left: 0;
    width: 100%;
    height: 80px;
    padding: 20px 0;
    font-size: 1rem;
}
@media (max-width: 768px) {
    .navbar:not(.top-nav-collapse) {
        background: #7d8488 !important;
    }
}
.hm-gradient .full-bg-img {
    background: -moz-linear-gradient(45deg, rgba(242, 34, 50, 0.5), rgba(255, 187, 54, 0.6) 100%);
    background: -webkit-linear-gradient(45deg, rgba(242, 34, 50, 0.5), rgba(255, 187, 54, 0.6) 100%);
    background: linear-gradient(to 45deg, rgba(29, 236, 197, 0.4), rgba(96, 0, 136, 0.4) 100%);
}
@media (max-width: 740px) {
    .full-height,
    .full-height body,
    .full-height header,
    .full-height header .view {
        height: 700px;
    }
}
video.loading {
  background: black url(<?php echo URLROOT?>/public/uploadedThumbnails/sherlock.jpg) center center no-repeat;
}
body{
  background-color:#1d1d1d !important;
}
#search{
  background: hsla(0,0%,100%,.3);
  -webkit-appearance: none;
  display: inline-block;
    vertical-align: middle;
    width: 100%;
    border: none;
    height: 35px;
    font-size: 11px;
    outline: 0;
    border-radius: 40px;
    box-sizing: content-box;
    box-shadow: none;
    background: 0 0;
    color: #fff;
    text-align: center;
    letter-spacing: .5px;
    transition: background .2s ease-in-out,font-size .2s ease-in-out .1s;
    background: hsla(0,0%,100%,.5);
    padding-top: 2px;
    line-height: 24px
}
</style>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>


<header>
<!--Navbar-->
<nav id="navbars" class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
  <div class="container">
    <a class="navbar-brand" href="<?php echo URLROOT?>"><strong>MDB</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7"
      aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo URLROOT;?>/posts/upload">Upload <span class="sr-only">(current)</span></a>
        </li>
        <?php if(isset($_SESSION['userId'])) : ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT;?>/users/logout">Logout</a>
        </li>
        <?php else:?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT;?>/users/register">Register </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT;?>/users/login">Login </a>
        </li>
        <?php endif ?>
      </ul>
      <form class="form-inline">
        <input class="form-control mr-sm-2" type="text" id="search" placeholder="Find movies and more.." aria-label="Search" onkeyup="showResult(this.value)">
      </form>
      <a href="<?php echo URLROOT;?>/posts" style="color:white; text-decoration:none;">
      <span>view profile <span><i class="fa fa-user" ></i>
      </a>
    </div>
  </div>
</nav>
</header>
<script>
$('document').ready(function() {
var lastScrollTop = 0;
$(window).scroll(function(event){
   var st = $(this).scrollTop();
   
   if (st > lastScrollTop){
       console.log("down")
      document.getElementById("navbars").style.display = "none";

   }
   else if(st == lastScrollTop)
   {
     //do nothing 
     //In IE this is an important condition because there seems to be some instances where the last scrollTop is equal to the new one
   }
   else {
      console.log("up")
      document.getElementById("navbars").style.display = "block";
   }
   lastScrollTop = st;
});});

// search
function showResult(str) {
  if (str.length==0) { 
    document.getElementById("search").innerHTML="";
    document.getElementById("search").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("search").innerHTML=this.responseText;
      document.getElementById("search").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","http://localhost/shortCornTime/posts/searchVideos?q="+str,true);
  xmlhttp.send();
}
</script>
