@extends('layouts.app')

@section('content')
<div id="app">
    <div class="container-fluid bg-gradient-main">
        @include('users.partials.welcome_header')
        @if($invitation->count() > 0)
        <dashboard data="{{ json_encode($invitation) }}"
                   poster="{{ asset('argon') }}/img/brand/sample.png"
                   url="{{ url('/') }}"
                   name="{{ auth()->user()->name }}"
                   route="{{ route('templates') }}"/>
        @else
        <empty--dashboard
            name="{{ auth()->user()->name }}"
            route="{{ route('templates') }}"
        />
        @endif
    </div>
</div>
@endsection

@push('js')
<script>
    import InvitationCard from "../../js/components/InvitationCard";
    import Dashboard from "../../js/components/Dashboard";
    import EmptyDashboard from "../../js/components/Empty-Dashboard";

    export default {
        components: {EmptyDashboard, Dashboard, InvitationCard}
    }
</script>
@endpush
