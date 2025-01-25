<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Select Bus Details</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
        background-color: #f7f7f7;
    }
    h2 {
        margin-bottom: 20px;
        text-align: center;
        color: #333;
    }
    form {
        max-width: 400px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    label {
        display: block;
        margin-bottom: 8px;
        color: #555;
    }
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #fff;
        font-size: 16px;
    }
    input[type="submit"] {
        width: 100%;
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        background-color: #007bff;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    input[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>
    <h2>Select Bus Details</h2>
    <form action="display_edited_stop_order.php" method="post">
        <label for="busName">Bus Name:</label>
        <select id="busName" name="busName" required>
            <option value="">Select Bus Name</option>
            <?php
            // Array of bus names
            $busNames = array("Varadha", "Krishna", "Kaveri", "Tunga", "Sharavathi", "Varahi", "Netravathi", "Bhadra", "Bhima", "Kabini", "Hemavathi", "Godavari");
            
            // Output options for each bus name
            foreach ($busNames as $busName) {
                echo "<option value='$busName'>$busName</option>";
            }
            ?>
        </select><br><br>
        <label for="busNumber">Bus Number:</label>
        <select id="busNumber" name="busNumber" required>
            <option value="">Select Bus Number</option>
            <?php
            // Output options for bus numbers from 1 to 12
            for ($i = 1; $i <= 12; $i++) {
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select><br><br>
        <label for="time">Time:</label>
        <select id="time" name="time" required>
            <option value="">Select Time</option>
            <option value="07:00:00">7:00 AM</option>
            <option value="07:45:00">7:45 AM</option>
            <option value="10:00:00">10:00 AM</option>
        </select><br><br>
        <input type="submit" value="Display Edited Stop Order">
    </form>
</body>
</html>
