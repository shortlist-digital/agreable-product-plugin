import throttle from 'lodash.throttle'

export default class SiteHeaderSticky {

  constructor () {
    // collect elements
    this.el = document.querySelector('.js-site-nav-open')
    this.hero = document.querySelector('.js-hero')
    this.thresholdShow = 0
    // define options
    this.throttleDelay = 250
    this.classSticky = 'is-sticky'
    // test for element on page
    if (!this.el || !this.hero) return
    // run & bind events
    this.handleResize()
    this.handleScroll()
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
    this.thresholdShow = this.hero.offsetHeight
  }
  handleScroll () {
    // get scroll position at bottom of page
    const scrollPosition = window.pageYOffset - document.documentElement.clientTop
    // if within thresholds, show the element, otherwise hide it
    if (scrollPosition >= this.thresholdShow)
      this.el.classList.add(this.classSticky)
    else
      this.el.classList.remove(this.classSticky)
  }
}
