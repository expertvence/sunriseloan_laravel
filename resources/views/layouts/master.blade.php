<!DOCTYPE html>
<html lang="en">
@include('layouts.head')

<body class="sb-nav-fixed mainContant">
	
		@include('layouts.header')
		<div id="layoutSidenav">
			<div id="layoutSidenav_nav">
				@include('layouts.sideber')
			</div>
			<div id="layoutSidenav_content">
				<div class="{{auth()->user() ? 'content-wrapper' : ''}}">
					<main id="page-content">
						<!-- @yield('content') -->
					</main>
				</div>
				<footer class="py-4 bg-light mt-auto">
					<div class="container-fluid px-4">
						<div class="d-flex align-items-center justify-content-between small">
							<div class="text-muted">Copyright &copy; <span id="year-show"></span> <strong>Powered By - [Md Sagor Hossain]</strong></div>
							<div>
								<a href="#">Privacy Policy</a>
								&middot;
								<a href="#">Terms &amp; Conditions</a>
							</div>
						</div>
					</div>
				</footer>
			</div>
		</div>
	
	@include('layouts.open_modal')
	@include('layouts.footer')

</body>

</html>
<script>
	let YearShow= new Date().getFullYear();
	document.getElementById('year-show').textContent=YearShow;
</script>