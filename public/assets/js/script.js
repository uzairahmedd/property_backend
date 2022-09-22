(function ($) {
    "use strict";

   /*--------------------------
        Payment Btn Active
      -------------------------------*/
    $('.payment_ui').on('click', 'li', function () {
        $(this).addClass('active').siblings().removeClass('active');
    });

    /*--------------------------
        ScrollTop Active
      -------------------------------*/
    $(window).on('load', function() {
        $(window).scrollTop(0);
    });

    /*-----------------------------
        Navbar Mobile Menu Active
      ----------------------------------*/
      var $main_nav = $('#main-nav');
      var $toggle = $('.toggle');

      var defaultOptions = {
        disableAt: false,
        customToggle: $toggle,
        levelSpacing: 40,
        navTitle: 'Menu',
        levelTitles: true,
        levelTitleAsBack: true,
        pushContent: '#container',
        insertClose: 2
      };

      // call our plugin
      var Nav = $main_nav.hcOffcanvasNav(defaultOptions);

      // add new items to original nav
      $main_nav.find('li.add').children('a').on('click', function() {
        var $this = $(this);
        var $li = $this.parent();
        var items = eval('(' + $this.attr('data-add') + ')');

        $li.before('<li class="new"><a href="#">'+items[0]+'</a></li>');

        items.shift();

        if (!items.length) {
          $li.remove();
        }
        else {
          $this.attr('data-add', JSON.stringify(items));
        }

        Nav.update(true);
      });

      // demo settings update

      const update = (settings) => {
        if (Nav.isOpen()) {
          Nav.on('close.once', function() {
            Nav.update(settings);
            Nav.open();
          });

          Nav.close();
        }
        else {
          Nav.update(settings);
        }
      };

      $('.actions').find('a').on('click', function(e) {
        e.preventDefault();

        var $this = $(this).addClass('active');
        var $siblings = $this.parent().siblings().children('a').removeClass('active');
        var settings = eval('(' + $this.data('demo') + ')');

        update(settings);
      });

      $('.actions').find('input').on('change', function() {
        var $this = $(this);
        var settings = eval('(' + $this.data('demo') + ')');

        if ($this.is(':checked')) {
          update(settings);
        }
        else {
          var removeData = {};
          $.each(settings, function(index, value) {
            removeData[index] = false;
          });

          update(removeData);
        }
      });

    /*-------------------------
        Contact Form Submit
      -----------------------------*/
    $('#contactform').on('submit',function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: this.action,
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function() {
                $('.basicbtn').attr('disabled','');
                $('.basicbtn').html('Please Wait...');
            },
            success: function(response){
                const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                  }
                })
                $('.basicbtn').removeAttr('disabled');
                $('.basicbtn').html('Send Message');
                if(response.errors)
                {
                  Toast.fire({
                    icon: 'error',
                    title: response.errors
                  })
                }else{
                  Toast.fire({
                    icon: 'success',
                    title: 'Your Message Sent Successfully'
                  })
                  document.getElementById("contactform").reset();
                }
            },
            error: function(xhr, status, error)
            {
                $('.basicbtn').removeAttr('disabled');
                $('.basicbtn').html('Send Message');
                $.each(xhr.responseJSON.errors, function (key, item)
                {
                    $('#error_msg').html(item);
                });
            }
        })
    });

    $('.selectric').selectric();

})(jQuery);
