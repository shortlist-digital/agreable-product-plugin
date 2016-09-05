export function removeClass (el, className) {
  return el.className = el.className.replace(new RegExp('(^|\\b)' + className + '(\\b|$)', 'gi'), ' ')
}

export function addClass (el, className) {
  return el.className += ' ' + className
}
