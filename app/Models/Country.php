<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name'];


    public $casts = [ 'name' => 'array'];


    public function scopeFilter($query, array $filters)
    {

        $query->when(
            $filters['search'] ?? false,
            function ($query, $search) {
                return $query->where(App::isLocale('ka') ? 'name->ka' : 'name->en', 'LIKE', '%' . $search . '%');
            }
        );


    }



}
