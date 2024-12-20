import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

document.addEventListener('livewire-ready', () => {
    Alpine.start();
});
