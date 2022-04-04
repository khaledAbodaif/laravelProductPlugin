<?php


namespace Khaleds\LaravelProduct\Libraries;


use Illuminate\Support\Facades\Log;

class MediaLibrary
{



    //try to add interface with functions and move try catch to single function

    public static  function UploadImage($folder)
    {
        $returnedMessage=['status'=>true,'message'=>'','data'=>''];
        if (request()->hasFile('image')) {
            $request=request()->file('image');
            try{
                $imageName = time().'_'.$request->getClientOriginalName();
                $request->move(public_path($folder), $imageName);
                $returnedMessage['data']=$folder.'/'.$imageName;
            }catch(\Exception $e){
                $returnedMessage['status']=false;
                $returnedMessage['message']=$e->getMessage();
            }

            return $returnedMessage;
        }
        else {
            return $returnedMessage;
        }
    }
    public static  function UploadImages($folder)
    {
        $returnedMessage=['status'=>true,'message'=>'','data'=>''];

        if (request()->hasFile('images') ) {
            $request=request()->file('images');
            $images=[];

            try{
                foreach ($request as $image){
                     $imageName = time().'_'.$image->getClientOriginalName();
                     $image->move(public_path($folder), $imageName);
                     $images[]=$folder.'/'.$imageName;
                }
                $returnedMessage['data']=$images;

            }catch(\Exception $e){
                $returnedMessage['status']=false;
                $returnedMessage['message']=$e->getMessage();
            }

            return $returnedMessage;

        }
        else {
            return $returnedMessage;
        }
    }


    public static  function UpdateImage($folder,$url)
    {
        $returnedMessage=['status'=>true,'message'=>'','data'=>''];

        if (request()->hasFile('image')) {
            $request=request()->file('image');
            try{
                $imageName = time().'_'.$request->getClientOriginalName();
                $request->move(public_path($folder), $imageName);
                $returnedMessage['data']=$folder.'/'.$imageName;
                self::DeleteImage($url);
            }catch(\Exception $e){
                $returnedMessage['status']=false;
                $returnedMessage['message']=$e->getMessage();
            }

            return $returnedMessage;
        }
        else {
            return $returnedMessage;
        }
    }
    public static  function DeleteImage($url)
    {
        @unlink($url);
        return true;

    }
    public static  function DeleteImages($urls)
    {
        if (!empty($urls))
            foreach ($urls as $url){
                @unlink($url->image);

            }
        return true;

    }




}
