export default class LocalStorage {
  constructor () {
    var recentProducts = [];

    recentProducts.push({
      "title": '',
      "cost": '',
      "brand": '',
      "path": '',
      "image": '',
      "rating": 4
    })

    localStorage.setItem("product", JSON.stringify(recentProducts));

    console.log(recentProducts);
  }
}
