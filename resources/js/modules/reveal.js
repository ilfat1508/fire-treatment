document.addEventListener('DOMContentLoaded', () => {
    const revealNodes = document.querySelectorAll('[data-reveal]');

    if (!revealNodes.length) {
        return;
    }

    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    revealNodes.forEach((node) => {
        node.classList.add('reveal');
        const delay = Number(node.dataset.revealDelay || 0);
        node.style.setProperty('--reveal-delay', `${delay}ms`);

        if (node.classList.contains('reveal--stagger')) {
            return;
        }

        const staggerChildren = Array.from(node.children).filter((item) => !item.hasAttribute('data-reveal'));
        if (staggerChildren.length >= 3) {
            node.classList.add('reveal--stagger');
            staggerChildren.forEach((child, index) => {
                child.style.setProperty('--stagger-index', `${index}`);
            });
        }
    });

    if (reducedMotion || !('IntersectionObserver' in window)) {
        revealNodes.forEach((node) => {
            node.classList.add('is-visible', 'reveal--in');
        });
        return;
    }

    const observer = new IntersectionObserver(
        (entries, obs) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) {
                    return;
                }

                entry.target.classList.add('is-visible', 'reveal--in');
                obs.unobserve(entry.target);
            });
        },
        {
            threshold: 0.18,
            rootMargin: '0px 0px -8% 0px',
        },
    );

    revealNodes.forEach((node) => observer.observe(node));
});
