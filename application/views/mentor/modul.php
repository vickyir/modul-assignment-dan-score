
        <!-- Right side -->
        <div class="bg-cgray w-full h-screen px-10 py-6 flex flex-col gap-y-6 overflow-y-scroll">
            <!-- Header / Profile -->
            <div class="items-center gap-x-4 justify-end hidden sm:flex">
                <img class="w-10" src="<?= base_url('assets/')?>img/icons/default_profile.svg" alt="Profile Image">
                <p class="text-dark-green font-semibold"><?=$this->session->userdata('username')?></p>
            </div>

            <!-- Breadcrumb -->
            <div class="p-2 lg:p-4">
                <ul class="flex items-center gap-x-4 text-xs lg:text-base">
                    <!-- NAVIGATOR HALAMAN HOME -->

                    <li>

                        <a class="text-light-green hover:text-dark-green hover:font-semibold" href="#">Beranda</a>
                    </li>
                    <li>
                        <span class="text-light-green">/</span>
                    </li>
                    <!-- NAVIGATOR HALAMAN COURSES -->

                    <li>
                        <a class="text-light-green hover:text-dark-green hover:font-semibold" href="<?= site_url('dashboard/mentor')?>">Batch</a>
                    </li>
                    <li>
                        <span class="text-light-green">/</span>
                    </li>
                    <!-- NAVIGATOR HALAMAN SUB TOPIC -->

                    <li>
                        <a class="text-dark-green font-semibold" href="#">Materi</a>
                    </li>
                </ul>
            </div>
            <!-- TITTLE -->

            <div class="p-2 lg:p-4">
                <p class="text-lg md:text-xl lg:text-2xl xl:text-4xl text-dark-green font-semibold">Daftar Materi dari <?= $modul->modul_name?> </p>
            </div>

            <div class="p-2 lg:p-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <?php foreach($modul_child as $item) { ?> 
                <!-- MEMANGGIL DAN MENAMPILKAN SELURUH SUB TOPIC YANG ADA ATAU SUDAH DIBUAT PADA COURSE YANG SEDANG DIBUKA-->
                    <a href="<?= site_url('mentor/assignment/'.$item->id)?>" class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100" data-tooltip-target="tooltip-default">
                        <h5 class="mb-2 text-lg lg:text-2xl font-bold tracking-tight text-gray-900 line-clamp-1 sm:line-clamp-2 truncate..."><?= $item->modul_name?></h5>
                        <p class="font-normal text-gray-700 flex flex-row items-center gap-4 mt-5">
                            <img src="<?=base_url('assets/img/icons/')?>dokumen_icon.svg" alt="dokumen">
                        </p>
                    </a>
                    <div id="tooltip-default" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-gray-700 bg-gray-300 rounded-lg opacity-0 transition-opacity duration-300 tooltip max-w-[150px] shadow-lg shadow-gray-400">
                    <?= $item->modul_name?>
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
               <?php } ?>
            </div>
            
        </div>
    </div>
    <!-- CDN FLOWBITE -->

    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <!-- FUNGSI TOMBOL BUTTON TOGGLE SIDEBAR -->

    <script>
        let btnToggle = document.getElementById('btnToggle');
        let btnToggle2 = document.getElementById('btnToggle2');
        let sidebar = document.querySelector('.sidebar');
        let leftNav = document.getElementById("left-nav");
        btnToggle.onclick = function() {
            sidebar.classList.toggle('in-active');
        }

        btnToggle2.onclick = function() {
            leftNav.classList.toggle('hidden');
        }

        // Bug on click mobile navbar
        // leftNav.onclick = function() {
        //     leftNav.classList.toggle('hidden');
        // }
    </script>


</body>

</html>