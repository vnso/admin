@extends('admin::layouts.app')

@section('content')

    <h1>
    	Benutzer
        @if(Marble\Admin\App\Helpers\PermissionHelper::allowed("createUser"))
            <div class="pull-right">
                <a href="{{ url("admin/user/add") }}" class="btn btn-xs btn-success">{{trans("admin::admin.add_user")}}</a>
            </div>
        @endif
    </h1>


    <div class="main-box">
        <header class="main-box-header clearfix">
            <h2>
                {{trans("admin::admin.users")}}
            </h2>
        </header>
        <div class="main-box-body clearfix">        
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><a href="#"><span>{{trans("admin::admin.name")}}</span></a></th>
                            <th class="text-right"><span>&nbsp;</span></th>
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach($users as $user)
                            <tr>
                                <td>

                                    @if(Marble\Admin\App\Helpers\PermissionHelper::allowed("editUser"))
                                        <a href="{{ url("admin/user/edit/" . $user->id) }}">{{$user->name}}</a>
                                    @else
                                        {{$user->name}}
                                    @endif
                                </td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        @if(Marble\Admin\App\Helpers\PermissionHelper::allowed("editUser"))
                                            <a href="{{ url("admin/user/edit/" . $user->id) }}" class="btn btn-info btn-xs">{{trans("admin::admin.edit")}}</a>
                                        @endif

                                        @if(Marble\Admin\App\Helpers\PermissionHelper::allowed("deleteUser"))
                                            <a href="{{ url("admin/user/delete/" . $user->id) }}" onclick="return confirm('{{trans("admin::admin.are_you_sure")}}');" class="btn btn-xs btn-danger">{{trans("admin::admin.delete")}}</a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    

@endsection