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
        'Zero',
        'One ',
        'Two',
        'Three',
        'Four',
        'Five',
        'Six',
        'Seven',
        'Eight',
        'Nine',
        'Ten',
        'Eleven',
        'Twelve',
        'Thirteen',
        'Fourteen',
        'Fifteen',
        'Sixteen',
        'Seventeen',
        'Eighteen',
        'Nineteen'
    );

    $tens = array(
        'Twenty',
        'Thirty',
        'Forty',
        'Fifty',
        'Sixty',
        'Seventy',
        'Eighty',
        'Ninety'
    );

    $thousands = array(
        '',
        'Thousand',
        'Million',
        'Billion',
        'Trillion',
        'Quadrillion',
        'Quintillion'
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




// SQL query to count unique names in the village column
$sql_unique_names = "SELECT COUNT(DISTINCT village) AS total_unique_names FROM nagpur_user_table";
$result_unique_names = $conn->query($sql_unique_names);

if ($result_unique_names->num_rows > 0) {

    $row_unique_names = $result_unique_names->fetch_assoc();
    $total_unique_names = $row_unique_names['total_unique_names'];
} else {
    $total_unique_names = 0;
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
$sqlUser = "SELECT * FROM nagpur_user_table";
$resultUser = $conn->query($sqlUser);

// Query to fetch data in descending order based on the unique identifier
$sqlUser = "SELECT * FROM nagpur_user_table ORDER BY id DESC";
$result = $conn->query($sqlUser);







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




// Query to calculate the total of schemeAmount, schemeAmount1, and schemeAmount2
$sql = "SELECT SUM(fund) as total_amount FROM govt_scheme_table";
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
                        <div class="col-md-6 grid-margin transparent">
                            <div class="row">
                                <div class="col-md-6 mb-4 stretch-card transparent">
                                    <div class="card card-light-blue">
                                        <div class="card-body">

                                            <a class="no-hover" href="Nagpur-allVillagers.php">

                                                <p class="mb-4">Total Villages</p>
                                                <p class="fs-30 mb-2">
                                                    <?php echo $total_unique_names; ?>
                                                </p>
                                                <!-- <p>10.00% (30 days)</p> -->

                                            </a>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4 stretch-card transparent">
                                    <div class="card card-dark-blue">
                                        <div class="card-body">

                                            <a class="no-hover" href="Nagpur-Schemes.php">

                                                <p class="mb-4">Active Schemes</p>
                                                <p class="fs-30 mb-2">
                                                    <?php echo $totalActiveUsers; ?>
                                                </p>
                                                <!-- <p>sousand</p> -->

                                            </a>

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

                                            <a class="no-hover" href="Nagpur-Funds.php">

                                                <p class="mb-4">Total Received Funds</p>
                                                <p class="fs-30 ">&#8377;
                                                    <?php echo number_format($totalAmount); ?>
                                                </p>

                                            </a>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4 stretch-card transparent">
                                    <div class="card card-light-danger">
                                        <div class="card-body">

                                            <a class="no-hover" href="NagpurVillagers-add-new.php">

                                                <p class="mb-4">Add New Villagers</p>
                                                <p class="fs-30 mb-2">+
                                                </p>
                                                <!-- <p>sousand</p> -->

                                            </a>

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>





                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title">Add Villagers Details Form</p>

                                    <form id="schemeForm" method="post" action="NagpurVillagers-add-new-form.php">

                                        <div class="form-group">
                                            <label class="form-label">Full Name:</label>
                                            <input class="form-control" type="text" id="name" name="name"
                                                placeholder="Enter name" required />
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Category:</label>
                                            <input class="form-control" type="text" id="category" name="category"
                                                placeholder="Enter Category" required />
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Age:</label>
                                            <input class="form-control" type="number" id="age" name="age"
                                                placeholder="Enter Age" required />
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Mobile Number:</label>
                                            <input class="form-control" type="tel" id="mobile" name="mobile"
                                                placeholder="Enter mobile No." required />
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Aadhar Number:</label>
                                            <input class="form-control" type="number" id="aadhar" name="aadhar"
                                                placeholder="Enter aadhar no." required />
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Village</label>
                                            <input class="form-control" type="text" id="village" name="village"
                                                placeholder="Enter villege name" required />
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">State:</label>
                                            <input class="form-control" type="text" id="state" name="state"
                                                placeholder="Enter State name" required />
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Country:</label>
                                            <input class="form-control" type="text" id="country" name="country"
                                                placeholder="Enter country name" required />
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Income:</label>
                                            <input class="form-control" type="number" id="income" name="income"
                                                placeholder="Enter Income" required />
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleSelectGender">Gender</label>
                                            <select class="form-control" id="gender" name="gender" required>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleSelectGender">Married Status:</label>
                                            <select class="form-control" id="married" name="married" required>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Widowed">Widowed</option>
                                                <option value="Divorced">Divorced</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleSelectGender">Occupation:</label>
                                            <select class="form-control" id="work" name="work" required>
                                                <option value="Worker">Worker</option>
                                                <option value="Farmer">Farmer</option>
                                                <option value="Job">Job</option>
                                                <option value="House Wife">House Wife</option>
                                                <option value="Businessman">Businessman</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Date of Birth:</label>
                                            <input class="form-control" type="date" id="dob" name="dob"
                                                placeholder="Enter DOB" required />
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Election Card No.:</label>
                                            <input class="form-control" type="number" id="election" name="election"
                                                placeholder="Election Card No." />
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Total Scheme Received:</label>
                                            <select class="form-control" id="receivedSchemes" name="receivedSchemes"
                                                required>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Scheme Name 1:</label>
                                            <input class="form-control" type="text" id="schemesName" name="schemesName"
                                                placeholder="Enter Scheme Name" />
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Scheme Amount 1:</label>
                                            <input class="form-control" type="number" id="schemeAmount"
                                                name="schemeAmount" placeholder="Enter Scheme Amount" />
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Scheme Name 2:</label>
                                            <input class="form-control" type="text" id="schemesName1"
                                                name="schemesName1" placeholder="Enter Scheme Name" />
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Scheme Amount 2:</label>
                                            <input class="form-control" type="number" id="schemeAmount1"
                                                name="schemeAmount1" placeholder="Enter Scheme Amount" />
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Scheme Name 3:</label>
                                            <input class="form-control" type="text" id="schemesName2"
                                                name="schemesName2" placeholder="Enter Scheme Name" />
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Scheme Amount 3:</label>
                                            <input class="form-control" type="number" id="schemeAmount2"
                                                name="schemeAmount2" placeholder="Enter Scheme Amount" />
                                        </div>

                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    </form>

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