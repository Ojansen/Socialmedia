<?php

namespace App\Http\Controllers;

use App\Following;
use App\Hashtags;
use App\Profile_settings;
use Illuminate\Http\Request;
use App\User;
use App\Posts;
use App\Likes;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Foreach_;


class DiscoverController extends Controller
{
    public function Sortposts()
    {        
        $posts = Posts::withCount('likes')->has('likes')->orderBy('likes_count', 'desc')->paginate(20);

        return view('Discover.TopPosts', compact('posts'));
    }
    public function Sorthashtags()
    {
        $sorted_hashtags = Hashtags::all()->groupBy('Hashtag')->take(10);;
        return view('Discover.TopHashtags',compact('sorted_hashtags'));
    }
    public function Voorgesteldevrienden()
    {
        $user = Auth::id();
        $friends = Following::all()->where('User_id', $user)->pluck('Target_id');
        $random = Following::all()
            ->whereIn('User_id',$friends)
            ->whereNotIn('Target_id', $friends)
            ->where('Target_id', '!=', Auth::id())
            ->groupBy('Target_id');
        return view('Discover.RecommendedFriends',compact('random'));
    }
    public function ZoekVrienden(){
        $id = Auth::id();
        $users = User::all()->except('id', $id);
        return view('/Discover.searchFriends', compact('users'));
    }
}

//
//$text = 'text van post #hashtag1 #hashtag2';
//preg_match_all("/\B\#\w+/", $text, $array);
//
//foreach ($array as $hashtags)
//{
//    foreach ($hashtags as $hashtag) {
//        $storehashtag = new Hashtags();
//        $storehashtag->Hashtag = $hashtag;
//        $storehashtag->Post_id = 4;
//        $storehashtag->save();
//    }
//}
