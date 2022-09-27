@extends('layouts.app')
@section('content')
    <form class="p-3 my-4 rounded-md bg-white" method="post" action="/days">
        @csrf
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" name="name" id="floating_first_name"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" ">
                <label for="floating_first_name"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Short
                    name</label>
                @if ($errors->has('name'))
                    <span class="text-red-500">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" name="description" id="floating_last_name"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" ">
                <label for="floating_last_name"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Full
                    name</label>
                @if ($errors->has('description'))
                    <span class="text-red-500">{{ $errors->first('description') }}</span>
                @endif
            </div>
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>

    <div x-data="menuSystem">
        <div class="overflow-x-auto relative bg-white">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Serial
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Dayname
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Description
                        </th>
                        <th class="py-3 px-6">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($days as $day)
                        <tr class="bg-white odd:bg-gray-200 border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}
                            </th>
                            <td class="py-4 px-6">
                                {{ $day->name }}
                            </td>
                            <td class="py-4 px-6">
                                {{ $day->description }}
                            </td>
                            <td>
                                <button @click="showEditModal({{ $day->id }})"
                                    class="bg-blue-500 text-white px-2 py-1 rounded-md"> Edit
                                </button>
                                <button @click="reveal({{ $day->id }})"
                                    class="bg-red-700 text-white rounded px-2 py-1">
                                    Delete </button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>


        <div x-show="editOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
            aria-modal="true">
            <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                <div x-cloak @click="editOpen = false" x-show="editOpen"
                    x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200 transform"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                    class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"></div>

                <div x-cloak x-show="editOpen" x-transition:enter="transition ease-out duration-300 transform"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="transition ease-in duration-200 transform"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl">
                    <div class="flex items-center justify-between space-x-4">
                        <h1 class="text-xl font-medium text-gray-800 ">Invite team memebr</h1>

                        <button @click="editOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </button>
                    </div>

                    <p class="mt-2 text-sm text-gray-500 ">
                        Add your teammate to your team and start work to get things done
                    </p>

                    <form class="mt-5" :action="'days/' + day_id" method="post">
                        @csrf
                        @method('put')
                        <div>
                            <label for="user name" class="block text-sm text-gray-700 capitalize dark:text-gray-200">Short
                                name</label>
                            <input x-model="day.name" name="name" placeholder="Name" type="text"
                                class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                            <span x-show="emptyName" class="text-red-500 mt-2">Name field is required </span>
                        </div>

                        <div class="mt-4">
                            <label for="email" class="block text-sm text-gray-700 capitalize dark:text-gray-200">Full
                                name</label>
                            <input x-model="day.description" name="description" placeholder="Description" type="text"
                                class="block w-full px-3 py-2 mt-2 text-gray-600 placeholder-gray-400 bg-white border border-gray-200 rounded-md focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-300 focus:ring-opacity-40">
                            <span x-show="emptyDescription" class="text-red-500 mt-2">Description field is required
                            </span>

                        </div>

                        <div class="flex justify-end mt-6">
                            <button :disabled="disabledSave" type="submit"
                                class="px-3 py-2 text-sm tracking-wide text-white capitalize transition-colors duration-200 transform bg-indigo-500 disabled:bg-indigo-300 rounded-md dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:bg-indigo-700 hover:bg-indigo-600 focus:outline-none focus:bg-indigo-500 focus:ring focus:ring-indigo-300 focus:ring-opacity-50">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('menuSystem', () => ({
                open: false,
                day: {
                    name: '',
                    description: ''
                },
                day_id: null,
                editOpen: false,

                toggleEditOpen() {
                    this.editOpen = !this.editOpen
                },

                toggle() {
                    console.log("email");
                    this.open = !this.open
                },

                async getDay(id) {
                    this.day_id = id;
                    await fetch(`/days/${this.day_id}`)
                        .then((response) => response.json())
                        .then((data) => this.day = data);
                },

                showEditModal(id) {
                    this.getDay(id)
                    // set values 
                    this.toggleEditOpen()
                },

                emptyName() {
                    return this.day.name === ""
                },

                emptyDescription() {
                    return this.day.description === ""
                },

                disabledSave() {
                    return this.emptyName() || this.emptyDescription()
                }

            }))
        })
    </script>
@endsection
