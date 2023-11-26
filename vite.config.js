import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import Vue from '@vitejs/plugin-vue'
export default defineConfig({
    plugins: [
        Vue(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            'ziggy-js': 'vendor/tightenco/ziggy/dist/vue.es.js',
            // 'vendor/tightenco/ziggy/dist/vue.es' if using the Vue plugin
        },
    },
});
