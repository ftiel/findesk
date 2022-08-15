// const { default: axios } = require("axios")

$(document).ready( function() {

    $('#tab-cat-0').addClass('active').click()

    //Realtime Update of Notifications
    
    getNotifications()
    setInterval(getNotifications, 5000)

    function showNotifications() {
        
    }

    function getNotifications() {
        axios.get('/ajax_get_notifications').then(res => {
            notifications = res.data
            let unread = notifications.filter((item) => item.isSeen == 'N')
            if(unread.length > 0) {
                $('#notification-counter').text(unread.length).addClass('badge')
                $('.notification-content').html('')

                $.each(unread, function(index, val) {
                    let isSeen = ''
                    if(val.isSeen == 'Y') {
                        isSeen = 'seen'
                    } else {
                        isSeen = 'unseen'
                    }
                    $('.notification-content').append('<div class="notification-item ' + isSeen + '">' +
                        '<span class="notif-body">' + val.Remarks + ': </span>' + '<a href="/ticket/' + val.TicketID + '" class="notif-link" data-id="' + val.id +'">' + val.TicketID + '</a> <a href="#" class="notif-delete">&times;</a href="#">' +
                    '</div>')
                })
            } else {
                $('#notification-counter').text('').removeClass('badge')
                // $('.notification-content').html('')
            }
            
        })
    }

    //LIVE VIEW OF INCOMING TICKETS
    let tickets = []
    if (location.pathname == '/administration') {
        setInterval(function() {
            axios.get('/fetch-tickets-realtime').then(res => {
                tickets = res.data
                $('#ticket-view').html('<h2 style="text-align: center";>Open Tickets</h2><br>')
                $.each(tickets, function(index, val) {
    
                    let priority = ''
    
                    if (val.TicketType === 'ServiceRequest') {
                        priority = 'low'
                    } else {
                        priority = 'normal'
                    }
                    
                    let assignedTo = ''
                    if(val.AssignedTo != null) {
                        assignedTo = 'Client: ' + val.ClientUsername + ' || Assigned to: ' + val.AssignedTo
                    } else {
                        assignedTo = 'Client: ' + val.ClientUsername
                    }
                    $('#ticket-view').append('<div class="ticket-info ' + priority + '">' +
                        '<div class="ticket-id"><a href="/ticket/' + val.TicketID + '">' + val.TicketID + '</a></div>' +
                        '<div class="ticket-client"><strong> ' + assignedTo + '</strong></div>' +
                        // '<div class="ticket-client"><strong> ' + val.AssignedTo + '</strong></div>' +
                        '<div class="ticket-date"><i>'+ val.CreatedAtDiffed + '</i></div>' +
                        '<div class="ticket-details">' + val.DetailedDescription + '</div>' +
                    '</div><br>')
                })
            })
        }, 5000) // end of live view function
    }
    
    // Realtime update on Ticket Notes: 5 seconds interval
    if(location.pathname.indexOf('/my-ticket') == 0) {
        var myPath = location.pathname
        var trimPath = $.trim(myPath).substring(11)
        $(function() {
            setInterval(function() {
                axios.get('/ajax_get_notes', {
                    params: {
                        TicketID: trimPath
                    }
                }).then(res => {
                    notes = res.data
                    $('#notes-list').html('')
                    $.each(notes, function(index, val) {
                        $('#notes-list').append('<div class="note-details">'+
                            '<span class="uname"><strong>' + val.Sender + ': </strong></span>' +
                            '<span class="note-msg">' + val.Message + '</span>' +
                        '</div>')
                        $(".scroll-bottom").scrollTop($(".scroll-bottom")[0].scrollHeight)
                    })
                })
            }, 5000)
        })
    }
    
    $('#defaultOpen').click()
})

$(document).on('click', '.notif-link', function(){ 
    let id = $(this).attr('data-id')
    axios.get('/ajax_update_notif_status', {
        params: {
            id: id
        }
    }).then(res => {
        getNotifications()
    })
})

$('#btn-attach').click(function (e) {
    e.preventDefault()
    if (document.getElementById("fileAttach").files.length == 0) {
        $('#fileAttach').click()
        $('#fileAttach').change(function() {
            $('#btn-attach').html('REMOVE')
        })
    } else {
        $('#fileAttach').val('')
        if (document.getElementById("fileAttach").files.length == 0) {
            $('#btn-attach').html('ATTACH')
            $('#imgPreview').prop('src', '')
        }
    }
})


function openCategoryTab(tabName, elementID) {
    var i, tabcontent, tablinks
    tabcontent = document.getElementsByClassName("tabcontent")
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none"
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "")
    }
    document.getElementById(tabName).style.display = "block"
    $('#' + elementID).addClass(' active')
}


