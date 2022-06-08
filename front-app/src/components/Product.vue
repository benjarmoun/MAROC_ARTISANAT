
<template> 
    <div class="flex flex-col items-center justify-center w-full max-w-lg mx-auto cursor-pointer hover:shadow-2xl">
        <img :src='"../src/assets/"+this.pic' class="object-cover w-full rounded-md h-72 xl:h-80">
        <h4 class="mt-2 text-lg font-medium text-gray-700 dark:text-gray-200">{{title}}</h4>
        <p class="text-blue-500">${{price}}</p>
        <button class="flex items-center justify-center w-full px-2 py-2 mt-4 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mx-1" viewBox="0 0 20 20" fill="currentColor">
                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
            </svg>
            <span class="mx-1">Add to cart</span>
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
    methods: {
        
    },
    data() {
        return {
            piiic: "basket-chapeau-5.jpg",
           picture: "gerab.jpg",
        }
    },
    mounted() {
       
    },
}
</script>

