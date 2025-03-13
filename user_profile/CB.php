<?php

include "../conn.php";
session_start();

if(isset($_SESSION['email'])) {
$e = $_SESSION['email'];

$getname = mysqli_query($conn, "SELECT * FROM users WHERE email='$e'");
while($row = mysqli_fetch_object($getname)){
    $fullname = $row -> fullname;
    $profile_pic = $row -> profile_pic;
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cat Breed</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

  <link href="../css/home.css" rel="stylesheet">
  <link href="../css/breed.css" rel="stylesheet">
  
  <style>
    .image-container {
        margin-bottom: 20px;
    }

    .image-container img {
        height: 300px; /* Adjust this value as needed */
        width: auto; /* Maintain aspect ratio */
    }

    .btn:hover {
        background: linear-gradient(90deg, rgba(60, 197, 215, 0.5), rgba(71, 215, 148, 0.5));
        color: black;
        font-weight: bold;
    }

    .btn {
        background: linear-gradient(115deg, #3cc5d7, #47d794, #3498db)
    }
</style>

</head>
<body>

<header class="header">
  <div class="container-fluid d-flex justify-content-between align-items-center">
    <button id="sidebarCollapse" type="button">
      <i class="fas fa-bars"></i>
    </button>

    <div class="search-bar-container">
      <input class="form-control mr-sm-2 search-bar" type="search" placeholder="Search" aria-label="Search">
      <i class="fas fa-search search-icon"></i>
    </div>

    <a href="#" role="button" id="notificationsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: black; text-decoration: none; margin-right: 10px;">
        <i class="far fa-bell fa-lg" style="color: white;"></i>
    </a>
    <a href="#" role="button" id="messagesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: black; text-decoration: none; margin-right: 10px;">
        <i class="far fa-envelope fa-lg" style="color: white;"></i>
    </a>
    
    <div class="ml-auto dropdown">
    <img class="header-img" src="../profile_pictures/<?php echo $profile_pic;?>" class="rounded-circle" alt="User Image">
    <a class="navbar-text mr-2 dropdown-toggle user-name" href="#" role="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: black; text-decoration: none;">
        <?php echo $fullname;?>
    </a>
      <div class="dropdown-menu" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="profile.php">
          <i class="fas fa-user-circle"></i> Profile
        </a>
        <a class="dropdown-item" href="privacy_settings.php">
          <i class="fas fa-cog"></i> Settings
        </a>
        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#helpModal">
            <i class="fas fa-question-circle"></i> Need Help?
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#signoutModal">
        <i class="fas fa-sign-out-alt"></i> Sign Out
    </a>
  </div>
    </div>
  </div>
</header>

<!-- Modal for Sign Out Confirmation -->
<div class="modal fade" id="signoutModal" tabindex="-1" aria-labelledby="signoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signoutModalLabel">Sign Out Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to sign out?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="signout.php">Sign Out</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Help -->
<div class="modal fade" id="helpModal" tabindex="-1" aria-labelledby="helpModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="helpModalLabel">Help Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control" id="message" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn">Send</button>
            </div>
        </div>
    </div>
</div>

<!-- Sidebar -->
<div class="wrapper">
  <nav id="sidebar" class="sidebar">
    <div class="sidebar-header">
      <div class="header-brand">
        <img src="../profile_pictures/<?php echo $profile_pic;?>" class="rounded-circle" alt="User Image">
        <p style="margin-bottom: 5px; text-align: center; font-weight: bold;"><?php echo $fullname;?></p>
        <div class="social-icons" style="text-align: center;">
          <a href="#" style="display: inline-block; margin: 0 5px;"><i class="fab fa-instagram"></i></a>
          <a href="#" style="display: inline-block; margin: 0 5px;"><i class="fab fa-facebook-f"></i></a>
        </div>
      </div>
    </div>
    <ul class="list-unstyled components">
      <li class="active">
        <a href="home.php">
          <i class="fas fa-home"></i> Home
        </a>
      </li>
      <hr></hr>
      <li>
        <a href="profile.php">
          <i class="fas fa-user"></i> Profile
        </a>
      </li>
      <li>
        <a href="LAF.php">
          <i class="fas fa-search"></i> Lost and Found
        </a>
      </li>
      <li>
        <a href="CB.php">
          <i class="fas fa-paw"></i> Pet Breeds
        </a>
      </li>
      <li>
        <a href="TAR.php">
          <i class="fas fa-paw"></i> Pet-Friendly Tips and Recommendation
        </a>
      </li>
    </ul>

    <!-- Close button inside sidebar -->
    <i class="fas fa-times close-sidebar"></i>
  </nav>
  
  <div class="text-center" style="text-align: center;">
    <style>
        .text-center p a {
            text-decoration: none;
            color: black;
            font-weight: normal;
            padding: 5px 10px;
            font-weight: bold;
        }
        .text-center p a:hover {
            background: linear-gradient(90deg, rgba(60, 197, 215, 0.5), rgba(71, 215, 148, 0.5));
            color: white;
            font-weight: bold;
        }
    </style>
    <p style="padding-top: 20px;"><a href="DB.php">DOG BREED'S</a> &nbsp; | &nbsp;<span><a href="CB.php">CAT BREED'S</a></span></p>
</div>
  <!-- Image Grid -->
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6 mb-4 image-container">
        <img src="img/cb/Abyssinian.jpg" class="img-fluid" alt="Image 1">
        <h5 class="card-title" style="padding-top: 10px;">Abyssinian</h5>
                <p>The Abyssinian /æbɪˈsɪniən/ is a breed of domestic short-haired cat with a distinctive "ticked" tabby coat, in which individual hairs are banded with different colors. They are also known simply as Abys. The first members of the breed to be exhibited in England were brought there from Abyssinia (now known as Ethiopia), whence the name.</p>
            </div>
      <div class="col-lg-3 col-md-6 mb-4 image-container">
        <img src="img/cb/Balinese cat.jpg" class="img-fluid" alt="Image 1">
        <h5 class="card-title" style="padding-top: 10px;">Balinese Cat</h5>
                <p>The Balinese is a long-haired breed of domestic cat with Siamese-style point coloration and sapphire-blue eyes. The Balinese is also known as the purebred long-haired Siamese since it originated as a natural mutation of that breed and hence is essentially the same cat but with a medium-length silky coat and a distinctively plumed tail.</p>
            </div>
      <div class="col-lg-3 col-md-6 mb-4 image-container">
        <img src="img/cb/Bombay cat.jpg" class="img-fluid" alt="Image 1">
        <h5 class="card-title" style="padding-top: 10px;">Bombay Cat</h5>
                <p>The Bombay cat is a short-haired breed of domestic cat. Bombays are glossy solid black cats with a muscular build, and have characteristic large bright copper-golden eyes. The breed is named after the Indian city of Bombay (Mumbai), referring to the habitat of the Indian black leopard.</p>
            </div>
      <div class="col-lg-3 col-md-6 mb-4 image-container">
        <img src="img/cb/British Shorthair.jpg" class="img-fluid" alt="Image 1">
        <h5 class="card-title" style="padding-top: 10px;">British Shorthair</h5>
                <p>The British Shorthair is the pedigreed version of the traditional British domestic cat, with a distinctively stocky body, thick coat, and broad face. The most familiar colour variant is the "British Blue", with a solid grey-blue coat, pineapple eyes, and a medium-sized tail. The breed has also been developed in a wide range of other colours and patterns, including tabby and colourpoint.</p>
            </div>
      <div class="col-lg-3 col-md-6 mb-4 image-container">
        <img src="img/cb/Maine Coon.jpg" class="img-fluid" alt="Image 1">
        <h5 class="card-title" style="padding-top: 10px;">Maine Coon</h5>
                <p>The Maine Coon is a large and social cat, which could be the reason why it has a reputation of being referred to as "the gentle giant." The Maine Coon is predominantly known for its size and dense coat of fur which helps it survive in the harsh climate of Maine. The Maine Coon is often cited as having "dog-like" characteristics.</p>
            </div>
      <div class="col-lg-3 col-md-6 mb-4 image-container">
        <img src="img/cb/Munchkin cat.jpg" class="img-fluid" alt="Image 1">
        <h5 class="card-title" style="padding-top: 10px;">Munchkin Cat</h5>
                <p>The Munchkin is a breed of cat characterized by its very short legs, which are caused by genetic mutation. Compared to many other cat breeds, it is a relatively new breed, documented since 1940s and officially recognized in 1991. The Munchkin is considered to be the original breed of dwarf cat.</p>
            </div>
      <div class="col-lg-3 col-md-6 mb-4 image-container">
        <img src="img/cb/Persian cat.jpg" class="img-fluid" alt="Image 1">
        <h5 class="card-title" style="padding-top: 10px;">Persian Cat</h5>
                <p>The Persian cat, also known as the Persian Longhair, is a long-haired breed of cat characterised by a round face and short muzzle. The first documented ancestors of Persian cats might have been imported into Italy from Khorasan as early as around 1620, however, this has not been proven. </p>
            </div>
      <div class="col-lg-3 col-md-6 mb-4 image-container">
        <img src="img/cb/Ragdoll.jpg" class="img-fluid" alt="Image 1">
        <h5 class="card-title" style="padding-top: 10px;">Ragdoll</h5>
                <p>The Ragdoll is a breed of cat with a distinct colorpoint coat and blue eyes. Its morphology is large and weighty, and it has a semi-long and silky soft coat. American breeder Ann Baker developed Ragdolls in the 1960s. They are best known for their docile, placid temperament and affectionate nature.</p>
            </div>
      <div class="col-lg-3 col-md-6 mb-4 image-container">
        <img src="img/cb/Russian Blue.jpg" class="img-fluid" alt="Image 1">
        <h5 class="card-title" style="padding-top: 10px;">Russian Blue</h5>
                <p>The Russian Blue cat (Russian: Русская голубая кошка, romanized: Russkaya golubaya koshka), commonly referred to as just Russian Blue, is a cat breed with colors that vary from a light shimmering silver to a darker, slate grey. The short, dense coat, which stands out from the body, has been the breed's hallmark for more than a century.</p>
            </div>
      <div class="col-lg-3 col-md-6 mb-4 image-container">
        <img src="img/cb/Scottish Fold.jpg" class="img-fluid" alt="Image 1">
        <h5 class="card-title" style="padding-top: 10px;">Scottish Fold</h5>
                <p>The Scottish Fold is a distinctive breed of domestic cat characterised by a natural dominant gene mutation associated with osteochondrodysplasia. This genetic anomaly affects cartilage throughout the body, causing the ears to "fold", bending forward and down towards the front of the head. </p>
            </div>
      <div class="col-lg-3 col-md-6 mb-4 image-container">
        <img src="img/cb/Siamese_cat.jpg" class="img-fluid" alt="Image 1">
        <h5 class="card-title" style="padding-top: 10px;">Siamese Cat</h5>
                <p>The Siamese cat is one of the first distinctly recognised breeds of Asian cat. Derived from the Wichianmat landrace, one of several varieties of cats native to Thailand (formerly known as Siam), the original Siamese became one of the most popular breeds in Europe and North America in the 19th century.</p>
            </div>
      <div class="col-lg-3 col-md-6 mb-4 image-container">
        <img src="img/cb/Sphynx cat.jpg" class="img-fluid" alt="Image 1">
        <h5 class="card-title" style="padding-top: 10px;">Sphynx Cat</h5>
                <p>The Sphynx cat (pronounced SFINKS, /ˈsfɪŋks/) also known as the Canadian Sphynx, is a breed of cat known for its lack of fur. Hairlessness in cats is a naturally occurring genetic mutation, and the Sphynx was developed through selective breeding of these animals, starting in the 1960s.</p>
            </div>
    </div>
  </div>
</div>

<!-- Footer section -->
<footer style="text-align: center; background-color: #f8f9fa; padding: 20px;">
    <p>&copy; 2024 PetLoveCo. All rights reserved.</p>
</footer>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


<script src="../js/main.js"></script>

</body>
</html>
