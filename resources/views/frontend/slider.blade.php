
<section id="slider"><!--slider-->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div id="slider-carousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
						<li data-target="#slider-carousel" data-slide-to="1"></li>
						<li data-target="#slider-carousel" data-slide-to="2"></li>
					</ol>
						
				<div class="carousel-inner">
					@foreach($banners as $key => $bann)
					<div class="item @if($key == 0) active @endif">
						<img src="{{ $bann-> banner_path }}" height="60%" width="60%" class="img-responsive" alt="" />
					</div>
					@endforeach	
				</div>
						
				<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
					<i class="fa fa-angle-left"></i>
				</a>
				<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
					<i class="fa fa-angle-right"></i>
				</a>
			</div>
					
		</div>
	</div>
</div>
</section><!--/slider-->
