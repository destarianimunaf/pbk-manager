<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      @if(Auth::check())
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
         <img src="{{ asset('img/amnesti.jpg') }}" class="img-circle" alt="User Image" width="60">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <i class="fa fa-circle text-success"></i> Online
        </div>
      </div>
      @endif

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

        <!-- Bagian Homepage -->
        @if(empty($halaman))
          <li class="active">
            <a href="{{ url('/') }}">
              <i class="fa fa-dashboard"></i> 
              <span>Homepage</span>
            </a>
        @else
          <li>
            <a href="{{ url('/') }}">
              <i class="fa fa-dashboard"></i> 
              <span>Homepage</span>
            </a>
        @endif
        </li>


        <!-- Kotak Masuk -->
        @if (Auth::check() && Auth::user()->level == 'operator')
          @if(empty($halaman))
            <li>
              <a href="{{ url('mailbox/create') }}">
                <i class="fa fa-comments"></i> 
                <span>Buat Pesan</span>
              </a>
          @else
            <li>
              <a href="{{ url('mailbox/create') }}">
                <i class="fa fa-comments"></i> 
                <span>Buat Pesan</span>
              </a>
          @endif
        @endif
        </li>

        <!-- Halaman Register -->
        @if(Auth::check() && Auth::user()->level == 'admin')
          @if (!empty($halaman) && $halaman == 'register')
          <li class="treeview">
            <a href="#">
              <i class="fa fa-book"></i>
              <span>Register PBK</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ url('register/create') }}"><i class="fa fa-plus-square"></i> Tambah Register</a></li>
              <li><a href="{{ url('register') }}"><i class="fa fa-list"></i> Daftar Register</a></li>
            </ul>
          </li>
          @else
          <li class="treeview">
            <a href="#">
              <i class="fa fa-book"></i>
              <span>Register PBK</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ url('register/create') }}"><i class="fa fa-plus-square"></i> Tambah Register</a></li>
              <li><a href="{{ url('register') }}"><i class="fa fa-list"></i> Daftar Register</a></li>
            </ul>
          </li>
          @endif
        @elseif (Auth::check() && Auth::user()->level == 'operator')
          @if(empty($halaman))
              <li>
                <a href="{{ url('register') }}">
                  <i class="fa fa-file-text-o"></i> 
                  <span>Daftar Register</span>
                </a>
            @else
              <li>
                <a href="{{ url('register') }}">
                  <i class="fa fa-file-text-o"></i> 
                  <span>Daftar Register</span>
                </a>
            @endif
          </li>
        @endif

        <!-- Halaman Pemindahbukuan -->
        @if(Auth::check() && Auth::user()->level == 'admin')
          @if (!empty($halaman) && $halaman == 'pbk')
          <li class="treeview">
            <a href="#">
              <i class="fa fa-laptop"></i>
              <span>Pemindahbukuan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ url('pbk/create') }}"><i class="fa fa-plus-square"></i> Tambah Pbk</a></li>
              <li><a href="{{ url('pbk') }}"><i class="fa fa-list-ol"></i> Daftar Pemindahbukuan</a></li>
            </ul>
          </li>
          @else
          <li class="treeview">
            <a href="#">
              <i class="fa fa-laptop"></i>
              <span>Pemindahbukuan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ url('pbk/create') }}"><i class="fa fa-plus-square"></i> Tambah Pbk</a></li>
              <li><a href="{{ url('pbk') }}"><i class="fa fa-list-ol"></i> Daftar Pemindahbukuan</a></li>
            </ul>
          </li>
          @endif
        @elseif (Auth::check() && Auth::user()->level == 'operator')
          @if (!empty($halaman) && $halaman == 'pbk')
          <li class="active">
          <a href=" {{ url('pbk') }} ">
            <i class="fa fa-list-ol"></i> 
              <span>Pemindahbukuan</span>
            </a>
          @else
          <li>
          <a href=" {{ url('pbk') }} ">
            <i class="fa fa-list-ol"></i> 
              <span>Pemindahbukuan</span>
            </a>
          @endif
        </li>
        @endif

        <!-- Halaman Wajib Pajak -->
        @if(Auth::check() && Auth::user()->level == 'admin')
          @if (!empty($halaman) && $halaman == 'wp')
          <li class="treeview">
            <a href="#">
              <i class="fa fa-paste"></i>
              <span>Wajib Pajak</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ url('wp/create') }}"><i class="fa fa-plus-square"></i> Tambah Daftar</a></li>
              <li><a href="{{ url('wp') }}"><i class="fa fa-male"></i> Daftar Wajib Pajak</a></li>
            </ul>
          </li>
          @else
          <li class="treeview">
            <a href="#">
              <i class="fa fa-paste"></i>
              <span>Wajib Pajak</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ url('wp/create') }}"><i class="fa fa-plus-square"></i> Tambah Daftar</a></li>
              <li><a href="{{ url('wp') }}"><i class="fa fa-male"></i> Daftar Wajib Pajak</a></li>
            </ul>
          </li>
          @endif
        @elseif (Auth::check() && Auth::user()->level == 'operator')
          @if (!empty($halaman) && $halaman == 'wp')
            <li class="active">
            <a href=" {{ url('wp') }} ">
              <i class="fa fa-user"></i> 
                <span>Daftar Wajib Pajak</span>
              </a>
            @else
            <li>
            <a href=" {{ url('wp') }} ">
              <i class="fa fa-user"></i> 
                <span>Daftar Wajib Pajak</span>
              </a>
            @endif
          </li>
        @endif

        <!-- Halaman user -->
        @if(Auth::check() && Auth::user()->level == 'admin')
          @if (!empty($halaman) && $halaman == 'user')
          <li class="active">
          <a href=" {{ url('user') }} ">
            <i class="fa fa-user"></i> 
              <span>User Setting</span>
          </a>
          @else
          <li>
          <a href=" {{ url('user') }} ">
            <i class="fa fa-user"></i> 
              <span>User Setting</span>
          </a>
          @endif
        </li>
        @endif

        <!-- Halaman About -->
        @if (!empty($halaman) && $halaman == 'about')
          <li class="active">
          <a href=" {{ url('about') }} ">
            <i class="fa fa-info-circle"></i> 
              <span>Help</span>
            </a>
          @else
          <li>
          <a href=" {{ url('about') }} ">
            <i class="fa fa-info-circle"></i> 
              <span>Help</span>
            </a>
          @endif
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>