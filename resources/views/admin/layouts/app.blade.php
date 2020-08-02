<!DOCTYPE html>
<html>
<head>
	@include('admin/layouts/head')
</head>
<body class="hold-transition skin-blue sidebar-mini">

	<div class="wrapper">
	
	@include('admin/layouts/header')

	@include('admin/layouts/sidebar')

	@yield('main-content')

	@include('admin/layouts/footer')

	</div>
	@include('admin/layouts/scripts')
</body>
@stack('cust-script')
</html>