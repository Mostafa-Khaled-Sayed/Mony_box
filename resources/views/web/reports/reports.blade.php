
    
    <!-- Button trigger modal Add Data -->
    <div class=" col-lg-9 card-header pb-0 card" style=' margin:0px auto;  background-image:linear-gradient(310deg, #999999 70%, #ffffff 30%)'>
        <div class="card mb-4">
            <div class="card-header pb-0">
              <h5> جميع التقارير </h5>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">

                <div class="accordion accordion-flush" id="accordionFlushExample">
                  {{-- start my reports --}}
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                       my reports
                       
                      </button>
                    </h2>
                    
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                      <div class="accordion-body">
                        {{-- table 1 --}}
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                              data-page-length="50"
                              style="text-align: center">
                            <head>

                                <tr>
                                    
                                    <th>mail</th>                                    
                                    <th>code_invention</th>
                                    <th>details</th>                                   
                                </tr>
                                
                            </head>
                           <body>
                              
                                   <tr>                                                                           
                                      <td>{{$reports->email }}</td>                                     
                                        <td>{{$reports->code_invention }}</td>                                      
                                        <td>                                          
                                          <button type="button" class="btn btn-success" >
                                             <a href="{{ url('/my_repo') }}/{{ $reports->id }}">
                                             عرض
                                            </a>
                                            
                                          
                                          </button>                                        
                                          
                                        </td>
                                        
                                   </tr>
                              
                           </body>
                      </table>
                        {{-- End table  --}}

                        </div>
                    </div>
                  </div>
                   {{-- End my reports --}}


                    {{-- start my reports --}}
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                       tem reports
                       
                      </button>
                    </h2>
                    
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                      <div class="accordion-body">
                        {{-- table 1 --}}
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                              data-page-length="50"
                              style="text-align: center">
                            <head>

                                <tr>
                                    
                                    <th>mail</th>                                    
                                    <th>code_invention</th>
                                    <th>details</th>                                   
                                </tr>
                                
                            </head>
                           <body>
                              @foreach ($users as $user)
                                  
                              
                                   <tr>                                                                           
                                      <td>{{$user->email }}</td>                                     
                                        <td>{{$user->code_invention }}</td>                                      
                                        <td>                                          
                                          <button type="button" class="btn btn-success">
                                             <a href="{{ url('/my_repo') }}/{{ $user->id }}">
                                             عرض
                                            </a>
                                            
                                          
                                          </button>                                        
                                          
                                        </td>
                                        
                                   </tr>
                                   @endforeach
                           </body>
                      </table>
                        {{-- End table  --}}

                        </div>
                    </div>
                  </div>
                   {{-- End my reports --}}



                  
                </div>



                 
                   

              </div>
            </div>
          </div>
        </div>

    </div>

    
<!--new design-->
<div class="report-page">
    <div class="">
        <div class="assets-card my-3">
            <div class="report-num">
                <div class="item">
                    <div class="text">Team size</div>
                    <div class="number">0</div>
                </div>
                <div class="item">
                    <div class="text">Team recharge</div>
                    <div class="number">$0.00</div>
                </div>
                <div class="item">
                    <div class="text">Team Withdrawal</div>
                    <div class="number">$0.00</div>
                </div>
            </div>
            <div class="report-num">
                <div class="item">
                    <div class="text">New team</div>
                    <div class="number">0</div>
                </div>
                <div class="item">
                    <div class="text">First time recharge</div>
                    <div class="number">0</div>
                </div>
                <div class="item">
                    <div class="text">First withdrawal</div>
                    <div class="number">0</div>
                </div>
            </div>
        </div>
        <!--start packages-->
        <div class="d-flex packages  justify-content-between">
            <!--item loop package-->
            <div class="item-package lev1">
                <div class="level-content">
                <div class="level-count">
                    <h6>Team size</h6>
                    <span class="number">0</span>
                </div>
                 <div class="level-count">
                    <h6>Team recharge</h6>
                    <span class="number">0</span>
                </div>
                </div>
                <div  class="level-num"> LEV 1 </div>
                <a href="#" class="btn">Details</a>
            </div>
            
            <div class="item-package lev2">
                <div class="level-content">
                <div class="level-count">
                    <h6>Team size</h6>
                    <span class="number">0</span>
                </div>
                 <div class="level-count">
                    <h6>Team recharge</h6>
                    <span class="number">0</span>
                </div>
                </div>
                <div  class="level-num"> LEV 2 </div>
                <a href="#" class="btn">Details</a>
            </div>
            
            <div class="item-package lev3">
                <div class="level-content">
                <div class="level-count">
                    <h6>Team size</h6>
                    <span class="number">0</span>
                </div>
                 <div class="level-count">
                    <h6>Team recharge</h6>
                    <span class="number">0</span>
                </div>
                </div>
                <div  class="level-num"> LEV 3 </div>
                <a href="#" class="btn">Details</a>
            </div>
        </div>
    </div>
</div>





