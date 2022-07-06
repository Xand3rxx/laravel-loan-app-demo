<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Services\Loan as LoanService;
use App\Traits\GenerateUUID;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loan extends Model
{
    use SoftDeletes, GenerateUUID, HasFactory;

    const STATUS = [
        'Approved'  => 'approved',
        'Pending'   => 'pending',
        'Rejected'  => 'rejected',
    ];

    const TYPE = [
        'Days'      => 'days',
        'Months'    => 'months',
        'Year'      => 'year',
    ];

    /**
     * Retrieve the model for a bound value.
     *
     * @param  mixed  $value
     * @param  string|null  $field
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where('uuid', $value)->firstOrFail();
    }

    /**
     * Get the status of a single loan record created.
     */
    public function status()
    {
        return (new LoanService)->status($this->status);
    }

    /**
     * Get the user who created the loan.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user who approved the loan.
     */
    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by', 'id');
    }
}
