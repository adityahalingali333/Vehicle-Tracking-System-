<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Order Bus Stops</title>
<style>
   
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
    }
    .container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h2 {
        color: #343a40;
        margin-bottom: 20px;
    }
    form {
        margin-bottom: 20px;
    }
    label {
        font-weight: bold;
        margin-bottom: 5px;
        display: block;
    }
    select, button {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #fff;
        font-size: 16px;
    }
    button {
        background-color: #007bff;
        color: #fff;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    button:hover {
        background-color: #0056b3;
    }
    ul {
        list-style-type: none;
        padding: 0;
        margin: 20px 0;
    }
    li {
        padding: 10px;
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        cursor: pointer;
        margin-bottom: 5px;
        transition: background-color 0.3s ease;
    }
    li:hover {
        background-color: #f1f1f1;
    }

</style>
</head>
<body>
    <h2>Order Stops for Bus</h2>
    <p>Select a bus name, bus number, and time to reorder its stops:</p>
    <form id="orderForm">
        <label for="busName">Bus Name:</label>
        <select name="busName" id="busName">
            <?php
            // Database connection
            include 'connect.php';
            if ($con->connect_error) {
                die("Connection failed: " . $con->connect_error);
            }

            // Query to fetch distinct bus names
            $sql = "SELECT DISTINCT BusName FROM busschedule";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='".$row["BusName"]."'>".$row["BusName"]."</option>";
                }
            } else {
                echo "<option>No bus names available</option>";
            }
            $con->close();
            ?>
        </select>

        <label for="busNumber">Bus Number:</label>
        <select name="busNumber" id="busNumber">
            <?php
            // Display bus numbers from 1 to 12
            for ($i = 1; $i <= 12; $i++) {
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select>

        <label for="time">Time:</label>
        <select name="time" id="time">
            <option value="7:00 AM">7:00 AM</option>
            <option value="7:45 AM">7:45 AM</option>
            <option value="10:00 AM">10:00 AM</option>
        </select>

        <ul id="stopList">
            <!-- Stop names will be displayed here -->
        </ul>

        <button type="submit">Save Order</button>
    </form>

    <script>
        document.getElementById("orderForm").addEventListener("submit", function(event) {
            event.preventDefault();

            var busName = document.getElementById("busName").value;
            var busNumber = document.getElementById("busNumber").value;
            var time = document.getElementById("time").value;
            var stopOrder = [];
            var stopItems = document.querySelectorAll("#stopList li");

            // Collect the ordered stop names
            stopItems.forEach(function(item) {
                stopOrder.push(item.textContent);
            });

            // AJAX request to save the new stop order
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    alert(this.responseText); // Display success message
                }
            };
            xhttp.open("POST", "save_stop_order.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("busName=" + busName + "&busNumber=" + busNumber + "&time=" + time + "&stopOrder=" + JSON.stringify(stopOrder));
        });

        document.getElementById("time").addEventListener("change", function() {
            fetchStops();
        });

        document.getElementById("busName").addEventListener("change", function() {
            fetchStops();
        });

        document.getElementById("busNumber").addEventListener("change", function() {
            fetchStops();
        });

        function fetchStops() {
            var busName = document.getElementById("busName").value;
            var busNumber = document.getElementById("busNumber").value;
            var time = document.getElementById("time").value;

            // AJAX request to fetch stops for the selected bus name, bus number, and time
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var stops = JSON.parse(this.responseText);
                    var stopList = document.getElementById("stopList");
                    stopList.innerHTML = ""; // Clear previous stops
                    stops.forEach(function(stop) {
                        var listItem = document.createElement("li");
                        listItem.textContent = stop;
                        listItem.addEventListener("click", function() {
                            if (this.previousElementSibling) {
                                stopList.insertBefore(this, this.previousElementSibling);
                            }
                        });
                        stopList.appendChild(listItem);
                    });
                }
            };
            xhttp.open("GET", "get_stops.php?busName=" + busName + "&busNumber=" + busNumber + "&time=" + time, true);
            xhttp.send();
        }
    </script>
</body>
</html>
