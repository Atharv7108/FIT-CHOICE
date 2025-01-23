<?php
$servername = "localhost"; // your database host
$username = "root"; // your database username
$password = "India@11"; // your database password
$dbname = "db_fitChoice"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = $_POST['username'];
    $user_email = $_POST['email'];
    $user_password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password for security

    // Check if email already exists
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user_email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Email already registered.";
    } else {
        // Insert new user
        $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $user_name, $user_email, $user_password);
        
        if ($stmt->execute()) {
            // Registration successful, show popup and redirect
            echo "<script>
                    alert('Registration successful. Please log in for further access.');
                    window.location.href = 'signin.html';
                  </script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $stmt->close();
}
$conn->close();
?>
