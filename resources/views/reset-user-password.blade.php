{{-- @if(session('UserType') == 'SuperAdmin')

    @extends('layouts.admin-layout')

    @section('admin-content')

@else --}}

@extends('layouts.main-layout')

@section('content')




<center>
    @if(isset($message))
        <div class="alert alert-danger" id="error-container" style="padding-top: 5vh;">
            <span><strong style="color: {{ $color }};">{{ $code }}</strong> <strong> {{ $message }}</strong></span>
        </div>
    @endif 
    <form action="/reset-user-password" class="user-reset-form" method="post" style="height: 85vh;">
        {{ csrf_field() }}

        <h2 style="padding-top: 5vh;">Reset User Password</h2>
        <table style="padding-top: 30vh;">
            <tr>
                <td>Username:</td>
                <td>&nbsp;</td>
                <td><input type="texts" id="client_username" required style="height: 40px; width: 200px; box-sizing: border-box; font-size: 18px; padding-left: 5px" name="client_username"></td>
                <td>&nbsp;</td>
                <td><button id="reset-user-button" style="height: 40px; width: 175px; box-sizing: border-box; font-size: 18px;">Reset Password</button></td>
            </tr>
        </table>
    </form>
</center>
@endsection