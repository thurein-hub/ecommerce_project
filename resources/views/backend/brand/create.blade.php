@extends('layouts.backendtemplate')
@section('content')

<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Brand Create Form</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary d-inline-block">Form Example</h6>

    <a href="{{route('brand.index')}}" class="btn btn-outline-info float-right">Back</a>
  </div>
  <div class="card-body">
    {{-- Change Error Message UI (try yourself) --}}
    
    <form method="post" action="{{route('brand.store')}}" enctype="multipart/form-data">
      @csrf
      <div class="row mb-3">
        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
          <input type="text" name="name" class="form-control" id="inputName">
          @if ($errors->any())
              @foreach ($errors->get('name') as $error)
                  <p class="text-danger pt-2">{{ $error }}</p>
              @endforeach
          @endif
        </div>
        
      </div>

      <div class="row mb-3">
        <label for="inputPhoto" class="col-sm-2 col-form-label">Photo</label>
        <div class="col-sm-10">
          <input type="file" name="logo" class="form-control-file" id="inputPhoto">
          @if ($errors->any())
              @foreach ($errors->get('logo') as $error)
                  <p class="text-danger pt-2">{{ $error }}</p>
              @endforeach
          @endif
        </div>
        
      </div>

      <div class="row mb-3">
        <div class="col-sm-10 offset-sm-2">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </div>
    </form>
  </div>
</div>

</div>
<!-- /.container-fluid -->

@endsection