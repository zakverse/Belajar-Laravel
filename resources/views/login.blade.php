<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>loing Laravelt</title>
   
</head>
<body>
    <div class="min-h-screen bg-[#6366f1] flex items-center justify-center p-4">
    <div class="bg-white rounded-[40px] flex overflow-hidden shadow-2xl w-full max-w-4xl">
        
        <div class="w-full md:w-[58%] p-12 lg:p-20 bg-[#f8f9fa]">
            <h1 class="text-4xl font-bold text-center text-[#2d2d2d] mb-10">Masuk</h1>

            <form action="#" class="space-y-6">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2 ml-1">Nama Lengkap /Email</label>
                    <input type="text" 
                           class="w-full px-5 py-4 bg-[#ececec] border-none rounded-xl focus:ring-2 focus:ring-indigo-400 outline-none transition-all">
                </div>

                <div class="relative">
                    <div class="flex justify-between mb-2 px-1">
                        <label class="text-sm font-semibold text-gray-700">Kata Sandi</label>
                        <a href="#" class="text-xs font-semibold text-indigo-600 hover:underline">Lupa Kata Sandi ?</a>
                    </div>
                    <div class="relative">
                        <input type="password" 
                               class="w-full px-5 py-4 bg-[#ececec] border-none rounded-xl focus:ring-2 focus:ring-indigo-400 outline-none transition-all">
                        <div class="absolute inset-y-0 right-4 flex items-center text-gray-400 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <button type="submit" 
                        class="w-full py-4 bg-[#6366f1] text-white font-bold rounded-xl shadow-lg hover:bg-[#5254e0] transition-colors mt-4">
                    Masuk
                </button>
            </form>

            <p class="text-center mt-10 text-sm font-medium text-gray-600">
                Belum memiliki Akun ? <a href="#" class="text-indigo-600 font-bold hover:underline">Daftar</a>
            </p>
        </div>

        <div class="hidden md:block w-[42%] bg-[#d9d9d9]">
            </div>
    </div>
</div>
</body>
</html>