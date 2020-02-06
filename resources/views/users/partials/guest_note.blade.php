<div class="row mb-7">
    <div class="col">
        <div class="card shadow">
            <div class="card-header bg-transparent">
                <h3 class="mb-0">Ucapan temen temen kamu</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($details as $detail)
                    <div class="col-lg-3 col-md-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">{{ $detail->name }}</h5>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <div class="text-center">
                                    <p class="h5 font-weight-300">{{ __($detail->comment) }}</p>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm align-items-center">
                                    <span class="{{ $detail->response == 0 ? 'text-danger' : 'text-success' }} mr-2"><i
                                            class="fas {{ $detail->response == 0 ? 'fa-times' : 'fa-check' }}"></i> {{ $detail->response == 0 ? 'Tidak Hadir' : 'Hadir' }}</span>
                                    <span class="text-nowrap text-right">{{ $detail->created_at }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
