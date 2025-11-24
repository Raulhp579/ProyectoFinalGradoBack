import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
<<<<<<< HEAD
            input: ['resources/css/app.css', 'resources/js/app.js','resources/js/Suscripcion.js','resources/js/header.js','resources/js/footer.js, resources/js/Carrito.js, resources/js/Producto.js'],//añadir segun archivo
=======
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
>>>>>>> main
            refresh: true,
        }),
    ],
});
