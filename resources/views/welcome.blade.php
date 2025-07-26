<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
    <link
      rel="stylesheet"
      as="style"
      onload="this.rel='stylesheet'"
      href="https://fonts.googleapis.com/css2?display=swap&amp;family=Manrope%3Awght%40400%3B500%3B700%3B800&amp;family=Noto+Sans%3Awght%40400%3B500%3B700%3B900"
    />

    <title>Inventaris Organisasi</title>
    <link rel="icon" type="image/x-icon" href="data:image/x-icon;base64," />

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  </head>
  <body>
    <div class="relative flex size-full min-h-screen flex-col bg-slate-50 group/design-root overflow-x-hidden" style='font-family: Manrope, "Noto Sans", sans-serif;'>
      <div class="layout-container flex h-full grow flex-col">
        <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-b-[#e7edf4] px-10 py-3">
          <div class="flex items-center gap-4 text-[#0d141c]">
            <div class="size-4">
              <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M13.8261 30.5736C16.7203 29.8826 20.2244 29.4783 24 29.4783C27.7756 29.4783 31.2797 29.8826 34.1739 30.5736C36.9144 31.2278 39.9967 32.7669 41.3563 33.8352L24.8486 7.36089C24.4571 6.73303 23.5429 6.73303 23.1514 7.36089L6.64374 33.8352C8.00331 32.7669 11.0856 31.2278 13.8261 30.5736Z"
                  fill="currentColor"
                ></path>
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M39.998 35.764C39.9944 35.7463 39.9875 35.7155 39.9748 35.6706C39.9436 35.5601 39.8949 35.4259 39.8346 35.2825C39.8168 35.2403 39.7989 35.1993 39.7813 35.1602C38.5103 34.2887 35.9788 33.0607 33.7095 32.5189C30.9875 31.8691 27.6413 31.4783 24 31.4783C20.3587 31.4783 17.0125 31.8691 14.2905 32.5189C12.0012 33.0654 9.44505 34.3104 8.18538 35.1832C8.17384 35.2075 8.16216 35.233 8.15052 35.2592C8.09919 35.3751 8.05721 35.4886 8.02977 35.589C8.00356 35.6848 8.00039 35.7333 8.00004 35.7388C8.00004 35.739 8 35.7393 8.00004 35.7388C8.00004 35.7641 8.0104 36.0767 8.68485 36.6314C9.34546 37.1746 10.4222 37.7531 11.9291 38.2772C14.9242 39.319 19.1919 40 24 40C28.8081 40 33.0758 39.319 36.0709 38.2772C37.5778 37.7531 38.6545 37.1746 39.3151 36.6314C39.9006 36.1499 39.9857 35.8511 39.998 35.764ZM4.95178 32.7688L21.4543 6.30267C22.6288 4.4191 25.3712 4.41909 26.5457 6.30267L43.0534 32.777C43.0709 32.8052 43.0878 32.8338 43.104 32.8629L41.3563 33.8352C43.104 32.8629 43.1038 32.8626 43.104 32.8629L43.1051 32.865L43.1065 32.8675L43.1101 32.8739L43.1199 32.8918C43.1276 32.906 43.1377 32.9246 43.1497 32.9473C43.1738 32.9925 43.2062 33.0545 43.244 33.1299C43.319 33.2792 43.4196 33.489 43.5217 33.7317C43.6901 34.1321 44 34.9311 44 35.7391C44 37.4427 43.003 38.7775 41.8558 39.7209C40.6947 40.6757 39.1354 41.4464 37.385 42.0552C33.8654 43.2794 29.133 44 24 44C18.867 44 14.1346 43.2794 10.615 42.0552C8.86463 41.4464 7.30529 40.6757 6.14419 39.7209C4.99695 38.7775 3.99999 37.4427 3.99999 35.7391C3.99999 34.8725 4.29264 34.0922 4.49321 33.6393C4.60375 33.3898 4.71348 33.1804 4.79687 33.0311C4.83898 32.9556 4.87547 32.8935 4.9035 32.8471C4.91754 32.8238 4.92954 32.8043 4.93916 32.7889L4.94662 32.777L4.95178 32.7688ZM35.9868 29.004L24 9.77997L12.0131 29.004C12.4661 28.8609 12.9179 28.7342 13.3617 28.6282C16.4281 27.8961 20.0901 27.4783 24 27.4783C27.9099 27.4783 31.5719 27.8961 34.6383 28.6282C35.082 28.7342 35.5339 28.8609 35.9868 29.004Z"
                  fill="currentColor"
                ></path>
              </svg>
            </div>
            <h2 class="text-[#0d141c] text-lg font-bold leading-tight tracking-[-0.015em]">Inventaris Organisasi</h2>
          </div>
          @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 text-[#1b1b18] border border-[#19140035] hover:border-[#1915014a] rounded-sm text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 text-[#1b1b18] border border-transparent hover:border-[#19140035] rounded-sm text-sm leading-normal"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 text-[#1b1b18] border border-[#19140035] hover:border-[#1915014a] rounded-sm text-sm leading-normal"
                            >
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>

            @endif

          </div>
        </header>
        <div class="px-40 flex flex-1 justify-center py-5">
          <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
            <div class="@container">
              <div class="@[480px]:p-4">
                <div
                  class="flex min-h-[480px] flex-col gap-6 bg-cover bg-center bg-no-repeat @[480px]:gap-8 @[480px]:rounded-lg items-center justify-center p-4"
                  style='background-image: linear-gradient(rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0.4) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuC0o9MOpMazjNaeaLbEbj2yPYzQZpOk8ZZrGGxTiC0Qx5jhlG7tkHfQ6WUC8pcXdkgPUqHrVQWDG-0iJHzYzYWj46XuKKQhAf3VS8UGOdXqkNxtEfZoLRoiRUHYrG1biInSu_jYDZDLECngL4u_vqF8pbOLihYA7artP-C-NbsIn_MhWSL3lBp_M3ffkUw2mzdfbYaMvr-Vifyx1eALdFL_b9h3X29ZYuv6og2OD6N4rv88oAsL6nPY6pqjtXikF-FLZIDcQgZnMA");'
                >
                  <div class="flex flex-col gap-2 text-center">
                    <h1
                      class="text-white text-4xl font-black leading-tight tracking-[-0.033em] @[480px]:text-5xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em]"
                    >
                      Kelola Inventaris Organisasi Anda dengan Mudah
                    </h1>
                    <h2 class="text-white text-sm font-normal leading-normal @[480px]:text-base @[480px]:font-normal @[480px]:leading-normal">
                      Sistem inventaris kami yang efisien menyederhanakan proses pelacakan dan pengelolaan aset organisasi Anda, memastikan akuntabilitas dan aksesibilitas.
                    </h2>
                  </div>
                  <div class="flex-wrap gap-3 flex justify-center">
                    <button
                      class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 @[480px]:h-12 @[480px]:px-5 bg-[#0c7ff2] text-slate-50 text-sm font-bold leading-normal tracking-[0.015em] @[480px]:text-base @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em]"
                    >
                      <span class="truncate">Jelajahi Inventaris</span>
                    </button>
                    <button
                      class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 @[480px]:h-12 @[480px]:px-5 bg-[#e7edf4] text-[#0d141c] text-sm font-bold leading-normal tracking-[0.015em] @[480px]:text-base @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em]"
                    >
                      <span class="truncate">Daftar</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <h2 class="text-[#0d141c] text-[22px] font-bold leading-tight tracking-[-0.015em] px-4 pb-3 pt-5">Kategori Inventaris Utama</h2>
            <div class="grid grid-cols-[repeat(auto-fit,minmax(158px,1fr))] gap-3 p-4">
              <div class="flex flex-col gap-3 pb-3">
                <div
                  class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg"
                  style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB4CcVRtTZN_7UhV6kgDefGJ_OT7phopcSG0kA2GwLxq53AIB0L0CREwW7xCwfPRVl1bYJs7JDbajlAQnjq6c1xGSyizOPwjfYTNdzi9aN_eUUzuDxe9S2cw6CgJjzh9FfHS0DlV4mG5cOo852s77SOLvJ4BSAfknaaYgjPOeSNuqIx9bR6DX_4FKf_YzWyzSPTEIXVW8CU50cSI16j-LgqVwEwHt4wI6j91fDa9qiERV28Xfa7xP6K9C_oCRYb7CYDIPmvjxM5kQ");'
                ></div>
                <div>
                  <p class="text-[#0d141c] text-base font-medium leading-normal">Peralatan Kantor</p>
                  <p class="text-[#49739c] text-sm font-normal leading-normal">Semua peralatan kantor yang Anda butuhkan untuk operasi sehari-hari.</p>
                </div>
              </div>
              <div class="flex flex-col gap-3 pb-3">
                <div
                  class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg"
                  style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDQ9WzG8Pj1XD9lARi521Lz_8wRi2GKmwG6mtVVc7tMdVNNQhAXIAoHVjeV1NhaOpsikFTFEu8epljhBLZFQO_p5mBwAX1oUoHvBDEmnzmYXEBLQG1zF7M0VnpZE0C0oEC56jdHhx4SyqUFt20bnUOJnNEEaD2Q78hRBY7sNxz16hHS7QbDHjgGyF4QfrJx7J5uzs_QZDi7zSordk358RaBpcyQ1jASgsi98BFv97_7SRzD-3XiKwIQLqZHb4syCRJ81Zo7NiX2hQ");'
                ></div>
                <div>
                  <p class="text-[#0d141c] text-base font-medium leading-normal">Teknologi</p>
                  <p class="text-[#49739c] text-sm font-normal leading-normal">Perangkat keras dan perangkat lunak terbaru untuk meningkatkan produktivitas.</p>
                </div>
              </div>
              <div class="flex flex-col gap-3 pb-3">
                <div
                  class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg"
                  style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBU6iVrTyEyjF3BvN96hIOxG2-KWGdHfxycPSJlgfBvVUTp-IMwYfKeONNkrh7ET3hJzhVg04zEt7T1SbZwC4t7w-cfd_JTCMbFYZD7ad58xFcn79EN_GBvfAPTjFml-qkhL_RnLwggwVi6tmpqSw1NUWUwCTC6yn-k4ibeN9NE7fd3Lef2k_8uKCqJxnmjw2rFyxC5Q1DagtKhOZLoEphajGzghPecKi3Bho6cadtXwEAaFM3Z1pLjpoj4rno7R8139IdrcJLUAw");'
                ></div>
                <div>
                  <p class="text-[#0d141c] text-base font-medium leading-normal">Perabotan</p>
                  <p class="text-[#49739c] text-sm font-normal leading-normal">Perabotan kantor yang nyaman dan fungsional untuk ruang kerja yang optimal.</p>
                </div>
              </div>
              <div class="flex flex-col gap-3 pb-3">
                <div
                  class="w-full bg-center bg-no-repeat aspect-square bg-cover rounded-lg"
                  style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBOe3EYiM0TxWb4UrZzDLbFw3tkVybCkTP-iMzrx9BYjeX3w8NJgDp7OsfHrU9FOtpjduKSqjMr8otLY28RFvHi8bNl_FsRPwyYY0WhrDv_qbwrCZOmM4mw4_NpaOb2fBGO5kWywPf3pABm9VJ4wqQ7XvhJN9OouVABUMBcclosY7HVTd4jEE6kjx0SOzrYRvvDKiifwwVJ7nB51Pue2djF68UnCBUjhnYAXm-EqqwAsZDCc0abDsFj8v3xrylRbqGGHJ3kwwNYuA");'
                ></div>
                <div>
                  <p class="text-[#0d141c] text-base font-medium leading-normal">Persediaan</p>
                  <p class="text-[#49739c] text-sm font-normal leading-normal">Persediaan kantor penting untuk menjaga kelancaran operasi.</p>
                </div>
              </div>
            </div>
            <div class="@container">
              <div class="flex flex-col justify-end gap-6 px-4 py-10 @[480px]:gap-8 @[480px]:px-10 @[480px]:py-20">
                <div class="flex flex-col gap-2 text-center">
                  <h1
                    class="text-[#0d141c] tracking-light text-[32px] font-bold leading-tight @[480px]:text-4xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em] max-w-[720px]"
                  >
                    Siap Menyederhanakan Pengelolaan Inventaris Anda?
                  </h1>
                  <p class="text-[#0d141c] text-base font-normal leading-normal max-w-[720px">Daftar hari ini dan rasakan kemudahan pengelolaan inventaris yang efisien.</p>
                </div>
                <div class="flex flex-1 justify-center">
                  <div class="flex justify-center">
                    <button
                      class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 @[480px]:h-12 @[480px]:px-5 bg-[#0c7ff2] text-slate-50 text-sm font-bold leading-normal tracking-[0.015em] @[480px]:text-base @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em] grow"
                    >
                      <span class="truncate">Mulai</span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <footer class="flex justify-center">
          <div class="flex max-w-[960px] flex-1 flex-col">
            <footer class="flex flex-col gap-6 px-5 py-10 text-center @container">
              <div class="flex flex-wrap items-center justify-center gap-6 @[480px]:flex-row @[480px]:justify-around">
                <a class="text-[#49739c] text-base font-normal leading-normal min-w-40" href="#">Tentang Kami</a>
                <a class="text-[#49739c] text-base font-normal leading-normal min-w-40" href="#">Kontak</a>
              </div>
              <p class="text-[#49739c] text-base font-normal leading-normal">© 2023 Inventaris Organisasi. Semua hak dilindungi undang-undang.</p>
            </footer>
          </div>
        </footer>
      </div>
    </div>
  </body>
</html>
