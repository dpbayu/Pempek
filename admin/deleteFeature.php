<?php
require '../include/db.php';
$id = $_GET['id'];
$sql = "DELETE FROM tbl_feature WHERE id = '$id'";
if (mysqli_query($db, $sql)) {
    header("Location: feature.php?success=Data success deleted");
    exit();
} else {
    header("Location: feature.php?failed=Data failed delete");
    exit();    
}
?>