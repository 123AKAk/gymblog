<?php
  include 'includes/header.php';
  if(!isset($_GET['catid']))
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
                Category |
                <?php
                    include_once 'includes/connect.php';
                    $prodcatid = $_GET['catid'];
                    $esql = "SELECT * FROM category WHERE Id = '$prodcatid'";
                    $eresult = $conn->query($esql);
                    if ($eresult->num_rows > 0) 
                    {
                    // output data of each row
                    while($erow = $eresult->fetch_assoc()) 
                    {
                        $category = $erow["Title"];
                    }
                    echo $category;
                    }
                ?>
                </h1>
            </div>
        </div>
    </section>
    <!--================================= HEADER-1 END =============================================-->

    <!--================================= RIGHT-SIDEBAR START =============================================-->
    <section class="container-fluid section-space section-bg-1">
        <div class="container">
            <div class="row single">
                
                <div class="col-md-8 col-sm-8 primary-res-bottom" id="primary">
                <?php
                    $sql = "SELECT * FROM blog WHERE CategoryId='$prodcatid' ORDER BY Id DESC";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) 
                    {
                        // output data of each row
                        while($row = $result->fetch_assoc()) 
                        {
                        $sales_date = new DateTime($row["Date"]);
                        $date = $sales_date->format('d')." ".$sales_date->format('M')."' ". $sales_date->format('y');
                ?>
                    <div class="row entry-meta lsb-br lsb-br-bottom">
                        <div class="col-md-6 image-bottom pos-rel">
                            <a class="img-responsive" href="single.php?productid=<?php echo $row["Id"]; ?>" ><img style="width:100%;height: 290px;" src="uploads/<?php echo $row["Image"]; ?>" alt="blog post"></a>
                        </div>
                        <div class="col-md-6">
                            <h4 class="left h2-bottom">
                                <a href="single.php?productid=<?php echo $row["Id"]; ?>">
                                    <?php echo $row["Title"]; ?>
                                </a>
                            </h4>
                            <p class="left date date-bottom ls"><a><?php echo $date; ?></a> | 
                                <a href="#">
                                Posted by
                                <?php
                                $userid = $row["UserId"];
                                $asql = "SELECT * FROM user WHERE Id='$userid'";
                                $aresult = $conn->query($asql);
                                if ($aresult->num_rows > 0) 
                                {
                                    // output data of each row
                                    while($arow = $aresult->fetch_assoc()) 
                                    {
                                    echo $arow["Firstname"];
                                    }
                                }
                                ?>
                                </a>
                            </p>
                            <p class="left">
                                <?php echo $row["Content"]; ?>
                                <span>
                                    <a href="single.php?productid=<?php echo $row["Id"]; ?>">
                                        <img src="images/right_arrow.png" class="right-arrow" alt="image" />
                                    </a>
                                </span> 
                            </p>
                            <div class="left three-link-top">
                                <ul class="no-padding no-margin three-right">
                                    <li class="three-link">
                                        <p class="left ls category">
                                        <a href="category.php?catid=<?php echo $row["CategoryId"]; ?>">
                                        <?php
                                        $catid = $row["CategoryId"];
                                        $bsql = "SELECT * FROM category WHERE Id='$catid'";
                                        $bresult = $conn->query($bsql);
                                        if ($bresult->num_rows > 0) 
                                        {
                                            // output data of each row
                                            while($brow = $bresult->fetch_assoc()) 
                                            {
                                            echo $brow["Title"];
                                            }
                                        }
                                        ?>
                                        </a>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    }
                    else
                    {
                        echo "<br><h4>Sorry, Category does not contain a Post</h4>";
                    }
                    //$conn->close();
                ?>
                </div>
                <?php
                    include 'includes/sidebar.php';
                ?>
                
            </div>
        </div>
    </section>
    <!--================================= RIGHT-SIDEBAR END =============================================-->
	



   