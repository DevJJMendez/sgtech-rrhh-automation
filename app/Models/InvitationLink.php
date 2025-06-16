<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvitationLink extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $guarded = [];
    public function collaboratorRole()
    {
        return $this->belongsTo(CollaboratorRole::class, 'fk_collaborator_role_id', 'collaborator_role_id');
    }
    protected $casts = ['expires_at' => 'datetime'];
}
