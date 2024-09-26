

@extends('layouts.app')
@section('content')

<div class="pagetitle">
    <h1>Form Elements</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Forms</li>
        <li class="breadcrumb-item active">Elements</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-8">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">User</h5>
            <a href="{{ url('user') }}" class="btn btn-primary pull-right">List</a>

            <!-- General Form Elements -->
            <form action="{{ url('user/add') }}" method="post">
                @csrf
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="name">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">email</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="email">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">password</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="password">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Role</label>
                <div class="col-sm-10">
                    <select name="role_id" id="" required>
                        <option value="">Select</option>
                        @foreach ($getRole as $role )
                        <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                     </div>
              </div>


              <div class="row mb-3">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Submit Form</button>
                </div>
              </div>

            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>

    </div>
  </section>

  @endsection
