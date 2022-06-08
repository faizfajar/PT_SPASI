{{-- {{ $security }} --}}
@if(session('success'))
<div>
    <strong>{{ __('Success ') }}</strong>{{ session('success') }}
</div>
@endif
@if(session('error'))
<div>
    <strong>{{ __('error ') }}</strong>{{ session('error') }}
</div>
@endif

<h1>Login User</h1>
<form action="{{ route('login.attempt') }}" method="post">
@method('POST') 
@csrf

  <label for="username">Username</label>
  <br>
  <input type="text" name="username">
  <br>
  <br>
  <label for="password">Password</label>
  <br>
  <input type="password" name="password">
  <br>
  <br>
  

  <input type="text" name="security_text" value="{{$security}}" readonly>
  <br>
  <input type="text" name="security">
  <span> <<< Masukan Kode Verify Seperti diatas</span> 
  

  <br>
  <br>
  <button type="submit">submit</button>
</form>