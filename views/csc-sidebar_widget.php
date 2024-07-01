<?php
    $post_author_id = get_post_field( 'post_author', get_the_ID() );
    $author_email = get_the_author_meta( 'user_email', $post_author_id );
    $avatar_data = get_avatar_data( $author_email, array( 'size' => 300 ) );
    $author_name = get_the_author_meta( 'display_name', $post_author_id );

    $author_bio = get_the_author_meta( 'description', $post_author_id );
    $author_website = get_the_author_meta( 'user_url', $post_author_id );

    $author_id = get_the_author_meta('ID');

    $csc_sidebar_args = array(
        'author' => $author_id,
        'post_type' => 'csc-sidebar',
        'post_status' => 'publish',
        'posts_per_page' => 1, 
    );

    $csc_sidebar_posts = new WP_Query( $csc_sidebar_args );
        // Check if the author has any featured posts
        if( $csc_sidebar_posts->have_posts() ):
            while( $csc_sidebar_posts->have_posts() ) : $csc_sidebar_posts->the_post();

            $user_occupation_title = get_post_meta( get_the_ID(), 'csc_sidebar_user_occupation', true );
            $user_location = get_post_meta( get_the_ID(), 'csc_sidebar_user_location', true );

            $user_instagram_link_url = get_post_meta( get_the_ID(), 'csc_sidebar_user_instagram_link', true );
            $user_facebook_link_url = get_post_meta( get_the_ID(), 'csc_sidebar_user_facebook_link', true );
            $user_tiktok_link_url = get_post_meta( get_the_ID(), 'csc_sidebar_user_tiktok_link', true );
            $user_linkedin_link_url = get_post_meta( get_the_ID(), 'csc_sidebar_user_linkedin_link', true );
            $user_github_link_url = get_post_meta( get_the_ID(), 'csc_sidebar_user_github_link', true );
            $user_website_link_url = get_post_meta( get_the_ID(), 'csc_sidebar_user_website_link', true );
            $user_paypal_link_url = get_post_meta( get_the_ID(), 'csc_sidebar_user_paypal_link', true );

            var_dump($display_post_archive);
        ?>

<div class="author-gravatar">

    <?php if( $image ): 
        if( has_post_thumbnail() ){
    ?>
    
    <img 
    src="<?php  echo esc_url( the_post_thumbnail_url()); ?>" 
    alt="<?php echo esc_attr( $author_name ); ?>" 
    height="<?php echo esc_attr( $avatar_data['height'] ); ?>" 
    width="<?php echo esc_attr( $avatar_data['width'] ); ?>">
    <?php 
    }
    endif; 
    ?>
    <div class="author-metadata">
        <?php if( $user_author_name && ! empty (get_the_title())  ): ?>
        <h3 id="author-name"><?php the_title(); ?></h3>
        <?php 
        endif;

        if( $user_occupation && ! empty( $user_occupation_title ) ):
        ?>
        <p id="occupation"><?php echo esc_html( $user_occupation_title ); ?></p>
        <?php
        endif;
        ?>
        <ul >
            <li class="flex_container">
                <i class="fa fa-map-pin "></i><span id="location">&nbsp;<?php echo esc_html( $user_location ) ?></span>
            </li>
            <?php if( $user_website_link && ! empty( $user_website_link_url ) ): 
            ?>
            <li class="flex_container">
                <a class="flex_container" href="<?php echo esc_url( $user_website_link_url ); ?>" aria-label="Author's Website" target="blank">
                    <span class="author-website"><?php echo esc_url( $user_website_link_url ); ?></span>
                </a>
            </li>
            <?php 
            endif;
            ?> 
        </ul>
    </div>
    <ul id="social-media-icons" class="sidebar-social_media_icons">
        <?php if( $user_facebook_link && ! empty( $user_facebook_link_url ) ): 
        ?>
        <li>
            <a href="<?php echo esc_url( $user_facebook_link_url ) ?>" target="_blank" aria-label="">
                <i class="fab fa-facebook"></i>
            </a>
        </li>
        <?php 
        endif; 
        
        if( $user_instagram_link && ! empty( $user_instagram_link_url ) ): 
        ?>
        <li>
            <a href="<?php echo esc_url( $user_instagram_link_url ) ?>" target="_blank" aria-label="">
                <i class="fab fa-instagram"></i>
            </a>
        </li>
        <?php 
        endif; 
        
        if( $user_tiktok_link && ! empty( $user_tiktok_link_url ) ): 
        ?>
        <li>
            <a href="<?php echo esc_url( $user_tiktok_link_url ) ?>" target="_blank" aria-label="">
                <i class="fab fa-tiktok"></i>
            </a>
        </li>
        <?php 
        endif; 

        if( $user_linkedin_link && ! empty( $user_linkedin_link_url ) ): 
        ?>
         <li>
            <a href="<?php echo esc_url( $user_linkedin_link_url ) ?>" target="_blank" aria-label="">
                <i class="fab fa-linkedin"></i>
            </a>
        </li>
        <?php 
        endif; 

        if( $user_github_link && ! empty( $user_github_link_url ) ): 
        ?>
        <li>
            <a href="<?php echo esc_url( $user_github_link_url ) ?>" target="_blank" aria-label="">
                <i class="fab fa-github"></i>
            </a>
        </li>
        <?php 
        endif; 

        if( $user_paypal_link && ! empty( $user_paypal_link_url ) ): 
        ?>
        <li>
            <a href="<?php echo esc_url( $user_paypal_link_url ) ?>" target="_blank" aria-label="">
                <i class="fab fa-paypal"></i>
            </a>
        </li>
        <?php 
        endif;
        ?>
    </ul>
