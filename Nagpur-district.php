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



// Query to get the total number of users
$sql = "SELECT COUNT(*) AS total_users FROM nagpur_user_table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalUsers = $row['total_users'];
} else {
    $totalUsers = 0;
}





// Query to fetch data from the "user_table"
$sqlUser = "SELECT name, age, category, mobile, aadhar, village, state, country, income, gender, married, work, dob, election, receivedSchemes, schemesName, schemeAmount, schemesName1, schemeAmount1, schemesName2, schemeAmount2 FROM nagpur_user_table";
$resultUser = $conn->query($sqlUser);


// Query to fetch data in descending order based on the unique identifier
$sqlUser = "SELECT * FROM nagpur_user_table ORDER BY id DESC";
$result = $conn->query($sqlUser);



// SQL query to count users with village name 'Bhilgaon'
$sql_Bhilgaon = "SELECT COUNT(*) AS total_Bhilgaon FROM nagpur_user_table WHERE village = 'Bhilgaon'";
$result_Bhilgaon = $conn->query($sql_Bhilgaon);

if ($result_Bhilgaon->num_rows > 0) {

    $row_Bhilgaon = $result_Bhilgaon->fetch_assoc();
    $total_Bhilgaon = $row_Bhilgaon['total_Bhilgaon'];
} else {
    $total_Bhilgaon = 0;
}



// SQL query to count users with village name 'Bhilgaon'
$sql_Bhilgaon = "SELECT COUNT(*) AS total_Bhilgaon FROM nagpur_user_table WHERE village = 'Bhilgaon'";
$result_Bhilgaon = $conn->query($sql_Bhilgaon);

if ($result_Bhilgaon->num_rows > 0) {

    $row_Bhilgaon = $result_Bhilgaon->fetch_assoc();
    $total_Bhilgaon = $row_Bhilgaon['total_Bhilgaon'];
} else {
    $total_Bhilgaon = 0;
}




// SQL query to count users with village name 'Mhasala'
$sql_Mhasala = "SELECT COUNT(*) AS total_Mhasala FROM nagpur_user_table WHERE village = 'Mhasala'";
$result_Mhasala = $conn->query($sql_Mhasala);

if ($result_Mhasala->num_rows > 0) {

    $row_Mhasala = $result_Mhasala->fetch_assoc();
    $total_Mhasala = $row_Mhasala['total_Mhasala'];
} else {
    $total_Mhasala = 0;
}




// SQL query to count users with village name 'Khairi'
$sql_Khairi = "SELECT COUNT(*) AS total_Khairi FROM nagpur_user_table WHERE village = 'Khairi'";
$result_Khairi = $conn->query($sql_Khairi);

if ($result_Khairi->num_rows > 0) {

    $row_Khairi = $result_Khairi->fetch_assoc();
    $total_Khairi = $row_Khairi['total_Khairi'];
} else {
    $total_Khairi = 0;
}



// SQL query to count users with village name 'Kawtha'
$sql_Kawtha = "SELECT COUNT(*) AS total_Kawtha FROM nagpur_user_table WHERE village = 'Kawtha'";
$result_Kawtha = $conn->query($sql_Kawtha);

if ($result_Kawtha->num_rows > 0) {

    $row_Kawtha = $result_Kawtha->fetch_assoc();
    $total_Kawtha = $row_Kawtha['total_Kawtha'];
} else {
    $total_Kawtha = 0;
}




// SQL query to count users with village name 'Waregaon'
$sql_Waregaon = "SELECT COUNT(*) AS total_Waregaon FROM nagpur_user_table WHERE village = 'Waregaon'";
$result_Waregaon = $conn->query($sql_Waregaon);

if ($result_Waregaon->num_rows > 0) {

    $row_Waregaon = $result_Waregaon->fetch_assoc();
    $total_Waregaon = $row_Waregaon['total_Waregaon'];
} else {
    $total_Waregaon = 0;
}



// SQL query to count users with village name 'Bidbina'
$sql_Bidbina = "SELECT COUNT(*) AS total_Bidbina FROM nagpur_user_table WHERE village = 'Bidbina'";
$result_Bidbina = $conn->query($sql_Bidbina);

if ($result_Bidbina->num_rows > 0) {

    $row_Bidbina = $result_Bidbina->fetch_assoc();
    $total_Bidbina = $row_Bidbina['total_Bidbina'];
} else {
    $total_Bidbina = 0;
}




