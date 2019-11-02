@extends('layouts.ecommerce')

@section('title')
    <title>Novashop - Toko online nova</title>
@endsection

@section('content')
    <section class="home_banner_area">
        <div class="overlay"></div>
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content row">
                    <div class="offset-lg-2 col-lg-8">
                        <h3>Fashion for
                            <br> Upcoming Winter
                        </h3>
                        <p>Your favorite fashion</p>
                        <a href="" class="white_bg_btn">View Collection</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="hot_deals_area section_gap">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hot_deal_box">
                        <img src="{{ asset('ecommerce/img/product/hot_deals/deal1.jpg') }}" alt="" class="img-fluid">
                        <div class="content">
                            <h2>Hot Deals of this month</h2>
                            <p>shop now</p>
                        </div>
                        <a href="" class="hot_deal_link"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hot_deal_box">
                        <img src="{{ asset('ecommerce/img/product/hot_deals/deal1.jpg') }}" alt="" class="img-fluid">
                        <div class="content">
                            <h2>Hot deals of this month</h2>
                            <p>shop now</p>
                        </div>
                        <a href="" class="hot_deal_link"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="feature_product_area section_gap">
        <div class="main_box">
            <div class="container-fluid">
                <div class="row">
                    <div class="main_title">
                        <h2>Produk Terbaru</h2>
                        <p>Tampil trendi dengan kumpulan produk kekinian kami</p>
                    </div>
                </div>
                <div class="row">
                    @forelse ($products as $row)
                    <div class="col col1">
                        <div class="f_p_item">
                            <div class="f_p_img">
                                <img src="{{ asset('storage/products/' . $row->image) }}" alt="{{ $row->name }}" class="img-fluid">
                                <div class="p_icon">
                                    <a href="{{ url('/product/' .$row->slug) }}">
                                        <i class="lnr lnr-cart"></i>
                                    </a>
                                </div>
                            </div>
                            <a href="{{ url('/product/'.$row->slug) }}">
                                <h4>{{ $row->name }}</h4>
                            </a>
                            <h5>Rp. {{ number_format($row->price) }}</h5>
                        </div>
                    </div>

                    @empty

                    @endforelse
                </div>

                <div class="row">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </section>

@endsection
