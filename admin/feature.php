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
                    <!-- List Feature Start -->
                    <table class="table table-bordered table-hover my-3" id="team">
                        <thead>
                            <tr>
                                <th class="text-center fw-semibold">No</th>
                                <th class="text-center fw-semibold">Icon</th>
                                <th class="text-center fw-semibold">Description</th>
                                <th class="text-center fw-semibold">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $id = @$_GET['id'];
                                $query = "SELECT * FROM tbl_feature ORDER BY id DESC";
                                $run = mysqli_query($db,$query);
                                $i = 1;
                                while ($feature = mysqli_fetch_array($run)) {
                            ?>
                            <tr>
                                <td class="text-center"><?= $i; ?></td>
                                <td class="text-center"><img src="../assets/images/icon/<?= $feature['img_feature'] ?>"
                                        alt="profile" height="75"></td>
                                <td class="text-center"><?= $feature['desc_feature'] ?></td>
                                <td class="text-center" class="text-center">
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#modal<?= $feature['id'] ?>">
                                        Edit
                                    </button>
                                    <a onclick="return confirm('Are you sure delete this data ?')"
                                        href="deleteFeature.php?id=<?= $feature['id'] ?>" class="btn btn-danger">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            <!-- Modal Start -->
                            <div class="modal fade" id="modal<?= $feature['id'] ?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <form action="function.php" method="POST" enctype="multipart/form-data">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="editModalLabel">
                                                    Modal <?= $feature['desc_feature'] ?></h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group col-12">
                                                    <div class="form-group mb-3 w-100 text-center">
                                                        <input type="hidden" class="form-control" name="id"
                                                            value="<?= $feature['id'] ?>">
                                                        <img class="mb-3"
                                                            src="../assets/images/icon/<?= $feature['img_feature'] ?>"
                                                            width="100%">
                                                        <input type="file" class="form-control" name="img_feature">
                                                    </div>
                                                    <div class="form-group mb-3 w-100">
                                                        <label class="form-label">Name</label>
                                                        <input class="form-control" type="text" name="desc_feature"
                                                            placeholder="Enter description"
                                                            value="<?= $feature['desc_feature'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" name="editFeature">Update
                                                    Data</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Modal End -->
                            <?php
                            $i++; 
                            }
                            ?>
                        </tbody>
                    </table>
                    <!-- List Feature End -->
                    <!-- Add Feature Start -->
                    <h4>Form add feature</h4>
                    <form action="function.php" method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="d-flex flex-column w-50">
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
                    <!-- Add Feature End -->
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