<?php


session_start();

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}



// Assume you have a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "atc";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// $conn->close();
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mirror</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
    


</head>

<body onload="startTime()">
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="Nagpur-district.php"><img src="images/logo.svg" class="mr-2"
                        alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="Nagpur-district.php"><img src="images/logo-mini.svg"
                        alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav mr-lg-2">
                    <li class="nav-item nav-search d-none d-lg-block">
                        <div class="input-group">
                            <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                                <span class="input-group-text" id="search">
                                    <i class="icon-search"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" id="navbar-search-input"
                                placeholder="Search Villager" aria-label="search" aria-describedby="search">
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                            data-toggle="dropdown">
                            <i class="icon-bell mx-0"></i>
                            <span class="count"></span>
                        </a>

                    </li>
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="images/user.png" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="ti-settings text-primary"></i>
                                Settings
                            </a>
                            <a class="dropdown-item" href="logout.php">
                                <i class="ti-power-off text-primary"></i>
                                Sign Out
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="ti-settings"></i></div>
                <div id="theme-settings" class="settings-panel">
                    <i class="settings-close ti-close"></i>
                    <p class="settings-heading">SIDEBAR SKINS</p>
                    <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                        <div class="img-ss rounded-circle bg-light border mr-3"></div>Light
                    </div>
                    <div class="sidebar-bg-options" id="sidebar-dark-theme">
                        <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                    </div>
                    <p class="settings-heading mt-2">HEADER SKINS</p>
                    <div class="color-tiles mx-0 px-4">
                        <div class="tiles success"></div>
                        <div class="tiles warning"></div>
                        <div class="tiles danger"></div>
                        <div class="tiles info"></div>
                        <div class="tiles dark"></div>
                        <div class="tiles default"></div>
                    </div>
                </div>
            </div>
            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="Nagpur-district.php">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                            aria-controls="ui-basic">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Schemes</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="Nagpur-Schemes.php">Schemes</a></li>
                                <li class="nav-item"> <a class="nav-link" href="Nagpur-scheme-beneficiary.php">Schemes Beneficiary</a></li>
                                <li class="nav-item"> <a class="nav-link" href="Nagpur-Active-Complete.php">Active & Completed</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                            aria-controls="form-elements">
                            <i class="icon-columns menu-icon"></i>
                            <span class="menu-title">Villages</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="form-elements">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="Nagpur-allVillagers.php">Total
                                        Villages</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="NagpurVillagers-add-new.php">Add
                                        Villagers</a></li>
                                <li class="nav-item"><a class="nav-link" href="Nagpur-allVillagers-edit.php">Edit
                                        Villagers
                                        Info</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="Nagpur-Funds.php">
                            <i class="icon-grid-2 menu-icon"></i>
                            <span class="menu-title">Funds</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="icon-grid-2 menu-icon"></i>
                            <span class="menu-title">ChatGPT</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="icon-contract menu-icon"></i>
                            <span class="menu-title">Help Center</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="icon-ban menu-icon"></i>
                            <span class="menu-title">Privacy</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">
                            <i class="icon-head menu-icon"></i>
                            <span class="menu-title">Sign Out</span>
                        </a>
                    </li>

                </ul>
            </nav>

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">







                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title">Update Villagers Details</p>

                                    <form method="post">

                                        <div class="form-group">
                                            <label class="form-label">Search by Aadhar Number:</label>
                                            <input class="form-control" type="text" id="aadhar" name="aadhar"
                                                placeholder="Enter Aadhar No." required />
                                        </div>

                                        <button type="submit" class="btn btn-primary mr-2">Search</button>
                                    </form>

                                    <br><br>
                                    <?php
                                    // Check if the form is submitted
                                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                        // Retrieve Aadhar number from the form
                                        $searchAadhar = $_POST["aadhar"];

                                        // Query to fetch user details based on Aadhar number
                                        $sqlUser = "SELECT * FROM nagpur_user_table WHERE aadhar = '$searchAadhar'";
                                        $resultUser = $conn->query($sqlUser);

                                        // Check if user details are found
                                        if ($resultUser->num_rows > 0) {
                                            // Display input fields with user details for editing
                                            $userDetails = $resultUser->fetch_assoc();
                                            ?>
                                            <form method="post">
                                                <!-- Input fields to edit user details -->
                                                <h4>Villager Details</h4>
                                                <br>

                                                <div class="form-group">
                                                    <label class="form-label" for="name">Name:</label>
                                                    <input class="form-control" type="text" name="name"
                                                        value="<?php echo $userDetails['name']; ?>" required />
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="age">Age:</label>
                                                    <input class="form-control" type="number" name="age"
                                                        value="<?php echo $userDetails['age']; ?>" required>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="category">Category:</label>
                                                    <input class="form-control" type="text" name="category"
                                                        value="<?php echo $userDetails['category']; ?>" required>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="mobile">Mobile:</label>
                                                    <input class="form-control" type="number" name="mobile"
                                                        value="<?php echo $userDetails['mobile']; ?>" required>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="aadhar">Aadhar:</label>
                                                    <input class="form-control" type="number" name="aadhar"
                                                        value="<?php echo $userDetails['aadhar']; ?>" required>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="village">Village:</label>
                                                    <input class="form-control" type="text" name="village"
                                                        value="<?php echo $userDetails['village']; ?>" required>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="state">State:</label>
                                                    <input class="form-control" type="text" name="state"
                                                        value="<?php echo $userDetails['state']; ?>" required>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="country">Country:</label>
                                                    <input class="form-control" type="text" name="country"
                                                        value="<?php echo $userDetails['country']; ?>" required>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="income">Income:</label>
                                                    <input class="form-control" type="text" name="income"
                                                        value="<?php echo $userDetails['income']; ?>" required>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="gender">Gender:</label>
                                                    <input class="form-control" type="text" name="gender"
                                                        value="<?php echo $userDetails['gender']; ?>" required>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="married">Married Status:</label>
                                                    <input class="form-control" type="text" name="married"
                                                        value="<?php echo $userDetails['married']; ?>" required>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="work">Occupation:</label>
                                                    <input class="form-control" type="text" name="work" value="<?php echo $userDetails['work']; ?>"
                                                        required>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="dob">DOB:</label>
                                                    <input class="form-control" type="dob" name="dob" value="<?php echo $userDetails['dob']; ?>" required>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="election">Election Card No.:</label>
                                                    <input class="form-control" type="election" name="election" value="<?php echo $userDetails['election']; ?>" required>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="receivedSchemes">Received Schemes:</label>
                                                    <input class="form-control" type="text" name="receivedSchemes"
                                                    value="<?php echo $userDetails['receivedSchemes']; ?>" required>
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="schemesName">Scheme Name 1:</label>
                                                    <input class="form-control" type="text" name="schemesName"
                                                    value="<?php echo $userDetails['schemesName']; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="schemeAmount">Scheme Amount 1:</label>
                                                    <input class="form-control" type="text" name="schemeAmount"
                                                    value="<?php echo $userDetails['schemeAmount']; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="schemesName1">Schemes Name 2:</label>
                                                    <input class="form-control" type="text" name="schemesName1"
                                                    value="<?php echo $userDetails['schemesName1']; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="schemeAmount1">Scheme Amount 2:</label>
                                                    <input class="form-control" type="text" name="schemeAmount1"
                                                    value="<?php echo $userDetails['schemeAmount1']; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="schemesName2">Scheme Name 3:</label>
                                                    <input class="form-control" type="text" name="schemesName2"
                                                    value="<?php echo $userDetails['schemesName2']; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label class="form-label" for="schemeAmount2">Scheme Amount 3:</label>
                                                    <input class="form-control" type="text" name="schemeAmount2"
                                                    value="<?php echo $userDetails['schemeAmount2']; ?>">
                                                </div>

                                                <button type="submit" class="btn btn-primary mr-2">Update Details</button>
                                            </form>
                                        <?php
                                        } else {
                                            echo "User with Aadhar number $searchAadhar not found.";
                                        }
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>. <a href="https://9teeninitiative.in/" target="_blank">9Teen Initiative</a>.
                        All rights reserved.
                        </span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->



</body>

</html>

<?php
// Close database connection
$conn->close();
?>