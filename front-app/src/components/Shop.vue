
<template>
    <!-- component -->
    <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 py-8 mx-auto">
            <div class="lg:flex lg:-mx-2">
                <div class="space-y-3 lg:w-1/5 lg:px-2 lg:space-y-4">
                    <router-link to="/shop">
                        <a @click="all()" class="block font-medium text-blue-500 dark:text-gray-300 hover:cursor-pointer hover:underline my-4">All</a>
                    </router-link>
                    <router-link to="/shop/carpets" >
                        <a @click="test('carpets')" class="block font-medium text-gray-500 dark:text-gray-300 hover:cursor-pointer hover:underline my-4">Carpets</a>
                    </router-link>
                    <router-link to="/shop/Pottery" >
                        <a @click="test('Pottery')" class="block font-medium text-gray-500 dark:text-gray-300 hover:cursor-pointer hover:underline my-4">Ceramics & Pottery</a>
                    </router-link>
                    <router-link to="/shop/Copperware" >
                        <a @click="test('Copperware')" class="block font-medium text-gray-500 dark:text-gray-300 hover:cursor-pointer hover:underline my-4">Copperware</a>
                    </router-link>
                    <router-link to="/shop/Leather" >
                        <a @click="test('Leather')" class="block font-medium text-gray-500 dark:text-gray-300 hover:cursor-pointer hover:underline my-4">Leather</a>
                    </router-link>
                    <router-link to="/shop/Basketry" >
                        <a @click="test('Basketry')" class="block font-medium text-gray-500 dark:text-gray-300 hover:cursor-pointer hover:underline my-4">Basketry</a>
                    </router-link>
                    <router-link to="/shop/Lamps" >
                        <a @click="test('Lamps')" class="block font-medium text-gray-500 dark:text-gray-300 hover:cursor-pointer hover:underline my-4">Lamps</a>
                    </router-link>
                    <!-- <a @click="getByCat(1)"  class="block font-medium text-gray-500 dark:text-gray-300 hover:cursor-pointer hover:underline">Carpets</a> -->
                    <!-- <a @click="getByCat(2)" class="block font-medium text-gray-500 dark:text-gray-300 hover:cursor-pointer hover:underline">Ceramics & Pottery</a> -->
                    <!-- <router-link to="1"><p @click="carpet()"> test</p></router-link><br>
                    <router-link to="4">Folololo</router-link> -->
                    <!-- <a @click="getByCat(4)" class="block font-medium text-gray-600 dark:text-gray-300 hover:cursor-pointer hover:underline">Copperware</a> -->
                    <!-- <a @click="getByCat(5)" class="block font-medium text-gray-500 dark:text-gray-300 hover:cursor-pointer hover:underline">Leather</a> -->
                    <!-- <router-link to="carpets" >
                        <a @click="test()" class="block font-medium text-gray-500 dark:text-gray-300 hover:cursor-pointer hover:underline">Basketry</a>
                    </router-link> -->
                    <!-- <a @click="getByCat(6)" class="block font-medium text-gray-500 dark:text-gray-300 hover:cursor-pointer hover:underline">Lamps</a> -->
                    <!-- <a href="#" class="block font-medium text-gray-500 dark:text-gray-300 hover:underline">Trousers</a>
                    <a href="#" class="block font-medium text-gray-500 dark:text-gray-300 hover:underline">Shorts</a>
                    <a href="#" class="block font-medium text-gray-500 dark:text-gray-300 hover:underline">Underwear</a> -->
                </div>

                <div class="mt-6 lg:mt-0 lg:px-2 lg:w-4/5 ">
                    <div class="flex items-center justify-between text-sm tracking-widest uppercase ">
                        <p class="text-gray-500 dark:text-gray-300">{{products.length}} Items</p>
                        <div class="flex items-center">
                            <p class="text-gray-500 dark:text-gray-300">Sort</p>
                            <select @change="sortBy($event)" class="font-medium text-gray-700 bg-transparent dark:text-gray-500 focus:outline-none">
                                <option value="1">Price ascending</option>
                                <option value="2">Price descending </option>
                                <option value="3">Newest</option>
                                <option value="4">Oldest</option>
                                <option value="5">Name</option>
                            </select>
                        </div>
                    </div>

                    <!-- <Products /> -->

                    <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                        <product @click="details(product.id) " v-for="product in products" :price="product.price" :title="product.name" :pic="product.picture" />
                        
                            <!-- <Product price="12.34" title="LAMPE DITIA" Pic="src\assets\lamps\lampe-dite-ditia-.jpg"/>
                            <Product price="75.34" title="LAMPE GOUTTE D’EAU" Pic="src\assets\lamps\lampe-marocaine-goutte-deau3-300x300.jpg"/>
                            <Product price="98.45" title="Lampe Plafonia en cuivre" Pic="src\assets\lamps\LANTERNE_1.jpg"/>
                            <Product price="120.79" title="LANTERNE 6 FACES" Pic="src\assets\lamps\lanterne-6-faces-msdsa-.jpg"/>
                            <Product price="98.45" title="Lampe Plafonia en cuivre" Pic="src\assets\lamps\LANTERNE_1.jpg"/>
                            <Product price="120.79" title="LANTERNE 6 FACES" Pic="src\assets\lamps\lanterne-6-faces-msdsa-.jpg"/> -->
                    <!-- <template slot="p_pic">
                                    
                                    <img class="object-cover w-full rounded-md h-72 xl:h-80" src="src\assets\gerab.jpg" alt="T-Shirt">
                                </template>
                                <template slot="p_name">
                                    <span class="text-gray-700 dark:text-gray-500">T-Shirt</span>
                                </template>
                                <template slot="price">
                                    <span class="text-gray-700 dark:text-gray-500">$20</span>
                                </template>
                            </Product> -->
                    <!-- <div class="flex flex-col items-center justify-center w-full max-w-lg mx-auto">
                            <img class="object-cover w-full rounded-md h-72 xl:h-80" src="https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=634&q=80" alt="T-Shirt">
                            <h4 class="mt-2 text-lg font-medium text-gray-700 dark:text-gray-200">Printed T-shirt</h4>
                            <p class="text-blue-500">$12.55</p>

                            <button class="flex items-center justify-center w-full px-2 py-2 mt-4 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mx-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                                </svg>
                                <span class="mx-1">Add to cart</span>
                            </button>
                        </div>

                        <div class="flex flex-col items-center justify-center w-full max-w-lg mx-auto">
                            <img class="object-cover w-full rounded-md h-72 xl:h-80" src="https://images.unsplash.com/photo-1620799139507-2a76f79a2f4d?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=966&q=80" alt="T-Shirt">
                            <h4 class="mt-2 text-lg font-medium text-gray-700 dark:text-gray-200"> Slub jersey T-shirt</h4>
                            <p class="text-blue-500">$18.70</p>

                            <button class="flex items-center justify-center w-full px-2 py-2 mt-4 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mx-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                                </svg>
                                <span class="mx-1">Add to cart</span>
                            </button>
                        </div>

                        <div class="flex flex-col items-center justify-center w-full max-w-lg mx-auto">
                            <img class="object-cover w-full rounded-md h-72 xl:h-80" src="https://images.unsplash.com/photo-1603320409990-02d834987237?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="T-Shirt">
                            <h4 class="mt-2 text-lg font-medium text-gray-700 dark:text-gray-200">T-shirt with a motif</h4>
                            <p class="text-blue-500">$16.55</p>

                            <button class="flex items-center justify-center w-full px-2 py-2 mt-4 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mx-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                                </svg>
                                <span class="mx-1">Add to cart</span>
                            </button>
                        </div>

                        <div class="flex flex-col items-center justify-center w-full max-w-lg mx-auto">
                            <img class="object-cover w-full rounded-md h-72 xl:h-80" src="https://images.unsplash.com/photo-1603320410149-db26b12d5c2b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=634&q=80" alt="T-Shirt">
                            <h4 class="mt-2 text-lg font-medium text-gray-700 dark:text-gray-200">Art T-shirt</h4>
                            <p class="text-blue-500">$12.55</p>

                            <button class="flex items-center justify-center w-full px-2 py-2 mt-4 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mx-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                                </svg>
                                <span class="mx-1">Add to cart</span>
                            </button>
                        </div> -->
                    <!-- <div class="flex flex-col items-center justify-center w-full max-w-lg mx-auto">
                            <slot name="p_pic"></slot>
                            <img class="object-cover w-full rounded-md h-72 xl:h-80" src="https://images.unsplash.com/photo-1603320410149-db26b12d5c2b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=634&q=80" alt="T-Shirt">
                            <h4 class="mt-2 text-lg font-medium text-gray-700 dark:text-gray-200"><slot name="p_name"></slot></h4>
                            <p class="text-blue-500"><slot name="price"></slot></p>

                            <button class="flex items-center justify-center w-full px-2 py-2 mt-4 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mx-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                                </svg>
                                <span class="mx-1">Add to cart</span>
                            </button>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import Product from "./Product.vue"
    import Products from "./Products.vue"
    import store from "../store/index"
    import { mapActions } from 'vuex';
    import router from "../router";
    
    export default {
        name: 'Shop',
        data() {
            return {
                products: [],
            }
        },
        components: {
            Product,
            Products,
        },
        methods: {
            sortBy(event) {
                switch(event.target.value) {
                    case '1':
                         this.products.sort((a, b) => (a.price > b.price) ? 1 : -1)
                        break;
                    case '2':
                        this.products.sort((a, b) => (a.price < b.price) ? 1 : -1)
                        break;
                    case '3':
                        this.products.sort((a, b) => (a.id > b.id) ? 1 : -1)
                        break;
                    case '4':
                        this.products.sort((a, b) => (a.id < b.id) ? 1 : -1)
                        break;
                    case '5':
                        this.products.sort((a, b) => (a.name > b.name) ? 1 : -1)
                        break;
                    default:
                        break;
                }
            },
            getByCat(id) {
                // store.commit ="0";
                this.getProductByCategory(id).then(result => {
                    this.products = store.state.products;  
                })
            },
            carpet() {
                // store.commit ="0";
                this.getProductByCategory(1).then(result => {
                    this.products = store.state.products;  
                })
            },
            test(name){
                this.getProductByCategoryName(name).then(result => {
                    this.products = store.state.products;  
                })
            },
            basketry(){
                store.commit ="0";
                this.getProductByCategory(7).then(result => {
                    this.products = store.state.products;
                    
                })
            },
            all() {
                this.getAllProducts().then(result => {
    
                this.products = store.state.products;
                console.log(this.products);
                // return store.state.products;
            })  
            },
            details(id){
                this.$router.push({
                    name: 'ProductDetails',
                    params: {
                        id: id
                    }
                })
            },
            ...mapActions([
                'getAllProducts',
                'getProductByCategory',
                'getProductByCategoryName'
            ]),   
            // Category(id){
            //     this.getProductByCategory(id).then(result => {
            //         this.products = store.state.products;
            //         router.push({
            //             name: 'shop',
                        
            //         })
            //     })
            // },   
        },

        mounted() {
            // this.all();
            // console.log(this.$route.params.category)
            if(this.$route.params.category){
                // console.log("kin")
                
                this.test(this.$route.params.category);
            }else
            {
                this.all();
                // console.log("makinsh")

            }

            // this.all();
        },
        
    }

</script>