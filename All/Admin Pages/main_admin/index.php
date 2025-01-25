<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet" />
  <link rel="stylesheet" href="style.css" />
  <i style='font-size:24px' class='fas'>&#xf101;</i>
  <title>JNNCE BMS Dashboard</title>
</head>

<body>
  <div class="container">
    <!-- Sidebar Section -->
    <aside>
      <div class="toggle">
        <div class="logo">
          <img src="1.jpg" />
          <a href="<?php echo 'index.php'; ?>"></a>
          <h2>JNNCE<span class="danger">BMS</span></h2>
        </div>
        <div class="close" id="close-btn">
          <span class="material-icons-sharp"> close </span>
        </div>
      </div>

      <div class="sidebar">
        <a href=" <?php echo 'index.php'; ?>">
          <span class="material-icons-sharp"> dashboard </span>
          <h3>Dashboard</h3>
        </a>
        <a href="<?php echo '../bus_admin/bus/index.php'; ?>">
          <span class="material-icons-sharp">directions_bus</span>
          <h3>Buses</h3>
          </href=>
        </a>
        <a href="<?php echo '../driver_admin/admin/index.php'; ?>">
          <span class="material-icons-sharp"> person_outline </span>
          <h3>Drivers</h3>
          </href=>
          <!--<a href="#" >  class="active">
            <span class="material-icons-sharp"> person_outline </span>
            <h3>Helpers</h3>
          </a>-->
          <a href="../student_info/index.php">
            <span class="material-icons-sharp"> person_outline </span>
            <h3>Students</h3>
          </a>
          <a href="<?php echo '../route_admin/route/index.php'; ?>">
            <span class="material-icons-sharp"> route </span>
            <h3>Routes</h3>
          </a>
          <a href="<?php echo '../bus_route_admin/route/index.php'; ?>">
            <span class="material-icons-sharp"> route </span>
            <h3>Bus Stops</h3>
          </a>
          <a href="<?php echo '../stop_admin/route/index.php'; ?>">
            <span class="material-icons-sharp"> route </span>
            <h3>Change Bus Stops Order</h3>
          </a>
          <a href="<?php echo '../leave management/index.php'; ?>">
            <span class="material-icons-sharp"> route </span>
            <h3>Leave Management</h3>
          </a>
          <a href="<?php echo 'admin_bus_location.html'; ?>">
            <span class="material-icons-sharp"> route </span>
            <h3>Bus Locations</h3>
          </a>
          <a href="../login.php">
            <span class="material-icons-sharp"></span>
            <i style='font-size:24px' class='fas'> &#xf101;</i>
            <h3>Logout</h3>
          </a>
      </div>
    </aside>
    <!-- End of Sidebar Section -->

    <!-- Main Content -->
    <main>
      <h1>Dashboard</h1>
      <!-- Analyses -->
      <div class="analyse">
        <div class="sales">
          <div class="status">
            <div class="info">
              <?php
              include 'connect1.php'; // Assuming this file contains the database connection code

              // Query to count the distinct 'bus_id' values from the 'route' table
              $sql = "SELECT COUNT(DISTINCT bus_id) AS bus_count FROM bus";

              // Execute the query
              $result = mysqli_query($con, $sql);

              // Check if the query was successful
              if ($result) {
                // Fetch the result as an associative array
                $row = mysqli_fetch_assoc($result);

                // Get the count of bus IDs from the fetched row
                $busCount = $row['bus_count'];
              } else {
                // If the query fails, handle the error
                $busCount = "Error: " . mysqli_error($con);
              }

              // Close the database connection
              mysqli_close($con);
              ?>
              <h3>Currently Running Buses</h3>
              <h1><?php echo $busCount; ?></h1>
            </div>
            <div class="progresss">
              <img src="2.png" />
            </div>
          </div>
        </div>

        <div class="searches">
          <div class="status">
            <div class="info">
              <?php
              include 'connect1.php'; // Assuming this file contains the database connection code

              // Query to count the distinct 'bus_id' values from the 'route' table
              $sql = "SELECT COUNT(DISTINCT bus_id) AS bus_count FROM bus";

              // Execute the query
              $result = mysqli_query($con, $sql);

              // Check if the query was successful
              if ($result) {
                // Fetch the result as an associative array
                $row = mysqli_fetch_assoc($result);

                // Get the count of bus IDs from the fetched row
                $busCount = $row['bus_count'];

                // Display the count
                echo "<h3>Buses for service</h3>";
                echo "<h1>$busCount</h1>";
              } else {
                // If the query fails, handle the error
                echo "Error: " . mysqli_error($con);
              }

              // Close the database connection
              mysqli_close($con);
              ?></div>
            <div class="progresss">
              <img src="2.png" />
            </div>
          </div>
        </div>
      </div>
      <!-- End of Analyses -->

      <!-- Drivers  -->
      
      

      <div class="new-users">
        <h2>Graphs</h2>
        <div class="user-list">
          <canvas id="routeChart" width="50" height="10"></canvas>
          <div class="user">
          </div>

          <?php
          include 'connect4.php';

          // Query to retrieve data from the routes table and count the number of stops for each route
          $sql = "SELECT RouteName, COUNT(*) AS NumStops FROM routes GROUP BY RouteName";
          $result = mysqli_query($con, $sql);

          // Initialize arrays to store route names and number of stops
          $routeNames = [];
          $numStops = [];

          // Fetch data and populate arrays
          if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              $routeNames[] = $row['RouteName'];
              $numStops[] = $row['NumStops'];
            }
          }

          // Format data for JavaScript consumption
          $data = [
            'routeNames' => $routeNames,
            'numStops' => $numStops
          ];

          // Convert data to JSON format
          $jsonData = json_encode($data);
          ?>
          <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
          <script>
            // Retrieve data from PHP
            var routeData = <?php echo $jsonData; ?>;

            // Extract route names and number of stops
            var routeNames = routeData.routeNames;
            var numStops = routeData.numStops;

            // Create a bar chart using Chart.js
            var ctx = document.getElementById('routeChart').getContext('2d');
            var routeChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: routeNames,
                datasets: [{
                  label: 'Number of Stops',
                  data: numStops,
                  backgroundColor: 'rgba(54, 162, 235, 0.2)',
                  borderColor: 'rgba(54, 162, 235, 1)',
                  borderWidth: 1
                }]
              },
              options: {
                scales: {
                  y: {
                    beginAtZero: true,
                    title: {
                      display: true,
                      text: 'Number of Stops'
                    }
                  },
                  x: {
                    title: {
                      display: true,
                      text: 'Route Name'
                    }
                  }
                }
              }
            });
          </script>
        </div>
      </div>

      <div class="new-users">
        <h2>Bus Schedule Graph</h2>
        <div class="user-list">
          <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
          <canvas id="busScheduleChart" width="50" height="10"></canvas>
          <?php
          include 'connect4.php'; // Include the database connection file

          // Query to retrieve data from the busschedule table and count the number of stops for each bus route
          $sql = "SELECT BusName, COUNT(*) AS NumStops FROM busschedule GROUP BY BusName";
          $result = mysqli_query($con, $sql);

          // Initialize arrays to store bus names and number of stops
          $busNames = [];
          $numStops = [];

          // Fetch data and populate arrays
          if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              $busNames[] = $row['BusName'];
              $numStops[] = $row['NumStops'];
            }
          }

          // Format data for JavaScript consumption
          $data = [
            'busNames' => $busNames,
            'numStops' => $numStops
          ];

          // Convert data to JSON format
          $jsonData = json_encode($data);
          ?>

          <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
          <script>
            // Retrieve data from PHP
            var busScheduleData = <?php echo $jsonData; ?>;

            // Extract bus names and number of stops
            var busNames = busScheduleData.busNames;
            var numStops = busScheduleData.numStops;

            // Create a bar chart using Chart.js
            var ctx = document.getElementById('busScheduleChart').getContext('2d');
            var busScheduleChart = new Chart(ctx, {
              type: 'bar',
              data: {
                labels: busNames,
                datasets: [{
                  label: 'Number of Stops',
                  data: numStops,
                  backgroundColor: 'rgba(255, 99, 132, 0.2)',
                  borderColor: 'rgba(255, 99, 132, 1)',
                  borderWidth: 1
                }]
              },
              options: {
                scales: {
                  y: {
                    beginAtZero: true,
                    title: {
                      display: true,
                      text: 'Number of Stops'
                    }
                  },
                  x: {
                    title: {
                      display: true,
                      text: 'Bus Name'
                    }
                  }
                }
              }
            });
          </script>
        </div>
      </div>


    </main>
    <!-- End of New Users Section -->

    <!-- Recent Orders Table -->
    <!-- <div class="recent-orders">
          <h2>Recent Orders</h2>
          <table>
            <thead>
              <tr>
                <th>Course Name</th>
                <th>Course Number</th>
                <th>Payment</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
          <a href="#">Show All</a>
        </div>
         End of Recent Orders -->

    <!-- End of Main Content -->

    <!-- Right Section -->
    <div class="right-section">
      <div class="nav">
        <button id="menu-btn">
          <span class="material-icons-sharp"> menu </span>
        </button>
        <div class="dark-mode">
          <span class="material-icons-sharp active"> light_mode </span>
          <span class="material-icons-sharp"> dark_mode </span>
        </div>

        <div class="profile">
          <div class="info">
            <p><h2>JNNCE BMS</h2>
          <b>Developed by JNNCE</b>
          </p>
          </div>
        
        </div>
      </div>
      <!-- End of Nav -->

      

      <!-- <div class="reminders">
          <div class="header">
            <h2>Reminders</h2>
            <span class="material-icons-sharp"> notifications_none </span>
          </div>

          <div class="notification">
            <div class="icon">
              <span class="material-icons-sharp"> volume_up </span>
            </div>
            <div class="content">
              <div class="info">
                <h3>Workshop</h3>
                <small class="text_muted"> 08:00 AM - 12:00 PM </small>
              </div>
              <span class="material-icons-sharp"> more_vert </span>
            </div>
          </div>

          <div class="notification deactive">
            <div class="icon">
              <span class="material-icons-sharp"> edit </span>
            </div>
            <div class="content">
              <div class="info">
                <h3>Workshop</h3>
                <small class="text_muted"> 08:00 AM - 12:00 PM </small>
              </div>
              <span class="material-icons-sharp"> more_vert </span>
            </div>
          </div>

          <div class="notification add-reminder">
            <div>
              <span class="material-icons-sharp"> add </span>
              <h3>Add Reminder</h3>
            </div>
          </div>
        </div>
      </div>
    </div>-->
  
      <script src="orders.js"></script>
      <script src="index.js"></script>
</body>

</html>