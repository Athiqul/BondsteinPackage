@extends('crud::layouts.master_layout')

@section('main')
<div class="container">
    <div class="row ms-auto">
        <div class="col-sm-4 mt-5">
            <a href="{{route('skill.create')}}" class="btn btn-primary">Add New skill</a>
        </div>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Skill Name</th>
                <th>Status</th>
                <th scope="col">Created_at</th>

                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
        @forelse ($items as $item)

              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td> {{ $item->skills }}</td>

                <td>
                    @if ($item->process=='1')
                        InterMediate
                    @elseif ($item->process=='0')
                        Beginner
                    @else
                    Expert
                    @endif
                </td>
                <td>{{ $item->created_at->diffForHumans() }}</td>
                <td>
                    <a href="{{ route('skill.edit', $item->id ) }}" class="btn btn-info">Edit</a>


                    <form action="{{ route('skill.delete',['id'=>$item->id]) }}" method="POST" class="d-inline">
                       @method('DELETE')
                       @csrf
                       <button type="submit" onsubmit="return confirm('Are you really want to delete ')" class="btn btn-danger">Delete</button>
                    </form>
                </td>
              </tr>


        @empty
    </tbody>
</table>
            <h4>No skills found!</h4>
        @endforelse

    </div>
</div>

@endsection
