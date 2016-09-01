import inView from 'in-view'
import throttle from 'lodash.throttle'

export default class LazyImages {

  constructor () {
    this.selector = '[data-src]'
    this.scrollSelector = '.lazy-container'
    // get inView instance to bind events to
    this.instance = inView(this.selector)
    this.bindEnter()
    this.bindCustomScroll()
  }

  bindEnter () {
    // when element enters the viewport, run handleEnter
    this.instance.on('enter', this.handleEnter)
  }
  bindCustomScroll () {
    // loop through the scroll containers
    this.query(this.scrollSelector).forEach(el => {
      // bind a throttled scroll event to element
      el.addEventListener('scroll', throttle(this.handleCustomScroll.bind(this), 250))
    })
  }

  handleEnter (el) {
    // exit early if 'data-src' attribute is empty, prevents browser trying to load a blank URL
    if (el.getAttribute('src')) return
    // declare onload function before set 'src' to cover cached images
    el.onload = function () {
      // no longer need 'data-src'
      el.removeAttribute('data-src')
      // add loaded class to fade in image
      el.classList.add('loaded')
    }
    // set 'src' attribute from 'data-src'
    el.setAttribute('src', el.getAttribute('data-src'))
  }
  handleCustomScroll () {
    // check every 250ms to see if the selector is in view, inview will trigger an 'enter' event
    this.instance.check()
  }

  query (selector) {
    // wrapper to return an array of elements (converted from nodelist)
    return [].slice.call(document.querySelectorAll(selector))
  }
}
