<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
    <li class="nav-item @if(Request::is('home')) active @endif">
        <a href="{{ url('home') }}" class="nav-link ">
            <i class="nav-icon fas fa-home"></i>
            <p>
                Tableau de board
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    </li>
  
    <li class="nav-item @if(Request::is('admin/projets*')) active @endif">
        <a href="{{ url('admin/projets') }}" class="nav-link ">
            <i class="nav-icon fas fa-user"></i>
            <p>
            Projets
            <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    </li>

    <li class="nav-item @if(Request::is('admin/concours*')) active @endif">
        <a href="{{ url('admin/concours') }}" class="nav-link ">
            <i class="nav-icon fas fa-chalkboard-teacher"></i>
            <p>
            Concours
            <i class="right fas fa-angle-left"></i>
            </p>
        </a>
    </li>

    
</ul>