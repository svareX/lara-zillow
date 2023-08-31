# Lara-Zillow

## About the project 
Lara-Zillow is a web application inspired by [zillow](https://www.zillow.com/). This project was my personal introduction to Single Page Application approach to creating websites. I've wanted to try this more "modern" approach since it is very popular in current times and I have to say that its something completely different from the classic Blade or even Livewire approach. Project has some of the more basic functions like user registering, authenticating, authorizing using email verification. I have also implemented features such as real-time listing filtering and pagination, image uploading, full-screen image previews, offers and notifications and a real-time interest calculator. The application supports both dark and light mode depending on user's browser settings.

## Technologies used to accomplish this solution are:

 - [Laravel](https://laravel.com/)
 - [Vue3](https://vuejs.org/)
 - [InertiaJS](https://inertiajs.com/)
 - [TailwindCSS](https://tailwindcss.com/)
 
## Try it yourself!
First you need to clone the repository.

    git clone https://github.com/svareX/lara-zillow

Then install all the package and dependencies.

    composer install

After that you need to setup an .env file (use the .env.example as a template)

    copy .env.example .env

Generate a new application key

    php artisan key:generate

Create your database table.

    php artisan migrate


While you have a local database server like [XAMPP](https://www.apachefriends.org/)
Then all you need to do is to start a local Laravel server.

    php artisan serve

## Image gallery

<p align="center">
<img src="https://i.ibb.co/55vs8H4/Fire-Shot-Capture-001-Lara-Zillow-localhost.png" alt="Fire-Shot-Capture-001-Lara-Zillow-localhost"/>
</p>


<p align="center">
<img src="https://i.ibb.co/3F6xTLN/Fire-Shot-Capture-003-Lara-Zillow-localhost.png" alt="Fire-Shot-Capture-003-Lara-Zillow-localhost"/>
</p>

<p align="center">
<img src="https://i.ibb.co/5Y6Ypb3/Fire-Shot-Capture-004-Lara-Zillow-localhost.png" alt="Fire-Shot-Capture-004-Lara-Zillow-localhost"/>
</p>

<p align="center">
<img src="https://i.ibb.co/kQyvrx6/Fire-Shot-Capture-005-Lara-Zillow-localhost.png" alt="Fire-Shot-Capture-005-Lara-Zillow-localhost"/>
</p>

<p align="center">
<img src="https://i.ibb.co/zfmNnqn/Fire-Shot-Capture-006-Lara-Zillow-localhost.png" alt="Fire-Shot-Capture-006-Lara-Zillow-localhost"/>
</p>

## License
MIT License

Copyright (c) [2023]

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
