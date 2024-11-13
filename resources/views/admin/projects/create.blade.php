@extends("layouts.app")

@section("page-title")

@section("content")

<div class="container">
      <div class="row justify-content-center">
      

        <form class="col-12  card p-4" method="POST" enctype="multipart/form-data" action="{{route("admin.projects.store")}}">
            @csrf
        <h1>Crea un nuovo progetto:</h1>
    
             
             
    
                <div class="mb-3">
                    <label for="project-title" class="form-label">Titolo</label>
                    <input type="text" class="form-control" id="project-title" name="title" value="{{old('title')}}">
                    @error("title")
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="project-content" class="form-label">Contenuto</label>
                    <input type="text" class="form-control" id="project-content" name="content" value="{{old('content')}}">
                    @error("content")
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
                </div>
                
              <div class="mb-3">
                <label for="project-image" class="form-label">Inserisci l'immagine</label>
                    <input type="file" name="image" id="project-image" class="form-control">
                    @error("image")
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
                </div>

                <div class="mb-3">
                    <label for="project-url" class="form-label">Url</label>
                    <input type="text" class="form-control" id="project-url" name="url" value="{{old('url')}}">
                    @error("url")
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="post-type_id" class="form-label">Tipo:</label>
                    <select name="type_id" id="post-type_id" class="form-control">
                    
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}"
                          
                                    @if($type->id == old("type_id", $type->type_id))
                                        selected
                                    @endif
                                >
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>

                    @error("type_id")
                        <div class="alert alert-warning">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
             <div class="mb-3">
                <label for="project-technology" class="form-label">Tecnologia</label>
                
                    @foreach ($technologies as $technology )
                    <input type="checkbox" value="{{ $technology->id }}" name="technologies[]" id="checkbox-{{ $technology->id}}">
                   
               
                         
                   <label for="">{{ $technology->name }}</label> 
                    @endforeach


                
             
               
           <div class=" d-flex justify-content-center align-items-center">
            <button type="submit" class="mb-3 btn btn-primary ">Crea il tuo nuovo progetto!</button>
            <button type="reset" class="mb-3 btn btn-danger">Pulisci i campi</button>

           </div>
        </form>
          

    </div>

</div>

@endsection