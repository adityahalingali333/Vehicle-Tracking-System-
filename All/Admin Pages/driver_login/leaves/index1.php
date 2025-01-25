<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Driver Leaves</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f0f0f0;
        }

        h1 {
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
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="date"] {
            width: calc(100% - 12px);
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        #output {
            margin-top: 20px;
        }

        .leave {
            background-color: #fff;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .leave p {
            margin: 5px 0;
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Bus Driver Leaves</h1>
    <div class="login-container">
        <h2>Driver's Login</h2>
        <form id="leaveForm">
            <label for="name">Driver's Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="startDate">Start Date:</label>
            <input type="date" id="startDate" name="startDate" required>
            <label for="endDate">End Date:</label>
            <input type="date" id="endDate" name="endDate" required>
            <button type="submit">Submit</button>
        </form>
        <div id="output"></div>
    </div>

    <script>
        document.getElementById("leaveForm").addEventListener("submit", function(event) {
            event.preventDefault();
            const formData = new FormData(this);
            const data = Object.fromEntries(formData.entries());
            fetch("submit_leave.php", {
                method: "POST",
                body: JSON.stringify(data),
                headers: {
                    "Content-Type": "application/json"
                }
            })
            .then(response => response.text())
            .then(result => {
                document.getElementById("output").textContent = result;
                document.getElementById("leaveForm").reset();
                // Fetch and display leaves again after submission
                fetchLeaves();
            })
            .catch(error => console.error('Error:', error));
        });

        // Function to fetch and display leaves
        function fetchLeaves() {
            fetch("get_leaves.php")
            .then(response => response.json())
            .then(data => {
                const output = document.getElementById("output");
                output.innerHTML = ""; // Clear previous output
                data.forEach(leave => {
                    const leaveDiv = document.createElement("div");
                    leaveDiv.classList.add("leave");
                    leaveDiv.innerHTML = `<p><strong>Name:</strong> ${leave.name}</p>
                                           <p><strong>Start Date:</strong> ${leave.start_date}</p>
                                           <p><strong>End Date:</strong> ${leave.end_date}</p>
                                           <p><strong>Status:</strong> ${leave.status}</p>
                                           <p><strong>No of Days:</strong> ${leave.days}</p>`;
                    output.appendChild(leaveDiv);
                });
            })
            .catch(error => console.error('Error:', error));
        }

        // Fetch leaves on page load
        document.addEventListener("DOMContentLoaded", fetchLeaves);
    </script>

    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'leaves') or die('connection failed');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $start_date = $_POST['startDate'];
        $end_date = $_POST['endDate'];

        // Add status column to the table
        $sql = "INSERT INTO drivers (name, start_date, end_date) VALUES ('$name', '$start_date', '$end_date')";

        if ($conn->query($sql) === TRUE) {
            echo "Leave submitted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Fetch and display leave status
    $statusSql = "SELECT name, status FROM drivers";
    $statusResult = mysqli_query($conn, $statusSql);

    if (mysqli_num_rows($statusResult) > 0) {
        echo "<h2>Leave Status</h2>";
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($statusResult)) {
            echo "<li><strong>Name:</strong> " . $row["name"] . ", <strong>Status:</strong> " . $row["status"] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "No leaves found";
    }

    $conn->close();
    ?>
</body>
</html>
