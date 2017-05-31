@component('mail::message')
# Introduction

Use this code to register your account at {{ config('app.name') }}
<br>
Code : {{$content['code']}}
<br>
registration Link : {{URL::to('/register')}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
