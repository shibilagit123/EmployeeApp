@extends('layouts.master')
          @section('custom_css')
       
          @endsection
          @section('content')
          
          <div class="content-wrapper">
               <div class="content-heading">
                <span><em class="fa fa-group"></em> {{ $title_name }}</span> 
               </div>
            <div class="container-fluid">
              
              <div class="panel panel-default"><button type="button"  data-toggle="modal" href="#modal-add-dis" class="btn-primary btn-xs pull-right">Add Designation</button>
                <div class="panel-body"></div>

            <div class="panel-body">
            

                <div class="table-responsive">
                              <table id="datatable2" class="table table-striped table-hover">
                                 <thead>
                                    <tr>
                                       <th>Sl.No</th>
                                       <th>Name</th>
                                       <th>Status</th>
                                    
                                    </tr>
                                 </thead>
                                 <tbody>
                                  @foreach($designation as $key=>$row)
                                    <tr>
                                      <td>{{$key+1}}</td>
                                      <td>{{$row->name}}</td>
                                     
                                     <td><button class="btn btn-xs {{ $row->status=='1' ? 'btn-success' : 'btn-warning' }}" rel1="{{ $row->status}}"  rel2="{{ $row->id }}"  >{{ $row->status=='1'   ? 'Active' : 'In Active'}}</button></td>
                                    </tr>
                                    @endforeach
                                   
                                 </tbody>
                              </table>
                           </div>


               
    </div>
  
    </div>
          
    </div>
    </div>

    @endsection

    @section('custom_js')
<div class="modal fade" id="modal-add-dis">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Designation</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <form class="form-horizontal" action="{{ route('designation.store') }}" method="post" accept-charset="utf-8" id="form2">
      @csrf
        <div class="modal-body">
         <div class="form-group">
           <div class="col-sm-12">
             <label class="control-label">
               Designation Name
             </label>
             <input type="text" name="name" class="form-control" placeholder="Name">
           </div>
           <div class="col-sm-12">
                              <label class="control-label">Department</label>
                              <select class="form-control select2" name="department_id" id="department_id" >
                                @foreach($department as $dep)
                                <option value="{{$dep->id }}" >{{ $dep->name }}</option>
                              @endforeach
                            </select>
                          </div>
         </div>
        
       <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
  </div>
</div>
</div>

    <script>
      $('#datetimepicker3').datetimepicker({
      defaultDate: new Date(),
      format: 'DD/MM/YYYY',

    });
   
$('#form2').submit(function(event) {

            /* Act on the event */
            event.preventDefault();
            var form = document.getElementById('form2');
            var fdata = new FormData(form);
            var url = '';

   $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: fdata,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (data) {
                 
            }
            error: function (reject) {
                if( reject.status === 422 ) {
                    var errors = $.parseJSON(reject.responseText);
                    $.each(errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    });
                }
            }
        });
  
});



    </script>
    @endsection
