<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
#[Fillable(['name','last_name','email','phone','status','timestamps','registered_by'])]
#[Hidden(['status','registered_by'])]

class Attendee extends Model
{
    use HasFactory;
    protected $table = 'attendees';
    protected $primaryKey = 'id';

    public function registration(): HasMany{
        return $this->hasMany(Registration::class, 'attendee_id');
    }

}
