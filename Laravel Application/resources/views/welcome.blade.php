@extends('layouts.app')

@section('content')
    <div class="container" id="allTransactions">
        <div class="row">
            <div class="col-md-12">
                <div class="text-left">
                    <h3 class="my-4 text-left">Transactions</h3>
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
