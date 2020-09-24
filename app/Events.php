<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    public static function date_events($all_events, $data) {
        $result_events = "";
        foreach ($all_events as $number => $event) {
            $event_date = json_decode($event->data, true);

            foreach ($event_date as $counter => $date) {
                if ($date[0] == $data) {
                    $proposal_event = Users_proposal::where('event_id', $event->id)->where('status', 'check')->get();
                    $proposals_count = count($proposal_event);
                    $result_events .= '<div class="lk-list__item item-ajax';
                    if (strtotime($date[0]) == strtotime(date('d.m.Y'))) {
                        $result_events .= ' active-event';
                    }
                    elseif (strtotime($date[0]) < strtotime(date('d.m.Y'))) {
                        $result_events .= ' ended-event';
                    }
                    $result_events .= '"><p>'.$date[0].'</p><p><a href="/lk-event/'.$event->id.'/proposal/">'.$event->name.'</a></p><p>'.$date[1].'</p><p>'.$date[2].'</p><p>';
                    if($event->status == "accept") {
                        $result_events .= 'Одобрено';
                    }
                    elseif ($event->status == "check") {
                        $result_events .= 'На проверке';
                    }
                    elseif ($event->status == "decline") {
                        $result_events .= 'Отклонено';
                    }
                    $result_events .= '</p><p class="count-proposal"><a href="/lk-event/'.$event->id.'/proposal/">'.$proposals_count.'</a></p><p class="event-logo"><img src="/uploads/images/'.$event->cover.'" alt=""></p>';
                    $result_events .= '<p class=\'lk-events__edit edit-event\'><a href="/edit-event/'.$event->id.'"></a></p><p class=\'lk-events__edit delete-event\'><a class="del-event" data-del-href="/delete-event/{{$key->id}}"></a></p></div>';
                    break;
                }
            }
        }

        if ($result_events == "")  {
            $result_events = '<div class="no-events ajax"><span class="icon-warning">!</span>Не найдено мероприятий на выбранную дату</div>';
        }

        return $result_events;
    }
    public static function check_events($user, $data) {

        $my_proposals_check = [];
        $my_proposals_accept = [];
        $proposals_check_date = [];
        $proposals_accept_date = [];

        $my_proposals = Users_proposal::where('user_id', $user)->get();

        if ($my_proposals) {
            foreach ($my_proposals as $item => $key) {
                $result_event = Events::where('id', $key->event_id)->first();
                $event_date = json_decode($result_event->data, true);

                foreach ($event_date as $counter => $date) {
                    if (strtotime($date[0]) == strtotime($data)) {
                        if ($key->status == 'check' || $key->status == 'decline') {
                            $check_event = json_decode($result_event, true);

                            if (!empty($check_event) && $key->data == $counter) {
                                $my_proposals_check[$key->id][] = $result_event;
                                $my_proposals_check[$key->id][][] = $key->status;
                                $proposals_check_date[$key->id][] = $date;
                            }
                        }
                        elseif ($key->status == 'accept') {
                            $check_event = json_decode($result_event, true);

                            if (!empty($check_event) && $key->data == $counter) {
                                $my_proposals_accept[$key->id][] = $result_event;
                                $proposals_accept_date[$key->id][] = $date;
                            }
                        }
                        break;
                    }
                }
            }
        }
        $returnHTML = view('ajax.proposal_events',[
            'my_proposals_check' => $my_proposals_check,
            'my_proposals_accept' => $my_proposals_accept,
            'proposals_check_date' => $proposals_check_date,
            'proposals_accept_date' => $proposals_accept_date,
        ])->render();

        return $returnHTML;
    }
}
