<div class="container">
    <div class="row">
        <div class="col-md-12 bootstrap snippets">
            <div class="panel">
                <div class="panel-body">
                    <form name="myForm" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                        <textarea class="form-control" rows="2" placeholder="What are you thinking?" id="comment" name="comment"></textarea>
                        <br>
                        <input type="text" class="form-control" placeholder="Image URL" id="url" name="url">
                        <div class="mar-top clearfix">
                            <button class="btn btn-light btn-shadow pull-right" type="submit"> Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- COMMENTS PANEL -->
            <?php
            try {
                $sql = "select display_name, comment, image from comments";
                $sth = $conn->prepare($sql);
                $sth->execute();
                $sth->setFetchMode(PDO::FETCH_ASSOC);
                $hasComments = $sth->rowCount() > 0;
            } catch (PDOException $e) {
                die($e);
            }
            if ($hasComments) {
            ?>
                <div class="panel">
                    <div class="panel-body">
                        <?php
                        while ($row = $sth->fetch()) {
                        ?>
                            <div class="media-block">
                                <a class="media-left" href="#"><img class="img-circle img-sm" alt="Profile Picture" src="/assets/images/avatar.jpg"></a>
                                <div class="media-body">
                                    <div class="mar-btm">
                                        <a href="#" class="btn-link text-semibold media-heading box-inline"><?php echo $row["display_name"] ?></a>
                                        <p class="text-muted text-sm"><i class="fa fa-globe fa-lg"></i> - From Website</p>
                                    </div>
                                    <p style="margin: 0 0 10px;"><?php echo htmlspecialchars($row["comment"]) ?></p>
                                    <?php
                                    if (!empty($row["image"]))
                                        echo "<img class=\"img-responsive thumbnail\" src=\"" . $row["image"] . "\" alt=\"Image\" width=\"400\" height=\"300\">";
                                    ?>
                                    <hr>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>