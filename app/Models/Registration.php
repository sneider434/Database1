<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


#[Fillable(['attendee_id','event_id','registration_date','notes','timestamps','registration_by'])]
#[Hidden(['registered_by'])]
class Registration extends Model
{
    use HasFactory;
    protected $table = 'registrations';
    protected $primaryKey = 'id';

  public function attendee (): BelongsTo{
        return $this->belongsTo(Attendee::class);

    }
    public function event (): BelongsTo{
        return $this->belongsTo(Event::class);

    }
}
