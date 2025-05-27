<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FamilyData extends Model
{
    use HasFactory;
    protected $primaryKey = 'family_data_id';
    public function personaldata(): BelongsTo
    {
        return $this->belongsTo(PersonalData::class, 'fk_personal_data_id', 'personal_data_id');
    }
}
