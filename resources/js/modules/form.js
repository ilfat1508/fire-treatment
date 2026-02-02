document.addEventListener('DOMContentLoaded', function() {
    const modal = document.querySelector('.form-container');
    const overlay = document.querySelector('.overlay');

    // Открытие
    function openModal() {
        overlay.classList.add('active');
        modal.classList.add('active');
        document.body.style.overflow = 'hidden'; // блокировка скролла
    }

    // Закрытие
    function closeModal() {
        modal.classList.add('closing');
        overlay.classList.remove('active');
        modal.classList.remove('active', 'closing');
        document.body.style.overflow = 'auto';
    }

    // События
    document.querySelectorAll('.whatsapp-btn').forEach(btn => {
        btn.addEventListener('click', openModal)
    })

    // Закрытие по крестику (если добавите реальный элемент) или overlay
    overlay.addEventListener('click', closeModal);
    modal.addEventListener('click', function(e) {
        if (e.target === modal || e.target.closest('::before')) closeModal();
    });

    // Закрытие по Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.classList.contains('active')) {
            closeModal();
        }
    });

    const phoneInput = document.getElementById('phone');
    phoneInput.addEventListener('input', function(e) {
        let x = e.target.value.replace(/\D/g, '').match(/(\d{0,1})(\d{0,3})(\d{0,3})(\d{0,2})(\d{0,2})/);
        e.target.value = '+7' + (x[2] ? ' (' + x[2] : '') + (x[3] ? ') ' + x[3] : '') + (x[4] ? '-' + x[4] : '') + (x[5] ? '-' + x[5] : '');
    });

    // В отдельном form.js
    document.querySelector('.callback-form')?.addEventListener('submit', async function(e) {
        e.preventDefault();

        const button = this.querySelector('button');
        const originalText = button.textContent;
        button.textContent = 'Отправляем...';
        button.disabled = true;

        try {
            const formData = new FormData(this);
            const route = this.dataset.route; // ← Берем из data-route

            const response = await fetch(route, {
                method: 'POST',
                body: formData
            });

            const data = await response.json();

            if (data.success) {
                alert("Спасибо за вашу заявку! В ближайшее время мы свяжемся с вами")
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
