import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel(
            // [
    		// 	'resources/css/app.css', 
    		// 	'resources/js/app.js'
    		// ]
            {
                input: [
                    'resources/css/app.css',
                    'resources/js/app.js',
                ],
                refresh: [
                    ...refreshPaths,
                    'app/Http/Livewire/**',
                ],
            }
        ),
    ],
});
