  @extends('template')
  
  @section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="container">
  <div class="modal-dialog">
    <!-- Content Header (Page header) -->
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="javascript:history.back()">&times;</button>
            <h4><i class="icon fa fa-ban"></i>Alert! 404</h4>

        <div class="error-content">
          <h3><i class="fa fa-warning"></i> Oops! Page not found.</h3>

          <p>
            We could not find the page you were looking for.
            Meanwhile, you may <a href="/">return to dashboard</a> or try using the search form.
          </p>
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </div>
  </div>
  <!-- /.content-wrapper -->
  @stop