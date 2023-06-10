<!-- PHP -->
<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}
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
                            <!-- List Menu Start -->
                            <table class="table table-bordered table-hover my-3" id="team">
                                <thead>
                                    <tr>
                                        <th class="text-center fw-semibold">No</th>
                                        <th class="text-center fw-semibold">Image</th>
                                        <th class="text-center fw-semibold">Name</th>
                                        <th class="text-center fw-semibold">Description</th>
                                        <th class="text-center fw-semibold">Price</th>
                                        <th class="text-center fw-semibold">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $id = @$_GET['id'];
                                        $query = "SELECT * FROM tbl_menu ORDER BY id DESC";
                                        $run = mysqli_query($db,$query);
                                        $i = 1;
                                        while ($menu = mysqli_fetch_array($run)) {
                                    ?>
                                    <tr>
                                        <td class="text-center"><?= $i; ?></td>
                                        <td class="text-center"><img
                                                src="../assets/images/menu/<?= $menu['img_menu'] ?>" alt="menu"
                                                height="75"></td>
                                        <td class="text-center"><?= $menu['name_menu'] ?></td>
                                        <td class="text-center"><?= $menu['desc_menu'] ?></td>
                                        <td class="text-center"><?= $menu['price_menu'] ?></td>
                                        <td class="text-center" class="text-center">
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#modal<?= $menu['id'] ?>">
                                                Edit
                                            </button>
                                            <a onclick="return confirm('Are you sure delete this data ?')"
                                                href="deleteMenu.php?id=<?= $menu['id'] ?>" class="btn btn-danger">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <!-- Modal Start -->
                                    <div class="modal fade" id="modal<?= $menu['id'] ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <form action="function.php" method="POST" enctype="multipart/form-data">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="editModalLabel">
                                                            Modal <?= $menu['name_menu'] ?></h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group col-12">
                                                            <div class="form-group mb-3 w-100 text-center">
                                                                <input type="hidden" class="form-control" name="id"
                                                                    value="<?= $menu['id'] ?>">
                                                                <img class="mb-3"
                                                                    src="../assets/images/menu/<?= $menu['img_menu'] ?>"
                                                                    width="100%">
                                                                <input type="file" class="form-control" name="img_menu">
                                                            </div>
                                                            <div class="form-group mb-3 w-100">
                                                                <label class="form-label">Name</label>
                                                                <input class="form-control" type="text" name="name_menu"
                                                                    placeholder="Enter name"
                                                                    value="<?= $menu['name_menu'] ?>">
                                                            </div>
                                                            <div class="form-group mb-3 w-100">
                                                                <label class="form-label">Description</label>
                                                                <input class="form-control" type="text" name="desc_menu"
                                                                    placeholder="Enter description"
                                                                    value="<?= $menu['desc_menu'] ?>">
                                                            </div>
                                                            <div class="form-group mb-3 w-100">
                                                                <label class="form-label">Price</label>
                                                                <input class="form-control" type="text"
                                                                    name="price_menu" placeholder="Enter price"
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
                                    <!-- Modal End -->
                                    <?php
                                    $i++; 
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <!-- List Menu End -->
                            <!-- Add Menu Start -->
                            <h4>Form add menu</h4>
                            <form action="function.php" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="d-flex flex-column w-50">
                                            <div class="form-group">
                                                <div class="d-flex flex-column">
                                                    <label for="image">Image</label>
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