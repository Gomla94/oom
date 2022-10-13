<!-- start footer -->
<div class="page-footer">
		<div class="page-footer-inner"> 2022 &copy;
			<a href="https://www.websolla.com" target="_top" class="makerCss">Websolla</a>
		</div>
		<div class="scroll-to-top">
			<i class="icon-arrow-up"></i>
		</div>
	</div>
	<!-- end footer -->
	<!-- start js include path -->
	<script src="{{ asset('asset/website/assets/plugins/jquery/jquery.min.js') }}"></script>
	
	<script src="{{ asset('asset/website/assets/plugins/popper/popper.min.js') }}"></script>
	<script src="{{ asset('asset/website/assets/plugins/jquery-blockui/jquery.blockui.min.js') }}"></script>
    <script src="{{ asset('asset/website/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>

	<!-- bootstrap -->
	<script src="{{ asset('asset/website/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

	<script src="{{ asset('asset/website/assets/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
	<script src="{{ asset('asset/website/assets/js/pages/sparkline/sparkline-data.js') }}"></script>
	
	<!-- Common js-->
	<script src="{{ asset('asset/website/assets/js/app.js') }}"></script>
	<script src="{{ asset('asset/website/assets/js/layout.js') }}"></script>
	<script src="{{ asset('asset/website/assets/js/theme-color.js') }}"></script>
	<!-- material -->
	<script src="{{ asset('asset/website/assets/plugins/material/material.min.js') }}"></script>
	<!-- animation -->
	<script src="{{ asset('asset/website/assets/js/pages/ui/animations.js') }}"></script>
	<!-- morris chart -->
	<script src="{{ asset('asset/website/assets/plugins/morris/morris.min.js') }}"></script>
	<script src="{{ asset('asset/website/assets/plugins/morris/raphael-min.js') }}"></script>
	<script src="{{ asset('asset/website/assets/js/pages/chart/morris/morris_home_data.js') }}"></script>
	<script src="https://vjs.zencdn.net/7.20.2/video.min.js"></script>
  <script src="{{ asset('asset/youtube/dist/Youtube.min.js')}}"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
 					 @if ($errors->any())
						
								

								{{-- {{dd($errors->all())}} --}}
									@foreach ($errors->all() as $error)
									<script>
									toastr.warning('{{ $error }}');
									</script>
									
									@endforeach
					  
							
						 @endif
					  
							@if (\Session::has('success'))
							<script>
							toastr.success('{!! \Session::get('success') !!}')''
							</script>

									
									
							@endif
@stack('scripts')

	<script type="text/javascript">
	
		

			$('.kind').first().addClass('active');
			$('.kind').first().attr('aria-selected', 'true');
			
			$('.kinds').first().addClass('show active');

			$(document).on('click', '.replyy', function(e){

				e.preventDefault();
				$(this).next(".myrply").fadeToggle();
			});
	
 
	
	
</script>
	<!-- end js include path -->

</body>

</html>