// SQL query to count users with village name 'Khasala'
$sql_Khasala = "SELECT COUNT(*) AS total_Khasala FROM nagpur_user_table WHERE village = 'Khasala'";
$result_Khasala = $conn->query($sql_Khasala);

if ($result_Khasala->num_rows > 0) {

    $row_Khasala = $result_Khasala->fetch_assoc();
    $total_Khasala = $row_Khasala['total_Khasala'];
} else {
    $total_Khasala = 0;
}



// SQL query to count users with village name 'Beena'
$sql_Beena = "SELECT COUNT(*) AS total_Beena FROM nagpur_user_table WHERE village = 'Beena'";
$result_Beena = $conn->query($sql_Beena);

if ($result_Beena->num_rows > 0) {

    $row_Beena = $result_Beena->fetch_assoc();
    $total_Beena = $row_Beena['total_Beena'];
} else {
    $total_Beena = 0;
}



// SQL query to count users with village name 'Suradevi'
$sql_Suradevi = "SELECT COUNT(*) AS total_Suradevi FROM nagpur_user_table WHERE village = 'Suradevi'";
$result_Suradevi = $conn->query($sql_Suradevi);

if ($result_Suradevi->num_rows > 0) {

    $row_Suradevi = $result_Suradevi->fetch_assoc();
    $total_Suradevi = $row_Suradevi['total_Suradevi'];
} else {
    $total_Suradevi = 0;
}




// SQL query to count users with village name 'Panjra'
$sql_Panjra = "SELECT COUNT(*) AS total_Panjra FROM nagpur_user_table WHERE village = 'Panjra'";
$result_Panjra = $conn->query($sql_Panjra);

if ($result_Panjra->num_rows > 0) {

    $row_Panjra = $result_Panjra->fetch_assoc();
    $total_Panjra = $row_Panjra['total_Panjra'];
} else {
    $total_Panjra = 0;
}



// SQL query to count users with village name 'Mahadula'
$sql_Mahadula = "SELECT COUNT(*) AS total_Mahadula FROM nagpur_user_table WHERE village = 'Mahadula'";
$result_Mahadula = $conn->query($sql_Mahadula);

if ($result_Mahadula->num_rows > 0) {

    $row_Mahadula = $result_Mahadula->fetch_assoc();
    $total_Mahadula = $row_Mahadula['total_Mahadula'];
} else {
    $total_Mahadula = 0;
}



// SQL query to count users with village name 'Koradi'
$sql_Koradi = "SELECT COUNT(*) AS total_Koradi FROM nagpur_user_table WHERE village = 'Koradi'";
$result_Koradi = $conn->query($sql_Koradi);

if ($result_Koradi->num_rows > 0) {

    $row_Koradi = $result_Koradi->fetch_assoc();
    $total_Koradi = $row_Koradi['total_Koradi'];
} else {
    $total_Koradi = 0;
}



// ***************************************




// SQL query to count unique names in the village column
$sql_unique_names = "SELECT COUNT(DISTINCT village) AS total_unique_names FROM nagpur_user_table";
$result_unique_names = $conn->query($sql_unique_names);

