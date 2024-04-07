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


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



if (isset($_GET['id'])) {
    $schemeId = $_GET['id'];

    $sql = "SELECT * FROM govt_scheme_table WHERE id = $schemeId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Fetch eligible users based on the scheme name
        $schemeName = $row['schemeName'];
        switch ($schemeName) {
            case "Vit Bhatti Yojna":
                $sqlFilteredUsers = "SELECT *, 'eligible' AS 'SchemeStatus' FROM nagpur_user_table 
                                     WHERE (income BETWEEN 0 AND 50000) 
                                     AND (age > 21 AND age < 100) 
                                     AND (married IN ('Married', 'Single', 'Divorced', 'Widowed')) 
                                     AND work= 'Worker'
                                     AND gender IN ('Male', 'Female')
                                      AND (schemesName != 'Vit Bhatti Yojna' AND 
                                          schemesName1 != 'Vit Bhatti Yojna' AND
                                          schemesName2 != 'Vit Bhatti Yojna')";
                break;
            case "Kutir va Laghu Udyog Yojana":
                $sqlFilteredUsers = "SELECT *, 'eligible' AS 'SchemeStatus' FROM nagpur_user_table 
                                     WHERE (income BETWEEN 0 AND 50000) 
                                     AND (age > 18 AND age < 100) 
                                     AND (married IN ('Married', 'Single', 'Divorced', 'Widowed'))
                                     AND work= 'Worker'
                                     AND gender IN ('Male', 'Female')
                                      AND (schemesName != 'Kutir va Laghu Udyog Yojana' AND 
                                          schemesName1 != 'Kutir va Laghu Udyog Yojana' AND
                                          schemesName2 != 'Kutir va Laghu Udyog Yojana')";
                break;
            case "Saikal Purvatha Yojana":
                $sqlFilteredUsers = "SELECT *, 'eligible' AS 'SchemeStatus' FROM nagpur_user_table 
                                     WHERE (income BETWEEN 0 AND 50000) 
                                     AND (age > 10 AND age < 20) 
                                     AND married = 'Single'
                                     AND work= 'Student'
                                     AND gender IN ('Male', 'Female')
                                      AND (schemesName != 'Saikal Purvatha Yojana' AND 
                                          schemesName1 != 'Saikal Purvatha Yojana' AND
                                          schemesName2 != 'Saikal Purvatha Yojana')";
                break;


            case "Tadpatri Anudan Yojana":
                $sqlFilteredUsers = "SELECT *, 'eligible' AS 'SchemeStatus' FROM nagpur_user_table 
                                     WHERE (income BETWEEN 0 AND 50000) 
                                     AND (age > 21 AND age < 100) 
                                     AND (married IN ('Married', 'Single', 'Divorced', 'Widowed'))
                                     AND work= 'Farmer'
                                     AND gender IN ('Male', 'Female')
                                      AND (schemesName != 'Tadpatri Anudan Yojana' AND 
                                          schemesName1 != 'Tadpatri Anudan Yojana' AND
                                          schemesName2 != 'Tadpatri Anudan Yojana')";
                break;
            case "Sinchan Yojana":
                $sqlFilteredUsers = "SELECT *, 'eligible' AS 'SchemeStatus' FROM nagpur_user_table 
                                     WHERE (income BETWEEN 0 AND 50000) 
                                     AND (age > 21 AND age < 100) 
                                     AND (married IN ('Married', 'Single', 'Divorced', 'Widowed'))
                                     AND work= 'Farmer'
                                     AND gender IN ('Male', 'Female')
                                      AND (schemesName != 'Sinchan Yojana' AND 
                                          schemesName1 != 'Sinchan Yojana' AND
                                          schemesName2 != 'Sinchan Yojana')";
                break;
            case "E-Rickshaw va Malvahan Yojana":
                $sqlFilteredUsers = "SELECT *, 'eligible' AS 'SchemeStatus' FROM nagpur_user_table 
                                     WHERE (income BETWEEN 0 AND 20000) 
                                     AND (age > 21 AND age < 100) 
                                     AND (married IN ('Married', 'Single', 'Divorced', 'Widowed'))
                                     AND work= 'Worker'
                                     AND gender IN ('Male', 'Female')
                                      AND (schemesName != 'E-Rickshaw va Malvahan Yojana' AND 
                                          schemesName1 != 'E-Rickshaw va Malvahan Yojana' AND
                                          schemesName2 != 'E-Rickshaw va Malvahan Yojana')";
                break;

            default:
                $sqlFilteredUsers = ""; // No scheme selected
        }

        if ($sqlFilteredUsers != "") {
            $resultFilteredUsers = $conn->query($sqlFilteredUsers);

            if ($resultFilteredUsers->num_rows > 0) {


                $userRow = $resultFilteredUsers->fetch_assoc();
                $total_Filtered_names = $userRow['name'];
            } else {
                $total_Filtered_names = 0;
            }
        } else {
            echo "<p>No scheme selected.</p>";
        }


    } else {
        $schemeDetails = 0;
    }
} else {
    echo "Scheme ID not provided.";
}

