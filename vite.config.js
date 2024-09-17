import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

// Define Vite configuration
export default defineConfig({
    plugins: [
        // Laravel Vite Plugin for asset management
        laravel({
            input: [
                'resources/css/app.css', // Entry point for Tailwind CSS
                'resources/js/app.js',   // Entry point for JavaScript
            ],
            refresh: true, // Auto-refresh on changes
        }),
        // Vue Plugin for handling Vue files
        vue({
            template: {
                transformAssetUrls: {
                    base: null, // Use relative URLs
                    includeAbsolute: false, // Do not include absolute URLs
                },
            },
        }),
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js', // Vue alias for Vite
        },
    },
});
