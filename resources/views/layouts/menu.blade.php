<header>
  <!-- Toolbar -->
  <div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper">        
        <a href="/" class="brand-logo left hide-on-med-and-down">AMPUERO S.A.C.</a>
        <a href="/" class="brand-logo center hide-on-large-only">AMPUERO S.A.C.</a>
        <a href="#" data-activates="NavMobile" class="button-collapse hide-on-large-only" onclick="return false;">
          <i class="material-icons">menu</i>
        </a>
        <ul class="right show-on-med-and-down">
          <li>
            <a class="dropdown-button" href="#!" data-activates="MoreOptions">
              <i class="material-icons">more_vert</i>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
  <!-- EndToolbar -->
  <!-- Dropdown MoreOptions -->
  <ul id="MoreOptions" class="dropdown-content">
    <li><a href="#!">Ver perfil</a></li>
    <li class="divider"></li>
    <li>
      <a href="#!" data-target="ModalSignOut">
        Salir
      </a>
    </li>
  </ul>
  <!-- EndDropdown MoreOptions -->
  <!-- Menu -->
  <ul id="NavMobile" class="side-nav fixed">
    <li>
      <div class="userView">
        <div class="background">
          <img src="/images/bg-user-profile-a.jpg">
        </div>
        <a href="/my-profile"><img class="circle" src="{{ url('images/user/200x200') }}/{{ Auth::user()->avatar }}" title="{{ Auth::user()->name }}"></a>
        <a href="/my-profile"><span class="white-text name">{{ Auth::user()->username }}</span></a>
        <a href="/my-profile"><span class="white-text email">{{ Auth::user()->email }}</span></a>
      </div>
    </li>
    <li><a href="/"><i class="material-icons">home</i>Inicio</a></li>
    <li class="@if (strpos($_SERVER["REQUEST_URI"], 'user')) active @endif">
      <a href="/user">
        <i class="material-icons">perm_identity</i>Usuarios
      </a>
    </li>
    <li class="@if (strpos($_SERVER["REQUEST_URI"], 'staff')) active @endif">
      <a href="/staff">
        <i class="material-icons">supervisor_account</i>Personal
      </a>
    </li>
    <li class="@if (strpos($_SERVER["REQUEST_URI"], 'client')) active @endif">
      <a href="/client">
        <i class="material-icons">location_city</i>Clientes
      </a>
    </li>
    <li class="@if (strpos($_SERVER["REQUEST_URI"], 'product')) active @endif">
      <a href="/product">
        <i class="material-icons">loyalty</i>Productos
      </a>
    </li>
    <li class="@if (strpos($_SERVER["REQUEST_URI"], 'report')) active @endif">
      <a href="/report">
        <i class="material-icons">trending_up</i>Reportes
      </a>
    </li>
    <li><div class="divider"></div></li>    
    <li class="@if (strpos($_SERVER["REQUEST_URI"], 'maintenance')) active @endif">
      <a href="/maintenance">
        <i class="material-icons">build</i>Mantenimiento
      </a>
    </li>
    <li>
      <a href="#!" data-target="ModalSignOut">
        <i class="material-icons">exit_to_app</i>
        Salir
      </a>
    </li>
  </ul>
  <!-- EndMenu -->

  <!-- ModalSignOut -->
  <div id="ModalSignOut" class="modal red darken-4 white-text">
    <div class="modal-content">
      <h4>Cerrar sesión</h4>
      <p>¿Esta seguro que desea cerrar sesión?</p>
    </div>
    <div class="modal-footer red darken-3">      
      <button class="modal-action modal-close waves-effect btn-flat white-text" type="button">
        Cancelar
      </button>
      <a href="{{ route('logout') }}" class="modal-action modal-close waves-effect btn-flat white-text" onclick="event.preventDefault(); document.getElementById('LogoutForm').submit();">
        Aceptar
      </a>
      <form id="LogoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
       {{ csrf_field() }}
      </form>
    </div>
  </div>
  <!-- EndModalSignOut -->
          
</header>
<main>
  @yield('container')  
</main>
