<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Manage Leaves</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        td button {
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        td button.approve {
            background-color: #5cb85c;
            color: #fff;
        }

        td button.reject {
            background-color: #d9534f;
            color: #fff;
        }
    </style>
</head>
<body>
    <h1>Admin: Manage Leaves</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'leaves') or die('connection failed');

            // Fetch leaves data from the database
            $sql = "SELECT * FROM drivers";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['start_date'] . "</td>";
                    echo "<td>" . $row['end_date'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td>";
                    echo "<button class='approve' data-id='" . $row['id'] . "'>Approve</button>";
                    echo "<button class='reject' data-id='" . $row['id'] . "'>Reject</button>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No leaves found</td></tr>";
            }

            mysqli_close($conn);
            ?>
        </tbody>
    </table>

    <script>
        // Function to handle leave approval or rejection
        function handleLeave(action, id) {
            fetch("handle_leave.php", {
                method: "POST",
                body: JSON.stringify({ action: action, id: id }),
                headers: {
                    "Content-Type": "application/json"
                }
            })
            .then(response => response.text())
            .then(result => {
                alert(result);
                // Refresh the page after action
                location.reload();
            })
            .catch(error => console.error('Error:', error));
        }

        // Add event listeners to approve and reject buttons
        document.querySelectorAll('button.approve').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                handleLeave('approve', id);
            });
        });

        document.querySelectorAll('button.reject').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                handleLeave('reject', id);
            });
        });
    </script>
</body>
</html>
