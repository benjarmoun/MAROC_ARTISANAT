
<template> 
    <div class="flex flex-col items-center justify-center w-full max-w-lg mx-auto cursor-pointer hover:shadow-2xl">
        <div class="border rounded-md w-full flex flex-col items-center justify-center">
            <img :src='"../src/assets/"+this.pic' class="object-cover w-full  object-scale-down rounded-xl h-72 xl:h-80">
            <h4 class="mt-2 text-lg font-medium text-gray-700 dark:text-gray-200">{{title}}</h4>
            <p class="text-blue-500">${{price}}</p>
        </div>
        <button class="flex items-center justify-center w-full px-2 py-2 mt-4 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">
            <span class="mx-1">Product Details</span>
        </button>
    </div>
</template>
<script>
export default {
    name: 'Product',
    props: {
        pic: String,
        price:  Number,
        title: String,
    },
}
</script>

