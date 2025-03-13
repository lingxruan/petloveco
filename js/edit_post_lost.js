function editPost(id) {
    var post_desc = document.querySelector('.post-lost_desc').innerHTML;
    document.getElementById('edit_id').value = id;
    document.getElementById('edit_lost_desc').value = post_desc; // Change lost_desc to post_desc
    document.getElementById('editLostModal').style.display = "block";
}
// Function to close modal
function closeModal() {
    document.getElementById('editLostModal').style.display = "none";
}
