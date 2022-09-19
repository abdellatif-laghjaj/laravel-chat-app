@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-white" style="font-weight: bold; font-size: 18px"><span class="text-primary">Abdel.</span> ChatX</div>

                    <div class="card-body" id="app">
                        <chat-app :user="{{ auth()->user() }}"></chat-app>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
