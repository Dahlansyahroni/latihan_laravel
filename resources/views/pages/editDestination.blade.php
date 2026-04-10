@extends('master')

@section('content')
<form action="/destination/{{$destination->id}}/update" method="post" class="form-floating">
    @csrf
    @method('PUT')
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Destinasi" value="{{$destination->nama}}">
        <label for="nama">Nama Destinasi</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="description" name="description" placeholder="Description"   value="{{$destination->description}}"   >
        <label for="description">Description</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="location" name="location" placeholder="Location" value="{{$destination->location}}">
        <label for="location">Location</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="working_days" name="working_days" placeholder="Working Days" value="{{$destination->working_days}}  ">
        <label for="working_days">Working Days</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="working_hours" name="working_hours" placeholder="Working Hours" value="{{$destination->working_hours}}">
        <label for="working_hours">Working Hours</label>
    </div>
    <div class="form-floating mb-3">
        <input type="number" class="form-control" id="ticket_price" name="ticket_price" placeholder="Ticket Price" value="{{$destination->ticket_price}}">
        <label for="ticket_price">Ticket Price</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection