import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js', 'resources/js/c3.min.js', 'resources/css/c3.min.css', 'resources/js/d3.v5.min.js"'],
            refresh: true,
        }),
    ],
});
