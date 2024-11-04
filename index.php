<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Form Submission</h1>
        <form action="process.php" method="POST">
            <label for="Name">Name:</label>
            <input type="text" name="Name" required>
            
            <label for="Mobile">Mobile Number:</label>
            <input type="text" name="Mobile" required>
            
            <label for="Location">Location:</label>
            <input type="text" name="Location" required>
            
            <button type="submit">Submit</button>
        </form>
       

        <h2>Entries</h2>
        <table border="1">
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
            $result = $conn->query("SELECT * FROM entries");
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['Sl_no']}</td>
                        <td>{$row['Name']}</td>
                        <td>{$row['Mobile']}</td>
                        <td>{$row['Location']}</td>
                        <td>
                            <a href='delete.php?id={$row['Id']}' 
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
</body>
</html>
