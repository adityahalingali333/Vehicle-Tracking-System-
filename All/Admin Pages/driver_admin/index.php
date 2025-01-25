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
        <li><a href="<?php echo '../../driver/display.php'; ?>"><i class='bx bx-male'></i>Driver Details</a></li>
<li><a href="<?php echo '../../driver/display.php'; ?>"><i class='bx bx-analyse'></i>Update Driver</a></li>
<li><a href="<?php echo '../../driver/user.php'; ?>"><i class='bx bx-analyse'></i>Add driver</a></li>

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
                    <i class='bx bx-group'></i>
                    <span class="info">
                        <h3>
                        <?php
include 'connect.php';

// Query to count the total number of drivers
$sql = "SELECT COUNT(*) AS total_drivers FROM driver";
$result = mysqli_query($con, $sql);

// Check if the query was successful
if ($result) {
    // Fetch the result as an associative array
    $row = mysqli_fetch_assoc($result);
    
    // Retrieve the total number of drivers
    $totalDrivers = $row['total_drivers'];

    // Output the total number of drivers
    echo '<h3>Total Number of Drivers: ' . $totalDrivers . '</h3>';
} else {
    echo "Error fetching total number of drivers: " . mysqli_error($con);
}
?>

                        </h3>
                    </span>
                </li>
               <!-- <li><i class='bx bx-user-check'></i>
                    <span class="info">
                        <h3>
                        Drivers Present
                        </h3>
                    </span>
                </li>
                <li><i class='bx bx-user-x'></i>
                    <span class="info">
                        <h3>
                        Drivers Absent
                        </h3>                  
                    </span>
                </li>-->
                
            </ul>
            <!-- End of Insights -->

            
                <!-- End of Reminders-->

            </div>

        </main>

    </div>

    <script src="index.js"></script>
</body>

</html>