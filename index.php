<!-- PHP -->
<?php
require 'include/db.php';
$query = "SELECT * FROM tbl_home, tbl_feature, tbl_about, tbl_menu, tbl_team, tbl_contact";
$run = mysqli_query($db,$query);
$user = mysqli_fetch_array($run);
?>
<!-- PHP -->
<!DOCTYPE html>
<html lang="en">

<!-- Head Start -->
<?php require 'partials/head.php' ?>
<!-- Head End -->

<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
  <!-- Preloader End -->
  <div class="preloader">
    <div class="sk-spinner sk-spinner-pulse"></div>
  </div>
  <!-- Preloader Start -->
  <!-- Home Start -->
  <?php require 'partials/home.php' ?>
  <!-- Home End -->
  <!-- Navigation Start -->
  <?php require 'partials/navigation.php' ?>
  <!-- Navigation End -->
  <!-- Feature Start -->
  <?php require 'partials/feature.php' ?>
  <!-- Feature End -->
  <!-- About Start -->
  <?php require 'partials/about.php' ?>
  <!-- About End -->
  <!-- Menu Start -->
  <?php require 'partials/menu.php' ?>
  <!-- Menu End -->
  <!-- Team Start -->
  <?php require 'partials/team.php' ?>
  <!-- Team End -->
  <!-- Contact Start -->
  <?php require 'partials/contact.php' ?>
  <!-- Contect End -->
  <!-- Footer Start -->
  <?php require 'partials/footer.php' ?>
  <!-- Footer End -->
</body>

</html>