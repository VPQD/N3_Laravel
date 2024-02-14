<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style type="text/css">
        .title_deg {
            text-align: center;
            font-size: 25px;
            font-weight: bold;
            padding-bottom: 40px;
        }

        .table_deg {
            border: 2px solid white;
            width: 70%;
            margin: auto;
            padding-top: 50px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        @include('admin.sidebar')

        @include('admin.header')
        <div class="main-panel">
            <div class="content-wrapper">
                <h1 class="title_deg">All Email</h1>
                <table class="table_deg">
                    <tr class="th_deg">
                        <th style="padding: 10px">Name</th>
                        <th style="padding: 10px">Email</th>
                        <th style="padding: 10px">User Type</th>
                        <th style="padding: 10px">Role</th>
                        <th style="padding: 10px">Delete</th>
                        <th style="padding: 10px">Edit</th>
                    </tr>
                    @foreach ($user as $user)
                        <form action="" method="POST">
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    {{ $user->usertype }}
                                </td>
                                @php
                                    $roleFound = false;
                                @endphp
                                @foreach ($permission as $permission)
                                    @if ($permission->id == $user->usertype)
                                        <td>{{ $permission->role }}</td>
                                        @php
                                            $roleFound = true;
                                        @endphp
                                    @endif
                                @endforeach
                                @if (!$roleFound)
                                    <td>no role</td>
                                @endif

                                <td>
                                    <a href="{{ url('delete_permission', $user->id) }}" class="btn btn-danger"
                                        onclick="return confirm('Are you sure want to delete')">
                                        Delete</a>
                                </td>
                                <td>
                                    <a href="{{ url('update_permission', $user->id) }}"
                                        class="btn btn-success">Update</a>
                                </td>
                            </tr>
                        </form>
                    @endforeach
                </table>
            </div>
        </div>
        @include('admin.script')
</body>

</html>
