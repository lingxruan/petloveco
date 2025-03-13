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
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="../css/home.css" rel="stylesheet">
    <link href="../css/post.css" rel="stylesheet">
    <link href="../css/retrieve_home.css" rel="stylesheet">

  <style>
    /* Dropdown Container */
.dropdown-container {
    position: relative;
}

/* Dropdown Toggle Button */
.dropdown-toggle {
    background-color: transparent;
    border: none;
    cursor: pointer;
}

/* Dropdown Menu */
.dropdown-menu {
    display: none;
    position: absolute;
    top: 100%;
    right: 0;
    background-color: #f9f9f9;
    min-width: 120px;
    z-index: 1;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    border-radius: 4px;
}

/* Dropdown Menu Items */
.dropdown-menu a {
    display: block;
    padding: 10px;
    text-decoration: none;
    color: #333;
    transition: background-color 0.3s;
}

.dropdown-menu a:hover {
  background: linear-gradient(90deg, rgba(60, 197, 215, 0.5), rgba(71, 215, 148, 0.5));
}
.right-side-content {
  margin-top: 50px;
  margin-right: 150px;
  background-color: white; 
  padding: 20px;
  margin-left: 20px;
  width: calc(30% - 40px);
  float: right; 
  border-radius: 10px; 
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
  border: 1px solid;
    border-image: linear-gradient(115deg, #3cc5d7, #47d794, #3498db) 1;
}

@media only screen and (max-width: 768px) {
            .right-side-content {
                display: none;
            }
        }
        @media only screen and (max-width: 768px) {
            .posts-section {
                width: 75%;
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
                <button type="button" class="btn">S
                  
                </button>
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
    <button class="report-btn" onclick="window.location.href = 'LAF.php';"><i class="fas fa-exclamation-circle"></i> Report</button>
    </div>
</div>
</section>

</section>

<!--Retrieve Post-->
<section class="posts-section" style="float: left; width: 60%;">
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
?>
    <div class="post_home" style="margin-top: 20px; margin-left: 60px;">
        <!-- Display user's fullname and profile picture -->
        <div class="posted-by-container" style="display: flex; justify-content: space-between; align-items: center;">
            <div style="display: flex; align-items: center;">
                <img class="profile-image" src="../profile_pictures/<?php echo $row1['posted_by_profile_pic']; ?>" alt="Profile Image">
                <h5 class="post-posted_by"><?php echo $row1['posted_by_fullname']; ?></h5>
            </div>
            <div class="dropdown-container">
                <i class="fas fa-ellipsis-v" onclick="toggleDropdown('<?php echo $row1['id']; ?>')"></i>
                <div class="dropdown-menu" id="dropdownMenu_<?php echo $row1['id']; ?>" style="display: none;">
                    <a href="#" onclick="editPost('<?php echo $row1['id']; ?>', '<?php echo $row1['post_desc']; ?>', 'regular')">Edit</a>
                    <a href="#" onclick="deletePost('<?php echo $row1['id']; ?>')">Delete</a>
                </div>
            </div>
        </div>
        <p class="post-post_desc"><?php echo $row1['post_desc']; ?></p>
        <?php if (!empty($row1['post_media'])) { ?>
            <img src="../post/<?php echo $row1['post_media']; ?>" class="post-media" style="width: 550px; height: 450px;">
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
</section>

<div class="right-side-content">
    <h3>Latest Articles or Blog Posts</h3>
    <div class="article">
        <h4>Tips for Training Your New Puppy</h4>
        <p>Bringing home a new puppy can be exciting, but it also comes with challenges. Learn valuable tips for training your new furry friend.</p>
        <a href="#">Read more</a>
    </div>
    <div class="article">
        <h4>Understanding Cat Behavior: What Your Cat's Meows Mean</h4>
        <p>Ever wondered what your cat is trying to tell you with its meows? Discover the meanings behind common cat vocalizations and how to respond.</p>
        <a href="#">Read more</a>
    </div>
</div>

<!-- Modal for editing post -->
<div id="editPostModal" class="modal">
    <div class="modal-content">
        <style>
            .modal-content {
                background-color: #fefefe;
                margin: 15% auto;
                padding: 20px;
                border: 1px solid #888;
                width: 80%;
            }

            .close {
                color: #aaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }

            .update-button {
                background: linear-gradient(115deg, #3cc5d7, #47d794, #3498db);
                color: white;
                padding: 10px 20px;
                border: none;
                cursor: pointer;
                border-radius: 4px;
            }

            .update-button:hover {
                background: linear-gradient(90deg, rgba(60, 197, 215, 0.5), rgba(71, 215, 148, 0.5));
            }
        </style>
        
        <span class="close" onclick="closeModal()">&times;</span>
        <h2 style="text-align: center;">Edit Post</h2>
        <form id="editPostForm" method="POST">
            <input type="hidden" name="id" id="edit_id">
            <textarea name="post_desc" id="edit_post_desc" style="width: 100%; border: 1px solid; border-image: linear-gradient(115deg, #3cc5d7, #47d794, #3498db) 1;"></textarea><br>
            <button type="submit" class="update-button" name="home">Update</button>
        </form>
    </div>
</div>


<script>
    function toggleDropdown(postId) {
        var dropdown = document.getElementById('dropdownMenu_' + postId);
        if (dropdown.style.display === "none") {
            dropdown.style.display = "block";
        } else {
            dropdown.style.display = "none";
        }
    }

    function editPost(postId, postDesc, postType) {
        var modal = document.getElementById('editPostModal');
        var editDescInput = document.getElementById('edit_post_desc');
        var editIdInput = document.getElementById('edit_id');
        var editForm = document.getElementById('editPostForm');

        editDescInput.value = postDesc;
        editIdInput.value = postId;

        if (postType === 'regular') {
            editForm.action = "../process.php";
            editDescInput.placeholder = "Enter post description...";
        } else if (postType === 'lost') {
            editForm.action = "../process_lost.php";
            editDescInput.placeholder = "Enter lost description...";
        } else if (postType === 'found') {
            editForm.action = "../process_found.php";
            editDescInput.placeholder = "Enter found description...";
        }

        modal.style.display = "block";
    }

    function closeModal() {
        var modal = document.getElementById('editPostModal');
        modal.style.display = "none"; // Hide the modal
    }
</script>



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


</body>
</html>
