<!-- Header Area Starts -->

<header style="background-color: #575c69a8; height: 6vh; color: white">
	<div style="padding-top: 3px;" class="mx-4 lg:flex lg:items-center">
		<div style="padding-right: 35vw;">
			<div class="lg:shrink-0">
				<a href="{{ route('index') }}">
					<img
						style="margin-top: -18px; width: 115px;"
						src="assets/images/logo/newlogo1.png"
						alt="logo"
						class="h-auto lg:m-0 lg:p-3 m-auto px-2 py-2" />
				</a>
			</div>
			<div class="nav-ham p-6 lg:hidden cursor-pointer transition ease-in-out duration-75 open">
				@foreach ([1, 2, 3] as $data)
				<span class="bg-gray-600 block w-5 h-[3px] my-1 mx-0"></span>
				@endforeach
			</div>
			<div class="nav-ham p-4 lg:hidden cursor-pointer relative transition ease-in-out duration-75 close hidden">
				<span class="bg-gray-600 block w-5 h-[3px] my-1 mx-0 absolute top-3.5 right-4 transform rotate-45"></span>
				<span class="bg-gray-600 block w-5 h-[3px] my-1 mx-0  absolute top-3.5 right-4 transform -rotate-45"></span>
			</div>
		</div>

		<div class="lg:flex-1 nav-collapse hidden lg:block">
			<ul style="margin-left: 7vw;" class="pb-5	 lg:pb-0 lg:flex lg:flex-wrap lg:items-center lg:justify-end">
				@foreach ($navdata as $data)
				<li style="font-size: larger; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif" class="font-bold lg:px-4 lg:py-2 lg:text-left p-2.5 text-[12.5px] text-right uppercase transition ease-in-out duration-300 hover:scale-105">
					<a href={{ $data['href'] }}>{{ $data['text'] }}</a>
				</li>
				@endforeach

				@if (Route::has('login'))
				@auth
				<div class="m-2 flex justify-end lg:mx-4 lg:block">
					<x-jet-dropdown align="right" width="48">
						<x-slot name="trigger">
							@if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
							<button
								class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
								<img
									class="h-8 w-8 rounded-full object-cover"
									src="{{ Auth::user()->profile_photo_url }}"
									alt="{{ Auth::user()->name }}" />
							</button>
							@else
							<span class="inline-flex rounded-md">
								<button
									type="button"
									class="bg-transparent border border-transparent duration-300 ease-in-out focus:outline-none font-bold font-medium hover:scale-105 inline-flex items-center lg:text-left text-[12.5px] text-gray-900 text-right transition uppercase">
									{{ Auth::user()->name }}

									<svg
										class="ml-2 -mr-0.5 h-4 w-4"
										xmlns="http://www.w3.org/2000/svg"
										viewBox="0 0 20 20"
										fill="currentColor">
										<path
											fill-rule="evenodd"
											d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
											clip-rule="evenodd" />
									</svg>
								</button>
							</span>
							@endif
						</x-slot>

						<x-slot name="content">
							<!-- Account Management -->
							<div class="block px-4 py-2 text-xs text-gray-400 text-right">
								{{ __('Manage Account') }}
							</div>

							<x-jet-dropdown-link class="text-right" href="{{ route('profile.show') }}">
								{{ __('Profile') }}
							</x-jet-dropdown-link>

							@if (Laravel\Jetstream\Jetstream::hasApiFeatures())
							<x-jet-dropdown-link class="text-right" href="{{ route('api-tokens.index') }}">
								{{ __('API Tokens') }}
							</x-jet-dropdown-link>
							@endif

							<div class="border-t border-gray-100"></div>

							<!-- Authentication -->
							<form method="POST" action="{{ route('logout') }}" x-data>
								@csrf

								<x-jet-dropdown-link class="text-right"
									href="{{ route('logout') }}"
									@click.prevent="$root.submit();">
									{{ __('Log Out') }}
								</x-jet-dropdown-link>
							</form>
							<div class="border-t border-gray-100"></div>
							<x-jet-dropdown-link class="text-right p-2.5 text-sm font-bold text-slate-800 uppercase text-[12.5px] text-gray-500 text-right" href="{{ route('admin.index') }}" target="_blank">
								Dashboard
							</x-jet-dropdown-link>
						</x-slot>
					</x-jet-dropdown>
				</div>
				@else
				<div class="m-2 flex justify-end lg:mx-4 lg:block">
					<x-jet-dropdown align="right" width="48">
						<x-slot name="trigger">
							<span class="inline-flex rounded-md">
								<button style="font-size: larger; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif"
									type="button"
									class="bg-transparent border border-transparent duration-300 ease-in-out focus:outline-none font-bold font-medium hover:scale-105 inline-flex items-center lg:text-left text-[12.5px] text-gray-900 text-right transition uppercase">
									User
								</button>
							</span>
						</x-slot>

						<x-slot name="content">

							<x-jet-dropdown-link class="text-right p-2.5 text-sm font-bold text-slate-800 uppercase text-[12.5px] text-gray-500 text-right" href="{{ route('login') }}">
								Login
							</x-jet-dropdown-link>

							@if (Route::has('register'))
							<x-jet-dropdown-link class="text-right p-2.5 text-sm font-bold text-slate-800 uppercase text-[12.5px] text-gray-500 text-right" href="{{ route('register') }}">
								Register
							</x-jet-dropdown-link>
							@endif
							<div class="border-t border-gray-100"></div>
							<x-jet-dropdown-link class="text-right p-2.5 text-sm font-bold text-slate-800 uppercase text-[12.5px] text-gray-500 text-right" href="{{ route('admin.index') }}" target="_blank">
								Dashboard
							</x-jet-dropdown-link>
						</x-slot>
					</x-jet-dropdown>
				</div>
				@endif @endif

			</ul>
		</div>
	</div>
</header>
<!-- Header Area End -->