import './bootstrap';
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { ZiggyVue } from 'ziggy-js';
import { Ziggy } from './ziggy.js';
import { Link } from '@inertiajs/vue3'
import ElementPlus from 'element-plus'
import MainLayout from './Pages/Layout/MainLayout.vue'
import 'element-plus/dist/index.css'
import Swal from 'sweetalert2'
createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    let page = pages[`./Pages/${name}.vue`].default;
    page.layout = page.layout || MainLayout
    return page
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(Ziggy,ZiggyVue)
      .component('Link',Link)
      .use(ElementPlus)
      .mixin({methods:{route}})
      .mount(el)
  },
})