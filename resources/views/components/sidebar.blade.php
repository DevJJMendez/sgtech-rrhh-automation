<aside class="sidebar">
    <div class="logo-container">
        <img src="{{ asset('images/logo-sg-tech-1x.png') }}" alt="SGTech Logo" class="logo">
    </div>
    <nav class="sidebar-nav">
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('send') }}" class="sidebar-link {{ Route::is('send') ? 'active' : '' }}">Enviar
                    Email</a>
            </li>
            <li>
                <a href="{{ route('employees.table') }}"
                    class="sidebar-link {{ Route::is('employees.table') ? 'active' : '' }}">Empleados</a>
            </li>
        </ul>
    </nav>
</aside>
