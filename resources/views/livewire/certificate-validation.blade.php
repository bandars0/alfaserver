<div class="bg-gray-100 font-sans leading-normal tracking-normal h-screen flex flex-col">
    <header class="bg-gradient-to-r from-blue-500 to-purple-500 text-white text-center py-6">
        <h1 class="text-3xl font-bold">خدمة التحقق من الشهادات </h1>
        <h2 class="text-xl mt-2">Certificate Validation Service</h2>
    </header>
    <div class="flex flex-col md:flex-row justify-center w-full max-w-6xl mx-auto p-6 mt-6">
        <div
            class="bg-white shadow-2xl rounded-xl p-8 m-auto flex flex-col items-center justify-center w-full md:w-1/2 transition-transform transform">

            @if($certificate->status == \App\Enum\CertificateStatus::VALID)
                    <svg class="h-32 w-32 text-green-500 animate-pulse " xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h2 class="text-2xl font-bold mb-2">الشهادة صحيحة (سارية)</h2>
                    <h2 class="text-2xl font-bold mb-2">Authentic Certificate (Valid)</h2>
            @elseif($certificate->status == \App\Enum\CertificateStatus::EXPIRED)
                <svg class="h-32 w-32 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>

                <h2 class="text-2xl font-bold mb-2">الشهادة منتيهة (غير سارية)</h2>
                <h2 class="text-2xl font-bold mb-2">Expired Certificate (Invalid)</h2>
            @endif
            @if($certificate)
                    <div class="bg-white rounded-lg p-4 shadow-sm w-full">
                        <div
                            class="relative flex flex-col w-full h-full   text-gray-700 bg-white shadow-sm rounded-xl ">
                            <table class="w-full text-left table-auto min-w-max">
                                <tbody>
                                <tr>
                                    <td class="p-4 border border-gray-500  text-left">
                                        <p class="block font-sans text-sm antialiased font-semibold leading-normal text-blue-gray-900">
                                            Certificate No
                                        </p>
                                    </td>
                                    <td class="p-4 border border-gray-500  bg-gray-50  text-center">
                                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                            {{ $certificate->number }}
                                        </p>
                                    </td>
                                    <td class="p-4 border border-gray-500  text-right">
                                        <p class="block font-sans text-sm antialiased font-semibold leading-normal text-blue-gray-900">
                                            رقم الشهادة
                                        </p>
                                    </td>

                                </tr>
                                <tr>
                                    <td class="p-4 border border-gray-500  text-left">
                                        <p class="block font-sans text-sm antialiased font-semibold leading-normal text-blue-gray-900">
                                            Issued To
                                        </p>
                                    </td>
                                    <td class="p-4 border border-gray-500  bg-gray-50   text-center">
                                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 ">
                                            {{ $certificate->certificate_data['Issued_to'] }}
                                        </p>
                                    </td>
                                    <td class="p-4 border border-gray-500  text-right">
                                        <p class="block font-sans text-sm antialiased font-semibold leading-normal text-blue-gray-900">
                                            إسم الجهة
                                        </p>
                                    </td>

                                </tr>
                                <tr>
                                    <td class="p-4 border border-gray-500  text-left">
                                        <p class="block font-sans text-sm antialiased font-semibold leading-normal text-blue-gray-900">
                                            Issue Date
                                        </p>
                                    </td>
                                    <td class="p-4  border border-gray-500  bg-gray-50   text-center">
                                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                            {{$certificate->issue_date->format('d/m/Y')}}
                                        </p>
                                    </td>
                                    <td class="p-4 border border-gray-500  text-right">
                                        <p class="block font-sans text-sm antialiased font-semibold leading-normal text-blue-gray-900">
                                            تاريخ الاصدار
                                        </p>
                                    </td>

                                </tr>
                                <tr>
                                    <td class="p-4 border border-gray-500  text-left">
                                        <p class="block font-sans text-sm antialiased font-semibold leading-normal text-blue-gray-900">
                                            Expiry Date
                                        </p>
                                    </td>
                                    <td class="p-4 border border-gray-500  bg-gray-50   text-center">
                                        <p class="block font-sans text-sm antialiased font-normal  leading-normal text-blue-gray-900">
                                            {{$certificate->expired_date->format('d/m/Y')}}
                                        </p>
                                    </td>
                                    <td class="p-4 border border-gray-500  text-right">
                                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                            تاريخ الإنتهاء
                                        </p>
                                    </td>

                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
            @endif


        </div>



    </div>
    <footer class="bg-gray-800 text-white text-center py-4 mt-auto">
        <p> {{$copyright}}</p>
    </footer>
</div>
