<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Oranienbaum&display=swap" rel="stylesheet">

    <title>Form Submission</title>
    <style>
        .error { color: red; }
        * {
            font-family: Oranienbaum;
        }
        .forms {
            padding: 50px;
            margin-left: ;
        }
    </style>
</head>
<body>
    <div class="forms"> 
    <h1>User Information Form</h1>
    <form action="action.php" method="POST">
        <label for="fullname">Full Name:</label>
        <input type="text" id="fullname" name="fullname" required>
        <span class="error" id="nameError"></span><br><br>

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required>
        <span class="error" id="emailError"></span><br><br>

        <label>Gender:</label><br>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label><br>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label><br>
        <input type="radio" id="other" name="gender" value="other">
        <label for="other">Prefer not to say</label><br><br>

        <label for="info">Save info: </label>
        <input type="checkbox" id="info" name="info" value="yes"><br><br>


        <input type="submit" value="Submit">
    </form>
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