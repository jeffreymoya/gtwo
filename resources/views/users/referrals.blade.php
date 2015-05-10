@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Referrals</h1>
    </div>


    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        @if(!Auth::user()->hasDiscount())
                            <th>Commission ({{Config::get('app.currency')}})</th>
                            <th>iexp4u</th>
                        @endif
                    </tr>
                </thead>

                <tbody>
                {{--*/ $total = 0; /*--}}
                @foreach($referrals as $referral)
                <tr>
                    <td>{{$referral->referral->user_id}}</td>
                    <td>{{ucfirst($referral->referral->first_name)}} {{ucfirst($referral->referral->last_name)}}</td>
                    @if(!Auth::user()->hasDiscount())
                        <td>{{$referral->referral->getCommission()}}</td>
                        <td>{{$referral->referral->hasDiscount() ? 'Yes' : 'No'}}</td>
                        {{--*/ $total = $total + $referral->referral->getCommission(); /*--}}
                    @endif
                </tr>

                @endforeach

                </tbody>
            </table>
            @if(!Auth::user()->hasDiscount())
                <h3>Total Commissions: <strong>{{$total}}</strong> {{Config::get('app.currency')}}</h3>
            @endif
        </div>
    </div>


@endsection