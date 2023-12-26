<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
    @include('admin.style')
    <style type="text/css">
        label {
            display: inline-block;
            width: 200px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2"></script>
</head>
<body x-data="{ showSuccessAlert: {{ session()->has('message') ? 'true' : 'false' }} }">
    <div class="container-scroller">
        <div class="row p-0 m-0 proBanner" id="proBanner">
            <div class="col-md-12 p-0 m-0">
                <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
                        <button id="bannerClose" class="btn border-0 p-0">
                            <i class="mdi mdi-close text-white me-0"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidbar')
        <!-- partial -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="container" align="center" style="padding-top: 15px">
                <template x-if="showSuccessAlert">
                    <div class="alert alert-success" id="success-alert" x-show="showSuccessAlert" x-init="setTimeout(() => showSuccessAlert = false, 3000)">
                        <span>{{ session('message') }}</span>
                        <button type="button" class="close" @click="showSuccessAlert = false" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </template>

                <form action="{{url('sendemail',$data->id)}}" method="POST"  >
                    @csrf
                    <div style="padding: 45px">
                        <label for="">Gretting</label>
                        <input type="text" name="dr_name" style="color: black" required>
                    </div>
                    <div style="padding: 30px">
                        <label for="">body</label>
                        <input type="text" name="body" style="color: black" required>
                    </div>
                   
                    <div style="padding: 30px">
                        <label for="">action text </label>
                        <input type="text" name="action text" style="color: black" required>
                    </div>
                    <div style="padding: 30px">
                        <label for="">action url </label>
                        <input type="text" name="action url" style="color: black" required>
                    </div>
                    <div style="padding: 30px">
                        <label for="">end url  </label>
                        <input type="text" name="end url" style="color: black" required>
                    </div>
                  
                    <div style="padding: 30px">
                        <input type="submit" class="btn btn-success" value="Submit">
                    </div>
                </form>
                
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <!-- partial -->
    </div>
    <!-- main-panel ends -->
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')

</body>
</html>
