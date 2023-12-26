<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    <style type="text/css">
        label {
            display: inline-block;
            width: 200px;
        }
    </style>
    @include('admin.style')
  </head>
  <body>
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

        <div class="container-fluid page-body-wrapper" align="center">
            <form action="{{url('updt_doctor',$data->id)}}" method="POST" enctype="multipart/form-data" >
                @csrf
                <div style="padding: 45px" >
                    <label for="">Doctor Name</label>
                    <input type="text" name="dr_name" style="color: black " value="{{$data->dr_name}}" required>
                </div>
                <div style="padding: 30px">
                    <label for="">Phone number</label>
                    <input type="text" name="dr_nbr" style="color: black"  value="{{$data->dr_nbr}}" required>
                </div>
                <div style="padding: 30px">
                    <label for="medicalSpecialties"> Specialty:</label>
                    <input type="text" name="dr_Specialties" style="color: black"  value="{{$data->dr_Specialties}}">
                </div>
                <div style="padding: 30px">
                    <label for="">Room No</label>
                    <input type="text" name="dr_room" style="color: black" value="{{$data->dr_room}}" required>
                </div>
                <div style="">
                    <label for="image">old Image</label>
                    <img src="drimage/{{$data->dr_image}} "  style="height: 50px; width:50px; ">
                </div>
                <br>
                <div>

                  <label for="chnage image">chnage image</label>
                  <input type="file" name="dr_imaage">
                </div>
                <div style="padding: 30px">
                    <input type="submit" class="btn btn-success" value="Submit">
                </div>
            </form>
            
        </div>

      
       

        </div>
       
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
  </body>
</html>