@extends('layouts.main-layout')

@section('content')
    <form action="/new-ticket/{{ $type }}" class="new-ticket-form" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <ul class="form-links">
            <li class="link-items a"><a href="/"><button class="cursor bold-text" type="button"><i class="fa-solid fa-caret-left"></i> BACK</button></a> <span>NEW {{ $type == 1 ? "INCIDENT REPORT" : "SERVICE REQUEST" }}</span></li>
            <li class="link-items"><input type="file" name="fileAttach" id="fileAttach"  hidden accept="image/jpeg, image/png"></li>
            {{-- <li class="link-items b"><button id="btn-attach" class="cursor bold-text" type="button">ATTACH FILE <i class="fa-solid fa-paperclip"></i></button></li>
            <li class="link-items c"><button class="cursor bold-text" type="submit">SUBMIT <i class="fa-solid fa-right-to-bracket"></i> </button></li> --}}
        </ul>
        <input type="hidden" value="{{ $type }}" name="TicketType" id="TicketType">

        <div class="form-group" id="new-ticket-box">
            <div class="left">
                <label for="">EMPLOYEE USERNAME</label>
                <input type="text" name="ClientUsername" class="form-control" value="{{ $CurrentUser->username }}" readonly>
                <label for="">DEPARTMENT</label>
                <input type="text" name="Department" class="form-control" value="{{ $department->DepartmentName }}" readonly>
                <label for="">CATEGORY</label>
                <select name="Category" id="Category" class="form-control" required>
                    <option selected value="">Choose one</option>
                    @foreach($categories as $key => $category)
                        <option value="{{ $category->id }}">{{ $category->CategoryDescription }}</option>
                    @endforeach
                </select>
                <label for="">SUB-CATEGORY</label>
                <select name="SubCategory" id="SubCategory" class="form-control" required disabled>
                    <option selected value="">Choose one</option>
                </select>
                <label for="">SUB-CATEGORY DETAILS</label>
                <select name="SubCategoryDetails" id="SubCategoryDetails" class="form-control" required disabled>
                    <option selected value="">Choose one</option>
                </select>
            </div>
            <div class="right">
                <label for="checkOnBehalfOf">ON BEHALF OF (Optional)<input type="checkbox" name="checkOnBehalfOf" id="checkOnBehalfOf"></label> 
                <input type="text" name="onBehalfOf" id="onBehalfOf" class="form-control" value="" disabled>
                <label for="">SERVICE PRIORITY LEVEL</label>
                <input type="text" name="Priority" id="Priority" class="form-control" disabled readonly required>
                <input type="hidden" name="hiddenPriority" id="hiddenPriority" class="form-control">
                <label for="">PC NAME (Optional)<a href="#"></a></label>
                <input type="text" name="PC_IP" class="form-control">
                <label for="">TRANSACTION DATE</label>
                <input type="date" name="TransactionDate" class="form-control"  value="{{ today()->format('Y-m-d') }}" required>
                <label for="checkNeedApprover">NEED APPROVER? <input type="checkbox" name="checkNeedApprover" id="checkNeedApprover"></label>
                <select name="Approver" id="needApprover" class="form-control" disabled>
                    <option value="">Choose one</option>
                    <option value="Approver Name 1">Approver Name 1</option>
                    <option value="Approver Name 2">Approver Name 2</option>
                    <option value="Approver Name 3">Approver Name 3</option>
                </select>
            </div>
        </div>
        <div class="bottom">
            <label for="">DETAILED DESCRIPTION OF THE ISSUE</label>
            <textarea name="DetailedDescription" id="" cols="30" rows="8" required></textarea>
            <div class="buttons-wrapper">
                <button id="btn-attach" type="button">ATTACH</button>
                <img src="" alt="Screenshot will be previewed here." width="400px" id="imgPreview">
                <button type="submit">SUBMIT</button>
            </div>
        </div>
    </form>
@endsection