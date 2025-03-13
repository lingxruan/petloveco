<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PetLoveCo</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

  <link href="css/style.css" rel="stylesheet">
  <style>
    .home .container {
  padding-left: 15px; /* Adjust this value as needed */
  padding-right: 15px;
}

.home .row {
  margin-left: -15px;
  margin-right: -15px;
}

@media (max-width: 768px) {
  .home .container,
  .home .row {
    padding-left: 0;
    padding-right: 0;
    margin-left: 0;
    margin-right: 0;
  }
}
 /* CSS for animation */
 .section-title {
      text-align: center; /* Center horizontally */
      position: relative;
    }

    .section-title h2 {
      display: inline-block;
      font-weight: bold;
      position: relative;
    }

    .section-title h2::after {
      content: '';
      position: absolute;
      left: 0;
      right: 0;
      bottom: -5px;
      height: 2px;
      background: linear-gradient(115deg, #3cc5d7, #47d794, #3498db);
      animation: underline 2s linear infinite;
    }

    @keyframes underline {
      0% {
        transform: scaleX(0);
      }
      50% {
        transform: scaleX(1);
      }
      100% {
        transform: scaleX(0);
      }
    }
    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }
</style>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#home"><img src= "img/1.png" alt="" width="50" height="50"></a> <span class="navbar-text" style="font-weight: bold; color: white; font-family: Arial, sans-serif; font-size: 18px;">PETLOVECO</span>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
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

  <section id="home" class="home" style="background-image: url('img/cover.jpg'); background-size: cover; background-position: center; height: 500px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
          <div>
            <h1 style="font-family: 'Roboto', sans-serif; font-weight: bold; margin-bottom: 20px; margin-top: 170px; color: white;">Connect with Pet Lovers</h1>
            <h2 style="font-family: 'Roboto', sans-serif; margin-bottom: 20px; color: white;">Join a community dedicated to the love and well-being of pets</h2>
            <div class="d-flex justify-content-start">
              <a href="#about" class="btn-get-started scrollto" style="background: linear-gradient(115deg, #3cc5d7, #47d794, #3498db); color: white; margin-right: 10px; padding: 10px; text-decoration: none; border-radius: 10px; margin-bottom: 10px;">Explore More</a>
              <a href="signup.php" class="btn-get-started scrollto" style="background: linear-gradient(115deg, #3cc5d7, #47d794, #3498db); color: white; margin-right: 10px; padding: 10px; text-decoration: none; border-radius: 10px; margin-bottom: 10px;">Sign Up</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <!--About-->
  <section id="about" class="about">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2 style="font-weight: bold;">About PetLoveCo</h2>
    </div>

    <div class="row content">
      <div class="col-lg-6">
        <p>
          Welcome to PetLoveCo, a haven for pet lovers and owners alike. Our mission is to provide a comprehensive platform dedicated to enhancing the lives of pets and their humans.
        </p>
        <p>
          Whether you're seeking to reunite with a lost furry friend, seeking valuable tips and recommendations, or exploring the distinctive features of various dog and cat breeds, PetLoveCo is your go-to destination.
        </p>
        <p>
          At PetLoveCo, we understand the deep bond between pets and their owners, and we're committed to fostering a community where knowledge-sharing and pet welfare are paramount.
        </p>
        <ul>
          <li><i class="ri-check-double-line"></i> Explore our Lost and Found section to help reunite lost pets with their families.</li>
          <li><i class="ri-check-double-line"></i> Discover insightful tips and recommendations to enhance your pet care journey.</li>
          <li><i class="ri-check-double-line"></i> Learn about the unique characteristics and traits of various dog and cat breeds.</li>
        </ul>
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0">
        <p>
          PetLoveCo is more than just a website; it's a community-driven platform dedicated to celebrating the joys of pet ownership. Our team of passionate pet enthusiasts is here to support you every step of the way.
        </p>
        <p>
          Join us on this exciting journey as we strive to create a world where every pet receives the love, care, and attention they deserve.
        </p>
        <p>
          Ready to embark on an adventure with PetLoveCo? Click below to start exploring!
        </p>
        <button type="button" class="btn-learn-more" data-toggle="modal" data-target="#learnMoreModal" style=" background: linear-gradient(115deg, #3cc5d7, #47d794, #3498db)">Learn More</button>
      </div>
    </div>
  </div>
</section>

<!-- Modal for Learn More-->
<div class="modal fade" id="learnMoreModal" tabindex="-1" role="dialog" aria-labelledby="learnMoreModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="learnMoreModalLabel">Learn More</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Welcome to PetLoveCo!</p>
        <p>At PetLoveCo, we offer various features tailored to pet lovers and owners:</p>
        <ul>
          <li><strong>Lost and Found:</strong> Report lost or found pets to help reunite them with their families.</li>
          <li><strong>Tips and Recommendations:</strong> Explore valuable tips and recommendations to enhance your pet care journey.</li>
          <li><strong>Dog and Cat Breed Information:</strong> Learn about the unique characteristics and traits of different dog and cat breeds.</li>
          <li><strong>PetLoveCommunity:</strong> Share your beloved pets with our community and connect with fellow pet lovers.</li>
        </ul>
        <p>Our platform is dedicated to fostering a community where pet welfare is paramount. Join us today!</p>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background: linear-gradient(115deg, #3cc5d7, #47d794, #3498db); border: none;">Close</button>
      </div>
    </div>
  </div>
</div>




      <!--FAQs-->
      <section id="faq" class="faq section-bg">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2 style="font-weight: bold; text-align: center;">Frequently Asked Questions</h2>
            <p style="margin-top: 10px;">Find answers to common queries about PetLoveCo. If you have any other questions, feel free to contact us.</p>
          </div>

          <div class="faq-list">
            <ul>
              <li data-aos="fade-up" data-aos-delay="100">
                <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">How can I report a lost pet? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                  <p>
                    To report a lost pet, please visit our Lost and Found section and post the necessary information about your pet.
                </div>
              </li>

              <li data-aos="fade-up" data-aos-delay="200">
                <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">How can I contribute to PetLoveCo's community? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    You can contribute to PetLoveCo's community by sharing your pet-related experiences, participating in discussions, and providing valuable insights to fellow pet lovers. Join us and be part of our vibrant community!
                  </p>
                </div>
              </li>

              <li data-aos="fade-up" data-aos-delay="300">
                <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed">How do I find pet care tips and recommendations? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    You can find pet care tips and recommendations on our website under the Tips and Recommendation section. Explore a wide range of articles and resources to help you provide the best care for your furry friends.
                  </p>
                </div>
              </li>

              <li data-aos="fade-up" data-aos-delay="400">
                <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed">How can I learn more about different dog and cat breeds? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    You can learn more about different dog and cat breeds in our Breed Features section. Discover the unique characteristics, traits, and history of various breeds to help you make informed decisions when choosing a pet.
                  </p>
                </div>
              </li>

              <li data-aos="fade-up" data-aos-delay="500">
                <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed">How do I report a bug or provide feedback about the website? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    To report a bug or provide feedback about the website, please contact our support team through the Contact Us page. We appreciate your input and strive to continually improve our platform.
                  </p>
                </div>
              </li>

            </ul>
          </div>
        </div>
      </section>


      <section id="contact" class="contact">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
    <h2 style="text-align: center; font-weight: bold;">Contact Us</h2>
    </div>
    <div class="row" style="margin-top: 10px;">
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
<!-- JavaScript and dependencies -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
