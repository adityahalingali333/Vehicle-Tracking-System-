
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Route and Display Start/End Points</title>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Route and Display Start/End Points</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            max-width: 500px;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            font-size: 18px;
        }

        select, input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 18px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
    </head>
    
<body>
    <form action="groute.php" method="post">
        <label for="route">Select Route:</label>
        <select name="route" id="route">
            <option value="Route No. 1: Sahyadri College to JNNCE">Route No. 1: Sahyadri College to JNNCE</option>
            <option value="Route No. 2: Marigaddige to JNNCE">Route No. 2: Marigaddige to JNNCE</option>
            <option value="Route No. 3: Gopala Gowda Extension to JNNCE">Route No. 3: Gopala Gowda Extension to JNNCE</option>
            <option value="Route No. 4: Tempo Stand to JNNCE">Route No. 4: Tempo Stand to JNNCE</option>
            <option value="Route No. 5: Vinobanagar to JNNCE">Route No. 5: Vinobanagar to JNNCE</option>
            <option value="Route No. 6: Gopala to JNNCE">Route No. 6: Gopala to JNNCE</option>
            <option value="Route No. 7: Girls Hostel to JNNCE">Route No. 7: Girls Hostel to JNNCE</option>
            <option value="Route No. 8: K.E.B. Circle to JNNCE">Route No. 8: K.E.B. Circle to JNNCE</option>
            <option value="Route No. 9: Sahyadri Colony to JNNCE">Route No. 9: Sahyadri Colony to JNNCE</option>
            <option value="Route No. 10: Karnataka Sangha to JNNCE">Route No. 10: Karnataka Sangha to JNNCE</option>
            <option value="Route No. 11: New town Bhadravathi to JNNCE">Route No. 11: New town Bhadravathi to JNNCE</option>
            <option value="Route No. 12: Old town Bhadravathi to JNNCE">Route No. 12: Old town Bhadravathi to JNNCE</option>
            <!-- Add more options here -->
        </select>

        <label for="start_point">Start Point:</label>
        <input type="text" id="start_point" name="start_point" readonly>

        <label for="end_point">End Point:</label>
        <input type="text" id="end_point" name="end_point" readonly>

        <input type="submit" value="Submit">
    </form>

    <script>
        document.getElementById("route").addEventListener("change", function() {
            var selectedRoute = this.value;
            var startEndPoint = selectedRoute.split(" to ");
            document.getElementById("start_point").value = startEndPoint[0].split(": ")[1];
            document.getElementById("end_point").value = startEndPoint[1];
        });
    </script>
</body>
</html>
