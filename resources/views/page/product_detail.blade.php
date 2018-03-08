@extends('master')
@section('content')

	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm: <strong> {{$productDetail->name}}</strong></h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Home</a> / <span>Thông tin chi tiết sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<img src="image/product/{{$productDetail->image}}" alt="">
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title">{{$productDetail->name}}</p>
								<p class="single-item-price">
									@if($productDetail->promotion_price == 0)
										<span class="flash-sale">{{number_format($productDetail->unit_price)}}.đ</span>
									@else
										<span class="flash-del">{{number_format($productDetail->unit_price)}}.đ</span>
	                                	<span class="flash-sale">{{number_format($productDetail->promotion_price)}}.đ</span>
	                                @endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{$productDetail->description}}</p>
							</div>
							<div class="space20">&nbsp;</div>

							<p>Options:</p>
							<div class="single-item-options">
								<select class="wc-select" name="color">
									<option>Qty</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<a class="add-to-cart" href="add-to-cart/{{$productDetail->id}}"><i class="fa fa-shopping-cart"></i></a>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Description</a></li>
							<li><a href="#tab-reviews">Reviews (0)</a></li>
						</ul>
						<div class="panel" id="tab-description">
							{{$productDetail->description}}
						</div>
						<div class="panel" id="tab-reviews">
							<p>No Reviews</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản phẩm tương tự</h4>
						<div class="row">
							@foreach($product_related as $pr)
								@if($pr->promotion_price == 0)
                                    <div class="col-sm-4">
                                        <div class="single-item">
                                            <div class="single-item-header">
                                                <a href="chi-tiet-san-pham\{{$pr->id}}"><img src="image/product/{{$pr->image}}" style="height: 250px;" alt=""></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{$pr->name}}</p>
                                                <p class="single-item-price">
                                                        <span class="flash-sale">{{number_format($pr->unit_price)}}.đ</span>
                                                </p>
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left" href="add-to-cart/{{$pr->id}}"><i class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary" href="chi-tiet-san-pham/{{$pr->id}}">Details <i class="fa fa-chevron-right"></i></a>
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
                                                <a href="chi-tiet-san-pham\{{$pr->id}}"><img src="image/product/{{$pr->image}}" style="height: 250px;" alt=""></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{$pr->name}}</p>
                                                <p class="single-item-price">
                                                    <span class="flash-del">{{number_format($pr->unit_price)}}.đ</span>
                                                    <span class="flash-sale">{{number_format($pr->promotion_price)}}.đ</span>
                                                </p>
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left" href="add-to-cart/{{$pr->id}}"><i class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary" href="chi-tiet-san-pham/{{$pr->id}}">Details <i class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                @endif
							@endforeach
						</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside">
					<div class="widget">
						<h3 class="widget-title">Sản phẩm khuyến mãi</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($product_promotion as $pp)
									<div class="media beta-sales-item">
										<a class="pull-left" href="chi-tiet-san-pham\{{$pp->id}}"><img src="image/product/{{$pp->image}}" alt=""></a>
										<div class="media-body">
											{{$pp->name}}
											<span class="beta-sales-price">{{number_format($pp->promotion_price)}}</span>
										</div>
									</div>
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h3 class="widget-title">Sản phẩm mới</h3>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($product_new as $pn)
									<div class="media beta-sales-item">
										<a class="pull-left" href="chi-tiet-san-pham\{{$pn->id}}"><img src="image/product/{{$pn->image}}" alt=""></a>
										<div class="media-body">
											{{$pn->name}}
											@if($pn->promotion_price == 0)
												<span class="beta-sales-price">{{number_format($pn->unit_price)}}</span>
											@else
												<span class="beta-sales-price">{{number_format($pn->promotion_price)}}</span>
											@endif
										</div>
									</div>
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection