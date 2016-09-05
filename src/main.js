import 'classlist-polyfill'
import DOMReady from 'detect-dom-ready'
import LazyImages from './javascript/lazy-images'
import ProductCTA from './javascript/product-cta'
import Share from './javascript/share/share.js'
import SiteHeaderSticky from './javascript/site-header'
import SiteNavigation from './javascript/site-navigation'

require('es6-object-assign').polyfill()
require('./stylus/main.styl')

DOMReady(function () {
  // Information about the promotion is bootstrapped from the server
  // var agreablePromoData = window.agreablePromoData

  console.log('agreable-product-plugin JS init')

  new SiteNavigation()
  new LazyImages()
  new Share()
  new ProductCTA()
  new SiteHeaderSticky()
})
