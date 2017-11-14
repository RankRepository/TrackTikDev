<?php 

$curLang =  "_" . ICL_LANGUAGE_CODE;

?>


<footer class="footer">
    <a href="#openModal" class="get-a-demo">Get a demo!</a>
    <div class="footer-nav">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <p class="footer-title"><?php echo get_option('tracktick_footer_col1_title' . $curLang); ?></p>
                    <nav>
                        <a href="tel:<?php echo get_option('tracktick_footer_col1_num_link_usa' . $curLang); ?>"><?php echo get_option('tracktick_footer_col1_num_usa'. $curLang); ?></a>
                        <a href="tel:<?php echo get_option('tracktick_footer_col1_num_link_can'. $curLang); ?>"><?php echo get_option('tracktick_footer_col1_num_can'. $curLang); ?></a>
                        <a href="tel:<?php echo get_option('tracktick_footer_col1_num_link_uk'. $curLang); ?>"><?php echo get_option('tracktick_footer_col1_num_uk'. $curLang); ?></a>
                        <a href="mailto:<?php echo get_option('tracktick_footer_col1_email_address'. $curLang); ?>"><?php echo get_option('tracktick_footer_col1_email_address'. $curLang); ?></a>
                        
                        <!--<?php echo get_option('tracktick_footer_col1_countries'. $curLang); ?>
                        <a href="tel:<?php echo get_option('tracktick_footer_col1_countries_num1_link'. $curLang); ?>"> <?php echo get_option('tracktick_footer_col1_countries_num1'. $curLang); ?></a>
                        <a href="tel:<?php echo get_option('tracktick_footer_col1_countries_num2_link'. $curLang); ?>"><?php echo get_option('tracktick_footer_col1_countries_num2'. $curLang); ?></a>
                        -->
                        <a href="<?php echo pn_get_url_from_template("pages/page-contact.php"); ?>"><?php _e('Contact Us','tracktik') ?></a>
                    </nav>
                    <br>
                    <br>
                    <br>                    
                    <br>
                    <br>
                    <p class="footer-title"><?php echo get_option('tracktick_footer_block_support'. $curLang); ?></p>
                    <a href="tel:<?php echo get_option('tracktick_footer_block_support_phone_label'. $curLang); ?>">
                        <?php echo get_option('tracktick_footer_block_support_phone'. $curLang); ?>
                    </a>
                    <br>
                    <a href="mailto:<?php echo get_option('tracktick_footer_block_support_email'. $curLang); ?>">
                        <?php echo get_option('tracktick_footer_block_support_email'. $curLang); ?>
                    </a>
                </div>
                <div class="col">
                    <p class="footer-title"><?php echo get_option('tracktick_footer_col2_title'. $curLang); ?></p>
                    <nav>
                        <?php wp_nav_menu( array(
                            'menu'           => 'Menu - col2', // Do not fall back to first non-empty menu.
                            'theme_location' => '__no_such_location',
                            'fallback_cb'    => false // Do not fall back to wp_page_menu()
                        ) ); ?>
                    </nav>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <p class="footer-title">TrackTik</p>
                    <address>
                        <?php echo get_option('tracktick_footer_col1_address'. $curLang); ?><br>
                        <?php echo get_option('tracktick_footer_col1_address_city_province'. $curLang); ?><br>
                        <?php echo get_option('tracktick_footer_col1_address_country_postalcode'. $curLang); ?>
                    </address>
                </div>
                <div class="col">
                    
                    <p class="footer-title"><?php echo get_option('tracktick_footer_col3_title'. $curLang); ?></p>
                    <nav>
                        <?php wp_nav_menu( array(
                            'menu'           => 'Menu - col3', // Do not fall back to first non-empty menu.
                            'theme_location' => '__no_such_location',
                            'fallback_cb'    => false // Do not fall back to wp_page_menu()
                        ) ); ?>
                    </nav>
                    <br>
                    <br>
                    <br>
                    <br>
                     <p class="footer-title"><?php echo get_option('tracktick_footer_block_legal'. $curLang); ?></p>
                    <nav>
                        <?php wp_nav_menu( array(
                            'menu'           => 'Menu - Legal', // Do not fall back to first non-empty menu.
                            'theme_location' => '__no_such_location',
                            'fallback_cb'    => false // Do not fall back to wp_page_menu()
                        ) ); ?>
                    </nav>

                    
                </div>
                <div class="col">
                    <p class="footer-title"><?php _e('Social Media','tracktik') ?></p>
                    <ul class="share-list">
                        <li><a href="https://www.facebook.com/Tracktikguardtours" target="_blank"><span class="icon-facebook"></span></a></li>
                        <li><a href="https://twitter.com/TrackTik" target="_blank"><span class="icon-twitter"></span></a></li>
                        <li><a href="https://www.youtube.com/channel/UC9AgMG8Z_hkL9KMMMeE1lTg" target="_blank"><span class="icon-youtube"></span></a></li>
                        <li><a href="https://www.linkedin.com/company/staffr-integrated-solution" target="_blank"><span class="icon-linkedin2"></span></a></li>
                    </ul>
                    <a href='http://www.capterra.com/physical-security-software/reviews/132312/TrackTik/TrackTik%20Software?utm_source=vendor&utm_medium=badge&utm_campaign=capterra_reviews_badge'>  <img border='0' src='https://assets.capterra.com/badge/c854c13c00f45f76cbc9df1175d47661.png?v=2093164&p=132312' /></a>
                    <br>
                    <br>
                    <p class="footer-title" style="margin-top: 8px;"><?php echo get_option('tracktick_footer_block_industry'. $curLang); ?></p>
                    <div class="industry">
                        <img width="70" src="<?php echo get_template_directory_uri(); ?>/assets/images/industry_light.png" />
                        <div class="syi">Member of the<br>Security Institute</div>
                        <div class="asis">Member of ASIS International<span><br>Mark Folmer, CPP, MSyI<br>Vice President Security Industry</span></div>
                    </div>
                </div>

                

            </div>
        </div>
    </div>

    <div class="footer-copyright">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 left">
                    <p><?php _e('All rights reserved','tracktik') ?>&nbsp;<?php echo date('Y'); ?></p>
                </div>
                <div class="col-sm-6 right">
                    <a href=""><?php _e('Privacy Policy','tracktik') ?></a>
                </div>
            </div>
        </div>
    </div>

