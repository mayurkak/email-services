<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateList extends Model
{
    use HasFactory;
    protected $table = 'template_list';
    protected $fillable = [
        
        'form_name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function TemplateForm()
    {
        return $this->belongsToMany(TemplateForm::class,'form_id','id');
    }
}
