@component('mail::message')
# Introduction

Use this code to register your account at {{ config('app.name') }}
Code : {{code}}
registration Link : {{config('APP_URL')}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
