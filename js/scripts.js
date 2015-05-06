
/***************** Waypoints ******************/
$(window).load(function () {

    $('.wp1').waypoint(function () {
        $('.wp1').addClass('animated fadeInDown');
    }, {
        offset: '75%'
    });
    $('.wp2').waypoint(function () {
        $('.wp2').addClass('animated fadeInDown');
    }, {
        offset: '75%'
    });
    $('.wp3').waypoint(function () {
        $('.wp3').addClass('animated fadeInDown');
    }, {
        offset: '75%'
    });
    $('.wp4').waypoint(function () {
        $('.wp4').addClass('animated fadeInDown');
    }, {
        offset: '75%'
    });
    $('.wp5').waypoint(function () {
        $('.wp5').addClass('animated fadeInDown');
    }, {
        offset: '75%'
    });
    $('.wp6').waypoint(function () {
        $('.wp6').addClass('animated fadeInDown');
    }, {
        offset: '75%'
    });

});

/***************** Slide-In Nav ******************/

$(document).ready(function () {

    $('.navicon').click(function () {
        $('#nav-show, .navicon').toggleClass('pull');
        $('#menu-toggle').toggleClass('active');
        $('#social-nav').toggleClass('nav-hide');
        $('#tmlogo').toggleClass('nav-hide');
    });

});

/***************** Smooth Scrolling ******************/

$(function () {

    $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                setTimeout(function() {
                    // Do something after 5 seconds
                    $('html,body').animate({
                        scrollTop: target.offset().top - 50
                    }, 2000);
                }, 1000, 1);
                return false;
            }
        }
    });

});

/***************** Remove expands from Nav and sections ******************/

$(document).ready(function() {
    $('nav > ul > li > a').click(function() {
        $('nav').toggleClass('pull');
        $('#menu-toggle').toggleClass('active');
        $('.navicon').toggleClass('pull');
    });

});

/***************** Nav Transformicon ******************/


/***************** Overlays ******************/

$(document).ready(function() {
    if (Modernizr.touch) {
        // show the close overlay button
        $(".close-overlay").removeClass("hidden");
        // handle the adding of hover class when clicked
        $(".img").click(function(e) {
            if (!$(this).hasClass("hover")) {
                $(this).addClass("hover");
            }
        });
        // handle the closing of the overlay
        $(".close-overlay").click(function(e) {
            e.preventDefault();
            e.stopPropagation();
            if ($(this).closest(".img").hasClass("hover")) {
                $(this).closest(".img").removeClass("hover");
            }
        });
    } else {
        // handle the mouseenter functionality
        $(".img").mouseenter(function() {
                $(this).addClass("hover");
            })
            // handle the mouseleave functionality
            .mouseleave(function() {
                $(this).removeClass("hover");
            });
    }
});

/***************** Flexsliders ******************/




/* ---------------------------------------------
 Height 100%
 --------------------------------------------- */

$(document).ready(function() {
    js_height_init();

});



$(window).resize(function() {

    js_height_init();

});

function js_height_init() {
    (function($) {
        $('.js-height-full').height($(window).height());

    })(jQuery);

}

$(document).ready(function() {
    setupRotator();
});


function setupRotator() {
    if ($('.brandItem').length > 1) {
        $('.brandItem:first').addClass('current').fadeIn(500);
        setInterval('textRotate()', 5000);
    }
}

function textRotate() {
    var current = $('#brand-text > .current');
    if (current.next().length == 0) {
        current.removeClass('current').fadeOut(1000);
        setTimeout(function() {
            $('.brandItem:first').addClass('current').fadeIn(500);
        }, 1000);
    } else {
        current.removeClass('current').fadeOut(1000);
        setTimeout(function() {
            current.next().addClass('current').fadeIn(500);
        }, 1000);
    }

}


/* ---------------------------------------------
Case Study
 --------------------------------------------- */

$(document).ready(function () {

    $('.info-dump-button').click(function() {

        var target_div_id = $(this).data('target-id');

        var target_div_link = "cases/" + target_div_id;

        $("#case_study_expander_wrap").load(target_div_link, function() {

            // var target_div_id = $(this).data('target-id');
            // var portfolio_dump_data = $('#' + target_div_id).html();


            $('#case_study_expander_wrap').addClass('case-active');
            $("html, body").animate({
                scrollTop: $('#case_study_expander_wrap').offset().top - 60
            }, {
                duration: 1000,
                easing: "easeInOutExpo"
            });
        });
    });
    return false;
});

$('.expander-close, .close-study-btn').live('click', function() {
    $('#case_study_expander_wrap').removeClass('case-active');

    setTimeout(function() {
        $('#case_study_expander_wrap').html('');
    }, 500);
    $("html, body").animate({
        scrollTop: $('.portfolio').offset().top
    }, {
        duration: 1000,
        easing: "easeInOutExpo"
    });

    return false;

});

$(document).ready(function() {
    $('#portfolioSlider').flexslider({
        animation: "slide",
        slideshowSpeed: 3000,
        directionNav: false,
        controlNav: true,
        touch: false,
        pauseOnHover: true,
        start: function() {
            $.waypoints('refresh');
        }
    });

    $('#servicesSlider').flexslider({
        animation: "slide",
        directionNav: false,
        controlNav: true,
        touch: true,
        pauseOnHover: true,
        start: function() {
            $.waypoints('refresh');
        }
    });

    $('#teamSlider').flexslider({
        animation: "slide",
        directionNav: false,
        controlNav: true,
        touch: true,
        pauseOnHover: true,
        start: function() {
            $.waypoints('refresh');
        }
    });

});


$(document).ready(function() {
    var theForm = document.getElementById('theForm');

    new stepsForm(theForm, {
        onSubmit: function(form) {
            // hide form
            classie.addClass(theForm.querySelector('.simform-inner'), 'hide');
            //disable the default form submission

             classie.addClass(theForm.querySelector('.sending-message'), 'show');

            //grab all form data  
            var formData = new FormData(theForm);
            $.ajax({
                url: 'http://icpublishing.co.uk/dev/engage/api/subscribe/index.php',
                type: 'POST',
                data: formData,
                async: true,
                cache: false,
                contentType: false,
                processData: false
            })

            .done(function(response) {
                classie.removeClass(theForm.querySelector('.sending-message'), 'show');
                classie.addClass(theForm.querySelector('.sending-message'), 'hide');

                    var messageEl = theForm.querySelector('.final-message');
                    messageEl.innerHTML = response;
                    classie.addClass(messageEl, 'show');
                })
                .fail(function(data) {
                    if (data.responseText !== '') {
                        classie.removeClass(theForm.querySelector('.sending-message'), 'show');
                        classie.addClass(theForm.querySelector('.sending-message'), 'hide');
                        var messageE3 = theForm.querySelector('.final-message');
                        messageE3.innerHTML = data.responseText;
                        classie.addClass(messageE3, 'show');
                    } else {
                        classie.removeClass(theForm.querySelector('.sending-message'), 'show');
                        classie.add(theForm.querySelector('.sending-message'), 'hide');
                        var messageE2 = theForm.querySelector('.final-message');
                        messageE2.innerHTML = 'Oops! An error occured and your message could not be sent';
                        classie.addClass(messageE2, 'show');
                    }
                });
        }
    });

});