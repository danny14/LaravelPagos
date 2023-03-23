@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Make a Payment</div>

                <div class="card-body">
                    <form action="{{ route('pay') }}" method="POST" id="paymentForm">
                        @csrf

                        <div class="row">
                            <div class="col-auto">
                                <label>How much you want to pay </label>
                                <input type="number" name="value" id="value" min="5" step="0.01" class="form-control" value="{{ mt_rand(500,100000) / 100}}" required>
                                <small class="form-text text-muted"> Use value with up two decimal position, using dot "." </small>
                            </div>
                            <div class="col-auto">
                                <label for="" class="">Currency:</label>

                                <select class="custom-select form-control" name="currency" id="currency" required>
                                    @foreach ($currencies as $currency )
                                    <option value="{{$currency->iso}}">{{Str::upper($currency->iso )}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="">Select the desired payment platform:</label>
                            <div class="form-group" id="toggler">
                                <div class="btn-group btn-group-toggle" data-bs-toggle="buttons">
                                    @foreach ($paymentPlatforms as $paymentPlatform )
                                    <label class="btn btn-outline-secondary rounded m-2 p-1" data-bs-toggle="collapse" data-bs-target="#{{ $paymentPlatform->name }}Collapse" aria-expanded="false" aria-controls="{{$paymentPlatform->name}}Collapse">
                                        <input type="radio" name="payment_platform" id="" value="{{ $paymentPlatform->id }}" required>
                                        <img src=" {{ asset($paymentPlatform->image) }}" alt="" class="img-thumbnail">
                                    </label>
                                    @endforeach
                                </div>
                                @foreach ($paymentPlatforms as $paymentPlatform )
                                <div id="{{$paymentPlatform->name}}Collapse" class="collapse" data-bs-parent="#toggler">
                                    @includeIf('components.' . strtolower($paymentPlatform->name) . '-collapse')
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <p class="border-bottom border-primary rounded">
                                    @if (!optional(auth()->user())->hasActiveSubscription())
                                    Would you like a discount every time?
                                    <a href="{{ route('subscribe.show') }}">Subscribe</a>
                                    @else
                                    You get a <span class="font-weight-bold">10% off </span>as part of your subscription (will be applied in the checkout)
                                    @endif
                                </p>
                            </div>
                        </div>


                        <div class="text-center mt-3">
                            <button type="submit" id="payButton" class="btn btn-primary btn-lg">Pay</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection