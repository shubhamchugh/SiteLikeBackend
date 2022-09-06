<?php

namespace App\Models;

use App\Casts\Json;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WhoIsRecord extends Model
{
    use HasFactory;

   protected $fillable = [
    'post_id',
    'technology_id',
    'confidence',
    'version',
    'created_at',
    'updated_at'
   ];

    protected $casts = [
        'states'      => Json::class,
        'nameServers' => Json::class,
    ];

    protected $dates = [
        'creationDate',
        'expirationDate',
        'updatedDate',
    ];

    /**
     * Get the user that owns the DnsDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function posts_relation()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }
}
