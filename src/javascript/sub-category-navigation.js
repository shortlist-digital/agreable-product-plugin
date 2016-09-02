import 'smoothscroll'
import 'element-closest'
const q = (selector, ctx = document) => [].slice.call(ctx.querySelectorAll(selector))

export default class SubCategoryNavigation {

  constructor () {
    this.panel = q('.js-subcatnav')[0]
    this.buttonOpen = q('.js-subcatnav-open')[0]
    this.buttonClose = q('.js-subcatnav-close')[0]
    this.linkCategory = q('.js-subcatnav-link')
    this.handleDocumentKey = this.handleDocumentKey.bind(this)
    this.handleDocumentClick = this.handleDocumentClick.bind(this)
    this.setup()
    this.bindOpen()
    this.bindClose()
    this.bindLinks()
  }

  setup () {
    this.panel.setAttribute('aria-hidden', true)
  }

  bindOpen () {
    this.buttonOpen.addEventListener('click', this.openPanel.bind(this))
  }
  bindClose () {
    this.buttonClose.addEventListener('click', this.closePanel.bind(this))
  }
  bindLinks () {
    this.linkCategory.forEach(el => { el.addEventListener('click', this.closePanel.bind(this)) })
  }

  bindDocumentKey () {
    document.addEventListener('keydown', this.handleDocumentKey)
  }
  bindDocumentClick () {
    document.addEventListener('click', this.handleDocumentClick)
  }
  unbindDocumentKey () {
    document.removeEventListener('keydown', this.handleDocumentKey)
  }
  unbindDocumentClick () {
    document.removeEventListener('click', this.handleDocumentClick)
  }

  handleDocumentKey (e) {
    if (e.keyCode === 27) this.closePanel()
  }
  handleDocumentClick (e) {
    if (e.target !== this.panel && !e.target.closest('.js-subcatnav')) this.closePanel()
  }

  openPanel () {
    this.panel.style.visibility = 'visible'
    this.panel.setAttribute('aria-hidden', false)
    this.panel.setAttribute('tabindex', -1)
    this.panel.scrollTop = 0
    this.panel.focus()
    this.bindDocumentKey()
    this.defer(this.bindDocumentClick.bind(this))
  }
  closePanel () {
    this.panel.setAttribute('aria-hidden', true)
    this.panel.removeAttribute('tabindex')
    this.panel.style.visibility = 'hidden'
    this.buttonOpen.focus()
    this.unbindDocumentKey()
    this.unbindDocumentClick()
  }

  defer (fn) {
    if (typeof fn === 'function') setTimeout(fn, 0)
  }
}
