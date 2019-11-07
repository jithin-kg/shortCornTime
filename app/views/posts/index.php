
<?php  require  APPROOT.'/views/inc/header.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="URLROOT/public/css/userHome.css">
    <style>
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
    </style>
</head>
<body>



<div class="container-fluid">

</div>
<div class="container" style="padding:120px;"> 
<div class="sidenav">
  <a href="#about">About</a>
  <a href="#services">Services</a>
  <a href="#clients">Clients</a>
  <a href="#contact">Contact</a>
</div>
<h1>My uploads</h1>
    <div class="row">
    <?php foreach($data as $row): ?>
    <div class="col-lg-4 col-md-4 col-xs-6 thumb" >
    <span></span>
        <a href="<?php echo URLROOT; ?>/posts/getSingleVideo?videoLink=<?php echo $row->videoId?>"class="fancybox" rel="ligthbox"> 
            <img onmouseover="mouseOver()"  id="thumbnail" src="http://localhost/shortCornTime/public/uploadedThumbnails/<?php echo $row->imagePath?>" class="zoom img-fluid "  alt="">
            
        </a>
    </div>
        
    <?php endforeach; ?>
    </div>
</div>




</body>
</html>