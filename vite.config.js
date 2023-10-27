import {defineConfig} from 'vite';
import laravel, {refreshPaths} from 'laravel-vite-plugin';

const host = '172.144.1.203';

export default defineConfig({
    server: {
        host,
        hmr: {host},
        /*watch: {
            usePolling: true,
        },*/
        cors: {
            origin: '*',
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: [
                ...refreshPaths,
                'app/Livewire/**',
            ],
        })
    ],
});
