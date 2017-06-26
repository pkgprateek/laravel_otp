@extends('layout.blank')

@section('title', 'Verify OTP')

@push('stylesheets')
    <style type="text/css">
        .styled {
            position: absolute;
            margin: auto;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            width: 20em;
            height: 11em;
            /*background-color: #ddd;*/
            border-radius: 3px;
            text-align: center;
        }

        .prefix {
            padding-top: 8px;
        }
    </style>
@endpush

@section('main_container')
    <div class="row maindiv">
        <form class="col s12" id="verifyform">
            {{csrf_field()}}
            <div class="row styled">
                <h2></h2>
                <div class="input-field col s12">
                    <i class="material-icons prefix">dialpad</i>
                    <input id="otpfield" type="text" class="validate" data-length="6" required>
                    <label for="opt">Enter OTP</label>
                </div>
                <button class="btn waves-effect waves-light" id="verifybutton" type="submit">Verify
                    <i class="material-icons right">verified_user</i>
                </button>
            </div>
        </form>
    </div>
@endsection