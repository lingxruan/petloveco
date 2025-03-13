// Function to open modal and populate fields with post data
function editPost(id) {
    var post_desc = document.querySelector('.post-home[data-post-id="' + id + '"] .post-post_desc').innerHTML;
    document.getElementById('edit_id').value = id;
    document.getElementById('edit_post_desc').value = post_desc;
    document.getElementById('editPostModal').style.display = "block";
}

// Function to close modal
function closeModal() {
    document.getElementById('editPostModal').style.display = "none";
}
