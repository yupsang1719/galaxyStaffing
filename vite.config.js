import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/sass/admin.scss', // Make sure this is included
                'resources/js/admin.js',
            ],
            refresh: true,
        }),
    ],
});
