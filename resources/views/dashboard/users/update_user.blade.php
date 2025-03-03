@extends('layouts.dashboard')

@section('content')
<section id="configuration">
  <div class="content-header row">
    <div class="mb-2 content-header-left col-md-4 col-12">
      <h3 class="content-header-title">Update Profile Details</h3>
    </div>
    <div class="content-header-right col-md-8 col-12">
      <div class="breadcrumbs-top float-md-right">
        <div class="mr-1 breadcrumb-wrapper">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active">Update Profile</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="mb-0 list-inline">
              <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
              <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
              <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
              <li><a data-action="close"><i class="ft-x"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="card-content collapse show">
          <div class="card-body card-dashboard">
            <form method="POST" action="#">
              @csrf
              @method('PUT')

              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="Kurnia" placeholder="Enter Name" required>
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="kurnia@example.com" placeholder="Enter Email" required>
              </div>

              <div class="form-group">
                <label for="password">Password (Leave blank to keep current password)</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter New Password">
              </div>

              <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm New Password">
              </div>

              <button type="submit" class="mb-1 mr-1 btn btn-bg-gradient-x-purple-blue col-12 col-md-2">Update User</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

