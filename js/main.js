$(document).ready(function () {
    // Toggle sidebar visibility
    $('#sidebarCollapse').on('click', function (e) {
      e.stopPropagation(); // Prevent the click from reaching the document
      $('#sidebar').toggleClass('active');
      $('.sidebar-backdrop').toggleClass('active');
    });

    // Close sidebar when clicking outside
    $(document).on('click', function (e) {
      if (!$(e.target).closest('#sidebar').length && !$(e.target).closest('#sidebarCollapse').length) {
        $('#sidebar').removeClass('active');
        $('.sidebar-backdrop').removeClass('active');
      }
    });

    // Close sidebar when clicking close button
    $('.close-sidebar').on('click', function (e) {
      e.stopPropagation(); // Prevent the click from reaching the document
      $('#sidebar').removeClass('active');
      $('.sidebar-backdrop').removeClass('active');
    });

    // Toggle search bar when clicking search icon
    $('.search-icon').on('click', function () {
      $('.search-bar').toggleClass('active').focus();
    });
  });