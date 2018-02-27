$ = jQuery.noConflict();

var map;
function initMap() {

    var latLng = {
        lat: 52.7290647,
        lng: 15.2330794
    };

    map = new google.maps.Map(document.getElementById('map'), {
        center: latLng,
        zoom: 16
    });

    var maker = new google.maps.Marker({
        position: latLng,
        map: map,
        title: 'Delikatesy Włoskie'
    });
}

function displayMap(value) {
    if (value === 0) {
        var locationSection = $('.location-reservation');
        var locationHeight = locationSection.height();
        $('#map').css({'height': locationHeight});
    } else {
        $('#map').css({'height': value});
    }
}

function boxAdjustments() {
    // Adapt the height of images
    var images = $('.box-image');
    var imageHeight = images[0].height;
    var boxes = $('.content-box');

    $(boxes).each(function (i, element) {
        $(element).css({'height': imageHeight + 'px'})
    });
}

$(document).ready(function () {

    // Menu Button
    $('.mobile-menu').on('click', function () {
        $('nav.site-nav').toggle('slow');
    });

    // Mobile Menu
    var breakPoint = 768;
    $(window).resize(function () {
        boxAdjustments();
        if ($(document).width() >= breakPoint) {
            $('nav.site-nav').show();
        } else {
            $('nav.site-nav').hide();
        }
    });

    // Fluidbox
    jQuery('.gallery a').each(function () {
        jQuery(this).attr({'data-fluidbox': ''})
    });

    if (jQuery('[data-fluidbox]').length > 0) {
        jQuery('[data-fluidbox]').fluidbox();
    }


    //Adapt Map
    var map = $('#map');
    if (map.length > 0) {
        if ($(document).width() >= breakPoint) {
            displayMap(0);
        } else {
            displayMap(300);
        }
    }
    $(window).resize(function () {
        if ($(document).width() >= breakPoint) {
            displayMap(0);
        } else {
            displayMap(300);
        }
    });

    // Slider
    $('.bxslider').bxSlider({
        auto: true,
        controls: true
    });

});
