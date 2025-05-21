<?php
$conn = new mysqli("localhost", "root", "", "rsvp");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_rsvp'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $sql = "INSERT INTO rsvp (name) VALUES ('$name')";
    if ($conn->query($sql)) {
        // Redirect back to the form or a thank you page
        header("Location: thankyou.html");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}
?>
