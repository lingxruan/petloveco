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
  <title>Home</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  
  <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

  <link href="../css/home.css" rel="stylesheet">
  <link href="../css/post.css" rel="stylesheet">
  <link href="../css/post_home.css" rel="stylesheet">
  <style>
    /* CSS to ensure modal visibility */
    .modal { z-index: 1051; }
    .welcome-message-container {
    background-color: #f0f0f0; /* Background color for the container */
    padding: 10px; /* Adjust padding as needed */
    margin-top: 10px;
    border: 1px solid #ccc; /* Add border */
    border-radius: 20px; /* Add border radius */
    margin-right: 10px;
    margin-left: 10px; /* Adjust margins as needed */
    display: flex; /* Use flexbox for layout */
    align-items: center; /* Center items vertically */
    justify-content: space-between; /* Distribute space between items */
  }

  .welcome-message p {
    margin: 0; /* Remove default margin of <p> */
  }

  .create-post-btn {
  background: linear-gradient(115deg, #3cc5d7, #47d794, #3498db);
  color: white; /* Set text color to white for better visibility */
  border: none; /* Remove default button border */
  padding: 10px 20px; /* Adjust padding as needed */
  font-size: 16px; /* Adjust font size as needed */
  cursor: pointer; /* Change cursor to pointer on hover */
  border-radius: 20px;
}
.create-post-btn:hover {
  background: linear-gradient(90deg, rgba(60, 197, 215, 0.5), rgba(71, 215, 148, 0.5));
}

.create-post-btn i {
  margin-right: 5px; /* Add some space between the icon and text */
}
/* Style for News and Updates Section */
.news-section {
    width: 30%; /* Adjust width as needed */
    float: right;
    padding: 20px;
    box-sizing: border-box;
}

.news-container {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 10px;
}

.news-item {
    margin-bottom: 20px;
}

.news-item h3 {
    margin-top: 0;
    font-size: 18px;
}

.news-item p {
    margin-bottom: 0;
}
/* Style for Content Section */
/* Style for Content Section */
.content-section {
  display: flex;
}

/* Style for Retrieve Post Section */
.posts-section {
  width: 70%; /* Adjust width as needed */
  float: left; /* Float to the left */
}

/* Style for News and Updates Section */
.news-section {
  width: 30%; /* Adjust width as needed */
  float: right; /* Float to the right */
  padding-left: 20px; /* Add spacing between retrieve posts and news section */
}

@media only screen and (max-width: 768px) {
            .news-section {
                display: none;
            }
        }

        /* Flexbox layout for centering */
        .container {
            display: flex;
            justify-content: center;
        }

        /* Adjustments to keep posts centered */
        .posts-section {
            /* Adjust width for posts section */
            width: 70%;
            /* Add padding for better spacing */
            padding: 20px;
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

    <div class="ml-auto dropdown">
    <a href="#" role="button" id="notificationsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: black; text-decoration: none; margin-right: 10px;">
        <i class="far fa-bell fa-lg" style="color: white;"></i>
    </a>
    <a href="#" role="button" id="messagesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: black; text-decoration: none; margin-right: 10px;">
        <i class="far fa-envelope fa-lg" style="color: white;"></i>
    </a>
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
                <!-- Your help form goes here -->
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

<section>
<div class="welcome-message-container">
  <div class="welcome-message">
    <p>Welcome, <?php echo $fullname;?>!</p>
  </div>
  <div>
  <button class="create-post-btn" onclick="window.location.href = 'create_post.php';"><i class="fas fa-plus"></i> Create Post</button>
</div>

</section>
<!--Retrieve Post-->
<section class="posts-section">
<?php
$getpost = mysqli_query($conn, "
    SELECT p.*, u.fullname AS posted_by_fullname, u.profile_pic AS posted_by_profile_pic
    FROM (
        SELECT * FROM post
        UNION
        SELECT * FROM lost
        UNION
        SELECT * FROM found
    ) AS p
    INNER JOIN users AS u ON p.posted_by = u.fullname
");

while ($row1 = mysqli_fetch_array($getpost)) {
     // Process each row as needed
      ?>
     <div class="post_home" style="margin-top: 20px;">
    <!-- Display user's fullname and profile picture -->
    <div class="posted-by-container" style="display: flex; justify-content: space-between; align-items: center;">
        <div style="display: flex; align-items: center;">
            <img class="profile-image" src="../profile_pictures/<?php echo $row1['posted_by_profile_pic']; ?>" alt="Profile Image">
            <h5 class="post-posted_by"><?php echo $row1['posted_by_fullname']; ?></h5>
        </div>
        <div class="dropdown-container" onclick="toggleDropdown()">
            <i class="fas fa-ellipsis-v"></i>
            <div class="dropdown-menu">
                <a href="#" onclick="editPost(<?php echo $row1['id']; ?>)">Edit</a>
                <a href="#" onclick="deletePost(<?php echo $row1['id']; ?>)">Delete</a>
            </div>
        </div>
    </div>
    <p class="post-post_desc"><?php echo $row1['post_desc']; ?></p>
    <?php if (!empty($row1['post_media'])) { ?>
            <img src="../post/<?php echo $row1['post_media']; ?>" class="post-media" style="width: 250px; height: 250px;">
        <?php } ?>
    <div class="post-options">
        <div class="post-action-icons">
            <i class="far fa-thumbs-up"></i>
        </div>
        <div class="post-action-icons">
            <i class="far fa-comment"></i>
        </div>
        <div class="post-action-icons" onclick="sharePost()">
            <i class="fas fa-share"></i>
        </div>
    </div>
</div>
      <?php
      }
      ?>

<!-- Modal for editing post -->
<div id="editPostModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2 style="text-align: center;">Edit Post</h2>
        <form action="../process.php?id=<?php echo isset($id) ? $id : ''; ?>" id="editPostForm" method="POST">
            <input type="hidden" name="id" id="edit_id" value="<?php echo isset($id) ? $id : ''; ?>">
            <textarea name="post_desc" id="edit_post_desc" style="width: 100%; border: 1px solid; border-image: linear-gradient(115deg, #3cc5d7, #47d794, #3498db) 1;"></textarea><br>
            <!-- Button below textarea -->
            <button type="submit" class="update-button" name="update_home_post">Update</button>
        </form>
    </div>
</div>

</div>
    </div>

    </section>

    <section class="news-section">
    <div class="news-container">
        <h2>News and Updates</h2>
        <div class="news-item">
            <h3>New Pet Adoption Program</h3>
            <p>We're excited to announce our new pet adoption program. Visit our shelter to find your new furry friend!</p>
            <p>Date: March 25, 2024</p>
        </div>
        <div class="news-item">
            <h3>Introducing Canine Companion Training Program</h3>
            <p>We're excited to introduce our new Canine Companion Training Program, designed to provide essential obedience and socialization skills for your furry friend. Enroll your dog today for a well-behaved companion!</p>
            <p>Date: April 3, 2024</p>
        </div>
        <div class="news-item">
            <h3>New Feline Health Awareness Campaign</h3>
            <p>Announcing our latest initiative: the Feline Health Awareness Campaign. Join us in spreading awareness about common health issues in cats and promoting preventive care measures for our beloved feline companions.</p>
            <p>Date: April 3, 2024</p>
        </div>
    </div>
</section>


  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


<script src="../js/main.js"></script>
<script src="../js/share.js"></script>
<script src="../js/delete_post.js"></script>
<script src="../js/edit_post.js"></script>

</body>
</html>
