import './bootstrap';
import '../sass/app.scss';
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import Layout from '@shared/Layout.vue';

// Bootstrap

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
            .mount(el)
    },
})
