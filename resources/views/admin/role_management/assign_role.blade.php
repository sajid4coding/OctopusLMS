@extends('layouts.admin_master')
@section('dashboard_content')
{{--
    ||===========================================
    ||          Form Design Start
    ||===========================================
--}}

<div class="container">
    <div class="row">
        <div class="col-6">
            <form class="border p-5" action="{{ route('assign.role.permission.store') }}" method="POST">
                @if (session('success'))
                <div class="alert alert-primary" role="alert">
                    <p class="mb-0">{{ session('success') }}</p>
                  </div>
                @endif
                @csrf
                <h1 class="text-center font-mono text-primary"> ---- Add Role ----</h1>
                <div class="mb-3">
                    <label class="form-label">Role name</label>
                    <select class="form-control" name="role_id" id="">
                        @foreach ($roles as $role)
                          <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Permission name</label>
                    <select class="form-control" name="permission_id" id="">
                        @foreach ($permissions as $permission)
                             <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
        <div class="col-6">
             <table class="table border p=5">
                <thead>
                  <tr>
                    <th scope="col">SL. No.</th>
                    <th scope="col">Name of Role</th>
                    <th scope="col">Guard Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    {{-- @forelse ($roles as $role)
                    <tr>
                      <th scope="row">{{ $loop->index + 1 }}</th>
                      <td>{{ $role->name }}</td>
                      <td>{{ $role->guard_name }}</td>
                      <td>
                          <a href="{{ route('delete.role',$role->id) }}" class="text-danger"><i class="fas fa-trash-alt"></i></a>
                      </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">
                            <p class="bg-danger text-white p-2 text-center">No role yet ! !</p>
                        </td>
                    </tr>
                    @endforelse --}}

                </tbody>
              </table>
        </div>
    </div>

</div>

{{--
    ||===========================================
    ||          Form Design Start
    ||===========================================
--}}
@endsection
