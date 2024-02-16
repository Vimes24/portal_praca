<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_home') }}">Panel Administratora</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin_home') }}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is('admin/home') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_home') }}" data-bs-toogle="tooltip" data-bs-placement="right" data-bs-title="Dashboard"><i class="fas fa-hand-point-right"></i> <span>Panel główny</span></a></li>
            <li class="{{ Request::is('admin/settings') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_settings') }}" data-bs-toogle="tooltip" data-bs-placement="right" data-bs-title="Settings"><i class="fas fa-hand-point-right"></i> <span>Ustawienia</span></a></li>

            <li class="nav-item dropdown {{ Request::is('admin/home-page') || Request::is('admin/faq-page') 
            || Request::is('admin/blog-page') || Request::is('admin/term-page') 
            || Request::is('admin/privacy-page') || Request::is('admin/contact-page') 
            || Request::is('admin/job-category-page') || Request::is('admin/pricing-page')
            || Request::is('admin/other-page') ? 'active' : '' }} ">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Ustawienia strony</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/home-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_home_page') }}"><i class="fas fa-angle-right"></i> Strona główna</a></li>
                    <li class="{{ Request::is('admin/faq-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_faq_page') }}"><i class="fas fa-angle-right"></i> FAQ</a></li>
                    <li class="{{ Request::is('admin/blog-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_blog_page') }}"><i class="fas fa-angle-right"></i> Blog</a></li>
                    <li class="{{ Request::is('admin/term-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_term_page') }}"><i class="fas fa-angle-right"></i> Warunki użycia</a></li>
                    <li class="{{ Request::is('admin/privacy-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_privacy_page') }}"><i class="fas fa-angle-right"></i> Polityka prywatności</a></li>
                    <li class="{{ Request::is('admin/contact-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_contact_page') }}"><i class="fas fa-angle-right"></i> Kontakt</a></li>
                    <li class="{{ Request::is('admin/job-category-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_job_category_page') }}"><i class="fas fa-angle-right"></i> Kategorie Ofert</a></li>
                    <li class="{{ Request::is('admin/pricing-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_pricing_page') }}"><i class="fas fa-angle-right"></i> Płatności</a></li>
                    <li class="{{ Request::is('admin/other-page') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_other_page') }}"><i class="fas fa-angle-right"></i> Pozostałe</a></li>

                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/job-category/*') || Request::is('admin/job-location/*') || Request::is('admin/job-type/*') 
            || Request::is('admin/job-experience/*') || Request::is('admin/job-gender/*') || Request::is('admin/job-salary/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Sekcja ofert</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/job-category/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_job_category') }}"><i class="fas fa-angle-right"></i> Kategorie ofert</a></li>
                    <li class="{{ Request::is('admin/job-location/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_job_location') }}"><i class="fas fa-angle-right"></i> Lokalizacja ofert</a></li>
                    <li class="{{ Request::is('admin/job-type/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_job_type') }}"><i class="fas fa-angle-right"></i> Typy ofert</a></li>
                    <li class="{{ Request::is('admin/job-experience/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_job_experience') }}"><i class="fas fa-angle-right"></i> Doświadczenie</a></li>
                    <li class="{{ Request::is('admin/job-gender/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_job_gender') }}"><i class="fas fa-angle-right"></i> Płeć</a></li>
                    <li class="{{ Request::is('admin/job-salary/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_job_salary') }}"><i class="fas fa-angle-right"></i> Wypłata</a></li>

                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/company-location/*') || Request::is('admin/company-industry/*') || Request::is('admin/company-size/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Sekcja ofert instytucji</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/company-location/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_company_location') }}"><i class="fas fa-angle-right"></i> Lokalizacja instytucji</a></li>
                    <li class="{{ Request::is('admin/company-industry/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_company_industry') }}"><i class="fas fa-angle-right"></i> Charakter instytucji</a></li>
                    <li class="{{ Request::is('admin/company-size/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_company_size') }}"><i class="fas fa-angle-right"></i> Wielkość instytucji</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/subscriber-show') || Request::is('admin/subscribers-send-email') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Sekcja subskrybujących</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/all-subscribers') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_all_subscribers') }}"><i class="fas fa-angle-right"></i> Wszyscy subskrybujący</a></li>
                    <li class="{{ Request::is('admin/subscribers-send-email') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_subscribers_send_email') }}"><i class="fas fa-angle-right"></i> Wysyłanie wiadomości do subskrybujących</a></li>
                </ul>
            </li>

            <li class="{{ Request::is('admin/companies') || Request::is('admin/companies-detail/*') || Request::is('admin/companies-jobs/*')
            || Request::is('admin/companies-applicants/*') || Request::is('admin/companies-applicant-resume/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_companies') }}" data-bs-toogle="tooltip" data-bs-placement="right" data-bs-title="Company Profile"><i class="fas fa-hand-point-right"></i> <span>Profil Instytucji</span></a></li>

            <li class="{{ Request::is('admin/candidates') || Request::is('admin/candidates-detail/*') || Request::is('admin/candidates-applied-jobs/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_candidates') }}" data-bs-toogle="tooltip" data-bs-placement="right" data-bs-title="Candidate Profile"><i class="fas fa-hand-point-right"></i> <span>Profil Kandydata</span></a></li>

            <li class="{{ Request::is('admin/why-choose/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_why_choose_item') }}" data-bs-toogle="tooltip" data-bs-placement="right" data-bs-title="Why Choose Items"><i class="fas fa-hand-point-right"></i> <span>Dlaczego My</span></a></li>
            <li class="{{ Request::is('admin/testimonial/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_testimonial') }}" data-bs-toogle="tooltip" data-bs-placement="right" data-bs-title="Testimonials"><i class="fas fa-hand-point-right"></i> <span>Opinie</span></a></li>
            <li class="{{ Request::is('admin/post/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_post') }}" data-bs-toogle="tooltip" data-bs-placement="right" data-bs-title="Posts"><i class="fas fa-hand-point-right"></i> <span>Posty</span></a></li>
            <li class="{{ Request::is('admin/faq/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_faq') }}" data-bs-toogle="tooltip" data-bs-placement="right" data-bs-title="FAQs"><i class="fas fa-hand-point-right"></i> <span>FAQ</span></a></li>
            <li class="{{ Request::is('admin/package/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_package') }}" data-bs-toogle="tooltip" data-bs-placement="right" data-bs-title="Packages"><i class="fas fa-hand-point-right"></i> <span>Pakiety</span></a></li>
            <li class="{{ Request::is('admin/banner') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_banner') }}" data-bs-toogle="tooltip" data-bs-placement="right" data-bs-title="Banner"><i class="fas fa-hand-point-right"></i> <span>Banery</span></a></li>

        </ul>
    </aside>
</div>