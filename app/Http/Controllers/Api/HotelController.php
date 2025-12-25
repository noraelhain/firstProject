<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Http\Resources\HotelResource;
use App\Http\Requests\HotelRequest;
class HotelController extends Controller
{

    use ApiResponse;
public function store( Request $request,HotelRequest $hotelRequest)
{
    $user = $hotelRequest->user();

    // $this->authorize('create',Hotel::class);


    $validate = $hotelRequest->validated();

    $validate['user_id'] = $request->user()->id;
    
    $hotel = Hotel::create($validate);

    
    if ($hotelRequest->hasFile('cover')) {
        $hotel
            ->addMediaFromRequest('cover')
            ->toMediaCollection('cover');
    }

    return response()->json([
        'status' => true,
        'message' => [
            'ar' => 'تم بنجاح',
            'en' => 'successfully'
        ],
        'data' => new HotelResource($hotel)
    ]);
}


    public function destroy(Request $request, $id)
    {

        $user = $request->user();


        // اجد الفندق

        $hotel = Hotel::find($id);

        if (!$hotel) {
            return response()->json([
                'status' => false,
                'message' => [
                    'ar' => 'غير موجود',
                    'en' => 'not found'
                ]
            ]);
        }

                if ($user->id !==$hotel->user_id) {
            return response()->json([
                'status' => false,
                'message' => [
                    'ar' => 'ydv lwvp fi',
                    'en' => 'Unauthenticated'
                ]
                ],403);
        }

        $hotel->delete();

        return response()->json([
            'status' => true,
            'message' => [
                'ar' => 'تم الحذف بنجاح',
                'en' => 'deleted successfuly'
            ]
        ]);
    }

    public function update(Request $request, $id)
    {

        $user = $request->user();
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => [
                    'ar' => 'يجيب تسجيل الدخول',
                    'en' => 'Unauthenticated'
                ]

            ]);
        }

        $hotel = Hotel::findOrFail($id);

        // if (!$hotel) {
        //     return response()->json([
        //         'status' => false,
        //         'message' => [
        //             'ar' => 'غير موجود',
        //             'en' => 'not found'
        //         ]
        //     ]);
        // }

                if ($user->id !==$hotel->user_id) {
            return response()->json([
                'status' => false,
                'message' => [
                    'ar' => 'غير مصرح به',
                    'en' => 'Unauthenticated'
                ]
                ],403);
        }

        $validate = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        $hotel->update($validate);

        return response()->json([
            'status' => true,
            'message' => [
                'ar' => 'تم بنجاح',
                'en' => 'update successfuly',
            ]
        ]);
    }

    public function index(){
        $hotels=Hotel::all();

        return response()->json([
            'status'=>true,
            'message'=>'successful',
            'data'=> HotelResource::collection($hotels),// collection --> list
        ]);
    }

    public function show($id){

        $hotel=Hotel::findOrFail($id);

        return response()->json([
            'status'=>true,
            'message'=>'successful',
            'data'=>  new HotelResource($hotel)

        ]);
    }
}
