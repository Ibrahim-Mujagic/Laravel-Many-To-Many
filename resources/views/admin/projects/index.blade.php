@extends('layouts.app')

@section('content')
<h1 class="text-center ">PROJECTS</h1>
<div class="container">
  <div>
    <a class="btn btn-outline-primary mb-3" href="{{route('admin.projects.create')}}">Add</a>
    {{$projects->links()}}
  </div>
  <div class="cont-cards d-flex flex-wrap gap-5 justify-content-center">
    @forelse ($projects as $project)
    <div class="card" style="width: 18rem;">
      @if($project->cover_image)
      <img src="{{asset('storage/' . $project->cover_image )}}" class="card-img-top"
        alt="{{$project->original_image_name}}">
      @endif
      <div class="card-body">
        <h5 class="card-title">{{$project->name}}</h5>
        <span class="badge text-bg-info">{{$project->category?->name}}</span>
        </br>
        @forelse ($project->techs as $tech)
        <span class="badge text-bg-warning">{{$tech->name}}</span>
        @empty
        ..no..data..
        @endforelse
        <p class="card-text">{{$project->summary}}</p>
        <a class="btn btn-outline-primary" href="{{route('admin.projects.show',$project)}}"><i
            class="fa-solid fa-eye"></i></a>
        <a class="btn btn-outline-warning" href="{{route('admin.projects.edit',$project)}}"><i
            class="fa-solid fa-pencil"></i></a>
        @include('admin.partials.form-delete',[$project])
      </div>
    </div>
    @empty
    <h1>Nessun progetto</h1>
    @endforelse
  </div>
</div>
@endsection