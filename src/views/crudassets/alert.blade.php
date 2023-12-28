@if (session('alert-success'))
<div class="alert alert-success">
    <strong>Success!</strong> {{ session('alert-success') }}
  </div>
@elseif (session('alert-info'))
<div class="alert alert-info">
    <strong>Info!</strong> {{ session('alert-info') }}
  </div>
@elseif(session('alert-danger'))
<div class="alert alert-danger">
    <strong>Danger!</strong> {{ session('alert-danger') }}
  </div>
@endif
