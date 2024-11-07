@extends("layouts.app")



@section("content")
<h1>{{$project->title}} Page:</h1>
<div class="container">
    <div class="row justify-content-center">
     
    
        <div class="card col-12  m-5">
            
            <div class="card-body">

             

              <h5 class="card-title">Progetto: {{$project->title}}</h5>

              @forelse($project->technologies as $technology)
              <span class="badge text-bg-primary">
                {{ $technology->name }}
              </span>
              
              @empty
              <span>Non sono individuate tecnologie</span>
              @endforelse
              <span class="badge text-bg-warning">{{ $project->type->name }}</span>

              <h5 class="card-title">Descrizione: {{$project->content}}</h5>
              
        
              Link: <a href="{{ $project->url }}" target="_blank">{{ $project->url }}</a>
      
          

            </div>
          </div>
      
        </div>
    </div>
</div>

@endsection