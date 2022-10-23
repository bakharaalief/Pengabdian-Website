@extends('layouts.admin.adminApp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Auth::user()->user_level == 1)
                        Kamu Admin !
                    @elseif (Auth::user()->user_level) == 2)
                        Kamu Guru
                    @else
                        Kamu sukarelawan
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
