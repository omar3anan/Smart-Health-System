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

                      <th style="padding:10px font-size:20px">Patient</th>
                      <th style="padding:10px">Email</th>
                      <th style="padding:10px">Phone</th>
                      <th style="padding:10px">Doctor</th>
                      <th style="padding:10px">Date</th>
                      <th style="padding:10px">Message</th>
                      <th style="padding:10px">Status</th>
                      <th style="padding:10px">Approved</th>
                      <th style="padding:10px">Canceled</th>
                      <th style="padding:10px">Send E-mail</th>
                      
                  </tr>
            @foreach($data as $appoint)
                  <tr style="background-color:#243B53;" align="center">

                      <td style="color:white; padding:10px;">{{$appoint->name}}</td>
                      <td style="color:white; padding:10px;">{{$appoint->email}}</td>
                      <td style="color:white; padding:10px;">{{$appoint->phone}}</td>
                      <td style="color:white; padding:10px;">{{$appoint->doctor}}</td>
                      <td style="color:white; padding:10px;">{{$appoint->date}}</td>
                      <td style="color:white; padding:10px;">{{$appoint->message}}</td>
                      <td style="color:white; padding:20px;">{{$appoint->status}}</td>
                      <td style="padding:10px;"><a class="btn btn-success" href="{{url('approved',$appoint->id)}}">Approve</a></td>
                      <td style="padding:10px;"><a class="btn btn-danger" href="{{url('canceled',$appoint->id)}}">Cancel</a></td>
                      <td style="padding:10px;"><a class="btn btn-primary" href="{{url('emailview',$appoint->id)}}">Send</a></td>

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
