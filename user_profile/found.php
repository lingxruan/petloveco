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
  <title>Report Found Pet</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  
  <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

  <link href="../css/home.css" rel="stylesheet">
  <link href="../css/post.css" rel="stylesheet">
  <link href="../css/retrieve_profile.css" rel="stylesheet">

  <style>
    .modal { z-index: 1051; }
    /* Dropdown container */
    .dropdown-container {
        position: relative;
        display: inline-block;
    }

    /* Dropdown button */
    .dropdown-container .ellipsis-icon {
        cursor: pointer;
    }

    /* Dropdown menu */
    .dropdown-menu {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 120px;
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-menu a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }
    .dropdown-menu a:hover {
      background: linear-gradient(90deg, rgba(51, 197, 215, 0.3), rgba(71, 215, 148, 0.3));
    }
    .dropdown-container:hover .dropdown-menu {
        display: block;
    }
    /* Modal styles */
    .modal {
        display: none; 
        position: fixed; 
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto; 
        background-color: rgb(0,0,0); 
        background-color: rgba(0,0,0,0.4); 
    }

    /* Modal content */
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto; 
        padding: 20px;
        border: 1px solid #888;
        width: 80%; 
    }

    /* Close button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    /* Textarea */
    #edit_found_desc {
        width: 100%;
        height: 100px; 
        border: 1px solid;
        border-image: linear-gradient(115deg, #3cc5d7, #47d794, #3498db) 1;
        margin-bottom: 10px;
        padding: 5px;
    }

    /* Button */
    .update-button {
       background: linear-gradient(115deg, #3cc5d7, #47d794, #3498db);
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 5px;
    }

    .update-button:hover {
      background: linear-gradient(90deg, rgba(51, 197, 215, 0.3), rgba(71, 215, 148, 0.3));
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
<div class="modal fade" id="signoutModal" tabindex="-1" aria-labelledby="signoutModalLabel" aria-hidden="true" style="z-index: 1051;">
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
<div class="modal fade" id="helpModal" tabindex="-1" aria-labelledby="helpModalLabel" aria-hidden="true" style="z-index: 1051;">
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
    <a href="rpfile.php">
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
    <p style="padding-top: 20px;"><a href="LAF.php">LOST</a> &nbsp; | &nbsp; <a href="found.php">FOUND</a></p>
</div>


  <!-- Post Form -->
<div class="container mt-4" id="postFormContainer">
    <h4 style="text-align: center;"> Report Found Pet</h4>
  <div class="user-profile">
    <img src="../profile_pictures/<?php echo $profile_pic;?>" alt="User Image" class="profile-img">
    <span class="user-name"><?php echo $fullname;?></span>
  </div>
  <form action="../process.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="postContent">Write Something:</label>
      <textarea class="form-control" rows="3" placeholder="Please describe the found pet..." name="found_desc"></textarea>
    </div>
    <div class="form-group">
      <label for="mediaInput">Upload Media:</label>
      <input type="file" class="form-control-file" name="found_media">
    </div>
    <input type="hidden" name="posted_by" value="<?php echo $fullname;?>">
    <button type="submit" class="btn" name="found">Post</button>
  </form>
</div>

<div class="post-profile">
<?php
$getpost = mysqli_query($conn, "SELECT * FROM found WHERE posted_by='$fullname'");
while ($row1 = mysqli_fetch_array($getpost)) {
?>
    <div class="post-home" data-post-id="<?php echo $row1['id']; ?>">
        <div class="post-header">
            <div class="posted-by-container">
                <div style="display: flex; align-items: center;">
                    <img class="profile-image" src="../profile_pictures/<?php echo $profile_pic; ?>" alt="Profile Image">
                    <h5 class="post-posted_by"><?php echo $row1['posted_by']; ?></h5>
                </div>
                <div class="ellipsis-container" id="ellipsisDropdown_<?php echo $row1['id']; ?>" onclick="toggleDropdown(<?php echo $row1['id']; ?>)">
                    <div class="dropdown-menu" id="dropdownMenu_<?php echo $row1['id']; ?>" style="display: none;">
                        <a href="#" onclick="editPost(<?php echo $row1['id']; ?>, '<?php echo $row1['found_desc']; ?>')">Edit</a>
                        <a href="#" onclick="deletePost(<?php echo $row1['id']; ?>)">Delete</a>
                    </div>
                    <i class="fas fa-ellipsis-h ellipsis-icon"></i>
                </div>
            </div>
        </div>
        <p class="post-found_desc"><?php echo $row1['found_desc']; ?></p>
        <?php if (!empty($row1['found_media'])) { ?>
            <img src="../found/<?php echo $row1['found_media']; ?>" class="post-media">
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
<?php } ?>

<!-- Modal for editing post -->
<div id="editFoundModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2 style="text-align: center;">Edit Post</h2>
        <form action="../process.php?id=<?php echo isset($id) ? $id : ''; ?>" id="editFoundForm" method="POST">
            <input type="hidden" name="id" id="edit_id" value="<?php echo isset($id) ? $id : ''; ?>">
            <textarea name="found_desc" id="edit_found_desc" style="width: 100%; border: 1px solid; border-image: linear-gradient(115deg, #3cc5d7, #47d794, #3498db) 1;"></textarea><br>
            <!-- Button below textarea -->
            <button type="submit" class="update-button" name="found">Update</button>
        </form>
    </div>
</div>

<!-- Footer section -->
<footer style="text-align: center; background-color: #f8f9fa; padding: 20px;">
    <p>&copy; 2024 PetLoveCo. All rights reserved.</p>
</footer>

  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


<script src="../js/main.js"></script>
<script src="../js/share.js"></script>
<script src="../js/delete_post.js"></script>

<script>
    function toggleDropdown(postId) {
        var dropdown = document.getElementById('dropdownMenu_' + postId);
        if (dropdown.style.display === "none") {
            dropdown.style.display = "block";
        } else {
            dropdown.style.display = "none";
        }
    }

    function editPost(postId, postDesc) {
        var modal = document.getElementById('editFoundModal');
        var editDescInput = document.getElementById('edit_found_desc');
        var editIdInput = document.getElementById('edit_id');

        editDescInput.value = postDesc;
        editIdInput.value = postId;
        modal.style.display = "block";
    }

    function closeModal() {
        var modal = document.getElementById('editFoundModal');
        modal.style.display = "none";
    }
</script>

</body>
</html>
