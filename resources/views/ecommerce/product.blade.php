@extends('layouts.ecommerce')

@section('title')
    <title>Jual Produk Fashion - Novashop</title>
@endsection

@section('content')

    <section class="banner_area">
        <div class="banner_inner d-flex align-align-items-center">
            <div class="container">
                <div class="banner_content text-center">
                    <h2>Jual Produk Fashion</h2>
                    <div class="page_link">
                        <a href="{{ route('front.index') }}">Home</a>
                        <a href="{{ route('front.product') }}">Produk</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cat_product_area section_gap">
        <div class="container-fluid">
            <div class="row flex-row-reverse">
                <div class="col-lg-9">
                    <div class="product_top_bar">
                        <div class="left_dorp">
                            <select class="sorting">
                                <option value="1">Default sorting</option>
                                <option value="2">Default sorting 2</option>
                                <option value="3">Default sorting 3</option>
                            </select>
                            <select class="show">
                                <option value="1">Show 12</option>
                                <option value="2">Show 14</option>
                                <option value="3">Show 16</option>
                            </select>
                        </div>

                        <div class="right_page ml-auto">
                           {{ $products->links() }}
                        </div>
                    </div>
                    <div class="latest_product_inner row">
                        @forelse ($products as $row)
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <div class="f_p_item">
                                <div class="f_p_img">
                                    <img src="{{ asset('storage/products/' . $row->image) }}" alt="{{ $row->name }}" class="img-fluid">
                                    <div class="p_icon">
                                        <a href="">
                                            <i class="lnr lnr-cart"></i>
                                        </a>
                                    </div>
                                </div>
                                <a href="">
                                    <h4>{{ $row->name }}</h4>
                                </a>
                                <h5>Rp. {{ number_format($row->price) }}</h5>
                            </div>
                        </div>

                        @empty

                        @endforelse
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="left_sidebar_area">
                        <aside class="left_widgets cat_widgets">
                            <div class="l_w_title">
                                <h3>Kategori Produk</h3>
                            </div>
                            <div class="widgets_inner">
                                <ul class="list">
                                    @foreach ($categories as $category)
                                    <li>
                                        <a href="">{{ $category->name }}</a>
                                        @foreach ($category->child as $child)
                                        <ul class="list">
                                            <li>
                                                <a href="">{{ $child->name }}</a>
                                            </li>
                                        </ul>

                                        @endforeach
                                    </li>

                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>

            <div class="row">
                {{ $products->links() }}
            </div>
        </div>
    </section>

@endsection
