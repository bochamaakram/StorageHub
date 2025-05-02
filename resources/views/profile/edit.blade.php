<x-app-layout>
<style>
            body {
                font-family: 'Instrument Sans', sans-serif;
                color: #333;
                line-height: 1.6;
                max-width: 1200px;
                margin: 0 auto;
            }
            .header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 40px;
            }
            .nav-links a {
                margin-left: 20px;
                text-decoration: none;
                color: #333;
                font-weight: 500;
            }
            .nav-links a:hover {
                color: #4f46e5;
            }
            .btn {
                display: inline-block;
                padding: 10px 20px;
                border-radius: 5px;
                text-decoration: none;
                font-weight: 500;
            }
            .btn-primary {
                background-color: #4f46e5;
                color: white;
            }
            .btn-secondary {
                border: 1px solid #4f46e5;
                color: #4f46e5;
                background-color: #00000000;
            }
            .hero {
                text-align: center;
                margin-bottom: 60px;
            }
            .hero h1 {
                font-size: 2.5rem;
                font-weight: 600;
                margin-bottom: 20px;
            }
            .hero p {
                font-size: 1.2rem;
                max-width: 700px;
                margin: 0 auto 30px;
            }
            .section {
                margin-bottom: 60px;
            }
            .section-title {
                font-size: 1.8rem;
                font-weight: 600;
                margin-bottom: 30px;
                text-align: center;
            }
            .features {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 30px;
                margin-bottom: 60px;
            }
            .feature {
                padding: 25px;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            .feature h3 {
                font-size: 1.3rem;
                font-weight: 600;
                margin-bottom: 15px;
            }
            .stats {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 30px;
                text-align: center;
                margin-bottom: 60px;
            }
            .stat h4 {
                font-size: 2.5rem;
                font-weight: 600;
                color: #4f46e5;
                margin-bottom: 10px;
            }
            .cta {
                text-align: center;
                padding: 40px;
                background-color: #f8fafc;
                border-radius: 8px;
            }
            .cta h2 {
                font-size: 1.8rem;
                font-weight: 600;
                margin-bottom: 20px;
            }
            hr {
                border: 0;
                height: 1px;
                background-color: #e2e8f0;
                margin: 40px 0;
            }
            .bg-primar {
                background-color: #4f46e5 ;
            }
        </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
