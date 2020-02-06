@extends('layouts.template', ['class' => 'bg-default'])

@section('content')
<div id="app">
    <input type="hidden" id="params" data-id="{{ Auth::user()->id }}">
    <div class="header py-7 py-lg-8">
        <section class="section">
            <div class="container">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Informasi Undangan</h3>
                            </div>
                        </div>
                    </div>
                    <invitation-form></invitation-form>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection

@push('js')
<script>
    import InvitationForm from "../../../js/components/InvitationForm";
    export default {
        components: {InvitationForm}
    }
</script>
@endpush
