@extends('User.master')

@section(
    'seo_title',
    'Contact Me | ' . ($siteSetting?->site_name ?? 'Ahmad Yasser')
)

@section(
    'seo_description',
    'Contact '
        . ($siteSetting?->site_name ?? 'Ahmad Yasser')
        . ' for web development and software engineering projects.'
)

@section(
    'seo_keywords',
    'Contact Laravel Developer, Hire Web Developer, Software Engineer Contact'
)

@section('seo_type', 'website')

@section('content')


    <section class="contact-section  ">
        <div class="container">

            <div class="row align-items-center g-5">

                {{-- Form --}}
                <div class="col-12 col-lg-7">

                    <h1 class="contact-title mb-5">
                        Contact Me
                    </h1>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">

                            {{ session('success') }}

                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>

                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf

                        <div class="row">

                            {{-- Name --}}
                            <div class="col-md-6 mb-4">

                                <label for="name" class="form-label">
                                    Name
                                </label>

                                <input type="text" name="name" id="name" class="form-control form-control-lg"
                                    placeholder="Enter your name" value="{{ old('name') }}" required>

                            </div>

                            {{-- Phone --}}
                            <div class="col-md-6 mb-4">

                                <label for="phone" class="form-label">
                                    Phone Number
                                </label>

                                <input type="tel" name="phone" id="phone" class="form-control form-control-lg"
                                    placeholder="+970 59 XXXXXXXX" value="{{ old('phone') }}">

                            </div>

                        </div>


                        <div class="mb-4">
                            <label for="email" class="form-label">
                                Email address
                            </label>

                            <input type="email" name="email" id="email" class="form-control form-control-lg"
                                placeholder="name@example.com" value="{{ old('email') }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="subject" class="form-label">
                                Subject
                            </label>

                            <input type="text" name="subject" id="subject" class="form-control form-control-lg"
                                placeholder="Enter your Subject" value="{{ old('subject') }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="message" class="form-label">
                                Message
                            </label>

                            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Write your message here..."
                                required>{{ old('message') }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg px-4 text-white mb-5">
                            Send Message
                        </button>
                    </form>

                </div>

                {{-- Image --}}
                <div class="col-12 col-lg-5">

                    <div class="ratio" style="--bs-aspect-ratio: 76.66%;">
                        <img src="{{ asset('assets/img/bg/2.png') }}" alt="Ahmad Yasser"
                            class="img-fluid object-fit-cover rounded-3 rounded-sm-4 rounded-xl-5">
                    </div>

                </div>

            </div>

        </div>
    </section>
@endsection
