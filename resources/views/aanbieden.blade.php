@extends('layouts.app')

@section('content')
<form action="{{ route('cars.offer.step1.process') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="license_plate">Kenteken: <span class="text-danger">*</span></label>
        <input type="text" id="license_plate" class="form-control" name="license_plate" placeholder="12-AB-CD">
    </div>
    <div class="form-group">
        <input type="submit" value="Volgende" class="btn btn-primary mt-2">
    </div>
</form>
@endsection