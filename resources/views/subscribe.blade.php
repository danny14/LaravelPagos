@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Subscribe</div>

                <div class="card-body">
                    <form action="{{ route('subscribe.store') }}" method="POST" id="paymentForm">
                        @csrf

                        <div class="row mt-3">
                            <label for="">Select your plan:</label>
                            <div class="form-group">
                                <div class="btn-group btn-group-toggle" data-bs-toggle="buttons">
                                    @foreach ($plans as $plan )
                                    <label class="btn btn-outline-info rounded m-2 p-1">
                                        <input type="radio" name="plan" id="" value="{{ $plan->slug }}" required>
                                        <p class="h2 fw-bold text-capitalize">
                                            {{ $plan->slug }}
                                        </p>
                                        <p class="display-4 text-capitalize">
                                            {{ $plan->visual_price }}
                                        </p>
                                    </label>
                                    @endforeach
                                </div>

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



                        <div class="text-center mt-3">
                            <button type="submit" id="payButton" class="btn btn-primary btn-lg">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection