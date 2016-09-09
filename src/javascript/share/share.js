import FacebookLoader from './facebook-loader'

export default class Share {

  constructor () {
    new FacebookLoader()

    this.query('.share__button').forEach(function(shareButton) {
      let socialNetwork =  shareButton.className.match(/share__button--(.*)/)[1]

      // Produces name of function to call
      // e.g. facebookClick
      let clickFunctionName = socialNetwork + 'Click'
      let container = shareButton.parentElement
      shareButton.addEventListener('click', () => this[clickFunctionName](container))
    }.bind(this))
  }

  facebookClick () {
    window.FB.ui({
      method: 'feed',
      link: window.location.href,
      show_error: true,
      redirect_uri: window.location.href
    })
    window.analytics.track('Facebook', {
      category: 'social',
      action: 'clickedOnShareIcon',
      label: window.location.pathname
    })
  }

  twitterClick (el) {
    var url = `https://twitter.com/intent/tweet?text=${this.tweetText(el)}&url=${window.location.href}&via=${this.twitterHandle()}`
    window.open(url, '', 'height=300,width=600')
    window.analytics.track('Twitter', {
      category: 'social',
      action: 'clickedOnShareIcon',
      label: window.location.pathname
    })
  }

  whatsappClick () {
    document.location.href = `whatsapp://send?text=Have+you+seen+this+?+${this.shareTitle()}+${window.location.href}`
    window.analytics.track('WhatsApp', {
      category: 'social',
      action: 'clickedOnShareIcon',
      label: window.location.pathname
    })
  }

  emailClick () {
    var confirmBox = confirm('This will open your mail client. Carry on?')
    if (confirmBox) {
      document.location.href = `mailto:?body=${this.emailText()}`
    }
    window.analytics.track('Email', {
      category: 'social',
      action: 'clickedOnShareIcon',
      label: window.location.pathname
    })
  }

  twitterHandle () { return window.twitter_id }

  tweetText (el) { return encodeURIComponent(el.getAttribute('data-twitter-text') || '') }

  emailText () { return window.location.protocol + '//' + window.location.hostname + window.location.pathname }

  currentUrl () { return document.location.href }

  query (selector) {
    // wrapper to return an array of elements (converted from nodelist)
    return [].slice.call(document.querySelectorAll(selector))
  }

}
