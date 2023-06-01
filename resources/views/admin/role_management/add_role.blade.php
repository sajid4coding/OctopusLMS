@extends('layouts.admin_master')
@section('dashboard_content')
{{--
    ||===========================================
    ||          Form Design Start
    ||===========================================
--}}

<div class="container">
    <div class="row">
        <div class="col-12">
            <form class="border p-5" action="{{ route('store.role') }}" method="POST">
                @if (session('success'))
                <div class="alert alert-primary" role="alert">
                    <p class="mb-0">{{ session('success') }}</p>
                  </div>
                @endif
                @csrf
                <h1 class="text-center font-mono text-primary"> ---- Add Role ----</h1>
                <div class="mb-3">
                    <label class="form-label">Role name</label>
                    <input type="text" name="name" class="form-control" placeholder="name">
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
        <div class="col-12">
             <table class="table border p-5 text-center">
                <thead>
                  <tr>
                    <th scope="col">SL. No.</th>
                    <th scope="col">Name of Role</th>
                    <th scope="col">Add Permission</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                    <tr>
                      <th scope="row">{{ $loop->index + 1 }}</th>
                      <td>{{ $role->name }}</td>
                      <td class="text-center">
                        <a href="{{ route('create.permission',$role->id) }}">Add</a>
                      </td>
                      <td class="text-center">
                          <a href="{{ route('delete.role',$role->id) }}" class="text-danger"><i class="fas fa-trash-alt"></i></a>
                      </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4">
                            <p class="bg-danger text-white p-2 text-center">No role yet ! !</p>
                        </td>
                    </tr>
                    @endforelse

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
