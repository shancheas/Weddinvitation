@extends('editor.app')

@section('content')
<div id="editor">
    @if($invitation->content != null)
        {!! $invitation->content !!}
    @else
        @include('editor.themes.themes_one')
    @endif
</div>
<a href="#" class="btn-float" id="btn-save">
    <i class="fas fa-save my-float"></i>
</a>
@endsection
