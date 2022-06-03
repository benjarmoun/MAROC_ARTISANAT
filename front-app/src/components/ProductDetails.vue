<template>
  <!-- <DetailsCompo :title="this.product[0].name" :price="this.product[0].price" :description="this.product[0].description" :pic="this.product[0].Pic"  /> -->

  <body class="antialiased">

    <div class="py-6">

      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6"  :key="product.id">
        <div class="flex flex-col md:flex-row -mx-4">
          <div class="md:flex-1 px-4">
            <img :src='"../src/assets/" + product.picture' class="h-64 md:h-80 rounded-lg bg-gray-100 m-auto" alt="">
          </div>
          <div class="md:flex-1 px-4">
            <h2 class="mb-2 leading-tight tracking-tight font-bold text-gray-800 text-2xl md:text-3xl">{{ product.name }}</h2>
            <p class="text-gray-500 text-sm">By <a href="#" class="text-indigo-600 hover:underline">STORE NAME</a></p>

            <div class="flex items-center space-x-4 my-4">
              <div>
                <div class="rounded-lg bg-gray-100 flex py-2 px-3">
                  <span class="text-indigo-400 mr-1 mt-1">$</span>
                  <span class="font-bold text-indigo-600 text-3xl">{{ product.price }} </span>
                </div>
              </div>
              <div class="flex-1">
                <p class="text-green-500 text-xl font-semibold">Save 12%</p>
                <p class="text-gray-400 text-sm">Inclusive of all Taxes.</p>
              </div>
            </div>

            <p class="text-gray-500">{{ product.description }} </p>
            <img :src='"src/assets/" + this.pic' alt="">
            <div class="flex py-4 space-x-4">
              <div class="relative">
                <div
                  class="text-center left-0 pt-2 right-0 absolute block text-xs uppercase text-gray-400 tracking-wide font-semibold">
                  Qty</div>
                <select
                  class="cursor-pointer appearance-none rounded-xl border border-gray-200 pl-4 pr-8 h-14 flex items-end pb-1">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>

                <svg class="w-5 h-5 text-gray-400 absolute right-0 bottom-0 mb-2 mr-2"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                </svg>
              </div>

              <button type="button"
                class="h-14 px-6 py-2 font-semibold rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white">
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
      // product : {
      //   id: 1,
      //   title: 'LAMPE DITIA',
      //   price: 12.34,
      //   Pic: 'gerab.jpg',
      //   description : 'lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quos!',
      // },
    }
  },
  props: {
    // id: Number
  },
  methods: {
    //   var axios = require('axios');
    //   var data = JSON.stringify({
    //     "id": "2"
    //   });

    //   var config = {
    //     method: 'get',
    //     url: 'http://localhost/MAROC_ARTISANAT/back-app/getProductID',
    //     headers: { 
    //       'Content-Type': 'application/json', 
    //       'Cookie': 'PHPSESSID=3g9jd4qq8p2vu4lanl28ben59s'
    //     },
    //     data : data
    //   };

    //   axios(config)
    //   .then(function (response) {
    //     console.log(JSON.stringify(response.data));
    //   })
    //   .catch(function (error) {
    //     console.log(error);
    //   });

    async getProductID() {
      var data = {
        // "id": this.$route.params.id
        "id": this.id
      };
      console.log(data.id);
      let result = await axios.get(
        'http://localhost/MAROC_ARTISANAT/back-app/getProductID/'+data.id
      );
      this.product = result.data[0];
      console.log(this.product);
    },
  },
  mounted() {
    this.getProductID();
  },

}
</script>
<style>
</style>