</div>
<?php if($user_author_bio && ! empty( get_the_content() )): ?>
<div class="csc_sidebar-about">
    <div class="csc_sidebar-heading">
        <h3 class="wp-block-heading has-text-align-center" id="about__me-heading">About Me</h3>
    </div>
    <div class="author-bio">
        <?php the_content(); ?>
    </div>
</div>
<?php 
    endif;

    endwhile;
    endif; 
    wp_reset_postdata(); // reset the query
    
 if( $display_latest_posts ): 
 ?>
<div class="csc_sidebar-latest_posts">
    <div class="csc_sidebar-heading">
        <h3 class="wp-block-heading has-text-align-center">Latest Posts</h3>
    </div>
    <div id="featured_post_thumbnails-sidebar">
    <?php 

    $author_id = get_the_author_meta('ID');

    $latest_posts_number = ($latest_posts_number > 0 && $latest_posts_number <= 7) ? $latest_posts_number : 3;

    $args = array(
        'author' => $author_id,
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => absint($latest_posts_number), 
    );
    $sidebar_posts = new WP_Query( $args );
        // Check if the author has any featured posts
        if( $sidebar_posts->have_posts() ):
            while( $sidebar_posts->have_posts() ) : $sidebar_posts->the_post();
                if( has_post_thumbnail() ): 
        ?>
    <div class="thumbnail-container">
    <a href="<?php echo esc_url(get_permalink()) ?>" aria-label="<?php esc_html(get_the_title()) ?>">
        <div class="thumbnail">
            <?php the_post_thumbnail(); ?> 
            <div class="thumb__overlay">
                <h3><?php echo esc_html(get_the_title()) ?></h3>
            </div>
        </div>
    </a>
    </div>
        <?php
        endif; 
        endwhile;
        wp_reset_postdata(); // reset the query
        else:
        ?>
            <p>No latest posts found for this author.</p>
        <?php
            endif;
        ?>
    </div>
</div>
<?php endif; 
if( $display_post_categories ): 
?>
<div class="csc_sidebar-categories">
    <div class="csc_sidebar-heading">
        <h3 class="wp-block-heading has-text-align-center" id="dropdown_label-categories">Categories</h3>
    </div>
</div>
<div id="select__categories-sidebar" >
   <?php 

    // Dropdown of categories
    $dropdown_id = 'id' . rand(1, 1000000);
    wp_dropdown_categories( array(
        'show_option_none' => 'Select Category',
        'orderby'          => 'name',
        'echo'             => 1,
        'hierarchical'     => 1,
        'id'               => $dropdown_id,
    ) );
    
    ?>
    <script type="text/javascript">
        window.addEventListener("pageshow", function() {
            var dropdown = document.getElementById('<?php echo esc_js($dropdown_id)?>');
            if(dropdown) {
                dropdown.selectedIndex = 0; // Reset dropdown to default value
                dropdown.addEventListener("change", function() {
                    if (this.value > 0) {
                        window.location.href='<?php echo esc_url(home_url('/')); ?>?cat=' + this.value;
                    }
                });
            } 
        });
    </script>
</div>
<?php endif; 

if( $display_post_archive ):
?>
<div class="csc_sidebar-categories">
    <div class="csc_sidebar-heading">
        <h3 class="wp-block-heading has-text-align-center" id="dropdown_label-archive">Archive</h3>
    </div>
    <div id="archive-sidebar" >
    <?php 
    
    $dropdown_id = 'id' . rand(1, 1000000);
    $archives = wp_get_archives( array(
        'type'            => 'monthly',
        'format'          => 'option',
        'show_post_count' => true,
        'echo'            => 0
    ) );

    if($archives):
    ?>
        <select id="<?php echo esc_attr($dropdown_id) ?>" onchange="document.location.href=this.options[this.selectedIndex].value;" aria-labelledby="dropdown_label-archive">
            <option value="">Select Month</option>
            <?php echo $archives; ?>
        </select>

        <script type="text/javascript">
            window.addEventListener("pageshow", function() {
                var dropdown = document.getElementById("<?php echo esc_attr($dropdown_id) ?>");
                if(dropdown) {
                    dropdown.selectedIndex = 0; 
                }
            });
        </script>

    <?php
    endif;
    ?>
    </div>
</div>
<?php endif; ?>