<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersonalData extends Model
{
    use HasFactory;
    protected $primaryKey = 'personal_data_id';
    protected $guarded = [];
    public function academicInformation(): HasOne
    {
        return $this->hasOne(AcademicInformation::class, 'fk_personal_data_id', 'personal_data_id');
    }
    public function familyData(): HasOne
    {
        return $this->hasOne(FamilyData::class, 'fk_personal_data_id', 'personal_data_id');
    }
    public function healthData(): HasOne
    {
        return $this->hasOne(HealthData::class, 'fk_personal_data_id', 'personal_data_id');
    }
    public function emergencyContact(): HasOne
    {
        return $this->hasOne(EmergencyContact::class, 'fk_personal_data_id', 'personal_data_id');
    }
    public function languages(): HasOne
    {
        return $this->hasOne(Language::class, 'fk_personal_data_id', 'personal_data_id');
    }
    public function itKnowledge(): HasOne
    {
        return $this->hasOne(ItKnowledge::class, 'fk_personal_data_id', 'personal_data_id');
    }
    public function specialties(): HasOne
    {
        return $this->hasOne(Specialty::class, 'fk_personal_data_id', 'personal_data_id');
    }
    public function uploadedDocuments(): HasMany
    {
        return $this->hasMany(UploadedDocument::class, 'fk_personal_data_id', 'personal_data_id');
    }
    public function invitationLink(): BelongsTo
    {
        return $this->belongsTo(InvitationLink::class, 'fk_invitation_link_id');
    }
}
