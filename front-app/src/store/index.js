import { createStore } from 'vuex'


const store = createStore({
  state: {
    prod: "test",
    product: {
      name: 'LAMPE DITIA',
      price: 22,
      description: 'lampe marocaine en suspension en métal teinté ‘ditia’ découpé à la main et verre coloré, faite à la main, design inspiré de l’art de décoration orientale (L65cm×Ø28cm)',
      pic: 'lampe-dite-ditia-.jpg',
      category: 'Copperware',
      quantity: 0,
      id: ''
    }


  },
  getters: {},

  mutations: {

  },
  actions: {

  },
  modules: {},


})
export default store;