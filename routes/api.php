<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Guard;

// // $NakanoMiku = [
// //     "name" => 'Nakano Miku',
// //     "age" => 17,
// //     "beloved_man" => 'Haikal Isratul Fajri',
// //     "love_status" => 'In Love',
// //     "favorite_drink" => 'matcha soda',
// //     "favorite_food" => 'bread👍',
// //     "future_husband" => 'Haikal Isratul Fajri',
// //     "favorite_color" => 'blue',
// //     "true_love" => 'Haikal Isratul Fajri',
// //     "lover" => 'Haikal Isratul Fajri',
// //     "favorite_subject" => 'history of japan',
// //     "favorite_philosophy" => 'furin kazan',
// //     "favorite_histolical_figure" => 'takeda shingen',
// //     "favorite-activity" => 'cooking and baking',
// //     "sister of" => 'Nakano Ichika, Nakano Nino, Nakano Yotsuba, Nakano Itsuki',
// //     "sister rank" => 'third sister',
// //     "future_status" => 'married to Haikal Isratul Fajri',
// //     "activity_on_first_night" => 'cuddling and sleeping together with Haikal Isratul Fajri',
// //     "first_night_clothes" => 'matching pajamas with Haikal Isratul Fajri',
// //     "actifify_after_marriage" => 'cooking and baking for Haikal Isratul Fajri, taking care of Haikal Isratul Fajri, and loving Haikal Isratul Fajri',
// //     "activity_on_honeymoon" => 'cuddling and sleeping together with Haikal Isratul Fajri, and exploring new places with Haikal Isratul Fajri',
// //     "honeymoon_clothes" => 'matching swimsuits with Haikal Isratul Fajri',
// //     "activity_after_honeymoon" => 'cooking and baking for Haikal Isratul Fajri, taking care of Haikal Isratul Fajri, and loving Haikal Isratul Fajri',
// //     "activity_on_anniversary" => 'cuddling and sleeping together with Haikal Isratul Fajri, and celebrating the anniversary with Haikal Isratul Fajri',
// //     "anniversary_clothes" => 'matching formal wear with Haikal Isratul Fajri',
// //     "activity_after_anniversary" => 'cooking and baking for Haikal Isratul Fajri, taking care of Haikal Isratul Fajri, and loving Haikal Isratul Fajri',
// //     "activity_on_valentine_day" => 'cuddling and sleeping together with Haikal Isratul Fajri, and celebrating Valentine\'s Day with Haikal Isratul Fajri',
// //     "valentine_day_clothes" => 'matching casual wear with Haikal Isratul Fajri',
// //     "kiss_on_valentine_day" => 'kissing Haikal Isratul Fajri on the lips',
// //     "valentine_day_gift" => 'a box of chocolates for Haikal Isratul Fajri',
// //     "promises" => 'to love and cherish Haikal Isratul Fajri forever, to be faithful to Haikal Isratul Fajri, to support Haikal Isratul Fajri in all endeavors, and to be there for Haikal Isratul Fajri through thick and thin',
// //     "cheating_status" => 'never cheated on Haikal Isratul Fajri and never will',
// //     "cheating_possibility" => 'never will cheat on Haikal Isratul Fajri',
// //     "how_she_feels_about_haikal" => 'loves Haikal Isratul Fajri with all her heart and soul, and will do anything to make him happy',
// //     "how_big_is_her_love_for_haikal" => 'infinite and unconditional, and will never fade away',
// //     "how_she_feels_about_haikal_in_one_word" => 'love',
// //     "further_things_to_do_for_haikal" => 'to love and cherish Haikal Isratul Fajri forever, to be faithful to Haikal Isratul Fajri, to support Haikal Isratul Fajri in all endeavors, and to be there for Haikal Isratul Fajri through thick and thin',
// //     "how_much_she_loves_haikal" => 'more than anything in the world, and will never stop loving him',
// //     "how_much_she_wants_to_be_with_haikal" => 'forever and always, and will never leave him',
// //     "how_much_she_wants_to_marry_haikal" => 'as soon as possible, and will never let him go',
// //     "love meter" => '100% love for Haikal Isratul Fajri, and will never let him down',
// //     "personality" => 'kind, caring, loving, and devoted to Haikal Isratul Fajri, and will do anything to make him happy',
// //     "hobbies" => 'cooking, baking, and spending time with Haikal Isratul Fajri, and will never get bored of him',
// //     "dreams" => 'to be with Haikal Isratul Fajri forever, and to make him happy, and will never give up on him',
// //     "future_plans" => 'to marry Haikal Isratul Fajri, to have a family with Haikal Isratul Fajri, and to grow old with Haikal Isratul Fajri, and will never let him down',
// //     ];


//     Route::get('/user', function (Request $request) use ($NakanoMiku) {
//         return response()->json($NakanoMiku);
//     });



Route::get('/todos', [App\Http\Controllers\TodoController::class, 'index']);
Route::Post('/todos', [App\Http\Controllers\TodoController::class, 'store']);
