@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <section class="my-5">
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <div class="row">
                                <div class="col text-center">
                                    <h1>Register a land</h1>
                                    <p class="text-h3">Each registered land will be added to blockchain network</p>
                                </div>
                            </div>

                            <form onSubmit="App.registerLand(); return false">
                                <div class="row align-items-center">
                                    <div class="col mt-4">
                                        <select class="form-control" id="townshipcode" name="townshipId" required>
                                            @foreach($townShips as $townShip)
                                                <option value="{{ $townShip->id }}">{{ $townShip->code }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col mt-4">
                                        <input type="number" name="owner_nid" class="form-control" id="exampleFormControlInput1"
                                               placeholder="Owner NID number" required>
                                    </div>
                                </div>
                                {{--<div class="row align-items-center">--}}
                                    {{--<div class="col mt-4">--}}
                                        {{--<label>Owner image</label>--}}
                                        {{--<input type="file" name="owner_img" class="form-control" id="exampleFormControlInput1" required>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <div class="row align-items-center mt-4">
                                    <div class="col">
                                        <input type="text" name="owner_name" class="form-control" id="ownerName" placeholder="Owner Name" required>
                                    </div>
                                </div>
                                <div class="row align-items-center mt-4">
                                    <div class="col">
                                        <input type="text" name="owner_father_name" class="form-control" id="ownerFatherName"
                                               placeholder="Owner Father Name" required>
                                    </div>
                                </div>
                                <div class="row align-items-center mt-4">
                                    <div class="col">
                                        <input type="text" name="owner_mother_name" class="form-control" id="ownerMotherName"
                                               placeholder="Owner Mother Name">
                                    </div>
                                </div>
                                <div class="row align-items-center mt-4">
                                    <div class="col">
                                        <textarea name="owner_address" class="form-control" id="ownerAddress" rows="3" placeholder="Address"></textarea>
                                    </div>
                                </div>
                                <div class="row justify-content-start">
                                    <div class="col">
                                        <button class="btn btn-primary mt-4">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
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
