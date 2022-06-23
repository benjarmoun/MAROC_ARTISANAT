<template>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center my-6 mx-8">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">My Products</h1>
                <p class="mt-2 text-sm text-gray-700">A list of all the product that you have listed in your account
                    including their title,<br> description, and price.</p>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <router-link to="/AddProduct">
                    <button type="button" 
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                        Add a product</button>
                </router-link>
            </div>
        </div>
            <!-- <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg mx-6">
                 <div class="py-3 px-5 mb-4 bg-purple-100 text-purple-900 text-sm rounded-md border border-purple-200" role="alert">
                A simple <strong>info</strong> alert—check it out!
            </div> -->
        <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg mx-6">
                        <table class="min-w-full divide-y divide-gray-300 ">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                        Picture</th>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                        Name</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Description</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        Category</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        price</th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span>Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white" v-for="product in products">
                                <Store :id="product.id" :name="product.name" :price="product.price"
                                    :picture="product.picture" :description="product.description"
                                    :category_id="categs.find(categ => categ.id == product.category_id).name ? categs.find(categ => categ.id == product.category_id).name : 'No category'" />
                            </tbody>
                            <!-- <Store v-for="product in products" :id="product.id" :name="product.name" :price="product.price" :picture="product.picture" :description="product.description" 
                :category_id="this.categs.find(categ => categ == product.category_id ? categ.id: 'no catge')" /> -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</template>

<script >

// import store from '../store';
import store from "../store/index"
import { mapActions } from 'vuex';
import Store from '../components/Store.vue';
export default {
    name: 'StoreView',
    components: {
        Store,
    },
    data() {
        return {
            products: [],
            seller_id: '',
            user: '',
            user_id: '',
            categName: '',
            categs: [
                {
                    id: 2,
                    name: 'Pottery'
                },
                {
                    id: 7,
                    name: 'Basketry'
                },
                // {
                //     id: 3,
                //     name: 'Books'
                // },
                {
                    id: 4,
                    name: 'Copperware'
                },
                {
                    id: 5,
                    name: 'Leather'
                },
                {
                    id: 6,
                    name: 'Lamps'
                },
                {
                    id: 1,
                    name: 'Carepts'
                }
            ],
        }
    },
    methods: {
        ...mapActions([
            'getProductBySeller',
        ]),
        getProdBySeller() {
            // this.seller_id ,
            this.user = JSON.parse(localStorage.getItem("user"));
            this.user_id = this.user.user_id;
            this.getProductBySeller(this.user_id).then(response => {
                this.products = store.state.s_products;
                console.log(this.products);
            })

        },
        getUserId() {
            this.user = JSON.parse(localStorage.getItem("user"));
            this.user_id = this.user.user_id;
            console.log(this.user_id);
        },
    },
    mounted() {
        this.getProdBySeller();
        this.categName = this.categs.find(categ => categ.id == this.category_id ? categ.name : 'no catge');
    },

}

</script>



