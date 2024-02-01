@extends('layouts.app')

@section('content')
<h1 class="text-center">Control Technologies</h1>
<div class="container d-flex flex-column">
  @if(session('message'))
  <div class="alert alert-success">
    {{ session('message') }}
  </div>
  @endif

  <form action="{{route('admin.techs.store')}}" method="POST">
    @csrf
    <div class="input-group mt-3 mb-3 w-50">
      <input type="text" name="name" class="form-control" placeholder="Nuova Tecnologia">
      <button class="btn btn-outline-secondary" type="submit"><i class="fa-solid fa-plus"></i> Add</button>
    </div>
  </form>

  <table class="table w-50">
    <thead>
      <tr>
        <th>Technology</th>
        <th class="text-center">Projects Count</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($techs as $tech)
      <tr>
        <td>
          <form class="d-inline" action="{{route('admin.techs.update',$tech)}}" method="POST">
            @csrf
            @method('PATCH')
            <input class="border-0" type="text" name="name" value="{{$tech->name}}">
            <button type="submit" class="btn btn-outline-warning"><i class="fa-solid fa-pen"></i></button>
          </form>
          <form class="d-inline" onsubmit="return confirm('Sei sicuro di voler eliminare: {{$tech->name}}')"
            action="{{route('admin.techs.destroy',$tech)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
          </form>
        </td>
        <td class="text-center"><span class="badge text-bg-dark">{{count($tech->projects)}}</span></td>
      </tr>
      @empty
      <h2>Nessuna Tecnologia</h2>
      @endforelse
    </tbody>
  </table>
</div>
@endsection