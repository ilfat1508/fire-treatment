import Swiper from 'swiper';
import { Autoplay, EffectFade } from 'swiper/modules';

Swiper.use([Autoplay, EffectFade]);

document.addEventListener('DOMContentLoaded', () => {
    const el = document.querySelector('.hero-swiper');
    if (!el) return;

    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    new Swiper(el, {
        loop: !reducedMotion,
        speed: reducedMotion ? 0 : 1100,
        effect: 'fade',
        allowTouchMove: !reducedMotion,
        autoplay: reducedMotion
            ? false
            : {
                  delay: 5200,
                  disableOnInteraction: false,
              },
    });
});
