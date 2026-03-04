import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { createI18n } from 'vue-i18n'

createInertiaApp({
    resolve: name => import(`./pages/${name}.vue`),
    setup({ el, App, props, plugin }) {
        const locale = props.initialPage.props.locale || 'nl';
        const i18n = createI18n({
            legacy: false,
            locale,
            messages: {
                [locale]: props.initialPage.props.translations || {}
            }
        })

        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(i18n)
            .mount(el)
    }
})
