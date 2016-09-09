import LazyImages from './javascript/lazy-images'
import ProductCTA from './javascript/product-cta'
import Share from './javascript/share/share.js'
import SiteHeaderSticky from './javascript/site-header'
import SiteNavigation from './javascript/site-navigation'
import './stylus/main.styl'

// IS THIS INFO NECESSARY?
// Information about the promotion is bootstrapped from the server
// var agreablePromoData = window.agreablePromoData
new SiteNavigation()
new LazyImages()
new Share()
new ProductCTA()
new SiteHeaderSticky()
