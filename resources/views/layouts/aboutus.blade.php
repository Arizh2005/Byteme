<!-- resources/views/about.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> <!-- Pastikan Tailwind CSS dihubungkan -->
</head>

<body class="flex flex-col items-center justify-center min-h-screen p-4">
    <div class="md:flex md:justify-center md:items-center">
        <div class="pt-16 max-w-3xl mx-auto ml-12 mr-12 text-justify">
            <h1 class="text-4xl md:text-5xl text-center font-bold text-blue-900 leading-tight mb-12">About Us</h1>
            <p class="text-slate-600 mb-4 leading-relaxed">
                Kami adalah perusahaan pengembang website yang telah dipercaya oleh banyak klien dalam menciptakan
                website yang tidak hanya menarik tapi juga memberikan nilai nyata bagi masyarakat. Selama lebih dari
                satu tahun, kami terus berinovasi dalam mengembangkan solusi digital yang efektif. Salah satu produk
                ciptaan kami adalah Laptify, sebuah Sistem Rekomendasi Laptop yang dirancang untuk membantu Anda
                menemukan laptop yang paling sesuai dengan keinginan dan kebutuhan.
            </p>
            <div class="flex items-center justify-center">
                <!-- Logo Byte Me -->
                <img src="{{ asset('images/bytme.png') }}" alt="Byte Me Logo" class="w-1/3 h-1/3">
            </div>
        </div>
    </div>
</body>

</html>
