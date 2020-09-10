@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

<!-- Menu -->

<div class="menu">

	<!-- Search -->
	<div class="menu_search">
		<form action="#" id="menu_search_form" class="menu_search_form">
			<input type="text" class="search_input" placeholder="Search Item" required="required">
			<button class="menu_search_button"><img src="images/search.png" alt=""></button>
		</form>
	</div>
	<!-- Navigation -->
	<div class="menu_nav">
		<ul>
			<li><a href="#">Women</a></li>
			<li><a href="#">Men</a></li>
			<li><a href="#">Kids</a></li>
			<li><a href="#">Home Deco</a></li>
			<li><a href="#">Contact</a></li>
		</ul>
	</div>
	<!-- Contact Info -->
	<div class="menu_contact">
		<div class="menu_phone d-flex flex-row align-items-center justify-content-start">
			<div><div><img src="images/phone.svg" alt="https://www.flaticon.com/authors/freepik"></div></div>
			<div>+1 912-252-7350</div>
		</div>
		<div class="menu_social">
			<ul class="menu_social_list d-flex flex-row align-items-start justify-content-start">
				<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
			</ul>
		</div>
	</div>
</div>

<div class="super_container">

	<!-- Header -->


	<div class="super_container_inner">
		<div class="super_overlay"></div>

		<!-- Product -->

		<div class="product">
			<div class="container">
				<div class="row">
					
					<!-- Product Image -->
					<div class="col-lg-6">
						<div class="product_image_slider_container">
							<div id="slider" class="flexslider">
								<ul class="slides">
									<li>
										<img src="{{ asset('images/'.$product->image) }}" />
									</li>
								</ul>
							</div>
						</div>
					</div>

					<!-- Product Info -->
					<div class="col-lg-6 product_col">
						<form action="{{ url('product') }}" method="post" id="submitProduct">
							@csrf
							<div class="product_info">
								<input type="hidden" name="id" value="{{ $product->id }}">
								<input type="hidden" name="price" value="{{ $product->price }}">
								<input type="hidden" name="image" value="{{ $product->image }}">
								<div class="product_name">{{ $product->name }}</div>
								<div class="product_price" attr-price="{{ $product->price }}">${{ $product->price }}</div>
								<div class="product_size">
									<div class="product_size_title">Select Size</div>
									<ul class="d-flex flex-row align-items-start justify-content-start">
										<?php $i=1; ?>
										@foreach($product->sizes as $size)
											<li>
												<input type="radio" id="radio_{{ $i }}" name="size" class="regular_radio size_radio radio_{{ $i }}  @error('size') is-invalid @enderror" value="{{ $size->size_name }}" required>
												<label for="radio_{{ $i }}">{{ $size->size_name }}</label>
											</li>
											<?php $i++; ?>
										@endforeach
									</ul>
									@error('size')
	                                    <span class="invalid-feedback" role="alert" style="display: block;">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
								</div>
								<div class="product_size">
									<div class="product_size_title">Select Color</div>
									<ul class="d-flex flex-row align-items-start justify-content-start">
										<li>
											<input type="radio" id="radio_color_1" name="color" class="regular_radio size_radio radio_color_1 @error('color') is-invalid @enderror" value="Blue" required>
											<label for="radio_color_1">Blue</label>
										</li>
										<li>
											<input type="radio" id="radio_color_2" name="color" class="regular_radio size_radio radio_color_2 @error('color') is-invalid @enderror" value="White" required>
											<label for="radio_color_2">White</label>
										</li>
									</ul>
									@error('color')
	                                    <span class="invalid-feedback" role="alert" style="display: block;">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
								</div>
								<div class="product_size_title">Quantity</div>
								<div class="num-block skin-1">
									<div class="num-in">
										<span class="minus dis"></span>
										<input type="text" class="in-num" name="quantity" value="1" readonly="">
										<span class="plus"></span>
									</div>
								</div>
								<div class="product_text">
									<p>{{ $product->description }}</p>
								</div>
								<div class="product_buttons">
									<div class="text-right d-flex flex-row align-items-start justify-content-start">
										<div class="product_button product_cart text-center d-flex flex-column align-items-center justify-content-center">
											<div><div><img src="{{ asset('images/cart.svg') }}" class="svg" alt="" ><div>+</div></div></div>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
		
</div>

@endsection