<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;

class track extends Model
{
    use HasFactory;
    protected $fillable=['name', 'path',
];
 public function getUrl()
    {
        return Storage::url($this->path);
    }

   
}