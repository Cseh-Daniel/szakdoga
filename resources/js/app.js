import './bootstrap';
import 'bootstrap-icons/font/bootstrap-icons.css';
import '../sass/app.scss';

import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'

import Layout from '@shared/Layout.vue';

import { Link } from '@inertiajs/vue3';


createInertiaApp({
    resolve: name => {

        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });

        let page = pages[`./Pages/${name}.vue`]
        if (page.default.layout === undefined) {

            page.default.layout = Layout
        }
        return page

    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component('Link', Link)
            .mount(el)
    },
})
