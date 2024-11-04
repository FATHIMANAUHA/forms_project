<?php
include 'config.php'; // Include the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['Name'];  // Match this with 'name="Name"'
    $mobile = $_POST['Mobile']; // Match this with 'name="Mobile"'
    $location = $_POST['Location']; // Match this with 'name="Location"'

    // Check for unique mobile number
    $check_mobile = $conn->query("SELECT * FROM entries WHERE Mobile = '$mobile'");
    if ($check_mobile->num_rows > 0) {
        echo "Mobile number must be unique.";
    } else {
        // Insert data into the table
        $sl_no_query = $conn->query("SELECT MAX(Sl_no) AS max_sl_no FROM entries");
        $row = $sl_no_query->fetch_assoc();
        $sl_no = $row['max_sl_no'] + 1; // Determine the next SL No

        $sql = "INSERT INTO entries (Sl_no, Name, Mobile, Location) VALUES ('$sl_no', '$name', '$mobile', '$location')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>
