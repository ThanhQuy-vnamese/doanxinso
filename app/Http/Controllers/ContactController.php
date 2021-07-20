<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\tabbinhluan;
use Alert;
use Mail;

class ContactController extends Controller
{
    public function contact(Request $rq)
    {
        $meta_desc = "More than just great coffee. Explore the menu, sign up for 1998 Coffee® Rewards, manage your gift card and more.";
        $meta_keywords = "contactcoffee1998";
        $meta_title = "1998 Coffee-contact";
        $url_canonical = $rq->url();
        return view('Frontend.Contact.contact',['meta_desc'=>$meta_desc,'meta_keywords'=>$meta_keywords,'meta_title'=>$meta_title,'url_canonical'=>$url_canonical]);
    }

    public function contactpost(Request $rq)
    {
        $dataEmail=[
            'name' => $rq->ten,
            'email' => $rq->email,
            'content' => $rq->tinnhan,
        ];
        Mail::send('Frontend.Mailcontact.mailcontact',$dataEmail, function($mail) use($dataEmail,$rq){
            //gui Tu
            $mail->from('noreply@kienbien.com');
            // Den
            $mail->to('ngochannel1410@gmail.com');
            // CC (Thông báo đến đâu)

            $mail->subject("Phản hồi khách hàng:",$rq->chude);
        });

        /*$to_name = "Tientai";
                $to_email = "noreply@kienbien.com";//send to this email

                $data = array("name"=>$rq->ten,"content"=>$rq->tinnhan); //body of mail.blade.php

                Mail::send('Frontend.Mailcontact.mailcontact',$data,function($message) use ($to_name,$to_email,$rq){
                    $message->to($to_email)->subject('test mail nhé');//send this mail with subject
                    $message->from($to_email,$to_name);//send from this mail
                });*/


    	$tabbinhluan = new tabbinhluan;
    	$tabbinhluan->hoten = $rq->ten;
    	$tabbinhluan->email = $rq->email;
    	$tabbinhluan->chude = $rq->chude;
    	$tabbinhluan->tinnhan = $rq->tinnhan;
    	$tabbinhluan->save();
        Alert::success('Đã phản hồi!','Cảm ơn bạn')->persistent(false,true);
    	return redirect()->route('contact');
    }
}
