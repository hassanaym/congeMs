<?php
require_once 'session.php';
require_once('EmployeeClass.php');

$cl = new Employee();
if (isset($_POST["firstname"]) && isset($_POST["lastname"])) {
    $lst = $cl->findByFirstnameAndLastname($_POST['firstname'], $_POST['lastname']);
} else {
    $lst = $cl->findAll();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Conge MS - List of employees</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav purple-color sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">

                <div class="sidebar-brand-text mx-3">Conge MS<sup>1.0</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="home.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="employeeList.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Employees</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="departementList.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Departements</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="congeList.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Conges</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="congeTypeList.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Conge types</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['firstname'] . ' ' . $_SESSION['lastname'] ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">List of employees</h6>
                                <a href="employeeNew.php" class="d-none d-sm-inline-block btn btn-sm btn-primary purple-color shadow-sm">New employee</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="employeeList.php" method="post">
                                <div class="form-group row">

                                    <div class="col-sm-3">
                                        <input type="search" class="form-control form-control-sm" placeholder="Firstname" name="firstname">
                                    </div>

                                    <div class="col-sm-3">
                                        <input type="search" class="form-control form-control-sm" placeholder="Lastname" name="lastname">
                                    </div>

                                    <div class="col-sm-3">
                                        <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary purple-color shadow-sm">Search</button>
                                    </div>
                                </div>
                            </form>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Regsitration</th>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Dob date</th>
                                            <th>Pob</th>
                                            <th>Start date</th>
                                            <th>Departement</th>
                                            <th>Manage</th>
                                            <th></th>
                                            <th></th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        foreach ($lst as $e) {
                                            echo "<tr>";
                                            echo "<td>" . $e->id_emp . "</td>";
                                            echo "<td>" . $e->registration . "</td>";
                                            echo "<td>" . $e->firstname . "</td>";
                                            echo "<td>" . $e->lastname . "</td>";
                                            echo "<td>" . $e->dob . "</td>";
                                            echo "<td>" . $e->pob . "</td>";
                                            echo "<td>" . $e->start_date . "</td>";
                                            echo "<td>" . $e->dep_works . "</td>";
                                            echo "<td>" . $e->dep_manage . "</td>";
                                            echo "<td><a href=" . "employeeDelete.php?id=" . $e->id_emp . "><i class='fas fa-folder-minus'></i></a></td>";
                                            echo "<td><a href=" . "employeeUpdateForm.php?id=" . $e->id_emp . "><i class='fas fa-edit'></i></a></td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Conge MS 1.0 AMINE</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->


    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>