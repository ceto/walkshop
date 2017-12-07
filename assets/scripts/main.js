(function($) {

  $(document).foundation();
  Foundation.Abide.defaults.patterns.posint = /^\d+$/;

  $(document).ready(function(){

    $('.owl-testi').owlCarousel({
      items:1
    });

    $('.owl-slider').owlCarousel({
      autoWidth:true,
      loop:true,
      responsive:{
        0:{
            items:1,

        },
        768: {
            items:2,
        },
        1240: {
          items:3,
        }
      }
    });
  });

    // init Isotope
  var $eventcardcontainer = $('#eventcardcontainer').isotope({
    itemSelector: '.eventcard',
  });

  var $selects = $('.eventsearch select');
  var $checkboxes = $('.eventsearch input[type="checkbox"]');

  function filterEvents() {
    // map input values to an array
    var exclusives = [];
    var inclusives = [];


    // exclusive filters from selects
    $selects.each( function( i, elem ) {
      if ( elem.value ) {
        exclusives.push( elem.value );
      }
    });
    // inclusive filters from checkboxes
    $checkboxes.each( function( i, elem ) {
      // if checkbox, use value if checked
      if ( elem.checked ) {
        exclusives.push( elem.value );
      }
    });

    // combine exclusive and inclusive filters

    // first combine exclusives
    exclusives = exclusives.join('');

    var filterValue;
    if ( inclusives.length ) {
      // map inclusives with exclusives for
      filterValue = $.map( inclusives, function( value ) {
        return value + exclusives;
      });
      filterValue = filterValue.join(', ');
    } else {
      filterValue = exclusives;
    }

    //alert ( filterValue );

    $eventcardcontainer.isotope({ filter: filterValue });
  }

  $('.inpdrop__input').on('focus', function(event) {
    event.preventDefault();
    //$(this).val('');
    $('.inpdrop__dropdown').removeClass('is-hidden');
  }).on('blur', function(event) {
    event.preventDefault();
    setTimeout(function() {
        $('.inpdrop__dropdown').addClass('is-hidden');
    }, 400);
  }).on('change',  function(event) {
    event.preventDefault();
    if ($(this).val()==='') {
      $('#walkselect').val('*').change();
    }
  });

  $('.inpdrop').on('click', '.inpdrop__options a', function(event) {
      event.preventDefault();
      $('.inpdrop__options a').removeClass('active');
      $('.inpdrop__input').val($(this).text());
      $('.inpdrop__input').attr('data-filt-walk', '.' + $(this).attr('href').substring(1));
      $(this).addClass('active');
      $('#walkselect').val('.' + $(this).attr('href').substring(1)).change();
  });


  $selects.add( $checkboxes ).change(function(){
    filterEvents();
  }
  );


  // $('.ticket__quantity input').on('focus', function(event) {
  //   if ($(this).val()===2) {
  //     $(this).attr('value','');
  //   }
  // }).on('blur', function(event) {
  //   if ($(this).val()==='') {
  //     $(this).attr('value','2');
  //   }
  // });
  $(".ticketform .qty").attr('required', '');
  $(".ticketform .qty").attr('pattern', 'posint');

  $('.ticketform').on('submit', function(event) {
    event.preventDefault();
    var $form = $(this);
    var doredirect = false;
    $form.find('.button').addClass('disabled');
    $form.find('.formactions__instruction p').html('Most átirányítunk a kosár oldalra, ez néhány másodpercig is eltarthat. Kérem türelmedet.');

    setTimeout(function(){

      $.ajax({
              async: false,
              url: $form.attr('action'),
              type: 'POST',
              dataType: 'default',
              data: {
                'empty-cart': true
              },
      });

      $form.find('.ticket__quantity input').each(function(index, el) {
          $this=$(el);
          //alert($this.val());
          if ($this.val() > 0) {
            doredirect = true;
            var quant=$this.val();
            var product=$this.closest('.ticket__quantity').data('product-id');
            //alert($this.closest('.ticket__quantity').data('product-id') + ': ' + quant);
            $.ajax({
              async: false,
              url: $form.attr('action'),
              type: 'POST',
              dataType: 'default',
              data: {
                'quantity': quant,
                'add-to-cart': product
              },
            });
          }
        });

        if (doredirect) {
            window.location.href=$form.attr('action');
          } else {
            console.log('Some error occured!');
            window.location.href=$form.attr('action');
        }
    },100);

    });


})(jQuery); // Fully reference jQuery after this point.
