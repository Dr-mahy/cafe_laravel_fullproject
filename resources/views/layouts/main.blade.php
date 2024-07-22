<!DOCTYPE html>
<html lang="en">
  <head>
	@include('adminincludes.head');
</head>

<body class="nav-md">
  @include('adminincludes.messages')
    @include('adminincludes.sidebar')
    @include('adminincludes.topnavigation')
    {{-- @include('adminincludes.content') --}}
    @yield('content')
    @include('adminincludes.footercontent')
    @include('adminincludes.js')
</body></html>
