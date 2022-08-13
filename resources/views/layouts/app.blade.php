<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />

        <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

        {{-- bootstrap cdn --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        {{-- font-awesome cdn --}}
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        

         {{-- Alpine cdn --}}
    <script src="//unpkg.com/alpinejs" defer></script>  
        

        {{-- defining tailwin color class --}}
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                            
                        },
                    },
                },
            };
        </script>
        <title>RecruitersHub | Find Software Development Jobs</title>
    </head>
    <body class="mb-48">
       <div class="container">

         <nav class="flex justify-between items-center mb-4">
             <div class="inline">
                <a href="/">
    <img class="w-24 animate__animated animate__shakeX animate__slower animate__infinite animate__delay-5s my-elem" src="{{ asset('images/hiring.png') }}" alt="" class="logo "/>
    {{-- <img class="w-32" src="{{ asset('images/rebiglogo.png') }}" alt="" class="logo "/> --}}
        
        </a>
             </div>

            <ul class="flex space-x-6 mr-6 text-lg">
                <li>
                    <a href="register.html" class="hover:text-laravel"
                        ><i class="fa-solid fa-user-plus text-teal-700"></i> Register</a
                    >
                </li>
                <li>
                    <a href="login.html" class="hover:text-laravel"
                        ><i class="fa-solid fa-arrow-right-to-bracket text-teal-700"></i>
                        Login</a
                    >
                </li>
            </ul>
        </nav>

        {{-- container ends here --}}
       </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

<footer
      class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-teal-700 text-white h-24 mt-24 opacity-90 md:justify-center"
        >
            <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

            <a
                href="/listings/create"
                class="absolute top-1/3 right-10 bg-black hover:bg-laravel text-white py-2 px-5"
                >Post Job</a
            >
        </footer>

       <x-flash-message/>
    </body>
</html>
