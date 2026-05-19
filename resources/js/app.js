import './bootstrap';
import 'aos/dist/aos.css';
import AOS from 'aos';

document.addEventListener('DOMContentLoaded', () => {
    AOS.init({
        once: true,
        offset: 50,
        duration: 800,
        easing: 'ease-in-out',
    });
});

document.addEventListener('livewire:init', () => {
    Livewire.hook('request', ({ succeed }) => {
        succeed(() => {
            setTimeout(() => {
                AOS.refresh();
            }, 100);
        });
    });
});
