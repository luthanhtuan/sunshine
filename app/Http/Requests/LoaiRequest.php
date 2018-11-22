<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoaiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'l_ten' => 'required|unique:loai|max:60',
            'l_taoMoi' => 'required',
            'l_capNhat' => 'required',
            'l_trangThai' => 'required',
        ];
    }
    public function Messages()
    {
        return [
            'l_ten.required' => 'Ten loai bat buoc nhap',
            'l_ten.unique'  => 'Ten loai da co trong he thong. Vui long kiem tra lai.',
            'l_ten.max' => 'Ten loai da vuot qua so luong cho phep',
            'l_taoMoi.required'  => 'Ngay tao moi khong duoc phep rong',
            'l_capNhat.required' => 'Ngay cap nhat khong duoc phep rong' 
        ];
    }
}
