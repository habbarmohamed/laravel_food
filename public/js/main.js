$(document).ready(function () {
    'use strict';
    $('.head').height($(window).height());
    $(window).resize(function () {
        $('.head').height($(window).height());
    });

     // Menu Toggle Script
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });


    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });


    $('#sidebarCollapse').on('click', function () {
        // open or close navbar
        $('#sidebar').toggleClass('active');
        // close dropdowns
        $('.collapse.in').toggleClass('in');
        // and also adjust aria-expanded attributes we use for the open/closed arrows
        // in our CSS
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });


    $('.close-icon hidden-sm').on('click',function() {
         $(this).closest('.card').fadeOut();
         
  });
  $(".msg").slideDown(300).delay(5000).slideUp(300);

  

  
$('.delivery_menu a').click(function(e) {

    $('.delivery_menu.active').removeClass('active');

    var $parent = $(this).parent();
    $parent.addClass('active');
});

  $('.owl-carousel').owlCarousel({
    // loop:true,
    nav:true,
    responsive:{
        0:{
            items:5
        },
        600:{
            items:7
        },
        1000:{
            items:10
        }
    }
})

});

  

function showInfoModal(id) {
    document.getElementById('modal_name').innerHTML = document.getElementById('modal_name' + id).textContent;
    document.getElementById('modal_price').innerHTML = document.getElementById('modal_price' + id).textContent;
    document.getElementById('modal_desc').innerHTML = document.getElementById('modal_desc' + id).textContent;
    document.getElementById('modal_tags').innerHTML = document.getElementById('modal_tags' + id).textContent;
    document.getElementById('modal_category').innerHTML = document.getElementById('modal_category' + id).textContent;
    document.getElementById('modal_img').src = document.getElementById('modal_img' + id).src;
    document.getElementById('modal_logo').src = document.getElementById('modal_logo' + id).src;
 }

//  var tagField = $('input#product_tags');
// tagField.tagsinput({
//   tagClass: 'label label-default',
// });
