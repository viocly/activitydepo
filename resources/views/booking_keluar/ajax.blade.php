@foreach($ajax_container as $d)

<div class="form-group">
    <label>Ukuran</label>
    <div class="input-group mb-3">
        <input type="text" class="form-control" id="ukuran" value="{{ $d->ukuran }}" readonly>
    </div>
</div>

<div class="form-group">
    <label>Type</label>
    <div class="input-group mb-3">
        <input type="text" class="form-control" id="type" value="{{ $d->type }}" readonly>
    </div>
</div>


<div class="form-group">
    <label>Status</label>
    <div class="input-group mb-3">
        <input type="text" class="form-control" id="status" value="{{ $d->status }}" readonly>
    </div>
</div>


@endforeach