$conn->close();
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
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />




    <style>
        .table-body-scrollable {
            max-height: 300px;
            /* Adjust the height as per your requirement */
            overflow-y: auto;
        }
    </style>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }



        .search-bar {
            margin-bottom: 20px;
        }
    </style>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .form {
            max-width: 100%;
            max-height: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: auto;
            /* Enable vertical and horizontal scrolling */
        }

        .form-section {
            display: flex;
            justify-content: space-between;
        }

        .form-section>div {
            flex: 0 0 calc(50% - 10px);
        }


        .dropdownList1 {
            padding-right: 30px;
            padding-left: 80px;
        }
    </style>


    <style>
        .no-hover {
            cursor: default;
            color: inherit;
            text-decoration: none;
        }

        .no-hover:hover {
            color: inherit;
            text-decoration: none;
        }
    </style>

</head>

<body onload="startTime()">
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="Nagpur-district.php"><img src="images/logo.svg"
                        class="mr-2" alt="logo" /></a>
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
                                <li class="nav-item"> <a class="nav-link" href="Nagpur-scheme-beneficiary.php">Schemes
                                        Beneficiary</a></li>
                                <li class="nav-item"> <a class="nav-link" href="Nagpur-Active-Complete.php">Active &
                                        Completed</a></li>
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

                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Scheme Details</h4>
                                    <form class="form-sample">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Scheme Name</label>
                                                    <div class="col-sm-9">
                                                        <label class="form-control">
                                                            <?php echo $row['schemeName']; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Minimum Age</label>
                                                    <div class="col-sm-9">
                                                        <label class="form-control">
                                                            <?php echo $row['lessAge']; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Maximum Age</label>
                                                    <div class="col-sm-9">
                                                        <label class="form-control">
                                                            <?php echo $row['greaterAge']; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Maximum Income</label>
                                                    <div class="col-sm-9">
                                                        <label class="form-control">
                                                            <?php echo $row['greaterIncome']; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">State</label>
                                                    <div class="col-sm-9">
                                                        <label class="form-control">
                                                            <?php echo $row['state']; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Country</label>
                                                    <div class="col-sm-9">
                                                        <label class="form-control">
                                                            <?php echo $row['country']; ?>
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Category</label>
                                                    <div class="col-sm-9">
                                                        <label class="form-control">
                                                            <?php echo $row['category']; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Married Status</label>
                                                    <div class="col-sm-9">
                                                        <label class="form-control">
                                                            <?php echo $row['marriedStatus']; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Occupation</label>
                                                    <div class="col-sm-9">
                                                        <label class="form-control">
                                                            <?php echo $row['work']; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Gender</label>
                                                    <div class="col-sm-9">
                                                        <label class="form-control">
                                                            <?php echo $row['gender']; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Schemes fund</label>
                                                    <div class="col-sm-9">
                                                        <label class="form-control">
                                                            <?php echo $row['fund']; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Scheme Year</label>
                                                    <div class="col-sm-9">
                                                        <label class="form-control">
                                                            <?php echo $row['year']; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>





                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Non Beneficiary </h4>

                                    <form id="searchForm" class="search-bar ps-3" method="post">

                                        <button type="button" class="btn btn-outline-success btn-fw"
                                            id="downloadBtn">Download Data</button>

                                    </form>

                                    <div class="table-responsive" style="height: 500px; overflow: auto;">
                                        <table id="example" class="display expandable-table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Age</th>
                                                    <th>Category</th>
                                                    <th>Mobile Number</th>
                                                    <th>Aadhar Number</th>
                                                    <th>Village</th>
                                                    <th>State</th>
                                                    <th>Country</th>
                                                    <th>Income</th>
                                                    <th>Gender</th>
                                                    <th>Married Status</th>
                                                    <th>Occupation</th>
                                                    <th>Date of Birth</th>
                                                    <th>Election Card No.</th>
                                                    <th>Total Scheme</th>
                                                    <th>Scheme Name 1</th>
                                                    <th>Scheme Amount 1</th>
                                                    <th>Scheme Name 2</th>
                                                    <th>Scheme Amount 2</th>
                                                    <th>Scheme Name 3</th>
                                                    <th>Scheme Amount 3</th>
                                            </thead>

                                            <tbody>
                                                <?php

                                                if ($resultFilteredUsers === false) {
                                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                                } elseif ($resultFilteredUsers->num_rows > 0) {
                                                    // Output data of each row
                                                    while ($userRow = $resultFilteredUsers->fetch_assoc()) {
                                                        echo "<tr>";
                                                        echo '<td><a href="javascript:void(0)" onclick="openUserDetails(\'' . $userRow['name'] . '\', \'' . $userRow['age'] . '\', \'' . $userRow['category'] . '\', \'' . $userRow['mobile'] . '\', \'' . $userRow['aadhar'] . '\', \'' . $userRow['village'] . '\', \'' . $userRow['state'] . '\', \'' . $userRow['country'] . '\', \'' . $userRow['income'] . '\', \'' . $userRow['gender'] . '\', \'' . $userRow['married'] . '\', \'' . $userRow['work'] . '\', \'' . $userRow['dob'] . '\', \'' . $userRow['election'] . '\', \'' . $userRow['receivedSchemes'] . '\', \'' . $userRow['schemesName'] . '\', \'' . $userRow['schemeAmount'] . '\', \'' . $userRow['schemesName1'] . '\', \'' . $userRow['schemeAmount1'] . '\', \'' . $userRow['schemesName2'] . '\', \'' . $userRow['schemeAmount2'] . '\')">' . $userRow['name'] . '</a></td>';

                                                        echo '<td>' . $userRow['name'] . '</td>';
                                                        echo '<td>' . $userRow['age'] . '</td>';
                                                        echo '<td>' . $userRow['category'] . '</td>';
                                                        echo '<td>' . $userRow['mobile'] . '</td>';
                                                        echo '<td>' . $userRow['aadhar'] . '</td>';
                                                        echo '<td>' . $userRow['village'] . '</td>';
                                                        echo '<td>' . $userRow['state'] . '</td>';
                                                        echo '<td>' . $userRow['country'] . '</td>';
                                                        echo '<td>' . $userRow['income'] . '</td>';
                                                        echo '<td>' . $userRow['gender'] . '</td>';
                                                        echo '<td>' . $userRow['married'] . '</td>';
                                                        echo '<td>' . $userRow['work'] . '</td>';
                                                        echo '<td>' . $userRow['dob'] . '</td>';
                                                        echo '<td>' . $userRow['election'] . '</td>';
                                                        echo '<td>' . $userRow['receivedSchemes'] . '</td>';
                                                        echo '<td>' . $userRow['schemesName'] . '</td>';
                                                        echo '<td>' . $userRow['schemeAmount'] . '</td>';
                                                        echo '<td>' . $userRow['schemesName1'] . '</td>';
                                                        echo '<td>' . $userRow['schemeAmount1'] . '</td>';
                                                        echo '<td>' . $userRow['schemesName2'] . '</td>';
                                                        echo '<td>' . $userRow['schemeAmount2'] . '</td>';

                                                        echo "</tr>";

                                                    }
                                                } else {
                                                    echo "0 results";
                                                }
                                                // $conn->close();
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
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











    <script>
        function openUserDetails(name, age, category, mobile, aadhar, village, state, country, income, gender, married, work, dob, election, receivedSchemes, schemesName, schemeAmount, schemesName1, schemeAmount1, schemesName2, schemeAmount2) {
            // Open a new window with specific dimensions and no toolbar
            var userDetailsWindow = window.open("", "_blank", "width=600,height=400,toolbar=no");

            // Write HTML content into the new window
            userDetailsWindow.document.write(`
            <!DOCTYPE html>
                    <html lang="en">

                    <head>
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                    <title>Skydash Admin</title>
                    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
                    </head>

                    <body>
                    <div class="container-scroller">
                        <div class="content-wrapper">
                        <div class="col-12 grid-margin">
                            <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Villeger Details</h4>
                                    <form class="form-sample">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Name</label>
                                                    <div class="col-sm-9">
                                                        <label class="form-control">
                                                            ${name}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Age</label>
                                                    <div class="col-sm-9">
                                                        <label class="form-control">
                                                            ${age}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Category</label>
                                                    <div class="col-sm-9">
                                                        <label class="form-control">
                                                            ${category}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Mobile Number</label>
                                                    <div class="col-sm-9">
                                                        <label class="form-control">
                                                            ${mobile}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Aadhar Number</label>
                                                    <div class="col-sm-9">
                                                        <label class="form-control">
                                                            ${aadhar}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Village</label>
                                                    <div class="col-sm-9">
                                                        <label class="form-control">
                                                            ${village}
                                                        </label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">State</label>
                                                    <div class="col-sm-9">
                                                        <label class="form-control">
                                                            ${state}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Country</label>
                                                    <div class="col-sm-9">
                                                        <label class="form-control">
                                                            ${country}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Income</label>
                                                    <div class="col-sm-9">
                                                        <label class="form-control">
                                                            ${income}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Gender</label>
                                                    <div class="col-sm-9">
                                                        <label class="form-control">
                                                            ${gender}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Married Status</label>
                                                    <div class="col-sm-9">
                                                        <label class="form-control">
                                                            ${married}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Occupation</label>
                                                    <div class="col-sm-9">
                                                        <label class="form-control">
                                                            ${work}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Date of Birth</label>
                                                    <div class="col-sm-9">
                                                        <label class="form-control">
                                                            ${dob}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Election Card No.</label>
                                                    <div class="col-sm-9">
                                                        <label class="form-control">
                                                            ${election}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Total Scheme</label>
                                                    <div class="col-sm-9">
                                                        <label class="form-control">
                                                           ${receivedSchemes}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Scheme Name 1</label>
                                                    <div class="col-sm-9">
                                                        <label class="form-control">
                                                           ${schemesName}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Scheme Amount 1</label>
                                                    <div class="col-sm-9">
                                                        <label class="form-control">
                                                            ${schemeAmount}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Scheme Name 2</label>
                                                    <div class="col-sm-9">
                                                        <label class="form-control">
                                                            ${schemesName1}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Scheme Amount 2</label>
                                                    <div class="col-sm-9">
                                                        <label class="form-control">
                                                            ${schemeAmount1}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Scheme Name 3</label>
                                                    <div class="col-sm-9">
                                                        <label class="form-control">
                                                            ${schemesName2}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Scheme Amount 3</label>
                                                    <div class="col-sm-9">
                                                        <label class="form-control">
                                                            ${schemeAmount2}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </body>

                </html>
        `);
        }
    </script>




    <script>
        document.getElementById("downloadBtn").addEventListener("click", function () {
            // Get all the rows of the table
            var rows = document.querySelectorAll("table tr");

            // Initialize an empty CSV string
            var csv = '';

            // Loop through each row
            rows.forEach(function (row) {
                // Initialize an empty array to store data for this row
                var rowData = [];

                // Loop through each cell in the row
                row.querySelectorAll("td").forEach(function (cell, index) {
                    // Check if the cell is for mobile number, Aadhar number, or DOB
                    // If yes, format the value accordingly
                    if (index == 30 || index == 40 || index == 12) {
                        // Remove any commas in the value and enclose it in double quotes
                        rowData.push('"' + cell.textContent.trim().replace(/,/g, '') + '"');
                    } else {
                        // For other cells, push the cell's text content to the rowData array
                        rowData.push(cell.textContent.trim());
                    }
                });

                // Combine the rowData array into a single CSV line
                // and add it to the CSV string
                csv += rowData.join(',') + '\n';
            });

            // Create a Blob object containing the CSV data
            var blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });

            // Create a temporary URL for the Blob
            var url = URL.createObjectURL(blob);

            // Create a temporary <a> element to trigger the download
            var link = document.createElement("a");
            link.href = url;
            link.setAttribute("download", "non_beneficiary_villagers_data.csv");
            document.body.appendChild(link);

            // Trigger the click event on the <a> element
            link.click();

            // Clean up
            document.body.removeChild(link);
            URL.revokeObjectURL(url);
        });
    </script>




</body>

</html>