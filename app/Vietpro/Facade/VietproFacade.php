<?php
    namespace App\Vietpro\Facade;
    use Illuminate\Support\Facades\Facade;
    class VietproFacade extends Facade{
        protected static function getFacadeAccessor()
        {
            return "vietpro";
        }
    }

?>