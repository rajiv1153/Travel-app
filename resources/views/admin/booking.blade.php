@extends('admin.layouts.mainlayout')
@section('content')
    
<?php 
$formName="";
if(Request::is('admin/bookings/pending'))
$formName="Pending";
else if(Request::is('admin/bookings/confirmed'))
$formName="Confirmed";
else if(Request::is('admin/bookings/completed'))
$formName="Completed";
?>
          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Booking - {{$formName}}</h1>

            <div class="card shadow mb-4 mt-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                  All {{$formName}} Bookings
                </h6>
                @include('message.message')
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table
                    class="table table-bordered"
                    id="dataTable"
                    width="100%"
                    cellspacing="0"
                  >
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Travellers</th>
                        <th>Price Per Person</th>
                        <th>Country</th>
                        <th>Contact Number</th>
                        <th>Email</th>
                        <th>Destination</th>
                        <th>Booked For Date</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Name</th>
                        <th>Travellers</th>
                        <th>Price Per Person</th>
                        <th>Country</th>
                        <th>Contact Number</th>
                        <th>Email</th>
                        <th>Destination</th>
                        <th>Booked For Date</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      
                     @foreach ($bookings as $booking)
                         <?php $destination=$booking->destination()->first() ?>
                      <tr>
                        <td>{{$booking->bookedname}}</td>
                        <td>{{$booking->nop}}</td>
                        <td>{{$destination->price}}</td>
                        <td>{{$booking->bookedcountry}}</td>
                        <td>{{$booking->bookedphone}}</td>
                        <td>{{$booking->bookedemail}}</td>
                      <td><a target="_blank" href="{{route('destination.infoDestination',$destination->id)}}">{{$destination->title}}</a></td>
                        <td>{{$booking->bookeddate}}</td>
                        <td>
                          <button
                            class="btn btn-secondary btn-sm"
                            data-toggle="modal"
                        data-target="#messagemodal3{{$booking->id}}"
                          >
                            Message
                          </button>
                        </td>
                        <td>{{$booking->status}}</td>
                      
                        <td class="text-center">
                          @if($booking->status=='pending')
                        <form method="post" action="{{route('booking.confirm',$booking->id)}}">
                       @csrf
                          <button  type="submit" class="btn btn-info btn-sm"> Confirm</button>
                        </form> 
                        @endif

                        @if($booking->status=='confirmed')
                      <form method="post" action="{{route('booking.complete',$booking->id)}}">
                       @csrf
                          <button  type="submit" class="btn btn-info btn-sm"> Completed</button>
                        </form> 
                        @endif
                       
                        
                        @if ($booking->status!="completed")
                         <form method="POST" action="{{route('booking.cancel',$booking->id)}}">   
                        @csrf
                          <button
                            type="submit"
                            class="btn btn-danger m-1 btn-delete btn-sm"
                          >
                            Cancel
                         </button>
                         </form>
                          @endif

                        </td>

                        <!-- ! message modal change id of modal a/c to table row -->
                        <div
                          class="modal fade"
                          id="messagemodal3{{$booking->id}}"
                          tabindex="-1"
                          role="dialog"
                          aria-labelledby="exampleModalLabel"
                          aria-hidden="true"
                        >
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                  message
                                </h5>
                                <button
                                  type="button"
                                  class="close"
                                  data-dismiss="modal"
                                  aria-label="Close"
                                >
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <p>
                                {{$booking->message}}
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </tr>
                     @endforeach

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
        @endsection

    