<?php
session_start();

if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
    exit();
}

$firstname = NULL;
$lastname = NULL;
$phone = NULL;
$address = NULL;
$note = NULL;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data</title>
    <script>
        function showPopup(message, type) {
            var popup = document.createElement("div");
            popup.className = "popup " + type;
            popup.innerHTML = message;
            document.body.appendChild(popup);
            setTimeout(function() {
                popup.remove();
            }, 5000);
        }
    </script>

    <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
            font-family: 'Poppins', sans-serif;
        }

        #header {
            background-color: #1c1c1c;
            padding: 15px;
            position: sticky;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        #header a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            margin: 0 15px;
        }

        #header a:hover {
            color: #BB86FC;
        }

        .container {
            margin-top: 50px;
        }

        .form-container {
            background-color: #2d2d2d;
            padding: 20px;
            border-radius: 10px;
            max-width: 600px;
            margin: 0 auto;
        }

        .form-container h2 {
            color: #BB86FC;
            text-align: center;
        }

        .form-container input {
            width: 90%;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            background-color: #333;
            color: #e0e0e0;
            border: 1px solid #3498db;
        }

        .form-container input:focus {
            border-color: #BB86FC;
        }

        .form-container input[type="submit"] {
            background-color: #6200EE;
            color: white;
            border: none;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #3700B3;
        }

        .navbar {
            background-color: #333;
            padding: 10px;
            font-size: 16px;
        }

        .navbar a {
            color: #e0e0e0;
            text-decoration: none;
            margin-right: 20px;
        }

        .navbar a:hover {
            color: #BB86FC;
        }

        .popup {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: #333;
            color: white;
            padding: 15px;
            border-radius: 5px;
            font-size: 16px;
            z-index: 9999;
            text-align: center;
        }

        .popup.success {
            background-color: #4CAF50;
        }

        .popup.error {
            background-color: #f44336;
        }

        .center-btn-container {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .get-started-btn {
            background-color: #2ecc71;
            color: white;
            padding: 12px 30px;
            font-size: 18px;
            border-radius: 5px;
            text-decoration: none;
        }

        .get-started-btn:hover {
            background-color: #27ae60;
        }
        .nav {
            text-align: center;
            margin: 20px 0;
        }
        .nav a {
            margin: 0 10px;
            text-decoration: none;
            color: #BB86FC;
            font-size: 16px;
        }
        .nav a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

  <header id="header" class="fixed-top">
  <div class="nav">
        <a href="index.php">Home</a> | <a href="view.php">View Contacts</a> | <a href="logout.php">Logout</a>
    </div>

  </header>

  <main id="main" class="container">
    <div class="form-container">
      <h2>Add New Contact</h2>

      <form action="add.php" method="post" name="form1">
        <input type="text" name="firstname" placeholder="First Name" required>
        <input type="text" name="lastname" placeholder="Last Name" required>
        <input type="text" name="phone" placeholder="Phone Number" required>
        <input type="text" name="address" placeholder="Address" required>
        <input type="text" name="note" placeholder="Note" required>

        <input type="submit" name="Submit" value="Add Contact">
      </form>
    </div>

    <?php if (!isset($_SESSION['valid'])) { ?>
      <div class="center-btn-container">
        <a href="register.php" class="get-started-btn">Get Started</a>
      </div>
    <?php } ?>
  </main>

  <?php
    include_once("connection.php");

    if (isset($_POST['Submit'])) {
        $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
        $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $address = isset($_POST['address']) ? $_POST['address'] : '';
        $note = isset($_POST['note']) ? $_POST['note'] : '';
        $loginId = $_SESSION['id'];

        if (empty($firstname) || empty($lastname) || empty($phone) || empty($address) || empty($note)) {
            if (empty($firstname)) {
                echo "<script>showPopup('First Name field is empty.', 'error');</script>";
            }
            if (empty($lastname)) {
                echo "<script>showPopup('Last Name field is empty.', 'error');</script>";
            }
            if (empty($phone)) {
                echo "<script>showPopup('Phone field is empty.', 'error');</script>";
            }
            if (empty($address)) {
                echo "<script>showPopup('Address field is empty.', 'error');</script>";
            }
            if (empty($note)) {
                echo "<script>showPopup('Note field is empty.', 'error');</script>";
            }
        } else {
            $stmt = $mysqli->prepare("INSERT INTO contacts(firstname, lastname, phone, address, note, login_id) VALUES(?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssi", $firstname, $lastname, $phone, $address, $note, $loginId);

            if ($stmt->execute()) {
                echo "<script>showPopup('Data added successfully.', 'success');</script>";
                echo "<script>setTimeout(function(){ window.location.href = 'view.php'; }, 3000);</script>";
            } else {
                echo "<script>showPopup('Error: " . $stmt->error . "', 'error');</script>";
            }

            $stmt->close();
        }
    }
  ?>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
