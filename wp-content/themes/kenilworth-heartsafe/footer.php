<footer class="site-footer">
  <div class="container">
    <div class="site-footer__col site-footer__col--first">

      <a href="/" title="Kenilworth Heartsafe" class="site-footer__logo">
        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Kenilworth Heartsafe" width="100" height="100" />
      </a>

      <?php if(get_option('footer_text')) : ?>
        <p><?php echo get_option('footer_text'); ?></p>
      <?php endif; ?>

      <ul class="footer-social">

        <?php if(get_option('facebook_link')) : ?>
        <li class="footer-social__item">
          <a href="<?php echo get_option('facebook_link'); ?>" target="_blank" title="Find us on Facebook" class="footer-social__link">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm3 8h-1.35c-.538 0-.65.221-.65.778v1.222h2l-.209 2h-1.791v7h-3v-7h-2v-2h2v-2.308c0-1.769.931-2.692 3.029-2.692h1.971v3z"/></svg>
          </a>
        </li>
        <?php endif; ?>
       
        <?php if(get_option('x_link')) : ?>
        <li class="footer-social__item">
          <a href="<?php echo get_option('x_link'); ?>" target="_blank" title="Find us on X" class="footer-social__link">
            <svg xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" image-rendering="optimizeQuality" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" viewBox="0 0 512 512"><path fill="#fff" d="M256 0c141.384 0 256 114.616 256 256 0 141.384-114.616 256-256 256C114.616 512 0 397.384 0 256 0 114.616 114.616 0 256 0zm62.64 157.549h33.401l-72.974 83.407 85.85 113.495h-67.222l-52.645-68.837-60.244 68.837h-33.422l78.051-89.212-82.352-107.69h68.924l47.59 62.916 55.043-62.916zm-11.724 176.908h18.509L205.95 176.494h-19.861l120.827 157.963z"/></svg>
            </a>
        </li>
        <?php endif; ?>

      </ul>
    </div>

    <div class="site-footer__col site-footer__col--navigate">
      <h2 class="h4 site-footer__heading">Navigate</h2>
      <?php wp_nav_menu( array( 'menu' => 'main-menu', 'menu_class' => 'site-footer-links', 'container' => 'ul', )); ?>     
    </div>  

    <div class="site-footer__col site-footer__col--contact">
      <h2 class="h4 site-footer__heading">Contact</h2>

      <?php if(get_option('address')) : ?>
        <p>
          <strong>Address</strong><br/>
          <?php echo get_option('address'); ?>
        </p>
      <?php endif; ?>

      <p>
        <?php if(get_option('tel_number')) : ?>
          <strong>Tel</strong><br/>
          <?php echo get_option('tel_number'); ?>
          <br />
        <?php endif; ?>      
      </p>

      <p>
        <?php if(get_option('email_address')) : ?>
          <strong>Email</strong><br/>
          <a href="mailto:<?php echo get_option('email_address'); ?>?subject=Website Enquiry" target="_blank" title="Email Kenilworth Heartsafe"><?php echo get_option('email_address'); ?></a>        
        <?php endif; ?>
      </p>
      
    </div> 

    <div class="site-footer__col site-footer__col--donate">
      <h2 class="h4 site-footer__heading">Donate</h2>    
      
      <?php if(get_option('footer_donate')) : ?>
        <p><?php echo get_option('footer_donate'); ?></p>
      <?php endif; ?>  

      <a href="<?php echo get_option('donate_link'); ?>" title="Donate" target="_blank" class="btn btn--primary btn--alt site-footer__donate-btn">Donate</a>  
    </div>
 

    <div class="site-footer-bottom">

      <?php wp_nav_menu( array( 'menu' => 'footer-menu', 'menu_class' => 'site-footer-links site-footer-links--inline', 'container' => 'ul', )); ?>

      <p>&copy<?php echo date("Y"); ?> <?php echo get_option('footer_copyright'); ?></p>      

      <p><?php echo get_option('site_creator'); ?></p>
    </div>

  </div>
</footer>
<?php echo get_option('resdiary_scripts'); ?>
<?php wp_footer(); ?>
</body>
</html>