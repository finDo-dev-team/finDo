<template>
  <div class="flex flex-row h-full w-full">
    <!-- Sidebar -->
    <nav class="w-20 justify-between flex flex-col shadow-inner bg-white">
      <div class="mt-10 mb-10">
        <!-- Servira plus tard pour le profil de l'utilisateur
        <a href="#">
          <img
            src="https://randomuser.me/api/portraits/women/76.jpg"
            class="rounded-full w-10 h-10 mb-3 mx-auto"
          />
        </a>
        -->
        <div class="mt-10">
          <ul>
            <li class="mb-6">
              <inertia-link href="/map">
                <span>
                  <svg
                    class="fill-current h-10 w-10 text-gray-300 mx-auto hover:text-red-300 transition-color duration-500"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="black"
                    width="48px"
                    height="48px"
                  >
                    <path d="M0 0h24v24H0z" fill="none" />
                    <path
                      d="M12 10.9c-.61 0-1.1.49-1.1 1.1s.49 1.1 1.1 1.1c.61 0 1.1-.49 1.1-1.1s-.49-1.1-1.1-1.1zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm2.19 12.19L6 18l3.81-8.19L18 6l-3.81 8.19z"
                    />
                  </svg>
                </span>
              </inertia-link>
            </li>

            <li class="mb-6">
              <inertia-link href="/events">
                <span>
                  <svg
                    class="fill-current h-10 w-10 text-gray-300 mx-auto hover:text-red-300 transition-color duration-500"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="black"
                    width="48px"
                    height="48px"
                  >
                    <path d="M0 0h24v24H0z" fill="none" />
                    <path
                      d="M17 12h-5v5h5v-5zM16 1v2H8V1H6v2H5c-1.11 0-1.99.9-1.99 2L3 19c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-1V1h-2zm3 18H5V8h14v11z"
                    />
                  </svg>
                </span>
              </inertia-link>
            </li>

            <li class="mb-6">
              <inertia-link href="/search">
                <span>
                  <svg
                    class="fill-current h-10 w-10 text-gray-300 mx-auto hover:text-red-300 transition-color duration-500"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="-1 0 22 22"
                    fill="black"
                    width="48px"
                    height="48px"
                  >
                    <path d="M0 0h24v24H0z" fill="none" />
                    <path
                      d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"
                    />
                  </svg>
                </span>
              </inertia-link>
            </li>

            <li class="mb-6">
              <inertia-link href="/events-form">
                <span>
                  <svg
                    class="fill-current h-10 w-10 text-gray-300 mx-auto hover:text-red-300 transition-color duration-500"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="black"
                    width="48px"
                    height="48px"
                  >
                    <path d="M0 0h24v24H0z" fill="none" />
                    <path
                      d="M20 1v3h3v2h-3v3h-2V6h-3V4h3V1h2zm-8 12c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm2-9.75V7h3v3h2.92c.05.39.08.79.08 1.2 0 3.32-2.67 7.25-8 11.8-5.33-4.55-8-8.48-8-11.8C4 6.22 7.8 3 12 3c.68 0 1.35.08 2 .25z"
                    />
                  </svg>
                </span>
              </inertia-link>
            </li>
          </ul>
        </div>
      </div>
      <!-- Servira plus tard pour la déconnexion
      <div class="mb-4">
        <a href="#">
          <span>
            <svg
              class="fill-current h-5 w-5 text-gray-300 mx-auto hover:text-gray-700 transition-color duration-500"
              viewBox="0 0 24 24"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M13 4.00894C13.0002 3.45665 12.5527 3.00876 12.0004 3.00854C11.4481 3.00833 11.0002 3.45587 11 4.00815L10.9968 12.0116C10.9966 12.5639 11.4442 13.0118 11.9965 13.012C12.5487 13.0122 12.9966 12.5647 12.9968 12.0124L13 4.00894Z"
                fill="currentColor"
              />
              <path
                d="M4 12.9917C4 10.7826 4.89541 8.7826 6.34308 7.33488L7.7573 8.7491C6.67155 9.83488 6 11.3349 6 12.9917C6 16.3054 8.68629 18.9917 12 18.9917C15.3137 18.9917 18 16.3054 18 12.9917C18 11.3348 17.3284 9.83482 16.2426 8.74903L17.6568 7.33481C19.1046 8.78253 20 10.7825 20 12.9917C20 17.41 16.4183 20.9917 12 20.9917C7.58172 20.9917 4 17.41 4 12.9917Z"
                fill="currentColor"
              />
            </svg>
          </span>
        </a>
      </div>
      -->
    </nav>
    <div class="px-8 py-4 bg-gray-100 text-gray-800 w-full h-full">
      <!-- Content -->
      <!-- Page Heading -->
      <header>
        <div class="mb-5">
          <h1 class="w-full text-center">
            <span
              class="font-semibold text-2xl text-white leading-tight text-center bg-red-300 rounded-full px-2"
            >
              <slot name="header"> </slot>
            </span>
          </h1>
        </div>
      </header>
      <main>
        <slot></slot>
      </main>
    </div>
  </div>
</template>

<script>
import JetApplicationLogo from "./../Jetstream/ApplicationLogo";
import JetApplicationMark from "./../Jetstream/ApplicationMark";

export default {};
</script>
