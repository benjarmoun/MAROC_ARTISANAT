    <!-- This example requires Tailwind CSS v2.0+ -->
<template>

  <tbody class="divide-y divide-gray-200 bg-white">
    <tr>
      <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">
        <!-- <div class="flex items-center"> -->
          <div class="h-32 w-32 flex-shrink-0">
            <img class="h-32 w-32 rounded-md" :src='"../src/assets/"+this.picture' alt="" />
          </div>
          <!-- </div> -->
        </td>
          <td>
            <div>  
          <div class="ml-4">
            <div class="font-medium text-gray-900">{{ name }}</div>
            <!-- <div class="text-gray-500">{{ product.email }}</div> -->
          </div>
        </div>
      </td>
      <td class=" px-3 py-4 text-sm text-gray-500 ">
        <div class="text-gray-900  ">{{ description }}</div>
        <!-- <div class="text-gray-500">{{ product.department }}</div> -->
      </td>
      <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
        <span class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">{{ category_id }}</span>
      </td>
      <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ price }}</td>
      <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-center text-sm font-medium sm:pr-6">
        <router-link :to='"/updateproduct/"+ this.id'>
          <a  class="text-indigo-600 hover:text-indigo-900 mx-1">Edit</a>
        </router-link>
        <router-link :to='"/deleteproduct/"+ this.id'>
          <a  class="text-red-600 hover:text-red-900 mx-1">Delete</a>
        </router-link>
      </td>
    </tr>
  </tbody>
</template>

<script>
import store from '../store';
// import store from "../store/index"
import { mapActions } from 'vuex';

export default {
  name: 'Store',
    props: {
        picture: String,
        price:  Number,
        name: String,
        description: String,
        category_id: Number,
        id: Number
    },
    data() {
        return {
            // s_products: [],
            products: [],
            seller_id: '',
        }
    },
    mounted() {
      console.log(this.id);
    },
    // methods:{
    //     ...mapActions([
    //         'getProductBySeller'
    //         ]),
    //         getProdBySeller(){
    //             // this.seller_id ,
    //             this.getProductBySeller();
    //             this.products = store.state.s_products;
    //             console.log(this.products);
    //             // return this.s_products;
    //         }
    // },
    // mounted() {
    //     this.getProdBySeller();
    // },
    // beforemounted() {
    //   // getProdBySeller();
    //   console.log("hello");
    // },
    
}
</script>
