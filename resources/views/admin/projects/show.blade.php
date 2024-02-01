@extends('layouts.app')

@section('content')
<h1 class="text-center">Show</h1>

<a class="btn btn-outline-dark mt-4 d-inline" href="{{route('admin.projects.index')}}">Projects</a>
<a class="btn btn-outline-warning d-inline" href="{{route('admin.categories-project')}}">Categories</a>
@include('admin.partials.form-delete',[$project])
<a class="btn btn-warning" href="{{route('admin.projects.edit',$project)}}"><i class="fa-solid fa-pencil"></i></a>

<div class="card w-50 m-4">
  @if($project->cover_image)
  <img src="{{asset('storage/' . $project->cover_image )}}" class="card-img-top"
    alt="{{$project->original_image_name}}">
  @endif
  <div class="card-body">
    <h5 class="card-title">{{$project->name}}</h5>
    <span class="badge text-bg-info">{{$project->category?->name}}</span>
    <br>
    @forelse ($project->techs as $tech)
    <span class="badge text-bg-warning">{{$tech->name}}</span>
    @empty
    ..no..data..
    @endforelse
    <p class="card-text">{{$project->summary}}</p>
    <p class="card-text"><small class="text-body-secondary">{{$project->client_name}}</small></p>
  </div>
</div>

@endsection