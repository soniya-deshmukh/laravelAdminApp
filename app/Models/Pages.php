<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Pages extends Model
{
    use HasFactory;
    use Sortable;
    protected $fillable = [
        'post_title', 'post_body','is_published','meta_tag','meta_description'
    ];
    public $sortable = ['page_title', 'created_at'];
    
}
