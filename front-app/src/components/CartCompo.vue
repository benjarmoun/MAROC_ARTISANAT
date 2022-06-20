<template>
    <!-- component -->
    <div class="flex items-center justify-center py-2 mx-8">
       
        <div class="w-full  z-10 right-0 h-full  transform translate-x-0 transition ease-in-out duration-700"
            id="checkout">
            <div class="flex  lg:flex-row flex-col" id="cart">
                <div class=" w-full lg:px-8 lg:py-1 md:px-6 px-4 md:py-0 py-4 bg-white dark:bg-gray-800 overflow-y-hidden overflow-x-hidden "
                    id="scroll">
                    <p class="lg:text-4xl text-3xl font-black leading-10 text-gray-800 dark:text-white py-3">Bag</p>
                    <div v-if="this.cart.length == 0" class="py-3 px-5 m-5 bg-red-100 text-red-900 text-sm rounded-md border border-red-200" role="alert">
                        Your cart is <strong>EMPTY</strong>! SHOP NOW!
                    </div>
                    <!-- cart compo -->
                    <div  v-for="product in this.cart" class="md:flex items-strech my-5 py-8 md:py-10 lg:py-0 border-t border-gray-50">
                        <div class="md:w-3/12 2xl:w-1/4 w-32  h-32 ">
                                
                            <img :src='"src/assets/"+product.picture'
                                class="h-full object-center object-cover m-auto md:block hidden"  />
                        </div>
                        <div class="md:pl-3 md:w-8/12 2xl:w-3/4 flex flex-col justify-center">
                            <div class="flex items-center justify-between w-full pt-1">
                                <p class="text-base font-black leading-none text-gray-800 dark:text-white">{{product.name}}</p>
                            </div>
                            <p class="text-xs leading-3 text-gray-600 dark:text-white pt-2">{{product.description}} </p>
                            <p class="w-96 text-xs mt-3 leading-3 text-gray-600 dark:text-white">Category: {{product.category}}</p>
                            <div class="flex items-center justify-between pt-5">
                                <div class="flex itemms-center">
                                    <a href="#" @click="removeFromCart(product)" class="text-xs leading-3 underline text-red-500 pl-5 cursor-pointer">Remove</a>
                                    
                                </div>
                                <p class="text-base font-black leading-none text-gray-800 dark:text-white">${{product.price}}</p>
                            </div>
                        </div>
                    </div>

                   
                </div>

                <!-- SUMMARY -->
                <div class="lg:w-96 md:w-8/12 w-full bg-gray-100 dark:bg-gray-900 h-full">
                    <div class="flex flex-col h-auto lg:px-8 md:px-7 px-4 lg:py-10 md:py-10 py-6 ">
                        <div>
                            <p class="lg:text-4xl text-3xl font-black leading-9 text-gray-800 dark:text-white">Summary
                            </p>
                            <!-- SUMMARY PRODUCT NAME AND PRICE -->
                            <div v-if="this.cart.length != 0" v-for="product in this.cart" class="flex items-center justify-between pt-10">
                              <p class="text-base leading-none text-gray-800 dark:text-white">- {{product.name}}</p>
                              <p class="text-base leading-none text-gray-800 dark:text-white">${{product.price}}</p>
                            </div>
                            <div class="flex items-center justify-between pt-5">
                                <p class="text-base leading-none text-gray-800 dark:text-white"></p>
                            </div>
                            <div class="flex items-center justify-between pt-5">
                                <p class="text-base leading-none text-gray-800 dark:text-white"></p>
                            </div>
                        </div>
                        <div>
                            <div class="flex items-center pb-6 justify-between lg:pt-5 pt-20">
                                <p class="text-2xl leading-normal text-gray-800 dark:text-white">Total</p>
                                <p class="text-2xl font-bold leading-normal text-right text-gray-800 dark:text-white">
                                    {{Tprice}}</p>
                            </div>
                            <button onclick="checkoutHandler1(true)"
                                class="text-base leading-none w-full py-5 bg-gray-800 border-gray-800 border focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 text-white dark:hover:bg-gray-700">
                                Checkout
                              </button>
                              <!-- <button @click="insertOrder" >
                                botona <br>
                              </button>
                              <button class="m-3" @click="clearCart" >
                                botona clearCart
                              </button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
// import createStore from '@\stores\counter.js'
import store from '../store'
export default {
    data() {
        return {
            Tprice: 0,
            cart: [],
          
        }
    },

    methods: {
      removeFromCart(product){
        var existingProducts = JSON.parse(localStorage.getItem("allProducts"));
        if(existingProducts == null) existingProducts = [];
        var pro = existingProducts.findIndex(el => {return  String(product.id) == el.id});
        if(pro != -1){
          //remove product from array
          existingProducts.splice(pro, 1);
        console.log(existingProducts);

        localStorage.setItem("allProducts", JSON.stringify(existingProducts));
        
        this.cart = JSON.parse(localStorage.getItem('allProducts'));
        this.calculateTotal();

        
        }
      },
      async email(){
            // ev.preventDefault();
            var user = JSON.parse(localStorage.getItem("user"));
            let result = await axios.post(
                'http://localhost/MAROC_ARTISANAT/back-app/sendEmail',
                {
                    user_id: this.seller_id,
                    category_id: this.category,
                    name: this.title,
                    price: this.price,
                    description: this.description,
                    picture: this.picture.name
                }
            );
            console.log(result);
            if(result.data.success){
                alert('Error');
                }else{
                alert('Product added successfully');
                this.$router.push('/mystore');
            }
        },
      clearCart(){
        // localStorage.removeItem('allProducts');

        this.cart = [];
        localStorage.setItem("allProducts", JSON.stringify(this.cart));
        this.calculateTotal();
        console.log(JSON.parse(localStorage.getItem('allProducts')));

      },
      calculateTotal() {
          this.Tprice = 0;
          if(JSON.parse(localStorage.getItem('allProducts')).length != 0){
          this.cart.forEach(item => {
              this.Tprice += item.price;
          });
          }
      },
      insertOrder() {
        let order = [];
        if(JSON.parse(localStorage.getItem('allProducts')).length != 0){
          this.cart.forEach(item => {
            order.push({item: item.id, sold: item.sold++});
          });
          console.log(order);
        }
      }
    },
    mounted() {
        this.cart = [];
        this.cart = JSON.parse(localStorage.getItem('allProducts'));
        //get product from local storage
        // this.cart = JSON.parse(localStorage.getItem('cart')) || [];
        //calculate total
        this.calculateTotal();
    },

}
</script>
