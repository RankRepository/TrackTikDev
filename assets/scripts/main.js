
/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

function msShare(socialmedia, url) {
    var winTop = (screen.height / 2) - (520 / 2);
    var winLeft = (screen.width / 2) - (350 / 2);

    var sharerurl ="";
    if( socialmedia === "facebook"){
      sharerurl = "https://www.facebook.com/sharer.php?u=" +url;
    }
    if( socialmedia === "twitter"){
      sharerurl = "https://twitter.com/share?url=" +url;
    }
    if( socialmedia === "linkedin"){
      sharerurl = "https://www.linkedin.com/shareArticle?url=" +url;
    }

    window.open(sharerurl, 'sharer', 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + 520 + ',height=' + 350);
}


(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
        //  $(window).load(function() {
          $('.wrapper-loader').fadeOut(700);

          new WOW().init();
        //});

         windowWidth = $(window).width();
         windowHeight = $(window).height();
        var owl = $(".owl-carousel");
        var owlQuotes = $(".owl-carousel-quotes");


        
        // animation en bounce des écrans
        var inc = 0; 

        var animationSlideDownCarousel = function () {

            var $slideDown = $('.anim-slide-down');

            $slideDown.each(function(){
               TweenLite.to($(this), 1, {css:{top: 0}, delay: inc, ease:Back.easeOut.config(2)});
               inc += 0.1;
            });
        };

        $(window).resize(function() {
           windowWidth = $(window).width();
           windowHeight = $(window).height();

          if(windowWidth > 767){

            //pleine écran
            if($('.fit-screen').hasClass('banner-video')) {
              $('.fit-screen').outerHeight(windowHeight);
            } else {
              $('.fit-screen').outerHeight(windowHeight*0.55);
            }

            //ajouter la class fixed ou non au menu selon le scroll
            var scroll = $(window).scrollTop();

            if(windowWidth > 1024) {
                if(scroll > 100){
                    $('.header').addClass('fixed');
                } else {
                    $('.header').removeClass('fixed');
                }

            } else {
                $('.header').removeClass('fixed');
            }

            //position du pop-up fixed au scroll 
            if($('.jobs-text-popup').length){
                var distance = $('.jobs-text-popup').offset().top,
                    $fenetre = $(window);

                $fenetre.scroll(function() {
                  if(windowWidth > 767) {
                    if ( $fenetre.scrollTop() >= distance ) {
                        // Your div has reached the top
                        $('.popup-fixed').addClass('position-fixed');
                    } else {
                        $('.popup-fixed').removeClass('position-fixed');
                    }
                  }
                });
            }

            // Animation des device au scroll
            // scrollorama
            if($('.device-scroll').length){
              $(document).ready(function() {     
                var scrollorama = $.scrollorama({ blocks:'.animated-device' });
                scrollorama.animate('.device-scroll',{ duration: 1200, delay:-650, property:'bottom', start:-600,end: -300, easing: 'bounce baby' });
              });
            }

            // scrollorama Mac Home
            if($('.box-img').length){
              $(document).ready(function() {
                var scrollorama = $.scrollorama({ blocks:'.box-img-txt-home' });
                scrollorama.animate('.box-img',{
                    duration:600, delay:-900, property:'bottom', start:-200,end: 30, easing: 'bounce baby'
                });
              });
            }

            var maxHeight = -1;

            $('.pdf-list-container li >.pdf').each(function() {
              maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
            });

            $('.pdf-list-container li >.pdf').each(function() {
              $(this).height(maxHeight);
            });

            // thre box color height
            // var maxHeight = 0;

            // $('.three-col-colorBox .box .inner').each(function(){
            //    maxHeight = $(this).height() > maxHeight ? $(this).height() : maxHeight;
            // });
            // $('.three-col-colorBox .box .inner').height(maxHeight);

          } else {
            $('.fit-screen').outerHeight('auto');
          }

        });

        $(window).trigger('resize');

        if(windowWidth >= 768){

          // bounce screen
          var waypoints = $('.animated-screen').waypoint(function(direction) {
            animationSlideDownCarousel();
          }, {
            offset: '80%'
          });

          $(window).scroll(function(){
              //ajouter la class fixed ou non au menu selon le scroll
              var scroll = $(window).scrollTop();

              if(windowWidth > 1024) {
                  if(scroll > 100){
                      $('.header').addClass('fixed');
                  } else {
                      $('.header').removeClass('fixed');
                  }
              } else {
                  $('.header').removeClass('fixed');
              }

          });
        }

        //**********
        // ANIMATE SCROLL TO ANCHOR
        //**********
        //animation du scroll
        $('a.anchor').click(function() {
            if (location.pathname.replace(/^\//,'') === this.pathname.replace(/^\//,'') && location.hostname === this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top - 60
                    }, 700);
                    return false;
                }
            }
        });


        ///////////////
        // People list scroll to content en MOBILE
        ///////////////////////////////
        
          $('.nav-tabs li').click(function(){

              if (windowWidth < 768) {
                  $('html,body').animate({
                      scrollTop: $('#container-tab-description').offset().top - 60
                  }, 500);
              }
          });

        // CAROUSEL QUPTES - FOOTER
        owlQuotes.owlCarousel({
          navigation : true,
          navigationText : ["<",">"],
          pagination : false,
          autoPlay:false,
          slideSpeed : 1000,
          autoHeight : false,
          singleItem:true
          
        });


        // CAROUSEL CLIENT - FOOTER
        owl.owlCarousel({
          navigation : true,
          navigationText : ["<",">"],
          pagination : false,
          autoPlay:true
        });

        $(".owl-carousel-next").click(function(){
          owl.trigger('owl.next');
        });

        $(".owl-carousel-prev").click(function(){
          owl.trigger('owl.prev');
        });

        ///////////////
        // MENU DESKTOP
        ///////////////////////////////
          
          // au hover du submenu ou affiche la flleche du parent
          $('.sub-menu').mouseenter(function() {
            var lien = $(this).parent();
            lien.addClass('arrowVisible');
          });

          $('.sub-menu').mouseleave(function() {
            var lien = $(this).parent();
            lien.removeClass('arrowVisible');
          });

          $('.sub-menu a').click(function(event) {
            //event.preventDefault();
          });
          

        //////////////
        // MENU MOBILE
        ///////////////////////////////
        $( '#dl-menu' ).dlmenu({
          animationClasses : { classin : 'dl-animate-out-2', classout : 'dl-animate-out-2' }
        });
        
        
        //////////////
        // Start your trial
        ///////////////////////////////
        $( 'a[href="#openModal"]' ).click(function(e){
          e.preventDefault();
          $("#modalFormGeneral").modal("show");
        });


        ////////////////
        // Modal video stop video
        ////////////////
        
        $('.modal-form').on('hidden.bs.modal', function (e) {
          if ($(e.target).find('.videoWrapper').length) {
            var urlVideo = $(this).find('iframe').attr('src');
            $(this).find('iframe').attr('src','');
            $(this).find('iframe').attr('src',urlVideo);
          }
         });

        ////////////////
        // REVEAL - Icons list Home
        ////////////////
        window.sr = ScrollReveal();
        sr.reveal('.icons-list .item', { duration: 800, viewFactor: 0.8 });
        sr.reveal('.animated-device-home ul .item', { duration: 800, viewFactor: 0.8 });


        ////////////////
        // CHART.JS
        ////////////////
        if($('#tracktikChart').length > 0) {
          var ctx = document.getElementById("tracktikChart").getContext("2d");
        }

        // Animation Chart au Scroll
        var inView = false;

        function isScrolledIntoView(elem)
        {
            var docViewTop = $(window).scrollTop();
            var docViewBottom = docViewTop + $(window).height();

            var elemTop = $(elem).offset().top;
            var elemBottom = elemTop + $(elem).height();

            return ((elemBottom <= docViewBottom) && (elemBottom >= docViewTop));
        }

        $(window).scroll(function() {
          if($('#tracktikChart').length > 0) {
            if (isScrolledIntoView('#tracktikChart')) {
                if (inView) { return; }
                inView = true;

                // Création du Chart
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: tkChartDays,
                        datasets: [{
                            backgroundColor : "rgba(73,160,193,.3)",
                            lineTension : 0,
                            borderWidth : 2,
                            borderColor : "#111b43",
                            pointRadius: 4,
                            pointBackgroundColor : "#fff",
                            pointBorderColor : "#111b43",
                            pointBorderWidth : 2,
                            pointHoverRadius : 5,
                            pointHoverBackgroundColor : "#20a8a6",
                            pointHoverBorderWidth : 1,
                            data : [31,37,27,67,26,2,4]
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            text: tkChartTitle,
                            fontColor : "#333",
                            fontSize : 14,
                            fontFamily : "Poppins,sans-serif"
                        },
                        legend: {
                          display: false
                        },
                        gridLines : {
                          display: false
                        },
                        animation : {
                          duration : 1500
                        },
                        scaleFontColor : "#000",
                        scaleGridLineColor: '#EFEFEF',
                        scaleLineColor : "transparent",
                        scaleShowVerticalLines: false,
                        bezierCurve : false,
                        scaleOverride : true,

                        scales: {
                            yAxes: [{
                                ticks: {
                                    max: 80,
                                    min: 0,
                                    stepSize: 20
                                }
                            }]
                        }
                    },
                    responsive: true
                });
            } else {
                inView = false;  
            }
          }
        });
        //---- END CHART.JS

        // ANIMATION ARROWS GRAPH
        $(window).scroll(function() {
            if($('.one-col-graphic .img-animated').length > 0) {
                if (isScrolledIntoView('.one-col-graphic .img-animated')) {
                    if (inView) { return; }
                    inView = true;

                    $('.one-col-graphic .img-animated').addClass('anim-rotation');
                    setTimeout(function(){
                      $('.one-col-graphic .col-image .txt').addClass('active');
                    }, 600);
                }
            }
        });

        // PAGE THANK YOU
        if($('body').hasClass('thank-you') || $('body').hasClass('message-sent')) {
          $('#modalFormGeneral').remove();
        }
        
        
        
        // Social Media Sharer
        var $sharers = $('[data-js="sm-sharer"]');
        $sharers.click( function(e) {

          e.preventDefault();
          var type = $(this).data('sm-type');
          var link = $(this).data('link');
          msShare(type, link);

        });


        // **************
        // PAGE CAREER
        // **************        
          // function calcFlipperHeight(){
          //       var frontHeight = $(".flipper .front").height();
          //       $('.flipper .back').height(frontHeight);
          // }

          $('.flipper').click(function(){
              //calcFlipperHeight();
              if(windowWidth > 767 ) {
                if(!($(this).hasClass("flip"))) {
                    $(".flipper").each(function() {
                        if($(this).hasClass('flip')){
                            $(this).removeClass('flip');
                        }
                    });
                    $(this).addClass("flip");
                } else {
                    $(this).removeClass('flip');
                }
              }
          });

          

          // $(window).resize(function(){
          //     if(windowWidth > 767 ) {
          //       calcFlipperHeight();
          //     }
          // });



          // CAROUSEL 3D
          $('.slider.center').slick({
            centerMode: true,
            centerPadding: '60px',
            slidesToShow: 3,
            responsive: [
              {
                breakpoint: 768,
                settings: {
                  //arrows: false,
                  centerMode: true,
                  //centerPadding: '40px',
                  slidesToShow: 1
                }
              }
            ]
          });

          //CUSTOM FILE UPLOAD 
          $('input[type=file]').customFile();

      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
        // console.log($(".modal-form").length);
        $(".modal-form").each(function(){
           $(this).appendTo( "body" );          
        });
        
        $("iframe.pardotform").each(function(){
          var iframeurl = $(this).attr("src") ;
          $(this).attr("src", iframeurl);
        });        
        
        
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page

        
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    } ,
    'page_template_page_blog' :{
      init : function(){
        
        var $news = $('[data-js="filter-news"]');
        $("#selectCat").change( function(){
          var curcat = parseInt($(this).val() );
          
          
          if(curcat){
            $.each($news, function(){
              $(this).hide();
              if( $(this).data("cat") ===  curcat){
                $(this).show();
              }

            });            
          }else{
            $news.show();
          }
          

        } );
        
      }
      
    },
    'page_template_page_whitepapers_studycases' :{
      init : function(){
        
        var $whitepapers = $('[data-js="whitepaper"]');
        var $filters = $('[data-js="filterpaper"]');
        $filters.click( function(){
          $filters.removeClass("current");
          $(this).addClass("current");
          
          var curcat = parseInt($(this).data("cat") );
                    
          if(curcat){
            $.each($whitepapers, function(){
              
              $(this).hide();
              if( $(this).data("cat") ===  curcat){
                $(this).fadeIn(800);
              }

            });            
          }else{
            $whitepapers.fadeIn(800);
          }
          

        } );
        
      }
      
    }    ,
    'single_job' :{
      init : function(){

        //CHECK ERROR
        function checkFormError(form){
          var erreur = false;
          $(form).find("[data-required]").each(function(){
              $(this).removeClass("data-required");

              if($(this).val() === ""){
                  $(this).addClass("data-required");
                  erreur = true;
              }

              //If File upload
              var type = $(this).attr("type");
              //if()
          });

          return erreur;
        }


        var ajaxprocessing = 0;
        $("#formJob").submit(function( e ){
            e.preventDefault();

            if(ajaxprocessing){
                return;
            }


            $("[class^='txt-notif'], [class*=' txt-notif']").hide();

            if( checkFormError(this)){
                $(".txt-notification-empty-field").show();

            }else {

                // Create a formdata object and add the files
                ajaxprocessing =1;
                $(".txt-notification-cv-sending").slideDown();

                var data = new FormData( this );
                $.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    data: data,
                    cache: false,
                    dataType: 'json',
                    processData: false, // Don't process the files
                    contentType: false, // Set content type to false as jQuery will tell the server its a query string request
                    success: function(data, textStatus, jqXHR)  {
                        ajaxprocessing = 0;
                        $(".txt-notification-cv-sending").hide();


                        if(data.status === "success"){

                            $("#formJob [data-required]").val("");
                            $(".txt-notification-cv-sent").slideDown();

                        }

                        if(data.status === "errorfiletype"){
                            $(".txt-notification-cv-badtype").slideDown();
                        }
                        if(data.status === "errorfilesize"){
                            $(".txt-notification-cv-badtype").slideDown();
                        }

                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        ajaxprocessing = 0;

                        console.log('ERRORS: ' + textStatus);
                    }
                });

            }


        });

      }

    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
