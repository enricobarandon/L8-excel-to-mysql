<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Lucky 8 WPC') }}</title>


    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <!-- <a href="/home" class="nav-link">Home</a> -->
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      

    <form 
              action="/logout"
              method="post">
              <!-- <span class="text-sm">Log out</span> -->
              @csrf
              <button type="submit" class="btn btn-danger">Log out</button>
            </form>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <h3 class="brand-text font-weight-light">LUCKY 8</h3>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/default-150x150.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          @if($userType == 'Administrator')
          <a href="#" class="d-block">Admin</a>
          @else
          <a href="#" class="d-block">User</a>
          @endif
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
          <li class="nav-item">
            <a href="/home" class="nav-link active">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          @if($userType == 'Administrator')
          <li class="nav-item">
            <a href="/users" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <main class="py-4">
                @yield('content')
            </main>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

</div>
<!-- ./wrapper -->
    </div>
</body>



<!-- Scripts -->
<!-- jQuery -->
<script src="{{ asset('js/jquery.min.js') }}" ></script>
<script src="{{ asset('js/bootstrap.min.js') }}" ></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script type="text/javascript">
    $( function() {
		var dateFormat = "mm/dd/yy",
			from = $( "#from" )
				.datepicker({
					changeMonth: true,
					numberOfMonths: 1
				})
				.on( "change", function() {
					to.datepicker( "option", "minDate", getDate( this ) );
				}),
			to = $( "#to" ).datepicker({
				defaultDate: "+1w",
				changeMonth: true,
				numberOfMonths: 1,
        maxDate: 0
			})
			.on( "change", function() {
				from.datepicker( "option", "maxDate", getDate( this ) );
			});

		function getDate( element ) {
			var date;
			try {
				date = $.datepicker.parseDate( dateFormat, element.value );
			} catch( error ) {
				date = null;
			}

			return date;
		}
	} );
</script>

</html>
