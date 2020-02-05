@extends('editor.app')

@section('content')
<div id="editor">
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Vendor CSS -->
        <link type="text/css" href="https://demos.creative-tim.com/argon-design-system/assets/css/argon.min.css?v=1.0.1" rel="stylesheet">
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
        <link type="text/css" href="{{ asset('argon') }}/css/custom.css" rel="stylesheet">
    </head>
    <body>
    @include('layouts.homepage.invitation_sample')
    </body>
    </html>
</div>
@endsection
