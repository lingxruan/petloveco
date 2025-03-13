<?php
include "../conn.php";
session_start();

if(isset($_SESSION['email'])) {
$e = $_SESSION['email'];

$getname = mysqli_query($conn, "SELECT * FROM users WHERE email='$e'");
while($row = mysqli_fetch_object($getname)){
    $id = $row -> id;
    $profile_pic = $row -> profile_pic;
    $fullname = $row -> fullname;
    $pet_type = $row -> pet_type;
    $bio = $row -> bio;
    $address = $row -> address;
    $phone_number = $row -> phone_number;
    $birthday = $row -> birthday;
    $intrest = $row -> interest;
    $fb = $row -> fb;
    $ig = $row -> ig;
    $email = $row -> email;
    $password = $row -> password;
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  
  <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

  <link href="../css/home.css" rel="stylesheet">
  <link href="../css/post.css" rel="stylesheet">

  <style>
    .form-group input,
    .form-group select,
    .form-group textarea {
    border: 1px solid;
    border-image: linear-gradient(115deg, #3cc5d7, #47d794, #3498db) 1;
    border-radius: 5px;
    padding: 8px;
    width: 100%;
    box-sizing: border-box;
    margin-top: 5px;
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

  <!-- Your existing HTML content -->

<!-- Navigation Links -->
<div class="navigation-links" style="background-color: #f0f0f0; text-align: center; padding: 10px 0;">
  <div style="display: inline-block; margin: 0 10px;">
    <a href="edit_profile.php" style="text-decoration: none; color: black; background-color: inherit; padding: 5px 10px; border-radius: 5px; transition: background-color 0.3s;">Edit Profile</a>
  </div>
  <div style="display: inline-block; margin: 0 10px;">
    <a href="privacy_settings.php" style="text-decoration: none; color: black; background-color: inherit; padding: 5px 10px; border-radius: 5px; transition: background-color 0.3s;">Privacy Settings</a>
  </div>
</div>
<style>
  .navigation-links a:hover {
    background: linear-gradient(90deg, rgba(60, 197, 215, 0.5), rgba(71, 215, 148, 0.5));
  }
</style>


<!-- Edit Profile Section -->
<section id="edit-profile" class="edit-profile">
  <div class="container" style="border: 2px solid; padding: 20px; border-image: linear-gradient(115deg, #3cc5d7, #47d794, #3498db) 1; margin-top: 20px; margin-bottom: 20px;">
    <h2>Edit Profile</h2>
    <form action="../process.php?id=<?php echo $id;?>" method="POST" enctype="multipart/form-data">
    <label for="profile_pic">Profile Picture</label>
      <div class="form-group">
        <img src="../profile_pictures/<?php echo $profile_pic; ?>" alt="Profile" id="profile-img" class="rounded-circle" style="width: 100px; height: 100px; margin-bottom: 20px;">
        <input type="file" class="form-control-file" id="profile_pic" name="profile_pic">
      </div>
      <div class="form-group">
        <label for="fullname">Full Name</label>
        <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $fullname; ?>">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" value="<?php echo $password; ?>">
      </div>
      <div class="form-group">
        <label for="bio">Bio</label>
        <textarea class="form-control" id="bio" name="bio"><?php echo $bio; ?></textarea>
      </div>
      <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>">
      </div>
      <div class="form-group">
        <label for="pet_type">Pet You Like</label>
        <input type="text" class="form-control" id="pet_type" name="pet_type" value="<?php echo $pet_type; ?>">
      </div>
      <div class="form-group">
        <label for="gender">Gender</label>
        <select class="form-control" id="gender" name="gender">
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">Other</option>
        </select>
      </div>
      <div class="form-group">
        <label for="phone">Phone Number</label>
        <input type="number" class="form-control" id="phone_number" name="phone_number" value="<?php echo $phone_number; ?>">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="bio" name="email" value="<?php echo $email; ?>">
      </div>
      <div class="form-group">
        <label for="birthday">Birthday</label>
        <input type="date" class="form-control" id="birthday" name="birthday" value="<?php echo $birthday; ?>">
      </div>
      <div class="form-group">
        <label for="ig">Instagram</label>
        <input type="text" class="form-control" id="ig" name="ig" value="<?php echo $ig; ?>">
      </div>
      <div class="form-group">
        <label for="fb">Facebook</label>
        <input type="text" class="form-control" id="fb" name="fb" value="<?php echo $fb; ?>">
      </div>
      <div class="form-group">
        <label for="interest">Interest</label>
        <textarea class="form-control" id="interest" name="interest"><?php echo $bio; ?></textarea>
      </div>
      <button type="submit" class="btn" name="update">Save Changes</button>
    </form>
  </div>
</section>

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
