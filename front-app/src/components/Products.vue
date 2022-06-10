<template>
    <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

        <product @click="conso() " v-for="product in products" :price="product.price" :title="product.name" :pic="product.picture" />

        <!-- <div class="flex flex-col items-center justify-center w-full max-w-lg mx-auto" v-for="pr in products" :key="pr.id">
            <router-link :to="'/ProductDetails/'+pr.id"> 
                <img :src='"src/assets/"+pr.picture' class="object-cover w-full rounded-md h-72 xl:h-80" alt="">
                <h4 class="mt-2 text-lg font-medium text-gray-700 dark:text-gray-200">{{ pr.title}}</h4>
                <p class="text-blue-500">${{pr.price}}</p>

                <button class="flex items-center justify-center w-full px-2 py-2 mt-4 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mx-1" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                    </svg>
                    <span class="mx-1">Add to cart</span>
                </button>
            </router-link>
        </div> -->
    </div>
</template>


<script>
import store from '../store/index';
import Product from "./Product.vue"
import { mapActions } from 'vuex';
import router from "../router";


export default {

    name: 'Products',
    components: {
    Product
    },
    data() {
        return {
            category: this.$route.params.category,
            products:"",
        }
    },
    methods: {
        conso(){
                console.log(this.category);
                // console.log(store.state.products);
            },
        ...mapActions([
            'getAllProducts',
            'getProductByCategory',
        ]),


        details(id){
            this.$router.push({
                name: 'ProductDetails',
                
                params: {
                    id: id
                }
            })
        },
    },
    mounted() {
        console.log(store.state.products);
        

            store.state.category_id = this.$route.params.category,
            this.getProductByCategory(store.state.category_id).then(result => {
                console.log(store.state.category_id);
    
                this.products = store.state.products;
                // return store.state.products;
    
            })
        // }
    },
}
</script>