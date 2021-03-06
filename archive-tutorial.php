<?php get_header(); ?>
<section id="archive">
  <header class="page-header">
    <div class="container">
      <div class="twelve columns">
        <hr/>
      </div>
    </div>
    <div class="container">
      <div class="twelve columns">
        <div class="page-header-content no-text has-icon compos-title row">
          <span class="page-icon">
            <span class="fa fa-bookmark-o"></span>
          </span>
          <h2>
            Tutoriais
          </h2>
          <h3 class="complete">
            <?php 
              $target_group = ( get_query_var('target_group') ) ? get_query_var('target_group') : '';
              if($target_group == 2){
                echo '<span class="fa fa-gear"></span>para agentes';
              }
              else if ($target_group == 1){
                echo '<span class="fa fa-gear"></span>para gestores';
              } 
              else { ?>
                <span class="fa fa-gear"></span>
                <select  onchange="if (this.value) window.location.href=this.value">
                  <option value=""><?php _e('Select Target Group','pmc') ?></option>
                  <option value="<?php echo add_query_arg(array('target_group' => '1') , get_post_type_archive_link( 'tutorial' )); ?>">para gestores</option>
                  <option value="<?php echo add_query_arg(array('target_group' => '2') , get_post_type_archive_link( 'tutorial' )); ?>">para agentes</option>
                </select>
              <?php
              }

            ?>
          </h3>
        </div>
      </div>
    </div>
  </header>
  <section id="big-search">
    <form method="get" id="searchform" action="<?php echo get_post_type_archive_link( 'tutorial' ); ?>">
      <div class="container">
        <div class="twelve columns">
          <div class="big-search-container">
            <label for="big_search_input">
              <span class="fa fa-search"></span>
              <input value="<?php the_search_query(); ?>" name="s" id="big_search_input" type="text" placeholder="Busque por tutoriais..." />
            </label>
          </div>
        </div>
      </div>
    </form>
  </section>
  <section id="content">
    <div class="container">
      <div class="eight columns">
        <?php get_template_part('parts/tutorials'); ?>
      </div>
      <div class="three columns offset-by-one">
        <div id="sidebar" class="sidebar regular-sidebar connect-border connect-right">
          <?php dynamic_sidebar('archive-tutorials-pmc') ?>
        </div>
      </div>
    </div>
  <section>
</section>
<?php get_template_part('parts/community-section'); ?>
<?php get_footer(); ?>
