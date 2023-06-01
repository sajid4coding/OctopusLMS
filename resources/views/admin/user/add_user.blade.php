@extends('layouts.admin_master')
@section('dashboard_content')

{{--
    ||===========================================
    ||          Form Design Start
    ||===========================================
--}}

<div class="container">
    <form class="border p-5" action="{{ route('add.user.store') }}" method="POST">



        {{-- ALert Start --}}
        @if (session('success'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
              <strong>{{ session('success') }}</strong>
            </div>
        @endif
        {{-- ALert End --}}

        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" placeholder="name">
        </div>
        <div class="mb-3 ">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control"  placeholder="email">
        </div>
        <div class="mb-3 ">
          <label for="exampleInputEmail1" class="form-label">Phone Number</label>
          <input type="email" name="phone_number" class="form-control"  placeholder="number">
        </div>
        <div class="mb-3 ">
          <label for="exampleInputEmail1" class="form-label">User Type or Role</label>
          <select name="role" class="form-control">
            <option value="" disabled selected>Select a role</option>
            @foreach ($roles as $role)
            <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

{{--
    ||===========================================
    ||          Form Design Start
    ||===========================================
--}}
@endsection
