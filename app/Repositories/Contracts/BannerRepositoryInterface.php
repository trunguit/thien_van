<?php

namespace App\Repositories\Contracts;

interface BannerRepositoryInterface extends BaseRepositoryInterface
{
    public function all();
    public function allBanners();
    public function allSliders();
   
}