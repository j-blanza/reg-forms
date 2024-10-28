<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $gender = isset($_POST['gender']) ? $_POST['gender'] : 'Prefer not to say';
    $info = isset($_POST['info']) ? 'Yes' : 'No';

    $errors = [];

    if (empty($fullname)) {
        $errors[] = "Full Name is required.";
    }

    if (empty($email)) {
        $errors[] = "Email Address is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email Address is not valid.";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p class='error'>$error</p>";
        }
        echo '<a href="index.php">Go back</a>';
    } else {

        $data = date('Y-m-d H:i:s') . " | $fullname | $email | $gender | $info\n";
        file_put_contents('submissions.txt', $data, FILE_APPEND);

        echo "<h2>Confirmation</h2>";
        echo "<p>Thank you, $fullname. Here is your information:</p>";
        echo "<p>Email: $email</p>";
        echo "<p>Gender: $gender</p>";
        echo "<p>Save Info: $info</p>";
    }
} else {
    echo "Invalid request.";
}
?>