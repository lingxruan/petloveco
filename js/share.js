function sharePost() {
    const postDesc = document.querySelector('.post-post_desc').textContent; // Get post description
    const postMedia = document.querySelector('.post-media').src; // Get post media URL

    if (navigator.share) {
        navigator.share({
            title: 'Check out this post!',
            text: postDesc,
            url: postMedia
        }).then(() => {
            console.log('Shared successfully');
        }).catch((error) => {
            console.error('Error sharing:', error);
        });
    } else {
        console.log('Web Share API is not supported.');
        // Fallback behavior if Web Share API is not supported
    }
}