import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/Suscripcion.js",
                "resources/js/header.js",
                "resources/js/footer.js",
                "resources/js/mail.js",
                "resources/css/inicio.css",
                "resources/js/inicio.js",
            ], //añadir segun archivo
            refresh: true,
        }),
    ],
});
