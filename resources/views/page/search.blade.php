@extends('master')
@section('content')
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Sản phẩm tìm kiếm được</h4>
							<div class="beta-products-details">
								<p class="pull-left">Tìm được {{count($count_product)}} sản phẩm</p>
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($product as $pd)
									<div class="col-sm-3">
										<div class="single-item">
											<div class="single-item-header">
												<a href="chi-tiet-san-pham/{{$pd->id}}"><img src="image/product/{{$pd->image}}" style="height: 250px;" alt=""></a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title">{{$pd->name}}</p>
												<p class="single-item-price">
                                                    @if($pd->promotion_price == 0)
                                                        <span class="flash-sale">{{number_format($pd->unit_price)}}.đ</span>
                                                    @else
                                                        <span class="flash-del">{{number_format($pd->unit_price)}}.đ</span>
                                                        <span class="flash-sale">{{number_format($pd->promotion_price)}}.đ</span>
                                                    @endif
                                                </p>
											</div>
											<div class="single-item-caption">
												<a class="add-to-cart pull-left" href="add-to-cart/{{$pd->id}}"><i class="fa fa-shopping-cart"></i></a>
												<a class="beta-btn primary" href="chi-tiet-san-pham/{{$pd->id}}">Details <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
										<br>
									</div>
								@endforeach
							</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div>

@endsection