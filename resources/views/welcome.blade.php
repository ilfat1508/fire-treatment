<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RGZ Project</title>
    <link rel="icon" href="{{ asset('images/icons/icon.svg') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    @endif

</head>
<body>
<header>
    <div class="header-mobile">
        <p class="logo-text"><span>RGZ</span> <span> project</span></p>

        <p>
            <a href="tel:+7 (987) 269-63-83" class="head__contact__title">
                <i class="bi bi-telephone-forward-fill"></i>
                +7 (987) 269-63-83
            </a>
        </p>
    </div>

    <div class="container">
        <p class="address">
            <i class="bi bi-geo-alt-fill"></i>
            г. Казань, ул. Нариманова, 40 офис 317</p>
        <p>
            <a href="mailto:info@lenar.ru" class="mail">
                <i class="bi bi-envelope-at-fill"></i>
                info@lenar.ru
            </a>
        </p>
        <p class="logo-text"><span>RGZ</span> <span> project</span></p>
        <p>
            <a href="tel:+7 (987) 269-63-83" class="head__contact__title">
                <i class="bi bi-telephone-forward-fill"></i>
                +7 (987) 269-63-83
            </a>
        </p>
        <div class="whatsapp-block-wrapper">
            <a>
                <button class="whatsapp-btn">Заказать звонок
                    <div class="dot"></div>
                </button>
            </a>
        </div>
        <div class="messengers">
            <a href="https://telegram.me/LENAR">
                <i class="bi bi-telegram"></i>
            </a>

            <a href="https://instagram.com/lenar">
            </a>

            <a href="https://api.whatsapp.com/send?phone=7872696383">
                <i class="bi bi-whatsapp"></i>
            </a>
            {{--            <a class="max-app" href="https://api.whatsapp.com/send?phone=79375959624">--}}
            {{--                <svg width="20" height="20" viewBox="0 0 25 24" fill="red" xmlns="http://www.w3.org/2000/svg">--}}
            {{--                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.3405 23.9342C9.97568 23.9342 8.87728 23.5899--}}
            {{--                     6.97252 22.2125C5.76041 23.762 1.94518 24.9672 1.77774 22.9012C1.77774 21.3535 1.42788 20.0492--}}
            {{--                      1.04269 18.6132C0.570922 16.8544 0.0461426 14.898 0.0461426 12.0546C0.0461426 5.27426 5.6424--}}
            {{--                      0.175079 12.2777 0.175079C18.913 0.175079 24.1153 5.52322 24.1153 12.1205C24.1153 18.7178--}}
            {{--                      18.7474 23.9342 12.3405 23.9342ZM12.4368 6.03673C9.20791 5.86848 6.68817 8.0948 6.13253--}}
            {{--                       11.5794C5.6724 14.465 6.48821 17.9812 7.18602 18.1582C7.51488 18.2416 8.35763 17.564 8.87711--}}
            {{--                       17.0475C9.73154 17.5981 10.712 18.0245 11.8019 18.0813C15.1168 18.254 18.0544 15.6761 18.228--}}
            {{--                       12.382C18.4016 9.08792 15.7517 6.20946 12.4368 6.03673Z" fill="red">--}}
            {{--                    </path>--}}
            {{--                </svg>--}}
            {{--            </a>--}}

        </div>
    </div>
</header>

<section class="hero">
    <div class="swiper hero-swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide" style="background-image:url('{{ asset('images/hero/fon3.png') }}')"></div>
            <div class="swiper-slide" style="background-image:url('{{ asset('images/hero/fon4.png') }}')"></div>
        </div>
    </div>

    <div class="hero-content">
        <h1 class="desktop-title">
            Огнезащитная и <br> антикоррозийная <br> обработка зданий и сооружений
        </h1>
        <h1 class="mobile-title">ОГНЕЗАЩИТА и <br> АНТИКОРРОЗИЯ</h1>

        <div class="hero-icons">
            <p class="fire-icon"><i class="bi bi-fire"></i> Устойчивость к возгоранию</p>
            <p class="shield-icon"><i class="bi bi-shield-shaded"></i> Защита от коррозии</p>
        </div>

        <button class="whatsapp-btn">Узнать больше</button>
    </div>
    <div class="blue-block">
        <img src="{{asset('images/mobile/blue-block.svg')}}" alt="">
        <div class="buttons">
            <div class="services-containter-title services">
                <hr>
                <p>НАШИ УСЛУГИ</p>
                <hr class="second">
            </div>
            <label class="checkbox">
                <input type="checkbox" checked disabled>
                <span class="checkbox__custom"></span>
                <span class="checkbox__text">Нанесение огнезащитных составов</span>
            </label>
            <label class="checkbox">
                <input type="checkbox" checked disabled>
                <span class="checkbox__custom"></span>
                <span class="checkbox__text">Защита несущих конструкций</span>
            </label>
            <label class="checkbox">
                <input type="checkbox" checked disabled>
                <span class="checkbox__custom"></span>
                <span class="checkbox__text">Сертифицированные материалы</span>
            </label>
        </div>
        <button class="whatsapp-btn">Узнать больше</button>
    </div>
    <div class="services-containter-title">
        <hr>
        <p>О НАС</p>
        <hr class="second">
    </div>
    <div class="services-container">
        <div class="service">
            <img src="{{asset('images/mobile/mobile-fire.png')}}" alt="">
            <p>Огнезащита <br> Конструкций</p>
        </div>
        <div class="service">
            <img src="{{asset('images/mobile/mobile-cor.png')}}" alt="">
            <p>Антикоррозия <br> Конструкций</p>
        </div>
        <div class="service">
            <img src="{{asset('images/mobile/mobile-fire-treatment.png')}}" alt="">
            <p>Лицензия <br> МЧС</p>
        </div>
    </div>
    <div class="services-buttons">
        <button class="whatsapp-btn">
            ЗАКАЗАТЬ КОНСУЛЬТАЦИЮ
            <div class="arrow"></div>
        </button>
    </div>
</section>
<div class="overlay" id="overlay"></div>
<div class="form-container">
    <p class="form-title">Заказать звонок</p>
    <p class="subtitle">Закажите звонок для консультации, мы свяжемся с вами</p>

    <form action="/submit" method="POST">
        @csrf
        <label for="fio">ФИО:</label>
        <input type="text" id="fio" name="fio" required>

        <label for="phone">Номер телефона:</label>
        <input type="tel" id="phone" name="phone" placeholder="+7 (___) ___-__-__" required>

        <button type="submit">Отправить заявку</button>
    </form>
</div>
<footer>
    <div>
        <div class="messengers">
            <p>
                <a href="https://telegram.me/LENAR">
                    <i class="bi bi-telegram"></i>
                </a>
            </p>
            <p>
                <a href="https://api.whatsapp.com/send?phone=7872696383">
                    <i class="bi bi-whatsapp"></i>
                </a>
            </p>
        </div>
        <p>
            <a href="mailto:info@lenar.ru" class="mail">
                <i class="bi bi-envelope-at-fill"></i>
                info@testproject.ru
            </a>
        </p>
        <p class="address">
            <i class="bi bi-geo-alt-fill"></i>
            г. Казань, ул. Нариманова, 40 офис 317
        </p>
        <p>
            <i class="bi bi-file-earmark-text"></i>
            <a href="{{ asset('documents/license.pdf') }}" target="_blank" rel="noopener noreferrer">
                Лицензия МЧС
            </a>

        </p>
    </div>
</footer>
</body>
</html>
