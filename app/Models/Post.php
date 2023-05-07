<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $with = ['user', 'category'];

    // fungsi pencarian
    public function scopeFilter($query, array $filters){
        // Pencarian data seharusnya dikerjakan oleh model bukan controller 
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('title', 'like', '%' . $search . "%")
            ->orWhere('excerpt', 'like', '%' . $search . "%");
        });

        $query->when($filters['category'] ?? false, function($query, $category){
            // Melakukan Join Table Category
            // Akan cari postingan yang sesuai dengan kriteria yang dicari tapi dia juga merupakan bagian dari category
            // menggunakan wherehas(relationship category(), yang menjalankan fungsi dimana fungsi itu melanjutkan querynya) use category memanggil $category diatas, karena jika dimasukkan langsung ke dalam function akan beda lagi $categorynya
            return $query->whereHas('category', function($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        $query->when($filters['authors'] ?? false, function($query, $user){
            return $query->whereHas('user', function($query) use ($user) {
                $query->where('username', $user);
            });
        });
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
