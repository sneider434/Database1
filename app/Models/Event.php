<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
#[Fillable(['name', 'description','start_date','location','status','timestamps','registered_by'])]
#[Hidden(['status','registered_by'])]

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $primaryKey = 'id';

    public function registration(): HasMany{
        return $this->hasMany(Registration::class, 'event_id');
    }

}

