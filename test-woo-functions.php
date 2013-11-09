add_theme_support( 'woocommerce' );

remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

add_action('woocommerce_before_main_content', 'addymae_woo_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'addymae_woo_wrapper_end', 10);

function addymae_woo_wrapper_start() {
  get_header();
  echo '<div class="row">';
	if ( SIDEBAR_POSITION == 'left' ) :
        get_sidebar();
        endif;
  echo '<div id="main" class="';
  echo MAIN_WIDTH;
  echo '" role="main">';
	
  echo '<article id="post-' . the_ID() . '" class="woo" role="article" itemscope itemtype="http://schema.org/BlogPosting">';
  echo '<header class="page-header"><h1 itemprop="headline"><a href="' . the_permalink() . '">' . the_heading(). '</a></h1></header><section class="entry-content" itemprop="articleBody">';
}

function addymae_woo_wrapper_end() {
  echo '</section></article></div><!-- end main -->';
	if ( SIDEBAR_POSITION == 'right' ) :
        get_sidebar();
   endif;
    echo '</div> <!-- end .row -->';
	get_footer();
  }