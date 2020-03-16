<?php

namespace App\Mail;

use App\contactUs;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    // __construct為建構值
    // 把FrontController->contactUs_store的$contact接近來使用

    public function __construct(contactUs $contact)
    {
        // 宣告變數在裡面使用
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // content為shipped.blade.php檔使用
        return $this->subject('感謝你的來信')->markdown('emails.orders.shipped')->with('content',$this->contact);
    }

        //$message->subject($subject); (定義信件標題)
        //$message->attach($pathToFile, array $options = []); (寄送附件)
        //$message->with(變數名稱, 變數來源) (上方__construct預先定義的資料庫內容,引入何種資料庫在constuct定義,並無限制)
}
