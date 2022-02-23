<?php

namespace App\Notifications;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UnActiveContactNotification extends Notification
{
    use Queueable;
    private $status;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Contact $status)
    {
        $this->status=$status;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {


        if (app()->getLocale()=='ar'){
            $order=route('contactus.index');

            return (new MailMessage)
                ->line('لم يتم قبول طلبك الرجاءالمحاولة مره اخري')
                ->line('لتسجيل طلب من جديد اضعط ع زر طلب')
                ->action('طلب جديد', $order)
                ->line('شكرا لك على استخدام تطبيقنا!');
        }else{
            $order=route('contactus.index');
            return (new MailMessage)
                ->line('Your request was not accepted. Please try again')
                ->line('To register an order again, press the request button')
                ->action('New Order', $order)
                ->line('Thank you for using our application!');
        }

    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
