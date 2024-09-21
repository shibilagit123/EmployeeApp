   @extends('layouts.master')
        @section('custom_css')
        <link rel="stylesheet" type="text/css" href="{{ asset('css/booking.css') }}">
         
        <style type="text/css">
          body {
    font-family: Arial, sans-serif;
    /* background: url(http://www.shukatsu-note.com/wp-content/uploads/2014/12/computer-564136_1280.jpg) no-repeat; */
    background-size: cover;
    height: 100vh;
  }

  h1 {
    text-align: center;
    font-family: Tahoma, Arial, sans-serif;
    color: #06D85F;
    margin: 80px 0;
  }

  .box {
    width: 40%;
    margin: 0 auto;
    background: rgba(255,255,255,0.2);
    padding: 35px;
    border: 2px solid #fff;
    border-radius: 20px/50px;
    background-clip: padding-box;
    text-align: center;
  }

  .button {
  /*   width:0px;*/
      margin-right:18px;
      margin-bottom: 15px;
      margin-left: 15px;
      width: 19px;
      height: 25px;

      display: inline-block;
      vertical-align:middle;
      text-align: center;
      box-shadow: inset 0px 2px 3px 0px rgba(0, 0, 0, .3), 0px 1px 0px 0px rgba(255, 255, 255, .8);
      background-color:#ccc;
  }
  .button:hover {
    background: #06D85F;
  }

  .overlay {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.7);
    transition: opacity 500ms;
    visibility: hidden;
    opacity: 0;
  }
  .overlay:target {
    visibility: visible;
    opacity: 1;
  }

  .popup {
    margin: 70px auto;
    padding: 20px;
    background: #fff;
    border-radius: 5px;
    width: 30%;
    position: relative;
    transition: all 5s ease-in-out;
  }

  .popup h2 {
    margin-top: 0;
    color: #333;
    font-family: Tahoma, Arial, sans-serif;
  }
  .popup .close {
    position: absolute;
    top: 20px;
    right: 30px;
    transition: all 200ms;
    font-size: 30px;
    font-weight: bold;
    text-decoration: none;
    color: #333;
  }
  .popup .close:hover {
    color: #06D85F;
  }
  .popup .content {
    max-height: 30%;
    overflow: auto;
  }
  .btnc{
     width: 70px;
      height: 50px;

      display: inline-block;
      vertical-align:middle;
      text-align: center;
      box-shadow: inset 0px 2px 3px 0px rgba(0, 0, 0, .3), 0px 1px 0px 0px rgba(255, 255, 255, .8);
      background-color:#ccc;
  }

  @media screen and (max-width: 700px){
    .box{
      width: 70%;
    }
    .popup{
      width: 70%;
    }
  }
     .roomno{
    float: right;
    margin-bottom: 20px;
     }
        </style>
        @endsection
        @section('content')
        <!-- Page content-->
        
        <div class="content-wrapper">
             <div class="content-heading">
              <span><em class="fa fa-group"></em>Dashboard</span> 
             </div>
          <div class="container-fluid">
            
            <div class="panel panel-default">
              <div class="panel-body">


  </div>
  </div>



    

    <hr>
                            


  @endsection

  @section('custom_js')

  <script>
    $('#package_id').change(function(event)
  {
    $('#plan_id').html('');
    var pk  =$('#package_id').val();
    var fd = new FormData();
        fd.append( 'pk', pk );
        fd.append( '_token', '{{ csrf_token() }}' );
    
  $.ajax({
      url:'',
      type: 'POST',
      dataType: 'json',
      data: fd,
      processData: false,
      contentType: false,
      success: function(data){
              $('#plan_id').append('<option value="'+data.plan.id+'" selected>'+data.plan.details+'</option>');
      }
    })

  }) 
     $('#agent_id').change(function(event)
    {
     var agnt = $('#agent_id').val()
     if(agnt=='1')
     { 
        $('#tr_agentid').show();
        $('#tr_agentid2').show();
         $('#local_guid').hide();
     }
     if(agnt=='4')
     {
          $('#local_guid').show();

        $('#tr_agentid').hide();
        $('#tr_agentid2').hide();
     }
     if(agnt=='3'||agnt=='2'||agnt=='5')
     {
          $('#local_guid').hide();

        $('#tr_agentid').hide();
        $('#tr_agentid2').hide();
     }
     });
     $('#datetimepicker3').datetimepicker({
    defaultDate: new Date(),
    format: 'DD/MM/YYYY',

  });
    function showname(ele)
  {
     var room= $(ele).val();
      var fd = new FormData();
      var html='';
        fd.append( 'room', room);
        fd.append( '_token', '{{ csrf_token() }}' );
        $.ajax({
      url:'',
      type: 'POST',
      dataType: 'json',
      data: fd,
      processData: false,
      contentType: false,
      success: function(data){
      if(data.status=="Success")
      {
               swal({  
            title: "In this Room -"+data.book.room+","+"Guest Details",  
            text:"Guest Name:"+data.book.guest.guest_name+","+"Guest Phone:"+data.book.guest.phone,   
            closeOnConfirm: false,  
            inputPlaceholder: "Write text"  
          },);
      }
       
      }
    })

  }
   $(document).ready(function() {
      // $("#local_guaid_id").select2();
      // $("#travel_agent_id").select2();
      $(".catlog").select2();
      $(".agent").select2();
      $(".guid").select2();
  });

  function datechange(ele)
  {
     var date = $('#date').val();
     var room= $(ele).val();
      var fd = new FormData();
        fd.append( 'room', room);
        fd.append( 'date', date);
        fd.append( '_token', '{{ csrf_token() }}' );
        $.ajax({
      url:'',
      type: 'POST',
      dataType: 'json',
      data: fd,
      processData: false,
      contentType: false,
      success: function(data){
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
        });
      }  
      }
    })

  }
  function datechange1(ele)
  {
     var date = $('#date').val();
     var room= $('#room').val();
      var fd = new FormData();
        fd.append( 'room', room);
        fd.append( 'date', date);
        fd.append( '_token', '{{ csrf_token() }}' );
        $.ajax({
      url:'',
      type: 'POST',
      dataType: 'json',
      data: fd,
      processData: false,
      contentType: false,
      success: function(data){
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
        });
      }  
      }
    })

  }
  // $("#popup1").on('shown.bs.modal', function (e) {
  //   var id = $(e.relatedTarget).data('id');
  //   var fd = new FormData();
  //     var html='';
  //       fd.append( 'id', id);
  //       fd.append( '_token', '{{ csrf_token() }}' );
  //       $.ajax({
  //     url:'',
  //     type: 'POST',
  //     dataType: 'json',
  //     data: fd,
  //     processData: false,
  //     contentType: false,
  //     success: function(data){
  //     if(data)
  //     {
  //       $('#popup1 #head').val('hhh');
  //       $('#popup1 #content').val('ddhhh');
  //     }
       
  //     }
  //   })
  //   });


  $('#form22').submit(function(event) {

    /* Act on the event */
    event.preventDefault();
    var form = document.getElementById('form22');
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
          
          window.location.href ='{{ route('home') }}';
        });
      }
    });
    
  });
  </script>
  <script >
         
        function onLoaderFunc()
  {
    $(".seatStructure *").prop("disabled", false);
    $(".displayerBoxes *").prop("disabled", false);
  }
  function takeData()
  {
    if (( $("#Username").val().length == 0 ) || ( $("#Numseats").val().length == 0 ))
    {
    alert("Please Enter your Name and Number of Rooms");
    }
    else
    {
      $(".inputForm *").prop("disabled", true);
      $(".seatStructure *").prop("disabled", false);
      document.getElementById("notification").innerHTML = "<b style='margin-bottom:0px;background:yellow;'>Please Select your Rooms NOW!</b>";
    }
  }


  function updateTextArea() { 
      
    if ($("input:checked").length == ($("#Numseats").val()))
      {
        $(".seatStructure *").prop("disabled", true);
        
       var allNameVals = [];
       var allNumberVals = [];
       var allSeatsVals = [];
    
       //Storing in Array
       allNameVals.push($("#Username").val());
       allNumberVals.push($("#Numseats").val());
       $('#seatsBlock :checked').each(function() {
         allSeatsVals.push($(this).val());
       });
      
       //Displaying 
       $('#nameDisplay').val(allNameVals);
       $('#NumberDisplay').val(allNumberVals);
       $('#seatsDisplay').val(allSeatsVals);
      }
    else
      {
        alert("Please select " + ($("#Numseats").val()) + " seats")
      }
    }


  function myFunction() {
    alert($("input:checked").length);
  }



  /*
  function getCookie(cname) {
      var name = cname + "=";
      var ca = document.cookie.split(';');
      for(var i = 0; i < ca.length; i++) {
          var c = ca[i];
          while (c.charAt(0) == ' ') {
              c = c.substring(1);
          }
          if (c.indexOf(name) == 0) {
              return c.substring(name.length, c.length);
          }
      }
      return "";
  }
  */


  $(":checkbox").click(function() {
    if ($("input:checked").length == ($("#Numseats").val())) {
      $(":checkbox").prop('disabled', true);
      $(':checked').prop('disabled', false);
    }
    else
      {
        $(":checkbox").prop('disabled', false);
      }
  });



        </script>
  @endsection
