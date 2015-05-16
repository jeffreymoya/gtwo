@extends('layout')

@section('content')
<div class="preview-page row margin-vertical">
    <div class="col-md-10 col-md-offset-1"> 
        <h3>Referrals</h3>
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
            <p>Total Commissions: <strong>{{$total}}</strong> {{Config::get('app.currency')}}</p>
        @endif
        </div>
    </div>


@endsection