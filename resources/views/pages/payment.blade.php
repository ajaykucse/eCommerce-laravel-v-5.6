@extends('layout')
@section('content')
<section id="cart_items">
		<div class="col-sm-12">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<?php
                     $contents=Cart::content();

				?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Image</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($contents as $v_contents) {?>
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to($v_contents->options->image)}}" height="80px" width="80px" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$v_contents->name}}</a></h4>
								
							</td>
							<td class="cart_price">
								<p>{{$v_contents->price}}</p>
							</td>
							<td class="cart_quantity">
							<div class="cart_quantity_button">
								<form action="{{url('/update-cart')}}" method="post">
									{{ csrf_field()}}
									<input class="cart_quantity_input" type="text" name="qty" value="{{$v_contents->qty}}" autocomplete="off" size="2">
									<input  type="hidden" name="rowId" value="{{$v_contents->rowId}}"  >
									<input type="submit" name="submit" value="update" class="btn btn-sm btn-default">
								</form>
							</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$v_contents->total}}</p>
							</td>
							<td class="cart_delete">

								<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_contents->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
                       <?php }?>
						
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
<section id="do_action">
	<div class="heading">
		<h3>What would you like to do next?</h3>
		<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
	</div>
	<div class="breadcrumbs">
		<ol class="breadcrumb">
		  <li><a href="#">Home</a></li>
		  <li class="active">Payment method</li>
		</ol>
	</div>
	<div class="paymentCont col-sm-8">
			<div class="headingWrap">
				<h3 class="headingTop text-center">Select Your Payment Method</h3>	
				<p class="text-center">Created with bootsrap button and using radio button</p>
			</div>
			<form action="{{url('/order-place')}}" method="post">
				{{ csrf_field()}}
				<div class="paymentWrap">
					<div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
			            <label class="btn paymentMethod active">
			            	<div class="method visa"></div>
			                <input type="radio" name="payment_method" value="handcash" checked> 
			            </label>
			            <label class="btn paymentMethod">
			            	<div class="method master-card"></div>
			                <input type="radio" name="payment_method" value="paypal"> 
			            </label>
			            <label class="btn paymentMethod">
		            		<div class="method amex"></div>
			                <input type="radio" name="payment_method" value="bkash">
			            </label>
			       		<label class="btn paymentMethod">
		             		<div class="method vishwa"></div>
			                <input type="radio" name="payment_method" value="payza"> 
			            </label>
			    	</div>        
				</div>
				<div class="footerNavWrap clearfix">
					<input type="submit" class="btn btn-success pull-left btn-fyi fa fa-chevron-circle-right" value="Done" data-toggle="modal" data-target="#exampleModal">
				</div>
			</form>
		</div>
</section><!--/#do_action-->
@endsection