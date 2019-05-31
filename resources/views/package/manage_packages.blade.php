@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create New Package</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" class="well">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <p>
                            <input type="text" name="title" placeholder="Package Title*" class="form-control" value="{{old('title')}}">
                        </p>


                        <p>
                            <div class="row" >
                                <div class=" col-md-6">
                                   <b>
                                    Choose Category * 
                                </b>
                                <select class="form-control" name="cat_id">
                                    @foreach($cats as $cat)
                                    <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">

                               <b>
                                Choose Theme * 
                            </b>
                            <select class="form-control" name="theme_id">
                                @foreach($themes as $theme)
                                <option value="{{$theme->id}}">{{$theme->theme_name}}</option>
                                @endforeach
                            </select> 
                        </div>
                        
                    </div>
                </p> 
                <p>
                    <div class="row">

  <div class="col-md-6">
                              <b>
                                Choose City *
                            </b>
                        
                           <select class="form-control" name="city_id" onchange="show_hotels(this);">
                          
                            @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}} </option>
                            @endforeach
                        </select>
                        <p>
                  <b>Choose Hotel<p> <span id="loading" style="color: red;font-weight: 900;display: none;">LOADING...</span></p></b>
                </p>
                    </div>

                        <div class="col-md-6">
                              <b>
                                Hotel Name
                            </b>
                        
                      
                  <select class="form-control" name="hotel_id" id="hotel_id"  >
                   <option value="0" >--Select Hotel--</option>
                 </select>
            
                    </div>
                    <div class="col-md-6">
                          <b>
                              Day * 
                            </b>
                       <input type="number" name="day" placeholder="Day" class="form-control" value="{{old('day')}}">
                   </div>
                   <div class="col-md-6">
                      <b>
                                Night *
                            </b>
                       <input type="number" name="night" placeholder="Night" class="form-control" value="{{old('night')}}">
                   </div>


 
            </div>
        </p>


        <p>
           <div class="row">
           
           <div class="col-md-6">

  <b>
                                Departure Date * 
                            </b>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='date' class="form-control" name="depart_date" />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>



        </div>
    </div>
    <div class="col-md-6">
          <b>
                               Return Date *
                            </b>
        <div class="form-group">
            <div class='input-group date' id='datetimepicker1'>
                <input type='date' class="form-control" name="revenue_date" />
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>



    </div></div>


</div>
</p>
<p>
   <div class="row">
    <div class="col-md-6">
       <input type="text" name="price" placeholder="Package Price" class="form-control" value="{{old('price')}}">
   </div>
   <div class="col-md-6">
       <select class="form-control" name="is_featured">

        <option value="1">Section Best Packages</option>
        <option value="0"> Section Featured Packages</option>


    </select>
</div>
</div>
</p>
<p>
    <textarea name="description"></textarea>
</p>


<p>
    <b>
        Detailed Itinerary 
    </b>
</p>
<p>
    <textarea name="detailed"></textarea>
</p>
</p>





<p>
    <b>
        Price Included *
    </b>
</p>
<p>
    <textarea name="price_included"></textarea>
</p>

<p>
   <div class="row">
    <div class="col-md-6">
        Choose Image/s *
        <input type="file" name="attachment[]"  class="form-control" multiple />
    </div>
    <div class="col-md-6">
       Choose brochure
       <input type="file" name="brochur_url"  class="form-control" />
   </div>
</div>
</p>
<p>
    <input type="submit" value="Save" class="btn btn-primary form-control">
</p>

</form>


</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
function show_hotels(id){

  var city_id = id.value;
 
//window.alert(id_room);
$.ajax({
  url: '{{route('show_hotels')}}',
  type: 'POST',
  data:{
    _token: '{{ csrf_token() }}',
    city_id:city_id
  },
  cache: false,
  datatype: 'JSON',
  success: function(response){
    $('#loading').show();
    $('#hotel_id').html('');
    var i;
    var count = Object.keys(response).length;
    if(count == 0)
    {
      var option=$('<option></option>');
      option.attr('value',-1);
      option.text('--No hotels--');
      $('#hotel_id').append(option);
    } else
    {
    var JSONObject = JSON.parse(JSON.stringify(response));
    $('#hotel_id').append('<option value="0">-- Select Hotel --</option>');
    for(i=0;i<count;i++)
    { 
     var option=$('<option></option>');
     option.attr('value',JSONObject[i]["id"]);
     option.text(JSONObject[i]["name"]);
     $('#hotel_id').append(option);
   }
 }
   // $('#hotel_id').append('<option value="0">---choose--</option>');
   $('#loading').hide();

 },error:function(){
  alert('Somthing Went Wrong');
  $('#loading').hide();

}
});
}
</script>
@endsection


