document.addEventListener('DOMContentLoaded', () => {
    const header = document.querySelector('.site-header');

    if (!header) {
        return;
    }

    let ticking = false;

    const updateHeaderState = () => {
        header.classList.toggle('is-scrolled', window.scrollY > 8);
        ticking = false;
    };

    const onScroll = () => {
        if (ticking) {
            return;
        }

        ticking = true;
        window.requestAnimationFrame(updateHeaderState);
    };

    updateHeaderState();
    window.addEventListener('scroll', onScroll, { passive: true });
});
