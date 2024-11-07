@extends("layouts.app")

@section("content")
<h1>Projects List:</h1>
<div class="container">

<div class="row">
    <div class="col-12">
        <div class="mb-3">
            <a href="{{route("admin.projects.create")}}" class="btn btn-sm btn-primary me-1 m-1">Create new Project!</a>

        </div>
    
<table class="table table-dark"> 
    
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Titolo</th>
        <th scope="col">Descrizione</th>
        <th scope="col">Url</th>
        <th scope="col">Type</th>
        <th scope="col">Actions</th>
        
      </tr>
    </thead>
    <tbody>
       @forelse ($projects as $index => $project)
            
       
      <tr>
        <td>{{$project->id}}</td>
        <td>{{$project->title}}</td>
        <td>{{$project->content}}</td>
        <td>{{$project->url}}</td>
        <td>{{$project->type->name}}</td>
    
        <td>
            <a href="{{route("admin.projects.show", $project)}}" class="btn btn-sm btn-primary m-2 me-1 m-1">Show</a>
              <a href="{{route("admin.projects.edit", $project)}}" class="btn btn-sm btn-success m-2 me-1">Edit</a>
            <form action="{{route("admin.projects.delete", $project)}}" method="POST" class="guitar-destroyer" custom-data-name="{{$project->title}}">
              @csrf
              @method("DELETE")

            <button type="submit" class="btn btn-sm btn-warning m-2">DELETE</button>
            </form> 
          </td>
      </tr>
    
      @empty
      <tr>
        <td colspan="11">Non ci sono Progetti disponibili al momento...
        </td>
      </tr>
            
      @endforelse
    </tbody>
  </table> 
</div>
</div>
            </div> 
              @endsection
                  @section("additional-scripts")
                      @vite("resources/js/posts/delete-confirmation.js");
                  @endsection