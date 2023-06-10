<!-- PHP -->
<?php
require '../include/db.php';
$page = 'menu';
$query = "SELECT * FROM tbl_home, tbl_menu";
$run = mysqli_query($db,$query);
$menu = mysqli_fetch_array($run);
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
                        <h1 class="h3 mb-0 text-gray-800">Menu Page</h1>
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
                                <input type="text" class="form-control" id="title" name="title_menu"
                                    placeholder="Enter title" value="<?= $menu['title_menu'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="name">Subtitle</label>
                                <input type="text" class="form-control" id="name" name="subtitle_menu"
                                    placeholder="Enter subtitle" value="<?= $menu['subtitle_menu'] ?>">
                            </div>
                            <button type="submit" name="updateMenu" class="btn btn-primary">Update Menu</button>
                            <div class="my-3">
                                <div class="col-md-12">
                                    <div class="row">
                                        <?php 
                                            $query_menu = "SELECT * FROM tbl_menu";
                                            $run_menu = mysqli_query($db,$query_menu);
                                            while ($menu = mysqli_fetch_array($run_menu)) {
                                        ?>
                                        <div class="col-md-6 col-sm-12 mb-3">
                                            <div class="media wow fadeInUp" data-wow-delay="0.6s">
                                                <div class="media-object pull-left">
                                                    <img src="../assets//images/menu/<?= $menu['img_menu'] ?>"
                                                        class="position-relative" alt="Food Menu"
                                                        style="height: 175px; width: 300px; padding-right: 12px;">
                                                </div>
                                                <div class="media-body py-3">
                                                    <h3 class="media-heading"><?= $menu['name_menu'] ?></h3>
                                                    <p><?= $menu['desc_menu'] ?></p>
                                                    <p><?= $menu['price_menu'] ?></p>
                                                    <div class="mb-">
                                                        <button type="button" class="btn btn-warning"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#editMenu<?= $menu['id'] ?>">
                                                            Edit
                                                        </button>
                                                        <a onclick="return confirm('Are you sure delete this data ?')"
                                                            href="deleteMenu.php?id=<?= $menu['id'] ?>"
                                                            class="btn btn-danger">
                                                            Delete
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Edit Modal Portfolio Start -->
                                        <div class="modal fade" id="editMenu<?= $menu['id'] ?>" tabindex="-1"
                                            aria-labelledby="editModalLabel" aria-hidden="true">
                                            <form action="function.php" method="POST" enctype="multipart/form-data">
                                                <?php
                                                    $id = @$_GET['id'];
                                                ?>
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="editModalLabel">
                                                                Modal Menu</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group col-12">
                                                                <div class="form-group mb-3 w-100 text-center">
                                                                    <input type="hidden" class="form-control" name="id"
                                                                        value="<?= $menu['id'] ?>">
                                                                    <img class="mb-3"
                                                                        src="../assets/images/menu/<?= $menu['img_menu'] ?>"
                                                                        width="25%">
                                                                    <input type="file" class="form-control"
                                                                        name="img_menu">
                                                                </div>
                                                                <div class="form-group mb-3 w-100">
                                                                    <label class="form-label" for="name_menu">Title
                                                                        Menu</label>
                                                                    <input class="form-control" type="text"
                                                                        id="name_menu" name="name_menu"
                                                                        placeholder="Description Feature"
                                                                        value="<?= $menu['name_menu'] ?>">
                                                                </div>
                                                                <div class="form-group mb-3 w-100">
                                                                    <label class="form-label"
                                                                        for="desc_menu">Description
                                                                        Menu</label>
                                                                    <input class="form-control" type="text"
                                                                        id="desc_menu" name="desc_menu"
                                                                        placeholder="Description Feature"
                                                                        value="<?= $menu['desc_menu'] ?>">
                                                                </div>
                                                                <div class="form-group mb-3 w-100">
                                                                    <label class="form-label"
                                                                        for="price_menu">Price
                                                                        Menu</label>
                                                                    <input class="form-control" type="text"
                                                                        id="price_menu" name="price_menu"
                                                                        placeholder="Description Feature"
                                                                        value="<?= $menu['price_menu'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary"
                                                                name="editMenu">Update Data</button>
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
                            <!-- Add Menu Start -->
                            <form action="function.php" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="d-flex flex-column w-50">
                                            <div class="form-group">
                                                <div class="d-flex flex-column">
                                                    <label for="image">Menu</label>
                                                    <input type="file" class="form-control" name="img_menu">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Name Menu</label>
                                                <input type="text" class="form-control" id="name" name="name_menu"
                                                    placeholder="Enter name">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Description Menu</label>
                                                <input type="text" class="form-control" id="name" name="desc_menu"
                                                    placeholder="Enter description">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Price Menu</label>
                                                <input type="text" class="form-control" id="name" name="price_menu"
                                                    placeholder="Enter price">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="addMenu" class="btn btn-primary">Add Menu</button>
                                </div>
                            </form>
                            <!-- Add Menu End -->
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