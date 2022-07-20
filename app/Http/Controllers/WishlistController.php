<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Wishlist;
use App\Models\WishlistItem;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        return view('trainee.wishlist', [
            'wishlist_items' => WishlistItem::where('wishlist_id', auth()->guard('user')->user()->wishlist->id)->get()
        ]);
    }

    public function store(Request $request)
    {
        WishlistItem::create([
            // 'wishlist_id' => auth()->user()->wishlist->id,
            'wishlist_id' => '1',
            'lesson_id' => $request->lesson_id
        ]);
        toast('Lesson has been added to wishlist!', 'success');
        return back();
    }

    public function destroy(Lesson $lesson)
    {
        // $item = WishlistItem::where('wishlist_id', auth()->user()->wishlist->id)
        //             ->where('lesson_id', $lesson->id)->first();
        $item = WishlistItem::where('wishlist_id', '1')->where('lesson_id', $lesson->id)->first();
        WishlistItem::destroy($item->id);
        toast('Lesson has been removed from wishlist!', 'success');
        return back();
    }
}
