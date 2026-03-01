<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Огнезащитная и антикоррозийная обработка</title>
    <meta name="description" content="Огнезащитная и антикоррозийная обработка зданий и сооружений: металлоконструкции, бетон, дерево. Работы для бизнеса, ТСЖ и подрядчиков.">
    <meta name="keywords" content="огнезащитная обработка, антикоррозийная обработка, огнезащита зданий, огнезащита металлоконструкций, антикоррозийная защита, огнезащитные работы, антикоррозийные работ">
    @if(config('app.seo_index'))
        <meta name="robots" content="index, follow">
    @else
        <meta name="robots" content="noindex, nofollow, noarchive">
    @endif
    <link rel="canonical" href="https://rgz-project.ru/">

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://rgz-project.ru/">
    <meta property="og:title" content="Огнезащитная и антикоррозийная обработка">
    <meta property="og:description" content="Огнезащитная и антикоррозийная обработка зданий и сооружений: металлоконструкции, бетон, дерево.">
    <meta property="og:site_name" content="RGZ Project">
    <meta property="og:image" content="https://rgz-project.ru/images/hero/fon3.png">
    <meta property="og:image:secure_url" content="https://rgz-project.ru/images/hero/fon3.png">
    <meta property="og:image:alt" content="Огнезащитная и антикоррозийная обработка зданий и сооружений">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Огнезащитная и антикоррозийная обработка">
    <meta name="twitter:description" content="Огнезащитная и антикоррозийная обработка зданий и сооружений: металлоконструкции, бетон, дерево.">
    <meta name="twitter:image" content="https://rgz-project.ru/images/hero/fon3.png">

    @verbatim
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebSite",
            "name": "RGZ Project",
            "url": "https://rgz-project.ru/"
        }
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "RGZ Project",
            "legalName": "Общество с ограниченной ответственностью «РГЗ ПРОЕКТ»",
            "url": "https://rgz-project.ru/",
            "logo": "https://rgz-project.ru/images/icons/icon.svg",
            "email": "info@rgz-project.ru",
            "telephone": "+7-917-921-95-55",
            "address": {
                "@type": "PostalAddress",
                "addressLocality": "Казань",
                "streetAddress": "ул. Нариманова, 40 офис 317",
                "addressCountry": "RU"
            },
            "sameAs": [
                "https://telegram.me/LENAR",
                "https://api.whatsapp.com/send?phone=79872696383"
            ]
        }
    </script>
    @endverbatim

    <link rel="icon" href="{{ asset('images/icons/icon.svg') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Space+Grotesk:wght@700;800&display=swap" rel="stylesheet">

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    @endif
</head>
<body>
<header class="site-header">
    <div class="header-mobile">
        <p class="logo-text"><span>RGZ</span> <span> project</span></p>
        <button type="button" class="menu-toggle" aria-expanded="false" aria-controls="mobile-menu" aria-label="Открыть меню">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
    <div class="mobile-menu" id="mobile-menu" aria-hidden="true">
        <p class="address">
            <i class="bi bi-geo-alt-fill"></i>
            г. Казань, ул. Нариманова, 40 офис 317
        </p>
        <div>
            <p>
                <a href="mailto:info@rgz-project.ru" class="mail">
                    <i class="bi bi-envelope-at-fill"></i>
                    info@rgz-project.ru
                </a>
            </p>
            <p>
                <a href="mailto:pto@rgz-project.ru" class="mail">
                    <i class="bi bi-envelope-at-fill"></i>
                    pto@rgz-project.ru
                </a>
            </p>
        </div>
        <div>
            <p>
                <a href="tel:+7 (917) 921-95-55" class="head__contact__title">
                    <i class="bi bi-telephone-forward-fill"></i>
                    +7 (917) 921-95-55
                </a>
            </p>
            <p>
                <a href="tel:+7 (917) 921-95-55" class="head__contact__title">
                    <i class="bi bi-telephone-forward-fill"></i>
                    +7 (917) 921-94-44
                </a>
            </p>
        </div>
        <div class="messengers">
            <a href="https://telegram.me/LENAR" aria-label="Telegram">
                <i class="bi bi-telegram"></i>
            </a>
            <a href="https://api.whatsapp.com/send?phone=79872696383" aria-label="WhatsApp">
                <i class="bi bi-whatsapp"></i>
            </a>

        </div>
        <button class="whatsapp-btn button-primary">Заказать звонок</button>
    </div>
    <div class="menu-backdrop" aria-hidden="true"></div>

    <div class="container">
        <p class="address" data-reveal="text" data-reveal-delay="80">
            <i class="bi bi-geo-alt-fill"></i>
            г. Казань, ул. Нариманова, 40 офис 317
        </p>
        <div>
            <p data-reveal="text" data-reveal-delay="120">
                <a href="mailto:info@rgz-project.ru" class="mail">
                    <i class="bi bi-envelope-at-fill"></i>
                    info@rgz-project.ru
                </a>
            </p>
            <p data-reveal="text" data-reveal-delay="120">
                <a href="mailto:pto@rgz-project.ru" class="mail">
                    <i class="bi bi-envelope-at-fill"></i>
                    pto@rgz-project.ru
                </a>
            </p>
        </div>
        <p class="logo-text" data-reveal="text">
            <span>RGZ</span> <span> project</span>
        </p>
        <div>
            <p data-reveal="text" data-reveal-delay="160">
                <a href="tel:+7 (917) 921-95-55" class="head__contact__title">
                    <i class="bi bi-telephone-forward-fill"></i>
                    +7 (917) 921-95-55
                </a>
            </p>
            <p>
                <a href="tel:+7 (917) 921-95-55" class="head__contact__title">
                    <i class="bi bi-telephone-forward-fill"></i>
                    +7 (917) 921-94-44
                </a>
            </p>
        </div>
        <div class="whatsapp-block-wrapper" data-reveal="card" data-reveal-delay="200">
            <a>
                <button class="whatsapp-btn button-primary">Заказать звонок
                    <div class="dot"></div>
                </button>
            </a>
        </div>
        <div class="messengers" data-reveal="text" data-reveal-delay="240">
            <a href="https://telegram.me/LENAR" aria-label="Telegram">
                <i class="bi bi-telegram"></i>
            </a>
            <a href="https://api.whatsapp.com/send?phone=79872696383" aria-label="WhatsApp">
                <i class="bi bi-whatsapp"></i>
            </a>

        </div>
    </div>
