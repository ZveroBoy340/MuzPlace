<?php

namespace App;

use App\Events;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Notices extends Model
{
    public static function count_notice($user)
    {
        $notices = Notices::orderBy('id', 'desc')->where('user_id', $user)->where('viewed', '=', 0)->get();
        $notices_count = $notices->count();
        return $notices_count;
    }

    public static function event_check($event_name, $user_id)
    {
        $date = date('d.m.Y');
        $event = Events::where('name', $event_name)->first();

        $add_notice = Notices::insert([
            'user_id' => $user_id,
            'event_id' => $event->id,
            'date' => $date,
            'user_type' => 'organizator',
            'message' => 'Мероприятие <a href="/event/'.$event->id.'">'.$event->name.'</a> отправлено на проверку!'
        ]);
    }

    public static function event_accept($event_name, $user_id)
    {
        $date = date('d.m.Y');
        $event = Events::where('name', $event_name)->first();

        $add_notice = Notices::insert([
            'user_id' => $user_id,
            'event_id' => $event->id,
            'date' => $date,
            'user_type' => 'organizator',
            'message' => 'Мероприятие <a href="/event/'.$event->id.'">'.$event->name.'</a> успешно прошло проверку!'
        ]);
    }

    public static function event_decline($event_name, $user_id)
    {
        $date = date('d.m.Y');
        $event = Events::where('name', $event_name)->first();

        $add_notice = Notices::insert([
            'user_id' => $user_id,
            'event_id' => $event->id,
            'date' => $date,
            'user_type' => 'organizator',
            'message' => 'Мероприятие <a href="/event/'.$event->id.'">'.$event->name.'</a> было отклонено.'
        ]);
    }

    public static function accept_proposal($id, $event_id) {
        $date = date('d.m.Y');
        $event = Events::where('id', $event_id)->first();

        $add_notice = Notices::insert([
            'user_id' => $id,
            'event_id' => $event_id,
            'date' => $date,
            'user_type' => 'artist',
            'message' => 'Заявка на участие в <a href="/event/'.$event->id.'">'.$event->name.'</a> успешно принята!'
        ]);
    }

    public static function decline_proposal($id, $event_id) {
        $date = date('d.m.Y');
        $event = Events::where('id', $event_id)->first();

        $add_notice = Notices::insert([
            'user_id' => $id,
            'event_id' => $event_id,
            'user_type' => 'artist',
            'date' => $date,
            'message' => 'Заявка на участие в <a href="/event/'.$event->id.'">'.$event->name.'</a> отклонена.'
        ]);
    }

    public static function new_proposal($id, $owner) {
        $date = date('d.m.Y');
        $event = Events::where('id', $id)->first();

        $add_notice = Notices::insert([
            'user_id' => $owner,
            'event_id' => $id,
            'date' => $date,
            'user_type' => 'organizator',
            'message' => '<a href="/lk-event/'.$event->id.'/proposal">Новая заявка</a> на участие в '.$event->name
        ]);
    }

    public static function new_review_event($user, $proposal_id) {
        $date = date('d.m.Y');
        $proposal = Users_proposal::where('id', $proposal_id)->first();
        $event = Events::where('id', $proposal->event_id)->first();

        if ($user == $event->user_id) {
            $add_notice = Notices::insert([
                'user_id' => $proposal->user_id,
                'event_id' => $proposal->event_id,
                'date' => $date,
                'user_type' => 'artist',
                'message' => 'Организатор '.$event->name.' оставил о Вас <a href="/lk-reviews">отзыв</a>'
            ]);
        }
        else {
            $add_notice = Notices::insert([
                'user_id' => $proposal->user_id,
                'event_id' => $proposal->event_id,
                'date' => $date,
                'user_type' => 'organizator',
                'message' => 'Новый <a href="/lk-reviews">отзыв на '.$event->name.'</a>'
            ]);
        }
    }

    public static function date_notices($all_notices, $first, $last) {
        $result_notices = "";
        foreach ($all_notices as $number => $notice) {
            $notice_date = Carbon::createFromFormat('d.m.Y', $notice->date);

            if ($notice_date >= $first && $notice_date <= $last) {
                $result_notices .= '<div class="lk-list__item item-ajax';

                if ($notice->viewed == 1) {
                    $result_notices .= ' readed-notice">';
                } else {
                    $result_notices .= '">';
                }
                $result_notices .= '<div class="left-list_item"><p>'.$notice->date.'</p><p>';

                if ($notice->user_type == 'artist') {
                    $result_notices .= '<a href="/event/'.$notice->event_id.'">';
                } else {
                    $result_notices .= '<a href="/lk-event/'.$notice->event_id.'/proposal/">';
                }
                $result_notices .= $notice->message.'</a></p></div><div class="right-list_item">';

                if ($notice->viewed == 0) {
                    $result_notices .= '<p class="right-notice"><a class="read-notice" data-notice="'.$notice->id.'" title="Пометить как прочитанное"></a></p>';
                }
                $result_notices .= '<p class="right-notice"><a class="delete-notice" data-notice="'.$notice->id.'" data-viewed="'.$notice->viewed.'"></a></p></div></div>';
            }
        }

        if ($result_notices == "")  {
            $result_notices = '<div class="no-events item-ajax"><span class="icon-warning">!</span>Не найдено уведомлений на выбранную дату</div>';
        }

        return $result_notices;
    }
}
