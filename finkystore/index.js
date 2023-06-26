var ShoppingCart = (function($) {
  "use strict";
  
  // Cache necessary DOM Elements
  var productsEl = document.querySelector(".product-container"),
      cartEl =     document.querySelector(".dropdown-cart-products"),
      productQuantityEl = document.querySelector(".cart-count"),
      emptyCartEl = document.querySelector(".empty-cart"),
      cartCheckoutEl = document.querySelector(".dropdown-cart-total"),
      totalPriceEl = document.querySelector(".cart-total-price"),
      payBtn=document.querySelector(".pay-btn"),
      cartText=document.querySelector(".cart-text")
;
  
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
      price: 500,
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
  
  var generateProductList = function() {
    products.forEach(function(item) {
      var productEl = document.createElement("div");
      productEl.className = "col-6 col-md-4 col-lg-3";
      productEl.innerHTML = ` <div class="product product-2 text-center">
      <figure class="product-media">
      <span class="product-label label-sale">Sale</span>
      <a href="#">
          <img src="${item.imageUrl}" alt="${item.name}" class="product-image">
      </a>
      <div class="product-action">
          <a href="#0" class="btn-product" data-id=${item.id}><span>
           <i class="fa fa-shopping-cart"></i> add to cart</span>
           </a>
      </div>
  </figure>
  <div class="product-body">
      <h3 class="product-title"><a href="#">${item.name}</a></h3>
      <div class="product-price">
          <span class="new-price">${item.price} RWF</span>
      </div>
  </div>
  </div>
`;
                             
productsEl.appendChild(productEl);
    });
  }
  
  var generateCartList = function() {
    
    cartEl.innerHTML = "";
    
    productsInCart.forEach(function(item) {
      var div = document.createElement("div");
      div.className="product"
      div.innerHTML = `
      <div class="product-cart-details">
      <h4 class="product-title">
        <a href="#">${item.product.name}</a>
      </h4>

      <span class="cart-product-info">
        <span class="cart-product-qty">${item.quantity}</span>
         RWF${item.product.price * item.quantity}
      </span>
    </div>

    <figure class="product-image-container">
      <a href="product.html" class="product-image">
        <img src="${item.product.imageUrl}" alt="product"/>
      </a>
    </figure>`;
      cartEl.appendChild(div);
    });
    productQuantityEl.innerHTML = productsInCart.length;
    
    generateCartButtons()
  }
  
  
  var generateCartButtons = function() {
    if(productsInCart.length > 0) {
      emptyCartEl.style.display = "block";
      cartCheckoutEl.style.display = "block"
      payBtn.style.display = "block"
      cartText.style.display = "none"
      totalPriceEl.innerHTML = "RWF " + calculateTotalPrice();
    } else {
      emptyCartEl.style.display = "none";
      cartCheckoutEl.style.display = "none";
      payBtn.style.display="none";
      cartText.style.display="block";
    }
  }
  
  var setupListeners = function() {
    $(".btn-product").each(function() { 
      $(this).on("click", function(){
        var id = $(this).data('id');
        addToCart(id);
    });
      });
    
    emptyCartEl.addEventListener("click", function(event) {
      if(confirm("Are you sure?")) {
        productsInCart = [];
      }
      generateCartList();
    });
  }
  
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
  $(".pay-btn").click(function (e) { 
    e.preventDefault();
    var tot=calculateTotalPrice();
    localStorage.setItem("amount", tot);
    window.location.href="checkout.html"
   
  });
  
  
  var init = function() {
    generateProductList();
    setupListeners();
  }
  
  return {
    init: init
  };

})(jQuery);

ShoppingCart.init();
