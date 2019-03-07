@extends('admin.layouts.app')
@section('title')
Regions
@endsection

@section('header')
    {!! Html::style('admin/vendors/custom/datatables/datatables.bundle.rtl.css') !!}
@endsection

@section('topBar')
    <!-- <li class="m-menu__item">
        <a href="" class="m-menu__link">
            <span class="m-menu__link-text">الرئيسية</span>
            <i class="m-menu__hor-arrow la la-angle-left"></i>
        </a>
    </li>
    <li class="m-menu__item active-top-bar">
        <a href="javascript:;" class="m-menu__link">
            <span class="m-menu__link-text">صفحة عرض الدول</span>
            <i class="m-menu__hor-arrow la la-angle-down"></i>
        </a>
    </li>
    <li class="m-menu__item">
        <a href="" class="m-menu__link">
            <span class="m-menu__link-text">صفحة إضافة دوله</span>
            <i class="m-menu__hor-arrow la la-angle-down"></i>
        </a>
    </li> -->
@endsection

@section('content')
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Regions
                    </h3>
                </div>
            </div>

            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="#" class="btn btn-info m-btn m-btn--custom m-btn--icon m-btn--air"  data-toggle="modal" data-target="#createCompany">
                            <span>
                                <i class="la la-plus"></i>
                                <span>New Region</span>
                            </span>
                        </a>
                    </li>
                    <li class="m-portlet__nav-item"></li>

                    <!-- Modal -->
        <div class="modal fade" id="createCompany" tabindex="-1" role="dialog" aria-labelledby="createCompanyLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="createCompanyLabel">Create new Region</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form id="storeCountry" action="http://localhost:8000/api/setting/regions" method="post" enctype="multipart/form-data" data-parsley-validate novalidate>
              <div class="modal-body">
                <div class="form-group">
                    <label class="col-form-label">Name in Ar :</label>
                    <input type="text" class="form-control" name="ar[name]" required data-parsley-required-message="kindly enter city name"> 
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Name in En :</label>
                    <input type="text" class="form-control" name="en[name]" required data-parsley-required-message="kindly enter city name">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">city:</label>
                    <select class="form-control m-input" name="city_id" required data-parsley-required-message="kindly select city">
                        <option value="">Select</option>
                        @forelse($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->en_name->name }}</option>
                        @empty
                        @endforelse
                        
					</select>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">status:</label>
                    <select class="form-control m-input" name="status" required data-parsley-required-message="kindly select status">
						<option value="">Select</option>
						<option value="1">activated</option>
						<option value="0">deactivated</option>
					</select>
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
                    
                </ul>
            </div>
        </div>
        <div class="m-portlet__body">

            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover responsive" id="m_table_1">
                <thead>
                <tr>
                    <!-- <th>#</th> -->
                    <th>Region ID</th>
                    <th>Name in AR</th>
                    <th>Name in En</th>
                    <th>City</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($regions as $model)
                <tr>
                <td>{{$model->id}}</td>
                <td>{{ $model->en_name ? $model->en_name->name : '-' }}</td>
                <td>{{$model->ar_name ? $model->ar_name->name : '=' }}</td>
                <td>{{ $model->city != null ? $model->city->en_name->name : '-'}}</td>

                <td>{{ $model->status == 1 ? 'active' : 'deactive'}}</td>
                
                <td>

                    <a href="javascript:;" id="elementRow{{ $model->id }}" data-id="{{ $model->id }}" data-status="{{$model->status}}"
                        class="elementStatus">
                        
                        @if($model->status == 1)
                            <label class="badge badge-pill badge-warning">deactivate</label>
                        @else
                            <label class="badge badge-pill badge-success">activate</label>
                        @endif

                    </a>    
                    
                    <a href="javascript:;" class="btn btn-icon btn-xs waves-effect btn-default m-b-5"  data-toggle="modal" data-target="#exampleModal{{$model->id}}">
                        <i class="fa fa-edit"></i>
                    </a>

                    <a href="javascript:;" id="delete{{ $model->id }}" data-id="{{ $model->id }}" class="btn btn-icon btn-xs waves-effect btn-default m-b-5 delete" data-url="http://localhost:8000/api/setting/regions/{{$model->id}}">
                        <i class="fa fa-times"></i>
                    </a>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$model->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Region</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form id="editCountry" action="http://localhost:8000/api/setting/regions/{{$model->id}}" method="post" enctype="multipart/form-data">
                          <div class="modal-body">
                            
                                {{ method_field('PUT') }}
                                <div class="form-group">
                                    <label class="col-form-label">Name in Ar :</label>
                                    <input type="text" class="form-control" name="ar[name]" value="{{$model->ar_name ? $model->ar_name->name : ''}}" required data-parsley-required-message="kindly enter city name">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Name in En :</label>
                                    <input type="text" class="form-control" name="en[name]" value="{{$model->en_name ? $model->en_name->name : ''}}" required data-parsley-required-message="kindly enter city name">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">City :</label>
                                    <select class="form-control m-input" name="city_id" required data-parsley-required-message="kindly select city">
                                        <option value="" disabled>Select</option>
                                        @forelse($cities as $city)
                                            <option value="{{ $city->id }}" @if($model->city){{$model->city->id == $city->id ? 'selected' : ''}}@endif>{{ $city->en_name->name }}</option>
                                        @empty
                                        @endforelse
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">status:</label>
                                    <select class="form-control m-input" name="status" required data-parsley-required-message="kindly select status">
                                        <option value="">Select</option>
                                        <option value="1" {{$model->status == 1 ? 'selected' : ''}}>activated</option>
                                        <option value="0" {{$model->status == 0 ? 'selected' : ''}}>deactivated</option>
                                    </select>
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
                @empty
                
                @endforelse
                    
                
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('footer')
    
    <script>

        $(document).ready(function() {
            
            $('body').on('click', '.delete', function () {
              var id = $(this).attr('data-id');
              var url = $(this).attr('data-url');
              var $tr = $(this).closest($('#delete' + id).parent().parent());
              swal({
                  title: "Are you sure",
                  text: "",
                  type: "error",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "confirm",
                  cancelButtonText: "cancel",
                  confirmButtonClass: 'btn-danger waves-effect waves-light',
                  closeOnConfirm: true,
                  closeOnCancel: true,
              }, function (isConfirm) {
                  if (isConfirm) {
                      console.log('confirmed');
                      $.ajax({
                          type: 'DELETE',
                          headers: {'Authorization': '{{$access_token}}'},
                          url: url,
                          success: function (data) {
                              console.log(data);
                              if (data.statusCode == 200) {
                                  $tr.find('td').fadeOut(1000, function () {
                                      $tr.remove();
                                  });
                                  $tr.remove();
                                showMessage('city deleted successfully' , 'success');

                              }
                              if (data.statusCode == 404) {
                                showMessage('not found' , 'error');
                              }
                          },
                          error: function(data) {
                              
                            showMessage('not found' , 'error');
                          }
                      });
                  } else {
                      swal({
                          title: "cancelled",
                          text: "",
                          type: "error",
                          showCancelButton: false,
                          confirmButtonColor: "#DD6B55",
                          confirmButtonText: "confirm",
                          confirmButtonClass: 'btn-info waves-effect waves-light',
                          closeOnConfirm: false,
                          closeOnCancel: false
                      });
                  }
              });
          });

          $('form#storeCountry').on('submit', function (e) {
              e.preventDefault();
              var formData = new FormData(this);
              console.log(formData.values());
              for (var value of formData.values()) {
                  console.log(value); 
              }
              $.ajax({
                  type: 'POST',
                  headers: {
                            //'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Authorization': '{{$access_token}}',

                          },
                  url: $(this).attr('action'),
                  data: formData,
                  cache: false,
                  contentType: false,
                  processData: false,
                  success: function (data) {
                      console.log(data);
                      if (data.statusCode == 200) {
                        showMessage('city added successfully' , 'success');
                        location.reload();
                        Custombox.close();                          
                      }else{
                        if (data.statusCode == 502) {
                            showMessage( data.message, 'error');
                            //location.reload();
                            Custombox.close();
                        }
                        console.log(data);
                        showMessage('something wrong' , 'error');
                        //showMessage(data.message , 'error');
                        //redirectPage(route);
                        Custombox.close();
                    }
                  },
                  error: function (data) {
                    console.log(data);
                    showMessage('something wrong' , 'error');
                    Custombox.close();
                  }
              });
              return false;
          });

          //edit country

          $('form#editCountry').on('submit', function (e) {
              e.preventDefault();
              var formData = new FormData(this);
              for (var value of formData.keys()) {
                  console.log(value); 
              }
              $.ajax({
                  type: 'POST',
                  headers: { 'Authorization': '{{$access_token}}'},
                  url: $(this).attr('action'),
                  data: formData,
                  cache: false,
                  contentType: false,
                  processData: false,
                  success: function (data) {
                      console.log(data);
                      if (data.statusCode == 200) {
                        showMessage('city updated successfully' , 'success');
                        location.reload();
                        Custombox.close();
                          
                      }else{
                        if (data.statusCode == 502) {
                        showMessage(data.message , 'error');
                        Custombox.close();
                          //$("#name" + data.id).html('inas');
                          
                      }else{
                        console.log(data);
                        showMessage('something wrong' , 'error');
                        Custombox.close();
                      }
                      }
                  },
                  error: function (data) {
                    console.log(data);
                        showMessage('something wrong' , 'error');
                        //Custombox.close();
                  }
              });
          });

          $('body').on('click', '.elementStatus', function () {
            var id = $(this).attr('data-id');
            var status = $(this).attr('data-status');
            
            if(status == 1){
                status = 0;
                var type = 'error';
            }else{
                status = 1;
                var type = 'success';
            }
            
            var $tr = $(this).closest($('#elementRow' + id).parent().parent());
            swal({
                title: "Are you sure ?",
                text: "",
                type: type,
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "confirm",
                cancelButtonText: "cancel",
                confirmButtonClass: 'btn-danger waves-effect waves-light',
                closeOnConfirm: true,
                closeOnCancel: true,
            }, function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        type: 'POST',
                        headers: { 'Authorization': '{{$access_token}}'  },
                        url: '{{  app('shared')->get('base_url')}}' +'/setting/regions/activate/',
                        data: {id: id , status: status},
                        //dataType: 'json',
                        success: function (data) {
                            console.log(data);
                            if (data.statusCode == 200) {
                                showMessage(data.message , 'success');
                                location.reload();

                                // $tr.find('td').fadeOut(1000, function () {
                                //     $tr.remove();
                                // });

                            } else {
                                showMessage(data.message , 'error');
                            }


                        }
                    });
                } else {

                    // swal({
                    //     title: "cancelled",
                    //     text: "",
                    //     type: "error",
                    //     showCancelButton: false,
                    //     confirmButtonColor: "#DD6B55",
                    //     confirmButtonText: "confirm",
                    //     confirmButtonClass: 'btn-info waves-effect waves-light',
                    //     closeOnConfirm: false,
                    //     closeOnCancel: false

                    // });

                }
            });
        });


        });
    </script>
@endsection
