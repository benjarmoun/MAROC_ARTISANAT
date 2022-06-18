
<template>
    <div>
        <section
            class="sticky top-0 z-20 flex-shrink-0 flex box-border relative block w-full py-8 leading-10 text-center text-indigo-900 bg-white md:py-3">
            <div class="w-full px-4 mx-auto leading-10 text-center md:px-4 lg:px-6 max-w-7xl">
                <div
                    class="box-border flex flex-col flex-wrap items-center justify-between text-indigo-900 md:flex-row">
                    <div
                        class="relative z-10 flex items-center w-auto px-4 leading-10 lg:flex-grow-0 lg:flex-shrink-0 lg:text-left">
                        <router-link to="/"
                            class="box-border inline-block font-sans text-2xl font-bold text-left text-indigo-900 no-underline bg-transparent cursor-pointer focus:no-underline">
                            Maroc Artisan
                        </router-link>
                    </div>
                    <div
                        class="relative left-0 z-0 flex justify-center w-full px-4 mt-4 space-x-6 font-medium leading-10 md:mt-0 md:absolute lg:space-x-8 md:flex-grow-0 md:text-left lg:text-center">
                        <router-link to="/"
                            class="box-border inline-block text-center text-indigo-900 no-underline bg-transparent cursor-pointer hover:text-blue-700 focus:no-underline">
                            Home
                        </router-link>
                        <router-link to="/shop"
                            class="box-border inline-block text-center text-indigo-900 no-underline bg-transparent cursor-pointer hover:text-blue-700 focus:no-underline">
                            Shop
                        </router-link>
                        <router-link to="/mystore"
                            class="box-border inline-block text-center text-indigo-900 no-underline bg-transparent cursor-pointer hover:text-blue-700 focus:no-underline">
                            My Store
                        </router-link>
                        <router-link to="/about"
                            class="box-border inline-block text-center text-indigo-900 no-underline bg-transparent cursor-pointer hover:text-blue-700 focus:no-underline">
                            About
                        </router-link>
                    </div>
                    <div
                        class="relative px-4 mt-2 font-medium  leading-10 md:flex-grow-0 md:flex-shrink-0 md:mt-0 md:text-right lg:flex-grow-0 lg:flex-shrink-0">
                        <router-link v-if="!isLoggedIn" to="/login"
                            class="box-border inline-block mx-5 text-right text-indigo-900 no-underline bg-transparent cursor-pointer hover:text-blue-700 focus:no-underline">
                            Login
                        </router-link>
                        <router-link v-if="!isLoggedIn" to="/register"
                            class="box-border inline-flex items-center h-10 px-4 text-base text-center text-indigo-900 no-underline align-middle bg-transparent border border-gray-300 rounded cursor-pointer select-none hover:bg-gray-50 hover:text-blue-700 focus:shadow-xs focus:no-underline">
                            Sign Up
                        </router-link>
                        <router-link v-if="isLoggedIn" to="/login" @click="logout()"
                            class="box-border inline-flex items-center h-10 px-4 text-base text-center text-indigo-900 no-underline align-middle bg-transparent rounded cursor-pointer select-none hover:bg-gray-50 hover:text-blue-700 focus:shadow-xs focus:no-underline">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="bevel">
                                <path d="M10 3H6a2 2 0 0 0-2 2v14c0 1.1.9 2 2 2h4M16 17l5-5-5-5M19.8 12H9" />
                            </svg>
                        </router-link>

                        <router-link to="/cart"
                            class="box-border inline-flex items-center h-10 px-4 text-base text-center text-indigo-900 no-underline align-middle bg-transparent rounded cursor-pointer select-none hover:bg-gray-50 hover:text-blue-700 focus:shadow-xs focus:no-underline">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mx-1" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path
                                    d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                            </svg>
                        </router-link>
                    </div>
                </div>
            </div>
        </section>

        <RouterView />
        <FooterVue />
    </div>
</template>


<script>
    import { RouterLink } from 'vue-router'
    import { mapActions } from 'vuex';
    import store from '../store/index.js';
    import FooterVue from './Footer.vue';

    export default {
        name: 'Header',
        components: {
            RouterLink,
            FooterVue
        },
        data() {
            return {
                isLoggedIn: "",
            }
        },
        methods: {
            ...mapActions([
                // 'IsLogged',
            ]),
            fUpdate() {
                this.$forceUpdate();
            },
            logout() {
                localStorage.removeItem("user");
                // this.$router.push({
                //     name: 'Login'
                // })
                this.IsLogged();
                this.$forceUpdate();
            },
            IsLogged(){
                this.isLoggedIn = localStorage.getItem("user") == null ? false : true;
                // console.log(this.isLoggedIn);
                this.$forceUpdate();
            }
        },

        mounted() {

            this.IsLogged();
            this.$forceUpdate();


        }
    }

</script>