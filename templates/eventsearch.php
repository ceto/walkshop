<div class="ps ps--narrow ps--extralight">
    <div class="row column ">
        <aside class="eventsearch">
            <h3 class="eventsearch__title">Sétaválasztó</h3>
            <div class="row">
                <div class="columns medium-8 tablet-9">
                    <div class="inpdrop">
                        <input type="text" class="inpdrop__input" placeholder="Összes séta" data-filt-walk="">
                        <?php
                            $topics = get_terms( array(
                                'taxonomy' => 'topic',
                                'hide_empty' => false,
                                'orderby' => 'count',
                                'order' => 'desc'
                            ));
                            ?>
                            <select name="walkselect" id="walkselect" class="walkselect is-hidden" style="display: none; visibility: hidden; opacity: 0;">
                            <option value="*">Összes séta</option>
                            <?php foreach ( $topics as $topic ) :  ?>
                                <optgroup label="<?= $topic->name ?>">
                                    <option value=".<?= $topic->slug ?>"><?= $topic->name ?></option>
                                    <?php
                                    $args = array(
                                        'post_type' => array('walk'),
                                        'order'               => 'ASC',
                                        'orderby'             => 'menu_order',
                                        'posts_per_page'         => -1,
                                        'tax_query' => array(
                                        array(
                                            'taxonomy'         => 'topic',
                                            'field'            => 'id',
                                            'terms'            => $topic->term_id,
                                        )
                                    ),
                                    );
                                    $walks = new WP_Query( $args );
                                    ?>
                                    <?php while ($walks->have_posts()) : $walks->the_post(); ?>
                                        <option value=".<?= sanitize_title( get_the_title()) ?>"><?php the_title(); ?></option>
                                    <?php endwhile; ?>
                                    </optgroup>
                            <?php endforeach; ?>
                            </select>
                            <?php reset($topics); ?>
                        <div class="searchdropdown inpdrop__dropdown is-hidden" id="searchdropdown">
                            <ul class="walksavailable inpdrop__options">
                                <?php foreach ( $topics as $topic ) :  ?>
                                <li>
                                    <a href="#<?= $topic->slug ?>"><?= $topic->name ?></a>
                                    <?php
                                    $args = array(
                                        'post_type' => array('walk'),
                                        'order'               => 'ASC',
                                        'orderby'             => 'menu_order',
                                        'posts_per_page'         => -1,
                                        'tax_query' => array(
                                        array(
                                            'taxonomy'         => 'topic',
                                            'field'            => 'id',
                                            'terms'            => $topic->term_id,
                                        )
                                    ),
                                    );
                                    $walks = new WP_Query( $args );
                                    ?>
                                    <ul class="">
                                        <?php while ($walks->have_posts()) : $walks->the_post(); ?>
                                        <li><a href="#<?= sanitize_title( get_the_title()) ?>"><?php the_title(); ?></a></li>
                                        <?php endwhile; ?>
                                    </ul>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
                <div class="columns medium-4 tablet-3">
                    <select name="filt-daytype" id="filt-daytype">
                        <option value="">Bármelyik nap</option>
                        <option value=".atweekend">Hétvégén</option>
                        <option value=".atweekday">Hétköznap</option>
                    </select>
                </div>
            </div>
            <!--div id="searchdetails" class="is-hidden searchdetails" data-toggler=".is-hidden">
                <fieldset class="afieldset">
                    <legend>Extra kívánalmak</legend>
                    <?php
                    $walktags = get_terms( 'walktags', array('hide_empty' => true) );
                    foreach ( $walktags as $walktag ) : ?>
                    <input id="filt-walktag-<?= $walktag->slug ?>" name="filt-walktag" type="checkbox" value=".<?= $walktag->slug ?>"><label for="filt-walktag-<?= $walktag->slug ?>"><?= $walktag->name ?></label>
                    <?php endforeach;  ?>
                </fieldset>
                <fieldset class="afieldset">
                    <legend>Nehézségi szint</legend>
                    <?php
                    global $diffdef;
                    foreach ( $diffdef as $diffkey => $diffvalue ) : ?>
                    <input id="filt-difficulty-<?= $diffkey ?>" name="filt-difficulty" type="checkbox" value=".difficulty-<?= $diffkey ?>"><label for="filt-difficulty-<?= $diffkey ?>"><?= $diffvalue ?></label>
                    <?php endforeach;  ?>
                </fieldset>
            </div-->
            <!--a class="searchdetailstoggler" data-toggle="searchdetails">További lehetőségek</a-->
        </aside>
    </div>
</div>