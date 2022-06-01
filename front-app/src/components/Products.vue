<template>
    <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                        
        <!-- <Product price="12.34" title="LAMPE DITIA" Pic="src\assets\lamps\lampe-dite-ditia-.jpg"/>
        <Product price="75.34" title="LAMPE GOUTTE D’EAU" Pic="src\assets\lamps\lampe-marocaine-goutte-deau3-300x300.jpg"/>
        <Product price="98.45" title="Lampe Plafonia en cuivre" Pic="src\assets\lamps\LANTERNE_1.jpg"/>
        <Product price="120.79" title="LANTERNE 6 FACES" Pic="src\assets\lamps\lanterne-6-faces-msdsa-.jpg"/>
        <Product price="98.45" title="Lampe Plafonia en cuivre" Pic="src\assets\lamps\LANTERNE_1.jpg"/> -->
        <!-- <Product price="120.79" title="LANTERNE 6 FACES" pic="carpet-vintage azilal.jpg"/> -->

        <product @click="details(product.id)" v-for="product in products" :price="product.price" :title="product.name" :pic="product.picture" />


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
import axios from 'axios';
import Product from "./Product.vue"

export default {

    name: 'Products',
    components: {
    Product
    },
    data() {
        return {
            // pict: "gerab.jpg",
            products: [
                // {
                //     id: 1,
                //     title: 'LAMPE DITIA',
                //     price: 12.34,
                //     Pic: 'lanterne-6-faces-msdsa-.jpg'
                // },
                // {
                //     id: 2,
                //     title: 'LAMPE GOUTTE D’EAU',
                //     price: 75.34,
                //     Pic: 'src\assets\lamps\lanterne-6-faces-msdsa-.jpg'
                // },
                // {
                //     id: 3,
                //     title: 'Lampe Plafonia en cuivre',
                //     price: 98.45,
                //     Pic: 'src\assets\lamps\LANTERNE_1.jpg'
                // },
                ]
        }
    },
    methods: {
        async getProduct(){

            let result = await axios.get(
                "http://localhost/MAROC_ARTISANAT/back-app/getproducts",
                
            );
            
            this.products = result.data;
            console.log(result.data);
        },
        // details(id){
        //     console.log(id);
        // },

        details(id){
            this.$router.push({
                name: 'ProductDetails',
                props: {
                    // id: this.product.id
                    id: id
                },
                params: {
                    id: id
                }
            })
        },
    },
    mounted() {
        this.getProduct();
    },
}
</script>