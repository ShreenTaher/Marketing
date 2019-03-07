@extends('admin2.master')
@section('title','countries')
@section('content')
<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-title">
										<h3 class="m-portlet__head-text">
											Countries
										</h3>
									</div>
								</div>
								<div class="m-portlet__head-tools">
									<ul class="m-portlet__nav">
										<li class="m-portlet__nav-item">
											<a href="#" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air" data-toggle="modal" data-target="#createCompany">
												<span>
													<i class="la la-cart-plus"></i>
													<span>New Country</span>
												</span>
											</a>
										</li>
										<li class="m-portlet__nav-item"></li>
										<!-- <li class="m-portlet__nav-item">
											<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
												<a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
													<i class="la la-ellipsis-h m--font-brand"></i>
												</a>
												
											</div>
										</li> -->
									</ul>

									            <!-- Modal -->
        <div class="modal fade" id="createCompany" tabindex="-1" role="dialog" aria-labelledby="createCompanyLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="createCompanyLabel">Create new Country</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form id="storeCountry" action="{{ app('shared')->get('base_url')}}/setting/countries" method="post" enctype="multipart/form-data" data-parsley-validate novalidate>
              <div class="modal-body">
                <div class="form-group">
                    <label class="col-form-label">Name in Ar :</label>
                    <input type="text" class="form-control" name="ar[name]" required data-parsley-required-message="kindly enter country name"> 
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Name in En :</label>
                    <input type="text" class="form-control" name="en[name]" required data-parsley-required-message="kindly enter country name">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">currency:</label>
                    <select class="form-control m-input" name="currency_id" required data-parsley-required-message="kindly select currency">
                        <option value="">Select</option>
                        @forelse($currencies as $currency)
                        <option value="{{ $currency->id }}">{{ $currency->title }}</option>
                        @empty
                        @endforelse
					</select>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">status:</label>
                    <select class="form-control m-input" name="is_active" required data-parsley-required-message="kindly select status">
						<option value="">Select</option>
						<option value="1">activated</option>
						<option value="0">deactivated</option>
					</select>
                  </div>

                  <div class="form-group">
                    <label class="col-form-label">flag:</label>
                    <input type="file" class="dropify" name="flag" required data-parsley-required-message="kindly upload photo">
                  </div>
                
              </div>
              <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-dismiss="modal" onclick="Custombox.close();">Close</button>
                <button type="submit" class="btn btn-primary storeCompanyForm">Save changes</button>
              </div>
              </form>
            </div>
          </div>
        </div>
								</div>
							</div>
							<div class="m-portlet__body">

								<!--begin: Datatable -->
								<table class="table table-striped- table-bordered table-hover table-checkable responsive no-wrap" id="m_table_1">
									<thead>
										<tr>
											<th>Country ID</th>
											<th>Name in AR</th>
											<th>Name in En</th>
											<th>Currency</th>
											<th>Flag</th>
											<th>Status</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
									@if(count($countries) > 0)
										@foreach($countries as $model)
											<tr>
												<td>{{$model->id}}</td>
												<td>{{ $model->en_name ? $model->en_name->name : '' }}</td>
												<td>{{$model->ar_name ? $model->ar_name->name : '' }}</td>
												<td>{{ $model->currency != null ? $model->currency->title : ''}}</td>
												<td>
													@if($model->flag != '')
														<!-- <img style="width: 100px; height: 100px;" class="avatar" src="{{ $model->flag }}"/> -->
														<a data-fancybox="gallery" href="{{ $model->flag }}">
															<img class="img-responsive" style="width: 50px; height: 50px;" src="{{ $model->flag }}"/>
														</a> 
													@endif
												</td>
												<td>-</td>
												<td>
												
													<a href="javascript:;" class="btn btn-icon btn-xs waves-effect btn-default m-b-5"  data-toggle="modal" data-target="#exampleModal{{$model->id}}">
														<i class="fa fa-edit"></i>
													</a>

													<a href="javascript:;" id="delete{{ $model->id }}" data-id="{{ $model->id }}" class="btn btn-icon btn-trans btn-xs waves-effect waves-light btn-danger m-b-5 delete" data-url="http://localhost:8000/api/setting/countries/{{$model->id}}">
														<i class="fa fa-remove"></i>
													</a>

													<a href="javascript:;" id="elementRow{{ $model->id }}" data-id="{{ $model->id }}" data-status="{{$model->is_active}}"
														class="elementStatus btn btn-icon btn-trans btn-xs waves-effect waves-light btn-danger m-b-5">
														
														@if($model->is_active == 1)
															<label class="label label-danger label-xs">deactivate</label>
														@else
															<label class="label label-success label-xs">activate</label>
														@endif
													</a>

													<!-- Modal -->
													<div class="modal fade" id="exampleModal{{$model->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel">Edit Country</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<form id="editCountry" action="http://localhost:8000/api/setting/countries/{{$model->id}}" method="post" enctype="multipart/form-data">
														<div class="modal-body">
															
																{{ method_field('PUT') }}
																<div class="form-group">
																	<label class="col-form-label">Name in Ar :</label>
																	<input type="text" class="form-control" name="ar[name]" value="{{$model->ar_name->name}}" required data-parsley-required-message="kindly enter country name">
																</div>
																<div class="form-group">
																	<label class="col-form-label">Name in En :</label>
																	<input type="text" class="form-control" name="en[name]" value="{{$model->en_name->name}}" required data-parsley-required-message="kindly enter country name">
																</div>
																<div class="form-group">
																	<label class="col-form-label">currency:</label>
																	<select class="form-control m-input" name="currency_id" required data-parsley-required-message="kindly select currency">
																		<option value="" disabled>Select</option>
																		@forelse($currencies as $currency)
																		<option value="{{ $currency->id }}" @if($model->currency){{$model->currency->id == 0 ? 'selected' : ''}}@endif>{{ $currency->title }}</option>
																		@empty
																		@endforelse
																	</select>
																</div>
																<div class="form-group">
																	<label class="col-form-label">status:</label>
																	<select class="form-control m-input" name="is_active" required data-parsley-required-message="kindly select status">
																		<option value="">Select</option>
																		<option value="1" {{$model->is_active == 1 ? 'selected' : ''}}>activated</option>
																		<option value="0" {{$model->is_active == 0 ? 'selected' : ''}}>deactivated</option>
																	</select>
																</div>

																<div class="form-group">
																	<label class="col-form-label">flag:</label>
																	<input type="file" class="dropify" name="flag" data-max-file-size="6M" accept="image/*"
																	data-default-file="{{ $model->flag }}">
																</div>
															
														</div>
														<div class="modal-footer">
															<button type="reset" class="btn btn-secondary" data-dismiss="modal" onclick="Custombox.close();">Close</button>
															<button type="submit" class="btn btn-primary" CausesValidation="False">Save changes</button>
														</div>
														</form>
														</div>
													</div>
													</div>

												</td>
										
											</tr>
										@endforeach
									@else
									<tr><td colspan="6">--</td></tr>
									@endif
										
										
									</tbody>
									
								</table>
							</div>
						</div>
@endsection
