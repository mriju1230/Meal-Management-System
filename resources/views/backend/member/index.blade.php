@extends('layouts.backapp')

@section('main')

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

                @include('backend.components.message')

                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h3 class="page-title mb-0">All Members</h3>

                        <div class="ml-auto">
                            <a href="{{ route('member.create') }}" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Add New Member
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-striped align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Photo</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($members as $key => $member)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>

                                            <td>
                                                @if($member->photo)
                                                    <img src="{{ asset('media/members/' . $member->photo) }}" 
                                                         alt="Member Photo" width="40" height="40" 
                                                         class="rounded-circle border">
                                                @else
                                                    <img src="{{ asset('assets/images/default-avatar.png') }}" 
                                                         alt="No Photo" width="40" height="40" 
                                                         class="rounded-circle border">
                                                @endif
                                            </td>

                                            <td>{{ $member->name ?? '—' }}</td>
                                            <td>{{ $member->email }}</td>
                                            <td>{{ $member->phone ?? '—' }}</td>

                                            <td>
                                                <span class="badge bg-info text-dark">
                                                    {{ ucfirst($member->role) }}
                                                </span>
                                            </td>

                                            <td>
                                                @if($member->is_active)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>

                                            <td>{{ $member->created_at->diffForHumans() }}</td>

                                            <td class="text-center">

                                                <a class="btn btn-sm btn-info" 
                                                   href="{{ route('member.show', $member->id) }}" 
                                                   title="View">
                                                    <i class="fa fa-eye"></i>
                                                </a>

                                                <a class="btn btn-sm btn-warning" 
                                                   href="{{ route('member.edit', $member->id) }}" 
                                                   title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                <form action="{{ route('member.destroy', $member->id) }}" 
                                                      method="POST" class="d-inline"
                                                      onsubmit="return confirm('Are you sure you want to delete this member?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center text-muted">
                                                No members found.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div> <!-- table-responsive -->

                    </div>
                </div>

            </div>
        </div>

    </div>			
</div>

@endsection
