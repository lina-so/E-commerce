@extends('layouts.master')
@section('css')
<!-- Internal Nice-select css  -->
<link href="{{URL::asset('assets/plugins/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Ecommerce</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Products</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">

					<div class="col-xl-12 col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body p-2">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search ...">
									<span class="input-group-append">
										<button class="btn btn-primary" type="button">Search</button>
									</span>
								</div>
							</div>
						</div>
						<div class="row row-sm">

                            @foreach ($subproducts as $subproduct )
                                <div class="col-md-6 col-lg-6 col-xl-4  col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="pro-img-box">
                                                <div class="d-flex product-sale">
                                                    <i class="mdi mdi-heart text-danger ml-auto wishlist"></i>
                                                </div>
                                               <a href="{{ route('details',$subproduct->id) }}"><img class="w-100" src="{{ asset('images/' . $subproduct->name . '/img.jpg') }}" alt="product-image"></a>
                                                <a href="#" class="adtocart"> <i class="las la-shopping-cart "></i>
                                                </a>
                                            </div>
                                            <div class="text-center pt-3">
                                                <h3 class="h6 mb-2 mt-4 font-weight-bold text-uppercase">{{ $subproduct->name }}</h3>
                                                <span class="tx-15 ml-auto">
                                                    <i class="ion ion-md-star text-warning"></i>
                                                    <i class="ion ion-md-star text-warning"></i>
                                                    <i class="ion ion-md-star text-warning"></i>
                                                    <i class="ion ion-md-star-half text-warning"></i>
                                                    <i class="ion ion-md-star-outline text-warning"></i>
                                                </span>
                                                <h4 class="h5 mb-0 mt-2 text-center font-weight-bold text-danger">${{ $subproduct->discount_price }} <span class="text-secondary font-weight-normal tx-13 ml-1 prev-price">${{ $subproduct->price }}</span></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


							<ul class="pagination product-pagination mr-auto float-left">
								<li class="page-item page-prev disabled">
									<a class="page-link" href="#" tabindex="-1">Prev</a>
								</li>
								<li class="page-item active"><a class="page-link" href="#">1</a></li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item"><a class="page-link" href="#">4</a></li>
								<li class="page-item"><a class="page-link" href="#">5</a></li>
								<li class="page-item page-next">
									<a class="page-link" href="#">Next</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Nice-select js-->
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js')}}"></script>
<script src="{{URL::asset('assets/plugins/jquery-nice-select/js/nice-select.js')}}"></script>
@endsection
