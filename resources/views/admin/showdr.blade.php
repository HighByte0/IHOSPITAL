<!DOCTYPE html>
<html lang="en">
  <head>
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
      <div class="container-fluid page-body-wrapper">
        <div  style="padding: 100px; ">
            <table style="border-collapse: collapse; width: 100%; border: 1px solid rgb(28, 56, 140);">
                <tr style="background-color: rgb(0, 0, 0) ; border-collapse: collapse; width: 100%; border: 1px solid rgb(28, 56, 140);">
                    <th style="padding:10px;border-collapse: collapse; width: 100%; border: 1px solid rgb(28, 56, 140);">dr_name</th>
                    <th style="padding:10px; border-collapse: collapse; width: 100%; border: 1px solid rgb(28, 56, 140);">dr_nbr</th>
                    <th style="padding:10px; border-collapse: collapse; width: 100%; border: 1px solid rgb(28, 56, 140);">dr_speciality</th>
                    <th style="padding:10px; border-collapse: collapse; width: 100%; border: 1px solid rgb(28, 56, 140);">dr_room</th>
                    <th style="padding:10px; border-collapse: collapse; width: 100%; border: 1px solid rgb(28, 56, 140);">dr_image</th>
                    <th style="padding:10px; border-collapse: collapse; width: 100%; border: 1px solid rgb(28, 56, 140);">update</th>
                    <th style="padding:10px; border-collapse: collapse; width: 100%; border: 1px solid rgb(28, 56, 140);">delete</th>
                </tr>
                @foreach($data as $info)
                <tr align="center" style="padding:10px; border-collapse: collapse; width: 100%; border: 1px solid rgb(28, 56, 140);">
                    <td style="padding:10px; border-collapse: collapse; width: 100%; border: 1px solid rgb(28, 56, 140);">{{$info->dr_name}}</td>
                    <td style="padding:10px; border-collapse: collapse; width: 100%; border: 1px solid rgb(28, 56, 140);">{{$info->dr_nbr}}</td>
                    <td style="padding:10px; border-collapse: collapse; width: 100%; border: 1px solid rgb(28, 56, 140);">{{$info->dr_Specialties}}</td>
                    <td style="padding:10px; border-collapse: collapse; width: 100%; border: 1px solid rgb(28, 56, 140);">{{$info->dr_room}}</td>
                    <td style="padding:10px; border-collapse: collapse; width: 100%; border: 1px solid rgb(28, 56, 140);"><img src="{{ asset('drimage/'.$info->dr_image) }}" alt="Doctor Image" style="height: 95px"></td>
                    <td style="padding:10px; border-collapse: collapse; width: 100%; border: 1px solid rgb(28, 56, 140);"><a  href="{{url('to_update',$info->id)}}" class="btn btn-danger">update information</a></td>

                    <td style="padding:10px; border-collapse: collapse; width: 100%; border: 1px solid rgb(28, 56, 140);"><a onclick="return confirm('are you want to resign that doctor ')" href="{{url('to_resign',$info->id)}}" class="btn btn-danger">to resign</a></td>

                </tr>
                @endforeach
    
            </table>
          

        </div>
        
       
        

      
      
      </div>
      
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
  </body>
</html>