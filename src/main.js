import DOMReady from 'detect-dom-ready'
import SiteNavigation from './javascript/site-navigation'
import LazyImages from './javascript/lazy-images'
import Share from './javascript/share/share.js'
import SubCategoryNavigation from './javascript/sub-category-navigation'

require('es6-object-assign').polyfill()
require('./stylus/main.styl')

DOMReady(function () {
  // Information about the promotion is bootstrapped from the server
  // var agreablePromoData = window.agreablePromoData

  console.log('agreable-product-plugin JS init')

  new SiteNavigation()
  new LazyImages()
  new Share()
  new SubCategoryNavigation()
})
