<?php
  include 'includes/header.php';
  if(!isset($_GET['id']))
  {
    header("Location: ./");
  }
  include 'includes/navbar.php';
?>

  <!--================================= HEADER-1 START =============================================-->
  <section id="header-featured-image" class="container-fluid header-section-space header">
      <div class="container">
          <div class="col-md-10 column-center no-padding">
              <h1 class="center">
              <?php
                include_once 'includes/connect.php';
                $userid = $_GET['id'];
                $sql = "SELECT * FROM user WHERE Id='$userid'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) 
                {
                  // output data of each row
                  while($row = $result->fetch_assoc()) 
                  {
                    echo $row["Firstname"];
                  }
                }
                //$conn->close();
            ?>
              </h1>
          </div>
      </div>
  </section>
  <!--================================= HEADER-1 END =============================================-->

  <br><br>
  <!-- Dashboard Post Start -->
  <div class="section section-padding single-post-1">
    <div class="container">
      <?php
          $userid = $_GET['id'];
          $sql = "SELECT * FROM user WHERE Id='$userid'";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) 
          {
            $firstname;
            $lastname;
            $email;
            $password;
            $image;
            // output data of each row
            while($row = $result->fetch_assoc()) 
            {
              $firstname = $row["Firstname"];
              $lastname = $row["Lastname"];
              $email = $row["Email"];
              $password = $row["Password"];
              $image = $row["Profile_img"];
            }
      ?>
      <form class="light-bg p-3" method="POST" action="includes/allcodes.php" enctype="multipart/form-data">
        <?php
          include 'includes/feedback.php';
        ?>
        <h4>Edit Account</h4>
        <div class="row">
        <input type="hidden" name="userid" value="<?php echo $userid; ?>">
          <div class="col-md-6 form-group">
            <label>First Name</label>
            <input type="text" class="form-control" placeholder="First Name" name="firstname" value="<?php echo $firstname; ?>">
          </div>
          <div class="col-md-6 form-group">
            <label>Last Name</label>
            <input type="text" class="form-control" placeholder="Last Name" name="lastname" value="<?php echo $lastname; ?>">
          </div>
          <div class="col-md-6 form-group">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $email; ?>">
          </div>
          <div class="col-md-6 form-group">
            <label>Password</label>
            <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo $password; ?>">
          </div>
          <div class="col-md-6 form-group">
            <img src="uploads/<?php echo $image; ?>" alt="" style="width: 100px;height:100px" class="p-2">
            <label>Profile Image</label>
            <input type="file" class="form-control" name="profile_img" id="profile_img" value="">
          </div>
          <div class="col-md-12 form-group">
            <button type="submit" name="updatedata" width="100px" class="btn-custom primary btn-block">Save</button>
          </div>
        </div>
      </form>
      <?php
          }
          //$conn->close();
      ?>
    </div>
  </div>
  <!-- Dashboard Post End -->


<?php
  include 'includes/footer.php';
  include 'includes/scripts.php';
?>
