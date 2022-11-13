{{-- COMBINATIONS  --}}
@extends('layouts.app')
@section('content')
    <form action="/combinations" class="bg-white rounded-lg p-3 my-4" method="post" autocomplete="off">
        @csrf
        <div class="grid md:grid-cols-3 md:gap-6">
            <div class="relative z-0 mb-6 w-full group">
                <x-multiselect />
                @if ($errors->has('name'))
                    <span class="text-red-500">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="relative z-0 mb-6 w-full group">
                <input type="text" name="name" id="alias"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" ">
                <label for="alias"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Alias

                </label>
                @if ($errors->has('name'))
                    <span class="text-red-500">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" name="name" id="description"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" ">
                <label for="description"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Description

                </label>
                @if ($errors->has('name'))
                    <span class="text-red-500">{{ $errors->first('name') }}</span>
                @endif
            </div>

        </div>
    </form>
@endsection
