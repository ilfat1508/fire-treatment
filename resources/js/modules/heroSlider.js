import Swiper from 'swiper';
import { Autoplay, EffectFade } from 'swiper/modules';

Swiper.use([Autoplay, EffectFade]);

document.addEventListener('DOMContentLoaded', () => {
    const el = document.querySelector('.hero-swiper');
    if (!el) return;

    new Swiper(el, {
        loop: true,
        speed: 1200,
        effect: 'fade',
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
    });
});
