<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Posts extends Model
{
    use HasFactory;
    use Sortable;
    protected $fillable = [
        'post_title', 'post_body','is_published'
    ];
    public $sortable = ['post_title', 'created_at'];
}
