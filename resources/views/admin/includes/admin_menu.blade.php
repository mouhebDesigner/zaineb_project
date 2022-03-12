<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
    <li class="nav-item @if(Request::is('home')) active @endif">
        <a href="{{ url('home') }}" class="nav-link ">
            <i class="nav-icon fas fa-home"></i>
            <p>
                Acceuil
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    </li>
  
    <li class="nav-item @if(Request::is('admin/users*')) active @endif">
        <a href="{{ url('admin/users') }}" class="nav-link ">
            <i class="nav-icon fas fa-user"></i>
            <p>
            Liste d'inscription
            <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    </li>
    <li class="nav-item @if(Request::is('admin/enseignants*')) active @endif">
        <a href="{{ url('admin/enseignants') }}" class="nav-link ">
            <i class="nav-icon fas fa-user"></i>
            <p>
            Liste des enseignants
            <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    </li>
    <li class="nav-item @if(Request::is('admin/concours*')) active @endif">
        <a href="{{ url('admin/concours') }}" class="nav-link ">
            <i class="nav-icon fas fa-chalkboard-teacher"></i>
            <p>
            Gérer les concours
            <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    </li>
    <li class="nav-item @if(Request::is('admin/prix*')) active @endif">
        <a href="{{ url('admin/prix') }}" class="nav-link ">
            <i class="nav-icon fas fa-user"></i>
            <p>
            Gérer les prix
            <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    </li>
</ul>