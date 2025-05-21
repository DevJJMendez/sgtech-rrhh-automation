<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollaboratorRole extends Model
{
    use HasFactory;
    protected $primaryKey = 'collaborator_role_id';
    protected $guarded = [];
}
