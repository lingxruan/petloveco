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
  <title>Cat Tips and Recommendation</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Include Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <link href="../css/cat.css" rel="stylesheet">
  
  <style>
    @media (max-width: 768px) {
        .cat-container {
            flex-direction: column;
            align-items: center;
        }

        .cat-container img {
            margin-bottom: 20px;
        }

        .cat-container p {
            text-align: center;
        }
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
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close"></button>
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
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close"></button>
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

  <!-- Include Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-LqvmxR9OumGBE/4IYAwAqQyLeBqSNb1K0ZSRxR1G+KhEqZ28No7+RIlg94yqbe1T" crossorigin="anonymous">

<!-- Create a new section for Tips and Recommendations -->
<section class="tips-recommendations">
    <div class="container">
        <h2 id="h" style="text-align: center;">Pet-Friendly Tips and Recommendations</h2>
        <div class="cat-container" style="text-align: center; margin-top: 20px;">
            <img src="img/cb/Persian cat.jpg" alt="Dog Care" style="width: 200px; margin-right: 20px; text-align: center;">
            <p id="pp" style="flex: 1; padding-top: 25px;">
                You may have heard that cats have nine lives. Well, maybe that's true, but one thing is for sure -- your cat can have a long and healthy life with the proper care. There are many things to consider when caring for a cat, and we'll cover them all in the following sections:
            </p>
        </div>
        <div class="row" style="padding-top: 25px;">
            <div class="col-md-6">
                <ul id="catList">
                    <li>Proper nutrition</li>
                    <li>Regular veterinary check-ups</li>
                    <li>Exercise and mental stimulation</li>
                    <li>Hygiene and grooming</li>
                    <li>Safe and comfortable environment</li>
                    <li>Attention and affection</li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul id="ull ">
                    <li>Regular playtime</li>
                    <li>Litter box maintenance</li>
                    <li>Preventing health issues</li>
                    <li>Handling behavioral problems</li>
                    <li>Socialization with other pets</li>
                    <li>Training and enrichment activities</li>
                </ul>
            </div>

            <div class="card-body">
                <h5 class="card-title" id="tar">Tips and Recommendations:</h5>
                <ul id="cat_List">
                    <li>Establish a consistent feeding schedule to provide structure and routine for your cat.</li>
                    <li>Use positive reinforcement techniques such as treats and praise to train your cat and reinforce good behavior.</li>
                    <li>Offer interactive play sessions daily to keep your cat mentally stimulated and physically active.</li>
                    <li>Schedule regular check-ups with your veterinarian to ensure your cat's health and address any medical concerns promptly.</li>
                    <li>Provide a variety of toys and scratching posts to satisfy your cat's natural instincts and prevent boredom.</li>
                    <li>Brush your cat's coat regularly to reduce shedding and prevent mats, and trim their nails as needed.</li>
                    <li>Keep your cat's indoor environment safe by removing hazards and providing hiding spots and elevated spaces.</li>
                    <li>Monitor your cat's weight and adjust their diet as necessary to maintain a healthy body condition.</li>
                    <li>Be patient and understanding with your cat, respecting their individual personality and preferences.</li>
                    <li>Expose your cat to different people, animals, and environments from a young age to promote socialization.</li>
                    <li>Provide mental stimulation with puzzle feeders, interactive toys, and environmental enrichment activities.</li>
                    <li>Set clear boundaries and consistent rules to guide your cat's behavior and prevent misunderstandings.</li>
                    <li>Stay informed about feline health and behavior to provide the best possible care for your cat.</li>
                    <li>Consider enrolling your cat in clicker training or agility classes to engage their mind and body.</li>
                    <li>Use gentle redirection and positive reinforcement to discourage unwanted behaviors without punishment.</li>
                    <li>Give your cat plenty of love, attention, and affection to strengthen your bond and build trust.</li>
                  </ul>
                  <i class="fas fa-volume-up" id="ttsIcon" style="cursor: pointer;"></i>
        </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer section -->
<footer style="text-align: center; background-color: #f8f9fa; padding: 20px; margin-top: 20px;">
    <p>&copy; 2024 PetLoveCo. All rights reserved.</p>
</footer>

  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Include Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-LqvmxR9OumGBE/4IYAwAqQyLeBqSNb1K0ZSRxR1G+KhEqZ28No7+RIlg94yqbe1T" crossorigin="anonymous">

<!-- Include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>



<script src="../js/main.js"></script>
<script>
    // Function to toggle text-to-speech
    function toggleTextToSpeech() {
        var ttsIcon = document.getElementById('ttsIcon');
        var catList = document.getElementById('catList').innerText;
        var ull = document.getElementById('ull').innerText;
        var cat_List = document.getElementById('cat_List').innerText;
        var fullText = catList + " " + ull + " " + cat_List;

        // Check if speech synthesis is supported
        if ('speechSynthesis' in window) {
            var speech = new SpeechSynthesisUtterance();
            speech.text = fullText;

            // Specify language (Hindi)
            speech.lang = 'hi-IN';

            // If speech is paused, resume; otherwise, pause
            if (speechSynthesis.speaking) {
                speechSynthesis.cancel();
                ttsIcon.classList.remove('fa-pause');
                ttsIcon.classList.add('fa-volume-up');
            } else {
                speechSynthesis.speak(speech);
                ttsIcon.classList.remove('fa-volume-up');
                ttsIcon.classList.add('fa-pause');
            }
        } else {
            alert("Text-to-speech is not supported in your browser.");
        }
    }

    // Add event listener to the volume icon for toggling text-to-speech
    document.getElementById('ttsIcon').addEventListener('click', toggleTextToSpeech);
</script>



</body>
</html>
