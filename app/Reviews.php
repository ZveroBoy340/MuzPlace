<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    protected $fillable = ['user_id', 'owner_id', 'proposal_id', 'name', 'lastname', 'date', 'avatar', 'rating', 'photos', 'text_review', 'status'];

    public static function post_review($request, $user, $proposal_id) {
        $photos = [];

        $artist = User::orderBy('id', 'asc')->where('id', $user)->first();
        $proposal = Users_proposal::where('id', $proposal_id)->first();
        $event = Events::where('id', $proposal->event_id)->first();
        $already_review = Reviews::where('proposal_id', $proposal_id)->first();

        $date_now = date('d.m.Y');
        $date_event = json_decode($event->data, true);
        $date_event = date($date_event[$proposal->data][0]);


        if ($already_review) {
            return 'double';
        }
        elseif ($date_now > $date_event) {

            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $destinationPath = public_path('/uploads/images/');

                foreach ($photo as $file => $key) {
                    $name = time().rand(1, 100).'.'.$key->getClientOriginalExtension();
                    $key->move($destinationPath, $name);
                    $photos[] = $name;
                }
            }

            if ($artist->id == $event->user_id) {
                Reviews::create([
                    'user_id' => $artist->id,
                    'owner_id' => $proposal->user_id,
                    'proposal_id' => $proposal_id,
                    'name' => $artist->name,
                    'lastname' => $artist->lastname,
                    'date' => $date_now,
                    'avatar' => $artist->avatar,
                    'rating' => $request->input('score'),
                    'photos' => json_encode($photos),
                    'text_review' => $request->input('text-review'),
                    'status' => 0,
                ]);

                User::where('id', $proposal->user_id)->update([
                    'rating' => Reviews::reviews_rating_num($proposal->user_id)
                ]);
            } else {
                Reviews::create([
                    'user_id' => $artist->id,
                    'owner_id' => $event->user_id,
                    'proposal_id' => $proposal_id,
                    'name' => $artist->name,
                    'lastname' => $artist->lastname,
                    'date' => $date_now,
                    'avatar' => $artist->avatar,
                    'rating' => $request->input('score'),
                    'photos' => json_encode($photos),
                    'text_review' => $request->input('text-review'),
                    'status' => 0,
                ]);

                User::where('id', $artist->id)->update([
                    'rating' => Reviews::reviews_rating_num($artist->id)
                ]);
            }

            return true;
        }
        else {
            return false;
        }
    }
    public static function update_review($request, $review_id) {
        $photos = [];

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/avatars/');
            $image->move($destinationPath, $name);
            Reviews::where('id', $review_id)->update(['avatar' => $name]);
        }

        if ($request->input('photo')) {
            $photo = $request->input('photo');

            foreach ($photo as $file => $key) {
                $name = $key;
                $photos = $name;
            }
        }

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $destinationPath = public_path('/uploads/images/');

            foreach ($photo as $file => $key) {
                $name = time().rand(1, 100).'.'.$key->getClientOriginalExtension();
                $key->move($destinationPath, $name);
                $photos[] = $name;
            }
        }

        Reviews::where('id', $review_id)->update([
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'date' => date('d.m.Y', strtotime($request->input('date'))),
            'rating' => $request->input('score'),
            'photos' => json_encode($photos),
            'text_review' => $request->input('text_review'),
            'status' => $request->input('status')
        ]);

        $owner_id = Reviews::where('id', $review_id)->first();

        User::where('id', $owner_id->owner_id)->update([
            'rating' => Reviews::reviews_rating_num($owner_id->owner_id)
        ]);

        return true;
    }
    public static function reviews_attachment($user_reviews) {
        $attachment = [];

        foreach ($user_reviews as $number => $review) {
            if ($review->photos != '[]') {
                $attachment[$number][] = json_decode($review->photos, true);
            }
            else {
                $attachment[$number][] = null;
            }
        }

        return $attachment;
    }
    public static function reviews_rating_num($user_id) {
        $all_price = 0;

        $user_votes = Reviews::where('owner_id', $user_id)->where('status', 1)->get();
        $count_votes = count($user_votes);

        foreach ($user_votes as $user_vote => $data) {
            $all_price = $all_price + $data->rating;
        }

        if ($all_price > 0) {
            $result = $all_price / $count_votes;
        } else {
            $result = 0.0;
        }

        return $result;
    }
}
