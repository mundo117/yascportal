<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientModel extends Model
{
    protected $table = 'client';
    protected $primaryKey = 'id_client';
    public $timestamps=true;
   protected $fillable=[
    	'client',
    	'cellphone'
    ];

    protected $guarded =[

    ];
}
