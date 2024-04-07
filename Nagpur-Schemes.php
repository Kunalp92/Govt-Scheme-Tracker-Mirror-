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



// Query to fetch data from the "user_table"
$sqlUser = "SELECT * FROM govt_scheme_table WHERE status = 'Active'";
$resultUser = $conn->query($sqlUser);

// Query to fetch data in descending order based on the unique identifier
$sqlUser = "SELECT * FROM govt_scheme_table ORDER BY id DESC";
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

                                            <a class="no-hover" href="Nagpur-Active-Complete.php">

                                                <p class="mb-4">Active Schemes</p>
                                                <p class="fs-30 mb-2">
                                                    <?php echo $totalActiveUsers; ?>
                                                </p>
                                                <!-- <p>10.00% (30 days)</p> -->

                                            </a>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-4 stretch-card transparent">
                                    <div class="card card-dark-blue">
                                        <div class="card-body">

                                            <a class="no-hover" href="Nagpur-Active-Complete.php">

                                                <p class="mb-4">Completed Schemes</p>
                                                <p class="fs-30 mb-2">
                                                    <?php echo $totalInactiveUsers; ?>
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
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title">Schemes</p>

                                    <form id="searchForm" class="search-bar ps-3" method="post">

                                        <!-- <input type="text" class="form-control" id="search" name="search"
                                            placeholder="Search Village Name" required> -->


                                        <select class="js-example-basic-single w-100 form-control" id="search"
                                            name="search">
                                            <option value=""></option>
                                            <option value="Vit Bhatti Yojna">Vit Bhatti Yojna</option>
                                            <option value="Kutir va Laghu Udyog Yojana">Kutir va Laghu Udyog Yojana
                                            </option>
                                            <option value="Tadpatri Anudan Yojana">Tadpatri Anudan Yojana</option>
                                            <option value="Sinchan Yojana">Sinchan Yojana</option>
                                            <option value="E-Rickshaw va Malvahan Yojana">E-Rickshaw va Malvahan Yojana
                                            </option>
                                            <!-- <option value="Bambu Lagwad Yojana">Bambu Lagwad Yojana</option> -->
                                            <option value="Saikal Purvatha Yojana">Saikal Purvatha Yojana</option>
                                            <!-- <option value="E-Rickshaw va Malvahan Yojana">E-Rickshaw va Malvahan Yojana -->
                                            </option>

                                        </select>


                                        <br>

                                        <button type="submit" class="btn btn-outline-primary btn-fw">Search</button>


                                        <button type="submit" class="btn btn-outline-secondary btn-fw"
                                            name="showAll">Show All</button>


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
                                                                <th>Scheme Name</th>
                                                                <th>Minimum Age</th>
                                                                <th>Maximum Age</th>
                                                                <th>Maximum Income</th>
                                                                <th>State</th>
                                                                <th>Country</th>
                                                                <th>Category</th>
                                                                <th>Married Status</th>
                                                                <th>Occupation</th>
                                                                <th>Gender</th>
                                                                <th>Scheme Year</th>
                                                                <th>Schemes fund</th>

                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php



                                                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                                                $search = $_POST["search"];

                                                                if (empty($search)) {
                                                                    // Check if "Show All" button is clicked
                                                                    if (isset($_POST["showAll"])) {
                                                                        $sqlUser = "SELECT * FROM govt_scheme_table WHERE status = 'Active'";
                                                                        $resultUser = $conn->query($sqlUser);
                                                                    }
                                                                } else {
                                                                    // Perform search query
                                                                    $sqlUser = "SELECT * FROM govt_scheme_table WHERE schemeName LIKE '%$search%'";
                                                                    $resultUser = $conn->query($sqlUser);
                                                                }


                                                            }


                                                            if ($resultUser === false) {
                                                                echo "Error: " . $sql . "<br>" . $conn->error;
                                                            } elseif ($resultUser->num_rows > 0) {
                                                                // Output data of each row
                                                                while ($row = $resultUser->fetch_assoc()) {
                                                                    echo "<tr>";

                                                                    echo '<td><a href="Nagpur-Scheme-details.php?id=' . $row['id'] . '">' . $row['schemeName'] . '</a></td>';

                                                                    // echo '<td>' . $row['schemeName'] . '</td>';
                                                                    echo '<td>' . $row['lessAge'] . '</td>';
                                                                    echo '<td>' . $row['greaterAge'] . '</td>';
                                                                    echo '<td>' . $row['greaterIncome'] . '</td>';
                                                                    echo '<td>' . $row['state'] . '</td>';
                                                                    echo '<td>' . $row['country'] . '</td>';
                                                                    echo '<td>' . $row['category'] . '</td>';
                                                                    echo '<td>' . $row['marriedStatus'] . '</td>';
                                                                    echo '<td>' . $row['work'] . '</td>';
                                                                    echo '<td>' . $row['gender'] . '</td>';
                                                                    echo '<td>' . $row['year'] . '</td>';
                                                                    echo '<td>' . $row['fund'] . '</td>';


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
            link.setAttribute("download", "schemes_data.csv");
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