@extends('master') @section('content')

<div class="fullwidthbanner-container">
    <div class="fullwidthbanner">
        <div class="bannercontainer">
            <div class="banner">
                <ul>
                    @foreach($slide as $sl)
                        <li data-transition="boxfade" data-slotamount="20" class="active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined"
                                data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
                                <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="image/slide/{{$sl->image}}" data-src="image/slide/{{$sl->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('image/slide/{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                </div>
                            </div>

                        </li>
                    @endforeach
                    
                </ul>
            </div>
        </div>
        <div class="tp-bannertimer"></div>
    </div>
</div>
<!--slider-->

<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="beta-products-list">
                        <h4>Sản phẩm mới</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{count($count_product_new)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>

                        <div class="row">
                            @foreach($product_new as $pdn)
                                @if($pdn->promotion_price == 0)
                                    <div class="col-sm-3">
                                        <div class="single-item">
                                            <div class="single-item-header">
                                                <a href="chi-tiet-san-pham/{{$pdn->id}}"><img src="image/product/{{$pdn->image}}" style="height: 250px;" alt=""></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{$pdn->name}}</p>
                                                <p class="single-item-price">
                                                    @if($pdn->promotion_price == 0)
                                                        <span class="flash-sale">{{number_format($pdn->unit_price)}}.đ</span>
                                                    @else
                                                        <span class="flash-del">{{number_format($pdn->unit_price)}}.đ</span>
                                                        <span class="flash-sale">{{number_format($pdn->promotion_price)}}.đ</span>
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left" href="add-to-cart/{{$pdn->id}}"><i class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary" href="chi-tiet-san-pham/{{$pdn->id}}">Details <i class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                @else
                                    <div class="col-sm-3">
                                        <div class="single-item">
                                            <div class="ribbon-wrapper">
                                                <div class="ribbon sale">Sale</div>
                                            </div>

                                            <div class="single-item-header">
                                                <a href="chi-tiet-san-pham/{{$pdn->id}}"><img src="image/product/{{$pdn->image}}" style="height: 250px;" alt=""></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{$pdn->name}}</p>
                                                <p class="single-item-price">
                                                    <span class="flash-del">{{number_format($pdn->unit_price)}}.đ</span>
                                                    <span class="flash-sale">{{number_format($pdn->promotion_price)}}.đ</span>
                                                </p>
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left" href="add-to-cart/{{$pdn->id}}"><i class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary" href="chi-tiet-san-pham/{{$pdn->id}}">Details <i class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                @endif
                            @endforeach
                           
                        </div>
                        <div class="row">
                            {{$product_new->links()}}
                        </div>
                    </div>
                    <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Sản phẩm khuyến mãi</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{count($count_product_promotion)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            @foreach($product_promotion as $pdp)
                                <div class="col-sm-3">
                                    <div class="single-item">
                                        <div class="ribbon-wrapper">
                                            <div class="ribbon sale">Sale</div>
                                        </div>

                                        <div class="single-item-header">
                                            <a href="chi-tiet-san-pham/{{$pdp->id}}"><img src="image/product/{{$pdp->image}}" style="height: 250px;" alt=""></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{$pdp->name}}</p>
                                            <p class="single-item-price">
                                                <span class="flash-del">{{number_format($pdp->unit_price)}}.đ</span>
                                                <span class="flash-sale">{{number_format($pdp->promotion_price)}}.đ</span>
                                            </p>
                                        </div>
                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left" href="{{route('themgiohang',$pdp->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="chi-tiet-san-pham\{{$pdp->id}}">Details <i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            {{$product_promotion->links()}}
                        </div>
                        
                    </div>
                    <!-- .beta-products-list -->
                </div>
            </div>
            <!-- end section with sidebar and main content -->


        </div>
        <!-- .main-content -->
    </div>
    <!-- #content -->
</div>
<!-- .container -->
@endsection