import throttle from 'lodash.throttle'
import FacebookLoader from './facebook-loader'

export default class Share {

  constructor () {
    new FacebookLoader()

    document.querySelectorAll('.share__button').forEach(function(shareButton) {
      let socialNetwork =  shareButton.className.match(/share__button--(.*)/)[1]

      // Produces name of function to call
      // e.g. facebookClick
      let clickFunctionName = socialNetwork + 'Click'
      shareButton.addEventListener('click', this[clickFunctionName].bind(this))
    }.bind(this))
  }

  facebookClick () {
    FB.ui({
      method: 'feed',
      link: window.location.href,
      show_error: true,
      redirect_uri: window.location.href
    }, function(response) {})
    analytics.track('Facebook', {
      category: 'social',
      action: 'clickedOnShareIcon',
      label: window.location.pathname
    })
  }

  twitterClick () {
    var url = `https://twitter.com/intent/tweet?text=${this.tweetText()}&url=${window.location.href}&via=${this.twitterHandle()}`
    window.open(url, '', 'height=300,width=600')
    analytics.track('Twitter', {
      category: 'social',
      action: 'clickedOnShareIcon',
      label: window.location.pathname
    })
  }

  whatsappClick () {
    document.location.href = `whatsapp://send?text=Have+you+seen+this+?+${this.shareTitle()}+${window.location.href}`
    analytics.track('WhatsApp', {
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
    analytics.track('Email', {
      category: 'social',
      action: 'clickedOnShareIcon',
      label: window.location.pathname
    })
  }

  twitterHandle () { return window.twitter_id }

  tweetText () { return window.location.protocol + '//' + window.location.hostname + window.location.pathname }

  emailText () { return window.location.protocol + '//' + window.location.hostname + window.location.pathname }

  currentUrl () { return document.location.href }

}
