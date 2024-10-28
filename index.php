<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <title>Register Here</title>
    <style>
        .error { color: red; }
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
        .forms {
            padding: 50px;
            width: 50%;
            max-width: 600px; 
            background-color: #061826; 
            border-radius: 8px; 
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            color: #EACDC2;
        }
        .text input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .button input {
            width: 20%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background color: #EACDC2;
            transition: background-color 0.3s;
        }
        .button input:hover {
        background-color: #8B5D33;
        color:#061826;
               } 
        
    </style>
</head>
<body>
    <div class="forms"> 
    <h1>User Information Form</h1>
    <div class="action">
    <form action="action.php" method="POST">
        <div class="text">
        <label for="fullname">Full Name:</label>
        <input type="text" id="fullname" name="fullname" required>
        <span class="error" id="nameError"></span><br>

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required>
        <span class="error" id="emailError"></span><br><br>
        </div>

        <label>Gender:</label><br>
        <input type="radio" id="male" name="gender" value="Male">
        <label for="male">Male</label><br>
        <input type="radio" id="female" name="gender" value="Female">
        <label for="female">Female</label><br>
        <input type="radio" id="other" name="gender" value="Prefer not to say">
        <label for="other">Prefer not to say</label><br><br>

        <label for="info">Save info: </label>
        <input type="checkbox" id="info" name="info" value="yes"><br><br>

        <div class="button">
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
        </div>
    </form>
    </div>
    </div>

    <script>

        document.querySelector("form").onsubmit = function() {
            const name = document.getElementById('fullname').value;
            const email = document.getElementById('email').value;
            let valid = true;

            if (!name) {
                document.getElementById('nameError').innerText = "Full Name is required.";
                valid = false;
            } else {
                document.getElementById('nameError').innerText = "";
            }

            if (!email) {
                document.getElementById('emailError').innerText = "Email Address is required.";
                valid = false;
            } else if (!/^\S+@\S+\.\S+$/.test(email)) {
                document.getElementById('emailError').innerText = "Email Address is not valid.";
                valid = false;
            } else {
                document.getElementById('emailError').innerText = "";
            }

            return valid; 
        };
    </script>
</body>
</html>