<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UploadedDocument extends Model
{
    use HasFactory;
    protected $primaryKey = 'uploaded_document_id';
    protected $keyType = 'int';
    protected $guarded = [];
    public function personalData(): BelongsTo
    {
        return $this->belongsTo(PersonalData::class, 'fk_personal_data_id', 'personal_data_id');
    }
}
