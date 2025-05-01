<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    @vite(['resources/css/app.css'])
    <style>
        /* Custom animation keyframes */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .fade-in {
            animation: fadeIn 1s ease-out forwards;
        }
    </style>
</head>

<body class="bg-[#688B58] flex flex-col items-center justify-center min-h-screen text-white font-umum fade-in">

    <div class="flex flex-col items-center space-y-8">
        <img src="/images/bayar/check.png" alt="Success" class="w-48">

        <h1 class="text-5xl font-bold">
            Payment Success
        </h1>

        <button onclick="window.location.href='{{ route('home') }}'" 
            class="mt-8 bg-white text-[#688B58] font-bold py-3 px-8 rounded-full text-lg hover:bg-gray-200 transition-all cursor-pointer">
            Back to Home
        </button>
    </div>

</body>
</html>
