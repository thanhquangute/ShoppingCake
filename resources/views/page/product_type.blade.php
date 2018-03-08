@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm: {{$type->name}}</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Home</a> / <span>Sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($product_type as $pt)
							<li><a href="loai-san-pham\{{$pt->id}}">{{$pt->name}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>Sản phẩm mới</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm được {{count($count_productById)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($productById as $product)
									@if($product->promotion_price == 0)
										<div class="col-sm-4">
											<div class="single-item">
												<div class="single-item-header">
													<a href="chi-tiet-san-pham/{{$product->id}}"><img src="image/product/{{$product->image}}" style="height: 250px;" alt=""></a>
												</div>
												<div class="single-item-body">
													<p class="single-item-title">{{$product->name}}</p>
													<p class="single-item-price">
														<span class="flash-sale">{{number_format($product->unit_price)}}.đ</span>
													</p>
												</div>
												<div class="single-item-caption">
													<a class="add-to-cart pull-left" href="add-to-cart/{{$product->id}}"><i class="fa fa-shopping-cart"></i></a>
													<a class="beta-btn primary" href="chi-tiet-san-pham/{{$product->id}}">Details <i class="fa fa-chevron-right"></i></a>
													<div class="clearfix"></div>
												</div>
											</div>
											<br>
										</div>
									@else
										<div class="col-sm-4">
		                                        <div class="single-item">
		                                            <div class="ribbon-wrapper">
		                                                <div class="ribbon sale">Sale</div>
		                                            </div>

		                                            <div class="single-item-header">
		                                                <a href="chi-tiet-san-pham/{{$product->id}}"><img src="image/product/{{$product->image}}" style="height: 250px;" alt=""></a>
		                                            </div>
		                                            <div class="single-item-body">
		                                                <p class="single-item-title">{{$product->name}}</p>
		                                                <p class="single-item-price">
		                                                    <span class="flash-del">{{number_format($product->unit_price)}}.đ</span>
		                                                    <span class="flash-sale">{{number_format($product->promotion_price)}}.đ</span>
		                                                </p>
		                                            </div>
		                                            <div class="single-item-caption">
		                                                <a class="add-to-cart pull-left" href="add-to-cart/{{$product->id}}"><i class="fa fa-shopping-cart"></i></a>
		                                                <a class="beta-btn primary" href="chi-tiet-san-pham/{{$product->id}}">Details <i class="fa fa-chevron-right"></i></a>
		                                                <div class="clearfix"></div>
		                                            </div>
		                                        </div>
		                                        <br>
		                                </div>
		                            @endif
								@endforeach
							</div>
							<div class="row">
								{{$productById->links()}}
							</div>
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h4>Sản phẩm khác</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm được {{count($count_productOtherId)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($productOtherId as $products)
									@if($products->promotion_price == 0)
										<div class="col-sm-4">
											<div class="single-item">
												<div class="single-item-header">
													<a href="product.html"><img src="image/product/{{$products->image}}" style="height: 250px;" alt=""></a>
												</div>
												<div class="single-item-body">
													<p class="single-item-title">{{$products->name}}</p>
													<p class="single-item-price">
														<span class="flash-sale">{{number_format($products->unit_price)}}.đ</span>
													</p>
												</div>
												<div class="single-item-caption">
													<a class="add-to-cart pull-left" href="add-to-cart/{{$products->id}}"><i class="fa fa-shopping-cart"></i></a>
													<a class="beta-btn primary" href="chi-tiet-san-pham/{{$products->id}}">Details <i class="fa fa-chevron-right"></i></a>
													<div class="clearfix"></div>
												</div>
											</div>
											<br>
										</div>
									@else
										<div class="col-sm-4">
		                                        <div class="single-item">
		                                            <div class="ribbon-wrapper">
		                                                <div class="ribbon sale">Sale</div>
		                                            </div>

		                                            <div class="single-item-header">
		                                                <a href="product.html"><img src="image/product/{{$products->image}}" style="height: 250px;" alt=""></a>
		                                            </div>
		                                            <div class="single-item-body">
		                                                <p class="single-item-title">{{$products->name}}</p>
		                                                <p class="single-item-price">
		                                                    <span class="flash-del">{{number_format($products->unit_price)}}.đ</span>
		                                                    <span class="flash-sale">{{number_format($products->promotion_price)}}.đ</span>
		                                                </p>
		                                            </div>
		                                            <div class="single-item-caption">
		                                                <a class="add-to-cart pull-left" href="add-to-cart/{{$products->id}}"><i class="fa fa-shopping-cart"></i></a>
		                                                <a class="beta-btn primary" href="chi-tiet-san-pham/{{$products->id}}">Details <i class="fa fa-chevron-right"></i></a>
		                                                <div class="clearfix"></div>
		                                            </div>
		                                        </div>
		                                        <br>
		                                </div>
		                            @endif
		                        @endforeach
							</div>
							<div class="row">
								{{$productOtherId->links()}}
							</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection

	