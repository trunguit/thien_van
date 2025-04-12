<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public ?string $site_name = 'Thiên Văn Group';
    public ?string $phone1 = null;
    public ?string $phone2 = null;
    public ?string $address = null;
    public ?string $email1= null;
    public ?string $email2= null;
    public ?string $facebook= null;
    public ?string $shoppe= null;
    public ?string $logo= null;
    public ?string $favicon= null;
    public ?string $meta_title= null;
    public ?string $meta_description= null;
    public ?string $introduction= null;
    public ?string $copyright= null;

    public static function group(): string
    {
        return 'general'; 
    }
}