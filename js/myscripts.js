$(document).ready(function() {
    $('#toggleBtn').on('click', function() {
        $('header').toggle();
    });
});

// $(".initials-wrap").on("click", () => {
//     if($(".hidden-header").hasClass("active"))
//       $(".hidden-header").removeClass("active");
//     else
//       $(".hidden-header").addClass("active");
//   });