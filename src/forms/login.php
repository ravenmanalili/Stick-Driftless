<!doctype html>
<html class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./output.css" rel="stylesheet">
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  <title>Stick-Driftless</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
    body {
      font-family: 'Montserrat', sans-serif;
    }
  </style>
</head>
<body class="overflow-x-hidden dark:bg-gray-950 dark:text-gray-100">
    <section class="flex items-center justify-center min-h-dvh">
        <div class="flex flex-col h-full p-8 px-16 rounded-lg dark:bg-gray-900">
            <a href="../index.php" class="flex p-6 m-auto mx-6 text-4xl font-extrabold cursor-pointer max-md:text-md max-sm:text-3xl xl:mx-auto">Stick-Driftless</a>
            <div class="flex flex-col justify-start loginForm">
                <p class="pt-6 text-2xl font-bold">Log in</p>
                <div class="flex flex-col gap-3 py-3 xl:gap-4">
                    <form id="signIn" class="w-full max-w-sm xl:max-w-md" onSubmit="return userLogin(this)">
                        <div class="relative py-2">
                            <input type="email" 
                                class="w-full py-2 pl-10 pr-4 border rounded-lg" 
                                placeholder="you@example.com"
                                required />
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                <img src="https://icongr.am/entypo/mail.svg?size=20&color=ffffff">
                            </div>
                        </div>
                        <div class="relative py-2">
                            <input type="password" 
                                id="passwordInput"
                                class="w-full py-2 pl-10 pr-10 border rounded-lg" 
                                title="Must have at least one uppercase letter, lowercase letter, number, and special character"
                                placeholder="At least 8 characters"
                                minlength="8"
                                pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}" 
                                required />
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                                <img src="https://icongr.am/entypo/lock.svg?size=20&color=ffffff">
                            </div>
                            <button type="button" 
                                    id="togglePassword" 
                                    class="absolute inset-y-0 flex items-center cursor-pointer right-5">
                                <img id="eyeIcon" src="https://icongr.am/entypo/eye.svg?size=20&color=ffffff" alt="Toggle password">
                            </button>
                            <p id="passwordError" class="hidden text-sm text-red-500">Password must be at least 8 characters.</p>
                        </div>
        
                        <p class="py-3 font-semibold text-right cursor-pointer hover:underline md:text-sm lg:text-sm xl:py-4 xl:text-base">Forgot password?</p>
                        <button type="submit" 
                                class="w-full py-2 text-white transition-all duration-300 bg-blue-900 border cursor-pointer rounded-xl hover:bg-blue-800 xl:py-2 xl:text-lg">
                                Login
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        const passwordInput = document.getElementById("passwordInput");
        const togglePassword = document.getElementById("togglePassword");
        const eyeIcon = document.getElementById("eyeIcon");

        togglePassword.addEventListener("click", () => {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.src = "https://icongr.am/entypo/eye-with-line.svg?size=20&color=ffffff";
            } else {
                passwordInput.type = "password";
                eyeIcon.src = "https://icongr.am/entypo/eye.svg?size=20&color=ffffff";
            }
        });
    </script>
</body>
</html>