</footer>

<script defer async>

window.onload = function () {

  var menuItems = document.getElementsByClassName('menu-item');
  for (var i = 0; i < menuItems.length; i++) {
    menuItems[i].children[0].removeAttribute('title');
  }

}

</script>


<script data-cfasync="true" type='text/javascript'>/*<![CDATA[*/window.olark||(function(c){var f=window,d=document,l=f.location.protocol=="https:"?"https:":"http:",z=c.name,r="load";var nt=function(){
f[z]=function(){
(a.s=a.s||[]).push(arguments)};var a=f[z]._={
},q=c.methods.length;while(q--){(function(n){f[z][n]=function(){
f[z]("call",n,arguments)}})(c.methods[q])}a.l=c.loader;a.i=nt;a.p={
0:+new Date};a.P=function(u){
a.p[u]=new Date-a.p[0]};function s(){
a.P(r);f[z](r)}f.addEventListener?f.addEventListener(r,s,false):f.attachEvent("on"+r,s);var ld=function(){function p(hd){
hd="head";return["<",hd,"></",hd,"><",i,' onl' + 'oad="var d=',g,";d.getElementsByTagName('head')[0].",j,"(d.",h,"('script')).",k,"='",l,"//",a.l,"'",'"',"></",i,">"].join("")}var i="body",m=d[i];if(!m){
return setTimeout(ld,100)}a.P(1);var j="appendChild",h="createElement",k="src",n=d[h]("div"),v=n[j](d[h](z)),b=d[h]("iframe"),g="document",e="domain",o;n.style.display="none";m.insertBefore(n,m.firstChild).id=z;b.frameBorder="0";b.id=z+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){
b.src="javascript:false"}b.allowTransparency="true";v[j](b);try{
b.contentWindow[g].open()}catch(w){
c[e]=d[e];o="javascript:var d="+g+".open();d.domain='"+d.domain+"';";b[k]=o+"void(0);"}try{
var t=b.contentWindow[g];t.write(p());t.close()}catch(x){
b[k]=o+'d.write("'+p().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}a.P(2)};ld()};nt()})({
loader: "static.olark.com/jsclient/loader0.js",name:"olark",methods:["configure","extend","declare","identify"]});
/* custom configuration goes here (www.olark.com/documentation) */
olark.identify('7530-860-10-1234');/*]]>*/</script><noscript><a href="https://www.olark.com/site/7530-860-10-1234/contact" title="Contact us" target="_blank">Questions? Feedback?</a> powered by <a href="http://www.olark.com?welcome" title="Olark live chat software">Olark live chat software</a></noscript>
