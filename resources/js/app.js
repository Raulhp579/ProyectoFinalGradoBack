import './bootstrap';
// Importas tu CSS general
import '../css/app.css';

// Importas el CSS de Bootstrap desde node_modules
import 'bootstrap/dist/css/bootstrap.min.css';

// Si quieres también el JS de Bootstrap (para dropdowns, modals, etc.)
import 'bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
