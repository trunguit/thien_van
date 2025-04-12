<?php
namespace App\Repositories\Eloquent;

use App\Models\Banner;
use App\Repositories\Contracts\BannerRepositoryInterface;
class BannerRepository extends BaseRepository implements BannerRepositoryInterface
{
    public function __construct(Banner $model) {
        parent::__construct($model);
    }

    public function all()
    {
        $banners =  $this->model->orderBy('id','DESC')
                    ->paginate(20);   
        return $banners;
    }

    public function allBanners()
    {
        $banners =  $this->model->where('type', 'banner')
                    ->orderBy('id','DESC')
                    ->take(3)->get();   
        return $banners;
    }
    public function allSliders()
    {
        $banners =  $this->model->where('type', 'slider')
                    ->orderBy('id','DESC')
                    ->get();   
        return $banners;
    }

}