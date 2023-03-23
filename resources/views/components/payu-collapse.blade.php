<label class="mt-3">Card details:</label>

<div class="form-group row">
    <div class="col-4">
        <input class="form-control" type="text" name="payu_card" id="card" placeholder="Card Number">
    </div>

    <div class="col-2">
        <input class="form-control" type="text" name="payu_cvc" id="cvc" placeholder="CVC">
    </div>

    <div class="col-2">
        <input class="form-control" type="text" name="payu_month" id="month" placeholder="MM">
    </div>

    <div class="col-2">
        <input class="form-control" type="text" name="payu_year" id="year" placeholder="YY">
    </div>

    <div class="col-2">
        <select class="form-select" name="payu_network" id="network">
            <option selected>Select</option>
            <option value="visa">VISA</option>
            <option value="amex">AMEX</option>
            <option value="diners">DINERS</option>
            <option value="mastercard">MASTERCARD</option>
        </select>
    </div>
</div>



<div class="form-group row mt-3">
    <div class="col-5">
        <input class="form-control" type="text" name="payu_name" id="name" placeholder="Your Name">
    </div>
    <div class="col-5">
        <input class="form-control" type="email" name="payu_email" id="email" placeholder="email@example.com">
    </div>
</div>


<div class="form-group form-row">
    <div class="col">
        <small class="form-text text-mute" role="alert">Your payment will be converted to {{ strtoupper(config('services.payu.base_currency')) }}</small>
    </div>
</div>