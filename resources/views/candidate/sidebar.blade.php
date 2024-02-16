<ul class="list-group list-group-flush">
    <li class="list-group-item {{ Request::is('candidate/dashboard') ? 'active' : '' }}">
        <a href="{{ route('candidate_dashboard') }}">Panel Kandydata</a>
    </li>
    <li class="list-group-item {{ Request::is('candidate/applications') ? 'active' : '' }}">
        <a href="{{ route('candidate_applications') }}">Złożono kandydaturę</a>
    </li>
    <li class="list-group-item {{ Request::is('candidate/bookmark-view') ? 'active' : '' }}">
        <a href="{{ route('candidate_bookmark_view') }}">Zaznaczone oferty</a>
    </li>
    <li class="list-group-item {{ Request::is('candidate/education/view') ? 'active' : '' }}">
        <a href="{{ route('candidate_education') }}">Wykształcenie</a>
    </li>
    <li class="list-group-item {{ Request::is('candidate/skills/view') ? 'active' : '' }}">
        <a href="{{ route('candidate_skills') }}">Umiejętności</a>
    </li>
    <li class="list-group-item {{ Request::is('candidate/experience/view') ? 'active' : '' }}">
        <a href="{{ route('candidate_experience') }}">Doświadczenie zawodowe</a>
    </li>
    <li class="list-group-item {{ Request::is('candidate/award/view') ? 'active' : '' }}">
        <a href="{{ route('candidate_award') }}">Wyróżnienia</a>
    </li>
    <li class="list-group-item {{ Request::is('candidate/resume/view') ? 'active' : '' }}">
        <a href="{{ route('candidate_resume') }}">Załączniki</a>
    </li>
    <li class="list-group-item {{ Request::is('candidate/edit-profile') ? 'active' : '' }}">
        <a href="{{ route('candidate_edit_profile') }}">Edytuj profil</a>
    </li>
    <li class="list-group-item {{ Request::is('candidate/edit-password') ? 'active' : '' }}">
        <a href="{{ route('candidate_edit_password') }}">Zmień hasło</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('candidate_logout') }}">Wyloguj się</a>
    </li>
</ul>