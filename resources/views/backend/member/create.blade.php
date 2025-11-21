@extends('layouts.backapp')

@section('main')

    <!-- Page Wrapper -->
        <div class="page-wrapper">
        
            <div class="content container-fluid">
                
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Member Dashboard</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                <div class="row">
                    <div class="col-sm-12">
                        @include('layouts.components.message')
                        <div class="card">
                            <div class="card-header d-flex">
                                <div>
                                    <h3 class="page-title">Add New Member</h3>
                                </div>
                                <div class="ml-auto">
                                    <a href="{{ route('member.index') }}" class="btn btn-primary">All Member </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('member.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <!-- Email -->
                                    <div class="form-group row mb-3">
                                        <label class="col-lg-3 col-form-label">Email</label>
                                        <div class="col-lg-9">
                                            <input type="email" 
                                                name="email" 
                                                value="{{ old('email') }}" 
                                                class="form-control @error('email') is-invalid @enderror" 
                                                placeholder="Enter email address" required>

                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Role -->
                                    <div class="form-group row mb-4">
                                        <label class="col-lg-3 col-form-label">Admin Role</label>
                                        <div class="col-lg-9">
                                            <select name="role" 
                                                    class="form-control @error('role') is-invalid @enderror" required>
                                                <option value="">Select Role</option>
                                                <option value="manager" {{ old('role') == 'manager' ? 'selected' : '' }}>Manager</option>
                                                <option value="operations" {{ old('role') == 'operations' ? 'selected' : '' }}>Operations</option>
                                                <option value="accountant" {{ old('role') == 'accountant' ? 'selected' : '' }}>Accountant</option>
                                                <option value="member" {{ old('role') == 'member' ? 'selected' : '' }}>Member</option>
                                            </select>

                                            @error('role')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary px-4">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>                               
            </div>			
        </div>
        <!-- /Page Wrapper -->

@endsection