@extends('layouts.app')

@section('content')
<style>

</style>
   <section class="content-header">
      <h1>
        Genealogy
        <small>View</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Genealogy</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
	
	
	

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Genealogy Tree </div>

                <div class="panel-body">
					         <div class="row">
                  

                      <div class="col-md-12">
                         <button  id="btnencode" name="btnencode"  data-cid="" data-position=""  data-upline="" data-toggle="" data-target="" class="btn btn-primary" width="300px" disabled>Encode</button>  <button  id="btnupgrade" name="btnupgrade"  class="btn btn-warning" width="300px" disabled><i class="fa fa-star"></i> Upgrade</button><br /> <br />

                             <div id="chart_div">
                            
                          </div>
                      </div>

                   </div>

		
								          
                </div>



            </div>
        </div>
    </div>
</div>

@include('layouts.regmodal')

@include('layouts.activationmodal')

<script type="text/javascript">






      google.charts.load('current', {packages:["orgchart"]});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('string', 'Manager');
        data.addColumn('string', 'ToolTip');
         data.addColumn('string', 'status');
         data.addColumn('string', 'position');
          data.addColumn('string', 'id');
           data.addColumn('string', 'at_type');
        

        // For each orgchart box, provide the name, manager, and tooltip to show.
        data.addRows([
          [{v:'{{$tree["username"]}}', f:'{{$tree["username"]}}<img src="'+'{{$tree["actype_image"]}}'+'" width="100" height="15"><br /><img src="'+'{{$tree["image"]}}'+'" width="100" height="100">'},
           '', '{{$tree["id"]}}','1','0','{{$tree["id"]}}','{{$tree["at_id"]}}'],


           //first ref
          [{v:'{{$tree["downline"][0]["username"]}}', f:'{{$tree["downline"][0]["username"]}}<img src="'+'{{$tree["downline"][0]["actype_image"]}}'+'" width="100" height="15"><br /><img src="'+'{{$tree["downline"][0]["image"]}}'+'" width="100" height="100">'},
           '{{$tree["username"]}}', '{{$tree["downline"][0]["id"]}}','{{$tree["downline"][0]["status"]}}','1','{{$tree["id"]}}','{{$tree["downline"][0]["at_id"]}}'],

         [{v:'{{$tree["downline"][0]["downline"][0]["username"]}}', f:'{{$tree["downline"][0]["downline"][0]["username"]}}<img src="'+'{{$tree["downline"][0]["downline"][0]["actype_image"]}}'+'" width="100" height="15"><br /><img src="'+'{{$tree["downline"][0]["downline"][0]["image"]}}'+'" width="100" height="100">'}, '{{$tree["downline"][0]["username"]}}', '{{$tree["downline"][0]["downline"][0]["id"]}}','{{$tree["downline"][0]["downline"][0]["status"]}}','1','{{$tree["downline"][0]["id"]}}','{{$tree["downline"][0]["downline"][0]["at_id"]}}'],


            [{v:'{{$tree["downline"][0]["downline"][1]["username"]}}', f:'{{$tree["downline"][0]["downline"][1]["username"]}}<img src="'+'{{$tree["downline"][0]["downline"][1]["actype_image"]}}'+'" width="100" height="15"><br /><img src="'+'{{$tree["downline"][0]["downline"][1]["image"]}}'+'" width="100" height="100">'}, '{{$tree["downline"][0]["username"]}}', '{{$tree["downline"][0]["downline"][1]["id"]}}','{{$tree["downline"][0]["downline"][1]["status"]}}','2','{{$tree["downline"][0]["id"]}}','{{$tree["downline"][0]["downline"][1]["at_id"]}}'],


           [{v:'{{$tree["downline"][0]["downline"][2]["username"]}}', f:'{{$tree["downline"][0]["downline"][2]["username"]}}<img src="'+'{{$tree["downline"][0]["downline"][2]["actype_image"]}}'+'" width="100" height="15"><br /><img src="'+'{{$tree["downline"][0]["downline"][2]["image"]}}'+'" width="100" height="100">'}, '{{$tree["downline"][0]["username"]}}', '{{$tree["downline"][0]["downline"][2]["id"]}}','{{$tree["downline"][0]["downline"][2]["status"]}}','3','{{$tree["downline"][0]["id"]}}','{{$tree["downline"][0]["downline"][2]["at_id"]}}'],








            //second Ref
           [{v:'{{$tree["downline"][1]["username"]}}', f:'{{$tree["downline"][1]["username"]}}<img src="'+'{{$tree["downline"][1]["actype_image"]}}'+'" width="100" height="15"><br /><img src="'+'{{$tree["downline"][1]["image"]}}'+'" width="100" height="100">'},
           '{{$tree["username"]}}', '{{$tree["downline"][1]["id"]}}','{{$tree["downline"][1]["status"]}}','2','{{$tree["id"]}}','{{$tree["downline"][1]["at_id"]}}'],

         

          [{v:'{{$tree["downline"][1]["downline"][0]["username"]}}', f:'{{$tree["downline"][1]["downline"][0]["username"]}}<img src="'+'{{$tree["downline"][1]["downline"][0]["actype_image"]}}'+'" width="100" height="15"><br /><img src="'+'{{$tree["downline"][1]["downline"][0]["image"]}}'+'" width="100" height="100">'}, '{{$tree["downline"][1]["username"]}}', '{{$tree["downline"][1]["downline"][0]["id"]}}','{{$tree["downline"][1]["downline"][0]["status"]}}','1','{{$tree["downline"][1]["id"]}}','{{$tree["downline"][1]["downline"][0]["at_id"]}}'],

          [{v:'{{$tree["downline"][1]["downline"][1]["username"]}}', f:'{{$tree["downline"][1]["downline"][1]["username"]}}<img src="'+'{{$tree["downline"][1]["downline"][1]["actype_image"]}}'+'" width="100" height="15"><br /><img src="'+'{{$tree["downline"][1]["downline"][1]["image"]}}'+'" width="100" height="100">'}, '{{$tree["downline"][1]["username"]}}', '{{$tree["downline"][1]["downline"][1]["id"]}}','{{$tree["downline"][1]["downline"][1]["status"]}}','2','{{$tree["downline"][1]["id"]}}','{{$tree["downline"][1]["downline"][1]["at_id"]}}'],

             [{v:'{{$tree["downline"][1]["downline"][2]["username"]}}', f:'{{$tree["downline"][1]["downline"][2]["username"]}}<img src="'+'{{$tree["downline"][1]["downline"][2]["actype_image"]}}'+'" width="100" height="15"><br /><img src="'+'{{$tree["downline"][1]["downline"][2]["image"]}}'+'" width="100" height="100">'}, '{{$tree["downline"][1]["username"]}}', '{{$tree["downline"][1]["downline"][2]["id"]}}','{{$tree["downline"][1]["downline"][2]["status"]}}','3','{{$tree["downline"][1]["id"]}}','{{$tree["downline"][1]["downline"][2]["at_id"]}}'],


              //third Ref

           [{v:'{{$tree["downline"][2]["username"]}}', f:'{{$tree["downline"][2]["username"]}}<img src="'+'{{$tree["downline"][2]["actype_image"]}}'+'" width="100" height="15"><br /><img src="'+'{{$tree["downline"][2]["image"]}}'+'" width="100" height="100">'},
           '{{$tree["username"]}}', '{{$tree["downline"][2]["id"]}}','{{$tree["downline"][2]["status"]}}','3','{{$tree["id"]}}','{{$tree["downline"][2]["at_id"]}}'],


          [{v:'{{$tree["downline"][2]["downline"][0]["username"]}}', f:'{{$tree["downline"][2]["downline"][0]["username"]}}<img src="'+'{{$tree["downline"][2]["downline"][0]["actype_image"]}}'+'" width="100" height="15"><br /><img src="'+'{{$tree["downline"][2]["downline"][0]["image"]}}'+'" width="100" height="100">'}, '{{$tree["downline"][2]["username"]}}', '{{$tree["downline"][2]["downline"][0]["id"]}}','{{$tree["downline"][2]["downline"][0]["status"]}}','1','{{$tree["downline"][2]["id"]}}','{{$tree["downline"][2]["downline"][0]["at_id"]}}'],

           [{v:'{{$tree["downline"][2]["downline"][1]["username"]}}', f:'{{$tree["downline"][2]["downline"][1]["username"]}}<img src="'+'{{$tree["downline"][2]["downline"][1]["actype_image"]}}'+'" width="100" height="15"><br /><img src="'+'{{$tree["downline"][2]["downline"][1]["image"]}}'+'" width="100" height="100">'}, '{{$tree["downline"][2]["username"]}}', '{{$tree["downline"][2]["downline"][1]["id"]}}','{{$tree["downline"][2]["downline"][1]["status"]}}','2','{{$tree["downline"][2]["id"]}}','{{$tree["downline"][2]["downline"][1]["at_id"]}}'],

           [{v:'{{$tree["downline"][2]["downline"][2]["username"]}}', f:'{{$tree["downline"][2]["downline"][2]["username"]}}<img src="'+'{{$tree["downline"][2]["downline"][2]["actype_image"]}}'+'" width="100" height="15"><br /><img src="'+'{{$tree["downline"][2]["downline"][2]["image"]}}'+'" width="100" height="100">'}, '{{$tree["downline"][2]["username"]}}', '{{$tree["downline"][2]["downline"][2]["id"]}}','{{$tree["downline"][2]["downline"][2]["status"]}}','3','{{$tree["downline"][2]["id"]}}','{{$tree["downline"][2]["downline"][2]["at_id"]}}'],
        ]);
       // alert(JSON.stringify(data));
        // Create the chart.
        var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
        // Draw the chart, setting the allowHtml option to true for the tooltips.
        chart.draw(data, {allowHtml:true});
        
        google.visualization.events.addListener(chart, 'select', selectHandler);
            function selectHandler(e) {


          var selection = chart.getSelection();

            var btn = document.getElementById("btnencode");
            var btnu = document.getElementById("btnupgrade");
          var item = selection[0];

                    // var str = data.getFormattedValue(item.row, 3);

             

                        if (selection[0] == null)
                        {
                          btn.disabled= true;
                        
                         
                        }
                        else
                        {
                          
                          var id = data.getFormattedValue(item.row, 2);
                          var str = data.getFormattedValue(item.row, 3);
                           var position = data.getFormattedValue(item.row, 4);
                            var upline = data.getFormattedValue(item.row, 5);
                            var at_type = data.getFormattedValue(item.row, 6);
                            btn.disabled= false;
                            

                            if(at_type =='1' ||  at_type =='0')
                            {
                              btnu.disabled = true;
                            }

                            else
                            { 
                              btnu.disabled = false;
                              var att = document.createAttribute("data-toggle");
                             var att2 = document.createAttribute("data-target");  
                              att.value = "modal";
                             att2.value = "#ActivationModal";
                             btnu.setAttributeNode(att);
                             btnu.setAttributeNode(att2);

                            }
                            if(str == 0)
                            {
                              btn.innerHTML ="Activate Slot";
                              btn.setAttribute("data-position", '0');
                              btn.setAttribute("data-upline", '0');
                              btn.setAttribute("data-cid",id );
                            }
                            else if(str > 0)
                            {
                              btn.innerHTML ="View Tree";
                              btn.setAttribute("data-position", '0');
                              btn.setAttribute("data-upline", upline);
                              btn.setAttribute("data-cid",id );
                            }
                            else
                            {
                                if(upline == '0')
                                {
                                   btn.innerHTML ="Encode";
                                  btn.disabled= true;
                                }
                                else
                                {
                                    btn.innerHTML ="Encode";
                                btn.setAttribute("data-position", position);
                                btn.setAttribute("data-upline", upline);
                                }
                             
                            }
                          
                        }
             
           btn.addEventListener('click', function() {
                if(this.innerHTML == "Encode")
                {
                var att = document.createAttribute("data-toggle");
                var att2 = document.createAttribute("data-target");  
                att.value = "modal";
                att2.value = "#myModal";
                btn.setAttributeNode(att);
                btn.setAttributeNode(att2);
                }
                else if(this.innerHTML == "Activate Slot")
                {
                var att = document.createAttribute("data-toggle");
               var att2 = document.createAttribute("data-target");  
                att.value = "modal";
               att2.value = "#ActivationModal";
               btn.setAttributeNode(att);
               btn.setAttributeNode(att2);
           
                }
                else if(this.innerHTML == "View Tree")
                {
                  var upid =$(this).attr('data-upline');
                  var id =$(this).attr('data-cid');
              //  window.location.replace('{{{route("genealogy",'+id+')}}}');
                if(upid =="{{$userid}}")
                {
                  id= upid;
                }
            
                var url = '{{ route("genealogy", ":id") }}';
                url = url.replace(':id', id);
                window.location.href=url;
                }
                else
                {
                
       
                var att = document.createAttribute("data-toggle");
                var att2 = document.createAttribute("data-target");  
                att.value = "";
                att2.value = "";
                  btn.setAttributeNode(att);
                btn.setAttributeNode(att2);



              
                }
            }, false);
                   
						
             
          }
      }


 var rad1 = document.getElementById("rad1");
  var rad2 = document.getElementById("rad2");
 var ax = document.getElementById("activation-code");


