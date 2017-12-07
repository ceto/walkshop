<footer class="sitefooter">
    <?php if (!is_checkout() && !is_cart() ) :?>
    <aside class="sitefooter__small ps ps--narrow ps--pricol">
        <div class="row column">
            <h3 class="nicetitle nicetitle--withbutton">Sétaműhely hírlevél havonta<span>Menj biztosra! Értesülj elsőként az új sétákról és időpontokról!</span></h3>
            <a data-open="newsletterModal" href="#newsletterModal" class="button alert">Feliratkozom a hírlevélre</a>
        </div>
    </aside>
    <div class="sitefooter__csipa ps aps--narrow ps--dark">
        <div class="row">
            <div class="columns large-3">
                <a href="<?= esc_url(home_url('/')); ?>" class="footerlogo">Sétaműhely</a>
            </div>
            <div class="columns large-6">
                <p>Lénárd Anna képzőművész egyszemélyes projektként indította 2011-ben BUPAP néven, ma már kollektív alkotóműhely. 20+ sétavezető, 30+ séta, 40+ hazai és 10+ nemzetközi partner - ez a Sétaműhely. Tarts velünk!</p>
            </div>
            <div class="columns large-3">
                <nav class="socialnav">
                    <ul class="menu menu--socialmenu large-text-right">
                        <li><a class="face" target="_blank" title="Facebook" href="#"><svg class="icon"><use xlink:href="#icon-facebook"></use></svg><br/>Facebook</a></li>
                        <li><a class="insta" target="_blank" title="Instagram" href="#"><svg class="icon"><use xlink:href="#icon-instagram"></use></svg><br/>Instagram</a></li>
                        <li><a class="phone" title="Call Phone" href="tel:0036704086888"><svg class="icon"><use xlink:href="#icon-flickr"></use></svg><br/>70.408.6888</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <aside class="sitefooter__small ps ps--narrow ps--extralight ps--bordered text-center">
        <div class="row">
            <div class="columns tablet-6 tablet-centered">
            <nav class="footermininav">
                <ul class="menu menu--minimenu">
                    <li><a href="<?= get_permalink(1063); ?>">Kapcsolat</a></li>
                    <li><a href="<?= get_permalink(978); ?>">ÁSZF</a></li>
                    <li><a href="<?= get_permalink(1060); ?>">Adatvédelem</a></li>
                    <li><a href="mailto:info@setamuhely.hu">Levél nekünk</a></li>
                </ul>
            </nav>
            <p>&copy; <?= date('Y') ?> Sétaműhely Kft. - Minden jog fenntartva.</p>
            <p>
                <a class="fbarionlink" href="https://www.barion.com/hu/tajekoztato-biztonsagos-online-fizetesrol" target="_blank" title="Az online fizetést a Barion Payment Zrt. biztosítja, MNB engedély száma: H-EN-I-1064/2013">
            <span data-tooltip aria-haspopup="true" class="has-tip top" data-disable-hover="false" tabindex="1" title="A kényelmes és biztonságos online fizetést a Barion Payment Zrt. biztosítja, MNB engedély száma: H-EN-I-1064/2013 Bankkártya adatai áruházunkhoz nem jutnak el.">
              <img class="fbarion" width="216" src="<?= get_stylesheet_directory_uri(); ?>/dist/images/barion-card-payment-banner.png" alt="Az online fizetést a Barion Payment Zrt. biztosítja, MNB engedély száma: H-EN-I-1064/2013">
            </span>
          </a>
                </p>
                <p><small>Site made with love by <a href="http://hydrogene.hu">Hydrogene</a></small></p>

            </div>
        </div>
    </aside>
</footer>
<?php get_template_part('templates/newslettermodal' ); ?>
