    @extends('layouts.master')
              @section('custom_css')
           
              @endsection
              @section('content')
              
              <div class="content-wrapper">
                   <div class="content-heading">
                    <span><em class="fa fa-group"></em> {{ $title_name }}</span> 
                   </div>
                <div class="container-fluid">
                  <div  class="row">
                    <div class="col-sm-4">
                         <label class="control-label">
                           Project name
                         </label>
                         <select name="project_id" class="form-control select2" id="project_id" >
                           <option value=""></option>
                           @foreach($projects as $pt)
                           <option value="{{ $pt->id }}">{{ $pt->name }}</option>
                           @endforeach
                         </select>
                       </div>
                    
                  </div>
                  
                  <div class="panel panel-default">
                    <div class="panel-body"></div>

                <div class="panel-body">
                     

                    <div class="table-responsive">
                                  <table id="" class="table table-striped table-hover">
                                     <thead>
                                        <tr>
                                           <th>Sl.No</th>
                                           <th>Project Name</th>
                                           <th>Task</th>
                                           <th>Hours</th>
                                        
                                        </tr>
                                     </thead>
                                     <tbody id="show">
                                     
                                        <tr>
                                          <td></td>
                                          <td></td>
                                          <td></td>
                                         
                                         
                                        </tr>
                                       
                                       
                                     </tbody>
                                     <tfoot id="foot" >
                                      <tr><td></td>
                                          <td></td>
                                          <td style="font-color:red">Total Hours</td>
                                          <td id="alltotal" style="font-color:red"></td>  </tr>
                                       
                                     </tfoot>
                                  </table>
                               </div>


                   
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

          $('#project_id').change(function(event) {
        /* Act on the event */
       var pid =  $('#project_id').val();

       
           $.ajax({
                url: '{{ route('report.searchbyproject') }}',
                type:'POST',
                dataType:'json',
                data: {pid:pid,'_token':'{{ csrf_token() }}'},
              })

               .done(function(data) {
                    var html = '';
                    var all;
                    let total =new Array();
               $.each(data.time, function(index, val) {
                all =+val.hours
                total.push(val.hours);
               // var total22 = total22+(val.hours);
              // console.log(total);
                 var ind = index+1;
                  html += '<tr>'+
                    '<td>'+ind+'</td>'+
                    '<td>'+val.project.name+'</td>'+
                    '<td>'+val.task.name+'</td>'+
                    '<td>'+val.hours+'</td>'+
                  '</tr>';
                

                  });
               let totalSum = total.reduce((accumulator, currentValue) => accumulator + Number(currentValue), 0);
              var sum = total.reduce(function(a, b){
                    return a + b;
                }, 0);

           // console.log(totalSum);
               $('#alltotal').html(totalSum);
               $('#show').html(html);
                 

                }) 

                
               
      });
       




        </script>
        @endsection
