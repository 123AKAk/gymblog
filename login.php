<?php
  include 'includes/header.php';
  include 'includes/navbar.php';
?>

  <!--================================= HEADER-1 START =============================================-->
  <section id="header-featured-image" class="container-fluid header-section-space header">
      <div class="container">
          <div class="col-md-10 column-center no-padding">
              <h1 class="center">Login
              </h1>
          </div>
      </div>
  </section>
  <!--================================= HEADER-1 END =============================================-->

  <!-- Login FormStart -->
  <br>
  <br>
  <section class="container section auth-section bg-cover">
    <div class="col-md-6">
      <form class="auth-form light-bg" method="POST" action="includes/allcodes.php" style="background-image: url('assets/img/bg/5.jpg')">
        <?php
          include 'includes/feedback.php';
        ?>
        <center><h1>Login</h1></center>
        <div class="form-group">
          <label>Email</label>
          <input type="text" class="form-control" placeholder="Emails" name="email" value="">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" placeholder="Password" name="password" value="">
        </div>
        <div class="form-group">
          <button type="submit" name="userlogin" class="btn-custom primary btn-block">Login</button>
        </div>
        <p class="form-group text-center">Don't have an account? <a href="register.php" class="btn-link">Create One</a> </p>
      </form>
    </div>
  </section>
  <!-- Login Form End -->

<?php
  include 'includes/footer.php';
  include 'includes/scripts.php';
?>
