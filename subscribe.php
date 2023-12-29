<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the email from the form
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    // Validate the email address
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Save the email to a text file (in a real-world scenario, you would use a database)
        $file = 'subscribers.txt';
        file_put_contents($file, $email . PHP_EOL, FILE_APPEND | LOCK_EX);

        // Redirect back to the landing page or a thank you page
        header('Location: index.html'); // Change 'index.html' to your actual landing page
        exit;
    } else {
        // Invalid email address, handle the error as needed
        echo "Invalid email address.";
    }
} else {
    // Invalid request method, handle the error as needed
    echo "Invalid request method.";
}
?>
