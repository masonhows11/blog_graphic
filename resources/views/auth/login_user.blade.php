
@include('front.include.header')
@include('front.include.navbar')
   {{-- <div class="row">
        <div class="offset-lg-3 offset-md-3 offset-sm-6 col-lg-6 col-md-6 col-sm-6 mb-3 mt-3 login-msg-wrapper">
            @if(session('error'))
                <div class="alert alert-info" role="alert">
                    <p class="text-center">{{ session('error')  }}</p>
                </div>
            @endif
            @if(session('warning'))
                <div class="alert alert-warning" role="alert">
                    <p class="text-center">{{ session('warning')  }}</p>
                </div>
            @endif
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        <p class="text-center">{{ session('success')  }}</p>
                    </div>
                @endif
        </div>
    </div>--}}
<div class="container mt-5 login">

   <div class="row d-flex justify-content-center align-items-center ">

       <h2 class="text-center">فرم ورود کاربران</h2>

       <div class="col-lg-4 d-flex justify-content-center login-image" >
           <img src="{{asset('/images/template/vector-login.png')}}" class="img-fluid" alt="">
       </div>

       <div class="col-lg-4 login-form">
           <form action="/login" method="post">
               @csrf
               <div class="mb-3">
                   <label for="email" class="form-label">ایمیل:</label>
                   <input
                       type="email"
                       name="email"
                       class="form-control @error('email') is-invalid @enderror"
                       id="email"
                       value="{{ old('email')  }}"
                       placeholder="ایمیل خود را وارد کنید...">
                   @error('email')
                   <div class="alert alert-danger">{{ $message }}</div>
                   @enderror
               </div>
               <div class="mt-3">
                   <label for="password" class="form-label">رمز عبور:</label>
                   <input type="password"
                          name="password"
                          class="form-control @error('password') is-invalid @enderror"
                          id="password"
                          placeholder="شماره موبایل خود را وارد کنید..">
                   @error('password')
                   <div class="alert alert-danger">{{ $message }}</div>
                   @enderror
               </div>

               <div class="mt-3">
                   <label>
                       <input type="checkbox" name="remember"> مرا بخاطر بسپار
                   </label>
                   @error('remember')
                   <div class="alert alert-danger">{{ $message }}</div>
                   @enderror
               </div>

               <div class="g-recaptcha" data-sitekey="{{config('services.recaptcha.key')}}"></div>
               @if( Session::has('g-recaptcha-response-error'))
                   <p class="alert alert-danger text-center" role="alert">
                       {{ Session::get('g-recaptcha-response-error')  }}
                   </p>
               @endif
               <br/>

               <div class="mt-3">
                   <button type="submit" class="btn btn-outline-primary">ورود</button>
                   <a href="/resetPassForm" class="btn btn-outline-info">فراموشی رمز عبور !</a>
               </div>
           </form>

       </div>

   </div>
</div>
@include('front.include.footer')
