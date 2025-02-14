<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<?php
include_once("connection.php");

if(isset($_POST['update']))
{	
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $note = $_POST['note'];
    
    if(empty($firstname) || empty($lastname) || empty($phone) || empty($address) || empty($note)) {
        $error_messages = [];
        if(empty($firstname)) { $error_messages[] = "FirstName field is empty."; }
        if(empty($lastname)) { $error_messages[] = "LastName field is empty."; }
        if(empty($phone)) { $error_messages[] = "Phone field is empty."; }
        if(empty($address)) { $error_messages[] = "Address field is empty."; }
        if(empty($note)) { $error_messages[] = "Note field is empty."; }
    }
    else {	
        $result = mysqli_query($mysqli, "UPDATE contacts SET firstname='$firstname', lastname='$lastname', phone='$phone' , address='$address' , note='$note' WHERE id=$id");
        header("Location: view.php");
    }
}
?>

<?php
$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM contacts WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
    $firstname = $res['firstname'];
    $lastname = $res['lastname'];
    $phone = $res['phone'];
    $address = $res['address'];
    $note = $res['note'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #E0E0E0;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            background-color: #1E1E1E;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        h1 {
            text-align: center;
            color: #BB86FC;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            font-weight: bold;
            display: block;
            color: #E0E0E0;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #333;
            border-radius: 5px;
            font-size: 16px;
            background-color: #333;
            color: #E0E0E0;
        }
        .form-group input:focus {
            border-color: #BB86FC;
        }
        .btn {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #6200EE;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        .btn:hover {
            background-color: #3700B3;
        }
        .error {
            color: #CF6679;
            font-size: 14px;
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
    <div class="nav">
        <a href="index.php">Home</a> | <a href="view.php">View Contacts</a> | <a href="logout.php">Logout</a>
    </div>

    <div class="container">
        <h1>Edit Contact</h1>

        <?php if (!empty($error_messages)): ?>
            <div class="error">
                <ul>
                    <?php foreach ($error_messages as $message): ?>
                        <li><?php echo $message; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form name="form1" method="post" action="edit.php">
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" name="firstname" id="firstname" value="<?php echo $firstname;?>" required>
            </div>

            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" id="lastname" value="<?php echo $lastname;?>" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" value="<?php echo $phone;?>" required>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" value="<?php echo $address;?>" required>
            </div>

            <div class="form-group">
                <label for="note">Note</label>
                <input type="text" name="note" id="note" value="<?php echo $note;?>" required>
            </div>

            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
            <input type="submit" name="update" value="Update" class="btn">
        </form>
    </div>
</body>
</html>