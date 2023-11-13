<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class writeToSheetController extends Controller
{
    public function writeToSheet(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required|regex:/[0-9]{10}/',
            'quantity1' => 'required',
            'quantity2' => 'required',
        ], [
            'name' => 'Họ và tên không được để trống',
            'phone' => 'Số điện thoại không được để trống',
            'phone.regex' => 'Số điện thoại bạn nhập không đúng vui lòng nhập lại',
            'quantity1' => 'số lượng thiệp nhà trai được để trống',
            'quantity2' => 'số lượng thiệp nhà gái được để trống',
        ]);

        if ($validator->fails()) return back()->withErrors(['message.error' => [__($validator->messages()->first())]])->withInput();

        $data = [
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'quantity1' => $request->input('quantity1'),
            'quantity2' => $request->input('quantity2'),
            'date' => date('Y-m-d H:i:s'),
        ];

        $webhookUrl = 'https://script.google.com/macros/s/AKfycbzEmO3PIpjFD6myz_upuFKyHJEEr1tW0K_dB-dHw9dTlZAngy0Im93OqPRqeWDJcAEr7g/exec?gid=0';

        $response = Http::post($webhookUrl, $data);

        if ($response->successful()) {
            // Gửi thành công, xử lý dữ liệu nếu cần
            return redirect()->back()->with('message.success', 'Data submitted to Google Sheets successfully');
        } else {
            // Xử lý lỗi khi gửi dữ liệu
            return redirect()->back()->with('message.error', 'Failed to submit data to Google Sheets');
        }
    }
}
