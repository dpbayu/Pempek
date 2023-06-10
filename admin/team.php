<!-- PHP -->
<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}
require '../include/db.php';
$page = 'team';
$query = "SELECT * FROM tbl_home";
$run = mysqli_query($db,$query);
$team = mysqli_fetch_array($run);
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
                        <h1 class="h3 mb-0 text-gray-800">Team Page</h1>
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
                                <input type="text" class="form-control" id="title" name="title_team"
                                    placeholder="Enter title" value="<?= $team['title_team'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="name">Subtitle</label>
                                <input type="text" class="form-control" id="name" name="subtitle_team"
                                    placeholder="Enter subtitle" value="<?= $team['subtitle_team'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="name">Taste</label>
                                <input type="text" class="form-control" id="name" name="desc_taste"
                                    placeholder="Enter taste" value="<?= $team['desc_taste'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="name">Service</label>
                                <input type="text" class="form-control" id="name" name="desc_service"
                                    placeholder="Enter service" value="<?= $team['desc_service'] ?>">
                            </div>
                            <button type="submit" name="updateTeam" class="btn btn-primary">Update Team</button>
                            <!-- List Team Start -->
                            <table class="table table-bordered table-hover my-3" id="team">
                                <thead>
                                    <tr>
                                        <th class="text-center fw-semibold">No</th>
                                        <th class="text-center fw-semibold">Profile</th>
                                        <th class="text-center fw-semibold">Name</th>
                                        <th class="text-center fw-semibold">Job</th>
                                        <th class="text-center fw-semibold">Phone</th>
                                        <th class="text-center fw-semibold">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $id = @$_GET['id'];
                                        $query = "SELECT * FROM tbl_team ORDER BY id DESC";
                                        $run = mysqli_query($db,$query);
                                        $i = 1;
                                        while ($team = mysqli_fetch_array($run)) {
                                    ?>
                                    <tr>
                                        <td class="text-center"><?= $i; ?></td>
                                        <td class="text-center"><img
                                                src="../assets/images/team/<?= $team['img_team'] ?>" alt="profile"
                                                height="75"></td>
                                        <td class="text-center"><?= $team['name_team'] ?></td>
                                        <td class="text-center"><?= $team['job_team'] ?></td>
                                        <td class="text-center"><?= $team['phone_team'] ?></td>
                                        <td class="text-center" class="text-center">
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#modal<?= $team['id'] ?>">
                                                Edit
                                            </button>
                                            <a onclick="return confirm('Are you sure delete this data ?')"
                                                href="deleteTeam.php?id=<?= $team['id'] ?>" class="btn btn-danger">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <!-- Modal Start -->
                                    <div class="modal fade" id="modal<?= $team['id'] ?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <form action="function.php" method="POST" enctype="multipart/form-data">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="editModalLabel">
                                                            Modal <?= $team['name_team'] ?></h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group col-12">
                                                            <div class="form-group mb-3 w-100 text-center">
                                                                <input type="hidden" class="form-control" name="id"
                                                                    value="<?= $team['id'] ?>">
                                                                <img class="mb-3"
                                                                    src="../assets/images/team/<?= $team['img_team'] ?>"
                                                                    width="100%">
                                                                <input type="file" class="form-control" name="img_team">
                                                            </div>
                                                            <div class="form-group mb-3 w-100">
                                                                <label class="form-label" for="name_team">Name</label>
                                                                <input class="form-control" type="text" id="name_team"
                                                                    name="name_team" placeholder="Enter name"
                                                                    value="<?= $team['name_team'] ?>">
                                                            </div>
                                                            <div class="form-group mb-3 w-100">
                                                                <label class="form-label">Job</label>
                                                                <input class="form-control" type="text" name="job_team"
                                                                    placeholder="Enter job"
                                                                    value="<?= $team['job_team'] ?>">
                                                            </div>
                                                            <div class="form-group mb-3 w-100">
                                                                <label class="form-label">Phone</label>
                                                                <input class="form-control" type="text"
                                                                    name="phone_team" placeholder="Enter Phone"
                                                                    value="<?= $team['phone_team'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary"
                                                            name="editTeam">Update Data</button>
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
                            <!-- List Team End -->
                            <!-- Add Team Start -->
                            <h4>Form add data</h4>
                            <form action="function.php" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="d-flex flex-column w-50">
                                            <div class="form-group">
                                                <div class="d-flex flex-column">
                                                    <label for="image">Profile</label>
                                                    <input type="file" class="form-control" name="img_team">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" id="name" name="name_team"
                                                    placeholder="Enter name">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Job</label>
                                                <input type="text" class="form-control" id="name" name="job_team"
                                                    placeholder="Enter job">
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Phone</label>
                                                <input type="text" class="form-control" id="name" name="phone_team"
                                                    placeholder="Enter phone">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="addTeam" class="btn btn-primary">Add Team</button>
                                </div>
                            </form>
                            <!-- Add Team End -->
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