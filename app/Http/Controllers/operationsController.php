<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Pusher\Pusher;



class operationsController extends Controller
{
    public function index(){
        $books=DB::table('books')->get();
        return view('op.index',compact('books'));
    }
//    public function create(){
//        return view('op.create');
//    }
//    public function store(Request $request){
//        $request['book_image']=parent::uploadImage($request->file('book_image'));
//        $request['publish_date']=Carbon::now();
//        DB::table('books')->insert(request()->except(['_token']));
//        return redirect()->back()->with('success','book added successfully');
//    }
    public function store()
    {
//        dd(config('broadcasting.connections.firebase.url'));
        $options = array(
            'cluster' => 'ap2',
            'useTLS' => true
        );
        $pusher =  new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );
        $data['message'] = 'hello world';
        $data['users'] = '{lksdfl}';
        $pusher->trigger('library-channel', 'event-all', $data);
//
//        $sourceToken = config('broadcasting.connections.firebase.secret_key');
//        $headers = [
//            'Authorization' => 'key=' . $sourceToken,
//            'Content-type' => 'application/json'
//        ];
//        $body = [
//            'data' => [
//                'title' => 'Hi',
//                'body' => 'Welcome to laravel course'
//            ],
//            'notification' => [
//                'title' => 'Hi',
//                'body' => 'Welcome to laravel course'
//            ],
//            'to' => $sourceToken
//        ];
//        $client = new Client([
//            'headers' => $headers
//        ]);
//        $response = $client->post(config('broadcasting.connections.firebase.url'),
//            [
//                'body' => json_encode($body)
//            ]);
//        $finalResponse = json_decode($response->getBody());
//        if ($finalResponse->success == 1)
//            echo 'sent successfully';
//        else
//            echo 'send faild';
    }
    public function destroy($id)
    {
        DB::table('books')->where('id','=',$id)->delete();
    }
    public function edit($id){
        try {
            $book=DB::table('books')->where('id','=',$id);
            return view('op.edit', compact('book'));
        } catch (\Exception $exception) {
            return redirect()->route('op.index')->with('error', 'Book is not found');
        }
    }
    public function update(Request $request, $id)
    {
        if ($request->hasFile('book_image')) {
            if (File::exists(public_path( $request['book_image']))) {
                File::delete(public_path( $request['book_image']));
            }
            $request['book_image']= parent::uploadImage($request->file('book_image'));

        }
        DB::table('books')->where('id','=',$id)->update(request()->except(['_token']));
        return redirect()->route('op.index')
            ->with('success',  'book has been updated successfully');

    }

}
