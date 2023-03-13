var ShoppingCart = (function($) {
  "use strict";
  
  // Cache necessary DOM Elements
  var productsEl = document.querySelector(".products"),
      cartEl =     document.querySelector(".shopping-cart-list"),
      productQuantityEl = document.querySelector(".product-quantity"),
      emptyCartEl = document.querySelector(".empty-cart-btn"),
      cartCheckoutEl = document.querySelector(".cart-checkout"),
      totalPriceEl = document.querySelector(".total-price");
  
  // Fake JSON data array here should be API call
  var products = [
    {
      id: 0,
      name: "Soya sauce",
      description: "Dark soy sauce is considerably thicker than regular soy sauce. Common varieties are generally used in dishes like stir-fries and added to other sauces as a salty component.",
      imageUrl: "gro1.jpg",
      price: 2000,
    },
    {
      id: 1,
      name: "coffee",
      description: "Coffee aroma descriptors include flowery, nutty, smoky, and herby.",
      imageUrl: "t1.png",
      price: 4000,
    },
    {
      id: 2,
      name: "Jambo rice",
      description: "The perfect and pure basmati rice that's aromatic than ordinary plain rice. The Jambo Basmati long-grain white rice is way more delicious cook",
      imageUrl: "t2.png",
      price: 10000,
    },
    {
      id: 3,
      name: "Baking flour",
      description: "From bread to biscuits, cookies to cakes, baking is the art of turning flour into delicious food.",
      imageUrl: "t3.png",
      price: 2000,
    },
    {
      id: 4,
      name: "Agashya",
      description: "Agashya is a passion fruit puree made from Rwandan passion fruits and sugar. Simply add water and drink like regular squash or use as a mixer for refreshing cocktails.",
      imageUrl: "t4.png",
      price: 5000,
    },
    {
      id: 5,
      name: "RS olive oil",
      description: "soft taste, absence of bitterness, with the fruitiness of the almond.",
      imageUrl: "t5.png",
      price: 6000,
    },
    {
      id: 6,
      name: "Tanzania Rice",
      description: "rice is the second most important food and commercial crop after maize.",
      imageUrl: "rice.jpg",
      price: 25000,
    }
   
  ],
      productsInCart = [];
  
  // Pretty much self explanatory function. NOTE: Here I have used template strings (ES6 Feature)
  var generateProductList = function() {
    products.forEach(function(item) {
      var productEl = document.createElement("div");
      productEl.className = "product";
      productEl.innerHTML = `<div class="product-image">
                                <img src="${item.imageUrl}" alt="${item.name}">
                             </div>
                             <div class="product-name"><span>Product:</span> ${item.name}</div>
                             <div class="product-description"><span>Description:</span> ${item.description}</div>
                             <div class="product-price"><span>Price:</span> ${item.price} RWF</div>
                             <div class="product-add-to-cart">
                               <a href="#0" class="button see-more">More Details</a>
                               <a href="#0" class="button add-to-cart" data-id=${item.id}>Add to Cart</a>
                             </div>
                          </div>
`;
                             
productsEl.appendChild(productEl);
    });
  }
  
  // Like one before and I have also used ES6 template strings
  var generateCartList = function() {
    
    cartEl.innerHTML = "";
    
    productsInCart.forEach(function(item) {
      var li = document.createElement("li");
      li.innerHTML = `${item.quantity} ${item.product.name} - RWF${item.product.price * item.quantity}`;
      cartEl.appendChild(li);
    });
    
    productQuantityEl.innerHTML = productsInCart.length;
    
    generateCartButtons()
  }
  
  
  // Function that generates Empty Cart and Checkout buttons based on condition that checks if productsInCart array is empty
  var generateCartButtons = function() {
    if(productsInCart.length > 0) {
      emptyCartEl.style.display = "block";
      cartCheckoutEl.style.display = "block"
      totalPriceEl.innerHTML = "RWF " + calculateTotalPrice();
    } else {
      emptyCartEl.style.display = "none";
      cartCheckoutEl.style.display = "none";
    }
  }
  
  // Setting up listeners for click event on all products and Empty Cart button as well
  var setupListeners = function() {
    productsEl.addEventListener("click", function(event) {
      var el = event.target;
      if(el.classList.contains("add-to-cart")) {
       var elId = el.dataset.id;
       addToCart(elId);
      }
    });
    
    emptyCartEl.addEventListener("click", function(event) {
      if(confirm("Are you sure?")) {
        productsInCart = [];
      }
      generateCartList();
    });
  }
  
  // Adds new items or updates existing one in productsInCart array
  var addToCart = function(id) {
    var obj = products[id];
    if(productsInCart.length === 0 || productFound(obj.id) === undefined) {
      productsInCart.push({product: obj, quantity: 1});
    } else {
      productsInCart.forEach(function(item) {
        if(item.product.id === obj.id) {
          item.quantity++;
        }
      });
    }
    generateCartList();
  }
  
  
  // This function checks if project is already in productsInCart array
  var productFound = function(productId) {
    return productsInCart.find(function(item) {
      return item.product.id === productId;
    });
  }

  var calculateTotalPrice = function() {
    return productsInCart.reduce(function(total, item) {
      return total + (item.product.price *  item.quantity);
    }, 0);
  }
  
  // This functon starts the whole application
  var init = function() {
    generateProductList();
    setupListeners();
  }
  
  // Exposes just init function to public, everything else is private
  return {
    init: init
  };
  
  // I have included jQuery although I haven't used it
})(jQuery);

ShoppingCart.init();