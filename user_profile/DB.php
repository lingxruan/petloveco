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
        <img src="img/db/Siberian Husky.webp" class="img-fluid" alt="Image 1">
        <h5 class="card-title" style="padding-top: 10px;">Siberian Husky</h5>
                <p>The Siberian Husky is a medium-sized working sled dog breed. The breed belongs to the Spitz genetic family. It is recognizable by its thickly furred double coat, erect triangular ears, and distinctive markings, and is smaller than the similar-looking Alaskan Malamute.</p>
            </div>
      <div class="col-lg-3 col-md-6 mb-4 image-container">
        <img src="img/db/Airedale Terrier.jpg" class="img-fluid" alt="Image 1">
        <h5 class="card-title" style="padding-top: 10px;">Airedale Terrier</h5>
                <p>The Airedale Terrier (often shortened to "Airedale"), also called Bingley Terrier and Waterside Terrier, is a dog breed of the terrier type that originated in the valley (dale) of the River Aire, in the West Riding of Yorkshire, England.</p>
            </div>
      <div class="col-lg-3 col-md-6 mb-4 image-container">
        <img src="img/db/Bulldog.jpg" class="img-fluid" alt="Image 1">
        <h5 class="card-title" style="padding-top: 10px;">Bulldog</h5>
                <p>The Bulldog is a British breed of dog of mastiff type. It may also be known as the English Bulldog or British Bulldog. It is a medium-sized, muscular dog of around 40–55 lb (18–25 kg). They have large heads with thick folds of skin around the face and shoulders and a relatively flat face with a protruding lower jaw.</p>
            </div>
      <div class="col-lg-3 col-md-6 mb-4 image-container">
        <img src="img/db/Chihuahua.jpg" class="img-fluid" alt="Image 1">
        <h5 class="card-title" style="padding-top: 10px;">Chihuahua</h5>
                <p>Chihuahua dog, smallest recognized dog breed, named for the Mexican state of Chihuahua, where it was first noted in the mid-19th century. The Chihuahua is thought to have been derived from the Techichi, a small mute dog kept by the Toltec people of Mexico as long ago as the 9th century CE.</p>
            </div>
      <div class="col-lg-3 col-md-6 mb-4 image-container">
        <img src="img/db/Chow Chow.jpg" class="img-fluid" alt="Image 1">
        <h5 class="card-title" style="padding-top: 10px;">Chow Chow</h5>
                <p>The Chow Chow is a spitz-type of dog breed originally from Northern China. The Chow Chow is a sturdily built dog, square in profile, with a broad skull and small, triangular, erect ears with rounded tips.</p>
            </div>
      <div class="col-lg-3 col-md-6 mb-4 image-container">
        <img src="img/db/Dachshund.jpg" class="img-fluid" alt="Image 1">
        <h5 class="card-title" style="padding-top: 10px;">Dachshund</h5>
                <p>The dachshund, also known as the wiener dog or sausage dog, badger dog and doxie, is a short-legged, long-bodied, hound-type dog breed. The dog may be smooth-haired, wire-haired, or long-haired. Coloration varies.</p>
            </div>
      <div class="col-lg-3 col-md-6 mb-4 image-container">
        <img src="img/db/German Shepherd.jpg" class="img-fluid" alt="Image 1">
        <h5 class="card-title" style="padding-top: 10px;">German Shepherd</h5>
                <p>The German Shepherd,[a] also known in Britain as an Alsatian, is a German breed of working dog of medium to large size. The breed was developed by Max von Stephanitz using various traditional German herding dogs from 1899.</p>
            </div>
      <div class="col-lg-3 col-md-6 mb-4 image-container">
        <img src="img/db/Golden Retriever.jpg" class="img-fluid" alt="Image 1">
        <h5 class="card-title" style="padding-top: 10px;">Golden Retriever</h5>
                <p>The Golden Retriever is a Scottish breed of retriever dog of medium size. It is characterised by a gentle and affectionate nature and a striking golden coat. It is commonly kept as a pet and is among the most frequently registered breeds in several Western countries.</p>
            </div>
      <div class="col-lg-3 col-md-6 mb-4 image-container">
        <img src="img/db/Poodle.jpg" class="img-fluid" alt="Image 1">
        <h5 class="card-title" style="padding-top: 10px;">Poodle</h5>
                <p>The Poodle, called the Pudel in German and the Caniche in French, is a breed of water dog. The breed is divided into four varieties based on size, the Standard Poodle, Medium Poodle, Miniature Poodle and Toy Poodle, although the Medium Poodle is not universally recognised. </p>
            </div>
      <div class="col-lg-3 col-md-6 mb-4 image-container">
        <img src="img/db/Rottweiler.jpg" class="img-fluid" alt="Image 1">
        <h5 class="card-title" style="padding-top: 10px;">Rottweiler</h5>
                <p>The Rottweiler is a breed of domestic dog, regarded as medium-to-large or large. The dogs were known in German as Rottweiler Metzgerhund, meaning Rottweil butchers' dogs, because their main use was to herd livestock and pull carts laden with butchered meat to market.</p>
            </div>
      <div class="col-lg-3 col-md-6 mb-4 image-container">
        <img src="img/db/Bichon Frisé.jpg" class="img-fluid" alt="Image 1">
        <h5 class="card-title" style="padding-top: 10px;">Bichon Frisé</h5>
                <p>Bichon Frise, breed of small dog noted for its fluffy coat and cheerful disposition. For many centuries it was known as the “Bichon” or “Tenerife.” Descended from water spaniels, the breed is 9.5 to 11.5 inches (24 to 30 cm) tall at the withers and weighs 12 to 18 pounds (5 to 8 kg).</p>
            </div>
      <div class="col-lg-3 col-md-6 mb-4 image-container">
        <img src="img/db/Maltese dog.jpg" class="img-fluid" alt="Image 1">
        <h5 class="card-title" style="padding-top: 10px;">Maltese Dog</h5>
                <p>Maltese dog refers both to an ancient variety of dwarf, white-coated dog breed from Italy and generally associated also with the island of Malta, and to a modern breed of similar dogs in the toy group, genetically related to the Bichon, Bolognese, and Havanese breeds.</p>
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
