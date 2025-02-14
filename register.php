<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #121212;
            color: #ffffff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        a {
            color: #82c6ff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Back to Home Image */
        .back-to-home {
            margin-top: 20px;
            margin-bottom: 30px;
        }

        .back-to-home img {
            width: 150px;
            cursor: pointer;
        }

        /* Main Form Container */
        .form-container {
            width: 100%;
            max-width: 400px;
            background-color: #2a2a2a;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            color: #ffffff;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        /* Form Input Fields */
        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            background-color: #333333;
            border: 1px solid #444;
            color: #fff;
            border-radius: 5px;
            font-size: 1rem;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #82c6ff;
        }

        input[type="submit"] {
            background-color: #82c6ff;
            border: none;
            color: #121212;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #66a3cc;
        }

        /* Link Styling */
        .link-container {
            margin-top: 20px;
            font-size: 1rem;
        }

        .link-container a {
            color: #82c6ff;
        }

        .link-container a:hover {
            color: #66a3cc;
        }
    </style>
</head>
<body>

<!-- Back to Home Image -->


<div class="form-container">
    <?php
    include("connection.php");

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $user = $_POST['username'];
        $pass = $_POST['password'];

        if ($user == "" || $pass == "" || $name == "" || $email == "") {
            echo "<p>All fields should be filled. Either one or many fields are empty.</p>";
            echo "<div class='link-container'><a href='register.php'>Go back</a></div>";
        } else {
            mysqli_query($mysqli, "INSERT INTO login(name, email, username, password) VALUES('$name', '$email', '$user', md5('$pass'))")
                or die("Could not execute the insert query.");

            echo "<p>Registration successfully completed!</p>";
            echo "<div class='link-container'><a href='login.php'>Login</a></div>";
        }
    } else {
    ?>

    <div class="back-to-home">
    <a href="index.php">
    <img src="assets/img/profile.png" alt="Back to Home"> 
    </a>
    <h2>Create Account</h2>

</div>
    <form name="form1" method="post" action="">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="text" name="email" placeholder="Email" required>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" name="submit" value="Register">
    </form>

    <?php
    }
    ?>

    <div class="link-container">
        <p>Have an account? <a href="login.php">Login</a></p>
    </div>
</div>

</body>
</html>
