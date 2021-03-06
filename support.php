<?php
/*
 * Template name: Support
 */
?>
<?php get_header(); ?>
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<article id="page-<?php the_ID(); ?>">
  <header class="page-header">
    <div class="container">
      <div class="twelve columns">
        <hr/>
      </div>
    </div>
    <div class="container">
      <div class="twelve columns">
        <div class="page-header-content has-icon row">
          <div class="row">
            <div class="eight columns">
              <span class="page-icon">
                <span class="fa fa-wrench"></span>
              </span>
              <h2>
                <?php the_title(); ?>
              </h2>
              <div class="page-header-text connect-border connect-left">
                <p>Mapas Culturais foi criado pelo <a href="http://institutotim.org.br" rel="external" target="_blank">Instituto TIM</a> em parceria com a Secretaria de Cultura do Município de São Paulo, a primeira a adotar a plataforma, em 2014. Atualmente, a solução está em operação no Ministério da Cultura, em estados e municípios de todas as regiões do Brasil e até no exterior. Em 2015, Mapas Culturais passou a ser a plataforma oficial do Sistema Nacional de Informações e Indicadores Culturais (SNIIC), sendo o sistema oficial para mapeamento colaborativo e gestão da cultura do Ministério da Cultura.</p>
              </div>
            </div>
            <div class="four columns">
              <p class="buttons small-buttons u-pull-right">
                <a href="/tutorials"  class="button">
                  <span class="fa fa-bookmark-o"></span>
                  Tutoriais
                </a>
                <a href="<?php echo get_option('rocket_url') ?>" class="button">
                  <span class="fa fa-comments-o"></span>
                  Rocket Chat
                </a>
                <a href="<?php echo get_option('manual_url') ?>" class="button">
                  <span class="fa fa-book"></span>
                  Manual
                </a>
              </p>
            </div>
          </div>
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
              <input value="<?php the_search_query(); ?>" name="s" id="big_search_input" type="text" placeholder="Busque por informações de suporte..." />
            </label>
          </div>
        </div>
      </div>
    </form>
  </section>
  <section id="content">
    <div class="container">
      <div class="eight columns">
        <h3>Manual</h3>
        <p>Acesse abaixo os Manuais de Uso do sistema</p>
      </div>
    </div>
    <div class="container">
      <div class="seven columns">
        <p class="download-user-guide connect-border connect-left">
          <a href="<?php echo get_option('manual_url') ?>" class="button">
            <span class="fa fa-download"></span>
            Baixar o manual
          </a>
        </p>
      </div>
      <div class="four columns offset-by-one">
        <section id="support-chat">
          <h3>Participe do chat</h3>
          <p>Se tiver dúvidas durante o processo de instalação de Mapas Culturais, entre em contato com a equipe do projeto no chat de Suporte Técnico.</p>
          <p><a href="<?php echo get_option('rocket_url') ?>" class="button button-primary block">
            <span class="fa fa-comments-o"></span>
            Entrar
          </a></p>
        </section>
      </div>
    </div>
    <div class="container">
      <div class="twelve columns">
        <hr class="dark" />
      </div>
    </div>
    <section id="support-tutorials" class="content-section">
      <div class="container">
        <div class="eight columns">
          <div class="content-section-header-big">
            <h3>Tutoriais</h3>
          </div>
          <div class="tutorial-list">

            <?php
              $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
              $args = array(
                'post_type' => 'tutorial',
                 'posts_per_page' => 3
              );
              $query = new WP_Query( $args );
            ?>


            <?php if ( $query->have_posts() ) : ?>

            <!-- pagination here -->

            <!-- the loop -->

            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
              <article class="tutorial-item row">
                <div class="tutorial-meta">
                  <?php $terms = get_the_terms( get_the_ID(), 'category_tutorial' );      
                    if ( $terms && !is_wp_error( $terms ) ) : 
                      foreach ( $terms as $term ) { ?>
                        <a href="<?php echo get_term_link($term->term_id); ?>" class="category">
                          <span class="fa fa-bookmark-o"></span>
                          <?php echo $term->name; ?>
                        </a>
                <?php } ?>
              <?php endif; ?>
                  <p class="meta-item">
                    <span class="label">
                      <span class="fa fa-certificate"></span>
                      Complexidade
                    </span>
                    <span class="meta-val complex-item complex-item-2">
                      <?php echo get_post_meta(get_the_ID(), 'tutorial_difficulty')[0]; ?>
                    </span>
                  </p>
                  <p class="meta-item target-group">
                    <span class="fa fa-gear"></span>
                    <?php echo get_post_meta(get_the_ID(), 'tutorial_group_target_label')[0]; ?>
                  </p>
                </div>
                <div class="tutorial-content">
                  <div class="featured-image">
                    <?php echo get_the_post_thumbnail(); ?>
                  </div>
                  <a href="<?php echo get_permalink();?>">
                    <h3><?php the_title(); ?></h3>
                  </a>
                  <?php echo the_content(); ?>
                </div>
              </article>
              <hr class="dark" />
            <?php endwhile; ?>

            <!-- end of the loop -->

            <?php wp_reset_postdata(); ?>

            <?php else : ?>
              <p><?php esc_html_e( 'Sorry, no posts found.', 'pmc' ); ?></p>
            <?php endif; ?>
            <!-- <article class="tutorial-item row">
              <div class="tutorial-meta">
                <a class="category">
                  <span class="fa fa-bookmark-o"></span>
                  Categoria #1
                </a>
                <p class="meta-item">
                  <span class="label">
                    <span class="fa fa-certificate"></span>
                    Complexidade
                  </span>
                  <span class="meta-val complex-item complex-item-2">Média</span>
                </p>
                <p class="meta-item target-group">
                  <span class="fa fa-gear"></span>
                  para gestores
                </p>
              </div>
              <div class="tutorial-content">
                <h3>Como fazer uma instalação local da plataforma</h3>
                <p>Conheça os passos para instalar a plataforma no seu computador.</p>
              </div>
            </article>
            <hr class="dark" />
            <article class="tutorial-item row">
              <div class="tutorial-meta">
                <a class="category">
                  <span class="fa fa-bookmark-o"></span>
                  Categoria #2
                </a>
                <p class="meta-item">
                  <span class="label">
                    <span class="fa fa-certificate"></span>
                    Complexidade
                  </span>
                  <span class="meta-val complex-item complex-item-2">Média</span>
                </p>
                <p class="meta-item target-group">
                  <span class="fa fa-gear"></span>
                  para gestores
                </p>
              </div>
              <div class="tutorial-content">
                <h3>Gerenciamento de usuários</h3>
                <p>In in velit in nibh ullamcorper lobortis nec eu ante. Curabitur vitae mauris ut quam elementum posuere vel ac quam.</p>
              </div>
            </article>
            <hr class="dark" />
            <article class="tutorial-item row">
              <div class="tutorial-meta">
                <a class="category">
                  <span class="fa fa-bookmark-o"></span>
                  Categoria #3
                </a>
                <p class="meta-item">
                  <span class="label">
                    <span class="fa fa-certificate"></span>
                    Complexidade
                  </span>
                  <span class="meta-val complex-item complex-item-2">Baixa</span>
                </p>
                <p class="meta-item target-group">
                  <span class="fa fa-user"></span>
                  para agentes culturais
                </p>
              </div>
              <div class="tutorial-content">
                <h3>Editando seu perfil</h3>
                <p>In in velit in nibh ullamcorper lobortis nec eu ante. Curabitur vitae mauris ut quam elementum posuere vel ac quam.</p>
              </div>
            </article> -->
          </div>
          <p>
            <a href="/tutorials" class="button block">Veja mais tutoriais</a>
          </p>
        </div>
        <div class="four columns">
          <div class="sidebar regular-sidebar connect-border connect-right">
            <?php dynamic_sidebar('tutorials-pmc') ?>
          </div>
        </div>
      </div>
    </section>
  <section>
</article>
<?php endwhile; endif; ?>
<?php get_template_part('parts/community-section'); ?>
<?php get_footer(); ?>
