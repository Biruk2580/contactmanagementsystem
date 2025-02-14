<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<?php
include_once("connection.php");

$result = mysqli_query($mysqli, "SELECT * FROM contacts WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
$totalContacts = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>MyContact - View Contacts</title>

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">

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
      color: #3498db;
    }

    .container {
      margin-top: 50px;
    }

    .table-dark {
      background-color: #333;
    }

    .table-dark th, .table-dark td {
      color: #e0e0e0;
    }

    .search-container {
      margin-bottom: 20px;
      text-align: right;
    }

    .search-container input {
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #3498db;
      background-color: #222;
      color: #fff;
    }

    .search-container input:focus {
      border-color: #3498db;
    }

    .statistics {
      margin-bottom: 20px;
      background-color: #2d2d2d;
      padding: 15px;
      border-radius: 5px;
      color: #e0e0e0;
    }

    .statistics h3 {
      color: #3498db;
    }

    .btn {
      background-color: #3498db;
      color: white;
      padding: 10px 20px;
      border-radius: 5px;
      text-decoration: none;
    }

    .btn:hover {
      background-color: #2980b9;
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
      color: #3498db;
    }
  </style>

</head>

<body>

  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="logo">
        <h1><a href="index.php">MyContact</a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link" href="index.php">Home</a></li>
          <li><a class="nav-link" href="add.php">Add New Contact</a></li>
          <li><a class="nav-link" href="logout.php">Logout</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main id="main" class="container">
    <div class="statistics">
      <h3>Statistics</h3>
      <p><strong>Total Contacts:</strong> <?php echo $totalContacts; ?></p>
    </div>

    <div class="search-container">
      <input type="text" id="searchInput" placeholder="Search Contacts..." onkeyup="searchContacts()">
    </div>

    <table class="table table-dark table-bordered" id="contactsTable">
      <thead>
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Phone Number</th>
          <th>Address</th>
          <th>Note</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while($res = mysqli_fetch_array($result)) {		
          echo "<tr>";
          echo "<td>".$res['firstname']."</td>";
          echo "<td>".$res['lastname']."</td>";
          echo "<td>".$res['phone']."</td>";	
          echo "<td>".$res['address']."</td>";	
          echo "<td>".$res['note']."</td>";	
          echo "<td><a href=\"edit.php?id=$res[id]\" class='btn'>Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\" class='btn'>Delete</a></td>";		
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </main>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script>
    function searchContacts() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("searchInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("contactsTable");
      tr = table.getElementsByTagName("tr");

      for (i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        var match = false;
        for (var j = 0; j < td.length - 1; j++) {
          if (td[j]) {
            txtValue = td[j].textContent || td[j].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
              match = true;
              break;
            }
          }
        }
        if (match) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  </script>

</body>
</html>