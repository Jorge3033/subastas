@extends('layouts.homeTemplate')

@section('sectionPage')
	<!-- ================ start banner area ================= -->	
	<section class="blog-banner-area" id="category">
		<div class="container h-100">
			<div class="blog-banner">
				<div class="text-center">
					<h1>Categorias</h1>
					<nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Categorias</li>
            </ol>
          </nav>
				</div>
			</div>
    </div>
	</section>

	<!-- ================ category section start ================= -->		  
  <section class="section-margin--small mb-5">
    <div class="container">
      <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-5">
          <div class="sidebar-categories">
            <div class="head">Categorias</div>
            <ul class="main-categories">
              <li class="common-filter">
                <form action="#">
                  <ul>
                    @foreach ($category as $c)
                    	<li class="filter-list"><input class="pixel-radio" type="radio" id="men" name="brand">{{ $c->Name }}</li>
                    @endforeach
                  </ul>
                </form>
              </li>
            </ul>
          </div>
          <div class="sidebar-filter">
            <div class="top-filter-head">Filtros</div>
            <div class="common-filter">
              <div class="head">Marcas</div>
              <form action="#">
                <ul>
                  @foreach ($article as $a)
                  	<li class="filter-list"><input class="pixel-radio" type="radio" id="men" name="brand">{{ $a->maker }}</li>
                  @endforeach
                </ul>
              </form>
            </div>
            <div class="common-filter">
              <div class="head">Color</div>
              <form action="#">
                <ul>
                  <li class="filter-list"><input class="pixel-radio" type="radio" id="black" name="color"><label for="black">Black<span>(29)</span></label></li>
                </ul>
              </form>
            </div>
          </div>
        </div>
        <div class="col-xl-9 col-lg-8 col-md-7">
          <!-- Start Filter Bar -->
          <div class="filter-bar d-flex flex-wrap align-items-center">
            <div class="sorting">
              <select>
                @foreach ($subCategory as $subC)
                	<option value="{{ $subC->id }}">{{ $subC->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="sorting mr-auto">
              <select>
                <option value="1">Mostrar 12</option>
              </select>
            </div>
            <div>
              <div class="input-group filter-bar-search">
                <input type="text" placeholder="Search">
                <div class="input-group-append">
                  <button type="button"><i class="ti-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- End Filter Bar -->
          <!-- Start Best Seller -->
          <section class="lattest-product-area pb-40 category-list">
            <div class="row">
              <div class="col-md-6 col-lg-4">
                <div class="card text-center card-product">
                  @foreach ($article as $p)
                  	<div class="card-product__img">
                    <img class="card-img" src="{{ asset('public/photos/articlesPhotos/'.$p->photo) }}" alt="">
                    <ul class="card-product__imgOverlay">
                      <li><button><i class="ti-search"></i></button></li>
                      <li><button><i class="ti-shopping-cart"></i></button></li>
                      <li><button><i class="ti-heart"></i></button></li>
                    </ul>
                  </div>
                  	<div class="card-body">
                    <p>{{ $p->name }}</p>
                    <h4 class="card-product__title"><a href="#">Ofertalo antes de {{ $p->finalDate }}</a></h4>
                    <p class="card-product__price">${{ $p->price }}</p>
                  </div>
                  @endforeach
                </div>
              </div>
              
            </div>
          </section>
          <!-- End Best Seller -->
        </div>
      </div>
    </div>
  </section>


@stop