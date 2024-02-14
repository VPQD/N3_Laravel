<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include('admin.css')
    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .font_size {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .text_color {
            color: black;
            padding-bottom: 20px;
            min-width: 20em;
        }

        label {
            display: inline-block;
            width: 200px;
        }

        .div_design {
            padding-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.header')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <div class="div_center">
                        <h1 class="font_size">Update Permission</h1>
                        <form action="{{ url('/update_permission_confirm', $user->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="div_design">
                                <label for="">User Name</label>
                                <input class="text_color" type="text" name="name" placeholder="" required=""
                                    value="{{ $user->name }}">
                            </div>
                            <div class="div_design">
                                <label for="">User Mail</label>
                                <input class="text_color" type="email" name="email" placeholder="" required=""
                                    value="{{ $user->email }}">
                            </div>
                            <div class="div_design">
                                <label for="">User UserType</label>
                                <input class="text_color" type="number" name="usertype" placeholder="" required=""
                                    value="{{ $user->usertype }}">
                            </div>
                            <div class="div_design">
                                <input type="submit" value="Update permission" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.script')
</body>

</html>
