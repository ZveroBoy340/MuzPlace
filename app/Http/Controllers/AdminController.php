<?php

namespace App\Http\Controllers;

use App\Articles;
use App\Events;
use App\Genres;
use App\MetaTags;
use App\Notices;
use App\Pages;
use App\Faq;
use App\Reviews;
use App\Skills;
use Illuminate\Http\Request;
use \App\User;
use \App\AdminFunctions;
use Illuminate\Support\Facades\Hash;
use Image;

class AdminController extends Controller
{
    public function index()
    {
        $today = AdminFunctions::register_today();
        $month = AdminFunctions::register_month();
        $all = AdminFunctions::register_all();

        $events = AdminFunctions::check_events();
        $types = Skills::get();

        $reviews = AdminFunctions::check_reviews();

        return view('admin.dashboard', [
            'today' => $today,
            'month' => $month,
            'all' => $all,
            'events' => $events,
            'types' => $types,
            'reviews' => $reviews
        ]);
    }

    public function users()
    {
        $active = AdminFunctions::verify_users();

        return view('admin.users.users', [
            'active' => $active
        ]);
    }

    public function user_edit($id)
    {
        $user = AdminFunctions::user_edit($id);

        return view('admin.users.edit', [
            'user' => $user
        ]);
    }

    public function user_update(Request $request, $id)
    {

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/avatars/');
            $image->move($destinationPath, $name);

            $img = Image::make($destinationPath.$name)->orientate()->fit(500, 500)->save($destinationPath.$name);

            User::where('id', $id)->update(['avatar' => $name]);
        }

        if ($request->input('email')) {
            User::where('id', $id)->update(['email' => $request->input('email')]);
        }

        if ($request->input('password')) {
            $request->validate([
                'password' => ['string', 'min:8'],
            ]);
            User::where('id', $id)->update(['password' => Hash::make($request->input('password'))]);
        }

        if ($request->input('expirience')) {
            User::where('id', $id)->update(['expirience' => $request->input('expirience')]);
        }

        if ($request->input('city')) {
            User::where('id', $id)->update(['city' => $request->input('city')]);
        }

        if ($request->input('name')) {
            User::where('id', $id)->update(['name' => $request->input('name')]);
        }

        if ($request->input('lastname')) {
            User::where('id', $id)->update(['lastname' => $request->input('lastname')]);
        }

        if ($request->input('login')) {
            User::where('id', $id)->update(['login' => $request->input('login')]);
        }

        if ($request->input('phone')) {
            User::where('id', $id)->update(['phone' => $request->input('phone')]);
        }

        if ($request->input('birthday')) {
            $birthday = $request->input('birthday');
            User::where('id', $id)->update(['birthday' => $birthday]);
        }

        if ($request->input('gender')) {
            User::where('id', $id)->update(['gender' => $request->input('gender')]);
        }

        if ($request->input('status')) {
            User::where('id', $id)->update(['status' => $request->input('status')]);
        }

        if ($request->input('about')) {
            User::where('id', $id)->update(['about' => $request->input('about')]);
        }

        if ($request->input('facebook')) {
            User::where('id', $id)->update(['facebook' => $request->input('facebook')]);
        }

        if ($request->input('vkontakte')) {
            User::where('id', $id)->update(['vkontakte' => $request->input('vkontakte')]);
        }

        if ($request->input('odnoklassniki')) {
            User::where('id', $id)->update(['odnoklassniki' => $request->input('odnoklassniki')]);
        }

        if ($request->input('instagram')) {
            User::where('id', $id)->update(['instagram' => $request->input('instagram')]);
        }

        if ($request->input('telegram')) {
            User::where('id', $id)->update(['telegram' => $request->input('telegram')]);
        }

        if ($request->input('twitter')) {
            User::where('id', $id)->update(['twitter' => $request->input('twitter')]);
        }

