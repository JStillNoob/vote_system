@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/department-admin.css'])
@include('admin.sidebar')

<nav class="navbar fixed-top" style="margin-left: 250px;">
    <div class="container-fluid" style="margin-right: 250px;">
        <p class="navbar-brand" href="#" status='disable'>Manage User Types</p>
    </div>
</nav>

<div class="container" style="margin-top: 100px; margin-left: 250px;">
    <div class="row">
        <!-- Card 1 (Add User Type) -->
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5>Add User Type</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('userTypes.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="userType_name" class="form-label">User Type Name</label>
                            <input type="text" name="userType_name" class="form-control" id="userType_name" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Card 2 (User Type List) -->
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5>User Type List</h5>
                </div>
                <div class="card-body">
                    @if (isset($userTypes) && $userTypes->count())
                        @foreach ($userTypes as $userType)
                            <div class="border p-3 mb-3" style="background-color: #F8FAFF; border-color: #D6E4FF;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h3 style="color: #2C3E50;">{{ $userType->userType_name }}</h3>
                                    <div>
                                        <a href="{{ route('userTypes.edit', $userType->userType_id) }}" class="btn btn-warning btn-sm" style="background-color: #F39C12;">Edit</a>
                                        <form action="{{ route('userTypes.destroy', ['userType_id' => $userType->userType_id]) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this user type?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" style="background-color: #E74C3C;">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-info mt-3" role="alert">
                            No user types available.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@extends('layout.app') <!-- Assuming you use a layout -->



@push('scripts')
    @if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: "{{ session('success') }}",
                icon: "success",
                draggable: true
            });
        });
    </script>
    @endif
@endpush