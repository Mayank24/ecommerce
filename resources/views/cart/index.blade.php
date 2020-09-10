@extends('layouts.app')

@section('content')
<div class="container">
	<div class="super_container_inner">
		<div class="super_overlay"></div>

		<!-- Home -->

		<div class="home">
			<div class="home_container d-flex flex-column align-items-center justify-content-end">
				<div class="home_content text-center">
					<div class="home_title">Shopping Cart</div>
					<div class="breadcrumbs d-flex flex-column align-items-center justify-content-center">
						<ul class="d-flex flex-row align-items-start justify-content-start text-center">
							<li><a href="#">Home</a></li>
							<li>Your Cart</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- Cart -->

		<div class="cart_section">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="cart_container">
							@if (\Cart::isEmpty())
		                        <p class="alert alert-warning">Your shopping cart is empty.</p>
		                    @else
								<!-- Cart Bar -->
								<div class="cart_bar">
									<ul class="cart_bar_list item_list d-flex flex-row align-items-center justify-content-end">
										<li class="mr-auto">Product</li>
										<li>Color</li>
										<li>Size</li>
										<li>Price</li>
										<li>Quantity</li>
										<li>Total</li>
										<li></li>
									</ul>
								</div>

								<!-- Cart Items -->
								<div class="cart_items">
									<ul class="cart_items_list">
										<?php $i = 1; ?>
										@foreach(\Cart::getContent() as $item)
											<!-- Cart Item -->
											<li class="cart_item item_list d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-lg-end justify-content-start">
												<div class="product d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start mr-auto">
													<div><div class="product_number">{{ $i }}</div></div>
													<div><div class="product_image"><img src="{{ asset('images/'.$item->attributes->image) }}" alt=""></div></div>
													<div class="product_name_container">
														<div class="product_name"><a href="product.html">{{ $item->name }}</a></div>
														<div class="product_text">Second line for additional info</div>
													</div>
												</div>
												<div class="product_color product_text"><span>Color: </span>{{ $item->attributes->color }}</div>
												<div class="product_size product_text"><span>Size: </span>{{ $item->attributes->size }}</div>
												<div class="product_price product_text"><span>Price: </span>${{ $item->price }}</div>
												<div class="product_quantity_container">
													<div class="product_quantity ml-lg-auto mr-lg-auto text-center">
														<input type="hidden" value="{{ $item->price }}" class="price">
														<input type="hidden" value="{{ $i }}" class="order_id">
														<span class="product_text product_num">{{ $item->quantity }}</span>
														<div class="qty_sub qty_button trans_200 text-center"><span>-</span></div>
														<div class="qty_add qty_button trans_200 text-center"><span>+</span></div>
													</div>
												</div>
												<div class="product_total_{{$i}} product_text subtotalprice" attr-price="{{ $item->price * $item->quantity }}">${{ $item->price * $item->quantity }}</div>
												<a href="{{ route('checkout.cart.remove', $item->id) }}" class="btn btn-outline-danger"><i class="fa fa-times"></i> </a>
											</li>
											<?php $i++; ?>
										@endforeach
									</ul>
								</div>
							@endif

							<!-- Cart Buttons -->
							<div class="cart_buttons d-flex flex-row align-items-start justify-content-start">
								<div class="cart_buttons_inner ml-sm-auto d-flex flex-row align-items-start justify-content-start flex-wrap">
									<div class="button button_clear trans_200"><a href="{{ route('checkout.cart.clear') }}">clear cart</a></div>
									<div class="button button_continue trans_200"><a href="{{ url('/') }}">continue shopping</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row cart_extra_row">
					<div class="col-lg-12 cart_extra_col">
						<div class="cart_extra cart_extra_2">
							<div class="cart_extra_content cart_extra_total">
								<div class="cart_extra_title">Cart Total</div>
								<ul class="cart_extra_total_list">
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Subtotal</div>
										<div class="cart_extra_total_value ml-auto extra_subtotal"></div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Shipping</div>
										<div class="cart_extra_total_value ml-auto">Free</div>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div class="cart_extra_total_title">Total</div>
										<div class="cart_extra_total_value ml-auto extra_total"></div>
									</li>
								</ul>
								<div class="checkout_button trans_200"><a href="#">proceed to checkout</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection