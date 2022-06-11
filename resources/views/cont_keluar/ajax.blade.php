@foreach($ajax_container as $d)

<div class="form-group">
    <label>Customer</label>
    <div class="input-group mb-3">
        <input type="text" class="form-control" id="customer" value="{{ $d->customer }}" readonly>
    </div>
</div>

<div class="form-group">
    <label>Asal</label>
    <div class="input-group mb-3">
        <input type="text" class="form-control" id="asal" value="{{ $d->asal }}" readonly>
    </div>
</div>

<div class="form-group">
    <label>Consignee</label>
    <div class="input-group mb-3">
        <input type="text" class="form-control" id="consigne" value="{{ $d->consigne }}" readonly>
    </div>
</div>


<div class="form-group">
    <label>Customer</label>
    <div class="input-group mb-3">
        <input type="text" class="form-control" id="customer" value="{{ $d->customer }}" readonly>
    </div>
</div>

<div class="form-group">
    <label>Status</label>
    <div class="input-group mb-3">
        <input type="text" class="form-control" id="status" value="{{ $d->status }}" readonly>
    </div>
</div>

<div class="form-group">
    <label>Type</label>
    <div class="input-group mb-3">
        <input type="text" class="form-control" id="type" value="{{ $d->type }}" readonly>
    </div>
</div>

@endforeach