<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Read file contents
    $file = "pass.txt";
    $fileContent = file_get_contents($file);
    $credentials = explode(',', $fileContent); // Assuming username and password are comma-separated

    // Check if username and password match
    if (trim($username) === trim($credentials[0]) && trim($password) === trim($credentials[1])) {
        header("Location: homePage.php");
        // Redirect or perform actions after successful login
    } else {
        echo "Invalid username or password";
    }
}
?>
