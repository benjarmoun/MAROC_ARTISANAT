<template>
    <div>
        <div class="max-w-2xl mx-auto bg-white p-16">
            <form @submit="addProduct" >
                <div class="mb-6">
                    <label for="title"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Title</label>
                    <input v-model="title" type="text" id="title"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="john.doe@company.com" required>
                </div>
                <div class="mb-6">
                    <label for="description"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Description</label>
                    <input v-model="description" type="text" id="description"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="john.doe@company.com" required>
                </div>
                <div class="mb-6">
                    <label for="price"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Price</label>
                    <input v-model="price" type="text" id="price"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="john.doe@company.com" required>
                </div>
                <div class="mb-6">
                    <label for="category"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Category</label>
                    <select v-model="category" name="category" id="category"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="john.doe@company.com" required>
                        <option disabled selected value="">Select a category</option>
                        <option value="1">Category 1</option>
                        <option value="2">Category 2</option>
                        <option value="3">Category 3</option>
                        <option value="4">Category 4</option>
                        <option value="5">Category 5</option>
                        <option value="6">Category 6</option>
                        <option value="7">Category 7</option>
                        <option value="8">Category 8</option>

                    </select>
                </div>
                <div class="mb-6">
                    <label for="picture"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Picture</label>
                    <input v-bind="picture" type="file" @change="getpic" name="picture"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="john.doe@company.com" required />
                </div>
                
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Post</button>
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
            // data: {
            //     title: '',
            //     description: '',
            //     price: '',
            //     category: '',
            //     picture: ''
            // }
        }
    },
    methods: {

        // async  addProduct() {
        //     var myHeaders = new Headers();
        //     myHeaders.append("Content-Type", "application/json");
        //     myHeaders.append("Cookie", "PHPSESSID=3g9jd4qq8p2vu4lanl28ben59s");

        //     var raw = JSON.stringify({
        //         "seller_id": "1",
        //         "category_id": this.category,
        //         "name": this.title,
        //         "price": this.price,
        //         "description": this.description,
        //         "picture": this.picture.name
        //     });
        //     // console.log(raw);

        //     var requestOptions = {
        //         method: 'POST',
        //         headers: myHeaders,
        //         body: raw,
        //         redirect: 'follow'
        //     };
        //     // console.log(requestOptions);
            
        //         console.log(raw);
        //         await fetch("http://localhost/MAROC_ARTISANAT/back-app/addProduct", requestOptions)
        //             .then(response => response.json())
        //             .then(result => console.log(result))
        //             .catch(error => console.log('error', error));
            
        // },

        async addProduct(ev){
            ev.preventDefault();    
            console.log("test")
            let result = await axios.post(
                "http://localhost/MAROC_ARTISANAT/back-app/addProduct",
                {
                    seller_id: "1",
                    category_id: this.category,
                    name: this.title,
                    price: this.price,
                    description: this.description,
                    picture: this.picture.name
                }
            );
            console.log(result);
        },

        getpic(e) { 
            this.picture = e.target.files[0];
        }
    },

}
</script>
<style>
</style>