import toastr from 'toastr';
import 'toastr/build/toastr.min.css';

toastr.options = {
  "closeButton": false,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "timeOut": "3000",
};

// export function sendEmail(){
// document.getElementById('emailForm').addEventListener('submit', function (e) {
//     e.preventDefault();

//     const form = e.target;
//     const formData = new FormData(form);
//     const spinner = document.getElementById('spinner');
//     spinner.classList.remove('hidden');

//     fetch(form.action, {
//         method: 'POST',
//         body: formData,
//         headers: {
//             'X-Requested-With': 'XMLHttpRequest',
//             'Accept': 'application/json',
//         },
//     })
//     .then(res => res.json())
//     .then(data => {
//         spinner.classList.add('hidden');
//         if (data.success) {
//             toastr.success("Correo enviado correctamente");
//             form.reset();
//         } else {
//             toastr.error("Hubo un error al enviar el correo.");
//         }
//     })
//     .catch(error => {
//         spinner.classList.add('hidden');
//         console.error(error);
//         toastr.error("Error inesperado. Intenta nuevamente.");
//     });
// });
// }
export function sendEmail() {
    const form = document.getElementById('emailForm');
    if (!form) return; // No ejecutar si no hay formulario en la vista

    form.addEventListener('submit', (e) => {
        e.preventDefault();

        const formData = new FormData(form);
        const spinner = document.getElementById('spinner');
        if (spinner) spinner.classList.remove('hidden');

        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
            },
            body: formData
        })
            .then(res => res.json())
            .then(data => {
                if (spinner) spinner.classList.add('hidden');
                if (data.success) {
                    toastr.success(data.message || 'Correo enviado correctamente');
                    form.reset();
                } else {
                    toastr.error(data.message || 'Hubo un error al enviar el correo');
                }
            })
            .catch(err => {
                if (spinner) spinner.classList.add('hidden');
                toastr.error('Error inesperado. Revisa la consola.');
                console.error(err);
            });
    });
}
