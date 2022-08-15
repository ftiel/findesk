{{-- @if(session('UserType') == 'SuperAdmin')

    @extends('layouts.admin-layout')

    @section('admin-content')

@else --}}

    @extends('layouts.main-layout')

    @section('content')



<div class="password-container">
    @if(isset($message))
        <div class="alert alert-danger" id="error-container">
            <span><strong>{{ $message }}</strong> <strong>. Password </strong> changed successfully.<strong><a href="javascript:void(0)" id="alert-dismiss" onclick="closeError()">&times;</a></strong></span>
        </div>
    @endif 
    <center>
        <form action="/change-password" class="pass-reset-form" method="post">
            {{ csrf_field() }}
            <br><br><br>
            <table>
                <tr>
                    <td>Current Password</td>
                    <td><input type="password" id="current_password" onkeyup="passwordMatch(this)"></td>
                    <td id="current_pass_reminder" class="indent-left"></td>
                </tr>
                <tr>
                    <td>New Password</td>
                    <td><input type="password" class="new-pass" id="new_password" name="new_password" onkeyup="newPasswordMatch(this)"></td>
                    <td class="indent-left"><i class="pw-check"></i> <span class="pw-reminder" id="new_password_text"></span></td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td><input type="password" class="new-pass" id="confirm_password" name="confirm_password" onkeyup="newPasswordMatch(this)"></td>
                    <td class="indent-left"><i class="pw-check"></i> <span class="pw-reminder" id="confirm_password_text"></span></td>
                </tr>
            </table>
            <button id="reset-password" disabled>Change Password</button>
        </form>
    </center>
</div>
@endsection