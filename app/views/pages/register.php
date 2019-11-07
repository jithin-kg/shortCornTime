
   <link rel="stylesheet" type="text/css" href= "../public/css/registerStyle.css">

<?php  require  APPROOT.'/views/inc/header.php'?>


<div id="login-box">
  <div class="left">
    <h1>Sign up</h1>
    
   <form method="post" action="<?php echo URLROOT;?>/users/register">
   <input type="text" name="name" class ="<?php echo (!empty($data['nameErr'])) ? 'isValid': '' ?>"
     value = "<?php echo $data['name']; ?> " placeholder="Username" />
     <span class="formError"> <?php echo $data['nameErr'];?></span>
    
     <input type="text" name="email" 
    class = "<?php echo (!empty($data['emailErr'])) ? 'isValid': '' ?>"
     value = "<?php echo $data['email']; ?> "
    placeholder="E-mail" />
    <span class="formError"> <?php echo $data['emailErr'];?></span>

    
    <input type="password" 
    class = "<?php echo (!empty($data['passwordErr'])) ? 'isValid': '' ?>"
     value = "<?php echo $data['password'];?>"
    name="password" placeholder="Password" />
    <span class="formError"> <?php echo $data['passwordErr'];?></span>


    <input type="password" name="password2" 
    class = "<?php echo (!empty($data['passwordErr'])) ? 'isValid': '' ?>"
     value = "<?php echo $data['confirmPassword'];?>"
    placeholder="Retype password" />
    <span class="formError"> <?php echo $data['passwordErr'];?></span>

    
    <input type="submit" name="signup_submit" value="Sign me up" />
   </form>
    <a href="<?php echo URLROOT;?>/users/login" >login</a>
  </div>
  
  <div class="right">
    <span class="loginwith">Sign in with<br />social network</span>
    
    <button class="social-signin facebook">Log in with facebook</button>
    <button class="social-signin twitter">Log in with Twitter</button>
    <button class="social-signin google">Log in with Google+</button>
  </div>
  <div class="or">OR</div>
</div>
</body>
</html>
<?php  require  APPROOT.'/views/inc/footer.php'?>