<!DOCTYPE HTML>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('description')">
    <title>{{ env('APP_NAME') }} Web Service | @yield('title')</title>
    <link rel="icon" href="//www.csun.edu/sites/default/themes/csun/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="{{ url('/css/app.css') }}"/>
    <link rel="stylesheet" href="{{ url('/css/tomorrow.css.min') }}"/>
</head>
<body>
<nav class="navbar navbar-metaphor navbar-expand-md">
  <a href="{{ url('/') }}" class="navbar-brand">
    <span class="sr-only">CSUN Logo</span>
    <span class="navbar-brand__subbrand">{{ env('APP_NAME') }}</span>
  </a>
  <button type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div id="navbarNavAltMarkup" class="collapse navbar-collapse justify-content-end">
    <div class="navbar-nav text-center d-sm-block d-md-none">
      <a class="nav-item nav-link" href="{{ url('/#introduction') }}">Introduction</a>
      <a class="nav-item nav-link" href="{{ url('/#getting-started') }}">Getting Started</a>
      <a class="nav-item nav-link" href="{{ url('/#collections') }}">Collections</a>
      <a class="nav-item nav-link" href="{{ url('/#subcollections') }}">Subcollections</a>
      <a class="nav-item nav-link" href="{{ url('/#code-samples') }}">Code Samples</a>
      <a class="nav-item nav-link" href="{{ url('/about/version-history') }}">Recent Changes</a>
    </div>
  </div>
</nav>
<div class="hero">
  <div class="text-center">
    <h1>{{ env('APP_NAME') }} Web Service</h1>
    <p>Delivering Faculty Interests &amp; Badges</p>
  </div>
</div>


<div class="container fluid">
  <div class="row">
    <div class="col-md-3 d-none d-md-block" id="sidebar">
      @include('layouts.partials.side-nav')
    </div>
    <div class="col-md-9" id="page">
      @yield('content')
    </div>
  </div>
</div>

@include('layouts.partials.csun-footer')
<script src="{!! url('js/manifest.js') !!}"></script>
<script src="{!! url('js/vendor.js') !!}"></script>
<script src="{!! url('js/app.js') !!}"></script>
<script src="{!! url('js/run_prettify.js') !!}"></script>
</body>
</html>