// DYNAMICALLY POPULATE SUB-CATEGORY DROPDOWN BASED ON CATEGORY DROPDOWN SELECTION
let sub_category = [] //array for storing result data

$('#Category').change(function() { //If category dropdown value changed, fetch subcategory according to category ID
    let cid = $(this).val()
    let rType = $('#TicketType').val()
    axios.get(`/ajax_sub_categories?CategoryID=${cid}&RequestType=${rType}`).then(res => {
        sub_category = res.data
        $('#SubCategory').prop('disabled', false)
        $('#SubCategory').empty() //Set dropdown value to empty before appending new values.
        $('#SubCategoryDetails').empty() 
        $('#SubCategoryDetails').prop('disabled', true)
        $('#Priority').prop('disabled', true)
        $('#Priority').val("")
        $('#hiddenPriority').val("")
        $('#SubCategory').append('<option value="">Choose one</>')
        $.each(sub_category, function(index, val) {
            $('#SubCategory').append(
                $('<option>', {
                    value: val.id,
                    text: val.SubCategoryDescription
                })
            ) //Change SubCategory dropdown values
        })
        $('#SubCategory').append('<option value="404">Others</>')
    })
})

$('#SubCategory').change(function() {
    let sid = $(this).val()
    let rType = $('#TicketType').val()
    axios.get(`/ajax_sub_category_details?SubCategoryID=${sid}&TicketType=${rType}`).then(res => {
        sub_category_details = res.data
        $('#SubCategoryDetails').prop('disabled', false)
        $('#SubCategoryDetails').empty() //Set dropdown value to empty before appending new values.
        $('#Priority').prop('disabled', true)
        $('#Priority').val("")
        $('#hiddenPriority').val("")
        $('#SubCategoryDetails').append('<option value="">Choose one</>')
        $.each(sub_category_details, function(index, val) {
            $('#SubCategoryDetails').append(
                $('<option>', {
                    value: val.id,
                    text: val.SubCategoryDetails
                })
            ) //Change SubCategoryDetails dropdown values
        })
        $('#SubCategoryDetails').append('<option value="404">Others</>')
    })
})

$('#SubCategoryDetails').change(function() {
    let scd = $(this).val()
    if(scd == "") {
        $('#Priority').val("")
        $('#hiddenPriority').val("")
    }
    axios.get(`/ajax_priority_level?SCDID=${scd}`).then(res => {
        sub_category_details = res.data
        $('#Priority').prop('disabled', false)
        $('#Priority').val(res.data.PriorityDescription)
        $('#hiddenPriority').val(res.data.id)
    })
})

let check = $('#checkOnBehalfOf')

check.change(function() {
    if(check.is(":checked")) {
        $('#onBehalfOf').prop('disabled', false)
    } else {
        $('#onBehalfOf').prop('disabled', true)
    }
})

let isChecked = $('#checkNeedApprover')

isChecked.change(function() {
    if(isChecked.is(":checked")) {
        $('#needApprover').prop('disabled', false)
    } else {
        $('#needApprover').prop('disabled', true)
    }
})

$('.new-pass').prop('disabled', true)

function passwordMatch(arg) {
    password = arg.value
    axios.get('/ajax_match_password', {
        params: {
            current_password: password
        }
    }).then(res => {
        if(res.data != 'true') {
            $('#current_pass_reminder').html(' Does not match current password.').css('color', 'red').prepend('<i class="fa-regular fa-circle-xmark"></i>')
            $('.new-pass').prop('disabled', true)
            $('#reset-password').prop('disabled', true)
        } else {
            $('#current_pass_reminder').html(' Current password is correct.').css('color', 'green').prepend('<i class="fa-regular fa-circle-check"></i>')
            $('.new-pass').prop('disabled', false)
        }
    })
}

function newPasswordMatch(arg) {
    newPass = $('#new_password')
    confPass = $('#confirm_password')
    newPass.append('<a href="#">TEST</>')
    if(arg.value != '') {
        if(newPass.val() == confPass.val()) {
            $('.pw-reminder').html(' Passwords match.').css('color', 'green').prepend('<i class="fa-regular fa-circle-check"></i>')
            $('#reset-password').prop('disabled', false)
        }
        else {
            $('.pw-reminder').html(' Passwords does not match').css('color', 'red').prepend('<i class="fa-regular fa-circle-xmark"></i>')
            $('#reset-password').prop('disabled', true)
        }
    } else {
        $('#' + arg.id + '_text').html(' Cannot be empty.').css('color', 'red').prepend('<i class="fa-regular fa-circle-xmark"></i>')
    }
}


if(location.pathname.indexOf('/new-ticket') == 0) {
    fileAttach.onchange = evt => {
        const [file] = fileAttach.files
        if (file) {
            imgPreview.src = URL.createObjectURL(file)
        }
    }
}

