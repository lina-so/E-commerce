@extends('layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/prism/prism.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

<!--- Custom-scroll -->
<link href="{{URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Categories</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ categories list</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

	@if(session()->has('Add_class'))
       <script>
	   window.onload=function(){
	   notif({
	   msg:"@lang('massage.success') ",
	   type:"success"
	   })
	   }
       </script>

    @endif

	@if(session()->has('update_class'))
       <script>
	   window.onload=function(){
	   notif({
	   msg:"@lang('massage.update') ",
	   type:"success"
	   })
	   }
       </script>

    @endif


	@if(session()->has('delete_class'))
       <script>
	   window.onload=function(){
	   notif({
	   msg:"@lang('massage.delete') ",
	   type:"success"
	   })
	   }
       </script>

    @endif


	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif


				<!-- row -->
				<div class="row">

<!--div-->
					<div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								<a class="modal-effect btn btn-outline-primary btn-md" data-effect="effect-scale"  data-toggle="modal" href="#modaldemo4"> Add Category</a>
							</div>

							<div class="card-body">
								<div class="table-responsive">

									<table id="example" class="table key-buttons text-md-nowrap">
										<thead>
                                            <tr>
                                                <th class="border-bottom-0">#</th>
                                                <th class="border-bottom-0">Name</th>
                                                <th class="border-bottom-0"></th>
                                            </tr>
										</thead>
										<tbody>
										@php
										$i=0;
										@endphp
									@foreach($categories as $category)
										@php
										$i++;
										@endphp
											<tr>

												<td>{{$i}}</td>
												<td>{{$category->name}}</td>
                                                <td></td>
												<td>

                                                    <a class="modal-effect btn btn-sm btn-warning " data-effect="effect-scale"
                                                        href="#modaldemo9{{$category->id}}"  data-toggle="modal"  title="تعديل"><i
                                                    class="las la-edit"></i></a>

                                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                    data-toggle="modal" href="#modaldemo6{{$category->id}}" title="حذف"><i
                                                        class="las la-trash"></i></a>
												</td>
											</tr>

                                            <!-- delete -->
											<div class="modal" id="modaldemo6{{$category->id}}">
												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content modal-content-demo">
														<div class="modal-header">
															<h6 class="modal-title"> Delete category</h6><button aria-label="Close" class="close"
																data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
														</div>
														<form action="{{route('category.destroy',$category->id)}}" method="post" enctype="multipart/form-data">
															{{ method_field('delete') }}
															{{ csrf_field() }}
                                                            <div class="form-group">
                                                                <input type="hidden" class="form-control" id="id" name="id" value="{{$category->id}}">
                                                            </div>
															<div class="modal-body">
																<p>? Are you sure you want to delete this category</p><br>
																<input type="hidden" name="id" id="id" value="{{$category->id}}">
                                                                {{-- <br> --}}
																<input type="text" name="id" id="id" value="{{$category->name}}">
                                                               : Category Name
															</div>
															<div class="modal-footer">

																<button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
																<button type="submit" class="btn btn-danger">save</button>
															</div>
													    </form>
                                                    </div>
												</div>
											</div>


													<!-- Edit modal -->
											<div class="modal" id="modaldemo9{{$category->id}}">
												<div class="modal-dialog" role="document">
													<div class="modal-content modal-content-demo">
														<div class="modal-header">
															<h6 class="modal-title"> Edit Category</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
														</div>
                                                        <form action="{{route('category.update',$category->id)}}" method="post">
                                                                {{method_field('patch')}}
                                                            {{csrf_field()}}

                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <input type="hidden" class="form-control" id="id" name="id" value="{{$category->id}}">
                                                                </div>


                                                                <div class="form-group">
                                                                    <label for="exampleInputEmaili"> name</label>

                                                                    <input type="text" class="form-control" id="name" name="name" value="" required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmaili"> photo</label>
                                                                        <p class="text-danger">    * صيغة المرفق pdf, jpeg ,.jpg , png </p>
                                                                        <div class="col-sm-12 col-md-12">
                                                                            <input type="file" name="photo" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                                                                                data-height="70" />
                                                                        </div><br>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button class="btn  btn-primary" type="submit">save</button>
                                                                <button class="btn  btn-secondary" data-dismiss="modal" type="button">cancel</button>
                                                            </div>
                                                        </form>
													</div>
												</div>
											</div>







											@endforeach

										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>




						<!-- Basic modal -->
				<div class="modal" id="modaldemo4">
					<div class="modal-dialog" role="document">
						<div class="modal-content modal-content-demo">
							<div class="modal-header">
								<h6 class="modal-title"> Add Category</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
							</div>
								<form action="{{route('category.store')}}" method="post">
									{{csrf_field()}}

									<div class="modal-body">
										<div class="form-group">
											<label for="exampleInputEmaili"> name</label>

											<input type="text" class="form-control" id="name" name="name" required>
										</div>

										<div class="form-group">
											<label for="exampleInputEmaili"> photo</label>
                                            <p class="text-danger">    * صيغة المرفق pdf, jpeg ,.jpg , png </p>
                                            <div class="col-sm-12 col-md-12">
                                                <input type="file" name="photo" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                                                    data-height="70" />
                                            </div><br>
										</div>

									</div>


									<div class="modal-footer">
										<button class="btn  btn-primary" type="submit">save</button>
										<button class="btn  btn-secondary" data-dismiss="modal" type="button">cancel</button>
									</div>
								</form>
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
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Jquery.mCustomScrollbar js-->
<script src="{{URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!--Internal  Clipboard js-->
<script src="{{URL::asset('assets/plugins/clipboard/clipboard.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/clipboard/clipboard.js')}}"></script>
<!-- Internal Prism js-->
<script src="{{URL::asset('assets/plugins/prism/prism.js')}}"></script>



	<!--Internal  Notify js -->
<script src="{{URL::asset('assets/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('assets/plugins/notify/js/notifit-custom.js')}}"></script>

@endsection
