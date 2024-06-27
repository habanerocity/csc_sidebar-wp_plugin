<?php
    $post_author_id = get_post_field( 'post_author', get_the_ID() );
    $author_email = get_the_author_meta( 'user_email', $post_author_id );
    $avatar_data = get_avatar_data( $author_email, array( 'size' => 300 ) );
    $author_name = get_the_author_meta( 'display_name', $post_author_id );

    $post_author_id = get_post_field( 'post_author', get_the_ID() );
    $author_bio = get_the_author_meta( 'description', $post_author_id );
    $author_website = get_the_author_meta( 'user_url', $post_author_id );
    
?>
<div class="author-gravatar">
    <img src="<?php if( $avatar_data['found_avatar'] ){echo esc_url( $avatar_data['url'] );} ?>" alt="<?php echo esc_attr( $author_name ); ?>" height="<?php echo esc_attr( $avatar_data['height'] ); ?>" width="<?php echo esc_attr( $avatar_data['width'] ); ?>">
    <div class="author-metadata">
        <h3 id="author-name"></h3>
        <p id="occupation"></p>
        <ul >
            <li class="flex_container"><i class="fa fa-map-pin "></i><span id="location"></span></li>
            <li class="flex_container">
                <a class="flex_container" href="<?php echo $author_website; ?>" aria-label="Author's Website" target="blank">
                    <span class="author-website"><?php echo $author_website; ?></span>
                </a>
            </li>
        </ul>
    </div>
    <ul id="social-media-icons" class="sidebar-social_media_icons">
        <!-- Icons will be added here -->
    </ul>
</div>
<div class="csc_sidebar-about">
    <div class="csc_sidebar-heading">
        <h3 class="wp-block-heading has-text-align-center" id="about__me-heading">About Me</h3>
    </div>
    <div class="author-bio">
        <?php echo esc_html( $author_bio ); ?>
    </div>
</div>
<div class="csc_sidebar-latest_posts">
    <div class="csc_sidebar-heading">
        <h3 class="wp-block-heading has-text-align-center">Latest Posts</h3>
    </div>
    <div id="featured_post_thumbnails-sidebar">
    <?php 

    $author_id = get_the_author_meta('ID');
    $args = array(
        'author' => $author_id,
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 3, 
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
            <p>No featured posts found for this author.</p>
        <?php
            endif;
        ?>
    </div>
</div>
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