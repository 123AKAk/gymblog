<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background:black; font-size:18px;">
  <a class="navbar-brand" href="#">FITNESS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="index.php" class="pagescroll">Home</a>
        </li>
        <?php
        if(isset($_SESSION['admin']) || isset($_SESSION['user']))
        {
        ?>
        
        <?php
        }
        else
        {
        ?>
        <li class="nav-item">
            <a class="nav-link" href="login.php" class="pagescroll">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="register.php" class="pagescroll"> Register </a>
        </li>
        <?php
        }
        ?>
        <?php
        if(isset($_SESSION['admin']) || isset($_SESSION['user']))
        {
        ?>
        <li class="nav-item">
            <a class="nav-link" href="dashboard.php">Dashboard</a>
        </li>
        <?php
        }
        ?>
        <?php
        if(isset($_SESSION['admin']) || isset($_SESSION['user']))
        {
        ?>
        <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
        </li>
        <?php
        }
        ?>
    </ul>
  </div>
</nav>