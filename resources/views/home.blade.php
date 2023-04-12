@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
         
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <h2>Loan Status Request Dashboard</h2>

                   <div class="dashboard-flex d-flex justify-content-evenly">
                        <span class="dashboard-card text-light bg-success">
                            <span class="value" >{{ $requests_count["valid_with_loan"] ?? 0 }}</span>
                            <div>Valid Requests</div>
                        </span>
                        <span class="dashboard-card text-light bg-warning">
                            <span class="value" >{{ $requests_count["valid_with_loan"] ?? 0 }}</span>
                            <div>Valid Requests with no loans</div>
                        </span>
                        <span class="dashboard-card text-light bg-danger">
                            <div class="value" >{{ $requests_count["invalid" ?? 0] }}</div>
                            <div class="label">Invalid</div>
                        </span>
                   </div>
                </div>
         
        </div>
    </div>
</div>
@endsection
