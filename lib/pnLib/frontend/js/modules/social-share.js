(function($) {

  'use strict';

  function SocialShare() {

    var self = this,

        titleFacebook = 'Partager sur Facebook',
        titleTwitter = 'Partager sur Twitter',
        titleLinkedIn = 'Partager sur LinkedIn',

        title = '',
        text = '',
        url = '',

        winHeight = 300,
        winWidth = 550,
        winTop = (screen.height / 2) - (winHeight / 2),
        winLeft = (screen.width / 2) - (winWidth / 2),

        windowParam = 'top=' + winTop + ',left=' + winLeft + ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight,

        options = {
        };

    /**
     * Facebook share
     */
    function shareFacebook() {
      window.open('http://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(url),
        titleFacebook, windowParam);
    }

    /**
     * Twitter share
     */
    function shareTwitter() {
      window.open('http://twitter.com/share?url=' +
        encodeURIComponent(url) + '&text=' +
        encodeURIComponent(text) + '&count=none/',
        titleTwitter, windowParam);
    }

    /**
     * LinkedIn share
     */
    function shareLinkedIn() {
      window.open('https://www.linkedin.com/cws/share?url=' +
        encodeURIComponent(url), titleLinkedIn, windowParam);
    }

    /**
     * Email share
     */
    function shareEmail() {
      window.location = 'mailto:?subject=' + title + '&body=' + url  + ' ' + text;
    }


    /**
     * Public constructor
     * @param  {Object} opts Options
     */
    self.initialize = function(opts) {
      //extends options
      for (var i in opts) { options[i] = opts[i]; }

      if (options.titleFacebook) titleFacebook = options.titleFacebook;
      if (options.titleTwitter )titleTwitter = options.titleTwitter;
      if (options.titleLinkedIn) titleLinkedIn = options.titleLinkedIn;

      url = window.location.href;
      title = $('title').text();
      text = $('[property="og:description"]').attr('content') || '';

      options.button.on('click', function(e) {
        var $this = $(this);

        // Inside list of items
        if ($this.attr('data-url')) {
          url = $this.attr('data-url');
        }
        if ($this.attr('data-title')) {
          title = $this.attr('data-title');
        }
        if ($this.attr('data-text')) {
          text = $this.attr('data-text');
        }

        // Single item
        if ($this.attr('data-type') === 'facebook') {
          shareFacebook();
        } else if ($this.attr('data-type') === 'twitter') {
          shareTwitter();
        } else if ($this.attr('data-type') === 'linkedin') {
          shareLinkedIn();
        } else if ($this.attr('data-type') === 'email') {
          shareEmail();
        }
      });

    };

    self.initialize.apply(self, arguments);
    return self;
  }

  /* Namespace declaration */
  window.SocialShare = SocialShare;

}(jQuery));
