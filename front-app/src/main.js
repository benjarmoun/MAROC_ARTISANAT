import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './router'
import './index.css'
import store from './store'

const app = createApp(App)

app.use(createPinia())
app.use(store)
app.use(router)
app.mount('#app')

// createApp(App).use(Store).use(router).mount('#app')