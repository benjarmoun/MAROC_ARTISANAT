<!--
  This example requires Tailwind CSS v2.0+ 
  
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<template>
  <!--
    This example requires updating your template:

    ```
    <html class="h-full bg-gray-100">
    <body class="h-full">
    ```
  -->
  <div>
    <!-- responsive -->
    <!-- <TransitionRoot as="template" :show="sidebarOpen">
      <Dialog as="div" class="relative z-40 md:hidden" @close="sidebarOpen = false">
        <TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300" leave-from="opacity-100" leave-to="opacity-0">
          <div class="fixed inset-0 bg-gray-600 bg-opacity-75" />
        </TransitionChild>

        <div class="fixed inset-0 flex z-40">
          <TransitionChild as="template" enter="transition ease-in-out duration-300 transform" enter-from="-translate-x-full" enter-to="translate-x-0" leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0" leave-to="-translate-x-full">
            <DialogPanel class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-white">
              <TransitionChild as="template" enter="ease-in-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in-out duration-300" leave-from="opacity-100" leave-to="opacity-0">
                <div class="absolute top-0 right-0 -mr-12 pt-2">
                  <button type="button" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" @click="sidebarOpen = false">
                    <span class="sr-only">Close sidebar</span>
                    <XIcon class="h-6 w-6 text-white" aria-hidden="true" />
                  </button>
                </div>
              </TransitionChild>
              <div class="flex-shrink-0 flex items-center px-4">
                <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-600-mark-gray-800-text.svg" alt="Workflow" />
              </div>
              <div class="mt-5 flex-1 h-0 overflow-y-auto">
                <nav class="px-2 space-y-1">
                  <a v-for="item in navigation" :key="item.name" :href="item.href" :class="[item.current ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900', 'group flex items-center px-2 py-2 text-base font-medium rounded-md']">
                    <component :is="item.icon" :class="[item.current ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500', 'mr-4 flex-shrink-0 h-6 w-6']" aria-hidden="true" />
                    {{ item.name }}
                  </a>
                </nav>
              </div>
            </DialogPanel>
          </TransitionChild>
          <div class="flex-shrink-0 w-14" aria-hidden="true">
          </div>
        </div>
      </Dialog>
    </TransitionRoot> -->

    <!-- Static sidebar for desktop -->
    <div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0">
      <!-- Sidebar component, swap this element with another sidebar if you like -->
      <div class="flex flex-col flex-grow border-r border-gray-200 pt-5 bg-white overflow-y-auto">
        <!-- <div class="flex items-center flex-shrink-0 px-4">
          <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-600-mark-gray-800-text.svg" alt="Workflow" />
        </div> -->
        <div class="relative z-10 flex items-center w-auto px-4 leading-10 lg:flex-grow-0 lg:flex-shrink-0 lg:text-left">
                <router-link to="/" class="box-border inline-block font-sans text-2xl font-bold text-left text-indigo-900 no-underline bg-transparent cursor-pointer focus:no-underline">
                    Maroc Artisan
                </router-link>
            </div>
        <div class="mt-5 flex-grow flex flex-col">
          <nav class="flex-1 px-2 pb-4 space-y-1">
            <!-- <a v-for="item in navigation" :key="item.name" :href="item.href" :class="[item.current ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md']">
              <component :is="item.icon" :class="[item.current ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500', 'mr-3 flex-shrink-0 h-6 w-6']" aria-hidden="true" />
              {{ item.name }}
            </a> -->
            <router-link v-for="item in navigation" :to="item.href" :key="item.name" :class="[item.current ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md']" >
              <!-- <a v-for="item in navigation" :key="item.name" :href="item.href" :class="[item.current ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md']"> -->
                <component :is="item.icon" :class="[item.current ? 'text-gray-500' : 'text-gray-400 group-hover:text-gray-500', 'mr-3 flex-shrink-0 h-6 w-6']" aria-hidden="true" />
                {{ item.name }}
              <!-- </a> -->
            </router-link>
          </nav>
        </div>
      </div>
    </div>
    <div class="md:pl-64 flex flex-col flex-1">
      <!-- <div class="sticky top-0 z-10 flex-shrink-0 flex h-16 bg-white shadow">
        
        <div class="flex-1 px-4 flex justify-between">
           <div class="flex-1 flex"> 
            <form class="w-full flex md:ml-0" action="#" method="GET">
              <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                  <SearchIcon class="h-5 w-5" aria-hidden="true" />
                </div>
                <input id="search-field" class="block w-full h-full pl-8 pr-3 py-2 border-transparent text-gray-900 placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-0 focus:border-transparent sm:text-sm" placeholder="Search" type="search" name="search" />
              </div>
            </form>
          </div>
          <div class="ml-4 flex items-center md:ml-6">
            <button type="button" class="bg-white p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              <BellIcon class="h-6 w-6"  />
            </button>
            
            <Menu as="div" class="ml-3 relative">
              <div>
                <MenuButton class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                </MenuButton>
              </div>
              <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                <MenuItems class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                  <MenuItem v-for="item in userNavigation" :key="item.name" >
                    <a :href="item.href" :class="'bg-gray-100' , 'block px-4 py-2 text-sm text-gray-700'">{{ item.name }}</a>
                  </MenuItem>
                </MenuItems>
              </transition>
            </Menu>
          </div>
        </div>
      </div> -->

      <main class="flex-1">
        <div class="py-6">
          <!-- <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <h1 class="text-4xl font-semibold text-gray-900">Dashboard</h1>
          </div> -->
          <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <div>
              <button @click="getsellersFct()" >
                <h3 class="text-3xl font-medium text-gray-700">ADMIN's Dashboard</h3>
              </button>
              <!-- card template main 3 -->
              <DashCard :stat1="this.sellers.length" :stat2='"hhhh"' :stat3="this.products.length" />

              <div class="mt-8"></div>

              <div class="flex flex-col mt-8">
                <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                  <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                    <table v-if="!display" class="min-w-full">
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
                          <!-- <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th> -->
                        </tr>
                      </thead>

                      <tbody class="bg-white">
                        <tr v-for="seller in this.sellers"  >

                          <!-- table row -->
                        <!-- <tr > -->
                          <td
                            class="px-6 py-4 border-b border-gray-200 whitespace-nowrap"
                          >
                            <!-- <div class="flex items-center"> -->
                              <div class="flex-shrink-0 w-10 h-10">
                                {{ seller.user_id}}
                                <!-- <img
                                  class="w-10 h-10 rounded-full"
                                  src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                  alt=""
                                /> -->
                              </div>

                                <!-- <div class="ml-4">
                                  <div class="text-sm font-medium leading-5 text-gray-900">
                                    {{ seller.name }} seller.fname
                                  </div>
                                  <div class="text-sm leading-5 text-gray-500">
                                    {{ u.email }} u.email
                                  </div>
                                </div> -->
                            <!-- </div> -->
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
                    <table v-if="display" class="min-w-full divide-y divide-gray-300 ">
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
                      <tbody class="divide-y divide-gray-200 bg-white" v-for="product in products">
                          <Store :id="product.id" :name="product.name" :price="product.price"
                              :picture="product.picture" :fname="product.fname" :lname="product.lname"
                              :category="product.c_name"   />
                      </tbody>
                        
                    </table>
                    
                    <SotreClone v-if="display"  />

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
import { ref } from 'vue'
import store from '../../store';
import { mapActions } from 'vuex';
import axios from 'axios';
import DashCard from '../../components/DashCards.vue';
import SotreClone from './StoreClone.vue';
import Store from './../../components/ProdsAdmin.vue';
import { parse } from '@babel/parser';


