@extends('stadmin::partials.app')

@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Utilisateurs</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('stadmin.dash') }}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active">Utilisateurs</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-12 text-right">
                        <div class="bh_chart hidden-xs">
                            <div class="float-left m-r-15">
                                <small>Visiteurs</small>
                                <h6 class="mb-0 mt-1"><i class="icon-user"></i> 1,784</h6>
                            </div>
                            <span class="bh_visitors float-right">2,5,1,8,3,6,7,5</span>
                        </div>
                        <div class="bh_chart hidden-sm">
                            <div class="float-left m-r-15">
                                <small>Visites</small>
                                <h6 class="mb-0 mt-1"><i class="icon-globe"></i> 325</h6>
                            </div>
                            <span class="bh_visits float-right">10,8,9,3,5,8,5</span>
                        </div>
                        <div class="bh_chart hidden-sm">
                            <div class="float-left m-r-15">
                                <small>Chats</small>
                                <h6 class="mb-0 mt-1"><i class="icon-bubbles"></i> 13</h6>
                            </div>
                            <span class="bh_chats float-right">1,8,5,6,2,4,3,2</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Liste</h2>
                            <ul class="header-dropdown">
                                <li><a href="javascript:void(0);" class="btn btn-info" data-toggle="modal" data-target="#add_user">Ajout d'utilisateur</a></li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example dataTable table-custom m-b-0">
                                    <thead>
                                        <tr>
                                            <th>Nom complet</th>
                                            <th></th>
                                            <th></th>
                                            <th>Ajouter le</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($users as $user)
                                            <tr>
                                                <td class="width45">
                                                    @if (is_null($user->avatar))
                                                        <img src="{{config('stadmin.default_avatar')}}" class="rounded-circle width35" alt="">
                                                    @else
                                                        <img src="{{ $user->avatar }}" class="rounded-circle width35" alt="">
                                                    @endif
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">{{ ucfirst($user->firstName) }} {{ ucfirst($user->lastName) }}</h6>
                                                    <span>{{ $user->email }}</span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-danger">{{ $user->user_status->name }}</span>
                                                    <span class="badge badge-danger">{{ $user->user_status->name }}</span>
                                                    <span class="badge badge-danger">{{ $user->user_status->name }}</span>
                                                    <span class="badge badge-danger">{{ $user->user_status->name }}</span>
                                                </td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>{{ $user->roles->pluck('name') }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></button>
                                                    <button type="button" class="btn btn-sm btn-outline-danger js-sweetalert" title="Delete" data-type="confirm"><i class="fa fa-trash-o"></i></button>
                                                </td>
                                            </tr>
                                        @empty
                                            <p>Rien à afficher</p>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal animated fadeIn" id="add_user" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="title" id="defaultModalLabel">Add User</h6>
                </div>
                <div class="modal-body">
                    <div class="row clearfix">
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="First Name *">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email ID *">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username *">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Mobile No">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <select class="form-control show-tick">
                                    <option>Select Role Type</option>
                                    <option>Super Admin</option>
                                    <option>Admin</option>
                                    <option>Employee</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Employee ID *">
                            </div>
                        </div>
                        <div class="col-12">
                            <h6>Module Permission</h6>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>Read</th>
                                        <th>Write</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Super Admin</td>
                                        <td>
                                            <label class="fancy-checkbox">
                                                <input class="checkbox-tick" type="checkbox" name="checkbox" checked>
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="fancy-checkbox">
                                                <input class="checkbox-tick" type="checkbox" name="checkbox" checked>
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="fancy-checkbox">
                                                <input class="checkbox-tick" type="checkbox" name="checkbox" checked>
                                                <span></span>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Admin</td>
                                        <td>
                                            <label class="fancy-checkbox">
                                                <input class="checkbox-tick" type="checkbox" name="checkbox" checked>
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="fancy-checkbox">
                                                <input class="checkbox-tick" type="checkbox" name="checkbox" checked>
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="fancy-checkbox">
                                                <input class="checkbox-tick" type="checkbox" name="checkbox">
                                                <span></span>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Employee</td>
                                        <td>
                                            <label class="fancy-checkbox">
                                                <input class="checkbox-tick" type="checkbox" name="checkbox" checked>
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="fancy-checkbox">
                                                <input class="checkbox-tick" type="checkbox" name="checkbox">
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="fancy-checkbox">
                                                <input class="checkbox-tick" type="checkbox" name="checkbox">
                                                <span></span>
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>HR Admin</td>
                                        <td>
                                            <label class="fancy-checkbox">
                                                <input class="checkbox-tick" type="checkbox" name="checkbox" checked>
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="fancy-checkbox">
                                                <input class="checkbox-tick" type="checkbox" name="checkbox" checked>
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <label class="fancy-checkbox">
                                                <input class="checkbox-tick" type="checkbox" name="checkbox">
                                                <span></span>
                                            </label>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
@endsection