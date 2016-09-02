export default class FacebookLoader {

  constructor () {
    if (typeof window.facebook_app_id === 'undefined') {
      console.warn('"FB_APP_ID" is not present in CMS Options. Facebook sharing is currently disabled.')
      return;
    }

    if (document.querySelectorAll('#fb-root').length === 1) {
      return
    }

    var fbRootEl = document.createElement("div")
    fbRootEl.id = 'fb-root'
    document.querySelectorAll('body')[0].appendChild(fbRootEl); // Special occassion for the semi 🍰

    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = '//connect.facebook.net/en_US/sdk.js';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    window.fbAsyncInit = function() {
      FB.init({
        appId: window.facebook_app_id,
        cookie: true,  // enable cookies to allow the server to access
        // the session
        xfbml: false,  // parse social plugins on this page
        version: 'v2.4' // use version 2.4
      });
    };

  }

}
