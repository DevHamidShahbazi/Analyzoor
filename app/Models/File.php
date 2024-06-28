<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['fileable_id', 'fileable_type','is_private','for_download', 'file', 'alt'];

    public function scopeFiles()
    {
        return File::where('fileable_id','0')->where('fileable_type','0')->latest()->get();
    }

    public function scopePrivateFiles()
    {
        return File::where('fileable_id','0')->where('fileable_type','0')->where('is_private','1')->latest()->get();
    }

    public function fileable(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        return $this->morphTo();
    }

}
