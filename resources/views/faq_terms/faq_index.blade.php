@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">FAQ Question & Answers </div>
                <div class="card-body">

                    <form method="POST" enctype="multipart/form-data" class="well">
                     
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <p>
                            <input type="text" name="question" placeholder="Question" class="form-control" value="{{old('question')}}" autocomplete="off">
                        </p>
                          
               <p>
                            <input type="tel" name="answer" placeholder="Answe" class="form-control" value="{{old('answer')}}" autocomplete="off">
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

<br/>
<div class="container">
   
    <table class="table table-striped" style="text-align: center">
      <thead>
        <tr>
         
         
          <th scope="col">Question</th>
          <th scope="col">Answer</th>  
           
           <th scope="col" style="text-align:center"><i class="fas fa-archive"></i> </th>

      </tr>
  </thead>
  <tbody>
   @foreach($faqs as $faq)
   <tr>
    <th >{{$faq->question}}</th>
      <th>  {{$faq->answer}} </th>
     
  
         
           
          <td>@if($faq->status == 0)
                 <a href="{{route('faq_archive', $faq->id)}}" class="btn btn-success ">Archive</a>
                 @else
                 <a href="{{route('faq_archive', $faq->id)}}" class="btn btn-warning">UnArchive</a>
                 @endif
           </td>

      </tr>

      @endforeach
      
  </tbody>
  
</table>

</div>

@endsection
