document.addEventListener('DOMContentLoaded', () => {
    const revealNodes = document.querySelectorAll('[data-reveal]');

    if (!revealNodes.length) {
        return;
    }

    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    revealNodes.forEach((node) => {
        const delay = Number(node.dataset.revealDelay || 0);
        node.style.setProperty('--reveal-delay', `${delay}ms`);
    });

    if (reducedMotion || !('IntersectionObserver' in window)) {
        revealNodes.forEach((node) => node.classList.add('is-visible'));
        return;
    }

    const observer = new IntersectionObserver(
        (entries, obs) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) {
                    return;
                }

                entry.target.classList.add('is-visible');
                obs.unobserve(entry.target);
            });
        },
        {
            threshold: 0.2,
            rootMargin: '0px 0px -6% 0px',
        },
    );

    revealNodes.forEach((node) => observer.observe(node));
});
