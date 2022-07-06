<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class Loan
{
    /**
     * Get loan status.
     *
     * @param  string  $status
     * @return object $obj
     */
    public function status($status)
    {
        switch ($status) {
            case 'approved':
                $status = 'Approved';
                $class = 'light-success';
                break;
            case 'pending':
                $status = 'Pending';
                $class = 'light-info';
                break;
            case 'rejected':
                $status = 'Rejected';
                $class = 'light-danger';
                break;
            default:
                $status = 'No Status';
                $class = 'light-secondary';
        }

        return (object)[
            'name'  => $status,
            'class' => $class
        ];
    }
}
