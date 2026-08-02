<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    {{-- Sidebar Brand --}}
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">

        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-code"></i>
        </div>

        <div class="sidebar-brand-text mx-3">
            Portfolio Admin
        </div>

    </a>

    <hr class="sidebar-divider my-0">

    {{-- Dashboard --}}
    <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

        <a class="nav-link" href="{{ route('admin.dashboard') }}">

            <i class="fas fa-fw fa-tachometer-alt"></i>

            <span>Dashboard</span>

        </a>

    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Portfolio Content
    </div>

    {{-- Website Sections --}}
    <li class="nav-item">

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSections"
            aria-expanded="false" aria-controls="collapseSections">

            <i class="fas fa-fw fa-layer-group"></i>

            <span>Website Sections</span>

        </a>

        <div id="collapseSections" class="collapse" data-parent="#accordionSidebar">

            <div class="bg-white py-2 collapse-inner rounded">

                <h6 class="collapse-header">
                    Main Sections
                </h6>

                <a class="collapse-item" href="{{ route('admin.navigation-items.index') }}">
                    Navbar Items
                </a>

                {{-- لم يتم إنشاء Routes لها بعد --}}
                <a class="collapse-item" href="{{ route('admin.hero.edit') }}">
                    Hero Section
                </a>

                <a class="collapse-item
                    {{ request()->routeIs('admin.about.*') ? 'active' : '' }}"
                    href="{{ route('admin.about.edit') }}">

                    About Section

                </a>

                <a class="collapse-item
                        {{ request()->routeIs('admin.skills.*') ? 'active' : '' }}"
                    href="{{ route('admin.skills.index') }}">

                    Skills

                </a>

                <a class="collapse-item
                    {{ request()->routeIs('admin.services.*') ? 'active' : '' }}"
                    href="{{ route('admin.services.index') }}">

                    Services

                </a>

            </div>

        </div>

    </li>


    {{-- Other Content --}}
    <li class="nav-item">

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseContent"
            aria-expanded="false" aria-controls="collapseContent">

            <i class="fas fa-fw fa-folder"></i>

            <span>Other Content</span>

        </a>



        <div id="collapseContent" class="collapse" data-parent="#accordionSidebar">

            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}"
                    href="{{ route('admin.testimonials.index') }}">

                    Testimonials

                </a>

                <a class="collapse-item
    {{ request()->routeIs('admin.social-links.*') ? 'active' : '' }}"
                    href="{{ route('admin.social-links.index') }}">

                    Social Links

                </a>


                <a class="collapse-item
                    {{ request()->routeIs('admin.cta.*') ? 'active' : '' }}"
                    href="{{ route('admin.cta.edit') }}">

                    Call To Action

                </a>

            </div>

        </div>

    </li>

    {{-- Contact Messages --}}
    <li class="nav-item {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">

        <a class="nav-link" href="{{ route('admin.messages.index') }}">

            <i class="fas fa-fw fa-envelope"></i>

            <span>Messages</span>

        </a>

    </li>

    {{-- Site Settings --}}
    <li class="nav-item {{ request()->routeIs('admin.site-settings.*') ? 'active' : '' }}">

        <a class="nav-link" href="{{ route('admin.site-settings.edit') }}">

            <i class="fas fa-fw fa-cogs"></i>

            <span>Site Settings</span>

        </a>

    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Website
    </div>

    {{-- Home Page --}}
    <li class="nav-item">

        <a class="nav-link" href="{{ route('home') }}" target="_blank">

            <i class="fas fa-fw fa-home"></i>

            <span>View Home Page</span>

        </a>

    </li>

    {{-- Projects Page --}}
    <li class="nav-item {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProjects"
            aria-expanded="{{ request()->routeIs('admin.projects.*') ? 'true' : 'false' }}"
            aria-controls="collapseProjects">

            <i class="fas fa-fw fa-project-diagram"></i>

            <span>Projects</span>

        </a>

        <div id="collapseProjects" class="collapse {{ request()->routeIs('admin.projects.*') ? 'show' : '' }}"
            data-parent="#accordionSidebar">

            <div class="bg-white py-2 collapse-inner rounded">

                <h6 class="collapse-header">
                    Projects Management
                </h6>

                <a class="collapse-item" href="{{ route('projects.index') }}" target="_blank">

                    View Public Projects

                </a>

                <a class="collapse-item
                {{ request()->routeIs('admin.projects.index') ? 'active' : '' }}"
                    href="{{ route('admin.projects.index') }}">

                    Manage Projects

                </a>

                <a class="collapse-item
                {{ request()->routeIs('admin.projects.create') ? 'active' : '' }}"
                    href="{{ route('admin.projects.create') }}">

                    Add Project

                </a>

            </div>

        </div>

    </li>

    {{-- Contact Page --}}
    <li class="nav-item">

        <a class="nav-link" href="{{ route('contact') }}" target="_blank">

            <i class="fas fa-fw fa-paper-plane"></i>

            <span>View Contact Page</span>

        </a>

    </li>

    <hr class="sidebar-divider">

    {{-- Profile --}}
    <li class="nav-item {{ request()->routeIs('profile.*') ? 'active' : '' }}">

        <a class="nav-link" href="{{ route('profile.edit') }}">

            <i class="fas fa-fw fa-user"></i>

            <span>Profile</span>

        </a>

    </li>

    <hr class="sidebar-divider d-none d-md-block">

    {{-- Sidebar Toggle --}}
    <div class="text-center d-none d-md-inline">

        <button class="rounded-circle border-0" id="sidebarToggle" type="button">
        </button>

    </div>

</ul>
