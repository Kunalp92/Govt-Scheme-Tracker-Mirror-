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













// Query to count active users
$sqlActive = "SELECT COUNT(*) as total_active_users FROM govt_scheme_table WHERE status = 'Active'";
$resultActive = $conn->query($sqlActive);

if ($resultActive->num_rows > 0) {
    // Output data of the query
    $rowActive = $resultActive->fetch_assoc();
    $totalActiveUsers = $rowActive["total_active_users"];
    // echo "Total Active Users: " . $totalActiveUsers . "<br>";
} else {
    $totalActiveUsers = 0;
}


// Query to count active users
$sqlInactive = "SELECT COUNT(*) as total_inactive_users FROM govt_scheme_table WHERE status = 'Inactive'";
$resultInactive = $conn->query($sqlInactive);

if ($resultInactive->num_rows > 0) {
    // Output data of the query
    $rowInactive = $resultInactive->fetch_assoc();
    $totalInactiveUsers = $rowInactive["total_inactive_users"];
    // echo "Total Active Users: " . $totalActiveUsers . "<br>";
} else {
    $totalInactiveUsers = 0;
}









// Query to get the total number of users
$sql = "SELECT COUNT(*) AS total_users FROM nagpur_user_table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalUsers = $row['total_users'];
} else {
    $totalUsers = 0;
}



// Query to get the total number of users
$sql = "SELECT COUNT(*) AS total_users FROM gondia_user_table";
$result1 = $conn->query($sql);

if ($result1->num_rows > 0) {
    $row1 = $result1->fetch_assoc();
    $totalUsers1 = $row1['total_users'];
} else {
    $totalUsers1 = 0;
}







// Query to calculate the total of schemeAmount, schemeAmount1, and schemeAmount2
$sql = "SELECT SUM(schemeAmount + schemeAmount1 + schemeAmount2) as total_amount FROM nagpur_user_table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of the query
    $row = $result->fetch_assoc();
    $total_Nagpur_Amount = $row["total_amount"];

} else {
    // $totalAmount = 0;
    $total_Nagpur_Amount = 0;
}




// Query to calculate the total of schemeAmount, schemeAmount1, and schemeAmount2
$sql = "SELECT SUM(schemeAmount + schemeAmount1 + schemeAmount2) as total_amount FROM gondia_user_table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of the query
    $row = $result->fetch_assoc();
    $total_Gondia_Amount = $row["total_amount"];

} else {
    // $totalAmount = 0;
    $total_Gondia_Amount = 0;
}






// SQL query to get the total number of active users
$sql = "
    SELECT COUNT(*) AS total_active_users
    FROM (
        SELECT status FROM gondia_scheme_table
        UNION ALL
        SELECT status FROM govt_scheme_table
    ) AS combined_tables
    WHERE status = 'Active'
";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if query execution was successful
if ($result) {
    // Fetch the result as an associative array
    $row = mysqli_fetch_assoc($result);

    // Output the total count of active users
    $total_number = $row['total_active_users'];
} else {
    // If query execution failed, display an error
    $total_number = 0;
}


// SQL query to get the total number of Inactive users
$sql = "
    SELECT COUNT(*) AS total_active_users
    FROM (
        SELECT status FROM gondia_scheme_table
        UNION ALL
        SELECT status FROM govt_scheme_table
    ) AS combined_tables
    WHERE status = 'Inactive'
";

// Execute the query
$result1 = mysqli_query($conn, $sql);

// Check if query execution was successful
if ($result1) {
    // Fetch the result as an associative array
    $row1 = mysqli_fetch_assoc($result1);

    // Output the total count of active users
    $total_number1 = $row1['total_active_users'];
} else {
    // If query execution failed, display an error
    $total_number1 = 0;
}




// SQL query to get the total number of Non Benificiery users
$sql = "
    SELECT COUNT(*) AS total_active_users
    FROM (
        SELECT receivedSchemes FROM gondia_user_table
        UNION ALL
        SELECT receivedSchemes FROM nagpur_user_table
    ) AS combined_tables
    WHERE receivedSchemes = '0'
";

// Execute the query
$result2 = mysqli_query($conn, $sql);

