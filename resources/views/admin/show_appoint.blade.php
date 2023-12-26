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
       <div align="center" style="padding-top: 80px">
        <table>
            <tr style="background-color:black;">
                <th style="background-color: aqua; padding:10px ;">patient name</th>
                <th style="background-color:rgb(4, 205, 128);c50bcf padding:10px   ">doctor</th>
                <th style=" padding:10px ;">Email</th>
                <th style=" padding:10px ;">Phone</th>
                <th style=" padding:10px ;">Date</th>
                <th style=" padding:10px ;">Message</th>
                <th style=" padding:10px ;">status</th>
                <th style=" padding:10px ;">approved</th>
                <th style=" padding:10px ;">cancel</th>
                <th style=" padding:10px ;">send mail</th>
               
            </tr>
            @foreach($data as $info)

            <tr align="center">
                <td>{{$info->name}}</td>
                <td>{{$info->email}}</td>
                <td>{{$info->date}}</td>
                <td>{{$info->doctor}}</td>
                <td>{{$info->number}}</td>
                <td>{{$info->message}}</td>
                <td>{{$info->status}}</td>
                <td>
                    <a class="btn btn-success" href="{{url('approved',$info->id)}}">Approved</a>
                </td>
                <td><a class="btn btn-danger" href="{{url('cancel',$info->id)}}">inadmissible</a></td>
                <td><a class="btn btn-primary" href="{{url('emailview',$info->id)}}">send mail</a></td>
                
            </tr>
            @endforeach
        </table>
       </div>
       




    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
  </body>
</html>