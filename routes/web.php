<?php

use App\Http\Controllers\ContentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;
use App\Models\Ticket;

Route::get('/testing', function (){ 
    return view('testing');
});

Route::get('/test-rep', function() {
    $a = Ticket::where('id', 20)->first();
    $aa = $a->priority;
    return $a;    
});

Route::middleware('isLoggedOut')->group(function() {
    Route::get('/login', [PageController::class, 'login']);
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/logout', [PageController::class, 'logout']);
});

Route::middleware('isLoggedIn')->group(function() {
    Route::get('/', [PageController::class, 'index']);
    Route::get('/announcements', [PageController::class, 'announcements']);
    Route::get('/new-ticket/{type}', [PageController::class, 'create_ticket']);
    Route::post('/new-ticket/{type}', [TicketController::class, 'create_ticket']);
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::get('/my-ticket/{TicketID}', [PageController::class, 'user_ticket']);
    Route::get('/change-password', [PageController::class, 'change_password']);
    Route::post('/my-ticket/{TicketID}', [NoteController::class, 'create']);

    //AJAX ROUTES
    Route::get('/ajax_sub_categories', [ContentController::class, 'ajax_sub_categories']);
    Route::get('/ajax_sub_category_details', [ContentController::class, 'ajax_sub_category_details']);
    Route::get('/ajax_priority_level', [ContentController::class, 'ajax_priority_level']);
    Route::get('/ajax_match_password', [LoginController::class, 'match_password']);
    Route::post('/change-password', [LoginController::class, 'update_password']);
    Route::get('/ajax_get_notes', [NoteController::class, 'get_notes']);
    Route::get('/ajax_get_notifications', [NotificationController::class, 'realtime_notification']);
    Route::get('/ajax_update_notif_status', [NotificationController::class, 'update_notif_status']);

    Route::middleware('isAdmin')->group(function() {
        Route::get('/administration', [PageController::class, 'administration']);
        Route::get('/reports', [PageController::class, 'reports']);
        Route::get('/tickets-list/{param}', [PageController::class, 'list_tickets']);
        Route::get('/ticket/{TicketID}', [PageController::class, 'view_ticket']);
        Route::post('/ticket/{TicketID}', [TicketController::class, 'update_ticket']);
        // Route::post('/ticket/{TicketID}/notes', [NoteController::class, 'createV2']);
        Route::get('/fetch-tickets-realtime', [TicketController::class, 'realtime_tickets']);
        Route::get('/generate_report', [ReportController::class, 'generate_report']);
        Route::get('/export_report', [ReportController::class, 'export_report']);
        Route::get('/secret-create-users', [PageController::class, 'add_user']);
        Route::post('/secret-create-users', [ContentController::class, 'add_user']);
        Route::get('/reset-user-password', [PageController::class, 'reset_user_password']);
        Route::post('/reset-user-password', [LoginController::class, 'reset_user_password']);
    });
});

Route::get('/test_report', [ReportController::class, 'test_report']);