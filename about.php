<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ABOUT</title>
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
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section id="home" class="home" style="background-image: url('img/cover.jpg'); background-size: cover; background-position: center;">
  <div class="say-container">
    <div class="row">
      <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
        <h1 style="font-weight: bold;">Connect with Pet Lovers</h1>
        <h2>Join a community dedicated to the love and well-being of pets</h2>
        <div class="d-flex justify-content-center justify-content-lg-start">
          <a href="#about" class="btn-get-started scrollto" style="background: linear-gradient(115deg, #3cc5d7, #47d794, #3498db); color: white; margin-right: 10px; margin-left: 50px; padding: 10px; text-decoration: none; border-radius: 10px; margin-bottom: 10px;">Explore More</a>
          <a href="signup.php" class="btn-get-started scrollto" style="background: linear-gradient(115deg, #3cc5d7, #47d794, #3498db); color: white; margin-right: 10px; margin-left: 20px; padding: 10px; text-decoration: none; border-radius: 10px; margin-bottom: 10px;">Sign Up</a>
        </div>
      </div>
      <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
        <img src="img/1.png" class="img-fluid animated" alt="PetLoveCo">
      </div>
    </div>
  </div>
</section>

  <!--About-->
  <section id="about" class="about">
  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2 style="font-weight: bold; text-align: center;">About PetLoveCo</h2>
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

      <!--FAQs-->
      <section id="faq" class="faq section-bg">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2 style="font-weight: bold; text-align: center;">Frequently Asked Questions</h2>
            <p>Find answers to common queries about PetLoveCo. If you have any other questions, feel free to contact us.</p>
          </div>

          <div class="faq-list">
            <ul>
              <li data-aos="fade-up" data-aos-delay="100">
                <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">How can I report a lost pet? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                  <p>
                    To report a lost pet, please visit our Lost and Found section and fill out the necessary information about your pet. Our team will assist you in finding your beloved companion.
                  </p>
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
