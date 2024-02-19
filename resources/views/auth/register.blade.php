@extends('layouts.app')

@section('content')
    <div class="h-screen bg-indigo-100 flex justify-center items-center">
        <div class="lg:w-2/5 md:w-1/2 w-2/3">
            <form class="bg-white p-10 rounded-lg shadow-lg min-w-full" method="POST" action="{{ route('register') }}">
                @csrf
                <h1 class="text-center text-2xl mb-6 text-gray-600 font-bold font-sans">Formregister</h1>

                {{-- UserName --}}
                <div>
                    <label class="text-gray-800 font-semibold block my-3 text-md" for="name">Username</label>
                    <input
                        class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none @error('name') is-invalid @enderror"
                        type="text" name="name" id="name" placeholder="username" value="{{ old('name') }}" />
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label class="text-gray-800 font-semibold block my-3 text-md" for="email">Email</label>
                    <input
                        class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none @error('email') is-invalid @enderror"
                        type="text" name="email" id="email" placeholder="email" />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Phone --}}
                <div>
                    <label class="text-gray-800 font-semibold block my-3 text-md" for="phone">Telefono</label>
                    <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text"
                        name="phone" id="phone" placeholder="telefono" />
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Allergy --}}
                <div>
                    <label class="text-gray-800 font-semibold block my-3 text-md" for="allergy">Alergias</label>
                    <input
                        class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none @error('allergy') is-invalid @enderror"
                        type="text" name="allergy" id="allergy" placeholder="alergia" />
                    @error('allergy')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label class="text-gray-800 font-semibold block my-3 text-md" for="password">Password</label>
                    <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="password"
                        name="password" id="password" placeholder="password" />
                </div>

                {{-- Confirm Password --}}
                <div>
                    <label class="text-gray-800 font-semibold block my-3 text-md" for="confirm">Confirm password</label>
                    <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="password"
                        name="password_confirmation" id="password_confirmation" placeholder="confirm password" />
                </div>

                <button type="submit"
                    class="w-full mt-6 mb-3 bg-indigo-100 rounded-lg px-4 py-2 text-lg text-gray-800 tracking-wide font-semibold font-sans">{{ __('Register') }}</button>
            </form>
        </div>
    </div>
@endsection
