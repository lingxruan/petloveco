<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SIGN IN</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <link href="css/signin.css" rel="stylesheet">
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="index.php"><img src= "img/1.png" alt="" width="50" height="50"  style=" margin-left: 15px;"></a> <span class="navbar-text" style="font-weight: bold; color: white; font-family: Arial, sans-serif; font-size: 18px;">PETLOVECO</span>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Account
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="signin.php">Sign In</a></li>
              <li><a class="dropdown-item" href="signup.php">Sign Up</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="form-container">
    <h1>Sign In</h1>
    <form action="process.php" method="POST">
    <label><i class="fas fa-envelope"></i> Email:</label>
    <input type="email" name="email" placeholder="Enter Email here!..."  required>

    <label><i class="fas fa-lock"></i> Password:</label>
    <input type="password" name="password" placeholder="Enter Password here!..." required>

      <input type="submit" name="signin" value="SIGN IN">
    </form>
    <p>Don't have an account? <a href="signup.php">Sign Up</a>.</p>
  </div>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
