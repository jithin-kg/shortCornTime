

<?php  require  APPROOT.'/views/inc/header.php'?>


<div class="container page-top" style="padding-top:10%;">

  <form method="post" enctype="multipart/form-data" action="<?php echo URLROOT;?>/posts/upload/">
  <div class="form-group">




  <!-- Upload  Video -->

  <!-- <input accept=".jpg,.jpeg.,.gif,.png,.mov,.mp4" type="file" name="fileToUpload"/> -->
  <div class="form-group">
      <label for="exampleFormControlFile1">Choose your file</label>
      <input  accept=".jpg,.jpeg.,.gif,.png,.mov,.mp4"  name="fileToUpload" type="file" class="form-control-file" id="exampleFormControlFile1">
    </div>
    <div class="form-group">
    <label for="formGroupExampleInput">Title</label>
    <input type="text" name="videoTitle"class="form-control" id="formGroupExampleInput" placeholder="Directors">
  </div>

  <div class="form-group">
      <label for="exampleFormControlTextarea1">Description</label>
      <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  

  <div class="form-group">
    <label for="formGroupExampleInput">Directors</label>
    <input type="text" name="directors"class="form-control" id="formGroupExampleInput" placeholder="Directors">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Starring</label>
    <input type="text" name="starring" class="form-control" id="formGroupExampleInput2" placeholder="Starring">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Supporting Actors</label>
    <input type="text" name="supportingActors" class="form-control" id="formGroupExampleInput2" placeholder="Supporting Actors">
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="ageRestriction" value="1" id="invalidCheck" >
      <label class="form-check-label" for="invalidCheck">
        Age Restrictions
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>
    <div class="form-group">
      <label for="thumbnail">Choose Thubnail</label>
      <input  accept=".jpg,.jpeg.,.gif,.png"  name="thumbanilImg" type="file" class="form-control-file" id="exampleFormControlFile1">
    </div>
  </div>

  
  <input type="submit" value="UploadVideo" name="upd"/>
 
  <!-- <button class="btn btn-primary" type="submit">Submit form</button> -->
</form>


  <input class="btn btn-primary" type="submit" value="Display Video" name="disp"/>
</form>
</div>
</div>



<script>

// auto create thumbnail

document.getElementsByTagName('input')[0].addEventListener('change', function(event) {
  var file = event.target.files[0];
  var fileReader = new FileReader();
  if (file.type.match('image')) {
    fileReader.onload = function() {
      var img = document.createElement('img');
      img.src = fileReader.result;
      document.getElementsByTagName('div')[0].appendChild(img);
    };
    fileReader.readAsDataURL(file);
  } else {
    fileReader.onload = function() {
      var blob = new Blob([fileReader.result], {type: file.type});
      var url = URL.createObjectURL(blob);
      var video = document.createElement('video');
      var timeupdate = function() {
        if (snapImage()) {
          video.removeEventListener('timeupdate', timeupdate);
          video.pause();
        }
      };
      video.addEventListener('loadeddata', function() {
        if (snapImage()) {
          video.removeEventListener('timeupdate', timeupdate);
        }
      });
      var snapImage = function() {
        var canvas = document.createElement('canvas');
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
        var image = canvas.toDataURL();
        var success = image.length > 100000;
        if (success) {
          var img = document.createElement('img');
          //custom thubnail uploading
          var input = document.createElement('input');
          input.name= "customThumbnail";
          input.type = "file";
          input.accept = "image";

          img.src = image;
          document.getElementsByTagName('div')[1].appendChild(img);
          document.getElementsByTagName('div')[1].appendChild(input);

          URL.revokeObjectURL(url);
        }
        return success;
      };
      video.addEventListener('timeupdate', timeupdate);
      video.preload = 'metadata';
      video.src = url;
      // Load video in Safari / IE11
      video.muted = true;
      video.playsInline = true;
      video.play();
    };
    fileReader.readAsArrayBuffer(file);
  }
});
</script>

<div id="generatedT"><div>
<?php  require  APPROOT.'/views/inc/footer.php'?>
