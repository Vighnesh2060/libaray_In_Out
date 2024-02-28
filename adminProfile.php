<?php

// Database connection details
include 'conn.php';
// SQL query to select data from your table


$sql = "SELECT * FROM finaloutput";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Define a filename for the CSV file
    $filename = "exported_data.csv";

    // Set appropriate headers for the CSV file download
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '"');

    // Open a writable stream to the output buffer
    $output = fopen('php://output', 'w');

    // Add a header row to the CSV file
    $header = array("Entry Date","Entry Time","Entry Status","Name","Branch","Year","Reason","Exit Time", "Exit Status"); // Replace with your actual column names
    fputcsv($output, $header);

    // Loop through the result set and add data to the CSV file
    while ($row = $result->fetch_assoc()) {
        $data = array($row['entry_date'], $row['entry_time'],$row['STATUS'],$row['name'],$row['branch'],$row['year'],$row['reason'],$row['quit_time'],$row['exit_status']); // Replace with your actual column names
        fputcsv($output, $data);
    }

    // Close the output stream
    fclose($output);
} else {
    echo "<script>
    alert('No Data Found');
    window.location.href = 'adminLogin.html'; 
    </script>";
}

// Close the database connection
$conn->close();
?>


<?php

// Database connection details
include 'conn.php';

// Define the table names
$tableName1 = "quit";
$tableName2 = "entry";
$tableName3 = "finaloutput";

// SQL query to truncate the first table
$sql1 = "TRUNCATE TABLE $tableName1";
// SQL query to truncate the second table
$sql2 = "TRUNCATE TABLE $tableName2";
// SQL query to truncate the third table
$sql3 = "TRUNCATE TABLE $tableName3";

// Execute the first SQL query
if ($conn->query($sql1) === TRUE) {
    
} else {
    
}

// Execute the second SQL query
if ($conn->query($sql2) === TRUE) {
    
} else {
    
}
// Execute the third SQL query}
if ($conn->query($sql3) === TRUE) {
   
} else {
}

// Close the database connection
$conn->close();

?>

