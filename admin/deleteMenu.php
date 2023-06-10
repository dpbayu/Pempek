<?php
require '../include/db.php';
$id = $_GET['id'];
$sql = "DELETE FROM tbl_menu WHERE id = '$id'";
if (mysqli_query($db, $sql)) {
    header("Location: menu.php?success=Data success deleted");
    exit();
} else {
    header("Location: menu.php?failed=Data failed delete");
    exit();    
}
?>