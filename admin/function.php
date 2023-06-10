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

// Update About
if (isset($_POST['updateAbout'])) {
    $title_about = mysqli_real_escape_string($db,$_POST['title_about']);
    $subtitle_about = mysqli_real_escape_string($db,$_POST['subtitle_about']);
    $desc_about = mysqli_real_escape_string($db,$_POST['desc_about']);
    // Img 1
    $img_about1 = $_FILES['img_about1']['name'];
    $imgtemp = $_FILES['img_about1']['tmp_name'];
    if ($imgtemp == '') {
        $sql_home = "SELECT * FROM tbl_about WHERE 1";
        $query_home = mysqli_query($db,$sql_home);
        $fetch_home = mysqli_fetch_array($query_home);
        $img_about1 = $fetch_home['img_about1'];
    }
    move_uploaded_file($imgtemp,"../assets/images/about/$img_about1");
    // Img 2
    $img_about2 = $_FILES['img_about2']['name'];
    $imgtemp = $_FILES['img_about2']['tmp_name'];
    if ($imgtemp == '') {
        $sql_resume = "SELECT * FROM tbl_about WHERE 1";
        $query_resume = mysqli_query($db,$sql_resume);
        $fetch_resume = mysqli_fetch_array($query_resume);
        $img_about2 = $fetch_resume['img_about2'];
    }
    move_uploaded_file($imgtemp,"../assets/images/about/$img_about2");
    // Img 3
    $img_about3 = $_FILES['img_about3']['name'];
    $imgtemp = $_FILES['img_about3']['tmp_name'];
    if ($imgtemp == '') {
        $sql_resume = "SELECT * FROM tbl_about WHERE 1";
        $query_resume = mysqli_query($db,$sql_resume);
        $fetch_resume = mysqli_fetch_array($query_resume);
        $img_about3 = $fetch_resume['img_about3'];
    }
    move_uploaded_file($imgtemp,"../assets/images/about/$img_about3");
    $query = "UPDATE tbl_about SET title_about = '$title_about', subtitle_about = '$subtitle_about', desc_about = '$desc_about', img_about1 = '$img_about1', img_about2 = '$img_about2', img_about3 = '$img_about3' WHERE id = 1";
    $run = mysqli_query($db,$query);
    if ($run) {
        echo "<script>document.location.href = 'about.php?success=Succesfully updated!';</script>";
    }
}
// Update About

// Update Feature Start
if (isset($_POST['updateFeature'])) {
    $title_feature = mysqli_real_escape_string($db,$_POST['title_feature']);
    $subtitle_feature = mysqli_real_escape_string($db,$_POST['subtitle_feature']);
    $query = "UPDATE tbl_home SET title_feature = '$title_feature', subtitle_feature = '$subtitle_feature' WHERE id = 1";
    $run = mysqli_query($db,$query);
    if ($run) {
        echo "<script>document.location.href = 'feature.php?success=Succesfully updated!';</script>";
    }
} else if (isset($_POST['addFeature'])) {
    $desc_feature = trim(mysqli_real_escape_string($db, $_POST['desc_feature']));
    $img_feature = $_FILES['img_feature']['name'];
    move_uploaded_file($_FILES['img_feature']['tmp_name'],"../assets/images/icon/$img_feature");
    mysqli_query($db, "INSERT INTO tbl_feature (id, desc_feature, img_feature) VALUES ('', '$desc_feature', '$img_feature')");
        echo "<script>window.location='feature.php?success=Data successfuly added!';</script>";
} else if (isset($_POST['editFeature'])) {
    $id = $_POST['id'];
    $desc_feature = trim(mysqli_real_escape_string($db, $_POST['desc_feature']));
    $img_feature = $_FILES['img_feature']['name'];
    if ($img_feature != '') {
        move_uploaded_file($_FILES['img_feature']['tmp_name'],"../assets/images/icon/$img_feature");
        mysqli_query($db, "UPDATE tbl_feature SET desc_feature = '$desc_feature', img_feature = '$img_feature' WHERE id = '$id'");
        echo "<script>window.location='feature.php?success=Data successfuly updated!';</script>";
    } else {
        mysqli_query($db, "UPDATE tbl_feature SET desc_feature = '$desc_feature' WHERE id = '$id'");
        echo "<script>window.location='feature.php?success=Data successfuly updated!';</script>";
    }
}
// Update Feature End

