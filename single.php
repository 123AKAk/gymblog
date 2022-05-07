<?php
  include 'includes/header.php';
  if(!isset($_GET['productid']))
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
                    $postid = $_GET['productid'];
                    $esql = "SELECT * FROM blog WHERE Id = '$postid'";
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
                    include_once 'includes/connect.php';
                    $postid = $_GET['productid'];
                    $sql = "SELECT * FROM blog WHERE Id='$postid'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) 
                    {
                    $title;
                    $categoryid;
                    $content;
                    $description;
                    $image;
                    // output data of each row
                    while($row = $result->fetch_assoc()) 
                    {
                        $title = $row["Title"];
                        $userid = $row["UserId"];
                        $categoryid = $row["CategoryId"];
                        $content = $row["Content"];
                        $description = $row["Description"];
                        $image = $row["Image"];

                        $sales_date = new DateTime($row["Date"]);
                        $date = $sales_date->format('d')." ".$sales_date->format('M')."' ". $sales_date->format('y');
                    }

                    $esql = "SELECT * FROM category WHERE Id = '$categoryid'";
                    $eresult = $conn->query($esql);
                    if ($eresult->num_rows > 0) 
                    {
                        // output data of each row
                        while($erow = $eresult->fetch_assoc()) 
                        {
                        $category = $erow["Title"];
                        }
                    }
                ?>
                    <div class="contianer entry-meta lsb-br lsb-br-bottom">
                        <div class="col image-bottom pos-rel">
                            <a>
                                <img class="img-responsive" src="uploads/<?php echo $image; ?>" alt="post">
                            </a>
                        </div>
                        <p class="col left date date-bottom ls"><a><?php echo $date; ?></a> | 
                            <b>
                            <a href="#">
                            Posted by
                            <?php
                            $userid = $userid;
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
                            </b>
                        </p>
                        <h4 class="col h2-bottom">
                            <a>
                                <?php echo $title; ?>
                            </a>
                        </h4>
                        
                        <p class="col">
                            "<?php echo $content; ?>"
                        </p>
                        <p class="col">
                            <?php echo $description; ?>
                        </p>
                        <div class="col left three-link-top">
                            <ul class="no-padding no-margin three-right">
                                <li class="three-link">
                                    <p class="left ls category">
                                    <a href="category.php?catid=<?php echo $categoryid; ?>">
                                        <?php echo $category; ?>
                                    </a>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <?php
                        }
                        //$conn->close();
                    ?>


                   <!-- COMMENTS START -->
                   <?php
                        include 'includes/feedback.php';
                    ?>
                    <div class="container mt-3">
                    <?php
                        $ssql = "SELECT * FROM comment ORDER BY Id DESC";
                        $sresult = $conn->query($ssql);
                        if ($sresult->num_rows > 0) 
                        {
                    ?>
                    <h4><?php echo $rowcount = mysqli_num_rows($sresult);?> Comment(s)</h4>
                    <br>
                    <?php
                    // output data of each row
                    while($srow = $sresult->fetch_assoc()) 
                    {
                        $ssales_date = new DateTime($srow["Date"]);
                        $sdate = $ssales_date->format('d')." ".$ssales_date->format('M')."' ". $ssales_date->format('y');
                    ?>
                        <div class="col">
                            <div class="distab">
                                <?php
                                    $myname = "No name";
                                    $img = "";

                                    $duserid = $srow["UserId"];
                                    $dsql = "SELECT * FROM user WHERE Id='$duserid'";
                                    $dresult = $conn->query($dsql);
                                    if ($dresult->num_rows > 0) 
                                    {
                                        // output data of each row
                                        while($drow = $dresult->fetch_assoc()) 
                                        {
                                            $img = $drow["Profile_img"];
                                            $myname = $drow["Firstname"];
                                        }
                                    }
                                ?>
                                <div class="distab-cell">
                                    <img width="80px" height="80px" src="uploads/<?php echo $img;; ?>" alt="80x80" />
                                </div>

                                <div class="distab-cell-middle comments-text-left comment-meta">
                                    <p class="left comments-date">
                                        <a href="#"><?php echo $sdate; ?></a>
                                    </p>
                                    <p class="left">
                                        <b>
                                        <a href="#">
                                        <?php
                                            echo $myname;
                                        ?>
                                        </a> <span>Says?</span>
                                        </b>
                                    </p>
                                    <p class="left text-top"><?php echo $srow["Text"] ?></p>
                                </div>
                            </div>
                            
                        </div>
                    <?php
                            }
                        }
                        else
                        {
                        echo "<h5>No Comments</h5>";
                        }
                        //$conn->close();
                    ?>
                    </div>
                    <!-- COMMENTS END -->

                    <!-- COMMENTS FORM START -->
                    <div class="comment-form comments-section-top">
                        <h1 class="left comment-reply-title">Leave A Comment</h1>
                        <div>
                            <form method="POST" action="includes/allcodes.php" class="comment-form">
                                <p class="col-xs-12 col-sm-12 no-padding textarea-bottom">
                                    <label>Comments *</label>
                                    <input type="hidden" name="postid" value="<?php echo $postid ?>">
                                    <textarea class="col-xs-12 col-sm-12" name="comment" id="message" cols="50" rows="5"></textarea>
                                </p>
                                <div class="left btn-top">
                                    <input type="submit" class="btn-1" id="submitcomment" name="submitcomment" value="SUBMIT">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- COMMENTS FORM END -->
                </div>

                <?php
                    include 'includes/sidebar.php';
                ?>
                
            </div>
        </div>
    </section>
    <!--================================= RIGHT-SIDEBAR END =============================================-->
	



   