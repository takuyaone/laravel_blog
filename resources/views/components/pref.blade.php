@props([
    'message'=>'選択してください',
    'default'
])

@php
    $prefs=['東京','神奈川','千葉']
@endphp

<select {{$attributes->merge(['name'=>'pref','class'=>'aa'])}}>
    <option value="">{{$message}}</option>
    @foreach ($prefs as $pref)
    <option value="{{$pref}}" {{$pref === $default ? 'selected':''}}>{{$pref}}</option>

    @endforeach
</select>
