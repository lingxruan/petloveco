function deletePost(postId) {
    if (confirm("Are you sure you want to delete this post?")) {
        console.log("Post ID: " + postId); // Debugging statement
        // Send an AJAX request to delete the post
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../process.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Reload the page or perform any other actions upon successful deletion
                console.log(xhr.responseText); // Debugging statement
                location.reload();
            }
        };
        xhr.send("id=" + postId);
    }
}