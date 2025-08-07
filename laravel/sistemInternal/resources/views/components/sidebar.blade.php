  <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
          <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                  <div class="nav-profile-image">
                      <img src="{{ asset('storage/foto_profil/' . (Auth::user()->detail->first()->foto_profil ?? 'foto_profil.png')) }}" alt="image" />
                      <span class="login-status online"></span>
                      <!--change to offline or busy as needed-->
                  </div>
                  <div class="nav-profile-text d-flex flex-column">
                      <span class="font-weight-bold mb-2">{{Auth::user()->nama}}</span>
                      <span class="text-secondary text-small">{{Auth::user()->role->role_name}}|{{Auth::user()->divisi->nama_divisi }}
                      </span>
                  </div>
                  <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="/dasboard">
                  <span class="menu-title">Dashboard</span>
                  <i class="mdi mdi-home menu-icon"></i>
              </a>
          </li>
          <!-- <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                  <span class="menu-title">Basic UI Elements</span>
                  <i class="menu-arrow"></i>
                  <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                          <a class="nav-link" href="../../pages/ui-features/buttons.html">Buttons</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="../../pages/ui-features/dropdowns.html">Dropdowns</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="../../pages/ui-features/typography.html">Typography</a>
                      </li>
                  </ul>
              </div>
          </li> -->
          @foreach($menu as $key => $value)
          <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#{{ $key }}" aria-expanded="false" aria-controls="icons">
                  <span class="menu-title">{{ $key }}</span>
                  <i class="mdi mdi-contacts menu-icon"></i>
              </a>
              <div class="collapse" id="{{ $key }}">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                          <a class="nav-link" href="{{ $value }}">{{ $key }}</a>
                      </li>
                  </ul>
              </div>
          </li>
          @endforeach
      </ul>
  </nav>