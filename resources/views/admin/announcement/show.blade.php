@extends('admin.layout')
@section('active7')
active
@endsection
@section('main')


<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
      
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                 
              <table class="display nowrap " id="tableDashboard" data-page-length='50' >
                <thead>
                  <tr>
                    <th class=" text-center text-uppercase text-secondary  font-weight-bolder opacity-7">{!!trans('admin.TITLE')!!}</th>
                    <th class=" text-center text-uppercase text-secondary  font-weight-bolder opacity-7 ps-2">{!!trans('admin.annoucement')!!}</th>
                    <th class="text-center text-uppercase text-secondary  font-weight-bolder opacity-7">{!!trans('admin.notes')!!}</th>
                   <th class="text-secondary opacity-7">{{trans('admin.Action')}}</th>
                  </tr>
                </thead>
                <tbody>
               
                
                 
                  <tr>
                   
                    <td>
                      <p class=" font-weight-bold mb-0"> {{$Announcement[0]->name}}</p>
                     
                    </td>
                    <td class="d-flex align-items-center justify-content-center">
                        @if($Announcement[0]->Status == 'veduo')
                        <video width="100" height="100" controls>
                              <source src="{{asset('/Announcement/viduo/'.$Announcement[0]->file_name)}}" >                                      
                            </video>                              
                      @endif
                     
                      
                     @if($Announcement[0]->Status == 'img')
                          <img src="{{asset('upload/Announcement/img/'.$Announcement[0]->file_name)}}" width="100" height="100">                                                          
                      @endif
                      

                    @if($Announcement[0]->Status == 'link')
                   
                    <iframe width="420" height="315"
src="{{$Announcement[0]->file_name}}">
</iframe>
                          
                          
                      
                      @endif

                            


                       
                         
                        </td>
                   
                    <td class="align-middle text-center ">
                        <p class=" font-weight-bold mb-0"> {{$Announcement[0]->description}}</p>
                       
                      </td>
                  <td class="align-middle">
                        
                         <!-- Button trigger modal Add Data -->
                        <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#add{{$Announcement[0]->id}}">
                       اضافة مرفقات
                        </button>
                        
                      </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
    <!-- add Modal -->
                     <div class="modal fade" id="add{{$Announcement[0]->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                          
                            
                          </div>
                          <div class="modal-body row">
                          <form action="{{url("Attachmet/store")}}" method="post" enctype="multipart/form-data">                                          
                            @csrf                                
                              <input id="id" type="hidden" name="id" class="form-control" value="{{$Announcement[0]->id}}">
                              
                             
                            
                              <div class="form-group col-md-6">
                                <label >{!!trans('admin.PHOTO')!!}</label>
                                  <input type="file" class="form-control"  required name="photo" accept="image/*" >
                                </div>
                              
                            
                        
                            </div>
                              
                              <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></button>
                                    <button type="submit" class="btn btn-primary">add</button>
                                </div>
                          </form>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                        <!-- end  add Modal -->
       <!-- end  Attachment -->
              <div class="container-fluid py-4">
    <div class="row">
      @forelse ( $attachments as $data)
        <div class="col">
       <div >
               <img src="{{asset("$data->photo")}}" width="100" height="100" class='mb-1'><br>
                <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#delete{{$data->id}}">
                          Delete
                          </button> 

        </div>
        </div>
               <!-- delete Modal -->
     
      <div class="modal fade" id="delete{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Are you delete ? </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <form action="{{url("Attachmet/delete")}}" method="post">                                          
                            @csrf                                
                              <input id="id" type="hidden" name="id" class="form-control" value="{{$data->id }}">
                            
                              <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></button>
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                </div>
                          </form>
                          </div>
                        
                        </div>
                      </div>
                    </div>
     
      @empty
       لا يوجد صور اضافية
     
     
     
     
     
     
     
       @endforelse       
      </div>
    </div>
              </div>


                    

@endsection