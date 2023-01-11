<?php

namespace App\Models;

use App\Http\Controllers\HomeController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'harga',
    ];

    public function scopeCari($query , array $data){

        $query->when( $data["keyword"] ?? false , function($query , $keyword ) {
            return $query->where("nama","like","%" . $keyword . "%");
        });

        // $query->when( $data["kategori"] ?? false, function($query , $kategori) {

        //     return $query->whereHas("kategori" , function ($query) use($kategori) {
        //         $query->where("slug",$kategori);
        //     });

        // });

        // $query->when( $data["user"] ?? false , fn ($query,$user) =>  
        //         $query->whereHas( "user", fn ($query) => 
        //         $query->where("name","like", "%" . $user . "%" )   
        //     )
        // );
        
    }

    public function getRouteKeyName(){
        return 'id';
    }

    


}
