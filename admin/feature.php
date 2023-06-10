<!-- PHP -->
<?php
require '../include/db.php';
$page = 'feature';
$query = "SELECT * FROM tbl_home, tbl_feature";
$run = mysqli_query($db,$query);
$feature = mysqli_fetch_array($run);
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
                        <h1 class="h3 mb-0 text-gray-800">Feature Page</h1>
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
                    <!-- Update Feature Start -->
                    <form action="function.php" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title_feature"
                                    placeholder="Enter title" value="<?= $feature['title_feature'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="name">Subtitle</label>
                                <input type="text" class="form-control" id="name" name="subtitle_feature"
                                    placeholder="Enter subtitle" value="<?= $feature['subtitle_feature'] ?>">
                            </div>
                            <button type="submit" name="updateFeature" class="btn btn-primary">Update Feature</button>
                        </div>
                    </form>
                    <!-- Update Feature End -->
                    <div class="container">
                        <div class="col-md-12">
                            <div class="row">
                                <?php 
                                    $query_portfolio = "SELECT * FROM tbl_feature";
                                    $run_portfolio = mysqli_query($db,$query_portfolio);
                                    while ($feature = mysqli_fetch_array($run_portfolio)) {
                                ?>
                                <div class="col-md-4">
                                    <div class="bg-white position-relative p-5 mt-5">
                                        <div class="bg-black top-0 position-relative text-center"
                                            style="margin: 0 auto; top: 0; width: 85px; height: 85px; border-radius: 50%; margin-top: -70px; margin-bottom: 30px;">
                                            <span><img class="mt-3" src="../assets/images/icon/<?= $feature['img_feature'] ?>"
                                                    style="filter: invert(1);" alt="icon" width="50"></span>
                                        </div>
                                        <p class="text-center"><?= $feature['desc_feature'] ?></p>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#editFeature<?= $feature['id'] ?>">
                                            Edit
                                        </button>
                                        <a onclick="return confirm('Are you sure delete this data ?')"
                                            href="deletePortfolio.php?id=<?= $feature['id'] ?>" class="btn btn-danger">
                                            Delete
                                        </a>
                                    </div>
                                </div>
                                <!-- Edit Modal Portfolio Start -->
                                <div class="modal fade" id="editFeature<?= $feature['id'] ?>" tabindex="-1"
                                    aria-labelledby="editModalLabel" aria-hidden="true">
                                    <form action="function.php" method="POST" enctype="multipart/form-data">
                                        <?php
                                            $id = @$_GET['id'];
                                        ?>
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="editModalLabel">
                                                        Modal Feature</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group col-12">
                                                        <div class="form-group mb-3 w-100 text-center">
                                                            <input type="hidden" class="form-control" name="id"
                                                                value="<?= $feature['id'] ?>">
                                                            <img class="mb-3" src="../assets/images/icon/<?= $feature['img_feature'] ?>"
                                                                width="25%">
                                                            <input type="file" class="form-control" name="img_feature">
                                                        </div>
                                                        <div class="form-group mb-3 w-100">
                                                            <label class="form-label" for="desc_feature">Description
                                                                Feature</label>
                                                            <input class="form-control" type="text" id="desc_feature"
                                                                name="desc_feature" placeholder="Description Feature"
                                                                value="<?= $feature['desc_feature'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        name="editFeature">Update Data</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- Edit Modal Portfolio End -->
                                <?php 
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- Add Icon Start -->
                    <form action="function.php" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="d-flex flex-column w-25">
                                    <div class="form-group">
                                        <div class="d-flex flex-column">
                                            <label for="image">Icon</label>
                                            <input type="file" class="form-control" name="img_feature">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Description Icon</label>
                                        <input type="text" class="form-control" id="name" name="desc_feature"
                                            placeholder="Enter Description">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="addFeature" class="btn btn-primary">Add Feature</button>
                        </div>
                    </form>
                    <!-- Add Icon End -->
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