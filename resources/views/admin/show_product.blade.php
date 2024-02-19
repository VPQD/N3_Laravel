<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style type="text/css">
        .center {
            margin: auto;
            width: 50%;
            border: 2px solid white;
            text-align: center;
            margin-top: 40px;
        }

        .font_size {
            font-size: 40px;
            padding-top: 20px;
            text-align: center
        }

        .img_size {
            width: 150px;
            height: 150px;
        }

        .th_color {
            background: skyblue;
        }

        .th_deg {
            padding: 30px;
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
            <div class="main-panel">
                <div class="content-wrapper">
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    <h1 class="font_size">Show Product</h1>
                    <table class="center">
                        <tr class="th_color">
                            <th class="th_deg">PC Title</th>
                            <th class="th_deg">Description</th>
                            <th class="th_deg">Quantiry</th>
                            <th class="th_deg">Catagory</th>
                            <th class="th_deg">Price</th>
                            <th class="th_deg">Discount Price</th>
                            <th class="th_deg">PC Image</th>
                            <th class="th_deg">Deltede</th>
                            <th class="th_deg">Edit</th>
                        </tr>
                        @foreach ($product as $product)
                            <tr>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->catagory }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->discount_price }}</td>
                                <td>
                                    <img class="img_size"src="/product/{{ $product->image }}" alt="">
                                </td>
                                <td>
                                    <a href="{{ url('delete_product', $product->id) }}" class="btn btn-danger"
                                        onclick="return confirm('Are you sure want to delete')">
                                        Delete</a>
                                </td>
                                <td>
                                    <a href="{{ url('update_product', $product->id) }}" class="btn btn-success">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <!-- partial -->
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.script')
</body>

</html>