// Check if query execution was successful
if ($result2) {
    // Fetch the result as an associative array
    $row2 = mysqli_fetch_assoc($result2);

    // Output the total count of active users
    $total_NB_number1 = $row2['total_active_users'];
} else {
    // If query execution failed, display an error
    $total_NB_number1 = 0;
}




// SQL query to get the total number of Benificiery users
$sql = "
    SELECT COUNT(*) AS total_active_users
    FROM (
        SELECT receivedSchemes FROM gondia_user_table
        UNION ALL
        SELECT receivedSchemes FROM nagpur_user_table
    ) AS combined_tables
    WHERE receivedSchemes != '0'
";

// Execute the query
$result3 = mysqli_query($conn, $sql);

// Check if query execution was successful
if ($result3) {
    // Fetch the result as an associative array
    $row3 = mysqli_fetch_assoc($result3);

    // Output the total count of active users
    $total_B_number1 = $row3['total_active_users'];
} else {
    // If query execution failed, display an error
    $total_B_number1 = 0;
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
    <!-- <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css"> -->
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
                <a class="navbar-brand brand-logo mr-5" href="ATCNagpur-district.php"><img src="images/logo.svg"
                        class="mr-2" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="ATCNagpur-district.php"><img src="images/logo-mini.svg"
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
                        <a class="nav-link" href="ATCNagpur-district.php">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                            aria-controls="form-elements">
                            <i class="icon-columns menu-icon"></i>
                            <span class="menu-title">District</span>
                            <i class="menu-arrow"></i>
                        </a>



                        <div class="collapse" id="form-elements">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="Nagpur-district.php">Nagpur</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="#">Chandrapur</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Gondia</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Gadchiroli</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">Bhandara</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
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
                        <div class="col-md-12 grid-margin">
                            <div class="row">
                                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                    <h3 class="font-weight-bold">Welcome</h3>
                                    <h6 class="font-weight-normal mb-0">
                                        <?php echo $_SESSION['username']; ?>
                                    </h6>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <p class="card-title">Discrict Active & Complited Schemes</p>
                                    </div>
                                    <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                                    <canvas id="sales-chart"></canvas>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6 grid-margin transparent">
                            <div class="row">
                                <div class="col-md-6 mb-4 stretch-card transparent">
                                    <div class="card card-tale">
                                        <div class="card-body">

                                            <a class="no-hover" href="#">

                                                <p class="mb-4">Total Active Schemes</p>
                                                <p class="fs-30 mb-2">
                                                    <?php echo $total_number; ?>
                                                </p>
                                                <!-- <p>10.00% (30 days)</p> -->

                                            </a>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4 stretch-card transparent">
                                    <div class="card card-dark-blue">
                                        <div class="card-body">

                                            <a class="no-hover" href="#">

                                                <p class="mb-4">Total Completed Schemes</p>
                                                <p class="fs-30 mb-2">
                                                    <?php echo $total_number1; ?>
                                                </p>
                                                <!-- <p>sousand</p> -->

                                            </a>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                                    <div class="card card-light-blue">
                                        <div class="card-body">

                                            <a class="no-hover" href="#">

                                                <p class="mb-4">Total Non-Beneficiary Villagers</p>
                                                <p class="fs-30 ">
                                                    <?php echo $total_NB_number1; ?>
                                                </p>

                                            </a>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 stretch-card transparent">
                                    <div class="card card-light-danger">
                                        <div class="card-body">

                                            <a class="no-hover" href="Nagpur-Funds.php"></a>

                                            <p class="mb-4">Total Beneficiary Villagers</p>
                                            <p class="fs-30 ">
                                                <?php echo $total_B_number1; ?>
                                            </p>

                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <p class="card-title">District Villagers</p>
                                        <!-- <a href="Nagpur-Active-Complete.php" class="text-info">View all</a> -->
                                    </div>

                                    <div class="d-flex flex-wrap mb-5">
                                        <div class="mr-5 mt-3">
                                            <p class="text-muted">Nagpur</p>
                                            <div style="background-color: #4B49AC; width: 15px; height: 15px;"
                                                class="text-primary fs-30 font-weight-medium">
                                            </div>
                                        </div>
                                        <div class="mr-5 mt-3">
                                            <p class="text-muted">Wardha</p>
                                            <div style="background-color: #248AFD; width: 15px; height: 15px;"
                                                class="text-primary fs-30 font-weight-medium">
                                            </div>
                                        </div>

                                        <div class="mr-5 mt-3">
                                            <p class="text-muted">Chandrapur</p>
                                            <div style="background-color: #CCD1D1; width: 15px; height: 15px;"
                                                class="text-primary fs-30 font-weight-medium">
                                            </div>
                                        </div>
                                        <div class="mr-5 mt-3">
                                            <p class="text-muted">Gondia</p>
                                            <div style="background-color: #ABEBC6; width: 15px; height: 15px;"
                                                class="text-primary fs-30 font-weight-medium">
                                            </div>
                                        </div>
                                        <div class="mr-5 mt-3">
                                            <p class="text-muted">Gadchiroli</p>
                                            <div style="background-color: #F0B27A; width: 15px; height: 15px;"
                                                class="text-primary fs-30 font-weight-medium">
                                            </div>
                                        </div>
                                        <div class="mr-5 mt-3">
                                            <p class="text-muted">Bhandara</p>
                                            <div style="background-color: #2C3E50; width: 15px; height: 15px;"
                                                class="text-primary fs-30 font-weight-medium">
                                            </div>
                                        </div>

                                    </div>
                                    <canvas id="south-america-chart"></canvas>
                                </div>
                            </div>
                        </div>





                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <p class="card-title">Received Funds & Distributed Funds</p>
                                        <a href="Nagpur-Funds.php" class="text-info">View all</a>
                                    </div>

                                    <div class="d-flex flex-wrap mb-5">
                                        <div class="mr-5 mt-3">
                                            <p class="text-muted">Received Funds</p>
                                            <div style="background-color: #4747A1; width: 15px; height: 15px;"
                                                class="text-primary fs-30 font-weight-medium">
                                            </div>
                                        </div>
                                        <div class="mr-5 mt-3">
                                            <p class="text-muted">Distributed Funds</p>
                                            <div style="background-color: #F09397; width: 15px; height: 15px;"
                                                class="text-primary fs-30 font-weight-medium">
                                            </div>
                                        </div>

                                    </div>

                                    <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                                    <canvas id="order-chart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">

                                    <div class="d-flex justify-content-between">
                                        <p class="card-title">District Distributed Funds</p>
                                        <!-- <a href="Nagpur-allVillagers.php" class="text-info">View all</a> -->
                                    </div>
                                    <!-- <canvas id="" style="width:100%;max-width:600px"></canvas> -->
                                    <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>. <a href="https://www.bootstrapdash.com/" target="_blank">9Teen
                                Initiative</a>.
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
    <script src="vendors/chart.js/Chart.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- <script src="js/dashboard.js"></script> -->
    <!-- End custom js for this page-->


    <script>
        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('txt').innerHTML =
                h + ":" + m + ":" + s;
            var t = setTimeout(startTime, 500);
        }
        function checkTime(i) {
            if (i < 10) { i = "0" + i };  // add zero in front of numbers < 10
            return i;
        }
    </script>




    <!-- ************ Chart ****************** -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <script>
        const xValues = ["Nagpur", "Gondia", "Wardha", "Gadchiroli", "Chandrapur", "Bhandara"];
        const yValues = [<?php echo $total_Nagpur_Amount; ?>, <?php echo $total_Gondia_Amount; ?>, 4222554, 2785554, 811552, 5555522];
        const barColors = ["red", "green", "blue", "orange", "brown", "black"];

        const chart = new Chart("myChart", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                legend: { display: false },
                onClick: function (event, elements) {
                    if (elements.length > 0) {
                        const index = elements[0]._index;
                        const country = xValues[index];
                        // Redirect to the corresponding PHP page based on the clicked bar
                        window.location.href = country + "-district.php";
                    }
                }
            }
        });
    </script>










    <script>

        (function ($) {
            'use strict';
            $(function () {




                if ($("#order-chart").length) {
                    var areaData = {
                        labels: ["", "2020", "2021", "2022", "2023", "2024"],
                        datasets: [
                            {
                                data: [0, 2050000, 2500000, 5107000, 6152000, 10245000],
                                borderColor: [
                                    '#4747A1'
                                ],
                                borderWidth: 2,
                                fill: false,
                                label: "Receive Found"
                            },
                            {
                                data: [0, 1500000, 200000, 5000000, 1250000, 6085000],
                                borderColor: [
                                    '#F09397'
                                ],
                                borderWidth: 2,
                                fill: false,
                                label: "Distributed Found"
                            }
                        ]
                    };
                    var areaOptions = {
                        responsive: true,
                        maintainAspectRatio: true,
                        plugins: {
                            filler: {
                                propagate: false
                            }
                        },
                        scales: {
                            xAxes: [{
                                display: true,
                                ticks: {
                                    display: true,
                                    padding: 10,
                                    fontColor: "#6C7383"
                                },
                                gridLines: {
                                    display: false,
                                    drawBorder: false,
                                    color: 'transparent',
                                    zeroLineColor: '#eeeeee'
                                }
                            }],
                            yAxes: [{
                                display: true,
                                ticks: {
                                    display: true,
                                    autoSkip: false,
                                    maxRotation: 0,
                                    stepSize: 10,
                                    min: 1,
                                    max: 100,
                                    padding: 18,
                                    fontColor: "#6C7383"
                                },

                                ticks: {
                                    callback: function (value, index, values) {
                                        return value + ' Lakh';
                                    },
                                },
                                gridLines: {
                                    display: true,
                                    color: "#f2f2f2",
                                    drawBorder: false
                                }
                            }]
                        },
                        legend: {
                            display: false
                        },
                        tooltips: {
                            enabled: true
                        },
                        elements: {
                            line: {
                                tension: .35
                            },
                            point: {
                                radius: 0
                            }
                        }
                    }
                    var revenueChartCanvas = $("#order-chart").get(0).getContext("2d");
                    var revenueChart = new Chart(revenueChartCanvas, {
                        type: 'line',
                        data: areaData,
                        options: areaOptions
                    });
                }
                if ($("#order-chart-dark").length) {
                    var areaData = {
                        labels: ["", "2020", "2021", "2022", "2023", "2024"],
                        datasets: [
                            {
                                data: [0, 2050000, 2500000, 5107000, 6152000, 10245000],
                                borderColor: [
                                    '#4747A1'
                                ],
                                borderWidth: 2,
                                fill: false,
                                label: "Received Found"
                            },
                            {
                                data: [0, 1500000, 200000, 5000000, 1250000, 6085000],
                                borderColor: [
                                    '#F09397'
                                ],
                                borderWidth: 2,
                                fill: false,
                                label: "Distributed Found"
                            }
                        ]
                    };
                    var areaOptions = {
                        responsive: true,
                        maintainAspectRatio: true,
                        plugins: {
                            filler: {
                                propagate: false
                            }
                        },
                        scales: {
                            xAxes: [{
                                display: true,
                                ticks: {
                                    display: true,
                                    padding: 10,
                                    fontColor: "#fff"
                                },
                                gridLines: {
                                    display: false,
                                    drawBorder: false,
                                    color: 'transparent',
                                    zeroLineColor: '#575757'
                                }
                            }],
                            yAxes: [{
                                display: true,
                                ticks: {
                                    display: true,
                                    autoSkip: false,
                                    maxRotation: 0,
                                    stepSize: 10,
                                    min: 1,
                                    max: 100,
                                    padding: 18,
                                    fontColor: "#fff"
                                },
                                ticks: {
                                    callback: function (value, index, values) {
                                        return value + ' Lakh';
                                    },
                                },
                                gridLines: {
                                    display: true,
                                    color: "#575757",
                                    drawBorder: false
                                }
                            }]
                        },
                        legend: {
                            display: false
                        },
                        tooltips: {
                            enabled: true
                        },
                        elements: {
                            line: {
                                tension: .35
                            },
                            point: {
                                radius: 0
                            }
                        }
                    }
                    var revenueChartCanvas = $("#order-chart-dark").get(0).getContext("2d");
                    var revenueChart = new Chart(revenueChartCanvas, {
                        type: 'line',
                        data: areaData,
                        options: areaOptions
                    });
                }








                if ($("#sales-chart").length) {
                    var SalesChartCanvas = $("#sales-chart").get(0).getContext("2d");
                    var SalesChart = new Chart(SalesChartCanvas, {
                        type: 'bar',
                        data: {
                            labels: ["Nagpur", "Gondia", "Wardha", "Gadchiroli", "Chandrapur", "Bhandara"],
                            datasets: [{
                                label: 'Completed Schemes',
                                data: [<?php echo $totalInactiveUsers; ?>, 2, 10, 8, 3, 5],
                                backgroundColor: '#98BDFF'
                            },
                            {
                                label: 'Active Schemes',
                                data: [<?php echo $totalActiveUsers; ?>, 3, 5, 5, 9, 10],
                                backgroundColor: '#4B49AC'
                            }
                            ]
                        },
                        options: {
                            cornerRadius: 5,
                            responsive: true,
                            maintainAspectRatio: true,
                            layout: {
                                padding: {
                                    left: 0,
                                    right: 0,
                                    top: 20,
                                    bottom: 0
                                }
                            },
                            scales: {
                                yAxes: [{
                                    display: true,
                                    gridLines: {
                                        display: true,
                                        drawBorder: false,
                                        color: "#F2F2F2"
                                    },
                                    ticks: {
                                        display: true,
                                        min: 0,
                                        max: 20,
                                        callback: function (value, index, values) {
                                            return value + '';
                                        },
                                        autoSkip: true,
                                        maxTicksLimit: 5,
                                        fontColor: "#6C7383"
                                    }
                                }],
                                xAxes: [{
                                    stacked: false,
                                    ticks: {
                                        beginAtZero: true,
                                        fontColor: "#6C7383"
                                    },
                                    gridLines: {
                                        color: "rgba(0, 0, 0, 0)",
                                        display: false
                                    },
                                    barPercentage: 1
                                }]
                            },
                            legend: {
                                display: false
                            },
                            elements: {
                                point: {
                                    radius: 0
                                }
                            }
                        },
                    });
                    document.getElementById('sales-legend').innerHTML = SalesChart.generateLegend();
                }
                if ($("#sales-chart-dark").length) {
                    var SalesChartCanvas = $("#sales-chart-dark").get(0).getContext("2d");
                    var SalesChart = new Chart(SalesChartCanvas, {
                        type: 'bar',
                        data: {
                            labels: ["Nagpur", "Gondia", "Wardha", "Gadchiroli", "Chandrapur", "Bhandara"],
                            datasets: [{
                                label: 'Completed Schemes',
                                data: [<?php echo $totalInactiveUsers; ?>, 230, 470, 210, 330, 522],
                                backgroundColor: '#98BDFF'
                            },
                            {
                                label: 'Active Schemes',
                                data: [400, 340, 550, 480, 170, 100],
                                backgroundColor: '#4B49AC'
                            }
                            ]
                        },
                        options: {
                            cornerRadius: 5,
                            responsive: true,
                            maintainAspectRatio: true,
                            layout: {
                                padding: {
                                    left: 0,
                                    right: 0,
                                    top: 20,
                                    bottom: 0
                                }
                            },
                            scales: {
                                yAxes: [{
                                    display: true,
                                    gridLines: {
                                        display: true,
                                        drawBorder: false,
                                        color: "#575757"
                                    },
                                    ticks: {
                                        display: true,
                                        min: 0,
                                        max: 20,
                                        callback: function (value, index, values) {
                                            return value + '';
                                        },
                                        autoSkip: true,
                                        maxTicksLimit: 5,
                                        fontColor: "#F0F0F0"
                                    }
                                }],
                                xAxes: [{
                                    stacked: false,
                                    ticks: {
                                        beginAtZero: true,
                                        fontColor: "#F0F0F0"
                                    },
                                    gridLines: {
                                        color: "#575757",
                                        display: false
                                    },
                                    barPercentage: 1
                                }]
                            },
                            legend: {
                                display: false
                            },
                            elements: {
                                point: {
                                    radius: 0
                                }
                            }
                        },
                    });
                    document.getElementById('sales-legend').innerHTML = SalesChart.generateLegend();
                }














                if ($("#south-america-chart").length) {
                    var areaData = {
                        labels: ["Nagpur", "Wardha", "Chandrapur", "Gondia", "Gadchiroli", "Bhandara"],
                        datasets: [{
                            data: [<?php echo $totalUsers; ?>, 20, 58, <?php echo $totalUsers1; ?>, 55, 88],
                            backgroundColor: [
                                "#4B49AC", "#248AFD", "#CCD1D1", "#ABEBC6", "#F0B27A", "#2C3E50",
                            ],
                            borderColor: "rgba(0,0,0,0)"
                        }
                        ]
                    };
                    var areaOptions = {
                        responsive: true,
                        maintainAspectRatio: true,
                        segmentShowStroke: false,
                        cutoutPercentage: 78,
                        elements: {
                            arc: {
                                borderWidth: 4
                            }
                        },
                        legend: {
                            display: false
                        },
                        tooltips: {
                            enabled: true
                        },

                    }
                    var southAmericaChartPlugins = {
                        beforeDraw: function (chart) {
                            var width = chart.chart.width,
                                height = chart.chart.height,
                                ctx = chart.chart.ctx;

                            ctx.restore();
                            var fontSize = 3.125;
                            ctx.font = "600 " + fontSize + "em sans-serif";
                            ctx.textBaseline = "middle";
                            ctx.fillStyle = "#000";

                            var text = "",
                                textX = Math.round((width - ctx.measureText(text).width) / 2),
                                textY = height / 2;

                            ctx.fillText(text, textX, textY);
                            ctx.save();
                        }
                    }
                    var southAmericaChartCanvas = $("#south-america-chart").get(0).getContext("2d");
                    var southAmericaChart = new Chart(southAmericaChartCanvas, {
                        type: 'doughnut',
                        data: areaData,
                        options: areaOptions,
                        plugins: southAmericaChartPlugins
                    });
                    document.getElementById('south-america-legend').innerHTML = southAmericaChart.generateLegend();
                }
                if ($("#south-america-chart-dark").length) {
                    var areaData = {
                        labels: ["Nagpur", "Wardha", "Chandrapur", "Gondia", "Gadchiroli", "Bhandara"],
                        datasets: [{
                            data: [<?php echo $totalUsers; ?>, 20, 58, <?php echo $totalUsers1; ?>, 55, 88],
                            backgroundColor: [
                                "#4B49AC", "#248AFD", "#CCD1D1", "#ABEBC6", "#F0B27A", "#2C3E50",
                            ],
                            borderColor: "rgba(0,0,0,0)"
                        }
                        ]
                    };
                    var areaOptions = {
                        responsive: true,
                        maintainAspectRatio: true,
                        segmentShowStroke: false,
                        cutoutPercentage: 78,
                        elements: {
                            arc: {
                                borderWidth: 4
                            }
                        },
                        legend: {
                            display: false
                        },
                        tooltips: {
                            enabled: true
                        },
                    }
                    var southAmericaChartPlugins = {
                        beforeDraw: function (chart) {
                            var width = chart.chart.width,
                                height = chart.chart.height,
                                ctx = chart.chart.ctx;

                            ctx.restore();
                            var fontSize = 3.125;
                            ctx.font = "600 " + fontSize + "em sans-serif";
                            ctx.textBaseline = "middle";
                            ctx.fillStyle = "#fff";

                            var text = "76",
                                textX = Math.round((width - ctx.measureText(text).width) / 2),
                                textY = height / 2;

                            ctx.fillText(text, textX, textY);
                            ctx.save();
                        }
                    }
                    var southAmericaChartCanvas = $("#south-america-chart-dark").get(0).getContext("2d");
                    var southAmericaChart = new Chart(southAmericaChartCanvas, {
                        type: 'doughnut',
                        data: areaData,
                        options: areaOptions,
                        plugins: southAmericaChartPlugins
                    });
                    document.getElementById('south-america-legend').innerHTML = southAmericaChart.generateLegend();
                }



            });
        })(jQuery);

    </script>



    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>



</body>

</html>