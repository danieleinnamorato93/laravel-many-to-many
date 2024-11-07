@extends("layouts.app")



@section("content")
<h1>{{$project->title}} Page:</h1>
<div class="container">
    <div class="row justify-content-center">
     
    
        <div class="card col-2  m-3">
            
            <div class="card-body">

              <h5 class="card-title">Progetto: {{$project->title}}</h5>
              <h5 class="card-title">Descrizione: {{$project->content}}</h5>
              <h6>{{ $project->type->name }}</h6>
              Link: <a href="{{ $project->url }}" target="_blank">{{ $project->url }}</a>
      
          

            </div>
          </div>
      
        </div>
    </div>
</div>

@endsection