function editPost(id) {
    var post_desc = document.getElementById('post_found_desc_' + id).innerHTML;
    document.getElementById('edit_id').value = id;
    document.getElementById('edit_found_desc').value = post_desc;
    document.getElementById('editFoundModal').style.display = "block";
}
// Function to close modal
function closeModal() {
    document.getElementById('editFoundModal').style.display = "none";
}
