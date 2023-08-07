@error('image')
<div class="text-center mb-4s" style="color: red">{{$message}}</div>

@enderror
@if(session()->has('success'))
<div class="text-center mb-4" style="color: green">{{session()->get('success')}}</div>
@endif
@if(session()->has('error'))
<div class="text-center mb-4" style="color: red">{{session()->get('error')}}</div>
@endif
