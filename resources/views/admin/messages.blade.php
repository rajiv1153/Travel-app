@extends('admin.layouts.mainlayout')
@section('content')
    
          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Recent Messages</h1>
@include('message.message')
            <div class="card shadow mb-4 mt-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Messages</h6>
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
                        <th>Full Name</th>
                        <th>Address</th>
                        <th>Contact Number</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Full Name</th>
                        <th>Address</th>
                        <th>Contact Number</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </tfoot>
                    <tbody>
                   
                      @foreach ($messages as $msg)
                          
                      <tr>
                        <td>{{$msg->name}}</td>
                        <td>{{$msg->address}}</td>
                        <td>{{$msg->phone}}</td>
                        <td>{{$msg->email}}</td>
                        <td>
                          <button
                            class="btn btn-secondary btn-sm"
                            data-toggle="modal"
                            data-target="#messagemodal1{{$msg->id}}"
                          >
                            Message
                          </button>
                        </td>
                        <td class="text-center">
                         <form action="{{route('admin.delmsg',$msg->id)}}" method="post">
                           @csrf
                          <button
type="submit"
                          class="btn btn-danger m-1 btn-delete btn-sm"
                          >
                            Delete
                          </a>
                         </form>
                        </td>

                        <!-- ! message modal change id of modal a/c to table row -->
                        <div
                          class="modal fade"
                          id="messagemodal1{{$msg->id}}"
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
                               {{$msg->message}}
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
  