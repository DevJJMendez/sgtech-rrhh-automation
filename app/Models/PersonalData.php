<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PersonalData extends Model
{
    use HasFactory;
    protected $primaryKey = 'personal_data_id';
    protected $guarded = [];
    protected $casts = [
        'hiring_date' => 'date',
        'birthdate' => 'date',
        'date_of_issue' => 'date',
    ];
    public function academicInformation(): HasOne
    {
        return $this->hasOne(AcademicInformation::class, 'fk_personal_data_id', 'personal_data_id');
    }
    public function familyData(): HasMany
    {
        return $this->hasMany(FamilyData::class, 'fk_personal_data_id', 'personal_data_id');
    }
    public function healthData(): HasMany
    {
        return $this->hasMany(HealthData::class, 'fk_personal_data_id', 'personal_data_id');
    }
    public function emergencyContact(): HasMany
    {
        return $this->hasMany(EmergencyContact::class, 'fk_personal_data_id', 'personal_data_id');
    }
    public function languages(): HasMany
    {
        return $this->hasMany(Language::class, 'fk_personal_data_id', 'personal_data_id');
    }
    public function itKnowledge()
    {
        return $this->hasMany(ItKnowledge::class, 'fk_personal_data_id', 'personal_data_id');
    }
    public function specialties()
    {
        return $this->hasMany(Specialty::class, 'fk_personal_data_id', 'personal_data_id');
    }
}
