<template>
    <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                        
        <!-- <Product price="12.34" title="LAMPE DITIA" Pic="src\assets\lamps\lampe-dite-ditia-.jpg"/>
        <Product price="75.34" title="LAMPE GOUTTE D’EAU" Pic="src\assets\lamps\lampe-marocaine-goutte-deau3-300x300.jpg"/>
        <Product price="98.45" title="Lampe Plafonia en cuivre" Pic="src\assets\lamps\LANTERNE_1.jpg"/>
        <Product price="120.79" title="LANTERNE 6 FACES" Pic="src\assets\lamps\lanterne-6-faces-msdsa-.jpg"/>
        <Product price="98.45" title="Lampe Plafonia en cuivre" Pic="src\assets\lamps\LANTERNE_1.jpg"/> -->
        <!-- <Product price="120.79" title="LANTERNE 6 FACES" pic="carpet-vintage azilal.jpg"/> -->
        <product v-for="product in products" :price="product.price" :title="product.name" :pic="product.picture" />

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
            pict: "gerab.jpg",
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
    },
    mounted() {
        this.getProduct();
    },
}
</script>