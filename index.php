<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - MyContact</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">

  <style>
    body {
      background-color: #121212;
      color: #2d2d2d;
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

    #hero {
      color: #fff;
      padding: 100px 0;
      text-align: center;
    }

    #hero h1 {
      font-size: 50px;
      font-weight: bold;
    }

    .main-content {
      padding: 40px 20px;
      text-align: center;
    }

    .dashboard-card {
      background-color: #2d2d2d;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
      border-radius: 8px;
      padding: 20px;
      margin: 10px;
      width: 300px;
      display: inline-block;
      color: #e0e0e0;
    }

    .dashboard-card h3 {
      font-size: 24px;
      margin-bottom: 15px;
      color: #ecf0f1;
    }

    .dashboard-card p {
      font-size: 16px;
      margin-bottom: 15px;
      color: #bdc3c7;
    }

    .dashboard-card .btn {
      background-color: #3498db;
      color: white;
      padding: 10px 20px;
      border-radius: 5px;
      text-decoration: none;
    }

    .dashboard-card .btn:hover {
      background-color: #2980b9;
    }

    #footer {
      background-color: #1c1c1c;
      color: white;
      padding: 20px;
      text-align: center;
      margin-top: 20px;
    }

    .navbar {
      background-color: #000;
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

    .navbar .active {
      color: #3498db;
    }

    .get-started-btn {
      background-color: #2ecc71;
      color: white;
      padding: 12px 30px;
      font-size: 18px;
      border-radius: 5px;
      text-decoration: none;
      margin-top: 20px;
      display: inline-block;
    }

    .get-started-btn:hover {
      background-color: #27ae60;
    }

    .center-btn-container {
      display: flex;
      justify-content: center;
      margin-top: 30px;
    }
  </style>
</head>

<body>

  <header id="header" class="fixed-top header-transparent">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="logo">
        <h1><a href="index.php">MyContact</a></h1>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          
          <?php if (isset($_SESSION['valid'])) { ?>
            <li><a class="nav-link scrollto" href="view.php">MyContacts</a></li>
          <?php } ?>
          
          <li><a href="services.php" class="nav-link">Services</a></li>
          
          <?php if (isset($_SESSION['valid'])) { ?>
            <li><a href="logout.php" class="nav-link">Logout</a></li>
          <?php } else { ?>
            <li><a href="login.php" class="nav-link">Login</a></li>
          <?php } ?>

          <?php if (!isset($_SESSION['valid'])) { ?>
            <li><a href="register.php" class="get-started-btn">Get Started</a></li>
          <?php } ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>

  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>Save YourContacs Here ! </h1>
      <h2>Your app manage contacs</h2>
    </div>
  </section>

  <main id="main">
    <div class="main-content">
      <h2>Welcome, <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : 'User'; ?>!</h2>

      <div class="dashboard-card">
        <h3>View Contacts</h3>
        <p>See all the contacts in your account.</p>
        <a href="view.php" class="btn">View Contacts</a>
      </div>

      <div class="dashboard-card">
        <h3>Add Contact</h3>
        <p>Add new contacts to your account.</p>
        <a href="add.php" class="btn">Add Contact</a>
      </div>

      <?php if (!isset($_SESSION['valid'])) { ?>
        <div class="center-btn-container">
          <a href="register.php" class="get-started-btn">Get Started</a>
        </div>
      <?php } ?>

    </div>
  </main>

  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <script src="assets/js/main.js"></script>

</body>

</html>