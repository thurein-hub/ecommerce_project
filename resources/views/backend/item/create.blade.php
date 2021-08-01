@extends('layouts.backendtemplate')
@section('content')

<div class="container-fluid">

<!-- Page Heading -->
{{-- <h1 class="h3 mb-4 text-gray-800">Item Create Form</h1> --}}

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h2 class="m-0 font-weight-bold text-primary d-inline-block">Item Create Form</h2>

    <a href="{{route('item.index')}}" class="btn btn-outline-info float-right">Back</a>
  </div>
  <div class="card-body">
    {{-- Change Error Message UI (try yourself) --}}
    
    <form method="post" action="{{route('item.store')}}" enctype="multipart/form-data">
      @csrf
      @php
        if ($lastItem) {
            $codeno = '000'.++$lastItem->codeno;
        }else{
            $codeno = '0001';
        }
      @endphp
        <div class="form-group row">
            <label for="code_id" class="col-sm-2 col-form-label"> Code No </label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="code_id" name="codeno" value="{{$codeno}}" readonly="readonly">
            @if ($errors->any())
                @foreach ($errors->get('codeno') as $error)
                    <p class="text-danger pt-2">{{ $error }}</p>
                @endforeach
            @endif
            </div>
        </div>
        
        <div class="form-group row">
            <label for="photo_id" class="col-sm-2 col-form-label"> Photo </label>
            <div class="col-sm-10">
            <input type="file" id="photo_id" name="photo">
            @if ($errors->any())
                @foreach ($errors->get('photo') as $error)
                    <p class="text-danger pt-2">{{ $error }}</p>
                @endforeach
            @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="name_id" name="name">
            @if ($errors->any())
                @foreach ($errors->get('name') as $error)
                    <p class="text-danger pt-2">{{ $error }}</p>
                @endforeach
            @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="price_id" class="col-sm-2 col-form-label"> Price </label>
            <div class="col-sm-10">
                <ul class="nav nav-tabs">
                    <li class="nav-item one_tab">
                        <a class="nav-link active" aria-current="page" href="#unit_price_id">Unit Price</a>
                        
                    </li>
                    <li class="nav-item two_tab">
                        <a class="nav-link" href="#discount_id">Discount</a>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="form-group row un_tab">
            <label for="unit_price_id" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="unit_price_id" name="price">
                @if ($errors->any())
                    @foreach ($errors->get('price') as $error)
                        <p class="text-danger pt-2">{{ $error }}</p>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="form-group row d_tab">
            <label for="discount_id" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="discount_id" name="discount">
                
            </div>
        </div>

        <div class="form-group row">
            <label for="description_id" class="col-sm-2 col-form-label"> Description </label>
            <div class="col-sm-10">
                <textarea name="description" id="description_id" cols="30" rows="4" class="form-control"></textarea>
                @if ($errors->any())
                    @foreach ($errors->get('description') as $error)
                        <p class="text-danger pt-2">{{ $error }}</p>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="inputPhoto" class="col-sm-2 col-form-label">Brand</label>
            <div class="col-sm-10">
                <select name="brand_id" id="brand_id" class="form-control">
                    <option value="" selected>Choose Brand</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id}}">{{ $brand->name}}</option>

                    @endforeach
                    
                </select>
                @if ($errors->any())
                    @foreach ($errors->get('brand_id') as $error)
                        <p class="text-danger pt-2">{{ $error }}</p>
                    @endforeach
                @endif
            </div>
            
        </div>

        <div class="form-group row">
            <label for="inputPhoto" class="col-sm-2 col-form-label">Subcategory</label>
            <div class="col-sm-10">
                <select name="subcategory_id" id="subcategory_id" class="form-control">
                    <option value="" selected>Choose Category</option>
                    @foreach($subcategories as $subcategory)
                        <option value="{{ $subcategory->id}}">{{ $subcategory->name}}</option>

                    @endforeach
                    
                </select>
                @if ($errors->any())
                    @foreach ($errors->get('subcategory_id') as $error)
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

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $('.d_tab').hide();
        $('.one_tab a').click(function(){
            $('.one_tab a').addClass("active");
            $('.two_tab a').removeClass("active");
            $('.d_tab').hide();
            $('.un_tab').show();
        });

        $('.two_tab a').click(function(){
            $('.two_tab a').addClass("active");
            $('.one_tab a').removeClass("active");

            $('.un_tab').hide();
            $('.d_tab').show();
        })

    })
</script>
@endsection