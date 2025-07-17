<!DOCTYPE html>
<html lang="en">

@include('partials.head')

<body>
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
                        @include('sweetalert::alert')
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Create New Product Details</h4>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $e)
                                                    <li>{{ $e }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form method="POST" action="{{ route('product.store') }}" class="forms-sample">
                                        @csrf
                                        <div class="form-group">
                                            <label for="InputCategoryName">Product Name :</label>
                                            <input type="text" class="form-control" id="InputCategoryName"
                                                name="name" placeholder="Example: Chicken"
                                                value="{{ old('name') }}">
                                            @error('name')
                                                <div class="alert alert-danger"> {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Description of the Product</label>
                                            <textarea class="form-control" id="exampleTextarea1" rows="4" placeholder="This chicken is processed one."
                                                name="productdescription" value="{{ old('productdescription') }}"></textarea>
                                            @error('productdescription')
                                                <div class="alert alert-danger"> {{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control" id="InputPrice" name="price"
                                                placeholder="Price in RM e.g: 20" value="{{ old('price') }}">
                                            @error('price')
                                                <div class="alert alert-danger">{{ $message }} </div>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                                    </form>
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
    <!-- End custom js for this page-->
</body>

</html>
