<!-- PHP -->
<?php
require '../include/db.php';
$page = 'about';
$query = "SELECT * FROM tbl_about";
$run = mysqli_query($db,$query);
$about = mysqli_fetch_array($run);
?>
<!-- PHP -->
<!DOCTYPE html>
<html lang="en">

<!-- Head Start -->
<?php require 'partials/head.php' ?>
<!-- Head End -->

<body id="page-top">
    <!-- Page Wrapper Start -->
    <div id="wrapper">
        <!-- Sidebar Start -->
        <?php require 'partials/sidebar.php' ?>
        <!-- Sidebar End -->
        <!-- Content Wrapper Start -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content Start -->
            <div id="content">
                <!-- Topbar Start -->
                <?php require 'partials/topbar.php' ?>
                <!-- Topbar End -->
                <!-- Container Start -->
                <div class="container-fluid">
                    <!-- Page Heading Start -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">About Page</h1>
                    </div>
                    <!-- Page Heading End -->
                    <?php
                        if (isset($_GET['success'])) {
                            $msg = $_GET['success'];
                            echo '
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>'.$msg.'</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                        }
                        if (isset($_GET['failed'])) {
                            $msg = $_GET['failed'];
                            echo '
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>'.$msg.'</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                        }
                    ?>
                    <form class="pb-5" action="function.php" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title_about"
                                    placeholder="Enter title" value="<?= $about['title_about'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="name">Subtitle</label>
                                <input type="text" class="form-control" id="name" name="subtitle_about"
                                    placeholder="Enter subtitle" value="<?= $about['subtitle_about'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="name">Description</label>
                                <input type="text" class="form-control" id="name" name="desc_about"
                                    placeholder="Enter subtitle" value="<?= $about['desc_about'] ?>">
                            </div>
                            <div class="d-flex w-100 justify-content-between">
                                <div class="form-group">
                                    <div class="d-flex flex-column">
                                        <label for="image">Image About 1</label>
                                        <img class="mb-3" src="../assets/images/about/<?= $about['img_about1'] ?>" width="400">
                                        <input type="file" class="form-control" name="img_about1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="d-flex flex-column">
                                        <label for="image">Image About 2</label>
                                        <img class="mb-3" src="../assets/images/about/<?= $about['img_about2'] ?>" width="400">
                                        <input type="file" class="form-control" name="img_about2">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="d-flex flex-column">
                                        <label for="image">Image About 3</label>
                                        <img class="mb-3" src="../assets/images/about/<?= $about['img_about3'] ?>" width="400">
                                        <input type="file" class="form-control" name="img_about3">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="updateAbout" class="btn btn-primary">Update About</button>
                        </div>
                    </form>
                </div>
                <!-- Container End -->
            </div>
            <!-- Main Content End -->
            <!-- Footer Start -->
            <?php require 'partials/footer.php' ?>
            <!-- Footer End -->
        </div>
        <!-- Content Wrapper End -->
    </div>
    <!-- Page Wrapper End -->
</body>

</html>