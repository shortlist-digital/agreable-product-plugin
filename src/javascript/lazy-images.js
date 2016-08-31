import inView from 'in-view'

export default class LazyImages {

  constructor () {
    this.selector = '[data-src]'
    // get inView instance to bind events to
    this.instance = inView(this.selector)
    this.bindEnter()
  }

  bindEnter () {
    // when element enters the viewport, run handleEnter
    this.instance.on('enter', this.handleEnter)
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
}
