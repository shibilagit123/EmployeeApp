            @extends('layouts.master')
                      @section('custom_css')
                   
                      @endsection
                      @section('content')
                      
                      <div class="content-wrapper">
                           <div class="content-heading">
                            <span><em class="fa fa-group"></em> {{ $title_name }}</span> 
                           </div><div class="row" style="float: right;">
                            
                             
                           </div>
                        <div class="container-fluid">
                           
                          <div class="panel panel-default">
                            


                        <div class="panel-body">

                          <form class="form-horizontal" action="{{ route('employee.store') }}" id="form" method="post" >
                            @csrf
                            <div class="">
                              <div class="col-sm-4">
                               <label class="control-label">
                                 Name
                               </label>
                               <input type="text" class="form-control " name="name">
                             </div>

                             <div class="col-sm-4">
                                    <label class="control-label">Select Gender</label>
                                   
                                        <select class="custom-select col-12" name="gender">
                                            <option value="">Select Gender</option>
                                            
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                            <option value="3">Other</option>
                                            
                                          
                                        </select>
                                        
                                    </div>
                                   <div class="col-sm-4">
                                    <label class="control-label">Dob</label>
                                    <div class="input-group date" id="datetimepicker1"><input type="text" name="dob" class="form-control" placeholder="Date" onchange="read" value=""  ><span class="input-group-addon"><span class="fa fa-calendar"></span></span></div></div>
                              <div class="col-sm-4">
                                    <label class="control-label">Address</label>
                                   
                                        <input class="form-control" type="text"  name="address" placeholder="Address">
                                    </div>
                                 <div class="col-sm-4">
                                    <label class="control-label">Mobile</label>
                                   
                                        <input class="form-control" type="tel" placeholder="" name="mobile">
                                    
                                </div>
                              </div>
                            
                                 <div class="col-sm-4">
                                    <label class="control-label">Email</label>
                                   
                                        <input class="form-control" value="" type="email" name="email" placeholder="email">
                                    </div>
                                
                               
                                
                               <div class="">
                                 
                                
                                
                              <div class="col-sm-3">
                               <label class="control-label">
                                 Designation
                               </label>
                               <select name="designation_id" id="designation_id" class="form-control select2" onchange="getdepartment(this)" >
                                 <option value=""></option>
                                 @foreach($designation as $des)
                                 <option value="{{ $des->id }}">{{ $des->name }}</option>
                                 @endforeach
                               </select>
                             </div>
                             <div class="col-sm-3">
                              <label class="control-label">Department</label>
                              <select class="form-control select2" name="department_id" id="department_id" >
                                @foreach($department as $dep)
                                <option value="{{$dep->id }}" >{{ $dep->name }}</option>
                              @endforeach
                            </select>
                          </div>
                        

                                  <div class="col-sm-3">
                                    <label class="control-label">Date of join</label>
                                    <div class="input-group date" id="datetimepicker3"><input type="text" name="doj" class="form-control" placeholder="Date" onchange="read" value=""  ><span class="input-group-addon"><span class="fa fa-calendar"></span></span></div></div>

                                   <div class="col-sm-3">
                                    <label class="control-label">Image</label>
                                   
                                        <input class="form-control" type="file" name="image">
                                    
                                </div>
                            
                           
                  

            </div> 
             
                     
            <br>
            <div>
              
            </div>


            <div class="form-group">
             <div class="col-sm-12">
              <div class="pull-right">
               <button class="btn btn-sm btn-info" type="submit">Submit</button>
             </div>  
            </div>
            </div>

            </form>

           <div class="table-responsive">
                                        <table id="datatable2" class="table table-striped table-hover">
                                           <thead>
                                              <tr>
                                                 <th>Sl.No</th>
                                                 <th>Image</th>
                                                 <th>Name</th>
                                                 <th>Gender</th>
                                                 <th>Mobile</th>
                                                 <th>email</th>
                                                 <th>Date of Birth</th>
                                                 <th>Address</th>
                                                 <th>Designation</th>
                                                 <th>Department</th>
                                                 <th>Joining Date</th>
                                                 <th>Status</th>
                                              
                                              </tr>
                                           </thead>
                                           <tbody>
                                            @foreach($emp as $key=>$row)
                                              <tr>
                                                <td>{{$key+1}}</td>
                                                <td> <img src="{{ (asset($row->image))  }}" alt="Avatar" style="width:40px;height:40px;" class="img-thumbnail img-circle"></td>
                                                <td>{{$row->name}}</td>
                                                <td>{{$row->gender=='1' ? 'Male' : 'Female'}}</td>
                                                <td>{{$row->mobile}}</td>
                                                <td>{{$row->email}}</td>
                                                 <td>{{date('d/m/Y',strtotime(str_replace('-','/',$row->dob)))}}</td>
                                                <td>{{$row->Address}}</td>
                                                <td>{{$row->designation->name}}</td>
                                                <td>{{$row->department->name}}</td>
                                                <td>{{date('d/m/Y',strtotime(str_replace('-','/',$row->doj)))}}</td>
                                               
                                               <td>
                                               <a href="{{ route('employee.edit',['id'=>$row->id]) }}"><i class="fa fa-edit fa-lg text-info"></i></a>
                                      
                                             <a href="JavaScript:void(0)"><i class="fa fa-trash fa-lg text-danger" onclick="deleteThis(this,{{ $row->id }});"></i></a>     <form action="{{ route('employee.destroy',['id'=>$row->id]) }}" method="POST" id="form-delet{{ $row->id }}" style="display: none;">
                                         @csrf
                                     @method('delete')
                                       <input type="hidden"  name="id" value="{{ $row->id }}">
                                     </form>
                                 <button class="btn btn-xs {{ $row->status=='1' ? 'btn-success' : 'btn-warning' }}" rel1="{{ $row->status}}"  rel2="{{ $row->id }}"  >{{ $row->status=='2'   ? ' In Active' : 'Active'}}</button>
                                    </td>
                                              </tr>
                                              @endforeach
                                             
                                           </tbody>
                                        </table>
                                     </div>

                  <!-- <div id="calendar"></div>
                  -->
                </div>
              
                </div>
                      
                </div>
                </div>

                @endsection

                @section('custom_js')

                <script>
                  $('#datetimepicker3').datetimepicker({
                  defaultDate: new Date(),
                  format: 'DD/MM/YYYY',

                });
                  $('#datetimepicker1').datetimepicker({
                  defaultDate: new Date(),
                  format: 'DD/MM/YYYY',

                });
               

          $('#form').submit(function(event) {

            /* Act on the event */
            event.preventDefault();
            var form = document.getElementById('form');
            var fdata = new FormData(form);
            var url = '';
            $.ajax({
              url: $(this).attr('action'),
              type: 'POST',
              dataType: 'json',
              data: fdata,
              processData: false,
              contentType: false
            })
            .done(function(data) {
              if(data.status=="error")
              {
                swal('Warning',data.msg, 'warning');
              }
              else
              {
                swal({
                  title: "Success!",
                  text: data.msg,
                  type: "success"
                }, function() {
                  // var slug = data.ax;
                  window.location.href = '{{ route('employee.create') }}';
                });
              }
            });
            
          });

          function deleteThis(ele,id) {

          sweetAlert({
            title: "Are you sure?",
            /*text: "You will not be able to recover this banner!",*/
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            closeOnConfirm: false,
            closeOnCancel: false
          },
          function(isConfirm){
         
            if (isConfirm) {
              $('#form-delet'+id).submit();
              
            } else {
                sweetAlert('Cancelled!', "", "success");
            }
          });
         
        }
function getdepartment(ele)
  {
      var des_id =$(ele).val();
       
     $.ajax({
            url: '{{ route('department.search') }}',
            type:'POST',
            dataType:'json',
            data: {des_id:des_id,'_token':'{{ csrf_token() }}'},
          })
  .done(function(data) {

    $('#department_id').append('<option value="'+data.department.id+'" selected>'+data.department.name+'</option/>')
    
  });
  }

                </script>
                @endsection
