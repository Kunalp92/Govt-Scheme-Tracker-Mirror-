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



// Function to convert number to words
function numberToWords($number)
{
    $words = array(
        'zero',
        'one ',
        'two',
        'three',
        'four',
        'five',
        'six',
        'seven',
        'eight',
        'nine',
        'ten',
        'eleven',
        'twelve',
        'thirteen',
        'fourteen',
        'fifteen',
        'sixteen',
        'seventeen',
        'eighteen',
        'nineteen'
    );

    $tens = array(
        'twenty',
        'thirty',
        'forty',
        'fifty',
        'sixty',
        'seventy',
        'eighty',
        'ninety'
    );

    $thousands = array(
        '',
        'thousand',
        'million',
        'billion',
        'trillion',
        'quadrillion',
        'quintillion'
    );

    // Negative numbers should be prefixed with "negative"
    if ($number < 0) {
        return 'negative ' . numberToWords(abs($number));
    }

    // Convert numbers to words
    if ($number < 20) {
        return $words[$number];
    }

    if ($number < 100) {
        return $tens[($number / 10) - 2] . (($number % 10 != 0) ? ' ' . $words[$number % 10] : '');
    }

    // Iterate through each chunk of three digits
    $wordsArr = array();
    $chunkCount = 0;

    while ($number > 0) {
        $chunk = $number % 1000;
        if ($chunk != 0) {
            $chunkWord = '';
            if ($chunk >= 100) {
                $chunkWord .= $words[floor($chunk / 100)] . ' hundred';
                $chunk %= 100;
            }
            if ($chunk >= 20) {
                $chunkWord .= (($chunkWord != '') ? ' ' : '') . $tens[floor($chunk / 10) - 2];
                $chunk %= 10;
            }
            if ($chunk != 0) {
                $chunkWord .= (($chunkWord != '') ? ' ' : '') . $words[$chunk];
            }
            $chunkWord .= ' ' . $thousands[$chunkCount];
            $wordsArr[] = $chunkWord;
        }
        $number = floor($number / 1000);
        $chunkCount++;
    }

    return implode(' ', array_reverse($wordsArr));
}



// Query to get the total number of users
$sql = "SELECT COUNT(*) AS total_users FROM user_table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalUsers = $row['total_users'];
} else {
    $totalUsers = 0;
}



// Query to get the total number of schemes
$sqlScheme = "SELECT COUNT(*) AS total_schemes FROM govt_scheme_table";
$resultScheme = $conn->query($sqlScheme);

if ($resultScheme->num_rows > 0) {
    $rowScheme = $resultScheme->fetch_assoc();
    $totalSchemes = $rowScheme['total_schemes'];
} else {
    $totalSchemes = 0;
}



// Query to fetch data from the "user_table"
$sqlUser = "SELECT name, age, category, mobile, aadhar, village, state, country, income, religion, gender, married, work, dob, election, receivedSchemes, schemesName, schemeAmount, schemesName1, schemeAmount1, schemesName2, schemeAmount2 FROM user_table";
$resultUser = $conn->query($sqlUser);


// Query to fetch data in descending order based on the unique identifier
$sqlUser = "SELECT * FROM user_table ORDER BY id DESC";
$result = $conn->query($sqlUser);



// Query to get the count of males
$sql_male = "SELECT COUNT(*) as male_count FROM user_table WHERE gender = 'Male'";
$result_male = $conn->query($sql_male);

if ($result_male->num_rows > 0) {
    $row_male = $result_male->fetch_assoc();
    $male_count = $row_male['male_count'];
} else {
    $male_count = 0;
}

// Query to get the count of females
$sql_female = "SELECT COUNT(*) as female_count FROM user_table WHERE gender = 'Female'";
$result_female = $conn->query($sql_female);

if ($result_female->num_rows > 0) {
    $row_female = $result_female->fetch_assoc();
    $female_count = $row_female['female_count'];
} else {
    $female_count = 0;
}




// Query to get the count of users with age less than 18
$sql_under_18 = "SELECT COUNT(*) as under_18_count FROM user_table WHERE age < 18";
$result_under_18 = $conn->query($sql_under_18);

if ($result_under_18->num_rows > 0) {
    $row_under_18 = $result_under_18->fetch_assoc();
    $under_18_count = $row_under_18['under_18_count'];
} else {
    $under_18_count = 0;
}



// Query to count records with age between 18 and 60
$sqlAdults = "SELECT COUNT(*) as total_records FROM user_table WHERE age >= 18 AND age <= 60";
$resultAdults = $conn->query($sqlAdults);

if ($resultAdults->num_rows > 0) {
    // Output data of the query
    $row = $resultAdults->fetch_assoc();
    $totalRecords = $row["total_records"];
    // echo "Total Records with Age between 18 and 60: " . $totalRecords;
} else {
    $totalRecords = 0;
}



// Query to count records with age above 60
$sqlSeniorCitizen = "SELECT COUNT(*) as total_records FROM user_table WHERE age > 60";
$resultSeniorCitizen = $conn->query($sqlSeniorCitizen);

