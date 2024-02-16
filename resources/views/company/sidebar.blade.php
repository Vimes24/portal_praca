<ul class="list-group list-group-flush">
    <li class="list-group-item {{ Request::is('company/dashboard') ? 'active' : '' }}">
        <a href="{{ route('company_dashboard') }}">Panel Instytucji</a>
    </li>
    <li class="list-group-item {{ Request::is('company/make-payment') ? 'active' : '' }}">
        <a href="{{ route('company_make_payment') }}">Zapłać</a>
    </li>
    <li class="list-group-item {{ Request::is('company/orders') ? 'active' : '' }}">
        <a href="{{ route('company_orders') }}">Zamówienia</a>
    </li>
    <li class="list-group-item {{ Request::is('company/create-job') ? 'active' : '' }}">
        <a href="{{ route('company_jobs_create') }}">Stwórz ofertę</a>
    </li>
    <li class="list-group-item {{ Request::is('company/jobs') ? 'active' : '' }}">
        <a href="{{ route('company_jobs') }}">Wszystkie oferty</a>
    </li>
    <li class="list-group-item {{ Request::is('company/photos') ? 'active' : '' }}">
        <a href="{{ route('company_photos') }}">Zdjęcia</a>
    </li>
    <li class="list-group-item {{ Request::is('company/videos') ? 'active' : '' }}">
        <a href="{{ route('company_videos') }}">Filmy</a>
    </li>
    <li class="list-group-item {{ Request::is('company/candidate-applications') ? 'active' : '' }}">
        <a href="{{ route('company_candidate_applications') }}">Zgłoszenia kandydatów</a>
    </li>
    <li class="list-group-item {{ Request::is('company/edit-profile') ? 'active' : '' }}">
        <a href="{{ route('company_edit_profile') }}">Edytuj profil</a>
    </li>
    <li class="list-group-item {{ Request::is('company/edit-password') ? 'active' : '' }}">
        <a href="{{ route('company_edit_password') }}">Zmień hasło</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('company_logout') }}">Wyloguj się</a>
    </li>
</ul>