import './bootstrap';

document.querySelectorAll('[data-menu-toggle]').forEach((button) => {
    button.addEventListener('click', () => {
        document.querySelector('[data-mobile-menu]')?.classList.toggle('hidden');
    });
});
