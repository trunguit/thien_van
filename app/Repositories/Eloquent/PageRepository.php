<?php
namespace App\Repositories\Eloquent;

use App\Models\Page;

use App\Repositories\Contracts\PageRepositoryInterface;
use Illuminate\Support\Str;
class PageRepository extends BaseRepository implements PageRepositoryInterface
{
    public function __construct(Page $model) {
        parent::__construct($model);
    }

    public function all()
    {
        $blogs =  $this->model->orderBy('id','DESC')
                    ->paginate(6);   
        return $blogs;
    }
    
    public function getPagesHome($limit)
    {
        $blogs =  $this->model->where('status','active')
                    ->orderBy('id','DESC')
                    ->take($limit)
                    ->get();   
        return $blogs;
    }

    public function getPageByAlias($alias)
    {
        return $this->model->where('alias', $alias)->firstOrFail();
    }
   
   
    
}