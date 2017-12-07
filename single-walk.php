<?php while (have_posts()) : the_post(); ?>
<?php
    global $woocommerce;
    $events = tribe_get_events( array(
        'posts_per_page' => -1,
        'start_date' => date( 'Y-m-d H:i:s' ),
        'meta_key' => '_EventStartDate',
        'order_by' => 'meta_value',
        'order' => 'ASC',
        'meta_query' => array(
            array(
                'key'     => '_tribe_linked_post_walk',
                'value'   => get_the_id()
            )
        )
    ) );
?>
<article class="walk">
    <header class="walk__head ps ps--narrow">
        <div class="row column">
            <p class="walk__presents"><?php the_field('owner') ?> <span>bemutatja</span></p>
            <h1 class="walk__title"><?php the_title(); ?></h1>
            <h2 class="walk__subtitle"><?php the_field('subtitle') ?></h2>
        </div>
    </header>
    <div class="walk__banner" data-equalizer adata-equalize-on="medium">
        <div class="walk__banner__one" adata-equalizer-watch>
            <figure class="walk__herofig">
                <?php the_post_thumbnail('full'); ?>
            </figure>
        </div>
        <div id="ticketblock" class="walk__banner__two" data-equalizer-watch data-magellan-target="ticketblock">
            <div class="walk__important">
                <ul class="facts">
                    <li>Séta ára <span class="facts__value"><?php the_field('price') ?></span></li>
                    <li>Időtartam <span class="facts__value"><?php the_field('duration') ?></span></li>
                    <!--li>Nehézség <span class="facts__value"><?= $diffdef[ get_field('difficulty') ] ?></span></li-->
                </ul>
            </div>
            <?php if (!empty($events)) : ?>
            <section class="walk__events">
                <h3 class="walk__events__title">Jelentkezés a sétára <span>Válassz időpontot és vedd meg sétajegyed online</span></h3>
                <ul class="dateboxlister">
                    <?php foreach ($events as $post) :?>

                            <?php setup_postdata( $post ); ?>
                            <?php
                                $is_there_any_product_to_sell = false;
                                $tickets = TribeEventsTickets::get_all_event_tickets(get_the_ID());
                                foreach ( $tickets as $ticket ) :
                                    global $product;
                                    if ( class_exists( 'WC_Product_Simple' ) ) {
                                        $product = new WC_Product_Simple( $ticket->product );
                                    } else {
                                        $product = new WC_Product( $ticket->product );
                                    }
                                    $remaining = $ticket->remaining();
                                    if ( $ticket->date_in_range( current_time( 'timestamp' ) ) && $remaining ) {$is_there_any_product_to_sell = true;}
                                endforeach;
                            ?>
                            <?php if ( $is_there_any_product_to_sell ) : ?>
                                <li>
                                    <div class="datebox">
                                        <?php get_template_part('templates/dateboxtime' ); ?>
                                        <a href="#" data-open="addtocartModal-<?= get_the_id(); ?>" class="datebox__action"><span>Jelentkezés</span></a>
                                    </div>
                                    <?php get_template_part('templates/addtocartmodal'); ?>
                                </li>
                            <?php else: ?>
                                <li>
                                    <div class="datebox datebox--secondary">
                                        <?php get_template_part('templates/dateboxtime' ); ?>
                                        <div class="datebox__smallinfo datebox__smallinfo--accent ">Betelt</div>
                                    </div>
                                </li>
                            <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
                <?php wp_reset_postdata(); ?>
            </section>
            <?php else : ?>
                <section class="walk__events">
                    <h3 class="walk__events__title">Jelenleg nincs meghirdetett időpont <span>Ne búsulj, inkább iratkozz fel hírlevelünkre</span></h3>
                    <ul class="dateboxlister">
                        <li>
                        <div class="datebox datebox--secondary">
                            <p>Értesülj elsőként nyitott időpontokról!</p>
                            <a data-open="newsletterModal" href="#newsletterModal" class="datebox__action"><span>Feliratkozom</span></a>
                        </div>
                        </li>
                    </ul>
                </section>
            <?php endif; ?>
        </div>
    </div>
    <section class="walk__afterbanner">
        <div class="row">
            <div class="columns medium-6 ps ps--narrow">
                <div class="walk__extras">
                    <h3>Gyülekezés és indulás</h3>
                    <p><?php the_field('address') ?><span><?php the_field('addrhelp') ?> <a target="_blank" href="http://maps.google.com/maps?q=<?= urlencode(get_field('address')); ?>" class="walk__loc__maplink">Térkép</a></span></p>
                </div>
                <div class="walk__extras walk__extras--list">
                    <p><span><?= strip_tags(get_the_term_list( $post->ID, 'walktags', '', ', ' )); ?> séta</span></p>
                </div>
            </div>
            <div class="columns medium-6 ps ps--narrow">
                <blockquote class="walk__globalquote">
                    <?php the_field('maintestimonial'); ?>
                    <cite><?php the_field('citename'); ?><br><em><?php the_field('citerole') ?></em></cite>
                </blockquote>
            </div>
        </div>
    </section>
    <section class="walk__lead ps ps--narrow ps--nobottom">
        <div class="row column">
            <?php the_excerpt(); ?>
        </div>
    </section>
    <section class="walk__main ps ps--notop">
        <div class="row">
            <div class="columns large-8 ps ps--narrow bodycopy">
                <?php the_content(); ?>
            </div>
            <?php
            $guides_objects = get_field('guides');
            if( $guides_objects ): ?>
            <div class="columns large-4 ps ps--narrow">
                <h3 class="widget__title">A sétát vezeti</h3>
                <ul class="dclist">
                    <?php foreach( $guides_objects as $post): ?>
                    <li>
                        <?php setup_postdata( $post ); ?>
                        <?php get_template_part('templates/drivercard' ); ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </section>
    <?php
    $image_ids = get_field('gallery', false, false);
    if( $image_ids ): ?>
    <section class="walk__gallery">
        <header class="sectionheader sectionheader--small">
            <h3 class="sectionheader__title">Megörökített pillanatok…</h3>
            <nav class="sectionheader__nav"><a class="showall" href="">Galéria indítása</a></nav>
        </header>

                <div class="bupapslider">
                    <div class="owl-carousel owl-slider">
                        <?php foreach( $image_ids as $image_id ): ?>
                            <div class="bupapslider__item">
                                <?= wp_get_attachment_image( $image_id, 'medium_Large', true, array( 'class' => 'bupapslider__img') ); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

    </section>
    <?php endif; ?>
    <?php if( have_rows('bottomtestimonials') || have_rows('press') ): ?>
    <footer class="walk__footer ps ps--narrow">
        <div class="row">
            <?php if( have_rows('bottomtestimonials') ): ?>
            <div class="columns large-6">
                <section class="walk__testiblock ps ps--narrow">
                    <h3 class="widget__title text-right">Velünk sétáltak, fülünkbe súgták</h3>
                    <div class="owl-carousel owl-testi owl-theme-testi">
                        <?php while ( have_rows('bottomtestimonials') ) : the_row(); ?>
                        <div>
                            <blockquote class="walk__quote">
                                <?php the_sub_field('text') ?>
                                <cite><?php the_sub_field('citename') ?><br><em><?php the_sub_field('citerole') ?></em></cite>
                            </blockquote>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </section>
            </div>
            <?php endif; ?>
            <?php if( have_rows('press') ): ?>
            <div class="columns large-6">
                <section class="walk__media ps ps--narrow">
                    <h3 class="widget__title">Írták, mondták, sugározták…</h3>
                    <ul class="presslist">
                        <?php while ( have_rows('press') ) : the_row(); ?>
                        <li>
                            <div class="presslink">
                                <h4 class="presslink__title"><a href="<?php the_sub_field('url') ?>" target="_blank"><?php the_sub_field('title') ?></a></h4>
                                <p class="presslink__src">
                                    <span class="presslink__src__medium"><?php the_sub_field('medium') ?></span>
                                    <span class="presslink__src__date"><?php the_sub_field('date') ?></span>
                                </p>
                            </div>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                </section>
            </div>
            <?php endif; ?>
        </div>
    </footer>
    <?php endif; ?>
</article>
<?php endwhile; ?>
<div class="ps ps--narrow ps--extralight ps--bordered" data-magellan>
    <div class="row column">
        <h3 class="nicetitle nicetitle--withbutton">Mehetünk? Sétára fel!<span>Vedd meg sétajegyed online</span></h3>
        <a href="#ticketblock" class="button alert">Válassz időpontot</a>
    </div>
</div>
<?php get_template_part('templates/featwalks' ); ?>