        $previousUrl = app('url')->previous();
        return redirect()->to($previousUrl.'?'. http_build_query(['edit_user'=>'accept']));
    }

    public function user_delete($id)
    {
        User::where('id', '=', $id)->delete();
        return redirect('/mpadmin/users');
    }

    public function user_status($id, $status)
    {
        $user = User::where('id', $id)->update([
            'status' => $status
        ]);

        $previousUrl = app('url')->previous();
        return redirect()->to($previousUrl.'?'. http_build_query(['status'=>'changed']));
    }

    public function events()
    {
        $events = AdminFunctions::events();
        $types = Skills::get();

        return view('admin.events.events', [
            'events' => $events,
            'types' => $types
        ]);
    }

    public function events_edit($id)
    {
        $data_event = Events::where('id', $id)->first();
        if ($data_event) {

            $type_event = Skills::where('id', $data_event->type)->first();
            $types = Skills::where('status', 1)->get();
            $genres = Genres::where('status', 1)->get();

            $event_data = json_decode($data_event->data, true);
            $dop_option = json_decode($data_event->dop_option, true);

            $artist_type = json_decode($data_event->artist_type, true);
            $artist_genre = json_decode($data_event->artist_genre, true);
            $artist_date = json_decode($data_event->artist_date, true);
            $artist_wish = json_decode($data_event->artist_wish, true);

            $count_data = count($event_data) - 1;
            $count_artist = count($artist_type) - 1;

            return view('admin.events.edit', [
                'event_data' => $data_event,
                'count_data' => $count_data,
                'type_event' => $type_event,
                'dop_option' => $dop_option,
                'artist_type' => $artist_type,
                'artist_genre' => $artist_genre,
                'artist_date' => $artist_date,
                'artist_wish' => $artist_wish,
                'count_artist' => $count_artist,
                'types' => $types,
                'genres' => $genres,
                'data' => $event_data
            ]);
        }
        else {
            $previousUrl = app('url')->previous();
            return redirect()->to($previousUrl.'?'. http_build_query(['edit_event'=>'failed']));
        }
    }

    public function events_update(Request $request, $event_id) {

        $user_id = Events::where('name', $request->input('name'))->first();

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $name_cover = time().'.'.$cover->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/images/');
            $cover->move($destinationPath, $name_cover);

            $img = Image::make($destinationPath.$name_cover)->orientate()->fit(700, 500)->save($destinationPath.$name_cover);

            Events::where('id', $event_id)->update(['cover' => $name_cover]);
        }

        if ($request->hasFile('dogovor')) {
            $dogovor = $request->file('dogovor');
            $name_dogovor = time().'.'.$dogovor->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/documents/');
            $dogovor->move($destinationPath, $name_dogovor);
            Events::where('id', $event_id)->update(['dogovor' => $name_dogovor]);
        }

        if ($request->input('name')) {
            Events::where('id', $event_id)->update(['name' => $request->input('name')]);
        }

        if ($request->input('description')) {
            Events::where('id', $event_id)->update(['description' => $request->input('description')]);
        }

        if ($request->input('type')) {
            Events::where('id', $event_id)->update(['type' => $request->input('type')]);
        }

        if ($request->input('date')) {
            $date = $request->input('date');
            foreach ($date as $id => $value) {
                $result_date[$id][0] = date('d.m.Y', strtotime($value[0]));
                $result_date[$id][1] = $value[1];
                $result_date[$id][2] = $value[2];
            }

            Events::where('id', $event_id)->update(['data' => $result_date]);
        }

        if ($request->input('artist_type')) {
            $artist_type = json_encode($request->input('artist_type'));
            Events::where('id', $event_id)->update(['artist_type' => $artist_type]);
        }

        if ($request->input('artist_genre')) {
            $artist_genre = json_encode($request->input('artist_genre'));
            Events::where('id', $event_id)->update(['artist_genre' => $artist_genre]);
        }

        if ($request->input('artist_date')) {
            $artist_date = json_encode($request->input('artist_date'));
            Events::where('id', $event_id)->update(['artist_date' => $artist_date]);
        }

        if ($request->input('artist_wish')) {
            $artist_wish = json_encode($request->input('artist_wish'));
            Events::where('id', $event_id)->update(['artist_wish' => $artist_wish]);
        }

        if ($request->input('dop_option')) {
            $dop_option = json_encode($request->input('dop_option'));
            Events::where('id', $event_id)->update(['dop_option' => $dop_option]);
        }

        if ($request->input('place')) {
            Events::where('id', $event_id)->update(['place' => $request->input('place')]);
        }

        if ($request->input('city')) {
            Events::where('id', $event_id)->update(['city' => $request->input('city')]);
        }

        if ($request->input('people')) {
            Events::where('id', $event_id)->update(['people' => $request->input('people')]);
        }

        if ($request->input('payment')) {
            Events::where('id', $event_id)->update(['payment' => $request->input('payment')]);
        }

        if ($request->input('payment_method')) {
            Events::where('id', $event_id)->update(['payment_method' => $request->input('payment_method')]);
        }

        if ($request->input('payment_condition')) {
            Events::where('id', $event_id)->update(['payment_condition' => $request->input('payment_condition')]);
        }

        if ($request->input('status')) {
            Events::where('id', $event_id)->update(['status' => $request->input('status')]);
        }

        if ($request->input('additional_conditions')) {
            Events::where('id', $event_id)->update(['additional_conditions' => $request->input('additional_conditions')]);
        }

        if ($request->input('status') === 'decline') {
            Notices::event_decline($request->input('name'), $user_id->user_id);
        }
        if ($request->input('status') === 'accept') {
            Notices::event_accept($request->input('name'), $user_id->user_id);
        }

        $previousUrl = app('url')->previous();
        return redirect()->to($previousUrl.'?'. http_build_query(['edit_event'=>'accept']));
    }

    public function events_delete($id)
    {
        Events::where('id', '=', $id)->delete();
        return redirect('/mpadmin/events/');
    }
    public function events_status($id, $status)
    {
        $event = Events::where('id', $id)->update([
            'status' => $status
        ]);
        
        if ($status == "accept") {
            $event = Events::where('id', $id)->first();
            $add_notice = Notices::event_accept($event->name, $event->user_id);
        }

        $previousUrl = app('url')->previous();
        return redirect()->to($previousUrl.'?'. http_build_query(['status'=>'changed']));
    }
    public function reviews()
    {
        $reviews = AdminFunctions::reviews();

        return view('admin.reviews.reviews', [
            'reviews' => $reviews
        ]);
    }

    public function reviews_edit($id)
    {
        $review = Reviews::where('id', $id)->first();
        $review_img = json_decode($review->photos, true);
        $img_count = count($review_img);

        return view('admin.reviews.edit', [
            'review' => $review,
            'review_img' => $review_img,
            'img_count' => $img_count
        ]);
    }
    public function reviews_status($id, $status)
    {
        $review = Reviews::where('id', $id)->update([
            'status' => $status
        ]);

        $previousUrl = app('url')->previous();
        return redirect()->to($previousUrl.'?'. http_build_query(['status'=>'changed']));
    }
    public function reviews_update(Request $request, $review_id) {

        $review_update = Reviews::update_review($request, $review_id);

        $previousUrl = app('url')->previous();
        return redirect()->to($previousUrl.'?'. http_build_query(['edit_review'=>'accept']));
    }

    public function reviews_delete($id)
    {
        Reviews::where('id', '=', $id)->delete();
        return redirect('/mpadmin/reviews/');
    }

    public function articles()
    {
        $articles = AdminFunctions::articles();

        return view('admin.articles.articles', [
            'articles' => $articles
        ]);
    }

    public function articles_add()
    {
        return view('admin.articles.add');
    }

    public function articles_post(Request $request)
    {
        Articles::add_article($request);

        return redirect('/mpadmin/articles/');
    }

    public function articles_edit($id)
    {
        $article = Articles::where('id', $id)->first();

        return view('admin.articles.edit', [
            'article' => $article,
        ]);
    }
    public function articles_update(Request $request, $article_id) {

        $article_update = Articles::update_article($request, $article_id);

        $previousUrl = app('url')->previous();
        return redirect()->to($previousUrl.'?'. http_build_query(['edit_article'=>'accept']));
    }

    public function articles_delete($id)
    {
        Articles::where('id', '=', $id)->delete();
        return redirect('/mpadmin/articles/');
    }

    public function articles_status($id, $status)
    {
        $article = Articles::where('id', $id)->update([
            'status' => $status
        ]);

        $previousUrl = app('url')->previous();
        return redirect()->to($previousUrl.'?'. http_build_query(['status'=>'changed']));
    }

    public function pages()
    {
        $pages = AdminFunctions::pages();

        return view('admin.pages.pages', [
            'pages' => $pages
        ]);
    }

    public function pages_add()
    {
        return view('admin.pages.add');
    }

    public function pages_post(Request $request)
    {
        Pages::add_page($request);

        return redirect('/mpadmin/pages/');
    }

    public function pages_edit($id)
    {
        $page = Pages::where('id', $id)->first();

        return view('admin.pages.edit', [
            'page' => $page,
        ]);
    }
    public function pages_update(Request $request, $page_id) {

        $page_update = Pages::update_page($request, $page_id);

        $previousUrl = app('url')->previous();
        return redirect()->to($previousUrl.'?'. http_build_query(['edit_page'=>'accept']));
    }

    public function pages_delete($id)
    {
        Pages::where('id', '=', $id)->delete();
        return redirect('/mpadmin/pages/');
    }

    public function pages_status($id, $status)
    {
        $page = Pages::where('id', $id)->update([
            'status' => $status
        ]);

        $previousUrl = app('url')->previous();
        return redirect()->to($previousUrl.'?'. http_build_query(['status'=>'changed']));
    }

    public function faq()
    {
        $faq = AdminFunctions::faq();

        return view('admin.faq.faq', [
            'faq' => $faq
        ]);
    }

    public function faq_add()
    {
        return view('admin.faq.add');
    }

    public function faq_post(Request $request)
    {
        Faq::add_faq($request);

        return redirect('/mpadmin/faq/');
    }

    public function faq_edit($id)
    {
        $faq = Faq::where('id', $id)->first();

        return view('admin.faq.edit', [
            'faq' => $faq,
        ]);
    }
    public function faq_update(Request $request, $page_id) {

        $faq_update = Faq::update_faq($request, $page_id);

        $previousUrl = app('url')->previous();
        return redirect()->to($previousUrl.'?'. http_build_query(['edit_faq'=>'accept']));
    }

    public function faq_delete($id)
    {
        Faq::where('id', '=', $id)->delete();
        return redirect('/mpadmin/faq/');
    }

    public function faq_status($id, $status)
    {
        $faq = Faq::where('id', $id)->update([
            'status' => $status
        ]);

        $previousUrl = app('url')->previous();
        return redirect()->to($previousUrl.'?'. http_build_query(['status'=>'changed']));
    }

    public function skills()
    {
        $types = AdminFunctions::types();
        $genres = AdminFunctions::genres();

        return view('admin.skills.skills', [
            'types' => $types,
            'genres' => $genres
        ]);
    }

    public function skills_add()
    {
        return view('admin.skills.add');
    }

    public function skills_post(Request $request)
    {
        Skills::add_type($request);

        return redirect('/mpadmin/skills/');
    }

    public function skills_edit($id)
    {
        $type = Skills::where('id', $id)->first();

        return view('admin.skills.edit', [
            'type' => $type,
        ]);
    }
    public function skills_update(Request $request, $type_id) {

        $type_update = Skills::update_type($request, $type_id);

        return redirect('/mpadmin/skills/');
    }

    public function skills_delete($id)
    {
        Skills::where('id', '=', $id)->delete();
        return redirect('/mpadmin/skills/');
    }

    public function genres_add()
    {
        return view('admin.genres.add');
    }

    public function genres_post(Request $request)
    {
        Genres::add_genres($request);

        return redirect('/mpadmin/skills/');
    }

    public function genres_edit($id)
    {
        $genre = Genres::where('id', $id)->first();

        return view('admin.genres.edit', [
            'genre' => $genre,
        ]);
    }
    public function genres_update(Request $request, $genre_id) {

        $genre_update = Genres::update_genre($request, $genre_id);

        return redirect('/mpadmin/skills/');
    }

    public function genres_delete($id)
    {
        Genres::where('id', '=', $id)->delete();
        return redirect('/mpadmin/skills/');
    }

    public function seo()
    {
        $seo = MetaTags::get();

        return view('admin.seo.seo', [
            'seo' => $seo
        ]);
    }

    public function seo_edit($id)
    {
        $seo = MetaTags::where('id', $id)->first();

        return view('admin.seo.edit', [
            'seo' => $seo,
        ]);
    }
    public function seo_update(Request $request, $seo_id) {

        $seo_update = MetaTags::update_seo($request, $seo_id);

        $previousUrl = app('url')->previous();
        return redirect()->to($previousUrl.'?'. http_build_query(['edit_seo'=>'accept']));
    }
}
