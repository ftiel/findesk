<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Ticket extends Model
{
    use HasFactory;
    protected $appends = ['CreatedAtDiffed', 'TicketAcceptDate', 'PassOrFail', 'ServicePriority', 'ServiceDuration'];

    //GET CREATED DATE -> (SECONDS, MINUTES, HOURS, DAYS) AGO
    public function getCreatedAtDiffedAttribute () {
        return $this->attributes['CreatedAtDiffed'] = $this->created_at->diffForHumans();
    }

    public function TicketTrailDate () {
        return $this->hasMany('App\Models\Trail')->select(1);
    }


    //GET DATE WHEN TICKET IS ACCEPTED
    public function getTicketAcceptDateAttribute () {
        if($this->AssignedTo != NULL) {
            $TryThisValue = $this->trails->where('StatusUpdate', 'Open')->first()->created_at;
        } else {
            $TryThisValue = null;
        }
        return $this->attributes['TicketAcceptDate'] = $TryThisValue;
    }


    //IF TICKET IS CLOSED, GET DATE DIFFERENCE BETWEEN ACCEPT DATE AND CLOSE DATE
    public function getPassOrFailAttribute () {
        // $TryCompute = $this->updated_at;
        if($this->Status == 'Resolved') {
            $TimeDiff = $this->TicketAcceptDate->diffInHours($this->updated_at);
            if($TimeDiff <= $this->priority->ServiceHours) {
                $SLA = 'Passed';
            } else {
                $SLA = 'Failed';
            }
        } else if($this->Status == 'Unassigned') {
            $SLA = 'Unnasigned.';
        } else {
            $SLA = 'Failed. Others.';
        }
        return $this->attributes['OpenCloseDiff'] = $SLA;
    }

    public function getServicePriorityAttribute () {
        return $this->priority->PriorityDescription;
    }

    public function getServiceDurationAttribute () {
        if($this->isClosed == 'Closed') {
            return $this->TicketAcceptDate->diffInHours($this->updated_at);
        } else if($this->Status == 'Unassigned') {
            return $this->created_at->diffInHours(Carbon::now());
        } else {
            return $this->TicketAcceptDate->diffInHours(Carbon::now());
        }
    }

    // public function getPassOrFailAttribute () {
    //     // $TryCompute = $this->updated_at;
    //     if($this->Status == 'Resolved') {
    //         $TimeDiff = $this->TicketAcceptDate->diffInHours($this->updated_at);
    //         if($TimeDiff <= $this->priority->ServiceHours) {
    //             $SLA = 'Passed';
    //         } else {
    //             $SLA = 'Failed';
    //         }
    //     } else if($this->Status == 'Unassigned') {
    //         $SLA = 'Unnasigned.';
    //     } else {
    //         $SLA = 'Failed. Others.';
    //     }
    //     return $this->attributes['OpenCloseDiff'] = $SLA;
    // }

    public function priority() {
        return $this->hasOne(Priority::class, 'id', 'Priority');
    }

    public function category() {
        return $this->hasOne(Category::class, 'id', 'Category');
    }

    public function sub_category() {
        return $this->hasOne(SubCategory::class, 'id', 'SubCategory');
    }

    public function trails() {
        return $this->hasMany(Trail::class, 'TicketID', 'TicketID')->select('created_at','StatusUpdate');
    }

    protected $hidden = [
        'priority',
        'trails'
        // 'remember_token',
    ];
}



// $years = floor($diff / (365*60*60*24));
// $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
// $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
// // $try = $this->trails->where('StatusUpdate', 'Open')->first();