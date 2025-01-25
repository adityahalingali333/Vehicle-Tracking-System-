<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>Responsive Dashboard Design #2 | JNNCE BUS</title>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <a href="<?php echo '../../main_admin/index.php'; ?>" class="logo">
            <i class='bx bx-bus'></i>
            <div class="logo-name"><span>JNNCE</span>BUS</div>
        </a>
        <ul class="side-menu">
        <li><a href="<?php echo '../../route1/display.php'; ?>"><i class='bx bx-bus'></i>Route Details</a></li>
<li><a href="<?php echo '../../route1/display.php'; ?>"><i class='bx bx-analyse'></i>Update Route</a></li>
<li><a href="<?php echo '../../route1/insert_route.php'; ?>"><i class='bx bx-analyse'></i>Add Route</a></li>

            <!--<li><a href="#"><i class=''></i></a></li>
            <li><a href="#"><i class='bx bx-'></i></a></li>
            <li><a href="#"><i class='bx bx-'></i></a></li>-->
        </ul>
<br>
 <br>
 <br>
 <br>
 <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <ul class="side-menu">
            <li>
                <a href="../../login.php" class="logout">
                    <i class='bx bx-log-out-circle'></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
    <!-- End of Sidebar -->

    <!-- Main Content -->
    <div class="content">
        <!-- Navbar -->
        <nav>
            <i class='bx bx-menu'></i>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button class="search-btn" type="submit"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="theme-toggle" hidden>
            <label for="theme-toggle" class="theme-toggle"></label>
            <a href="#" class="notif">
                <i class='bx bx-bell'></i>
                <span class="count">12</span>
            </a>
            
        </nav>

        <!-- End of Navbar -->

        <main>
            <div class="header">
                <div class="left">
                    <h1></h1>
                    <ul class="breadcrumb">
                        
                    </ul>
                </div>
                
            </div>

            <!-- Insights -->
            <ul class="insights">
                <li>
                    <i class='bx bx-bus'></i>
                    <span class="info">
                    <?php
include 'connect.php';

// Query to count the total number of routes
$sql = "SELECT COUNT(*) AS total_routes FROM routes";
$result = mysqli_query($con, $sql);

// Check if the query was successful
if ($result) {
    // Fetch the result as an associative array
    $row = mysqli_fetch_assoc($result);
    
    // Retrieve the total number of routes
    $totalRoutes = $row['total_routes'];

    // Output the total number of routes
    echo '<span class="info" >
            <h3>
            Total Number of Routes: ' . $totalRoutes . '
            </h3>
          </span>';
} else {
    echo "Error fetching total number of routes: " . mysqli_error($con);
}
?>
<a href="../../route1/display.php"> click to display</a>
</span>
                </li>
                <li><i class='bx bx-add-to-queue'></i>
                    <span class="info">
                        <h3>
                        Add Route
                       
                        </h3> <a href="../../route1/insert_route.php"> click to add</a>
                    </span>
                </li>
                <li><i class='bx bx-folder-minus'></i>
                    <span class="info">
                        <h3>
                        Delete Route
                        </h3> <a href="../../route1/display.php"> click to delete routes</a>                 
                    </span>
                </li>
                
            </ul>
            <!-- End of Insights -->

            
                <!-- End of Reminders-->

            </div>

        </main>

    </div>

    <script src="index.js"></script>
</body>

</html>