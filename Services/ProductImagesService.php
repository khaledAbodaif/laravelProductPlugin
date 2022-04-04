<?php


namespace Khaleds\LaravelProduct\Services;


use Illuminate\Support\Facades\Log;
use Khaleds\LaravelProduct\Http\Requests\ProductImages\StoreRequest;
use Khaleds\LaravelProduct\Libraries\ApiResponseLibrary;
use Khaleds\LaravelProduct\Libraries\MediaLibrary;
use Khaleds\LaravelProduct\Repositories\ProductImagesRepository;

class ProductImagesService
{


    private $images;

    public function __construct(ProductImagesRepository $images)
    {
        $this->images=$images;
    }



    public function store($product_id){


        $data=MediaLibrary::UploadImages('Products');

        if (!$data['status'])
            return $data;

        $inputs=[];

        if (!empty($data['data'])){

            foreach ($data['data'] as $image){
                $inputs[]=['product_id'=>$product_id,'image'=>$image];
            }

          $data= $this->images->insert($inputs);
        }

      return $data;

    }

}
