<?php get_header(); ?>
<?php get_template_part('template-part', 'topnav'); ?>

<div class="gl">
        <?php //left sidebar ?>
        <?php get_sidebar( 'left' ); ?>
<!-- This sets the $curauth variable -->

    <?php
    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
    ?>
    <div class="gl-md-9 gl-cell">
        <div class="gl usercard">
            <div class="gl-md-3 userpic gl-cell">
                <img src="<?php echo $curauth->image; ?>"/>
            </div>
            <div class="gl-md-9 gl-cell userinfo">
                <h2><?php echo $curauth->first_name ." ". $curauth->last_name; ?></h2>
                <?php if ( (in_array( 'synergia_member', (array) $curauth->roles )) || (in_array( 'administrator', (array) $curauth->roles )) ) { ?>
                <span>Członek MKNM "Synergia"</span>
                <a github href="<?php echo $curauth->github_profile; ?>"><i class="icon icon-github"></i></a>
                <a twitter href="<?php echo $curauth->twitter_profile; ?>"><i class="icon icon-twitter"></i></a>
                <a face href="<?php echo $curauth->facebook_profile; ?>"><i class="icon icon-facebook"></i></a>
                <?php } ?>
            </div>
        </div>

        <div class="tabs">
          <input id="tab-1" name="tabset-1" type="radio" hidden checked/>
          <input id="tab-2" name="tabset-1" type="radio" hidden />
          <nav class="tabs-nav" role="navigation">
            <input id="tabsnav-1" type="checkbox" hidden />
            <label for="tabsnav-1">☰</label>
            <ul>
              <li><label for="tab-1">Projekty</label></li>
              <li><label for="tab-2">Github</label></li>

            </ul>
          </nav>
          <div class="tab">
            <div class="post-list">
            <?php
                $args = array(
                    'post_type' => 'projekt ',
                    'author' => $curauth->ID
                   );
                $products = new WP_Query( $args );
                if( $products->have_posts() ) {
                  while( $products->have_posts() ) {
                    $products->the_post();
                    ?>
                      <div class="post-list-item ">
                        <!-- <div class="gl-md-3 gl-cell"> -->
                          <?php the_post_thumbnail("thumbnail"); ?>
                        <!-- </div> -->
                        <div class="post-list-item-content">
                          <a rel="bookmark" href="<?php the_permalink(); ?>">
                            <h2><?php the_title(); ?></h2>
                          </a>
                          <div class="excerpt">
                            <?php the_excerpt(); ?>
                          </div>
                        </div>
                      </div>
            <?php
                  }
                }
                else {
                  echo 'Nic a nic';
                }
              ?>
          </div>
        </div>
          <div class="tab">
            <h2>Second tab</h2>
            <p>Hellou.</p>
          </div>



    </div>

    <!-- End Loop -->



    </div>
</div>
<?php get_footer(); ?>