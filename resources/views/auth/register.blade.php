<x-layout-auth title="Register">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Create your account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">

            {{-- STATUS & ERROR FEEDBACK --}}
            @if ($errors->any())
                <div class="bg-red-100 text-red-800 p-4 rounded-lg mb-4 text-sm text-center">
                    {{ $errors->first() }}
                </div>
            @endif

            {{-- FORM REGISTER --}}
            <form class="space-y-6" action="{{ route('register') }}" method="POST">
                @csrf

                <div>
                    <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                    <div class="mt-2">
                        <input type="email" name="email" id="email" autocomplete="email" value="{{ old('email') }}" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                    <div class="mt-2">
                        <input type="password" name="password" id="password" autocomplete="new-password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    </div>
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm/6 font-medium text-gray-900">Confirm Password</label>
                    <div class="mt-2">
                        <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="new-password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    </div>
                </div>

                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Register
                    </button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm/6 text-gray-500">
                Already have an account?
                <a href="{{ route('login') }}" class="font-semibold text-indigo-600 hover:text-indigo-500">Sign in</a>
            </p>
        </div>
    </div>
</x-layout>