// Update Menu Start
if (isset($_POST['updateMenu'])) {
    $title_menu = mysqli_real_escape_string($db,$_POST['title_menu']);
    $subtitle_menu = mysqli_real_escape_string($db,$_POST['subtitle_menu']);
    $query = "UPDATE tbl_home SET title_menu = '$title_menu', subtitle_menu = '$subtitle_menu' WHERE id = 1";
    $run = mysqli_query($db,$query);
    if ($run) {
        echo "<script>document.location.href = 'menu.php?success=Succesfully updated!';</script>";
    }
} else if (isset($_POST['addMenu'])) {
    $name_menu = trim(mysqli_real_escape_string($db, $_POST['name_menu']));
    $price_menu = trim(mysqli_real_escape_string($db, $_POST['price_menu']));
    $desc_menu = trim(mysqli_real_escape_string($db, $_POST['desc_menu']));
    $img_menu = $_FILES['img_menu']['name'];
    move_uploaded_file($_FILES['img_menu']['tmp_name'],"../assets/images/menu/$img_menu");
    mysqli_query($db, "INSERT INTO tbl_menu (id, name_menu, desc_menu, price_menu, img_menu) VALUES ('', '$name_menu', '$desc_menu', '$price_menu', '$img_menu')");
        echo "<script>window.location='menu.php?success=Data successfuly added!';</script>";
} else if (isset($_POST['editMenu'])) {
    $id = $_POST['id'];
    $name_menu = trim(mysqli_real_escape_string($db, $_POST['name_menu']));
    $desc_menu = trim(mysqli_real_escape_string($db, $_POST['desc_menu']));
    $price_menu = trim(mysqli_real_escape_string($db, $_POST['price_menu']));
    $img_menu = $_FILES['img_menu']['name'];
    if ($img_menu != '') {
        move_uploaded_file($_FILES['img_menu']['tmp_name'],"../assets/images/menu/$img_menu");
        mysqli_query($db, "UPDATE tbl_menu SET name_menu = '$name_menu', desc_menu = '$desc_menu', price_menu = '$price_menu', img_menu = '$img_menu' WHERE id = '$id'");
        echo "<script>window.location='menu.php?success=Data successfuly updated!';</script>";
    } else {
        mysqli_query($db, "UPDATE tbl_menu SET name_menu = '$name_menu', desc_menu = '$desc_menu', price_menu = '$price_menu' WHERE id = '$id'");
        echo "<script>window.location='menu.php?success=Data successfuly updated!';</script>";
    }
}
// Update Menu End

// Update Team Start
if (isset($_POST['updateTeam'])) {
    $title_team = mysqli_real_escape_string($db,$_POST['title_team']);
    $subtitle_team = mysqli_real_escape_string($db,$_POST['subtitle_team']);
    $desc_taste = mysqli_real_escape_string($db,$_POST['desc_taste']);
    $desc_service = mysqli_real_escape_string($db,$_POST['desc_service']);
    $query = "UPDATE tbl_home SET title_team = '$title_team', subtitle_team = '$subtitle_team', desc_taste = '$desc_taste', desc_service = '$desc_service' WHERE id = 1";
    $run = mysqli_query($db,$query);
    if ($run) {
        echo "<script>document.location.href = 'team.php?success=Succesfully updated!';</script>";
    }
} else if (isset($_POST['addTeam'])) {
    $name_team = trim(mysqli_real_escape_string($db, $_POST['name_team']));
    $job_team = trim(mysqli_real_escape_string($db, $_POST['job_team']));
    $phone_team = trim(mysqli_real_escape_string($db, $_POST['phone_team']));
    $img_team = $_FILES['img_team']['name'];
    move_uploaded_file($_FILES['img_team']['tmp_name'],"../assets/images/team/$img_team");
    mysqli_query($db, "INSERT INTO tbl_team (id, name_team, phone_team, job_team, img_team) VALUES ('', '$name_team', '$phone_team', '$job_team', '$img_team')");
        echo "<script>window.location='team.php?success=Data successfuly added!';</script>";
} else if (isset($_POST['editTeam'])) {
    $id = $_POST['id'];
    $name_team = trim(mysqli_real_escape_string($db, $_POST['name_team']));
    $phone_team = trim(mysqli_real_escape_string($db, $_POST['phone_team']));
    $job_team = trim(mysqli_real_escape_string($db, $_POST['job_team']));
    $img_team = $_FILES['img_team']['name'];
    if ($img_team != '') {
        move_uploaded_file($_FILES['img_team']['tmp_name'],"../assets/images/team/$img_team");
        mysqli_query($db, "UPDATE tbl_team SET name_team = '$name_team', phone_team = '$phone_team', job_team = '$job_team', img_team = '$img_team' WHERE id = '$id'");
        echo "<script>window.location='team.php?success=Data successfuly updated!';</script>";
    } else {
        mysqli_query($db, "UPDATE tbl_team SET name_team = '$name_team', phone_team = '$phone_team', job_team = '$job_team' WHERE id = '$id'");
        echo "<script>window.location='team.php?success=Data successfuly updated!';</script>";
    }
}
// Update Team End

// Update Home
if (isset($_POST['updateContact'])) {
    $address_contact = mysqli_real_escape_string($db,$_POST['address_contact']);
    $phone_contact = mysqli_real_escape_string($db,$_POST['phone_contact']);
    $email_contact = mysqli_real_escape_string($db,$_POST['email_contact']);
    $query = "UPDATE tbl_contact SET address_contact = '$address_contact', phone_contact = '$phone_contact', email_contact = '$email_contact' WHERE id = 1";
    $run = mysqli_query($db,$query);
    if ($run) {
        echo "<script>document.location.href = 'contact.php?success=Succesfully updated!';</script>";
    }
}
// Update Home
?>