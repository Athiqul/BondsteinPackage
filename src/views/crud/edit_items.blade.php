@extends('crud::layouts.master_layout')
@section('main')
    <div class="container">
        <div class="row mt-5">
            <div class="col-12 d-flex justify-content-center ">
                <div class="card ">
                    <div class="card-header">
                        Edit {{ $item->skills }}
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Update</h5>
                        <form action="{{ route('skill.update',["id"=>$item->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Skill Name</label>
                                <input type="text" class="form-control" placeholder="Product title" name="skills"
                                    value="{{ old('skills', $item?->skills) }}" required>





                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Skill Level</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="process" required>
                                  <option value="0" {{ $item->process==0?'Selected':'' }}>Beginner</option>
                                  <option value="1" {{ $item->process==1?'Selected':'' }}>Intermediate</option>
                                  <option value="2" {{ $item->process==2?'Selected':'' }}>Expert</option>
                                </select>
                              </div>

                            <button type="submit" class="btn btn-primary mt-3">Update</button>
                        </form>

                    </div>
                    <div class="card-footer text-muted">

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
