<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
  </head>
  
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support</p>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="#"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')

      @include('admin.navbar')
      
      <div class="container-fluid page-body-wrapper">

          <div align="center" style="padding-top:100px;">

              <table>

                  <tr style="background-color:#243B53;" align="center">

                      <th style="padding:10px font-size:20px">Doctor</th>
                      <th style="padding:10px">Department</th>
                      <th style="padding:10px">Room</th>
                      <th style="padding:10px">Phone</th>
                      <th style="padding:10px">Image</th>
                      <th style="padding:10px">Update</th>
                      <th style="padding:10px">Delete</th>
                      
                  </tr>
            @foreach($data as $doctor)
                  <tr style="background-color:#243B53;" align="center">

                      <td style="color:white; padding:10px;">{{$doctor->name}}</td>
                      <td style="color:white; padding:10px;">{{$doctor->department}}</td>
                      <td style="color:white; padding:10px;">{{$doctor->room}}</td> 
                      <td style="color:white; padding:10px;">{{$doctor->phone}}</td>
                      <td style="padding:10px;"><img hight="100" width="100" src="doctorimage/{{$doctor->image}}"></td>
                      <td style="padding:10px;"><a class="btn btn-primary" href="{{url('updatedoctor',$doctor->id)}}">Update</a></td>
                      <td style="padding:10px;"><a class="btn btn-danger" onclick="return confirm('Delete Doctor')" href="{{url('deletedoctor',$doctor->id)}}">Delete</a></td>


                  </tr>

            @endforeach

              </table>

          </div>
      </div>
        
    <!-- container-scroller -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
