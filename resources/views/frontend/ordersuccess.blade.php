@extends('layouts.frontendtemplate')
@section('content')

<!-- Subcategory Title -->
{{-- <div class="jumbotron jumbotron-fluid subtitle">
    <div class="container">
        <h1 class="text-center text-white"> Order Received </h1>
    </div>
</div> --}}
<div class="container my-5">
    <div class="card">
        <div class="card-body">
            <h2 class="p-5 text-center">Your order is completed!</h2>
        </div>
    </div>
</div>

@endsection

@section('script')
<script type="text/javascript" src="{{ asset('frontend/custom.js') }}"></script>
@endsection