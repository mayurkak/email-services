<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateForm extends Model
{
    use HasFactory;
    protected $table = 'template_forms';

    protected $fillable = [
        'form_id',
        'user_id',
        'question',
        'status',
        'form_name',
        'mo_number',
        'email_Id',
        'answer',
    ];

    protected $casts = [
        'question' =>'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function TemplateList()
    {
        return $this->hasMany(TemplateList::class,'id','form_id');
    }

    
}

   

