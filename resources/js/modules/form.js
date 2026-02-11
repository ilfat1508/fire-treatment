document.addEventListener('DOMContentLoaded', () => {
    const modal = document.querySelector('.form-container');
    const overlay = document.querySelector('.overlay');
    const callbackForm = document.querySelector('.callback-form');
    const phoneInput = document.getElementById('phone');
    const closeButton = document.querySelector('.form-close');

    if (!modal || !overlay || !callbackForm) {
        return;
    }

    function openModal() {
        overlay.classList.add('active');
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
        document.body.style.touchAction = 'none';
    }

    function closeModal() {
        overlay.classList.remove('active');
        modal.classList.remove('active');
        const menuOpened = Boolean(document.querySelector('.site-header.menu-open'));
        document.body.style.overflow = menuOpened ? 'hidden' : '';
        document.body.style.touchAction = menuOpened ? 'none' : '';
    }

    document.querySelectorAll('.whatsapp-btn').forEach((btn) => {
        btn.addEventListener('click', openModal);
    });

    overlay.addEventListener('click', closeModal);
    closeButton?.addEventListener('click', closeModal);

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal.classList.contains('active')) {
            closeModal();
        }
    });

    if (phoneInput) {
        phoneInput.addEventListener('input', (e) => {
            const value = e.target.value.replace(/\D/g, '').match(/(\d{0,1})(\d{0,3})(\d{0,3})(\d{0,2})(\d{0,2})/);
            e.target.value =
                '+7' +
                (value[2] ? ` (${value[2]}` : '') +
                (value[3] ? `) ${value[3]}` : '') +
                (value[4] ? `-${value[4]}` : '') +
                (value[5] ? `-${value[5]}` : '');
        });
    }

    callbackForm.addEventListener('submit', async function (e) {
        e.preventDefault();

        const button = this.querySelector('button');
        const originalText = button.textContent;
        button.textContent = 'Отправляем...';
        button.disabled = true;

        try {
            const formData = new FormData(this);
            const route = this.dataset.route;

            const response = await fetch(route, {
                method: 'POST',
                body: formData,
            });

            const data = await response.json();

            if (data.success) {
                alert('Спасибо за вашу заявку! В ближайшее время мы свяжемся с вами');
                button.textContent = 'Отправить заявку';
                button.disabled = false;
                this.reset();
                closeModal();
            }
        } catch (error) {
            alert('Ошибка сети');
            button.textContent = originalText;
            button.disabled = false;
        }
    });
});
