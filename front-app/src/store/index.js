import { createStore } from 'vuex'
import axios from 'axios';



const store = createStore({
  state: {
    prod: "test",
    products: [],
    choice: "1",
    category_id: "",
  


  },
  getters: {},

  mutations: {
    setProducts(state, products) {
      state.products = products;
      // console.log(state.products);
    },
    setProductByCategory(state, products) {
      // state.choice = "0";
      state.products = products;
      console.log(state.products);
    }

  },
  actions: {
    async getAllProducts({ commit }) {
      let result = await axios.get(
        "http://localhost/MAROC_ARTISANAT/back-app/getproducts",
        
    );
      commit("setProducts", result.data);
      return result.data;
  },

    async getProductByCategory({ commit }, id) {
      let result = await axios.get(
        "http://localhost/MAROC_ARTISANAT/back-app/getProductByCategory/" + id,
        
    );
      commit("setProductByCategory", result.data);
      // console.log(result.data);
      return result.data;
  }
},

})
export default store;
