document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('emailForm');
    const spinner = document.getElementById('spinner');

    form.addEventListener('submit', function (e) {
        e.preventDefault(); // evita recarga
        spinner.classList.remove('hidden');

        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                'Accept': 'application/json',
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            spinner.classList.add('hidden');

            if (data.success) {
                notify('El correo fue enviado correctamente.', 'success');
                form.reset();
            } else {
                notify(data.message || 'Ocurrió un error.', 'error');
            }
        })
        .catch(error => {
            spinner.classList.add('hidden');
            notify('Error del servidor: ' + error.message, 'error');
        });
    });

    function notify(message, type = 'info') {
        window.Notify[type]?.(message, 'Notificación') || alert(message);
    }
});
