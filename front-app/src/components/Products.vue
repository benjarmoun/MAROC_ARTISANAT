<script>
import Product from "./Product.vue"

export default {
    name: 'Products',
    components: {
    Product
}
}
</script>

<template>
    <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                        
        <Product price="12.34" title="LAMPE DITIA" Pic="src\assets\lamps\lampe-dite-ditia-.jpg"/>
        <Product price="75.34" title="LAMPE GOUTTE D’EAU" Pic="src\assets\lamps\lampe-marocaine-goutte-deau3-300x300.jpg"/>
        <Product price="98.45" title="Lampe Plafonia en cuivre" Pic="src\assets\lamps\LANTERNE_1.jpg"/>
        <Product price="120.79" title="LANTERNE 6 FACES" Pic="src\assets\lamps\lanterne-6-faces-msdsa-.jpg"/>
        <Product price="98.45" title="Lampe Plafonia en cuivre" Pic="src\assets\lamps\LANTERNE_1.jpg"/>
        <Product price="120.79" title="LANTERNE 6 FACES" Pic="src\assets\lamps\lanterne-6-faces-msdsa-.jpg"/>

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
    </div>
</template>