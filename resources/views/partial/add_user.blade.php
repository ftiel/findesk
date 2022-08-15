@extends('layouts.admin-layout')

@section('admin-content')
    <div>
        <style>
            .label {
                text-transform: uppercase !important;
                text-align: right !important;
            }
            
            #add-user-table {
                margin-bottom: 100px;
            }

            table {
                margin: 0 auto !important;
                font-size: 17px !important;
            }

            input, select {
                width: 200px !important;
                height: 30px !important;
                margin-left: 20px !important;
                align-self: center;
                width: 80%;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }
    
            .action-btn {
                margin-top: 10px !important;
                margin-left: 20px !important;
                float: right !important;
                width: 100px !important;
                padding: 5px;
            }
    
            #user-info-table {
                padding-top: 10px !important;
            }

            #user-info-table th {
                background-color: #038B63;
                color: #fff;
            }

            #user-info-table td {
                background-color: #fff;
                color: #000;
            }
            
            #user-info-table th, #user-info-table td {
                /* border: black 1px solid !important; */
                padding: 5px !important;
            }
        </style>
        <form action="/secret-create-users" method="post">
            {{ csrf_field() }}
            <table id="add-user-table">
                <thead>
                    <tr>
                        <th>Label</th>
                        <th>Values</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="label">Employee Name</td>
                        <td>
                            <input type="text" name="name" id="" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="label">Username</td>
                        <td>
                            <input type="text" name="username" id="" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="label">Password</td>
                        <td>
                            <input type="password" name="password" id="" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="label">Department</td>
                        <td>
                            <select name="DepartmentID" id="" required>
                                <option value=""></option>
                                @foreach($depts as $d)
                                    <option value="{{ $d->id }}">{{ $d->DepartmentName }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="label">User Type</td>
                        <td>
                            <select name="UserType" id="" required>
                                <option value=""></option>
                                <option value="Normal">Normal</option>
                                <option value="Admin">Admin</option>
                                <option value="SuperAdmin">Super Admin</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="reset" class="action-btn">CLEAR</button>
                        </td>
                        <td>
                            <button type="submit" class="action-btn">CREATE</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br><br><br>
            <table id="user-info-table" class="data-table cell-border">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>User Type</th>
                        <th>Department</th>
                        {{-- <th>Actions</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->UserType }}</td>
                            <td>{{ $user->department->DepartmentName }}</td>
                            {{-- <td>
                                &ThickSpace;
                                <a href="javascript:void(0)"><i class="fa-regular fa-pen-to-square"></i></a>&ThickSpace;&ThickSpace;
                                @if($user->UserType != 'SuperAdmin')
                                    <a href="javascript:void(0)"><i class="fa-regular fa-trash-can"></i></a>&ThickSpace;&ThickSpace;
                                @else
                                    <i class="fa-solid fa-ban"></i>&ThickSpace;&ThickSpace;
                                @endif
                                <a href="javascript:void(0)"><i class="fa-regular fa-envelope"></i></a>&ThickSpace;&ThickSpace;
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
    </div>
@endsection