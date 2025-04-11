<?php
namespace App\Repositories\Eloquent;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $model) {
        parent::__construct($model);
    }

    public function all()
    {
        $sql = Category::query();
        
        //  tìm kiếm theo ngày đặt
        $sql->withDepth()
            ->having('depth', '>', 0)
            ->defaultOrder()
            ->get()
            ->toFlatTree();
        $categories = $sql->orderBy('id','DESC')
                    ->paginate(20);   
        return $categories;
    }

  
     
    public function categories()
    {
        $query = Category::select('id', 'name')->withDepth()->defaultOrder();
            
        if (isset($params['id'])) {
            $node = Category::find($params['id']);
            $query->where('_lft', '<', $node->_lft)->orWhere('_lft', '>', $node->_rgt);
        }
        
        $nodes = $query->get()->toFlatTree();
        return $nodes;
    }

    public function categoriesWithoutRoot()
    {   
        $query = Category::select('id', 'name')->withDepth()->defaultOrder();
        if (isset($params['id'])) {
            $node = Category::find($params['id']);
            $query->where('_lft', '<', $node->_lft)->orWhere('_lft', '>', $node->_rgt);
        }
        $nodes = $query->where('parent_id', '!=', null)->get()->toFlatTree();
        return $nodes;
    }

    public function move(int $id, string $type)
    {
        $node = Category::find($id);
        if ($type == 'down') $node->down();
        if ($type == 'up') $node->up();
        $result['flag'] = true;
        return response()->json($result);
    }

    public function categoriesHome(){
        $categories = Category::with('products')->withDepth()
                                ->having('depth', '>', 0)
                                ->defaultOrder()
                                ->where('status','active')
                                ->get()
                                ->toTree();
        return $categories;
    }

    public function findByAlias(string $alias){
        return Category::where('alias', $alias)->first();
    }

   
}