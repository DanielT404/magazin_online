@extends('layouts.app')

@section('stylesheets')

    <link href="{{asset('css/home.css')}}" rel="stylesheet">

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">



@endsection

@section('content')

    <div class="container">

		<div class="row">

			<div class="col-xs-12 col-md-9 product-list">

				<div class="col-xs-12 options text-right">

					<ul class="view-options list-inline">

						<li>Tip afisare:</li>

						<li>

							<a onclick="columnView()">

								<i class="fa fa-th"></i>

							</a>

						</li>

						<li>

							<a onclick="listView()">

								<i class="fa fa-th-list"></i>

							</a>

						</li>

					</ul>

					<ul class="sort-options list-inline">

						<li>Sorteaza dupa:</li>

						<li>

							<select class="sort-by" id="sort-by" onclick="getFilter()">

      							<option value="manual">Cele mai populare</option>

								<option value="price-ascending">Pret crescator</option>

								<option value="price-descending">Pret descrescator</option>

								<option value="created-ascending">Cele mai noi</option>

								<option value="created-descending">Discount %</option>

							</select>

						</li>

					</ul>

				</div>
				

				<div id="columnView">

				@if(count($products) > 0)

					@foreach($products as $product)

						<div class="col-md-4">

							<div class="section-body-img">

								<a href="produse/{{$product->slug}}">

									<img src="storage/{{$product->image}}" width="100%"/>

								</a>

								<div class="section-body-img-anim"></div>

								<div class="section-body-img-anim-body">



									<button class="btn-product">Vezi produsul</button>

									<a class="btn-product" href="produse/{{$product->slug}}" style="margin-right: 1px;">Optiuni</a>

								</div>

							</div>

							<div class="product-details">

								<div class="product-details">

									<p class="product-title">{{$product->name}}</p>

									<h4 class="product-price">{{$product->price}} {{$product->currency}}</h4>

								</div>

							</div>

						</div>

					@endforeach

				@else

					<h2 class="text-center"><span>Oops! Momentan nu sunt disponibile produse. Revino mai tarziu!</span></h2>

				@endif

				</div>

				<div id="listView" style="display: none">

						@if(count($products) > 0)
		
							@foreach($products as $product)
		
								<div class="row">

								<div class="col-md-4">
		
									<div class="section-body-img">
		
										<a href="produse/{{$product->slug}}">
		
											<img src="storage/{{$product->image}}" width="100%"/>
		
										</a>
		
										<div class="section-body-img-anim"></div>
		
										<div class="section-body-img-anim-body">
		
		
		
											<button class="btn-product">Vezi produsul</button>
		
											<a class="btn-product" href="produse/{{$product->slug}}" style="margin-right: 1px;">Optiuni</a>
		
										</div>
		
									</div>
		
									<div class="product-details">
		
										<div class="product-details">
		
											<p class="product-title">{{$product->name}}</p>
		
											<h4 class="product-price">{{$product->price}} {{$product->currency}}</h4>
		
										</div>
		
									</div>
		
								</div>

								</div>
		
							@endforeach
		
						@else
		
							<h2 class="text-center"><span>Oops! Momentan nu sunt disponibile produse. Revino mai tarziu!</span></h2>
		
						@endif
		
						</div>

			</div>

			<div class="col-xs-12 col-md-3 filter-list">

				<div class="sb-title">

					Categorii

				</div>

				<ul>

                    @foreach($categories as $category)

                    <li>

						<ul class="categories">

							<li class="list-title"><a href="?category={{$category->id}}" class="category_name" data-id="{{$category->id}}" onclick="filterCategory(this);">{{$category->name}}</a></li>

							<li>

								<ul class="" id="categories">

									@if(count($category->subcategories)>0)

										@foreach($category->subcategories as $subcat)

										<li><a href="#0" class="" data-category="{{$category->id}}" data-subcategory="{{$subcat->id}}" onclick="filterSubcategory(this)">{{$subcat->name}}</a></li>

										@endforeach

									@endif

								</ul>

							</li>	

						</ul>

                                

                    </li>

                    @endforeach

                </ul>

				<div class="sb-title">

					Filtre

				</div>

				<ul>

                    <li>

						<ul>

							<li class="list-title"><a href="/produse">Marimi</a></li>

							<li>

								<ul class="" id="">
									
									@if(count($lengths)>0)

										@foreach($lengths as $length)

										<li><a href="#0" class="" data-length="{{$length->id}}" onclick="filterLength(this)">{{$length->length}}</a></li>

										@endforeach

										@else

										Nu sunt adaugate marimi in baza de date momentan.

									@endif
						

								</ul>

							</li>	

						</ul>

                                

                    </li>

					<li>

						<ul>

							<li class="list-title">Culori</li>

							<li>

								<ul class="" id="">
									
									@if(count($colors)>0)

										@foreach($colors as $color)
										
										<a href="#0" data-color="{{$color->id}}" onclick="filterColors(this)">
											<li style="height: 25px; width: 25px; background-color: #{{$color->color}}"></li>
										</a>

										@endforeach

										@else

										Nu sunt adaugate culori in baza de date momentan.

									@endif
						

						

								</ul>

							</li>	

						</ul>

                                

                    </li>

					<li>

						<ul>

							<li class="list-title">Brand</li>

							<li>

								<ul class="" id="">

						

								</ul>

							</li>	

						</ul>

                                

                    </li>

					<li>

						<ul>

							<li class="list-title">Pret</li>

							<li>

								<ul class="" id="">
										Valoare minima:
										<div class="slidecontainerMin">
												<input type="range" min="1" max="9999" value="{{$minPriceVal}}" class="slider" id="minRange" onmouseup="getMinVal()">
												<p>Value: <span id="minValue"></span></p>
										</div>
										Valoare maxima:
										<div class="slidecontainerMax">
												<input type="range" min="1" max="9999" value="{{$maxPriceVal}}" class="slider" id="maxRange" onmouseup="getMaxVal()">
												<p>Value: <span id="maxValue"></span></p>
										</div>

								</ul>

							</li>	

						</ul>

                                

                    </li>

                </ul>

			</div>

		</div>

    </div>



@endsection