export default {
  name: 'Dashboard',
  components:{
    DashCard,
    SotreClone,
    Store,
  },
  data() {
    return {
      display: false,
      sellers: [],
      products: [],
      
      navigation : [
        { name: 'Dashboard', href: '/ADMIN', current: true },
        { name: 'Team', href: '/ADMIN/products', current: false },
        { name: 'Projects', href: '/#', current: false },
        { name: 'Calendar', href: '#', current: false },
        { name: 'Documents', href: '#', current: false },
        { name: 'Reports', href: '/test', current: false },
      ],
    }
  },
  methods: {
    ...mapActions([
      'getsellers',
      'getAllProducts',
      'getProductBySeller',
      'getProductsAdmin',
    ]),
    getProdBySeller() {
      this.user = JSON.parse(localStorage.getItem("user"));
      this.user_id = this.user.user_id;
      this.getProductBySeller(this.user_id).then(response => {
          this.products = store.state.s_products;
          console.log(this.products);
      })
    },

    getProdsAdmin() {
      this.getProductsAdmin().then(response => {
          this.products = store.state.products;
          console.log(this.products);
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
        // this.$parent.getProdBySeller();
        console.log(result);
        this.getsellersFct();
      },

    getsellersFct(){
      this.getsellers().then((response) => {
      this.sellers= response;
      // console.log(this.sellers.length);
    });
      
      // this.sellers = JSON.stringify(store.state.sellers);
      // console.log(JSON.parse(this.sellers).data);
      // this.variable = JSON.parse(this.sellers).data;
      // this.sellers = JSON.parse(this.sellers).data;
     
      // console.log(this.variable);
    },
    getproductsFct(){
      this.getAllProducts().then((response) => {
      this.products= response;
      // console.log(this.products.length);
      console.log(store.state.products);
      });
    },

    
  },
  mounted() {
    this.getsellersFct()
    this.getproductsFct()
    // this.getProdBySeller();
    this.getProdsAdmin();

  },

}
      </script>

<!-- // import {
//   Dialog,
//   DialogPanel,
//   Menu,
//   MenuButton,
//   MenuItem,
//   MenuItems,
//   TransitionChild,
//   TransitionRoot,
// } from '@headlessui/vue'
// import {
//   BellIcon,
//   CalendarIcon,
//   ChartBarIcon,
//   FolderIcon,
//   HomeIcon,
//   InboxIcon,
//   MenuAlt2Icon,
//   UsersIcon,
//   XIcon,
// } from '@heroicons/vue/outline'
// import { SearchIcon } from '@heroicons/vue/solid'

// const navigation = [
//   { name: 'Dashboard', href: '#', current: true },
//   { name: 'Team', href: '#', current: false },
//   { name: 'Projects', href: '#', current: false },
//   { name: 'Calendar', href: '#', current: false },
//   { name: 'Documents', href: '#', current: false },
//   { name: 'Reports', href: '#', current: false },
// ]
// const userNavigation = [
//   { name: 'Your Profile', href: '#' },
//   { name: 'Settings', href: '#' },
//   { name: 'Sign out', href: '#' },
// ]

// interface User {
//   name: string;
//   email: string;
//   title: string;
//   title2: string;
//   status: string;
//   role: string;
// }

// const User = {
//   name: "John Doe",
//   email: "john@example.com",
//   title: "Software Engineer",
//   title2: "Web dev",
//   status: "Active",
//   role: "Owner",
// };

// const users = ref<User[]>([...Array(10).keys()].map(() => testUser)); -->
