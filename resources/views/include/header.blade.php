  <header class="main-header">
    <!-- Logo -->
    <a href=" {{ url('/') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>PBK</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>PBK</b> Manajer </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

        <ul class="nav navbar-nav">
        @if (Auth::check())
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Kotak Pesan <span class="caret"></span></a>
        @endif
          <ul class="dropdown-menu" role="menu">
          @if(Auth::check() && Auth::user()->level == 'admin')
            <li><a href="{{ url('mailbox') }}">Kotak Masuk</a></li>
          @elseif(Auth::check() && Auth::user()->level == 'operator')
            <li><a href="{{ url('mailbox/create') }}">Buat Pesan</a></li>
          @endif
            
          </ul>
        </li>
      </ul>
          
        @if (Auth::check())
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('img/amnesti.jpg') }}" class="user-image" alt="User Image">
              <span class="hidden-xs"> {{ Auth::user()->name }} </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('img/amnesti.jpg') }}" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->name }}
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  {{ link_to('reset', 'Password', ['class' => 'btn btn-default btn-flat']) }}
                </div>
                <div class="pull-right">
                  {{ link_to('logout', 'Logout', ['class' => 'btn btn-default btn-flat']) }}
                </div>
              </li>
            </ul>
          </li>
          @else
          <li>
            <a href="{{ url('login') }} " title="Login"><i class="fa fa-user"></i>&nbsp; Login</a>
          </li>
          @endif

          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>

        </ul>
      </div>
    </nav>
  </header>

  {{-- Panggil control-sidebar --}}
  @include('include.control-sidebar')