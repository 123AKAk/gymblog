<div class="col-md-4 side_bar" id="secondary">
   
    <!-- ABOUT ME END -->
    <div class="secondary-bg-1 about-bg-pad">
    <div class="sidebar-widget">
            <h5>Recent Posts</h5>

            <?php
                $sql = "SELECT * FROM blog ORDER BY Id DESC LIMIT 4";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) 
                {
                  // output data of each row
                  while($row = $result->fetch_assoc()) 
                  {
                    $sales_date = new DateTime($row["Date"]);
                    $date = $sales_date->format('d')." ".$sales_date->format('M')."' ". $sales_date->format('y');
            ?>
                <article class="row media">
                    <a class="col-12" href="single.php?productid=<?php echo $row["Id"]; ?>">
                        <img style="width:80%;height: 200px;" src="uploads/<?php echo $row["Image"]; ?>">
                    </a>
                    <div class="col-12 media-body">
                        <h6>
                            <a href="single.php?productid=<?php echo $row["Id"]; ?>">
                            <?php echo $row["Title"]; ?>
                            </a>
                        </h6>
                        <p><?php echo $date; ?></p>
                    </div>
                </article>
            <?php
                  }
                }
                //$conn->close();
            ?>
        </div>
    </div>

    <!-- TAGS END -->
    <div class="secondary-bg-1 tags-bg-pad widget_tags">
        <div class="secondary-bg-2 shadow">
            <div class="side-bar-circle-icon">
                <img src="images/bar_icon.png" alt="icon" />
            </div>
            <h4 class="left h2-bottom">Category(s)</h4>
            <div class="left">
                <ul class="no-padding no-margin tags">
                <?php
                    $sql = "SELECT * FROM category";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) 
                    {
                        // output data of each row
                        while($row = $result->fetch_assoc()) 
                        {
                ?>
                    <li>
                        <a href="category.php?catid=<?php echo $row["Id"]; ?>">
                            <p class="left">
                                <?php echo $row["Title"]; ?>
                            </p>
                        </a>
                    </li>
                <?php
                        }
                    }
                    //$conn->close();
                ?>
                </ul>
            </div>
        </div>
    </div>

</div>