<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
class Category extends Model
{
    use NodeTrait;
    use HasFactory;
    protected $guarded = [];
    protected static function boot()
    {
        parent::boot();

        static::deleting(function($category) {
            $category->products()->delete();            
            $category->descendants()->each(function($descendant) {
                $descendant->delete();
            });
        });

      
    }
    public function products()
    {
        $id = $this->id;
        $category = Category::find($id);
        
        if (!$category) {
            return $this->hasMany(Product::class, 'category_id', 'id')->whereNull('id');
        }
        
        $ids = $category->descendantsAndSelf($id)->pluck('id');
        
        return $this->hasMany(Product::class, 'category_id', 'id')
                   ->orWhereIn('products.category_id', $ids)
                   ->orderBy('id', 'asc')->paginate(20);
    }

    public function productsHome(){
        return $this->hasMany(Product::class, 'category_id', 'id')->take(12)->orderBy('id','DESC');
    }
    public function getParentName(){
        $category = Category::where('id',$this->parent_id)->first();
        if($category->name == 'root'){
            return '';
        }else{
            return $category['name'];
        }
        
    }
    public function getParentURL(){
        $category = Category::where('id',$this->parent_id)->first();
        if($category){
            return route('category',['alias'=>$category->alias]);
        }
        
    }
}
