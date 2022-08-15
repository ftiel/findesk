@extends('layouts.main-layout')

@section('content')
    <form action="">
        {{ csrf_field() }}

        <label for="">Ticket Type</label><br>
        <input type="radio" name="request-type" id="" value="Request">Request
        <input type="radio" name="request-type" id="" value="Incident">Incident
        
        <br><br>

        <label for="">Ticket Category</label><br>
        <select name="" id="">
            <option value="">Option 1</option>
            <option value="">Option 2</option>
            <option value="">Option 3</option>
        </select>

        <br><br>

        <label for="">Requestor Department</label><br>
        <input type="text" name="" id="" readonly value="IT Department">

        <br><br>

        <label for="">Ticket Description</label><br>
        <select name="" id="">
            <option value="">Option 1</option>
            <option value="">Option 2</option>
            <option value="">Option 3</option>
        </select>

        <br><br>

        <label for="">Attachment</label><br>
        <input type="file" name="" id="">

        <br><br>

        <label for="">Additional Details</label><br>
        <textarea name="" id="" cols="30" rows="10"></textarea>

        <br><br>

        <a href="/"><button>Cancel</button></a>
        <button>Submit</button>
    </form>
@endsection