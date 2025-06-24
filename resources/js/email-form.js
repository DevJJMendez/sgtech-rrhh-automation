import toastr from 'toastr';
import 'toastr/build/toastr.min.css';

toastr.options = {
  "closeButton": true,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "timeOut": "3000",
};

document.getElementById('emailForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);
    const spinner = document.getElementById('spinner');
    spinner.classList.remove('hidden');

    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json',
        },
    })
    .then(res => res.json())
    .then(data => {
        spinner.classList.add('hidden');
        if (data.success) {
            toastr.success("Correo enviado correctamente");
            form.reset();
        } else {
            toastr.error("Hubo un error al enviar el correo.");
        }
    })
    .catch(error => {
        spinner.classList.add('hidden');
        console.error(error);
        toastr.error("Error inesperado. Intenta nuevamente.");
    });
});
