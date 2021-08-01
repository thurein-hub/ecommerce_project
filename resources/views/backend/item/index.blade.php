@extends('layouts.backendtemplate')
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Item List</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            <a href="{{route('item.create')}}" class="btn btn-outline-info float-right">New</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="thead-dark"> 
                            <th>ID</th>
                            <th>Name</th>
                            <th>Brand</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <img src="{{ asset('storage/'.$item->photo) }}" alt="iphone" class="img-fluid" width="50">
                                        </div>
                                        <div class="col-lg-10">
                                            <h5>{{ $item->codeno }}</h5>
                                            <p class="text-muted">{{ $item->name }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $item->brand->name }}</td>
                                <td>
                                    @if($item->discount)
                                        
                                    <p>{{$item->discount}}</p>
                                    <del>{{$item->price}}</del>
                            
                                    @elseif($item->price)
                                
                                    {{$item->price}}
                                
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('item.edit',$item->id)}}" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="#" data-id="{{route('item.destroy',$item->id)}}" class="btn btn-danger btn-sm deletebtn">Delete</a>
                                </td>

                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- end of container -->

<div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="post" action="" id="deleteModalForm">
          @csrf
          @method('DELETE')
          <div class="modal-header">
            <h4 class="modal-title">Are you sure to delete?</h4>
          </div>
          <div class="modal-footer">
            <input type="submit" name="btnsubmit" class="btn btn-danger" value="Delete">
            <button class="btn btn-secondary" data-dismiss="modal">Cancle</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection

@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
      $('.deletebtn').click(function(){
        var id = $(this).data('id');
        // console.log(id);
        $('#deleteModalForm').attr('action',id);
        $('#deleteModal').modal('show');
      })
    })
  </script>
@endsection