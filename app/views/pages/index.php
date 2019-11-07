


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <style>
/* div.gallery {
  margin: 5px;
  border: 1px solid #ccc;
  float: left;
  width: 180px;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery video {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
} */
body {
  background-color:#1d1d1d !important;
  font-family: "Asap", sans-serif;
  color:#989898;
  margin:10px;
  font-size:16px;
}

#demo {
  height:100%;
  position:relative;
  overflow:hidden;
}


.green{
  background-color:#6fb936;
}
        .thumb{
            margin-bottom: 30px;
        }
        
        .page-top{
            margin-top:85px;
        }

   
img.zoom {
    width: 100%;
    height: 200px;
    border-radius:5px;
    object-fit:cover;
    -webkit-transition: all .3s ease-in-out;
    -moz-transition: all .3s ease-in-out;
    -o-transition: all .3s ease-in-out;
    -ms-transition: all .3s ease-in-out;

    display:block;
 position:relative;
}
/* img.zoom : hover span{
  background: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmYIRs4psU_W1XfK2SyHq_IknnnBP3EgmZbeQmjZoRrSNKsF-buw&s) no-repeat;
    -moz-opacity:.80;
    opacity:.80;
    filter:alpha(opacity=80);
    display:block;
    position:absolute;
    top:80px;
    left:15px;  
    z-index:100;
    width:60px;
    height:60px;
} */
        
 
.transition {
    -webkit-transform: scale(1.2); 
    -moz-transform: scale(1.2);
    -o-transform: scale(1.2);
    transform: scale(1.2);
}
    .modal-header {
   
     border-bottom: none;
}
    .modal-title {
        color:#000;
    }
    .modal-footer{
      display:none;  
    }

#watchMovieBtn{
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-50%);
    z-index: 999;
    border-radius: 2px;
    background: #ff501a;
    box-shadow: 0 2px 4px 0 rgba(0,0,0,.05);
    color: white;
    /* font-weight: 700; */
    letter-spacing: .5px;
    line-height: 1.25;
    /* text-shadow: 0 0 2px rgba(0,0,0,.5);
    box-shadow: 5px 10px; */
}
.btn:hover{
  width:18%;
  height:8%;
  
}

img{
  position:relative;
  z-index:-1;
  display:block;
   width:auto;
}
/* linera gradient  for carousel image*/
.carousel-inner {
  display:inline-block;
  background: -moz-linear-gradient(top, rgba(0,0,0,0) 0%, rgba(0,0,0,0.65) 100%); /* FF3.6+ */
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0.65)), color-stop(100%,rgba(0,0,0,0))); /* Chrome,Safari4+ */
  background: -webkit-linear-gradient(top, rgba(0,0,0,0) 0%,rgba(0,0,0,0.65) 100%); /* Chrome10+,Safari5.1+ */
  background: -o-linear-gradient(top, rgba(0,0,0,0) 0%,rgba(0,0,0,0.65) 100%); /* Opera 11.10+ */
  background: -ms-linear-gradient(top, rgba(0,0,0,0) 0%,rgba(0,0,0,0.65) 100%); /* IE10+ */
  background: linear-gradient(to bottom, rgba(0,0,0,0) 0%,rgba(0,0,0,0.65) 100%); /* W3C */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a6000000', endColorstr='#00000000',GradientType=0 ); /* IE6-9 */
}
/* #thumbnail: hover {
  width:100% !important:
} */



</style>
<?php  require  APPROOT.'/views/inc/header.php'?>
</head>
<body >
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
<a href="<?php echo URLROOT;?>/users/login"><button id="watchMovieBtn" class="btn  btn-lg" >Watch movie </button></a>

  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?php echo URLROOT?>/public/uploadedThumbnails/antman.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo URLROOT?>/public/uploadedThumbnails/antman.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo URLROOT?>/public/uploadedThumbnails/antman.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<div class="container page-top">
<div class="row">
<!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script> -->
 <?php foreach($data as $row): ?> 




<div class="col-lg-3 col-md-4 col-xs-6 thumb" >
<span></span>
     <a href="<?php echo URLROOT; ?>/posts/getSingleVideo?videoLink=<?php echo $row->videoId?>"class="fancybox" rel="ligthbox"> 
        <img onmouseover="mouseOver()"  id="thumbnail" src="http://localhost/shortCornTime/public/uploadedThumbnails/<?php echo $row->imagePath?>" class="zoom img-fluid "  alt="">
        
    </a>
</div>
     
<?php endforeach; ?>
</div>
</div>



 
            
            
           
           
       </div>

     
      

    </div>
<script>
// $(document).ready(function(){
//   $(".fancybox").fancybox({
//         openEffect: "none",
//         closeEffect: "none"
//     });
    
//     $(".zoom").hover(function(){
		
// 		$(this).addClass('transition');
// 	}, function(){
        
// 		$(this).removeClass('transition');
// 	});
// });

    function mouseOver(){
      console.log("mouse over");
    }
    
</script>

<?php  require  APPROOT.'/views/inc/footer.php'?>
 </body>
</html>
