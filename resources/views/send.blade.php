@extends('layout.blank')

@section('title', 'Send OTP')

@push('stylesheets')
    <style type="text/css">
        .styled {
            position: absolute;
            margin: auto;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            width: 24em;
            height: 10em;
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
        <form class="col s12" id="mobileform">
            {{csrf_field()}}
            <div class="row styled">
                <div class="input-field col s12">
                    <i class="material-icons prefix">phone</i>
                    <input placeholder="Enter 10 digit Mobile Number" id="mobile" data-length="10" type="text" class="validate" required>
                    <label for="mobile">Mobile</label>
                </div>
                <button class="btn waves-effect waves-light" id="sendotpbutton" type="submit">Send OTP
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </form>
    </div>
@endsection