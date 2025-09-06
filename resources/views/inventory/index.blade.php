<!DOCTYPE html>
<html lang="en">

@include('partials.head')

<body>
    @include('sweetalert::alert')
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        @include('partials.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_sidebar.html -->
            @include('partials.sidebar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-8 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="card-title mb-0">Inventory Overview</h4>
                                        <a href=""
                                            class="btn btn-primary btn-rounded btn-fw">Add Inventory Data</a>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Product</th>
                                                    <th>Quantity In Stock</th>
                                                    <th>Unit Price</th>
                                                    <th>Total Cost</th>
                                                    <th>Stock Movement</th>
                                                    <th>Quantity In(Today)</th>
                                                    <th>Quantity Out(Today)</th>
                                                    <th>Action By</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- @foreach ($products as $p) --}}
                                                    <tr>
                                                        {{-- <td> {{ $loop->iteration }} </td>
                                                        <td> {{ $p->name }} </td>
                                                        <td> {{ $p->description }} </td>
                                                        <td> {{ $p->price }} </td>
                                                        <td> {{ $p->category->name }} </td>
                                                        <td> {{ $p->unit }} </td> --}}
                                                    </tr>
                                                {{-- @endforeach --}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                @include('partials.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('partials.plugin')
</body>

</html>
