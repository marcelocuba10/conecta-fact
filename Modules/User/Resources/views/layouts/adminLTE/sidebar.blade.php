  <!-- ======== sidebar-nav start =========== -->
  <aside class="sidebar-nav-wrapper style-2">
    <div class="navbar-logo">
      <a href="/">
        <img src="/img/logo-300x90.png" alt="logo" width="175px" height="58px"/>
      </a>
    </div>
    <nav class="sidebar-nav">
      <ul>
        <li class="nav-item {{ (request()->is('user/dashboard')) ? 'active' : '' }}">
          <a href="/user/dashboard">
            <span class="icon">
              <svg width="22" height="22" viewBox="0 0 22 22">
                <path d="M17.4167 4.58333V6.41667H13.75V4.58333H17.4167ZM8.25 4.58333V10.0833H4.58333V4.58333H8.25ZM17.4167 11.9167V17.4167H13.75V11.9167H17.4167ZM8.25 15.5833V17.4167H4.58333V15.5833H8.25ZM19.25 2.75H11.9167V8.25H19.25V2.75ZM10.0833 2.75H2.75V11.9167H10.0833V2.75ZM19.25 10.0833H11.9167V19.25H19.25V10.0833ZM10.0833 13.75H2.75V19.25H10.0833V13.75Z" />
              </svg>
            </span>
            <span class="text">Dashboard</span>
          </a>
        </li>
        @can('financial-list')
        <li class="nav-item nav-item-has-children">
          <a aria-expanded="false" class="collapsed" id="ddlink_1" href="#" onclick="toggle('ddmenu_1', 'ddlink_1')">
            <span class="icon">
              <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                <path fill="currentColor" d="M21.04 12.13C21.18 12.13 21.31 12.19 21.42 12.3L22.7 13.58C22.92 13.79 22.92 14.14 22.7 14.35L21.7 15.35L19.65 13.3L20.65 12.3C20.76 12.19 20.9 12.13 21.04 12.13M19.07 13.88L21.12 15.93L15.06 22H13V19.94L19.07 13.88M11 19L9 21H5C3.9 21 3 20.1 3 19V5C3 3.9 3.9 3 5 3H9.18C9.6 1.84 10.7 1 12 1C13.3 1 14.4 1.84 14.82 3H19C20.1 3 21 3.9 21 5V9L19 11V5H17V7H7V5H5V19H11M12 3C11.45 3 11 3.45 11 4C11 4.55 11.45 5 12 5C12.55 5 13 4.55 13 4C13 3.45 12.55 3 12 3Z" />
              </svg>
            </span>
            <span class="text">Registros</span>
          </a>
          <ul id="ddmenu_1" class="dropdown-nav" style="{{ (request()->is('user/reports/*')) ? '' : 'display:none' }}">
            @can('customer-list')
            <li >
              <a href="/user/customers" class="{{ (request()->is('user/records/customers')) ? 'active' : '' }}">Cliente</a>
            </li>
            @endcan
            <li >
              <a href="/user/providers" class="{{ (request()->is('user/records/providers')) ? 'active' : '' }}">Proveedor</a>
            </li>
          </ul>
        </li>
        @endcan
        @can('financial-list')
        <li class="nav-item nav-item-has-children">
          <a aria-expanded="false" class="collapsed" id="ddlink_2" href="#" onclick="toggle('ddmenu_2', 'ddlink_2')">
            <span class="icon">
              <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                <path fill="currentColor" d="M11.5,1L2,6V8H21V6M16,10V17H19V10M2,22H21V19H2M10,10V17H13V10M4,10V17H7V10H4Z" />
              </svg>
            </span>
            <span class="text">Financiero</span>
          </a>
          <ul id="ddmenu_2" class="dropdown-nav" style="{{ (request()->is('user/reports/*')) ? '' : 'display:none' }}">
            <li >
              <a href="/user/reports/customers" class="{{ (request()->is('user/reports/customers')) ? 'active' : '' }}">Entrada</a>
            </li>
            <li >
              <a href="/user/reports/users" class="{{ (request()->is('user/reports/users')) ? 'active' : '' }}">Salida</a>
            </li>
          </ul>
        </li>
        @endcan
        <span class="divider">
          <hr />
        </span>
        @can('report-list')
        <li class="nav-item nav-item-has-children">
          <a aria-expanded="false" class="collapsed" id="ddlink_3" href="#" onclick="toggle('ddmenu_3', 'ddlink_3')">
            <span class="icon">
              <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                <path fill="currentColor" d="M19,3H14.82C14.25,1.44 12.53,0.64 11,1.2C10.14,1.5 9.5,2.16 9.18,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M12,3A1,1 0 0,1 13,4A1,1 0 0,1 12,5A1,1 0 0,1 11,4A1,1 0 0,1 12,3M7,7H17V5H19V19H5V5H7V7M17,11H7V9H17V11M15,15H7V13H15V15Z" />
              </svg>
            </span>
            <span class="text">Relatorios</span>
          </a>
          <ul id="ddmenu_3" class="dropdown-nav" style="{{ (request()->is('user/reports/*')) ? '' : 'display:none' }}">
            <li >
              <a href="/user/reports/customers" class="{{ (request()->is('user/reports/customers')) ? 'active' : '' }}">Clientes</a>
            </li>
            <li >
              <a href="/user/reports/users" class="{{ (request()->is('user/reports/users')) ? 'active' : '' }}">Funcionarios</a>
            </li>
          </ul>
        </li>
        @endcan

        <span class="divider">
          <hr />
        </span>

        <li class="nav-item nav-item-has-children">
          <a aria-expanded="false" class="collapsed" id="ddlink_4" href="#" onclick="toggle('ddmenu_4', 'ddlink_4')">
            <span class="icon">
              <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                <path fill="currentColor" d="M12,15.5A3.5,3.5 0 0,1 8.5,12A3.5,3.5 0 0,1 12,8.5A3.5,3.5 0 0,1 15.5,12A3.5,3.5 0 0,1 12,15.5M19.43,12.97C19.47,12.65 19.5,12.33 19.5,12C19.5,11.67 19.47,11.34 19.43,11L21.54,9.37C21.73,9.22 21.78,8.95 21.66,8.73L19.66,5.27C19.54,5.05 19.27,4.96 19.05,5.05L16.56,6.05C16.04,5.66 15.5,5.32 14.87,5.07L14.5,2.42C14.46,2.18 14.25,2 14,2H10C9.75,2 9.54,2.18 9.5,2.42L9.13,5.07C8.5,5.32 7.96,5.66 7.44,6.05L4.95,5.05C4.73,4.96 4.46,5.05 4.34,5.27L2.34,8.73C2.21,8.95 2.27,9.22 2.46,9.37L4.57,11C4.53,11.34 4.5,11.67 4.5,12C4.5,12.33 4.53,12.65 4.57,12.97L2.46,14.63C2.27,14.78 2.21,15.05 2.34,15.27L4.34,18.73C4.46,18.95 4.73,19.03 4.95,18.95L7.44,17.94C7.96,18.34 8.5,18.68 9.13,18.93L9.5,21.58C9.54,21.82 9.75,22 10,22H14C14.25,22 14.46,21.82 14.5,21.58L14.87,18.93C15.5,18.67 16.04,18.34 16.56,17.94L19.05,18.95C19.27,19.03 19.54,18.95 19.66,18.73L21.66,15.27C21.78,15.05 21.73,14.78 21.54,14.63L19.43,12.97Z" />
              </svg>
            </span>
            <span class="text">Ajustes</span>
          </a>
          <ul id="ddmenu_4" class="dropdown-nav" style="{{ (request()->is('user/users')) || (request()->is('user/ACL/*')) ? '' : 'display:none'}}">
            @can('user-list')
            <li>
              <a href="/user/users" class="{{ (request()->is('user/users')) ? 'active' : '' }}">
                <span class="text">Usuarios</span>
              </a>
            </li>
            @endcan
            @can('role-list','permission-list')
            <li>
              <a aria-expanded="false" class="collapsed" id="ddlink_5" href="#" onclick="toggle('ddmenu_5', 'ddlink_5')">
                <span class="text">ACL</span>
              </a>
              <ul id="ddmenu_5" class="dropdown-nav" style="{{ (request()->is('user/ACL/*')) ? '' : 'display:none' }}">
                @can('role-list')
                <li>
                  <a href="/user/ACL/roles" class="{{ (request()->is('user/ACL/roles')) ? 'active' : '' }}"><span class="text">Roles</span></a>
                </li>
                @endcan
                @can('permission-list')
                <li>
                  <a href="/user/ACL/permissions" class="{{ (request()->is('user/ACL/permissions')) ? 'active' : '' }}"><span class="text">Permisos</span></a>
                </li>
                @endcan
              </ul>
            </li>
            @endcan
          </ul>
        </li>
      </ul>
    </nav>
  </aside>
  <div class="overlay"></div>  
  <!-- ======== sidebar-nav end =========== -->

  <script type="text/javascript">
    function toggle(ddmenu_1, ddlink_1) {
      var n = document.getElementById(ddmenu_1);
      if (n.style.display != 'none'){
        n.style.display = 'none';
        document.getElementById(ddlink_1).setAttribute('aria-expanded', 'false');
      }else{
        n.style.display = '';
        document.getElementById(ddlink_1).setAttribute('aria-expanded', 'true');
      }
    }
    function toggle(ddmenu_2, ddlink_2) {
      var n = document.getElementById(ddmenu_2);
      if (n.style.display != 'none'){
        n.style.display = 'none';
        document.getElementById(ddlink_2).setAttribute('aria-expanded', 'false');
      }else{
        n.style.display = '';
        document.getElementById(ddlink_2).setAttribute('aria-expanded', 'true');
      }
    }
    function toggle(ddmenu_3, ddlink_3) {
      var n = document.getElementById(ddmenu_3);
      if (n.style.display != 'none'){
        n.style.display = 'none';
        document.getElementById(ddlink_3).setAttribute('aria-expanded', 'false');
      }else{
        n.style.display = '';
        document.getElementById(ddlink_3).setAttribute('aria-expanded', 'true');
      }
    }
    function toggle(ddmenu_4, ddlink_4) {
      var n = document.getElementById(ddmenu_4);
      if (n.style.display != 'none'){
        n.style.display = 'none';
        document.getElementById(ddlink_4).setAttribute('aria-expanded', 'false');
      }else{
        n.style.display = '';
        document.getElementById(ddlink_4).setAttribute('aria-expanded', 'true');
      }
    }
    function toggle(ddmenu_5, ddlink_5) {
      var n = document.getElementById(ddmenu_5);
      if (n.style.display != 'none'){
        n.style.display = 'none';
        document.getElementById(ddlink_5).setAttribute('aria-expanded', 'false');
      }else{
        n.style.display = '';
        document.getElementById(ddlink_5).setAttribute('aria-expanded', 'true');
      }
    }
  </script>