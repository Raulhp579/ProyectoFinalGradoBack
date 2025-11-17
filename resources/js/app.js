import './bootstrap';

// CSS general (Tailwind + lo que tengas en app.css)
import '../css/app.css';

// CSS de Bootstrap desde node_modules
import 'bootstrap/dist/css/bootstrap.min.css';

// JS de Bootstrap (para dropdowns, modals, etc.)
import 'bootstrap';


import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