if ($result_unique_names->num_rows > 0) {

    $row_unique_names = $result_unique_names->fetch_assoc();
    $total_unique_names = $row_unique_names['total_unique_names'];
} else {
    $total_unique_names = 0;
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



// Query to calculate the total of schemeAmount, schemeAmount1, and schemeAmount2
$sql = "SELECT SUM(schemeAmount + schemeAmount1 + schemeAmount2) as total_amount FROM nagpur_user_table";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of the query
    $row = $result->fetch_assoc();
    $total_D_Amount = $row["total_amount"];
    // echo "Total Amount: " . $totalAmount;
    $total_D_AmountWords = numberToWords($total_D_Amount);
} else {
    // $totalAmount = 0;
    $totalAmount = 0;
    $total_D_AmountWords = '';
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
            max-height: 100px;
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
                        <div class="col-lg-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Beneficiary & Non-Beneficiary Villagers</h4>
                                    <canvas id="doughnutChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 grid-margin transparent">
                            <div class="row">
                                <div class="col-md-6 mb-4 stretch-card transparent">
                                    <div class="card card-tale">
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
                            <div class="row">
                                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                                    <div class="card card-light-blue">
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
                                <div class="col-md-6 stretch-card transparent">
                                    <div class="card card-light-danger">
                                        <div class="card-body">

                                            <a class="no-hover" href="Nagpur-Funds.php">

                                                <p class="mb-4">Distributed Funds</p>
                                                <p class="fs-30 ">&#8377;
                                                    <?php echo number_format($total_D_Amount); ?>
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
                                        <p class="card-title">Active & Completed Scheme</p>
                                        <a href="Nagpur-Active-Complete.php" class="text-info">View all</a>
                                    </div>

                                    <div class="d-flex flex-wrap mb-5">
                                        <div class="mr-5 mt-3">
                                            <p class="text-muted">Active Scheme</p>
                                            <div style="background-color: #248AFD; width: 15px; height: 15px;"
                                                class="text-primary fs-30 font-weight-medium">
                                            </div>
                                        </div>
                                        <div class="mr-5 mt-3">
                                            <p class="text-muted">Completed Scheme</p>
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
                                        <p class="card-title">Villages</p>
                                        <a href="Nagpur-allVillagers.php" class="text-info">View all</a>
                                    </div>

                                    <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                                    <canvas id="sales-chart"></canvas>
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
                            </script>. <a href="https://9teeninitiative.in/" target="_blank">9Teen
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
                            labels: ["Bhilgaon", "Mhasala", "Khairi", "Kawtha", "Waregaon", "Bidbina", "Khasala", "Beena", "Suradevi", "Panjra", "Mahadula", "Koradi"],
                            datasets: [
                                {
                                    data: [<?php echo $total_Bhilgaon; ?>, <?php echo $total_Mhasala; ?>, <?php echo $total_Khairi; ?>, <?php echo $total_Kawtha; ?>, <?php echo $total_Waregaon; ?>, <?php echo $total_Bidbina; ?>, <?php echo $total_Khasala; ?>, <?php echo $total_Beena; ?>, <?php echo $total_Suradevi; ?>, <?php echo $total_Panjra; ?>, <?php echo $total_Mahadula; ?>, <?php echo $total_Koradi; ?>],
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
                                        max: 50,
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
                            labels: ["Bhilgaon", "Mhasala", "Khairi", "Kawtha", "Waregaon", "Bidbina", "Khasala", "Beena", "Suradevi", "Panjra", "Mahadula", "Koradi"],
                            datasets: [
                                {
                                    data: [<?php echo $total_Bhilgaon; ?>, <?php echo $total_Mhasala; ?>, <?php echo $total_Khairi; ?>, <?php echo $total_Kawtha; ?>, <?php echo $total_Waregaon; ?>, <?php echo $total_Bidbina; ?>, <?php echo $total_Khasala; ?>, <?php echo $total_Beena; ?>, <?php echo $total_Suradevi; ?>, <?php echo $total_Panjra; ?>, <?php echo $total_Mahadula; ?>, <?php echo $total_Koradi; ?>],
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
                        labels: ["Active Schemes", "Completed Schemes"],
                        datasets: [{
                            data: [<?php echo $totalActiveUsers; ?>, <?php echo $totalInactiveUsers; ?>],
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
                        labels: ["Active Schemes", "Completed Schemes"],
                        datasets: [{
                            data: [<?php echo $totalActiveUsers; ?>, <?php echo $totalInactiveUsers; ?>],
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

        $(function () {
            /* ChartJS
             * -------
             * Data and config for chartjs
             */
            'use strict';

            var doughnutPieData = {
                datasets: [{
                    data: [30, 100],
                    backgroundColor: [
                        '#009ED3',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)'
                    ],
                    borderColor: [
                        '#0080AB',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                }],

                // These labels appear in the legend and in the tooltips when hovering different arcs
                labels: [
                    'Benificiry',
                    'Non-Benificiry',
                ]
            };
            var doughnutPieOptions = {
                responsive: true,
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            };




            // Get context with jQuery - using jQuery's .get() method.


            if ($("#doughnutChart").length) {
                var doughnutChartCanvas = $("#doughnutChart").get(0).getContext("2d");
                var doughnutChart = new Chart(doughnutChartCanvas, {
                    type: 'doughnut',
                    data: doughnutPieData,
                    options: doughnutPieOptions
                });
            }


        });
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