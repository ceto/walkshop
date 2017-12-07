<time datetime="<?= tribe_get_start_time( null, DATE_RFC2822 ) ?>">
  <span class="datebox__month"><?= tribe_get_start_time( null, 'F' ) ?></span>
  <span class="datebox__day"><?= tribe_get_start_time( null, 'j.' ) ?></span>
  <span class="datebox__dayofweek"><?= tribe_get_start_time( null, 'l' ) ?></span>
  <span class="datebox__hm"><?= tribe_get_start_time( null, 'H:i' ) ?></span>
</time>