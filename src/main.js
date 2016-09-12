import LazyImages from './javascript/lazy-images'
import ProductCTA from './javascript/product-cta'
import Share from './javascript/share/share.js'
import SiteHeaderSticky from './javascript/site-header'
import SiteNavigation from './javascript/site-navigation'
import RecentProducts from './javascript/recent-products'
import SubCategoryNavigation from './javascript/sub-category-navigation'
import './stylus/main.styl'

// IS THIS INFO NECESSARY?
// Information about the promotion is bootstrapped from the server
// var agreablePromoData = window.agreablePromoData

new RecentProducts()
new SiteNavigation()
new LazyImages()
new ProductCTA()
new Share()
new SiteHeaderSticky()
new SiteNavigation()
new SubCategoryNavigation()
