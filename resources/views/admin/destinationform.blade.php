@extends('admin.layouts.mainlayout')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
  <a href="{{route('destination.getcountries',$country->id)}}" class="btn btn-warning mb-3"><i
      class="fas fa-angle-left"></i> Go Back</a>
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Add New Destination - {{$country->countryname}}</h1>
  @include('message.message')
  <div class="col-md-10 m-auto">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-gray-600">
          New Destination Form
        </h6>
      </div>
      <div class="card-body">
        <form action="{{route('destination.postDestination',$country->id)}}" class="form" method="post"
          enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="title">Title </label>
            <input type="text" name="title" id="title" placeholder="Title" class="form-control"
              value="{{ old('title') }}" required />
          </div>

          <div class="form-group">
            <label for="image">Image (image drag and drop)</label>
            <input type="file" accept="image/jpeg" name="image" id="image" value="{{ old('image') }}"
              class="form-control-file" />
          </div>

          <div class="form-group">
            <label for="duration">Duration </label>
            <input type="text" class="form-control" name="duration" id="title" value="{{ old('duration') }}"
              placeholder="Duration 'eg: 9 N 8 D'" required />
          </div>
          <div class="form-group row">
            <legend class="col-form-label col-sm-2 pt-0">
              Difficulty
            </legend>
            <div class="col-sm-10 d-flex flex-wrap">
              <div class="form-check mx-3">
                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="simple"
                  checked />
                <label class="form-check-label" for="gridRadios1">
                  Simple
                </label>
              </div>
              <div class="form-check mx-3">
                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="average" />
                <label class="form-check-label" for="gridRadios2">
                  Average
                </label>
              </div>
              <div class="form-check mx-3">
                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="hard" />
                <label class="form-check-label" for="gridRadios3">
                  Hard
                </label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="price">Price per person</label>
            <input type="text" name="price" id="price" min="0" value="{{ old('price') }}" class="form-control"
              placeholder="Price per person ' eg: Rs.1200 With Currency'" required />
          </div>

          <div class="form-group">
            <!-- livewire recommended -->
            <label for="highlight1">Trip Highlights</label>

            <input type="text" name="highlight[]" id="highlight1" class="form-control" />

            <!-- delete button -->
            <!-- <i class="fas fa-times text-danger"></i> -->
            <button type="button" class="add btn btn-info m-1 text-center" id="add">
              Add Hightlight
            </button>
            <!-- end of livewire recomended -->
          </div>
          <div class="form-group">
            <label for="introduction">Trip Introduction</label>
            <textarea name="introduction" id="introduction" cols="30" rows="10"
              class="form-control">{{old('introduction')}}</textarea>
          </div>

          <div class="form-group text-center">
            <input type="submit" value="submit" class="btn btn-success" />
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection