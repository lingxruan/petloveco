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
  <title>Dog Tip's and Recommendation</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  
   <!-- Include Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-LqvmxR9OumGBE/4IYAwAqQyLeBqSNb1K0ZSRxR1G+KhEqZ28No7+RIlg94yqbe1T" crossorigin="anonymous">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

  <link href="../css/cat.css" rel="stylesheet">

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

  <!-- Sidebar Backdrop -->
  <div class="sidebar-backdrop"></div>

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
    <p style="padding-top: 20px;"><a href="dog.php">DOG</a> &nbsp; | &nbsp;<span><a href="TAR.php">CAT</a></span></p>
</div>

<section class="tips-recommendations">
        <div class="container">
            <h2 id="h2" style="text-align: center;">Pet-Friendly Tips and Recommendations</h2>
            <div class="cat-container" style="text-align: center; margin-top: 20px;">
                <img src="img/db/2.jpg" alt="Dog Care" style="width: 200px; margin-right: 20px;">
                <p id="p" style="flex: 1; padding-top: 25px;">
                    As a dog owner, it’s essential to understand and meet your pet’s basic needs. Whether you’re a novice pet parent or an expert, you’ll need to set the stage for your new pup. Your dog’s basic needs will consist of nutritious food, water, treats, toys, and bedding to make the pup feel right at home. When you bring a new dog into your home, it’s best to make a trip to the vet as soon as possible. Your vet can help you pinpoint the right type and the amount of food and other important things you need to know about caring for your new friend.
                </p>
            </div>
            <br>
            <!-- Tips and Recommendations -->
            <h5 id="tar">Tips and Recommendations:</h5>
            <ul id="ul">
                <li>Establish a routine for feeding, walking, and playtime to provide structure and stability for your dog.</li>
                <li>Invest time in training your dog using positive reinforcement techniques to encourage good behavior and strengthen the bond between you.</li>
                <li>Regular exercise is crucial for your dog's physical and mental well-being. Aim for daily walks and engage in interactive play sessions.</li>
                <li>Maintain regular veterinary check-ups to ensure your dog's health and address any concerns promptly.</li>
                <li>Provide appropriate chew toys to satisfy your dog's natural urge to chew and prevent destructive chewing behavior.</li>
                <li>Practice proper grooming, including brushing your dog's coat, trimming nails, and cleaning ears, to keep them healthy and comfortable.</li>
                <li>Ensure your dog's environment is safe and secure, including proper fencing for outdoor areas and removing hazards from indoors.</li>
                <li>Monitor your dog's diet and adjust portion sizes as needed to maintain a healthy weight and prevent obesity.</li>
                <li>Be patient and understanding, as every dog is unique and may require different approaches to training and care.</li>
                <li>Socialize your dog from an early age to help them become well-adjusted and comfortable around people, other dogs, and different environments.</li>
                <li>Provide mental stimulation through interactive toys, puzzle feeders, and training exercises to prevent boredom and promote mental agility.</li>
                <li>Establish boundaries and consistent rules to guide your dog's behavior and prevent confusion or misunderstandings.</li>
                <li>Stay up-to-date on the latest information and advancements in canine health, nutrition, and training to provide the best care for your dog.</li>
                <li>Consider enrolling your dog in obedience classes or working with a professional trainer to address specific behavior issues or improve obedience skills.</li>
                <li>Practice patience and consistency when training your dog, rewarding desired behaviors and calmly redirecting or ignoring unwanted behaviors.</li>
                <li>Provide plenty of love, attention, and affection to create a strong bond and mutual trust between you and your dog.</li>
            </ul>
            <button id="toggleSpeech" onclick="toggleSpeech()"><i class="fas fa-volume-up"></i></button>
        </div>
    </section>

<!-- Footer section -->
<footer style="text-align: center; background-color: #f8f9fa; padding: 20px; margin-top: 20px;">
    <p>&copy; 2024 PetLoveCo. All rights reserved.</p>
</footer>

  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


<script src="../js/main.js"></script>
<script src="../js/dog_tts.js"></script>

</body>
</html>