if ($resultSeniorCitizen->num_rows > 0) {
    // Output data of the query
    $row = $resultSeniorCitizen->fetch_assoc();
    $totalSeniorCitizenRecords = $row["total_records"];
    // echo "Total Records with Age above 60: " . $totalSeniorCitizenRecords;
} else {
    $totalSeniorCitizenRecords = 0;
}



// Query to calculate the total of schemeAmount, schemeAmount1, and schemeAmount2
$sql = "SELECT SUM(schemeAmount + schemeAmount1 + schemeAmount2) as total_amount FROM user_table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of the query
    $row = $result->fetch_assoc();
    $totalAmount = $row["total_amount"];
    // echo "Total Amount: " . $totalAmount;
    $totalAmountWords = numberToWords($totalAmount);
} else {
    // $totalAmount = 0;
    $totalAmount = 0;
    $totalAmountWords = '';
}



// Query to count active users
$sqlActive = "SELECT COUNT(*) as total_active_users FROM govt_scheme_table WHERE status = 'active'";
$resultActive = $conn->query($sqlActive);

if ($resultActive->num_rows > 0) {
    // Output data of the query
    $rowActive = $resultActive->fetch_assoc();
    $totalActiveUsers = $rowActive["total_active_users"];
    // echo "Total Active Users: " . $totalActiveUsers . "<br>";
} else {
    $totalActiveUsers = 0;
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
                <a class="navbar-brand brand-logo mr-5" href="dashboard.php"><img src="images/logo.svg" class="mr-2"
                        alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="dashboard.php"><img src="images/logo-mini.svg"
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
                        <a class="nav-link" href="dashboard.php">
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
                                <li class="nav-item"> <a class="nav-link" href="#">Schemes</a></li>
                                <li class="nav-item"> <a class="nav-link" href="#">Active/Inactive</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                            aria-controls="form-elements">
                            <i class="icon-columns menu-icon"></i>
                            <span class="menu-title">Villagers</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="form-elements">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"><a class="nav-link" href="allVillagers.php">Total Villagers</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="allVillagers-future.php">Future
                                        Beneficiary</a></li>
                                <li class="nav-item"><a class="nav-link" href="allVillagers-add-new.php">Add
                                        Villagers</a></li>
                                <li class="nav-item"><a class="nav-link" href="allVillagers-edit.php">Edit Villagers
                                        Info</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false"
                            aria-controls="charts">
                            <i class="icon-bar-graph menu-icon"></i>
                            <span class="menu-title">Voters</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="charts">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="#">Total Voters</a></li>
                                <li class="nav-item"> <a class="nav-link" href="#">New Voters</a></li>
                            </ul>
                        </div>
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
                                        <?php echo $_SESSION['username']; ?>-division
                                    </h6>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card tale-bg">
                                <div class="card-people mt-auto">
                                    <img src="images/dashboard/people.svg" alt="people">
                                    <div class="weather-info">
                                        <div class="d-flex">
                                            <div>
                                                <h2 class="mb-0 font-weight-normal">
                                                    <div id="txt"></div>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 grid-margin transparent">
                            <div class="row">
                                <div class="col-md-6 mb-4 stretch-card transparent">
                                    <div class="card card-tale">
                                        <div class="card-body">

                                            <a class="no-hover" href="allVillagers.php">

                                                <p class="mb-4">Total Population Villagers</p>
                                                <p class="fs-30 mb-2">
                                                    <?php echo $totalUsers; ?>
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

                                                <p class="mb-4">Active Scheme</p>
                                                <p class="fs-30 mb-2">
                                                    <?php echo $totalActiveUsers; ?>
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

                                            <!-- <a class="no-hover" href="#"> -->

                                            <p class="mb-4">Total Issue Funds</p>
                                            <p class="fs-30 ">&#8377;
                                                <?php echo number_format($totalAmount, 2); ?>
                                            </p>
                                            <p>
                                                <?php echo $totalAmountWords; ?>
                                            </p>

                                            <!-- </a> -->

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 stretch-card transparent">
                                    <div class="card card-light-danger">
                                        <div class="card-body">

                                            <a class="no-hover" href="#"></a>

                                            <p class="mb-4">New Voters</p>
                                            <p class="fs-30 mb-2">1</p>
                                            <!-- <p>0.22% (30 days)</p> -->

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
                                        <p class="card-title">Male/Femal Data</p>
                                        <a href="#" class="text-info">View all</a>
                                    </div>

                                    <div class="d-flex flex-wrap mb-5">
                                        <div class="mr-5 mt-3">
                                            <p class="text-muted">Female</p>
                                            <div style="background-color: #248AFD; width: 15px; height: 15px;"
                                                class="text-primary fs-30 font-weight-medium">
                                            </div>
                                        </div>
                                        <div class="mr-5 mt-3">
                                            <p class="text-muted">Male</p>
                                            <div style="background-color: #4B49AC; width: 15px; height: 15px;"
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
                                        <p class="card-title">Age Group Data</p>
                                        <a href="#" class="text-info">View all</a>
                                    </div>

                                    <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                                    <canvas id="sales-chart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title">Villagers</p>

                                    <form id="searchForm" class="search-bar ps-3" method="post">

                                        <input type="text" class="form-control" id="search" name="search"
                                            pattern="\d{12}" placeholder="Search Aadhar Number" required>

                                        <br>


                                        <button type="submit" class="btn btn-outline-primary btn-fw">Search</button>
                                        <button type="button" class="btn btn-outline-secondary btn-fw"
                                            onclick="clearSearch()">Show
                                            All</button>
                                        <button type="button" class="btn btn-outline-success btn-fw"
                                            id="downloadBtn">Download Data</button>

                                    </form>

                                    <br>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <div class="table-responsive" style="height: 500px; overflow: auto;">
                                                    <table id="example" class="display expandable-table"
                                                        style="width:100%">
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
                                                                <th>Religion</th>
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
                                                                <th></th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php



                                                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                                $search = $_POST["search"];
                                                                $sqlUser = "SELECT * FROM user_table WHERE aadhar LIKE '%$search%'";
                                                                $resultUser = $conn->query($sqlUser);
                                                            }


                                                            if ($resultUser === false) {
                                                                echo "Error: " . $sql . "<br>" . $conn->error;
                                                            } elseif ($resultUser->num_rows > 0) {
                                                                // Output data of each row
                                                                while ($row = $resultUser->fetch_assoc()) {
                                                                    echo "<tr>";

                                                                    echo '<td>' . $row['name'] . '</td>';
                                                                    echo '<td>' . $row['age'] . '</td>';
                                                                    echo '<td>' . $row['category'] . '</td>';
                                                                    echo '<td>' . $row['mobile'] . '</td>';
                                                                    echo '<td>' . $row['aadhar'] . '</td>';
                                                                    echo '<td>' . $row['village'] . '</td>';
                                                                    echo '<td>' . $row['state'] . '</td>';
                                                                    echo '<td>' . $row['country'] . '</td>';
                                                                    echo '<td>' . $row['income'] . '</td>';
                                                                    echo '<td>' . $row['religion'] . '</td>';
                                                                    echo '<td>' . $row['gender'] . '</td>';
                                                                    echo '<td>' . $row['married'] . '</td>';
                                                                    echo '<td>' . $row['work'] . '</td>';
                                                                    echo '<td>' . $row['dob'] . '</td>';
                                                                    echo '<td>' . $row['election'] . '</td>';
                                                                    echo '<td>' . $row['receivedSchemes'] . '</td>';
                                                                    echo '<td>' . $row['schemesName'] . '</td>';
                                                                    echo '<td>' . $row['schemeAmount'] . '</td>';
                                                                    echo '<td>' . $row['schemesName1'] . '</td>';
                                                                    echo '<td>' . $row['schemeAmount1'] . '</td>';
                                                                    echo '<td>' . $row['schemesName2'] . '</td>';
                                                                    echo '<td>' . $row['schemeAmount2'] . '</td>';

                                                                    echo "</tr>";



                                                                }
                                                            } else {
                                                                echo "0 results";
                                                            }
                                                            $conn->close();
                                                            ?>
                                                        </tbody>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

    <script>

        (function ($) {
            'use strict';
            $(function () {

                if ($("#sales-chart").length) {
                    var SalesChartCanvas = $("#sales-chart").get(0).getContext("2d");
                    var SalesChart = new Chart(SalesChartCanvas, {
                        type: 'bar',
                        data: {
                            labels: ["Children", "Adults", "Senior Citizen"],
                            datasets: [
                                {
                                    data: [<?php echo $under_18_count; ?>, <?php echo $totalRecords; ?>, <?php echo $totalSeniorCitizenRecords; ?>],
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
                                        max: 560,
                                        autoSkip: true,
                                        maxTicksLimit: 10,
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
                            labels: ["Children", "Adults", "Senior Citizen"],
                            datasets: [
                                {
                                    data: [<?php echo $under_18_count; ?>, <?php echo $totalRecords; ?>, <?php echo $totalSeniorCitizenRecords; ?>],
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
                                        max: 500,
                                        callback: function (value, index, values) {
                                            return value + '$';
                                        },
                                        autoSkip: true,
                                        maxTicksLimit: 10,
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
                        labels: ["Male", "Female"],
                        datasets: [{
                            data: [<?php echo $male_count; ?>, <?php echo $female_count; ?>],
                            backgroundColor: [
                                "#4B49AC", "#248AFD",
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
                        labels: ["Male", "Female"],
                        datasets: [{
                            data: [<?php echo $male_count; ?>, <?php echo $female_count; ?>],
                            backgroundColor: [
                                "#4B49AC", "#248AFD",
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




    <script>
        // Function to clear search query and submit form
        function clearSearch() {
            document.getElementById("search").value = ""; // Clear search input
            localStorage.removeItem("searchValue"); // Remove search value from local storage
            document.getElementById("searchForm").submit(); // Submit form
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
            link.setAttribute("download", "total_villagers_data.csv");
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