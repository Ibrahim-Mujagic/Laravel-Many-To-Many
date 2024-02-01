@extends('layouts.app')

@section('content')
<h1 class="text-center">CREATE</h1>
<a class="btn btn-outline-dark m-4" href="{{route('admin.projects.index')}}">Projects</a>
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif
<div class="container my-3 ib-form">
  <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Nome Progetto</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror " value="{{old('name')}}"
        placeholder="Inserisci nome progetto" name="name">
      @error('name') <p class="text-danger">{{$message}}</p> @enderror
    </div>

    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Nome cliente</label>
      <input type="text" class="form-control @error('client_name') is-invalid @enderror  "
        value="{{old('client_name')}}" placeholder="Inserisci il nome del cliente" name="client_name">
      @error('client_name') <p class="text-danger"> {{$message}} </p> @enderror
    </div>

    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Categoria</label>
      <select name="category_id" class="form-select" aria-label="Default select example">
        <option value="">Seleziona categoria</option>
        @foreach($categories as $category)
        <option @if($category->id === old('category_id')) selected @endif value="{{$category->id}}">{{$category->name}}
        </option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <p>Tecnologie</p>
      @foreach($techs as $tech)
      <input type="checkbox" name="techs[]" value="{{$tech->id}}" @if (in_array($tech->id,old('techs',[])))
      checked
      @endif
      id="tech{{$loop->iteration}}"
      >
      <label class="me-2" for="tech{{$loop->iteration}}">{{$tech->name}}</label>
      @endforeach
    </div>

    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Immagine</label>
      <input type="file" onchange="showImage(event)" class="form-control @error('cover_image') is-invalid @enderror "
        value="{{old('cover_image')}}" name="cover_image">
      @error('cover_image') <p class="text-danger"> {{$message}} </p> @enderror
      <div class="cont-output">
        <img src="" alt="" id="output-image">
      </div>
    </div>

    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Descrizione</label>
      <textarea class="form-control" rows="5" name="summary"></textarea>
      @error('summary') <p class="text-danger"> {{$message}} </p> @enderror
    </div>

    <button class="btn btn-outline-primary" type="submit">Invia</button>
</div>
<script>
  function showImage(event){
    const tagImage = document.getElementById('output-image');
    tagImage.src = URL.createObjectURL(event.target.files[0]);
  }
</script>

@endsection