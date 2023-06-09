<?php
require '../include/db.php';

// Update Home
if (isset($_POST['updateHome'])) {
    $title_home = mysqli_real_escape_string($db,$_POST['title_home']);
    $subtitle_home = mysqli_real_escape_string($db,$_POST['subtitle_home']);
    $query = "UPDATE tbl_home SET title_home = '$title_home', subtitle_home = '$subtitle_home' WHERE id = 1";
    $run = mysqli_query($db,$query);
    if ($run) {
        echo "<script>document.location.href = 'index.php?success=Succesfully updated!';</script>";
    }
}
// Update Home
?>