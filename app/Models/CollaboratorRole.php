<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollaboratorRole extends Model
{
    use HasFactory;
    protected $primaryKey = 'collaborator_role_id';
    protected $guarded = [];
    public function invitationLink()
    {
        return $this->hasOne(InvitationLink::class, 'fk_collaborator_role_id');
    }
}
