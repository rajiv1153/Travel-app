<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Travel 24 | Admin Login</title>
    <link rel="stylesheet" href="{{asset('css/admin/main.min.css')}}" />
  </head>
  <body>
    <div
      class="bg-gradient-primary"
      style="
        width: 100vw;
        min-height: 100vh;
        max-height: 100vh;
        display: grid;
        place-content: center;
      "
    >
      <form
  action="{{route('admin.login')}}"
        method="POST"
        class="bg-white p-4 mb-5"
        style="width: 300px"
      >
      @csrf

        <h4 class="text-center mb-4">Travel 24 | Login</h4>
      @include('message.message')
        <div class="form-group mt-4">
          <input
            type="text"
            name="username"
            id="username"
            class="form-control"
            placeholder="Username"
            required
          />
        </div>
        <div class="form-group">
          <input
            type="password"
            name="password"
            id="password"
            class="form-control"
            placeholder="Password"
            required
          />
        </div>
        <div class="form-group">
          <input
            type="submit"
            value="Login"
            class="form-control bg-primary text-white"
          />
        </div>
      </form>
    </div>
  </body>
</html>
