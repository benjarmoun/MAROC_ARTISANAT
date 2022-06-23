
<template>
  <div>
    

    <!-- Static sidebar for desktop -->
    <div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0">
      <div class="flex flex-col flex-grow border-r border-gray-200 pt-5 bg-white overflow-y-auto">
        <div class="relative z-10 flex items-center w-auto px-4 leading-10 lg:flex-grow-0 lg:flex-shrink-0 lg:text-left">
                <router-link to="/" class="box-border inline-block font-sans text-2xl font-bold text-left text-indigo-900 no-underline bg-transparent cursor-pointer focus:no-underline">
                    Maroc Artisan
                </router-link>
            </div>
        <div class="mt-5 flex-grow flex flex-col">
          <nav class="flex-1 px-2 pb-4 space-y-1">

            <router-link  to='/ADMIN/users' @click="disp(1) "  :class="[display == 1 ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md']" >
                Users
            </router-link>
            <router-link  to="/ADMIN/products" @click="disp(2)" :class="[display == 2 ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md']" >
                Products
            </router-link>
            <!-- <router-link  to="/ADMIN/products" @click="disp(3)" :class="[display == 3 ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md']" >
                Orders (comming soon)
            </router-link> -->
            

          </nav>
        </div>
        <div class="flex-shrink-0 flex border-t border-gray-200 p-4 flex-col">
          <button @click="logout"
            :class="[true ? 'bg-red-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md']" >
                Logout
          </button>
        
          
        </div>
      </div>
    </div>
    <div class="md:pl-64 flex flex-col flex-1">

      <main class="flex-1">
        <div class="py-6">
          <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <div>
              <button @click="getsellersFct()">
                <h3 class="text-3xl font-medium text-gray-700">ADMIN's Dashboard</h3>
              </button>
              <!-- card template main 3 -->
              <DashCard :stat1="this.sellers.length" :stat2="this.orders" :stat3="this.products.length" />

              <div class="mt-8"></div>

              <div class="flex flex-col mt-8">
                <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                    <div v-if="display == 1">
                    <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                      <table class="min-w-full">
                        <thead>
                          <tr>
                            <th
                              class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                            >
                              #ID
                            </th>
                            <th
                              class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                            >
                              Name
                            </th>
                            <th
                              class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                            >
                              E-Mail
                            </th>
                            <th
                              class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                            >
                              Products
                            </th>
                            <th
                              class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
                            >
                              Action
                            </th>
                          </tr>
                        </thead>
  
                        <tbody class="bg-white">
                          <tr v-for="seller in this.sellers"  >
  
                            <!-- table row -->
                            <td
                              class="px-6 py-4 border-b border-gray-200 whitespace-nowrap"
                            >
                                <div class="flex-shrink-0 w-10 h-10">
                                  {{ seller.user_id}}
                                </div>
                            </td>
  
                            <td
                              class="px-6 py-4 border-b border-gray-200 whitespace-nowrap"
                            >
                              <div class="text-sm leading-5 text-gray-900">
                                {{ seller.fname}} 
                              </div>
                              <div class="text-sm leading-5 text-gray-500">
                                {{ seller.lname }} 
                              </div>
                            </td>
  
                            <td
                              class="px-6 py-4 border-b border-gray-200 whitespace-nowrap"
                            >
                              <span
                                class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full"
                                >
                                {{ seller.email }}
                                </span
                              >
                            </td>
  
                            <td
                              class="px-6 py-4 text-sm leading-5 text-gray-500 border-b border-gray-200 whitespace-nowrap"
                            >
                              {{ seller.somme }}
                            </td>
  
                            <td
                              class="px-6 py-4 text-sm font-medium leading-5  border-b border-gray-200 whitespace-nowrap"
                            >
                              <button @click="this.delete(seller.user_id)" class="text-red-500 hover:text-red-700">
                                  Delete
                              </button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    </div>
                    <div v-if="display == 2">
                      <h3 class="text-2xl font-medium text-gray-800 my-2">PRODUCTS TABLE</h3>
                      <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300 ">
                          <!-- <caption>Product</caption> -->
                          <thead class="bg-gray-50">
                              <tr>
                                  <th scope="col"
                                      class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                      Picture</th>
                                  <th scope="col"
                                      class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                      Name</th>
                                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                      Seller</th>
                                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                      Category</th>
                                  <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                      price</th>
                                  <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                      <span>Actions</span>
                                  </th>
                              </tr>
                          </thead>
                          <tbody class="divide-y divide-gray-200 bg-white" v-for="product in prods">
                              <!-- {{ product }} -->
                              <Store :id="product.id" :name="product.name" :price="product.price"
                                  :picture="product.picture" :fname="product.fname" :lname="product.lname"
                                  :category="product.c_name" />
                          </tbody>
                        </table>
                      </div>
                    </div>


                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
</template>

<script>

import store from '../../store';
import { mapActions } from 'vuex';
import axios from 'axios';
import DashCard from '../../components/DashCards.vue';
import Store from './../../components/ProdsAdmin.vue';


export default {
  name: 'Dashboard',
  components:{
    DashCard,
    Store,
  },
  data() {
    return {
      display: 1,
      sellers: [],
      products: [],
      prods: [],
      orders: "",
      
      
    }
  },
  methods: {
    ...mapActions([
      'getsellers',
      'getAllProducts',
      'getProductBySeller',
      'getProdctsAdmin',
      'getOrdersSum'
    ]),
    logout() {
      localStorage.removeItem("admin");
      this.$router.push('/AdminLogin');
      },
    disp(val) {
      this.display = val;
    },
    getProdBySeller() {
      this.user = JSON.parse(localStorage.getItem("user"));
      this.user_id = this.user.user_id;
      this.getProductBySeller(this.user_id).then(response => {
          this.products = store.state.s_products;
          console.log(this.products);
      })
    },

    getProdsAdmin() {
      this.getProdctsAdmin().then(response => {
          this.prods = store.state.products;
          console.log(this.prods);
      })
    },

    getUserId() {
        this.user = JSON.parse(localStorage.getItem("user"));
        this.user_id = this.user.user_id;
        console.log(this.user_id);
    },

    async delete(id) {
        console.log(id);
        let result = await axios.delete('http://localhost/MAROC_ARTISANAT/back-app/deleteUser/'+id);
        console.log(result);
        this.getsellersFct();
      },

    getsellersFct(){
      this.getsellers().then((response) => {
      this.sellers= response;
    });
    },

    getOrdersFct(){
      this.getOrdersSum().then((response) => {
      this.orders= response;
      console.log(this.orders);
    });
    },
    getproductsFct(){
      this.getAllProducts().then((response) => {
      this.products= response;
      console.log(store.state.products);
      });
    },

    
  },
  mounted() {
    if(!JSON.parse(localStorage.getItem('admin'))){
          this.$router.push({name:"AdminLogin"});
        }
    this.getsellersFct()
    this.getproductsFct()
    this.getProdsAdmin();
    this.getOrdersFct();

  },

}
      </script>