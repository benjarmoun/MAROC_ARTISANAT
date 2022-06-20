
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
                    <!-- <router-link to="/shop/Lamps" >
                        <a @click="test('Lamps')" class="block font-medium text-gray-500 dark:text-gray-300 hover:cursor-pointer hover:underline my-4">Lamps</a>
                    </router-link> -->
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
                        <product @click="details(product.id)" v-for="product in products" :price="product.price" :title="product.name" :pic="product.picture"/>
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
            // getByCat(id) {
            //     // store.commit ="0";
            //     this.getProductByCategory(id).then(result => {
            //         this.products = store.state.products;  
            //     })
            // },
            // carpet() {
            //     // store.commit ="0";
            //     this.getProductByCategory(1).then(result => {
            //         this.products = store.state.products;  
            //     })
            // },
            test(name){
                this.getProductByCategoryName(name).then(result => {
                    this.products = store.state.products;  
                })
            },
           
            all() {
                this.getAllProducts().then(result => {
    
                this.products = store.state.products;
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
             
        },

        mounted() {
            // this.all();
            // console.log(this.$route.params.category)
            if(this.$route.params.category){
                this.test(this.$route.params.category);
            }else
            {
                this.all();
            }

        },
        
    }

</script>