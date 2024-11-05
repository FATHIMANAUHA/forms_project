<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            display: flex;
            width: 100%;
            max-width: 1200px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .left {
            width: 40%;
            padding-right: 20px;
        }
        .right {
            width: 60%;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        form label, form input {
            margin-bottom: 10px;
        }
        button {
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Left section: Form -->
        <div class="left">
            <h1>Submit Your Details</h1>
            <form action="process.php" method="POST">
                <label for="Name">Name:</label>
                <input type="text" name="Name" required>
                
                <label for="Mobile">Mobile Number:</label>
                <input type="text" name="Mobile" required>
                
                <label for="Location">Location:</label>
                <input type="text" name="Location" required>
                
                <button type="submit">Submit</button>
            </form>
        </div>

        <!-- Right section: Entries -->
        <div class="right">
            <h2>Entries</h2>
            <table>
                <tr>
                    <th>SL No</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Location</th>
                    <th>Action</th>
                </tr>
                <?php
                include 'config.php'; // Include the database connection
                
                // Fetch entries from the database
                $result = $conn->query("SELECT * FROM entries ORDER BY Sl_no ASC");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['Sl_no']}</td>
                            <td>{$row['Name']}</td>
                            <td>{$row['Mobile']}</td>
                            <td>{$row['Location']}</td>
                            <td>
                                <a href='delete.php?sl_no={$row['Sl_no']}' 
                                   onclick=\"return confirm('Are you sure you want to delete this record?');\">
                                   Delete
                                </a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No records found</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
