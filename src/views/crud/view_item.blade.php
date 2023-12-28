@extends('layouts.master_layout')
@section('main')
<div class="container">
    <div class="card text-center">
        <div class="card-header">
         {{ $item->title }}
        </div>
        <div class="card-body">
           <img src="{{ asset('storage/images/'.$item->image) }}"  height="300px" alt="{{ $item->title }}">
          <p class="card-text">{{ $item->desc }}</p>
          <a href="{{ route('product.edit', $item->id ) }}" class="btn btn-info">Edit</a>
          <form action="{{ route('product.status',['id'=>$item->id]) }}" method="post" class="d-inline">
        @csrf
        @method('PATCH')
        <button type="submit"  onsubmit="return confirm('Are sure to change status of this product?')" class="btn {{ $item->status=='1'?'btn-warning':'btn-success' }}">@if ($item->status=='1')
            Deactive
        @else
            Active
        @endif</button>
        </form>

          <form action="{{ route('product.delete',['id'=>$item->id]) }}" method="POST" class="d-inline">
             @method('DELETE')
             @csrf
             <button type="submit" onsubmit="return confirm('Are you really want to delete ')" class="btn btn-danger">Delete</button>
          </form>

        </div>
        <div class="card-footer text-muted">
          {{ $item->created_at->diffForHumans() }}
        </div>
      </div>
</div>
@endsection
