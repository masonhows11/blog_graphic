@component('mail::message')




@component('mail::button', ['url' => route('handleResetPassForm',[$token,$email])])
برای تغییر رمز عبور اینجا کلیک کنید
@endcomponent


{{ config('app.name') }}
@endcomponent
