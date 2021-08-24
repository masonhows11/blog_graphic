
@component('mail::message')


    @component('mail::button', ['url' => route('verify_email',$activation_code)])
        برای فعال سازی حساب کاربری خود کلیک کنید
    @endcomponent


    {{ config('app.name') }}
@endcomponent
