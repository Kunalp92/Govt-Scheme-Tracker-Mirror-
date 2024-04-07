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
                        <div class="col-md-12 grid-margin stretch-card">


                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Schemes Funds</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Years</th>
                                                    <th>2020</th>
                                                    <th>2021</th>
                                                    <th>2022</th>
                                                    <th>2023</th>
                                                    <th>2024</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Received Found</td>
                                                    <td class="text-success">2050000</td>
                                                    <td class="text-success">2500000</td>

                                                    <td class="text-success">5107000</td>
                                                    <td class="text-success">6152000</td>
                                                    <td class="text-success">
                                                        <?php echo number_format($totalAmount); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Distributed Found</td>
                                                    <td class="text-danger">1500000</td>
                                                    <td class="text-danger">200000</td>
                                                    <td class="text-danger">5000000</td>
                                                    <td class="text-danger">1250000</td>
                                                    <td class="text-danger">
                                                        <?php echo number_format($total_D_Amount); ?>
                                                    </td>
                                                </tr>

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
    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->



</body>

</html>

<?php
// Close database connection
$conn->close();
?>