$(document).ready(function(){

    $('.sidebar .sidebar-item i, .sidebar-item').hover(
        function() {
            
            $('.sidebar-item a, .sidebar').addClass('show');
            $('.container-sidebar').css('zIndex', '99');
        
        },
        function() {
            $('.sidebar-item a, .sidebar').removeClass('show');
            $('.container-sidebar').css('zIndex', '0');
        }
    );

  
});