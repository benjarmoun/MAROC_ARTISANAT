<template>

  <body class="antialiased">
    <div class="py-6">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6" >
        <div v-if="alertdisplay" class="p-4 mx-10 text-center mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
          <span class="font-medium">Success!</span> Product added to your cart successfully.
        </div>
        <div class="flex flex-col md:flex-row -mx-4">
          <div class="md:flex-1 px-4">
            <img :src='"../src/assets/" + product.picture' class="h-64 md:h-80 rounded-lg bg-gray-100 m-auto" alt="">
          </div>
          <div class="md:flex-1 px-4">
            <h2 class="mb-2 leading-tight tracking-tight font-bold text-gray-800 text-2xl md:text-3xl">{{ product.name }}</h2>
            <p class="text-gray-500 text-sm">By <a href="#" class="text-indigo-600 hover:underline">ibrahim benjarmoun</a></p>

            <div class="flex items-center space-x-4 my-4">
              <div>
                <div class="rounded-lg bg-gray-100 flex py-2 px-3 ">
                  <span class="font-bold text-indigo-600 text-3xl">{{ product.price }} </span>
                  <span class="text-indigo-600 text-2xl font-bold m-1">$</span>
                </div>
              </div>
              <div class="flex-1">
                <p class="text-green-500 text-xl font-semibold">Save 12%</p>
                <p class="text-gray-400 text-sm">Inclusive of all Taxes.</p>
              </div>
            </div>

            <p class="text-gray-500">{{ product.description }} </p>
            <div class="flex py-4 space-x-4">
              <button type="button" @click="addToCart()" class="h-14 px-6 py-2 font-semibold rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white">
                Add to Cart
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</template>
<script>
import axios from 'axios';
import DetailsCompo from "./DetailsCompo.vue";

export default {
  name: 'ProductsDetails',
  components: {
    DetailsCompo
  },
  data() {
    return {
      id: this.$route.params.id,
      product: [],
      alertdisplay: false,
    }
  },
  methods: {

    async getProductID() {
      var data = {
        "id": this.id
      };
      let result = await axios.get(
        'http://localhost/MAROC_ARTISANAT/back-app/getProductID/'+data.id
      );
      this.product = result.data[0];
      console.log(this.product);
    },
   
    addToCart() {
      var test = [];
      test = JSON.parse(localStorage.getItem("allProducts"));
      // check if there is a product in the cart with the same id
      if(test == null) test = [];

      var existingProduct = test.find(function(product) {
        return product.id == this.id;
      }, this);

      // if there is no product with the same id, add it to the cart
      if(!existingProduct) {
        var existingProducts = JSON.parse(localStorage.getItem("allProducts"));
        if(existingProducts == null) existingProducts = [];
        // Save allProducts back to local storage
        existingProducts.push(this.product);
        localStorage.setItem("allProducts", JSON.stringify(existingProducts));
        this.alertdisplay = true;

      }else{
        alert("Product already in cart");
      }
    },
    

  },
  mounted() {
    this.getProductID();
  },

}
</script>
<style>
</style>