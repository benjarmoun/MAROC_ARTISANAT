<template>
    <!-- <div class="px-4 sm:px-6 lg:px-8"> -->
        
        
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
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
                            
                        </table>
                    
    </div>


</template>

<script >

import store from './../../store'
// import Store from "../store/index"
import { mapActions } from 'vuex';  
import Store from './../../components/Store.vue';
export default {
    name: 'StoreClone',
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



