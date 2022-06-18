<template>
    <div>
        <div class="max-w-2xl mx-auto bg-white p-16">
            <form @submit="UpdateProduct " >
                <div class="mb-6">
                    <label for="title"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Title</label>
                    <input v-model="title" type="text" id="title"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Title" required>
                </div>
                <div class="mb-6">
                    <label for="description"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Description</label>
                    <input v-model="description" type="text" id="description"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Description" required>
                </div>
                <div class="mb-6">
                    <label for="price"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Price</label>
                    <input v-model="price" type="text" id="price"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Price" required>
                </div>
                <div class="mb-6">
                    <label for="category"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Category</label>
                    <select v-model="category" name="category" id="category"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                         required>
                        <option disabled selected value="">Select a category</option>
                        <option value="1">Carpets</option>
                        <option value="2">Pottery</option>
                        <option value="3">Copperware</option>
                        <option value="4">Leather</option>
                        <option value="5">Lamps</option>
                        <option value="6">Basketry</option>
                        <option value="7">Ceramics and Pottery</option>
                        <!-- <option value="8">Category 8</option> -->

                    </select>
                </div>
                <!-- <div class="mb-6">
                    <label for="picture"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Picture</label>
                    <input v-bind="picture" type="file" @change="getpic" name="picture"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="john.doe@company.com" required />
                </div> -->

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700"> Picture </label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48"
                                aria-hidden="true">
                                <path
                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="file-upload"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="file-upload" name="file-upload" v-bind="picture" type="file" @change="getpic" class="sr-only" />
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                        </div>
                    </div>
                </div>
                
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
            </form>
        </div>
    </div>
    
</template>
<script>
    import axios from 'axios';


export default {
    data() {
        return {
            seller_id: '',  
            title: '',
            description: '',
            price: '',
            category: '',
            picture: '',
            id: '',
        }
    },
    methods: {

        async UpdateProduct(ev){
            ev.preventDefault();
            this.id = this.$route.params.id;
            console.log(this.id);
            var data = JSON.stringify( {
                    seller_id: this.seller_id,
                    category_id: this.category,
                    name: this.title,
                    price: this.price,
                    description: this.description,
                    picture: this.picture.name
                });
            console.log(data);
            let result = await axios.put(
                "http://localhost/MAROC_ARTISANAT/back-app/updateProduct/" + this.id, data
            );
            // console.log(seller_id);
            console.log(result);
        },

        getpic(e) { 
            this.picture = e.target.files[0];
        }
    },
    mounted() {
        this.seller_id = JSON.parse(localStorage.getItem('user')).user_id;
        // console.log(this.seller_id);
    },

}
</script>
<style>
</style>