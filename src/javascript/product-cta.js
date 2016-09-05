import throttle from 'lodash.throttle'
import { addClass, removeClass } from './util-class'

export default class ProductCTA {

  constructor () {
    // collect elements
    this.el = document.querySelector('.js-product-cta')
    this.targetShow = document.querySelector('.js-product-target-show')
    this.targetHide = document.querySelector('.js-product-target-hide')
    // define options
    this.throttleDelay = 250
    this.classVisible = 'is-visible'
    // define thresholds to show/hide element
    this.thresholdShow = 0
    this.thresholdHide = 0
    // test for element on page
    if (!this.el) return
    // run & bind events
    this.handleScroll()
    this.handleResize()
    this.bindResize()
    this.bindScroll()
  }

  bindResize () {
    window.addEventListener('resize', throttle(this.handleResize.bind(this), this.throttleDelay))
  }
  bindScroll () {
    window.addEventListener('scroll', throttle(this.handleScroll.bind(this), this.throttleDelay))
  }

  handleResize () {
    // read target offsets when resizing (stuff gonna move on tha page)
    this.thresholdShow = this.targetShow.offsetTop + this.el.offsetHeight
    this.thresholdHide = this.targetHide.offsetTop
  }
  handleScroll () {
    // get scroll position at bottom of page
    const scrollPositionBottom = (window.pageYOffset - document.documentElement.clientTop) + window.innerHeight
    // if within thresholds, show the element, otherwise hide it
    if (scrollPositionBottom > this.thresholdShow && scrollPositionBottom <= this.thresholdHide)
      addClass(this.el, this.classVisible)
    else
      removeClass(this.el, this.classVisible)
  }
}