</header>

<main>
    <section class="hero">
        <div class="swiper hero-swiper" aria-hidden="true">
            <div class="swiper-wrapper">
                <div class="swiper-slide hero-slide-1" style="background-image:url('{{ asset('images/hero/fon3.png') }}')"></div>
                <div class="swiper-slide hero-slide-2" style="background-image:url('{{ asset('images/hero/fon4.png') }}')"></div>
            </div>
        </div>
        <div class="hero-overlay" aria-hidden="true"></div>

        <div class="container hero-shell">
            <div class="hero-content" data-reveal="text">
                <h1 class="desktop-title">
                    Огнезащитная и <br> антикоррозийная <br> обработка зданий и сооружений
                </h1>
                <h1 class="mobile-title">ОГНЕЗАЩИТА и <br> АНТИКОРРОЗИЯ</h1>

                <div class="hero-icons" data-reveal="card" data-reveal-delay="100">
                    <p class="fire-icon"><i class="bi bi-fire"></i> Устойчивость к возгоранию</p>
                    <p class="shield-icon"><i class="bi bi-shield-shaded"></i> Защита от коррозии</p>
                    <p>
                        <i class="bi bi-file-earmark-text"></i>
                        <a href="{{ asset('documents/license.pdf') }}" target="_blank" rel="noopener noreferrer">
                            Лицензия МЧС
                        </a>
                    </p>
                </div>

                <button class="whatsapp-btn button-primary" data-reveal="card" data-reveal-delay="180">Узнать больше</button>
            </div>
        </div>
    </section>

    <section class="editorial-section">
        <div class="container editorial-grid">
            <aside class="services-intro sticky-panel" data-reveal="card">
                <div class="services-containter-title services">
                    <hr>
                    <p>НАШИ ПАРТНЕРЫ</p>
                    <hr class="second">
                </div>
                <a class="partner-card" href="https://npograd.ru" target="_blank" rel="noopener noreferrer" data-reveal="card">
                    <span class="partner-card__logo">
                        <img src="{{ asset('images/partners/npo-grad.png') }}" alt="НПО ГРАДЪ" loading="lazy" decoding="async">
                    </span>
                    <span class="partner-card__name">НПО ГРАДЪ</span>
                </a>
            </aside>

            <div class="editorial-content">
                <div class="services-list" data-reveal="card">
                    <label class="checkbox" data-reveal="card" data-reveal-delay="80">
                        <input type="checkbox" checked disabled>
                        <span class="checkbox__custom"></span>
                        <span class="checkbox__text">Нанесение огнезащитных составов</span>
                    </label>
                    <label class="checkbox" data-reveal="card" data-reveal-delay="160">
                        <input type="checkbox" checked disabled>
                        <span class="checkbox__custom"></span>
                        <span class="checkbox__text">Защита несущих конструкций</span>
                    </label>
                    <label class="checkbox" data-reveal="card" data-reveal-delay="240">
                        <input type="checkbox" checked disabled>
                        <span class="checkbox__custom"></span>
                        <span class="checkbox__text">Сертифицированные материалы</span>
                    </label>
                    <label class="checkbox" data-reveal="card" data-reveal-delay="240">
                        <input type="checkbox" checked disabled>
                        <span class="checkbox__custom"></span>
                        <span class="checkbox__text">положительное заключение мчс. Получим заключение ФГБУ СЭУ ФПС ИПЛ</span>
                    </label>
                </div>
            </div>
        </div>
    </section>
