<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

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
    <div class="container">
        <p class="address">
            <i class="bi bi-geo-alt-fill"></i>
            г. Казань, ул. Тукая, 46</p>
        <p>
            <a href="mailto:info@lenar.ru" class="mail">
                <i class="bi bi-envelope-at-fill"></i>
                info@lenar.ru
            </a>
        </p>
        <p>
            <a href="tel:+7 (843) 523-27-45" class="head__contact__title">
                <i class="bi bi-telephone-forward-fill"></i>
                +7 (843) 523-27-45
            </a>
        </p>
        <div class="whatsapp-block-wrapper">
            <a href="https://wa.clck.bar/79656171753">
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
                    <i class="bi bi-instagram"></i>
                </a>

                <a href="https://api.whatsapp.com/send?phone=79375959624">
                    <i class="bi bi-whatsapp"></i>
                </a>
                <a class="max-app" href="https://api.whatsapp.com/send?phone=79375959624">
                    <svg version="1.1" id="Слой_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">

                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#f16f28" d="M508.2113037,878.3283691
                            c-75.0068665,0-109.8640442-10.9498291-170.4535217-54.7494507
                            c-38.3246765,49.2745361-159.6860962,87.7817383-164.9785461,21.8997803c0-49.4570312-10.9499207-91.2491455-23.3598175-136.8737793
                            c-14.7823486-56.2095337-31.572197-118.8065186-31.572197-209.5082092C117.8472214,282.4710693,295.600647,119.5,506.2038574,119.5
                            c210.7856445,0,375.9467163,171.0010071,375.9467163,381.6041565
                            C882.8580322,708.4505005,715.5558472,877.2223511,508.2113037,878.3283691z M511.3137817,306.7434082
                            c-102.5641174-5.29245-182.4984131,65.6994324-200.2007751,177.023468
                            c-14.599884,92.1616516,11.3149109,204.3982239,33.3972168,210.2381897
                            c10.5848999,2.5549316,37.2296753-18.9799194,53.8370361-35.5872192
                            c27.4610901,18.9708252,59.43927,30.364624,92.7091675,33.0322266
                            c106.2732849,5.1118774,197.0797424-75.7943115,204.2157288-181.9509583
                            c4.1541138-106.3812256-77.6702881-196.4854431-183.9584351-202.5732117L511.3137817,306.7434082z"/>
                    </svg>
                </a>

        </div>
    </div>
</header>

</body>
</html>
