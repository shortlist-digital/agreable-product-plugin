require('es6-object-assign').polyfill()
require('./stylus/main.styl')

import DOMReady from 'detect-dom-ready'
import SiteNavigation from './javascript/site-navigation'
import LazyImages from './javascript/lazy-images'

DOMReady(function () {
  // Information about the promotion is bootstrapped from the server
  // var agreablePromoData = window.agreablePromoData

  console.log('agreablt-product-plugin JS init')

  new SiteNavigation()
  new LazyImages()
  // let rootElement = document.getElementById('agreable-promotion')

  // React.render(
  //   <Provider store={store}>
  //     {() => <App />}
  //   </Provider>,
  //   rootElement
  // )
})
