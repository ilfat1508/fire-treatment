document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector('.site-header');
    const toggle = document.querySelector('.menu-toggle');
    const menu = document.getElementById('mobile-menu');
    const backdrop = document.querySelector('.menu-backdrop');

    if (!header || !toggle || !menu || !backdrop) {
        return;
    }

    const setBodyLock = (locked) => {
        const hasActiveModal = Boolean(document.querySelector('.form-container.active'));

        if (locked || hasActiveModal) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = 'auto';
        }
    };

    const closeMenu = () => {
        header.classList.remove('menu-open');
        toggle.setAttribute('aria-expanded', 'false');
        menu.setAttribute('aria-hidden', 'true');
        backdrop.setAttribute('aria-hidden', 'true');
        setBodyLock(false);
    };

    toggle.addEventListener('click', () => {
        const opened = header.classList.toggle('menu-open');
        toggle.setAttribute('aria-expanded', opened ? 'true' : 'false');
        menu.setAttribute('aria-hidden', opened ? 'false' : 'true');
        backdrop.setAttribute('aria-hidden', opened ? 'false' : 'true');
        setBodyLock(opened);
    });

    menu.querySelectorAll('a, button').forEach((item) => {
        item.addEventListener('click', closeMenu);
    });

    backdrop.addEventListener('click', closeMenu);

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeMenu();
        }
    });
});
