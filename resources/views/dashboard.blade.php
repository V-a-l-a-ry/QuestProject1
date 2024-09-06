@extends('layouts.app')

@section('content')
    <div x-data="{ open: false }" class="flex min-h-screen">

        <div :class="open ? 'ml-64' : 'ml-0 lg:ml-0'" class="flex-grow transition-all duration-300 ease-in-out px-6 py-6">
            <div class="flex justify-between items-center bg-white shadow rounded-lg p-6 mb-6">
                <div>
                    <p class="text-gray-500">Admin / <strong class="text-black">Dashboard</strong></p>
                </div>
                <div class="flex space-x-4">
                    <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-500">Premium Demo</button>
                </div>
            </div>

            <div class="flex justify-between items-center bg-white shadow rounded-lg p-6 mb-6">
                <div>
                    <h1 class="text-3xl font-bold">Dashboard</h1>
                </div>
                <div class="flex space-x-4">
                    <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300">Button</button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <p class="text-gray-500">Clients</p>
                    <p class="text-2xl font-bold">512</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <p class="text-gray-500">Sales</p>
                    <p class="text-2xl font-bold">$7,770</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow text-center">
                    <p class="text-gray-500">Performance</p>
                    <p class="text-2xl font-bold">256%</p>
                </div>
            </div>

            <div class="bg-blue-500 text-white p-6 rounded-t-lg flex justify-between items-center">
                <span class="font-semibold">Responsive Table</span>
                <button class="bg-blue-700 px-4 py-2 rounded-lg hover:bg-blue-600">Dismiss</button>
            </div>
            <div class="bg-white p-6 rounded-b-lg shadow overflow-x-auto">
                <table class="min-w-full text-left">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Company</th>
                            <th class="px-4 py-2">City</th>
                            <th class="px-4 py-2">Progress</th>
                            <th class="px-4 py-2">Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2">Rebecca Bauch</td>
                            <td class="border px-4 py-2">Daugherty-Daniel</td>
                            <td class="border px-4 py-2">South Cory</td>
                            <td class="border px-4 py-2">
                                <div class="bg-gray-200 rounded-full h-4 w-3/4">
                                    <div class="bg-green-500 h-4 rounded-full" style="width: 75%"></div>
                                </div>
                            </td>
                            <td class="border px-4 py-2">Oct 25, 2021</td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Felicita Yundt</td>
                            <td class="border px-4 py-2">Casper-Kerluke</td>
                            <td class="border px-4 py-2">East Oscarbury</td>
                            <td class="border px-4 py-2">
                                <div class="bg-gray-200 rounded-full h-4 w-3/4">
                                    <div class="bg-green-500 h-4 rounded-full" style="width: 50%"></div>
                                </div>
                            </td>
                            <td class="border px-4 py-2">Oct 12, 2021</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
