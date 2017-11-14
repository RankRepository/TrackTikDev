<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php //body_class(); ?>>
      
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KGD4VMD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
      
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>
    
    <!--<div class="wrapper-loader">
      <img src="<?php //echo get_template_directory_uri(); ?>/assets/images/ui/T-loader-rouge.gif" alt="loader">
    </div>-->

    <div class="" role="document">
      <div class="content">
        <main class="">
          <?php include Wrapper\template_path(); ?>
        </main><!-- /.main -->
        <?php if (Setup\display_sidebar()) : ?>
          <aside class="sidebar">
            <?php //include Wrapper\sidebar_path(); ?>
          </aside><!-- /.sidebar -->
        <?php endif; ?>
      </div><!-- /.content -->
    </div><!-- /.wrap -->
    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>


    <div class="modal fade modal-form" id="careersModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">

      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
           </div>
           <div class="wrapper-job">

              <p class="title">Be Part of our Colorful, Passionate, Talented Family.</p>
              <form id="formJobPopup" class="form-job" action="">
                <input type="hidden" name="action" value="tracktik_send_cv">
                <input type="hidden" name="jobid" value="">
                <label for="">
                    <span class="form-text"><?php _e("Name", "tracktik"); ?>*</span>
                    <input class="form-input" name="name" data-required type="text">
                </label>
                <label for="">
                    <span class="form-text"><?php _e("Email", "tracktik"); ?>*</span>
                    <input class="form-input" name="email" data-required  type="email">
                </label>
                <label for="">
                    <span class="form-text"><?php _e("Leave your mark", "tracktik"); ?>*</span>
                    <div class="custom-file-upload">
                        <!--<label for="file">File: </label>-->
                        <input class="form-input" type="file" id="file" name="cvfile" data-required multiple />
                    </div>
                </label>


                <p class="txt-notification-empty-field"><?php _e("Please, fill in all fields", "tracktik"); ?></p>
                <p class="txt-notification-cv-sent"><?php _e("Thank you", "tracktik"); ?></p>
                <div class="txt-notification-cv-sending"><div class="wrapper-loader-ajax"></div></div>
                <p class="txt-notification-cv-badtype"><?php _e("Please, send a PDF file of 5 MB and less ", "tracktik"); ?></p>
                <label for="">
                    <button class="form-btn"><?php _e("Apply", "tracktik"); ?></button>
                </label>
            </form>  
          </div>
        </div>
      </div>

    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js' type='text/javascript'></script>

    <script>
    
    (function($) {

        if (location.href.indexOf("#support") != -1) {
            $('html, body').animate({
              scrollTop: $(".our-customer-support").offset().top
            }, 1000);
        }

       function setCookie(cname, cvalue, exdays) {
            document.cookie = cname + "=" + cvalue + ";path=/";
       }

        
        if ($('body').hasClass('tax-job_category')) {

            if (document.cookie.indexOf('careersModal=') == -1) {
              $('body').prepend('<div class="leaving-fixed"></div>');

              $(".leaving-fixed").mouseover(function(){

                if (document.cookie.indexOf('careersModal=') > 0)
                  return;
                $('body').append('<div class="modal-backdrop careers fade in"></div>');

                  
                $('#careersModal').addClass('in').show();
                setCookie('careersModal', true);
              });

         }

       }

        // FORM JOBS 
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


        $('#careersModal .close').click(function(e){
          $('#careersModal').removeClass('in').hide();
          $('.modal-backdrop.careers').remove();

        });

        $('#careersModal').click(function(e){
          var container = $(".modal-dialog");

          if (!container.is(e.target) && container.has(e.target).length === 0) {
              $('#careersModal').removeClass('in').hide();
              $('.modal-backdrop.careers').remove();
          }

        });
        
        var ajaxprocessing = 0;
        $("#formJobPopup").submit(function( e ){
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


       



    })(jQuery); 

    </script> 


<?php
   global $post;
   $post_slug=$post->post_name;
     if ($post_slug == 'thank-you-lead' || $post_slug == 'message-sent' || $post_slug == 'messagesent' || $post_slug == 'thank-you-guide') :
 ?>

<script type="text/javascript">
var capterra_vkey = 'bc0288fb83cd39da8d0c4622b19b4328',
capterra_vid = '2093164',
capterra_prefix = (('https:' == document.location.protocol) ? 'https://ct.capterra.com' : 'http://ct.capterra.com');
(function()
{ var ct = document.createElement('script'); ct.type = 'text/javascript'; ct.async = true; ct.src = capterra_prefix + '/capterra_tracker.js?vid=' + capterra_vid + '&vkey=' + capterra_vkey; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ct, s); }
)();
</script>

<?php endif; ?>

<style type="text/css">
  html { opacity: 1 !important; }
  .smart-page-loader { display: none !important;}
</style>
  </body>
</html>
