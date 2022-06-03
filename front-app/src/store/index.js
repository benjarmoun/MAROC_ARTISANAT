import { createStore } from 'vuex'


const store = createStore({
  state: {
    prod: "test",
    product: {
      name: 'test1',
      price: 9999,
      description: 'lorem ipsum dolor sit amet  consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
      pic: 'pottery-Service De Café.jpg',
      category: '',
      quantity: 0,
      id: ''
    }


  },
  getters: {},

  actions: {

  },
  mutations: {

  },
  modules: {},


})
export default store;