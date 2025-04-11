<?php
namespace App\Repositories\Eloquent;

use App\Models\Blog;

use App\Repositories\Contracts\BlogRepositoryInterface;
use Illuminate\Support\Str;
class BlogRepository extends BaseRepository implements BlogRepositoryInterface
{
    public function __construct(Blog $model) {
        parent::__construct($model);
    }

    public function all()
    {
        $blogs =  $this->model->orderBy('id','DESC')
                    ->paginate(6);   
        return $blogs;
    }
    
    public function getBlogsHome($limit)
    {
        $blogs =  $this->model->where('status','active')
                    ->orderBy('id','DESC')
                    ->take($limit)
                    ->get();   
        return $blogs;
    }

    public function getBlogByAlias($alias)
    {
        return $this->model->where('alias', $alias)->firstOrFail();
    }
   
   
    
}