/*
  rad1.addEventListener( 'change', function() {

     if(this.checked) {
     var inputs = document.querySelectorAll('div.user-info');
      var inputs = document.querySelectorAll('div.user-info');

          for (var i = 0; i < inputs.length; i++) {
            //inputs[i].disabled = true;
             inputs[i].style.display = 'none';
          }

         ax.disabled=false;
     }
    });

   rad2.addEventListener( 'change', function() {
     if(this.checked) {
     var inputs = document.querySelectorAll('div.user-info');
  
          for (var i = 0; i < inputs.length; i++) {
           // inputs[i].disabled = false;
             inputs[i].style.display = 'block';
          }
            ax.disabled=true;
     }
    });
    */
   $( document ).ready(function() {
       $(".user-info").show();

           $('#rad1').click(function(){

             $(".user-info").hide();

           })


             $('#rad2').click(function(){

             $(".user-info").show();
    
           })

    $("#account-activation").click(function(e){
        e.preventDefault();
             var id = document.getElementById('btnencode').getAttribute('data-cid');
             var upline = document.getElementById('btnencode').getAttribute('data-upline');
          var _token = $("input[name='_token']").val();
           var code= $("input[name='code-act']").val();
            var btnu = document.getElementById("btnupgrade");
            var ac_type= "activation";
           if(btnu.disabled == false)
           {
              ac_type= "upgrade";
           }
           else
           {
              ac_type= "activation";
           }
           // var upline= $("#btnencode").data('upline');

            $.ajax({
              url: "{{route('validation')}}",
              type:'POST',
              data: {_token:_token,code:code,id:id,regtype:ac_type,upline:upline},
              success: function(data) {

                  if($.isEmptyObject(data.error)){
                    $(".print-error-msg").find("ul").html('');
                       $(".print-error-msg").css('display','block');
                        $(".print-error-msg").find("ul").append('<li>'+data.success+'</li>');
                         setTimeout(function() {
                            location.reload();
                        }, 2000);
                  }else{
                    printErrorMsg (data.error);
                  }
                 
              }
          });
    

    });

  $(".btn-submit").click(function(e){
        e.preventDefault();

        var _token = $("input[name='_token']").val();
        var name = $("input[name='name']").val();
        var username = $("input[name='username']").val();
        var password = $("input[name='password']").val();
        var password_confirmation = $("input[name='password_confirmation']").val();
        var email = $("input[name='email']").val();
        var contact = $("input[name='contact']").val();
        var address= $("input[name='address']").val();
        var country = $("input[name='country']").val();
        var dob= $("input[name='dob']").val();
        var beneficiary= $("input[name='beneficiary']").val();
        var relationship= $("input[name='relationship']").val();
        var code= $("input[name='code']").val();
        var activationcode= $("input[name='activationcode']").val();
        var sponsor= $("input[name='sponsor']").val();
        var upline= $("#btnencode").data('upline');
        var position= $("#btnencode").data('position');
        var regtype= '';

      if($('#rad1').is(':checked'))
      { 
      
          regtype="self";
               $.ajax({
             
              url: "{{route('validation')}}",
              type:'POST',
              data: {_token:_token,code:code,username:username,upline:upline,position:position,sponsor:sponsor,userid:"{{Auth::user()->id}}",regtype:regtype},
              success: function(data) {

                  if($.isEmptyObject(data.error)){
                    $(".print-error-msg").find("ul").html('');
                       $(".print-error-msg").css('display','block');
                        $(".print-error-msg").find("ul").append('<li>'+data.success+'</li>');
                  }else{
                    printErrorMsg (data.error);
                  }
                 
              }
          });
        
      }
      else if($('#rad2').is(':checked'))
      {
         regtype="new";
          $.ajax({
             
              url: "{{route('validation')}}",
              type:'POST',
              data: {_token:_token,name:name,username:username,sponsor:sponsor,password:password, password_confirmation:password_confirmation, email:email,contact:contact,address:address,country:country,dob:dob,beneficiary:beneficiary,relationship:relationship,code:code,regtype:regtype,upline:upline,position:position},
              success: function(data) {
    
                  if($.isEmptyObject(data.error)){
                      $(".print-error-msg").find("ul").html('');
                       $(".print-error-msg").css('display','block');
                        $(".print-error-msg").find("ul").append('<li>'+data.success+'</li>');

                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                   //  printErrorMsg(data.success);
                  }else{
                    printErrorMsg (data.error);
                  }
                 
              }
          });
        }

      }); 


      function printErrorMsg (msg) {
      $(".print-error-msg").find("ul").html('');
      $(".print-error-msg").css('display','block');
      $.each( msg, function( key, value ) {
        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
      });
    }



      });

   </script>
 
@endsection