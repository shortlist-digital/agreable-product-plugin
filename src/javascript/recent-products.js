export default class RecentProducts {

  constructor () {
    this.el = document.getElementById('recent-products')
    // cancel early if localStorage is not supported or the render element doesn't exist
    if (!window.localStorage || !this.el) return
    // get previously stored products, set default product list
    this.recentProducts = window.localStorage.getItem(window.recentProductStorageKey)
    // cancel early if no items stored
    if (!this.recentProducts) return
    // parse values from storage to get array
    this.recentProducts = JSON.parse(this.recentProducts)
    this.sectionTitle = 'Recently Viewed'
    // create HTML string from stored products
    this.viewString = this.createContainer()
    // append to page
    this.renderView()
  }

  renderView () {
    this.el.innerHTML = this.viewString
  }

  createContainer () {
    return `
      <section class="product-collection product-collection--narrow">
        <div class="wrapper wrapper--narrow">
          <h2 class="product-collection__title">
            ${this.sectionTitle}
          </h2>
        </div>
        <div class="product-list-container product-list-container--narrow">
          <ul class="product-list grid">
            ${this.recentProducts.map(this.createCard.bind(this))}
          </ul>
        </div>
      </section>`
  }
  createCard (product) {
    return `
      <li class="product-list__list-item grid__col">
        <a href="${product.permalink}" class="product-card">
          <div class="product-card__media">
            ${
              product.hero_winner ?
              '<div class="product-card__rosette">Hero Awards Winner</div>' : ''
            }
            <div class="media-wrap media-wrap--square">
              <img class="product-card__image media-wrap__item loaded" src="${product.product_image}" alt="${product.post_title} Product Image">
            </div>
          </div>
          <div class="product-card__content">
            ${
              product.category_winner ?
              '<div class="product-card__badge">Winner</div>' : ''
            }
            ${
              product.product_rating ?
              `<div class="product-card__rating">
                <div class="rating-box rating-box--small">
                  ${this.createRating(product.product_rating)}
                </div>
              </div>` : ''
            }
            <h3 class="product-card__title">
              ${product.post_title}
            </h3>
            <p class="product-card__brand">
              ${product.brand_name}
            </p>
            ${
              product.product_price ?
              `<div class="product-card__price">${product.product_price}</div>` : ''
            }
            <p class="product-card__link">View product</p>
          </div>
        </a>
      </li>`
  }
  createRating (rating) {
    // create empty array of length 5 to iterate over
    const arr = Array.apply(null, Array(5))
    // return 5 divs with full/empty classes
    return arr.map((_, i) => `<div class="${i < rating ? 'full' : 'empty'}"></div>`)
  }
}
