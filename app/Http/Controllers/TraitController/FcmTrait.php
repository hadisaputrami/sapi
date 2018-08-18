<?php
namespace App\Http\Controllers\TraitController;

use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;
use App\User;
use Illuminate\Support\Facades\Redirect;
/**
 * Created by PhpStorm.
 * User: Eko
 * Date: 9/12/2017
 * Time: 9:18 PM
 */
trait FcmTrait
{
    public function sendNotification($token,$title,$body,$data_notifikasi){
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);
        $optionBuilder->setPriority('high');

        $notificationBuilder = new PayloadNotificationBuilder($title);
        $notificationBuilder->setBody($body)
            ->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData($data_notifikasi);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);

        //return Array - you must remove all this tokens in your database
        if(count($downstreamResponse->tokensToDelete())>0){
            try{
                DB::beginTransaction();
                foreach ($downstreamResponse->tokensToDelete() as $item){
                    User::updateOrCreate(
                        ['token_device' => $item],
                        ['token_device' => '']
                    );
                }
                DB::commit();
            }catch (Exception $e){
                DB::rollback();
            }
        }

        //return Array (key : oldToken, value : new token - you must change the token in your database )
        if(count($downstreamResponse->tokensToModify())>0){
            try{
                DB::beginTransaction();
                foreach ($downstreamResponse->tokensToModify() as $key => $value){
                    User::updateOrCreate(
                        ['token_device' => $key],
                        ['token_device' => $value]
                    );
                }
                DB::commit();
            }catch (Exception $e){
                DB::rollback();
            }
        }

        return 'Pesan sukses terkirim='.$downstreamResponse->numberSuccess().'\n'.
        'Pesan gagal terkirim='.$downstreamResponse->numberFailure().'\n'.
        'Pesan modifikasi='.$downstreamResponse->numberModification();
//return Array - you should try to resend the message to the tokens in the array
        //$downstreamResponse->tokensToRetry();

        /*return Redirect::back();*/
// return Array (key:token, value:errror) - in production you should remove from your database the tokens
    }
}