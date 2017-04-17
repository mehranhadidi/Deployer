<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'domain',
        'doc_root',
        'repository',
        'ssl',
        'auto_deploy',
    ];

    protected $casts = [
        'auto_deploy' => 'boolean',
    ];

    /**
     * Server that host this site
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function server()
    {
        return $this->belongsTo(Server::class);
    }
}
