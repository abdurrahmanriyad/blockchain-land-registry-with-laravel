@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">8</h5>
                    <p class="card-text">Total registered users</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">8</h5>
                    <p class="card-text">Square feet lands</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">10</h5>
                    <p class="card-text">Total townships</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">10</h5>
                    <p class="card-text">Total townships</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5" id="recentTransactions">
        <div class="col-md-12">
            <div class="text-left">
                <h3 class="my-4 text-left">Recent registrations</h3>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/truffle-contract.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('js/contract.js') }}"></script>
@endpush