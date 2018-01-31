<?php get_header(); ?>
<?php $author = get_user_by( 'slug', get_query_var( 'author_name' ) ); ?>
<article>
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
            <div class="seven columns">
              <span class="page-icon">
                <span class="pmc-icon-marker"></span>
              </span>
              <p class="over-title subtitle">Secretaria Municipal de Cultura de São Paulo</p>
              <h2>SPCultura</h2>
              <div class="page-header-text connect-border connect-left">
                <p>Quisque tempus, massa in pulvinar aliquet, est tellus scelerisque lorem, vel lobortis felis elit at justo. Nullam id arcu sed purus scelerisque aliquam in et purus. Nam et consequat lacus. Proin egestas ante sapien, et venenatis felis luctus a. In interdum facilisis augue quis tempor.</p>
              </div>
            </div>
            <div class="five columns">
              <div class="author-numbers">
                <div class="row">
                  <div class="six columns">
                    <div class="intro-numbers">
                      <p class="icon pmc-icon-person"></p>
                      <p class="number do-count">123456</p>
                      <p class="label">agentes</p>
                    </div>
                  </div>
                  <div class="six columns">
                    <div class="intro-numbers">
                      <p class="icon pmc-icon-calendar"></p>
                      <p class="number do-count">123456</p>
                      <p class="label">eventos</p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="six columns">
                    <div class="intro-numbers">
                      <p class="icon pmc-icon-door"></p>
                      <p class="number do-count">123456</p>
                      <p class="label">espaços</p>
                    </div>
                  </div>
                  <div class="six columns">
                    <div class="intro-numbers">
                      <p class="icon pmc-icon-paper"></p>
                      <p class="number do-count">123456</p>
                      <p class="label">projetos</p>
                    </div>
                  </div>
                </div>
                <p><a class="button block"><span class="fa fa-star"></span>Acesse a plataforma</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <section id="content">
    <div class="container">
      <div class="eight columns">
        <?php get_template_part('parts/network-blog-2'); ?>
      </div>
      <div class="four columns">
        <div id="sidebar" class="sidebar regular-sidebar connect-border connect-right">
          <div class="widget">
            <div class="statistics">
              <h3>Estatísticas</h3>
              <p class="filter">
                <select>
                  <option>Agentes culturais</option>
                  <option>Eventos</option>
                  <option>Epaços</option>
                  <option>Projetos</option>
                </select>
                nos últimos 30 dias
              </p>
              <div class="gh-chart chart"></div>
              <p class="result">123 agentes culturais cadastrados nos últimos 30 dias</p>
            </div>
          </div>
          <div class="widget">
            <div class="team">
              <h3>Equipe</h3>
              <ul>
                <?php if(get_field('team_members')): ?>
                  <?php while(has_sub_field('team_members')): ?>
                    <li class="row">
                      <?php echo get_avatar( get_sub_field('email'), 100 ); ?>
                      <h4><?php the_sub_field('name'); ?></h4>
                      <p><?php the_sub_field('position'); ?></p>
                    </li>
                  <?php endwhile; ?>
                <?php endif; ?>
              </ul>
            </div>
          </div>
          <div class="widget">
            <h3>Contato</h3>
            <ul>
              <?php if (get_the_author_meta( 'public_email', $author->ID )): ?>
              <li>
                <a href="mailto:<?php the_author_meta( 'public_email', $author->ID ) ?>" target="_blank">
                  <span class="fa fa-envelope"></span>
                  <?php the_author_meta( 'public_email', $author->ID ) ?>
                </a>
              </li>
              <?php endif; ?>
              <?php if (get_the_author_meta( 'telegram', $author->ID )): ?>
              <li>
                <a href="https://telegram.me/<?php the_author_meta( 'telegram', $author->ID ) ?>" target="_blank">
                  <span class="fa fa-telegram"></span>
                  Telegram
                </a>
              </li>
              <?php endif; ?>
              <?php if (get_the_author_meta( 'whatsapp', $author->ID )): ?>
              <li>
                <a href="https://api.whatsapp.com/send?phone=<?php the_author_meta( 'whatsapp', $author->ID ) ?>">
                  <span class="fa fa-whatsapp"></span>
                  WhatsApp
                </a>
              </li>
              <?php endif; ?>
              <?php if (get_the_author_meta( 'github', $author->ID )): ?>
              <li>
                <a href="<?php the_author_meta( 'github', $author->ID ) ?>">
                  <span class="fa fa-github"></span>
                  Github
                </a>
              </li>
              <?php endif; ?>
              <?php if (get_the_author_meta( 'facebook', $author->ID )): ?>
              <li>
                <a href="<?php the_author_meta( 'facebook', $author->ID ) ?>">
                  <span class="fa fa-facebook"></span>
                  Facebook
                </a>
              </li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  <section>
</article>
<?php get_footer(); ?>
