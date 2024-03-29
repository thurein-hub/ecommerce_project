@extends('layouts.backendtemplate')
@section('content')

<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Subcategory Edit Form</h1>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary d-inline-block">Form Example</h6>

    <a href="{{route('subcategory.index')}}" class="btn btn-outline-info float-right">Back</a>
  </div>
  <div class="card-body">
    {{-- Change Error Message UI (try yourself) --}}
    
    <form method="post" action="{{route('subcategory.update',$subcategory->id)}}" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="row mb-3">
        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
          <input type="text" name="name" class="form-control" id="inputName" value="{{ $subcategory->name }}">
          @if ($errors->any())
              @foreach ($errors->get('name') as $error)
                  <p class="text-danger pt-2">{{ $error }}</p>
              @endforeach
          @endif
        </div>
        
      </div>

      <div class="row mb-3">
        <label for="inputPhoto" class="col-sm-2 col-form-label">Category</label>
        <div class="col-sm-10">
            <select name="category_id" id="category_id" class="form-select">
                
                  @foreach($categories as $category)
                
                    <option value="{{ $category->id}}" @if($category->id==$subcategory->category_id) {{'selected'}} @endif>{{ $category->name}}</option>
                  @endforeach
                
            </select>
            @if ($errors->any())
                @foreach ($errors->get('category_id') as $error)
                    <p class="text-danger pt-2">{{ $error }}</p>
                @endforeach
            @endif
        </div>
        
      </div>

      <div class="row mb-3">
        <div class="col-sm-10 offset-sm-2">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>
    </form>
  </div>
</div>

</div>
<!-- /.container-fluid -->

@endsection