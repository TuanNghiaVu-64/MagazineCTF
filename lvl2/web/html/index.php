<?php
ini_set('display_errors', 0);
error_reporting(E_ALL);
session_start();

if (!isset($_COOKIE['lang'])) {
    setcookie("lang", "en", time() + (86400 * 30), "/");
    header("Location: /");
    exit;
}

include("database.php");
include("./views/header.php");

try {
    $row = select_one("select value from config where name = \"lang_path\"");
    $lang_path = $row["value"];
    // default config: lang_path = "./lang/"
    if (file_exists($lang_path . $_COOKIE['lang'] . '.html')) {
        include($lang_path . $_COOKIE['lang'] . '.html');
    } else {
        include("./lang/en.html");
    }
} catch (PDOException $e) {
    // Fallback to default language file if database query fails
    if (file_exists("./lang/en.html")) {
        include("./lang/en.html");
    }
}

$show_image = false;
if (isset($_GET['id'])) {
    try {
        $data = select_one("select image from comments where id = " . $_GET['id']);
        $show_image = $data['image'];
    } catch (PDOException $e) {
        die($e);
    }
}

if (isset($_POST['comment'])) {
    try {
        $file_content = "";
        if (!empty($_FILES["file"]["name"])) {
            $file_content = base64_encode(file_get_contents($_FILES["file"]["tmp_name"]));
        }
        insert_one(
            "insert into comments(display_name, comment, image) values (?, ?, ?)",
            "Anonymous",
            $_POST['comment'],
            $file_content
        );
    } catch (PDOException $e) {
        die($e);
    }
}
include("./views/comments.php");

?>

<!-- Trigger the Modal -->
<div class="row">
    <div class="col-md-12">
        <!-- The Modal -->
        <div id="myModal" class="modal-w3">
            <!-- The Close Button -->
            <span class="close-w3">&times;</span>
            <!-- Modal Content (The Image) -->
            <img class="modal-w3-content" id="img01">
            <!-- Modal Caption (Image Text) -->
            <div id="caption"></div>
        </div>
    </div>
</div>
<script>
    <?php if ($show_image) { ?>
        // Get the modal
        var modal = document.getElementById("myModal");
        var modalImg = document.getElementById("img01");
        modal.style.display = "block";
        modalImg.src = "data:image/png;base64,<?php echo $show_image ?>";
        var span = document.getElementsByClassName("close-w3")[0];
        span.onclick = function() {
            modal.style.display = "none";
            window.location.href = "/index.php";
        }
    <?php } ?>
</script>

<?php include("./views/footer.php"); ?>