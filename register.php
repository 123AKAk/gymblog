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


  <!-- register FormStart -->
  <br>
  <br>
  <section class="container section auth-section bg-cover">
      <div class="col-md-6">
      <form class="auth-form light-bg" method="POST" action="includes/allcodes.php" style="background-image: url('assets/img/bg/5.jpg')" enctype="multipart/form-data">
        <?php
          include 'includes/feedback.php';
        ?>
        <center><h1>Register</h1></center>
        <div class="form-group">
          <label>First Name</label>
          <input type="text" class="form-control" placeholder="First Name" name="firstname" value="">
        </div>
        <div class="form-group">
          <label>Last Name</label>
          <input type="text" class="form-control" placeholder="Last Name" name="lastname" value="">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" class="form-control" placeholder="Email" name="email" value="">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" placeholder="Password" name="password" value="">
        </div>
        <div class="form-group">
          <label>Role</label>
          <select name="roleid" class="form-control">
            <option value="0">None</option>
            <?php
                include_once 'includes/connect.php';

                $sql = "SELECT * FROM role";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) 
                {
                  // output data of each row
                  while($row = $result->fetch_assoc()) 
                  {
            ?>
                <option value="<?php echo $row["Id"]; ?>"><?php echo $row["Name"]; ?></option>
            <?php
                  }
                }
                $conn->close();
            ?>
          </select>
        </div>
        <div class="form-group">
          <label>Profile Image</label>
          <input type="file" class="form-control" name="profile_img" id="profile_img" value="">
        </div>
        <div class="form-group">
          <button type="submit" name="registerusers" class="btn-custom primary btn-block">register</button>
        </div>
        <p class="form-group text-center">Already have an Account? <a href="login.php" class="btn-link"> Login</a> </p>
      </form>
    </div>
  </section>
  <!-- Login Form End -->

<?php
  include 'includes/footer.php';
  include 'includes/scripts.php';
?>
