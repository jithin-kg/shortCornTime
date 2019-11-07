<html lang="en" class="full-height">
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
#videoTitle{
    margin: 0;
    font-size: 67px !important;
    font-weight: 710 !impo;
    line-height: 64px;
    color: #fff;
    letter-spacing: -1px;
    padding-bottom: 30px;
}
.hm-gradient .full-bg-img {
  background: -webkit-linear-gradient(45deg, rgb(121, 97, 97), rgba(76, 70, 59, 0.6) 100%);
}
#fullbg-img{
  background: -webkit-linear-gradient(45deg, rgba(2, 2, 2, 0.5), rgba(169, 148, 153, 0.6) 100%);
}
  </style>
</head>

<!--Main Navigation-->

<body>
<?php  require  APPROOT.'/views/inc/header.php'?>

<header>



<!--Intro Section-->
<section class="view intro-video">
  <video id="video_id"  poster="<?php echo URLROOT?>/public/uploadedThumbnails/antman.jpg" playsinline  controls style="width : 100%;">
    <source src="<?php echo URLROOT?>/public/uploadedVideos/<?php echo $data[0]->videoName;?>" type="video/mp4">
  </video>
  <div class="hm-gradient">
    <div class="full-bg-img" id="fullbg-img">
      <div class="container flex-center">
        <div class="row pt-5 mt-3">
          <div class="col-lg-6 wow fadeIn mb-5 text-center text-lg-left">
            <div class="white-text">
              <h1 class="h1-responsive font-weight-bold wow fadeInLeft" id="videoTitle"data-wow-delay="0.3s">
              <?php echo $data[0]->videoTitle;?></h1>
              <span class="badge badge-secondary">Action</span>
              <hr class="hr-light wow fadeInLeft" data-wow-delay="0.3s">
              <p class="wow fadeInLeft" data-wow-delay="0.3s"><?php echo $data[0]->description ?></p>
              <span >Director</span> <p class="wow fadeInLeft" data-wow-delay="0.3s"><?php echo $data[0]->directors ?></p>

              <br>
              <span >Actors</span><a class="btn btn-outline-white wow fadeInLeft" data-wow-delay="0.3s"><?php echo $data[0]->supportingActors ?> </a>
            </div>
          </div>

          <div class="col-lg-6 wow fadeIn">
            <div class="embed-responsive embed-responsive-16by9 wow fadeInRight">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/IQyauRAxvjI"
                allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</header>
<!--Main Navigation-->
<script>
//  $('#video_id').on('loadstart', function (event) {
//     $(this).addClass('loading');
//     console.log(this);
//     $(this).attr("http://localhost/shortCornTime/public/images/loader1.gif");
//     console.log("gif added");
//   });
//   $('#video_id').on('canplay', function (event) {
//     $(this).removeClass('loading');
//     $(this).attr('poster', '');
//   });
</script>
</body>
</html>