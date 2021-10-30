<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogSaveRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:25'],
            'body' => ['required', 'string'],
            'is_open' => ['nullable'],
            'pict' => ['image', 'max:5000'], //画像挿入の場合サイズ指定(キロバイト)
        ];
    }

    public function validated()
    {
        // $validated=$this->validator->validated();

        return array_merge($this->validator->validated(), [
            'is_open' => $this->boolean('is_open'),
        ]);
    }

    public function proceed()
    {
        $data=$this->validated();

        if ($this->hasFile('pict')) {
            //画像の削除はイベントを使って削除
            $data['pict'] = $this->file('pict')->store('blogs', 'public');
        }

        return $data;
    }
}
