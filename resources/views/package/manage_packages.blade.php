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
                            <input type="text" name="title" placeholder="Package Title*" class="form-control" value="{{old('title')}}" autocomplete="off">
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
                       <input type="number" name="day" placeholder="Day" class="form-control" value="{{old('day')}}" min="0" >
                   </div>
                   <div class="col-md-6">
                      <b>
                                Night *
                            </b>
                       <input type="number" name="night" placeholder="Night" class="form-control" value="{{old('night')}}" min="0">
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
       <input type="text" name="price" placeholder="Package Price" class="form-control" value="{{old('price')}}" autocomplete="off">
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
   <b>
                               Description
                            </b>
    <textarea name="description">{{old('description')}}</textarea>
</p>


<p>
    <b>
        Detailed Itinerary (please clear this textarea before save or fill it with same structre 1.  2.  3. ...max day is 5)
    </b>
</p>
<p>
    <textarea name="detailed">
      <ol>
  <li>DESC for day1</li>
  <li>DESC for day2</li>
  <li>DESC for day3</li>
  <li>DESC for day4</li>
  <li>DESC for day5</li>
</ol></textarea>
</p>
</p>


 <div class="row">

<div class="col-md-6">
<p>

    <b>
        Price Included * fill it with same structre using bullet list
    </b>
</p>
<p>
    <textarea name="price_included" ><ul>
  <li>desc1</li>
  <li>desc2</li>
  <li>des3</li>
  <li>desc4</li>
</ul></textarea>
</p>
</div>
<div class="col-md-6">
<p>

    <b>
        Price Excluded * fill it with same structre using bullet list
    </b>
</p>
<p>
    <textarea name="execluded"><ul>
  <li>desc1</li>
  <li>desc2</li>
  <li>des3</li>
  <li>desc4</li>
</ul></textarea>
</p>
</div></div>
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

</script>
@endsection


