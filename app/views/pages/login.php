<link rel="stylesheet" type="text/css" href= "../public/css/registerStyle.css">

<?php  require  APPROOT.'/views/inc/header.php'?>
<form method="post" action="<?php echo URLROOT;?>/users/login">
<div id="login-box">
  <div class="left">
  <?php flash('register_success'); ?>
    <h1 id="login">Login</h1>
    
   
    <input type="text" name="email" 
    class = "<?php echo (!empty($data['emailErr'])) ? 'isValid': '' ?>"
     value = "<?php echo $data['email']; ?> "placeholder="E-mail" />
     <span class="formError"> <?php echo $data['emailErr'];?></span>

    <input type="password" 
    class = "<?php echo (!empty($data['passwordErr'])) ? '  ': '' ?>"
     value = "<?php echo $data['password'];?>"
    name="password" placeholder="Password" />
    <span class="formError"> <?php echo $data['passwordErr'];?></span>

    
    <input type="submit" name="signup_submit" value="Login" />
    <a href="<?php echo URLROOT;?>/users/register" >Not amember ? Signup </a>
  </div>
  
  <div class="right">
    <span class="loginwith">Sign in with<br />social network</span>
    
    <button class="social-signin facebook">Log in with facebook</button>
    <button class="social-signin twitter">Log in with Twitter</button>
    <button class="social-signin google">Log in with Google+</button>
  </div>
  <div class="or">OR</div>
</div>
</form>
</body>
</html>
<?php  require  APPROOT.'/views/inc/footer.php'?>