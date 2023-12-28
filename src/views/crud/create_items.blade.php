@extends('crud::layouts.master_layout')
@section('main')
<div class="container">
    <div class="row mt-5" >
        <div class="col-12 d-flex justify-content-center ">
            <div class="card ">
                <div class="card-header">
                  Add New Skill
                </div>
                <div class="card-body">
                  <h5 class="card-title">Add Item into system</h5>
                  <form action="{{route('skill.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">skill Name</label>
                      <input type="text" class="form-control"  name="skills" value="{{old('skills')}}" required>





                    </div>



                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Skill Level</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="process" required>
                          <option value="0">Beginner</option>
                          <option value="1">Intermediate</option>
                          <option value="2">Expert</option>
                        </select>
                      </div>


                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                  </form>

                </div>
                <div class="card-footer text-muted">

                </div>
              </div>
        </div>
    </div>
</div>
@endsection
