<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Laravel App</title>
</head>
<body style="font-family: Arial, sans-serif; background-image: url('/images/backgrounds/quet1.jpg');">

            <!-- Centered Text --> 
            <div style="text-align: center; color: white; padding-top: 20px;">
        <h1 style="font-size: 2rem; font-weight: bold;font-size:50px;">Your App Name</h1>
    </div> 
    <nav style="background-color: blue; padding: 10px; margin: top;">
        <ul style="list-style-type: none; padding: 0; margin: 0; display: flex; justify-content: flex-end;">
            <li style="margin-left: 60px;"><a href="{{ route('home') }}"style="color: white; text-decoration: none; font-weight: bold;font-size:20px;">Home</a></li>
            <li style="margin-left: 60px;"><a href="{{ route('about') }}"style="color: white; text-decoration: none; font-weight: bold;font-size:20px;">About</a></li>
            <li style="margin-left: 60px;"><a href="{{ route('docs.index') }}"style="color: white; text-decoration: none; font-weight: bold;font-size:20px;">Documentation</a></li> <!-- Add this line -->
            <li style="margin-left: 60px;">
                
                 
                 <div style="display: none; position: absolute; background-color: white; color: black; border-radius: 5px; margin-top: 5px;">
                    <a href="#" style="display: block; padding: 10px; text-decoration: none; color: black;font-size:20px;">Profile</a>
                    <a href="#" style="display: block; padding: 10px; text-decoration: none; color: black;font-size:20px;">Settings</a>
                </div>
                </li>
                </ul>
            </div>
            <div class="ml-auto"style="margin-left: 20px;" style="color: white; text-decoration: none; font-weight: bold;font-size:20px;">
                <a href="{{ route('login') }}" class="text-white hover:text - blue">Login</a>
                <a href="{{ route('register') }}" class="ml-4 text-white hover:text - blue">Register</a>
            </div>

    </div>
    </nav>
    

