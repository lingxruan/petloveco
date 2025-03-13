<?php

include "conn.php";
session_start();

//sign up
if(isset($_POST['signup'])){

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Handle file upload
    $profile_pic = $_FILES['profile_pic']['name'];
    $temp_profile_pic = $_FILES['profile_pic']['tmp_name'];
    $folder = "profile_pictures/".$profile_pic;
    move_uploaded_file($temp_profile_pic, $folder);

    //validate email
    $val = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    $val_num = mysqli_num_rows($val);

    if($val_num >=1){
        ?>
        <script>
            alert("This email is already used!");
            window.location.href="signup.php";
        </script>
        <?php
    }else{
        // Insert data
        $insert = mysqli_query($conn, "INSERT INTO users (profile_pic, fullname, email, password) VALUES ('$profile_pic', '$fullname', '$email', '$password')");

        if($insert == true){
            ?>
            <script>
                 alert("Successfully Creating Account! Please Signin!");
                window.location.href="signin.php";
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("Error occurred while inserting data!");
                window.location.href="signup.php";
            </script>
            <?php
        }
    }
}

//signin
if(isset($_POST['signin'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");
    $num_check = mysqli_num_rows($check);

    if($num_check <= 0){
        ?>
        <script>
            alert("Wrong Email or Password")
            window.location.href="index.php";
        </script>
        <?php
    } else {
        $_SESSION['email'] = $email;
        ?>
        <script>
            window.location.href="user_profile/home.php";
        </script>
        <?php
    }
}

if(isset($_POST['post'])){
    $post_desc = $_POST['post_desc'];
    $posted_by = $_POST['posted_by'];

    // Handle file upload
    $post_media = $_FILES['post_media']['name'];
    $temp_post_media = $_FILES['post_media']['tmp_name'];
    $folder = "post/".$post_media;
    move_uploaded_file($temp_post_media, $folder);

    $insertpost = mysqli_query($conn, "INSERT INTO post (post_desc, post_media, posted_by) VALUES ('$post_desc', '$post_media', '$posted_by')");
    
    if($insertpost){
        ?>
        <script>
          alert("Post was Successfully!");
           window.location.href="user_profile/home.php";
       </script>
       <?php
    }else{
        ?>
        <script>
           alert("Error in Posting!");
           window.location.href="home.php";
       </script>
       <?php
    }
}
//lost
if(isset($_POST['lost'])){

    $lost_desc = $_POST['lost_desc'];
    $posted_by = $_POST['posted_by'];

    // Handle file upload
    $lost_media = $_FILES['lost_media']['name'];
    $temp_lost_media = $_FILES['lost_media']['tmp_name'];
    $folder = "lost/".$lost_media;
    move_uploaded_file($temp_lost_media, $folder);

    $insertpost = mysqli_query($conn, "INSERT INTO lost (lost_desc, lost_media, posted_by) VALUES ('$lost_desc', '$lost_media', '$posted_by')");
    
    if($insertpost){
        ?>
        <script>
          alert("Post was Successfully!");
           window.location.href="user_profile/LAF.php";
       </script>
       <?php
    }else{
        ?>
        <script>
           alert("Error in Posting!");
           window.location.href="LAF.php";
       </script>
       <?php
    }
}
//found
if(isset($_POST['found'])){

    $found_desc = $_POST['found_desc'];
    $posted_by = $_POST['posted_by'];

    // Handle file upload
    $found_media = $_FILES['found_media']['name'];
    $temp_found_media = $_FILES['found_media']['tmp_name'];
    $folder = "found/".$found_media;
    move_uploaded_file($temp_found_media, $folder);

    $insertpost = mysqli_query($conn, "INSERT INTO found (found_desc, found_media, posted_by) VALUES ('$found_desc', '$found_media', '$posted_by')");
    
    if($insertpost){
        ?>
        <script>
          alert("Post was Successfully!");
           window.location.href="user_profile/found.php";
       </script>
       <?php
    }else{
        ?>
        <script>
           alert("Error in Posting!");
           window.location.href="found.php";
       </script>
       <?php
    }
}


// post profile
if(isset($_POST['post_profile'])){

    $post_desc = $_POST['post_desc'];
    $posted_by = $_POST['posted_by'];

    // Handle file upload
    $post_media = $_FILES['post_media']['name'];
    $temp_post_media = $_FILES['post_media']['tmp_name'];
    $folder = "post/".$post_media;
    move_uploaded_file($temp_post_media, $folder);

    $insertpost = mysqli_query($conn, "INSERT INTO post (post_desc, post_media, posted_by) VALUES ('$post_desc', '$post_media', '$posted_by')");
    
    if($insertpost){
        ?>
        <script>
          alert("Post was Successfully!");
           window.location.href="user_profile/profile.php";
       </script>
       <?php
    }else{
        ?>
        <script>
           alert("Error in Posting!");
           window.location.href="home.php";
       </script>
       <?php
    }
}

//Update
if(isset($_POST['update'])){

    $id = $_GET['id'];
    // Retrieve form data
    $fullname = $_POST['fullname'];
    $password = $_POST['password'];
    $bio = $_POST['bio'];
    $address = $_POST['address'];
    $pet_type = $_POST['pet_type'];
    $gender = $_POST['gender'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];
    $ig = $_POST['ig'];
    $fb = $_POST['fb'];
    $interest = $_POST['interest'];

    // Update profile picture if a new one is uploaded
    if(isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0){
        $profile_pic = $_FILES['profile_pic']['name'];
        $temp_profile_pic = $_FILES['profile_pic']['tmp_name'];
        $folder = "profile_pictures/".$profile_pic;
        move_uploaded_file($temp_profile_pic, $folder);

        // Update profile picture in the database
        $update_pic_query = "UPDATE users SET profile_pic='$profile_pic' WHERE email='$email'";
        $update_pic_result = mysqli_query($conn, $update_pic_query);
        if(!$update_pic_result){
            echo "Error updating profile picture: " . mysqli_error($conn);
            exit;
        }
    }

    // Update other profile data in the database
    $update_query =  mysqli_query($conn, "UPDATE users SET fullname='$fullname', password='$password', bio='$bio', address='$address', pet_type='$pet_type', gender='$gender', phone_number='$phone_number', email='$email', birthday='$birthday',  ig='$ig', fb='$fb', interest='$interest' WHERE id='$id'");

    if($update_query==true){
        $_SESSION['email']=$email;
        ?>
        <script>
          alert("Data was change");
           window.location.href="user_profile/edit_profile.php"
       </script>
       <?php
    }else{
        ?>
        <script>
           alert("Data not change!");
           window.location.href="user_profile/edit_profile.php"
       </script>
       <?php
    }
}

// Update Post
if(isset($_POST['update_post'])){
    $id = isset($_POST['id']) ? $_POST['id'] : (isset($_GET['id']) ? $_GET['id'] : null);

    $post_desc = $_POST['post_desc'];

    $update_query = mysqli_query($conn, "UPDATE post SET post_desc='$post_desc' WHERE id='$id'");

    if($update_query){
        header("Location: user_profile/profile.php");
        exit();
    } else {
        echo "<script>alert('Data not changed!');</script>";
        header("Location: user_profile/profile.php");
        exit();
    }
}

if(isset($_POST['home'])){
    $id = isset($_POST['id']) ? $_POST['id'] : (isset($_GET['id']) ? $_GET['id'] : null);
    $post_desc = $_POST['post_desc']; // This is the updated post description

    // Update the post_desc in the appropriate table
    $update_post_query = mysqli_query($conn, "UPDATE post SET post_desc='$post_desc' WHERE id='$id'");

    // Check if the query was successful
    if($update_post_query){
        header("Location: user_profile/home.php");
        exit();
    } else {
        echo "<script>alert('Data not changed!');</script>";
        header("Location: user_profile/home.php");
        exit();
    }
}


// Update Lost Post
if(isset($_POST['lost'])){
    $id = isset($_POST['id']) ? $_POST['id'] : (isset($_GET['id']) ? $_GET['id'] : null);

    $lost_desc = $_POST['lost_desc'];

    $update_query = mysqli_query($conn, "UPDATE lost SET lost_desc='$lost_desc' WHERE id='$id'");

    if($update_query){
        header("Location: user_profile/LAF.php");
        exit();
    } else {
        echo "<script>alert('Data not changed!');</script>";
        header("Location: user_profile/home.php");
        exit();
    }
}

// Update Found Post
if(isset($_POST['found'])){
    $id = isset($_POST['id']) ? $_POST['id'] : (isset($_GET['id']) ? $_GET['id'] : null);

    $found_desc = $_POST['found_desc'];

    $update_query = mysqli_query($conn, "UPDATE found SET found_desc='$found_desc' WHERE id='$id'");

    if($update_query){
        header("Location: user_profile/found.php");
        exit();
    } else {
        echo "<script>alert('Data not changed!');</script>";
        header("Location: user_profile/home.php");
        exit();
    }
}

// Delete Post
if(isset($_POST['id'])) {
    $postId = $_POST['id'];

    $delete_query = mysqli_query($conn, "DELETE FROM post WHERE id='$postId'");
    
    if($delete_query) {
        echo "Post deleted successfully.";
    } else {
        echo "Error deleting post: " . mysqli_error($conn);
    }
}

// Delete Post Lost
if(isset($_POST['id'])) {
    $postId = $_POST['id'];

    $delete_query = mysqli_query($conn, "DELETE FROM found WHERE id='$postId'");
    
    if($delete_query) {
        echo "Post deleted successfully.";
    } else {
        echo "Error deleting post: " . mysqli_error($conn);
    }
}

// Delete Post Found
if(isset($_POST['id'])) {
    $postId = $_POST['id'];

    $delete_query = mysqli_query($conn, "DELETE FROM lost WHERE id='$postId'");
    
    if($delete_query) {
        echo "Post deleted successfully.";
    } else {
        echo "Error deleting post: " . mysqli_error($conn);
    }
}


?>