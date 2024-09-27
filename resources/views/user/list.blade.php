
@extends('layouts.app')
@section('content')

<div class="pagetitle">
    <h1>General Tables</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">General</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">


      <div class="col-lg-6">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">user List</h5>
            @if(!empty($permissionAddUser))
            <a href="{{ url('user/add') }}" class="btn btn-primary pull-right">Add</a>
            @endif

            <!-- Table with stripped rows -->
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">email</th>
                  <th scope="col">role</th>

                  <th scope="col">date</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($getRecord as $value )
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>

                    <td>{{ $value->role_id }}</td>

                    <td>{{ $value->created_at }}</td>

                    <td>
                        @if(!empty($permissionEditUser))

                        <a href="{{ url('user/edit/' . $value->id) }}">Edit</a>
                        @endif
                        @if(!empty($permissionDeleteUser))

                        <a href="{{ url('user/delete/' . $value->id) }}">delete</a>
                        @endif
                        <a href="{{ url('user/create/' . $value->id) }}">send mail</a>


                    </td>


                  </tr>
                @endforeach
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>



      </div>
    </div>
  </section>



@endsection

