export function sidebarNavigation(){
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.sidebar a').forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const url = this.href;

            fetch(url)
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    
                    const newContent = doc.querySelector('#content')?.innerHTML;
                    if (newContent) {
                        document.querySelector('#content').innerHTML = newContent;
                        history.pushState(null, '', url);
                        // actualizar clase "active" en el sidebar
                        document.querySelectorAll('.sidebar a').forEach(link => {
                            link.classList.remove('active');

                            // Normaliza la URL para comparar (por ejemplo /empleados vs /empleados/)
                            const linkPath = new URL(link.href, window.location.origin).pathname;
                            const currentPath = new URL(url, window.location.origin).pathname;

                            if (linkPath === currentPath) {
                                link.classList.add('active');
                            }
                        });
                        // Opcional: re-ejecutar scripts necesarios
                    } else {
                        console.warn('No se encontró el contenedor #content en la respuesta');
                    }
                })
                .catch(err => {
                    console.error('Error cargando la vista por AJAX', err);
                });
        });
    });

    // Soporte para retroceder con botones del navegador
    window.addEventListener('popstate', () => {
        fetch(location.href)
            .then(response => response.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newContent = doc.querySelector('#content')?.innerHTML;
                if (newContent) {
                    document.querySelector('#content').innerHTML = newContent;
                }
            });
    });
});
}
