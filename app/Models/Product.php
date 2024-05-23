<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'name_ru', 'name_sp', 'image'];

    public function getName()
    {
        $locale = app()->getLocale();
        switch ($locale) {
            case 'en':
                return $this->name;
                break;
            case 'ru':
                return $this->name_ru ?: $this->name;
                break;
            case 'sp':
                return $this->name_sp ?: $this->name;
                break;
            default:
                return $this->name;
        }      
    }
}
