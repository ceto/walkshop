<footer class="sitefooter">

    <aside class="sitefooter__small ps ps--narrow ps--pricol">
        <div class="row column">
            <h3 class="nicetitle nicetitle--withbutton">Budapest Walkshop Newsletter<span>Subscribe to our newsletter
                    and reserve your place at the first row!</span></h3>
            <a data-open="newsletterModal" href="#newsletterModal" class="button alert">Subscribe Newsletter</a>
        </div>
    </aside>
    <div class="sitefooter__csipa ps aps--narrow ps--dark">
        <div class="row">
            <div class="columns large-3">
                <a href="<?= esc_url(home_url('/')); ?>" class="footerlogo">Sétaműhely</a>
            </div>
            <div class="columns large-6">
                <p>Budapest Walkshop is the ultimate online tourist office to find your ideal local Hungarian tour
                    guide. We organize your tailor made program, which includes the landmarks as well as the hidden
                    beauty of Budapest</p>
            </div>
            <div class="columns large-3">
                <nav class="socialnav">
                    <ul class="menu menu--socialmenu large-text-right">
                        <li><a class="face" target="_blank" title="Facebook" href="#"><svg class="icon">
                                    <use xlink:href="#icon-facebook"></use>
                                </svg><br />Facebook</a></li>
                        <li><a class="insta" target="_blank" title="Instagram" href="#"><svg class="icon">
                                    <use xlink:href="#icon-instagram"></use>
                                </svg><br />Instagram</a></li>
                        <li><a class="phone" title="Call Phone" href="tel:0036704086888"><svg class="icon">
                                    <use xlink:href="#icon-flickr"></use>
                                </svg><br />70.408.6888</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>


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
                <p>&copy; <?= date('Y') ?> <strong>Budapest Walkshop</strong> by Sétaműhely Kft. - All Rights Reserved.
                </p>
                <p><small>Site made with love by <a href="http://hydrogene.hu">Hydrogene</a></small></p>

            </div>
        </div>
    </aside>
</footer>
<?php get_template_part('templates/newslettermodal' ); ?>