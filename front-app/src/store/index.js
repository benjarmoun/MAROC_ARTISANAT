import { createStore } from 'vuex'
import axios from 'axios';



const store = createStore({
  state: {
    prod: "test",
    products: [],
    s_products: [],
    choice: "1",
    category_id: "",
    isLoggedIn: "",
    sellers: [],
  },

  mutations: {
    setProducts(state, products) {
      state.products = products;
      // console.log(state.products);
    },
    setProductByCategory(state, products) {
      // state.choice = "0";
      state.products = products;
      // console.log(state.products);
    },
    setProductBySeller(state, x) {
      // state.choice = "0";
      state.s_products = x;
      // console.log(state.products);
    },
    setProductByCategoryName(state, products) {
      // state.choice = "0";
      state.products = products;
      // console.log(state.products);
    },
    setLogged(state, log) {

      state.isLoggedIn = log;
    },
    setsellers(state, seller) {
      state.sellers = seller;
      // console.log(state.sellers);
    },
    setProductsAdmn(state, products) {
      state.products = products;
    }

  },
  actions: {
    IsLogged({ commit }){
      let log = localStorage.getItem("user") == null ? false : true;
      commit("setLogged", log);
    
      //     return false;
      // }else{
      //     return true;
      // }
    },

    async getAllProducts({ commit }) {
      let result = await axios.get(
        "http://localhost/MAROC_ARTISANAT/back-app/getproducts",

      );
      commit("setProducts", result.data);
      return result.data;
    },

    async getsellers({ commit }) {
      let result = await axios.get(
        'http://localhost/MAROC_ARTISANAT/back-app/getSellers',

      );
      commit("setsellers", result.data);
      return result.data.data;
    },

    async getProductByCategory({ commit }, id) {
      let result = await axios.get(
        "http://localhost/MAROC_ARTISANAT/back-app/getProductByCategory/" + id,

      );
      commit("setProductByCategory", result.data);
      // console.log(result.data);
      return result.data;
    },

    async getProductBySeller({ commit }, id) {
      let result = await axios.get(
        'http://localhost/MAROC_ARTISANAT/back-app/getProductBySeller/'+id,

      );
      commit("setProductBySeller", result.data);
      // console.log(result.data);
      return result.data;
    },

    async getProductsAdmin({ commit }) {
      let result = await axios.get(
        'http://localhost/MAROC_ARTISANAT/back-app/getProductsAdmn',

      );
      commit("setProductsAdmn", result.data);
      console.log(result.data);
      return result.data;
    },

    async getProductByCategoryName({ commit }, C_Name) {
      if (C_Name == "") {
        let result = await axios.get(
          "http://localhost/MAROC_ARTISANAT/back-app/getproducts",

        );
        commit("setProducts", result.data);
        return result.data;
      } else {
        let result = await axios.get(
          "http://localhost/MAROC_ARTISANAT/back-app/getProductByCategoryName/" + C_Name,

        );
        commit("setProductByCategory", result.data);
        // console.log(result.data);
        return result.data;
      }
    }
  },

})
export default store;
