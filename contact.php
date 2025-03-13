<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CONTACT</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <link href="css/style.css" rel="stylesheet">
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Logo</a>
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
            <a class="nav-link" href="#contact">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <h2 style="text-align: center; font-weight: bold; margin-top: 80px;">Contact Us</h2>
  </div>
      
<section id="contact" class="contact">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="info">
          <div class="address">
            <i class="bi bi-geo-alt"></i>
            <h4>Location:</h4>
            <p>Rizal St, Iloilo City, Iloilo, 5000, Philippines</p>
          </div>
          <div class="email">
            <i class="bi bi-envelope"></i>
            <h4>Email:</h4>
            <p>petloveco@gmail.com</p>
          </div>
          <div class="phone">
            <i class="bi bi-phone"></i>
            <h4>Call:</h4>
            <p>+639709325800</p>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3876.267175189087!2d122.56432541424183!3d10.710243962428819!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a9f4baeeb30e7f%3A0x9e36b0ac0c35d32d!2sRizal%20St%2C%20Iloilo%20City%2C%20Iloilo!5e0!3m2!1sen!2sph!4v1648244076345!5m2!1sen!2sph" width="100%" height="270" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <form action="forms/contact.php" method="post" role="form" class="php-email-form contact-form">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="name">Your Name</label>
              <input type="text" name="name" class="form-control" id="name" required>
            </div>
            <div class="form-group col-md-6">
              <label for="email">Your Email</label>
              <input type="email" class="form-control" name="email" id="email" required>
            </div>
          </div>
          <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" name="subject" id="subject" required>
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" name="message" rows="6" required></textarea>
          </div>
          <div class="text-center">
            <button type="submit">Send Message</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6 footer-info">
        <h3>PetLoveCo</h3>
        <p>Welcome to PetLoveCo, your ultimate destination for pet lovers and owners. Join our community and explore a world dedicated to the love and well-being of pets.</p>
      </div>
      <div class="col-lg-4 col-md-6 footer-links">
        <h4>Useful Links</h4>
        <ul>
          <li><a href="#home">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </div>
      <div class="col-lg-4 col-md-6 footer-contact">
        <h4>Contact Us</h4>
        <p>
          Rizal St, Iloilo City, Iloilo, 5000, Philippines<br>
          <strong>Email:</strong> petloveco@gmail.com<br>
          <strong>Phone:</strong> +639709325800
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <p class="text-center">&copy; 2024 PetLoveCo. All rights reserved.</p>
      </div>
    </div>
  </div>
</footer>



  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
