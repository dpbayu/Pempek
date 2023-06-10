<?php
require '../include/db.php';
$id = $_GET['id'];
$sql = "DELETE FROM tbl_team WHERE id = '$id'";
if (mysqli_query($db, $sql)) {
    header("Location: team.php?success=Data success deleted");
    exit();
} else {
    header("Location: team.php?failed=Data failed delete");
    exit();    
}
?>