</main>

<div class="overlay" id="overlay"></div>
<div class="form-container" role="dialog" aria-modal="true" aria-labelledby="callback-title">
    <button type="button" class="form-close" aria-label="Закрыть">×</button>
    <p class="form-title" id="callback-title">Заказать звонок</p>
    <p class="subtitle">Закажите звонок для консультации, мы свяжемся с вами</p>

    <form action="{{ route('callback.store') }}" data-route="{{ route('callback.store') }}" class="callback-form">
        @csrf
        <label for="fio">ФИО:</label>
        <input type="text" id="fio" name="fio" required>

        <label for="phone">Номер телефона:</label>
        <input type="tel" id="phone" name="phone" placeholder="+7 (___) ___-__-__" required>

        <button type="submit" class="button-primary">Отправить заявку</button>
    </form>
</div>

<footer>
    <div class="container" data-reveal="card">
        <div class="messengers" data-reveal="text" data-reveal-delay="80">
            <p>
                <a href="https://telegram.me/LENAR" aria-label="Telegram">
                    <i class="bi bi-telegram"></i>
                </a>
            </p>
            <p>
                <a href="https://api.whatsapp.com/send?phone=79872696383" aria-label="WhatsApp">
                    <i class="bi bi-whatsapp"></i>
                </a>
            </p>
        </div>
        <p data-reveal="text" data-reveal-delay="140">
            <a href="mailto:info@rgz-project.ru" class="mail">
                <i class="bi bi-envelope-at-fill"></i>
                info@rgz-project.ru
            </a>
        </p>
        <p data-reveal="text" data-reveal-delay="140">
            <a href="mailto:pto@rgz-project.ru" class="mail">
                <i class="bi bi-envelope-at-fill"></i>
                pto@rgz-project.ru
            </a>
        </p>
        <p class="address" data-reveal="text" data-reveal-delay="160">
            <a href="tel:+7 (917) 921-95-55" class="head__contact__title">
                <i class="bi bi-telephone-forward-fill"></i>
                +7 (917) 921-95-55 - отдел по работе с клиентами
            </a>
        </p>
        <p class="address" data-reveal="text" data-reveal-delay="180">
            <a href="tel:+7 (917) 921-95-55" class="head__contact__title">
                <i class="bi bi-telephone-forward-fill"></i>
                +7 (917) 921-94-44 - руководитель проектов
            </a>
        </p>
        <p class="address" data-reveal="text" data-reveal-delay="200">
            <i class="bi bi-geo-alt-fill"></i>
            г. Казань, ул. Нариманова, 40 офис 317
        </p>
        <p data-reveal="text" data-reveal-delay="260">
            <i class="bi bi-file-earmark-text"></i>
            <a href="{{ asset('documents/license.pdf') }}" target="_blank" rel="noopener noreferrer">
                Лицензия МЧС
            </a>
        </p>
    </div>
</footer>

<div class="modal fade" id="successModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 bg-success text-white">
                <h5 class="modal-title">
                    <i class="fas fa-check-circle me-2"></i>Заявка отправлена!
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center py-4">
                <div id="successMessage" class="fs-5 fw-bold text-success"></div>
            </div>
            <div class="modal-footer border-0 justify-content-center">
                <button type="button" class="btn btn-success px-4" onclick="location.reload()">
                    <i class="fas fa-plus me-2"></i>Новый звонок
                </button>
            </div>
        </div>
    </div>
</div>
</body>
</html>

