import { createApp } from 'vue'
import Notifications from '@kyvg/vue3-notification'

import App from './App.vue'
import store from './stores'
import router from './routes'
// import styles
import "./assets/css/main.css"
const app = createApp(App)
app.use(Notifications)
app.use(router)
app.use(store)
app.mount('#app')
