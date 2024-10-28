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
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <link href='https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap' rel='stylesheet'>
            <title>Confirmation</title>
            <style>
                * {
                    font-family: PT Sans;
                    margin: 0;
                    padding: 0;
        }
                body {

                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    background-color: #f9f9f9;
                }
                .confirmation {
                    padding: 20px;
                    background-color: #061826;
                    border-radius: 8px;
                    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                    text-align: center;
                    max-width: 400px;
                    width: 100%;
                    color:#EACDC2;
                }
                .confirmation button {
                    width: 40%;
                    padding: 10px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    margin-top:10px;
                    background color: #EACDC2;
                    transition: background-color 0.3s;
                }

                .confirmation button:hover {
                    background-color: #8B5D33;
                    color:#061826;
               }       

                .error { color: red; }
            </style>
        </head>
        <body>
            <div class='confirmation'>
                <h2>Thank You, $fullname!</h2>
                <p>Your information has been submitted successfully.</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Gender:</strong> $gender</p>
                <p><strong>Save info:</strong>$info</p>
                <a href='index.php'><button>Go back to the form</button></a>
            </div>
        </body>
        </html>";
    }
} else {
    echo "Invalid request.";
}
?>