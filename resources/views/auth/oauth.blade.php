@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="mb-4 mt-3" style="display: flex; justify-content: space-between;">
                  <h3>OAuth Clients and Token</h3>
                  <div style="text-align: right;">
                    <button class="btn btn-danger">Delete User and all Data</button>
                  </div>
                </div>
                <passport-clients class="mb-3"></passport-clients>
                <passport-authorized-clients class="mb-3"></passport-authorized-clients>
                <passport-personal-access-tokens class="mb-3"></passport-personal-access-tokens>
            </div>

        </div>
    </div>
@endsection
