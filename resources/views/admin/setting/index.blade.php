@extends('admin.layout')
@section('active13')
active
@endsection
@section('main')
<div class="container">
      <!-- Button trigger modal Add Data -->
  
                                                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
      
<h3 style='color:#d63384;'>{{trans('admin.setting')}}</h3>
   
              
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header pb-0">
              
            </div>
            <div class="card-body">
              <div class="table-responsive hoverable-table">
                <table class="display nowrap " id="tableDashboard" data-page-length='50'>
                  <thead>
                    <tr>
                  
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{trans('admin.id')}}</th>
                       <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">{{trans('admin.PHOTO')}}</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{!!trans('admin.email')!!}</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{!!trans('admin.phone')!!}</th>
                       <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">{{trans('admin.facebook')}}</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">تليجرام</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{trans('admin.instegram')}}</th>
                      
                      <th class="text-secondary opacity-7">{{trans('admin.Action')}}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($settings as $data )
                      
                  
                    <tr>
                      <td class="align-middle text-center">{{$loop->iteration}}</td>
                      <td>
                        <div class="align-middle text-center text-sm">
                          
                            <img src="{{asset($data->logo)}}" class="avatar avatar-sm me-3" alt="user1">
                        
                          
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{$data->email}}</p>
                       
                      </td>
                    
                    
                      
                      <td class="align-middle text-center text-sm">
                        
                        <p class="text-xs font-weight-bold mb-0">{{$data->phone}}</p>
                       
                       
                      </td>
                      <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0">{{$data->facebook}}</p>
                      </td>
                 
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$data->twitter}}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$data->instegram}}</span>
                      </td>
                      <td class="align-middle">
                        
                         <!-- Button trigger modal Add Data -->
                        <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#edit{{$data->id}}">
                         Edit
                        </button>
                      
                      </td>
                    </tr>
                 
                         <!-- update Modal -->
                     <div class="modal fade" id="edit{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                          
                            
                          </div>
                          <div class="modal-body row">
                          <form action="{{url("dashboard/setting/update")}}" method="post" enctype="multipart/form-data">                                          
                            @csrf                                
                              <input id="id" type="hidden" name="id" class="form-control" value="{{$data->id }}">
                             <input  type="hidden" name='old_image' value="{{$data->logo}}" >
                              <div class="form-group col-md-6">
                                <label for="inputTitle">{!!trans('admin.email')!!}</label>
                                <input type="email" required  class="form-control" value="{{$data->email}}" name='email' id="inputTitle" placeholder="{!!trans('admin.TITLE')!!}">
                              </div>
                         
                              <div class="form-group col-md-6">
                                <label for="inputPassword4">{!!trans('admin.facebook')!!}</label>
                                <input type="text"   required class="form-control" value="{{$data->facebook}}" name='facebook' id="inputPassword4" placeholder="{!!trans('admin.starting_price')!!}">
                              </div>
                               <div class="form-group col-md-6">
                                <label for="inputPassword4">{!!trans('admin.twitter')!!}</label>
                                <input type="text"   required class="form-control" value="{{$data->twitter}}" name='twitter' id="inputPassword4" placeholder="{!!trans('admin.starting_price')!!}">
                              </div>
                               <div class="form-group col-md-6">
                                <label for="inputPassword4">{!!trans('admin.phone')!!}</label>
                                <input type="text"   required class="form-control" value="{{$data->phone}}" name='phone' id="inputPassword4" placeholder="{!!trans('admin.starting_price')!!}">
                              </div>
                               <div class="form-group col-md-6">
                                <label for="inputPassword4">{!!trans('admin.instegram')!!}</label>
                                <input type="text"   required class="form-control" value="{{$data->instegram}}" name='instegram' id="inputPassword4" placeholder="{!!trans('admin.starting_price')!!}">
                              </div>
                                <div class="form-group col-md-6">
                                <label >{!!trans('admin.PHOTO')!!}</label>
                                  <input type="file" class="form-control"  name="logo" accept="image/*" >
                                </div>
                            </div>
                              <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                          </form>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                        <!-- end  update Modal -->
                    @endforeach
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
     

 
@endsection